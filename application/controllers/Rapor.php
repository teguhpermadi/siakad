<?php

use PhpOffice\PhpWord\PhpWord;

class Rapor extends CI_Controller
{
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
        $this->load->view('rapor/index', $data);
        $this->load->view('template/footer');
    }

    function word()
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Hello World !');

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');

        $filename = 'simple';

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '.docx"');
        header('Cache-Control: max-age=0');

        $objWriter->save('php://output');
    }

    function load_rapor($id_siswa)
    {
        $tahun = $this->Rapor_model->get_tahun();
        $walikelas = $this->Rapor_model->get_walikelas();
        $get_data_siswa = $this->Rapor_model->get_data_siswa($id_siswa);
        $get_rombel_siswa = $this->Rapor_model->get_rombel_siswa($id_siswa);
        $get_mapel_siswa = $this->Rapor_model->get_mapel_siswa($id_siswa);
        $get_absensi = $this->Rapor_model->get_absensi($id_siswa);
        $get_catatan = $this->Rapor_model->get_catatan($id_siswa);
        $data_nilai = [];

        // dapatkan kkm, nilai dan deskripsi kd untuk masing-masing mapel
        foreach ($get_mapel_siswa as $mapel) {
            $kkm = $this->Rapor_model->get_kkm($mapel['id_mapel'], $mapel['tingkat']);
            $nilai = $this->Rapor_model->get_nilai($mapel['id_mapel'], $id_siswa);
            $des_tuntas = $this->Rapor_model->get_deskripsi_tuntas($mapel['id_mapel'], $id_siswa, $kkm['kkm']);
            $des_tidak_tuntas = $this->Rapor_model->get_deskripsi_tidak_tuntas($mapel['id_mapel'], $id_siswa, $kkm['kkm']);

            if (empty($des_tuntas['deskripsi']) or empty($des_tidak_tuntas['deskripsi'])) {
                $deskripsi = 'PADA MAPEL INI ADA KOMPENTENSI DASAR YANG BELUM DI NILAI.';
            } else {
                $deskripsi = $des_tuntas['deskripsi'] . ' dan ' . $des_tidak_tuntas['deskripsi'];
            };

            array_push($data_nilai, [
                'id_' . $mapel['kode_mapel'] => $mapel['id_mapel'],
                'nama_' . $mapel['kode_mapel'] => $mapel['nama_mapel'],
                'kkm_' . $mapel['kode_mapel'] => $kkm['kkm'],
                'nilai_' . $mapel['kode_mapel'] => $nilai['rerata_up'],
                'deskripsi_' . $mapel['kode_mapel'] => $deskripsi,
            ]);
        }

        // gabungkan semua data nilai
        $result = array();
        foreach ($data_nilai as $arr) {
            $result = array_merge($arr, $result);
        };

        $data_mentah = array_merge($tahun, $walikelas, $get_data_siswa, $get_rombel_siswa, $get_absensi, $get_catatan, $result);
        // pisahkan array key dan values untuk PHPword TemplateProcessor

        $key = array_keys($data_mentah);
        $val = array_values($data_mentah);
        // echo json_encode($key);
        // exit;

        // load template rapor default
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('uploads/Template.docx');

        $templateProcessor->setValue($key, $val);
        $filename = 'Rapor ' . $get_data_siswa['nama_lengkap'] . ' Tahun ' . $_SESSION['tahun'] . ' Semester ' . $_SESSION['semester'] . '.docx';
        // $templateProcessor->saveAs($filename);

        header("Content-Disposition: attachment; filename=".$filename);

        $templateProcessor->saveAs('php://output');
    }
}
