<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once FCPATH."assets/vendor/office/autoload.php";

// use GuzzleHttp\Psr7;
use \GuzzleHttp\Client;
// use GuzzleHttp\Exception\ClientException;
// use GuzzleHttp\Exception\ServerException;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

/****************************
 *
 * Deskripsi
 * Menampilkan halaman /laporan_rl5_1
 *
 ****************************/
class C_laporan_parkir_tiket extends CI_Controller {
  public function __construct() {
    parent::__construct();
    // static session
    $this->load->library('pdf');
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

    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoiTkFNQSAyIiwiaWRfdXNlciI6IjM3MzY4MSIsInJtX251bWJlciI6ImFkbWluIiwicnNfa2V5IjoiQTEyMyIsImlwX2FkZHJlc3MiOiIxMjcuMC4xLjEiLCJhY2Nlc3MiOiJ1c2VyIn0.ubW6fyc7ErYOW2T5qFbjXvLIVTLp05s3A0paQ6wfcmo";

    $this->_parkir_rs = new Client([
      'base_uri'  => $this->config->item('api_url'),
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


    $this->_client_rs = new Client([
      'base_uri'  => $this->config->item('api_rs'),
      'headers'   => [
        'Content-Type' => 'application/json',
        'x-token' => $token
      ]
    ]);

    // NAMA FOLDER DALAM CONTROLLER. 
    // HANYA EDIT DI SINI.. YANG LAIN TIDAK PERLU DIRUBAH... TOLONG GANTI DENGAN NAMA FOLDER YANG BARU
    $this->c_folder = "laporan_parkir_tiket"; // <<< HANYA INI YANG PERLU DIRUBAH DI CONSTRUCT()!!!! SISANYA DIAMKAN

    $this->class = str_replace("c_", "", $this->router->fetch_class());

    //dummy id departemen
    $this->id_dept = 3;

    // untuk menyimpan data ke /tmp untuk ditampilkan di cetak
    $this->folder = $this->config->item('tmp_folder');

    // form header
    $this->form_header = 573;
  }

  function index() {
    if($this->input->is_ajax_request()) {

      $data = $this->_getvalue();
      $data['url'] = base_url($this->class);
      // echo trace($data);
      $this->load->view("contents/parkir/laporan/{$this->class}/table", $data);
    } else {
      $data['url'] = base_url($this->class);

      $data['contents'] = "contents/parkir/laporan/{$this->class}/index";
      $this->load->view('master', $data);
    }
  }

  function _getvalue() {
    $request_value = $this->_parkir_rs->request('GET', 'parkir_tiket', [
      'query' => [
        'is_exit_time_null' => $this->input->get('is_exit_time_null'),
        'tgl_start' => date('Y-m-d', strtotime($this->input->get('tgl_start'))),
        'tgl_end' => date('Y-m-d', strtotime($this->input->get('tgl_end'))),
        ]
    ]);

    $value = json_decode($request_value->getBody()->getContents(), true);

    return $value;
  }

  /*
    @params string date
    @return string date in indo  (Bulan  Tahun)
    @example _dateID('2020-01-01') will result Januari 2020
  */
  private function _dateID($date = null) {
    if(!$date) return 'Jan 1999';
    $strBulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
    $arrBulan = explode(' ', $strBulan);

    $month = date('m', strtotime($date));
    $year = date('Y', strtotime($date));

    return $arrBulan[(int)$month-1]." - ".$year;
  }

 function pdf() {
    // Export ke pdf
      $content = $this->_getvalue();
      
      $tgl_start  = date('Y-m-d', strtotime($this->input->get('tgl_start')));
      $tgl_end    = date('Y-m-d', strtotime($this->input->get('tgl_end')));

      $pdf = new FPDF('L','mm','A4');
      $pdf->SetTitle('Laporan Parkir Tiket '.$tgl_start.' - '.$tgl_end); // $pdf->SetTitle($title);

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

      
      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFont( 'Arial', '', 14 );
      $pdf->Cell(100,12, 'Laporan Parkir Tiket', 'B',0);
      $pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
      
      $pdf->Cell(75,12, '', '', 0);

      $pdf->Cell(100,12, $tgl_start.' - '.$tgl_end, 'B', 1, 'R');
      $pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
      $pdf->ln(5);

      $pdf->SetFont( 'Arial', 'B', 7 );
      $pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
      $pdf->SetFillColor( 118, 120, 122 );
      $pdf->Cell( 10, 10, "ID", 1, 0, 'C', true );
      $pdf->Cell( 20, 10, 'Kode', 1, 0, 'C', true );
      $pdf->Cell( 20, 10, 'Plat', 1, 0, 'C', true );
      $pdf->Cell( 35, 10, 'Nomor Karcis', 1, 0, 'C', true );
      $pdf->Cell( 20, 10, 'Kendaraan', 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'Pintu Masuk', 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'Waktu Masuk', 1, 0, 'C', true );
      $pdf->Cell( 25, 10, 'Pintu Keluar', 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'Waktu Keluar', 1, 0, 'C', true );
      $pdf->Cell( 30, 10, 'Karyawan Keluar', 1, 0, 'C', true );
      $pdf->Cell( 25, 10, 'Tanggal', 1, 1, 'C', true );



      $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
      $pdf->SetFillColor( 255, 255, 255 );

      $no = 1;
      foreach($content['data']['parkir'] as $key => $value) {

        if ($value['kendaraan'] == 1) {
          $kendaraan = 'Mobil';
        }else if ($value['kendaraan'] == 2) {
          $kendaraan = 'Motor';
        }else if ($value['kendaraan'] == 3) {
          $kendaraan = 'Truk';         
        }else if ($value['kendaraan'] == 4) {
          $kendaraan = 'Truk Barang';         
        }else if ($value['kendaraan'] == 5) {
          $kendaraan = 'Truk Tronton';         
        }else{
          $kendaraan = '';
        }

        $pdf->Cell( 10, 10, $value['id'] , 'B', 0, 'C', true ); 
        $pdf->Cell( 20, 10, $value['kode'], 'B', 0, 'C', true );
        $pdf->Cell( 20, 10, $value['plat'], 'B', 0, 'C', true ); 
        $pdf->Cell( 35, 10, $value['no_karcis'], 'B', 0, 'C', true ); 
        $pdf->Cell( 20, 10, $kendaraan, 'B', 0, 'C', true ); 
        $pdf->Cell( 30, 10, $value['entry_gate'], 'B', 0, 'C', true );
        $pdf->Cell( 30, 10, $value['entry_time'], 'B', 0, 'L', true );
        $pdf->Cell( 25, 10, $value['exit_gate'], 'B', 0, 'C', true ); 
        $pdf->Cell( 30, 10, $value['exit_time'], 'B', 0, 'C', true ); 
        $pdf->Cell( 30, 10, $value['exit_employee'], 'B', 0, 'C', true ); 
        $pdf->Cell( 25, 10, $value['created_date'], 'B', 1, 'C', true ); 
      }
      $pdf->ln(10);

      $filename = 'Laporan Parkir Tiket '.$tgl_start.' - '.$tgl_end;

      $pdf->Output('',$filename);
    }


    function karcis($kode_tiket) {

    $response_prop_clinic     = $this->_parkir_rs->request('GET', 'parkir_tiket', [
      'query' => [
        'kode_karcis' => $kode_tiket
      ]
    ]);
    $content  = json_decode($response_prop_clinic->getBody()->getContents(), true)['data'];


    if ($content['selected_parkir']['kendaraan'] == 1) {
        $kendaraan = 'Mobil';
    }else if ($content['selected_parkir']['kendaraan'] == 2) {
        $kendaraan = 'Motor';
    }else if ($content['selected_parkir']['kendaraan'] == 3) {
        $kendaraan = 'Truk';         
    }else if ($content['selected_parkir']['kendaraan'] == 4) {
        $kendaraan = 'Truk Barang';         
    }else if ($content['selected_parkir']['kendaraan'] == 5) {
        $kendaraan = 'Truk Tronton';         
    }else{
        $kendaraan = '';
    }

    // $html  = $this->load->view('contents/parkir/laporan/'.$this->class.'/pdf', $data, true);

    $mpdf = new \Mpdf\Mpdf([
      'format'              => array(90, 100),
      'mode'                => 'utf-8',
      'setAutoTopMargin'    => 'stretch',
      'defaultheaderline'   => 0,
      'defaultfooterline'   => 0
    ]);

    $mpdf->SetMargins(0, 0, 12);

    $header = '
              <div class="row">
                <table border="0" width="100%">
                  <tr>
                    <td style="text-align:center;">
                      <h4>' . $content["judul"] . '</h4>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">
                      <span style="font-size:10pt;">' . $content["subjudul"] . '</span><br>
                    </td>
                  </tr>
                </table>
              </div>';

    $html = '
              <style>
                .konten{
                  font-size:7pt;
                  margin-left:-40px;
                  padding-bottom : 0px;
                  padding-right : -30px;
                }
              </style>

            <p class="konten" style="padding-top:10px">' . $content["selected_parkir"]['entry_time'] .' | '. $content["address1"].' '.$content["address2"]. '
            <br>
            '.$kendaraan.' | Plat Nomor : '.$content["selected_parkir"]['plat'].'
            </p>
            <img alt="testing" src="'.base_url().'assets/ui_temp/assets/barcode.php?&size=60&text='.$content["selected_parkir"]['no_karcis'].'&print=true"/>
            <p class="konten">'.$content["deskripsi1"].'</p>
            <p class="konten">'.$content["deskripsi2"].'</p>
            <p class="konten">'.$content["deskripsi3"].'<br>'.$content["deskripsi4"].'</p>
            ';


    $mpdf->SetTitle('Karcis Parkir - '. $content['selected_parkir']['kode']);
    $mpdf->SetHeader($header);

    // $mpdf->setFooter('PDF Hal' . '{PAGENO} / {nb}');
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);

    $mpdf->Output($name, 'I');
  }

  function struk($kode_tiket) {

    $response_prop_clinic     = $this->_parkir_rs->request('GET', 'parkir_tiket', [
      'query' => [
        'kode_struk' => $kode_tiket
      ]
    ]);
    $content  = json_decode($response_prop_clinic->getBody()->getContents(), true)['data'];


    if ($content['selected_parkir']['kendaraan'] == 1) {
        $kendaraan = 'Mobil';
    }else if ($content['selected_parkir']['kendaraan'] == 2) {
        $kendaraan = 'Motor';
    }else if ($content['selected_parkir']['kendaraan'] == 3) {
        $kendaraan = 'Truk';         
    }else if ($content['selected_parkir']['kendaraan'] == 4) {
        $kendaraan = 'Truk Barang';         
    }else if ($content['selected_parkir']['kendaraan'] == 5) {
        $kendaraan = 'Truk Tronton';         
    }else{
        $kendaraan = '';
    }

    $dt = new DateTime();
    $dt->setTimezone(new DateTimeZone($content['timezone']));
    $dt->setTimestamp(time());
    $now = $dt->format('Y-m-d H:i:s');

    $first_date = new DateTime($content['selected_parkir']['entry_time']);
    $second_date = new DateTime($now);
    $interval = $first_date->diff($second_date);

    $number = 0;
    $fee_total = 'Rp. ' . number_format($content["selected_parkir"]['fee_total'],0,',','.');
    $diskon = 'Rp. ' . number_format($content["selected_parkir"]['fee_discount'],0,',','.');

    $mpdf = new \Mpdf\Mpdf([
      'format'              => array(90, 100),
      'mode'                => 'utf-8',
      'setAutoTopMargin'    => 'stretch',
      'defaultheaderline'   => 0,
      'defaultfooterline'   => 0
    ]);

    $mpdf->SetMargins(0, 0, 12);

    $header = '
              <div class="row">
                <table border="0" width="100%" style="margin-left:-70px">
                  <tr>
                    <td>
                      <h2>' . $content["judul"] . '</h2>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">
                      =====================================
                    </td>
                  </tr>
                </table>
              </div>';

    $html = '
              <style>
                .konten{
                  font-size:9pt;
                  margin-left:-40px;
                  padding-bottom : 0px;
                  padding-right : -30px;
                }
              </style>
            <p class="konten" style="padding-top:10px; font-weight:bold">' . $content["selected_parkir"]['plat'] .' / '. $kendaraan. ' / '. $content["selected_parkir"]['kode'] .'
            <br>
            
            </p>
            <p class="konten" style="margin-left: -30px">
              No Karcis&emsp;&emsp;&nbsp;: ' . $content["selected_parkir"]['no_karcis'] .'<br>
              Masuk&emsp;&emsp;&emsp;&emsp;: ' . $content["selected_parkir"]['entry_time'] .'<br>
              Keluar&emsp;&emsp;&emsp;&emsp;: ' . $content["selected_parkir"]['exit_time'] .'<br>
              Durasi&emsp;&emsp;&emsp;&emsp;: '.$interval->d.' Hari '.$interval->h.' Jam '.$interval->i.' Menit<br>
              Pintu Keluar&emsp;: ' . $content["selected_parkir"]['exit_gate'] .'<br>
              Petugas&emsp;&nbsp;&emsp;&emsp;: ' . $content["selected_parkir"]['exit_employee'] .'<br>
              Tarif&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: ' . $fee_total .'<br>
              Diskon&emsp;&emsp;&emsp;&nbsp;&nbsp;: ' . $diskon .'<br>
              Catatan&emsp;&emsp;&emsp;: ' . $content["selected_parkir"]['catatan'] .'<br>
            ==============================</p>
            <p class="konten">'.$content['footer'].'</p>
            ';


    $mpdf->SetTitle('Karcis Parkir - '. $content['selected_parkir']['kode']);
    $mpdf->SetHeader($header);

    // $mpdf->setFooter('PDF Hal' . '{PAGENO} / {nb}');
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);

    $mpdf->Output($name, 'I');
  }

