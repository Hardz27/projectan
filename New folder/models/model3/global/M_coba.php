
<?php 

class M_coba extends CI_Model
{

    public function get_data_cara_bayar($params) {
        
        $this->db
            ->select('
                order_rad_details.id id,
                order_rad_details.id_order_rad id_order_rad,
                order_rad_details.created_date created_date,
                notes_hasil_rad_details.jml_film jml_film,
                notes_hasil_rad_details.jml_film_gagal jml_film_gagal,
                order_rad.id_users_dpjp_rad id_dokter,
                dokter_profile.full_name nama_dokter,
            ')
            ->from('order_rad_details')
            ->join('notes_hasil_rad_details as notes_hasil_rad_details' , 'notes_hasil_rad_details.id_order_rad_details = order_rad_details.id')
            ->join('order_rad' , 'order_rad_details.id_order_rad = order_rad.id')
            ->join('users_profile as dokter_profile' , 'order_rad.id_users_dpjp_rad = dokter_profile.user_id', 'left')
            ->join('pasien_visit as visit' , 'order_rad.id_visit = visit.id_pasien_visit')
            ->join(' pasien_registrasi as registrasi' , 'visit.id_pasien_registrasi = registrasi.id_pasien_registrasi');
           

    }

}
