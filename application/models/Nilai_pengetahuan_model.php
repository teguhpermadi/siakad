<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_pengetahuan_model extends CI_Model
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

    function get_nilai_siswa($id_mapel, $id_kelas)
    {
        // dapatkan nilai siswa berdasarkan id mapel dan id kelas
    }

}