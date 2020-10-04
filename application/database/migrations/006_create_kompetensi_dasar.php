<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_kompetensi_dasar extends CI_Migration
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
            'tingkat' => array(
                'type' => 'INT',
                'constraint' => '255',
                'comment' => 'kelas tingkat',
            ),
            'id_guru' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'jenis' => array(
                'type' => 'ENUM ("pengetahuan", "keterampilan")',
                'default' => 'pengetahuan',
                'null' => TRUE,
            ),
            'kd' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'comment' => 'kompetensi dasar',
                'unique' => TRUE,
            ),
        ));

        // Add Primary Key.
        $this->dbforge->add_key("id", TRUE);

        // Table attributes.

        $attributes = array(
            'ENGINE' => 'InnoDB',
        );

        // Create Table kompetensi_dasar
        $this->dbforge->create_table("kompetensi_dasar", TRUE, $attributes);
    }

    public function down()
    {
        $this->dbforge->drop_table('kompetensi_dasar');
    }
}
