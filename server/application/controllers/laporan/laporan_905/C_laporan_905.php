<?php

class C_laporan_905 extends MY_Controller
{

    private $param = [
        'jenis_periode',
        'periode_start_1',
        'periode_end_1',
        'periode_start_2',
        'periode_end_2',
        'jenis_rawat',
        'tipe_laporan',
    ];

    function __construct()
    {
        parent::__construct();
        $this->load->model('model3/global/M_kamar_bed_history', 'kamar_bed_history');
        $this->load->model('model3/global/M_ref_checkout', 'ref_checkout');
        $this->load->model('model3/global/M_departments', 'departments');
        $this->load->model('model3/global/M_pasien_registrasi', 'registrasi');
    }

  // Untuk validasi format tanggal di form validation
    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function index_get() {
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
        if ($this->form_validation->run() == true) {
            // yang wajib
            if ($get['tipe_laporan'] == '' ||  $get['tipe_laporan'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tipe Laporan";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            $data_checkout = $this->ref_checkout->get_data_checkout($get);

            $data_response = [];
            foreach($data_checkout as $key => $val) {
                $data_response[$val['nama_checkout']] = [
                    'pasien_lama' => [
                        'periode_1' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ],
                        'periode_2' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ]
                    ],
                    'pasien_baru' => [
                        'periode_1' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ],
                        'periode_2' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ]
                    ]
                ];
            }


            if (empty($data_response)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $data_response;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']  = count($data_checkout);
                $res['data']        = $data_response;
            }
            $this->response($res, $res['status']);
        }
        
        $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }

    public function report_kunjungan_pasien_berdasarkan_checkout_get () {
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
        $this->form_validation->set_rules('jenis_rawat', 'Jenis Rawat', 'in_list[0,1,2]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('tipe_laporan', 'Tipe Laporan', 'in_list[0,1]', [
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

            if ($get['jenis_rawat'] == '' ||  $get['jenis_rawat'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Jenis Rawat";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if ($get['tipe_laporan'] == '' ||  $get['tipe_laporan'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tipe Laporan";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }


            $get['periode_start'] = $get['periode_start_1'];
            $get['periode_end'] = $get['periode_end_1'];
            $data_registrasi_1 = $this->registrasi->get_data_checkout($get);

            $get['periode_start'] = $get['periode_start_2'];
            $get['periode_end'] = $get['periode_end_2'];
            $data_registrasi_2 = $this->registrasi->get_data_checkout($get);

            $data_response = [];
            foreach($data_registrasi_1 as $key => $val) {
                if (!isset($data_response[$val['nama_checkout']])) {
                    $data_response[$val['nama_checkout']] = [
                        'pasien_lama' => [
                            'periode_1' => [
                                'pria' => 0,
                                'wanita' => 0,
                                'total' => 0
                            ],
                            'periode_2' => [
                                'pria' => 0,
                                'wanita' => 0,
                                'total' => 0
                            ]
                        ],
                        'pasien_baru' => [
                            'periode_1' => [
                                'pria' => 0,
                                'wanita' => 0,
                                'total' => 0
                            ],
                            'periode_2' => [
                                'pria' => 0,
                                'wanita' => 0,
                                'total' => 0
                            ]
                        ]
                    ];
                }

                if ($val['is_pasien_baru'] == 1 && $val['gender'] == 1) {
                    $data_response[$val['nama_checkout']]['pasien_baru']['periode_1']['pria']++;
                    $data_response[$val['nama_checkout']]['pasien_baru']['periode_1']['total']++;
                }
                if ($val['is_pasien_baru'] == 1 && $val['gender'] == 2) {
                    $data_response[$val['nama_checkout']]['pasien_baru']['periode_1']['wanita']++;
                    $data_response[$val['nama_checkout']]['pasien_baru']['periode_1']['total']++;
                }

                if ($val['is_pasien_baru'] == 0 && $val['gender'] == 1) {
                    $data_response[$val['nama_checkout']]['pasien_lama']['periode_1']['pria']++;
                    $data_response[$val['nama_checkout']]['pasien_lama']['periode_1']['total']++;
                }
                if ($val['is_pasien_baru'] == 0 && $val['gender'] == 2) {
                    $data_response[$val['nama_checkout']]['pasien_lama']['periode_1']['wanita']++;
                    $data_response[$val['nama_checkout']]['pasien_lama']['periode_1']['total']++;
                }
            }

            foreach($data_registrasi_2 as $key2 => $val2) {
                if (!isset($data_response[$val2['nama_checkout']]['pasien_lama']['periode_1']) || !isset($data_response[$val2['nama_checkout']]['pasien_baru']['periode_1'])) {
                    $data_response[$val2['nama_checkout']]['pasien_lama'] = [
                        'periode_1' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ],
                        'periode_2' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ]
                    ];

                    $data_response[$val2['nama_checkout']]['pasien_baru'] = [
                        'periode_1' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ],
                        'periode_2' => [
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        ]
                    ];
                }

                if ($val2['is_pasien_baru'] == 1 && $val2['gender'] == 1) {
                    $data_response[$val2['nama_checkout']]['pasien_baru']['periode_2']['pria']++;
                    $data_response[$val2['nama_checkout']]['pasien_baru']['periode_2']['total']++;
                }
                if ($val2['is_pasien_baru'] == 1 && $val2['gender'] == 2) {
                    $data_response[$val2['nama_checkout']]['pasien_baru']['periode_2']['wanita']++;
                    $data_response[$val2['nama_checkout']]['pasien_baru']['periode_2']['total']++;
                }

                if ($val2['is_pasien_baru'] == 0 && $val2['gender'] == 1) {
                    $data_response[$val2['nama_checkout']]['pasien_lama']['periode_2']['pria']++;
                    $data_response[$val2['nama_checkout']]['pasien_lama']['periode_2']['total']++;
                }
                if ($val2['is_pasien_baru'] == 0 && $val2['gender'] == 2) {
                    $data_response[$val2['nama_checkout']]['pasien_lama']['periode_2']['wanita']++;
                    $data_response[$val2['nama_checkout']]['pasien_lama']['periode_2']['total']++;
                }
            }

            foreach ($data_response as $key3 => $val3) {
                $total_pasien_periode_1 = $val3['pasien_lama']['periode_1']['total'] + $val3['pasien_baru']['periode_1']['total'];
                $total_pasien_periode_2 = $val3['pasien_lama']['periode_2']['total'] + $val3['pasien_baru']['periode_2']['total'];

                $data_response[$key3]['total_periode_1'] = $total_pasien_periode_1;
                $data_response[$key3]['total_periode_2'] = $total_pasien_periode_2;

                if ($data_response[$key3]['total_periode_2'] > $data_response[$key3]['total_periode_1']) {
                    $data_response[$key3]['tren'] = 'NAIK';
                } else if ($data_response[$key3]['total_periode_2'] < $data_response[$key3]['total_periode_1']) {
                    $data_response[$key3]['tren'] = 'TURUN';
                } else {
                    $data_response[$key3]['tren'] = 'TETAP';
                }
            }

            $total = [
                'total_periode_1' => count($data_registrasi_1),
                'total_periode_2' => count($data_registrasi_2)
            ];

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

       $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }
}
