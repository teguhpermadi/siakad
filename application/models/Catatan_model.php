<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_catatan()
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.user_info()['id_kelas'];
        $this->db->select('catatan.id, catatan.keterangan, catatan.note, siswa.id as id_siswa, siswa.nama_lengkap as nama_siswa');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('catatan', 'rombel.id_siswa = catatan.id_siswa', 'left outer');
        $db = $this->db->get();

        return $db->result_array();
        // return $this->db->last_query();
    }
}