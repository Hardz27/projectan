<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan_860 extends MY_controller
{
  // Parameter yang akan dipakain di endpoint ini
    private $param = [
        'periode_start',
        'periode_end',
        'jenis_periode',
    ];

    function __construct()
    {
        parent::__construct();
        $this->load->model('model3/global/M_pasien_visit', 'visit');
        $this->load->model('model3/global/M_pasien_registrasi', 'registrasi');
        $this->load->model('model3/global/M_departments_group', 'departments_group');
    }

  // Untuk validasi format tanggal di form validation
    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function index_get()
    {
        $get = $this->get();
        $this->load->library('form_validation');

    // cek paramter yang diperbolehkan digunakan di endpoint ini
        foreach ($get as $key => $val) {
            if (!in_array($key, $this->param)) {
                $res['status'] = 500;
                $res['message'] = "Error ! Parameter '" .  $key . "' tidak diperbolehkan !!!";
                $this->response($res, $res['status']);
            }
        }

    // form_validation untuk setiap parameter
        $this->form_validation->set_data($get);
        $this->form_validation->set_rules('periode_start', 'Periode Start', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('periode_end', 'Periode End', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('jenis_periode', 'Jenis Periode', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);

    // jika semua sdh oke, maka params akan diproses
        if ($this->form_validation->run() == true) {
            // yang wajib
            if (empty($get['periode_start'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan periode start";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['periode_end'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan periode end";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if ($get['jenis_periode'] == '' ||  $get['jenis_periode'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Jenis Periode";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            $dataCaraBayar = $this->visit->get_data_cara_bayar($get);
            $data_cara_bayar_rawat_inap = $this->registrasi->get_data_cara_bayar($get);

            $idRawatJalan   = $this->departments_group->get_id_by_nama_type('rawat jalan');
            $idUGD          = $this->departments_group->get_id_by_nama_type('UGD');
            $idRawatInap    = $this->departments_group->get_id_by_nama_type('rawat inap');
            $idRadiologi    = $this->departments_group->get_id_by_nama_type('radiologi');
            $idLab          = $this->departments_group->get_id_by_nama_type('laboratorium');

            $dataResponse = [];
            $total_visit = 0;
            foreach ($dataCaraBayar as $key => $val) {
                // cek tipe
                switch ($val->department_tipe) {
                    case $idRawatJalan:
                        if (!isset($dataResponse[$val->nama_payment]['rawat_jalan'])) $dataResponse[$val->nama_payment]['rawat_jalan'] = 0;
                        $dataResponse[$val->nama_payment]['rawat_jalan']++;
                        $total_visit++;
                        break;
                    case $idUGD:
                        if (!isset($dataResponse[$val->nama_payment]['ugd'])) $dataResponse[$val->nama_payment]['ugd'] = 0;
                        $dataResponse[$val->nama_payment]['ugd']++;
                        $total_visit++;
                        break;
                    case $idRadiologi:
                        if (!isset($dataResponse[$val->nama_payment]['radiologi'])) $dataResponse[$val->nama_payment]['radiologi'] = 0;
                        $dataResponse[$val->nama_payment]['radiologi']++;
                        $total_visit++;
                        break;
                    case $idLab:
                        if (!isset($dataResponse[$val->nama_payment]['lab'])) $dataResponse[$val->nama_payment]['lab'] = 0;
                        $dataResponse[$val->nama_payment]['lab']++;
                        $total_visit++;
                        break;
                    case $idRawatInap:
                        break;
                    default:
                        if (!isset($dataResponse[$val->nama_payment]['lain_lain'])) $dataResponse[$val->nama_payment]['lain_lain'] = 0;
                        $dataResponse[$val->nama_payment]['lain_lain']++;
                        $total_visit++;
                        break;
                }

                $dataResponse[$val->nama_payment]['id_ref_payment'] = $val->id_payment;
            }

            $total_regis = 0;
            foreach ($data_cara_bayar_rawat_inap as $key2 => $val2) {
                if (!isset($dataResponse[$val2->nama_payment]['rawat_inap'])) $dataResponse[$val2->nama_payment]['rawat_inap'] = 0;
                $dataResponse[$val2->nama_payment]['rawat_inap']++;

                $dataResponse[$val2->nama_payment]['id_ref_payment'] = $val2->id_payment;
                $total_regis++;
            }

            $total_data = [
                'record_visit' => $total_visit,
                'record_regis' => $total_regis,
            ];

            if (empty($dataResponse)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $dataResponse;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']  = $total_data;
                $res['data']        = $dataResponse;
            }
            $this->response($res, $res['status']);
        }

    // jika type paramter salah, akan ditendang

        $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }
}
