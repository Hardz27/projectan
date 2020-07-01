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
class C_141_edukasi_tindakan_anastesi_sedasi extends CI_Controller
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
    $this->id_ref_global_tipe_42 = 141;
    
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
    $this->c_folder = "C_141_edukasi_tindakan_anastesi_sedasi"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

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
      'title'   => 'Edukasi TIndakan Anastesi Sedasi',
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
            'tanggal'                             => $jdata['notes']['tanggal'],
            'jam'                                 => $jdata['notes']['jam'],
            'nama_pasien'                         => $jdata['notes']['nama_pasien'],
            'no_mr'                               => $jdata['notes']['no_mr'],
            'ttl'                                 => $jdata['notes']['ttl'],
            'usia'                                => $jdata['notes']['usia'],
            'jenis_kelamin'                       => $jdata['notes']['jenis_kelamin'],
            'agama'                               => $jdata['notes']['agama'],
            'pendidikan'                          => $jdata['notes']['pendidikan'],
            'pekerjaan'                           => $jdata['notes']['pekerjaan'],
            'status_pernikahan'                   => $jdata['notes']['status_pernikahan'],
            'keluhan_utama'                       => $jdata['notes']['keluhan_utama'],
            'riwayat_penyakit_sekarang'           => $jdata['notes']['riwayat_penyakit_sekarang'],
            'riwayat_penyakit_dahulu'             => $jdata['notes']['riwayat_penyakit_dahulu'],
            'td'                                  => $jdata['notes']['td'],
            'hr'                                  => $jdata['notes']['hr'],
            'rr'                                  => $jdata['notes']['rr'],
            'suhu'                                => $jdata['notes']['suhu'],
            'skala_nyeri'                         => $jdata['notes']['skala_nyeri'],
            'tidur_bedrest_gendong'               => $jdata['notes']['tidur_bedrest_gendong'],
            'jalan_sendiri'                       => $jdata['notes']['jalan_sendiri'],
            'kursi_roda'                          => $jdata['notes']['kursi_roda'],
            'alat_bantu'                          => $jdata['notes']['alat_bantu'],
            'prothesis'                           => $jdata['notes']['prothesis'],
            'deformitas'                          => $jdata['notes']['deformitas'],
            'resiko_jatuh'                        => $jdata['notes']['resiko_jatuh'],
            'lainlain'                            => $jdata['notes']['lainlain'],
            'pemeriksaan_muskuloskeletal'         => $jdata['notes']['pemeriksaan_muskuloskeletal'],
            'pemeriksaan_neuromuskular'           => $jdata['notes']['pemeriksaan_neuromuskular'],
            'pemeriksaan_kardiopulmonal'          => $jdata['notes']['pemeriksaan_kardiopulmonal'],
            'pemeriksaan_integumentum'            => $jdata['notes']['pemeriksaan_integumentum'],
            'pengukuran_muskuloskeletal'          => $jdata['notes']['pengukuran_muskuloskeletal'],
            'pengukuran_neuromuskular'            => $jdata['notes']['pengukuran_neuromuskular'],
            'pengukuran_kardiopulmonal'           => $jdata['notes']['pengukuran_kardiopulmonal'],
            'pengukuran_integumentum'             => $jdata['notes']['pengukuran_integumentum'],
            'radiologi'                           => $jdata['notes']['radiologi'],
            'emg'                                 => $jdata['notes']['emg'],
            'laboratorium'                        => $jdata['notes']['laboratorium'],
            'lain_lain'                           => $jdata['notes']['lain_lain'],
            'diagnosis_fisioterapi'               => $jdata['notes']['diagnosis_fisioterapi'],
            'program_rencana_fisioterapi'         => $jdata['notes']['program_rencana_fisioterapi'],
            'tgl1'                                => $jdata['notes']['tgl1'],
            'intervensi1'                         => $jdata['notes']['intervensi1'],
            'area_diterapi1'                      => $jdata['notes']['area_diterapi1'],
           'tgl2'                                 => $jdata['notes']['tgl2'],
            'intervensi2'                         => $jdata['notes']['intervensi2'],
            'area_diterapi2'                      => $jdata['notes']['area_diterapi2'],
            'tgl3'                                => $jdata['notes']['tgl3'],
            'intervensi3'                         => $jdata['notes']['intervensi3'],
            'area_diterapi3'                      => $jdata['notes']['area_diterapi3'],
            'tgl4'                                => $jdata['notes']['tgl4'],
            'intervensi4'                         => $jdata['notes']['intervensi4'],
            'area_diterapi4'                      => $jdata['notes']['area_diterapi4'],
            'tgl5'                                => $jdata['notes']['tgl5'],
            'intervensi5'                         => $jdata['notes']['intervensi5'],
            'area_diterapi5'                      => $jdata['notes']['area_diterapi5'],
            'tgl6'                                => $jdata['notes']['tgl6'],
            'intervensi6'                         => $jdata['notes']['intervensi6'],
            'area_diterapi6'                      => $jdata['notes']['area_diterapi6'],
            'tgl7'                                => $jdata['notes']['tgl7'],
            'intervensi7'                         => $jdata['notes']['intervensi7'],
            'area_diterapi7'                      => $jdata['notes']['area_diterapi7'],
            'tgl8'                                => $jdata['notes']['tgl8'],
            'intervensi8'                         => $jdata['notes']['intervensi8'],
            'area_diterapi8'                      => $jdata['notes']['area_diterapi8'],
            'tgl9'                                => $jdata['notes']['tgl9'],
            'intervensi9'                         => $jdata['notes']['intervensi9'],
            'area_diterapi9'                      => $jdata['notes']['area_diterapi9'],
            'tgl10'                               => $jdata['notes']['tgl10'],
            'intervensi10'                        => $jdata['notes']['intervensi10'],
            'area_diterapi10'                     => $jdata['notes']['area_diterapi10'],
            'evaluasi'                            => $jdata['notes']['evaluasi'],
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
      'nama_pasien'                         =>  $this->input->post('nama_pasien'),
      'no_mr'                               =>  $this->input->post('no_mr'),
      'ttl'                                 =>  $this->input->post('ttl'),
      'usia'                                =>  $this->input->post('usia'),
      'jenis_kelamin'                       =>  $this->input->post('jenis_kelamin'),
      'agama'                               =>  $this->input->post('agama'),
      'pendidikan'                          =>  $this->input->post('pendidikan'),
      'pekerjaan'                           =>  $this->input->post('pekerjaan'),
      'status_pernikahan'                   =>  $this->input->post('status_pernikahan'),
      'keluhan_utama'                       =>  $this->input->post('keluhan_utama'),
      'riwayat_penyakit_sekarang'           =>  $this->input->post('riwayat_penyakit_sekarang'),
      'riwayat_penyakit_dahulu'             =>  $this->input->post('riwayat_penyakit_dahulu'),
      'td'                                  =>  $this->input->post('td'),
      'hr'                                  =>  $this->input->post('hr'),
      'rr'                                  =>  $this->input->post('rr'),
      'suhu'                                =>  $this->input->post('suhu'),
      'skala_nyeri'                         =>  $this->input->post('skala_nyeri'),
      'tidur_bedrest_gendong'               =>  $this->input->post('tidur_bedrest_gendong'),
      'jalan_sendiri'                       =>  $this->input->post('jalan_sendiri'),
      'kursi_roda'                          =>  $this->input->post('kursi_roda'),
      'alat_bantu'                          =>  $this->input->post('alat_bantu'),
      'prothesis'                           =>  $this->input->post('prothesis'),
      'deformitas'                          =>  $this->input->post('deformitas'),
      'resiko_jatuh'                        =>  $this->input->post('resiko_jatuh'),
      'lainlain'                            =>  $this->input->post('lainlain'),
      'pemeriksaan_muskuloskeletal'         =>  $this->input->post('pemeriksaan_muskuloskeletal'),
      'pemeriksaan_neuromuskular'           =>  $this->input->post('pemeriksaan_neuromuskular'),
      'pemeriksaan_kardiopulmonal'          =>  $this->input->post('pemeriksaan_kardiopulmonal'),
      'pemeriksaan_integumentum'            =>  $this->input->post('pemeriksaan_integumentum'),
      'pengukuran_muskuloskeletal'          =>  $this->input->post('pengukuran_muskuloskeletal'),
      'pengukuran_neuromuskular'            =>  $this->input->post('pengukuran_neuromuskular'),
      'pengukuran_kardiopulmonal'           =>  $this->input->post('pengukuran_kardiopulmonal'),
      'pengukuran_integumentum'             =>  $this->input->post('pengukuran_integumentum'),
      'radiologi'                           =>  $this->input->post('radiologi'),
      'emg'                                 =>  $this->input->post('emg'),
      'laboratorium'                        =>  $this->input->post('laboratorium'),
      'lain_lain'                           =>  $this->input->post('lain_lain'),
      'diagnosis_fisioterapi'               =>  $this->input->post('diagnosis_fisioterapi'),
      'program_rencana_fisioterapi'         =>  $this->input->post('program_rencana_fisioterapi'),
      'tgl1'                                =>  $this->input->post('tgl1'),
      'intervensi1'                         =>  $this->input->post('intervensi1'),
      'area_diterapi1'                      =>  $this->input->post('area_diterapi1'),
      'tgl2'                                =>  $this->input->post('tgl2'),
      'intervensi2'                         =>  $this->input->post('intervensi2'),
      'area_diterapi2'                      =>  $this->input->post('area_diterapi2'),
      'tgl3'                                =>  $this->input->post('tgl3'),
      'intervensi3'                         =>  $this->input->post('intervensi3'),
      'area_diterapi3'                      =>  $this->input->post('area_diterapi3'),
      'tgl4'                                =>  $this->input->post('tgl4'),
      'intervensi4'                         =>  $this->input->post('intervensi4'),
      'area_diterapi4'                      =>  $this->input->post('area_diterapi4'),
      'tgl5'                                =>  $this->input->post('tgl5'),
      'intervensi5'                         =>  $this->input->post('intervensi5'),
      'area_diterapi5'                      =>  $this->input->post('area_diterapi5'),
      'tgl6'                                =>  $this->input->post('tgl6'),
      'intervensi6'                         =>  $this->input->post('intervensi6'),
      'area_diterapi6'                      =>  $this->input->post('area_diterapi6'),
      'tgl7'                                =>  $this->input->post('tgl7'),
      'intervensi7'                         =>  $this->input->post('intervensi7'),
      'area_diterapi7'                      =>  $this->input->post('area_diterapi7'),
      'tgl8'                                =>  $this->input->post('tgl8'),
      'intervensi8'                         =>  $this->input->post('intervensi8'),
      'area_diterapi8'                      =>  $this->input->post('area_diterapi8'),
      'tgl9'                                =>  $this->input->post('tgl9'),
      'intervensi9'                         =>  $this->input->post('intervensi9'),
      'area_diterapi9'                      =>  $this->input->post('area_diterapi9'),
      'tgl10'                               =>  $this->input->post('tgl10'),
      'intervensi10'                        =>  $this->input->post('intervensi10'),
      'area_diterapi10'                     =>  $this->input->post('area_diterapi10'),
      'evaluasi'                            =>  $this->input->post('evaluasi'),
      'coretan'                             =>  $this->input->post('coretan'),
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
            'approved_petugas'                    => $result['approved_petugas'],
            'tanggal'                             => $result['notes']['tanggal'],
            'jam'                                 => $result['notes']['jam'],
            'nama_pasien'                         => $result['notes']['nama_pasien'],
            'no_mr'                               => $result['notes']['no_mr'],
            'ttl'                                 => $result['notes']['ttl'],
            'usia'                                => $result['notes']['usia'],
            'jenis_kelamin'                       => $result['notes']['jenis_kelamin'],
            'agama'                               => $result['notes']['agama'],
            'pendidikan'                          => $result['notes']['pendidikan'],
            'pekerjaan'                           => $result['notes']['pekerjaan'],
            'status_pernikahan'                   => $result['notes']['status_pernikahan'],
            'keluhan_utama'                       => $result['notes']['keluhan_utama'],
            'riwayat_penyakit_sekarang'           => $result['notes']['riwayat_penyakit_sekarang'],
            'riwayat_penyakit_dahulu'             => $result['notes']['riwayat_penyakit_dahulu'],
            'td'                                  => $result['notes']['td'],
            'hr'                                  => $result['notes']['hr'],
            'rr'                                  => $result['notes']['rr'],
            'suhu'                                => $result['notes']['suhu'],
            'skala_nyeri'                         => $result['notes']['skala_nyeri'],
            'tidur_bedrest_gendong'               => $result['notes']['tidur_bedrest_gendong'],
            'jalan_sendiri'                       => $result['notes']['jalan_sendiri'],
            'kursi_roda'                          => $result['notes']['kursi_roda'],
            'alat_bantu'                          => $result['notes']['alat_bantu'],
            'prothesis'                           => $result['notes']['prothesis'],
            'deformitas'                          => $result['notes']['deformitas'],
            'resiko_jatuh'                        => $result['notes']['resiko_jatuh'],
            'lainlain'                            => $result['notes']['lainlain'],
            'pemeriksaan_muskuloskeletal'         => $result['notes']['pemeriksaan_muskuloskeletal'],
            'pemeriksaan_neuromuskular'           => $result['notes']['pemeriksaan_neuromuskular'],
            'pemeriksaan_kardiopulmonal'          => $result['notes']['pemeriksaan_kardiopulmonal'],
            'pemeriksaan_integumentum'            => $result['notes']['pemeriksaan_integumentum'],
            'pengukuran_muskuloskeletal'          => $result['notes']['pengukuran_muskuloskeletal'],
            'pengukuran_neuromuskular'            => $result['notes']['pengukuran_neuromuskular'],
            'pengukuran_kardiopulmonal'           => $result['notes']['pengukuran_kardiopulmonal'],
            'pengukuran_integumentum'             => $result['notes']['pengukuran_integumentum'],
            'radiologi'                           => $result['notes']['radiologi'],
            'emg'                                 => $result['notes']['emg'],
            'laboratorium'                        => $result['notes']['laboratorium'],
            'lain_lain'                           => $result['notes']['lain_lain'],
            'diagnosis_fisioterapi'               => $result['notes']['diagnosis_fisioterapi'],
            'program_rencana_fisioterapi'         => $result['notes']['program_rencana_fisioterapi'],
            'tgl1'                                => $result['notes']['tgl1'],
            'intervensi1'                         => $result['notes']['intervensi1'],
            'area_diterapi1'                      => $result['notes']['area_diterapi1'],
           'tgl2'                                 => $result['notes']['tgl2'],
            'intervensi2'                         => $result['notes']['intervensi2'],
            'area_diterapi2'                      => $result['notes']['area_diterapi2'],
            'tgl3'                                => $result['notes']['tgl3'],
            'intervensi3'                         => $result['notes']['intervensi3'],
            'area_diterapi3'                      => $result['notes']['area_diterapi3'],
            'tgl4'                                => $result['notes']['tgl4'],
            'intervensi4'                         => $result['notes']['intervensi4'],
            'area_diterapi4'                      => $result['notes']['area_diterapi4'],
            'tgl5'                                => $result['notes']['tgl5'],
            'intervensi5'                         => $result['notes']['intervensi5'],
            'area_diterapi5'                      => $result['notes']['area_diterapi5'],
            'tgl6'                                => $result['notes']['tgl6'],
            'intervensi6'                         => $result['notes']['intervensi6'],
            'area_diterapi6'                      => $result['notes']['area_diterapi6'],
            'tgl7'                                => $result['notes']['tgl7'],
            'intervensi7'                         => $result['notes']['intervensi7'],
            'area_diterapi7'                      => $result['notes']['area_diterapi7'],
            'tgl8'                                => $result['notes']['tgl8'],
            'intervensi8'                         => $result['notes']['intervensi8'],
            'area_diterapi8'                      => $result['notes']['area_diterapi8'],
            'tgl9'                                => $result['notes']['tgl9'],
            'intervensi9'                         => $result['notes']['intervensi9'],
            'area_diterapi9'                      => $result['notes']['area_diterapi9'],
            'tgl10'                               => $result['notes']['tgl10'],
            'intervensi10'                        => $result['notes']['intervensi10'],
            'area_diterapi10'                     => $result['notes']['area_diterapi10'],
            'evaluasi'                            => $result['notes']['evaluasi'],
            'coretan'                             => $result['notes']['coretan'],
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
      'tanggal'                             =>  $this->input->post('tanggal'),
      'jam'                                 =>  $this->input->post('jam'),
      'nama_pasien'                         =>  $this->input->post('nama_pasien'),
      'no_mr'                               =>  $this->input->post('no_mr'),
      'ttl'                                 =>  $this->input->post('ttl'),
      'usia'                                =>  $this->input->post('usia'),
      'jenis_kelamin'                       =>  $this->input->post('jenis_kelamin'),
      'agama'                               =>  $this->input->post('agama'),
      'pendidikan'                          =>  $this->input->post('pendidikan'),
      'pekerjaan'                           =>  $this->input->post('pekerjaan'),
      'status_pernikahan'                   =>  $this->input->post('status_pernikahan'),
      'keluhan_utama'                       =>  $this->input->post('keluhan_utama'),
      'riwayat_penyakit_sekarang'           =>  $this->input->post('riwayat_penyakit_sekarang'),
      'riwayat_penyakit_dahulu'             =>  $this->input->post('riwayat_penyakit_dahulu'),
      'td'                                  =>  $this->input->post('td'),
      'hr'                                  =>  $this->input->post('hr'),
      'rr'                                  =>  $this->input->post('rr'),
      'suhu'                                =>  $this->input->post('suhu'),
      'skala_nyeri'                         =>  $this->input->post('skala_nyeri'),
      'tidur_bedrest_gendong'               =>  $this->input->post('tidur_bedrest_gendong'),
      'jalan_sendiri'                       =>  $this->input->post('jalan_sendiri'),
      'kursi_roda'                          =>  $this->input->post('kursi_roda'),
      'alat_bantu'                          =>  $this->input->post('alat_bantu'),
      'prothesis'                           =>  $this->input->post('prothesis'),
      'deformitas'                          =>  $this->input->post('deformitas'),
      'resiko_jatuh'                        =>  $this->input->post('resiko_jatuh'),
      'lainlain'                            =>  $this->input->post('lainlain'),
      'pemeriksaan_muskuloskeletal'         =>  $this->input->post('pemeriksaan_muskuloskeletal'),
      'pemeriksaan_neuromuskular'           =>  $this->input->post('pemeriksaan_neuromuskular'),
      'pemeriksaan_kardiopulmonal'          =>  $this->input->post('pemeriksaan_kardiopulmonal'),
      'pemeriksaan_integumentum'            =>  $this->input->post('pemeriksaan_integumentum'),
      'pengukuran_muskuloskeletal'          =>  $this->input->post('pengukuran_muskuloskeletal'),
      'pengukuran_neuromuskular'            =>  $this->input->post('pengukuran_neuromuskular'),
      'pengukuran_kardiopulmonal'           =>  $this->input->post('pengukuran_kardiopulmonal'),
      'pengukuran_integumentum'             =>  $this->input->post('pengukuran_integumentum'),
      'radiologi'                           =>  $this->input->post('radiologi'),
      'emg'                                 =>  $this->input->post('emg'),
      'laboratorium'                        =>  $this->input->post('laboratorium'),
      'lain_lain'                           =>  $this->input->post('lain_lain'),
      'diagnosis_fisioterapi'               =>  $this->input->post('diagnosis_fisioterapi'),
      'program_rencana_fisioterapi'         =>  $this->input->post('program_rencana_fisioterapi'),
      'tgl1'                                =>  $this->input->post('tgl1'),
      'intervensi1'                         =>  $this->input->post('intervensi1'),
      'area_diterapi1'                      =>  $this->input->post('area_diterapi1'),
      'tgl2'                                =>  $this->input->post('tgl2'),
      'intervensi2'                         =>  $this->input->post('intervensi2'),
      'area_diterapi2'                      =>  $this->input->post('area_diterapi2'),
      'tgl3'                                =>  $this->input->post('tgl3'),
      'intervensi3'                         =>  $this->input->post('intervensi3'),
      'area_diterapi3'                      =>  $this->input->post('area_diterapi3'),
      'tgl4'                                =>  $this->input->post('tgl4'),
      'intervensi4'                         =>  $this->input->post('intervensi4'),
      'area_diterapi4'                      =>  $this->input->post('area_diterapi4'),
      'tgl5'                                =>  $this->input->post('tgl5'),
      'intervensi5'                         =>  $this->input->post('intervensi5'),
      'area_diterapi5'                      =>  $this->input->post('area_diterapi5'),
      'tgl6'                                =>  $this->input->post('tgl6'),
      'intervensi6'                         =>  $this->input->post('intervensi6'),
      'area_diterapi6'                      =>  $this->input->post('area_diterapi6'),
      'tgl7'                                =>  $this->input->post('tgl7'),
      'intervensi7'                         =>  $this->input->post('intervensi7'),
      'area_diterapi7'                      =>  $this->input->post('area_diterapi7'),
      'tgl8'                                =>  $this->input->post('tgl8'),
      'intervensi8'                         =>  $this->input->post('intervensi8'),
      'area_diterapi8'                      =>  $this->input->post('area_diterapi8'),
      'tgl9'                                =>  $this->input->post('tgl9'),
      'intervensi9'                         =>  $this->input->post('intervensi9'),
      'area_diterapi9'                      =>  $this->input->post('area_diterapi9'),
      'tgl10'                               =>  $this->input->post('tgl10'),
      'intervensi10'                        =>  $this->input->post('intervensi10'),
      'area_diterapi10'                     =>  $this->input->post('area_diterapi10'),
      'evaluasi'                            =>  $this->input->post('evaluasi'),
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
            'approved_petugas'                    => $result['approved_petugas'],
            'digital_signature_approved_petugas'  => $result['digital_signature_approved_petugas'],
            'tanggal'                             => $result['notes']['tanggal'],
            'jam'                                 => $result['notes']['jam'],
            'nama_pasien'                         => $result['notes']['nama_pasien'],
            'no_mr'                               => $result['notes']['no_mr'],
            'ttl'                                 => $result['notes']['ttl'],
            'usia'                                => $result['notes']['usia'],
            'jenis_kelamin'                       => $result['notes']['jenis_kelamin'],
            'agama'                               => $result['notes']['agama'],
            'pendidikan'                          => $result['notes']['pendidikan'],
            'pekerjaan'                           => $result['notes']['pekerjaan'],
            'status_pernikahan'                   => $result['notes']['status_pernikahan'],
            'keluhan_utama'                       => $result['notes']['keluhan_utama'],
            'riwayat_penyakit_sekarang'           => $result['notes']['riwayat_penyakit_sekarang'],
            'riwayat_penyakit_dahulu'             => $result['notes']['riwayat_penyakit_dahulu'],
            'td'                                  => $result['notes']['td'],
            'hr'                                  => $result['notes']['hr'],
            'rr'                                  => $result['notes']['rr'],
            'suhu'                                => $result['notes']['suhu'],
            'skala_nyeri'                         => $result['notes']['skala_nyeri'],
            'tidur_bedrest_gendong'               => $result['notes']['tidur_bedrest_gendong'],
            'jalan_sendiri'                       => $result['notes']['jalan_sendiri'],
            'kursi_roda'                          => $result['notes']['kursi_roda'],
            'alat_bantu'                          => $result['notes']['alat_bantu'],
            'prothesis'                           => $result['notes']['prothesis'],
            'deformitas'                          => $result['notes']['deformitas'],
            'resiko_jatuh'                        => $result['notes']['resiko_jatuh'],
            'lainlain'                            => $result['notes']['lainlain'],
            'pemeriksaan_muskuloskeletal'         => $result['notes']['pemeriksaan_muskuloskeletal'],
            'pemeriksaan_neuromuskular'           => $result['notes']['pemeriksaan_neuromuskular'],
            'pemeriksaan_kardiopulmonal'          => $result['notes']['pemeriksaan_kardiopulmonal'],
            'pemeriksaan_integumentum'            => $result['notes']['pemeriksaan_integumentum'],
            'pengukuran_muskuloskeletal'          => $result['notes']['pengukuran_muskuloskeletal'],
            'pengukuran_neuromuskular'            => $result['notes']['pengukuran_neuromuskular'],
            'pengukuran_kardiopulmonal'           => $result['notes']['pengukuran_kardiopulmonal'],
            'pengukuran_integumentum'             => $result['notes']['pengukuran_integumentum'],
            'radiologi'                           => $result['notes']['radiologi'],
            'emg'                                 => $result['notes']['emg'],
            'laboratorium'                        => $result['notes']['laboratorium'],
            'lain_lain'                           => $result['notes']['lain_lain'],
            'diagnosis_fisioterapi'               => $result['notes']['diagnosis_fisioterapi'],
            'program_rencana_fisioterapi'         => $result['notes']['program_rencana_fisioterapi'],
            'tgl1'                                => $result['notes']['tgl1'],
            'intervensi1'                         => $result['notes']['intervensi1'],
            'area_diterapi1'                      => $result['notes']['area_diterapi1'],
            'tgl2'                                => $result['notes']['tgl2'],
            'intervensi2'                         => $result['notes']['intervensi2'],
            'area_diterapi2'                      => $result['notes']['area_diterapi2'],
            'tgl3'                                => $result['notes']['tgl3'],
            'intervensi3'                         => $result['notes']['intervensi3'],
            'area_diterapi3'                      => $result['notes']['area_diterapi3'],
            'tgl4'                                => $result['notes']['tgl4'],
            'intervensi4'                         => $result['notes']['intervensi4'],
            'area_diterapi4'                      => $result['notes']['area_diterapi4'],
            'tgl5'                                => $result['notes']['tgl5'],
            'intervensi5'                         => $result['notes']['intervensi5'],
            'area_diterapi5'                      => $result['notes']['area_diterapi5'],
            'tgl6'                                => $result['notes']['tgl6'],
            'intervensi6'                         => $result['notes']['intervensi6'],
            'area_diterapi6'                      => $result['notes']['area_diterapi6'],
            'tgl7'                                => $result['notes']['tgl7'],
            'intervensi7'                         => $result['notes']['intervensi7'],
            'area_diterapi7'                      => $result['notes']['area_diterapi7'],
            'tgl8'                                => $result['notes']['tgl8'],
            'intervensi8'                         => $result['notes']['intervensi8'],
            'area_diterapi8'                      => $result['notes']['area_diterapi8'],
            'tgl9'                                => $result['notes']['tgl9'],
            'intervensi9'                         => $result['notes']['intervensi9'],
            'area_diterapi9'                      => $result['notes']['area_diterapi9'],
            'tgl10'                               => $result['notes']['tgl10'],
            'intervensi10'                        => $result['notes']['intervensi10'],
            'area_diterapi10'                     => $result['notes']['area_diterapi10'],
            'evaluasi'                            => $result['notes']['evaluasi'],
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