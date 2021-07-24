<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Prodi_model');
        $this->load->model('Jurusan_model');
    }

    //menampilkan data prodi
    public function prodi()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Prodi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['prodi'] = $this->Prodi_model->getProdi();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('prodi/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //tambahkan data prodi
    public function prodi_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('id_jurusan', 'Nama Jurusan', 'required');
            $this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required|is_unique[tb_prodi.nama_prodi]');
            $this->form_validation->set_rules('jenjang', 'Jenjang', 'required');
            $this->form_validation->set_rules('ket_prodi', 'Keterangan Prodi', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Prodi";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['jurusan'] = $this->Jurusan_model->getJurusan();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('prodi/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Prodi_model->addProdi();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prodi Berhasil ditambahkan!</div>');
                redirect('prodi/prodi');
            }
        } else {
            redirect('auth');
        }
    }

    //melakukan edit prodi
    public function prodi_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('id_jurusan', 'Nama Jurusan', 'required');
            $this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required');
            $this->form_validation->set_rules('jenjang', 'Jenjang', 'required');
            $this->form_validation->set_rules('ket_prodi', 'Keterangan Prodi', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Prodi";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['prodi'] = $this->Prodi_model->getProdiById($id);

                $data['jurusan'] = $this->Jurusan_model->getJurusan();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('prodi/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Prodi_model->updateProdi();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prodi Berhasil diubah!</div>');
                redirect('prodi/prodi');
            }
        } else {
            redirect('auth');
        }
    }

    //hapus data prodi
    public function prodi_delete($id)
    {
        $this->Prodi_model->deleteProdi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prodi Berhasil dihapus!</div>');
        redirect('prodi/prodi');
    }

    //detail data prodi
    public function prodi_view($id)
    {
        $data['title'] = 'Detail Data Prodi';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prodi'] = $this->Prodi_model->getProdiById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('prodi/view', $data);
        $this->load->view('template/footer');
    }
}
