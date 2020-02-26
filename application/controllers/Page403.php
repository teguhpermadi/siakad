<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page404 extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
    public function index ()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/403');
        $this->load->view('template/footer');
    }
}