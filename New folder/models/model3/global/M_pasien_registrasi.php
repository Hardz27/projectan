<?php

class M_pasien_registrasi extends CI_Model {

    public function get_data_cara_bayar($params) {
        $data = $this->db
            ->select('
                registrasi.id_pasien_registrasi as id_reg,
                registrasi.id_ref_payment as id_payment,
                registrasi.checkin_time as tanggal_checkin,
                registrasi.checkout_time as tanggal_checkout,
                registrasi.lama_rawat as lama_rawat,
                payment as nama_payment,
                registrasi.jenis_rawat as ri_rj
            ')
            ->from('pasien_registrasi as registrasi')
            // ->group_start()
            ->join('ref_payment as payment' , 'payment.id_ref_payment = registrasi.id_ref_payment AND payment.is_del = 0 AND payment.sub_payment = 0', 'left')
            // ->where('payment.is_del', 0)
            // ->where('payment.sub_payment', 0)
            // ->group_end()
            ->where('registrasi.del_date IS NULL')
            ->where('registrasi.checkout_time IS NOT NULL')
            ->where('registrasi.jenis_rawat' , 'RI');

        if (isset($params['jenis_periode']) && $params['jenis_periode'] == '0' && ($params['periode_end']. ' 23:59:59' > $params['periode_start'])) {
            $this->db->where('registrasi.checkin_time >=', $params['periode_start']);
            $this->db->where('registrasi.checkin_time <=', $params['periode_end'] . '23:59:59');

        } else if (isset($params['jenis_periode']) && $params['jenis_periode'] == '1' && ($params['periode_end']. ' 23:59:59' > $params['periode_start'])) {
            $this->db->where('registrasi.checkout_time >=', $params['periode_start']);
            $this->db->where('registrasi.checkout_time <=', $params['periode_end'] . '23:59:59');
        }

        $sql    = $this->db->get();
        $result = $sql->result();

        return $result;
    }

}


/*

Parameter example
- jenis_periode = 0
- periode_start = 2020-01-23
- periode_end   = 2020-01-23 23:59:59


Query Native
SELECT `registrasi`.`id_pasien_registrasi` as `id_reg`,
    `registrasi`.`id_ref_payment` as `id_payment`,
    `registrasi`.`checkin_time` as `tanggal_checkin`,
    `registrasi`.`checkout_time` as `tanggal_checkout`,
    `registrasi`.`lama_rawat` as `lama_rawat`,
    `payment` as `nama_payment`,
    `registrasi`.`jenis_rawat` as `ri_rj`
FROM `pasien_registrasi` as `registrasi`
    LEFT JOIN `ref_payment` as `payment` ON `payment`.`id_ref_payment` = `registrasi`.`id_ref_payment`
        AND `payment`.`is_del` = 0
        AND `payment`.`sub_payment` = 0
    WHERE `registrasi`.`del_date` IS NULL
        AND `registrasi`.`checkout_time` IS NOT NULL
        AND `registrasi`.`jenis_rawat` = 'RI'
        AND `registrasi`.`checkin_time` >= '2020-05-23'
        AND `registrasi`.`checkin_time` <= '2020-05-3023:59:59'
*/