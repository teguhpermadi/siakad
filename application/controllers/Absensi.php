<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;

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

    public function download()
    {
        // dapatkan semua siswa dalam rombel berdasarkan id kelas yang aktif
        $id_tahun = $_SESSION["id_tahun_pelajaran"];
        $absensi = $this->Absensi_model->get_absensi();
        $kelas = $this->Absensi_model->get_kelas();
        $nama_user = user_info()['first_name'];
        $jml_siswa_kelas = count($absensi) + 7; // digunakan untuk proteksi cell


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

        $filename = '"Absensi '.$kelas['nama'].' oleh '.user_info()['first_name'].' '.user_info()['last_name'].'.xlsx"';

        $identitas = [
            // tulis identitas tahun pelajaran, guru, dan kelas
            ['Tahun Pelajaran', null, null, $_SESSION['tahun']],
            ['Semester', null, null, $_SESSION['semester']],
            ['Nama Guru', null, null, user_info()['first_name'].' '.user_info()['last_name']],
            ['Kelas yang dinilai',  null, null, $kelas['nama']],
            ['Jenis Penilaian',  null, null, 'Absensi'],
            [null, null, null, null, null, null],
            ['Nama Siswa', 'id_tahun', 'id_siswa', 'Sakit', 'Izin', 'Alpa']
        ];

        $data_absensi = [];
        foreach ($absensi as $a) {
            array_push($data_absensi, [
                $a['nama_siswa'], $id_tahun, $a['id_siswa'], $a['sakit'], $a['izin'], $a['alpa']
            ]);
        }

        $data = array_merge($identitas, $data_absensi);
        
        // tuliskan array ke dalam excel
        $spreadsheet->getActiveSheet()
            ->fromArray(
                $data,  // The data to set
                NULL,        // Array values with this value will not be set
                'A1'         // Top left coordinate of the worksheet range where
                             //    we want to set these values (default is A1)
            );
        
        // rubah ukuran kolom A
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

        // sembunyikan kolom 
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setVisible(false);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setVisible(false);

        // proteksi cell
        $spreadsheet->getActiveSheet()
            ->getProtection()->setPassword('PhpSpreadsheet');
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getActiveSheet()
            ->getStyle('D8:F'.$jml_siswa_kelas) // proteksi cell mulai dari baris ke 8 sampai jumlah siswanya + 8
            ->getProtection()->setLocked(
                Protection::PROTECTION_UNPROTECTED
            );

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

    public function do_upload()
    {
        $file_ext = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xlsx|xls|csv';
        $config['overwrite']             = true;
        $config['file_name']             = 'absensi';

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
            $inputFileName = 'uploads/absensi.'.$file_ext;
            $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
            $spreadsheet = IOFactory::load($inputFileName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
            
            // hitung jumlah data yang di upload
            $jumlahData = $highestRow - 7;
            $dataAwal = array();
            foreach($sheetData as $s) 
            {
                array_push($dataAwal, array(
                    'id_tahun' => $s['B'],
                    'id_siswa' => $s['C'],
                    'sakit' => $s['D'],
                    'izin' => $s['E'],
                    'alpa' => $s['F']
                ));
            }
            
            // $dataAwal membaca semua data yang ada di excel termasuk nama kolom
            // $dataAkhir membaca $dataAwal dari array urutan ke 7
            $dataAkhir = array_slice($dataAwal, 7);

            // cek dulu isi dari file excel yg di upload
            // data file excel harus sesuai dengan data tahun pelajaran, guru, kelas
            $id_tahun_diexcel = $dataAkhir[0]['id_tahun']; 

            $id_tahun = $_SESSION['id_tahun_pelajaran'];
           
            if($id_tahun_diexcel == $id_tahun){
                // $this->session->set_flashdata('berhasil_upload', 'Anda berhasil mengunggah <strong>'.$jumlahData.' data guru.</strong>');
                $this->db->insert_on_duplicate_update_batch('absensi', $dataAkhir);
                redirect('absensi');
                // echo 'benar';
            } else {
                echo 'File excel salah!';
            };

            // hapus jika sudah di upload
            unlink($inputFileName);
        }
    }

    public function cetak()
    {
        // dapatkan semua siswa dalam rombel berdasarkan id kelas yang aktif
        $data['absensi'] = $this->Absensi_model->get_absensi();
        $data['kelas'] = $this->Absensi_model->get_kelas();

        // print_r($data['absensi']);

        $this->load->view('template/header');
        $this->load->view('absensi/cetak', $data);
        $this->load->view('template/footer');
    }
}