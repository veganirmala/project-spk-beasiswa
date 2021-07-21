<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    // private $nilai = [];
    // private $nim = 0;
    // private $ipk = 0;
    // private $pribadi = 0;
    // private $prestasi = 0;
    // private $ekonomi = 0;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Rekap_model');
    }

    //menampilkan seluruh data rekap
    public function rekap()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Hasil Seleksi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

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

    //melakukan cetak untuk laporan
    public function cetak_rekap()
    {
        $data['title'] = 'Data Rekap Hasil Seleksi';
        //ngambil data petugas yang login
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['rekap'] = $this->Rekap_model->getRekap();

        $this->load->view('template/header', $data);
        //$this->load->view('rekap/cetak_rekap', $data);
        $this->load->view('rekap/laporan', $data);
        $this->load->view('template/footer');
    }

    //sinkronisasi data rekapan
    public function rekap_sinkron2()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Hasil Seleksi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $datamahasiswa = $this->Rekap_model->getDataMhs();
            //var_dump($datamahasiswa);

            if ($datamahasiswa <> null) {
                foreach ($datamahasiswa as $datamhs) {
                    //ngambil data nilai mhs
                    $nim = $datamhs['nim'];
                    $ipk = $datamhs['ipk'];
                    $pribadi = $datamhs['nilai_pribadi'];
                    $prestasi = $datamhs['nilai_prestasi'];
                    $ekonomi = $datamhs['ortu_penghasilan'];

                    //kriteria ipk
                    // if ($ipk >= 3.61) {
                    //     $skor_ip = 1;
                    // } else if ($ipk >= 3.41) {
                    //     $skor_ip = 0.8;
                    // } else if ($ipk >= 3.21) {
                    //     $skor_ip = 0.6;
                    // } else if ($ipk >= 3.01) {
                    //     $skor_ip = 0.4;
                    // } else {
                    //     $skor_ip = 0.2;
                    // }


                    $skor_ip = $this->getIPK($ipk);
                    if ($skor_ip >= 0.2) {
                        $jenis = 'Benefit';
                    }


                    //kriteria nilai kepribadian
                    if ($pribadi >= 29) {
                        $skor_pribadi = 1;
                    } else if ($pribadi >= 26) {
                        $skor_pribadi = 0.8;
                    } else if ($pribadi >= 21) {
                        $skor_pribadi = 0.6;
                    } else if ($pribadi >= 16) {
                        $skor_pribadi = 0.4;
                    } else if ($pribadi >= 10) {
                        $skor_pribadi = 0.2;
                    } else {
                        $skor_pribadi = 0;
                    }

                    //kriteria nilai prestasi
                    if ($prestasi >= 21) {
                        $skor_prestasi = 1;
                    } else if ($prestasi >= 16) {
                        $skor_prestasi = 0.8;
                    } else if ($prestasi >= 11) {
                        $skor_prestasi = 0.6;
                    } else if ($prestasi >= 6) {
                        $skor_prestasi = 0.4;
                    } else {
                        $skor_prestasi = 0.2;
                    }

                    //kriteria penghasilan orang tua
                    if ($ekonomi >= 3000001) {
                        $skor_ekonomi = 0.2;
                    } else if ($ekonomi >= 2000001) {
                        $skor_ekonomi = 0.4;
                    } else if ($ekonomi >= 1000001) {
                        $skor_ekonomi = 0.6;
                    } else if ($ekonomi >= 500001) {
                        $skor_ekonomi = 0.8;
                    } else {
                        $skor_ekonomi = 1;
                    }

                    $dataalternatif[] = array($nim, $skor_ip, $skor_pribadi, $skor_prestasi, $skor_ekonomi);

                    //kosongkan tabel kriteria, jika ada penambahan data mahasiswa
                    $this->db->where('nim', $nim);
                    $this->db->delete('kriteria');

                    //simpan data mahasiswa ke dalam tabel kriteria
                    $dataalternatif = [
                        'nim' => $nim,
                        'kriteria_ip' => $skor_ip,
                        'kriteria_pribadi' => $skor_pribadi,
                        'kriteria_prestasi' => $skor_prestasi,
                        'kriteria_ekonomi' => $skor_ekonomi
                    ];
                    $this->db->insert('kriteria', $dataalternatif);

                    //var_dump($dataalternatif);
                    // echo '<pre>';
                    // print_r($dataalternatif);
                    // echo '</pre>';

                    //hitung max kriteria ipk
                    $kriteriaipk = $this->Rekap_model->getMaxIPK();

                    //hitung max kriteria pribadi
                    $kriteria_pribadi = $this->Rekap_model->getMaxPribadi();

                    //hitung max kriteria prestasi
                    $kriteria_prestasi = $this->Rekap_model->getMaxPretasi();

                    //hitung min kriteria ekonomi
                    $kriteria_ekonomi = $this->Rekap_model->getMinEkonomi();

                    //select dulu data dari tabel kriteria dan tabel mahasiswa
                    $qr = "SELECT kriteria.nim, kriteria.kriteria_ip, kriteria.kriteria_pribadi, kriteria.kriteria_prestasi,
                    kriteria.kriteria_ekonomi FROM kriteria INNER JOIN tb_mahasiswa ON kriteria.nim = tb_mahasiswa.nim";
                    $alternatif = $this->db->query($qr)->result_array();

                    // echo '<pre>';
                    // print_r($alternatif);
                    // echo '</pre>';

                    //buat dalam array 2 dimensi
                    $alternatif = array(
                        array(
                            'NIM' => $nim,
                            'Skor IPK' => $skor_ip,
                            'Skor Pribadi' => $skor_pribadi,
                            'Skor Prestasi' => $skor_prestasi,
                            'Skor Ekonomi' => $skor_ekonomi
                        )
                    );

                    //simpan semua data mahasiswa bentuk array
                    for ($i = 0; $i < count($alternatif); $i++) {
                        $this->nilai[$i] = [];
                        for ($j = 0; $j < 5; $j++) {
                            //buatin jenis kolom termasuk ke dalam benefit dan cost

                            $this->nilai[$i][0] = $nim;
                            $this->nilai[$i][1] = $skor_ip; //benefit
                            $this->nilai[$i][2] = $skor_pribadi; //benefit
                            $this->nilai[$i][3] = $skor_prestasi; //benefit
                            $this->nilai[$i][4] = $skor_ekonomi; //cost
                        }
                        //echo json_encode($nilai);
                    }

                    //coba cetak nilai mahasiswa dalam array
                    // echo json_encode($this->nilai[0][1]);
                    // echo '<br>';
                    // echo json_encode($this->nilai[0][2]);
                    // echo '<br>';
                    // echo json_encode($this->nilai[0][3]);
                    // echo '<br>';
                    // echo json_encode($this->nilai[0][4]);
                    // echo '<br>';

                    //RUMUS BENEFIT DAN COST SAW
                    // for ($row = 0; $row <= count($this->nilai); $row++) {
                    //     $penilaian[$row] = [];
                    //     for ($col = 1; $col <= count($this->nilai); $col++) {
                    //         //gimana caranya biar dia tau sama dengan kriterianya PR
                    //         //perhatikan variabel lokal dan global
                    //         if ($this->nilai[$row][1] == $skor_ip) {
                    //             // echo "$skor_ip";
                    //             $penilaian[$row][$col] = $this->nilai[$row][$col] / $kriteriaipk;
                    //         } else if ($this->nilai[$row][2] == $skor_pribadi) {
                    //             $penilaian[$row][$col] = $this->nilai[$row][$col] / $kriteria_pribadi;
                    //         } else if ($this->nilai[$row][3] == $skor_prestasi) {
                    //             $penilaian[$row][$col] = $this->nilai[$row][$col] / $kriteria_prestasi;
                    //         } else if ($this->nilai[$row][4] == $skor_ekonomi) {
                    //             $penilaian[$row][$col] = $kriteria_ekonomi / $this->nilai[$row][$col];
                    //         }
                    //     }
                    //     //echo json_encode($penilaian);
                    // }
                }
            }
        }
    }

    public function rekap_sinkron()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Hasil Seleksi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $datamahasiswa = $this->Rekap_model->getDataMhs();
            //var_dump($datamahasiswa);

            /* Metode SAW
                1. Ambil data mahasiswa dari db yang akan di sinkronisasi 
                2. Masukkan data mahasiswa ke dalam array dengan nama $datamhs
                3. Setelah itu
            */
            if ($datamahasiswa <> null) {
                // foreach ($datamahasiswa as $datamhs) {
                //     //ngambil data nilai mhs
                //     $this->nim = $datamhs['nim'];
                //     $this->ipk = $datamhs['ipk'];
                //     $this->pribadi = $datamhs['nilai_pribadi'];
                //     $this->prestasi = $datamhs['nilai_prestasi'];
                //     $this->ekonomi = $datamhs['ortu_penghasilan'];
                // }
                // echo json_encode($datamahasiswa[2]['nim']);

                echo json_encode($datamahasiswa[2]['nilai_pribadi']);
                for ($i = 0; $i < count($datamahasiswa); $i++) { //banyak mahasiswa
                    $datamhs[$i] = [];
                    for ($j = 0; $j < 5; $j++) { //banyak isi data tiap mahasiswa
                        if ($j = 0) {
                            $j = 'nim';
                        } elseif ($j = 1) {
                            $j = 'ipk';
                        } elseif ($j = 2) {
                            $j = 'nilai_pribadi';
                        } elseif ($j = 3) {
                            $j = 'nilai_prestasi';
                        } elseif ($j = 4) {
                            $j = 'ortu_penghasilan';
                        }
                        $datamhs[$i][$j] = $datamahasiswa[$i][$j];
                    }
                }
                echo json_encode($datamhs);
            }
        }
    }

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
}
