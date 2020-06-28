<?php 

class M_kamar_bed_history extends CI_Model {
    function __construct()
    {
        parent::__construct();

        $this->_table = 'kamar_bed_history';
    }

        public function get_total($periode_start, $periode_end){

        $this->db
        ->select(
            'kamar_bed_history.id_kamar_bed_history as id_kamar_bed_history,
            kamar_bed_history.id_pasien_visit as id_visit,
            kamar.kapasitas as kapasitas,
            departements.departement_name as nama_departement,
            checkout.id as id_checkout,
            checkout.nama as alasan_checkout,
            kamar_bed_history.lama_dirawat'
        );

        $this->db->from($this->_table);
        ->join('kamar_bed as kamar_bed' , 'kamar_bed.id_bed = kamar_bed_history.id_bed')
        ->join('kamar as kamar' , 'kamar.id_kamar = kamar_bed.id_kamar')
        ->join('pasien_visit as visit' , 'kamar_bed_history.id_pasien_visit = visit.id_pasien_visit')
        ->join('pasien_registrasi as registrasi' , 'visit.id_pasien_registrasi = registrasi.id_pasien_registrasi')
        ->join('departements as departements' , 'departements.departement_id = kamar.id_departemen')
        ->join('ref_checkout as checkout' , 'checkout.id = registrasi.id_ref_checkout')
        $this->db->where([
            'payment.del_date' => null,
            'date(registrasi.checkin_time) >=' => $periode_start,
            'date(registrasi.checkin_time) <=' => $periode_end,
        ]);

        return $this->db->count_all_results();

    }

    public function get($params) {
        $this->db
            ->select(
            'kamar_bed_history.id_kamar_bed_history as id_kamar_bed_history,
            kamar_bed_history.id_pasien_visit as id_visit,
            kamar.kapasitas as kapasitas,
            departements.departement_name as nama_departement,
            checkout.id as id_checkout,
            checkout.nama as alasan_checkout,
            kamar_bed_history.lama_dirawat'
        )
        $this->db->from($this->_table);
        ->join('kamar_bed as kamar_bed' , 'kamar_bed.id_bed = kamar_bed_history.id_bed')
        ->join('kamar as kamar' , 'kamar.id_kamar = kamar_bed.id_kamar')
        ->join('pasien_visit as visit' , 'kamar_bed_history.id_pasien_visit = visit.id_pasien_visit')
        ->join('pasien_registrasi as registrasi' , 'visit.id_pasien_registrasi = registrasi.id_pasien_registrasi')
        ->join('departements as departements' , 'departements.departement_id = kamar.id_departemen')
        ->join('ref_checkout as checkout' , 'checkout.id = registrasi.id_ref_checkout')
        ->where('departements.type', 1)
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

        return [
        'result'        => $result,
        'record_total'  => $this->get_total($params['type'], $params['periode_start'], $params['periode_end']),
        'record_filter' => count($result)
        ];
    }
}

