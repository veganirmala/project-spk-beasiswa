<?php

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser()
    {
        $query = "SELECT * FROM tb_user
        ORDER BY id_user ASC";
        return $this->db->query($query)->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    public function addUser()
    {
        $email = $this->input->post('email', true);
        $nama = $this->input->post('nama', true);
        $jk_user = $this->input->post('jk_user', true);
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $tipe = $this->input->post('tipe', true);
        $status = $this->input->post('status', true);
        $data = [
            'email' => $email,
            'nama' => $nama,
            'jk_user' => $jk_user,
            'password' => $password,
            'tipe' => $tipe,
            'status' => $status
        ];
        $this->db->insert('tb_user', $data);
    }

    public function updateUser()
    {
        $email = $this->input->post('email', true);
        $nama = $this->input->post('nama', true);
        $jk_user = $this->input->post('jk_user', true);
        $password = $this->input->post('password');
        $tipe = $this->input->post('tipe', true);
        $status = $this->input->post('status', true);

        if ($password == '') {
            $data = [
                'email' => $email,
                'nama' => $nama,
                'jk_user' => $jk_user,
                'tipe' => $tipe,
                'status' => $status
            ];
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'email' => $email,
                'nama' => $nama,
                'jk_user' => $jk_user,
                'password' => $password,
                'tipe' => $tipe,
                'status' => $status
            ];
        }
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tb_user', $data);
    }

    public function deleteUser($id)
    {
        $this->db->delete('tb_user', ['id_user' => $id]);
    }
}
