<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;

class Penilaian extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Penilaian_model');
        $this->load->model('Kelas_model');
        $this->load->model('Rombel_model');
        // $this->load->model('Kelas_model');
        // cek user login
        check_login();
    }
    
    public function index()
    {
        $data['mapel'] = $this->Penilaian_model->get_mapel();
        // print_r($data['mapel']);
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_pengetahuan/index', $data);
        $this->load->view('template/footer');
    }

    public function do_nilai()
    {
        // pecah dulu uri -nya untuk memperodel id mapel dan id kelas
        $uri = $this->uri->segment(3);
        $params = explode('-', $uri);
        $id_mapel = $params[0];
        $id_kelas = $params[1];

        $get_kelas = $this->Kelas_model->get_kelas($id_kelas);
        // dapatkan semua kd pada mapel dan kelas ini
        $data['kd_pengetahuan'] = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'pengetahuan');
        $data['kd_keterampilan'] = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'keterampilan');
        $data['id_mapel'] = $id_mapel;
        $data['id_kelas'] =$id_kelas;
        // print_r($data['kd_keterampilan']);

        // $data['siswa'] = $this->Penilaian_model->get_siswa($id_mapel, $id_kelas);
        // $data['jumlah'] = count($data['siswa']);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_pengetahuan/do_nilai', $data);
        $this->load->view('template/footer');
    }

    public function get_siswa()
    {
        $id_mapel = $this->input->get('idMapel');
        $id_kelas = $this->input->get('idKelas');
        $id_kd = $this->input->get('idKd');
        $siswa = $this->Penilaian_model->get_siswa($id_mapel, $id_kelas, $id_kd);
        echo json_encode($siswa);
    }

    public function save()
    {
        $nilai = $this->input->post('nilai[]');
        $id_siswa = $this->input->post('id_siswa[]');
        $id_mapel = $this->input->post('id_mapel');
        $id_kd = $this->input->post('id_kd');
        $data = [];
        for ($i=0; $i < count($nilai) ; $i++) { 
            array_push($data, [ 'id_tahun' => $_SESSION['id_tahun_pelajaran'],
                                'id_mapel' => $id_mapel,
                                'id_siswa' => $id_siswa[$i],
                                'id_kd' => $id_kd,
                                'nilai' =>$nilai[$i]]);
        }

        $this->db->insert_on_duplicate_update_batch('nilai', $data);

        echo json_encode($data);
    }

    public function download()
    {
        $uri = $this->uri->segment(3);
        $params = explode('-', $uri);
        $id_mapel = $params[0];
        $id_kelas = $params[1];

        $nama_user = user_info()['first_name'];
        $id_guru = user_info()['id_guru'];

        $get_kelas = $this->Kelas_model->get_kelas($id_kelas);
        $kd_pengetahuan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'pengetahuan');
        $kd_keterampilan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'keterampilan');
        // $siswa = $this->Penilaian_model->get_siswa($id_mapel, $id_kelas, $kd_pengetahuan['id']);

        $filename = '"Penilaian Kelas '.$get_kelas['nama'].' oleh '.user_info()['first_name'].' '.user_info()['last_name'].'.xlsx"';
        
        $helper = new Sample();
        if ($helper->isCli()) {
            $helper->log('This example should only be run from a Web Browser' . PHP_EOL);
            return;
        }
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Teguh Permadi')
            ->setLastModifiedBy($nama_user)
            ->setTitle('Office 2007 XLSX Download Nilai Sikap')
            ->setSubject('Office 2007 XLSX Download Nilai Sikap')
            ->setDescription('Download Nilai Sikap for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Siakad Excel');

        $identitas = [
            ['Penilaian Kelas oleh '.user_info()['first_name'].' '.user_info()['last_name']],
            ['Kelas', $get_kelas['nama']],
            ['Tahun Pelajaran', $_SESSION['tahun']],
        ]; 

        $kd_pengetahuan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'pengetahuan');
        $kd_keterampilan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'keterampilan');

        // kita pisah dulu data kdnya
        $data_kd = [];
        foreach($kd_pengetahuan as $p){
            array_push($data_kd, ['id_kd' => $p['id'], 'kd' => $p['kd']]);
        }

        foreach($kd_keterampilan as $k){
            array_push($data_kd, ['id_kd' => $k['id'], 'kd' => $k['kd']]);
        }

        // echo json_encode($data_kd);

        $data_siswa = $this->Rombel_model->get_siswa_by_id_kelas($id_kelas);
        $data_header_siswa = ['no','id','id_tahun','id_kelas','id_siswa','nis','nama_lengkap','jenis_kelamin','nama_panggilan'];

        // tuliskan array identitas ke dalam excel
        $spreadsheet->getActiveSheet()
        ->fromArray(
            $identitas,  // The data to set
            NULL,        // Array values with this value will not be set
            'F1'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );

        // tuliskan array header kolom
        $spreadsheet->getActiveSheet()
        ->fromArray(
            $data_header_siswa, // The data to set
            NULL,        // Array values with this value will not be set
            'B5'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );

        // tuliskan array data siswa
        $spreadsheet->getActiveSheet()
        ->fromArray(
            $data_siswa, // The data to set
            NULL,        // Array values with this value will not be set
            'B6'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );

        // tulis nomor urut
        for ($i=0; $i < count($data_siswa); $i++) { 
            $row = 6 + $i;
            $no = 1 + $i;
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$row, $no);
        }

        // jadikan patokan column
        $column = range('J', 'Z');
        // tuliskan array kd dan nilai pada masing-masing kd
        for ($i=0; $i < count($data_kd); $i++) { 

            // tulis id kdnya pada baris ke 4
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue($column[$i].'4', $data_kd[$i]['id_kd']);

            // tulis header kdnya pada baris ke 5
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue($column[$i].'5', $data_kd[$i]['kd']);
            
            $data_nilai = $this->Penilaian_model->get_siswa($id_mapel, $id_kelas, $data_kd[$i]['id_kd']);

            // hitung berapa banyak nilainya
            for ($n=0; $n < count($data_nilai); $n++) { 
                $nilai = $data_nilai[$n]['nilai'];
                
                // ditulis pada baris ke 6 sampai seterusnya
                $row = $n + 6;

                // tuliskan masing-masing nilai per kd nya
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue($column[$i].$row, $nilai);
            }
        }


        // exit;
        // proteksi cell
        $spreadsheet->getActiveSheet()
            ->getProtection()->setPassword('PhpSpreadsheet');
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        // $spreadsheet->getActiveSheet()
        //     ->getStyle('F8:F'.$jml_siswa_kelas) // proteksi cell mulai dari baris ke 8 sampai jumlah siswanya + 8
        //     ->getProtection()->setLocked(
        //         Protection::PROTECTION_UNPROTECTED
        //     );

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Nilai Sikap');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean();
        $writer->save('php://output');
    }
}