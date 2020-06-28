<?php 

class M_kamar_bed_history extends CI_Model {

    public function get_kamar_history($filter) {
        $data = $this->db->select('
            kamar_bed_history.id_kamar_bed_history as id_kamar_bed_history,
            kamar_bed_history.id_pasien_visit as id_visit,
            kamar.kapasitas as kapasitas,
            departements.departement_name as nama_departement,
            checkout.id as id_checkout,
            checkout.nama as alasan_checkout,
            kamar_bed_history.lama_dirawat'
        )
        ->from('kamar_bed_history')
        ->join('kamar_bed as kamar_bed' , 'kamar_bed.id_bed = kamar_bed_history.id_bed')
        ->join('kamar as kamar' , 'kamar.id_kamar = kamar_bed.id_kamar')
        ->join('pasien_visit as visit' , 'kamar_bed_history.id_pasien_visit = visit.id_pasien_visit')
        ->join('pasien_registrasi as registrasi' , 'visit.id_pasien_registrasi = registrasi.id_pasien_registrasi')
        ->join('departements as departements' , 'departements.departement_id = kamar.id_departemen')
        ->join('ref_checkout as checkout' , 'checkout.id = registrasi.id_ref_checkout')
        ->where('departements.type', '1')
        ->where('registrasi.id_ref_checkout IS NOT NULL');

        if (isset($filter['jenis_periode']) && $filter['jenis_periode'] == '0' && ($filter['periode_end']. ' 23:59:59' > $filter['periode_start'])) {
            $this->db->where('registrasi.checkin_time >=', $filter['periode_start']);
            $this->db->where('registrasi.checkin_time <=', $filter['periode_end'] . '23:59:59');

        } else if (isset($filter['jenis_periode']) && $filter['jenis_periode'] == '1' && ($filter['periode_end']. ' 23:59:59' > $filter['periode_start'])) {
            $this->db->where('registrasi.checkout_time >=', $filter['periode_start']);
            $this->db->where('registrasi.checkout_time <=', $filter['periode_end'] . '23:59:59');
        }

        return $data->get()->result_array();
    }
}
