<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_user extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('rs/users/M_users', 'users');
    }


    public function users_get($pos_search, $pos_order_column, $pos_order_dir, $pos_start, $pos_length){
        // $route['users'] = 'api/users';
        $user = $this->users->getdata_user($pos_search, $pos_order_column, $pos_order_dir, $pos_start, $pos_length);

        if(count($user['result']) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $user;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $user;
            $this->response( $res ,  $res['status']);
        }
    }

    public function users_by_id_get($id){
        // $route['get_users_by_id/(:any)']           = 'C_user/users_by_id/$1';
        $user = $this->users->get_user_by_id($id)->result_array();

        if(count($user) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $user;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $user;
            $this->response( $res ,  $res['status']);
        }
    }


    public function blood_get(){
        // $route['ref/blood']           = 'C_user/blood';
        $blood = $this->users->get_blood_type()->result_array();

        if(count($blood) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $blood;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $blood;
            $this->response( $res ,  $res['status']);
        }
    }


    public function smooking_get(){
        // $route['ref/smooking']           = 'C_user/smooking';
        $smooking = $this->users->get_smooking()->result_array();

        if(count($smooking) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $smooking;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $smooking;
            $this->response( $res ,  $res['status']);
        }
    }

    public function daerah_get(){
        // $route['ref/daerah']           = 'C_user/daerah';
        $daerah = $this->users->get_daerah()->result_array();

        if(count($daerah) > 0){

            $data  = array();

            foreach ($daerah as $key => $field)
            {
            $row    = [];

            $row['id']  = $field['id'];
            $row['nama_daerah']  = $field['nama_kecamatan'] . ", " . $field['nama_kabupaten']. ", " . $field['nama_provinsi'];

            $data[] = $row;
            }

            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $data;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $daerah;
            $this->response( $res ,  $res['status']);
        }
    }

    public function education_get(){
        // $route['ref/education']           = 'C_user/education';
        $education = $this->users->get_education()->result_array();

        if(count($education) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $education;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $education;
            $this->response( $res ,  $res['status']);
        }
    }

    public function pekerjaan_get(){
        // $route['ref/pekerjaan']           = 'C_user/pekerjaan';
        $pekerjaan = $this->users->get_pekerjaan()->result_array();

        if(count($pekerjaan) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $pekerjaan;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $pekerjaan;
            $this->response( $res ,  $res['status']);
        }
    }

    public function agama_get(){
        // $route['ref/agama']           = 'C_user/agama';
        $agama = $this->users->get_agama()->result_array();

        if(count($agama) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $agama;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $agama;
            $this->response( $res ,  $res['status']);
        }
    }

    public function marial_state_get(){
        // $route['ref/marial_state']           = 'C_user/marial_state';
        $marial_state = $this->users->get_marial_state()->result_array();

        if(count($marial_state) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $marial_state;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $marial_state;
            $this->response( $res ,  $res['status']);
        }
    }

    public function relationship_get(){
        // $route['ref/relationship']           = 'C_user/relationship';
        $relationship = $this->users->get_relationship()->result_array();

        if(count($relationship) > 0){
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $relationship;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $relationship;
            $this->response( $res ,  $res['status']);
        }
    }


    public function user_add_post(){
        // $route['user_add']          = 'C_user/user_add';
        $data_user = [
            'rm_number' 			   			=> $this->post('rm_number'),
            'pin'    		   					=> md5($this->post('pin')),
            'password'                          => password_hash($this->post('pin'), PASSWORD_BCRYPT)
        ];

        $id_users = $this->users->insert_data_users($data_user);
        if($id_users){

            $data_user_profile = [
                'user_id'                           => $id_users,
                'number_id'			   				=> $this->post('no_ktp'),
                'bpjs_id'    		   				=> $this->post('no_bpjb'),
                'full_name'    		   				=> $this->post('full_name'),
                'mobile_phone'    		   			=> $this->post('no_hp'),
                'email'    		   					=> $this->post('email'),
                'gender'    		  			    => $this->post('gender'),
                'pob'    		   			        => $this->post('tempat_lahir'),
                'dob'    		   			        => $this->post('tanggal_lahir'),
                'blood_type'    		   		    => $this->post('blood'),
                'smoking_status'    		   		=> $this->post('smooking'),
                'id_kel'    		  				=> $this->post('daerah'),
                'address'    		   				=> $this->post('address'),
                'gelar_depan'    		   			=> $this->post('gelar_depan'),
                'gelar_belakang'    		   		=> $this->post('gelar_belakang'),
                'education'    		   				=> $this->post('education'),
                'occupation'   		  				=> $this->post('pekerjaan'),
                'nama_kk'    		   				=> $this->post('nama_kk'),
                'religion' 		   					=> $this->post('agama'),
                'marital_status'   		   			=> $this->post('marial_state'),
                'emergency_contact_name'    		=> $this->post('emergency_contact_name'),
                'emergency_contact_relationship_to_patient'    		=> $this->post('relationship'),
                'emergency_contact_no_ktp'    		=> $this->post('emergency_contact_no_ktp'),
                'emergency_contact_phone'    		=> $this->post('emergency_contact_phone'),
                'emergency_contact_address'    		=> $this->post('emergency_contact_address'),
            ];


            $this->users->insert_data_users_profile($data_user_profile);
            $res['status']  = 200;
            $res['message'] = "Berhasil Menambah data";
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Gagal Menambah data";
            $this->response( $res ,  $res['status']);
        }
    }


    public function user_edit_put(){
        // $route['user_edit']          = 'C_user/user_edit';
        $id = $this->put('user_id');

        if($this->put('pin') != ""){
            $data_user = [
                'user_id' 			   				=> $id,
                'pin'    		   					=> md5($this->put('pin')),
                'password'                          => password_hash($this->put('pin'), PASSWORD_BCRYPT)
              ];
        }else{
            $data_user = [
                'user_id' 			   				=> $id,
              ];
        }


        $data_user_profile = [
            'number_id'			   				=> $this->put('no_ktp'),
			'bpjs_id'    		   				=> $this->put('no_bpjb'),
			'full_name'    		   				=> $this->put('full_name'),
			'mobile_phone'    		   			=> $this->put('no_hp'),
			'email'    		   					=> $this->put('email'),
			'gender'    		  			    => $this->put('gender'),
			'pob'    		   			        => $this->put('tempat_lahir'),
			'dob'    		   			        => $this->put('tanggal_lahir'),
			'blood_type'    		   		    => $this->put('blood'),
			'smoking_status'    		   		=> $this->put('smooking'),
			'id_kel'    		  				=> $this->put('daerah'),
			'address'    		   				=> $this->put('address'),
			'gelar_depan'    		   			=> $this->put('gelar_depan'),
			'gelar_belakang'    		   		=> $this->put('gelar_belakang'),
			'education'    		   				=> $this->put('education'),
			'occupation'   		  				=> $this->put('pekerjaan'),
			'nama_kk'    		   				=> $this->put('nama_kk'),
			'religion' 		   					=> $this->put('agama'),
			'marital_status'   		   			=> $this->put('marial_state'),
			'emergency_contact_name'    		=> $this->put('emergency_contact_name'),
			'emergency_contact_relationship_to_patient'    		=> $this->put('relationship'),
			'emergency_contact_no_ktp'    		=> $this->put('emergency_contact_no_ktp'),
			'emergency_contact_phone'    		=> $this->put('emergency_contact_phone'),
			'emergency_contact_address'    		=> $this->put('emergency_contact_address'),
        ];


        if($this->users->update_data($data_user, $data_user_profile, $id)){
            $res['status']  = 200;
            $res['message'] = "Berhasil Memperbarui data";
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Gagal Memperbarui data";
            $this->response( $res ,  $res['status']);
        }
    }



    public function user_hapus_delete($id){
        // $route['user_hapus/(:any)']          = 'C_user/user_hapus/(:any)';
        $data_user = [
            'del_date'			   				=> date('Y-m-d')
        ];

        if($this->users->soft_delete($data_user, $id)){
            $res['status']  = 200;
            $res['message'] = "Berhasil Memperbarui data";
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Gagal Memperbarui data";
            $this->response( $res ,  $res['status']);
        }
    }


    public function create_rm_number_get(){
        // $route['ref/create_rm_number']           = 'C_user/create_rm_number';
        // parameter rs key nanti disesuaikan dengan kliniknya karena sekarang masih statis

        $rs_key = 'A123';
        $rm_number = $this->users->rm_number_new($rs_key);

        if($rm_number){
            $data = [
                'rm_number' => $rm_number
            ];
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $data;
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $this->response( $res ,  $res['status']);
        }
    }





}
