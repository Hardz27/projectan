<?php

class C_laporan_904 extends MY_Controller
{
    public function __construct () {
        parent::__construct();
        $this->load->model('model3/global/M_pasien_visit', 'visit');
        $this->load->model('model3/global/M_departments', 'departments');

        $this->range_umur = [
            'balita' => [
                'umur' => '0-5',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'kanak-kanak' => [
                'umur' => '6-11',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'remaja awal' => [
                'umur' => '12-16',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'remaja akhir' => [
                'umur' => '17-25',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'dewasa awal' => [
                'umur' => '26-35',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'dewasa akhir' => [
                'umur' => '36-45',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'lansia awal' => [
                'umur' => '46-55',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'lansia akhir' => [
                'umur' => '56-65',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
            'manula' => [
                'umur' => '65>',
                'periode_1' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0
                ] ,
                'periode_2' => [
                    'pria' => 0,
                    'wanita' => 0,
                    'total' => 0,
                ],
                'tren_laki_laki' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_perempuan' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ],
                'tren_total' => [
                    'tren' => 'TETAP',
                    '%' => 0
                ]
            ],
        ];
    }
    private $param = [
        'jenis_periode',
        'periode_start_1',
        'periode_end_1',
        'periode_start_2',
        'periode_end_2',
        'group',
    ];

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
        $this->form_validation->set_rules('group', 'Group', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
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

            if ($get['group'] == '' ||  $get['group'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Group";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

        

            $get['periode_start'] = $get['periode_start_1'];
            $get['periode_end'] = $get['periode_end_1'];
            $data_pasien_visit_1 = $this->visit->getDataRs($get);

            $get['periode_start'] = $get['periode_start_2'];
            $get['periode_end'] = $get['periode_end_2'];
            $data_pasien_visit_2 = $this->visit->getDataRs($get);



            foreach($data_pasien_visit_1 as $key => $val) {
                $checkinDate = date('Y-m-d H:i:s' , strtotime($val['tanggal_checkin']));
                $val_1 = new DateTime($val['tanggal_lahir']);
                $val_2 = new DateTime($checkinDate);

                $interval = $val_1->diff($val_2);
                $umur = $interval->y;

                if (in_array($umur, range(0,5))) {
                    if ($val['kelamin'] == 1) $this->range_umur['balita']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['balita']['periode_1']['wanita']++;

                    $this->range_umur['balita']['periode_1']['total']++;
                } else if (in_array($umur, range(6,11))) {
                    if ($val['kelamin'] == 1) $this->range_umur['kanak-kanak']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['kanak-kanak']['periode_1']['wanita']++;

                    $this->range_umur['kanak-kanak']['periode_1']['total']++;
                } else if (in_array($umur, range(12,16))) {
                    if ($val['kelamin'] == 1) $this->range_umur['remaja awal']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['remaja awal']['periode_1']['wanita']++;

                    $this->range_umur['remaja awal']['periode_1']['total']++;
                } else if (in_array($umur, range(17,25))) {
                    if ($val['kelamin'] == 1) $this->range_umur['remaja akhir']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['remaja akhir']['periode_1']['wanita']++;

                    $this->range_umur['remaja akhir']['periode_1']['total']++;
                } else if (in_array($umur, range(26,35))) {
                    if ($val['kelamin'] == 1) $this->range_umur['dewasa awal']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['dewasa awal']['periode_1']['wanita']++;

                    $this->range_umur['dewasa awal']['periode_1']['total']++;
                } else if (in_array($umur, range(36,45))) {
                    if ($val['kelamin'] == 1) $this->range_umur['dewasa akhir']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['dewasa akhir']['periode_1']['wanita']++;

                    $this->range_umur['dewasa akhir']['periode_1']['total']++;
                } else if (in_array($umur, range(46,55))) {
                    if ($val['kelamin'] == 1) $this->range_umur['lansia awal']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['lansia awal']['periode_1']['wanita']++;

                    $this->range_umur['lansia awal']['periode_1']['total']++;
                } else if (in_array($umur, range(56,65))) {
                    if ($val['kelamin'] == 1) $this->range_umur['lansia akhir']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['lansia akhir']['periode_1']['wanita']++;

                    $this->range_umur['lansia akhir']['periode_1']['total']++;
                } else if ($umur > 65) {
                    if ($val['kelamin'] == 1) $this->range_umur['manula']['periode_1']['pria']++;
                    if ($val['kelamin'] == 2) $this->range_umur['manula']['periode_1']['wanita']++;

                    $this->range_umur['manula']['periode_1']['total']++;
                }
            }

            foreach($data_pasien_visit_2 as $key2 => $val2) {
                $checkinDate = date('Y-m-d H:i:s' , strtotime($val2['tanggal_checkin']));
                $val_1 = new DateTime($val2['tanggal_lahir']);
                $val_2 = new DateTime($checkinDate);

                $interval = $val_1->diff($val_2);
                $umur = $interval->y;

                if (in_array($umur, range(0,5))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['balita']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['balita']['periode_2']['wanita']++;

                    $this->range_umur['balita']['periode_2']['total']++;
                } else if (in_array($umur, range(6,11))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['kanak-kanak']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['kanak-kanak']['periode_2']['wanita']++;

                    $this->range_umur['kanak-kanak']['periode_2']['total']++;
                } else if (in_array($umur, range(12,16))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['remaja awal']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['remaja awal']['periode_2']['wanita']++;

                    $this->range_umur['remaja awal']['periode_2']['total']++;
                } else if (in_array($umur, range(17,25))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['remaja akhir']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['remaja akhir']['periode_2']['wanita']++;

                    $this->range_umur['remaja akhir']['periode_2']['total']++;
                } else if (in_array($umur, range(26,35))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['dewasa awal']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['dewasa awal']['periode_2']['wanita']++;

                    $this->range_umur['dewasa awal']['periode_2']['total']++;
                } else if (in_array($umur, range(36,45))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['dewasa akhir']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['dewasa akhir']['periode_2']['wanita']++;

                    $this->range_umur['dewasa akhir']['periode_2']['total']++;
                } else if (in_array($umur, range(46,55))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['lansia awal']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['lansia awal']['periode_2']['wanita']++;

                    $this->range_umur['lansia awal']['periode_2']['total']++;
                } else if (in_array($umur, range(56,65))) {
                    if ($val2['kelamin'] == 1) $this->range_umur['lansia akhir']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['lansia akhir']['periode_2']['wanita']++;

                    $this->range_umur['lansia akhir']['periode_2']['total']++;
                } else if ($umur > 65) {
                    if ($val2['kelamin'] == 1) $this->range_umur['manula']['periode_2']['pria']++;
                    if ($val2['kelamin'] == 2) $this->range_umur['manula']['periode_2']['wanita']++;

                    $this->range_umur['manula']['periode_2']['total']++;
                }
            }

            foreach($this->range_umur as $key3 => $val3) {
                if ($val3['periode_2']['pria'] > $val3['periode_1']['pria']) {
                    $tren_laki_laki = 'NAIK';
                } else if ($val3['periode_2']['pria'] < $val3['periode_1']['pria']) {
                    $tren_laki_laki = 'TURUN';
                } else {
                    $tren_laki_laki = 'TETAP';
                }

                $rate_laki_laki = round((abs($val3['periode_1']['pria']-$val3['periode_2']['pria']) / ($val3['periode_1']['pria'] < 1 ? 1 : $val3['periode_1']['pria'])) * 100 , 1);
                $this->range_umur[$key3]['tren_laki_laki'] = [
                    'tren' => $tren_laki_laki,
                    '%' =>  number_format($rate_laki_laki, 1, ',', '.')
                ];

                if ($val3['periode_2']['wanita'] > $val3['periode_1']['wanita']) {
                    $tren_perempuan = 'NAIK';
                } else if ($val3['periode_2']['wanita'] < $val3['periode_1']['wanita']) {
                    $tren_perempuan = 'TURUN';
                } else {
                    $tren_perempuan = 'TETAP';
                }

                $rate_perempuan = round((abs($val3['periode_1']['wanita']-$val3['periode_2']['wanita']) / ($val3['periode_1']['wanita'] < 1 ? 1 : $val3['periode_1']['wanita'])) * 100 , 1);
                $this->range_umur[$key3]['tren_perempuan'] = [
                    'tren' => $tren_perempuan,
                    '%' =>  number_format($rate_perempuan, 1, ',', '.')
                ];

                if ($val3['periode_2']['total'] > $val3['periode_1']['total']) {
                    $tren_total = 'NAIK';
                } else if ($val3['periode_2']['total'] < $val3['periode_1']['total']) {
                    $tren_total = 'TURUN';
                } else {
                    $tren_total = 'TETAP';
                }

                $rate_total = round((abs($val3['periode_1']['total']-$val3['periode_2']['total']) / ($val3['periode_1']['total'] < 1 ? 1 : $val3['periode_1']['total'])) * 100 , 1);
                $this->range_umur[$key3]['tren_total'] = [
                    'tren' => $tren_total,
                    '%' =>  number_format($rate_total, 1, ',', '.')
                ];
            }

           $total = [
                'total_periode_1' => count($data_pasien_visit_1),
                'total_periode_2' => count($data_pasien_visit_2)
            ];

            if (empty($this->range_umur)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $this->range_umur;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']  = $total;
                $res['data']        = $this->range_umur;
            }
            $this->response($res, $res['status']);
       }

       $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }
}
