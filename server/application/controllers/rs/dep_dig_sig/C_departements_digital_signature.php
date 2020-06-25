<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_departements_digital_signature extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('rs/dep_dig_sig/M_departements_digital_signature', 'mdepartements_digital_signature');
    }

    public function index_get()
    // $route['dep_dig_sig'] = 'api/c_departements_digital_signature';
    // method : GET
    {
        $id = $this->get('id');
        // echo 'a';die;
        $data = $this->mdepartements_digital_signature->get($id);
        // echo $data;
        if (empty($data)) {
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

        $this->mdepartements_digital_signature->del($id);

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
        $params = [
            'id_dept' => $this->post('id_dept'),
            'id_users_dokter' => $this->post('id_users_dokter'),
            'is_default' => $this->post('is_default'),
        ];

        if ($this->mdepartements_digital_signature->add($params) > 0) {
            $res['status']  = 201;
            $res['message'] = "Berhasil tambah data baru.";
        } else {
            $res['status']  = 400;
            $res['message'] = "Gagal tambah data baru.";
        }

        $this->response($res, $res['status']);
    }

    public function index_put()
    // $route['ruang_operasi'] = 'api/c_ruang_operasi';
    // method : PUT
    {
        $id = $this->put('id');
        $params = [
            'id_dept' => $this->put('id_dept'),
            'id_users_dokter' => $this->put('id_users_dokter'),
            'is_default' => $this->put('is_default'),
        ];

        if ($this->mdepartements_digital_signature->edit($params, $id) > 0) {
            $res['status']  = 200;
            $res['message'] = "Berhasil ubah data.";
        } else {
            $res['status']  = 200;
            $res['message'] = "Tidak ada perubahan data.";
        }

        $this->response($res, $res['status']);
    }
}

/* End of file C_departements_digital_signature.php */
