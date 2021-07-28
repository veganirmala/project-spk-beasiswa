<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepribadian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kepribadian_model');
        $this->load->model('Thusulan_model');
    }

    //tampil data kepribadian
    public function kepribadian()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Kepribadian";
            $data['user_email'] = $this->User_model->getEmail();

            $data['kepribadian'] = $this->Kepribadian_model->getKepribadian();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('kepribadian/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //menambahkan data kepribadian
    public function kepribadian_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('id_usulan', 'Tahun Usulan', 'required');
            $this->form_validation->set_rules('nilai_pribadi', 'Nilai Kepribadian', 'required');
            $this->form_validation->set_rules('ipk', 'IPK', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Kepribadian";
                $data['user_email'] = $this->User_model->getEmail();

                $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('kepribadian/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Kepribadian_model->addKepribadian();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kepribadian Berhasil ditambahkan!</div>');
                redirect('kepribadian/kepribadian');
            }
        } else {
            redirect('auth');
        }
    }

    //edit data kepribadian
    public function kepribadian_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('id_usulan', 'Tahun Usulan', 'required');
            $this->form_validation->set_rules('nilai_pribadi', 'Nilai Kepribadian', 'required');
            $this->form_validation->set_rules('ipk', 'IPK', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Kepribadian";
                $data['user_email'] = $this->User_model->getEmail();

                $data['kepribadian'] = $this->Kepribadian_model->getKepribadianById($id);
                $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('kepribadian/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Kepribadian_model->updateKepribadian();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kepribadian Berhasil diubah!</div>');
                redirect('kepribadian/kepribadian');
            }
        } else {
            redirect('auth');
        }
    }

    //hapus data kepribadian
    public function kepribadian_delete($id)
    {
        $this->Kepribadian_model->deleteKepribadian($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kepribadian Berhasil dihapus!</div>');
        redirect('kepribadian/kepribadian');
    }

    //detail data kepribadian
    public function kepribadian_view($id)
    {
        $data['title'] = 'Detail Data kepribadian';
        $data['user_email'] = $this->User_model->getEmail();

        $data['kepribadian'] = $this->Kepribadian_model->getKepribadianById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('kepribadian/view', $data);
        $this->load->view('template/footer');
    }
}
