<?php

class Rapor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rapor_model');
        
        // cek user login
        check_login();
    }
    
    function index()
    {
        $data['siswa'] = $this->Rapor_model->get_siswa();
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('rapor/index',$data);
        $this->load->view('template/footer');
    }
}