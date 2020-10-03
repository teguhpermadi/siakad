<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_rombel extends CI_Migration
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
            'id_tahun' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'id_kelas' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'id_siswa' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table rombel
        $this->dbforge->create_table("rombel", TRUE, $attributes);

    }

    public function down()
    {
        $this->dbforge->drop_table('rombel');
    }
}
