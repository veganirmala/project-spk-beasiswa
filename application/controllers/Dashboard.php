<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        is_logged_in();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Prestasi_model');
        $this->load->model('Kepribadian_model');
        $this->load->model('Rekap_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        //ngambil data petugas yang login
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['total_mahasiswa'] = $this->Mahasiswa_model->hitungMahasiswa();
        $data['total_prestasi'] = $this->Prestasi_model->hitungPrestasi();
        $data['total_kepribadian'] = $this->Kepribadian_model->hitungKepribadian();
        $data['total_rekap'] = $this->Rekap_model->hitungRekap();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('dashboard');
        //$this->load->view('template/footer');
    }
}
