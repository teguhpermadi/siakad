<?php

class Leger_model extends CI_Model
{
    function get_absensi_catatan()
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.user_info()['id_kelas'];
        $this->db->select('absensi.id, absensi.sakit, absensi.izin, absensi.alpa, siswa.id as id_siswa, siswa.nama_lengkap as nama_siswa, (sakit + izin + alpa) as jumlah, catatan.keterangan, catatan.note');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('absensi', 'rombel.id_siswa = absensi.id_siswa', 'left outer');
        $this->db->join('catatan', 'catatan.id_siswa = rombel.id_siswa', 'left outer');
        $this->db->order_by('siswa.nama_lengkap');
        $this->db->group_by('siswa.nama_lengkap');
        $db = $this->db->get();

        return $db->result_array();
        // return $this->db->last_query();
    }

    function get_nilai_sikap()
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.user_info()['id_kelas'];
        // hitung nilai rata-rata sikapnya kemudian selalu bulatkan ke atas
        $this->db->select('siswa.*, nilai_sikap.*, CEILING(AVG(nilai)) rerata_up');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai_sikap', 'nilai_sikap.id_siswa = siswa.id');
        $this->db->group_by('nama_lengkap');
        $this->db->order_by('siswa.nama_lengkap');
        $db = $this->db->get();
        return $db->result_array();
        // return $this->db->last_query();

    }

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

    function get_nilai_mapel($id_mapel, $id_siswa)
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.user_info()['id_kelas'].' AND mapel.id = '.$id_mapel.' AND siswa.id = '.$id_siswa;
        // hitung nilai rata-rata sikapnya kemudian selalu bulatkan ke atas
        $this->db->select('CEILING(AVG(nilai)) rerata_up');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai', 'nilai.id_siswa = siswa.id');
        $this->db->join('mapel', 'nilai.id_mapel = mapel.id');
        // $this->db->join('kompetensi_dasar', 'nilai.id_kd = kompetensi_dasar.id');
        $this->db->group_by('nama_lengkap');
        // $this->db->group_by('mapel.nama');
        // $this->db->order_by('siswa.nama_lengkap');
        $db = $this->db->get();
        return $db->row_array();
        // return $this->db->last_query();
    }
}