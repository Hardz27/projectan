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
class C_notes_riwayat_menyusui extends CI_Controller
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
    $this->id_ref_global_tipe_42 = 76;
    
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
    $this->c_folder = "C_notes_riwayat_menyusui"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

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
      'title'   => 'Notes Riwayat Menyusui',
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
            'approved_petugas'                    => $jdata['approved_petugas'],
            'umur_bayi'                           => $jdata['notes']['umur_bayi'],
            'asi'                                 => $jdata['notes']['asi'],
            'frekuensi_menyusui'                  => $jdata['notes']['frekuensi_menyusui'],
            'lama_menyusui'                       => $jdata['notes']['lama_menyusui'],
            'menyusu_waktu_malam'                 => $jdata['notes']['menyusu_waktu_malam'],
            'jumlah_dan_frekuensi'                => $jdata['notes']['jumlah_dan_frekuensi'],
            'cairan_lain'                         => $jdata['notes']['cairan_lain'],
            'makanan_lain'                        => $jdata['notes']['makanan_lain'],
            'penggunaan_botol'                    => $jdata['notes']['penggunaan_botol'],
            'kesulitan_pemberian_makan'           => $jdata['notes']['kesulitan_pemberian_makan'],
            'kms'                                 => $jdata['notes']['kms'],
            'frekuensi_bak'                       => $jdata['notes']['frekuensi_bak'],
            'buang_air_besar'                     => $jdata['notes']['buang_air_besar'],
            'penyakit'                            => $jdata['notes']['penyakit'],
            'perilaku'                            => $jdata['notes']['perilaku'],
            'perawatan_kehamilan'                 => $jdata['notes']['perawatan_kehamilan'],
            'diskusi'                             => $jdata['notes']['diskusi'],
            'persalinan_imd'                      => $jdata['notes']['persalinan_imd'],
            'rawat_gabung'                        => $jdata['notes']['rawat_gabung'],
            'asupan_prelaktal'                    => $jdata['notes']['asupan_prelaktal'],
            'bantuan_menyusui'                    => $jdata['notes']['bantuan_menyusui'],
            'umur'                                => $jdata['notes']['umur'],
            'kesehatan'                           => $jdata['notes']['kesehatan'],
            'kebiasaan'                           => $jdata['notes']['kebiasaan'],
            'keadaan_payudara'                    => $jdata['notes']['keadaan_payudara'],
            'kb'                                  => $jdata['notes']['kb'],
            'motivasi_untuk_menyusui'             => $jdata['notes']['motivasi_untuk_menyusui'],
            'jumlah_anak_sebelumnya'              => $jdata['notes']['jumlah_anak_sebelumnya'],
            'berapa_yang_disusui'                 => $jdata['notes']['berapa_yang_disusui'],
            'menyusui_ekslusif_atau_campur'       => $jdata['notes']['menyusui_ekslusif_atau_campur'],
            'pengalaman_pemberian_makanan_lain'   => $jdata['notes']['pengalaman_pemberian_makanan_lain'],
            'situasi_pekerjaan'                   => $jdata['notes']['situasi_pekerjaan'],
            'keadaan_ekonomi'                     => $jdata['notes']['keadaan_ekonomi'],
            'sikap_keluarga'                      => $jdata['notes']['sikap_keluarga'],
            'bantuan_perawatan'                   => $jdata['notes']['bantuan_perawatan'],
            'kesimpulan'                          => $jdata['notes']['kesimpulan'],
            
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
      'umur_bayi'                             =>  $this->input->post('umur_bayi'),
      'asi'                                   =>  $this->input->post('asi'),
      'frekuensi_menyusui'                    =>  $this->input->post('frekuensi_menyusui'),
      'lama_menyusui'                         =>  $this->input->post('lama_menyusui'),
      'menyusu_waktu_malam'                   =>  $this->input->post('menyusu_waktu_malam'),
      'jumlah_dan_frekuensi'                  =>  $this->input->post('jumlah_dan_frekuensi'),
      'cairan_lain'                           =>  $this->input->post('cairan_lain'),
      'makanan_lain'                          =>  $this->input->post('makanan_lain'),
      'penggunaan_botol'                      =>  $this->input->post('penggunaan_botol'),
      'kesulitan_pemberian_makan'             =>  $this->input->post('kesulitan_pemberian_makan'),
      'kms'                                   =>  $this->input->post('kms'),
      'frekuensi_bak'                         =>  $this->input->post('frekuensi_bak'),
      'buang_air_besar'                       =>  $this->input->post('buang_air_besar'),
      'penyakit'                              =>  $this->input->post('penyakit'),
      'perilaku'                              =>  $this->input->post('perilaku'),
      'perawatan_kehamilan'                   =>  $this->input->post('perawatan_kehamilan'),
      'diskusi'                               =>  $this->input->post('diskusi'),
      'persalinan_imd'                        =>  $this->input->post('persalinan_imd'),
      'rawat_gabung'                          =>  $this->input->post('rawat_gabung'),
      'asupan_prelaktal'                      =>  $this->input->post('asupan_prelaktal'),
      'bantuan_menyusui'                      =>  $this->input->post('bantuan_menyusui'),
      'umur'                                  =>  $this->input->post('umur'),
      'kesehatan'                             =>  $this->input->post('kesehatan'),
      'kebiasaan'                             =>  $this->input->post('kebiasaan'),
      'keadaan_payudara'                      =>  $this->input->post('keadaan_payudara'),
      'kb'                                    =>  $this->input->post('kb'),
      'motivasi_untuk_menyusui'               =>  $this->input->post('motivasi_untuk_menyusui'),
      'jumlah_anak_sebelumnya'                =>  $this->input->post('jumlah_anak_sebelumnya'),
      'berapa_yang_disusui'                   =>  $this->input->post('berapa_yang_disusui'),
      'menyusui_ekslusif_atau_campur'         =>  $this->input->post('menyusui_ekslusif_atau_campur'),
      'pengalaman_pemberian_makanan_lain'     =>  $this->input->post('pengalaman_pemberian_makanan_lain'),
      'situasi_pekerjaan'                     =>  $this->input->post('situasi_pekerjaan'),
      'keadaan_ekonomi'                       =>  $this->input->post('keadaan_ekonomi'),
      'sikap_keluarga'                        =>  $this->input->post('sikap_keluarga'),
      'bantuan_perawatan'                     =>  $this->input->post('bantuan_perawatan'),
      'kesimpulan'                            =>  $this->input->post('kesimpulan'),
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
      'approved_petugas'                        => $result['approved_petugas'],
            'umur_bayi'                         => $result['notes']['umur_bayi'],
            'asi'                               => $result['notes']['asi'],
            'frekuensi_menyusui'                => $result['notes']['frekuensi_menyusui'],
            'lama_menyusui'                     => $result['notes']['lama_menyusui'],
            'menyusu_waktu_malam'               => $result['notes']['menyusu_waktu_malam'],
            'jumlah_dan_frekuensi'              => $result['notes']['jumlah_dan_frekuensi'],
            'cairan_lain'                       => $result['notes']['cairan_lain'],
            'makanan_lain'                      => $result['notes']['makanan_lain'],
            'penggunaan_botol'                  => $result['notes']['penggunaan_botol'],
            'kesulitan_pemberian_makan'         => $result['notes']['kesulitan_pemberian_makan'],
            'kms'                               => $result['notes']['kms'],
            'frekuensi_bak'                     => $result['notes']['frekuensi_bak'],
            'buang_air_besar'                   => $result['notes']['buang_air_besar'],
            'penyakit'                          => $result['notes']['penyakit'],
            'perilaku'                          => $result['notes']['perilaku'],
            'perawatan_kehamilan'               => $result['notes']['perawatan_kehamilan'],
            'diskusi'                           => $result['notes']['diskusi'],
            'persalinan_imd'                    => $result['notes']['persalinan_imd'],
            'rawat_gabung'                      => $result['notes']['rawat_gabung'],
            'asupan_prelaktal'                  => $result['notes']['asupan_prelaktal'],
            'bantuan_menyusui'                  => $result['notes']['bantuan_menyusui'],
            'umur'                              => $result['notes']['umur'],
            'kesehatan'                         => $result['notes']['kesehatan'],
            'kebiasaan'                         => $result['notes']['kebiasaan'],
            'keadaan_payudara'                  => $result['notes']['keadaan_payudara'],
            'kb'                                => $result['notes']['kb'],
            'motivasi_untuk_menyusui'           => $result['notes']['motivasi_untuk_menyusui'],
            'jumlah_anak_sebelumnya'            => $result['notes']['jumlah_anak_sebelumnya'],
            'berapa_yang_disusui'               => $result['notes']['berapa_yang_disusui'],
            'menyusui_ekslusif_atau_campur'     => $result['notes']['menyusui_ekslusif_atau_campur'],
            'pengalaman_pemberian_makanan_lain' => $result['notes']['pengalaman_pemberian_makanan_lain'],
            'situasi_pekerjaan'                 => $result['notes']['situasi_pekerjaan'],
            'keadaan_ekonomi'                   => $result['notes']['keadaan_ekonomi'],
            'sikap_keluarga'                    => $result['notes']['sikap_keluarga'],
            'bantuan_perawatan'                 => $result['notes']['bantuan_perawatan'],
            'kesimpulan'                        => $result['notes']['kesimpulan'],
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
      'umur_bayi'                             =>  $this->input->post('umur_bayi'),
      'asi'                                   =>  $this->input->post('asi'),
      'frekuensi_menyusui'                    =>  $this->input->post('frekuensi_menyusui'),
      'lama_menyusui'                         =>  $this->input->post('lama_menyusui'),
      'menyusu_waktu_malam'                   =>  $this->input->post('menyusu_waktu_malam'),
      'jumlah_dan_frekuensi'                  =>  $this->input->post('jumlah_dan_frekuensi'),
      'cairan_lain'                           =>  $this->input->post('cairan_lain'),
      'makanan_lain'                          =>  $this->input->post('makanan_lain'),
      'penggunaan_botol'                      =>  $this->input->post('penggunaan_botol'),
      'kesulitan_pemberian_makan'             =>  $this->input->post('kesulitan_pemberian_makan'),
      'kms'                                   =>  $this->input->post('kms'),
      'frekuensi_bak'                         =>  $this->input->post('frekuensi_bak'),
      'buang_air_besar'                       =>  $this->input->post('buang_air_besar'),
      'penyakit'                              =>  $this->input->post('penyakit'),
      'perilaku'                              =>  $this->input->post('perilaku'),
      'perawatan_kehamilan'                   =>  $this->input->post('perawatan_kehamilan'),
      'diskusi'                               =>  $this->input->post('diskusi'),
      'persalinan_imd'                        =>  $this->input->post('persalinan_imd'),
      'rawat_gabung'                          =>  $this->input->post('rawat_gabung'),
      'asupan_prelaktal'                      =>  $this->input->post('asupan_prelaktal'),
      'bantuan_menyusui'                      =>  $this->input->post('bantuan_menyusui'),
      'umur'                                  =>  $this->input->post('umur'),
      'kesehatan'                             =>  $this->input->post('kesehatan'),
      'kebiasaan'                             =>  $this->input->post('kebiasaan'),
      'keadaan_payudara'                      =>  $this->input->post('keadaan_payudara'),
      'kb'                                    =>  $this->input->post('kb'),
      'motivasi_untuk_menyusui'               =>  $this->input->post('motivasi_untuk_menyusui'),
      'jumlah_anak_sebelumnya'                =>  $this->input->post('jumlah_anak_sebelumnya'),
      'berapa_yang_disusui'                   =>  $this->input->post('berapa_yang_disusui'),
      'menyusui_ekslusif_atau_campur'         =>  $this->input->post('menyusui_ekslusif_atau_campur'),
      'pengalaman_pemberian_makanan_lain'     =>  $this->input->post('pengalaman_pemberian_makanan_lain'),
      'situasi_pekerjaan'                     =>  $this->input->post('situasi_pekerjaan'),
      'keadaan_ekonomi'                       =>  $this->input->post('keadaan_ekonomi'),
      'sikap_keluarga'                        =>  $this->input->post('sikap_keluarga'),
      'bantuan_perawatan'                     =>  $this->input->post('bantuan_perawatan'),
      'kesimpulan'                            =>  $this->input->post('kesimpulan'),
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
      'approved_petugas'                          => $result['approved_petugas'],
      'digital_signature_approved_petugas'        => $result['digital_signature_approved_petugas'],
      'created_date'                              => $result['created_date'],
            'umur_bayi'                           => $result['notes']['umur_bayi'],
            'asi'                                 => $result['notes']['asi'],
            'frekuensi_menyusui'                  => $result['notes']['frekuensi_menyusui'],
            'lama_menyusui'                       => $result['notes']['lama_menyusui'],
            'menyusu_waktu_malam'                 => $result['notes']['menyusu_waktu_malam'],
            'jumlah_dan_frekuensi'                => $result['notes']['jumlah_dan_frekuensi'],
            'cairan_lain'                         => $result['notes']['cairan_lain'],
            'makanan_lain'                        => $result['notes']['makanan_lain'],
            'penggunaan_botol'                    => $result['notes']['penggunaan_botol'],
            'kesulitan_pemberian_makan'           => $result['notes']['kesulitan_pemberian_makan'],
            'kms'                                 => $result['notes']['kms'],
            'frekuensi_bak'                       => $result['notes']['frekuensi_bak'],
            'buang_air_besar'                     => $result['notes']['buang_air_besar'],
            'penyakit'                            => $result['notes']['penyakit'],
            'perilaku'                            => $result['notes']['perilaku'],
            'perawatan_kehamilan'                 => $result['notes']['perawatan_kehamilan'],
            'diskusi'                             => $result['notes']['diskusi'],
            'persalinan_imd'                      => $result['notes']['persalinan_imd'],
            'rawat_gabung'                        => $result['notes']['rawat_gabung'],
            'asupan_prelaktal'                    => $result['notes']['asupan_prelaktal'],
            'bantuan_menyusui'                    => $result['notes']['bantuan_menyusui'],
            'umur'                                => $result['notes']['umur'],
            'kesehatan'                           => $result['notes']['kesehatan'],
            'kebiasaan'                           => $result['notes']['kebiasaan'],
            'keadaan_payudara'                    => $result['notes']['keadaan_payudara'],
            'kb'                                  => $result['notes']['kb'],
            'motivasi_untuk_menyusui'             => $result['notes']['motivasi_untuk_menyusui'],
            'jumlah_anak_sebelumnya'              => $result['notes']['jumlah_anak_sebelumnya'],
            'berapa_yang_disusui'                 => $result['notes']['berapa_yang_disusui'],
            'menyusui_ekslusif_atau_campur'       => $result['notes']['menyusui_ekslusif_atau_campur'],
            'pengalaman_pemberian_makanan_lain'   => $result['notes']['pengalaman_pemberian_makanan_lain'],
            'situasi_pekerjaan'                   => $result['notes']['situasi_pekerjaan'],
            'keadaan_ekonomi'                     => $result['notes']['keadaan_ekonomi'],
            'sikap_keluarga'                      => $result['notes']['sikap_keluarga'],
            'bantuan_perawatan'                   => $result['notes']['bantuan_perawatan'],
            'kesimpulan'                          => $result['notes']['kesimpulan'],
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
}
