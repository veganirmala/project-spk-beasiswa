<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AksesUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //menampilkan seluruh data rekap
    public function index()
    {
        $data['title'] = "Rekap Data Beasiswa";
        // $qr = "SELECT * FROM tb_rekap
        //      INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_rekap.nim
        //      INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_rekap.id_usulan
        //      ORDER BY tb_rekap.nim ASC";

        // $data['rekap'] = $this->db->query($qr)->result_array();
        //$this->load->view('aksesuser/index.php', $data);
        $this->load->view('aksesuser/index-baru.php', $data);
    }

    //mencari data mahasiswa
    public function cari_mhs()
    {
        $data['title'] = "Rekap Data Beasiswa";
        $strcari = $this->input->post('mhs');
        //menampilkan data rekap berdasarkan nama yang diinput
        // $qr = "SELECT * FROM tb_rekap
        //        INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_rekap.nim
        //        INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_rekap.id_usulan
        //        WHERE tb_mahasiswa.nama_mhs like '%" . $strcari . "%'";

        // $data['rekap'] = $this->db->query($qr)->result_array();

        //$this->load->view('aksesuser/cari_mahasiswa', $data);
        $this->load->view('aksesuser/cari_data', $data);
    }
}
