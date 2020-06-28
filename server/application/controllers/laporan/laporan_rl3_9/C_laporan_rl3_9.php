<?php

class C_laporan_rl3_9 extends MY_Controller
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

    public function getRefRehabMedik_get () {
        $dataRefKegiatan = $this->ref_kegiatan->getKegiatanByGroup(9); // 9 == rehab medik

        foreach ($dataRefKegiatan as $key => $val) {
            switch ($val['id_parent']) {
                case 219:
                    $dataResponse['PELAYANAN REHABILITASI MEDIK'][$val['nama_kegiatan']] = 0;
                    break;
                case 220:
                    $dataResponse['MEDIS'][$val['nama_kegiatan']] = 0;
                    break;
                case 231:
                    $dataResponse['FISIOTERAPI'][$val['nama_kegiatan']] = 0;
                    break;
                case 238:
                    $dataResponse['OKUPASITERAPI'][$val['nama_kegiatan']] = 0;
                    break;
                case 252:
                    $dataResponse['TERAPI WICARA'][$val['nama_kegiatan']] = 0;
                    break;
                case 257:
                    $dataResponse['PSIKOLOGI'][$val['nama_kegiatan']] = 0;
                    break;
                case 261:
                    $dataResponse['SOSIAL MEDIS'][$val['nama_kegiatan']] = 0;
                    break;
                case 266:
                    $dataResponse['ORTOTIK PROSTETIK'][$val['nama_kegiatan']] = 0;
                    break;
            }
        }

        $dataResponse['Kunjungan Rumah'] = 0;

        if (empty($dataResponse)) {
            $res['status']  = 404;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $dataRefKegiatan;
        } else {
            $res['status']      = 200;
            $res['message']     = "Berhasil mendapatkan data.";
            $res['total_data']  = count($dataResponse);
            $res['data']        = $dataResponse;
        }
        $this->response($res, $res['status']);
    }

    public function reportPelayananRehabilitasMedik_get() {
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

            $dataOrderDetails = $this->order_dept_details->getDataOrderByGroup($get, 9);

            $dataResponse = [];
            foreach($dataOrderDetails as $key => $val) {
                switch ($val['id_parent']) {
                    case 220:
                        if (!isset($dataResponse['MEDIS'][$val['nama_kegiatan']])) $dataResponse['MEDIS'][$val['nama_kegiatan']] = 0;
                        $dataResponse['MEDIS'][$val['nama_kegiatan']]++;
                        break;
                    case 231:
                        if (!isset($dataResponse['FISIOTERAPI'][$val['nama_kegiatan']])) $dataResponse['FISIOTERAPI'][$val['nama_kegiatan']] = 0;
                        $dataResponse['FISIOTERAPI'][$val['nama_kegiatan']]++;
                        break;
                    case 238:
                        if (!isset($dataResponse['OKUPASITERAPI'][$val['nama_kegiatan']])) $dataResponse['OKUPASITERAPI'][$val['nama_kegiatan']] = 0;
                        $dataResponse['OKUPASITERAPI'][$val['nama_kegiatan']]++;
                        break;
                    case 252:
                        if (!isset($dataResponse['TERAPI WICARA'][$val['nama_kegiatan']])) $dataResponse['TERAPI WICARA'][$val['nama_kegiatan']] = 0;
                        $dataResponse['TERAPI WICARA'][$val['nama_kegiatan']]++;
                        break;
                    case 257:
                        if (!isset($dataResponse['PSIKOLOGI'][$val['nama_kegiatan']])) $dataResponse['PSIKOLOGI'][$val['nama_kegiatan']] = 0;
                        $dataResponse['PSIKOLOGI'][$val['nama_kegiatan']]++;
                        break;
                    case 261:
                        if (!isset($dataResponse['SOSIAL MEDIS'][$val['nama_kegiatan']])) $dataResponse['SOSIAL MEDIS'][$val['nama_kegiatan']] = 0;
                        $dataResponse['SOSIAL MEDIS'][$val['nama_kegiatan']]++;
                        break;
                    case 266:
                        if (!isset($dataResponse['ORTOTIK PROSTETIK'][$val['nama_kegiatan']])) $dataResponse['ORTOTIK PROSTETIK'][$val['nama_kegiatan']] = 0;
                        $dataResponse['ORTOTIK PROSTETIK'][$val['nama_kegiatan']]++;
                        break;
                }

                if ($val['id_kegiatan'] == 270) { // id kunjungan rumah
                    if (!isset($dataResponse['KUNJUNGAN']['Kunjungan Rumah'])) $dataResponse['KUNJUNGAN']['Kunjungan Rumah'] = 0;
                    $dataResponse['KUNJUNGAN']['Kunjungan Rumah']++;
                }
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
