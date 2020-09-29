<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('faker');
        $this->load->view('template/footer');
    }

    function admin()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $how_much = 10;
        $faker->seed($how_much);
        // generate data by accessing properties

        $admin = [
            'id' => 1,
            'ip_address' => '127.0.0.1',
            'username' => 'administrator',
            'password' => '$2y$12$LDGmMnMv/vfhEGd/lVssTuEjTNccQH.QLYYSKHgPg..6sycG9azFu',
            'email' => 'admin@admin.com',
            'activation_selector' => null,
            'activation_code' => null,
            'forgotten_password_selector' => null,
            'forgotten_password_code' => null,
            'forgotten_password_time' => null,
            'remember_selector' => null,
            'remember_code' => null,
            'created_on' => 1268889823,
            'last_login' => null,
            'active' => 1,
            'first_name' => 'Admin',
            'last_name' => 'istrator',
            'company' => 'ADMIN',
            'phone' => '0',
        ];

        $data_users = [];
        for ($i = 2; $i < $how_much; $i++) {
            array_push($data_users, [
                'id' => $i,
                'ip_address' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'email' => $faker->email,
                'activation_selector' => null,
                'activation_code' => null,
                'forgotten_password_selector' => $faker->password,
                'forgotten_password_code' => $faker->password,
                'forgotten_password_time' => null,
                'remember_selector' => null,
                'remember_code' => null,
                'created_on' => time(),
                'last_login' => null,
                'active' => 1,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company' => $faker->company,
                'phone' => $faker->phoneNumber,
            ]);
        }
        // echo json_encode($data_users);
        // $this->db->insert_on_duplicate_update_batch('users', $data_users);
        $this->db->insert_batch('users', $admin);
        $this->db->insert_batch('users', $data_users);

    }
}
