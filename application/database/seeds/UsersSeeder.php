<?php

class UsersSeeder extends Seeder
{

    private $table = 'users';

    public function run()
    {
        $this->db->truncate($this->table);

        $data = [
            [
                'id' => '1', 
                'ip_address' => '127.0.0.1', 
                'username' => 'administrator', 
                'password' => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 
                'email' => 'admin@admin.com', 
                'activation_code' => '', 
                'forgotten_password_code' => null, 
                'created_on' => '1268889823', 
                'last_login' => '1268889823', 
                'active' => '1', 
                'first_name' => 'Admin', 
                'last_name' => 'istrator', 
                'company' => 'ADMIN', 
                'phone' => '0',
            ],
        ];
        $this->db->insert_batch($this->table, $data);
    }
}
