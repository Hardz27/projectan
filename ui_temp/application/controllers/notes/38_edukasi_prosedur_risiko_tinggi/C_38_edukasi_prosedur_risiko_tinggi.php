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
class C_38_edukasi_prosedur_risiko_tinggi extends CI_Controller
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
    $this->id_ref_global_tipe_42 = 38;
    
    // guzzle client
    $this->_client_rs = new Client([
      'base_uri'  => $this->config->item('api_rs'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    $this->_client_notes = new Client([
      'base_uri'  => $this->config->item('api_notes'),
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
    $this->c_folder = "C_38_edukasi_prosedur_risiko_tinggi"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

    //menghilangkan 'C_' pada nama class untuk dinamisasi routing;
    $this->class = str_replace("c_", "", $this->router->fetch_class());

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
      'title'   => 'Notes Edukasi Prosedur Risiko Tinggi',
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

            'notes_id'                    => $o['id'],
            'approved_petugas'            => $jdata['approved_petugas'],
            'approved_dokter'             => $jdata['approved_dokter'],
            'nama_pasien'                 => $jdata['notes']['nama_pasien'],
            'no_mr'                       => $jdata['notes']['no_mr'],
            'tindakan_yang_dilakukan'     => $jdata['notes']['tindakan_yang_dilakukan'],
            'ttl'                         => $jdata['notes']['ttl'],
            'tempat'                      => $jdata['notes']['tempat'],
            'usia'                        => $jdata['notes']['usia'],
            'jenis_kelamin'               => $jdata['notes']['jenis_kelamin'],
            'nama_wali'                   => $jdata['notes']['nama_wali'],
            'usia_wali'                   => $jdata['notes']['usia_wali'],
            'jenis_kelamin_wali'          => $jdata['notes']['jenis_kelamin_wali'],
            'hubungan'                    => $jdata['notes']['hubungan'],
            'nama_pemberi_edukasi'        => $jdata['notes']['nama_pemberi_edukasi'],
            'nama_pelaksana_tindakan'     => $jdata['notes']['nama_pelaksana_tindakan'],
            'diagnosis'                   => $jdata['notes']['diagnosis'],
            'dasar_diagnosis'             => $jdata['notes']['dasar_diagnosis'],
            'jenis_tindakan'              => $jdata['notes']['jenis_tindakan'],
            'indikasi_tindakan'           => $jdata['notes']['indikasi_tindakan'],
            'tata_cara'                   => $jdata['notes']['tata_cara'],
            'tujuan'                      => $jdata['notes']['tujuan'],
            'resiko_komplikasi'           => $jdata['notes']['resiko_komplikasi'],
            'prognosis'                   => $jdata['notes']['prognosis'],
            'alternatif'                  => $jdata['notes']['alternatif'],
            'lain_lain'                   => $jdata['notes']['lain_lain'],
            'tanggal'                     => $jdata['notes']['tanggal'],
            'jam'                         => $jdata['notes']['jam'],
            
            'ttd_untuk_pasien'            => $jdata['notes']['ttd_untuk_pasien'],
            
            'pemberi_edukasi'             => $jdata['notes']['pemberi_edukasi'],
            'nama_tindakan'               => $jdata['notes']['nama_tindakan'],
            'jenis_kelamin_tindakan'      => $jdata['notes']['jenis_kelamin_tindakan'],
            'tanggal_lahir_tindakan'      => $jdata['notes']['tanggal_lahir_tindakan'],
            'usia_tindakan'               => $jdata['notes']['usia_tindakan'],
            'alamat_tindakan'             => $jdata['notes']['alamat_tindakan'],
            'no_identitas'                => $jdata['notes']['no_identitas'],
            'bertindak_selaku'            => $jdata['notes']['bertindak_selaku'],
            'tindakan_berupa'             => $jdata['notes']['tindakan_berupa'],
            'terhadap_nama'               => $jdata['notes']['terhadap_nama'],
            'terhadap_jenis_kelamin'      => $jdata['notes']['terhadap_jenis_kelamin'],
            'terhadap_tanggal_lahir'      => $jdata['notes']['terhadap_tanggal_lahir'],
            'terhadap_usia'               => $jdata['notes']['terhadap_usia'],
            'terhadap_no_mr'              => $jdata['notes']['terhadap_no_mr'],
            'tanggal1'                    => $jdata['notes']['tanggal1'],
            'jam1'                        => $jdata['notes']['jam1'],
            'coretan_pasien'              => $jdata['notes']['coretan_pasien'],
            'coretan_wali'                => $jdata['notes']['coretan_wali'],
            'coretan_saksi'               => $jdata['notes']['coretan_saksi'],
            'nama_saksi_rs'               => $jdata['notes']['nama_saksi_rs'],
            
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


      $data['id_reg'] = $this->input->post('id_reg', true);
      $data['data_visit'] = $data_visit;

      $this->load->view('contents/notes/' . $this->class  . '/add', $data);
    }
  }

  public function add_process()
  {
    $notes = [
      'nama_pasien'                         =>  $this->input->post('nama_pasien'),
      'no_mr'                               =>  $this->input->post('no_mr'),
      'ttl'                                 =>  $this->input->post('ttl'),
      'tempat'                                 =>  $this->input->post('tempat'),
      'usia'                                =>  $this->input->post('usia'),
      'jenis_kelamin'                       =>  $this->input->post('jenis_kelamin'),
      'tindakan_yang_dilakukan'             =>  $this->input->post('tindakan_yang_dilakukan'),
      'nama_wali'                           =>  $this->input->post('nama_wali'),
      'usia_wali'                           =>  $this->input->post('usia_wali'),
      'jenis_kelamin_wali'                  =>  $this->input->post('jenis_kelamin_wali'),
      'hubungan'                            =>  $this->input->post('hubungan'),
      'nama_pemberi_edukasi'                =>  $this->input->post('nama_pemberi_edukasi'),
      'nama_pelaksana_tindakan'             =>  $this->input->post('nama_pelaksana_tindakan'),
      'diagnosis'                           =>  $this->input->post('diagnosis'),
      'dasar_diagnosis'                     =>  $this->input->post('dasar_diagnosis'),
      'jenis_tindakan'                      =>  $this->input->post('jenis_tindakan'),
      'indikasi_tindakan'                   =>  $this->input->post('indikasi_tindakan'),
      'tata_cara'                           =>  $this->input->post('tata_cara'),
      'tujuan'                              =>  $this->input->post('tujuan'),
      'resiko_komplikasi'                   =>  $this->input->post('resiko_komplikasi'),
      'prognosis'                           =>  $this->input->post('prognosis'),
      'alternatif'                          =>  $this->input->post('alternatif'),
      'lain_lain'                           =>  $this->input->post('lain_lain'),
      'tanggal'                             =>  $this->input->post('tanggal'),
      'jam'                                 =>  $this->input->post('jam'),
      'ttd_wali'                            =>  $this->input->post('ttd_wali'),
      'ttd_pasien'                          =>  $this->input->post('ttd_pasien'),
      'ttd_untuk_pasien'                    =>  $this->input->post('ttd_untuk_pasien'),
      'saksi_pihak_rs'                      =>  $this->input->post('saksi_pihak_rs'),
      'pemberi_edukasi'                     =>  $this->input->post('pemberi_edukasi'),
      'nama_tindakan'                       =>  $this->input->post('nama_tindakan'),
      'jenis_kelamin_tindakan'              =>  $this->input->post('jenis_kelamin_tindakan'),
      'tanggal_lahir_tindakan'              =>  $this->input->post('tanggal_lahir_tindakan'),
      'usia_tindakan'                       =>  $this->input->post('usia_tindakan'),
      'alamat_tindakan'                     =>  $this->input->post('alamat_tindakan'),
      'no_identitas'                        =>  $this->input->post('no_identitas'),
      'bertindak_selaku'                    =>  $this->input->post('bertindak_selaku'),
      'tindakan_berupa'                     =>  $this->input->post('tindakan_berupa'),
      'terhadap_nama'                       =>  $this->input->post('terhadap_nama'),
      'terhadap_tanggal_lahir'              =>  $this->input->post('terhadap_tanggal_lahir'),
      'terhadap_jenis_kelamin'              =>  $this->input->post('terhadap_jenis_kelamin'),
      'terhadap_usia'                       =>  $this->input->post('terhadap_usia'),
      'terhadap_no_mr'                      =>  $this->input->post('terhadap_no_mr'),
      'tanggal1'                            =>  $this->input->post('tanggal1'),
      'jam1'                                =>  $this->input->post('jam1'),
       'coretan_pasien'                      =>  $this->input->post('coretan_pasien'),
      'coretan_wali'                        =>  $this->input->post('coretan_wali'),
      'coretan_saksi'                       =>  $this->input->post('coretan_saksi'),
      'nama_saksi_rs'                       =>  $this->input->post('nama_saksi_rs'),
      
      
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
            'approved_petugas'            =>  $result['approved_petugas'],
            'approved_dokter'             => $result['approved_dokter'],
            'nama_pasien'                 => $result['notes']['nama_pasien'],
            'no_mr'                       => $result['notes']['no_mr'],
            'ttl'                         => $result['notes']['ttl'],
            'tempat'                      => $result['notes']['tempat'],
            'usia'                        => $result['notes']['usia'],
            'jenis_kelamin'               => $result['notes']['jenis_kelamin'],
            'nama_wali'                   => $result['notes']['nama_wali'],
            'tindakan_yang_dilakukan'     => $result['notes']['tindakan_yang_dilakukan'],
            'usia_wali'                   => $result['notes']['usia_wali'],
            'jenis_kelamin_wali'          => $result['notes']['jenis_kelamin_wali'],
            'hubungan'                    => $result['notes']['hubungan'],
            'nama_pemberi_edukasi'        => $result['notes']['nama_pemberi_edukasi'],
            'nama_pelaksana_tindakan'     => $result['notes']['nama_pelaksana_tindakan'],
            'diagnosis'                   => $result['notes']['diagnosis'],
            'dasar_diagnosis'             => $result['notes']['dasar_diagnosis'],
            'jenis_tindakan'              => $result['notes']['jenis_tindakan'],
            'indikasi_tindakan'           => $result['notes']['indikasi_tindakan'],
            'tata_cara'                   => $result['notes']['tata_cara'],
            'tujuan'                      => $result['notes']['tujuan'],
            'resiko_komplikasi'           => $result['notes']['resiko_komplikasi'],
            'prognosis'                   => $result['notes']['prognosis'],
            'alternatif'                  => $result['notes']['alternatif'],
            'lain_lain'                   => $result['notes']['lain_lain'],
            'tanggal'                     => $result['notes']['tanggal'],
            'jam'                         => $result['notes']['jam'],
            'ttd_wali'                    => $result['notes']['ttd_wali'],
            'ttd_pasien'                  => $result['notes']['ttd_pasien'],
            'ttd_untuk_pasien'            => $result['notes']['ttd_untuk_pasien'],
            'saksi_pihak_rs'              => $result['notes']['saksi_pihak_rs'],
            'pemberi_edukasi'             => $result['notes']['pemberi_edukasi'],
            'nama_tindakan'               => $result['notes']['nama_tindakan'],
            'jenis_kelamin_tindakan'      => $result['notes']['jenis_kelamin_tindakan'],
            'tanggal_lahir_tindakan'      => $result['notes']['tanggal_lahir_tindakan'],
            'usia_tindakan'               => $result['notes']['usia_tindakan'],
            'alamat_tindakan'             => $result['notes']['alamat_tindakan'],
            'no_identitas'                => $result['notes']['no_identitas'],
            'bertindak_selaku'            => $result['notes']['bertindak_selaku'],
            'tindakan_berupa'             => $result['notes']['tindakan_berupa'],
            'terhadap_nama'               => $result['notes']['terhadap_nama'],
            'terhadap_jenis_kelamin'      => $result['notes']['terhadap_jenis_kelamin'],
            'terhadap_tanggal_lahir'      => $result['notes']['terhadap_tanggal_lahir'],
            'terhadap_usia'               => $result['notes']['terhadap_usia'],
            'terhadap_no_mr'              => $result['notes']['terhadap_no_mr'],
            'tanggal1'                    => $result['notes']['tanggal1'],
            'jam1'                        => $result['notes']['jam1'],
            'coretan_pasien'                      =>  $result['notes']['coretan_pasien'],
      'coretan_wali'                        =>  $result['notes']['coretan_wali'],
      'coretan_saksi'                       =>  $result['notes']['coretan_saksi'],
            'nama_saksi_rs'               => $result['notes']['nama_saksi_rs'],
            
    ];
    $result_data = $result_data['data'][0];

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

      'nama_pasien'                         =>  $this->input->post('nama_pasien'),
      'no_mr'                               =>  $this->input->post('no_mr'),
      'ttl'                                 =>  $this->input->post('ttl'),
      'tempat'                              =>  $this->input->post('tempat'),
      'usia'                                =>  $this->input->post('usia'),
      'jenis_kelamin'                       =>  $this->input->post('jenis_kelamin'),
      'nama_wali'                           =>  $this->input->post('nama_wali'),
      'usia_wali'                           =>  $this->input->post('usia_wali'),
      'jenis_kelamin_wali'                  =>  $this->input->post('jenis_kelamin_wali'),
      'hubungan'                            =>  $this->input->post('hubungan'),
      'nama_pemberi_edukasi'                =>  $this->input->post('nama_pemberi_edukasi'),
      'tindakan_yang_dilakukan'             =>  $this->input->post('tindakan_yang_dilakukan'),
      'nama_pelaksana_tindakan'             =>  $this->input->post('nama_pelaksana_tindakan'),
      'diagnosis'                           =>  $this->input->post('diagnosis'),
      'dasar_diagnosis'                     =>  $this->input->post('dasar_diagnosis'),
      'jenis_tindakan'                      =>  $this->input->post('jenis_tindakan'),
      'indikasi_tindakan'                   =>  $this->input->post('indikasi_tindakan'),
      'tata_cara'                           =>  $this->input->post('tata_cara'),
      'tujuan'                              =>  $this->input->post('tujuan'),
      'resiko_komplikasi'                   =>  $this->input->post('resiko_komplikasi'),
      'prognosis'                           =>  $this->input->post('prognosis'),
      'alternatif'                          =>  $this->input->post('alternatif'),
      'lain_lain'                           =>  $this->input->post('lain_lain'),
      'tanggal'                             =>  $this->input->post('tanggal'),
      'jam'                                 =>  $this->input->post('jam'),
      'ttd_wali'                            =>  $this->input->post('ttd_wali'),
      'ttd_pasien'                          =>  $this->input->post('ttd_pasien'),
      'ttd_untuk_pasien'                    =>  $this->input->post('ttd_untuk_pasien'),
      'saksi_pihak_rs'                      =>  $this->input->post('saksi_pihak_rs'),
      'pemberi_edukasi'                     =>  $this->input->post('pemberi_edukasi'),
      'nama_tindakan'                       =>  $this->input->post('nama_tindakan'),
      'jenis_kelamin_tindakan'              =>  $this->input->post('jenis_kelamin_tindakan'),
      'tanggal_lahir_tindakan'              =>  $this->input->post('tanggal_lahir_tindakan'),
      'usia_tindakan'                       =>  $this->input->post('usia_tindakan'),
      'alamat_tindakan'                     =>  $this->input->post('alamat_tindakan'),
      'no_identitas'                        =>  $this->input->post('no_identitas'),
      'bertindak_selaku'                    =>  $this->input->post('bertindak_selaku'),
      'tindakan_berupa'                     =>  $this->input->post('tindakan_berupa'),
      'terhadap_nama'                       =>  $this->input->post('terhadap_nama'),
      'terhadap_tanggal_lahir'              =>  $this->input->post('terhadap_tanggal_lahir'),
      'terhadap_jenis_kelamin'              =>  $this->input->post('terhadap_jenis_kelamin'),
      'terhadap_usia'                       =>  $this->input->post('terhadap_usia'),
      'terhadap_no_mr'                      =>  $this->input->post('terhadap_no_mr'),
      'tanggal1'                            =>  $this->input->post('tanggal1'),
      'jam1'                                =>  $this->input->post('jam1'),
       'coretan_pasien'                      =>  $this->input->post('coretan_pasien'),
      'coretan_wali'                        =>  $this->input->post('coretan_wali'),
      'coretan_saksi'                       =>  $this->input->post('coretan_saksi'),
      'nama_saksi_rs'                       =>  $this->input->post('nama_saksi_rs'),
      
      
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
            'digital_signature_approved_petugas'  => $result['digital_signature_approved_petugas'],
      'digital_signature_approved_dokter'  => $result['digital_signature_approved_dokter'],
      'approved_petugas'                    =>  $result['approved_petugas'],
      'digital_signature_approved_petugas'  =>  $result['digital_signature_approved_petugas'],
      'approved_dokter'                     => $result['approved_dokter'],
            'nama_pasien'                 => $result['notes']['nama_pasien'],
            'no_mr'                       => $result['notes']['no_mr'],
            'ttl'                         => $result['notes']['ttl'],
            'tempat'                         => $result['notes']['tempat'],
            'usia'                        => $result['notes']['usia'],
            'jenis_kelamin'               => $result['notes']['jenis_kelamin'],
            'nama_wali'                   => $result['notes']['nama_wali'],
            'usia_wali'                   => $result['notes']['usia_wali'],
            'tindakan_yang_dilakukan'     => $result['notes']['tindakan_yang_dilakukan'],
            'jenis_kelamin_wali'          => $result['notes']['jenis_kelamin_wali'],
            'hubungan'                    => $result['notes']['hubungan'],
            'nama_pemberi_edukasi'        => $result['notes']['nama_pemberi_edukasi'],
            'nama_pelaksana_tindakan'     => $result['notes']['nama_pelaksana_tindakan'],
            'diagnosis'                   => $result['notes']['diagnosis'],
            'dasar_diagnosis'             => $result['notes']['dasar_diagnosis'],
            'jenis_tindakan'              => $result['notes']['jenis_tindakan'],
            'indikasi_tindakan'           => $result['notes']['indikasi_tindakan'],
            'tata_cara'                   => $result['notes']['tata_cara'],
            'tujuan'                      => $result['notes']['tujuan'],
            'resiko_komplikasi'           => $result['notes']['resiko_komplikasi'],
            'prognosis'                   => $result['notes']['prognosis'],
            'alternatif'                  => $result['notes']['alternatif'],
            'lain_lain'                   => $result['notes']['lain_lain'],
            'tanggal'                     => $result['notes']['tanggal'],
            'jam'                         => $result['notes']['jam'],
            'ttd_wali'                    => $result['notes']['ttd_wali'],
            'ttd_pasien'                  => $result['notes']['ttd_pasien'],
            'ttd_untuk_pasien'            => $result['notes']['ttd_untuk_pasien'],
            'saksi_pihak_rs'              => $result['notes']['saksi_pihak_rs'],
            'pemberi_edukasi'             => $result['notes']['pemberi_edukasi'],
            'nama_tindakan'               => $result['notes']['nama_tindakan'],
            'jenis_kelamin_tindakan'      => $result['notes']['jenis_kelamin_tindakan'],
            'tanggal_lahir_tindakan'      => $result['notes']['tanggal_lahir_tindakan'],
            'usia_tindakan'               => $result['notes']['usia_tindakan'],
            'alamat_tindakan'             => $result['notes']['alamat_tindakan'],
            'no_identitas'                => $result['notes']['no_identitas'],
            'bertindak_selaku'            => $result['notes']['bertindak_selaku'],
            'tindakan_berupa'             => $result['notes']['tindakan_berupa'],
            'terhadap_nama'               => $result['notes']['terhadap_nama'],
            'terhadap_jenis_kelamin'      => $result['notes']['terhadap_jenis_kelamin'],
            'terhadap_tanggal_lahir'      => $result['notes']['terhadap_tanggal_lahir'],
            'terhadap_usia'               => $result['notes']['terhadap_usia'],
            'terhadap_no_mr'              => $result['notes']['terhadap_no_mr'],
            'tanggal1'                    => $result['notes']['tanggal1'],
            'jam1'                        => $result['notes']['jam1'],
            'coretan_pasien'                      =>  $result['notes']['coretan_pasien'],
      'coretan_wali'                        =>  $result['notes']['coretan_wali'],
      'coretan_saksi'                       =>  $result['notes']['coretan_saksi'],
            'nama_saksi_rs'               => $result['notes']['nama_saksi_rs'],
            
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
