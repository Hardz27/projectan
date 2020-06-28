<?php 

class M_pasien_visit extends CI_Model
{

    public function get_data_cara_bayar($params) {
        
        $this->db
            ->select('
                payment nama_payment,
                registrasi.id_pasien_registrasi id_reg,
                visit.id_pasien_visit id_visit,
                departements.type department_tipe,
                registrasi.id_ref_payment id_payment,
            ')
            ->from('pasien_visit visit')
            ->join('pasien_registrasi as registrasi' , 'registrasi.id_pasien_registrasi = visit.id_pasien_registrasi')
            ->join('ref_payment as payment' , 'payment.id_ref_payment = registrasi.id_ref_payment AND payment.is_del = 0 AND payment.sub_payment = 0')
            ->join('departements as departements' , 'visit.id_departemen = departements.departement_id')
            ->where('registrasi.del_date IS NULL')
            ->where('registrasi.checkout_time IS NOT NULL');

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
SELECT `payment` `nama_payment`, `registrasi`.`id_pasien_registrasi` `id_reg`, `visit`.`id_pasien_visit` `id_visit`, `departements`.`type` `department_tipe`, `registrasi`.`id_ref_payment` `id_payment`
    FROM `pasien_visit` `visit` 
        JOIN `pasien_registrasi` as `registrasi` ON `registrasi`.`id_pasien_registrasi` = `visit`.`id_pasien_registrasi`
        JOIN `ref_payment` as `payment` ON `payment`.`id_ref_payment` = `registrasi`.`id_ref_payment`
            AND `payment`.`is_del` = 0
            AND `payment`.`sub_payment` = 0
        JOIN `departements` as `departements` ON `visit`.`id_departemen` = `departements`.`departement_id`
            WHERE `registrasi`.`del_date` IS NULL 
                    AND `registrasi`.`checkout_time` IS NOT NULL
                    AND `registrasi`.`checkin_time` >= '2020-05-23'
                    AND `registrasi`.`checkin_time` <= '2020-05-3023:59:59'
*/