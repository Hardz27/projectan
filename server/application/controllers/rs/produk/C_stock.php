<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_stock extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rs/produk/m_stock', 'stock');
        $this->load->model('rs/M_hrd', 'm_hrd');
    }

    public function stock_per_id_ro_details_get()
    {
        $status = null;
        $id_dept = $this->get('id_dept');
        if (!empty($this->get('status'))) {
            $status = $this->get('status');
        }
        if (!empty($this->get('tanggal'))) {
            $tanggal = $this->get('tanggal');
        }
        // $this->response($tanggal, 200);

        $data = $this->stock->get($id_dept, $status, $tanggal);

        if ($this->db->affected_rows() > 0) {
            $res['status'] = 200;
            $res['message'] = 'Berhasil mendapatkan data';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        } else {
            $res['status'] = 200;
            $res['message'] = 'Gagal mendapatkan data';
            $res['data'] = [];
            $this->response($res, $res['status']);
        }
    }

    public function stock_per_id_produk_get()
    {
        $status = '';
        $id_dept = $this->get('id_dept');
        if (!empty($this->get('status'))) {
            $status = $this->get('status');
        }
        if (!empty($this->get('tanggal'))) {
            $tanggal = $this->get('tanggal');
        }

        $data = $this->stock->get_by_id_produk($id_dept, $status, $tanggal);

        if ($this->db->affected_rows() > 0) {
            $res['status'] = 200;
            $res['message'] = 'Berhasil mendapatkan data';
            $res['data'] = $data;
            $this->response($res, $res['status']);
        } else {
            $res['status'] = 200;
            $res['message'] = 'Gagal mendapatkan data';
            $res['data'] = [];
            $this->response($res, $res['status']);
        }
    }

    public function harga_produk_get()
    {
        $id = '';

        if (!empty($this->get('id'))) {
            $id = $this->get('id');
        }

        $harga = $this->stock->get_harga_produk($id);
        if ($harga) {
            $res['status'] = 200;
            $res['message'] = 'Berhasil mendapatkan list harga produk';
            $res['data'] = $harga;
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal mendapatkan data';
        }

        $this->response($res, $res['status']);
    }

    public function harga_produk_post()
    {
        $post = $this->post();

        if ($post == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan data";

            $this->response($res, $res['status']);
        }

        if ($post['created_by'] == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID petugas input";

            $this->response($res, $res['status']);
        }

        $petugas_input = $this->m_hrd->get_by_user_id($post['created_by']);
        if (!$petugas_input) {
            $res['status'] = 400;
            $res['message'] = "Petugas input tidak dikenal";

            $this->response($res, $res['status']);
        }

        $params = [
            'id_produk' => $post['id_produk'],
            'harga_jual_sat_kecil' => $post['harga'],
            'created_by' => $petugas_input['nama'],
            'created_date' => date('Y-m-d H:i:s')
        ];

        $add = $this->stock->add_harga($params);

        if ($add) {
            $res['status'] = 200;
            $res['message'] = 'Berhasil input harga baru';
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal input harga baru';
        }

        $this->response($res, $res['status']);
    }

    public function opname_per_id_produk_get()
    {
        if (empty($this->get('id_produk'))) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID produk";

            $this->response($res, $res['status']);
        }

        $id_produk = $this->get('id_produk');
        $id_departement = null;
        if (!empty($this->get('id_departement'))) {
            $id_departement = $this->get('id_departement');
        }

        $data = $this->stock->get_per_produk($id_produk, $id_departement);

        if ($data) {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data Aktif Resep';
            $res['data']    = $data;
        } else {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data , data kosong';
            $res['data']    = [];
        }

        $this->response($res, $res['status']);
    }

    public function opname_per_id_ro_details_get()
    {
        if (empty($this->get('id_ro_details'))) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID Mutasi RO Details";

            $this->response($res, $res['status']);
        }

        $id_ro_details = $this->get('id_ro_details');

        $id_departement = null;
        if (!empty($this->get('id_departement'))) {
            $id_departement = $this->get('id_departement');
        }


        $data = $this->stock->get_by_id_ro_detail_all($id_ro_details, $id_departement);

        if ($data) {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data detail per id_Mutasi_ro_details';
            $res['data']    = $data;
        } else {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data , data kosong';
            $res['data']    = [];
        }

        $this->response($res, $res['status']);
    }

    public function produk_detail_get()
    {
        if (empty($this->get('id_produk'))) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID produk";

            $this->response($res, $res['status']);
        }

        $id_produk = $this->get('id_produk');
        $id_departement = null;
        if (!empty($this->get('id_departement'))) {
            $id_departement = $this->get('id_departement');
        }

        $data = $this->stock->get_id_per_produk($id_produk, $id_departement);

        if ($data) {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data Aktif Resep';
            $res['data']    = $data;
        } else {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data , data kosong';
            $res['data']    = [];
        }

        $this->response($res, $res['status']);
    }



    public function id_ro_detail_get()
    {
        if (empty($this->get('id_ro_details'))) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID ro details";

            $this->response($res, $res['status']);
        }

        $id_ro_details = $this->get('id_ro_details');
        $id_departement = null;

        if (!empty($this->get('id_departement'))) {
            $id_departement = $this->get('id_departement');
        }

        $data = $this->stock->get_by_id_ro_detail_id($id_ro_details, $id_departement);

        if ($data) {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data Aktif Resep';
            $res['data']    = $data;
        } else {
            $res['status']    = '200';
            $res['message'] = 'Berhasil mendapatkan data , data kosong';
            $res['data']    = [];
        }

        $this->response($res, $res['status']);
    }


    public function mutasi_internal_get()
    {
        $id = null;
        if (!empty($this->get('id'))) {
            $id = $this->get('id');
        }
        if ($id == null) {
            if (empty($this->get('status'))) {
                $res['status'] = 400;
                $res['message'] = 'Silahkan masukkan status. 1 = pending, 2 = approved , 3 = declined';
                $this->response($res, $res['status']);
            }
        }
        $status = $this->get('status');


        $result = $this->stock->get_mutasi_internal($status, $id);

        if ($result) {
            $res['status'] = 200;
            $res['message'] = 'Berhasil mendapatkan data mutasi internal';
            $res['data'] = $result;
        } else {
            $res['status'] = 200;
            $res['message'] = 'Data mutasi internal tidak tersedia';
            $res['data'] = null;
        }

        $this->response($res, $res['status']);
    }


    public function mutasi_internal_put()
    {
        if (empty($this->put('id_mutasi_gudang_internal_details'))) {
            $res['status'] = 400;
            $res['message'] = 'Harap masukkan ID Mutasi Gudang Internal Details';
            $this->response($res, $res['status']);
        }
        if (empty($this->put('data'))) {
            $res['status'] = 400;
            $res['message'] = 'Harap masukkan Data';
            $this->response($res, $res['status']);
        }
        if (empty($this->put('id_petugas_input'))) {
            $res['status'] = 400;
            $res['message'] = 'Harap masukkan ID_Petugas Input';
            $this->response($res, $res['status']);
        }
        $id = $this->put('id_mutasi_gudang_internal_details');
        if (!empty($post['id_petugas_input'])) {
            $data_petugas_input = $this->m_hrd->get_by_user_id($put['id_petugas_input']);
        } else {
            $data_petugas_input['nama'] = null;
        }

        $params = $this->put('data');
        $params2 = [
            'id_users_status_update_by' => $id_petugas_input,
            'data_petugas_status_update_by' => $data_petugas_input['nama'],
            'datetime_status_update' => date("Y-m-d H:i:s")
        ];
        array_push($params, $params2);

        $result = $this->stock->update_mutasi_internal_details($id, $params);

        if ($this->db->affected_rows() > 0) {
            $res['status'] = 200;
            $res['message'] = 'Data berhasil diupdate';
        } else {
            $res['status'] = 200;
            $res['message'] = 'Data gagal diupdate';
        }
        $this->response($res, $res['status']);
    }


    public function mutasi_internal_log_get()
    {
        $tgl_start = null;
        $tgl_end = null;
        if (!empty($this->get('tgl_start'))) {
            $tgl_start = $this->get('tgl_start');
        }
        if (!empty($this->get('tgl_end'))) {
            $tgl_end = $this->get('tgl_end');
        }
        $result = $this->stock->get_mutasi_internal_log($tgl_start, $tgl_end);

        if ($result) {
            $res['status'] = 200;
            $res['message'] = 'Berhasil mendapatkan data mutasi internal log';
            $res['data'] = $result;
        } else {
            $res['status'] = 200;
            $res['message'] = 'Data mutasi internal log tidak tersedia';
            $res['data'] = null;
        }

        $this->response($res, $res['status']);
    }
}
