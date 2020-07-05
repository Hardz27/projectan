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
class C_39_operasi_tanda_lokasi extends CI_Controller
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
    $this->id_ref_global_tipe_42 = 39;
    
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
    $this->c_folder = "C_39_operasi_tanda_lokasi"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

    //menghilangkan 'C_' pada nama class untuk dinamisasi routing;
    $this->class = str_replace("c_", "", $this->router->fetch_class());

    //Judul form
    $this->title = 'Operasi Tanda Lokasi';

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
      'title'   => $this->title,
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
            'no_rm'                               => $jdata['notes']['no_rm'],
            'nama_pasien'                         => $jdata['notes']['nama_pasien'],
            'jenis_kelamin_pasien'                => $jdata['notes']['jenis_kelamin_pasien'],
            'tanggal_lahir'                       => $jdata['notes']['tanggal_lahir'],
            'tempat_lahir'                        => $jdata['notes']['tempat_lahir'],
            'usia_pasien'                         => $jdata['notes']['usia_pasien'],
            'nama_wali'                           => $jdata['notes']['nama_wali'],
            'usia_wali'                           => $jdata['notes']['usia_wali'],
            'hubungan_wali'                       => $jdata['notes']['hubungan_wali'],
            'jenis_kelamin_wali'                  => $jdata['notes']['jenis_kelamin_wali'],
            'anamnesis'                           => $jdata['notes']['anamnesis'],
            'pemeriksaan_fisik'                   => $jdata['notes']['pemeriksaan_fisik'],
            'catatan_alergi'                      => $jdata['notes']['catatan_alergi'],
            'diagnosa_praoperasi'                 => $jdata['notes']['diagnosa_praoperasi'],
            'rencana_operasi'                     => $jdata['notes']['rencana_operasi'],
            'estimasi_waktu'                      => $jdata['notes']['estimasi_waktu'],
            'premedikasi'                         => $jdata['notes']['premedikasi'],

            'ruangan_rekam_medik_pasien'          =>  $jdata['notes']['ruangan_rekam_medik_pasien'],
            'ok_rekam_medik_pasien'               =>  $jdata['notes']['ok_rekam_medik_pasien'],
            'ruangan_informed_consent_operasi'    =>  $jdata['notes']['ruangan_informed_consent_operasi'],
            'ok_informed_consent_operasi'         =>  $jdata['notes']['ok_informed_consent_operasi'],
            'ruangan_informed_consent_anestesi'   =>  $jdata['notes']['ruangan_informed_consent_anestesi'],
            'ok_informed_consent_anestesi'        =>  $jdata['notes']['ok_informed_consent_anestesi'],
            'ruangan_hasil_laboratorium'          =>  $jdata['notes']['ruangan_hasil_laboratorium'],
            'ok_hasil_laboratorium'               =>  $jdata['notes']['ok_hasil_laboratorium'],
            'ruangan_hasil_radiologi'             =>  $jdata['notes']['ruangan_hasil_radiologi'],
            'ok_hasil_radiologi'                  =>  $jdata['notes']['ok_hasil_radiologi'],
            'ruangan_hasil_ekg'                   =>  $jdata['notes']['ruangan_hasil_ekg'],
            'ok_hasil_ekg'                        =>  $jdata['notes']['ok_hasil_ekg'],
            'ruangan_hasil_ctg'                   =>  $jdata['notes']['ruangan_hasil_ctg'],
            'ok_hasil_ctg'                        =>  $jdata['notes']['ok_hasil_ctg'],
            'ruangan_daftar_terapi'               =>  $jdata['notes']['ruangan_daftar_terapi'],
            'ok_daftar_terapi'                    =>  $jdata['notes']['ok_daftar_terapi'],
            'ruangan_catatan_keperawatan'         =>  $jdata['notes']['ruangan_catatan_keperawatan'],
            'ok_catatan_keperawatan'              =>  $jdata['notes']['ok_catatan_keperawatan'],
            'ruangan_periksa_keadaan_umum'        =>  $jdata['notes']['ruangan_periksa_keadaan_umum'],
            'ok_periksa_keadaan_umum'             =>  $jdata['notes']['ok_periksa_keadaan_umum'],
            'ruangan_periksa_vital_sign'          =>  $jdata['notes']['ruangan_periksa_vital_sign'],
            'ok_periksa_vital_sign'               =>  $jdata['notes']['ok_periksa_vital_sign'],
            'ruangan_gelang_identitas'            =>  $jdata['notes']['ruangan_gelang_identitas'],
            'ok_gelang_identitas'                 =>  $jdata['notes']['ok_gelang_identitas'],
            'ruangan_identifikasi_alergi'         =>  $jdata['notes']['ruangan_identifikasi_alergi'],
            'ok_identifikasi_alergi'              =>  $jdata['notes']['ok_identifikasi_alergi'],
            'desc_puasa'                          =>  $jdata['notes']['desc_puasa'],
            'ruangan_puasa'                       =>  $jdata['notes']['ruangan_puasa'],
            'ok_puasa'                            =>  $jdata['notes']['ok_puasa'],
            'ruangan_mandi'                       =>  $jdata['notes']['ruangan_mandi'],
            'ok_mandi'                            =>  $jdata['notes']['ok_mandi'],
            'ruangan_oral'                        =>  $jdata['notes']['ruangan_oral'],
            'ok_oral'                             =>  $jdata['notes']['ok_oral'],
            'ruangan_cukur_daerah_operasi'        =>  $jdata['notes']['ruangan_cukur_daerah_operasi'],
            'ok_cukur_daerah_operasi'             =>  $jdata['notes']['ok_cukur_daerah_operasi'],
            'ruangan_make_up'                     =>  $jdata['notes']['ruangan_make_up'],
            'ok_make_up'                          =>  $jdata['notes']['ok_make_up'],
            'ruangan_lepas_aksesoris'             =>  $jdata['notes']['ruangan_lepas_aksesoris'],
            'ok_lepas_aksesoris'                  =>  $jdata['notes']['ok_lepas_aksesoris'],
            'ruangan_lepas_alat_bantu'            =>  $jdata['notes']['ruangan_lepas_alat_bantu'],
            'ok_lepas_alat_bantu'                 =>  $jdata['notes']['ok_lepas_alat_bantu'],
            'ruangan_pemasangan_iv_line'          =>  $jdata['notes']['ruangan_pemasangan_iv_line'],
            'ok_pemasangan_iv_line'               =>  $jdata['notes']['ok_pemasangan_iv_line'],
            'ruangan_pemberian_premedikasi'       =>  $jdata['notes']['ruangan_pemberian_premedikasi'],
            'ok_pemberian_premedikasi'            =>  $jdata['notes']['ok_pemberian_premedikasi'],
            'ruangan_pemasangan_kateter_urin'     =>  $jdata['notes']['ruangan_pemasangan_kateter_urin'],
            'ok_pemasangan_kateter_urin'          =>  $jdata['notes']['ok_pemasangan_kateter_urin'],
            'ruangan_pemasangan_ngt'              =>  $jdata['notes']['ruangan_pemasangan_ngt'],
            'ok_pemasangan_ngt'                   =>  $jdata['notes']['ok_pemasangan_ngt'],
            'ruangan_latihan_nafas_dalam'         =>  $jdata['notes']['ruangan_latihan_nafas_dalam'],
            'ok_latihan_nafas_dalam'              =>  $jdata['notes']['ok_latihan_nafas_dalam'],
            'ruangan_latihan_batuk_efektif'       =>  $jdata['notes']['ruangan_latihan_batuk_efektif'],
            'ok_latihan_batuk_efektif'            =>  $jdata['notes']['ok_latihan_batuk_efektif'],
            'ruangan_kebutuhan_darah'             =>  $jdata['notes']['ruangan_kebutuhan_darah'],
            'ok_kebutuhan_darah'                  =>  $jdata['notes']['ok_kebutuhan_darah'],
            
            'nama_prosedur'                       =>  $jdata['notes']['nama_prosedur'],
            'body_man_front'                      =>  $jdata['notes']['body_man_front'],
            'body_man_back'                       =>  $jdata['notes']['body_man_back'],
            'body_woman_front'                    =>  $jdata['notes']['body_woman_front'],
            'body_woman_back'                     =>  $jdata['notes']['body_woman_back'],
            'palmar_hand_kiri'                    =>  $jdata['notes']['palmar_hand_kiri'],
            'palmar_hand_kanan'                   =>  $jdata['notes']['palmar_hand_kanan'],
            'head_kiri'                           =>  $jdata['notes']['head_kiri'],
            'head_kanan'                          =>  $jdata['notes']['head_kanan'],
            'head_front'                          =>  $jdata['notes']['head_front'],
            'head_back'                           =>  $jdata['notes']['head_back'],
            'dorsal_kiri'                         =>  $jdata['notes']['dorsal_kiri'],
            'dorsal_kanan'                        =>  $jdata['notes']['dorsal_kanan'],
            'plantar_kanan'                       =>  $jdata['notes']['plantar_kanan'],
            'plantar_kiri'                        =>  $jdata['notes']['plantar_kiri'],
            'palmar_feet_kiri'                    =>  $jdata['notes']['palmar_feet_kiri'],
            'palmar_feet_kanan'                   =>  $jdata['notes']['palmar_feet_kanan'],
            
            'coretan_wali'                        =>  $jdata['notes']['coretan_wali'],
            'coretan_pasien'                      =>  $jdata['notes']['coretan_pasien'],
            'coretan_saksi'                       =>  $jdata['notes']['coretan_saksi'],
            'coretan_perawat_ruang_rawat_inap'    =>  $jdata['notes']['coretan_perawat_ruang_rawat_inap'],
            'nama_saksi'                          =>  $jdata['notes']['nama_saksi'],
            'nama_perawat_ruang_rawat_inap'       =>  $jdata['notes']['nama_perawat_ruang_rawat_inap'],

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
      'no_rm'                               =>  $this->input->post('no_rm'),
      'nama_pasien'                         =>  $this->input->post('nama_pasien'),
      'jenis_kelamin_pasien'                =>  $this->input->post('jenis_kelamin_pasien'),
      'tanggal_lahir'                       =>  $this->input->post('tanggal_lahir'),
      'tempat_lahir'                        =>  $this->input->post('tempat_lahir'),
      'usia_pasien'                         =>  $this->input->post('usia_pasien'),
      'nama_wali'                           =>  $this->input->post('nama_wali'),
      'usia_wali'                           =>  $this->input->post('usia_wali'),
      'hubungan_wali'                       =>  $this->input->post('hubungan_wali'),
      'jenis_kelamin_wali'                  =>  $this->input->post('jenis_kelamin_wali'),
      'anamnesis'                           =>  $this->input->post('anamnesis'),
      'pemeriksaan_fisik'                   =>  $this->input->post('pemeriksaan_fisik'),
      'catatan_alergi'                      =>  $this->input->post('catatan_alergi'),
      'diagnosa_praoperasi'                 =>  $this->input->post('diagnosa_praoperasi'),
      'rencana_operasi'                     =>  $this->input->post('rencana_operasi'),
      'estimasi_waktu'                      =>  $this->input->post('estimasi_waktu'),
      'premedikasi'                         =>  $this->input->post('premedikasi'),

      'ruangan_rekam_medik_pasien'          =>  $this->input->post('ruangan_rekam_medik_pasien'),
      'ok_rekam_medik_pasien'               =>  $this->input->post('ok_rekam_medik_pasien'),
      'ruangan_informed_consent_operasi'    =>  $this->input->post('ruangan_informed_consent_operasi'),
      'ok_informed_consent_operasi'         =>  $this->input->post('ok_informed_consent_operasi'),
      'ruangan_informed_consent_anestesi'   =>  $this->input->post('ruangan_informed_consent_anestesi'),
      'ok_informed_consent_anestesi'        =>  $this->input->post('ok_informed_consent_anestesi'),
      'ruangan_hasil_laboratorium'          =>  $this->input->post('ruangan_hasil_laboratorium'),
      'ok_hasil_laboratorium'               =>  $this->input->post('ok_hasil_laboratorium'),
      'ruangan_hasil_radiologi'             =>  $this->input->post('ruangan_hasil_radiologi'),
      'ok_hasil_radiologi'                  =>  $this->input->post('ok_hasil_radiologi'),
      'ruangan_hasil_ekg'                   =>  $this->input->post('ruangan_hasil_ekg'),
      'ok_hasil_ekg'                        =>  $this->input->post('ok_hasil_ekg'),
      'ruangan_hasil_ctg'                   =>  $this->input->post('ruangan_hasil_ctg'),
      'ok_hasil_ctg'                        =>  $this->input->post('ok_hasil_ctg'),
      'ruangan_daftar_terapi'               =>  $this->input->post('ruangan_daftar_terapi'),
      'ok_daftar_terapi'                    =>  $this->input->post('ok_daftar_terapi'),
      'ruangan_catatan_keperawatan'         =>  $this->input->post('ruangan_catatan_keperawatan'),
      'ok_catatan_keperawatan'              =>  $this->input->post('ok_catatan_keperawatan'),
      'ruangan_periksa_keadaan_umum'        =>  $this->input->post('ruangan_periksa_keadaan_umum'),
      'ok_periksa_keadaan_umum'             =>  $this->input->post('ok_periksa_keadaan_umum'),
      'ruangan_periksa_vital_sign'          =>  $this->input->post('ruangan_periksa_vital_sign'),
      'ok_periksa_vital_sign'               =>  $this->input->post('ok_periksa_vital_sign'),
      'ruangan_gelang_identitas'            =>  $this->input->post('ruangan_gelang_identitas'),
      'ok_gelang_identitas'                 =>  $this->input->post('ok_gelang_identitas'),
      'ruangan_identifikasi_alergi'         =>  $this->input->post('ruangan_identifikasi_alergi'),
      'ok_identifikasi_alergi'              =>  $this->input->post('ok_identifikasi_alergi'),
      'desc_puasa'                          =>  $this->input->post('desc_puasa'),
      'ruangan_puasa'                       =>  $this->input->post('ruangan_puasa'),
      'ok_puasa'                            =>  $this->input->post('ok_puasa'),
      'ruangan_mandi'                       =>  $this->input->post('ruangan_mandi'),
      'ok_mandi'                            =>  $this->input->post('ok_mandi'),
      'ruangan_oral'                        =>  $this->input->post('ruangan_oral'),
      'ok_oral'                             =>  $this->input->post('ok_oral'),
      'ruangan_cukur_daerah_operasi'        =>  $this->input->post('ruangan_cukur_daerah_operasi'),
      'ok_cukur_daerah_operasi'             =>  $this->input->post('ok_cukur_daerah_operasi'),
      'ruangan_make_up'                     =>  $this->input->post('ruangan_make_up'),
      'ok_make_up'                          =>  $this->input->post('ok_make_up'),
      'ruangan_lepas_aksesoris'             =>  $this->input->post('ruangan_lepas_aksesoris'),
      'ok_lepas_aksesoris'                  =>  $this->input->post('ok_lepas_aksesoris'),
      'ruangan_lepas_alat_bantu'            =>  $this->input->post('ruangan_lepas_alat_bantu'),
      'ok_lepas_alat_bantu'                 =>  $this->input->post('ok_lepas_alat_bantu'),
      'ruangan_pemasangan_iv_line'          =>  $this->input->post('ruangan_pemasangan_iv_line'),
      'ok_pemasangan_iv_line'               =>  $this->input->post('ok_pemasangan_iv_line'),
      'ruangan_pemberian_premedikasi'       =>  $this->input->post('ruangan_pemberian_premedikasi'),
      'ok_pemberian_premedikasi'            =>  $this->input->post('ok_pemberian_premedikasi'),
      'ruangan_pemasangan_kateter_urin'     =>  $this->input->post('ruangan_pemasangan_kateter_urin'),
      'ok_pemasangan_kateter_urin'          =>  $this->input->post('ok_pemasangan_kateter_urin'),
      'ruangan_pemasangan_ngt'              =>  $this->input->post('ruangan_pemasangan_ngt'),
      'ok_pemasangan_ngt'                   =>  $this->input->post('ok_pemasangan_ngt'),
      'ruangan_latihan_nafas_dalam'         =>  $this->input->post('ruangan_latihan_nafas_dalam'),
      'ok_latihan_nafas_dalam'              =>  $this->input->post('ok_latihan_nafas_dalam'),
      'ruangan_latihan_batuk_efektif'       =>  $this->input->post('ruangan_latihan_batuk_efektif'),
      'ok_latihan_batuk_efektif'            =>  $this->input->post('ok_latihan_batuk_efektif'),
      'ruangan_kebutuhan_darah'             =>  $this->input->post('ruangan_kebutuhan_darah'),
      'ok_kebutuhan_darah'                  =>  $this->input->post('ok_kebutuhan_darah'),

      'nama_prosedur'                       =>  $this->input->post('nama_prosedur'),
      'body_man_front'                      =>  $this->input->post('body_man_front'),
      'body_man_back'                       =>  $this->input->post('body_man_back'),
      'body_woman_front'                    =>  $this->input->post('body_woman_front'),
      'body_woman_back'                     =>  $this->input->post('body_woman_back'),

      'palmar_hand_kiri'                    =>  $this->input->post('palmar_hand_kiri'),
      'palmar_hand_kanan'                   =>  $this->input->post('palmar_hand_kanan'),
      'head_kiri'                           =>  $this->input->post('head_kiri'),
      'head_kanan'                          =>  $this->input->post('head_kanan'),
      'head_front'                          =>  $this->input->post('head_front'),
      'head_back'                           =>  $this->input->post('head_back'),

      'dorsal_kiri'                         =>  $this->input->post('dorsal_kiri'),
      'dorsal_kanan'                        =>  $this->input->post('dorsal_kanan'),
      'plantar_kanan'                       =>  $this->input->post('plantar_kanan'),
      'plantar_kiri'                        =>  $this->input->post('plantar_kiri'),
      'palmar_feet_kiri'                    =>  $this->input->post('palmar_feet_kiri'),
      'palmar_feet_kanan'                   =>  $this->input->post('palmar_feet_kanan'),

      'coretan_wali'                        =>  $this->input->post('coretan_wali'),
      'coretan_pasien'                      =>  $this->input->post('coretan_pasien'),
      'coretan_saksi'                       =>  $this->input->post('coretan_saksi'),
      'coretan_perawat_ruang_rawat_inap'    =>  $this->input->post('coretan_perawat_ruang_rawat_inap'),
      'nama_saksi'                          =>  $this->input->post('nama_saksi'),
      'nama_perawat_ruang_rawat_inap'       =>  $this->input->post('nama_perawat_ruang_rawat_inap'),      

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
      'approved_petugas'                    =>  $result['approved_petugas'],
      'approved_dokter'                     => $result['approved_dokter'],
      'tanggal'                             => $result['notes']['tanggal'],
      'jam'                                 => $result['notes']['jam'],
      'no_rm'                               => $result['notes']['no_rm'],
      'nama_pasien'                         => $result['notes']['nama_pasien'],
      'jenis_kelamin_pasien'                => $result['notes']['jenis_kelamin_pasien'],
      'tanggal_lahir'                       => $result['notes']['tanggal_lahir'],
      'tempat_lahir'                        => $result['notes']['tempat_lahir'],
      'usia_pasien'                         => $result['notes']['usia_pasien'],
      'nama_wali'                           => $result['notes']['nama_wali'],
      'usia_wali'                           => $result['notes']['usia_wali'],
      'hubungan_wali'                       => $result['notes']['hubungan_wali'],
      'jenis_kelamin_wali'                  => $result['notes']['jenis_kelamin_wali'],
      'anamnesis'                           => $result['notes']['anamnesis'],
      'pemeriksaan_fisik'                   => $result['notes']['pemeriksaan_fisik'],
      'catatan_alergi'                      => $result['notes']['catatan_alergi'],
      'diagnosa_praoperasi'                 => $result['notes']['diagnosa_praoperasi'],
      'rencana_operasi'                     => $result['notes']['rencana_operasi'],
      'estimasi_waktu'                      => $result['notes']['estimasi_waktu'],
      'premedikasi'                         => $result['notes']['premedikasi'],

      'ruangan_rekam_medik_pasien'          =>  $result['notes']['ruangan_rekam_medik_pasien'],
      'ok_rekam_medik_pasien'               =>  $result['notes']['ok_rekam_medik_pasien'],
      'ruangan_informed_consent_operasi'    =>  $result['notes']['ruangan_informed_consent_operasi'],
      'ok_informed_consent_operasi'         =>  $result['notes']['ok_informed_consent_operasi'],
      'ruangan_informed_consent_anestesi'   =>  $result['notes']['ruangan_informed_consent_anestesi'],
      'ok_informed_consent_anestesi'        =>  $result['notes']['ok_informed_consent_anestesi'],
      'ruangan_hasil_laboratorium'          =>  $result['notes']['ruangan_hasil_laboratorium'],
      'ok_hasil_laboratorium'               =>  $result['notes']['ok_hasil_laboratorium'],
      'ruangan_hasil_radiologi'             =>  $result['notes']['ruangan_hasil_radiologi'],
      'ok_hasil_radiologi'                  =>  $result['notes']['ok_hasil_radiologi'],
      'ruangan_hasil_ekg'                   =>  $result['notes']['ruangan_hasil_ekg'],
      'ok_hasil_ekg'                        =>  $result['notes']['ok_hasil_ekg'],
      'ruangan_hasil_ctg'                   =>  $result['notes']['ruangan_hasil_ctg'],
      'ok_hasil_ctg'                        =>  $result['notes']['ok_hasil_ctg'],
      'ruangan_daftar_terapi'               =>  $result['notes']['ruangan_daftar_terapi'],
      'ok_daftar_terapi'                    =>  $result['notes']['ok_daftar_terapi'],
      'ruangan_catatan_keperawatan'         =>  $result['notes']['ruangan_catatan_keperawatan'],
      'ok_catatan_keperawatan'              =>  $result['notes']['ok_catatan_keperawatan'],
      'ruangan_periksa_keadaan_umum'        =>  $result['notes']['ruangan_periksa_keadaan_umum'],
      'ok_periksa_keadaan_umum'             =>  $result['notes']['ok_periksa_keadaan_umum'],
      'ruangan_periksa_vital_sign'          =>  $result['notes']['ruangan_periksa_vital_sign'],
      'ok_periksa_vital_sign'               =>  $result['notes']['ok_periksa_vital_sign'],
      'ruangan_gelang_identitas'            =>  $result['notes']['ruangan_gelang_identitas'],
      'ok_gelang_identitas'                 =>  $result['notes']['ok_gelang_identitas'],
      'ruangan_identifikasi_alergi'         =>  $result['notes']['ruangan_identifikasi_alergi'],
      'ok_identifikasi_alergi'              =>  $result['notes']['ok_identifikasi_alergi'],
      'desc_puasa'                          =>  $result['notes']['desc_puasa'],
      'ruangan_puasa'                       =>  $result['notes']['ruangan_puasa'],
      'ok_puasa'                            =>  $result['notes']['ok_puasa'],
      'ruangan_mandi'                       =>  $result['notes']['ruangan_mandi'],
      'ok_mandi'                            =>  $result['notes']['ok_mandi'],
      'ruangan_oral'                        =>  $result['notes']['ruangan_oral'],
      'ok_oral'                             =>  $result['notes']['ok_oral'],
      'ruangan_cukur_daerah_operasi'        =>  $result['notes']['ruangan_cukur_daerah_operasi'],
      'ok_cukur_daerah_operasi'             =>  $result['notes']['ok_cukur_daerah_operasi'],
      'ruangan_make_up'                     =>  $result['notes']['ruangan_make_up'],
      'ok_make_up'                          =>  $result['notes']['ok_make_up'],
      'ruangan_lepas_aksesoris'             =>  $result['notes']['ruangan_lepas_aksesoris'],
      'ok_lepas_aksesoris'                  =>  $result['notes']['ok_lepas_aksesoris'],
      'ruangan_lepas_alat_bantu'            =>  $result['notes']['ruangan_lepas_alat_bantu'],
      'ok_lepas_alat_bantu'                 =>  $result['notes']['ok_lepas_alat_bantu'],
      'ruangan_pemasangan_iv_line'          =>  $result['notes']['ruangan_pemasangan_iv_line'],
      'ok_pemasangan_iv_line'               =>  $result['notes']['ok_pemasangan_iv_line'],
      'ruangan_pemberian_premedikasi'       =>  $result['notes']['ruangan_pemberian_premedikasi'],
      'ok_pemberian_premedikasi'            =>  $result['notes']['ok_pemberian_premedikasi'],
      'ruangan_pemasangan_kateter_urin'     =>  $result['notes']['ruangan_pemasangan_kateter_urin'],
      'ok_pemasangan_kateter_urin'          =>  $result['notes']['ok_pemasangan_kateter_urin'],
      'ruangan_pemasangan_ngt'              =>  $result['notes']['ruangan_pemasangan_ngt'],
      'ok_pemasangan_ngt'                   =>  $result['notes']['ok_pemasangan_ngt'],
      'ruangan_latihan_nafas_dalam'         =>  $result['notes']['ruangan_latihan_nafas_dalam'],
      'ok_latihan_nafas_dalam'              =>  $result['notes']['ok_latihan_nafas_dalam'],
      'ruangan_latihan_batuk_efektif'       =>  $result['notes']['ruangan_latihan_batuk_efektif'],
      'ok_latihan_batuk_efektif'            =>  $result['notes']['ok_latihan_batuk_efektif'],
      'ruangan_kebutuhan_darah'             =>  $result['notes']['ruangan_kebutuhan_darah'],
      'ok_kebutuhan_darah'                  =>  $result['notes']['ok_kebutuhan_darah'],

      'nama_prosedur'                       =>  $result['notes']['nama_prosedur'],
      'body_man_front'                      =>  $result['notes']['body_man_front'],
      'body_man_back'                       =>  $result['notes']['body_man_back'],
      'body_woman_front'                    =>  $result['notes']['body_woman_front'],
      'body_woman_back'                     =>  $result['notes']['body_woman_back'],
      'palmar_hand_kiri'                    =>  $result['notes']['palmar_hand_kiri'],
      'palmar_hand_kanan'                   =>  $result['notes']['palmar_hand_kanan'],
      'head_kiri'                           =>  $result['notes']['head_kiri'],
      'head_kanan'                          =>  $result['notes']['head_kanan'],
      'head_front'                          =>  $result['notes']['head_front'],
      'head_back'                           =>  $result['notes']['head_back'],
      'dorsal_kiri'                         =>  $result['notes']['dorsal_kiri'],
      'dorsal_kanan'                        =>  $result['notes']['dorsal_kanan'],
      'plantar_kanan'                       =>  $result['notes']['plantar_kanan'],
      'plantar_kiri'                        =>  $result['notes']['plantar_kiri'],
      'palmar_feet_kiri'                    =>  $result['notes']['palmar_feet_kiri'],
      'palmar_feet_kanan'                   =>  $result['notes']['palmar_feet_kanan'],

      'coretan_wali'                        =>  $result['notes']['coretan_wali'],
      'coretan_pasien'                      =>  $result['notes']['coretan_pasien'],
      'coretan_saksi'                       =>  $result['notes']['coretan_saksi'],
      'coretan_perawat_ruang_rawat_inap'    =>  $result['notes']['coretan_perawat_ruang_rawat_inap'],
      'nama_saksi'                          =>  $result['notes']['nama_saksi'],
      'nama_perawat_ruang_rawat_inap'       =>  $result['notes']['nama_perawat_ruang_rawat_inap'],
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
      'no_rm'                               =>  $this->input->post('no_rm'),
      'nama_pasien'                         =>  $this->input->post('nama_pasien'),
      'jenis_kelamin_pasien'                =>  $this->input->post('jenis_kelamin_pasien'),
      'tanggal_lahir'                       =>  $this->input->post('tanggal_lahir'),
      'tempat_lahir'                        =>  $this->input->post('tempat_lahir'),
      'usia_pasien'                         =>  $this->input->post('usia_pasien'),
      'nama_wali'                           =>  $this->input->post('nama_wali'),
      'usia_wali'                           =>  $this->input->post('usia_wali'),
      'hubungan_wali'                       =>  $this->input->post('hubungan_wali'),
      'jenis_kelamin_wali'                  =>  $this->input->post('jenis_kelamin_wali'),
      'anamnesis'                           =>  $this->input->post('anamnesis'),
      'pemeriksaan_fisik'                   =>  $this->input->post('pemeriksaan_fisik'),
      'catatan_alergi'                      =>  $this->input->post('catatan_alergi'),
      'diagnosa_praoperasi'                 =>  $this->input->post('diagnosa_praoperasi'),
      'rencana_operasi'                     =>  $this->input->post('rencana_operasi'),
      'estimasi_waktu'                      =>  $this->input->post('estimasi_waktu'),
      'premedikasi'                         =>  $this->input->post('premedikasi'),

      'ruangan_rekam_medik_pasien'          =>  $this->input->post('ruangan_rekam_medik_pasien'),
      'ok_rekam_medik_pasien'               =>  $this->input->post('ok_rekam_medik_pasien'),
      'ruangan_informed_consent_operasi'    =>  $this->input->post('ruangan_informed_consent_operasi'),
      'ok_informed_consent_operasi'         =>  $this->input->post('ok_informed_consent_operasi'),
      'ruangan_informed_consent_anestesi'   =>  $this->input->post('ruangan_informed_consent_anestesi'),
      'ok_informed_consent_anestesi'        =>  $this->input->post('ok_informed_consent_anestesi'),
      'ruangan_hasil_laboratorium'          =>  $this->input->post('ruangan_hasil_laboratorium'),
      'ok_hasil_laboratorium'               =>  $this->input->post('ok_hasil_laboratorium'),
      'ruangan_hasil_radiologi'             =>  $this->input->post('ruangan_hasil_radiologi'),
      'ok_hasil_radiologi'                  =>  $this->input->post('ok_hasil_radiologi'),
      'ruangan_hasil_ekg'                   =>  $this->input->post('ruangan_hasil_ekg'),
      'ok_hasil_ekg'                        =>  $this->input->post('ok_hasil_ekg'),
      'ruangan_hasil_ctg'                   =>  $this->input->post('ruangan_hasil_ctg'),
      'ok_hasil_ctg'                        =>  $this->input->post('ok_hasil_ctg'),
      'ruangan_daftar_terapi'               =>  $this->input->post('ruangan_daftar_terapi'),
      'ok_daftar_terapi'                    =>  $this->input->post('ok_daftar_terapi'),
      'ruangan_catatan_keperawatan'         =>  $this->input->post('ruangan_catatan_keperawatan'),
      'ok_catatan_keperawatan'              =>  $this->input->post('ok_catatan_keperawatan'),
      'ruangan_periksa_keadaan_umum'        =>  $this->input->post('ruangan_periksa_keadaan_umum'),
      'ok_periksa_keadaan_umum'             =>  $this->input->post('ok_periksa_keadaan_umum'),
      'ruangan_periksa_vital_sign'          =>  $this->input->post('ruangan_periksa_vital_sign'),
      'ok_periksa_vital_sign'               =>  $this->input->post('ok_periksa_vital_sign'),
      'ruangan_gelang_identitas'            =>  $this->input->post('ruangan_gelang_identitas'),
      'ok_gelang_identitas'                 =>  $this->input->post('ok_gelang_identitas'),
      'ruangan_identifikasi_alergi'         =>  $this->input->post('ruangan_identifikasi_alergi'),
      'ok_identifikasi_alergi'              =>  $this->input->post('ok_identifikasi_alergi'),
      'desc_puasa'                          =>  $this->input->post('desc_puasa'),
      'ruangan_puasa'                       =>  $this->input->post('ruangan_puasa'),
      'ok_puasa'                            =>  $this->input->post('ok_puasa'),
      'ruangan_mandi'                       =>  $this->input->post('ruangan_mandi'),
      'ok_mandi'                            =>  $this->input->post('ok_mandi'),
      'ruangan_oral'                        =>  $this->input->post('ruangan_oral'),
      'ok_oral'                             =>  $this->input->post('ok_oral'),
      'ruangan_cukur_daerah_operasi'        =>  $this->input->post('ruangan_cukur_daerah_operasi'),
      'ok_cukur_daerah_operasi'             =>  $this->input->post('ok_cukur_daerah_operasi'),
      'ruangan_make_up'                     =>  $this->input->post('ruangan_make_up'),
      'ok_make_up'                          =>  $this->input->post('ok_make_up'),
      'ruangan_lepas_aksesoris'             =>  $this->input->post('ruangan_lepas_aksesoris'),
      'ok_lepas_aksesoris'                  =>  $this->input->post('ok_lepas_aksesoris'),
      'ruangan_lepas_alat_bantu'            =>  $this->input->post('ruangan_lepas_alat_bantu'),
      'ok_lepas_alat_bantu'                 =>  $this->input->post('ok_lepas_alat_bantu'),
      'ruangan_pemasangan_iv_line'          =>  $this->input->post('ruangan_pemasangan_iv_line'),
      'ok_pemasangan_iv_line'               =>  $this->input->post('ok_pemasangan_iv_line'),
      'ruangan_pemberian_premedikasi'       =>  $this->input->post('ruangan_pemberian_premedikasi'),
      'ok_pemberian_premedikasi'            =>  $this->input->post('ok_pemberian_premedikasi'),
      'ruangan_pemasangan_kateter_urin'     =>  $this->input->post('ruangan_pemasangan_kateter_urin'),
      'ok_pemasangan_kateter_urin'          =>  $this->input->post('ok_pemasangan_kateter_urin'),
      'ruangan_pemasangan_ngt'              =>  $this->input->post('ruangan_pemasangan_ngt'),
      'ok_pemasangan_ngt'                   =>  $this->input->post('ok_pemasangan_ngt'),
      'ruangan_latihan_nafas_dalam'         =>  $this->input->post('ruangan_latihan_nafas_dalam'),
      'ok_latihan_nafas_dalam'              =>  $this->input->post('ok_latihan_nafas_dalam'),
      'ruangan_latihan_batuk_efektif'       =>  $this->input->post('ruangan_latihan_batuk_efektif'),
      'ok_latihan_batuk_efektif'            =>  $this->input->post('ok_latihan_batuk_efektif'),
      'ruangan_kebutuhan_darah'             =>  $this->input->post('ruangan_kebutuhan_darah'),
      'ok_kebutuhan_darah'                  =>  $this->input->post('ok_kebutuhan_darah'),

      'nama_prosedur'                       =>  $this->input->post('nama_prosedur'),
      'body_man_front'                      =>  $this->input->post('body_man_front'),
      'body_man_back'                       =>  $this->input->post('body_man_back'),
      'body_woman_front'                    =>  $this->input->post('body_woman_front'),
      'body_woman_back'                     =>  $this->input->post('body_woman_back'),

      'palmar_hand_kiri'                    =>  $this->input->post('palmar_hand_kiri'),
      'palmar_hand_kanan'                   =>  $this->input->post('palmar_hand_kanan'),
      'head_kiri'                           =>  $this->input->post('head_kiri'),
      'head_kanan'                          =>  $this->input->post('head_kanan'),
      'head_front'                          =>  $this->input->post('head_front'),
      'head_back'                           =>  $this->input->post('head_back'),

      'dorsal_kiri'                         =>  $this->input->post('dorsal_kiri'),
      'dorsal_kanan'                        =>  $this->input->post('dorsal_kanan'),
      'plantar_kanan'                       =>  $this->input->post('plantar_kanan'),
      'plantar_kiri'                        =>  $this->input->post('plantar_kiri'),
      'palmar_feet_kiri'                    =>  $this->input->post('palmar_feet_kiri'),
      'palmar_feet_kanan'                   =>  $this->input->post('palmar_feet_kanan'),

      'coretan_wali'                        =>  $this->input->post('coretan_wali'),
      'coretan_pasien'                      =>  $this->input->post('coretan_pasien'),
      'coretan_saksi'                       =>  $this->input->post('coretan_saksi'),
      'coretan_perawat_ruang_rawat_inap'    =>  $this->input->post('coretan_perawat_ruang_rawat_inap'),
      'nama_saksi'                          =>  $this->input->post('nama_saksi'),
      'nama_perawat_ruang_rawat_inap'       =>  $this->input->post('nama_perawat_ruang_rawat_inap'),      
    ];

    // echo json_encode($notes);
    // exit();

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
      'no_rm'                               => $result['notes']['no_rm'],
      'nama_pasien'                         => $result['notes']['nama_pasien'],
      'jenis_kelamin_pasien'                => $result['notes']['jenis_kelamin_pasien'],
      'tanggal_lahir'                       => $result['notes']['tanggal_lahir'],
      'tempat_lahir'                        => $result['notes']['tempat_lahir'],
      'usia_pasien'                         => $result['notes']['usia_pasien'],
      'nama_wali'                           => $result['notes']['nama_wali'],
      'usia_wali'                           => $result['notes']['usia_wali'],
      'hubungan_wali'                       => $result['notes']['hubungan_wali'],
      'jenis_kelamin_wali'                  => $result['notes']['jenis_kelamin_wali'],
      'anamnesis'                           => $result['notes']['anamnesis'],
      'pemeriksaan_fisik'                   => $result['notes']['pemeriksaan_fisik'],
      'catatan_alergi'                      => $result['notes']['catatan_alergi'],
      'diagnosa_praoperasi'                 => $result['notes']['diagnosa_praoperasi'],
      'rencana_operasi'                     => $result['notes']['rencana_operasi'],
      'estimasi_waktu'                      => $result['notes']['estimasi_waktu'],
      'premedikasi'                         => $result['notes']['premedikasi'],

      'ruangan_rekam_medik_pasien'          =>  $result['notes']['ruangan_rekam_medik_pasien'],
      'ok_rekam_medik_pasien'               =>  $result['notes']['ok_rekam_medik_pasien'],
      'ruangan_informed_consent_operasi'    =>  $result['notes']['ruangan_informed_consent_operasi'],
      'ok_informed_consent_operasi'         =>  $result['notes']['ok_informed_consent_operasi'],
      'ruangan_informed_consent_anestesi'   =>  $result['notes']['ruangan_informed_consent_anestesi'],
      'ok_informed_consent_anestesi'        =>  $result['notes']['ok_informed_consent_anestesi'],
      'ruangan_hasil_laboratorium'          =>  $result['notes']['ruangan_hasil_laboratorium'],
      'ok_hasil_laboratorium'               =>  $result['notes']['ok_hasil_laboratorium'],
      'ruangan_hasil_radiologi'             =>  $result['notes']['ruangan_hasil_radiologi'],
      'ok_hasil_radiologi'                  =>  $result['notes']['ok_hasil_radiologi'],
      'ruangan_hasil_ekg'                   =>  $result['notes']['ruangan_hasil_ekg'],
      'ok_hasil_ekg'                        =>  $result['notes']['ok_hasil_ekg'],
      'ruangan_hasil_ctg'                   =>  $result['notes']['ruangan_hasil_ctg'],
      'ok_hasil_ctg'                        =>  $result['notes']['ok_hasil_ctg'],
      'ruangan_daftar_terapi'               =>  $result['notes']['ruangan_daftar_terapi'],
      'ok_daftar_terapi'                    =>  $result['notes']['ok_daftar_terapi'],
      'ruangan_catatan_keperawatan'         =>  $result['notes']['ruangan_catatan_keperawatan'],
      'ok_catatan_keperawatan'              =>  $result['notes']['ok_catatan_keperawatan'],
      'ruangan_periksa_keadaan_umum'        =>  $result['notes']['ruangan_periksa_keadaan_umum'],
      'ok_periksa_keadaan_umum'             =>  $result['notes']['ok_periksa_keadaan_umum'],
      'ruangan_periksa_vital_sign'          =>  $result['notes']['ruangan_periksa_vital_sign'],
      'ok_periksa_vital_sign'               =>  $result['notes']['ok_periksa_vital_sign'],
      'ruangan_gelang_identitas'            =>  $result['notes']['ruangan_gelang_identitas'],
      'ok_gelang_identitas'                 =>  $result['notes']['ok_gelang_identitas'],
      'ruangan_identifikasi_alergi'         =>  $result['notes']['ruangan_identifikasi_alergi'],
      'ok_identifikasi_alergi'              =>  $result['notes']['ok_identifikasi_alergi'],
      'desc_puasa'                          =>  $result['notes']['desc_puasa'],
      'ruangan_puasa'                       =>  $result['notes']['ruangan_puasa'],
      'ok_puasa'                            =>  $result['notes']['ok_puasa'],
      'ruangan_mandi'                       =>  $result['notes']['ruangan_mandi'],
      'ok_mandi'                            =>  $result['notes']['ok_mandi'],
      'ruangan_oral'                        =>  $result['notes']['ruangan_oral'],
      'ok_oral'                             =>  $result['notes']['ok_oral'],
      'ruangan_cukur_daerah_operasi'        =>  $result['notes']['ruangan_cukur_daerah_operasi'],
      'ok_cukur_daerah_operasi'             =>  $result['notes']['ok_cukur_daerah_operasi'],
      'ruangan_make_up'                     =>  $result['notes']['ruangan_make_up'],
      'ok_make_up'                          =>  $result['notes']['ok_make_up'],
      'ruangan_lepas_aksesoris'             =>  $result['notes']['ruangan_lepas_aksesoris'],
      'ok_lepas_aksesoris'                  =>  $result['notes']['ok_lepas_aksesoris'],
      'ruangan_lepas_alat_bantu'            =>  $result['notes']['ruangan_lepas_alat_bantu'],
      'ok_lepas_alat_bantu'                 =>  $result['notes']['ok_lepas_alat_bantu'],
      'ruangan_pemasangan_iv_line'          =>  $result['notes']['ruangan_pemasangan_iv_line'],
      'ok_pemasangan_iv_line'               =>  $result['notes']['ok_pemasangan_iv_line'],
      'ruangan_pemberian_premedikasi'       =>  $result['notes']['ruangan_pemberian_premedikasi'],
      'ok_pemberian_premedikasi'            =>  $result['notes']['ok_pemberian_premedikasi'],
      'ruangan_pemasangan_kateter_urin'     =>  $result['notes']['ruangan_pemasangan_kateter_urin'],
      'ok_pemasangan_kateter_urin'          =>  $result['notes']['ok_pemasangan_kateter_urin'],
      'ruangan_pemasangan_ngt'              =>  $result['notes']['ruangan_pemasangan_ngt'],
      'ok_pemasangan_ngt'                   =>  $result['notes']['ok_pemasangan_ngt'],
      'ruangan_latihan_nafas_dalam'         =>  $result['notes']['ruangan_latihan_nafas_dalam'],
      'ok_latihan_nafas_dalam'              =>  $result['notes']['ok_latihan_nafas_dalam'],
      'ruangan_latihan_batuk_efektif'       =>  $result['notes']['ruangan_latihan_batuk_efektif'],
      'ok_latihan_batuk_efektif'            =>  $result['notes']['ok_latihan_batuk_efektif'],
      'ruangan_kebutuhan_darah'             =>  $result['notes']['ruangan_kebutuhan_darah'],
      'ok_kebutuhan_darah'                  =>  $result['notes']['ok_kebutuhan_darah'],

      'nama_prosedur'                       =>  $result['notes']['nama_prosedur'],
      'body_man_front'                      =>  $result['notes']['body_man_front'],
      'body_man_back'                       =>  $result['notes']['body_man_back'],
      'body_woman_front'                    =>  $result['notes']['body_woman_front'],
      'body_woman_back'                     =>  $result['notes']['body_woman_back'],
      'palmar_hand_kiri'                    =>  $result['notes']['palmar_hand_kiri'],
      'palmar_hand_kanan'                   =>  $result['notes']['palmar_hand_kanan'],
      'head_kiri'                           =>  $result['notes']['head_kiri'],
      'head_kanan'                          =>  $result['notes']['head_kanan'],
      'head_front'                          =>  $result['notes']['head_front'],
      'head_back'                           =>  $result['notes']['head_back'],
      'dorsal_kiri'                         =>  $result['notes']['dorsal_kiri'],
      'dorsal_kanan'                        =>  $result['notes']['dorsal_kanan'],
      'plantar_kanan'                       =>  $result['notes']['plantar_kanan'],
      'plantar_kiri'                        =>  $result['notes']['plantar_kiri'],
      'palmar_feet_kiri'                    =>  $result['notes']['palmar_feet_kiri'],
      'palmar_feet_kanan'                   =>  $result['notes']['palmar_feet_kanan'],

      'coretan_wali'                        =>  $result['notes']['coretan_wali'],
      'coretan_pasien'                      =>  $result['notes']['coretan_pasien'],
      'coretan_saksi'                       =>  $result['notes']['coretan_saksi'],
      'coretan_dokter_operator2'            =>  $result['notes']['coretan_dokter_operator2'],
      'coretan_perawat_ruang_ok'            =>  $result['notes']['coretan_perawat_ruang_ok'],
      'coretan_perawat_ruang_rawat_inap'    =>  $result['notes']['coretan_perawat_ruang_rawat_inap'],
      'coretan_dokter_operator'             =>  $result['notes']['coretan_dokter_operator'],
      'pasien_a_n'                          =>  $result['notes']['pasien_a_n'],
      'nama_wali_ttd'                       =>  $result['notes']['nama_wali_ttd'],
      'nama_pasien_ttd'                     =>  $result['notes']['nama_pasien_ttd'],
      'nama_saksi'                          =>  $result['notes']['nama_saksi'],
      'nama_dokter_operator2'               =>  $result['notes']['nama_dokter_operator2'],
      'nama_perawat_ruang_ok'               =>  $result['notes']['nama_perawat_ruang_ok'],
      'nama_perawat_ruang_rawat_inap'       =>  $result['notes']['nama_perawat_ruang_rawat_inap'],
      'nama_dokter_operator'                =>  $result['notes']['nama_dokter_operator'],
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
