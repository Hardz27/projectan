<?php


class M_order_rad_details_server_side extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('model3/global/M_order_rad_details_jasmed', 'order_rad_details_jasmed');
        $this->_table = "order_rad_details";
    }

    public function get_all($param)
    {
        $dataOrderRadDetails = $this->generateQuery($param);
        $total_data = count($dataOrderRadDetails);


        if (isset($param['offset']) && isset($param['limit'])) {
            $dataOrderRadDetails->offset($param['offset'])->limit($param['limit']);
        }

        return [
            'total_data' => $total_data,
            'data' => $dataOrderRadDetails
        ];
    }

    public function find_by_id($id = null, $param) {
        if (!empty($id)) {
            $param['id_order'] = $id;
        }
        $dataOrderRadDetails = $this->generateQuery($param)->get();

        return $dataOrderRadDetails;
    }

    public function generateQuery($param)
    {
        $query = $this->db
            ->select('
                `order_rad_details`.`id` as `id`,
                `order_rad_details`.`id_order_rad` as `id_order_rad`,
                `order_rad_details`.`nama_bt_order_rad` as `nama_bt_order_rad`,
                `order_rad_details`.`harga_bt_order_rad` as `harga_bt_order_rad`,
                `order_rad_details`.`created_date` as `created_date`,
                `order_rad_details`.`created_by` as `created_by`,
                `order_rad_details`.`del_date` as `del_date`,
                `order_rad_details`.`del_by` as `del_by`,
                `order_rad`.`id` as `order_rad_details.order_rad.id`,
                `order_rad`.`no_order_rad` as `order_rad_details.order_rad.no_order_rad`,
                `order_rad`.`id_visit` as `order_rad_details.order_rad.id_visit`,
                `order_rad`.`id_dept_ori` as `order_rad_details.order_rad.id_dept_ori`,
                `order_rad`.`id_dept_dest` as `order_rad_details.order_rad.id_dept_dest`,
                `order_rad`.`is_cito` as `order_rad_details.order_rad.is_cito`,
                `order_rad`.`klinis_pasien` as `order_rad_details.order_rad.klinis_pasien`,
                `order_rad`.`created_by` as `order_rad_details.order_rad.created_by`,
                `order_rad`.`created_date` as `order_rad_details.order_rad.created_date`,
                `order_rad`.`del_date` as `order_rad_details.order_rad.del_date`,
                `order_rad`.`del_by` as `order_rad_details.order_rad.del_by`,
                `order_rad`.`id_users_dpjp_rad` as `id_users_dpjp_rad`,
                `user_dpjp_rad`.`full_name` as `nama_users_dpjp_rad`,
                `visit`.`id_pasien_visit` as `order_rad.visit.id_pasien_visit`,
                `visit`.`no_visit` as `order_rad.visit.no_visit`,
                `visit`.`id_pasien_registrasi` as `order_rad.visit.id_pasien_registrasi`,
                `visit`.`id_departemen` as `order_rad.visit.id_departemen`,
                `visit`.`id_hrd` as `order_rad.visit.id_hrd`,
                `visit`.`checkin_time` as `order_rad.visit.checkin_time`,
                `visit`.`by_id_user` as `order_rad.visit.by_id_user`,
                `visit`.`del_date` as `order_rad.visit.del_time`,
                `visit`.`del_by` as `order_rad.visit.del_by`,
                `dept_ori`.`departement_id` as `order_rad.dept_ori.departement_id`,
                `dept_ori`.`departement_name` as `order_rad.dept_ori.departement_name`,
                `dept_ori`.`rs_key` as `order_rad.dept_ori.rs_key`,
                `dept_dest`.`departement_id` as `order_rad.dept_dest.departement_id`,
                `dept_dest`.`departement_name` as `order_rad.dept_dest.departement_name`,
                `dept_dest`.`rs_key` as `order_rad.dept_dest.rs_key`,
                `pasien_registrasi`.`id_pasien_registrasi` as `visit.pasien_registrasi.id_pasien_registrasi`,
                `pasien_registrasi`.`id_users_pasien` as `visit.pasien_registrasi.id_users_pasien`,
                `pasien_registrasi`.`is_pasien_baru` as `visit.pasien_registrasi.is_pasien_baru`,
                `pasien_registrasi`.`no_reg` as `visit.pasien_registrasi.no_reg`,
                `pasien_registrasi`.`id_ref_payment` as `visit.pasien_registrasi.id_ref_payment`,
                `pasien_registrasi`.`id_hrd_dokter` as `visit.pasien_registrasi.id_hrd_dokter`,
                `pasien_registrasi`.`id_dept_ruang_rawat` as `visit.pasien_registrasi.id_dept_ruang_rawat`,
                `pasien_registrasi`.`rs_key` as `visit.pasien_registrasi.rs_key`,
                `pasien_registrasi`.`created_by` as `visit.pasien_registrasi.created_by`,
                `pasien_registrasi`.`checkin_time` as `visit.pasien_registrasi.checkin_time`,
                `pasien_registrasi`.`checkout_time` as `visit.pasien_registrasi.checkout_time`,
                `pasien_registrasi`.`checkout_by` as `visit.pasien_registrasi.checkout_by`,
                `pasien_registrasi`.`code_icd10_awal` as `visit.pasien_registrasi.code_icd10_awal`,
                `pasien_registrasi`.`del_date` as `visit.pasien_registrasi.del_time`,
                `pasien_registrasi`.`del_by_user` as `visit.pasien_registrasi_del_by_user.user_id`,
                `pasien_registrasi`.`del_by` as `visit.pasien_registrasi_del_by_user.full_name`,
                `id_users_pasien`.`user_id` as `pasien_registrasi.id_users_pasien.user_id`,
                `id_users_pasien`.`no_rm` as `pasien_registrasi.id_users_pasien.no_rm`,
                `id_users_pasien`.`bpjs_id` as `pasien_registrasi.id_users_pasien.bpjs_id`,
                `id_users_pasien`.`number_id` as `pasien_registrasi.id_users_pasien.number_id`,
                `id_users_pasien`.`mobile_phone` as `pasien_registrasi.id_users_pasien.mobile_phone`,
                `id_users_pasien`.`full_name` as `pasien_registrasi.id_users_pasien.full_name`,
                `id_users_pasien`.`address` as `pasien_registrasi.id_users_pasien.address`,
                `id_users_pasien`.`email` as `pasien_registrasi.id_users_pasien.email`,
                `id_users_pasien`.`id_kel` as `pasien_registrasi.id_users_pasien.id_kel`,
                `id_users_pasien`.`blood_type` as `pasien_registrasi.id_users_pasien.blood_type`,
                `id_users_pasien`.`gender` as `pasien_registrasi.id_users_pasien.gender`,
                `id_users_pasien`.`dob` as `pasien_registrasi.id_users_pasien.dob`,
                `ref_payment`.`id_ref_payment` as `pasien_registrasi.ref_payment.id_ref_payment`,
                `ref_payment`.`id_kegiatan` as `pasien_registrasi.ref_payment.id_kegiatan`,
                `ref_payment`.`payment` as `pasien_registrasi.ref_payment.payment`,
                `ref_payment`.`prefix` as `pasien_registrasi.ref_payment.prefix`,
                `ref_payment`.`status` as `pasien_registrasi.ref_payment.status`,
                `ref_payment`.`sub_payment` as `pasien_registrasi.ref_payment.sub_payment`,
                `ref_payment`.`payor_cd` as `pasien_registrasi.ref_payment.payor_cd`,
                `ref_payment`.`jenis_cara_bayar` as `pasien_registrasi.ref_payment.jenis_cara_bayar`,

                `id_hrd_dokter`.`user_id` as `pasien_registrasi.id_hrd_dokter.user_id`,
                `id_hrd_dokter`.`no_rm` as `pasien_registrasi.id_hrd_dokter.no_rm`,
                `id_hrd_dokter`.`full_name` as `pasien_registrasi.id_hrd_dokter.full_name`,
                `id_dept_ruang_rawat`.`departement_id` as `pasien_registrasi.id_dept_ruang_rawat.departement_id`,
                `id_dept_ruang_rawat`.`departement_name` as `pasien_registrasi.id_dept_ruang_rawat.departement_name`,
                `id_dept_ruang_rawat`.`rs_key` as `pasien_registrasi.id_dept_ruang_rawat.rs_key`,
                `departemen`.`departement_id` as `visit.departemen.departement_id`,
                `departemen`.`departement_name` as `visit.id_departemen.departement_name`,
                `departemen`.`rs_key` as `visit.id_departemen.rs_key`,
                `hrd`.`user_id` as `visit.id_hrd.user_id`,
                `hrd`.`full_name` as `visit.id_hrd.full_name`,
                `pasien_registrasi_created_by`.`user_id` as `visit.pasien_registrasi_created_by.user_id`,
                `pasien_registrasi_created_by`.`full_name` as `visit.pasien_registrasi_created_by.full_name`,
                `pasien_registrasi_checkout_by`.`user_id` as `visit.pasien_registrasi_checkout_by.user_id`,
                `pasien_registrasi_checkout_by`.`full_name` as `visit.pasien_registrasi_checkout_by.full_name`,
                `visit_by_id_user`.`user_id` as `visit.by_id_user.user_id`,
                `visit_by_id_user`.`full_name` as `visit.by_id_user.full_name`,

                `bt_master_rad_job_group`.`id` as `id_bt_master_rad_job_group`,
                `bt_master_rad_job_group`.`kategori_pemeriksaan` as `kategori_pemeriksaan`,
                `bt_master_rad_job_group`.`jenis_pemeriksaan` as `jenis_pemeriksaan`,

                `notes_hasil_rad_details`.`id` as `id_notes_hasil_rad_details`,
                `notes_hasil_rad_details`.`date_update` as `date_update`,
                `notes_hasil_rad_details`.`hasil_baca` as `hasil_baca`,
                `notes_hasil_rad_details`.`kesan_hasil_expertise` as `kesan_hasil_expertise`,
                `notes_hasil_rad_details`.`pesan` as `pesan`,
                `notes_hasil_rad_details`.`kV` as `kV`,
                `notes_hasil_rad_details`.`mA` as `mA`,
                `notes_hasil_rad_details`.`s` as `s`,
                `notes_hasil_rad_details`.`mAs` as `mAs`,
                `notes_hasil_rad_details`.`jml_film` as `jml_film`,
                `notes_hasil_rad_details`.`id_ref_rad_jenis_film` as `id_ref_rad_jenis_film`,
                `notes_hasil_rad_details`.`jml_film_gagal` as `jml_film_gagal`,
                `notes_hasil_rad_details`.`id_ref_rad_jenis_film_gagal` as `id_ref_rad_jenis_film_gagal`,
                `notes_hasil_rad_details`.`jml_ekspos` as `jml_ekspos`,
                `notes_hasil_rad_details`.`tingkat_dosis_radiasi` as `tingkat_dosis_radiasi`,
                `notes_hasil_rad_details`.`status_update` as `status_update`,
                `notes_hasil_rad_details`.`data_users_petugas_update` as `data_users_petugas_update`,
                `notes_hasil_rad_details`.`digital_signature_users_petugas_update` as `digital_signature_users_petugas_update`,
                `notes_hasil_rad_details`.`digital_signature_users_dept_dokter_digital_signature` as `digital_signature_users_dept_dokter_digital_signature`,
                `notes_hasil_rad_details`.`data_users_dept_dokter_digital_signature` as `data_users_dept_dokter_digital_signature`
            ', false)
            ->from($this->_table)
            ->join('users_profile as order_rad_details_created_by', 'order_rad_details.created_by = order_rad_details_created_by.user_id', 'left')
            ->join('order_rad', 'order_rad_details.id_order_rad = order_rad.id', 'left')
            ->join('bt_order_rad as bt_order_rad' , 'order_rad_details.id_bt_order_rad = bt_order_rad.id', 'left')
            ->join('bt_master_rad_job as bt_master_rad_job' , 'bt_order_rad.id_bt_master_rad_job = bt_master_rad_job.id', 'left')
            ->join('bt_master_rad_job_group as bt_master_rad_job_group' , 'bt_master_rad_job.id_bt_master_rad_job_group = bt_master_rad_job_group.id', 'left')
            ->join('notes_hasil_rad_details as notes_hasil_rad_details', 'notes_hasil_rad_details.id_order_rad_details = order_rad_details.id')
            ->join('pasien_visit as visit', 'order_rad.id_visit = visit.id_pasien_visit')
            ->join('departements as dept_ori', 'order_rad.id_dept_ori = dept_ori.departement_id')
            ->join('departements as dept_dest', 'order_rad.id_dept_dest = dept_dest.departement_id')
            ->join('pasien_registrasi', 'visit.id_pasien_registrasi = pasien_registrasi.id_pasien_registrasi')
            ->join('users_profile as id_users_pasien', 'pasien_registrasi.id_users_pasien = id_users_pasien.user_id')
            ->join('ref_payment as ref_payment', 'pasien_registrasi.id_ref_payment = ref_payment.id_ref_payment')
            ->join('users_profile as id_hrd_dokter', 'pasien_registrasi.id_hrd_dokter = id_hrd_dokter.user_id')
            ->join('departements as id_dept_ruang_rawat', 'pasien_registrasi.id_dept_ruang_rawat = id_dept_ruang_rawat.departement_id', 'left')
            ->join('departements as departemen', 'visit.id_departemen = departemen.departement_id')
            ->join('users_profile as hrd', 'visit.id_hrd = hrd.user_id')
            ->join('users_profile as pasien_registrasi_created_by', 'pasien_registrasi.created_by = pasien_registrasi_created_by.user_id', 'left')
            ->join('users_profile as pasien_registrasi_checkout_by', 'pasien_registrasi.checkout_by = pasien_registrasi_checkout_by.user_id', 'left')
            ->join('users_profile as visit_by_id_user', 'visit.by_id_user = visit_by_id_user.user_id', 'left')
            ->join('users_profile as user_dpjp_rad' , 'order_rad.id_users_dpjp_rad = user_dpjp_rad.user_id', 'left');

        if ($param['order_date_end']. ' 23:59:59' > $param['order_date_start']) {
            $query->where('order_rad_details.created_date >=' , $param['order_date_start']);
            $query->where('order_rad_details.created_date <=' , $param['order_date_end']. ' 23:59:59');
        }

        if (isset($param['is_order_del_date_null']) && $param['is_order_del_date_null'] == '0') {
            $query->where('order_rad_details.del_date IS NULL');
        } else if (isset($param['is_order_del_date_null']) && $param['is_order_del_date_null'] == '1') {
            $query->where('order_rad_details.del_date IS NOT NULL');
        }

        if (isset($param['is_reg_del_date_null']) && $param['is_reg_del_date_null'] == '0') {
            $query->where('pasien_registrasi.del_date IS NULL');
        } else if (isset($param['is_reg_del_date_null']) && $param['is_reg_del_date_null'] == '1') {
            $query->where('pasien_registrasi.del_date IS NOT NULL');
        }

        if (!empty($param['id_ref_payment'])) {
            $query->where('pasien_registrasi.id_ref_payment', $param['id_ref_payment']);
        }

        if (!empty($param['id_dpjp'])) {
            $query->where('pasien_registrasi.id_hrd_dokter', $param['id_dpjp']);
        }

        if (!empty($param['id_dept_ruang_rawat'])) {
            $query->where('pasien_registrasi.id_dept_ruang_rawat', $param['id_dept_ruang_rawat']);
        }

        if (!empty($param['id_dept_ori'])) {
            $query->where('order_rad.id_dept_ori', $param['id_dept_ori']);
        }

        if (isset($param['is_cito'])) {
            $query->where('order_rad.is_cito', $param['is_cito']);
        }

        if (isset($param['is_pasien_baru'])) {
            $query->where('pasien_registrasi.is_pasien_baru', $param['is_pasien_baru']);
        }

        if (!empty($param['id_order'])) {
            $query->where('order_rad_details.id', $param['id_order']);
        }

        if (isset($param['id_bt_master_rad_job_group']) && !empty($param['id_bt_master_rad_job_group'])) {
            $query->where('bt_master_rad_job_group.id', $param['id_bt_master_rad_job_group']);
        }

        if (isset($param['search']) && isset($param['search'])) {
            $query->group_start();
            $query->where('id_hrd_dokter.full_name LIKE "%' . $param['search'] . '%"')
                ->or_where('hrd.full_name LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.full_name LIKE "%' . $param['search'] . '%"')
                ->or_where('departemen.departement_name LIKE "%' . $param['search'] . '%"')
                ->or_where('ref_payment.payment LIKE "%' . $param['search'] . '%"')
                ->or_where('order_rad_details.nama_bt_order_rad LIKE "%' . $param['search'] . '%"')
                ->or_where('order_rad_details.id_order_rad LIKE "%' . $param['search'] . '%"')
                ->or_where('order_rad.no_order_rad LIKE "%' . $param['search'] . '%"')
                ->or_where('bt_master_rad_job_group.kategori_pemeriksaan LIKE "%' . $param['search'] . '%"')
                ->or_where('bt_master_rad_job_group.jenis_pemeriksaan LIKE "%' . $param['search'] . '%"')
                ->or_where('order_rad.id_users_dpjp_rad LIKE "%' . $param['search'] . '%"')
                ->or_where('user_dpjp_rad.full_name LIKE "%' . $param['search'] . '%"')
                ->or_where('visit.id_pasien_visit LIKE "%' . $param['search'] . '%"')
                ->or_where('visit.no_visit LIKE "%' . $param['search'] . '%"')
                ->or_where('pasien_registrasi.id_pasien_registrasi LIKE "%' . $param['search'] . '%"')
                ->or_where('pasien_registrasi.is_pasien_baru LIKE "%' . $param['search'] . '%"')
                ->or_where('pasien_registrasi.no_reg LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.no_rm LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.bpjs_id LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.number_id LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.full_name LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.address LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.id_kel LIKE "%' . $param['search'] . '%"')
                ->or_where('id_users_pasien.dob LIKE "%' . $param['search'] . '%"')
                ->or_where('id_hrd_dokter.full_name LIKE "%' . $param['search'] . '%"')
                ->or_where('id_dept_ruang_rawat.departement_name LIKE "%' . $param['search'] . '%"')
                ->or_where('pasien_registrasi.code_icd10_awal LIKE "%' . $param['search'] . '%"')
                ->or_where('hrd.full_name LIKE "%' . $param['search'] . '%"')
                ->or_where('dept_ori.departement_name LIKE "%' . $param['search'] . '%"')
                ->or_where('order_rad.is_cito LIKE "%' . $param['search'] . '%"')
                ->or_where('order_rad.klinis_pasien LIKE "%' . $param['search'] . '%"')
                ->or_where('order_rad_details.created_by LIKE "%' . $param['search'] . '%"')
                ->or_where('notes_hasil_rad_details.status_update LIKE "%' . $param['search'] . '%"');
                $query->group_end();
        }

        return $query->get()->result_array();
    }

    public function findByOrderId($orderId, $idBtMasterJasmed)
    {
        $dataRaw = $this->db
            ->select('
                order_rad_details.id as id,
                order_rad_details.id_order_rad as id_order_rad,
                order_rad_details.nama_bt_order_rad as nama_bt_order_rad,
                order_rad_details.harga_bt_order_rad as harga_bt_order_rad,
                order_rad_details.del_date as del_date,
                order_rad_details.del_by as del_by,
            ')
            ->from($this->_table)
            ->where('id_order_rad', $orderId)
            ->get()->result_array();

        $data = [];
        if (!empty($dataRaw)) {
            foreach ($dataRaw as $k => $v) {
                $orderRadDetailsJasmed = $this->modelOrderRadDetailsJasmed->findByOrderDetailId($v['id'], $idBtMasterJasmed);
                if (!empty($orderRadDetailsJasmed) || $idBtMasterJasmed == null) {
                    $data[] = [
                        'id' => $v['id'],
                        'id_order_rad' => $v['id_order_rad'],
                        'nama_bt_order_rad' => $v['nama_bt_order_rad'],
                        'harga_bt_order_rad' => $v['harga_bt_order_rad'],
                        'del_date' => $v['del_date'],
                        'del_by' => $v['del_by'],
                        'order_rad_details_jasmed' => $orderRadDetailsJasmed
                    ];
                }
            }
        }
        return $data;
    }
}
