<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once FCPATH."assets/vendor/office/autoload.php";

use GuzzleHttp\Psr7;
use \GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

/**********************************************************************************
 * 
 * Deskripsi
 * Menampilkan halaman client/laporan_pasien_meninggal
 * 
 **********************************************************************************/
class C_laporan_pasien_meninggal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('pdf');

    // add session statis
    $data = [
      'id_user' => "123",
      'rs_key'  => "900614f7-7acd-11e8-a953-fa163e101f72",
      'user_login' => [
        'id_user' => "373680"
      ],
      'no_rm'      => "008000649",
      'timezone' => "Asia/Jakarta"
    ];
    $this->session->set_userdata($data);

    // token diambil dari postman, kalau sudah expired sikahkan ambil lagi.
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoiTkFNQSAyIiwiaWRfdXNlciI6IjM3MzY4MSIsInJtX251bWJlciI6ImFkbWluIiwicnNfa2V5IjoiQTEyMyIsImlwX2FkZHJlc3MiOiIxMjcuMC4xLjEiLCJhY2Nlc3MiOiJ1c2VyIn0.ubW6fyc7ErYOW2T5qFbjXvLIVTLp05s3A0paQ6wfcmo";
    $this->id_ref_global_tipe_42 = 505;

    $this->title = "Laporan Pasien Meninggal";
    
    // guzzle client
    
    $this->_client_ref = new Client([
      'base_uri'  => $this->config->item('api_ref'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);


    $this->_client_rs = new Client([
      'base_uri'  => $this->config->item('api_rs'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    $this->_client_laporan = new Client([
      'base_uri'  => $this->config->item('laporan'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    // NAMA FOLDER DALAM CONTROLLER. 
    // HANYA EDIT DI SINI.. YANG LAIN TIDAK PERLU DIRUBAH... TOLONG GANTI DENGAN NAMA FOLDER YANG BARU
    $this->c_folder = "C_laporan_pasien_meninggal"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

    //menghilangkan 'C_' pada nama class untuk dinamisasi routing;
    $this->class = str_replace("c_", "", $this->router->fetch_class());

    //dummy id departemen
    $this->id_dept = 3;

    // untuk menyimpan data ke /tmp untuk ditampilkan di cetak
    $this->folder = $this->config->item('tmp_folder');
  }

  // redirect ke fungsi list
  public function index()
  // $route['laporan_pasien_registrasi'] = 'laporan_pasien_registrasi/c_laporan_pasien_registrasi';
  {
    // echo base_url(); die;
    redirect(base_url() . $this->class . '/list');
  }


  // Menampilkan tampilan aktif dan arsip
  public function list()
  {
    $data = array(
      'title'   => 'Laporan Pasien Meninggal',
      'class_name' => $this->class,
      
    );

    $data['contents'] = 'contents/laporan/' . $this->class . '/index';
    $this->load->view('master', $data);

  }

  //mengambil data registrasi untuk di tampilkan
  function get_data()
  {

    $no_rm = $this->session->userdata('no_rm');

    $data['class_name'] =  $this->class;
      //aktif
    $response_pasien_reg = $this->_client_laporan->request('GET', 'pasien_meninggal', [
      'query' => [
        'type_tgl' => 'checkin',
        'tgl_start'  => '2020-04-01',
        'tgl_end' => '2020-04-01'
      ]
    ]);

    $data['laporan_pasien_meninggal'] = json_decode($response_pasien_reg->getBody()->getContents(), true)['data'];

    $this->load->view('contents/laporan/' . $this->class . '/list',$data);
  }

  // Export ke pdf
  function print_pdf(){
    // Export ke pdf
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

   $no_rm = $this->session->userdata('no_rm');
   $tgl_start = '2020-04-01';
   $tgl_end = '2020-04-01';

      //aktif
   $response_pasien_reg = $this->_client_laporan->request('GET', 'pasien_meninggal', [
    'query' => [
      'type_tgl' => 'checkin',
      'tgl_start'  => '2020-04-01',
      'tgl_end' => '2020-04-01'
    ]
  ]);

   $response['laporan_pasien_meninggal'] = json_decode($response_pasien_reg->getBody()->getContents(), true)['data'];
   $laporan_pasien_meninggal = $response['laporan_pasien_meninggal'];

      $title  = $form['nama_form']; // title pdf
      $kode   = $form['kode_form']; // kode form
      $name   = $form['pdf_file_name']  . date('d-M-Y',  strtotime($tgl_start)) .'_'.date('d-M-Y',  strtotime($tgl_end)) . '.pdf'; // nama form



      $pdf = new FPDF('L','mm','A4');
      $pdf->SetTitle($title);

      $textColour = array( 0, 0, 0 );
      $headerColour = array( 100, 100, 100 );
      $tableHeaderTopTextColour = array( 255, 255, 255 );
      $tableHeaderTopFillColour = array( 125, 152, 179 );
      $tableHeaderTopProductTextColour = array( 0, 0, 0 );
      $tableHeaderTopProductFillColour = array( 143, 173, 204 );
      $tableHeaderLeftTextColour = array( 99, 42, 57 );
      $tableHeaderLeftFillColour = array( 184, 207, 229 );
      $tableBorderColour = array( 50, 50, 50 );
      $tableRowFillColour = array( 213, 170, 170 );

      $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
      // membuat halaman baru
      $pdf->AddPage();


      ////////////////////////////////////////
      // START Header PDF
      ///////////////////////////////////////
      $pdf->SetFont( 'Arial', 'B', 24 );
      $pdf->Cell(27,30,'', 1,0, 'C');
      $pdf->Image($clinic_profile['logo1'], 11,11,25,0,'JPG');
      $x = $pdf->GetX();

      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFont( 'Arial', '', 17 );
      $pdf->Cell(225,15,$title, 1,0,'C');

      $pdf->SetFont( 'Arial', 'B', 20 );
      $pdf->Cell(30,30, $kode, 1,1, 'C');
      $pdf->SetY(25);
      $pdf->SetX($x);

      $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
      $pdf->SetFont( 'Arial', '', 14 );
      $pdf->Cell(225,15, '  '.$clinic_profile['clinic_name'], 1,1);
      // $pdf->Cell(225,12, '  Klinik Bahagia', 1,1);

      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFont( 'Arial', '', 10 );
      $pdf->Cell(180,15,chr(149) . ' Rekapitulasi '. date('d-M-Y',  strtotime($tgl_start)) .' - '.date('d-M-Y',  strtotime($tgl_end)), 0,1,'L');

      ////////////////////////////////////////
      // START Body PDF
      ///////////////////////////////////////

      // Start Tabel Bagian ICD10
      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFont( 'Arial', '', 14 );
      $pdf->Cell(100,12, 'Laporan Pasien Meninggal', 'B',1);

      $pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
      $pdf->ln(5);

      $pdf->SetFont( 'Arial', 'B', 7 );
      $pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
      $pdf->SetFillColor( 118, 120, 122 );
      $pdf->Cell( 13, 10, "ID REG", 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'Nama DPJP', 1, 0, 'C', true );
      $pdf->Cell( 20, 10, 'No.RM', 1, 0, 'C', true );
      $pdf->Cell( 35, 10, 'Nama Pasien', 1, 0, 'C', true );
      $pdf->Cell( 15, 10, 'Kelamin', 1, 0, 'C', true );
      $pdf->Cell( 25, 10, 'Penjamin', 1, 0, 'C', true );
      $pdf->Cell( 33, 10, 'Umur', 1, 0, 'C', true );
     
      $pdf->Cell( 25, 10, 'Tgl Meninggal', 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'Sebab Kematian', 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'No. Surat Kematian', 1, 0, 'C', true );
      $pdf->Cell( 25, 10, 'Ket. Kematian', 1, 1, 'C', true );



      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFillColor( 255, 255, 255 );
      $data = $laporan_pasien_meninggal;
      $keys = array_keys((array)$data);

      $no = 0;
      for ($i=0; $i < count($keys); $i++) { 

        $pdf->Cell( 13, 10, $data[$keys[$i]]['id_reg'] , 'B', 0, 'C', true );
        $pdf->Cell( 30, 10, $data[$keys[$i]]['nama_dpjp'], 'B', 0, 'C', true );
        $pdf->Cell( 20, 10, $data[$keys[$i]]['no_rm'], 'B', 0, 'C', true );
        $pdf->Cell( 35, 10, $data[$keys[$i]]['nama_pasien'], 'B', 0, 'C', true );
        $pdf->Cell( 15, 10, $data[$keys[$i]]['kelamin'], 'B', 0, 'C', true );
        $pdf->Cell( 25, 10, $data[$keys[$i]]['penjamin'], 'B', 0, 'C', true );
        $pdf->Cell( 33, 10, $data[$keys[$i]]['umur'], 'B', 0, 'L', true );
        $pdf->Cell( 25, 10, $data[$keys[$i]]['data_meninggal'][0]['date_meninggal'], 'B', 0, 'C', true );
        $pdf->Cell( 30, 10, $data[$keys[$i]]['data_meninggal'][0]['sebab_kematian'], 'B', 0, 'C', true );
        $pdf->Cell( 30, 10, $data[$keys[$i]]['data_meninggal'][0]['no_surat_kematian'], 'B', 0, 'C', true );
        $pdf->Cell( 25, 10, $data[$keys[$i]]['data_meninggal'][0]['keterangan_kematian'], 'B', 1, 'C', true );
      }
      $pdf->ln(10);
      // End Tabel Bagian Data ICD10

      $pdf->Output('',$name);
    }

  // Export ke excel
    function export()
    {
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

      $no_rm = $this->session->userdata('no_rm');

      $tgl_start = '2020-04-01';
      $tgl_end = '2020-04-01';

      $response_pasien_reg = $this->_client_laporan->request('GET', 'pasien_meninggal', [
        'query' => [
          'type_tgl' => 'checkin',
          'tgl_start'  => $tgl_start,
          'tgl_end' => $tgl_end
        ]
      ]);
     //aktif
      $response_pasien_reg = $this->_client_laporan->request('GET', 'pasien_meninggal', [
        'query' => [
          'type_tgl' => 'checkin',
          'tgl_start'  => '2020-04-01',
          'tgl_end' => '2020-04-01'
        ]
      ]);


      $response['laporan_pasien_meninggal'] = json_decode($response_pasien_reg->getBody()->getContents(), true)['data'];
      $laporan_pasien_meninggal = $response['laporan_pasien_meninggal'];

      $title  = $form['nama_form'] . '_' . date('d-M-Y',  strtotime($tgl_start)) .'_'.date('d-M-Y',  strtotime($tgl_end)); // title excel
      $kode   = $form['kode_form']; // kode form


      // Start Excel Code
      // Create new Spreadsheet
      /////////////////////////////////////////////
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $horizontal_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
      $vertical_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;
        $IMG = $clinic_profile['logo1'];

      if (isset($IMG) && !empty($IMG)) {
          $imageType = "png";

          if (strpos($IMG, ".png") === false) {
             $imageType = "jpg";
          }

          $drawing = new MemoryDrawing();
          // $sheet->getRowDimension($row_num)->setRowHeight(80);
          // $sheet->mergeCells('A'.$row_num.':H'.$row_num);
          $gdImage = ($imageType == 'png') ? imagecreatefrompng($IMG) : imagecreatefromjpeg($IMG);
          $drawing->setName('Company Logo');
          $drawing->setDescription('Company Logo image');
          $drawing->setResizeProportional(true);
          $drawing->setImageResource($gdImage);
          $drawing->setRenderingFunction(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_JPEG);
          $drawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_DEFAULT);
          $drawing->setWidth(100);
          // $drawing->setOffsetX(5);
          $drawing->setCoordinates('B1');
          $drawing->setWorksheet($spreadsheet->getActiveSheet());
      }

      $titleStyle = array(        
        'fill' => [
          'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
          'rotation' => 90,
          'startColor' => [
            'argb' => 'c5d9f1',
          ],
        ],
      );
      $subTitleStyle = array(
        'fill' => [
          'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
          'rotation' => 90,
          'startColor' => [
            'argb' => 'f2f2f2',
          ],
        ],
      );
      $rowHeaderStyle = array(
        'borders' => [
          'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'eeece1'],
          ],
        ],
        'fill' => [
          'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
          'rotation' => 90,
          'startColor' => [
            'argb' => 'd9d9d9',
          ],
        ],
      );
      $rowStyle = array(
        'borders' => [
          'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'dbdbdb'],
          ],
        ],
      );

      $sheet->mergeCells('B1:Y4');
      $sheet->getStyle('B1:Y4')->applyFromArray($titleStyle);
      $sheet->getStyle('B1')->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('B1')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('B1', $title);

      $sheet->mergeCells('B5:Y5');
      $sheet->getStyle('B5:Y5')->applyFromArray($subTitleStyle);
      $sheet->getStyle('B5')->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('B5')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('B5', $clinic_profile['clinic_name']);

      $sheet->mergeCells('Z1:Z5');      
      $sheet->getStyle('Z1')->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('Z1')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('Z1', $kode);


      $sheet->mergeCells('B7:C7');
      $sheet->getStyle('B7:D7')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('B7', 'Rekapitulasi ');
      $sheet->mergeCells('D7:E7');
      $sheet->setCellValue('D7', ': ' . date('d-M-Y',  strtotime($tgl_start)) .' - '.date('d-M-Y',  strtotime($tgl_end)));


      $cell = 9;
      // Menampilkan data 
      $sheet->getStyle('B'.$cell.':Z'.$cell)->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('B'.$cell.':Z'.$cell)->getAlignment()->setVertical($vertical_center);
      $sheet->getStyle('B'.$cell.':Z'.$cell)->applyFromArray($rowHeaderStyle);
      $sheet->getStyle('B'.$cell.':Z'.$cell)->getFont()->setSize(9);
      $sheet->setCellValue('B'.$cell, 'Id.REG');
      $sheet->setCellValue('C'.$cell, 'No.REG');
      $sheet->setCellValue('D'.$cell, 'Nama DPJP');
      $sheet->setCellValue('E'.$cell, 'Tanggal Checkin');
      $sheet->setCellValue('F'.$cell, 'Tanggal Checkout');
      $sheet->setCellValue('G'.$cell, 'ICD10 Primary');
      $sheet->setCellValue('H'.$cell, 'Kondisi Pulang');
      $sheet->setCellValue('I'.$cell, 'Alasan Pulang');
      $sheet->setCellValue('J'.$cell, 'No.RM');
      $sheet->setCellValue('K'.$cell, 'No.BPJS');
      $sheet->setCellValue('L'.$cell, 'No.KTP');
      $sheet->setCellValue('M'.$cell, 'Nama Pasien');
      $sheet->setCellValue('N'.$cell, 'Kelamin');
      $sheet->setCellValue('O'.$cell, 'Penjamin');
      $sheet->setCellValue('P'.$cell, 'Umur');
      $sheet->setCellValue('Q'.$cell, 'Alamat 1');
      $sheet->setCellValue('R'.$cell, 'Alamat 2');
      $sheet->setCellValue('S'.$cell, 'Date Meninggal');
      $sheet->setCellValue('T'.$cell, 'Sebab Meninggal');
      $sheet->setCellValue('U'.$cell, 'No.Surat Kematian');
      $sheet->setCellValue('V'.$cell, 'Keterangan Kematian');
      $sheet->setCellValue('W'.$cell, 'Dasar Kematian');
      $sheet->setCellValue('X'.$cell, 'Tempat Meninggal');
      $sheet->setCellValue('Y'.$cell, 'Rencana Pemulasaran');
      $sheet->setCellValue('Z'.$cell, 'Keadaan Ibu Meninggal');
      
      $data = $laporan_pasien_meninggal;
      $keys = array_keys((array)$data);
      $no = 0;
      for ($i=0; $i < count($keys); $i++) { 
       $sheet->getStyle('B'. ($i + 10).':'.'Z'. ($i + 10))->getNumberFormat()->setFormatCode('00000');
       $sheet->getStyle('B6:C73')->getAlignment()->setHorizontal($horizontal_center);
       $sheet->getStyle('B6:C73')->getAlignment()->setVertical($vertical_center);
       $sheet->getStyle('E6:Z73')->getAlignment()->setHorizontal($horizontal_center);
       $sheet->getStyle('E6:Z73')->getAlignment()->setVertical($vertical_center);
       $sheet->getStyle('B'. ($i + 10).':'.'Z'. ($i + 10))->applyFromArray($rowStyle);
       $sheet->getStyle('B'. ($i + 10).':'.'Z'. ($i + 10))->getFont()->setSize(9);
       $sheet->setCellValue('B'. ($i + 10), $data[$keys[$i]]['id_reg']);
       $sheet->setCellValue('C'. ($i + 10), $data[$keys[$i]]['no_reg']);
       $sheet->setCellValue('D'. ($i + 10), $data[$keys[$i]]['nama_dpjp']);
       $sheet->setCellValue('E'. ($i + 10), $data[$keys[$i]]['tgl_checkin']);
       $sheet->setCellValue('F'. ($i + 10), $data[$keys[$i]]['tgl_checkout']);
       $sheet->setCellValue('G'. ($i + 10), $data[$keys[$i]]['icd_10_primary']);
       $sheet->setCellValue('H'. ($i + 10), $data[$keys[$i]]['kondisi_pulang']);
       $sheet->setCellValue('I'. ($i + 10), $data[$keys[$i]]['alasan_pulang']);
       $sheet->setCellValue('J'. ($i + 10), $data[$keys[$i]]['no_rm']);
       $sheet->setCellValue('K'. ($i + 10), $data[$keys[$i]]['no_bpjs']);
       $sheet->setCellValue('L'. ($i + 10), $data[$keys[$i]]['no_ktp']);
       $sheet->setCellValue('M'. ($i + 10), $data[$keys[$i]]['nama_pasien']);
       $sheet->setCellValue('N'. ($i + 10), $data[$keys[$i]]['kelamin']);
       $sheet->setCellValue('O'. ($i + 10), $data[$keys[$i]]['penjamin']);
       $sheet->setCellValue('P'. ($i + 10), $data[$keys[$i]]['umur']);
       $sheet->setCellValue('Q'. ($i + 10), $data[$keys[$i]]['alamat_1']);
       $sheet->setCellValue('R'. ($i + 10), $data[$keys[$i]]['alamat_2']);
       $sheet->setCellValue('S'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['date_meninggal']);
       $sheet->setCellValue('T'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['sebab_kematian']);
       $sheet->setCellValue('U'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['no_surat_kematian']);
       $sheet->setCellValue('V'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['keterangan_kematian']);
       $sheet->setCellValue('W'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['meninggal_dasar_diagnosa']);
       $sheet->setCellValue('X'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['meninggal_tempat_meninggal']);
       $sheet->setCellValue('Y'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['meninggal_rencana_pemulasaran']);
       $sheet->setCellValue('Z'. ($i + 10), $data[$keys[$i]]['data_meninggal'][0]['meninggal_keadaan_ibu_meninggal']);
     }

     $sheet->getColumnDimension('B')->setWidth(5);
     $sheet->getColumnDimension('C')->setWidth(30);
     $sheet->getColumnDimension('D')->setWidth(10);
     $sheet->getColumnDimension('E')->setWidth(30);
     $sheet->getColumnDimension('F')->setWidth(30);
     $sheet->getColumnDimension('G')->setWidth(20);
     $sheet->getColumnDimension('H')->setWidth(21);
     $sheet->getColumnDimension('I')->setWidth(21);
     $sheet->getColumnDimension('J')->setWidth(21);
     $sheet->getColumnDimension('K')->setWidth(30);
     $sheet->getColumnDimension('L')->setWidth(30);
     $sheet->getColumnDimension('M')->setWidth(30);
     $sheet->getColumnDimension('N')->setWidth(30);
     $sheet->getColumnDimension('O')->setWidth(30);
     $sheet->getColumnDimension('P')->setWidth(30);
     $sheet->getColumnDimension('Q')->setWidth(85);
     $sheet->getColumnDimension('R')->setWidth(50);
     $sheet->getColumnDimension('S')->setWidth(30);
     $sheet->getColumnDimension('T')->setWidth(30);
     $sheet->getColumnDimension('U')->setWidth(30);
     $sheet->getColumnDimension('V')->setWidth(30);
     $sheet->getColumnDimension('W')->setWidth(30);
     $sheet->getColumnDimension('X')->setWidth(30);
     $sheet->getColumnDimension('Y')->setWidth(30);
     $sheet->getColumnDimension('Z')->setWidth(30);

     $writer = new Xlsx($spreadsheet);

     header('Content-Type: application/vnd.ms-excel');
     header('Content-Disposition: attachment;filename="'. $title .'.xlsx"'); 
     header('Cache-Control: max-age=0');

     $writer->save('php://output');
   }

 }
