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
                ORDER BY id_rekap ASC";

        return $this->db->query($qr)->result_array();
    }

    public function getDataMhs()
    {
        $qr = "SELECT * FROM tb_mahasiswa
        INNER JOIN tb_prestasi ON tb_mahasiswaa.nim = tb_prestasi.nim
        INNER JOIN tb_kepribadian ON tb_kepribadian.nim = tb_kepribadian.nim
        ORDER BY nim ASC";

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
}
