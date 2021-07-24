<?php

class Fakultas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getFakultas()
    {
        $query = "SELECT * FROM tb_fakultas
                ORDER BY id_fakultas ASC";

        return $this->db->query($query)->result_array();
    }

    public function getFakultasById($id)
    {
        return $this->db->get_where('tb_fakultas', ['id_fakultas' => $id])->row_array();
    }

    public function addFakultas()
    {
        $nama_fakultas = $this->input->post('nama_fakultas');
        $ket_fakultas = $this->input->post('ket_fakultas');
        $data = [
            'nama_fakultas' => $nama_fakultas,
            'ket_fakultas' => $ket_fakultas
        ];
        $this->db->insert('tb_fakultas', $data);
    }

    public function updateFakultas()
    {
        $id_fakultas = $this->input->post('id_fakultas');
        $nama_fakultas = $this->input->post('nama_fakultas');
        $ket_fakultas = $this->input->post('ket_fakultas');
        $data = [
            'nama_fakultas' => $nama_fakultas,
            'ket_fakultas' => $ket_fakultas
        ];
        $this->db->where('id_fakultas', $id_fakultas);
        $this->db->update('tb_fakultas', $data);
    }

    public function deleteFakultas($id)
    {
        $this->db->delete('tb_fakultas', ['id_fakultas' => $id]);
    }
}
