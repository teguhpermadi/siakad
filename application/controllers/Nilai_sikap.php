<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_sikap extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Nilai_sikap_model');
    }
    
    public function index()
    {
        // print_r(user_info());
        $data['kelas'] = $this->Nilai_sikap_model->get_kelas();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_sikap/index', $data);
        $this->load->view('template/footer');
    }

    // lakukan penilaian pada kelas yang diajar
    public function do_nilai($id_kelas)
    {
        $data['siswa'] = $this->Nilai_sikap_model->get_siswa($id_kelas);
        // print_r(count($data['siswa']));
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_sikap/do_nilai', $data);
        $this->load->view('template/footer');
    }

    // simpan hasil penilaian
    public function simpan()
    {
        $id_siswa = $this->input->post('id_siswa[]');
        $id_guru = user_info()['id_guru'];
        $nilai = $this->input->post('nilai[]');

        $data = array();
        for($i=0; $i < count($id_siswa); $i++)
        {
            array_push($data, array(
                'id_tahun' => $_SESSION['id_tahun_pelajaran'],
                'id_siswa' => $id_siswa[$i],
                'id_guru' => $id_guru,
                'nilai' => $nilai[$i],
            ));
        }

        $this->db->insert_on_duplicate_update_batch('nilai_sikap', $data);
        redirect('nilai_sikap');
    }

    public function cek_nilai()
    {
        $data_kelas = [];
        $kelas = $this->Nilai_sikap_model->get_kelas();
        foreach ($kelas as $k) {
            $cek = $this->Nilai_sikap_model->cek_nilai_siswa($k['id_kelas']);
            $data_nya = array(
                'id_kelas' => $k['id_kelas'],
                'datanya' => [
                    'jumlah' => $cek['jumlah'],
                    'sudah_dinilai' => $cek['sudah_dinilai'],
                    'belum_dinilai' => $cek['belum_dinilai'],
                ]
            );
            array_push($data_kelas, $data_nya);
        }
        header('Content-Type: application/json');
        echo json_encode($data_kelas);
    }
}