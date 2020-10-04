<?php

class Migrate extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->library('migration');
                $this->load->library('MigrationGenerator');

        }
        public function index()
        {
                if (!$this->migration->current()) {
                        show_error($this->migration->error_string());
                } else {
                        echo 'Migration worked!';
                }
        }

        public function make_base()
        {
                $this->load->library('MigrationGenerator');
                $this->migrationgenerator->generate();
        }
}
