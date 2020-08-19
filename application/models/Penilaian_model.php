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
        $this->db->select('pengajar.*, kelas.id as id_kelas, kelas.nama as nama_kelas');
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
    }
}