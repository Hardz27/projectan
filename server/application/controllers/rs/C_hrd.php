<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, x-token");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_hrd extends MY_Controller {

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('rs/M_login', 'm_login');
		$this->load->model('rs/M_hrd', 'm_hrd');
	}


	function dokter_get()
	// $route['ref/dokter'] = 'c_hrd/dokter';
	{
		$status = NULL;
		$get = $this->get();
		$id = null;
		if (!empty($get['status'])) {
			$status = $get['status'];
		}
		if (!empty($get['id'])) {
			$id = $get['id'];
		}

		if (!empty($get['id_departement'])) {

			$param = [
				'role' => '7',
				'id_departement' => $get['id_departement']
			];
			$data = $this->m_hrd->get_by_param($param, $id);
		} else {
			$param = [
				'role' => '7'
			];
			$data = $this->m_hrd->get_by_param($param, $id);
		}

		if (empty($data)) {
			$res['status']  = 404;
			$res['message'] = "Data tidak ditemukan";
			$res['data']		= [];
		} else {
			$res['status']  = 200;
			$res['message'] = "Berhasil mendapatkan data.";
			$res['data']		= $data;
		}

		$this->response($res, $res['status']);
	}

	function perawat_get()
	// $route['ref/perawat'] = 'c_hrd/perawat';
	{

		$status = NULL;
		$id = null;

		$get = $this->get();

		if (!empty($get['status'])) {
			$status = $get['status'];
		}
		if (!empty($get['id'])) {
			$id = $get['id'];
		}

		if (!empty($get['id_departement'])) {

			$param = [
				'role' => '8',
				'id_departement' => $get['id_departement']
			];
			$data = $this->m_hrd->get_by_param($param, $id);
		} else {
			$param = [
				'role' => '8'
			];
			$data = $this->m_hrd->get_by_param($param, $id);
		}

		if (empty($data)) {
			$res['status']  = 404;
			$res['message'] = "Data tidak ditemukan";
			$res['data']		= [];
		} else {
			$res['status']  = 200;
			$res['message'] = "Berhasil mendapatkan data.";
			$res['data']		= $data;
		}

		$this->response($res, $res['status']);
	}
}
