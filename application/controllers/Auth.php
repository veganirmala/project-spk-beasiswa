<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //memanggil form validasi
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Dashboard');
        }
        //aturan validasi
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/auth_footer');
        } else {
            $this->_login();
        }
    }

    //memanggil function login dari auth model
    public function _login()
    {
        $this->Auth_model->login();
    }

    //digunakan registrasi oleh user
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('Dashboard');
        }
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[tb_user.email]',
            [
                'is_unique' => 'This email has already registered!'
            ]
        );
        $this->form_validation->set_rules('nama', 'Nama pengguna', 'required|trim');
        $this->form_validation->set_rules('jk_user', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password to short!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun';

            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('auth/auth_footer');
        } else {
            $this->User_model->addUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun untuk login berhasil ditambahkan!</div>');
            redirect('auth');
        }
    }

    //digunakan edit profile user
    public function edit_profile($id)
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nama', 'Nama pengguna', 'required');
        $this->form_validation->set_rules('jk_user', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Profile";
            $data['user_email'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $this->User_model->getUserById($id);

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('auth/edit_profile', $data);
            $this->load->view('template/footer');
        } else {
            $this->User_model->updateUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil diubah!</div>');
            redirect('dashboard');
        }
    }

    //untuk logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Logout!</div>');
        redirect('auth');
    }
}