  /*
    @params: base_64 of photo, dir path(to save temporary)
    @return : (string)path of photo
    @example: base64ToImage('dasdiadsdbase64', '../assets/temp')
  */
  function base64ToImage($base64_string, $output_file) {
    $file = fopen($output_file, "wb");

    $data = explode(',', $base64_string);

    fwrite($file, base64_decode($data[1]));
    fclose($file);

    return $output_file;
  }

  function excel() {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

    // style for excel
      $header = array(
        'font' => [
          'bold' => true,
        ]
      );
      $bordered = array(
        'borders' => array(
          'allBorders' => array(
            'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => array('argb' => '000'),
          ),
        ),
      );

    $tgl_start  = date('Y-m-d', strtotime($this->input->get('tgl_start')));
    $tgl_end    = date('Y-m-d', strtotime($this->input->get('tgl_end')));
    // Data
    $request_value = $this->_parkir_rs->request('GET', 'parkir_tiket', [
      'query' => [
        'is_exit_time_null' => $this->input->get('is_exit_time_null'),
        'tgl_start' => $tgl_start,
        'tgl_end' => $tgl_end,
        ]
    ]);

    $content = json_decode($request_value->getBody()->getContents(), true);

    // trace($content);
    $row = 1;

    // Header Template
    // $sheet->mergeCells("A1:D4");
    $sheet->mergeCells("A1:N2");
    $sheet->mergeCells("A3:N4");
    $sheet->setCellValue('A1', 'Laporan Parkir Tiket');            // $sheet->setCellValue('B3', $clinic_profile['clinic_name']);
    $sheet->setCellValue('A3', $tgl_start.' - '.$tgl_end);   // $sheet->setCellValue('B1', $clinic_profile['judul']);
    // $sheet->getStyle("A1:N4")->applyFromArray($bordered);
    $sheet->getStyle("A1:N4")->applyFromArray($header);
    $sheet->getStyle("A1:N4")->getAlignment()
    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS)
    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
   
