<?php

class Leger extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Leger_model');

        // cek user login
        check_login();
        set_tahun_aktif();
    }

    function index()
    {
        $data = [];
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('leger/index',$data);
        $this->load->view('template/footer');
    }

    function absensi_catatan()
    {
        // dapatkan semua siswa dalam rombel berdasarkan id kelas yang aktif
        $data['absensi'] = $this->Leger_model->get_absensi_catatan();
        
        $this->load->view('template/header');
        $this->load->view('leger/absensi_catatan',$data);
        $this->load->view('template/footer');
    }

    function nilai_sikap()
    {
        $data['nilai_sikap'] = $this->Leger_model->get_nilai_sikap();
        $this->load->view('template/header');
        $this->load->view('leger/nilai_sikap',$data);
        $this->load->view('template/footer');

    }

    function nilai_mapel()
    {
        $data = [];
        $this->load->view('leger/nilai_mapel',$data);
    }
}