<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan_901 extends MY_controller
{
  // Parameter yang akan dipakain di endpoint ini
    private $param = [
        'jenis_periode',
        'periode_start_1',
        'periode_end_1',
        'periode_start_2',
        'periode_end_2',
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
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
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
                    $data_response[$val['nama_departement']]['periode_1'] = $data_response[$val['nama_departement']]['periode_2'] = [
                        'baru' => 0,
                        'lama' => 0,
                        'total' => 0
                    ];

                    $data_response[$val['nama_departement']]['kunjungan_baru'] = $data_response[$val['nama_departement']]['kunjungan_lama'] = $data_response[$val['nama_departement']]['kunjungan_total'] = [
                        'tren' => 'TETAP',
                        '%' => 0,
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


    public function report_rajal_get () {
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
        $this->form_validation->set_rules('periode_start_1', 'Periode Start', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('periode_end_1', 'Periode End', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('periode_start_2', 'Periode Start', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('periode_end_2', 'Periode End', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('tipe_laporan', 'Tipe Laporan', 'in_list[0,1,2]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);

    // jika semua sdh oke, maka params akan diproses
        if ($this->form_validation->run() == true) {
            // yang wajib
            if ($get['jenis_periode'] == '' ||  $get['jenis_periode'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Jenis Periode";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['periode_start_1'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan periode start 1";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['periode_end_1'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan periode end 1";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['periode_start_2'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan periode start 2";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }
            
            if (empty($get['periode_end_2'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan periode end 2";
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

            $get['periode_start'] = $get['periode_start_1'];
            $get['periode_end'] = $get['periode_end_1'];
            $data_pasien_visit_1 = $this->visit->getDataRs($get);

            $get['periode_start'] = $get['periode_start_2'];
            $get['periode_end'] = $get['periode_end_2'];
            $data_pasien_visit_2 = $this->visit->getDataRs($get);

            $data_response = [];
            foreach($data_pasien_visit_1 as $key => $val) {
                if (!isset($data_response[$val['nama_departement']]['periode_1'])) {
                    $data_response[$val['nama_departement']] = [
                        'periode_1' => [
                            'baru' => 0,
                            'lama' => 0,
                            'total' => 0
                        ],
                        'periode_2' => [
                            'baru' => 0,
                            'lama' => 0,
                            'total' => 0
                        ]
                    ];
                }

                if ($val['is_pasien_baru'] == 1) $data_response[$val['nama_departement']]['periode_1']['baru']++;
                if ($val['is_pasien_baru'] == 0) $data_response[$val['nama_departement']]['periode_1']['lama']++;

                $data_response[$val['nama_departement']]['periode_1']['total']++;
            }

            foreach($data_pasien_visit_2 as $key2 => $val2) {
                if (!isset($data_response[$val2['nama_departement']]['periode_1'])) {
                    $data_response[$val2['nama_departement']] = [
                        'periode_1' => [
                            'baru' => 0,
                            'lama' => 0,
                            'total' => 0
                        ],
                        'periode_2' => [
                            'baru' => 0,
                            'lama' => 0,
                            'total' => 0
                        ]
                    ];
                }

                if ($val2['is_pasien_baru'] == 1) $data_response[$val2['nama_departement']]['periode_2']['baru']++;
                if ($val2['is_pasien_baru'] == 0) $data_response[$val2['nama_departement']]['periode_2']['lama']++;

                $data_response[$val2['nama_departement']]['periode_2']['total']++;
            }

            foreach($data_response as $key3 => $val3) {
                if ($val3['periode_2']['baru'] > $val3['periode_1']['baru']) {
                    $tren_kunjungan_baru = 'NAIK';
                } else if ($val3['periode_2']['baru'] < $val3['periode_1']['baru']) {
                    $tren_kunjungan_baru = 'TURUN';
                } else {
                    $tren_kunjungan_baru = 'TETAP';
                }

                $rate_kunjungan_baru = round((abs($val3['periode_1']['baru']-$val3['periode_2']['baru']) / ($val3['periode_1']['baru'] < 1 ? 1 : $val3['periode_1']['baru'])) * 100 , 1);
                $data_response[$key3]['kunjungan_baru'] = [
                    'tren' => $tren_kunjungan_baru,
                    '%' => number_format($rate_kunjungan_baru, 1, ',', '.')
                ];

                if ($val3['periode_2']['lama'] > $val3['periode_1']['lama']) {
                    $tren_kunjungan_lama = 'NAIK';
                } else if ($val3['periode_2']['lama'] < $val3['periode_1']['lama']) {
                    $tren_kunjungan_lama = 'TURUN';
                } else {
                    $tren_kunjungan_lama = 'TETAP';
                }

                $rate_kunjungan_lama = round((abs($val3['periode_1']['lama']-$val3['periode_2']['lama']) / ($val3['periode_1']['lama'] < 1 ? 1 : $val3['periode_1']['lama'])) * 100 , 1);
                $data_response[$key3]['kunjungan_lama'] = [
                    'tren' => $tren_kunjungan_lama,
                    '%' =>  number_format($rate_kunjungan_lama, 1, ',', '.')
                ];

                if ($val3['periode_2']['total'] > $val3['periode_1']['total']) {
                    $tren_kunjungan_total = 'NAIK';
                } else if ($val3['periode_2']['total'] < $val3['periode_1']['total']) {
                    $tren_kunjungan_total = 'TURUN';
                } else {
                    $tren_kunjungan_total = 'TETAP';
                }

                $rate_total = round((abs($val3['periode_1']['total']-$val3['periode_2']['total']) / ($val3['periode_1']['total'] < 1 ? 1 : $val3['periode_1']['total'])) * 100 , 1);
                $data_response[$key3]['kunjungan_total'] = [
                    'tren' => $tren_kunjungan_total,
                    '%' =>  number_format($rate_total, 1, ',', '.')
                ];
            }

            $total = [
                'total_periode_1' => count($data_pasien_visit_1),
                'total_periode_2' => count($data_pasien_visit_2)
            ];

            if (empty($data_response)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $data_response;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']       = $total;
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