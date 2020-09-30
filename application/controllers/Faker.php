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
        $this->load->view('faker/index');
        $this->load->view('template/footer');
    }

    function admin()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $how_much = 5;
        $faker->seed($how_much);

        $data = [];

        for ($i = 1; $i <= $how_much; $i++) {
            array_push($data, [
                'id' => $i + 1,
                'ip_address' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'email' => $faker->email,
                'activation_selector' => null,
                'activation_code' => null,
                'forgotten_password_selector' => null,
                'forgotten_password_code' => null,
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

        $this->db->insert_batch('users', $data);
        echo 'Generate dummy data admin success';
    }

    function groups()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $how_much = 3;
        $faker->seed($how_much);

        $data = [];
        
        for ($i=1; $i <= $how_much; $i++) { 
            array_push($data, [
                'id' => 4+$i,
                'name' => $faker->word(),
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            ]);
        }

        $this->db->insert_batch('groups', $data);
        echo 'Generate dummy data groups success';
    }
}
