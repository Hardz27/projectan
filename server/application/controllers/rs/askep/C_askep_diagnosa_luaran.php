<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_askep_diagnosa_luaran extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('rs/askep/M_askep_diagnosa_mtm_luaran', 'maskepdiagnosa_luaran');
	}

	public function index_get()
	// $route['askep_diagnosa/luaran'] = 'rs/askep/c_askep_diagnosa_luaran';
	{
		
		$data = $this->maskepdiagnosa_luaran->getall();

		$res['status']  	= 200;
		$res['message'] 	= "Berhasil mendapatkan data.";
		$res['data']		= $data;

		$this->response($res, $res['status']);
	}
}
