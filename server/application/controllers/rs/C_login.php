<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends MY_controller
{

	function __construct()
	{
        parent::__construct();

        $this->load->model('rs/M_users', 'modeluser');
        date_default_timezone_set("Asia/Bangkok");
	}


	public function login_post()
    {
        // Extract user data from POST request
        //$username = $this->post('rm_number');
        //$password = $this->post('pin');
        $username = "001";
        $password = "1234";

        if(!empty($username) && !empty($password)){
            $where = array(
                'rm_number' => $username,
                'pin' => md5($password)
                );

            $resulauthentication = $this->modeluser->authentikasi_login($where);

            if($resulauthentication != null){

                //get data users
                //$dataUser = $this->modeluser->getProfile($where);

                //get data usersprofile
                // $whereUserId = array(
                //     'user_id' => $dataUser[0]['user_id']
                //     );
                // $dataUserprofile = $this->modeluserprofile->getDetail($whereUserId);

                // // get data human resource
                // $dataHumanresources = $this->modelhumanresources->getDetail($whereUserId);

                // // get data human clinic profile
                // $whereClnicprofile = array(
                //     'rs_key' => $dataHumanresources[0]['rs_key']
                // );
                // $dataclinicprofile = $this->modelclinicprofile->getDetail($whereClnicprofile);

                // //get data hr_role
                // $whereHrId = array(
                //     'hr_id' => $dataHumanresources[0]['hr_id'],
                //     );
                // $dataHRrole = $this->modelhrrole->getDetail($whereHrId);

                // //hr_departement
                // $whereHrDepartement = array(
                //     'id_hr_role' => $dataHRrole[0]['id'],
                //     );
                // $dataHRDepartement = $this->modelhrdepartments->getDetail($whereHrDepartement);

                //date
                $startTime = date("Y-m-d H:i:s");
                //add 1 hour to time
                $expiredTime = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($startTime)));

                $token = AUTHORIZATION::generateToken([
                    // 'datausers' => $dataUser,
                    // 'dataUserprofile' => $dataUserprofile,
                    // 'dataHumanresources' => $dataHumanresources,
                    // 'dataclinicprofile' => $dataclinicprofile,
                    // 'dataHRrole' => $dataHRrole,
                    // 'dataHRDepartement' => $dataHRDepartement,
                    'username' => $username,
                    'status' => "ok",
                    'expiredTime' => $expiredTime
                ]);
                // Prepare the response
                $status = parent::HTTP_OK;
                $response = ['status' => $status, 'token' => $token];
                return $this->response($response, $status);
            }else {
                $status = parent::HTTP_NOT_FOUND;
                $response = ['status' => $status, 'token' => "Not Found"];
                return $this->response($response, $status);
            }
        }else{
            $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'token' => "Un Athorized11"];
            return $this->response($response, $status);
        }

    }

    private function verify_request()
    {
        // Get all the headers
        $headers = $this->input->request_headers();
        // Extract the token
        $token = $headers['Authorization'];
        //$token = $tokendata;
        // Use try-catch
        try {
            // Validate the token
            // Successfull validation will return the decoded user data else returns false
            $data = AUTHORIZATION::validateToken($token);
            if ($data === false) {
                $status = parent::HTTP_UNAUTHORIZED;
                $response = ['status' => $status, 'msg' => 'Unauthorized Access!'];
                $this->response($response, $status);
                exit();
            } else {
                return $data;
            }
        } catch (Exception $e) {
            // Token is invalid
            // Send the unathorized access message
            $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'msg' => 'Unauthorized Access! '];
            $this->response($response, $status);
        }
    }

    public function getdatatoken_post()
    {
      // Call the verification method and store the return value in the variable
      $data = $this->verify_request();
      // Send the return data as reponse
      $status = parent::HTTP_OK;
      $response = ['status' => $status, 'data' => $data];
      $this->response($response, $status);

        // // Call the verification method and store the return value in the variable
        // $token = $this->post('token');

        // if(!empty($token)){
        //     $data = $this->verify_request($token);
        //     // Send the return data as reponse
        //     $status = parent::HTTP_OK;
        //     $response = ['status' => $status, 'data' => $data];
        //     $this->response($response, $status);
        // }else{
        //     $status = parent::HTTP_BAD_REQUEST;
        //     $response = ['status' => $status, 'msg' => 'Bad Request! '];
        //     $this->response($response, $status);
        // }

    }

	// public function get()
	// // $route['get_token'] = 'C_login/get';
	// {
	// 	$data = $this->model1->get();

	// 	$res['status']	= 200;
	// 	$res['message'] = 'Berhasil mendapatkan data';
	// 	$res['data']	= $data;

	// 	return response($res);
	// }
}
