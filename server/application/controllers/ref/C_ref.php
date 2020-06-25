<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_ref extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ref/M_ref', 'mref');
    }

    public function blood_type_get()
    // $route['ref/blood_type'] = 'ref/c_ref/blood_type';
    {
        $res['status']  = 200;
        $res['message'] = "Berhasil mendapatkan data golongan darah.";
        $res['data']    = $this->mref->get_blood_type();

        $this->response($res, $res['status']);
    }
    
    public function relationship_get()
    // $route['ref/relationship'] = 'ref/c_ref/relationship';
    {
        $res['status']  = 200;
        $res['message'] = "Berhasil mendapatkan data relationship.";
        $res['data']    = $this->mref->get_relationship();

        $this->response($res, $res['status']);
    }
    
    public function marital_status_get()
    // $route['ref/marital_status'] = 'ref/c_ref/marital_status';
    {
        $res['status']  = 200;
        $res['message'] = "Berhasil mendapatkan data marital_status.";
        $res['data']    = $this->mref->get_marital_status();

        $this->response($res, $res['status']);
    }

    public function occupation_get()
    // $route['ref/occupation'] = 'ref/c_ref/occupation';
    {
        $res['status']  = 200;
        $res['message'] = "Berhasil mendapatkan data occupation.";
        $res['data']    = $this->mref->get_occupation();

        $this->response($res, $res['status']);
    }
    
    public function pendidikan_get()
    // $route['ref/pendidikan'] = 'ref/c_ref/pendidikan';
    {
        $res['status']  = 200;
        $res['message'] = "Berhasil mendapatkan data pendidikan.";
        $res['data']    = $this->mref->get_pendidikan();

        $this->response($res, $res['status']);
    }
    
    public function religion_get()
    // $route['ref/religion'] = 'ref/c_ref/religion';
    {
        $res['status']  = 200;
        $res['message'] = "Berhasil mendapatkan data religion.";
        $res['data']    = $this->mref->get_religion();

        $this->response($res, $res['status']);
    }
    
    public function smoking_status_get()
    // $route['ref/smoking_status'] = 'ref/c_ref/smoking_status';
    {
        $res['status']  = 200;
        $res['message'] = "Berhasil mendapatkan data smoking_status.";
        $res['data']    = $this->mref->get_smoking_status();

        $this->response($res, $res['status']);
    }


    public function alamat_get()
    // $route['get_alamat'] = 'api/c_ref/alamat';
    {
        $keyword = $this->input->get('keyword');
        $result = $this->mref->get_by_keyword($keyword);

        if (empty($keyword)) {
            $res['status']  = 400;
            $res['message'] = "Masukkan keyword.";
            // $res['data']    = $result;
            $this->response($res, $res['status']);
        }
        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Gagal mendapatkan data kelurahan.";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data kelurahan.";
            $res['data']    = $result;
        }

        $this->response($res, $res['status']);
    }

    public function jenis_kegiatan_rawat_jalan_get()
    // $route['get_jenis_rajal'] = 'api/c_ref/jenis_kegiatan_rawat_jalan';
    {
        $id = $this->get('id');
        $result = $this->mref->get_rajal($id);

        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Gagal mendapatkan data jenis kegiatan rawat jalan.";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data jenis kegiatan rawat jalan.";
            $res['data']    = $result;
        }

        $this->response($res, $res['status']);
    }

    public function jenis_pelayanan_rawat_inap_get()
    // $route['get_jenis_rajal'] = 'api/c_ref/jenis_pelayanan_rawat_inap';
    {

        $id = $this->get('id');
        $result = $this->mref->get_ranap($id);

        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Gagal mendapatkan data jenis pelayanan rawat inap.";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data jenis pelayanan rawat inap.";
            $res['data']    = $result;
        }

        $this->response($res, $res['status']);
    }

    public function poli_get()
    // $route['get_kode_poli'] = 'api/c_ref/kode_poi';
    {

        $id = $this->get('id');

        $result = $this->mref->get_poli($id);

        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Gagal mendapatkan data poli.";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data poli.";
            $res['data']    = $result;
        }

        $this->response($res, $res['status']);
    }

    public function departements_group_get()
    // $route['get_dept_group'] = 'api/c_ref/departements_group';
    {

        $result = $this->mref->get_dept_group();

        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Gagal mendapatkan data departements group.";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data departements group.";
            $res['data']    = $result;
        }

        $this->response($res, $res['status']);
    }
}
