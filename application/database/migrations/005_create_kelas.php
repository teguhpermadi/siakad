<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_kelas extends CI_Migration
{

    public function up()
    {
        // Add Fields.
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '100',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'kode_kelas' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'tingkat' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table kelas
        $this->dbforge->create_table("kelas", TRUE, $attributes);
    }

    public function down()
    {
        $this->dbforge->drop_table('kelas');
    }
}
