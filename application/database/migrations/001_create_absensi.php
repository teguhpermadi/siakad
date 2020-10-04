<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_absensi extends CI_Migration
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
            'sakit' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'izin' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'alpa' => array(
                'type' => 'INT',
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
        // Create Table absensi
        // $this->dbforge->create_table("absensi", TRUE, $attributes);
        $this->dbforge->create_table("absensi");
    }

    public function down()
    {
        $this->dbforge->drop_table('absensi');
    }
}
