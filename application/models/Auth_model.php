<?php
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        //mengambil nilai yang diinputkan di email dan password
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //cek jika user ada
        if ($user) {
            //jika user aktif 
            if ($user['is_active'] == 1) {
                //cek password untuk user
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This Email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        //ambil inputan di form registration
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
        //simpan ke tabel user dan user token
        $this->db->insert('user', $data);
        $this->db->insert('user_token', $user_token);

        //memanggil function sendEmail dengan parameternya
        $this->_sendEmail($token, 'verify');

        //$this->User_model->addUser();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulations! Your account has been created. Please activate your account!</div>');
        redirect('auth');
    }

    //function untuk send ke email
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

        //ketika tipe verify maka akan mengirimkan pesan berikut ini
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account :<br><a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        }
        //ketika tipe forgot password akan mengirimkan pesan berikut ini
        else if ($type == 'forgot') {
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

    public function forgotPassword()
    {

        $email = $this->input->post('email');
        $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'forgot');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Please check your email to reset your password!</div>');
            redirect('auth/forgotpassword');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered or activated!</div>');
            redirect('auth/forgotpassword');
        }
    }

    public function changePassword()
    {

        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $email = $this->session->userdata('reset_email');

        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->unset_userdata('reset_email');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed! Please login.</div>');
        redirect('auth');
    }
}
