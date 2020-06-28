<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_LRS_902 extends MY_controller
{
    // Parameter yang akan dipakain di endpoint ini
    private $param = [
        'periode_start',
        'periode_end',
        'jenis_periode',
        'id_ref_payment',
    ];

    function __construct()
    {
        parent::__construct();
        $this->load->model('model3/global/M_kamar_bed_history', 'kamar_bed_history');
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
        $this->form_validation->set_rules('id_ref_payment', 'ID Ref Payment', 'numeric', [
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

            if ($get['id_ref_payment'] == '' ||  $get['id_ref_payment'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan ID Ref Payment";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

           

            if (empty($data)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $data;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']  = $total_data;
                $res['data']        = $data['result'];
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
