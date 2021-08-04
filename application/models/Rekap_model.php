<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getRekap()
    {
        $qr = "SELECT * FROM tb_rekap 
                INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_rekap.nim
                INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_rekap.id_usulan
                WHERE tb_tahun_usulan.status_usulan = 'Aktif'
                ORDER BY tb_rekap.skor_total DESC";

        return $this->db->query($qr)->result_array();
    }

    public function getDataMhs()
    {
        $qr = "SELECT tb_mahasiswa.nim, tb_kepribadian.ipk, tb_kepribadian.nilai_pribadi, 
        tb_prestasi.nilai_prestasi, tb_mahasiswa.ortu_penghasilan FROM tb_mahasiswa
        INNER JOIN tb_prestasi ON tb_mahasiswa.nim = tb_prestasi.nim
        INNER JOIN tb_kepribadian ON tb_mahasiswa.nim = tb_kepribadian.nim
        INNER JOIN tb_prodi ON tb_mahasiswa.id_prodi = tb_prodi.id_prodi
        INNER JOIN tb_tahun_usulan ON tb_mahasiswa.id_usulan = tb_tahun_usulan.id_usulan
        WHERE tb_tahun_usulan.status_usulan = 'Aktif'
        ORDER BY tb_mahasiswa.nim ASC";

        return $this->db->query($qr)->result_array();
    }

    public function getDataTahunUsulan()
    {
        $qr = "SELECT * FROM tb_tahun_usulan 
        GROUP BY tahun";

        return $this->db->query($qr)->result_array();
    }

    public function addRekap($id_usulan_aktif, $nim, $skor_ipk, $skor_prestasi, $skor_ekonomi, $skor_pribadi, $total, $status)
    {
        $datarekap = [
            'id_usulan' => $id_usulan_aktif,
            'nim' => $nim,
            'skor_ip' => $skor_ipk,
            'skor_prestasi' => $skor_prestasi,
            'skor_ekonomi' => $skor_ekonomi,
            'skor_pribadi' => $skor_pribadi,
            'skor_total' => $total,
            'status' => $status
        ];
        $this->db->insert('tb_rekap', $datarekap);
    }

    public function getDataRekap()
    {
        $strcari = $this->input->post('th');
        $qr = "SELECT * FROM tb_rekap 
            INNER JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_rekap.nim
            INNER JOIN tb_tahun_usulan ON tb_tahun_usulan.id_usulan = tb_rekap.id_usulan
            WHERE tb_tahun_usulan.tahun = $strcari 
            ORDER BY tb_rekap.skor_total DESC";

        return $this->db->query($qr)->result_array();
    }

    public function hitungRekap()
    {
        $query = $this->db->get('tb_rekap');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getMaxIPK()
    {
        $this->db->select_max('kriteria_ip');
        $this->db->from('kriteria');
        return $this->db->get()->row_array();
    }

    public function getMaxPretasi()
    {
        $this->db->select_max('kriteria_prestasi');
        $this->db->from('kriteria');
        return $this->db->get()->row_array();
    }

    public function getMaxPribadi()
    {
        $this->db->select_max('kriteria_pribadi');
        $this->db->from('kriteria');
        return $this->db->get()->row_array();
    }

    public function getMinEkonomi()
    {
        $this->db->select_min('kriteria_ekonomi');
        $this->db->from('kriteria');
        return $this->db->get()->row_array();
    }

    public function getIDUsulan()
    {
        $qr = "SELECT id_usulan
            FROM tb_tahun_usulan
            WHERE status_usulan = 'Aktif'";
        return $this->db->query($qr)->row_array();
    }
}
