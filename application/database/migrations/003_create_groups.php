<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_groups extends CI_Migration
{

    public function up()
    {
        // Add Fields.
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table groups
        $this->dbforge->create_table("groups", TRUE, $attributes);

        // dumping data
        $data = [
            [
                'id' => 1,
                'name' => 'admin',
                "description" => 'Administrator',
            ],
            [
                'id' => 2,
                'name' => 'members',
                "description" => 'General User',
            ],
            [
                'id' => 3,
                'name' => 'guru',
                "description" => 'Guru',
            ],
            [
                'id' => 4,
                'name' => 'siswa',
                "description" => 'Siswa',
            ]
        ];

        $this->db->insert_batch('groups',$data);
    }

    public function down()
    {
        $this->dbforge->drop_table('groups');
    }
}
