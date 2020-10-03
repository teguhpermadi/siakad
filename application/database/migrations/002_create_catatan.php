<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_catatan extends CI_Migration
{

    public function up()
    {
        // Add Fields.
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '255',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'id_tahun' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'id_siswa' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'keterangan' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'note' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);
        $this->dbforge->add_key("id_tahun");

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table catatan
        $this->dbforge->create_table("catatan", TRUE, $attributes);
    }

    public function down()
    {
        $this->dbforge->drop_table('catatan');
    }
}
