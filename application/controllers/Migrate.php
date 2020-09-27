<?php

class Migrate extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->library('migration');
        }
        public function index()
        {
                if (!$this->migration->current()) {
                        show_error($this->migration->error_string());
                } else {
                        echo 'Migration worked!';
                }
        }

        // auto generate migration file from db
        public function make_base()
        {
                $this->load->library('VpxMigration');

                // All Tables:

                $this->vpxmigration->generate();

                //Single Table:

                // $this->vpxmigration->generate('table');
        }
}
