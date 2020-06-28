<?php

function periode($date = null) {
   if(!$date) return 'Jan 1999';
   $strBulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
   $arrBulan = explode(' ', $strBulan);

   $month = date('m', strtotime($date));
   $year = date('Y', strtotime($date));

   return $arrBulan[(int)$month-1]." - ".$year;
 }
 
if ( !function_exists('this') )
{
    function this()
    {
        $CI =& get_instance();
        return $CI;
    }
}

if ( !function_exists('response') ) {
    function response($data, $code = 200)
    {
        ini_set('max_execution_time', 0);
        this()->output
            ->set_content_type('application/json')
            ->set_status_header($code)
            ->set_header("Pragma: no-cache")
            ->set_header("Cache-Control: no-store, no-cache")
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();

        exit;
    }
}

?>
