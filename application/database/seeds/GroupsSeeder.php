<?php

class GroupsSeeder extends Seeder
{

    private $table = 'groups';

    public function run()
    {
        $this->db->truncate($this->table);

        $data = [
            [
                'id' => 1,
                'name' => 'admin',
                'description' => 'Administrator'
            ],
            [
                'id' => 2,
                'name' => 'members',
                'description' => 'General User'
            ],
            [
                'id' => 3,
                'name' => 'guru',
                'description' => 'Guru'
            ],
            [
                'id' => 4,
                'name' => 'siswa',
                'description' => 'Siswa'
            ],

        ];
        $this->db->insert_batch($this->table, $data);
    }
}
