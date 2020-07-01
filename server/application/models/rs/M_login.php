<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;
use \Firebase\JWT\SignatureInvalidException;
use \Firebase\JWT\ExpiredException;

class M_login extends CI_Model 
{

  function __construct() 
  { 
    parent::__construct();
  }

  /********************************************************************************
   * Deskripsi
   * Memeriksa apakah user( rm_number) ada dalam users
   * 
   * Parameter
   * $user => rm number$data_rs['address']
   * $pass => pin
   * 
   * Return
   * 0 => rm number tidak ditemukan
   * 1 => berhasil
   * 2 => password salah
   * 
  ********************************************************************************/
  function check_access($user,$pass)
  {
    $this->db->where('no_rm',$user);
    $this->db->from("users_profile");

    if($this->db->count_all_results() == 0)
    {
      $result = 0;
    }
    else
    {
      $this->db->where(['no_rm' => $user, 'pin'=> md5($pass)]);
      $this->db->from("users_profile");

      if($this->db->count_all_results() == 0)
      {
        $result = 2;
      }
      else
      {
        $result = 1;
      }
    }

    return $result;
  }

  function get_data($user,$pass)
  {
    $this->db->select("
      b.user_id id_user, 
      b.full_name nama, 
      b.no_rm no_rm, 
      b.rs_key rs_key, 
      c.timezone timezone, 
      d.hr_id id_hr, 
      MIN(e.id_role_group) role, 
      f.default_landing_service landing_page
    ")
    
    ->from("users_profile b")
    ->join("clinic_profile c", "b.rs_key = c.rs_key", "LEFT")
    ->join("human_resources d", "b.user_id = d.user_id", "LEFT")
    ->join("hr_role e", "d.hr_id = e.hr_id", "LEFT")
    ->join("hr_role_group f", "e.id_role_group = f.id", "LEFT")
    ->where([
            "b.pin"     => md5($pass),
            "b.no_rm"   => $user,
    ])
    ->group_by('b.user_id');
    

    $sql = $this->db->get();
    $result = ($sql->num_rows() == 0) ? 0:$sql->row();

    return $result;
  }

	public function check_token($token = null)
	{
		try {
      JWT::$leeway = 500;
			$decode = JWT::decode($token, $this->config->item('encryption_key_jwt'), array('HS256'));
			$res = array( 
        'status'  => 202, 
        'message' => 'Token masih berlaku', 
        'data'    => (array) $decode
      );
		  return $res;
		} catch (\Exception  $e) {
      $res = array( 
        'status'  => 401, 
        'message' => 'Token tidak berlaku, Silahkan login'
      );
      return $res;
		}
	}

  /*************************************************************************
   * 
   * Created Date  : 04-02-2020
   * Modified Date : 04-02-2020
   * 
   * Deskripsi
   * Penyimpanan session pada table session_jwt untuk logging user
   * 
   * Kondisi
   * update user yang login dengan logout_time masih null / kosong
   * 
  ************************************************************************/
}