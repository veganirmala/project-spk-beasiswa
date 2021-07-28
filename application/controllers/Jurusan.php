<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Jurusan_model');
        $this->load->model('Fakultas_model');
    }

    //menampilkan seluruh data jurusan
    public function jurusan()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Jurusan";
            $data['user_email'] = $this->User_model->getEmail();

            $data['jurusan'] = $this->Jurusan_model->getJurusan();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('jurusan/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //tambahkan data jurusan
    public function jurusan_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
            $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|is_unique[tb_jurusan.nama_jurusan]');
            $this->form_validation->set_rules('ket_jurusan', 'Keterangan Jurusan', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Jurusan";
                $data['user_email'] = $this->User_model->getEmail();

                $data['fakultas'] = $this->Fakultas_model->getFakultas();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('jurusan/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Jurusan_model->addJurusan();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan Berhasil ditambahkan!</div>');
                redirect('jurusan/jurusan');
            }
        } else {
            redirect('auth');
        }
    }

    //edit data jurusan 
    public function jurusan_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
            $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');
            $this->form_validation->set_rules('ket_jurusan', 'Keterangan Jurusan', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Jurusan";
                $data['user_email'] = $this->User_model->getEmail();

                $data['jurusan'] = $this->Jurusan_model->getJurusanById($id);
                $data['fakultas'] = $this->Fakultas_model->getFakultas();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('jurusan/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Jurusan_model->updateJurusan();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan Berhasil diubah!</div>');
                redirect('jurusan/jurusan');
            }
        } else {
            redirect('auth');
        }
    }

    //hapus data jurusan
    public function jurusan_delete($id)
    {
        $this->Jurusan_model->deleteJurusan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan Berhasil dihapus!</div>');
        redirect('jurusan/jurusan');
    }

    //detail data jurusan
    public function jurusan_view($id)
    {
        $data['title'] = 'Detail Data Jurusan';
        $data['user_email'] = $this->User_model->getEmail();

        $data['jurusan'] = $this->Jurusan_model->getJurusanById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('jurusan/view', $data);
        $this->load->view('template/footer');
    }
}
