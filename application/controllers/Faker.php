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
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $how_much = 100;
        $faker->seed($how_much);
        // generate data by accessing properties
        $data = [];
        for ($i = 1; $i < $how_much; $i++) {
            array_push($data, [
                //  'id' => $i,
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
        echo json_encode($data);
        // $this->db->insert_batch('users', $data);
    }
}
