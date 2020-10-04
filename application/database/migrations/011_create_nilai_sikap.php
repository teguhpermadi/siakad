<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_nilai_sikap extends CI_Migration
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
            'id_guru' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'id_siswa' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'nilai' => array(
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

        // Create Table nilai_sikap
        $this->dbforge->create_table("nilai_sikap", TRUE, $attributes);

    }

    public function down()
    {
        $this->dbforge->drop_table('nilai_sikap');
    }
}
