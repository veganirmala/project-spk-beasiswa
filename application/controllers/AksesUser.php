<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AksesUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //menampilkan seluruh data rekapa yang berstatus usulan aktif
    public function index()
    {
        $data['title'] = "Rekap Data Beasiswa";
        // $qr = "select * from tb_rekap,tb_mahasiswa,tb_jurusan,tb_prodi,tb_kepribadian, tb_thusulan
        // where tb_jurusan.id_jurusan=tb_prodi.id_jurusan and tb_rekap.nim=tb_mahasiswa.nim and 
        // tb_mahasiswa.id_prodi=tb_prodi.id_prodi and tb_kepribadian.nim=tb_rekap.nim and 
        // tb_rekap.id_usulan=tb_thusulan.id_usulan and tb_kepribadian.id_usulan=tb_rekap.id_usulan and 
        // tb_thusulan.status_usulan='Aktif'";

        // // $qr = "SELECT * FROM tb_rekap
        // //     INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_rekap.nim
        // //     INNER JOIN tb_thusulan ON tb_thusulan.id_usulan = tb_rekap.id_usulan
        // //     INNER JOIN tb_jenis_beasiswa ON tb_jenis_beasiswa.id_beasiswa = tb_rekap.id_beasiswa
        // //     INNER JOIN tb_jurusan ON tb_jurusan.id_jurusan=tb_prodi.id_jurusan
        // //     WHERE tb_thusulan.status_usulan='Aktif'";

        // $data['rekap'] = $this->db->query($qr)->result_array();

        // //menampilkan data pada tabel thusulan dikelompokkan berdasarkan tahun
        // $data['th_aktif'] = $this->db->query("select * from tb_thusulan group by tahun")->result_array();

        // //menampilkan data dari tabel rekap
        // $data['ket'] = $this->db->get('tb_rekap')->result_array();
        $this->load->view('aksesuser/index.php', $data);
    }

    //menampilkan data rekapan beasiswa berdasarkan status aktif tidak ada inner join dengan tabel jurusan
    public function rekap()
    {
        $data['title'] = "Rekap Data Beasiswa";
        // $qr = "select * from tb_rekap,tb_mahasiswa,tb_prodi,tb_kepribadian, tb_thusulan 
        // where tb_rekap.nim=tb_mahasiswa.nim and tb_mahasiswa.id_prodi=tb_prodi.id_prodi and 
        // tb_kepribadian.nim=tb_rekap.nim and tb_rekap.id_usulan=tb_thusulan.id_usulan and 
        // tb_kepribadian.id_usulan=tb_rekap.id_usulan and tb_thusulan.status_usulan='Aktif'";

        // $data['rekap'] = $this->db->query($qr)->result_array();

        // //menampilkan data yang berstatus aktif pada tabel thusulan
        // $data['th_aktif'] = $this->db->get_where('tb_thusulan', ['status_usulan' => "Aktif"])->row_array();
    }

    //mencari data mahasiswa
    public function cari_mhs()
    {
        $data['title'] = "Rekap Data Beasiswa";
        // $strcari = $this->input->post('mhs');
        // //menampilkan data rekap berdasarkan nama yang diinput
        // $qr = "select * from tb_rekap,tb_mahasiswa,tb_jurusan,tb_prodi,tb_kepribadian,tb_thusulan 
        // where tb_jurusan.id_jurusan=tb_prodi.id_jurusan and tb_rekap.nim=tb_mahasiswa.nim and 
        // tb_mahasiswa.id_prodi=tb_prodi.id_prodi and tb_kepribadian.nim=tb_rekap.nim and 
        // tb_rekap.id_usulan=tb_thusulan.id_usulan and tb_kepribadian.id_usulan=tb_rekap.id_usulan and 
        // tb_mahasiswa.nama like '%" . $strcari . "%'";
        // //query like digunakan untuk menyesuaikan data yang di input

        // $data['rekap'] = $this->db->query($qr)->result_array();

        // //menampilkan data dari tabel thusulan dan digabungkan berdasarkan tahun
        // $data['th_aktif'] = $this->db->query("select * from tb_thusulan group by tahun")->result_array();
        // //mengambil data dari tabel rekap
        // $data['ket'] = $this->db->get('tb_rekap')->result_array();

        //var_dump($data['rekap']);
        //die;
        $this->load->view('aksesuser/cari_mahasiswa', $data);
    }
}
