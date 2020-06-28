<?php 

class M_order_rad_details extends CI_Model {
        
     function __construct()
    {
        parent::__construct();

        $this->_table = 'order_rad_details';
    }

    public function getDataOrderByGroup($filter, $group){
        $this->db
            ->select('
                order_rad_details.id as id_order_details,
                kegiatan.nama as nama_kegiatan,
                kegiatan.id_kegiatan as id_parent
            ')
            ->from($this->_table)
            ->join('bt_order_rad as bt_order_rad', 'order_rad_details.id_bt_order_rad = bt_order_rad.id')
            ->join('bt_master_rad_job as master_rad_job', 'bt_order_rad.id_bt_master_rad_job = master_rad_job.id')
            ->join('order_rad as order_rad', 'order_rad_details.id_order_rad = order_rad.id')
            ->join('pasien_visit as visit', 'order_rad.id_visit = visit.id_pasien_visit')
            ->join('pasien_registrasi', 'visit.id_pasien_registrasi = pasien_registrasi.id_pasien_registrasi')
            ->join('ref_kegiatan as kegiatan', 'master_rad_job.id_ref_kegiatan = kegiatan.id')
            ->where('kegiatan.is_last_child' , '1')
            ->where('kegiatan.id_group' , $group);

            if (!empty($filter['periode_start']) && !empty($filter['periode_end']) && ($filter['periode_end']. ' 23:59:59' > $filter['periode_start'])) {
                $this->db->where('order_rad_details.created_date >=', $filter['periode_start']);
                $this->db->where('order_rad_details.created_date <=', $filter['periode_end'] . '23:59:59');
            }

            if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == '1') {
                $this->db->where('order_rad_details.del_date IS NULL');
            } else if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == '2') {
                $this->db->where('order_rad_details.del_date IS NOT NULL');
            }

