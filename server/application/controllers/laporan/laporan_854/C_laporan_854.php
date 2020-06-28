<?php


class C_laporan_854 extends MY_Controller
{

    private $param = [
        'order_date_start',
        'order_date_end',
        'is_order_del_date_null',
        'is_reg_del_date_null',
        'id_ref_payment',
        'id_dpjp',
        'id_dept_ruang_rawat',
        'id_dept_ori',
        'is_cito',
        'is_pasien_baru',
        'search',
        'offset',
        'limit',
        'id_bt_master_rad_job_group'
    ];

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model3/global/M_order_rad_details_server_side', 'order_rad_details_server_side');
        // $this->load->model('model3/global/M_payment_rad_details', 'payment_rad_details');
    }

    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function get_all_get()
    {
        $get = $this->get();

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
        $this->form_validation->set_rules('id_ref_payment', 'ID ref Payment', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('id_dpjp', 'ID DPJP', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('id_dept_ruang_rawat', 'ID Dept ruang rawat', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('id_dept_ori', 'ID Dept Ori', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('is_cito', 'Is Cito', 'in_list[0,1]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('is_pasien_baru', 'Is Pasien Baru', 'in_list[0,1]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('offset', 'Offset', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('limit', 'Limit', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('id_bt_master_rad_job_group', 'ID BT Master Rad Jod Group', 'numeric', [
            'numeric' => 'Parameter {field}  hanya boleh numeric !'
        ]);


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
                $res['message'] = "Input reg del date hanya 0/1";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if ($get['is_order_del_date_null'] == '' ||  $get['is_order_del_date_null'] == null) {
                $res['status']  = 400;
                $res['message'] = "Input order del date hanya 0/1";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            // if ($get['id_ref_payment'] == '' ||  $get['id_ref_payment'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan ID Ref Payment (Numerik)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['id_dpjp'] == '' ||  $get['id_dpjp'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan ID DPJP (Numerik)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['id_dept_ruang_rawat'] == '' ||  $get['id_dept_ruang_rawat'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan ID Dept Ruang Rawat (Numerik)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['id_dept_ori'] == '' ||  $get['id_dept_ori'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan ID Dept Ori (Numerik)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['is_cito'] == '' ||  $get['is_cito'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Input Is Cito (0/1)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['is_pasien_baru'] == '' ||  $get['is_pasien_baru'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Input Pasien baru (0/1)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['offset'] == '' ||  $get['offset'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan Offset (Numerik)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['limit'] == '' ||  $get['limit'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan Limit (Numerik)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['id_bt_master_rad_job_group'] == '' ||  $get['id_bt_master_rad_job_group'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan ID BT Master Rad Job Group (Numerik)";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            $rawData = $this->order_rad_details_server_side->get_all($get);
            $total_data_before_limit = $rawData['total_data'];

            $rawData = $rawData['data'];
            if (empty($rawData)) {
                $res['status']  = 404;
                $res['message'] = "Data Not Found";

                $this->response($res, $res['status']);
            }

            $data = $this->mapForJson($rawData);

            $total = [
                'total_data' => $total_data_before_limit,
                'total_filtered' => sizeof($data)
            ];

            if (empty($data)) {
                $res['status']      = 404;
                $res['message']     = "Data tidak tersedia...";
                $res['data']        = $data;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total']       = $total;
                $res['data']        = $data;
            }
            $this->response($res, $res['status']);
        }


    // jika type paramter salah, akan ditendang
        $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }

    public function get_by_id_get($id)
    {
        $get = $this->get();

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

        if ($this->form_validation->run() == true) {

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


            $rawData = $this->order_rad_details_server_side->find_by_id($id, $get);
            if (empty($rawData)) {
                $res['status']  = 404;
                $res['message'] = "Data Not Found";

                $this->response($res, $res['status']);
            }

            $data = $this->mapForJson($rawData);

            if (empty($data)) {
                $res['status']      = 404;
                $res['message']     = "Data tidak tersedia...";
                $res['data']        = $data;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total']       = count($data);
                $res['data']        = $data;
            }
            $this->response($res, $res['status']);
        }


    // jika type paramter salah, akan ditendang
        $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);

    }


    public function mapForJson($rawData)
    {
        $data = [];
        foreach ($rawData as $k => $v) {
            if ($v['status_update'] == 0) {
                $status_update = 'pending';
            } elseif ($v['status_update'] == 1) {
                $status_update = 'pre-approved';
            } elseif ($v['status_update'] == 2) {
                $status_update = 'approved';
            } elseif ($v['status_update'] == 3) {
                $status_update = 'need correction';
            }

            $data[] = [
                'id' => $v['id'],
                'nama_bt_order_rad' => $v['nama_bt_order_rad'],
                'harga_bt_order_rad' => $v['harga_bt_order_rad'],
                'created_date' => $v['created_date'],
                'created_by' => $v['created_by'],
                'del_date' => $v['del_date'],
                'del_by' => $v['del_by'],
                'id_order_rad' => [
                    'id' => $v['order_rad_details.order_rad.id'],
                    'no_order_rad' => $v['order_rad_details.order_rad.no_order_rad'],
                    'bt_master_rad_job_group' => [
                        'id_bt_master_rad_job_group' => $v['id_bt_master_rad_job_group'],
                        'kategori_pemeriksaan' => $v['kategori_pemeriksaan'],
                        'jenis_pemeriksaan' => $v['jenis_pemeriksaan'],
                    ],
                    'id_visit' => [
                        'id_pasien_visit' => $v['order_rad.visit.id_pasien_visit'],
                        'no_visit' => $v['order_rad.visit.no_visit'],
                        'id_pasien_registrasi' => [
                            'id_pasien_registrasi' => $v['visit.pasien_registrasi.id_pasien_registrasi'],
                            'id_users_pasien' => [
                                'user_id' => $v['pasien_registrasi.id_users_pasien.user_id'],
                                'no_rm' => $v['pasien_registrasi.id_users_pasien.no_rm'],
                                'bpjs_id' => $v['pasien_registrasi.id_users_pasien.bpjs_id'],
                                'number_id' => $v['pasien_registrasi.id_users_pasien.number_id'],
                                'mobile_phone' => $v['pasien_registrasi.id_users_pasien.mobile_phone'],
                                'full_name' => $v['pasien_registrasi.id_users_pasien.full_name'],
                                'address' => $v['pasien_registrasi.id_users_pasien.address'],
                                'email' => $v['pasien_registrasi.id_users_pasien.email'],
                                'id_kel' => $v['pasien_registrasi.id_users_pasien.id_kel'],
                                'blood_type' => $this->bloodType($v['pasien_registrasi.id_users_pasien.blood_type']),
                                'gender' => $this->gender($v['pasien_registrasi.id_users_pasien.gender']),
                                'dob' => $v['pasien_registrasi.id_users_pasien.dob'],
                            ],
                            'is_pasien_baru' => $v['visit.pasien_registrasi.is_pasien_baru'],
                            'no_reg' => $v['visit.pasien_registrasi.no_reg'],
                            'id_ref_payment' => [
                                'id_ref_payment' => $v['pasien_registrasi.ref_payment.id_ref_payment'],
                                'id_kegiatan' => $v['pasien_registrasi.ref_payment.id_kegiatan'],
                                'payment' => $v['pasien_registrasi.ref_payment.payment'],
                                'prefix' => $v['pasien_registrasi.ref_payment.prefix'],
                                'status' => $v['pasien_registrasi.ref_payment.status'],
                                'sub_payment' => $v['pasien_registrasi.ref_payment.sub_payment'],
                                'payor_cd' => $v['pasien_registrasi.ref_payment.payor_cd'],
                                'jenis_cara_bayar' => $v['pasien_registrasi.ref_payment.jenis_cara_bayar'],
                            ],
                            'id_dpjp' => [
                                'user_id' => $v['pasien_registrasi.id_hrd_dokter.user_id'],
                                'no_rm' => $v['pasien_registrasi.id_hrd_dokter.no_rm'],
                                'full_name' => $v['pasien_registrasi.id_hrd_dokter.full_name'],
                            ],
                            'id_dept_ruang_rawat' => [
                                'departement_id' => $v['pasien_registrasi.id_dept_ruang_rawat.departement_id'],
                                'departement_name' => $v['pasien_registrasi.id_dept_ruang_rawat.departement_name'],
                                'rs_key' => $v['pasien_registrasi.id_dept_ruang_rawat.rs_key'],
                            ],
                            'rs_key' => $v['visit.pasien_registrasi.rs_key'],
                            'created_by' => [
                                'user_id' => $v['visit.pasien_registrasi_created_by.user_id'],
                                'full_name' => $v['visit.pasien_registrasi_created_by.full_name'],
                            ],
                            'checkin_time' => $v['visit.pasien_registrasi.checkin_time'],
                            'checkout_time' => $v['visit.pasien_registrasi.checkout_time'],
                            'checkout_by' => [
                                'user_id' => $v['visit.pasien_registrasi_checkout_by.user_id'],
                                'full_name' => $v['visit.pasien_registrasi_checkout_by.full_name'],
                            ],
                            'code_icd10_awal' => $v['visit.pasien_registrasi.code_icd10_awal'],
                            'del_time' => $v['visit.pasien_registrasi.del_time'],
                            'del_by_user' => [
                                'user_id' => $v['visit.pasien_registrasi_del_by_user.user_id'],
                                'full_name' => $v['visit.pasien_registrasi_del_by_user.full_name'],
                            ]
                        ],
                        'id_departemen' => [
                            'departement_id' => $v['visit.departemen.departement_id'],
                            'departement_name' => $v['visit.id_departemen.departement_name'],
                            'rs_key' => $v['visit.id_departemen.rs_key'],
                        ],
                        'id_pj_ruangan' => [
                            'user_id' => $v['visit.id_hrd.user_id'],
                            'full_name' => $v['visit.id_hrd.full_name'],
                        ],
                        'checkin_time' => $v['order_rad.visit.checkin_time'],
                        'by_id_user' => [
                            'user_id' => $v['visit.by_id_user.user_id'],
                            'full_name' => $v['visit.by_id_user.full_name'],
                        ],
                        'del_time' => $v['order_rad.visit.del_time'],
                        'del_by' => $v['order_rad.visit.del_by'],
                    ],
                    'id_dept_ori' => [
                        'departement_id' => $v['order_rad.dept_ori.departement_id'],
                        'departement_name' => $v['order_rad.dept_ori.departement_name'],
                        'rs_key' => $v['order_rad.dept_ori.rs_key'],
                    ],
                    'id_dept_dest' => [
                        'departement_id' => $v['order_rad.dept_dest.departement_id'],
                        'departement_name' => $v['order_rad.dept_dest.departement_name'],
                        'rs_key' => $v['order_rad.dept_dest.rs_key'],
                    ],
                    'is_cito' => $this->isCito($v['order_rad_details.order_rad.is_cito']),
                    'klinis_pasien' => $v['order_rad_details.order_rad.klinis_pasien'],
                    'created_by' => $v['order_rad_details.order_rad.created_by'],
                    'created_date' => $v['order_rad_details.order_rad.created_date'],
                    'del_date' => $v['order_rad_details.order_rad.del_date'],
                    'del_by' => $v['order_rad_details.order_rad.del_by'],
                ],
                'notes_hasil_rad_details_log' => [
                    'id_notes_hasil_rad_details' => $v['id_notes_hasil_rad_details'],
                    'date_update' => $v['date_update'],
                    'hasil_baca' => $v['hasil_baca'],
                    'kesan_hasil_expertise' => $v['kesan_hasil_expertise'],
                    'pesan' => $v['pesan'],
                    'kV' => $v['kV'],
                    'mA' => $v['mA'],
                    's' => $v['s'],
                    'mAs' => $v['mAs'],
                    'jml_film' => $v['jml_film'],
                    'id_ref_rad_jenis_film' => $v['id_ref_rad_jenis_film'],
                    'jml_film_gagal' => $v['jml_film_gagal'],
                    'id_ref_rad_jenis_film_gagal' => $v['id_ref_rad_jenis_film_gagal'],
                    'jml_ekspos' => $v['jml_ekspos'],
                    'tingkat_dosis_radiasi' => $v['tingkat_dosis_radiasi'],
                    'status_update' => $status_update,
                    'data_users_petugas_update' => $v['data_users_petugas_update'],
                    'digital_signature_users_petugas_update' => $v['digital_signature_users_petugas_update'],
                    'digital_signature_users_dept_dokter_digital_signature' => $v['digital_signature_users_dept_dokter_digital_signature'],
                    'data_users_dept_dokter_digital_signature' => $v['data_users_dept_dokter_digital_signature']
                ]
            ];
        }
        return $data;
    }

    public function gender($value)
    {
        $gender = "";
        $gender = $value == '1' ? 'laki-laki' : $gender;
        $gender = $value == '2' ? 'perempuan' : $gender;
        return $gender;
    }
    public function bloodType($value='')
    {
        $bloodType = "";
        $bloodType = $value == '1' ? '' : $bloodType;
        $bloodType = $value == '1'? 'O+' : $bloodType;
        $bloodType = $value == '2'? 'A+' : $bloodType;
        $bloodType = $value == '3'? 'B+' : $bloodType;
        $bloodType = $value == '4'? 'AB+' : $bloodType;
        $bloodType = $value == '5'? 'O-' : $bloodType;
        $bloodType = $value == '6'? 'A-' : $bloodType;
        $bloodType = $value == '7'? 'B-' : $bloodType;
        $bloodType = $value == '8'? 'AB-' : $bloodType;
        return $bloodType;
    }

    public function isCito($value='')
    {
        $isCito = "";
        $isCito = $value == '0' ? 'Non-Cito' : $isCito;
        $isCito = $value == '1' ? 'Cito' : $isCito;
        return $isCito;
    }
}
