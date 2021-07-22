<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrestasiBidang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('PrestasiBidang_model');
    }

    //tampil data bidang
    public function bidang()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Prestasi Bidang";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['bidang'] = $this->PrestasiBidang_model->getPrestasiBidang();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('prestasibidang/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //tambah data bidang
    public function bidang_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');
            $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
            $this->form_validation->set_rules('juara', 'Juara', 'required');
            $this->form_validation->set_rules('skor', 'Skor', 'required');
            $this->form_validation->set_rules('status_bidang', 'Status Bidang', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Prestasi Bidang";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('prestasibidang/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->PrestasiBidang_model->addBidang();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Bidang Berhasil ditambahkan!</div>');
                redirect('prestasibidang/bidang');
            }
        } else {
            redirect('auth');
        }
    }

    //edit data bidang
    public function bidang_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');
            $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
            $this->form_validation->set_rules('juara', 'Juara', 'required');
            $this->form_validation->set_rules('skor', 'Skor', 'required');
            $this->form_validation->set_rules('status_bidang', 'Status Bidang', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Prestasi  Bidang";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                // $qr = "select tb_prestasi_bidang.* from tb_prestasi_bidang where tb_prestasi_bidang.id_bidang=" . $id;
                // $data['bidang'] = $this->db->query($qr)->row_array();

                $data['bidang'] = $this->PrestasiBidang_model->getPrestasiBidangById($id);


                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('prestasibidang/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->PrestasiBidang_model->updateBidang();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Bidang Berhasil diubah!</div>');
                redirect('prestasibidang/bidang');
            }
        } else {
            redirect('auth');
        }
    }

    public function bidang_delete($id)
    {
        $this->PrestasiBidang_model->deletePrestasiBidang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Bidang Berhasil dihapus!</div>');
        redirect('prestasibidang/bidang');
    }

    public function bidang_view($id)
    {
        $data['title'] = 'Detail Data Prestasi Bidang';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bidang'] = $this->PrestasiBidang_model->getPrestasiBidangById($id);


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('prestasibidang/view', $data);
        $this->load->view('template/footer');
    }
}
