<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        // cek user login
        check_login();
	
    }

    public function index ()
    {
        $user = $this->ion_auth->user()->row();
        // data user
        $this->data['id'] = $user->id;
        $this->data['ip_address'] = $user->ip_address;
        $this->data['username'] = $user->username;
        $this->data['password'] = $user->password;
        $this->data['email'] = $user->email;
        $this->data['activation_code'] = $user->activation_code;
        $this->data['forgotten_password_code'] = $user->forgotten_password_code;
        $this->data['remember_code'] = $user->remember_code;
        $this->data['created_on'] = $user->created_on;
        $this->data['last_login'] = $user->last_login;
        $this->data['active'] = $user->active;
        $this->data['first_name'] = $user->first_name;
        $this->data['last_name'] = $user->last_name;
        $this->data['company'] = $user->company;
        $this->data['phone'] = $user->phone;

        //list the users
        $this->data['users'] = $this->ion_auth->users()->result();
        foreach ($this->data['users'] as $k => $user)
        {
            $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $this->data);
        $this->load->view('users/index');
        $this->load->view('template/footer');
        
    }
}