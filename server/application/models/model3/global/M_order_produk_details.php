<?php

class M_order_produk_details extends CI_Model
{


  function get_total($type, $periode_start, $periode_end)
  {
    // $poli = rawurldecode($poli);
    $this->db->select('
        d.id_pasien_registrasi as id_reg,
        d.no_reg as no_reg,
        f.full_name as nama_pasien,
        d.id_ref_payment as id_ref_payment,
        e.payment as nama_ref_payment
    ');

    if ($type == 'racikan') {
        $this->db->select('a.biaya_racikan as  biaya_racikan');
    }

    if ($type == 'pembulatan') {
        $this->db->select('a.biaya_pembulatan as biaya_pembulatan');
    }

    $this->db->from('order_produk_details a')
    ->join('order_produk b', 'a.id_order_produk = b.id')
    ->join('pasien_visit c', 'b.id_visit = c.id_pasien_visit')
    ->join('pasien_registrasi d' , 'c.id_pasien_registrasi = d.id_pasien_registrasi')
    ->join('ref_payment e' , 'd.id_ref_payment = e.id_ref_payment')
    ->join('users_profile f' , 'd.id_users_pasien = f.user_id')
    ->where([
        'b.del_date' => null,
        'date(d.checkin_time) >=' => $periode_start,
        'date(d.checkin_time) <=' => $periode_end,
      ]);

    return $this->db->count_all_results();
  }

  public function get($params)
  {

    $this->db->select('
        d.id_pasien_registrasi as id_reg,
        d.no_reg as no_reg,
        f.full_name as nama_pasien,
        d.id_ref_payment as id_ref_payment,
        e.payment as nama_ref_payment
    ');

    if ($params['type'] == 'racikan') {
        $this->db->select('a.biaya_racikan as  biaya_racikan');
    }

    if ($params['type'] == 'pembulatan') {
        $this->db->select('a.biaya_pembulatan as biaya_pembulatan');
    }

    $this->db->from('order_produk_details a')
    ->join('order_produk b', 'a.id_order_produk = b.id')
    ->join('pasien_visit c', 'b.id_visit = c.id_pasien_visit')
    ->join('pasien_registrasi d' , 'c.id_pasien_registrasi = d.id_pasien_registrasi')
    ->join('ref_payment e' , 'd.id_ref_payment = e.id_ref_payment')
    ->join('users_profile f' , 'd.id_users_pasien = f.user_id')
    ->where('d.id_ref_payment' , $params['id_ref_payment']);

    if (isset($params['jenis_periode']) && $params['jenis_periode'] == '0' && ($params['periode_end']. ' 23:59:59' > $params['periode_start'])) {
        $this->db->where('d.checkin_time >=', $params['periode_start'])
                 ->where('d.checkin_time <=', $params['periode_end'] . '23:59:59');
    } else if (isset($params['jenis_periode']) && $params['jenis_periode'] == '1' && ($params['periode_end']. ' 23:59:59' > $params['periode_start'])) {
        $this->db->where('d.checkout_time >=', $params['periode_start'])
                 ->where('d.checkout_time <=', $params['periode_end'] . '23:59:59');
    }


    $sql    = $this->db->get();
    $result = $sql->result();

    return [
      'result'        => $result,
      'record_total'  => $this->get_total($params['type'], $params['periode_start'], $params['periode_end']),
      'record_filter' => count($result)
    ];
  }

}


/*

Parameter example
- id ref payment = 15
- jenis_periode = 0
- periode_start = 2020-01-23
- periode_end   = 2020-01-23 23:59:59

Query Native example

SELECT `registrasi`.`id_pasien_registrasi` as `id_reg`, `registrasi`.`no_reg` as `no_reg`, `user_profile`.`full_name` as `nama_pasien`, `registrasi`.`id_ref_payment` as `id_ref_payment`, `ref_payment`.`payment` as `nama_ref_payment`, `order_produk_details`.`biaya_pembulatan` as `biaya_pembulatan`
FROM `order_produk_details` JOIN `order_produk` as `order_produk` ON `order_produk_details`.`id_order_produk` = `order_produk`.`id` JOIN `pasien_visit` as `visit` ON `order_produk`.`id_visit` = `visit`.`id_pasien_visit` JOIN `pasien_registrasi` as `registrasi` ON `visit`.`id_pasien_registrasi` = `registrasi`.`id_pasien_registrasi` JOIN `ref_payment` as `ref_payment` ON `ref_payment`.`id_ref_payment` = `registrasi`.`id_ref_payment` JOIN `users_profile` as `user_profile` ON `registrasi`.`id_users_pasien` = `user_profile`.`user_id` WHERE `registrasi`.`id_ref_payment` = '15' AND `registrasi`.`checkin_time` >= '2020-01-23' AND `registrasi`.`checkin_timea` <= '2020-06-3023:59:59'

*/