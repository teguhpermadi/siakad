<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_users extends CI_Migration
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
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '254',
                'unique' => TRUE,
            ),
            'activation_selector' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
                'unique' => TRUE,
            ),
            'activation_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'forgotten_password_selector' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
                'unique' => TRUE,
            ),
            'forgotten_password_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'forgotten_password_time' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'remember_selector' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
                'unique' => TRUE,
            ),
            'remember_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'created_on' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'last_login' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'active' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE,
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE,
            ),
            'company' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table users
        $this->dbforge->create_table("users", TRUE, $attributes);

        // dumping data admin
        $data = [
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

        $this->db->insert('users', $data);

    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
