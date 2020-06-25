<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan_lrs870 extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('/folder/M_nama_file.php', 'model');
    }

    public function index_get()
    {
       
    }

}
