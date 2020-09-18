<?php

class Rapor_model extends CI_Model{
    function get_siswa()
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.user_info()['id_kelas'];
        // hitung nilai rata-rata sikapnya kemudian selalu bulatkan ke atas
        $this->db->select('siswa.id, siswa.nama_lengkap nama_siswa, siswa.nis');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->order_by('siswa.nama_lengkap');
        $db = $this->db->get();
        return $db->result_array();
    }
}