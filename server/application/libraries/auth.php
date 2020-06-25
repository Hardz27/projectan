<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

	public function cek_auth(){
        $this->ci =& get_instance();
        $this->API=$this->config->item('api_url');
        date_default_timezone_set("Asia/Bangkok");

        $this->token  = $this->ci->session->userdata('token');
        $dateNow = date("Y-m-d H:i:s");

		if($this->token){
            $dataToken = array(
                'token' => $token_verifikasi["token"],
            );
            $resultDataToken =  json_decode($this->curl->simple_post($this->API.'/get_datatoken', $dataToken, array(CURLOPT_BUFFERSIZE => 10))); 
            if($dateNow > strtotime($resultDataToken["data"]["expiredTime"])){
                redirect(base_url("formlogin"));
            }            
		}
	}

	public function hak_akses($kecuali=""){
		if($this->hak==$kecuali){
			echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
			redirect('dashboard');
		}elseif ($this->hak=="") {
			echo "<script>alert('Anda belum login!');</script>";
			redirect('login');
		}else{

		}
	}
}