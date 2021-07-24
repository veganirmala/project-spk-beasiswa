<?php

class PrestasiBidang_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPrestasiBidang()
    {
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
        $nama_bidang = $this->input->post('nama_bidang');
        $tingkat = $this->input->post('tingkat');
        $juara = $this->input->post('juara');
        $skor = $this->input->post('skor');
        $status_bidang = $this->input->post('status_bidang');
        $data = [
            'nama_bidang' => $nama_bidang,
            'tingkat' => $tingkat,
            'juara' => $juara,
            'skor' => $skor,
            'status_bidang' => $status_bidang
        ];
        $this->db->insert('tb_prestasi_bidang', $data);
    }

    public function updateBidang()
    {
        $id_bidang = $this->input->post('id_bidang');
        $nama_bidang = $this->input->post('nama_bidang');
        $tingkat = $this->input->post('tingkat');
        $juara = $this->input->post('juara');
        $skor = $this->input->post('skor');
        $status_bidang = $this->input->post('status_bidang');
        $data = [
            'nama_bidang' => $nama_bidang,
            'tingkat' => $tingkat,
            'juara' => $juara,
            'skor' => $skor,
            'status_bidang' => $status_bidang
        ];
        $this->db->where('id_bidang', $id_bidang);
        $this->db->update('tb_prestasi_bidang', $data);
    }

    public function deletePrestasiBidang($id)
    {
        $this->db->delete('tb_prestasi_bidang', ['id_bidang' => $id]);
    }
}
