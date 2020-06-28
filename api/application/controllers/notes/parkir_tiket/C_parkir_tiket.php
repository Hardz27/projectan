<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_parkir_tiket extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('notes/parkir_tiket/M_parkir_tiket', 'parkir_tiket');
    }

    public function index_get()
    // $route['ruang_operasi'] = 'api/c_ruang_operasi';
    // method : GET
    {   
        if ($this->get('kode_tiket')) {
            $params = [
                'kode_tiket' => $this->get('kode_tiket'),
            ];
        }else if($this->get('kode_karcis')){
            $params = [
                'kode_karcis' => $this->get('kode_karcis'),
            ];
        }else if($this->get('kode_struk')){
            $params = [
                'kode_struk' => $this->get('kode_struk'),
            ];
        }else{
             $params = [
                'is_exit_time_null' => $this->get('is_exit_time_null'),
                'tgl_start'         => $this->get('tgl_start'),
                'tgl_end'           => $this->get('tgl_end'),
            ];
        }
        $data = $this->parkir_tiket->get($params);
        if (count($data['check']) > 0) {
            $res['status']  = 202;
            $res['message'] = "Data Sudah Checked Out";
            $res['data']    = $data;
        }elseif (empty($data)) {
            $res['status']  = 404;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $data;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data.";
            $res['data']    = $data;
        }
        $this->response($res, $res['status']);
    }

    public function index_delete()
    // $route['ruang_operasi'] = 'api/c_ruang_operasi';
    // method : DELETE
    {
        $id = $this->delete('id');

        if ($id == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID";

            $this->response($res, $res['status']);
        }

        $this->mruang_operasi->hapus($id);

        if ($this->db->affected_rows() > 0) {
            $res['status'] = 200;
            $res['message'] = "Data berhasil dihapus";
        } else {
            $res['status'] = 400;
            $res['message'] = "Data tidak ditemukan";
        }
        $this->response($res, $res['status']);
    }

    public function index_post()
    // $route['ruang_operasi'] = 'api/c_ruang_operasi';
    // method : POST
    {

        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $kode = substr(str_shuffle($str_result), 0, 8); 

        $params = [
            'kode_tiket' => $kode,
        ];
        $cek = $this->parkir_tiket->get($params);

        while ($cek['selected_parkir'] == $kode) {

            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $kode = substr(str_shuffle($str_result), 0, 8); 
            $params = [
                'kode_tiket' => $kode,
            ];
            $cek = $this->parkir_tiket->get($params);
            
        }

        $timezone = $this->parkir_tiket->getTimeZone();
        $dt = new DateTime();
        $dt->setTimezone(new DateTimeZone($timezone[0]['timezone']));
        $dt->setTimestamp(time());
        $entry_time = $dt->format('Y-m-d H:i:s');

        $last_num = $this->parkir_tiket->getLastNum();
        
        if (count($last_num) == 0) {
            $no_karcis = '100100100100100';
        }else {
            $no_karcis = ++$last_num[0]['last_num'];
        }

        if ($this->post('is_tiket_hilang') == 'on') {
            $params = [
                'kode_tiket'        => $kode,
                'no_karcis'         => $no_karcis,
                'plat_nomor'        => $this->post('plat_nomor'),
                'fee_discount'      => $this->post('fee_discount'),
                'fee_ticket_hilang' => $this->post('fee_ticket_hilang'),
                'fee_total'         => $this->post('fee_total'),
                'fee_bayar'         => $this->post('fee_bayar'),
                'fee_kembalian'     => $this->post('fee_kembalian'),
                'catatan'           => $this->post('catatan'),
                'tiket_hilang_date' => $entry_time,
                'created_date'      => $entry_time,
                'exit_time'         => $entry_time,
            ];
        }else{
            $params = [
                'kode_tiket'        => $kode,
                'entry_gate'        => $this->post('entry_gate'),
                'no_karcis'         => $no_karcis,
                'entry_time'        => $entry_time,
                'created_date'      => $entry_time,
            ];
        }
        
        
        if ($this->parkir_tiket->add($params) > 0) {
            $res['status']  = 200;
            $res['message'] = "Berhasil tambah data baru.";

        } else {
            $res['status']  = 400;
            $res['message'] = $params;
        }

        $this->response($res, $res['status']);
    }

    public function index_put()
    // $route['ruang_operasi'] = 'api/c_ruang_operasi';
    // method : PUT
    {   

        $timezone = $this->parkir_tiket->getTimeZone();
        $dt = new DateTime();
        $dt->setTimezone(new DateTimeZone($timezone[0]['timezone']));
        $dt->setTimestamp(time());
        $exit_time = $dt->format('Y-m-d H:i:s');

        $kendaraan = str_replace('Jenis Kendaraan: ', '', $this->input->get('is_kendaraan'));
        if ($kendaraan == 'Mobil') {
            $kendaraan = 1;
        }else if ($kendaraan == 'Motor') {
            $kendaraan = 2;
        }else if ($kendaraan == 'Truk') {
            $kendaraan = 3;         
        }else if ($kendaraan == 'Truk Barang') {
            $kendaraan = 4;         
        }else {
            $kendaraan = 5;         
        }

        $kode = $this->input->get('kode_tiket');
        $params = [
            'jenis_kendaraan'     => $kendaraan,
            'plat_nomor'          => $this->input->get('plat_nomor'),
            'exit_time'           => $exit_time,
            'exit_gate'           => $this->input->get('is_gate'),
            'fee_discount'        => $this->input->get('fee_discount'),
            'fee_total'           => $this->input->get('total_bayar'),
            'tiket_hilang_date'   => $this->input->get('is_tiket_hilang'),
            'catatan'             => $this->input->get('catatan'),
            'fee_per_jam'         => $this->input->get('fee_per_jam'),
            'fee_tarif'           => $this->input->get('fee_tarif'),
            'fee_bayar'           => $this->input->get('fee_bayar'),
            'fee_kembalian'       => $this->input->get('kembalian')
        ];

        if ($this->parkir_tiket->update($params, $kode) > 0) {
            $res['status']  = 200;
            $res['message'] = "Berhasil ubah data.";
        } else {
            $res['status']  = 400;
            $res['message'] = "Tidak ada perubahan data.";
        }

        $this->response($res, $res['status']);
    }
}

/* End of file C_ruang_operasi.php */
