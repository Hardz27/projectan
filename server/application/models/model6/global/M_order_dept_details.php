<?php

class M_order_dept_details extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->_table = "order_dept_details as order_details";
    }

    public function getDataOrderByGroup($filter , $group) {
        $data = $this->db
            ->select('
                order_details.id as id_order_details,
                kegiatan.id as id_kegiatan,
                kegiatan.nama as nama_kegiatan,
                kegiatan.id_kegiatan as id_parent
            ')
            ->from($this->_table)
            ->join('bt_order_dept as bt_order_dept', 'order_details.id_bt_order_dept = bt_order_dept.id')
            ->join('bt_master_dept_job as master_dept_job', 'bt_order_dept.id_bt_master_dept_job = master_dept_job.id')
            ->join('order_dept as order_dept', 'order_details.id_order_dept = order_dept.id')
            ->join('pasien_visit as visit', 'order_dept.id_visit = visit.id_pasien_visit')
            ->join('pasien_registrasi', 'visit.id_pasien_registrasi = pasien_registrasi.id_pasien_registrasi')
            ->join('ref_kegiatan as kegiatan' , 'master_dept_job.id_ref_kegiatan = kegiatan.id AND kegiatan.is_last_child = "1" AND kegiatan.id_group = "' .$group.'"');

        if (!empty($filter['periode_start']) && !empty($filter['periode_end']) && ($filter['periode_end']. ' 23:59:59' > $filter['periode_start'])) {
            $data->where('order_details.created_date >=' , $filter['periode_start']);
            $data->where('order_details.created_date <=' , $filter['periode_end']. ' 23:59:59');
        }

        if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == '1') {
            $data->where('order_details.del_date IS NULL');
        } else if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == '2') {
            $data->where('order_details.del_date IS NOT NULL');
        }

        if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == '1') {
            $data->where('pasien_registrasi.del_date IS NULL');
        } else if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == '2') {
            $data->where('pasien_registrasi.del_date IS NOT NULL');
        }

        if (isset($filter['is_visit_del_date_null']) && $filter['is_visit_del_date_null'] == '1') {
            $data->where('visit.del_date IS NULL');
        } else if (isset($filter['is_visit_del_date_null']) && $filter['is_visit_del_date_null'] == '2') {
            $data->where('visit.del_date IS NOT NULL');
        }

        return $data->get()->result_array();
    }

}
