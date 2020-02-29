<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Absensi_model');
    }

    public function index()
    {
        // dapatkan semua siswa dalam rombel berdasarkan id kelas yang aktif
        $data['absensi'] = $this->Absensi_model->get_absensi();

        // print_r($data['absensi']);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('absensi/index', $data);
        $this->load->view('template/footer');
    }

    public function simpan()
    {
        $id_siswa_ = $this->input->post('id_siswa[]');
        $sakit_ = $this->input->post('sakit[]');
        $izin_ = $this->input->post('izin[]');
        $alpa_ = $this->input->post('alpa[]');
        
        // gunakan fungsi mysql INSERT ... ON DUPLICATE KEY UPDATE Statement
        // fungsi ini berguna untuk update data jika datanya sudah ada, dan insert data baru jika datanya belum ada berdasarkan nama kolom unik nya
        for($i=0; $i < count($id_siswa_); $i++) {

            $id_tahun = $_SESSION['id_tahun_pelajaran'];
            $id_siswa = $id_siswa_[$i];
            $sakit = $sakit_[$i];
            $izin = $izin_[$i];
            $alpa = $alpa_[$i];

            $this->db->trans_start();
            $this->db->query('INSERT INTO absensi (id_tahun, id_siswa, sakit, izin, alpa) VALUES ('.$id_tahun.','.$id_siswa.','.$sakit.','.$izin.','.$alpa.') ON DUPLICATE KEY UPDATE sakit = sakit + 1');
            $this->db->query('UPDATE absensi SET sakit = '.$sakit.', izin = '.$izin.', alpa = '.$alpa.' WHERE id_tahun ='.$id_tahun.' AND id_siswa = '.$id_siswa);
            $this->db->trans_complete(); 
            
        }

        redirect('absensi');
    }

}