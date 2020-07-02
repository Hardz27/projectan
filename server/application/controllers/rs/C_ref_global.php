<?php defined('BASEPATH') OR exit('No direct script access allowed');		

class C_ref_global extends MY_Controller
{	
	/**
	 * Constructor
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('global/M_ref_global', 'mrg');
	}
	
	/**
	 * GET - Get data by ID or params
	 * 
	 * @access public
	 * @param int $id
	 * @return json
	 * @route $route['ref/global'] = 'global/c_ref_global';
	 * @route $route['ref/global/(:num)'] = 'global/c_ref_global/$1';
	 */
	public function index_get($id = null)
	{
		$type = false;
		

		if ($this->get('type')) {
			$type = $this->get('type');
		}
		
		if ($this->get('id')) {
			$data = $this->mrg->get($this->get('id'));
		} elseif ($type) {
			$data = $this->mrg->get_all($type);
		} else {
			$data = false;
		}
		
		if ($data) {
			$res = [
				'status' => 200,
				'message' => 'Berhasil mendapatkan data',
				'data' => $data
			];
		} else {
			$res = [
				'status' => 404,
				'message' => 'Data tidak ditemukan',
				'data' => []
			];
		}
		
		$this->response($res, $res['status']);
	}

	public function form_get()
  // $route['ref/form_header'] = 'c_ref_form_header';
  {
    $data = $this->get();

		if (empty($data['id'])) {
			$res['status'] = 400;
			$res['message'] = 'Mohon masukan ID Form';

      $this->response($res, 200);
    }

    $data = $this->mrg->get_form($data['id']);

    $res["status"]	= "200";
    $res["message"] = "Berhasil mendapatkan data Ref Form Header.";
    $res["data"]	  = $data;
  
    $this->response($res, 200);
  }
}
