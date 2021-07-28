<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Prodi_model');
    }

    //menampilkan data mahasiswa
    public function mahasiswa()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = "Data Mahasiswa";
            $data['user_email'] = $this->User_model->getEmail();

            $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    //tambahkan tambah data mahasiswa
    public function mahasiswa_tambah()
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|is_unique[tb_mahasiswa.nim]');
            $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
            $this->form_validation->set_rules('jk_mhs', 'Jenis Kelamin Mahasiswa', 'required');
            $this->form_validation->set_rules('no_hp_mhs', 'No HP Mahasiswa', 'required');
            $this->form_validation->set_rules('alamat_mhs', 'Alamat Mahasiswa', 'required');
            $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
            $this->form_validation->set_rules('ortu_nama', 'Nama Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_pekerjaan', 'Pekerjaan Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_penghasilan', 'Penghasilan Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_tanggungan', 'Tanggungan Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_nohp', 'No HP Orang Tua', 'required');
            $this->form_validation->set_rules('bank_nama', 'Nama BANK', 'required');
            $this->form_validation->set_rules('bank_norek', 'No Rekening BANK', 'required');
            $this->form_validation->set_rules('smt', 'Semester', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Tambah Data Mahasiswa";
                $data['user_email'] = $this->User_model->getEmail();

                $data['prodi'] = $this->Prodi_model->getProdi();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('mahasiswa/add', $data);
                $this->load->view('template/footer');
            } else {
                $this->Mahasiswa_model->addMahasiswa();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil ditambahkan!</div>');
                redirect('mahasiswa/mahasiswa');
            }
        } else {
            redirect('auth');
        }
    }

    //edit mahasiswa
    public function mahasiswa_edit($id)
    {
        if ($this->session->userdata('email')) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
            $this->form_validation->set_rules('jk_mhs', 'Jenis Kelamin Mahasiswa', 'required');
            $this->form_validation->set_rules('no_hp_mhs', 'No HP Mahasiswa', 'required');
            $this->form_validation->set_rules('alamat_mhs', 'Alamat Mahasiswa', 'required');
            $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
            $this->form_validation->set_rules('ortu_nama', 'Nama Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_pekerjaan', 'Pekerjaan Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_penghasilan', 'Penghasilan Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_tanggungan', 'Tanggungan Orang Tua', 'required');
            $this->form_validation->set_rules('ortu_nohp', 'No HP Orang Tua', 'required');
            $this->form_validation->set_rules('bank_nama', 'Nama BANK', 'required');
            $this->form_validation->set_rules('bank_norek', 'No Rekening BANK', 'required');
            $this->form_validation->set_rules('smt', 'Semester', 'required');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Edit Data Mahasiswa";
                $data['user_email'] = $this->User_model->getEmail();

                $data['mhs'] = $this->Mahasiswa_model->getMahasiswaById($id);
                $data['prodi'] = $this->Prodi_model->getProdi();

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('mahasiswa/update', $data);
                $this->load->view('template/footer');
            } else {
                $this->Mahasiswa_model->updateMahasiswa();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil diubah!</div>');
                redirect('mahasiswa/mahasiswa');
            }
        } else {
            redirect('auth');
        }
    }

    //hapus data mahasiswa
    public function mahasiswa_delete($id)
    {
        $this->Mahasiswa_model->deleteMahasiswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil dihapus!</div>');
        redirect('mahasiswa/mahasiswa');
    }

    //detail data mahasiswa
    public function mahasiswa_view($id)
    {
        $data['title'] = 'Detail Data Mahasiswa';
        $data['user_email'] = $this->User_model->getEmail();

        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('mahasiswa/view', $data);
        $this->load->view('template/footer');
    }
}
