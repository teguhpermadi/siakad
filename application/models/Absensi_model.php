<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_absensi()
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.user_info()['id_kelas'];
        $this->db->select('absensi.id, absensi.sakit, absensi.izin, absensi.alpa, siswa.id as id_siswa, siswa.nama_lengkap as nama_siswa, (sakit + izin + alpa) as jumlah');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('absensi', 'rombel.id_siswa = absensi.id_siswa', 'left outer');
        $db = $this->db->get();

        return $db->result_array();
        // return $this->db->last_query();
    }

    function get_kelas()
    {
        $id_kelas = user_info()['id_kelas'];
        return $this->db->get_where('kelas', 'id ='.$id_kelas)->row_array();
    }
}