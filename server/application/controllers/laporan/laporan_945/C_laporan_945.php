<?php

class C_laporan_945 extends MY_Controller
{
    private $param = [
        'order_date_start',
        'order_date_end',
        'is_reg_del_date_null',
        'is_order_del_date_null'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model3/global/M_order_rad_details', 'order_rad_details');
    }

    // Untuk validasi format tanggal di form validation
    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function index_get () {
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

        $this->form_validation->set_data($get);
        $this->form_validation->set_rules('order_date_start', 'Tanggal order Start', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('order_date_end', 'Tanggal Order End', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('is_reg_del_date_null', 'Hapus Daftar Null', 'in_list[0,1]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('is_order_del_date_null', 'Hapus Pesan Null', 'in_list[0,1]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        
        // jika semua sdh oke, maka params akan diproses
        if ($this->form_validation->run() == true) {
            // yang wajib
           if (empty($get['order_date_start'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tanggal Start";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['order_date_end'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tanggal End";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if ($get['is_reg_del_date_null'] == '' ||  $get['is_reg_del_date_null'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Hapus daftar null";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if ($get['is_order_del_date_null'] == '' ||  $get['is_order_del_date_null'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Hapus order null";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            $start_date = new DateTime($get['order_date_start']);
            $end_date   = new DateTime($get['order_date_end']);
            $end_date->modify( '+1 day' );

            $dates = new DatePeriod($start_date, new DateInterval('P1D'), $end_date);

            $total = 0;
            foreach ($dates as $date) {
                $date = $date->format('Y-m-d');
                $data_order_rad[$date] = $this->order_rad_details->get_data_order_film($get, $date);

                $data_response[$date] = [];
                foreach($data_order_rad[$date] as $key => $val) {
                    if (!isset($data_response[$date][$val['nama_dokter']])) {
                        $data_response[$date][$val['nama_dokter']] = [
                            'id_dokter' => $val['id_dokter'],
                            'jml_film_gagal' => 0
                        ];
                    }

                    $data_response[$date][$val['nama_dokter']]['jml_film_gagal'] += $val['jml_film_gagal'];
                    $total++;
                }
            }

            if (empty($data_response)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $data_response;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']  = $total;
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
}
