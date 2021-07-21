<?php

class Jurusan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getJurusan()
    {
        $query = "SELECT * FROM tb_fakultas
                INNER JOIN tb_jurusan ON
                tb_fakultas.id_fakultas = tb_jurusan.id_fakultas
                ORDER BY id_jurusan ASC";

        return $this->db->query($query)->result_array();
    }

    public function addJurusan()
    {
        $id_fakultas = $this->input->post('id_fakultas');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $ket_jurusan = $this->input->post('ket_jurusan');

        $data = [
            'id_fakultas' => $id_fakultas,
            'nama_jurusan' => $nama_jurusan,
            'ket_jurusan' => $ket_jurusan
        ];
        $this->db->insert('tb_jurusan', $data);
    }

    public function getJurusanById($id)
    {
        $query = "SELECT * FROM tb_jurusan
        INNER JOIN tb_fakultas
        ON tb_fakultas.id_fakultas = tb_jurusan.id_fakultas
        WHERE id_jurusan = $id";

        return $this->db->query($query)->row_array();
    }

    public function updateJurusan()
    {
        $id_jurusan = $this->input->post('id_jurusan');
        $id_fakultas = $this->input->post('id_fakultas');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $ket_jurusan = $this->input->post('ket_jurusan');

        $data = [
            'id_fakultas' => $id_fakultas,
            'nama_jurusan' => $nama_jurusan,
            'ket_jurusan' => $ket_jurusan
        ];
        $this->db->where('id_jurusan', $id_jurusan);
        $this->db->update('tb_jurusan', $data);
    }

    public function deleteJurusan($id)
    {
        $this->db->delete('tb_jurusan', ['id_jurusan' => $id]);
    }
}
