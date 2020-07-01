<?php

class C_laporan_902 extends MY_Controller
{
    private $param = [
        'jenis_periode',
        'periode_start',
        'periode_end',
    ];

    function __construct()
    {
        parent::__construct();
        $this->load->model('model3/global/M_kamar_bed_history', 'kamar_bed_history');
        $this->load->model('model3/global/M_departments', 'departments');
    }

  // Untuk validasi format tanggal di form validation
    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function index_get() {
        $data_departements = $this->departments->get_all_departements();
        $data_response = [];
        foreach($data_departements as $key => $val) {
            $data_response[$val['departement_name']] = [
                'kapasitas' => 0,
                'pasien_masuk' => 0,
                'hidup' => 0,
                'meninggal_<48jam' => 0,
                'meninggal_>48jam' => 0,
                'doa' => 0,
                'jumlah_meninggal' => 0,
                'lama_dirawat' => 0
            ];
        }

        if (empty($data_response)) {
            $res['status']  = 404;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $data_response;
        } else {
            $res['status']      = 200;
            $res['message']     = "Berhasil mendapatkan data.";
            $res['departments'] = $data_departements;
            $res['data']        = $data_response;
        }
        $this->response($res, $res['status']);
    }

    public function report_kamar_get () {
        $get = $this->get();
        $this->load->library('form_validation');

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
                $res['message'] = "Masukan periode start 1";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            if (empty($get['periode_end'])) {
                $res['status']  = 400;
                $res['message'] = "Masukan periode end 1";
                $res['data']    = [];

                $this->response($res, $res['status']);
            }

            $data_kamar = $this->kamar_bed_history->get_kamar_history($get);

            if (empty($data_kamar)) {
                $res['status']  = 404;
                $res['message'] = "Data Not Found";

                $this->response($res, $res['status']);
            }

            $data_response = [];
            $total_tt = 0;
            foreach($data_kamar as $key => $val) {
                if (!isset($data_response[$val['nama_departement']])) {
                    $data_response[$val['nama_departement']] = [
                        'kapasitas' => number_format($val['kapasitas']) + 0,
                        'pasien_masuk' => 0,
                        'hidup' => 0,
                        'meninggal_<48jam' => 0,
                        'meninggal_>48jam' => 0,
                        'doa' => 0,
                        'jumlah_meninggal' => 0,
                        'lama_dirawat' => 0
                    ];

                    $total_tt += $val['kapasitas'];
                }

                if (in_array($val['id_checkout'],[23])) {
                    $data_response[$val['nama_departement']]['doa']++;
                } else if (in_array($val['id_checkout'],[13,21,22,26,27,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,53])) {
                    $data_response[$val['nama_departement']]['meninggal_<48jam']++;
                    $data_response[$val['nama_departement']]['jumlah_meninggal']++;
                } else if (in_array($val['id_checkout'],[14,24,25,28,45,46,47,48,49,50,51,52])) {
                    $data_response[$val['nama_departement']]['meninggal_>48jam']++;
                    $data_response[$val['nama_departement']]['jumlah_meninggal']++;
                } else {
                    $data_response[$val['nama_departement']]['hidup']++;
                }

                $data_response[$val['nama_departement']]['pasien_masuk']++;
                $data_response[$val['nama_departement']]['lama_dirawat'] += $val['lama_dirawat'];
            }

            $total = [
                'total_data' => count($data_kamar),
                'total_tt' => $total_tt
            ];

            
            $val_1 = new DateTime($get['periode_start']);
            $val_2 = new DateTime($get['periode_end']);

            $interval = $val_1->diff($val_2);
            $diff = $interval->d;


            if ($diff == 0) $diff = 1;

            foreach($data_response as $key2 => $val2) {
                $data_response[$key2]['bor'] = [
                    'rumus' => $val2['lama_dirawat'] . ' / (' . $total_tt . ' * ' . $diff .') x 100',
                    'value' => number_format(round($val2['lama_dirawat'] / ($total_tt * $diff) * 100 , 2), 2, ',', '.')
                ];

                $data_response[$key2]['alos'] = [
                    'rumus' => $val2['lama_dirawat'] . ' / ' . $val2['pasien_masuk'],
                    'value' => number_format(round($val2['lama_dirawat'] / $val2['pasien_masuk'] , 2), 2, ',', '.')
                ];

                $data_response[$key2]['bto'] = [
                    'rumus' => $val2['pasien_masuk'] . ' / ' . $total_tt,
                    'value' => number_format(round($val2['pasien_masuk'] / $total_tt , 2), 2, ',', '.')
                ];

                $data_response[$key2]['toi'] = [
                    'rumus' => '((' . $total_tt . ' * ' . $diff .') - ' . $val2['lama_dirawat'] . ') / '. $val2['pasien_masuk'],
                    'value' => number_format(round((($total_tt * $diff) - $val2['lama_dirawat']) / $val2['pasien_masuk'] , 2), 2, ',', '.')
                ];

                $data_response[$key2]['ndr'] = [
                    'rumus' => $val2['meninggal_>48jam'] . ' / ' . $val2['pasien_masuk'] .' x 1000',
                    'value' => number_format(round($val2['meninggal_>48jam'] / $val2['pasien_masuk'] * 1000 , 2), 2, ',', '.')
                ];

                $data_response[$key2]['gdr'] = [
                    'rumus' => $val2['jumlah_meninggal'] . ' / ' . $val2['pasien_masuk'] .' x 1000',
                    'value' => number_format(round($val2['jumlah_meninggal'] / $val2['pasien_masuk'] * 1000 , 2), 2, ',', '.')
                ];
            }

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
