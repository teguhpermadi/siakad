<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_tahun_pelajaran extends CI_Migration
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
            'tahun' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'semester' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'id_kepsek' => array(
                'type' => 'INT',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'tanggal_rapor' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'ttd' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table tahun_pelajaran
        $this->dbforge->create_table("tahun_pelajaran", TRUE, $attributes);

    }

    public function down()
    {
        $this->dbforge->drop_table('tahun_pelajaran');
    }
}
