<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Walikelas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Walikelas_model');
        
        // cek user login
        check_login();
    } 

    /*
     * Listing of walikelas
     */
    function index()
    {
        $data['walikelas'] = $this->Walikelas_model->get_all_walikelas();
        
        $data['_view'] = 'walikelas/index';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('walikelas/index',$data);
        $this->load->view('template/footer',$data);
    }

    /*
     * Adding a new walikelas
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_guru','Id Guru','required');
		$this->form_validation->set_rules('id_kelas','Id Kelas','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_guru' => $this->input->post('id_guru'),
				'id_kelas' => $this->input->post('id_kelas'),
				'id_tahun' => $_SESSION['id_tahun_pelajaran']
            );
            
            $walikelas_id = $this->Walikelas_model->add_walikelas($params);
            $this->session->set_flashdata('berhasil', 'Anda berhasil menambahkan data Walikelas');
            redirect('walikelas/index');
        }
        else
        {
			$this->load->model('Guru_model');
			$data['all_guru'] = $this->Guru_model->get_all_guru();

			// $this->load->model('Kelas_model');
			$data['all_kelas'] = $this->Walikelas_model->get_all_kelas();

			$this->load->model('Tahun_pelajaran_model');
			$data['all_tahun_pelajaran'] = $this->Tahun_pelajaran_model->get_all_tahun_pelajaran();
            
            $data['_view'] = 'walikelas/add';
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('walikelas/add',$data);
            $this->load->view('template/footer',$data);
        }
    }  

    /*
     * Editing a walikelas
     */
    function edit($id)
    {   
        // check if the walikelas exists before trying to edit it
        $data['walikelas'] = $this->Walikelas_model->get_walikelas($id);
        
        if(isset($data['walikelas']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('id_guru','Id Guru','required');
			// $this->form_validation->set_rules('id_kelas','Id Kelas','required');
			// $this->form_validation->set_rules('id_tahun','Id Tahun','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_guru' => $this->input->post('id_guru'),
					// 'id_kelas' => $this->input->post('id_kelas'),
					// 'id_tahun' => $this->input->post('id_tahun'),
                );

                $this->Walikelas_model->update_walikelas($id,$params);      
                $this->session->set_flashdata('berhasil', 'Anda berhasil merubah data Walikelas');

                redirect('walikelas/index');
            }
            else
            {
				$this->load->model('Guru_model');
				$data['all_guru'] = $this->Guru_model->get_all_guru();

				$this->load->model('Kelas_model');
				$data['all_kelas'] = $this->Kelas_model->get_all_kelas();

				$this->load->model('Tahun_pelajaran_model');
				$data['all_tahun_pelajaran'] = $this->Tahun_pelajaran_model->get_all_tahun_pelajaran();

                $data['_view'] = 'walikelas/edit';
                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar',$data);
                $this->load->view('walikelas/edit',$data);
                $this->load->view('template/footer',$data);
            }
        }
        else
            show_error('The walikelas you are trying to edit does not exist.');
    } 

    /*
     * Deleting walikelas
     */
    function remove($id)
    {
        $walikelas = $this->Walikelas_model->get_walikelas($id);

        // check if the walikelas exists before trying to delete it
        if(isset($walikelas['id']))
        {
            $this->Walikelas_model->delete_walikelas($id);
            $this->session->set_flashdata('hapus', 'Anda berhasil menghapus data Walikelas');

            redirect('walikelas/index');
        }
        else
            show_error('The walikelas you are trying to delete does not exist.');
    }
    
}