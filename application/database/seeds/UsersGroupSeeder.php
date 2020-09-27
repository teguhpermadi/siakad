<?php

class GroupsSeeder extends Seeder
{

    private $table = 'user_groups';

    public function run()
    {
        $this->db->truncate($this->table);

        $data = [
            [
                'id' => 1,
                'user_id' => 1,
                'groups_id' => 1,
            ],
        ];
        $this->db->insert_batch($this->table, $data);
    }
}
