<?php namespace App\Models\Model1\Rs_online;

use Illuminate\Database\Eloquent\Model;

class M_order_lab_details extends Model {
    protected $table = "order_lab_details";
    protected $primaryKey = "id";

    public function getDataOrderByGroup($filter, $group){
        $data = $this
            ->select(
                'order_lab_details.id as id_order_details',
                'kegiatan.nama as nama_kegiatan',
                'kegiatan.id_kegiatan as id_parent'
            )
            ->join('bt_order_lab as bt_order_lab', 'order_lab_details.id_bt_order_lab' , '=' , 'bt_order_lab.id')
            ->join('bt_master_lab_job as master_lab_job', 'bt_order_lab.id_bt_master_lab_job' , '=' , 'master_lab_job.id')
            ->join('order_lab as order_lab', 'order_lab_details.id_order_lab', '=', 'order_lab.id')
            ->join('pasien_visit as visit', 'order_lab.id_visit', '=', 'visit.id_pasien_visit')
            ->join('pasien_registrasi', 'visit.id_pasien_registrasi', '=', 'pasien_registrasi.id_pasien_registrasi')
            ->join('ref_kegiatan as kegiatan', 'master_lab_job.id_ref_kegiatan' , '=' , 'kegiatan.id')
            ->where('kegiatan.is_last_child' , '1')
            ->where('kegiatan.id_group' , $group);

            if (!empty($filter['periode_start']) && !empty($filter['periode_end']) && ($filter['periode_end']. ' 23:59:59' > $filter['periode_start'])) {
                $data->whereBetween('order_lab_details.created_date', [$filter['periode_start'], $filter['periode_end'] . ' 23:59:59']);
            }

            if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == '1') {
                $data->whereNull('order_lab_details.del_date');
            } else if (isset($filter['is_order_del_date_null']) && $filter['is_order_del_date_null'] == '2') {
                $data->whereNotNull('order_lab_details.del_date');
            }

            if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == '1') {
                $data->whereNull('pasien_registrasi.del_date');
            } else if (isset($filter['is_reg_del_date_null']) && $filter['is_reg_del_date_null'] == '2') {
                $data->whereNotNull('pasien_registrasi.del_date');
            }

            if (isset($filter['is_visit_del_date_null']) && $filter['is_visit_del_date_null'] == '1') {
                $data->whereNull('visit.del_date');
            } else if (isset($filter['is_visit_del_date_null']) && $filter['is_visit_del_date_null'] == '2') {
                $data->whereNotNull('visit.del_date');
            }

        return $data->get();
    }
}
