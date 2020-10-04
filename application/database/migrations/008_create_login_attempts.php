<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_login_attempts extends CI_Migration
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
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '45',
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table login_attempts
        $this->dbforge->create_table("login_attempts", TRUE, $attributes);

    }

    public function down()
    {
        $this->dbforge->drop_table('login_attempts');
    }
}
