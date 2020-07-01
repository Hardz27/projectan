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
class C_142_asesmen_pra_anastesi extends CI_Controller
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
    $this->id_ref_global_tipe_42 = 142;
    
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
    $this->c_folder = "C_142_asesmen_pra_anastesi"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

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
      'title'   => 'Asesmen Pra Anestesi / SEDASI',
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
            'notes_id'                                       => $o['id'],
            'approved_petugas'                               => $jdata['approved_petugas'],
            'tanggal'                                        => $jdata['notes']['tanggal'],
            'jam'                                            => $jdata['notes']['jam'],
            'nama_pasien'                                    => $jdata['notes']['nama_pasien'],
            'no_rm'                                          => $jdata['notes']['no_rm'],
            'ttl'                                            => $jdata['notes']['ttl'],
            'diagnosa'                                       => $jdata['notes']['diagnosa'],
            'jenis_kelamin'                                  => $jdata['notes']['jenis_kelamin'],
            'rencana_tindakan'                               => $jdata['notes']['rencana_tindakan'],
            'ruangan'                                        => $jdata['notes']['ruangan'],
            'riwayat_anestesi1'                              => $jdata['notes']['riwayat_anestesi1'],
            'riwayat_anestesi2'                              => $jdata['notes']['riwayat_anestesi2'],
            'tidak_pernah_anestesi'                          => $jdata['notes']['tidak_pernah_anestesi'],
            'batuk'                                          => $jdata['notes']['batuk'],
            'pilek'                                          => $jdata['notes']['pilek'],
            'demam'                                          => $jdata['notes']['demam'],
            'gejala_lain'                                    => $jdata['notes']['gejala_lain'],
            'desc_gejala_lain'                               => $jdata['notes']['desc_gejala_lain'],
            'alergi'                                         => $jdata['notes']['alergi'],
            'tidak_ada_alergi'                               => $jdata['notes']['tidak_ada_alergi'],
            'kompilkasi_anestesi_sebelumnya'                 => $jdata['notes']['kompilkasi_anestesi_sebelumnya'],
            'tidak_pernah_kompilkasi_anestesi_sebelumnya'    => $jdata['notes']['tidak_pernah_kompilkasi_anestesi_sebelumnya'],
            'riwayat_komplikasi_anestesi_dalam_keluarga'     => $jdata['notes']['riwayat_komplikasi_anestesi_dalam_keluarga'],
            'tidak_ada_komplikasi_anestesi_dalam_keluarga'   => $jdata['notes']['tidak_ada_komplikasi_anestesi_dalam_keluarga'],
            'asma'                                           => $jdata['notes']['asma'],
            'hipertensi'                                     => $jdata['notes']['hipertensi'],
            'dm'                                             => $jdata['notes']['dm'],
            'maag'                                           => $jdata['notes']['maag'],
            'penyakit_jantung'                               => $jdata['notes']['penyakit_jantung'],
            'penyakit_lain'                                  => $jdata['notes']['penyakit_lain'],
            'desc_penyakit_lain'                             => $jdata['notes']['desc_penyakit_lain'],
            'merokok'                                        => $jdata['notes']['merokok'],
            'batang_rokok'                                   => $jdata['notes']['batang_rokok'],
            'merokok_per_tahun'                              => $jdata['notes']['merokok_per_tahun'],
            'alkohol'                                        => $jdata['notes']['alkohol'],
            'frekuensi'                                      => $jdata['notes']['frekuensi'],
            'jamu'                                           => $jdata['notes']['jamu'],
            'desc_ya_jamu'                                   => $jdata['notes']['desc_ya_jamu'],
            'herbal'                                         => $jdata['notes']['herbal'],
            'desc_ya_herbal'                                 => $jdata['notes']['desc_ya_herbal'],
            'keadan_umum'                                    => $jdata['notes']['keadan_umum'],
            'desc_tidak_baik'                                => $jdata['notes']['desc_tidak_baik'],
            'desc_gcs'                                       => $jdata['notes']['desc_gcs'],
            'pilih_gcs'                                      => $jdata['notes']['pilih_gcs'],
            'gds'                                            => $jdata['notes']['gds'],
            'td'                                             => $jdata['notes']['td'],
            'hr'                                             => $jdata['notes']['hr'],
            'rr'                                             => $jdata['notes']['rr'],
            'suhu'                                           => $jdata['notes']['suhu'],
            'vas'                                            => $jdata['notes']['vas'],
            'tb'                                             => $jdata['notes']['tb'],
            'bb'                                             => $jdata['notes']['bb'],
            'edema'                                          => $jdata['notes']['edema'],
            'malformasi_mandibula'                           => $jdata['notes']['malformasi_mandibula'],
            'gigi_ompong'                                    => $jdata['notes']['gigi_ompong'],
            'suara_serak'                                    => $jdata['notes']['suara_serak'],
            'gigi_palsu'                                     => $jdata['notes']['gigi_palsu'],
            'deviasi_trakea'                                 => $jdata['notes']['deviasi_trakea'],
            'gigi_tonggos'                                   => $jdata['notes']['gigi_tonggos'],
            'makroglossi'                                    => $jdata['notes']['makroglossi'],
            'mikrotia'                                       => $jdata['notes']['mikrotia'],
            'dalam_batas_normal'                             => $jdata['notes']['dalam_batas_normal'],
            'janggut_kumis'                                  => $jdata['notes']['janggut_kumis'],
            'evaluasi_jalan_nafas_lain'                      => $jdata['notes']['evaluasi_jalan_nafas_lain'],
            'desc_evaluasi_jalan_nafas_lain'                 => $jdata['notes']['desc_evaluasi_jalan_nafas_lain'],
            'buka_mulut_3_cm'                                => $jdata['notes']['buka_mulut_3_cm'],
            'mallampati'                                     => $jdata['notes']['mallampati'],
            'thyromental'                                    => $jdata['notes']['thyromental'],
            'upper_up_bite_test_class'                       => $jdata['notes']['upper_up_bite_test_class'],
            'status_gizi'                                    => $jdata['notes']['status_gizi'],
            'konjungtiva'                                    => $jdata['notes']['konjungtiva'],
            'sklera'                                         => $jdata['notes']['sklera'],
            'bibir'                                          => $jdata['notes']['bibir'],
            'massa_tumor_kepala'                             => $jdata['notes']['massa_tumor_kepala'],
            'metris'                                         => $jdata['notes']['metris'],
            'posisi'                                         => $jdata['notes']['posisi'],
            'bn'                                             => $jdata['notes']['bn'],
            'ronkhl'                                         => $jdata['notes']['ronkhl'],
            'wheezing'                                       => $jdata['notes']['wheezing'],
            'lain_thoraks'                                   => $jdata['notes']['lain_thoraks'],
            'massa_tumor_thoraks'                            => $jdata['notes']['massa_tumor_thoraks'],
            'reguler'                                        => $jdata['notes']['reguler'],
            'bunyi_jantung'                                  => $jdata['notes']['bunyi_jantung'],
            'datar'                                          => $jdata['notes']['datar'],
            'distensi'                                       => $jdata['notes']['distensi'],
            'supple'                                         => $jdata['notes']['supple'],
            'cembung'                                        => $jdata['notes']['cembung'],
            'ascites'                                        => $jdata['notes']['ascites'],
            'defans_muskuler'                                => $jdata['notes']['defans_muskuler'],
            'hepar_or_lien'                                  => $jdata['notes']['hepar_or_lien'],
            'teraba_or_tidak'                                => $jdata['notes']['teraba_or_tidak'],
            'desc_teraba'                                    => $jdata['notes']['desc_teraba'],
            'massa_tumor_abdomen'                            => $jdata['notes']['massa_tumor_abdomen'],
            'urogenital'                                     => $jdata['notes']['urogenital'],
            'des_urogenital_lainnya'                         => $jdata['notes']['des_urogenital_lainnya'],
            'keteter_urin'                                   => $jdata['notes']['keteter_urin'],
            'warna_urin'                                     => $jdata['notes']['warna_urin'],
            'warna_urin_lainnya'                             => $jdata['notes']['warna_urin_lainnya'],
            'volume_urine'                                   => $jdata['notes']['volume_urine'],
            'volume_urine_lain'                              => $jdata['notes']['volume_urine_lain'],
            'dbn_ekstremitras'                               => $jdata['notes']['dbn_ekstremitras'],
            'edema_ekstremitas'                              => $jdata['notes']['edema_ekstremitas'],
            'desc_edema'                                     => $jdata['notes']['desc_edema'],
            'fraktur'                                        => $jdata['notes']['fraktur'],
            'desc_fraktur'                                   => $jdata['notes']['desc_fraktur'],
            'lainnya_ekstremitras'                           => $jdata['notes']['lainnya_ekstremitras'],
            'desc_lainnya_ekstremitras'                      => $jdata['notes']['desc_lainnya_ekstremitras'],
            'pemeriksaan_laboratorium'                       => $jdata['notes']['pemeriksaan_laboratorium'],
            'ekg'                                            => $jdata['notes']['ekg'],
            'ro'                                             => $jdata['notes']['ro'],
            'pemeriksaan_penunjang_lainnya'                  => $jdata['notes']['pemeriksaan_penunjang_lainnya'],
            'asa_ps'                                         => $jdata['notes']['asa_ps'],
            'masalah_diagnosis'                              => $jdata['notes']['masalah_diagnosis'],
            'penatalaksan_anestesi'                          => $jdata['notes']['penatalaksan_anestesi'],
            'rencana_usulan_tindakan'                        => $jdata['notes']['rencana_usulan_tindakan'],
            'intruksi'                                       => $jdata['notes']['intruksi'],
            'puasa'                                          => $jdata['notes']['puasa'],
            'pre_op'                                         => $jdata['notes']['pre_op'],
            'jam_rencana_tiba_di_ok'                         => $jdata['notes']['jam_rencana_tiba_di_ok'],
            'tanggal_rencana_tiba_di_ok'                     => $jdata['notes']['tanggal_rencana_tiba_di_ok'],
            'jam_rencana_operasi'                            => $jdata['notes']['jam_rencana_operasi'],
            'tanggal_rencana_operasi'                        => $jdata['notes']['tanggal_rencana_operasi'],
            'injeksi_antibiotik'                             => $jdata['notes']['injeksi_antibiotik'],
            'persiapan_darah'                                => $jdata['notes']['persiapan_darah'],
            'teknik_anestesi_dan_sedasi'                     => $jdata['notes']['teknik_anestesi_dan_sedasi'],
            'desc_sedasi'                                    => $jdata['notes']['desc_sedasi'],
            'anestesi_umum'                                  => $jdata['notes']['anestesi_umum'],
            'ga_tiva'                                        => $jdata['notes']['ga_tiva'],
            'ga_facemask'                                    => $jdata['notes']['ga_facemask'],
            'ga_lima'                                        => $jdata['notes']['ga_lima'],
            'geta'                                           => $jdata['notes']['geta'],
            'gani'                                           => $jdata['notes']['gani'],
            'anestesi_regional'                              => $jdata['notes']['anestesi_regional'],
            'sab'                                            => $jdata['notes']['sab'],
            'epirdural_regional'                             => $jdata['notes']['epirdural_regional'],
            'cse'                                            => $jdata['notes']['cse'],
            'cega'                                           => $jdata['notes']['cega'],
            'hipotensi_kendali'                              => $jdata['notes']['hipotensi_kendali'],
            'lainnya_teknik_khusus'                          => $jdata['notes']['lainnya_teknik_khusus'],
            'ekg_monitoring'                                 => $jdata['notes']['ekg_monitoring'],
            'desc_ekg'                                       => $jdata['notes']['desc_ekg'],
            'nibp'                                           => $jdata['notes']['nibp'],
            'spo'                                            => $jdata['notes']['spo'],
            'temp_et_co'                                     => $jdata['notes']['temp_et_co'],
            'cvp'                                            => $jdata['notes']['cvp'],
            'art_line'                                       => $jdata['notes']['art_line'],
            'lainnya_monitoring'                             => $jdata['notes']['lainnya_monitoring'],
            'iv'                                             => $jdata['notes']['iv'],
            'epirdural_kontrol'                              => $jdata['notes']['epirdural_kontrol'],
            'lainnya_kontrol_nyeri'                          => $jdata['notes']['lainnya_kontrol_nyeri'],
            'des_lainnya_kontrol_nyeri'                      => $jdata['notes']['des_lainnya_kontrol_nyeri'],
            'rawat_jalan'                                    => $jdata['notes']['rawat_jalan'],
            'rawat_inap'                                     => $jdata['notes']['rawat_inap'],
            'hcu'                                            => $jdata['notes']['hcu'],
            'icu'                                            => $jdata['notes']['icu'],
            'nicu'                                           => $jdata['notes']['nicu'],
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
      'tanggal'                                       =>  $this->input->post('tanggal'),
      'jam'                                           =>  $this->input->post('jam'),
      'nama_pasien'                                   =>  $this->input->post('nama_pasien'),
      'no_rm'                                         =>  $this->input->post('no_rm'),
      'ttl'                                           =>  $this->input->post('ttl'),
      'diagnosa'                                      =>  $this->input->post('diagnosa'),
      'jenis_kelamin'                                 =>  $this->input->post('jenis_kelamin'),
      'rencana_tindakan'                              =>  $this->input->post('rencana_tindakan'),
      'ruangan'                                       =>  $this->input->post('ruangan'),
      'riwayat_anestesi1'                             =>  $this->input->post('riwayat_anestesi1'),
      'riwayat_anestesi2'                             =>  $this->input->post('riwayat_anestesi2'),
      'tidak_pernah_anestesi'                         =>  $this->input->post('tidak_pernah_anestesi'),
      'batuk'                                         =>  $this->input->post('batuk'),
      'pilek'                                         =>  $this->input->post('pilek'),
      'demam'                                         =>  $this->input->post('demam'),
      'gejala_lain'                                   =>  $this->input->post('gejala_lain'),
      'desc_gejala_lain'                              =>  $this->input->post('desc_gejala_lain'),
      'alergi'                                        =>  $this->input->post('alergi'),
      'tidak_ada_alergi'                              =>  $this->input->post('tidak_ada_alergi'),
      'kompilkasi_anestesi_sebelumnya'                =>  $this->input->post('kompilkasi_anestesi_sebelumnya'),
      'tidak_pernah_kompilkasi_anestesi_sebelumnya'   =>  $this->input->post('tidak_pernah_kompilkasi_anestesi_sebelumnya'),
      'riwayat_komplikasi_anestesi_dalam_keluarga'    =>  $this->input->post('riwayat_komplikasi_anestesi_dalam_keluarga'),
      'tidak_ada_komplikasi_anestesi_dalam_keluarga'  =>  $this->input->post('tidak_ada_komplikasi_anestesi_dalam_keluarga'),
      'asma'                                          =>  $this->input->post('asma'),
      'maag'                                          =>  $this->input->post('maag'),
      'hipertensi'                                    =>  $this->input->post('hipertensi'),
      'dm'                                            =>  $this->input->post('dm'),
      'penyakit_jantung'                              =>  $this->input->post('penyakit_jantung'),
      'penyakit_lain'                                 =>  $this->input->post('penyakit_lain'),
      'desc_penyakit_lain'                            =>  $this->input->post('desc_penyakit_lain'),
      'merokok'                                       =>  $this->input->post('merokok'),
      'batang_rokok'                                  =>  $this->input->post('batang_rokok'),
      'merokok_per_tahun'                             =>  $this->input->post('merokok_per_tahun'),
      'alkohol'                                       =>  $this->input->post('alkohol'),
      'frekuensi'                                     =>  $this->input->post('frekuensi'),
      'jamu'                                          =>  $this->input->post('jamu'),
      'desc_ya_jamu'                                  =>  $this->input->post('desc_ya_jamu'),
      'herbal'                                        =>  $this->input->post('herbal'),
      'desc_ya_herbal'                                =>  $this->input->post('desc_ya_herbal'),
      'keadan_umum'                                   =>  $this->input->post('keadan_umum'),
      'desc_tidak_baik'                               =>  $this->input->post('desc_tidak_baik'),
      'desc_gcs'                                      =>  $this->input->post('desc_gcs'),
      'pilih_gcs'                                     =>  $this->input->post('pilih_gcs'),
      'gds'                                           =>  $this->input->post('gds'),
      'td'                                            =>  $this->input->post('td'),
      'hr'                                            =>  $this->input->post('hr'),
      'rr'                                            =>  $this->input->post('rr'),
      'suhu'                                          =>  $this->input->post('suhu'),
      'vas'                                           =>  $this->input->post('vas'),
      'tb'                                            =>  $this->input->post('tb'),
      'bb'                                            =>  $this->input->post('bb'),
      'edema'                                         =>  $this->input->post('edema'),
      'malformasi_mandibula'                          =>  $this->input->post('malformasi_mandibula'),
      'gigi_ompong'                                   =>  $this->input->post('gigi_ompong'),
      'suara_serak'                                   =>  $this->input->post('suara_serak'),
      'gigi_palsu'                                    =>  $this->input->post('gigi_palsu'),
      'deviasi_trakea'                                =>  $this->input->post('deviasi_trakea'),
      'gigi_tonggos'                                  =>  $this->input->post('gigi_tonggos'),
      'makroglossi'                                   =>  $this->input->post('makroglossi'),
      'mikrotia'                                      =>  $this->input->post('mikrotia'),
      'dalam_batas_normal'                            =>  $this->input->post('dalam_batas_normal'),
      'janggut_kumis'                                 =>  $this->input->post('janggut_kumis'),
      'evaluasi_jalan_nafas_lain'                     =>  $this->input->post('evaluasi_jalan_nafas_lain'),
      'desc_evaluasi_jalan_nafas_lain'                =>  $this->input->post('desc_evaluasi_jalan_nafas_lain'),
      'buka_mulut_3_cm'                               =>  $this->input->post('buka_mulut_3_cm'),
      'mallampati'                                    =>  $this->input->post('mallampati'),
      'thyromental'                                   =>  $this->input->post('thyromental'),
      'upper_up_bite_test_class'                      =>  $this->input->post('upper_up_bite_test_class'),
      'status_gizi'                                   =>  $this->input->post('status_gizi'),
      'konjungtiva'                                   =>  $this->input->post('konjungtiva'),
      'sklera'                                        =>  $this->input->post('sklera'),
      'bibir'                                         =>  $this->input->post('bibir'),
      'massa_tumor_kepala'                            =>  $this->input->post('massa_tumor_kepala'),
      'metris'                                        =>  $this->input->post('metris'),
      'posisi'                                        =>  $this->input->post('posisi'),
      'bn'                                            =>  $this->input->post('bn'),
      'ronkhl'                                        =>  $this->input->post('ronkhl'),
      'wheezing'                                      =>  $this->input->post('wheezing'),
      'lain_thoraks'                                  =>  $this->input->post('lain_thoraks'),
      'massa_tumor_thoraks'                           =>  $this->input->post('massa_tumor_thoraks'),
      'reguler'                                       =>  $this->input->post('reguler'),
      'bunyi_jantung'                                 =>  $this->input->post('bunyi_jantung'),
      'datar'                                         =>  $this->input->post('datar'),
      'distensi'                                      =>  $this->input->post('distensi'),
      'supple'                                        =>  $this->input->post('supple'),
      'cembung'                                       =>  $this->input->post('cembung'),
      'ascites'                                       =>  $this->input->post('ascites'),
      'defans_muskuler'                               =>  $this->input->post('defans_muskuler'),
      'hepar_or_lien'                                 =>  $this->input->post('hepar_or_lien'),
      'teraba_or_tidak'                               =>  $this->input->post('teraba_or_tidak'),
      'desc_teraba'                                   =>  $this->input->post('desc_teraba'),
      'massa_tumor_abdomen'                           =>  $this->input->post('massa_tumor_abdomen'),
      'urogenital'                                    =>  $this->input->post('urogenital'),
      'des_urogenital_lainnya'                        =>  $this->input->post('des_urogenital_lainnya'),
      'keteter_urin'                                  =>  $this->input->post('keteter_urin'),
      'warna_urin'                                    =>  $this->input->post('warna_urin'),
      'warna_urin_lainnya'                            =>  $this->input->post('warna_urin_lainnya'),
      'volume_urine'                                  =>  $this->input->post('volume_urine'),
      'volume_urine_lain'                             =>  $this->input->post('volume_urine_lain'),
      'dbn_ekstremitras'                              =>  $this->input->post('dbn_ekstremitras'),
      'edema_ekstremitas'                             =>  $this->input->post('edema_ekstremitas'),
      'desc_edema'                                    =>  $this->input->post('desc_edema'),
      'fraktur'                                       =>  $this->input->post('fraktur'),
      'desc_fraktur'                                  =>  $this->input->post('desc_fraktur'),
      'lainnya_ekstremitras'                          =>  $this->input->post('lainnya_ekstremitras'),
      'desc_lainnya_ekstremitras'                     =>  $this->input->post('desc_lainnya_ekstremitras'),
      'pemeriksaan_laboratorium'                      =>  $this->input->post('pemeriksaan_laboratorium'),
      'ekg'                                           =>  $this->input->post('ekg'),
      'ro'                                            =>  $this->input->post('ro'),
      'pemeriksaan_penunjang_lainnya'                 =>  $this->input->post('pemeriksaan_penunjang_lainnya'),
      'asa_ps'                                        =>  $this->input->post('asa_ps'),
      'masalah_diagnosis'                             =>  $this->input->post('masalah_diagnosis'),
      'penatalaksan_anestesi'                         =>  $this->input->post('penatalaksan_anestesi'),
      'rencana_usulan_tindakan'                       =>  $this->input->post('rencana_usulan_tindakan'),
      'intruksi'                                      =>  $this->input->post('intruksi'),
      'puasa'                                         =>  $this->input->post('puasa'),
      'pre_op'                                        =>  $this->input->post('pre_op'),
      'jam_rencana_tiba_di_ok'                        =>  $this->input->post('jam_rencana_tiba_di_ok'),
      'tanggal_rencana_tiba_di_ok'                    =>  $this->input->post('tanggal_rencana_tiba_di_ok'),
      'jam_rencana_operasi'                           =>  $this->input->post('jam_rencana_operasi'),
      'tanggal_rencana_operasi'                       =>  $this->input->post('tanggal_rencana_operasi'),
      'injeksi_antibiotik'                             => $this->input->post('injeksi_antibiotik'),
      'persiapan_darah'                                => $this->input->post('persiapan_darah'),
      'teknik_anestesi_dan_sedasi'                    =>  $this->input->post('teknik_anestesi_dan_sedasi'),
      'desc_sedasi'                                   =>  $this->input->post('desc_sedasi'),
      'anestesi_umum'                                 =>  $this->input->post('anestesi_umum'),
      'ga_tiva'                                       =>  $this->input->post('ga_tiva'),
      'ga_facemask'                                   =>  $this->input->post('ga_facemask'),
      'ga_lima'                                       =>  $this->input->post('ga_lima'),
      'geta'                                          =>  $this->input->post('geta'),
      'gani'                                          =>  $this->input->post('gani'),
      'anestesi_regional'                             =>  $this->input->post('anestesi_regional'),
      'sab'                                           =>  $this->input->post('sab'),
      'epirdural_regional'                            =>  $this->input->post('epirdural_regional'),
      'cse'                                           =>  $this->input->post('cse'),
      'cega'                                          =>  $this->input->post('cega'),
      'hipotensi_kendali'                             =>  $this->input->post('hipotensi_kendali'),
      'lainnya_teknik_khusus'                         =>  $this->input->post('lainnya_teknik_khusus'),
      'ekg_monitoring'                                =>  $this->input->post('ekg_monitoring'),
      'desc_ekg'                                      =>  $this->input->post('desc_ekg'),
      'nibp'                                          =>  $this->input->post('nibp'),
      'spo'                                           =>  $this->input->post('spo'),
      'temp_et_co'                                    =>  $this->input->post('temp_et_co'),
      'cvp'                                           =>  $this->input->post('cvp'),
      'art_line'                                      =>  $this->input->post('art_line'),
      'lainnya_monitoring'                            =>  $this->input->post('lainnya_monitoring'),
      'iv'                                            =>  $this->input->post('iv'),
      'epirdural_kontrol'                             =>  $this->input->post('epirdural_kontrol'),
      'lainnya_kontrol_nyeri'                         =>  $this->input->post('lainnya_kontrol_nyeri'),
      'des_lainnya_kontrol_nyeri'                     =>  $this->input->post('des_lainnya_kontrol_nyeri'),
      'rawat_jalan'                                   =>  $this->input->post('rawat_jalan'),
      'rawat_inap'                                    =>  $this->input->post('rawat_inap'),
      'hcu'                                           =>  $this->input->post('hcu'),
      'icu'                                           =>  $this->input->post('icu'),
      'nicu'                                          =>  $this->input->post('nicu'),

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
    echo trace($params);
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
      'approved_petugas'                               => $result['approved_petugas'],
      'tanggal'                                        => $result['notes']['tanggal'],
      'jam'                                            => $result['notes']['jam'],
      'nama_pasien'                                    => $result['notes']['nama_pasien'],
      'no_rm'                                          => $result['notes']['no_rm'],
      'ttl'                                            => $result['notes']['ttl'],
      'diagnosa'                                       => $result['notes']['diagnosa'],
      'jenis_kelamin'                                  => $result['notes']['jenis_kelamin'],
      'rencana_tindakan'                               => $result['notes']['rencana_tindakan'],
      'ruangan'                                        => $result['notes']['ruangan'],
      'riwayat_anestesi1'                              => $result['notes']['riwayat_anestesi1'],
      'riwayat_anestesi2'                              => $result['notes']['riwayat_anestesi2'],
      'tidak_pernah_anestesi'                          => $result['notes']['tidak_pernah_anestesi'],
      'batuk'                                          => $result['notes']['batuk'],
      'pilek'                                          => $result['notes']['pilek'],
      'demam'                                          => $result['notes']['demam'],
      'gejala_lain'                                    => $result['notes']['gejala_lain'],
      'desc_gejala_lain'                               => $result['notes']['desc_gejala_lain'],
      'alergi'                                         => $result['notes']['alergi'],
      'tidak_ada_alergi'                               => $result['notes']['tidak_ada_alergi'],
      'kompilkasi_anestesi_sebelumnya'                 => $result['notes']['kompilkasi_anestesi_sebelumnya'],
      'tidak_pernah_kompilkasi_anestesi_sebelumnya'    => $result['notes']['tidak_pernah_kompilkasi_anestesi_sebelumnya'],
      'riwayat_komplikasi_anestesi_dalam_keluarga'     => $result['notes']['riwayat_komplikasi_anestesi_dalam_keluarga'],
      'tidak_ada_komplikasi_anestesi_dalam_keluarga'   => $result['notes']['tidak_ada_komplikasi_anestesi_dalam_keluarga'],
      'asma'                                           => $result['notes']['asma'],
      'hipertensi'                                     => $result['notes']['hipertensi'],
      'dm'                                             => $result['notes']['dm'],
      'maag'                                           => $result['notes']['maag'],
      'penyakit_jantung'                               => $result['notes']['penyakit_jantung'],
      'penyakit_lain'                                  => $result['notes']['penyakit_lain'],
      'desc_penyakit_lain'                             => $result['notes']['desc_penyakit_lain'],
      'merokok'                                        => $result['notes']['merokok'],
      'batang_rokok'                                   => $result['notes']['batang_rokok'],
      'merokok_per_tahun'                              => $result['notes']['merokok_per_tahun'],
      'alkohol'                                        => $result['notes']['alkohol'],
      'frekuensi'                                      => $result['notes']['frekuensi'],
      'jamu'                                           => $result['notes']['jamu'],
      'desc_ya_jamu'                                   => $result['notes']['desc_ya_jamu'],
      'herbal'                                         => $result['notes']['herbal'],
      'desc_ya_herbal'                                 => $result['notes']['desc_ya_herbal'],
      'keadan_umum'                                    => $result['notes']['keadan_umum'],
      'desc_tidak_baik'                                => $result['notes']['desc_tidak_baik'],
      'desc_gcs'                                       => $result['notes']['desc_gcs'],
      'pilih_gcs'                                      => $result['notes']['pilih_gcs'],
      'gds'                                            => $result['notes']['gds'],
      'td'                                             => $result['notes']['td'],
      'hr'                                             => $result['notes']['hr'],
      'rr'                                             => $result['notes']['rr'],
      'suhu'                                           => $result['notes']['suhu'],
      'vas'                                            => $result['notes']['vas'],
      'tb'                                             => $result['notes']['tb'],
      'bb'                                             => $result['notes']['bb'],
      'edema'                                          => $result['notes']['edema'],
      'malformasi_mandibula'                           => $result['notes']['malformasi_mandibula'],
      'gigi_ompong'                                    => $result['notes']['gigi_ompong'],
      'suara_serak'                                    => $result['notes']['suara_serak'],
      'gigi_palsu'                                     => $result['notes']['gigi_palsu'],
      'deviasi_trakea'                                 => $result['notes']['deviasi_trakea'],
      'gigi_tonggos'                                   => $result['notes']['gigi_tonggos'],
      'makroglossi'                                    => $result['notes']['makroglossi'],
      'mikrotia'                                       => $result['notes']['mikrotia'],
      'dalam_batas_normal'                             => $result['notes']['dalam_batas_normal'],
      'janggut_kumis'                                  => $result['notes']['janggut_kumis'],
      'evaluasi_jalan_nafas_lain'                      => $result['notes']['evaluasi_jalan_nafas_lain'],
      'desc_evaluasi_jalan_nafas_lain'                 => $result['notes']['desc_evaluasi_jalan_nafas_lain'],
      'buka_mulut_3_cm'                                => $result['notes']['buka_mulut_3_cm'],
      'mallampati'                                     => $result['notes']['mallampati'],
      'thyromental'                                    => $result['notes']['thyromental'],
      'upper_up_bite_test_class'                       => $result['notes']['upper_up_bite_test_class'],
      'status_gizi'                                    => $result['notes']['status_gizi'],
      'konjungtiva'                                    => $result['notes']['konjungtiva'],
      'sklera'                                         => $result['notes']['sklera'],
      'bibir'                                          => $result['notes']['bibir'],
      'massa_tumor_kepala'                             => $result['notes']['massa_tumor_kepala'],
      'metris'                                         => $result['notes']['metris'],
      'posisi'                                         => $result['notes']['posisi'],
      'bn'                                             => $result['notes']['bn'],
      'ronkhl'                                         => $result['notes']['ronkhl'],
      'wheezing'                                       => $result['notes']['wheezing'],
      'lain_thoraks'                                   => $result['notes']['lain_thoraks'],
      'massa_tumor_thoraks'                            => $result['notes']['massa_tumor_thoraks'],
      'reguler'                                        => $result['notes']['reguler'],
      'bunyi_jantung'                                  => $result['notes']['bunyi_jantung'],
      'datar'                                          => $result['notes']['datar'],
      'distensi'                                       => $result['notes']['distensi'],
      'supple'                                         => $result['notes']['supple'],
      'cembung'                                        => $result['notes']['cembung'],
      'ascites'                                        => $result['notes']['ascites'],
      'defans_muskuler'                                => $result['notes']['defans_muskuler'],
      'hepar_or_lien'                                  => $result['notes']['hepar_or_lien'],
      'teraba_or_tidak'                                => $result['notes']['teraba_or_tidak'],
      'desc_teraba'                                    => $result['notes']['desc_teraba'],
      'massa_tumor_abdomen'                            => $result['notes']['massa_tumor_abdomen'],
      'urogenital'                                     => $result['notes']['urogenital'],
      'des_urogenital_lainnya'                         => $result['notes']['des_urogenital_lainnya'],
      'keteter_urin'                                   => $result['notes']['keteter_urin'],
      'warna_urin'                                     => $result['notes']['warna_urin'],
      'warna_urin_lainnya'                             => $result['notes']['warna_urin_lainnya'],
      'volume_urine'                                   => $result['notes']['volume_urine'],
      'volume_urine_lain'                              => $result['notes']['volume_urine_lain'],
      'dbn_ekstremitras'                               => $result['notes']['dbn_ekstremitras'],
      'edema_ekstremitas'                              => $result['notes']['edema_ekstremitas'],
      'desc_edema'                                     => $result['notes']['desc_edema'],
      'fraktur'                                        => $result['notes']['fraktur'],
      'desc_fraktur'                                   => $result['notes']['desc_fraktur'],
      'lainnya_ekstremitras'                           => $result['notes']['lainnya_ekstremitras'],
      'desc_lainnya_ekstremitras'                      => $result['notes']['desc_lainnya_ekstremitras'],
      'pemeriksaan_laboratorium'                       => $result['notes']['pemeriksaan_laboratorium'],
      'ekg'                                            => $result['notes']['ekg'],
      'ro'                                             => $result['notes']['ro'],
      'pemeriksaan_penunjang_lainnya'                  => $result['notes']['pemeriksaan_penunjang_lainnya'],
      'asa_ps'                                         => $result['notes']['asa_ps'],
      'masalah_diagnosis'                              => $result['notes']['masalah_diagnosis'],
      'penatalaksan_anestesi'                          => $result['notes']['penatalaksan_anestesi'],
      'rencana_usulan_tindakan'                        => $result['notes']['rencana_usulan_tindakan'],
      'intruksi'                                       => $result['notes']['intruksi'],
      'puasa'                                          => $result['notes']['puasa'],
      'pre_op'                                         => $result['notes']['pre_op'],
      'jam_rencana_tiba_di_ok'                         => $result['notes']['jam_rencana_tiba_di_ok'],
      'tanggal_rencana_tiba_di_ok'                     => $result['notes']['tanggal_rencana_tiba_di_ok'],
      'jam_rencana_operasi'                            => $result['notes']['jam_rencana_operasi'],
      'tanggal_rencana_operasi'                        => $result['notes']['tanggal_rencana_operasi'],
      'injeksi_antibiotik'                             => $result['notes']['injeksi_antibiotik'],
      'persiapan_darah'                                => $result['notes']['persiapan_darah'],
      'teknik_anestesi_dan_sedasi'                     => $result['notes']['teknik_anestesi_dan_sedasi'],
      'desc_sedasi'                                    => $result['notes']['desc_sedasi'],
      'anestesi_umum'                                  => $result['notes']['anestesi_umum'],
      'ga_tiva'                                        => $result['notes']['ga_tiva'],
      'ga_facemask'                                    => $result['notes']['ga_facemask'],
      'ga_lima'                                        => $result['notes']['ga_lima'],
      'geta'                                           => $result['notes']['geta'],
      'gani'                                           => $result['notes']['gani'],
      'anestesi_regional'                              => $result['notes']['anestesi_regional'],
      'sab'                                            => $result['notes']['sab'],
      'epirdural_regional'                             => $result['notes']['epirdural_regional'],
      'cse'                                            => $result['notes']['cse'],
      'cega'                                           => $result['notes']['cega'],
      'hipotensi_kendali'                              => $result['notes']['hipotensi_kendali'],
      'lainnya_teknik_khusus'                          => $result['notes']['lainnya_teknik_khusus'],
      'ekg_monitoring'                                 => $result['notes']['ekg_monitoring'],
      'desc_ekg'                                       => $result['notes']['desc_ekg'],
      'nibp'                                           => $result['notes']['nibp'],
      'spo'                                            => $result['notes']['spo'],
      'temp_et_co'                                     => $result['notes']['temp_et_co'],
      'cvp'                                            => $result['notes']['cvp'],
      'art_line'                                       => $result['notes']['art_line'],
      'lainnya_monitoring'                             => $result['notes']['lainnya_monitoring'],
      'iv'                                             => $result['notes']['iv'],
      'epirdural_kontrol'                              => $result['notes']['epirdural_kontrol'],
      'lainnya_kontrol_nyeri'                          => $result['notes']['lainnya_kontrol_nyeri'],
      'des_lainnya_kontrol_nyeri'                      => $result['notes']['des_lainnya_kontrol_nyeri'],
      'rawat_jalan'                                    => $result['notes']['rawat_jalan'],
      'rawat_inap'                                     => $result['notes']['rawat_inap'],
      'hcu'                                            => $result['notes']['hcu'],
      'icu'                                            => $result['notes']['icu'],
      'nicu'                                           => $result['notes']['nicu'],
    ];
    $result_data = $result_data['data'][0];
    // $data['title'] = $this->title;
    $detail['id_notes'] = $result_data['id'];
    $data['id_reg'] = $result_data['id_pasien_registrasi'];
    $detail['id_visit'] = $result_data['id_pasien_visit'];
    $data['result'] = $detail;
    $data['class_name'] = $this->class;
    // trace($data['result']);
    $this->load->view('contents/notes/' . $this->class . '/edit', $data);
  }

  public function edit_process()
  {
    $notes = [
      'tanggal'                                       =>  $this->input->post('tanggal'),
      'jam'                                           =>  $this->input->post('jam'),
      'nama_pasien'                                   =>  $this->input->post('nama_pasien'),
      'no_rm'                                         =>  $this->input->post('no_rm'),
      'ttl'                                           =>  $this->input->post('ttl'),
      'diagnosa'                                      =>  $this->input->post('diagnosa'),
      'jenis_kelamin'                                 =>  $this->input->post('jenis_kelamin'),
      'rencana_tindakan'                              =>  $this->input->post('rencana_tindakan'),
      'ruangan'                                       =>  $this->input->post('ruangan'),
      'riwayat_anestesi1'                             =>  $this->input->post('riwayat_anestesi1'),
      'riwayat_anestesi2'                             =>  $this->input->post('riwayat_anestesi2'),
      'tidak_pernah_anestesi'                         =>  $this->input->post('tidak_pernah_anestesi'),
      'batuk'                                         =>  $this->input->post('batuk'),
      'pilek'                                         =>  $this->input->post('pilek'),
      'demam'                                         =>  $this->input->post('demam'),
      'gejala_lain'                                   =>  $this->input->post('gejala_lain'),
      'desc_gejala_lain'                              =>  $this->input->post('desc_gejala_lain'),
      'alergi'                                        =>  $this->input->post('alergi'),
      'tidak_ada_alergi'                              =>  $this->input->post('tidak_ada_alergi'),
      'kompilkasi_anestesi_sebelumnya'                =>  $this->input->post('kompilkasi_anestesi_sebelumnya'),
      'tidak_pernah_kompilkasi_anestesi_sebelumnya'   =>  $this->input->post('tidak_pernah_kompilkasi_anestesi_sebelumnya'),
      'riwayat_komplikasi_anestesi_dalam_keluarga'    =>  $this->input->post('riwayat_komplikasi_anestesi_dalam_keluarga'),
      'tidak_ada_komplikasi_anestesi_dalam_keluarga'  =>  $this->input->post('tidak_ada_komplikasi_anestesi_dalam_keluarga'),
      'asma'                                          =>  $this->input->post('asma'),
      'hipertensi'                                    =>  $this->input->post('hipertensi'),
      'dm'                                            =>  $this->input->post('dm'),
      'penyakit_jantung'                              =>  $this->input->post('penyakit_jantung'),
      'penyakit_lain'                                 =>  $this->input->post('penyakit_lain'),
      'desc_penyakit_lain'                            =>  $this->input->post('desc_penyakit_lain'),
      'merokok'                                       =>  $this->input->post('merokok'),
      'batang_rokok'                                  =>  $this->input->post('batang_rokok'),
      'merokok_per_tahun'                             =>  $this->input->post('merokok_per_tahun'),
      'alkohol'                                       =>  $this->input->post('alkohol'),
      'frekuensi'                                     =>  $this->input->post('frekuensi'),
      'jamu'                                          =>  $this->input->post('jamu'),
      'desc_ya_jamu'                                  =>  $this->input->post('desc_ya_jamu'),
      'herbal'                                        =>  $this->input->post('herbal'),
      'desc_ya_herbal'                                =>  $this->input->post('desc_ya_herbal'),
      'keadan_umum'                                   =>  $this->input->post('keadan_umum'),
      'desc_tidak_baik'                               =>  $this->input->post('desc_tidak_baik'),
      'desc_gcs'                                      =>  $this->input->post('desc_gcs'),
      'pilih_gcs'                                     =>  $this->input->post('pilih_gcs'),
      'gds'                                           =>  $this->input->post('gds'),
      'td'                                            =>  $this->input->post('td'),
      'hr'                                            =>  $this->input->post('hr'),
      'rr'                                            =>  $this->input->post('rr'),
      'suhu'                                          =>  $this->input->post('suhu'),
      'vas'                                           =>  $this->input->post('vas'),
      'tb'                                            =>  $this->input->post('tb'),
      'bb'                                            =>  $this->input->post('bb'),
      'edema'                                         =>  $this->input->post('edema'),
      'malformasi_mandibula'                          =>  $this->input->post('malformasi_mandibula'),
      'gigi_ompong'                                   =>  $this->input->post('gigi_ompong'),
      'maag'                                          =>  $this->input->post('maag'),
      'suara_serak'                                   =>  $this->input->post('suara_serak'),
      'gigi_palsu'                                    =>  $this->input->post('gigi_palsu'),
      'deviasi_trakea'                                =>  $this->input->post('deviasi_trakea'),
      'gigi_tonggos'                                  =>  $this->input->post('gigi_tonggos'),
      'makroglossi'                                   =>  $this->input->post('makroglossi'),
      'mikrotia'                                      =>  $this->input->post('mikrotia'),
      'dalam_batas_normal'                            =>  $this->input->post('dalam_batas_normal'),
      'janggut_kumis'                                 =>  $this->input->post('janggut_kumis'),
      'evaluasi_jalan_nafas_lain'                     =>  $this->input->post('evaluasi_jalan_nafas_lain'),
      'desc_evaluasi_jalan_nafas_lain'                =>  $this->input->post('desc_evaluasi_jalan_nafas_lain'),
      'buka_mulut_3_cm'                               =>  $this->input->post('buka_mulut_3_cm'),
      'mallampati'                                    =>  $this->input->post('mallampati'),
      'thyromental'                                   =>  $this->input->post('thyromental'),
      'upper_up_bite_test_class'                      =>  $this->input->post('upper_up_bite_test_class'),
      'status_gizi'                                   =>  $this->input->post('status_gizi'),
      'konjungtiva'                                   =>  $this->input->post('konjungtiva'),
      'sklera'                                        =>  $this->input->post('sklera'),
      'bibir'                                         =>  $this->input->post('bibir'),
      'massa_tumor_kepala'                            =>  $this->input->post('massa_tumor_kepala'),
      'metris'                                        =>  $this->input->post('metris'),
      'posisi'                                        =>  $this->input->post('posisi'),
      'bn'                                            =>  $this->input->post('bn'),
      'ronkhl'                                        =>  $this->input->post('ronkhl'),
      'wheezing'                                      =>  $this->input->post('wheezing'),
      'lain_thoraks'                                  =>  $this->input->post('lain_thoraks'),
      'massa_tumor_thoraks'                           =>  $this->input->post('massa_tumor_thoraks'),
      'reguler'                                       =>  $this->input->post('reguler'),
      'bunyi_jantung'                                 =>  $this->input->post('bunyi_jantung'),
      'datar'                                         =>  $this->input->post('datar'),
      'distensi'                                      =>  $this->input->post('distensi'),
      'supple'                                        =>  $this->input->post('supple'),
      'cembung'                                       =>  $this->input->post('cembung'),
      'ascites'                                       =>  $this->input->post('ascites'),
      'defans_muskuler'                               =>  $this->input->post('defans_muskuler'),
      'hepar_or_lien'                                 =>  $this->input->post('hepar_or_lien'),
      'teraba_or_tidak'                               =>  $this->input->post('teraba_or_tidak'),
      'desc_teraba'                                   =>  $this->input->post('desc_teraba'),
      'massa_tumor_abdomen'                           =>  $this->input->post('massa_tumor_abdomen'),
      'urogenital'                                    =>  $this->input->post('urogenital'),
      'des_urogenital_lainnya'                        =>  $this->input->post('des_urogenital_lainnya'),
      'keteter_urin'                                  =>  $this->input->post('keteter_urin'),
      'warna_urin'                                    =>  $this->input->post('warna_urin'),
      'warna_urin_lainnya'                            =>  $this->input->post('warna_urin_lainnya'),
      'volume_urine'                                  =>  $this->input->post('volume_urine'),
      'volume_urine_lain'                             =>  $this->input->post('volume_urine_lain'),
      'dbn_ekstremitras'                              =>  $this->input->post('dbn_ekstremitras'),
      'edema_ekstremitas'                             =>  $this->input->post('edema_ekstremitas'),
      'desc_edema'                                    =>  $this->input->post('desc_edema'),
      'fraktur'                                       =>  $this->input->post('fraktur'),
      'desc_fraktur'                                  =>  $this->input->post('desc_fraktur'),
      'lainnya_ekstremitras'                          =>  $this->input->post('lainnya_ekstremitras'),
      'desc_lainnya_ekstremitras'                     =>  $this->input->post('desc_lainnya_ekstremitras'),
      'pemeriksaan_laboratorium'                      =>  $this->input->post('pemeriksaan_laboratorium'),
      'ekg'                                           =>  $this->input->post('ekg'),
      'ro'                                            =>  $this->input->post('ro'),
      'pemeriksaan_penunjang_lainnya'                 =>  $this->input->post('pemeriksaan_penunjang_lainnya'),
      'asa_ps'                                        =>  $this->input->post('asa_ps'),
      'masalah_diagnosis'                             =>  $this->input->post('masalah_diagnosis'),
      'penatalaksan_anestesi'                         =>  $this->input->post('penatalaksan_anestesi'),
      'rencana_usulan_tindakan'                       =>  $this->input->post('rencana_usulan_tindakan'),
      'intruksi'                                      =>  $this->input->post('intruksi'),
      'puasa'                                         =>  $this->input->post('puasa'),
      'pre_op'                                        =>  $this->input->post('pre_op'),
      'jam_rencana_tiba_di_ok'                        =>  $this->input->post('jam_rencana_tiba_di_ok'),
      'tanggal_rencana_tiba_di_ok'                    =>  $this->input->post('tanggal_rencana_tiba_di_ok'),
      'jam_rencana_operasi'                           =>  $this->input->post('jam_rencana_operasi'),
      'tanggal_rencana_operasi'                       =>  $this->input->post('tanggal_rencana_operasi'),
      'injeksi_antibiotik'                             => $this->input->post('injeksi_antibiotik'),
      'persiapan_darah'                                => $this->input->post('persiapan_darah'),
      'teknik_anestesi_dan_sedasi'                    =>  $this->input->post('teknik_anestesi_dan_sedasi'),
      'desc_sedasi'                                   =>  $this->input->post('desc_sedasi'),
      'anestesi_umum'                                 =>  $this->input->post('anestesi_umum'),
      'ga_tiva'                                       =>  $this->input->post('ga_tiva'),
      'ga_facemask'                                   =>  $this->input->post('ga_facemask'),
      'ga_lima'                                       =>  $this->input->post('ga_lima'),
      'geta'                                          =>  $this->input->post('geta'),
      'gani'                                          =>  $this->input->post('gani'),
      'anestesi_regional'                             =>  $this->input->post('anestesi_regional'),
      'sab'                                           =>  $this->input->post('sab'),
      'epirdural_regional'                            =>  $this->input->post('epirdural_regional'),
      'cse'                                           =>  $this->input->post('cse'),
      'cega'                                          =>  $this->input->post('cega'),
      'hipotensi_kendali'                             =>  $this->input->post('hipotensi_kendali'),
      'lainnya_teknik_khusus'                         =>  $this->input->post('lainnya_teknik_khusus'),
      'ekg_monitoring'                                =>  $this->input->post('ekg_monitoring'),
      'desc_ekg'                                      =>  $this->input->post('desc_ekg'),
      'nibp'                                          =>  $this->input->post('nibp'),
      'spo'                                           =>  $this->input->post('spo'),
      'temp_et_co'                                    =>  $this->input->post('temp_et_co'),
      'cvp'                                           =>  $this->input->post('cvp'),
      'art_line'                                      =>  $this->input->post('art_line'),
      'lainnya_monitoring'                            =>  $this->input->post('lainnya_monitoring'),
      'iv'                                            =>  $this->input->post('iv'),
      'epirdural_kontrol'                             =>  $this->input->post('epirdural_kontrol'),
      'lainnya_kontrol_nyeri'                         =>  $this->input->post('lainnya_kontrol_nyeri'),
      'des_lainnya_kontrol_nyeri'                     =>  $this->input->post('des_lainnya_kontrol_nyeri'),
      'rawat_jalan'                                   =>  $this->input->post('rawat_jalan'),
      'rawat_inap'                                    =>  $this->input->post('rawat_inap'),
      'hcu'                                           =>  $this->input->post('hcu'),
      'icu'                                           =>  $this->input->post('icu'),
      'nicu'                                          =>  $this->input->post('nicu'),
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
      'approved_petugas'                               => $result['approved_petugas'],
      'tanggal'                                        => $result['notes']['tanggal'],
      'jam'                                            => $result['notes']['jam'],
      'nama_pasien'                                    => $result['notes']['nama_pasien'],
      'no_rm'                                          => $result['notes']['no_rm'],
      'ttl'                                            => $result['notes']['ttl'],
      'diagnosa'                                       => $result['notes']['diagnosa'],
      'jenis_kelamin'                                  => $result['notes']['jenis_kelamin'],
      'rencana_tindakan'                               => $result['notes']['rencana_tindakan'],
      'ruangan'                                        => $result['notes']['ruangan'],
      'riwayat_anestesi1'                              => $result['notes']['riwayat_anestesi1'],
      'riwayat_anestesi2'                              => $result['notes']['riwayat_anestesi2'],
      'tidak_pernah_anestesi'                          => $result['notes']['tidak_pernah_anestesi'],
      'batuk'                                          => $result['notes']['batuk'],
      'pilek'                                          => $result['notes']['pilek'],
      'demam'                                          => $result['notes']['demam'],
      'gejala_lain'                                    => $result['notes']['gejala_lain'],
      'desc_gejala_lain'                               => $result['notes']['desc_gejala_lain'],
      'alergi'                                         => $result['notes']['alergi'],
      'tidak_ada_alergi'                               => $result['notes']['tidak_ada_alergi'],
      'kompilkasi_anestesi_sebelumnya'                 => $result['notes']['kompilkasi_anestesi_sebelumnya'],
      'tidak_pernah_kompilkasi_anestesi_sebelumnya'    => $result['notes']['tidak_pernah_kompilkasi_anestesi_sebelumnya'],
      'riwayat_komplikasi_anestesi_dalam_keluarga'     => $result['notes']['riwayat_komplikasi_anestesi_dalam_keluarga'],
      'tidak_ada_komplikasi_anestesi_dalam_keluarga'   => $result['notes']['tidak_ada_komplikasi_anestesi_dalam_keluarga'],
      'asma'                                           => $result['notes']['asma'],
      'hipertensi'                                     => $result['notes']['hipertensi'],
      'dm'                                             => $result['notes']['dm'],
      'maag'                                             => $result['notes']['maag'],
      'penyakit_jantung'                               => $result['notes']['penyakit_jantung'],
      'penyakit_lain'                                  => $result['notes']['penyakit_lain'],
      'desc_penyakit_lain'                             => $result['notes']['desc_penyakit_lain'],
      'merokok'                                        => $result['notes']['merokok'],
      'batang_rokok'                                   => $result['notes']['batang_rokok'],
      'merokok_per_tahun'                              => $result['notes']['merokok_per_tahun'],
      'alkohol'                                        => $result['notes']['alkohol'],
      'frekuensi'                                      => $result['notes']['frekuensi'],
      'jamu'                                           => $result['notes']['jamu'],
      'desc_ya_jamu'                                   => $result['notes']['desc_ya_jamu'],
      'herbal'                                         => $result['notes']['herbal'],
      'desc_ya_herbal'                                 => $result['notes']['desc_ya_herbal'],
      'keadan_umum'                                    => $result['notes']['keadan_umum'],
      'desc_tidak_baik'                                => $result['notes']['desc_tidak_baik'],
      'desc_gcs'                                       => $result['notes']['desc_gcs'],
      'pilih_gcs'                                      => $result['notes']['pilih_gcs'],
      'gds'                                            => $result['notes']['gds'],
      'td'                                             => $result['notes']['td'],
      'hr'                                             => $result['notes']['hr'],
      'rr'                                             => $result['notes']['rr'],
      'suhu'                                           => $result['notes']['suhu'],
      'vas'                                            => $result['notes']['vas'],
      'tb'                                             => $result['notes']['tb'],
      'bb'                                             => $result['notes']['bb'],
      'edema'                                          => $result['notes']['edema'],
      'malformasi_mandibula'                           => $result['notes']['malformasi_mandibula'],
      'gigi_ompong'                                    => $result['notes']['gigi_ompong'],
      'suara_serak'                                    => $result['notes']['suara_serak'],
      'gigi_palsu'                                     => $result['notes']['gigi_palsu'],
      'deviasi_trakea'                                 => $result['notes']['deviasi_trakea'],
      'gigi_tonggos'                                   => $result['notes']['gigi_tonggos'],
      'makroglossi'                                    => $result['notes']['makroglossi'],
      'mikrotia'                                       => $result['notes']['mikrotia'],
      'dalam_batas_normal'                             => $result['notes']['dalam_batas_normal'],
      'janggut_kumis'                                  => $result['notes']['janggut_kumis'],
      'evaluasi_jalan_nafas_lain'                      => $result['notes']['evaluasi_jalan_nafas_lain'],
      'desc_evaluasi_jalan_nafas_lain'                 => $result['notes']['desc_evaluasi_jalan_nafas_lain'],
      'buka_mulut_3_cm'                                => $result['notes']['buka_mulut_3_cm'],
      'mallampati'                                     => $result['notes']['mallampati'],
      'thyromental'                                    => $result['notes']['thyromental'],
      'upper_up_bite_test_class'                       => $result['notes']['upper_up_bite_test_class'],
      'status_gizi'                                    => $result['notes']['status_gizi'],
      'konjungtiva'                                    => $result['notes']['konjungtiva'],
      'sklera'                                         => $result['notes']['sklera'],
      'bibir'                                          => $result['notes']['bibir'],
      'massa_tumor_kepala'                             => $result['notes']['massa_tumor_kepala'],
      'metris'                                         => $result['notes']['metris'],
      'posisi'                                         => $result['notes']['posisi'],
      'bn'                                             => $result['notes']['bn'],
      'ronkhl'                                         => $result['notes']['ronkhl'],
      'wheezing'                                       => $result['notes']['wheezing'],
      'lain_thoraks'                                   => $result['notes']['lain_thoraks'],
      'massa_tumor_thoraks'                            => $result['notes']['massa_tumor_thoraks'],
      'reguler'                                        => $result['notes']['reguler'],
      'bunyi_jantung'                                  => $result['notes']['bunyi_jantung'],
      'datar'                                          => $result['notes']['datar'],
      'distensi'                                       => $result['notes']['distensi'],
      'supple'                                         => $result['notes']['supple'],
      'cembung'                                        => $result['notes']['cembung'],
      'ascites'                                        => $result['notes']['ascites'],
      'defans_muskuler'                                => $result['notes']['defans_muskuler'],
      'hepar_or_lien'                                  => $result['notes']['hepar_or_lien'],
      'teraba_or_tidak'                                => $result['notes']['teraba_or_tidak'],
      'desc_teraba'                                    => $result['notes']['desc_teraba'],
      'massa_tumor_abdomen'                            => $result['notes']['massa_tumor_abdomen'],
      'urogenital'                                     => $result['notes']['urogenital'],
      'des_urogenital_lainnya'                         => $result['notes']['des_urogenital_lainnya'],
      'keteter_urin'                                   => $result['notes']['keteter_urin'],
      'warna_urin'                                     => $result['notes']['warna_urin'],
      'warna_urin_lainnya'                             => $result['notes']['warna_urin_lainnya'],
      'volume_urine'                                   => $result['notes']['volume_urine'],
      'volume_urine_lain'                              => $result['notes']['volume_urine_lain'],
      'dbn_ekstremitras'                               => $result['notes']['dbn_ekstremitras'],
      'edema_ekstremitas'                              => $result['notes']['edema_ekstremitas'],
      'desc_edema'                                     => $result['notes']['desc_edema'],
      'fraktur'                                        => $result['notes']['fraktur'],
      'desc_fraktur'                                   => $result['notes']['desc_fraktur'],
      'lainnya_ekstremitras'                           => $result['notes']['lainnya_ekstremitras'],
      'desc_lainnya_ekstremitras'                      => $result['notes']['desc_lainnya_ekstremitras'],
      'pemeriksaan_laboratorium'                       => $result['notes']['pemeriksaan_laboratorium'],
      'ekg'                                            => $result['notes']['ekg'],
      'ro'                                             => $result['notes']['ro'],
      'pemeriksaan_penunjang_lainnya'                  => $result['notes']['pemeriksaan_penunjang_lainnya'],
      'asa_ps'                                         => $result['notes']['asa_ps'],
      'masalah_diagnosis'                              => $result['notes']['masalah_diagnosis'],
      'penatalaksan_anestesi'                          => $result['notes']['penatalaksan_anestesi'],
      'rencana_usulan_tindakan'                        => $result['notes']['rencana_usulan_tindakan'],
      'intruksi'                                       => $result['notes']['intruksi'],
      'puasa'                                          => $result['notes']['puasa'],
      'pre_op'                                         => $result['notes']['pre_op'],
      'jam_rencana_tiba_di_ok'                         => $result['notes']['jam_rencana_tiba_di_ok'],
      'tanggal_rencana_tiba_di_ok'                     => $result['notes']['tanggal_rencana_tiba_di_ok'],
      'jam_rencana_operasi'                            => $result['notes']['jam_rencana_operasi'],
      'tanggal_rencana_operasi'                        => $result['notes']['tanggal_rencana_operasi'],
      'injeksi_antibiotik'                             => $result['notes']['injeksi_antibiotik'],
      'persiapan_darah'                                => $result['notes']['persiapan_darah'],
      'teknik_anestesi_dan_sedasi'                     => $result['notes']['teknik_anestesi_dan_sedasi'],
      'desc_sedasi'                                    => $result['notes']['desc_sedasi'],
      'anestesi_umum'                                  => $result['notes']['anestesi_umum'],
      'ga_tiva'                                        => $result['notes']['ga_tiva'],
      'ga_facemask'                                    => $result['notes']['ga_facemask'],
      'ga_lima'                                        => $result['notes']['ga_lima'],
      'geta'                                           => $result['notes']['geta'],
      'gani'                                           => $result['notes']['gani'],
      'anestesi_regional'                              => $result['notes']['anestesi_regional'],
      'sab'                                            => $result['notes']['sab'],
      'epirdural_regional'                             => $result['notes']['epirdural_regional'],
      'cse'                                            => $result['notes']['cse'],
      'cega'                                           => $result['notes']['cega'],
      'hipotensi_kendali'                              => $result['notes']['hipotensi_kendali'],
      'lainnya_teknik_khusus'                          => $result['notes']['lainnya_teknik_khusus'],
      'ekg_monitoring'                                 => $result['notes']['ekg_monitoring'],
      'desc_ekg'                                       => $result['notes']['desc_ekg'],
      'nibp'                                           => $result['notes']['nibp'],
      'spo'                                            => $result['notes']['spo'],
      'temp_et_co'                                     => $result['notes']['temp_et_co'],
      'cvp'                                            => $result['notes']['cvp'],
      'art_line'                                       => $result['notes']['art_line'],
      'lainnya_monitoring'                             => $result['notes']['lainnya_monitoring'],
      'iv'                                             => $result['notes']['iv'],
      'epirdural_kontrol'                              => $result['notes']['epirdural_kontrol'],
      'lainnya_kontrol_nyeri'                          => $result['notes']['lainnya_kontrol_nyeri'],
      'des_lainnya_kontrol_nyeri'                      => $result['notes']['des_lainnya_kontrol_nyeri'],
      'rawat_jalan'                                    => $result['notes']['rawat_jalan'],
      'rawat_inap'                                     => $result['notes']['rawat_inap'],
      'hcu'                                            => $result['notes']['hcu'],
      'icu'                                            => $result['notes']['icu'],
      'nicu'                                           => $result['notes']['nicu'],
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
