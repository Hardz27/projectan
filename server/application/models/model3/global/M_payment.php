<?php 

class M_payment extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->_table = 'payment';
	}

    public function get_total($periode_start, $periode_end){

        $this->db->select('
            registrasi.id_pasien_registrasi as id_reg,
            registrasi.no_reg as no_reg,
            user_profile.full_name as nama_pasien,
            payment.adm_fee as biaya_admin,
            registrasi.id_ref_payment as id_ref_payment,
            ref_payment.payment as nama_ref_paymen'
        );

        $this->db->from($this->_table);
        $this->db->join('pasien_registrasi as registrasi' , 'payment.id_reg = registrasi.id_pasien_registrasi');
        $this->db->join('users_profile as user_profile' , 'registrasi.id_users_pasien = user_profile.user_id');
        $this->db->join('ref_payment as ref_payment' , 'ref_payment.id_ref_payment = registrasi.id_ref_payment');
        $this->db->where([
            'payment.del_date' => null,
            'date(registrasi.checkin_time) >=' => $periode_start,
            'date(registrasi.checkin_time) <=' => $periode_end,
        ]);

        return $this->db->count_all_results();

    }

    public function get($params)
    {
        $this->db->select('
            registrasi.id_pasien_registrasi as id_reg,
            registrasi.no_reg as no_reg,
            user_profile.full_name as nama_pasien,
            payment.adm_fee as biaya_admin,
            registrasi.id_ref_payment as id_ref_payment,
            ref_payment.payment as nama_ref_paymen'
        );

        $this->db->from($this->_table);
        $this->db->join('pasien_registrasi as registrasi' , 'payment.id_reg = registrasi.id_pasien_registrasi');
        $this->db->join('users_profile as user_profile' , 'registrasi.id_users_pasien = user_profile.user_id');
        $this->db->join('ref_payment as ref_payment' , 'ref_payment.id_ref_payment = registrasi.id_ref_payment');

        if (isset($params['id_ref_payment'])) {
            $this->db->where('registrasi.id_ref_payment' , $params['id_ref_payment']);
        }

        if (isset($params['jenis_periode']) && $params['jenis_periode'] == '0' && ($params['periode_end']. ' 23:59:59' > $params['periode_start'])) {
            $this->db->where('registrasi.checkin_time >=', $params['periode_start']);
            $this->db->where('registrasi.checkin_time <=', $params['periode_end'] . '23:59:59');

        } else if (isset($params['jenis_periode']) && $params['jenis_periode'] == '1' && ($params['periode_end']. ' 23:59:59' > $params['periode_start'])) {
            $this->db->where('registrasi.checkout_time >=', $params['periode_start']);
            $this->db->where('registrasi.checkout_time <=', $params['periode_end'] . '23:59:59');
        }
        
        $sql    = $this->db->get();
        $result = $sql->result();

        return [
          'result'        => $result,
          'record_total'  => $this->get_total($params['periode_start'], $params['periode_end']),
          'record_filter' => count($result)
        ];
    }

}



/*

Parameter example
- id ref payment = 1
- jenis_periode = 0
- periode_start = 2020-01-23
- periode_end   = 2020-01-23 23:59:59

Query Native example

SELECT `registrasi`.`id_pasien_registrasi` as `id_reg`, `registrasi`.`no_reg` as `no_reg`, `user_profile`.`full_name` as `nama_pasien`, `payment`.`adm_fee` as `biaya_admin`, `registrasi`.`id_ref_payment` as `id_ref_payment`, `ref_payment`.`payment` as `nama_ref_paymen`
FROM `payment`
JOIN `pasien_registrasi` as `registrasi` ON `payment`.`id_reg` = `registrasi`.`id_pasien_registrasi`
JOIN `users_profile` as `user_profile` ON `registrasi`.`id_users_pasien` = `user_profile`.`user_id`
JOIN `ref_payment` as `ref_payment` ON `ref_payment`.`id_ref_payment` = `registrasi`.`id_ref_payment`
WHERE `registrasi`.`id_ref_payment` = '1' AND `registrasi`.`checkout_time` >= '2020-01-23' AND `registrasi`.`checkout_time` <= '2020-06-3023:59:59' 

*/