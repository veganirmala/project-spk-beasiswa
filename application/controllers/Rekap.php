<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    private $nilai = [];
    private $mahasiswa = [];
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Rekap_model');
        $this->load->model('Thusulan_model');
    }

    //menampilkan seluruh data rekap
    public function rekap()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Hasil Seleksi";
            //ngambil data petugas yang login
            $data['user_email'] = $this->User_model->getEmail();

            //ngambil data tahun usulan aktif
            $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

            $data['rekap'] = $this->Rekap_model->getRekap();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('rekap/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //menampilkan data rekap sesuai tahun yang dipilih dicombo box
    public function cari_tahun()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Hasil Seleksi";
            //ngambil data petugas yang login
            $data['user_email'] = $this->User_model->getEmail();

            $data['thusulan'] = $this->Rekap_model->getDataTahunUsulan();

            //ngambil data tahun usulan aktif
            $data['rekap'] = $this->Rekap_model->getDataRekap();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('rekap/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //melakukan cetak untuk laporan
    public function cetak_rekap()
    {
        $data['title'] = 'Data Rekap Hasil Seleksi';
        //ngambil data petugas yang login
        $data['user_email'] = $this->User_model->getEmail();

        $data['rekap'] = $this->Rekap_model->getRekap();

        $this->load->view('template/header', $data);
        $this->load->view('rekap/laporan', $data);
        $this->load->view('template/footer');
    }

    //sinkronisasi data rekapan
    public function rekap_sinkron()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Hasil Seleksi";
            //ngambil data petugas yang login
            $data['user_email'] = $this->User_model->getEmail();

            //ngambil data mahasiswa dengan inner join
            $datamahasiswa = $this->Rekap_model->getDataMhs();

            //ngambil data tahun usulan aktif
            $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

            //kosongin tabel data rekap 
            //$this->db->truncate('tb_rekap');

            //kosongin tabel rekap sesuai id usulan yang aktif
            $id_aktif = $this->db->get_where('tb_tahun_usulan', ['status_usulan' => "Aktif"])->row_array();
            $this->db->delete('tb_rekap', array('id_usulan' => $id_aktif['id_usulan']));

            //panggil function datamahasiswa
            $this->run($datamahasiswa);

            //panggil function rekap dari controller rekap
            redirect('rekap/rekap');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('rekap/index', $data);
            $this->load->view('template/footer');
        }
    }

    public function run($datamahasiswa)
    {
        foreach ($datamahasiswa as $datamhs) {
            //ngambil data mahasiswa dengan getDataMhs
            $this->mahasiswa = [
                $datamhs['nim'],
                $datamhs['ipk'],
                $datamhs['nilai_pribadi'],
                $datamhs['nilai_prestasi'],
                $datamhs['ortu_penghasilan'],
            ];
            // echo json_encode($this->mahasiswa);
            // echo "<br>";

            //simpan data skor ipk di kolom 1
            $skor_ipk = $this->getIPK($this->mahasiswa[1]);
            // echo " SKOR IPK : " . $skor_ipk;
            // echo "<br>";

            //simpan data skor pribadi di kolom 2
            $skor_pribadi = $this->getPribadi($this->mahasiswa[2]);
            // echo " SKOR PRIBADI : " . $skor_pribadi;
            // echo "<br>";

            //simpan data skor prestasi di kolom 3
            $skor_prestasi = $this->getPrestasi($this->mahasiswa[3]);
            // echo " SKOR PRESTASI : " . $skor_prestasi;
            // echo "<br>";

            //simpan data skor ekonomi di kolom 4
            $skor_ekonomi = $this->getEkonomi($this->mahasiswa[4]);
            // echo " SKOR EKONOMI : " . $skor_ekonomi;
            // echo "<br>";

            //simpan data nim mahasiswa di kolom 1
            $nim =  $this->mahasiswa[0];

            //kosongin dulu data mahasiswa di tabel kriteria 
            $this->db->where('nim', $nim);
            $this->db->delete('kriteria');

            //simpan ulang data mahasiswa ke dalam tabel kriteria
            $dataalternatif = [
                'nim' => $nim,
                'kriteria_ip' => $skor_ipk,
                'kriteria_pribadi' => $skor_pribadi,
                'kriteria_prestasi' => $skor_prestasi,
                'kriteria_ekonomi' => $skor_ekonomi
            ];
            $this->db->insert('kriteria', $dataalternatif);
            // Batas tiap mahasiswa
            //echo "<br>";

            //select dulu data dari tabel kriteria dan tabel mahasiswa
            $qr = "SELECT kriteria.nim, kriteria.kriteria_ip, kriteria.kriteria_pribadi, kriteria.kriteria_prestasi,
            kriteria.kriteria_ekonomi FROM kriteria INNER JOIN tb_mahasiswa ON kriteria.nim = tb_mahasiswa.nim
            ORDER BY tb_mahasiswa.nim ASC";
            $alternatif = $this->db->query($qr)->result_array();

            //simpan semua data mahasiswa bentuk array
            for ($i = 0; $i < count($alternatif); $i++) {
                $this->nilai[$i] = [];
                for ($j = 0; $j < 5; $j++) {
                    $this->nilai[$i][0] = $nim;
                    $this->nilai[$i][1] = $skor_ipk; //benefit
                    $this->nilai[$i][2] = $skor_pribadi; //benefit
                    $this->nilai[$i][3] = $skor_prestasi; //benefit
                    $this->nilai[$i][4] = $skor_ekonomi; //cost
                }
                //echo json_encode($nilai);
            }
            //coba cetak nilai mahasiswa dalam array
            // echo json_encode($this->nilai[0][0]);
            // echo '<br>';
            // echo json_encode($this->nilai[0][1]);
            // echo '<br>';
            // echo json_encode($this->nilai[0][2]);
            // echo '<br>';
            // echo json_encode($this->nilai[0][3]);
            // echo '<br>';
            // echo json_encode($this->nilai[0][4]);
            // echo '<br>';


            //hitung max kriteria ipk
            $kriteriaipk = $this->Rekap_model->getMaxIPK();

            //hitung max kriteria pribadi
            $kriteria_pribadi = $this->Rekap_model->getMaxPribadi();

            //hitung max kriteria prestasi
            $kriteria_prestasi = $this->Rekap_model->getMaxPretasi();

            //hitung min kriteria ekonomi
            $kriteria_ekonomi = $this->Rekap_model->getMinEkonomi();

            //RUMUS BENEFIT DAN COST SAW
            // for ($row = 0; $row <= count($this->nilai); $row++) {
            //     $penilaian[$row] = [];
            //     for ($col = 1; $col <= count($this->nilai); $col++) {
            if ($skor_ipk >= 0.2) {
                $this->penilaian[1] = $skor_ipk / $kriteriaipk['kriteria_ip'];
            }
            if ($skor_pribadi >= 0) {
                $this->penilaian[2] = $skor_pribadi / $kriteria_pribadi['kriteria_pribadi'];
            }
            if ($skor_prestasi >= 0.2) {
                $this->penilaian[3] = $skor_prestasi / $kriteria_prestasi['kriteria_prestasi'];
            }
            if ($skor_ekonomi >= 0.2) {
                $this->penilaian[4] = $kriteria_ekonomi['kriteria_ekonomi'] / $skor_ekonomi;
            }
            //}
            // echo "Nilai dari Kriteria";
            // echo json_encode($this->nilai[0][0]);
            // echo json_encode($this->penilaian);
            // //batas tiap mahasiswa
            // echo "<br>";
            // //}

            //Nilai Bobot Persentase Per Kriteria
            $w = [35, 25, 30, 10];

            //Rumus Normalisasi dikalikan dengan bobot
            $this->normalisasi[0] = $w[0] * $this->penilaian[1];
            $this->normalisasi[1] = $w[1] * $this->penilaian[2];
            $this->normalisasi[2] = $w[2] * $this->penilaian[3];
            $this->normalisasi[3] = $w[3] * $this->penilaian[4];

            // echo "Nilai Normalisasi";
            // echo json_encode($this->nilai[0][0]);
            // echo json_encode($this->normalisasi);
            // //batas tiap mahasiswa
            // echo "<br>";

            //hitung total nilai mahasiswa
            $this->total = $this->normalisasi[0] + $this->normalisasi[1] + $this->normalisasi[2] + $this->normalisasi[3];

            // echo "Nilai Skor Akhir";
            // echo "<br>";
            // echo json_encode($this->nilai[0][0]);
            // echo json_encode($this->total);
            // //batas tiap mahasiswa
            // echo "<br>";

            //buat if status nilai akhir
            if ($this->total >= 85) {
                $status = 'Sangat Layak';
            } else if ($this->total >= 75) {
                $status = 'Layak';
            } else {
                $status = 'Tidak Layak';
            }

            //ambil id usulan yang aktif, jika mau cek tahun usulan yang berbeda edit dulu status tahun usulan di menu tahun usulan
            $id_usulan_aktif = $this->Rekap_model->getIDUsulan()['id_usulan'];

            // //simpan ke tabel rekap
            $this->Rekap_model->addRekap($id_usulan_aktif, $nim, $skor_ipk, $skor_prestasi, $skor_ekonomi, $skor_pribadi, $this->total, $status);
        }
    }

    //function cek skor IPK
    public function getIPK($ipk)
    {
        if ($ipk >= 3.61) {
            return 1;
        } else if ($ipk >= 3.41) {
            return 0.8;
        } else if ($ipk >= 3.21) {
            return 0.6;
        } else if ($ipk >= 3.01) {
            return 0.4;
        } else {
            return 0.2;
        }
    }

    //function cek skor Pribadi
    public function getPribadi($pribadi)
    {
        if ($pribadi >= 29) {
            return 1;
        } else if ($pribadi >= 26) {
            return 0.8;
        } else if ($pribadi >= 21) {
            return 0.6;
        } else if ($pribadi >= 16) {
            return 0.4;
        } else if ($pribadi >= 10) {
            return 0.2;
        } else {
            return 0;
        }
    }

    //function cek skor Prestasi
    public function getPrestasi($prestasi)
    {
        if ($prestasi >= 21) {
            return 1;
        } else if ($prestasi >= 16) {
            return 0.8;
        } else if ($prestasi >= 11) {
            return 0.6;
        } else if ($prestasi >= 6) {
            return 0.4;
        } else {
            return 0.2;
        }
    }

    //function cek skor Ekonomi
    public function getEkonomi($ekonomi)
    {
        if ($ekonomi >= 3000001) {
            return 0.2;
        } else if ($ekonomi >= 2000001) {
            return 0.4;
        } else if ($ekonomi >= 1000001) {
            return 0.6;
        } else if ($ekonomi >= 500001) {
            return 0.8;
        } else {
            return 1;
        }
    }
}
