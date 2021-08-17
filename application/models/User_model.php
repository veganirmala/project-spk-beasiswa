<?php

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getEmail()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getUser()
    {
        $query = "SELECT * FROM user
        ORDER BY id_user ASC";
        return $this->db->query($query)->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function addUser()
    {
        $email = $this->input->post('email', true);
        $nama = $this->input->post('nama', true);
        $jk_user = $this->input->post('jk_user', true);
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $tipe = $this->input->post('tipe', true);
        $data = [
            'email' => $email,
            'nama' => $nama,
            'jk_user' => $jk_user,
            'password' => $password,
            'tipe' => $tipe
        ];
        $this->db->insert('user', $data);
    }

    public function updateUser()
    {
        $email = $this->input->post('email', true);
        $nama = $this->input->post('nama', true);
        $jk_user = $this->input->post('jk_user', true);
        $password = $this->input->post('password');
        $tipe = $this->input->post('tipe', true);

        if ($password == '') {
            $data = [
                'email' => $email,
                'nama' => $nama,
                'jk_user' => $jk_user,
                'tipe' => $tipe
            ];
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'email' => $email,
                'nama' => $nama,
                'jk_user' => $jk_user,
                'password' => $password,
                'tipe' => $tipe
            ];
        }
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function deleteUser($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }

    public function registrasi()
    {
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
}
