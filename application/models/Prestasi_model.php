<?php

class Prestasi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPrestasi()
    {
        $query = "SELECT * FROM tb_prestasi INNER JOIN tb_tahun_usulan
                ON tb_tahun_usulan.id_usulan = tb_prestasi.id_usulan
                INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_prestasi.nim
                ORDER BY id_prestasi ASC";
        return $this->db->query($query)->result_array();
    }

    public function getPrestasiById($id)
    {
        $query = "SELECT * FROM tb_prestasi 
                INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_prestasi.id_usulan
                INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_prestasi.nim
               WHERE id_prestasi = $id";
        return $this->db->query($query)->row_array();
    }


    public function addPrestasi()
    {
        $id = $this->input->post('id_usulan');
        $nim = $this->input->post('nim');
        $nilaiprestasi = $this->input->post('nilai_prestasi');
        $data = [
            'nim' => $nim,
            'id_usulan' => $id,
            'nilai_prestasi' => $nilaiprestasi
        ];
        $this->db->insert('tb_prestasi', $data);
    }

    public function updatePrestasi()
    {
        $id = $this->input->post('id_prestasi');
        $data = [

            'nilai_prestasi' => $this->input->post('nilai_prestasi')
        ];
        $this->db->where('id_prestasi', $id);
        $this->db->update('tb_prestasi', $data);
    }

    public function deletePrestasi($id)
    {
        $this->db->delete('tb_prestasi', ['id_prestasi' => $id]);
    }

    public function hitungPrestasi()
    {
        $query = $this->db->get('tb_prestasi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
