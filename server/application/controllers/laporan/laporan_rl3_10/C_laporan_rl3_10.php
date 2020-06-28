<?php

class C_laporan_rl3_10 extends MY_Controller
{
   private $param = [
        'periode_start',
        'periode_end',
        'is_reg_del_date_null',
        'is_visit_del_date_null',
        'is_order_del_date_null'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model6/global/M_order_dept_details', 'order_dept_details');
        $this->load->model('model6/global/M_ref_kegiatan', 'ref_kegiatan');
        $this->load->library('form_validation');
    }

    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function getRefKegiatan_get () {
        $dataRefKegiatan = $this->ref_kegiatan->getKegiatanByGroup(10);

        foreach ($dataRefKegiatan as $key => $val) {
            if ($val['is_child'] == "0") {
                continue;
            }
        }

        if (empty($dataRefKegiatan)) {
            $res['status']  = 404;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $dataRefKegiatan;
        } else {
            $res['status']      = 200;
            $res['message']     = "Berhasil mendapatkan data.";
            $res['total_data']  = count($dataRefKegiatan);
            $res['data']        = $dataRefKegiatan;
        }
        $this->response($res, $res['status']);
    }

    public function reportOneLevel_get() {
        $get = $this->get();
        
        foreach ($get as $key => $val) {
            if (!in_array($key, $this->param)) {
                $res['status'] = 500;
                $res['message'] = "Error ! Parameter '" .  $key . "' tidak diperbolehkan !!!";
                $this->response($res, $res['status']);
            }
        }

        $this->form_validation->set_data($get);
        $this->form_validation->set_rules('periode_start', 'Tanggal Start', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('periode_end', 'Tanggal End', 'callback_valid_date', [
            'valid_date' => 'Format tanggal {field} tidak valid !'
        ]);
        $this->form_validation->set_rules('is_reg_del_date_null', 'Hapus Daftar Null', 'in_list[1,2]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('is_visit_del_date_null', 'Hapus Visit Null', 'in_list[1,2]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);
        $this->form_validation->set_rules('is_order_del_date_null', 'Hapus Pesan Null', 'in_list[1,2]', [
            'in_list' => 'Parameter {field}  hanya boleh numeric !'
        ]);

        // jika semua sdh oke, maka params akan diproses
        if ($this->form_validation->run() == true) {
            // yang wajib
           if (empty($get['periode_start'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tanggal Start";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['periode_end'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan Tanggal End";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['is_reg_del_date_null'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan Hapus daftar null";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['is_visit_del_date_null'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan Hapus daftar null";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['is_order_del_date_null'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan Hapus order null";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            $dataOrderDetails = $this->order_dept_details->getDataOrderByGroup($get, 10);

            $dataResponse = [];
            foreach ($dataOrderDetails as $key => $val) {
                if (!isset($dataResponse[$val['nama_kegiatan']])) $dataResponse[$val['nama_kegiatan']] = 0;
                $dataResponse[$val['nama_kegiatan']]++;

            }

            if (empty($dataResponse)) {
                $res['status']  = 404;
                $res['message'] = "Data tidak tersedia...";
                $res['data']    = $dataResponse;
            } else {
                $res['status']      = 200;
                $res['message']     = "Berhasil mendapatkan data.";
                $res['total_data']  = count($dataOrderDetails);
                $res['data']        = $dataResponse;
            }
            $this->response($res, $res['status']);
        }


        $res['status']  = 500;
        $errors = $this->form_validation->error_array();
        $res['message'] = $errors;
        $this->response($res, $res['status']);
    }
}
