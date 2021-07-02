<?php

class Thusulan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsulan()
    {
        $query = "SELECT * FROM tb_tahun_usulan
                ORDER BY id_usulan ASC";

        return $this->db->query($query)->result_array();
    }

    public function getUsulanById($id)
    {
        $query = "SELECT * FROM tb_tahun_usulan
               WHERE id_usulan = $id";

        return $this->db->query($query)->row_array();
    }

    public function getStatusTahunUsulanById()
    {
        $this->db->select('*');
        $this->db->from('tb_tahun_usulan');
        $this->db->where('status_usulan =', 'Aktif');
        return $this->db->get()->result_array();
    }

    public function addUsulan()
    {
        $data = [
            'kuota' => $this->input->post('kuota'),
            'tahun' => $this->input->post('tahun'),
            'status_usulan' => $this->input->post('status_usulan')
        ];
        $this->db->insert('tb_tahun_usulan', $data);
    }

    public function updateUsulan()
    {
        $data = [
            'kuota' => $this->input->post('kuota'),
            'tahun' => $this->input->post('tahun'),
            'status_usulan' => $this->input->post('status_usulan')
        ];
        $this->db->where('id_usulan', $this->input->post('id_usulan'));
        $this->db->update('tb_tahun_usulan', $data);
    }

    public function deleteUsulan($id)
    {
        $this->db->delete('tb_tahun_usulan', ['id_usulan' => $id]);
    }
}
