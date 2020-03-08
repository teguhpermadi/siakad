<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_sikap_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_kelas()
    {
        // cek jika id kelas nya ada
        if(array_key_exists("id_kelas",user_info())) {
            $id_guru = user_info()['id_guru'];
            $id_kelas = user_info()['id_kelas'];
            // dapatkan semua kelas yang diajar
            $this->db->select('pengajar.*, kelas.nama as nama_kelas');
            $this->db->from('pengajar');
            $this->db->where('pengajar.id_tahun', $_SESSION['id_tahun_pelajaran']);
            $this->db->where('pengajar.id_guru', $id_guru);
            $this->db->where('pengajar.id_kelas !=', $id_kelas);
            $this->db->join('kelas', 'kelas.id = pengajar.id_kelas');
            $this->db->order_by('kelas.tingkat', 'asc');
            $data = $this->db->get()->result_array();

            return $data;
        }
    }

    // dapatkan rombel walikelasnya jika guru tersebut walikelas
    public function get_walikelas()
    {
        $id_guru = user_info()['id_guru'];
        $id_kelas = user_info()['id_kelas'];
        
        // dapatkan semua kelas yang diajar
        $this->db->select('walikelas.*, kelas.nama as nama_kelas');
        $this->db->from('walikelas');
        $this->db->where('walikelas.id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('walikelas.id_guru', $id_guru);
        $this->db->where('walikelas.id_kelas', $id_kelas);
        $this->db->join('kelas', 'kelas.id = walikelas.id_kelas');
        $this->db->order_by('kelas.tingkat', 'asc');
        $data = $this->db->get()->result_array();

        return $data;
    }

    function get_siswa($id_kelas)
    {
        $id_guru = user_info()['id_guru'];
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.$id_kelas;
        $this->db->select('nilai_sikap.id, nilai_sikap.nilai, siswa.id as id_siswa, siswa.nama_lengkap as nama_siswa, siswa.nis');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai_sikap', 'rombel.id_siswa = nilai_sikap.id_siswa AND nilai_sikap.id_guru ='.$id_guru, 'left outer');
        $db = $this->db->get();
        return $db->result_array();
    }

    // untuk menampilkan data dalam chart js
    function cek_nilai_siswa($id_kelas)
    {
        $id_guru = user_info()['id_guru'];

        // hitung semua siswa dalam rombel
        $siswa_rombel = $this->db->query('SELECT COUNT(rombel.id_siswa) as jumlah FROM rombel WHERE rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.$id_kelas)->row();

        // hitung siswa rombel yang sudah di nilai
        $sudah_dinilai = $this->db->query('SELECT COUNT(nilai_sikap.nilai) as jumlah FROM rombel LEFT JOIN nilai_sikap ON rombel.id_siswa = nilai_sikap.id_siswa WHERE rombel.id_tahun = '.$_SESSION['id_tahun_pelajaran'].' AND rombel.id_kelas = '.$id_kelas.' AND nilai_sikap.id_guru ='.$id_guru.' AND nilai_sikap.nilai != 0')->row();

        // hitung selisih yang belum dinilai
        $belum_dinilai = $siswa_rombel->jumlah - $sudah_dinilai->jumlah;
        $data = array(
            'jumlah' => $siswa_rombel->jumlah,
            'sudah_dinilai' => $sudah_dinilai->jumlah,
            'belum_dinilai' => $belum_dinilai,
		);
		
		return $data;
    }

    function get_kelas_by_id($id)
    {
        return $this->db->get_where('kelas',array('id'=>$id))->row_array();
    }
}
