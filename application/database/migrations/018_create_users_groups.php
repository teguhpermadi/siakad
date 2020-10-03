<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_users_groups extends CI_Migration
{

    public function up()
    {
        // Add Fields.
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'group_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);
        $this->dbforge->add_key("user_id");
        $this->dbforge->add_key("group_id");

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table users_groups
        $this->dbforge->create_table("users_groups", TRUE, $attributes);

        // Add foreign Key.
        $this->db->query("ALTER TABLE `users_groups` ADD FOREIGN KEY(`group_id`) REFERENCES groups(`id`) ON DELETE CASCADE ON UPDATE NO ACTION");
        $this->db->query("ALTER TABLE `users_groups` ADD FOREIGN KEY(`user_id`) REFERENCES users(`id`) ON DELETE CASCADE ON UPDATE NO ACTION");

        // dumping data
        $data = [
            [
                'id' => 1,
                'user_id' => 1,
                'group_id' => 1,
            ],[
                'id' => 2,
                'user_id' => 1,
                'group_id' => 2,
            ],
        ];

        $this->db->insert_batch('users_groups', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('users_groups');
    }
}
