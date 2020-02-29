<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Catatan_model');
    }

    public function index()
    {
        // dapatkan semua siswa dalam rombel berdasarkan id kelas yang aktif
        $data['catatan'] = $this->Catatan_model->get_catatan();

        // print_r($data['catatan']);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('catatan/index', $data);
        $this->load->view('template/footer');
    }

    public function simpan()
    {
        $id_siswa_ = $this->input->post('id_siswa[]');
        $keterangan_ = $this->input->post('keterangan[]');
        $note_ = $this->input->post('note[]');
        
        // gunakan fungsi mysql INSERT ... ON DUPLICATE KEY UPDATE Statement
        // fungsi ini berguna untuk update data jika datanya sudah ada, dan insert data baru jika datanya belum ada berdasarkan nama kolom unik nya

        for($i=0; $i < count($id_siswa_); $i++) {

            $id_tahun = $_SESSION['id_tahun_pelajaran'];
            $id_siswa = $id_siswa_[$i];
            $keterangan = $keterangan_[$i];
            $note = $note_[$i];
            
            $this->db->trans_start();
            $this->db->query('INSERT INTO catatan (id_tahun, id_siswa, keterangan, note) VALUES ('.$id_tahun.','.$id_siswa.',"'.$keterangan.'","'.$note.'") ON DUPLICATE KEY UPDATE keterangan = "'.$keterangan.'", note = "'.$note.'";');
            $this->db->query('UPDATE catatan SET keterangan = "'.$keterangan.'", note = "'.$note.'" WHERE id_tahun ='.$id_tahun.' AND id_siswa = '.$id_siswa.';');
            $this->db->trans_complete(); 
            
        }

        redirect('catatan');
    }

}