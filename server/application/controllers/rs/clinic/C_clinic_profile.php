<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_clinic_profile extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('rs/clinic/M_clinic_profile', 'model');
  }

  public function index_get()
  {
    $id = $this->get('id');
    $data = $this->model->get($id);

    if ($data) {
      $res['status']  = '200';
      $res['message'] = 'Berhasil mendapatkan data Klinik';
      $res['data']  = $data;
    } else {
      $res['status']  = '400';
      $res['message'] = 'Gagal mendapatkan data Klinik';
      $res['data']  = $data;
    }
    return response($res, $res['status']);
  }



  public function index_post()
  {
    $data = $this->post();

    if(empty($data)) {
      $res['status'] = 400;
      $res['message'] = 'Data Kosong, mohon sertakan data';
      $this->response($res, $res['status']);
    }

    $result = $this->model->add($data);
    if ($result)
    {
      $res['status'] = 200;
      $res['message'] = 'Sukses menambah data klinik baru';
    } else
    {
      $res['status'] = 400;
      $res['message'] = 'Gagal menambah data klinik baru';
    }
    $this->response($res, $res['status']);

  }

  public function index_delete()
  {
    $id = $this->delete('id');

    if (empty($id))
    {
      $res['status'] = 400;
      $res['message'] = 'Mohon sertakan ID untuk menghapus data Clinic.';
      $this->response($res, $res['status']);
    }

    $del = $this->model->delete($id);
    if($del)
    {
      $res['status'] = 200;
      $res['message'] = 'Berhasil menghapus data Clinic.';
      $this->response($res, $res['status']);
    }
    else
    {
      $res['status'] = 400;
      $res['message'] = 'Gagal menghapus data Clinic.';
      $this->response($res, $res['status']);
    }
  }

  public function index_put()
  {
    $put = $this->put();
    $id = $put['clinic_profile_id'];

    $params =$this->put();
    unset($params['clinic_profile_id']);

    if (empty($id))
    {
      $res['status'] = 400;
      $res['message'] = 'Mohon sertakan ID Clinic untuk melanjutkan.';
      $this->response($res, $res['status']);
    }

    if (empty($params))
    {
      $res['status'] = 400;
      $res['message'] = 'Mohon sertakan Data Clinic untuk melanjutkan.';
      $this->response($res, $res['status']);
    }

    $del = $this->model->delete($id);
    if(!$del)
    {
      $res['status'] = 400;
      $res['message'] = 'SOFT DEL GAGAL !!!.';
      $this->response($res, $res['status']);
    }

    $result = $this->model->add($params);
    if ($result)
    {
      $res['status'] = 200;
      $res['message'] = 'Sukses update data klinik';
    } else
    {
      $res['status'] = 400;
      $res['message'] = 'Gagal update data klinik';
    }
    $this->response($res, $res['status']);
  }
}
