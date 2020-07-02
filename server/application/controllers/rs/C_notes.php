<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_notes extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('notes/M_notes', 'notes');
        $this->load->model('rs/M_hrd', 'm_hrd');
    }

    public function index_get()
    {
        $id = $this->get('id');
        $no_rm = $this->get('no_rm');
        $id_ref_global_tipe_42 = $this->get('id_ref_global_tipe_42');
        if ($no_rm == null) {
            $res['status']  = 400;
            $res['message'] = "Masukkan NO RM";
            $this->response($res, $res['status']);
        }
        if ($id_ref_global_tipe_42 != null) {
            $data = $this->notes->get($id, $id_ref_global_tipe_42, $no_rm);
            if ($data != null) {
                $res['status']  = 200;
                $res['message'] = "Berhasil mendapatkan data NOTES";
                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]['json_data'] =  json_decode($data[$i]['json_data'], true);
                }
                $res['data'] = $data;
                $this->response($res, $res['status']);
            } else {
                $res['status']  = 200;
                $res['message'] = "Gagal mendapatkan data NOTES";
                $res['data'] = [];
                $this->response($res, $res['status']);
            }
        }
        $res['status']  = 400;
        $res['message'] = "Masukkan ID Ref Global Tipe 42";
        $this->response($res, $res['status']);
    }

    public function index_post()
    {
        $post = $this->post();
        if (empty($post['no_rm'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan NO RM.";

            $this->response($res, $res['status']);
        }

        if (empty($post['id_pasien_registrasi'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien registrasi.";

            $this->response($res, $res['status']);
        }

        if (empty($post['id_ref_global_tipe_42'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID REF Global Tipe 42.";

            $this->response($res, $res['status']);
        }

        if (empty($post['id_pasien_visit'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien visit.";

            $this->response($res, $res['status']);
        }

        if (empty($post['notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan data NOTES / catatan.";

            $this->response($res, $res['status']);
        }

        if (!empty($post['id_dokter_approve'])) {
            $data_dokter = $this->m_hrd->get_by_user_id($post['id_dokter_approve']);
        } else {
            $data_dokter['nama'] = null;
            $data_dokter['digital_signature'] = null;
        }

        if (!empty($post['id_petugas_approve'])) {
            $data_perawat = $this->m_hrd->get_by_user_id($post['id_petugas_approve']);
        } else{
            $data_perawat['nama'] = null;
            $data_perawat['digital_signature'] = null;
        }

        $data_input = [
            'id_petugas_approve'                        => $post['id_petugas_approve'] ? $post['id_petugas_approve'] : null,
            'id_dokter_approve'                         => $post['id_dokter_approve'] ? $post['id_dokter_approve'] : null,
            'approved_petugas'                          => $data_perawat['nama'],
            'approved_dokter'                           => $data_dokter['nama'],
            'digital_signature_approved_petugas'        => $data_perawat['digital_signature'],
            'digital_signature_approved_dokter'         => $data_dokter['digital_signature'],
            'approved_date_petugas'                     => $post['id_petugas_approve'] ? date('Y-m-d H:i:s') : null,
            'approved_date_dokter'                      => $post['id_dokter_approve'] ? date('Y-m-d H:i:s') : null,
            'created_date'                              => date('Y-m-d H:i:s'),
            'created_by'                                => $this->data_token['name'],
            'notes'                                     => $post['notes']
        ];

        $data = [
            'id_pasien_registrasi'                      => $post['id_pasien_registrasi'],
            'id_pasien_visit'                           => $post['id_pasien_visit'],
            'id_ref_global_tipe_42'                     => $post['id_ref_global_tipe_42'],
            'no_rm'                                     => $post['no_rm'], //$post['no_rm'],
            'json_data'                                 => json_encode($data_input),
        ];

        $input = $this->notes->add($data);

        if ($input) {
            $res['status']     = 200;
            $res['message']    = "Berhasil menambahkan data.";
        } else {
            $res['status']     = 400;
            $res['message']    = "Gagal menambahkan data.";
        }

        $this->response($res, $res['status']);
    }

    public function index_delete()
    {
        $id = $this->delete('id_notes');
        $input = $this->delete();
        // $this->response($input, 200);
        if (empty($input)) {
            return $this->response([
                'status' => '400',
                'message' => 'Mohon sertakan data untuk melanjutkan!',
            ], 400);
        } elseif (empty($this->delete('del_by'))) {
            return $this->response([
                'status' => '400',
                'message' => 'Mohon sertakan ID Pengguna untuk melanjutkan!',
            ], 400);
        }
        $data_petugas_delete = $this->m_hrd->get_by_user_id($this->delete('del_by'));
        if (!$data_petugas_delete) {
            return $this->response([
                'status' => '400',
                'message' => 'Id petugas tidak ditemukan!',
            ], 400);
        }
        $del = $this->notes->edit($id, ['del_by' => $data_petugas_delete['nama'], 'del_date' => date("Y-m-d H:i:s")]);

        if ($del) {

            $this->response([
                'status' => '200',
                'message' => 'Delete Data berhasil',
            ], 200);
        } else {
            $this->response([
                'status' => '400',
                'message' => 'Delete Data gagal',
            ], 400);
        }
    }

    public function index_put()
    {
        $put = $this->put();
        // $this->response($this->put(), 200);
        if (empty($put['no_rm'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan NO RM.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon sertakan ID Notes.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_pasien_registrasi'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien registrasi.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_ref_global_tipe_42'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID REF Global Tipe 42.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_pasien_visit'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien visit.";

            $this->response($res, $res['status']);
        }

        if (empty($put['notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan data NOTES / catatan.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_petugas_input'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon sertakan ID Petugas Input.";

            $this->response($res, $res['status']);
        }

        if (!empty($put['id_dokter_approve'])) {
            $data_dokter = $this->m_hrd->get_by_user_id($put['id_dokter_approve']);
        } else {
            $data_dokter['nama'] = null;
            $data_dokter['digital_signature'] = null;
        }

        if (!empty($put['id_petugas_approve'])) {
            $data_perawat = $this->m_hrd->get_by_user_id($put['id_petugas_approve']);
        } else{
            $data_perawat['nama'] = null;
            $data_perawat['digital_signature'] = null;
        }
        $id = $this->put('id_notes');

        $data_petugas_delete = $this->m_hrd->get_by_user_id($this->PUT('id_petugas_input'));
        if (!$data_petugas_delete) {
            $res['status']     = 400;
            $res['message']    = "ID Petugas Input tidak dikenali.";

            $this->response($res, $res['status']);
        }
        // $this->notes->edit($id, ['del_by' => $data_petugas_delete['nama'], 'del_date' => date("Y-m-d H:i:s")]);
        $this->notes->edit($id, [
            'del_by' => $data_petugas_delete['nama'],
            'del_date' => date("Y-m-d H:i:s")
        ]);

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
            'created_by'                                => $this->data_token['name'],
            'notes'                                     => $put['notes'], //json_encode($notes),
        ];

        $data = [
            'id_pasien_registrasi'                      => $put['id_pasien_registrasi'],
            'id_pasien_visit'                           => $put['id_pasien_visit'],
            'id_ref_global_tipe_42'                     => $put['id_ref_global_tipe_42'], //$put['id_ref_global_tipe_42'],
            'no_rm'                                     => $put['no_rm'],
            'json_data'                                 => json_encode($data_input),
        ];

        $input = $this->notes->add($data);

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

    public function detail_get()
    {
        $id = $this->get('id');
        if (empty($id)) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID NOTES / catatan.";

            $this->response($res, $res['status']);
        }

        $data = $this->notes->get_detail($id);
        $res['status']  = 200;
        $res['message'] = "Test Get Sukses";
        // // $data['test'] = 1;
        $data[0]['json_data'] =  json_decode($data[0]['json_data'], true);
        // $data[0]['json_data'] =  json_encode($data[0]['json_data']);

        $res['data'] = $data;
        $this->response($res, $res['status']);
    }

    public function vitals_get()
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

        $notes = $this->notes->get_detail($get['id_notes']);

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
            $res['message']    = "An error occured ";

            $this->response($res, $res['status']);
        }

        $notes[0]['notes_vitals'] = $this->notes->get_vitals($b);

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

    public function vitals_post()
    {
        $post = $this->post();

        if (empty($post['no_rm'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan No RM.";

            $this->response($res, $res['status']);
        }

        if (empty($post['id_pasien_registrasi'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien registrasi.";

            $this->response($res, $res['status']);
        }

        if (empty($post['id_ref_global_tipe_42'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID REF Global Tipe 42.";

            $this->response($res, $res['status']);
        }

        if (empty($post['id_pasien_visit'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien visit.";

            $this->response($res, $res['status']);
        }

        if (empty($post['notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan data NOTES / catatan.";

            $this->response($res, $res['status']);
        }

        if (empty($post['vitals'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan data NOTES Vitals.";

            $this->response($res, $res['status']);
        }

        $data_vital = $post['vitals'];
        $petugas_created = $this->m_hrd->get_by_user_id($data_vital['created_by']);
        // if(!$petugas_created) {
        //   $res['status'] = 400;
        //   $res['message'] = 'ID Petugas tidak dikenali';
        //   $this->response($res, $res['status']);
        // }
        $vitals = [
            'id_pasien_registrasi'   => $data_vital['id_reg'],
            'id_pasien_visit'        => $data_vital['id_visit'],
            'height'                 => $data_vital['tinggi'],
            'weight'                 => $data_vital['berat_badan'],
            'systolic'               => $data_vital['systolic'],
            'diastolic'              => $data_vital['diastolic'],
            'blood_pressure'         => $data_vital['blood_pressure'],
            'temperature'            => $data_vital['temperature'],
            'pulse'                  => $data_vital['pulse'],
            'respiratory_rate'       => $data_vital['respiratory_rate'],
            'kesadaran'              => $data_vital['kesadaran'],
            'keadaan_umum'           => $data_vital['keadaan_umum'],
            'nyeri'                  => $data_vital['nyeri'],
            'eye_opening'            => $data_vital['eye_opening'],
            'verbal_response'        => $data_vital['verbal_response'],
            'motor_response'         => $data_vital['motor_response'],
            'spo2'                   => $data_vital['spo2'],
            'akral'                  => $data_vital['akral'],
            'reflek_cahaya'          => $data_vital['reflek_cahaya'],
            'pupil_isokor'           => $data_vital['pupil_isokor'],
            'pupil_unisokor'         => $data_vital['pupil_unisokor'],
            'created_date'           => date('Y-m-d H:i:s'),
            'created_by'             => $petugas_created['nama']
        ];

        // $this->response($vitals, 200);
        $id_vitals = $this->notes->add_vitals($vitals);


        if (!empty($post['id_dokter_approve'])) {
            $data_dokter = $this->m_hrd->get_by_user_id($post['id_dokter_approve']);
        } else {
            $data_dokter['nama'] = null;
            $data_dokter['digital_signature'] = null;
        }

        if (!empty($post['id_petugas_approve'])) {
            $data_perawat = $this->m_hrd->get_by_user_id($post['id_petugas_approve']);
        } else{
            $data_perawat['nama'] = null;
            $data_perawat['digital_signature'] = null;
        }

        $data_input = [
            'id_petugas_approve'                        => $post['id_petugas_approve'] ? $post['id_petugas_approve'] : null,
            'id_dokter_approve'                         => $post['id_dokter_approve'] ? $post['id_dokter_approve'] : null,
            'approved_petugas'                          => $data_perawat['nama'],
            'approved_dokter'                           => $data_dokter['nama'],
            'digital_signature_approved_petugas'        => $data_perawat['digital_signature'],
            'digital_signature_approved_dokter'         => $data_dokter['digital_signature'],
            'approved_date_petugas'                     => $post['id_petugas_approve'] ? date('Y-m-d H:i:s') : null,
            'approved_date_dokter'                      => $post['id_dokter_approve'] ? date('Y-m-d H:i:s') : null,
            'created_date'                              => date('Y-m-d H:i:s'),
            'created_by'                                => $this->data_token['name'],
            'notes'                                     => $post['notes'],
            'id_notes_vitals'                           => $id_vitals,
        ];

        $data = [
            'id_pasien_registrasi'                      => $post['id_pasien_registrasi'],
            'id_pasien_visit'                           => $post['id_pasien_visit'],
            'id_ref_global_tipe_42'                     => $post['id_ref_global_tipe_42'],
            'no_rm'                                     => $post['no_rm'],
            'json_data'                                 => json_encode($data_input),
        ];


        $input = $this->notes->add($data);

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

    public function vitals_delete()
    {
        $id_notes = $this->delete('id_notes');
        $id_vitals = $this->delete('id_notes_vitals');
        $del_by = $this->delete('del_by');
        // $this->response($id_notes, 200);

        // $this->response("test", 200);

        if (empty($id_notes)) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Notes.";

            $this->response($res, $res['status']);
        }

        if (empty($id_vitals)) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Notes Vitals.";

            $this->response($res, $res['status']);
        }

        if (empty($del_by)) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Petugas.";

            $this->response($res, $res['status']);
        }

        $data_petugas_delete = $this->m_hrd->get_by_user_id($this->delete('del_by'));

        if (!$data_petugas_delete) {
            $res['status']     = 400;
            $res['message']    = "ID Petugas tidak dikenali.";

            $this->response($res, $res['status']);
        }


        $deldata = ['del_by' => $data_petugas_delete['nama'], 'del_date' => date("Y-m-d H:i:s")];


        $this->notes->edit($id_notes, ['del_by' => $data_petugas_delete['nama'], 'del_date' => date("Y-m-d H:i:s")]);
        $del_vitals = $this->notes->edit_vitals($id_vitals, $deldata);

        if ($del_vitals) {

            $this->response([
                'status' => '200',
                'message' => 'Delete Data berhasil',
            ], 200);
        } else {
            $this->response([
                'status' => '400',
                'message' => 'Delete Data gagal',
            ], 400);
        }
    }

    public function vitals_put()
    {
        $put = $this->put();
        // $this->response($put, 200);

        if (empty($put['no_rm'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan No RM.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID NOTES.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_notes_vitals'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID NOTES VITALS.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_pasien_registrasi'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien registrasi.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_ref_global_tipe_42'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID REF Global Tipe 42.";

            $this->response($res, $res['status']);
        }

        if (empty($put['id_pasien_visit'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID pasien visit.";

            $this->response($res, $res['status']);
        }

        if (empty($put['del_by'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID petugas input.";

            $this->response($res, $res['status']);
        }

        if (empty($put['notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan data NOTES / catatan.";

            $this->response($res, $res['status']);
        }

        if (empty($put['vitals'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan data NOTES Vitals.";

            $this->response($res, $res['status']);
        }
        $data_petugas_delete = $this->m_hrd->get_by_user_id($this->put('del_by'));

        if (!$data_petugas_delete) {
            $res['status']     = 400;
            $res['message']    = "ID Petugas tidak dikenali.";

            $this->response($res, $res['status']);
        }

        $id_notes = $put['id_notes'];
        $id_vitals = $put['id_notes_vitals'];


        $deldata = ['del_by' => $data_petugas_delete['nama'], 'del_date' => date("Y-m-d H:i:s")];


        $this->notes->edit($id_notes, ['del_by' => $data_petugas_delete['nama'], 'del_date' => date("Y-m-d H:i:s")]);
        // $this->response($a,200);
        $this->notes->edit_vitals($id_vitals, ['del_by' => $data_petugas_delete['nama'], 'del_date' => date("Y-m-d H:i:s")]);

        $data_vital = $put['vitals'];
        $petugas_created = $this->m_hrd->get_by_user_id($data_vital['created_by']);
        $vitals = [
            'id_pasien_registrasi'   => $data_vital['id_reg'],
            'id_pasien_visit'        => $data_vital['id_visit'],
            'height'                 => $data_vital['tinggi'],
            'weight'                 => $data_vital['berat_badan'],
            'systolic'               => $data_vital['systolic'],
            'diastolic'              => $data_vital['diastolic'],
            'blood_pressure'         => $data_vital['blood_pressure'],
            'temperature'            => $data_vital['temperature'],
            'pulse'                  => $data_vital['pulse'],
            'respiratory_rate'       => $data_vital['respiratory_rate'],
            'kesadaran'              => $data_vital['kesadaran'],
            'keadaan_umum'           => $data_vital['keadaan_umum'],
            'nyeri'                  => $data_vital['nyeri'],
            'eye_opening'            => $data_vital['eye_opening'],
            'verbal_response'        => $data_vital['verbal_response'],
            'motor_response'         => $data_vital['motor_response'],
            'spo2'                   => $data_vital['spo2'],
            'akral'                  => $data_vital['akral'],
            'reflek_cahaya'          => $data_vital['reflek_cahaya'],
            'pupil_isokor'           => $data_vital['pupil_isokor'],
            'pupil_unisokor'         => $data_vital['pupil_unisokor'],
            'created_date'           => date('Y-m-d H:i:s'),
            'created_by'             => $petugas_created['nama']
        ];

        // $this->response($vitals, 200);
        $id_vitals = $this->notes->add_vitals($vitals);


        if (!empty($put['id_dokter_approve'])) {
            $data_dokter = $this->m_hrd->get_by_user_id($put['id_dokter_approve']);
        } else {
            $data_dokter['nama'] = null;
            $data_dokter['digital_signature'] = null;
        }

        if (!empty($put['id_petugas_approve'])) {
            $data_perawat = $this->m_hrd->get_by_user_id($put['id_petugas_approve']);
        } else{
            $data_perawat['nama'] = null;
            $data_perawat['digital_signature'] = null;
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
            'created_by'                                => $this->data_token['name'],
            'notes'                                     => $put['notes'],
            'id_notes_vitals'                           => $id_vitals,
        ];

        $data = [
            'id_pasien_registrasi'                      => $put['id_pasien_registrasi'],
            'id_pasien_visit'                           => $put['id_pasien_visit'],
            'id_ref_global_tipe_42'                     => $put['id_ref_global_tipe_42'],
            'no_rm'                                     => $put['no_rm'],
            'json_data'                                 => json_encode($data_input),
        ];


        $input = $this->notes->add($data);

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

    public function id_notes_vitals_get()
    {
        $get = $this->get();

        if (empty($get['id_notes'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Notes.";

            $this->response($res, $res['status']);
        }

        if (empty($get['id_ref_global_tipe_42'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Ref Global Tipe 42.";

            $this->response($res, $res['status']);
        }

        $notes = $this->notes->get_detail($get['id_notes'], $get['id_ref_global_tipe_42']);
        if($notes != null) {
            $notes[0]['json_data'] =  json_decode($notes[0]['json_data'], true);

            $a = $notes[0]['json_data']['id_notes_vitals'];

            $res['status'] = 200;
            $res['message'] = 'Berhasil mendapatkan ID Notes Vital';
            $res['data'] = $a;

            $this->response($res, $res['status']);
        } else {
            $res['status'] = 400;
            $res['message'] = 'Data tidak ditemukan';

            $this->response($res, $res['status']);
        }
    }

    public function data_grafik_get()
    {
        $id_reg = $this->get('id_pasien_registrasi');
        // $id_visit = $this->get('id_pasien_visit');
        $type  = $this->get('type');

        if(empty($id_reg))
        {
            $res['status'] = 400;
            $res['message'] = 'Mohon masukan ID Pasien Registrasi.';
            $this->response($res,$res['status']);
        }

        // if(empty($id_visit))
        // {
        //     $res['status'] = 400;
        //     $res['message'] = 'Mohon masukan ID Pasien Visit.';
        //     $this->response($res,$res['status']);
        // }

        $data = $this->notes->get_data_grafik($id_reg);

        if($data)
        {
            $res['status'] = 200;
            $res['message'] = 'Berhasil mendapatkan data ';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        }
        else
        {
            $res['status'] = 200;
            $res['message'] = 'Gagal mendapatkan data '  ;
            $res['data'] = [];
            $this->response($res,$res['status']);
        }

    }
}
