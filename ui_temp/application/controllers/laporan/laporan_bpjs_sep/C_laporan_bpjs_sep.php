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
 * Menampilkan halaman client/laporan_bpjs_sep
 * 
 **********************************************************************************/
class C_laporan_bpjs_sep extends CI_Controller
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
    $this->id_ref_global_tipe_42 = 504;
    
    $this->title = "Laporan Vclaim Sep";
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
    $this->c_folder = "C_laporan_bpjs_sep"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

    //menghilangkan 'C_' pada nama class untuk dinamisasi routing;
    $this->class = str_replace("c_", "", $this->router->fetch_class());
    $this->routes = 'laporan_vclaim';

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
    redirect(base_url() . $this->routes  . '/list');
  }


  // Menampilkan tampilan aktif dan arsip
  public function list()
  {
    $data = array(
      'title'   => 'Laporan Vclaim',
      'class_name' => $this->class,
      'route_name' =>  $this->routes
    );

      $data['contents'] = 'contents/laporan/' . $this->class . '/index';
      $this->load->view('master', $data);

  }

  //mengambil data registrasi untuk di tampilkan
  function get_data()
  {

      $no_rm = $this->session->userdata('no_rm');

      $data['route'] = $this->routes;

      //aktif
      $response_pasien_reg = $this->_client_laporan->request('GET', 'laporan/vclaim',
        [
         'query' => [
          'type_tgl' => 'checkin',
          'tgl_start'  => '2020-04-01',
          'tgl_end' => '2020-04-01'
         ] 
        ]);

      $data['laporan_bpjs_sep'] = json_decode($response_pasien_reg->getBody()->getContents(), true)['data'];

     
      $this->load->view('contents/laporan/' . $this->class . '/list', $data);
      // echo trace($data);
  }
   

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
  $response_pasien_reg = $this->_client_laporan->request('GET', 'laporan/vclaim',
        [
         'query' => [
          'type_tgl' => 'checkin',
          'tgl_start'  => '2020-04-01',
          'tgl_end' => '2020-04-01'
         ] 
        ]);

      $response['laporan_bpjs_sep'] = json_decode($response_pasien_reg->getBody()->getContents(), true)['data'];
      $laporan_bpjs_sep = $response['laporan_bpjs_sep'];

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
      $pdf->Cell(220,15,$title, 1,0,'C');
      // date('d-M-Y',  strtotime($tgl_start)) .' - '.date('d-M-Y',  strtotime($tgl_end));

      $pdf->SetFont( 'Arial', 'B', 20 );
      $pdf->Cell(30,30, $kode, 1,1, 'C');
      $pdf->SetY(25);
      $pdf->SetX($x);

      $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
      $pdf->SetFont( 'Arial', '', 14 );
      $pdf->Cell(220,15,'  ' .$clinic_profile['clinic_name'], 1,1);
      // $pdf->Cell(220,12, ' Klinik Bahagia', 1,1);
      

      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFont( 'Arial', '', 10 );
      $pdf->Cell(180,15,chr(149) . ' Rekapitulasi '. date('d-M-Y',  strtotime($tgl_start)) .' - '.date('d-M-Y',  strtotime($tgl_end)), 0,1,'L');

      ////////////////////////////////////////
      // START Body PDF
      ///////////////////////////////////////

      // Start Tabel Bagian ICD10
      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFont( 'Arial', '', 14 );
      $pdf->Cell(100,12, 'Laporan Vclaim SEP', 'B',1);

      $pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
      $pdf->ln(5);

      $pdf->SetFont( 'Arial', 'B', 9 );
      $pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
      $pdf->SetFillColor( 118, 120, 122 );
      $pdf->Cell( 10, 10, "No.", 1, 0, 'C', true );
      $pdf->Cell( 40, 10, 'No. Sep', 1, 0, 'C', true );
      $pdf->Cell( 35, 10, 'No. Kartu', 1, 0, 'C', true );
      $pdf->Cell( 35, 10, 'Nama', 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'Tgl.SEP', 1, 0, 'C', true );
      $pdf->Cell( 20, 10, 'Kls.Rawat', 1, 0, 'C', true );
      $pdf->Cell( 25, 10, 'Jns. Rawat', 1, 0, 'C', true );
      $pdf->Cell( 25, 10, 'No. Mr', 1, 0, 'C', true );
      $pdf->Cell( 35, 10, 'Kode Diagnosa Awal', 1, 0, 'C', true );
      $pdf->Cell( 25, 10, 'Nama DPJP', 1, 1, 'C', true );
     

      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFillColor( 255, 255, 255 );
      $data = $laporan_bpjs_sep;
      $keys = array_keys((array)$data);
      $no = 1;
      for ($i=0; $i < count($keys); $i++) {
        $pdf->Cell( 10, 10, $no++ , 'B', 0, 'C', true );
        $pdf->Cell( 40, 10,  $data[$keys[$i]]['data_vclaim']['noSep'], 'B', 0, 'C', true );
        $pdf->Cell( 35, 10, $data[$keys[$i]]['data_vclaim']['noKartu'], 'B', 0, 'L', true );
        $pdf->Cell( 35, 10, $data[$keys[$i]]['data_vclaim']['nama'], 'B', 0, 'C', true );
        $pdf->Cell( 30, 10, $data[$keys[$i]]['data_vclaim']['tglSep'], 'B', 0, 'C', true );
        $pdf->Cell( 20, 10, $data[$keys[$i]]['data_vclaim']['klsRawat'], 'B', 0, 'C', true );
        $pdf->Cell( 25, 10, $data[$keys[$i]]['data_vclaim']['jenis_rawat']['nama_detail'], 'B', 0, 'C', true );
        $pdf->Cell( 25, 10, $data[$keys[$i]]['data_vclaim']['noMr'], 'B', 0, 'C', true );
        $pdf->Cell( 35, 10, $data[$keys[$i]]['data_vclaim']['code_diagAwal'], 'B', 0, 'C', true );
        $pdf->Cell( 25, 10, $data[$keys[$i]]['data_vclaim']['nama_dpjp'], 'B', 1, 'C', true );
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

      $response_pasien_reg = $this->_client_laporan->request('GET', 'laporan/vclaim', [
        'query' => [
          'type_tgl' => 'checkin',
          'tgl_start'  => $tgl_start,
          'tgl_end' => $tgl_end
        ]
      ]);
     //aktif
     $response_pasien_reg = $this->_client_laporan->request('GET', 'laporan/vclaim',
        [
         'query' => [
          'type_tgl' => 'checkin',
          'tgl_start'  => '2020-04-01',
          'tgl_end' => '2020-04-01'
         ] 
        ]);


      $response['laporan_bpjs_sep'] = json_decode($response_pasien_reg->getBody()->getContents(), true)['data'];
      $laporan_bpjs_sep = $response['laporan_bpjs_sep'];

      $title  = $form['nama_form'] . '_' . date('d-M-Y',  strtotime($tgl_start)) .'_'.date('d-M-Y',  strtotime($tgl_end)); // title excel
      $kode   = $form['kode_form']; // kode form
      
     

      // Start Excel Code
      // Create new Spreadsheet
      /////////////////////////////////////////////
      $spreadsheet = new Spreadsheet();

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
          $drawing->setWidth(75);
          // $drawing->setOffsetX(5);
          $drawing->setCoordinates('B1');
          $drawing->setWorksheet($spreadsheet->getActiveSheet());
      }

      $sheet = $spreadsheet->getActiveSheet();
      $horizontal_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
      $vertical_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

      $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
      $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

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

      $sheet->mergeCells('B1:AT3');
      $sheet->getStyle('B1:AT3')->applyFromArray($titleStyle);
      $sheet->getStyle('B1')->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('B1')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('B1', $title);

       $sheet->mergeCells('AU1:AU4');      
      $sheet->getStyle('AU1')->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('AU1')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('AU1', $kode);

      $sheet->getStyle('C6:D6')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('C6', 'Rekapitulasi ');
     
      $sheet->setCellValue('D6', ': ' . date('d-M-Y',  strtotime($tgl_start)) .' - '.date('d-M-Y',  strtotime($tgl_end)));

      $sheet->mergeCells('B4:AT4');
      $sheet->getStyle('B4:AT4')->applyFromArray($subTitleStyle);
      $sheet->getStyle('B4')->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('B4')->getAlignment()->setVertical($vertical_center);
      $sheet->setCellValue('B4', $clinic_profile['clinic_name']);

      $cell = 8;
      // Menampilkan data Umur
      $spreadsheet->getActiveSheet()->setAutoFilter('B'.$cell.':AU'.$cell);
      $sheet->getStyle('B'.$cell.':AU'.$cell)->getAlignment()->setHorizontal($horizontal_center);
      $sheet->getStyle('B'.$cell.':AU'.$cell)->getAlignment()->setVertical($vertical_center);
      $sheet->getStyle('B'.$cell.':AU'.$cell)->applyFromArray($rowHeaderStyle);
      $sheet->getStyle('B'.$cell.':AU'.$cell)->getFont()->setSize(9);
      $sheet->setCellValue('B'.$cell, 'No');
      $sheet->setCellValue('C'.$cell, 'No. Kartu');
      $sheet->setCellValue('D'.$cell, 'No. Mr');
      $sheet->setCellValue('E'.$cell, 'Nama');
      $sheet->setCellValue('F'.$cell, 'Tanggal SEP');
      $sheet->setCellValue('G'.$cell, 'Tanggal Pulang');
      $sheet->setCellValue('H'.$cell, 'No.SEP');
      $sheet->setCellValue('I'.$cell, 'PPK Pelayanan');
      $sheet->setCellValue('J'.$cell, 'Jenis Pelayanan');
      $sheet->setCellValue('K'.$cell, 'Kelas Rawat');
      $sheet->setCellValue('L'.$cell, 'Jenis Rawat');
      $sheet->setCellValue('M'.$cell, 'Asal Rujukan');
      $sheet->setCellValue('N'.$cell, 'Tanggal Rujukan');
      $sheet->setCellValue('O'.$cell, 'No. Rujukan');
      $sheet->setCellValue('P'.$cell, 'No. Rujukan Keluar');
      $sheet->setCellValue('Q'.$cell, 'Nama PPK Rujukan');
      $sheet->setCellValue('R'.$cell, 'PPK Rujukan');
      $sheet->setCellValue('S'.$cell, 'Catatan');
      $sheet->setCellValue('T'.$cell, 'Diagnosa Awal');
      $sheet->setCellValue('U'.$cell, 'Kode Diagnosa Awal');
      $sheet->setCellValue('V'.$cell, 'Poli Tujuan');
      $sheet->setCellValue('W'.$cell, 'Kode Poli Tujuan');
      $sheet->setCellValue('X'.$cell, 'Eksekutif');
      $sheet->setCellValue('Y'.$cell, 'Cob');
      $sheet->setCellValue('Z'.$cell, 'Katarak');
      $sheet->setCellValue('AA'.$cell, 'Laka Lantas');
      $sheet->setCellValue('AB'.$cell, 'Lokasi Laka');
      $sheet->setCellValue('AC'.$cell, 'Penjamin');
      $sheet->setCellValue('AD'.$cell, 'Tanggal Kejadian');
      $sheet->setCellValue('AE'.$cell, 'Keterangan');
      $sheet->setCellValue('AF'.$cell, 'Suplesi');
      $sheet->setCellValue('AG'.$cell, 'No. SEP Suplesi');
      $sheet->setCellValue('AH'.$cell, 'Kode Propinsi');
      $sheet->setCellValue('AI'.$cell, 'Kode Kabupaten');
      $sheet->setCellValue('AJ'.$cell, 'Kode Kecamatan');
      $sheet->setCellValue('AK'.$cell, 'No. Surat');
      $sheet->setCellValue('AL'.$cell, 'Kode DPJP');
      $sheet->setCellValue('AM'.$cell, 'Nama DPJP');
      $sheet->setCellValue('AN'.$cell, 'Diinput Oleh');
      $sheet->setCellValue('AO'.$cell, 'Tanggal Dibuat');
      $sheet->setCellValue('AP'.$cell, 'Dihapus Oleh');
      $sheet->setCellValue('AQ'.$cell, 'Petugas Pulang');
      $sheet->setCellValue('AR'.$cell, 'No. Telpon');
      $sheet->setCellValue('AS'.$cell, 'User');
      $sheet->setCellValue('AT'.$cell, 'Vclaim Rujukan');
      $sheet->setCellValue('AU'.$cell, 'Ref ICD 10');

      
     
     $data = $laporan_bpjs_sep;
      $keys = array_keys((array)$data);
      $no = 1 ;
      for ($i=0; $i < count($keys); $i++) { 
        
        $sheet->getStyle('B6:C73')->getAlignment()->setHorizontal($horizontal_center);
        $sheet->getStyle('B6:C73')->getAlignment()->setVertical($vertical_center);
        $sheet->getStyle('E6:G73')->getAlignment()->setHorizontal($horizontal_center);
        $sheet->getStyle('E6:G73')->getAlignment()->setVertical($vertical_center);
        $sheet->getStyle('B'. ($i + 9).':'.'AU'. ($i + 9))->applyFromArray($rowStyle);
        $sheet->getStyle('B'. ($i + 9).':'.'AU'. ($i + 9))->getFont()->setSize(8);
        $sheet->setCellValue('B'. ($i + 9), $no++);
        $sheet->setCellValue('C'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noKartu']);
        $sheet->setCellValue('D'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noMr']);
        $sheet->setCellValue('E'. ($i + 9), $data[$keys[$i]]['data_vclaim']['nama']);
        $sheet->setCellValue('F'. ($i + 9), $data[$keys[$i]]['data_vclaim']['tglSep']);
        $sheet->setCellValue('G'. ($i + 9), $data[$keys[$i]]['data_vclaim']['tglPulang']);
        $sheet->setCellValue('H'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noSep']);
        $sheet->setCellValue('I'. ($i + 9), $data[$keys[$i]]['data_vclaim']['ppkPelayanan']);
        $sheet->setCellValue('J'. ($i + 9), $data[$keys[$i]]['data_vclaim']['jnsPelayanan']['nama_detail']);
        $sheet->setCellValue('K'. ($i + 9), $data[$keys[$i]]['data_vclaim']['klsRawat']);
        $sheet->setCellValue('L'. ($i + 9), $data[$keys[$i]]['data_vclaim']['jenis_rawat']['nama_detail']);
        $sheet->setCellValue('M'. ($i + 9), $data[$keys[$i]]['data_vclaim']['asalRujukan']['nama_detail']);
        $sheet->setCellValue('N'. ($i + 9), $data[$keys[$i]]['data_vclaim']['tglRujukan']);
        $sheet->setCellValue('O'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noRujukan']);
        $sheet->setCellValue('P'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noRujukanKeluar']);
        $sheet->setCellValue('Q'. ($i + 9), $data[$keys[$i]]['data_vclaim']['namaPpkRujukan']);
        $sheet->setCellValue('R'. ($i + 9), $data[$keys[$i]]['data_vclaim']['ppkRujukan']);
        $sheet->setCellValue('S'. ($i + 9), $data[$keys[$i]]['data_vclaim']['catatan']);
        $sheet->setCellValue('T'. ($i + 9), $data[$keys[$i]]['data_vclaim']['diagAwal']);
        $sheet->setCellValue('U'. ($i + 9), $data[$keys[$i]]['data_vclaim']['code_diagAwal']);
        $sheet->setCellValue('V'. ($i + 9), $data[$keys[$i]]['data_vclaim']['poliTujuan']);
        $sheet->setCellValue('W'. ($i + 9), $data[$keys[$i]]['data_vclaim']['code_poliTujuan']);
        $sheet->setCellValue('X'. ($i + 9), $data[$keys[$i]]['data_vclaim']['eksekutif']);
        $sheet->setCellValue('Y'. ($i + 9), $data[$keys[$i]]['data_vclaim']['cob']);
        $sheet->setCellValue('Z'. ($i + 9), $data[$keys[$i]]['data_vclaim']['katarak']);
        $sheet->setCellValue('AA'. ($i + 9), $data[$keys[$i]]['data_vclaim']['lakaLantas']);
        $sheet->setCellValue('AB'. ($i + 9), $data[$keys[$i]]['data_vclaim']['lokasiLaka']);
        $sheet->setCellValue('AC'. ($i + 9), $data[$keys[$i]]['data_vclaim']['penjamin']);
        $sheet->setCellValue('AD'. ($i + 9), $data[$keys[$i]]['data_vclaim']['tglKejadian']);
        $sheet->setCellValue('AE'. ($i + 9), $data[$keys[$i]]['data_vclaim']['keterangan']);
        $sheet->setCellValue('AF'. ($i + 9), $data[$keys[$i]]['data_vclaim']['suplesi']);
        $sheet->setCellValue('AG'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noSepSuplesi']);
        $sheet->setCellValue('AH'. ($i + 9), $data[$keys[$i]]['data_vclaim']['kdPropinsi']);
        $sheet->setCellValue('AI'. ($i + 9), $data[$keys[$i]]['data_vclaim']['kdKabupaten']);
        $sheet->setCellValue('AJ'. ($i + 9), $data[$keys[$i]]['data_vclaim']['kdKecamatan']);
        $sheet->setCellValue('AK'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noSurat']);
        $sheet->setCellValue('AL'. ($i + 9), $data[$keys[$i]]['data_vclaim']['kodeDPJP']);
        $sheet->setCellValue('AM'. ($i + 9), $data[$keys[$i]]['data_vclaim']['nama_dpjp']);
        $sheet->setCellValue('AN'. ($i + 9), $data[$keys[$i]]['data_vclaim']['nama_petugas_input']);
        $sheet->setCellValue('AO'. ($i + 9), $data[$keys[$i]]['data_vclaim']['created_date']);
        $sheet->setCellValue('AP'. ($i + 9), $data[$keys[$i]]['data_vclaim']['nama_petugas_delete']);
        $sheet->setCellValue('AQ'. ($i + 9), $data[$keys[$i]]['data_vclaim']['nama_petugas_pulang']);
        $sheet->setCellValue('AR'. ($i + 9), $data[$keys[$i]]['data_vclaim']['noTelp']);
        $sheet->setCellValue('AS'. ($i + 9), $data[$keys[$i]]['data_vclaim']['user']);
        $sheet->setCellValue('AT'. ($i + 9), $data[$keys[$i]]['data_vclaim_rujukan']);
        $sheet->setCellValue('AU'. ($i + 9), $data[$keys[$i]]['data_ref_icd10']['nama_icd10']);
      
      }

      $sheet->getColumnDimension('B')->setWidth(5);
      $sheet->getColumnDimension('C')->setWidth(25);
      $sheet->getColumnDimension('D')->setWidth(20);
      $sheet->getColumnDimension('E')->setWidth(20);
      $sheet->getColumnDimension('F')->setWidth(20);
      $sheet->getColumnDimension('G')->setWidth(20);
      $sheet->getColumnDimension('H')->setWidth(25);
      $sheet->getColumnDimension('I')->setWidth(20);
      $sheet->getColumnDimension('J')->setWidth(20);
      $sheet->getColumnDimension('K')->setWidth(20);
      $sheet->getColumnDimension('L')->setWidth(20);
      $sheet->getColumnDimension('M')->setWidth(20);
      $sheet->getColumnDimension('N')->setWidth(20);
      $sheet->getColumnDimension('O')->setWidth(20);
      $sheet->getColumnDimension('P')->setWidth(20);
      $sheet->getColumnDimension('Q')->setWidth(20);
      $sheet->getColumnDimension('R')->setWidth(20);
      $sheet->getColumnDimension('S')->setWidth(20);
      $sheet->getColumnDimension('T')->setWidth(40);
      $sheet->getColumnDimension('U')->setWidth(20);
      $sheet->getColumnDimension('V')->setWidth(20);
      $sheet->getColumnDimension('W')->setWidth(30);
      $sheet->getColumnDimension('X')->setWidth(20);
      $sheet->getColumnDimension('Y')->setWidth(20);
      $sheet->getColumnDimension('Z')->setWidth(20);
      $sheet->getColumnDimension('AA')->setWidth(20);
      $sheet->getColumnDimension('AB')->setWidth(20);
      $sheet->getColumnDimension('AC')->setWidth(20);
      $sheet->getColumnDimension('AD')->setWidth(20);
      $sheet->getColumnDimension('AE')->setWidth(20);
      $sheet->getColumnDimension('AF')->setWidth(20);
      $sheet->getColumnDimension('AG')->setWidth(20);
      $sheet->getColumnDimension('AH')->setWidth(20);
      $sheet->getColumnDimension('AI')->setWidth(20);
      $sheet->getColumnDimension('AJ')->setWidth(20);
      $sheet->getColumnDimension('AK')->setWidth(20);
      $sheet->getColumnDimension('AL')->setWidth(20);
      $sheet->getColumnDimension('AM')->setWidth(20);
      $sheet->getColumnDimension('AN')->setWidth(20);
      $sheet->getColumnDimension('AO')->setWidth(30);
      $sheet->getColumnDimension('AP')->setWidth(30);
      $sheet->getColumnDimension('AQ')->setWidth(20);
      $sheet->getColumnDimension('AR')->setWidth(20);
      $sheet->getColumnDimension('AS')->setWidth(20);
      $sheet->getColumnDimension('AT')->setWidth(20);
      $sheet->getColumnDimension('AU')->setWidth(40);
      
      $sheet->getRowDimension('6')->setRowHeight(21);
           
      $writer = new Xlsx($spreadsheet);
      
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $title .'.xlsx"'); 
      header('Cache-Control: max-age=0');

      $writer->save('php://output');
  }

}
