<?php

class C_laporan_903 extends MY_controller
{
    // Parameter yang akan dipakain di endpoint ini
    private $param = [
        'jenis_periode',
        'periode_start',
        'periode_end',
        'tipe_laporan',
    ];

    function __construct()
    {
        parent::__construct();
        $this->load->model('model3/global/M_pasien_visit', 'visit');
        $this->load->model('model3/global/M_departments', 'departments');
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
        $this->form_validation->set_rules('tipe_laporan', 'Tipe Laporan', 'in_list[0,1,2]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric 0/1/2!'
        ]);

    // jika semua sdh oke, maka params akan diproses
        if ($this->form_validation->run() == true) {
            // yang wajib
            if ($get['tipe_laporan'] == '' ||  $get['tipe_laporan'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tipe Laporan";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            $data_kegiatan_rajal = $this->departments->get_departement_by_tipe($get['tipe_laporan']);

            $data_response = [];
            foreach($data_kegiatan_rajal as $key => $val) {
                if (!isset($data_response[$val['nama_departement']])) {
                    $data_response[$val['nama_departement']] = [
                        'total'  => 0,
                        'week_1' => 0,
                        'week_2' => 0,
                        'week_3' => 0,
                        'week_4' => 0,
                        'week_5' => 0
                    ];
                }
            }

            $total_data = [
                'data_kegiatan'      => $data_kegiatan_rajal
            ];

            if (empty($data_response)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $data_response;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']  = $total_data;
                $res['data']        = $data_response;
            }
            $this->response($res, $res['status']);
        }


    // jika type paramter salah, akan ditendang

        $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }


    public function report_rajal_per_week_get () {
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
        $this->form_validation->set_rules('jenis_periode', 'Jenis Periode', 'in_list[0,1]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('periode_start', 'Periode Start', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('periode_end', 'Periode End', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('tipe_laporan', 'Tipe Laporan', 'in_list[0,1,2]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);

        if ($this->form_validation->run() == true) {
            // yang wajib
            if ($get['jenis_periode'] == '' ||  $get['jenis_periode'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Jenis Periode";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

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

            if ($get['tipe_laporan'] == '' ||  $get['tipe_laporan'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tipe Laporan";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }


            if($get['tipe_laporan'] == 0) $get['group'] = 0; //rajal
            else if ($get['tipe_laporan'] == 1) $get['group'] = 4; // igd
            else if ($get['tipe_laporan'] == 2) $get['group'] = 1; // ranap
            // tipe laporan 2 , bukan 0 dan 4

            $data_pasien_visit = $this->visit->getDataRs($get);

            if (isset($get['jenis_periode']) && $get['jenis_periode'] == '0') {
                $date_visit = 'tanggal_checkin';
            } else {
                $date_visit = 'tanggal_checkout';
            }

            $data_response = [];
            foreach($data_pasien_visit as $key => $val) {
                
                $dateArray = explode("-", $val[$date_visit]);
                $date = new DateTime($val[$date_visit]);
                $number_week = floor((date_format($date, 'j') - 1) / 7) + 1;

                if (!isset($data_response[$val['nama_departement']]['total'])) {
                    $data_response[$val['nama_departement']]['total'] = 0;
                }

                if (!isset($data_response[$val['nama_departement']]['week_'.$number_week])) {
                    $data_response[$val['nama_departement']]['week_'.$number_week] = 0;
                }

                $data_response[$val['nama_departement']]['week_'.$number_week]++;
                $data_response[$val['nama_departement']]['total']++;

            }

            if (empty($data_response)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $data_response;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data'] = count($data_pasien_visit);
                $res['data']        = $data_response;
            }
            $this->response($res, $res['status']);
       }

       $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }
}
