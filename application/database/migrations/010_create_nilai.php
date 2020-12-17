<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_nilai extends CI_Migration
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
                'unique'            => TRUE
            ),
            'id_mapel' => array(
                'type' => 'INT',
                'constraint' => '255',
                'unique'            => TRUE
            ),
            'id_siswa' => array(
                'type' => 'INT',
                'constraint' => '255',
                'unique'            => TRUE
            ),
            'id_kd' => array(
                'type' => 'INT',
                'constraint' => '255',
                'unique'            => TRUE
            ),
            'nilai' => array(
                'type' => 'INT',
                'constraint' => '255',
                'default' => '0',
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);
        // $this->dbforge->add_key("id_tahun");
        // $this->dbforge->add_key("id_mapel");
        // $this->dbforge->add_key("id_siswa");
        // $this->dbforge->add_key("id_kd");

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table nilai
        $this->dbforge->create_table("nilai", TRUE, $attributes);
    }

    public function down()
    {
        $this->dbforge->drop_table('nilai');
    }
}
