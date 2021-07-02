<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepribadian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kepribadian_model');
        $this->load->model('Thusulan_model');
    }

    //tampil data kepribadian
    public function kepribadian()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Kepribadian";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

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
            $this->form_validation->set_rules('nim', 'NIm', 'required');
            $this->form_validation->set_rules('nilai_pribadi', 'Nilai Kepribadian', 'required');
            $this->form_validation->set_rules('ipk', 'IPK', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Kepribadian";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('kepribadian/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Kepribadian_model->addKepribadian();
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
            $this->form_validation->set_rules('nim', 'NIm', 'required');
            $this->form_validation->set_rules('nilai_pribadi', 'Nilai Kepribadian', 'required');
            $this->form_validation->set_rules('ipk', 'IPK', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Kepribadian";
                $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

                // $data['kepribadian'] = $this->db->get_where('tb_kepribadian', array('id_kepribadian' => $id))->row_array();
                $data['kepribadian'] = $this->Kepribadian_model->getKepribadianById($id);
                $data['thusulan'] = $this->Thusulan_model->getStatusTahunUsulanById();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('kepribadian/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Kepribadian_model->updateKepribadian();
                redirect('kepribadian/kepribadian');
            }
        } else {
            redirect('auth');
        }
    }

    public function kepribadian_delete($id)
    {
        $this->Kepribadian_model->deleteKepribadian($id);
        redirect('kepribadian/kepribadian');
    }

    public function kepribadian_view($id)
    {
        $data['title'] = 'Detail Data kepribadian';
        $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kepribadian'] = $this->Kepribadian_model->getKepribadianById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('kepribadian/view', $data);
        $this->load->view('template/footer');
    }
}
