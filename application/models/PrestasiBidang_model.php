<?php

class PrestasiBidang_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPrestasiBidang()
    {
        // $this->db->select('*');
        // $this->db->from('tb_prestasi_bidang');

        // return $this->db->get()->result_array();

        $query = "SELECT * FROM tb_prestasi_bidang
        ORDER BY id_bidang ASC";
        return $this->db->query($query)->result_array();
    }

    public function getPrestasiBidangById($id)
    {
        return $this->db->get_where('tb_prestasi_bidang', ['id_bidang' => $id])->row_array();
    }

    public function addBidang()
    {
        $data = [
            'nama_bidang' => $this->input->post('nama_bidang'),
            'tingkat' => $this->input->post('tingkat'),
            'juara' => $this->input->post('juara'),
            'skor' => $this->input->post('skor'),
            'status_bidang' => $this->input->post('status_bidang')
        ];
        $this->db->insert('tb_prestasi_bidang', $data);
    }

    public function updateBidang()
    {
        $data = [
            'nama_bidang' => $this->input->post('nama_bidang'),
            'tingkat' => $this->input->post('tingkat'),
            'juara' => $this->input->post('juara'),
            'skor' => $this->input->post('skor'),
            'status_bidang' => $this->input->post('status_bidang')
        ];
        $this->db->where('id_bidang', $this->input->post('id_bidang'));
        $this->db->update('tb_prestasi_bidang', $data);
    }

    public function deletePrestasiBidang($id)
    {
        $this->db->delete('tb_prestasi_bidang', ['id_bidang' => $id]);
    }
}
