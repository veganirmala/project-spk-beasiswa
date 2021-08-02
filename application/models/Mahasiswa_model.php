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
        INNER JOIN tb_prodi ON tb_prodi.id_prodi = tb_mahasiswa.id_prodi
        INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_mahasiswa.id_usulan
        WHERE nim = $id";

        return $this->db->query($query)->row_array();
    }

    public function addMahasiswa()
    {
        $nim = $this->input->post('nim', true);
        $nama_mhs = $this->input->post('nama_mhs', true);
        $jk_mhs = $this->input->post('jk_mhs', true);
        $no_hp_mhs = $this->input->post('no_hp_mhs', true);
        $alamat_mhs = $this->input->post('alamat_mhs', true);
        $id_prodi = $this->input->post('id_prodi', true);
        $ortu_nama = $this->input->post('ortu_nama', true);
        $ortu_pekerjaan = $this->input->post('ortu_pekerjaan', true);
        $ortu_penghasilan = $this->input->post('ortu_penghasilan');
        $penghasilan = str_replace("Rp", "", $ortu_penghasilan);
        $ortu_tanggungan = $this->input->post('ortu_tanggungan', true);
        $ortu_nohp = $this->input->post('ortu_nohp', true);
        $bank_nama = $this->input->post('bank_nama', true);
        $bank_norek = $this->input->post('bank_norek', true);
        $smt = $this->input->post('smt', true);
        $id_usulan = $this->input->post('id_usulan', true);
        $data = [
            'nim' => $nim,
            'nama_mhs' => $nama_mhs,
            'jk_mhs' => $jk_mhs,
            'no_hp_mhs' => $no_hp_mhs,
            'alamat_mhs' => $alamat_mhs,
            'id_prodi' => $id_prodi,
            'ortu_nama' => $ortu_nama,
            'ortu_pekerjaan' => $ortu_pekerjaan,
            'ortu_penghasilan' => str_replace(".", "", $penghasilan),
            'ortu_tanggungan' => $ortu_tanggungan,
            'ortu_nohp' => $ortu_nohp,
            'bank_nama' => $bank_nama,
            'bank_norek' => $bank_norek,
            'smt' => $smt,
            'id_usulan' => $id_usulan
        ];
        $this->db->insert('tb_mahasiswa', $data);
    }

    public function updateMahasiswa()
    {
        $nim = $this->input->post('nim');
        $nama_mhs = $this->input->post('nama_mhs', true);
        $jk_mhs = $this->input->post('jk_mhs', true);
        $no_hp_mhs = $this->input->post('no_hp_mhs', true);
        $alamat_mhs = $this->input->post('alamat_mhs', true);
        $id_prodi = $this->input->post('id_prodi', true);
        $ortu_nama = $this->input->post('ortu_nama', true);
        $ortu_pekerjaan = $this->input->post('ortu_pekerjaan', true);
        $ortu_penghasilan = $this->input->post('ortu_penghasilan');
        $penghasilan = str_replace("Rp", "", $ortu_penghasilan);
        $ortu_tanggungan = $this->input->post('ortu_tanggungan', true);
        $ortu_nohp = $this->input->post('ortu_nohp', true);
        $bank_nama = $this->input->post('bank_nama', true);
        $bank_norek = $this->input->post('bank_norek', true);
        $smt = $this->input->post('smt', true);
        $id_usulan = $this->input->post('id_usulan', true);
        $data = [
            'nama_mhs' => $nama_mhs,
            'jk_mhs' => $jk_mhs,
            'no_hp_mhs' => $no_hp_mhs,
            'alamat_mhs' => $alamat_mhs,
            'id_prodi' => $id_prodi,
            'ortu_nama' => $ortu_nama,
            'ortu_pekerjaan' => $ortu_pekerjaan,
            'ortu_penghasilan' => str_replace(".", "", $penghasilan),
            'ortu_tanggungan' => $ortu_tanggungan,
            'ortu_nohp' => $ortu_nohp,
            'bank_nama' => $bank_nama,
            'bank_norek' => $bank_norek,
            'smt' => $smt,
            'id_usulan' => $id_usulan
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
