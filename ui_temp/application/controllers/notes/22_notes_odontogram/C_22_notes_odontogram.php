<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Psr7;
use \GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**********************************************************************************
 * 
 * Deskripsi
 * Menampilkan halaman client/notes_penolakan_resusitasi
 * 
 **********************************************************************************/
class C_22_notes_odontogram extends CI_Controller
{
  public $data;
  public function __construct()
  {
    parent::__construct();

    // add session statis
    $this->data = [
      'id_user' => "123",
      'rs_key'  => "900614f7-7acd-11e8-a953-fa163e101f72",
      'user_login' => [
        'id_user' => "373680"
      ],
      'no_rm'      => "008000649",
      'timezone' => "Asia/Jakarta"
    ];
    $this->session->set_userdata($this->data);

    // token diambil dari postman, kalau sudah expired sikahkan ambil lagi.
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoiTkFNQSAyIiwiaWRfdXNlciI6IjM3MzY4MSIsInJtX251bWJlciI6ImFkbWluIiwicnNfa2V5IjoiQTEyMyIsImlwX2FkZHJlc3MiOiIxMjcuMC4xLjEiLCJhY2Nlc3MiOiJ1c2VyIn0.ubW6fyc7ErYOW2T5qFbjXvLIVTLp05s3A0paQ6wfcmo";
    $this->id_ref_global_tipe_42 = 22;
    
    // guzzle client
    $this->_client_rs = new Client([
      'base_uri'  => $this->config->item('api_rs'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    $this->_client_ref = new Client([
      'base_uri'  => $this->config->item('api_ref'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    // NAMA FOLDER DALAM CONTROLLER. 
    // HANYA EDIT DI SINI.. YANG LAIN TIDAK PERLU DIRUBAH... TOLONG GANTI DENGAN NAMA FOLDER YANG BARU
    $this->c_folder = "C_22_notes_odontogram"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

    //menghilangkan 'C_' pada nama class untuk dinamisasi routing;
    $this->class = str_replace("c_", "", $this->router->fetch_class());

    $this->title = 'Notes Odontogram';

    //dummy id departemen
    $this->id_dept = 3;

    // untuk menyimpan data ke /tmp untuk ditampilkan di cetak
    $this->folder = $this->config->item('tmp_folder');
  }

  // redirect ke fungsi list
  public function index()
  // $route['notes_penolakan_resusitasi'] = 'notes_penolakan_resusitasi/c_notes_penolakan_resusitasi';
  {
    // echo base_url(); die;
    redirect(base_url() . $this->class . '/list');
  }



  // START WORKING DARI SINI KE BAWAH UNTUK FUNGSI CRUD SAMPAI PDF
  // START WORKING DARI SINI KE BAWAH UNTUK FUNGSI CRUD SAMPAI PDF
  // START WORKING DARI SINI KE BAWAH UNTUK FUNGSI CRUD SAMPAI PDF



  // Menampilkan tampilan aktif dan arsip
  public function list()
  {
    $data = array(
      'title'   => 'Notes Odontogram',
      'class_name' => $this->class,
    );

    if ($this->input->is_ajax_request()) {
      // $this->load->view('layout/header');
      $this->load->view('contents/notes/' . $this->class . '/index', $data);
      // $this->load->view('layout/footer');

    } else {
      $data['contents'] = 'contents/notes/' . $this->class . '/index';
      $this->load->view('master', $data);
    }
  }

  //mengambil data registrasi untuk di tampilkan di aktif dan arsip 
  function get_data($type)
  {
    // data dummy list registrasi aktif untuk di view index.php
    if ($type == 'list') {
      $no_rm = $this->session->userdata('no_rm');

      //aktif
      $response_reg_aktif = $this->_client_rs->request('GET', 'kunjungan', [
        'query' => [
          'no_rm' => $no_rm,
          'type'  => 'registrasi',
          'status' => 'active'
        ]
      ]);
      $data['data_reg_aktif'] = json_decode($response_reg_aktif->getBody()->getContents(), true)['data']['registrasi'];

      //arsip
      $response_reg_arsip = $this->_client_rs->request('GET', 'kunjungan', [
        'query' => [
          'no_rm' => $no_rm,
          'type'  => 'registrasi',
          'status' => 'archive'
        ]
      ]);
      $data['data_reg_arsip'] = json_decode($response_reg_arsip->getBody()->getContents(), true)['data']['registrasi'];

      // menghapus file
      $user_id      = $this->session->userdata('id_user');
      foreach (glob($this->folder . $user_id . '_' . $this->class . '*') as $f) {
        unlink($f);
      }

      // trace($data['data_reg_arsip']);
      // trace($data);
      $this->load->view('contents/notes/' . $this->class . '/list', $data);
    }
  }


  public function render_data($type, $id_reg, $status)
  {
    // echo $type . $id_reg . $status; die;
    // hasil get data dari API
    $response_visit = $this->_client_rs->request('GET', 'kunjungan', [
      'query' => [
        'no_rm' => $this->session->userdata('no_rm'),
        'type'  => 'visit',
        'id_reg' => $id_reg,
      ]
    ]);
    $data_visit = json_decode($response_visit->getBody()->getContents(), true)['data']['visit'];
    // trace($data_visit);
    if ($type == 'list') {

      foreach ($data_visit as $k => $v) {
        $notes = [];
        $response_notes = $this->_client_rs->request('GET', 'notes', [
          'query' => [
            'id'  => $v['id_visit'],
            'no_rm' => $this->session->userdata('no_rm'),
            'id_ref_global_tipe_42' => $this->id_ref_global_tipe_42,
          ]
        ]);

        $data_notes = json_decode($response_notes->getBody()->getContents(), true)['data'];

        foreach ($data_notes as $n => $o) {
          $jdata = $o['json_data'];

          $notes[$n] = [
            'notes_id'                            => $o['id'],
            'approved_dokter'                    => $jdata['approved_dokter'],
            'tanggal'                             => $jdata['notes']['tanggal'],
            'jam'                                 => $jdata['notes']['jam'],
            'golongan_darah'                      => $jdata['notes']['golongan_darah'],
            'tekanan_a'                           => $jdata['notes']['tekanan_a'],
            'tekanan_b'                           => $jdata['notes']['tekanan_b'],
            'tekanan_darah'                       => $jdata['notes']['tekanan_darah'],
            'penyakit_jantung'                    => $jdata['notes']['penyakit_jantung'],
            'diabetes'                            => $jdata['notes']['diabetes'],
            'haemopilia'                          => $jdata['notes']['haemopilia'],
            'hepatitis'                           => $jdata['notes']['hepatitis'],
            'gastritis'                   		  => $jdata['notes']['gastritis'],
            'penyakit_lainnya'                    => $jdata['notes']['penyakit_lainnya'],
            'alergi_obat'           	   		  => $jdata['notes']['alergi_obat'],
            'desc_alergi_obat'             		  => $jdata['notes']['desc_alergi_obat'],
            'alergi_makanan'                      => $jdata['notes']['alergi_makanan'],
            'desc_alergi_makanan'                 => $jdata['notes']['desc_alergi_makanan'],
            'occlusi'                             => $jdata['notes']['occlusi'],
            'mandibularis'                        => $jdata['notes']['mandibularis'],
            'palatum'                       	  => $jdata['notes']['palatum'],
            'desc_palatum'              		  => $jdata['notes']['desc_palatum'],
            'torus'              				  => $jdata['notes']['torus'],
            'torus_palatinus'               	  => $jdata['notes']['torus_palatinus'],
            'Diastema'               			  => $jdata['notes']['Diastema'],
            'gigi_anomali'             			  => $jdata['notes']['gigi_anomali'],
            'desc_gigi_anomali'             	  => $jdata['notes']['desc_gigi_anomali'],
            'lain_lain'             			  => $jdata['notes']['lain_lain'],
            'hal_tidak_tercakup'             	  => $jdata['notes']['hal_tidak_tercakup'],
            'd'             					  => $jdata['notes']['d'],
            'm'             					  => $jdata['notes']['m'],
            'f'             					  => $jdata['notes']['f'],
            'jumlah_foto'           			  => $jdata['notes']['jumlah_foto'],
            'type_foto'           				  => $jdata['notes']['type_foto'],
            'jumlah_foto_rontgen'           	  => $jdata['notes']['jumlah_foto_rontgen'],
            'type_foto_rontgen'               	  => $jdata['notes']['type_foto_rontgen'],
            'coretan'                             => $jdata['notes']['coretan'],
          ];
        };

        $data['list'][$k] = [
          'id_reg'    => $v['id_registrasi'],
          'no_reg'    => $v['no_reg'],
          'id_visit'  => $v['id_visit'],
          'no_visit'  => $v['no_visit'],
          'penjamin'  => $v['nama_penjamin'],
          'id_dept'   => $v['id_poli'],
          'nama_dept' => $v['nama_dept'],
          'tanggal_checkin' => $v['checkin'],
          'pasien'    => $data_visit[$k],
          'data' => $notes
        ];
        $data['notes'] = $notes ? true : false;
        $user_id      = $this->session->userdata('id_user');
      }
    }

    // menyimpan data yang diambil ke file lokal
    if ($status == '1') {
      $status = 'aktif';
    } elseif ($status == '2') {
      $status = 'arsip';
    }
    // echo trace($data_visit);
    $this->load->view('contents/notes/' . $this->class . '/render', $data);
  }

  public function add($type)
  {
    $response_visit = $this->_client_rs->request('GET', 'kunjungan', [
      'query' => [
        'no_rm' => $this->session->userdata('no_rm'),
        'type'  => 'visit',
        'id_reg' => $this->input->post('id_reg', true),
      ]
    ]);
    $data_visit = json_decode($response_visit->getBody()->getContents(), true)['data']['visit'];

    if ($type == 'list') {
      $response_dokter     = $this->_client_rs->request('GET', 'ref/dokter');
      $data['data_dokter'] = json_decode($response_dokter->getBody()->getContents(), true)['data'];

      $response_perawat     = $this->_client_rs->request('GET', 'ref/perawat');
      $data['data_perawat'] = json_decode($response_perawat->getBody()->getContents(), true)['data'];

      $data['title'] = $this->title;
      $data['id_reg'] = $this->input->post('id_reg', true);
      $data['data_visit'] = $data_visit;

      $this->load->view('contents/notes/' . $this->class  . '/add', $data);
    }
  }

  public function add_process()
  {
    $notes = [
      'tanggal'                             =>  $this->input->post('tanggal'),
      'jam'                                 =>  $this->input->post('jam'),
      'golongan_darah'                      =>  $this->input->post('golongan_darah'),
      'tekanan_a'                           =>  $this->input->post('tekanan_a'),
      'tekanan_b'                           =>  $this->input->post('tekanan_b'),
      'tekanan_darah'                       =>  $this->input->post('tekanan_darah'),
      'penyakit_jantung'                    =>  $this->input->post('penyakit_jantung'),
      'diabetes'                            =>  $this->input->post('diabetes'),
      'haemopilia'          	            =>  $this->input->post('haemopilia'),
      'hepatitis'           	            =>  $this->input->post('hepatitis'),
      'gastritis'           	        	=>  $this->input->post('gastritis'),
      'penyakit_lainnya'    	            =>  $this->input->post('penyakit_lainnya'),
      'alergi_obat'         	  		 	=>  $this->input->post('alergi_obat'),
      'desc_alergi_obat'    	         	=>  $this->input->post('desc_alergi_obat'),
      'alergi_makanan'      	            =>  $this->input->post('alergi_makanan'),
      'desc_alergi_makanan' 	            =>  $this->input->post('desc_alergi_makanan'),
      'occlusi'             	            =>  $this->input->post('occlusi'),
      'mandibularis'        	            =>  $this->input->post('mandibularis'),
      'palatum'             	            =>  $this->input->post('palatum'),
      'desc_palatum'        	      	    =>  $this->input->post('desc_palatum'),
      'torus'            			  	  	=>  $this->input->post('torus'),
      'torus_palatinus'     	          	=>  $this->input->post('torus_palatinus'),
      'Diastema'            	 			=>  $this->input->post('Diastema'),
      'gigi_anomali'        	       		=>  $this->input->post('gigi_anomali'),
      'desc_gigi_anomali'   	            =>  $this->input->post('desc_gigi_anomali'),
      'lain_lain'           	    		=>  $this->input->post('lain_lain'),
      'hal_tidak_tercakup'  	            =>  $this->input->post('hal_tidak_tercakup'),
      'd'            			  			=>  $this->input->post('d'),
      'm'            			  			=>  $this->input->post('m'),
      'f'            			  			=>  $this->input->post('f'),
      'jumlah_foto'               			=>  $this->input->post('jumlah_foto'),
      'type_foto'                 			=>  $this->input->post('type_foto'),
      'jumlah_foto_rontgen'       			=>  $this->input->post('jumlah_foto_rontgen'),
      'type_foto_rontgen'         			=>  $this->input->post('type_foto_rontgen'),
      'coretan'                   			=>  $this->input->post('coretan'),
    ];

    $params = [
      'no_rm'                 => $this->data['no_rm'],
      'id_pasien_registrasi'  => $this->input->post('id_reg'),
      'id_pasien_visit'       => $this->input->post('id_visit'),
      'id_petugas_approve'    => $this->input->post('petugas_approved'),
      'id_dokter_approve'     => $this->input->post('dokter_approved'),
      'id_ref_global_tipe_42' => $this->id_ref_global_tipe_42,
      'notes'                 => $notes, // NAMANYA HARUS NOTES
    ];

    $this->_config['body'] = json_encode($params);
    $response = $this->_client_rs->request('POST', 'notes', $this->_config);

    $result = json_decode($response->getbody()->getcontents(), true);

    echo json_encode($result);
    // echo trace($params);
  }

  public function edit()
  {
    $response_visit = $this->_client_rs->request('GET', 'kunjungan', [
      'query' => [
        'no_rm' => $this->session->userdata('no_rm'),
        'type'  => 'visit',
        'id_reg' => $this->input->get('id_reg', true),
      ]
    ]);
    $data['data_visit'] = json_decode($response_visit->getBody()->getContents(), true)['data']['visit'];

    $response_dokter     = $this->_client_rs->request('GET', 'ref/dokter');
    $data['data_dokter'] = json_decode($response_dokter->getBody()->getContents(), true)['data'];

    $response_perawat     = $this->_client_rs->request('GET', 'ref/perawat');
    $data['data_perawat'] = json_decode($response_perawat->getBody()->getContents(), true)['data'];

    $id_notes = $this->input->get('id_notes');

    $response     = $this->_client_rs->request('GET', 'notes/detail', [
      'query' => [
        'id' => $this->input->get('id_notes')
      ]
    ]);
    $result_data = json_decode($response->getBody()->getContents(), true);
    // trace($result_data);
    $result = $result_data['data'][0]['json_data'];
    $detail = [
            'approved_dokter'                    => $result['approved_dokter'],
            'tanggal'                             => $result['notes']['tanggal'],
            'jam'                                 => $result['notes']['jam'],
            'golongan_darah'                      => $result['notes']['golongan_darah'],
            'tekanan_a'                           => $result['notes']['tekanan_a'],
            'tekanan_b'                           => $result['notes']['tekanan_b'],
            'tekanan_darah'                       => $result['notes']['tekanan_darah'],
            'penyakit_jantung'                    => $result['notes']['penyakit_jantung'],
            'diabetes'                            => $result['notes']['diabetes'],
            'haemopilia'                          => $result['notes']['haemopilia'],
            'hepatitis'                           => $result['notes']['hepatitis'],
            'gastritis'                   		  => $result['notes']['gastritis'],
            'penyakit_lainnya'                    => $result['notes']['penyakit_lainnya'],
            'alergi_obat'           	   		  => $result['notes']['alergi_obat'],
            'desc_alergi_obat'             		  => $result['notes']['desc_alergi_obat'],
            'alergi_makanan'                      => $result['notes']['alergi_makanan'],
            'desc_alergi_makanan'                 => $result['notes']['desc_alergi_makanan'],
            'occlusi'                             => $result['notes']['occlusi'],
            'mandibularis'                        => $result['notes']['mandibularis'],
            'palatum'                       	  => $result['notes']['palatum'],
            'desc_palatum'              		  => $result['notes']['desc_palatum'],
            'torus'              				  => $result['notes']['torus'],
            'torus_palatinus'               	  => $result['notes']['torus_palatinus'],
            'Diastema'               			  => $result['notes']['Diastema'],
            'gigi_anomali'             			  => $result['notes']['gigi_anomali'],
            'desc_gigi_anomali'             	  => $result['notes']['desc_gigi_anomali'],
            'lain_lain'             			  => $result['notes']['lain_lain'],
            'hal_tidak_tercakup'             	  => $result['notes']['hal_tidak_tercakup'],
            'd'             					  => $result['notes']['d'],
            'm'             					  => $result['notes']['m'],
            'f'             					  => $result['notes']['f'],
            'jumlah_foto'           			  => $result['notes']['jumlah_foto'],
            'type_foto'           				  => $result['notes']['type_foto'],
            'jumlah_foto_rontgen'           	  => $result['notes']['jumlah_foto_rontgen'],
            'type_foto_rontgen'               	  => $result['notes']['type_foto_rontgen'],
            'coretan'                             => $result['notes']['coretan'],
    ];
    $result_data = $result_data['data'][0];

    $data['title'] = $this->title;
    $detail['id_notes'] = $result_data['id'];
    $detail['id_reg'] = $result_data['id_pasien_registrasi'];
    $detail['id_visit'] = $result_data['id_pasien_visit'];
    $data['result'] = $detail;
    $data['class_name'] = $this->class;
    // trace($data['result']);
    $this->load->view('contents/notes/' . $this->class . '/edit', $data);
  }

  public function edit_process()
  {
    $notes = [
      'tanggal'                             =>  $this->input->post('tanggal'),
      'jam'                                 =>  $this->input->post('jam'),
      'golongan_darah'                      =>  $this->input->post('golongan_darah'),
      'tekanan_a'                           =>  $this->input->post('tekanan_a'),
      'tekanan_b'                           =>  $this->input->post('tekanan_b'),
      'tekanan_darah'                       =>  $this->input->post('tekanan_darah'),
      'penyakit_jantung'                    =>  $this->input->post('penyakit_jantung'),
      'diabetes'                            =>  $this->input->post('diabetes'),
      'haemopilia'          	            =>  $this->input->post('haemopilia'),
      'hepatitis'           	            =>  $this->input->post('hepatitis'),
      'gastritis'           	        	=>  $this->input->post('gastritis'),
      'penyakit_lainnya'    	            =>  $this->input->post('penyakit_lainnya'),
      'alergi_obat'         	  		 	=>  $this->input->post('alergi_obat'),
      'desc_alergi_obat'    	         	=>  $this->input->post('desc_alergi_obat'),
      'alergi_makanan'      	            =>  $this->input->post('alergi_makanan'),
      'desc_alergi_makanan' 	            =>  $this->input->post('desc_alergi_makanan'),
      'occlusi'             	            =>  $this->input->post('occlusi'),
      'mandibularis'        	            =>  $this->input->post('mandibularis'),
      'palatum'             	            =>  $this->input->post('palatum'),
      'desc_palatum'        	      	    =>  $this->input->post('desc_palatum'),
      'torus'            			  	  	=>  $this->input->post('torus'),
      'torus_palatinus'     	          	=>  $this->input->post('torus_palatinus'),
      'Diastema'            	 			=>  $this->input->post('Diastema'),
      'gigi_anomali'        	       		=>  $this->input->post('gigi_anomali'),
      'desc_gigi_anomali'   	            =>  $this->input->post('desc_gigi_anomali'),
      'lain_lain'           	    		=>  $this->input->post('lain_lain'),
      'hal_tidak_tercakup'  	            =>  $this->input->post('hal_tidak_tercakup'),
      'd'            			  			=>  $this->input->post('d'),
      'm'            			  			=>  $this->input->post('m'),
      'f'            			  			=>  $this->input->post('f'),
      'jumlah_foto'               			=>  $this->input->post('jumlah_foto'),
      'type_foto'                 			=>  $this->input->post('type_foto'),
      'jumlah_foto_rontgen'       			=>  $this->input->post('jumlah_foto_rontgen'),
      'type_foto_rontgen'         			=>  $this->input->post('type_foto_rontgen'),
      'coretan'                             =>  $this->input->post('coretan'),
    ];

    $params = [
      'id_notes'             => $this->input->post('id_notes'),
      'id_pasien_registrasi' => $this->input->post('id_reg'),
      'id_pasien_visit'      => $this->input->post('id_visit'),
      'id_petugas_approve'   => $this->input->post('petugas_approved'),
      'id_dokter_approve'    => $this->input->post('dokter_approved'),
      'id_petugas_input'     => $this->session->userdata['user_login']['id_user'],
      'id_ref_global_tipe_42' => $this->id_ref_global_tipe_42,
      'no_rm'               => $this->session->userdata('no_rm'),
      'notes'               => $notes, /// NAMA HARUS NOTES YA
    ];

    $this->_config['body'] = json_encode($params);
    $response     = $this->_client_rs->request('PUT', 'notes', $this->_config);
    $result = json_decode($response->getBody()->getContents(), true);

    echo json_encode($result);
    // echo trace($result);
  }

  function delete()
  {
    $params = [
      'id_notes'                  => $this->input->get('id_notes'),
      'del_by'                    => $this->session->userdata['user_login']['id_user'],
    ];
    
    $this->_config['body'] = json_encode($params);
    $response     = $this->_client_rs->request('DELETE', 'notes', $this->_config);
    $result_pasien = json_decode($response->getBody()->getContents(), true);

    echo json_encode($result_pasien);
  }

  function view_pdf($id)
  {
    $user_id      = $this->session->userdata('id_user');
    // $type         = $this->input->get('type');
    // $status       = $this->input->get('status');
    // $id_visit     = $this->input->get('id_visit');


    $response     = $this->_client_rs->request('GET', 'notes/detail', [
      'query' => [
        'id' => $id
        // 'id_visit' => $id_visit,
      ]
    ]);
    $result_data = json_decode($response->getBody()->getContents(), true);
    // trace($result_data);
    // $no_rm = $result_data['data'][0]['no_rm'];
    $result = $result_data['data'][0]['json_data'];
    $detail = [
            'approved_dokter'                    => $result['approved_dokter'],
            'digital_signature_approved_dokter'  => $result['digital_signature_approved_dokter'],
            'tanggal'                             => $result['notes']['tanggal'],
            'jam'                                 => $result['notes']['jam'],
            'golongan_darah'                      => $result['notes']['golongan_darah'],
            'tekanan_a'                           => $result['notes']['tekanan_a'],
            'tekanan_b'                           => $result['notes']['tekanan_b'],
            'tekanan_darah'                       => $result['notes']['tekanan_darah'],
            'penyakit_jantung'                    => $result['notes']['penyakit_jantung'],
            'diabetes'                            => $result['notes']['diabetes'],
            'haemopilia'                          => $result['notes']['haemopilia'],
            'hepatitis'                           => $result['notes']['hepatitis'],
            'gastritis'                   		  => $result['notes']['gastritis'],
            'penyakit_lainnya'                    => $result['notes']['penyakit_lainnya'],
            'alergi_obat'           	   		  => $result['notes']['alergi_obat'],
            'desc_alergi_obat'             		  => $result['notes']['desc_alergi_obat'],
            'alergi_makanan'                      => $result['notes']['alergi_makanan'],
            'desc_alergi_makanan'                 => $result['notes']['desc_alergi_makanan'],
            'occlusi'                             => $result['notes']['occlusi'],
            'mandibularis'                        => $result['notes']['mandibularis'],
            'palatum'                       	  => $result['notes']['palatum'],
            'desc_palatum'              		  => $result['notes']['desc_palatum'],
            'torus'              				  => $result['notes']['torus'],
            'torus_palatinus'               	  => $result['notes']['torus_palatinus'],
            'Diastema'               			  => $result['notes']['Diastema'],
            'gigi_anomali'             			  => $result['notes']['gigi_anomali'],
            'desc_gigi_anomali'             	  => $result['notes']['desc_gigi_anomali'],
            'lain_lain'             			  => $result['notes']['lain_lain'],
            'hal_tidak_tercakup'             	  => $result['notes']['hal_tidak_tercakup'],
            'd'             					  => $result['notes']['d'],
            'm'             					  => $result['notes']['m'],
            'f'             					  => $result['notes']['f'],
            'jumlah_foto'           			  => $result['notes']['jumlah_foto'],
            'type_foto'           				  => $result['notes']['type_foto'],
            'jumlah_foto_rontgen'           	  => $result['notes']['jumlah_foto_rontgen'],
            'type_foto_rontgen'               	  => $result['notes']['type_foto_rontgen'],
            'coretan'                             => $result['notes']['coretan'],
    ];
    $result_data = $result_data['data'][0];
    $detail['id_notes'] = $result_data['id'];
    $detail['id_reg'] = $result_data['id_pasien_registrasi'];
    $detail['id_visit'] = $result_data['id_pasien_visit'];
    $detail['no_rm'] = $result_data['no_rm'];

    // echo $no_rm;die;
    // detail visit
    $response_visit = $this->_client_rs->request('GET', 'kunjungan', [
      'query' => [
        'no_rm' => $detail['no_rm'],
        'type'  => 'visit',
        'id_visit' => $detail['id_visit'],
        // 'status' => $status,
      ]
    ]);
    $data_visit = json_decode($response_visit->getBody()->getContents(), true)['data']['visit'][0];

    $rs_key = $this->session->userdata('rs_key');

    $response_prop_clinic     = $this->_client_rs->request('GET', 'clinic_profile', [
      'query' => ['rs_key' => $rs_key]
    ]);
    $prop_clinic = json_decode($response_prop_clinic->getBody()->getContents(), true);
    $clinic_profile = $prop_clinic['data'];

    // form header
    $id_form = $this->id_ref_global_tipe_42;

    $form = $this->_client_ref->request('GET', 'form', [
      'query' => ['id' => $id_form]
    ]);

    $form = json_decode($form->getbody()->getcontents(), true);
    $form = $form['data'];

    $title  = $form['nama_form']; // title pdf
    $kode   = $form['kode_form']; // kode form
    $name   = $form['pdf_file_name'] . date("Ymd") . '.pdf'; // nama form

    $data   = [
      'title' => $title,
      'list' => [
        'pasien' => $data_visit,
        'notes'  => $detail,
      ],
    ];

    $html  = $this->load->view('contents/notes/' . $this->class . '/pdf', $data, true);

    $mpdf = new \Mpdf\Mpdf([
      'format'              => 'A4-P',
      'mode'                => 'utf-8',
      'setAutoTopMargin'    => 'stretch',
      'defaultheaderline'   => 0,
      'defaultfooterline'   => 0
    ]);

    $mpdf->SetMargins(0, 0, 12);


    $header ='<div class="row">
                <table border="1" width="100%">
                  <tr>
                    <td rowspan="4" width="15%" style="text-align:center;">
                      <img style="width: 12%;" src="' . $clinic_profile['logo1'] . '">
                    </td>
                    <td colspan="5" style="border-left:none;text-align:center;padding:10px;padding-left:20px;">
                      <h4 class="r-bold"><b>' . $title . '</h4>
                    </td>
                    <td style="border-left:none;padding:10px;text-align:center;"><h4 class="r-bold">' . $kode . '</h4></td>
                  </tr>
                  <tr>
                    <td colspan="6" style="border-top:none;border-left:none;padding:10px;">
                      <span style="font-size:10pt;font-weight:bold">' . $clinic_profile['clinic_name'] . '</span><br>
                    </td>
                  </tr>
                </table>
              </div>';

    $mpdf->SetHeader($header);
    $mpdf->setFooter('PDF Hal' . '{PAGENO} / {nb}');
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);

    $mpdf->Output($name, 'I');
  }
}
