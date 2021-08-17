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

    //menampilkan form login
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
            //memanggil fuction _login
            $this->_login();
        }
    }

    //memanggil function login dari auth model
    public function _login()
    {
        $this->Auth_model->login();
    }

    //digunakan edit profile user
    public function edit_profile($id)
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nama', 'Nama pengguna', 'required');
        $this->form_validation->set_rules('jk_user', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Profile";
            $data['user_email'] = $this->User_model->getEmail();

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

    //digunakan untuk logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logged out!</div>');
        redirect('auth');
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
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'This email has already registered!'
            ]
        );
        $this->form_validation->set_rules('nama', 'Nama pengguna', 'required|trim');
        $this->form_validation->set_rules('jk_user', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password to short!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun';

            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('auth/auth_footer');
        } else {
            $this->Auth_model->registrasion();
        }
    }

    public function verify()
    {
        $this->Auth_model->verify();
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('auth/auth_footer');
        } else {
            $this->Auth_model->forgotPassword();
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password failed! Wrong token</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password failed! Wrong email</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('auth/auth_footer');
        } else {
            $this->Auth_model->changePassword();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}
