<?php

class Mahasiswa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getMahasiswa()
    {
        $query = "SELECT * FROM tb_mahasiswa INNER JOIN tb_prodi ON
                tb_prodi.id_prodi = tb_mahasiswa.id_prodi
                ORDER BY nim ASC";

        return $this->db->query($query)->result_array();
    }

    public function getMahasiswaById($id)
    {
        $query = "SELECT * FROM tb_mahasiswa
        INNER JOIN tb_prodi
        ON tb_prodi.id_prodi = tb_mahasiswa.id_prodi
        WHERE nim = $id";

        return $this->db->query($query)->row_array();
    }

    public function addMahasiswa()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama_mhs' => $this->input->post('nama_mhs'),
            'jk_mhs' => $this->input->post('jk_mhs'),
            'no_hp_mhs' => $this->input->post('no_hp_mhs'),
            'alamat_mhs' => $this->input->post('alamat_mhs'),
            'id_prodi' => $this->input->post('id_prodi'),
            'ortu_nama' => $this->input->post('ortu_nama'),
            'ortu_pekerjaan' => $this->input->post('ortu_pekerjaan'),
            'ortu_penghasilan' => $this->input->post('ortu_penghasilan'),
            'ortu_tanggungan' => $this->input->post('ortu_tanggungan'),
            'ortu_nohp' => $this->input->post('ortu_nohp'),
            'bank_nama' => $this->input->post('bank_nama'),
            'bank_norek' => $this->input->post('bank_norek'),
            'smt' => $this->input->post('smt')
        ];
        $this->db->insert('tb_mahasiswa', $data);
    }

    public function updateMahasiswa()
    {
        $nim = $this->input->post('nim');
        $data = [
            'nama_mhs' => $this->input->post('nama_mhs'),
            'jk_mhs' => $this->input->post('jk_mhs'),
            'no_hp_mhs' => $this->input->post('no_hp_mhs'),
            'alamat_mhs' => $this->input->post('alamat_mhs'),
            'id_prodi' => $this->input->post('id_prodi'),
            'ortu_nama' => $this->input->post('ortu_nama'),
            'ortu_pekerjaan' => $this->input->post('ortu_pekerjaan'),
            'ortu_penghasilan' => $this->input->post('ortu_penghasilan'),
            'ortu_tanggungan' => $this->input->post('ortu_tanggungan'),
            'ortu_nohp' => $this->input->post('ortu_nohp'),
            'bank_nama' => $this->input->post('bank_nama'),
            'bank_norek' => $this->input->post('bank_norek'),
            'smt' => $this->input->post('smt')
        ];
        $this->db->where('nim', $nim);
        $this->db->update('tb_mahasiswa', $data);
    }

    public function deleteMahasiswa($id)
    {
        $this->db->delete('tb_mahasiswa', ['nim' => $id]);
    }

    public function hitungMahasiswa()
    {
        $query = $this->db->get('tb_mahasiswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
