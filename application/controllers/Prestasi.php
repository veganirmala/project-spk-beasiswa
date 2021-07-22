<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Prestasi_model');
        $this->load->model('Thusulan_model');
    }

    //tampil data prestasi
    public function prestasi()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Prestasi";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['prestasi'] = $this->Prestasi_model->getPrestasi();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('prestasi/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //menambahkan data prestasi
    public function prestasi_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('id_usulan', 'Tahun Usulan', 'required');
            $this->form_validation->set_rules('nilai_prestasi', 'Nilai Prestasi', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Prestasi";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('prestasi/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Prestasi_model->addPrestasi();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Berhasil ditambahkan!</div>');
                redirect('prestasi/prestasi');
            }
        } else {
            redirect('auth');
        }
    }

    //edit data prestasi
    public function prestasi_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('id_usulan', 'Tahun Usulan', 'required');
            $this->form_validation->set_rules('nilai_prestasi', 'Nilai Prestasi', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Prestasi";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                // $data['prestasi'] = $this->db->get_where('tb_prestasi', array('id_prestasi' => $id))->row_array();
                $data['prestasi'] = $this->Prestasi_model->getPrestasiById($id);
                $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('prestasi/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Prestasi_model->updatePrestasi();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Berhasil diubah!</div>');
                redirect('prestasi/prestasi');
            }
        } else {
            redirect('auth');
        }
    }

    public function prestasi_delete($id)
    {
        $this->Prestasi_model->deletePrestasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Berhasil dihapus!</div>');
        redirect('prestasi/prestasi');
    }

    public function prestasi_view($id)
    {
        $data['title'] = 'Detail Data Prestasi';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prestasi'] = $this->Prestasi_model->getPrestasiById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('prestasi/view', $data);
        $this->load->view('template/footer');
    }
}
