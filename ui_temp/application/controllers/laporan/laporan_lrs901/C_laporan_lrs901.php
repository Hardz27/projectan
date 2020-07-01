<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH."assets/vendor/office/autoload.php";
date_default_timezone_set('Asia/Jakarta');

// use GuzzleHttp\Psr7;
use \GuzzleHttp\Client;
// use GuzzleHttp\Exception\ClientException;
// use GuzzleHttp\Exception\ServerException;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

/**********************************************************************************
 *
 * Deskripsi
 * Menampilkan halaman /rekap_rajal_perbulan
 *
 **********************************************************************************/

class C_laporan_lrs901 extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    // static session
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

	    $this->_client_rs = new Client([
	      'base_uri'  => $this->config->item('api_rs'),
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

	    $this->_laporan = new Client([
	        'base_uri'  => $this->config->item('laporan'),
	        'headers'   => [
	          'Content-Type' => 'application/json',
	          'x-token' => $token
	        ]
	    ]);

	    $this->c_folder = "laporan_lrs901";
	    $this->class = str_replace("c_", "", $this->router->fetch_class());

	    //dummy id departemen
	    $this->id_dept = 3;

	    // untuk menyimpan data ke /tmp untuk ditampilkan di cetak
	    $this->folder = $this->config->item('tmp_folder');

	    // form header
	    $this->form_header = 901;
	  }

	  function index() {
	    if($this->input->is_ajax_request()) {
	      $data['d'] = $this->_getvalue();
	      $data['title'] = $this->getTitle();
	      $data['judul'] = $this->judul().'.pdf';
	      $this->load->view("contents/laporan/{$this->class}/table", $data);
	    } else {
	      $data['url'] = base_url($this->class);

	      $data['contents'] = "contents/laporan/{$this->class}/index";
	      $this->load->view('master', $data);
	    }
	  }

	  private function judul()
	  {
	    // id form header
	    $id_form = $this->form_header;

	    $form = $this->_client_ref->request('GET', 'form', [
	      'query' => ['id' => $id_form]
	    ]);

	    $form = json_decode($form->getbody()->getcontents(), true);
	    $form = $form['data'];

	    return $form['pdf_file_name'].$this->_dateID($this->input->get('tgl_start1'),$this->input->get('tgl_end2'));
	  }

	  private function getTitle()
	  {
	  	// id form header
	    $id_form = $this->form_header;

	    $form = $this->_client_ref->request('GET', 'form', [
	      'query' => ['id' => $id_form]
	    ]);

	    $form = json_decode($form->getbody()->getcontents(), true);
	    $form = $form['data'];

	    return $form['nama_form']; // title
	  }

  function _getvalue() {
  	$date_start1 = $this->input->get('tgl_start1');
    $akhir1 = $this->input->get('tgl_end1');
    $tanggal1 = explode('-', $akhir1);
    if ($tanggal1[2] == '30') {
      $date_end1 = date('Y-m-t', strtotime($this->input->get('tgl_end1')));
    } else {
      $date_end1 = $this->input->get('tgl_end1');
    }

    $date_start2 = $this->input->get('tgl_start2');
    $akhir2 = $this->input->get('tgl_end2');
    $tanggal2 = explode('-', $akhir2);
    if ($tanggal2[2] == '30') {
      $date_end2 = date('Y-m-t', strtotime($this->input->get('tgl_end2')));
    } else {
      $date_end2 = $this->input->get('tgl_end2');
    }

    $request_value = $this->_laporan->request('GET', (!empty($this->input->get('tgl_start1')) && !empty($this->input->get('tgl_end2'))?'laporan_rekap/lrs901':'laporan_rekap/ref/lrs901'), [
      'query' => [
      	'tipe_laporan' => '0',
        'jenis_periode' => '0',
        'periode_start_1' => $date_start1,
        'periode_end_1' => $date_end1,
        'periode_start_2' => $date_start2,
        'periode_end_2' => $date_end2,
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
  private function _dateID($date1 = null, $date2 = null) {
    if(!$date1 && !$date2) return 'Jan 1999';
    $strBulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
    $arrBulan = explode(' ', $strBulan);

    $month1 = date('m', strtotime($date1));
    $year1 = date('Y', strtotime($date1));

    $month2 = date('m', strtotime($date2));
    $year2 = date('Y', strtotime($date2));

    return $month1."-".$year1."_".$month2."-".$year2;
  }

  	function pdf() {
    $rs_key = $this->session->userdata('rs_key');

    $response_prop_clinic     = $this->_client_rs->request('GET', 'clinic_profile', [
      'query' => ['rs_key' => $rs_key]
    ]);
    $prop_clinic = json_decode($response_prop_clinic->getBody()->getContents(), true);
    $clinic_profile = $prop_clinic['data'];

    // id form header
    $id_form = $this->form_header;

    $form = $this->_client_ref->request('GET', 'form', [
      'query' => ['id' => $id_form]
    ]);

    $form = json_decode($form->getbody()->getcontents(), true);
    $form = $form['data'];

    $title  = $form['nama_form']; // title pdf
    $kode   = $form['kode_form']; // kode form

    $content = $this->_getvalue();

    $data = [
      'title' => $title,
      'content' => $content,
      'periode' => $this->_dateID($this->input->get('tgl_start1'),$this->input->get('tgl_end2'))
    ];
    $name   = $form['pdf_file_name'] . $data['periode'] . '.pdf'; // nama form
    
    $html  = $this->load->view('contents/laporan/'.$this->class.'/pdf', $data, true);

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

  function excel()
	{
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

		$status_css = [
			'font' => [
				'color' => [
					'argb' => '000'
				]
			]
		];


		// clicic profile
		$rs_key = $this->session->userdata('rs_key');

		$response_prop_clinic     = $this->_client_rs->request('GET', 'clinic_profile', [
			'query' => ['rs_key' => $rs_key]
		]);
		$prop_clinic = json_decode($response_prop_clinic->getBody()->getContents(), true);
		$clinic_profile = $prop_clinic['data'];

		// nama depo
		$response_dept = $this->_client_rs->request('GET', 'departements', [
			'query' => ['id' => $this->session->userdata('id_departement')]
		]);
		$response_dept = json_decode($response_dept->getBody()->getContents(), true);
		$nama_dept = $response_dept['data'][0]['departement_name'];

		// id form header
		$id_form = $this->form_header;;

		$form = $this->_client_ref->request('GET', 'form', [
			'query' => ['id' => $id_form]
		]);

		$form = json_decode($form->getbody()->getcontents(), true);
		$form = $form['data'];

		$title  = $form['nama_form']; // title pdf
		$kode   = $form['kode_form']; // kode form

		// get api data from server
		$content = $this->_getvalue();

		$row = 1;

		// Header Template
		$sheet->mergeCells("A1:B4");
		$sheet->mergeCells("C1:M2");
		$sheet->mergeCells("C3:M4");
		$sheet->mergeCells("N1:N4");
		$sheet->setCellValue('C1', $title);
		$sheet->setCellValue('C3', $clinic_profile['clinic_name']);
		$sheet->setCellValue('N1', $kode);
		$sheet->getStyle("A1:N4")->applyFromArray($bordered);
		$sheet->getStyle("A1:N4")->applyFromArray($header);
		$sheet->getStyle("C1:N1")->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS)
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$sheet->getStyle("C3")->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS)
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

		// image
		$drawing = new Drawing();
		$drawing->setName('Logo');
		$drawing->setDescription('Medikapro');
		$drawing->setPath($this->base64ToImage($clinic_profile['logo1'], 'assets/image/temp_logo.png')); // put your path and image here
		$drawing->setCoordinates('A1');
		$drawing->setHeight(65);
		$drawing->setOffsetX(200);
		$drawing->setOffsetY(5);
		$drawing->setRotation(0);
		$drawing->getShadow()->setVisible(false);
		$drawing->setWorksheet($sheet);

		$row = 6;
		// Form info

		$sheet->setCellValue('A' . $row, 'Periode 1 : ' . $this->input->get('tgl_start1') . ' - ' . $this->input->get('tgl_end1'));
		$row++;
		$sheet->setCellValue('A' . $row, 'Periode 2 : ' . $this->input->get('tgl_start2') . ' - ' . $this->input->get('tgl_end2'));
		$sheet->setCellValue('N' . $row, 'Report generated at : ' . date("Y-m-d H:i:s"));
		$sheet->getStyle("N".$row)->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$row += 2;
		$fr = $row;
		$r1 = $fr;
		$r2 = $fr +1;
		// table header
		$sheet->mergeCells('A'.$r1.':A'.$r2);
		$sheet->mergeCells('B'.$r1.':B'.$r2);
		$sheet->setCellValue('A'.$r1, 'No'); // No
		$sheet->setCellValue('B'.$r1, 'Jenis Kegiatan'); // Jenis Kegiatan
		$sheet->setCellValue('C'.$r1, 'Periode 1'); // Periode 1
		$sheet->setCellValue('D'.$r1, 'Periode 2'); // Periode 2
		$sheet->mergeCells('C'.$r2.':D'.$r2);
		$sheet->mergeCells('E'.$r1.':E'.$r2);
		$sheet->mergeCells('F'.$r1.':F'.$r2);
		$sheet->setCellValue('C'.$r2, 'KUNJUNGAN BARU'); // KUNJUNGAN BARU
		$sheet->setCellValue('E'.$r1, 'TREN'); // TREN
		$sheet->setCellValue('F'.$r1, '%'); // TREN

		$sheet->mergeCells('G'.$r2.':H'.$r2);
		$sheet->mergeCells('I'.$r1.':I'.$r2);
		$sheet->mergeCells('J'.$r1.':J'.$r2);
		$sheet->setCellValue('G'.$r1, 'Periode 1'); // Periode 1
		$sheet->setCellValue('H'.$r1, 'Periode 2'); // Periode 2
		$sheet->setCellValue('G'.$r2, 'KUNJUNGAN LAMA'); // Jenis Kegiatan
		$sheet->setCellValue('I'.$r1, 'TREN'); // TREN
		$sheet->setCellValue('J'.$r1, '%'); // %

		$sheet->mergeCells('M'.$r1.':M'.$r2);
		$sheet->mergeCells('N'.$r1.':N'.$r2);
		$sheet->setCellValue('K'.$r1, 'Periode 1'); // Periode 1
		$sheet->setCellValue('L'.$r1, 'Periode 2'); // Periode 2
		$sheet->setCellValue('K'.$r2, 'TOTAL');
		$sheet->setCellValue('L'.$r2, 'TOTAL');
		$sheet->setCellValue('M'.$r1, 'TREN'); // TREN
		$sheet->setCellValue('N'.$r1, '%'); // %

		$sheet->getRowDimension($row)->setRowHeight(25);
		$sheet->getColumnDimension('A')->setWidth(5);
		$sheet->getColumnDimension('B')->setWidth(25);
		$sheet->getColumnDimension('C')->setWidth(10);
		$sheet->getColumnDimension('D')->setWidth(10);
		$sheet->getColumnDimension('E')->setWidth(10);
		$sheet->getColumnDimension('F')->setWidth(10);
		$sheet->getColumnDimension('G')->setWidth(10);
		$sheet->getColumnDimension('H')->setWidth(10);

		$sheet->getColumnDimension('I')->setWidth(10);
		$sheet->getColumnDimension('J')->setWidth(10);
		$sheet->getColumnDimension('K')->setWidth(10);
		$sheet->getColumnDimension('L')->setWidth(10);
		$sheet->getColumnDimension('M')->setWidth(10);
		$sheet->getColumnDimension('N')->setWidth(10);
		$sheet->getStyle("A".$r1.":N".$r2)->applyFromArray($header);
		$sheet->getStyle("A".$r1.":N".$r2)->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS)
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$sheet->getStyle("C")->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS);
		$sheet->getStyle("A".$r1.":N".$r2)->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()->setARGB('E7E7E7');
		$sheet->getStyle('F')->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('G')->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('H')->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle("A".$r1.":N".$r2)->applyFromArray($bordered);

		$row++;
		$column = ['A', 'B', 'C', 'D', 'E', 'F', 'G','H','I','J','K','L','M','N'];


		$sheet->getStyle("A".$r2.":N".$r2)->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS);
		$no = 1;
		$kb1 = 0; $kb2 = 0; (float)$pcn1 = 0; $kl1 = 0; $kl2 = 0; (float)$pcn2 = 0; $ttl1 = 0; $ttl2 = 0; (float)$pcn3 = 0;
        $turun1 = 0;
        $turun2 = 0;
        $turun3 = 0;
        $naik1 = 0;
        $naik2 = 0;
        $naik3 = 0;
        $tetap1 = 0;
        $tetap2 = 0;
        $tetap3 = 0;

		$startRow = $row;
		if ($content['code'] == '200') {
			foreach ($content['data'] as $key => $v) {
				$row++;
				($v['kunjungan_baru']['tren'] == 'TETAP'?$tetap1++:($v['kunjungan_baru']['tren'] == 'TURUN'?$turun1++:$naik1++));

	            ($v['kunjungan_lama']['tren'] == 'TETAP'?$tetap2++:($v['kunjungan_lama']['tren'] == 'TURUN'?$turun2++:$naik2++));

	            ($v['kunjungan_total']['tren'] == 'TETAP'?$tetap3++:($v['kunjungan_total']['tren'] == 'TURUN'?$turun3++:$naik3++));

	            $kb1 += $v['periode_1']['baru'];
	            $kb2 += $v['periode_2']['baru'];
	            $pcn1 += (float)$v['kunjungan_baru']['%'];

	            $kl1 += $v['periode_1']['lama'];
	            $kl2 += $v['periode_2']['lama'];
	            $pcn2 += (float)$v['kunjungan_lama']['%'];

	            $ttl1 += ($v['periode_1']['baru'] + $v['periode_1']['lama']);
	            $ttl2 += ($v['periode_2']['baru'] + $v['periode_2']['lama']);
	            $pcn3 += (float)$v['kunjungan_total']['%'];

				$sheet->setCellValue('A' . $row, $no++);
				$sheet->setCellValue('B' . $row, $key);
				$sheet->setCellValue('C' . $row, format_angka($v['periode_1']['baru']));
				$sheet->setCellValue('D' . $row, format_angka($v['periode_2']['baru']));
				$sheet->setCellValue('E' . $row, $v['kunjungan_baru']['tren']);
				if (strtoupper($v['kunjungan_baru']['tren']) != 'TETAP') {
					$sheet->getStyle("E".$row)->getFill()
						->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
						->getStartColor()->setARGB((strtoupper($v['kunjungan_baru']['tren']) == 'TURUN'?'ff7272':'72a0ff')); // turun, naik
					$sheet->getStyle("E".$row)->applyFromArray($status_css);
				}
				$sheet->setCellValue('F' . $row, format_angka($v['kunjungan_baru']['%']).' %');
				$sheet->setCellValue('G' . $row, format_angka($v['periode_1']['lama']));
				$sheet->setCellValue('H' . $row, format_angka($v['periode_2']['lama']));
				$sheet->setCellValue('I' . $row, $v['kunjungan_lama']['tren']);
				if (strtoupper($v['kunjungan_lama']['tren']) != 'TETAP') {
					$sheet->getStyle("I".$row)->getFill()
						->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
						->getStartColor()->setARGB((strtoupper($v['kunjungan_lama']['tren']) == 'TURUN'?'ff7272':'72a0ff')); // turun, naik
					$sheet->getStyle("I".$row)->applyFromArray($status_css);
				}
				$sheet->setCellValue('J' . $row, format_angka($v['kunjungan_lama']['%']).' %');
				$sheet->setCellValue('K' . $row, format_angka($v['periode_1']['baru']+$v['periode_1']['lama']));
				$sheet->setCellValue('L' . $row, format_angka($v['periode_2']['baru']+$v['periode_2']['lama']));
				$sheet->setCellValue('M' . $row, $v['kunjungan_total']['tren']);
				if (strtoupper($v['kunjungan_total']['tren']) != 'TETAP') {
					$sheet->getStyle("M".$row)->getFill()
						->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
						->getStartColor()->setARGB((strtoupper($v['kunjungan_total']['tren']) == 'TURUN'?'ff7272':'72a0ff')); // turun, naik
					$sheet->getStyle("M".$row)->applyFromArray($status_css);
				}
				$sheet->setCellValue('N' . $row, format_angka($v['kunjungan_total']['%']).' %');
			}
		}
		$arr1 = [$turun1 => 'Turun', $naik1 => 'Naik', $tetap1 => 'Tetap'];
                $arr2 = [$turun2 => 'Turun', $naik2 => 'Naik', $tetap2 => 'Tetap'];
                $arr3 = [$turun3 => 'Turun', $naik3 => 'Naik', $tetap3 => 'Tetap'];

        $n1 = max(array_keys($arr1));
        $n2 = max(array_keys($arr2));
        $n3 = max(array_keys($arr3));

		$row++;
		$sheet->mergeCells('A'.$row.':B'.$row.'');
		$sheet->setCellValue('A'.$row, 'TOTAL');
		$sheet->getStyle('A'.$row.':B'.$row)->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS)
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$sheet->getStyle('A'.$row.':N'.$row)->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()->setARGB('E7E7E7');

		// Footer Total Start From B Column
		$sheet->setCellValue('C'.$row, format_angka($kb1));
		$sheet->setCellValue('D'.$row, format_angka($kb2));
		$sheet->setCellValue('E'.$row, strtoupper($arr1[$n1]));
		if (strtoupper($arr1[$n1]) != 'TETAP') {
			$sheet->getStyle("E".$row)->getFill()
				->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				->getStartColor()->setARGB((strtoupper($arr1[$n1]) == 'TURUN'?'ff7272':'72a0ff')); // turun, naik
			$sheet->getStyle("E".$row)->applyFromArray($status_css);
		}
		$sheet->setCellValue('F'.$row, format_angka($pcn1).' %');
		$sheet->setCellValue('G'.$row, format_angka($kl1));
		$sheet->setCellValue('H'.$row, format_angka($kl2));
		$sheet->setCellValue('I'.$row, strtoupper($arr2[$n2]));
		if (strtoupper($arr2[$n2]) != 'TETAP') {
			$sheet->getStyle("I".$row)->getFill()
				->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				->getStartColor()->setARGB((strtoupper($arr2[$n2]) == 'TURUN'?'ff7272':'72a0ff')); // turun, naik
			$sheet->getStyle("I".$row)->applyFromArray($status_css);
		}
		$sheet->setCellValue('J'.$row, format_angka($pcn2).' %');
		$sheet->setCellValue('K'.$row, format_angka($ttl1));
		$sheet->setCellValue('L'.$row, format_angka($ttl2));
		$sheet->setCellValue('M'.$row, strtoupper($arr3[$n3]));
		if (strtoupper($arr3[$n3]) != 'TETAP') {
			$sheet->getStyle("M".$row)->getFill()
				->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				->getStartColor()->setARGB((strtoupper($arr3[$n3]) == 'TURUN'?'ff7272':'72a0ff')); // turun, naik
			$sheet->getStyle("M".$row)->applyFromArray($status_css);
		}
		$sheet->setCellValue('N'.$row, format_angka($pcn3).' %');		

		// set bordered all
		$sheet->getStyle("A10:N".$row)->applyFromArray($bordered);
		$sheet->getStyle("A".$row.":N".$row)->applyFromArray($header);
		$sheet->getStyle("A".$startRow.":A".$row)->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS);
		$sheet->getStyle("C10:N".$row)->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS);

		$writer = new Xlsx($spreadsheet);
		$filename = $form['pdf_file_name'];

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $this->judul() . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
