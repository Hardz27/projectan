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
            ->join('ref_payment as payment' , 'payment.id_ref_payment = registrasi.id_ref_payment AND payment.is_del = 0 AND payment.sub_payment = 0', 'left')
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
        $result = $sql->result_array();

        return $result;
    }

    public function get_data_checkout ($filter) {
        $data = $this->db
            ->select('
                registrasi.id_pasien_registrasi as id_reg,
                registrasi.is_pasien_baru as is_pasien_baru,
                user_profile.gender as gender,
                registrasi.checkin_time as tanggal_checkin,
                registrasi.checkout_time as tanggal_checkout,
                registrasi.jenis_rawat as ri_rj,
                checkout.id as id_checkout,
                checkout.nama as nama_checkout,
                checkout.prefix as prefix_checkout,
                departements.departement_name as nama_dept,
                departements.departement_id as id_dept
            ')
            ->from('pasien_registrasi as registrasi')
            ->join('users_profile as user_profile' , 'registrasi.id_users_pasien = user_profile.user_id')
            ->join('ref_checkout as checkout' , 'registrasi.id_ref_checkout = checkout.id')
            ->join('departements as departements' , 'registrasi.id_dept_ruang_rawat = departements.departement_id')
            ->where('registrasi.del_date IS NULL')
            ->where('registrasi.checkout_time IS NOT NULL');

        if (isset($filter['jenis_periode']) && $filter['jenis_periode'] == '0' && ($filter['periode_end']. ' 23:59:59' > $filter['periode_start'])) {
            $this->db->where('registrasi.checkin_time >=', $filter['periode_start']);
            $this->db->where('registrasi.checkin_time <=', $filter['periode_end'] . '23:59:59');
        } else if (isset($filter['jenis_periode']) && $filter['jenis_periode'] == '1' && ($filter['periode_end']. ' 23:59:59' > $filter['periode_start'])) {
            $this->db->where('registrasi.checkout_time >=', $filter['periode_start']);
            $this->db->where('registrasi.checkout_time <=', $filter['periode_end'] . '23:59:59');
        }

        if($filter['jenis_rawat'] == 0) {
            $data->where('departements.type !=', 4);
            $data->where('registrasi.jenis_rawat', 'RJ');
        } else if ($filter['jenis_rawat'] == 1) {
            $data->where('registrasi.jenis_rawat', 'RI');
        } else if ($filter['jenis_rawat'] == 2) {
            $data->where('departements.type', 4);
            $data->where('registrasi.jenis_rawat', 'RJ');
        }

        if($filter['tipe_laporan'] == 0) {
            $data->where('checkout.level', 1);
        } else if ($filter['tipe_laporan'] == 1) {
            $data->where('checkout.is_last_child', 1);
        }

        return $data->get()->result_array();
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