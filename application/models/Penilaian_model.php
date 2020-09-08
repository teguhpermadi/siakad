<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_mapel()
    {
        $id_guru = user_info()['id_guru'];
        $this->db->select('pengajar.*, mapel.id as id_mapel, mapel.nama as nama_mapel');
        $this->db->from('pengajar');
        $this->db->where('id_guru', $id_guru);
        $this->db->where('id_tahun', $_SESSION['id_tahun_pelajaran']);
        // $this->db->join('kelas', 'kelas.id = pengajar.id_kelas');
        $this->db->join('mapel', 'mapel.id = pengajar.id_mapel');
        $this->db->group_by('nama_mapel');
        return $this->db->get()->result_array();

    }

    function get_kelas($id_mapel)
    {
        $id_guru = user_info()['id_guru'];
        $this->db->select('pengajar.*, kelas.id as id_kelas, kelas.nama as nama_kelas, kelas.tingkat as tingkat_kelas');
        $this->db->from('pengajar');
        $this->db->where('id_guru', $id_guru);
        $this->db->where('id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('id_mapel', $id_mapel);
        $this->db->join('kelas', 'kelas.id = pengajar.id_kelas');
        $this->db->order_by('kelas.tingkat', 'asc');
        return $this->db->get()->result_array();
    }

    function get_kd($id_mapel, $tingkat, $jenis)
    {
        $id_guru = user_info()['id_guru'];

        $this->db->select('*');
        $this->db->from('kompetensi_dasar');
        $this->db->where('id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('id_mapel', $id_mapel);
        $this->db->where('tingkat', $tingkat);
        $this->db->where('id_guru', $id_guru);
        $this->db->where('jenis', $jenis);
        $db = $this->db->get();
        return $db->result_array();
    }

    // untuk load nilai siswa
    function get_siswa($id_mapel, $id_kelas, $id_kd)
    {
        // dapatkan siswa berdasarkan id mapel dan id kelas
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi pengajarnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.$id_kelas;
        $this->db->select('nilai.id, nilai.nilai, siswa.id as id_siswa, siswa.nama_lengkap as nama_siswa, siswa.nis');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai', 'rombel.id_siswa = nilai.id_siswa AND nilai.id_mapel ='.$id_mapel.' AND nilai.id_kd = '.$id_kd, 'left outer');
        $this->db->order_by('nama_siswa', 'asc');
        $db = $this->db->get();
        return $db->result_array();
        // return $this->db->last_query();
    }

    function get_avg_siswa($id_mapel, $id_kelas)
    {
        // dapatkan siswa berdasarkan id mapel dan id kelas
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi pengajarnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.$id_kelas;
        $this->db->select('nilai.id, nilai.nilai, siswa.id as id_siswa, siswa.nama_lengkap as nama_siswa, siswa.nis, AVG(nilai) as rerata');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai', 'rombel.id_siswa = nilai.id_siswa AND nilai.id_mapel ='.$id_mapel, 'left outer');
        $this->db->group_by('nama_siswa', 'asc');
        $this->db->order_by('nama_siswa', 'asc');

        $db = $this->db->get();
        return $db->result_array();
        // return $this->db->last_query();
    }

    // untuk download nilai
    function get_siswa_by_id_kelas($id_kelas)
    {
        $this->db->select('rombel.*, siswa.nis, siswa.nama_lengkap, siswa.jenis_kelamin, siswa.nama_panggilan');
        $this->db->from('rombel');
        $this->db->where('rombel.id_kelas ='.$id_kelas);
        $this->db->where('rombel.id_tahun ='.$_SESSION['id_tahun_pelajaran']);
        $this->db->join('siswa', 'siswa.id = rombel.id_siswa');
        $this->db->order_by('siswa.nama_lengkap', 'asc');
        return $this->db->get()->result_array();
    }

    // hitung semua kd yang sudah dinilai
    function count_kd_dinilai($id_mapel, $id_kelas, $id_kd)
    {
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi pengajarnya
        $this->db->select('nilai.id as id_nilai');
        $this->db->from('nilai');
        $this->db->join('rombel', 'nilai.id_siswa = rombel.id_siswa');
        $this->db->where('nilai.id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('nilai.id_mapel', $id_mapel);
        $this->db->where('nilai.id_kd', $id_kd);
        $this->db->where('rombel.id_kelas', $id_kelas);
        $db = $this->db->get();
        return $db->result_array();
    }

    // untuk chartjs
    function get_id_kd($id_mapel, $tingkat, $jenis)
    {
        $id_guru = user_info()['id_guru'];

        $this->db->select('id');
        $this->db->from('kompetensi_dasar');
        $this->db->where('id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('id_mapel', $id_mapel);
        $this->db->where('tingkat', $tingkat);
        $this->db->where('id_guru', $id_guru);
        $this->db->where('jenis', $jenis);
        $db = $this->db->get();
        return $db->result_array();
    }

    // digunakan untuk modal kkm
    function get_kelas_tingkat($id_mapel)
    {
        $id_guru = user_info()['id_guru'];

        $this->db->select('kelas.tingkat as kelas_tingkat');
        $this->db->from('pengajar');
        $this->db->where('id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('id_guru', $id_guru);
        $this->db->where('id_mapel', $id_mapel);
        $this->db->join('kelas', 'kelas.id = pengajar.id_kelas');
        $this->db->group_by('kelas.tingkat');
        $db = $this->db->get();
        return $db->result_array();
    }

    function get_kkm($id_mapel)
    {
        $id_guru = user_info()['id_guru'];

        
        if($id_mapel != 'all'){
            $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->where('kriteria_ketuntasan.id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('kriteria_ketuntasan.id_guru', $id_guru);
            $this->db->where('kriteria_ketuntasan.id_mapel', $id_mapel);
            $this->db->join('kelas', 'kelas.id = pengajar.id_kelas');
            $this->db->join('kriteria_ketuntasan', 'kriteria_ketuntasan.tingkat = kelas.tingkat', 'left');
            $this->db->order_by('kelas.tingkat');
            $this->db->group_by('kelas.tingkat');
            $db = $this->db->get();
            // return $this->db->last_query();
            return $db->result_array();
        } else {
            $this->db->select('*');
        $this->db->from('pengajar');
        $this->db->where('kriteria_ketuntasan.id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('kriteria_ketuntasan.id_guru', $id_guru);
            $this->db->join('kelas', 'kelas.id = pengajar.id_kelas');
            $this->db->join('kriteria_ketuntasan', 'kriteria_ketuntasan.tingkat = kelas.tingkat', 'left');
            $this->db->order_by('kelas.tingkat');
            $this->db->group_by('kelas.tingkat');
            $db = $this->db->get();
            // return $this->db->last_query();
            return $db->result_array();
        }
    }
}