<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pasien extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('rs/pasien/M_pasien_registrasi', 'mreg');
		$this->load->model('rs/pasien/M_pasien_visit', 'mvisit');
	}

	public function index_get()
	// $route['pasien'] = 'global/c_pasien';
	{
		$no_rm = null;
		$type = null;
		$status = null;
		$id_reg = null;
		$id_visit = null;

		if ($this->get('no_rm')) {
			$no_rm = $this->get('no_rm');
		}
		if ($this->get('type')) {
			$type = $this->get('type');
		}
		if ($this->get('status')) {
			$status = $this->get('status');
		}
		if ($this->get('id_reg')) {
			$id_reg = $this->get('id_reg');
		}

		if (empty($no_rm)) {
			$res['status']  = 400;
			$res['message'] = "Harap masukkan nomor rm !!! eg. no_rm=000000";
			$this->response($res, $res['status']);
		}
		if ($this->get('type')) {
			$type = $this->get('type');
		}
		if ($this->get('status')) {
			$status = $this->get('status');
		}
		if ($this->get('id_reg')) {
			$id_reg = $this->get('id_reg');
		}

		if ($this->get('id_visit')) {
			$id_visit = $this->get('id_visit');
		}

		$reg = $this->mreg->get($status, $id_reg, $no_rm);
		$visit = $this->mvisit->get($status, $id_reg, $id_visit, $no_rm);

		if (!$reg && !$visit) {
			$res['status']  = 400;
			$res['message'] = "NO RM tidak dikenal !!!";

			$this->response($res, $res['status']);
		}

		if (!$reg) {
			$reg = [];
		} else {
			$reg = $reg;
		}

		if (!$visit) {
			$visit = [];
		} else {
			$visit = $visit;
		}

		if ($type == 'registrasi') {
			$data = [
				'registrasi' => $reg,
			];
		} elseif ($type == 'visit') {
			$data = [
				'visit' => $visit,
			];
		} else {
			$data = [
				'registrasi' => $reg,
				'visit' => $visit,
			];
		}

		if ($id_visit) {
			$data = [
				'visit' => $visit,
			];
		}

		$res['status']  = 200;
		$res['message'] = "Berhasil mendapatkan data.";
		$res['data']		= $data;

		$this->response($res, $res['status']);
	}

	function visit_get()
	{
		$id = $this->get('id');
		$data = $this->mvisit->get_by_id_visit($id);
		$this->response($data, 200);
	}

	function getall_get()
	// $route['pasien'] = 'c_pasien';
	{
		$all = count($this->mreg->getall());
		$this->response($all, 200);
	}
}