            if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == '1') {
                $this->db->where('pasien_registrasi.del_date IS NULL');
            } else if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == '2') {
                $this->db->where('pasien_registrasi.del_date IS NOT NULL');
            }

            if (isset($filter['is_visit_del_date_null']) && $filter['is_visit_del_date_null'] == '1') {
                $this->db->where('visit.del_date IS NULL');
            } else if (isset($filter['is_visit_del_date_null']) && $filter['is_visit_del_date_null'] == '2') {
                $this->db->where('visit.del_date IS NOT NULL');
            }

        return $data->get()->result_array();
    }

    public function get_data_order_usg($filter , $date)
    {
        $this->db
            ->select('
                order_rad_details.id as id,
                order_rad_details.id_order_rad as id_order_rad,
                order_rad_details.created_date as created_date,
                departements.departement_id as id_dept,
                ref_payment.id_ref_payment as id_ref_payment,
                ref_payment.prefix as prefix_payment,
                notes_hasil_rad_details.jml_film as jml_film,
                bt_master_rad_job_group.id as id_bt_master_rad_job_group,
                order_rad.id_users_dpjp_rad as id_dokter,
                dokter_profile.full_name as nama_dokter
            ')
            ->from($this->_table)
            ->join('notes_hasil_rad_details as notes_hasil_rad_details', 'notes_hasil_rad_details.id_order_rad_details = order_rad_details.id')
            ->join('order_rad', 'order_rad_details.id_order_rad = order_rad.id')
            ->Join('users_profile as dokter_profile' , 'order_rad.id_users_dpjp_rad = dokter_profile.user_id', 'left')
            ->Join('bt_order_rad as bt_order_rad' , 'order_rad_details.id_bt_order_rad = bt_order_rad.id', 'left')
            ->Join('bt_master_rad_job as bt_master_rad_job' , 'bt_order_rad.id_bt_master_rad_job = bt_master_rad_job.id', 'left')
            ->Join('bt_master_rad_job_group as bt_master_rad_job_group' , 'bt_master_rad_job.id_bt_master_rad_job_group = bt_master_rad_job_group.id', 'left')
            ->join('pasien_visit as visit', 'order_rad.id_visit = visit.id_pasien_visit')
            ->join('pasien_registrasi as registrasi', 'visit.id_pasien_registrasi = registrasi.id_pasien_registrasi')
            ->join('departements as departements', 'visit.id_departemen = departements.departement_id')
            ->join('ref_payment as ref_payment', 'registrasi.id_ref_payment = ref_payment.id_ref_payment');


        // dapet data per hari
        $this->db->where('order_rad_details.created_date >=', $date . ' 00:00:00');
        $this->db->where('order_rad_details.created_date <=', $date. ' 23:59:59');

        if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == 0) {
            $this->db->where('registrasi.del_date IS NULL');
        }

        if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == 1) {
            $this->db->where('registrasi.del_date IS NOT NULL');
        }

        if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == 0) {
            $this->db->where('order_rad.del_date IS NULL');
        }

        if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == 1) {
            $this->db->where('order_rad.del_date IS NOT NULL');
        }

        if (isset($filter['id_bt_master_rad_job_group']) && !empty($filter['id_bt_master_rad_job_group'])) {
            $this->db->where('bt_master_rad_job_group.id', $filter['id_bt_master_rad_job_group']);
        }

        return $this->db->get()->result_array();
    }

    public function get_data_order_film($filter, $date)
    {
        $data = $this->db
            ->select('
                order_rad_details.id as id,
                order_rad_details.id_order_rad as id_order_rad,
                order_rad_details.created_date as created_date,
                notes_hasil_rad_details.jml_film as jml_film,
                notes_hasil_rad_details.jml_film_gagal as jml_film_gagal,
                order_rad.id_users_dpjp_rad as id_dokter,
                dokter_profile.full_name as nama_dokter
            ')
            ->from($this->_table)
            ->join('notes_hasil_rad_details as notes_hasil_rad_details', 'notes_hasil_rad_details.id_order_rad_details = order_rad_details.id')
            ->join('order_rad as order_rad', 'order_rad_details.id_order_rad = order_rad.id')
            ->join('pasien_visit as visit', 'order_rad.id_visit = visit.id_pasien_visit')
            ->join('pasien_registrasi as registrasi', 'visit.id_pasien_registrasi = registrasi.id_pasien_registrasi')
            ->join('users_profile as dokter_profile' , 'order_rad.id_users_dpjp_rad = dokter_profile.user_id', 'left');

        // dapet data per hari
        $data->where('order_rad_details.created_date >=', $date . ' 00:00:00');
        $data->where('order_rad_details.created_date <=', $date. ' 23:59:59');

        if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == 0) {
            $data->where('registrasi.del_date IS NULL');
        }

        if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == 1) {
            $data->where('registrasi.del_date IS NOT NULL');
        }

        if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == 0) {
            $data->where('order_rad.del_date IS NULL');
        }

        if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == 1) {
            $data->where('order_rad.del_date IS NOT NULL');
        }

        if (isset($filter['id_bt_master_rad_job_group']) && !empty($filter['id_bt_master_rad_job_group'])) {
            $data->where('bt_master_rad_job_group.id', $filter['id_bt_master_rad_job_group']);
        }

        return $data->get()->result_array();
    }

    public function get_data_order_poli($filter)
    {
        $data = $this->db
            ->select('
                order_rad_details.id as id,
                order_rad_details.id_order_rad as id_order_rad,
                order_rad_details.created_date as created_date,
                order_rad.id_dept_ori as id_dept,
                departements.departement_name as nama_dept,
                ref_payment.id_ref_payment as id_ref_payment,
                ref_payment.payment as nama_payment,
                ref_payment.prefix as prefix_payment,
                bt_master_rad_job_group.id as id_bt_master_rad_job_group,
                bt_master_rad_job_group.jenis_pemeriksaan as jenis_pemeriksaan,
                bt_master_rad_job_group.kategori_pemeriksaan as kategori_pemeriksaan
            ')
            ->from($this->_table)
            ->join('order_rad', 'order_rad_details.id_order_rad = order_rad.id')
            ->join('bt_order_rad as bt_order_rad' , 'order_rad_details.id_bt_order_rad = bt_order_rad.id','left')
            ->join('bt_master_rad_job as bt_master_rad_job' , 'bt_order_rad.id_bt_master_rad_job = bt_master_rad_job.id','left')
            ->join('bt_master_rad_job_group as bt_master_rad_job_group' , 'bt_master_rad_job.id_bt_master_rad_job_group = bt_master_rad_job_group.id','left')
            ->join('pasien_visit as visit', 'order_rad.id_visit = visit.id_pasien_visit')
            ->join('pasien_registrasi as registrasi', 'visit.id_pasien_registrasi = registrasi.id_pasien_registrasi')
            ->join('departements as departements', 'order_rad.id_dept_ori = departements.departement_id')
            ->join('ref_payment as ref_payment', 'registrasi.id_ref_payment = ref_payment.id_ref_payment');

        if ($filter['order_date_end']. ' 23:59:59' > $filter['order_date_start']) {
            $data->where('order_rad_details.created_date >=', $filter['order_date_start']);
            $data->where('order_rad_details.created_date <=', $filter['order_date_end']. ' 23:59:59');
        }

        if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == 0) {
            $data->where('registrasi.del_date IS NULL');
        }

        if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == 1) {
            $data->where('registrasi.del_date IS NOT NULL');
        }

        if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == 0) {
            $data->where('order_rad.del_date IS NULL');
        }

        if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == 1) {
            $data->where('order_rad.del_date IS NOT NULL');
        }

        if (isset($filter['id_bt_master_rad_job_group']) && !empty($filter['id_bt_master_rad_job_group'])) {
            $data->where('bt_master_rad_job_group.id', $filter['id_bt_master_rad_job_group']);
        }

        if (isset($filter['ref_payment_prefix']) && $filter['ref_payment_prefix'] == "0") {
            $data->where_not_in('ref_payment.prefix', array('A','B','C'));
        }

        if (isset($filter['ref_payment_prefix']) && $filter['ref_payment_prefix'] != "0") {
            $data->where('ref_payment.prefix', $filter['ref_payment_prefix']);
        }

        if (isset($filter['id_dept_ori']) && !empty($filter['id_dept_ori'])) {
            $data->where('order_rad.id_dept_ori', $filter['id_dept_ori']);
        }

        if (isset($filter['group']) && $filter['group']== 2) $filter['group'] = 4;

        if (isset($filter['group'])) {
            $data->where('departements.type', $filter['group']);
        }

        return $data->get()->result_array();
    }
}
