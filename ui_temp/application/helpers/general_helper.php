<?php defined('BASEPATH') or exit('No direct script access allowed');
// set global $this
if (!function_exists('this')) {
	function this()
	{
		$CI = &get_instance();
		return $CI;
	}
}

function getNameFromNumber($num)
{
	$numeric = $num % 26;
	$letter = chr(65 + $numeric);
	$num2 = intval($num / 26);
	if ($num2 > 0) {
		return getNameFromNumber($num2 - 1) . $letter;
	} else {
		return $letter;
	}
}

if (!function_exists('guzzle')) {
	function guzzle()
	{
		$client = new Client([
			'base_uri' => $CI->config->item('base_url_api') . $CI->config->item('base_url_ci')
		]);
		return $client;
	}
}


function check_session($guzzle)
{
	if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
		return false;
	}
	$auth = json_decode(this()->app_encryption->decrypt($_SESSION['auth']), true);
	$token = $auth['token'];
	try {
		$response = $guzzle->request('POST', 'login/c_login/auth', ['headers' => ['Authorization' => $token]]);
		$result   = json_decode($response->getBody()->getContents(), true);
	} catch (ClientException $e) {
		$result['status'] = $e->getResponse()->getStatusCode();
	} catch (ServerException $e) {
		$result['status'] = $e->getResponse()->getStatusCode();
	}

	if ($result['status'] == 202) {
		$status = true;
	} elseif ($result['status'] == 401) {
		$status = false;
	} elseif ($result['status'] == 404) {
		$status = false;
	} else {
		$status = false;
	}

	return $status;
}

function login_page()
{
	this()->session->sess_destroy();
	$protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . '://';
	header('location:' . this()->config->item('base_url_ms') . 'login/home?redirect=' . current_url());
}

if (!function_exists('trace')) {
	function trace($data, $stop = true)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";

		if ($stop) {
			die();
		}
	}
}


function url_mapping()
{
	$folder  = "";
	$script  = ltrim(str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']), "/");
	$raw     = explode("/", $script);
	$count   = count($raw);
	$current = $_SERVER['REQUEST_URI'];
	$x_raw   = explode('/', $current);

	foreach ($x_raw as $r) {
		if ($r != "") {
			$folder .= $r . "/";
		}
	}

	$router = str_replace($script, "", $folder);
	$sd     = str_replace(this()->router->fetch_method() . "/", "", $router);

	//nama url untuk service, subservice, menu, submenu
	$prepare_url  		 = explode("/", $router);
	$count_url 			 = count($prepare_url);
	$active_service 	 = $raw[$count - 2];
	$active_subservice 	 = $prepare_url[$count_url - 4];
	$active_menu 		 = $prepare_url[$count_url - 3];
	$active_submenu 	 = $prepare_url[$count_url - 2];

	$scheme = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://";
	$host   = $_SERVER['HTTP_HOST'] . "/";
	$url    = $scheme . $host . $script . $sd;

	$data = array(
		'url' 					 		=> $url,
		'active_service' 		=> $active_service,
		'active_subservice' => $active_subservice,
		'active_menu' 		  => $active_menu,
		'active_submenu' 		=> $active_submenu,
	);

	return $data;
}

if (!function_exists('idr_format')) {
	function idr_format($num)
	{
		$hasil_rupiah = "Rp " . number_format($num, 2, ',', '.');
		return $hasil_rupiah;
	}
}

function format_angka($num)
{
	$cek = explode(',', $num);
	if (!strpos($num, ',')) {
		$hasil = number_format($num, 2, ',', '.');
	} else {
		$hasil = $num;
	}
	return $hasil;
}

/***************************
 * 
 * Deskripsi
 * Mengambil properti user pada session auth
 * 
 * Parameter
 * $type => nama property yang akan diambil (null = semua properti)
 * 
 * Properti session auth yang disimpan pada saat user login
 * user_id
 * user_name
 * rs_name
 * rs_address
 * rs_area
 * 
 **************************/

function getsessionValue($type = '')
{
	if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
		return false;
	}

	if ($type !== '') {
		$auth = json_decode(this()->app_encryption->decrypt($_SESSION['auth']), true);
		$auth = $auth[$type];
	} else {
		$auth = json_decode(this()->app_encryption->decrypt($_SESSION['auth']), true);
	}

	return $auth;
}

function periode($date = null)
{
	if (!$date) return 'Jan 1999';
	$strBulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
	$arrBulan = explode(' ', $strBulan);

	$month = date('m', strtotime($date));
	$year = date('Y', strtotime($date));

	return $arrBulan[(int) $month - 1] . " - " . $year;
}
