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
        $id_siswa = $this->input->post('id_siswa[]');
        $keterangan = $this->input->post('keterangan[]');
        $note = $this->input->post('note[]');
        
        $data = array();
        for($i=0; $i < count($id_siswa); $i++)
        {
            array_push($data, array(
                'id_tahun' => $_SESSION['id_tahun_pelajaran'],
                'id_siswa' => $id_siswa[$i],
                'keterangan' => $keterangan[$i],
                'note' => $note[$i]
            ));
        }

        $this->db->insert_on_duplicate_update_batch('catatan', $data);
        redirect('catatan');
    }

}