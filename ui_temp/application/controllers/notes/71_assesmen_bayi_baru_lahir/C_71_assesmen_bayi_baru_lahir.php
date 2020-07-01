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
class C_71_assesmen_bayi_baru_lahir extends CI_Controller
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
    $this->id_ref_global_tipe_42 = 71;
    
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
    $this->c_folder = "C_71_assesmen_bayi_baru_lahir"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

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
      'title'   => 'Notes Fisioterapi Asesment',
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
            'tanggal'                     => $jdata['notes']['tanggal'],
            'jam'                         => $jdata['notes']['jam'],
            'rekam_medik_no'              => $jdata['notes']['rekam_medik_no'],
            'nama'                        => $jdata['notes']['nama'],
            'pening_no'                   => $jdata['notes']['pening_no'],
            'dokter_kebidanan'            => $jdata['notes']['dokter_kebidanan'],
            'dokter_anak'                 => $jdata['notes']['dokter_anak'],
            'nama_ibu'                    => $jdata['notes']['nama_ibu'],
            'nama_ayah'                   => $jdata['notes']['nama_ayah'],
            'penyakit_ibu'                => $jdata['notes']['penyakit_ibu'],
            'sakit_lain'                  => $jdata['notes']['sakit_lain'],
            'agama'                       => $jdata['notes']['agama'],
            'goldar_bayi'                 => $jdata['notes']['goldar_bayi'],
            'goldar_ibu'                  => $jdata['notes']['goldar_ibu'],
            'goldar_ayah'                 => $jdata['notes']['goldar_ayah'],
            'vdrl'                        => $jdata['notes']['vdrl'],
            'titer_antibodi'              => $jdata['notes']['titer_antibodi'],
            'alamat'                      => $jdata['notes']['alamat'],
            'telpon'                      => $jdata['notes']['telpon'],
            'tahun1'                      => $jdata['notes']['tahun1'],
            'tahun2'                      => $jdata['notes']['tahun2'],
            'tahun3'                      => $jdata['notes']['tahun3'],
            'tahun4'                      => $jdata['notes']['tahun4'],
            'riwayat_kehamilan1'          => $jdata['notes']['riwayat_kehamilan1'],
            'riwayat_kehamilan2'          => $jdata['notes']['riwayat_kehamilan2'],
            'riwayat_kehamilan3'          => $jdata['notes']['riwayat_kehamilan3'],
            'riwayat_kehamilan4'          => $jdata['notes']['riwayat_kehamilan4'],
            'ketuban_pecah_tgl'           => $jdata['notes']['ketuban_pecah_tgl'],
            'ketuban_pecah_jam'           => $jdata['notes']['ketuban_pecah_jam'],
            'ketuban_pecah_warna'         => $jdata['notes']['ketuban_pecah_warna'],
            'bayi_dilahirkan_dengan'      => $jdata['notes']['bayi_dilahirkan_dengan'],
            'indikasi'                    => $jdata['notes']['indikasi'],
            'kala1'                       => $jdata['notes']['kala1'],
            'kala2'                       => $jdata['notes'][''],
            'tanda_gawat_janin'           => $jdata['notes']['tanda_gawat_janin'],
            'denyut_jantung_bayi'         => $jdata['notes']['denyut_jantung_bayi'],
            'obat_selama_hamil'           => $jdata['notes']['obat_selama_hamil'],
            'anestesia'                   => $jdata['notes']['anestesia'],
            'bayi_lahir_tgl'              => $jdata['notes']['bayi_lahir_tgl'],
            'bayi_lahir_jam'              => $jdata['notes']['bayi_lahir_jam'],
            'bayi_kelamin'                => $jdata['notes']['bayi_kelamin'],
            'bayi_bb'                     => $jdata['notes']['bayi_bb'],
            'bayi_panjang'                => $jdata['notes']['bayi_panjang'],
            'bayi_lingkar_kepala'         => $jdata['notes']['bayi_lingkar_kepala'],
            'bayi_lingkar_dada'           => $jdata['notes']['bayi_lingkar_dada'],
            'masa_gestasi'                => $jdata['notes']['masa_gestasi'],
           'urin'                         => $jdata['notes']['urin'],
            'mekonium'                    => $jdata['notes']['mekonium'],
            'plasenta'                    => $jdata['notes']['plasenta'],
            'tali_pusat'                  => $jdata['notes']['tali_pusat'],
            'resusitasi'                  => $jdata['notes']['resusitasi'],
            'obat_obatan'                 => $jdata['notes']['obat_obatan'],
            'dosis'                       => $jdata['notes']['dosis'],
            
            'dari_menitke_intubasi'       => $jdata['notes']['dari_menitke_intubasi'],
            'sd_menitke_intubasi'         => $jdata['notes']['sd_menitke_intubasi'],
            
            'dari_menitke_bagging'        => $jdata['notes']['dari_menitke_bagging'],
            'sd_menitke_bagging'          => $jdata['notes']['sd_menitke_bagging'],
            
            'dari_menitke_pijat_jantung'  => $jdata['notes']['dari_menitke_pijat_jantung'],
            'sd_menitke_pijat_jantung'    => $jdata['notes']['sd_menitke_pijat_jantung'],
            'lainlain'                    => $jdata['notes']['lainlain'],
            'jelaskan'                    => $jdata['notes']['jelaskan'],
            'frek_jantung'                => $jdata['notes']['frek_jantung'],
            'usaha_nafas'                 => $jdata['notes']['usaha_nafas'],
            'tonus_otot'                  => $jdata['notes']['tonus_otot'],
            'reflek'                      => $jdata['notes']['reflek'],
            'warna_kulit'                 => $jdata['notes']['warna_kulit'],
            'menit'                       => $jdata['notes']['menit'],
            'nilai_apgar'                 => $jdata['notes']['nilai_apgar'],
            'nafas_pertama'               => $jdata['notes']['nafas_pertama'],
            'nafas_spontan'               => $jdata['notes']['nafas_spontan'],
            'waktu_sd_menangis'           => $jdata['notes']['waktu_sd_menangis'],
            'keadaan_umum'                => $jdata['notes']['keadaan_umum'],
            'sianosis'                    => $jdata['notes']['sianosis'],
            'ikterus_kuning'              => $jdata['notes']['ikterus_kuning'],
            'ssp_tonus'                   => $jdata['notes']['ssp_tonus'],
            'kepala_leher_palatum'        => $jdata['notes']['kepala_leher_palatum'],
            'ubun_ubun'                   => $jdata['notes']['ubun_ubun'],
            'paru'                        => $jdata['notes']['paru'],
            'jantung'                     => $jdata['notes']['jantung'],
            'abdomen'                     => $jdata['notes']['abdomen'],
            'kelamin'                     => $jdata['notes']['kelamin'],
            'kulit'                       => $jdata['notes']['kulit'],
            'ekstremitas'                 => $jdata['notes']['ekstremitas'],
            'panggul'                     => $jdata['notes']['panggul'],
            'catatan'                     => $jdata['notes']['catatan'],
            'diagnosis'                   => $jdata['notes']['diagnosis'],
            'penatalaksanaan'             => $jdata['notes']['penatalaksanaan'],
            'inisiasi'                    => $jdata['notes']['inisiasi'],
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
      'rekam_medik_no'                      =>  $this->input->post('rekam_medik_no'),
      'nama'                                =>  $this->input->post('nama'),
      'pening_no'                           =>  $this->input->post('pening_no'),
      'dokter_kebidanan'                    =>  $this->input->post('dokter_kebidanan'),
      'dokter_anak'                         =>  $this->input->post('dokter_anak'),
      'nama_ibu'                            =>  $this->input->post('nama_ibu'),
      'nama_ayah'                           =>  $this->input->post('nama_ayah'),
      'penyakit_ibu'                        =>  $this->input->post('penyakit_ibu'),
      'sakit_lain'                          =>  $this->input->post('sakit_lain'),
      'agama'                               =>  $this->input->post('agama'),
      'goldar_bayi'                         =>  $this->input->post('goldar_bayi'),
      'goldar_ibu'                          =>  $this->input->post('goldar_ibu'),
      'goldar_ayah'                         =>  $this->input->post('goldar_ayah'),
      'vdrl'                                =>  $this->input->post('vdrl'),
      'titer_antibodi'                      =>  $this->input->post('titer_antibodi'),
      'alamat'                              =>  $this->input->post('alamat'),
      'telpon'                              =>  $this->input->post('telpon'),
      'tahun1'                              =>  $this->input->post('tahun1'),
      'riwayat_kehamilan1'                  =>  $this->input->post('riwayat_kehamilan1'),
      'tahun2'                              =>  $this->input->post('tahun2'),
      'riwayat_kehamilan2'                  =>  $this->input->post('riwayat_kehamilan2'),
      'tahun3'                              =>  $this->input->post('tahun3'),
      'riwayat_kehamilan3'                  =>  $this->input->post('riwayat_kehamilan3'),
      'tahun4'                              =>  $this->input->post('tahun4'),
      'riwayat_kehamilan4'                  =>  $this->input->post('riwayat_kehamilan4'),
      'ketuban_pecah_tgl'                   =>  $this->input->post('ketuban_pecah_tgl'),
      'ketuban_pecah_warna'                 =>  $this->input->post('ketuban_pecah_warna'),
      'bayi_dilahirkan_dengan'              =>  $this->input->post('bayi_dilahirkan_dengan'),
      'indikasi'                            =>  $this->input->post('indikasi'),
      'kala1'                               =>  $this->input->post('kala1'),
      'kala2'                               =>  $this->input->post('kala2'),
      'tanda_gawat_janin'                   =>  $this->input->post('tanda_gawat_janin'),
      'denyut_jantung_bayi'                 =>  $this->input->post('denyut_jantung_bayi'),
      'anestesia'                           =>  $this->input->post('anestesia'),
      'obat_selama_hamil'                   =>  $this->input->post('obat_selama_hamil'),
      'bayi_lahir_tgl'                      =>  $this->input->post('bayi_lahir_tgl'),
      'bayi_lahir_jam'                      =>  $this->input->post('bayi_lahir_jam'),
      'bayi_kelamin'                        =>  $this->input->post('bayi_kelamin'),
      'bayi_bb'                             =>  $this->input->post('bayi_bb'),
      'bayi_panjang'                        =>  $this->input->post('bayi_panjang'),
      'bayi_lingkar_kepala'                 =>  $this->input->post('bayi_lingkar_kepala'),
      'bayi_lingkar_dada'                   =>  $this->input->post('bayi_lingkar_dada'),
      'masa_gestasi'                        =>  $this->input->post('masa_gestasi'),
      'urin'                                =>  $this->input->post('urin'),
      'mekonium'                            =>  $this->input->post('mekonium'),
      'plasenta'                            =>  $this->input->post('plasenta'),
      'tali_pusat'                          =>  $this->input->post('tali_pusat'),
      'resusitasi'                          =>  $this->input->post('resusitasi'),
      'obat_obatan'                         =>  $this->input->post('obat_obatan'),
      'dosis'                               =>  $this->input->post('dosis'),
      'intubasi'                            =>  $this->input->post('intubasi'),
      'dari_menitke_intubasi'               =>  $this->input->post('dari_menitke_intubasi'),
      'sd_menitke_intubasi'                 =>  $this->input->post('sd_menitke_intubasi'),
      'bagging'                             =>  $this->input->post('bagging'),
      'dari_menitke_bagging'                =>  $this->input->post('dari_menitke_bagging'),
      'sd_menitke_bagging'                  =>  $this->input->post('sd_menitke_bagging'),
      'pijat_jantung'                       =>  $this->input->post('pijat_jantung'),
      'dari_menitke_pijat_jantung'          =>  $this->input->post('dari_menitke_pijat_jantung'),
      'sd_menitke_pijat_jantung'            =>  $this->input->post('sd_menitke_pijat_jantung'),
      'lainlain'                            =>  $this->input->post('lainlain'),
      'jelaskan'                            =>  $this->input->post('jelaskan'),
      'frek_jantung'                        =>  $this->input->post('frek_jantung'),
      'usaha_nafas'                         =>  $this->input->post('usaha_nafas'),
      'tonus_otot'                          =>  $this->input->post('tonus_otot'),
      'reflek'                              =>  $this->input->post('reflek'),
      'warna_kulit'                         =>  $this->input->post('warna_kulit'),
      'menit'                               =>  $this->input->post('menit'),
      'nilai_apgar'                         =>  $this->input->post('nilai_apgar'),
      'nafas_pertama'                       =>  $this->input->post('nafas_pertama'),
      'nafas_spontan'                       =>  $this->input->post('nafas_spontan'),
      'waktu_sd_menangis'                   =>  $this->input->post('waktu_sd_menangis'),
      'keadaan_umum'                        =>  $this->input->post('keadaan_umum'),
      'sianosis'                            =>  $this->input->post('sianosis'),
      'ikterus_kuning'                      =>  $this->input->post('ikterus_kuning'),
      'ssp_tonus'                           =>  $this->input->post('ssp_tonus'),
      'kepala_leher_palatum'                =>  $this->input->post('kepala_leher_palatum'),
      'ubun_ubun'                           =>  $this->input->post('ubun_ubun'),
      'paru'                                =>  $this->input->post('paru'),
      'jantung'                             =>  $this->input->post('jantung'),
      'abdomen'                             =>  $this->input->post('abdomen'),
      'kelamin'                             =>  $this->input->post('kelamin'),
      'kulit'                               =>  $this->input->post('kulit'),
      'ekstremitas'                         =>  $this->input->post('ekstremitas'),
      'catatan'                             =>  $this->input->post('catatan'),
      'diagnosis'                           =>  $this->input->post('diagnosis'),
      'penatalaksanaan'                     =>  $this->input->post('penatalaksanaan'),
      'inisiasi'                            =>  $this->input->post('inisiasi'),
      
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
            'approved_petugas'                => $result['approved_petugas'],
            'tanggal'                         => $result['notes']['tanggal'],
            'jam'                             => $result['notes']['jam'],
            'rekam_medik_no'                  => $result['notes']['rekam_medik_no'],
            'nama'                            => $result['notes']['nama'],
            'pening_no'                       => $result['notes']['pening_no'],
            'dokter_kebidanan'                => $result['notes']['dokter_kebidanan'],
            'dokter_anak'                     => $result['notes']['dokter_anak'],
            'nama_ibu'                        => $result['notes']['nama_ibu'],
            'nama_ayah'                       => $result['notes']['nama_ayah'],
            'penyakit_ibu'                    => $result['notes']['penyakit_ibu'],
            'sakit_lain'                      => $result['notes']['sakit_lain'],
            'agama'                           => $result['notes']['agama'],
            'goldar_bayi'                     => $result['notes']['goldar_bayi'],
            'goldar_ibu'                      => $result['notes']['goldar_ibu'],
            'goldar_ayah'                     => $result['notes']['goldar_ayah'],
            'vdrl'                            => $result['notes']['vdrl'],
            'titer_antibodi'                  => $result['notes']['titer_antibodi'],
            'alamat'                          => $result['notes']['alamat'],
            'telpon'                          => $result['notes']['telpon'],
            'tahun1'                          => $result['notes']['tahun1'],
            'tahun2'                          => $result['notes']['tahun2'],
            'tahun3'                          => $result['notes']['tahun3'],
            'tahun4'                          => $result['notes']['tahun4'],
            'riwayat_kehamilan1'              => $result['notes']['riwayat_kehamilan1'],
            'riwayat_kehamilan2'              => $result['notes']['riwayat_kehamilan2'],
            'riwayat_kehamilan3'              => $result['notes']['riwayat_kehamilan3'],
            'riwayat_kehamilan4'              => $result['notes']['riwayat_kehamilan4'],
            'ketuban_pecah_tgl'               => $result['notes']['ketuban_pecah_tgl'],
            'ketuban_pecah_warna'             => $result['notes']['ketuban_pecah_warna'],
            'bayi_dilahirkan_dengan'          => $result['notes']['bayi_dilahirkan_dengan'],
            'indikasi'                        => $result['notes']['indikasi'],
            'kala1'                           => $result['notes']['kala1'],
            'kala2'                           => $result['notes'][''],
            'tanda_gawat_janin'               => $result['notes']['tanda_gawat_janin'],
            'denyut_jantung_bayi'             => $result['notes']['denyut_jantung_bayi'],
            'obat_selama_hamil'               => $result['notes']['obat_selama_hamil'],
            'anestesia'                       => $result['notes']['anestesia'],
            'bayi_lahir_tgl'                  => $result['notes']['bayi_lahir_tgl'],
            'bayi_lahir_jam'                  => $result['notes']['bayi_lahir_jam'],
            'bayi_kelamin'                    => $result['notes']['bayi_kelamin'],
            'bayi_bb'                         => $result['notes']['bayi_bb'],
            'bayi_panjang'                    => $result['notes']['bayi_panjang'],
            'bayi_lingkar_kepala'             => $result['notes']['bayi_lingkar_kepala'],
            'bayi_lingkar_dada'               => $result['notes']['bayi_lingkar_dada'],
            'masa_gestasi'                    => $result['notes']['masa_gestasi'],
           'urin'                             => $result['notes']['urin'],
            'mekonium'                        => $result['notes']['mekonium'],
            'plasenta'                        => $result['notes']['plasenta'],
            'tali_pusat'                      => $result['notes']['tali_pusat'],
            'resusitasi'                      => $result['notes']['resusitasi'],
            'obat_obatan'                     => $result['notes']['obat_obatan'],
            'dosis'                           => $result['notes']['dosis'],
            'intubasi'                        => $result['notes']['intubasi'],
            'dari_menitke_intubasi'           => $result['notes']['dari_menitke_intubasi'],
            'sd_menitke_intubasi'             => $result['notes']['sd_menitke_intubasi'],
            'bagging'                         => $result['notes']['bagging'],
            'dari_menitke_bagging'            => $result['notes']['dari_menitke_bagging'],
            'sd_menitke_bagging'              => $result['notes']['sd_menitke_bagging'],
            'pijat_jantung'                   => $result['notes']['pijat_jantung'],
            'dari_menitke_pijat_jantung'      => $result['notes']['dari_menitke_pijat_jantung'],
            'sd_menitke_pijat_jantung'        => $result['notes']['sd_menitke_pijat_jantung'],
            'lainlain'                        => $result['notes']['lainlain'],
            'jelaskan'                        => $result['notes']['jelaskan'],
            'frek_jantung'                    => $result['notes']['frek_jantung'],
            'usaha_nafas'                     => $result['notes']['usaha_nafas'],
            'tonus_otot'                      => $result['notes']['tonus_otot'],
            'reflek'                          => $result['notes']['reflek'],
            'warna_kulit'                     => $result['notes']['warna_kulit'],
            'menit'                           => $result['notes']['menit'],
            'nilai_apgar'                     => $result['notes']['nilai_apgar'],
            'nafas_pertama'                   => $result['notes']['nafas_pertama'],
            'nafas_spontan'                   => $result['notes']['nafas_spontan'],
            'waktu_sd_menangis'               => $result['notes']['waktu_sd_menangis'],
            'keadaan_umum'                    => $result['notes']['keadaan_umum'],
            'sianosis'                        => $result['notes']['sianosis'],
            'ikterus_kuning'                  => $result['notes']['ikterus_kuning'],
            'ssp_tonus'                       => $result['notes']['ssp_tonus'],
            'kepala_leher_palatum'            => $result['notes']['kepala_leher_palatum'],
            'ubun_ubun'                       => $result['notes']['ubun_ubun'],
            'paru'                            => $result['notes']['paru'],
            'jantung'                         => $result['notes']['jantung'],
            'abdomen'                         => $result['notes']['abdomen'],
            'kelamin'                         => $result['notes']['kelamin'],
            'kulit'                           => $result['notes']['kulit'],
            'ekstremitas'                     => $result['notes']['ekstremitas'],
            'panggul'                         => $result['notes']['panggul'],
            'catatan'                         => $result['notes']['catatan'],
            'diagnosis'                       => $result['notes']['diagnosis'],
            'penatalaksanaan'                 => $result['notes']['penatalaksanaan'],
            'inisiasi'                        => $result['notes']['inisiasi'],
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
      'rekam_medik_no'                      =>  $this->input->post('rekam_medik_no'),
      'nama'                                =>  $this->input->post('nama'),
      'pening_no'                           =>  $this->input->post('pening_no'),
      'dokter_kebidanan'                    =>  $this->input->post('dokter_kebidanan'),
      'dokter_anak'                         =>  $this->input->post('dokter_anak'),
      'nama_ibu'                            =>  $this->input->post('nama_ibu'),
      'nama_ayah'                           =>  $this->input->post('nama_ayah'),
      'penyakit_ibu'                        =>  $this->input->post('penyakit_ibu'),
      'sakit_lain'                          =>  $this->input->post('sakit_lain'),
      'agama'                               =>  $this->input->post('agama'),
      'goldar_bayi'                         =>  $this->input->post('goldar_bayi'),
      'goldar_ibu'                          =>  $this->input->post('goldar_ibu'),
      'goldar_ayah'                         =>  $this->input->post('goldar_ayah'),
      'vdrl'                                =>  $this->input->post('vdrl'),
      'titer_antibodi'                      =>  $this->input->post('titer_antibodi'),
      'alamat'                              =>  $this->input->post('alamat'),
      'telpon'                              =>  $this->input->post('telpon'),
      'tahun1'                              =>  $this->input->post('tahun1'),
      'riwayat_kehamilan1'                  =>  $this->input->post('riwayat_kehamilan1'),
      'tahun2'                              =>  $this->input->post('tahun2'),
      'riwayat_kehamilan2'                  =>  $this->input->post('riwayat_kehamilan2'),
      'tahun3'                              =>  $this->input->post('tahun3'),
      'riwayat_kehamilan3'                  =>  $this->input->post('riwayat_kehamilan3'),
      'tahun4'                              =>  $this->input->post('tahun4'),
      'riwayat_kehamilan4'                  =>  $this->input->post('riwayat_kehamilan4'),
      'ketuban_pecah_tgl'                   =>  $this->input->post('ketuban_pecah_tgl'),
      'ketuban_pecah_warna'                 =>  $this->input->post('ketuban_pecah_warna'),
      'bayi_dilahirkan_dengan'              =>  $this->input->post('bayi_dilahirkan_dengan'),
      'indikasi'                            =>  $this->input->post('indikasi'),
      'kala1'                               =>  $this->input->post('kala1'),
      'kala2'                               =>  $this->input->post('kala2'),
      'tanda_gawat_janin'                   =>  $this->input->post('tanda_gawat_janin'),
      'denyut_jantung_bayi'                 =>  $this->input->post('denyut_jantung_bayi'),
      'anestesia'                           =>  $this->input->post('anestesia'),
      'obat_selama_hamil'                   =>  $this->input->post('obat_selama_hamil'),
      'bayi_lahir_tgl'                      =>  $this->input->post('bayi_lahir_tgl'),
      'bayi_lahir_jam'                      =>  $this->input->post('bayi_lahir_jam'),
      'bayi_kelamin'                        =>  $this->input->post('bayi_kelamin'),
      'bayi_bb'                             =>  $this->input->post('bayi_bb'),
      'bayi_panjang'                        =>  $this->input->post('bayi_panjang'),
      'bayi_lingkar_kepala'                 =>  $this->input->post('bayi_lingkar_kepala'),
      'bayi_lingkar_dada'                   =>  $this->input->post('bayi_lingkar_dada'),
      'masa_gestasi'                        =>  $this->input->post('masa_gestasi'),
      'urin'                                =>  $this->input->post('urin'),
      'mekonium'                            =>  $this->input->post('mekonium'),
      'plasenta'                            =>  $this->input->post('plasenta'),
      'tali_pusat'                          =>  $this->input->post('tali_pusat'),
      'resusitasi'                          =>  $this->input->post('resusitasi'),
      'obat_obatan'                         =>  $this->input->post('obat_obatan'),
      'dosis'                               =>  $this->input->post('dosis'),
      'intubasi'                            =>  $this->input->post('intubasi'),
      'dari_menitke_intubasi'               =>  $this->input->post('dari_menitke_intubasi'),
      'sd_menitke_intubasi'                 =>  $this->input->post('sd_menitke_intubasi'),
      'bagging'                             =>  $this->input->post('bagging'),
      'dari_menitke_bagging'                =>  $this->input->post('dari_menitke_bagging'),
      'sd_menitke_bagging'                  =>  $this->input->post('sd_menitke_bagging'),
      'pijat_jantung'                       =>  $this->input->post('pijat_jantung'),
      'dari_menitke_pijat_jantung'          =>  $this->input->post('dari_menitke_pijat_jantung'),
      'sd_menitke_pijat_jantung'            =>  $this->input->post('sd_menitke_pijat_jantung'),
      'lainlain'                            =>  $this->input->post('lainlain'),
      'jelaskan'                            =>  $this->input->post('jelaskan'),
      'frek_jantung'                        =>  $this->input->post('frek_jantung'),
      'usaha_nafas'                         =>  $this->input->post('usaha_nafas'),
      'tonus_otot'                          =>  $this->input->post('tonus_otot'),
      'reflek'                              =>  $this->input->post('reflek'),
      'warna_kulit'                         =>  $this->input->post('warna_kulit'),
      'menit'                               =>  $this->input->post('menit'),
      'nilai_apgar'                         =>  $this->input->post('nilai_apgar'),
      'nafas_pertama'                       =>  $this->input->post('nafas_pertama'),
      'nafas_spontan'                       =>  $this->input->post('nafas_spontan'),
      'waktu_sd_menangis'                   =>  $this->input->post('waktu_sd_menangis'),
      'keadaan_umum'                        =>  $this->input->post('keadaan_umum'),
      'sianosis'                            =>  $this->input->post('sianosis'),
      'ikterus_kuning'                      =>  $this->input->post('ikterus_kuning'),
      'ssp_tonus'                           =>  $this->input->post('ssp_tonus'),
      'kepala_leher_palatum'                =>  $this->input->post('kepala_leher_palatum'),
      'ubun_ubun'                           =>  $this->input->post('ubun_ubun'),
      'paru'                                =>  $this->input->post('paru'),
      'jantung'                             =>  $this->input->post('jantung'),
      'abdomen'                             =>  $this->input->post('abdomen'),
      'kelamin'                             =>  $this->input->post('kelamin'),
      'kulit'                               =>  $this->input->post('kulit'),
      'ekstremitas'                         =>  $this->input->post('ekstremitas'),
      'catatan'                             =>  $this->input->post('catatan'),
      'diagnosis'                           =>  $this->input->post('diagnosis'),
      'penatalaksanaan'                     =>  $this->input->post('penatalaksanaan'),
      'inisiasi'                            =>  $this->input->post('inisiasi'),
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
            'approved_petugas'                => $result['approved_petugas'],
            'tanggal'                         => $result['notes']['tanggal'],
            'jam'                             => $result['notes']['jam'],
            'rekam_medik_no'                  => $result['notes']['rekam_medik_no'],
            'nama'                            => $result['notes']['nama'],
            'pening_no'                       => $result['notes']['pening_no'],
            'dokter_kebidanan'                => $result['notes']['dokter_kebidanan'],
            'dokter_anak'                     => $result['notes']['dokter_anak'],
            'nama_ibu'                        => $result['notes']['nama_ibu'],
            'nama_ayah'                       => $result['notes']['nama_ayah'],
            'penyakit_ibu'                    => $result['notes']['penyakit_ibu'],
            'sakit_lain'                      => $result['notes']['sakit_lain'],
            'agama'                           => $result['notes']['agama'],
            'goldar_bayi'                     => $result['notes']['goldar_bayi'],
            'goldar_ibu'                      => $result['notes']['goldar_ibu'],
            'goldar_ayah'                     => $result['notes']['goldar_ayah'],
            'vdrl'                            => $result['notes']['vdrl'],
            'titer_antibodi'                  => $result['notes']['titer_antibodi'],
            'alamat'                          => $result['notes']['alamat'],
            'telpon'                          => $result['notes']['telpon'],
            'tahun1'                          => $result['notes']['tahun1'],
            'tahun2'                          => $result['notes']['tahun2'],
            'tahun3'                          => $result['notes']['tahun3'],
            'tahun4'                          => $result['notes']['tahun4'],
            'riwayat_kehamilan1'              => $result['notes']['riwayat_kehamilan1'],
            'riwayat_kehamilan2'              => $result['notes']['riwayat_kehamilan2'],
            'riwayat_kehamilan3'              => $result['notes']['riwayat_kehamilan3'],
            'riwayat_kehamilan4'              => $result['notes']['riwayat_kehamilan4'],
            'ketuban_pecah_tgl'               => $result['notes']['ketuban_pecah_tgl'],
            'ketuban_pecah_warna'             => $result['notes']['ketuban_pecah_warna'],
            'bayi_dilahirkan_dengan'          => $result['notes']['bayi_dilahirkan_dengan'],
            'indikasi'                        => $result['notes']['indikasi'],
            'kala1'                           => $result['notes']['kala1'],
            'kala2'                           => $result['notes'][''],
            'tanda_gawat_janin'               => $result['notes']['tanda_gawat_janin'],
            'denyut_jantung_bayi'             => $result['notes']['denyut_jantung_bayi'],
            'obat_selama_hamil'               => $result['notes']['obat_selama_hamil'],
            'anestesia'                       => $result['notes']['anestesia'],
            'bayi_lahir_tgl'                  => $result['notes']['bayi_lahir_tgl'],
            'bayi_lahir_jam'                  => $result['notes']['bayi_lahir_jam'],
            'bayi_kelamin'                    => $result['notes']['bayi_kelamin'],
            'bayi_bb'                         => $result['notes']['bayi_bb'],
            'bayi_panjang'                    => $result['notes']['bayi_panjang'],
            'bayi_lingkar_kepala'             => $result['notes']['bayi_lingkar_kepala'],
            'bayi_lingkar_dada'               => $result['notes']['bayi_lingkar_dada'],
            'masa_gestasi'                    => $result['notes']['masa_gestasi'],
           'urin'                             => $result['notes']['urin'],
            'mekonium'                        => $result['notes']['mekonium'],
            'plasenta'                        => $result['notes']['plasenta'],
            'tali_pusat'                      => $result['notes']['tali_pusat'],
            'resusitasi'                      => $result['notes']['resusitasi'],
            'obat_obatan'                     => $result['notes']['obat_obatan'],
            'dosis'                           => $result['notes']['dosis'],
            'intubasi'                        => $result['notes']['intubasi'],
            'dari_menitke_intubasi'           => $result['notes']['dari_menitke_intubasi'],
            'sd_menitke_intubasi'             => $result['notes']['sd_menitke_intubasi'],
            'bagging'                         => $result['notes']['bagging'],
            'dari_menitke_bagging'            => $result['notes']['dari_menitke_bagging'],
            'sd_menitke_bagging'              => $result['notes']['sd_menitke_bagging'],
            'pijat_jantung'                   => $result['notes']['pijat_jantung'],
            'dari_menitke_pijat_jantung'      => $result['notes']['dari_menitke_pijat_jantung'],
            'sd_menitke_pijat_jantung'        => $result['notes']['sd_menitke_pijat_jantung'],
            'lainlain'                        => $result['notes']['lainlain'],
            'jelaskan'                        => $result['notes']['jelaskan'],
            'frek_jantung'                    => $result['notes']['frek_jantung'],
            'usaha_nafas'                     => $result['notes']['usaha_nafas'],
            'tonus_otot'                      => $result['notes']['tonus_otot'],
            'reflek'                          => $result['notes']['reflek'],
            'warna_kulit'                     => $result['notes']['warna_kulit'],
            'menit'                           => $result['notes']['menit'],
            'nilai_apgar'                     => $result['notes']['nilai_apgar'],
            'nafas_pertama'                   => $result['notes']['nafas_pertama'],
            'nafas_spontan'                   => $result['notes']['nafas_spontan'],
            'waktu_sd_menangis'               => $result['notes']['waktu_sd_menangis'],
            'keadaan_umum'                    => $result['notes']['keadaan_umum'],
            'sianosis'                        => $result['notes']['sianosis'],
            'ikterus_kuning'                  => $result['notes']['ikterus_kuning'],
            'ssp_tonus'                       => $result['notes']['ssp_tonus'],
            'kepala_leher_palatum'            => $result['notes']['kepala_leher_palatum'],
            'ubun_ubun'                       => $result['notes']['ubun_ubun'],
            'paru'                            => $result['notes']['paru'],
            'jantung'                         => $result['notes']['jantung'],
            'abdomen'                         => $result['notes']['abdomen'],
            'kelamin'                         => $result['notes']['kelamin'],
            'kulit'                           => $result['notes']['kulit'],
            'ekstremitas'                     => $result['notes']['ekstremitas'],
            'panggul'                         => $result['notes']['panggul'],
            'catatan'                         => $result['notes']['catatan'],
            'diagnosis'                       => $result['notes']['diagnosis'],
            'penatalaksanaan'                 => $result['notes']['penatalaksanaan'],
            'inisiasi'                        => $result['notes']['inisiasi'],
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