    $row = 4;
    $row += 2;
    $rowStart = $row;

    // table header
    $sheet->setCellValue('A'.$row, 'NO');
    $sheet->setCellValue('B'.$row, 'ID');
    $sheet->setCellValue('C'.$row, 'Kode');
    $sheet->setCellValue('D'.$row, 'Plat');
    $sheet->setCellValue('E'.$row, 'Nomor Karcis');
    $sheet->setCellValue('F'.$row, 'Kendaraan');
    $sheet->setCellValue('G'.$row, 'Pintu Masuk');
    $sheet->setCellValue('H'.$row, 'Waktu Masuk');
    $sheet->setCellValue('I'.$row, 'Pintu Keluar');
    $sheet->setCellValue('J'.$row, 'Waktu Keluar');
    $sheet->setCellValue('K'.$row, 'Karyawan Keluar');
    $sheet->setCellValue('L'.$row, 'Diskon');
    $sheet->setCellValue('M'.$row, 'Total Biaya');
    $sheet->setCellValue('N'.$row, 'Tanggal');
    $sheet->getRowDimension($row)->setRowHeight(30);
    $sheet->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('B')->setWidth(10);
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->getColumnDimension('D')->setWidth(10);
    $sheet->getColumnDimension('E')->setWidth(30);
    $sheet->getColumnDimension('F')->setWidth(20);
    $sheet->getColumnDimension('G')->setWidth(20);
    $sheet->getColumnDimension('H')->setWidth(20);
    $sheet->getColumnDimension('I')->setWidth(20);
    $sheet->getColumnDimension('J')->setWidth(20);
    $sheet->getColumnDimension('K')->setWidth(20);
    $sheet->getColumnDimension('L')->setWidth(20);
    $sheet->getColumnDimension('M')->setWidth(20);
    $sheet->getColumnDimension('N')->setWidth(20);
    $sheet->getStyle("A$row:N$row")->applyFromArray($header);
    $sheet->getStyle("A$row:N$row")->getAlignment()
    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS)
    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet->getStyle("N")->getAlignment()
    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS);
    $sheet->getStyle("A$row:N$row")->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('E7E7E7');
    $row++;
    $column = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];


    $no = 1;
    foreach($content['data']['parkir'] as $key => $value) {

      if ($value['kendaraan'] == 1) {
        $kendaraan = 'Mobil';
      }else if ($value['kendaraan'] == 2) {
        $kendaraan = 'Motor';
      }else if ($value['kendaraan'] == 3) {
        $kendaraan = 'Truk';         
      }else if ($value['kendaraan'] == 4) {
        $kendaraan = 'Truk Barang';         
      }else {
        $kendaraan = 'Truk Tronton';         
      }

      $sheet->setCellValue('A'.$row, $no++);
      $sheet->setCellValue('B'.$row, ($value['id']              == '' ? '-' : $value['id']));
      $sheet->setCellValue('C'.$row, ($value['kode']           == '' ? '-' : $value['kode']));
      $sheet->setCellValue('D'.$row, ($value['plat']           == '' ? '-' : $value['plat']));
      $sheet->setCellValue('E'.$row, ($value['no_karcis']      == '' ? '-' : ' '.$value['no_karcis'].' '));
      $sheet->setCellValue('F'.$row, ($kendaraan               == '' ? '-' : $kendaraan));
      $sheet->setCellValue('G'.$row, ($value['entry_gate']     == '' ? '-' : $value['entry_gate']));
      $sheet->setCellValue('H'.$row, ($value['entry_time']     == '' ? '-' : $value['entry_time']));
      $sheet->setCellValue('I'.$row, ($value['exit_gate']      == '' ? '-' : $value['exit_gate']));
      $sheet->setCellValue('J'.$row, ($value['exit_time']      == '' ? '-' : $value['exit_time']));
      $sheet->setCellValue('K'.$row, ($value['exit_employee']  == '' ? '-' : $value['exit_employee']));
      $sheet->setCellValue('L'.$row, ($value['fee_discount']   == '' ? '-' : 'Rp. ' . number_format($value['fee_discount'],0,',','.')));
      $sheet->setCellValue('M'.$row, ($value['fee_total']      == '' ? '-' : 'Rp. ' . number_format($value['fee_total'],0,',','.')));
      $sheet->setCellValue('N'.$row, ($value['created_date']   == '' ? '-' : $value['created_date']));
      $sheet->getRowDimension($row)->setRowHeight(30);
      $sheet->getColumnDimension('A')->setWidth(10);
      $sheet->getColumnDimension('B')->setWidth(10);
      $sheet->getColumnDimension('C')->setWidth(20);
      $sheet->getColumnDimension('D')->setWidth(20);
      $sheet->getColumnDimension('E')->setWidth(30);
      $sheet->getColumnDimension('F')->setWidth(20);
      $sheet->getColumnDimension('G')->setWidth(30);
      $sheet->getColumnDimension('H')->setWidth(30);
      $sheet->getColumnDimension('I')->setWidth(30);
      $sheet->getColumnDimension('J')->setWidth(30);
      $sheet->getColumnDimension('K')->setWidth(20);
      $sheet->getColumnDimension('L')->setWidth(20);
      $sheet->getColumnDimension('M')->setWidth(20);
      $sheet->getColumnDimension('N')->setWidth(30);
      
      $sheet->getStyle("A$row:N$row")->getAlignment()
      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS)
      ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
      $sheet->getStyle("N")->getAlignment()
      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS);
      $row++;
    }

    // set bordered all
    $sheet->getStyle("A$rowStart:N$row")->applyFromArray($bordered);

    ob_end_clean();
    ob_start();

    // $writer = new Xlsx($spreadsheet);
    $writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $filename = 'Laporan Parkir Tiket '.$tgl_start.' - '.$tgl_end;

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
  }
}

