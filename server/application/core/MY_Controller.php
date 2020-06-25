<?php defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, x-token");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


/**
 * MY controller
 *
 * Seluruh controller bisa extends ke MY_Controller.
 * Opsi ini akan menghemat pengkodingan terkait dengan response untuk authentication
 *
 * @extends RestController
 */
class MY_Controller extends RestController
{
	/**
	 * Data token
	 *
	 * @var array
	 * @access protected
	 */
	protected $data_token = [];

	/**
	 * Constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('rs/M_login', 'm_login');

		$token = $this->input->get_request_header('x-token');
		$check_token = $this->m_login->check_token($token);

		if ($check_token['status'] == 401) {
			$res = [
				'status' => 401,
				'message' => $check_token['message'],
				'data' => []
			];

			$this->response($res, $res['status']);
		} else {
			$this->data_token = $check_token['data'];
		}

		if (empty($this->data_token['access'])) {
			$res = [
				'status' => 401,
				'message' => 'Tidak memiliki akses',
				'data' => []
			];

			$this->response($res, $res['status']);
		}

		if ($this->data_token['access'] !== 'user') {
			$res = [
				'status' => 401,
				'message' => 'Tidak memiliki akses',
				'data' => []
			];

			$this->response($res, $res['status']);
		}
	}
}
