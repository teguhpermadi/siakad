<?php

class Leger extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Leger_model');
        $this->load->model('Mapel_model');

        // cek user login
        check_login();
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
        $data['siswa'] = $this->Leger_model->get_siswa();
        // $data['nilai'] = $this->Leger_model->get_nilai_mapel();
        $data['mapel'] = $this->Mapel_model->get_all_mapel();
        // print_r(json_encode($data['nilai']));
        $this->load->view('template/header');
        $this->load->view('leger/nilai_mapel',$data);
        $this->load->view('template/footer');

    }
}