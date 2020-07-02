<?php

class C_laporan_941 extends MY_Controller
{
    private $param = [
        'order_date_start',
        'order_date_end',
        'is_reg_del_date_null',
        'is_order_del_date_null',
        'id_bt_master_rad_job_group',
        'ref_payment_prefix',
        'id_dept_ori',
        'group'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model3/global/M_kamar_bed_history', 'kamar_bed_history');
        $this->load->model('model3/global/M_departments', 'departments');
        $this->load->model('model3/global/M_order_rad_details', 'order_rad_details');
    }

    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }


    public function report_kunjungan_pasien_poli_igd_rajal_get () {
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
        // $this->form_validation->set_rules('id_bt_master_rad_job_group', 'ID BT Master', 'numeric', [
        //     'numeric' => 'Parameter {field}  hanya boleh numeric !'
        // ]);
        // $this->form_validation->set_rules('ref_payment_prefix', 'Ref Payment Prefix', 'in_list[A,B,C,0]', [
        //     'in_list' => 'Parameter {field}  hanya boleh numeric !'
        // ]);
        $this->form_validation->set_rules('group', 'Group', 'in_list[0,1,2]', [
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

            // if ($get['id_bt_master_rad_job_group'] == '' ||  $get['id_bt_master_rad_job_group'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan ID BT Master";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            // if ($get['ref_payment_prefix'] == '' ||  $get['ref_payment_prefix'] == null) {
            //     $res['status']  = 400;
            //     $res['message'] = "Masukan Ref Payment Prefix";
            //     $res['data']    = [];

            //     $this->response($res, $res['status']);
            // }

            if ($get['group'] == '' ||  $get['group'] == null) {
                $res['status']  = 400;
                $res['message'] = "Masukan Group";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            $data_order_rad = $this->order_rad_details->get_data_order_poli($get);

            
            if (empty($data_order_rad)) {
                $res['status']  = 404;
                $res['message'] = "Data Not Found";

                $this->response($res, $res['status']);
            }

            $data_response = [];
            foreach($data_order_rad as $key => $val) {
               if (!isset($data_response[$val['nama_dept']][$val['kategori_pemeriksaan'] . '-' . $val['jenis_pemeriksaan']])) {
                    $data_response[$val['nama_dept']]['id_dept'] = $val['id_dept'];
                    $data_response[$val['nama_dept']][$val['kategori_pemeriksaan'] . '-' . $val['jenis_pemeriksaan']] = [
                        'id_bt_master_rad_job_group' => $val['id_bt_master_rad_job_group'],
                        'bpjs' => 0,
                        'umum' => 0,
                        'asuransi' => 0,
                        'lain_lain' => 0
                    ];
               }

               if ($val['prefix_payment'] == 'A') {
                    $data_response[$val['nama_dept']][$val['kategori_pemeriksaan'] . '-' . $val['jenis_pemeriksaan']]['umum']++;
               } else if ($val['prefix_payment'] == 'B') {
                    $data_response[$val['nama_dept']][$val['kategori_pemeriksaan'] . '-' . $val['jenis_pemeriksaan']]['asuransi']++;
               } else if ($val['prefix_payment'] == 'C') {
                    $data_response[$val['nama_dept']][$val['kategori_pemeriksaan'] . '-' . $val['jenis_pemeriksaan']]['bpjs']++;
               } else {
                    $data_response[$val['nama_dept']][$val['kategori_pemeriksaan'] . '-' . $val['jenis_pemeriksaan']]['lain_lain']++;
               }

            }

            
            if (empty($data_response)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $data_response;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']   = count($data_order_rad);
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
