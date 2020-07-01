<?php defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\RequestException;

/**********************************************************************************
 *
 * Deskripsi
 * Menampilkan halaman client/notes_temp
 *
 **********************************************************************************/
class C_notes_askep_intervensi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // add session statis
    $data = [
      'id_user' => "123",
      'rs_key'  => "900614f7-7acd-11e8-a953-fa163e101f72",
      'user_login' => [
        'id_user' => "373680"
      ],
      'data_pasien' => [
        'id_visit'  => "5164",
        'id_dept'   => "12"
      ],
      'no_rm'      => "008000649",
      'timezone' => "Asia/Jakarta"
    ];
    $this->session->set_userdata($data);

    // token diambil dari postman, kalau sudah expired sikahkan ambil lagi.
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoiTkFNQSAyIiwiaWRfdXNlciI6IjM3MzY4MSIsInJtX251bWJlciI6ImFkbWluIiwicnNfa2V5IjoiQTEyMyIsImlwX2FkZHJlc3MiOiIxMjcuMC4xLjEiLCJhY2Nlc3MiOiJ1c2VyIn0.ubW6fyc7ErYOW2T5qFbjXvLIVTLp05s3A0paQ6wfcmo";
    $this->_id_ref_global_tipe_42 = 999;
    
    // $this->url_rs = 'http://127.0.0.1/projects/server/';

    // guzzle client
    $this->_client_rs = new Client([
      // 'base_uri'  => $this->url_rs,
      'base_uri'  => $this->config->item('api_rs'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    // $this->_client_rs = new Client([
    //   'base_uri'  => $this->config->item('api_rs'),
    //   'headers'   => [
    //     'Content-Type' => 'application/json',
    //     'x-token' => $token
    //   ]
    // ]);

    $this->_client_ref = new Client([
      'base_uri'  => $this->config->item('api_ref'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    // NAMA FOLDER DALAM CONTROLLER.
    // HANYA EDIT DI SINI.. YANG LAIN TIDAK PERLU DIRUBAH... TOLONG GANTI DENGAN NAMA FOLDER YANG BARU
    $this->c_folder = "notes_temp"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

    //menghilangkan 'C_' pada nama class untuk dinamisasi routing;
    $this->class = str_replace("c_", "", $this->router->fetch_class());

    //dummy id departemen
    $this->id_dept = 3;

    // untuk menyimpan data ke /tmp untuk ditampilkan di cetak
    $this->folder = $this->config->item('tmp_folder');
  }

  // redirect ke fungsi list
  public function index()
  // $route['notes_temp'] = 'notes_temp/c_notes_temp';
  {
    redirect(base_url() . $this->class . '/list');
  }

  // START WORKING DARI SINI KE BAWAH UNTUK FUNGSI CRUD SAMPAI PDF
  // START WORKING DARI SINI KE BAWAH UNTUK FUNGSI CRUD SAMPAI PDF
  // START WORKING DARI SINI KE BAWAH UNTUK FUNGSI CRUD SAMPAI PDF




  // Menampilkan tampilan aktif dan arsip
  public function list()
  {
    $data = array(
      'title'   => 'Notes',
      'class_name' => $this->class
    );

    if ($this->input->is_ajax_request()) {
      $this->load->view('contents/notes/' . $this->class . '/index', $data);
    } else {
      $data['contents'] = 'contents/notes/' . $this->class . '/index';
      $this->load->view('master', $data);
    }
  }

  //mengambil data registrasi untuk di tampilkan di aktif dan arsip
  function get_kunjungan($type)
  {
    // data dummy list registrasi aktif untuk di view index.php
    if ($type == 'list') {
      $no_rm = $this->session->userdata('no_rm');

      //aktif
      $params = [
        'no_rm' => $no_rm,
        'type'  => 'registrasi',
        'status' => 'active'
      ];
      $response_reg_aktif = $this->_client_rs->request('GET', 'kunjungan', [
        'query' => [
          // 'no_rm' => $data['no_rm'],
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

      $data['id_visit'] = $this->session->userdata['data_pasien']['id_visit'];

      $this->load->view('contents/notes/' . $this->class . '/list', $data);
    }
  }

  public function detail_intervensi($id){
    $response_code = $this->_client_rs->request('GET', 'askep_intervensi_all',[
      'query' => [
        'id' => $id,
      ]
    ]);
    $data = json_decode($response_code->getBody()->getContents(), true)['data'][0];
    echo json_encode($data);
  }

  public function render_data($type, $id_reg, $status)
  {
    $response_visit = $this->_client_rs->request('GET', 'kunjungan', [
      'query' => [
        'no_rm' => $this->session->userdata('no_rm'),
        'type'  => 'visit',
        'id_reg' => $id_reg,
      ]
    ]);
    $data_visit = json_decode($response_visit->getBody()->getContents(), true)['data']['visit'];
    if ($type == 'list') {

      foreach ($data_visit as $k => $v) {
        $notes = [];
        $response_notes = $this->_client_rs->request('GET', 'notes_askep_diagnosa_render', [
          'query' => [
            // 'id_visit'  => $v['id_visit'],
            'id_visit'  => '6133',
            'no_rm' => $this->session->userdata('no_rm'),
          ]
        ]);

        $data_notes = json_decode($response_notes->getBody()->getContents(), true)['data'];
        if ($data_notes != null) {




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
            'data' => $data_notes
          ];
          $user_id      = $this->session->userdata('id_user');
        }
      }
    }

    if ($status == '1') {
      $status = 'aktif';
    } elseif ($status == '2') {
      $status = 'arsip';
    }
    $data['id_reg'] = $id_reg;
    // trace($data);
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

      $response_code = $this->_client_rs->request('GET', 'askep_intervensi_all');
      $data['data_askep_intervensi'] = json_decode($response_code->getBody()->getContents(), true)['data'];

      $response_code = $this->_client_rs->request('GET', 'askep_intervensi/diagnosa');
      $data['data_askep_diagnosa'] = json_decode($response_code->getBody()->getContents(), true)['data'];


      $data['id_reg'] = $this->input->post('id_reg', true);
      $data['data_visit'] = $data_visit;
      $this->load->view('contents/notes/' . $this->class  . '/add', $data);
    }
  }

  public function add_process()
  {
    $jlh_data = count($this->input->post('diagnosa_askep_intervensi_kode'));

    $json_data = [];
    for ($i = 0; $i < $jlh_data; $i++) {

      $params = [
        'no_rm' => $this->session->userdata('no_rm'),
        'id_pasien_registrasi' => $this->input->post('id_reg'),
        'id_askep_diagnosa' => $this->input->post('askep_diagnosa'),
        // 'id_pasien_visit' => $this->input->post('id_visit'),
        'askep_intervensi_kode' => $this->input->post('diagnosa_askep_intervensi_kode')[$i],
        // 'created_by' => $this->session->userdata['user_login']['id_user'],
        'json_data' => [
          'diagnosa_askep_intervensi_nama' => $this->input->post('diagnosa_askep_intervensi_nama')[$i],
          'diagnosa_askep_intervensi_definisi' => $this->input->post('diagnosa_askep_intervensi_definisi')[$i],
          'diagnosa_askep_intervensi_kategori' => $this->input->post('diagnosa_askep_intervensi_kategori')[$i],
          'diagnosa_askep_intervensi_subkategori' => $this->input->post('diagnosa_askep_intervensi_subkategori')[$i],
          'created_date'                              => date('Y-m-d H:i:s'),
          'created_by_id' => $this->session->userdata['user_login']['id_user'],
        ]
      ];
// echo json_encode($params); die;
      try {
        $this->_config['body'] = json_encode($params);
        $response = $this->_client_rs->request('POST', 'askep_intervensi', $this->_config);

        $result = json_decode($response->getBody()->getContents(), true);
        // echo json_encode($result); die;
        $result['status'] = $response->getStatusCode();
      } catch (ClientException $e) {
        $result['status'] = $e->getResponse()->getStatusCode();
      } catch (ServerException $e) {
        $result['status'] = $e->getResponse()->getStatusCode();
      } catch (RequestException $e) {
        $result['status'] = $e->getResponse()->getStatusCode();
      }
    }
    echo json_encode($result);
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
    $id_notes_vitals = $this->input->get('id_notes_vitals');


    $response     = $this->_client_rs->request('GET', 'notes_vitals_notes', [
      'query' => [
        'id_notes' => $id_notes,
        'id_notes_vitals' => $id_notes_vitals
      ]
    ]);
    $result_data = json_decode($response->getBody()->getContents(), true);
    $result = $result_data['data'][0]['json_data'];
    $detail = [
      'approved_dokter'   => $result['approved_dokter'],
      'approved_petugas'  => $result['approved_petugas'],
      'data1'             => $result['notes']['data1'],
      'data2'             => $result['notes']['data2'],
      'notes_vitals'      => $result_data['data'][0]['notes_vitals'][0],
    ];
    $detail['id_notes'] = $result_data['data'][0]['id'];
    $detail['id_reg'] = $result_data['data'][0]['id_pasien_registrasi'];
    $detail['id_visit'] = $result_data['data'][0]['id_pasien_visit'];
    $data['result'] = $detail;
    $data['class_name'] = $this->class;
    // trace($data);
    $this->load->view('contents/notes/' . $this->class . '/edit', $data);
  }

  public function edit_process()
  {
    $notes = [
      'data1'                => $this->input->post('data1'),
      'data2'                => $this->input->post('data2'),
      'data3'                => $this->input->post('data3'),
    ];

    $vitals = [
      'id_reg'            => $this->input->post('id_reg'),
      'id_visit'          => $this->input->post('id_visit'),
      'tinggi'            => !strlen($_POST['height']) ? null : $_POST['height'],
      'berat_badan'       => !strlen($_POST['weight']) ? null : $_POST['weight'],
      'systolic'          => !strlen($_POST['systolic']) ? null : $_POST['systolic'],
      'diastolic'         => !strlen($_POST['diastolic']) ? null : $_POST['diastolic'],
      'blood_pressure'    => !strlen($_POST['blood_pressure']) ? null : $_POST['blood_pressure'],
      'temperature'       => !strlen($_POST['temperature']) ? null : $_POST['temperature'],
      'pulse'             => !strlen($_POST['pulse']) ? null : $_POST['pulse'],
      'respiratory_rate'  => !strlen($_POST['respiratory_rate']) ? null : $_POST['respiratory_rate'],
      'kesadaran'         => $this->input->post('kesadaran'),
      'keadaan_umum'      => $this->input->post('keadaan_umum'),
      'nyeri'             => $this->input->post('nyeri'),
      'eye_opening'       => $this->input->post('eye_opening'),
      'verbal_response'   => $this->input->post('verbal_response'),
      'motor_response'    => $this->input->post('motor_response'),
      'spo2'                   => !strlen($_POST['spo2']) ? null : $_POST['spo2'],
      'akral'             => $this->input->post('akral'),
      'reflek_cahaya'     => $this->input->post('reflek_cahaya'),
      'pupil_isokor'      => $this->input->post('pupil_isokor'),
      'pupil_unisokor'    => $this->input->post('pupil_unisokor'),
      'created_date'      => !strlen($_POST['created_date']) ? null : $_POST['created_date'],
      'created_by'        => $this->session->userdata['user_login']['id_user'],
    ];

    $params = [
      'id_notes'            => $this->input->post('id_notes'),
      'id_notes_vitals'            => $this->input->post('id_notes_vitals'),
      'id_pasien_registrasi' => $this->input->post('id_reg'),
      'id_pasien_visit'      => $this->input->post('id_visit'),
      'id_petugas_approve'   => $this->input->post('petugas_approved'),
      'id_dokter_approve'    => $this->input->post('dokter_approved'),
      'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42,
      'no_rm'               => $this->session->userdata('no_rm'),
      'del_by'               => $this->session->userdata['user_login']['id_user'],
      'notes'                => $notes, // NAMANYA HARUS NOTES disesuaikan dengan notesnya
      'vitals'              => $vitals, // harus vitalsya
    ];

    try {
      $this->_config['body'] = json_encode($params);
      $response = $this->_client_rs->request('PUT', 'notes_vitals_notes', $this->_config);
      $result = json_decode($response->getBody()->getContents(), true);
      $result['status'] = $response->getStatusCode();
    } catch (ClientException $e) {
      $result['status'] = $e->getResponse()->getStatusCode();
    } catch (ServerException $e) {
      $result['status'] = $e->getResponse()->getStatusCode();
    } catch (RequestException $e) {
      $result['status'] = $e->getResponse()->getStatusCode();
    }

    echo json_encode($result);
  }

  function delete()
  {
    $params = [
      'id_notes'             => $this->input->get('id_notes'),
      'id_notes_vitals'      => $this->input->get('id_notes_vitals'),
      'del_by'               => '373680',
    ];

    $this->_config['body'] = json_encode($params);
    $response     = $this->_client_rs->request('DELETE', 'notes_vitals_notes', $this->_config);
    $result_pasien = json_decode($response->getBody()->getContents(), true);

    echo json_encode($result_pasien);
  }

  function view_pdf($id_notes)
  {
    $res_vit = $this->_client_rs->request('GET', 'id_notes_vitals', [
      'query' => [
        'id_notes' => $id_notes,
        'id_ref_global_tipe_42' => $this->_id_ref_global_tipe_42
      ]
    ]);
    $id_notes_vitals = json_decode($res_vit->getBody()->getContents(), true)['data'];

    $notes_vitals = $this->_client_rs->request('GET', 'notes_vitals_notes', [
      'query' => [
        'id_notes'  => $id_notes,
        'id_notes_vitals' => $id_notes_vitals
      ]
    ]);
    $o = json_decode($notes_vitals->getBody()->getContents(), true)['data'][0];
    $jdata = $o['json_data'];
    $notes = [
      'notes_id' => $o['id'],
      'approved_dokter' => $jdata['approved_dokter'],
      'approved_petugas' => $jdata['approved_petugas'],
      'id_notes_vitals' => $jdata['id_notes_vitals'],
      'data1' => $jdata['notes']['data1'],
      'data2' => $jdata['notes']['data2'],
      'notes_vitals' => $o['notes_vitals'],
    ];

    $kunjungan = $this->_client_rs->request('GET', 'kunjungan', [
      'query' => [
        'id_visit'  => $o['id_pasien_visit'],
        'no_rm' => $this->session->userdata('no_rm'),
        'type' => 'visit',
      ]
    ]);
    $data_visit = json_decode($kunjungan->getBody()->getContents(), true)['data']['visit'][0];
    $list['notes'] = [
      'id_reg'    => $data_visit['id_registrasi'],
      'no_reg'    => $data_visit['no_reg'],
      'id_visit'  => $data_visit['id_visit'],
      'no_visit'  => $data_visit['no_visit'],
      'penjamin'  => $data_visit['nama_penjamin'],
      'id_dept'   => $data_visit['id_poli'],
      'nama_dept' => $data_visit['nama_dept'],
      'tanggal_checkin' => $data_visit['checkin'],
      'pasien'    => $data_visit,
      'data' => $notes
    ];
    $data['notes'] = $notes ? true : false;
    $user_id      = $this->session->userdata('id_user');

    $rs_key = $this->session->userdata('rs_key');

    $response_prop_clinic     = $this->_client_rs->request('GET', 'clinic_profile', [
      'query' => ['rs_key' => $rs_key]
    ]);
    $prop_clinic = json_decode($response_prop_clinic->getBody()->getContents(), true);
    $clinic_profile = $prop_clinic['data'];

    // form header
    $id_form = 2;

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
      'list' => $list,
    ];
    $html  = $this->load->view('contents/notes/' . $this->class . '/pdf', $data, true);

    $mpdf = new \Mpdf\Mpdf([
      'format'              => 'A4-L',
      'mode'                => 'utf-8',
      'setAutoTopMargin'    => 'stretch',
      'defaultheaderline'   => 0,
      'defaultfooterline'   => 0
    ]);

    $mpdf->SetMargins(0, 0, 12);

    $header = '<div class="row">
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

  function get_diagnosa_details($code)
  {
    $resp = $this->_client_ref->request('GET', 'askep_diagnosa_details', [
      'query' => [
        'code' => $code
      ]
    ]);
    $resp = json_decode($resp->getBody()->getContents(), true)['data'];
    echo json_encode($resp);
    // return $resp;
  }
}
