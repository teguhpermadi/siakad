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
        $this->load->model('Mapel_model');
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
        $this->load->view('nilai/index', $data);
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
        $this->load->view('nilai/do_nilai', $data);
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
        $get_mapel = $this->Mapel_model->get_mapel($id_mapel);
        $kd_pengetahuan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'pengetahuan');
        $kd_keterampilan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'keterampilan');
        // $siswa = $this->Penilaian_model->get_siswa($id_mapel, $id_kelas, $kd_pengetahuan['id']);

        $filename = '"Penilaian '.$get_mapel['nama'].' kelas '.$get_kelas['nama'].' oleh '.user_info()['first_name'].' '.user_info()['last_name'].'.xlsx"';
        
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
            ['Mata Pelajaran', $get_mapel['nama']],
            ['Kelas', $get_kelas['nama']],
            ['Tahun Pelajaran', $_SESSION['tahun']],
        ]; 

        $kd_pengetahuan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'pengetahuan');
        $kd_keterampilan = $this->Penilaian_model->get_kd($id_mapel, $get_kelas['tingkat'], 'keterampilan');

        // kita pisah dulu data kdnya
        $data_kd = [];
        foreach($kd_pengetahuan as $p){
            array_push($data_kd, [
                'id_kd' => $p['id'], 
                'jenis' => 'pengetahuan',
                'kd' => $p['kd']]);
        }

        foreach($kd_keterampilan as $k){
            array_push($data_kd, [
                'id_kd' => $k['id'], 
                'jenis' => 'keterampilan',
                'kd' => $k['kd']]);
        }

        // echo json_encode($data_kd);

        $data_siswa = $this->Rombel_model->get_siswa_by_id_kelas($id_kelas);
        $data_header_siswa = ['no','id','id_tahun','id_kelas','id_siswa','nis','nama_lengkap','jenis_kelamin','nama_panggilan'];
        $jml_kd = count($data_kd);
        
        // tuliskan array identitas ke dalam excel
        $spreadsheet->getActiveSheet()
        ->fromArray(
            $identitas,  // The data to set
            NULL,        // Array values with this value will not be set
            'F1'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );

        // tulis data identitas
        $data_identitas = [
            ['id_guru',$id_guru],
            ['id_kelas',$id_kelas],
            ['id_mapel', $id_mapel],
            ['id_tahun_pelajaran',$_SESSION['id_tahun_pelajaran']],
            ['jml_kd', $jml_kd],
        ];

        $spreadsheet->getActiveSheet()
        ->fromArray(
            $data_identitas,  // The data to set
            NULL,        // Array values with this value will not be set
            'B1'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );

        // tulis petunjuk pengisian
        $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('F6', 'Petunjuk Pengisian')
                ->setCellValue('F7', 'Isilah cell warna hijau dan orange dengan interval nilai 0 - 100')
                ->setCellValue('F8', 'Cell warna hijau mewakili kd pengetahuan')
                ->setCellValue('F9', 'Cell warna orange mewakili kd keterampilan');

        // tuliskan array header kolom
        $spreadsheet->getActiveSheet()
        ->fromArray(
            $data_header_siswa, // The data to set
            NULL,        // Array values with this value will not be set
            'A12'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );

        // tuliskan array data siswa
        $spreadsheet->getActiveSheet()
        ->fromArray(
            $data_siswa, // The data to set
            NULL,        // Array values with this value will not be set
            'B13'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );

        // tulis nomor urut
        for ($i=0; $i < count($data_siswa); $i++) { 
            $row = 13 + $i;
            $no = 1 + $i;
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$row, $no);
        }

        // ambil kolom di helper
        $column_all = column_excel();
        
        // tuliskan array kd dan nilai pada masing-masing kd
        for ($i=0; $i < count($data_kd); $i++) { 
            // hitung setelah kolom ke 10
            $i_column = 10 + $i;
            
            // tulis header kdnya pada baris ke 10
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue($column_all[$i_column].'12', $data_kd[$i]['kd']);
            
            $data_nilai = $this->Penilaian_model->get_siswa($id_mapel, $id_kelas, $data_kd[$i]['id_kd']);

            // beri warna pada jenis kd pengetahuan dan jenis kd keterampilan
            if($data_kd[$i]['jenis'] == 'pengetahuan')
                {
                    $spreadsheet->getActiveSheet()->getStyle($column_all[$i_column].'12')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('80f700');
                } else {
                    $spreadsheet->getActiveSheet()->getStyle($column_all[$i_column].'12')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('ff6500');
            };

            // hitung berapa banyak nilainya
            for ($n=0; $n < count($data_nilai); $n++) { 
                $nilai = $data_nilai[$n]['nilai'];
                $id_kd_dinilai = $data_kd[$i]['id_kd'];

                // ditulis pada baris ke 13 sampai seterusnya
                $row = $n + 13;

                // hitung kolom untuk id kd
                $i_column_kd = $i_column + $jml_kd;
                $column_kd = $column_all[$i_column_kd];

                // tuliskan masing-masing nilai per kd nya pada tiap baris
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue($column_all[$i_column].$row, $nilai);

                // tulis id kd nya setelah kolom niai pada tiap baris
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue($column_kd.$row, $id_kd_dinilai);

                // hide kolom id kdnya
                $spreadsheet->getActiveSheet()->getColumnDimension($column_kd)->setVisible(false);

                // tidak di proteksi
                $spreadsheet->getActiveSheet()
                    ->getStyle($column_all[$i_column].$row) // proteksi cell
                    ->getProtection()->setLocked(
                        Protection::PROTECTION_UNPROTECTED
                    );

                // beri warna pada cell
                if($data_kd[$i]['jenis'] == 'pengetahuan')
                {
                    $spreadsheet->getActiveSheet()->getStyle($column_all[$i_column].$row)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('80f700');
                } else {
                    $spreadsheet->getActiveSheet()->getStyle($column_all[$i_column].$row)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('ff6500');
            };
            }
        }

        // hide column B,C,D,E
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setVisible(false);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setVisible(false);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setVisible(false);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setVisible(false);
        
        // exit;
        // proteksi cell
        $spreadsheet->getActiveSheet()
            ->getProtection()->setPassword('PhpSpreadsheet');
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Nilai Mapel');

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

    function do_upload()
    {
        $id_mapel = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('id_kelas');

        $file_ext = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xlsx|xls|csv';
        $config['overwrite']             = true;
        $config['file_name']             = 'nilai-'.user_info()['user_id'];

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            
            $helper = new Sample();
            $inputFileName = 'uploads/nilai-'.user_info()['user_id'].'.'.$file_ext;
            $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
            $spreadsheet = IOFactory::load($inputFileName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
            
            // hitung jumlah data yang di upload
            // $jumlahData = $highestRow - 7;
            $file_id_guru = $sheetData[1]['B'];
            $file_id_kelas = $sheetData[2]['B'];
            $file_id_mapel = $sheetData[3]['B'];
            $file_id_tahun = $sheetData[4]['B'];

            // periksa dulu identitas file excelnya
            if($file_id_guru != user_info()['id_guru'] && $file_id_kelas != $id_kelas && $file_id_mapel != $id_mapel && $file_id_tahun != $_SESSION['id_tahun_pelajaran']){
                // jika file excel salah
                echo 'identitas file excel yang anda upload tidak sesuai.';
            } else {
                // jika file excel benar
                // baca datanya mulai baris ke 11
                $row_id_kd = array_slice($sheetData, 10, 1);
                // baca id per kd
                $data_id_kd = array_slice($row_id_kd[0], 10);
                // hitung berapa jumlah kd yang dinilai
                $jml_data_kd = count($data_id_kd);

                // baca datanya mulai baris ke 13
                $row_data_nilai_siswa = array_slice($sheetData, 12);
                
                $data_nilai = [];

                foreach($row_data_nilai_siswa as $row){
                    array_push($data_nilai, [
                        'id_siswa' => $row['E'],
                        'nilai' => $row['K']
                    ]);
                }

                print_r(column_excel());
                
            }
        }
    }
}