<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekap_model');
    }

    //menampilkan seluruh data rekap
    public function rekap()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Rekomendasi Hasil Seleksi Beasiswa";
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

    //sinkronisasi data rekapan
    public function rekap_sinkron()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Rekap Rekomendasi Hasil Seleksi Beasiswa";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            // $datamahasiswa = $this->Rekap_model->getDataMhs();

            $qr = "SELECT tb_mahasiswa.nim, ipk, nilai_pribadi, nilai_prestasi, ortu_penghasilan 
            FROM tb_mahasiswa,tb_prodi,tb_kepribadian, tb_prestasi 
            WHERE tb_mahasiswa.id_prodi=tb_prodi.id_prodi AND tb_kepribadian.nim=tb_mahasiswa.nim 
            AND tb_prestasi.nim=tb_kepribadian.nim";
            $datamahasiswa = $this->db->query($qr)->result_array();

            // var_dump($datamahasiswa);

            if ($datamahasiswa <> null) {
                foreach ($datamahasiswa as $datamhs) {

                    //ngambil data nilai mhs
                    $ipk = $datamhs['ipk'];
                    $pribadi = $datamhs['nilai_pribadi'];
                    $prestasi = $datamhs['nilai_prestasi'];
                    $ekonomi = $datamhs['ortu_penghasilan'];

                    //kriteria ipk
                    if ($ipk >= 3.61) {
                        $skor_ip = 1;
                    } else if ($ipk >= 3.41) {
                        $skor_ip = 0.8;
                    } else if ($ipk >= 3.21) {
                        $skor_ip = 0.6;
                    } else if ($ipk >= 3.01) {
                        $skor_ip = 0.4;
                    } else {
                        $skor_ip = 0.2;
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

                    $dataalternatif[] = array($skor_ip, $skor_pribadi, $skor_prestasi, $skor_ekonomi);

                    //var_dump($dataalternatif);
                    echo '<pre>';
                    print_r($dataalternatif);
                    echo '</pre>';

                    //buat rumus benefit dan cost

                    //index alternatif dimulai dari nol karena skor_ip urutan pertama
                    $index_alternatif = 0;
                    foreach ($dataalternatif as $alt) {
                        //index kriteria dimulai dari satu karena baris satu
                        $index_kriteria = 0;
                        //cek benefit atau cost
                        if ($alt == $skor_ip || $alt == $skor_pribadi || $alt == $skor_prestasi) {
                            $r[$index_alternatif][$index_kriteria] = $alt[$index_alternatif][$index_kriteria] / max(array_column($alt, $index_kriteria));
                        } elseif ($alt == $skor_ekonomi) {
                            $r[$index_alternatif][$index_kriteria] = min(array_column($alt, $index_kriteria)) / $alt[$index_alternatif][$index_kriteria];
                        }
                        $index_kriteria++;
                        $index_alternatif++;

                        echo '<pre>';
                        print_r($r);
                        echo '</pre>';
                    }

                    //nilai bobot pertabel
                    $w = array(0.35, 0.25, 0.30, 0.10);

                    //buat normalisasi matriks

                    //buat if status nilai akhir
                }
            }
        }
    }
}
