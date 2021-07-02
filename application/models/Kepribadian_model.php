<?php

class Kepribadian_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKepribadian()
    {
        $query = "SELECT * FROM tb_kepribadian INNER JOIN tb_mahasiswa 
                ON tb_mahasiswa.nim = tb_kepribadian.nim
                INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_kepribadian.id_usulan
                ORDER BY id_kepribadian ASC";
        return $this->db->query($query)->result_array();
    }

    public function addKepribadian()
    {
        $id = $this->input->post('id_usulan');
        $nim = $this->input->post('nim');
        $nilai_pribadi = $this->input->post('nilai_pribadi');
        $ipk = $this->input->post('ipk');
        $data = [
            'id_usulan' => $id,
            'nim' => $nim,
            'nilai_pribadi' => $nilai_pribadi,
            'ipk' => $ipk
        ];
        $this->db->insert('tb_kepribadian', $data);
    }

    public function updateKepribadian()
    {
        $id = $this->input->post('id_kepribadian');
        $data = [
            'nilai_pribadi' => $this->input->post('nilai_pribadi'),
            'ipk' => $this->input->post('ipk')
        ];
        $this->db->where('id_kepribadian', $id);
        $this->db->update('tb_kepribadian', $data);
    }


    public function getKepribadianById($id)
    {
        $query = "SELECT * FROM tb_kepribadian 
                INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_kepribadian.nim
                INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_kepribadian.id_usulan
                WHERE id_kepribadian = $id";

        return $this->db->query($query)->row_array();
    }

    public function deleteKepribadian($id)
    {
        $this->db->delete('tb_kepribadian', ['id_kepribadian' => $id]);
    }

    public function hitungKepribadian()
    {
        $query = $this->db->get('tb_kepribadian');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
