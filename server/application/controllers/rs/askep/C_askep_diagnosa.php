<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_askep_diagnosa extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('rs/askep/m_askep', 'askep');
		$this->load->model('rs/M_hrd', 'm_hrd');
	}

	public function index_get()
	// $route['askep'] = 'rs/askep/c_askep_diagnosa';
	{
		$get = $this->get();
        // $this->response($get,200);
        if (empty($get['id_notes_vitals'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Notes Vitals";

            $this->response($res, $res['status']);
        }

        if (empty($get['id_notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Notes ";

            $this->response($res, $res['status']);
        }

        $notes = $this->askep->get_detail($get['id_notes']);

        if(!$notes) {
            $res['status']     = 400;
            $res['message']    = "ID Notes tidak ditemukan";

            $this->response($res, $res['status']);
        }

        $notes[0]['json_data'] =  json_decode($notes[0]['json_data'], true);
        $a = $notes[0]['json_data']['id_notes_vitals'];
        $b = $get['id_notes_vitals'];

        if($a != $b)
        {
            $res['status']     = 400;
            $res['message']    = "ID Notes Askep dan Notes Vitalsnya tidak cocok !!!";

            $this->response($res, $res['status']);
        }

        $notes[0]['notes_vitals'] = $this->askep->get_vitals($a);

        $data = $notes;
        if ($data) {
            $res['status'] = 200;
            $res['message'] = 'Sukses mendapatkan data';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal mendapatkan data';
            $this->response($res, $res['status']);
        }
	}

	public function diagnosa_get(){
		$id = $this->get('id_reg');
		$data = $this->askep->get_diagnosa($id);
        if ($data) {
            $res['status'] = 200;
            $res['message'] = 'Sukses mendapatkan data';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal mendapatkan data';
            $this->response($res, $res['status']);
        }
	}

	public function diagnosa_all_get(){ 
		$get = $this->get();
        // $this->response($get,200);
        if (empty($get['id'])) {
            $id='';
        }else{
        	$id=$get['id'];
        }
		$data = $this->askep->get_all($id);
        if ($data) {
            $res['status'] = 200;
            $res['message'] = 'Sukses mendapatkan data';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal mendapatkan data';
            $this->response($res, $res['status']);
        }
	}

	public function registrasi_get(){ 
		$data = $this->askep->get_registrasi();
        if ($data) {
            $res['status'] = 200;
            $res['message'] = 'Sukses mendapatkan data';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal mendapatkan data';
            $this->response($res, $res['status']);
        }
	}

	public function render_get(){
		$no_rm = $this->get('no_rm');
		$visit = $this->get('id_visit');
		$data = $this->askep->get_render($visit,$no_rm);
        if ($data) {
            $res['status'] = 200;
            $res['message'] = 'Sukses mendapatkan data';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal mendapatkan data';
            $this->response($res, $res['status']);
        }
	}

	public function index_post(){
		$post = $this->post();
		$data = [
			'no_rm'                     => $post['no_rm'],
			'id_pasien_registrasi' 		=> $post['id_pasien_registrasi'],
			'id_pasien_visit'           => $post['id_pasien_visit'],
			'askep_diagnosa_kode'       => $post['askep_diagnosa_kode'],
			'json_data'                 => json_encode($post['json_data']),
		];

		$input = $this->askep->add($data);

		if ($input) {
			$res['status']     = 200;
			$res['message']    = "Berhasil menambahkan data.";
			$this->response($res, $res['status']);
		} else {
			$res['status']     = 400;
			$res['message']    = "Gagal menambahkan data.";
			$this->response($res, $res['status']);
		}
	}

	// public function index_post(){
	// 	$post = $this->post();


	// 	if (empty($post['no_rm'])) {
	// 		$res['status']     = 400;
	// 		$res['message']    = "Mohon masukan No RM.";

	// 		$this->response($res, $res['status']);
	// 	}

	// 	if (empty($post['id_pasien_registrasi'])) {
	// 		$res['status']     = 400;
	// 		$res['message']    = "Mohon masukan ID pasien registrasi.";

	// 		$this->response($res, $res['status']);
	// 	}

	// 	if (empty($post['id_pasien_visit'])) {
	// 		$res['status']     = 400;
	// 		$res['message']    = "Mohon masukan ID pasien visit.";

	// 		$this->response($res, $res['status']);
	// 	}

	// 	if (empty($post['askep_diagnosa_kode'])) {
	// 		$res['status']     = 400;
	// 		$res['message']    = "Mohon masukan Kode Askep Diagnosa.";

	// 		$this->response($res, $res['status']);
	// 	}

	// 	if (empty($post['notes'])) {
	// 		$res['status']     = 400;
	// 		$res['message']    = "Mohon masukan data NOTES / catatan.";

	// 		$this->response($res, $res['status']);
	// 	}

	// 	$id_vitals = null;
	// 	if (!empty($post['vitals'])) {
	// 		$data_vital = $post['vitals'];
	// 		$petugas_created = $this->m_hrd->get_by_user_id($data_vital['created_by']);
	// 		if (!$petugas_created) {
	// 			$res['status'] = 400;
	// 			$res['message'] = 'ID Petugas tidak dikenali';
	// 			$this->response($res, $res['status']);
	// 		}
	// 		$vitals = [
	// 			'id_pasien_registrasi'   => $data_vital['id_pasien_registrasi'],
	// 			'id_pasien_visit'        => $data_vital['id_pasien_visit'],
	// 			'height'                 => $data_vital['height'],
	// 			'weight'                 => $data_vital['height'],
	// 			'systolic'               => $data_vital['systolic'],
	// 			'diastolic'              => $data_vital['diastolic'],
	// 			'blood_pressure'         => $data_vital['blood_pressure'],
	// 			'temperature'            => $data_vital['temperature'],
	// 			'pulse'                  => $data_vital['pulse'],
	// 			'respiratory_rate'       => $data_vital['respiratory_rate'],
	// 			'kesadaran'              => $data_vital['kesadaran'],
	// 			'keadaan_umum'           => $data_vital['keadaan_umum'],
	// 			'nyeri'                  => $data_vital['nyeri'],
	// 			'eye_opening'            => $data_vital['eye_opening'],
	// 			'verbal_response'        => $data_vital['verbal_response'],
	// 			'motor_response'         => $data_vital['motor_response'],
	// 			'spo2'                   => $data_vital['spo2'],
	// 			'akral'                  => $data_vital['akral'],
	// 			'reflek_cahaya'          => $data_vital['reflek_cahaya'],
	// 			'pupil_isokor'           => $data_vital['pupil_isokor'],
	// 			'pupil_unisokor'         => $data_vital['pupil_unisokor'],
	// 			'created_date'           => date('Y-m-d H:i:s'),
	// 			'created_by'             => $petugas_created['nama']
	// 		];

	// 		// $this->response($vitals, 200);
	// 		$id_vitals = $this->askep->add_vitals($vitals);
	// 	}

	// 	if (!empty($post['id_dokter_approve'])) {
	// 		$data_dokter = $this->m_hrd->get_by_user_id($post['id_dokter_approve']);
	// 	} else {
	// 		$data_dokter['nama'] = null;
	// 		$data_dokter['digital_signature'] = null;
	// 	}

	// 	if (!empty($post['id_petugas_approve'])) {
	// 		$data_perawat = $this->m_hrd->get_by_user_id($post['id_petugas_approve']);
	// 	} else {
	// 		$data_perawat['nama'] = null;
	// 		$data_perawat['digital_signature'] = null;
	// 	}
	// 	if (!empty($post['created_by'])) {
	// 		$data_petugas_input = $this->m_hrd->get_by_user_id($post['created_by']);
	// 	} else {
	// 		$data_petugas_input['nama'] = null;
	// 	}

	// 	$data_input = [
	// 		'id_petugas_approve'                        => $post['id_petugas_approve'] ? $post['id_petugas_approve'] : null,
	// 		'id_dokter_approve'                         => $post['id_dokter_approve'] ? $post['id_dokter_approve'] : null,
	// 		'approved_petugas'                          => $data_perawat['nama'],
	// 		'approved_dokter'                           => $data_dokter['nama'],
	// 		'digital_signature_approved_petugas'        => $data_perawat['digital_signature'],
	// 		'digital_signature_approved_dokter'         => $data_dokter['digital_signature'],
	// 		'approved_date_petugas'                     => $post['id_petugas_approve'] ? date('Y-m-d H:i:s') : null,
	// 		'approved_date_dokter'                      => $post['id_dokter_approve'] ? date('Y-m-d H:i:s') : null,
	// 		'created_date'                              => date('Y-m-d H:i:s'),
	// 		'created_by'                                => $data_petugas_input['nama'],
	// 		'notes'                                     => $post['notes'],
	// 	];

	// 	if ($id_vitals != null) {
	// 		$data_input['id_notes_vitals'] = $id_vitals;
	// 	}

	// 	$data = [
	// 		'id_pasien_registrasi'                      => $post['id_pasien_registrasi'],
	// 		'id_pasien_visit'                           => $post['id_pasien_visit'],
	// 		'no_rm'                                     => $post['no_rm'],
	// 		'json_data'                                 => json_encode($data_input),
	// 	];


	// 	$input = $this->askep->add($data);

	// 	if ($input) {
	// 		$res['status']     = 200;
	// 		$res['message']    = "Berhasil menambahkan data.";
	// 		$this->response($res, $res['status']);
	// 	} else {
	// 		$res['status']     = 400;
	// 		$res['message']    = "Gagal menambahkan data.";
	// 		$this->response($res, $res['status']);
	// 	}
	// }

	public function index_put()
	{
		$put = $this->put();

		if (empty($put['no_rm'])) {
			$res['status']     = 400;
			$res['message']    = "Mohon masukan No RM.";

			$this->response($res, $res['status']);
		}

		if (empty($put['id_pasien_registrasi'])) {
			$res['status']     = 400;
			$res['message']    = "Mohon masukan ID pasien registrasi.";

			$this->response($res, $res['status']);
		}

		if (empty($put['id_pasien_visit'])) {
			$res['status']     = 400;
			$res['message']    = "Mohon masukan ID pasien visit.";

			$this->response($res, $res['status']);
		}

		if (empty($put['askep_diagnosa_kode'])) {
			$res['status']     = 400;
			$res['message']    = "Mohon masukan Kode Askep Diagnosa.";

			$this->response($res, $res['status']);
		}

		// if (empty($put['notes'])) {
		// 	$res['status']     = 400;
		// 	$res['message']    = "Mohon masukan data NOTES / catatan.";

		// 	$this->response($res, $res['status']);
		// }

		$id_vitals = null;
		// if (!empty($put['vitals'])) {
		// 	$data_vital = $put['vitals'];
		// 	$petugas_created = $this->m_hrd->get_by_user_id($data_vital['created_by']);
		// 	if (!$petugas_created) {
		// 		$res['status'] = 400;
		// 		$res['message'] = 'ID Petugas tidak dikenali';
		// 		$this->response($res, $res['status']);
		// 	}
		// 	$vitals = [
		// 		'id_pasien_registrasi'   => $data_vital['id_pasien_registrasi'],
		// 		'id_pasien_visit'        => $data_vital['id_pasien_visit'],
		// 		'height'                 => $data_vital['height'],
		// 		'weight'                 => $data_vital['height'],
		// 		'systolic'               => $data_vital['systolic'],
		// 		'diastolic'              => $data_vital['diastolic'],
		// 		'blood_pressure'         => $data_vital['blood_pressure'],
		// 		'temperature'            => $data_vital['temperature'],
		// 		'pulse'                  => $data_vital['pulse'],
		// 		'respiratory_rate'       => $data_vital['respiratory_rate'],
		// 		'kesadaran'              => $data_vital['kesadaran'],
		// 		'keadaan_umum'           => $data_vital['keadaan_umum'],
		// 		'nyeri'                  => $data_vital['nyeri'],
		// 		'eye_opening'            => $data_vital['eye_opening'],
		// 		'verbal_response'        => $data_vital['verbal_response'],
		// 		'motor_response'         => $data_vital['motor_response'],
		// 		'spo2'                   => $data_vital['spo2'],
		// 		'akral'                  => $data_vital['akral'],
		// 		'reflek_cahaya'          => $data_vital['reflek_cahaya'],
		// 		'pupil_isokor'           => $data_vital['pupil_isokor'],
		// 		'pupil_unisokor'         => $data_vital['pupil_unisokor'],
		// 		'created_date'           => date('Y-m-d H:i:s'),
		// 		'created_by'             => $petugas_created['nama']
		// 	];

		// 	// $this->response($vitals, 200);
		// 	$id_vitals = $this->askep->add_vitals($vitals);
		// }

		if (!empty($put['id_dokter_approve'])) {
			$data_dokter = $this->m_hrd->get_by_user_id($put['id_dokter_approve']);
		} else {
			$data_dokter['nama'] = null;
			$data_dokter['digital_signature'] = null;
		}

		if (!empty($put['id_petugas_approve'])) {
			$data_perawat = $this->m_hrd->get_by_user_id($put['id_petugas_approve']);
		} else {
			$data_perawat['nama'] = null;
			$data_perawat['digital_signature'] = null;
		}
		if (!empty($put['created_by'])) {
			$data_petugas_input = $this->m_hrd->get_by_user_id($put['created_by']);
		} else {
			$data_petugas_input['nama'] = null;
		}

		$data_input = [
			'id_petugas_approve'                        => $put['id_petugas_approve'] ? $put['id_petugas_approve'] : null,
			'id_dokter_approve'                         => $put['id_dokter_approve'] ? $put['id_dokter_approve'] : null,
			'approved_petugas'                          => $data_perawat['nama'],
			'approved_dokter'                           => $data_dokter['nama'],
			'digital_signature_approved_petugas'        => $data_perawat['digital_signature'],
			'digital_signature_approved_dokter'         => $data_dokter['digital_signature'],
			'approved_date_petugas'                     => $put['id_petugas_approve'] ? date('Y-m-d H:i:s') : null,
			'approved_date_dokter'                      => $put['id_dokter_approve'] ? date('Y-m-d H:i:s') : null,
			'created_date'                              => date('Y-m-d H:i:s'),
			'created_by'                                => $data_petugas_input['nama'],
			'notes'                                     => $put['notes'],
		];

		if ($id_vitals != null) {
			$data_input['id_notes_vitals'] = $id_vitals;
		}

		$data = [
			'no_rm'   				=> $put['no_rm'],
			'askep_diagnosa_kode' 	=> $put['askep_diagnosa_kode'],
			'json_data'  			=> json_encode($data_input),
		];

		$where = [
			'id_pasien_registrasi'                      => $put['id_pasien_registrasi'],
			'id_pasien_visit'                           => $put['id_pasien_visit'],
		];


		$input = $this->askep->edit($data,$where);

		if ($input) {
			$res['status']     = 200;
			$res['message']    = "Berhasil menambahkan data.";
			$this->response($res, $res['status']);
		} else {
			$res['status']     = 400;
			$res['message']    = "Gagal menambahkan data.";
			$this->response($res, $res['status']);
		}
	}
}
