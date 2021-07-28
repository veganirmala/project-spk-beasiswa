<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Fakultas_model');
    }

    //menampilkan seluruh data fakultas
    public function fakultas()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Fakultas";
            $data['user_email'] = $this->User_model->getEmail();

            $data['fakultas'] = $this->Fakultas_model->getFakultas();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('fakultas/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //tambahkan data fakultas
    public function fakultas_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_fakultas', 'Nama fakultas', 'required|is_unique[tb_fakultas.nama_fakultas]');
            $this->form_validation->set_rules('ket_fakultas', 'Keterangan fakultas', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Fakultas";
                $data['user_email'] = $this->User_model->getEmail();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('fakultas/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Fakultas_model->addFakultas();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Fakultas Berhasil ditambahkan!</div>');
                redirect('fakultas/fakultas');
            }
        } else {
            redirect('auth');
        }
    }

    //edit data fakultas
    public function fakultas_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nama_fakultas', 'Nama fakultas', 'required');
            $this->form_validation->set_rules('ket_fakultas', 'Keterangan fakultas', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Fakultas";
                $data['user_email'] = $this->User_model->getEmail();

                $data['fakultas'] = $this->Fakultas_model->getFakultasById($id);

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('fakultas/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Fakultas_model->updateFakultas();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Fakultas Berhasil diubah!</div>');
                redirect('fakultas/fakultas');
            }
        } else {
            redirect('auth');
        }
    }

    //hapus data fakultas
    public function fakultas_delete($id)
    {
        $this->Fakultas_model->deleteFakultas($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Fakultas Berhasil dihapus!</div>');
        redirect('fakultas/fakultas');
    }

    //detail data fakultas
    public function fakultas_view($id)
    {
        $data['title'] = 'Detail Data Fakultas';
        $data['user_email'] = $this->User_model->getEmail();
        $data['fakultas'] = $this->Fakultas_model->getFakultasById($id);


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('fakultas/view', $data);
        $this->load->view('template/footer');
    }
}
