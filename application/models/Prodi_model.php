<?php

class Prodi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProdi()
    {
        $query = "SELECT * FROM tb_prodi
                INNER JOIN tb_jurusan ON
                tb_prodi.id_jurusan = tb_jurusan.id_jurusan
                ORDER BY id_prodi ASC";

        return $this->db->query($query)->result_array();
    }

    public function addProdi()
    {
        $data = [
            'id_jurusan' => $this->input->post('id_jurusan'),
            'nama_prodi' => $this->input->post('nama_prodi'),
            'jenjang' => $this->input->post('jenjang'),
            'ket_prodi' => $this->input->post('ket_prodi')
        ];

        $this->db->insert('tb_prodi', $data);
    }

    public function getProdiById($id)
    {
        $query = "SELECT * FROM tb_prodi
        INNER JOIN tb_jurusan
        ON tb_jurusan.id_jurusan = tb_prodi.id_jurusan
        WHERE id_prodi = $id";

        return $this->db->query($query)->row_array();
    }

    public function updateProdi()
    {
        $data = [
            'id_jurusan' => $this->input->post('id_jurusan'),
            'nama_prodi' => $this->input->post('nama_prodi'),
            'jenjang' => $this->input->post('jenjang'),
            'ket_prodi' => $this->input->post('ket_prodi')
        ];

        $this->db->where('id_prodi', $this->input->post('id_prodi'));
        $this->db->update('tb_prodi', $data);
    }


    public function deleteProdi($id)
    {
        $this->db->delete('tb_prodi', ['id_prodi' => $id]);
    }
}
