<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Guru_model');
        $this->load->model('Siswa_model');
        $this->load->model('Tahun_pelajaran_model');

        // cek user login
        check_login();
        set_tahun_aktif();
    }

    public function index ()
    {
        // data profil
        $this->data['profil'] = $this->Profil_model->get_all_profil();
        $this->data['tahun_pelajaran'] = $this->Tahun_pelajaran_model->get_all_tahun_pelajaran();
        // // hitung datanya
        $this->data['num_rows'] = $this->Profil_model->count_row();
        $this->data['jumlah_guru'] = $this->Guru_model->count_row();
        $this->data['jumlah_siswa'] = $this->Siswa_model->count_row();
        
        // print_r($_SESSION);
        // $this->session->set_flashdata('message', 'anda berhasil menginput data');
        
        $this->load->view('template/header', $this->data);
        $this->load->view('template/sidebar', $this->data);
        $this->load->view('dashboard/index', $this->data);
        $this->load->view('template/footer', $this->data);
        
    }
}