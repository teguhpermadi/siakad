<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');

        // cek user login
        check_login();
    }

    /*
     * Listing of profil
     */
    function index()
    {
        $data['profil'] = $this->Profil_model->get_all_profil();
        $data['num_rows'] = $this->Profil_model->count_row();

        $data['_view'] = 'profil/index';
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('profil/index', $data);
        $this->load->view('template/footer');
    }

    /*
     * Adding a new profil
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaSekolah', 'NamaSekolah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run()) {

            // upload image
            $file_ext = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
            $config['upload_path']          = './uploads/profil/';
            $config['allowed_types']        = 'png';
            $config['overwrite']             = true;
            $config['file_name']             = 'logo';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                print_r($data);
            }

            $params = array(
                'namaSekolah' => $this->input->post('namaSekolah'),
                'npsn' => $this->input->post('npsn'),
                'bentukSekolah' => $this->input->post('bentukSekolah'),
                'alamat' => $this->input->post('alamat'),
                'desaKelurahan' => $this->input->post('desaKelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupatenKota' => $this->input->post('kabupatenKota'),
                'provinsi' => $this->input->post('provinsi'),
                'telp' => $this->input->post('telp'),
                'website' => $this->input->post('website'),
                'email' => $this->input->post('email'),
                'kodePos' => $this->input->post('kodePos'),
                'logo' => 'logo.' . $file_ext,
            );

            $profil_id = $this->Profil_model->add_profil($params);
            // Deletes cache for the currently requested URI
            $this->output->delete_cache('profil/index');
            redirect('profil/index');
        } else {
            $data['_view'] = 'profil/add';
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('profil/add', $data);
            $this->load->view('template/footer');
        }
    }

    /*
     * Editing a profil
     */
    function edit($id)
    {
        // check if the profil exists before trying to edit it
        $data['profil'] = $this->Profil_model->get_profil($id);

        if (isset($data['profil']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('namaSekolah', 'NamaSekolah', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run()) {
                // upload image
                $file_ext = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                $config['upload_path']          = './uploads/profil/';
                $config['allowed_types']        = 'png';
                $config['overwrite']             = true;
                $config['file_name']             = 'logo';

                $this->load->library('upload', $config);

                if ($_FILES['logo']['name'] == "") {
                    $logo = $this->input->post('logo_old');
                } else {
                    if (!$this->upload->do_upload('logo')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $logo = $data['upload_data']['file_name'];
                        print_r($data);
                    }
                }

                $params = array(
                    'namaSekolah' => $this->input->post('namaSekolah'),
                    'npsn' => $this->input->post('npsn'),
                    'bentukSekolah' => $this->input->post('bentukSekolah'),
                    'alamat' => $this->input->post('alamat'),
                    'desaKelurahan' => $this->input->post('desaKelurahan'),
                    'kecamatan' => $this->input->post('kecamatan'),
                    'kabupatenKota' => $this->input->post('kabupatenKota'),
                    'provinsi' => $this->input->post('provinsi'),
                    'telp' => $this->input->post('telp'),
                    'website' => $this->input->post('website'),
                    'email' => $this->input->post('email'),
                    'kodePos' => $this->input->post('kodePos'),
                    'logo' => $logo,
                );

                $this->Profil_model->update_profil($id, $params);
                // Deletes cache for the currently requested URI
                $this->output->delete_cache('profil/index');
                redirect('profil/index');
            } else {
                $data['_view'] = 'profil/edit';
                $this->load->view('template/header');
                $this->load->view('template/sidebar', $data);
                $this->load->view('profil/edit', $data);
                $this->load->view('template/footer');
            }
        } else
            show_error('The profil you are trying to edit does not exist.');
    }

    /*
     * Deleting profil
     */
    function remove($id)
    {
        $profil = $this->Profil_model->get_profil($id);

        // check if the profil exists before trying to delete it
        if (isset($profil['id'])) {
            $this->Profil_model->delete_profil($id);
            redirect('profil/index');
        } else
            show_error('The profil you are trying to delete does not exist.');
    }
}
