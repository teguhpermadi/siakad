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
        $id_siswa = $this->input->post('id_siswa[]');
        $sakit = $this->input->post('sakit[]');
        $izin = $this->input->post('izin[]');
        $alpa = $this->input->post('alpa[]');

        $data = array();
        for($i=0; $i < count($id_siswa); $i++) {
            array_push($data, array(
                'id_tahun' => $_SESSION['id_tahun_pelajaran'],
                'id_siswa' => $id_siswa[$i],
                'sakit' => $sakit[$i],
                'izin' => $izin[$i],
                'alpa' => $alpa[$i],
            ));
        }

        $this->db->insert_on_duplicate_update_batch('absensi', $data);

        redirect('absensi');
    }

}