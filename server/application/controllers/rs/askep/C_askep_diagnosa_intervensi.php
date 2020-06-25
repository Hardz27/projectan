<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_askep_diagnosa_intervensi extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('rs/askep/M_askep_diagnosa_mtm_intervensi', 'maskepdiagnosa_intervensi');
	}

	public function index_get()
	// $route['askep_diagnosa/intervensi'] = 'rs/askep/c_askep_diagnosa_intervensi';
	{
		
		$data = $this->maskepdiagnosa_intervensi->getall();

		$res['status']  	= 200;
		$res['message'] 	= "Berhasil mendapatkan data.";
		$res['data']		= $data;

		$this->response($res, $res['status']);
	}
}
