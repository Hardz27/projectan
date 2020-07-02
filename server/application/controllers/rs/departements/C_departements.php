<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_departements extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('rs/departements/M_departements', 'mdepartements');
    }

    public function index_get()
    // $route['get_departements'] = 'api/c_departements';
    // method : GET
    {
        $id = $this->get('id');

        $result = $this->mdepartements->get($id);
        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data.";
            $res['data']    = $result;
        }
        $this->response($res, $res['status']);
    }

    public function index_delete()
    // $route['del_departements'] = 'api/c_departements';
    // method : DELETE
    {
        $id = $this->delete('id');

        if ($id == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID";

            $this->response($res, $res['status']);
        }

        $this->mdepartements->del($id);

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
    // $route['index_departements'] = 'api/c_departements';
    // method : POST
    {
        $params = $this->post();
        // return $params;

        if ($this->mdepartements->add($params) > 0) {
            $res['status']  = 201;
            $res['message'] = "Berhasil tambah data baru.";
        } else {
            $res['status']  = 400;
            $res['message'] = "Gagal tambah data baru.";
        }

        $this->response($res, $res['status']);
    }

    public function index_put()
    // $route['add_departements'] = 'api/c_departements';
    // method : PUT
    {
        $id = $this->put('departement_id');
        $params = $this->put();

        if ($this->mdepartements->edit($params, $id) > 0) {
            $res['status']  = 200;
            $res['message'] = "Berhasil ubah data.";
        } else {
            $res['status']  = 200;
            $res['message'] = "Tidak ada perubahan data.";
        }

        $this->response($res, $res['status']);
    }
}

/* End of file C_departements.php */
