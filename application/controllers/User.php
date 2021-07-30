<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        #load library dan helper yang dibutuhkan
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    //menampilkan seluruh data dari tabel user
    public function user()
    {
        $data['title'] = "Data User";
        //ngambil data user saat login
        $data['user_email'] = $this->User_model->getEmail();

        $data['user'] = $this->User_model->getUser();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    //tambahkan data user
    public function user_tambah()
    {
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
            $data['title'] = "Tambah Data User";
            $data['user_email'] = $this->User_model->getEmail();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('user/add', $data);
            $this->load->view('template/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'email' => $email,
                'nama' => $this->input->post('nama', true),
                'jk_user' => $this->input->post('jk_user', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'tipe' => $this->input->post('tipe', true),
                'is_active' => 0,
                'date_created' => time()
            ];
            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            //$this->User_model->addUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil ditambahkan!</div>');
            redirect('user/user');
        }
    }
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'saget7471@gmail.com',
            'smtp_pass' => 'Fakeakungmail77',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('saget7471@gmail.com', 'Vega Nirmala');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account :<br><a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password :<br><a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed! Token invalid</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    //edit data user
    public function user_edit($id)
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nama', 'Nama pengguna', 'required');
        $this->form_validation->set_rules('jk_user', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Data User";
            $data['user_email'] = $this->User_model->getEmail();

            $data['user'] = $this->User_model->getUserById($id);

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/update', $data);
            $this->load->view('template/footer');
        } else {
            $this->User_model->updateUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil diubah!</div>');
            redirect('user/user');
        }
    }

    //hapus data user
    public function user_delete($id)
    {
        $this->User_model->deleteUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil dihapus!</div>');
        redirect('user/user');
    }

    //detail data user
    public function user_view($id)
    {
        $data['title'] = 'Detail Data User';
        $data['user_email'] = $this->User_model->getEmail();

        $data['user'] = $this->User_model->getUserById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('user/view', $data);
        $this->load->view('template/footer');
    }
}
