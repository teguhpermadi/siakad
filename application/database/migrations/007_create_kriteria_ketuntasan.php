<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_kriteria_ketuntasan extends CI_Migration
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
            'id_mapel' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'id_guru' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'tingkat' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'kkm' => array(
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

        // Create Table kriteria_ketuntasan
        $this->dbforge->create_table("kriteria_ketuntasan", TRUE, $attributes);
    }

    public function down()
    {
        $this->dbforge->drop_table('kriteria_ketuntasan');
    }
}
