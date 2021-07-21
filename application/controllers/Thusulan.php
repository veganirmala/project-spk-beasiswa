<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thusulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Thusulan_model');
    }

    //data usulan
    public function usulan()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Tahun Usulan";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['usulan'] = $this->Thusulan_model->getUsulan();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('thusulan/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //tambah thusulan
    public function usulan_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('kuota', 'Kuota', 'required');
            $this->form_validation->set_rules('tahun', 'Tahun', 'required');
            $this->form_validation->set_rules('status_usulan', 'Status Usulan', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Tahun Usulan";

                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('thusulan/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Thusulan_model->addUsulan();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tahun Usulan Berhasil ditambahkan!</div>');
                redirect('thusulan/usulan');
            }
        } else {
            redirect('auth');
        }
    }

    //edit data usulan
    public function usulan_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('kuota', 'Kuota', 'required');
            $this->form_validation->set_rules('tahun', 'Tahun', 'required');
            $this->form_validation->set_rules('status_usulan', 'Status Usulan', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Tahun Usulan";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['usulan'] = $this->Thusulan_model->getUsulanById($id);

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('thusulan/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Thusulan_model->updateUsulan();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tahun Usulan Berhasil diubah!</div>');
                redirect('thusulan/usulan');
            }
        } else {
            redirect('auth');
        }
    }

    public function usulan_delete($id)
    {
        $this->Thusulan_model->deleteUsulan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tahun Usulan Berhasil dihapus!</div>');
        redirect('thusulan/usulan');
    }

    public function usulan_view($id)
    {
        $data['title'] = 'Detail Data Tahun Usulan';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['usulan'] = $this->Thusulan_model->getUsulanById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('thusulan/view', $data);
        $this->load->view('template/footer');
    }
}
