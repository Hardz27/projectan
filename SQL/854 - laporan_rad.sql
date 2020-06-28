SELECT `order_rad_details`.`id` as `id`,
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
    FROM `order_rad_details`
    LEFT JOIN `users_profile` as `order_rad_details_created_by` ON `order_rad_details`.`created_by` = `order_rad_details_created_by`.`user_id`
    LEFT JOIN `order_rad` ON `order_rad_details`.`id_order_rad` = `order_rad`.`id` 
    LEFT JOIN `bt_order_rad` as `bt_order_rad` ON `order_rad_details`.`id_bt_order_rad` = `bt_order_rad`.`id` 
    LEFT JOIN `bt_master_rad_job` as `bt_master_rad_job` ON `bt_order_rad`.`id_bt_master_rad_job` = `bt_master_rad_job`.`id` 
    LEFT JOIN `bt_master_rad_job_group` as `bt_master_rad_job_group` ON `bt_master_rad_job`.`id_bt_master_rad_job_group` = `bt_master_rad_job_group`.`id` 
    JOIN `notes_hasil_rad_details` as `notes_hasil_rad_details` ON `notes_hasil_rad_details`.`id_order_rad_details` = `order_rad_details`.`id` 
    JOIN `pasien_visit` as `visit` ON `order_rad`.`id_visit` = `visit`.`id_pasien_visit` 
    JOIN `departements` as `dept_ori` ON `order_rad`.`id_dept_ori` = `dept_ori`.`departement_id` 
    JOIN `departements` as `dept_dest` ON `order_rad`.`id_dept_dest` = `dept_dest`.`departement_id` 
    JOIN `pasien_registrasi` ON `visit`.`id_pasien_registrasi` = `pasien_registrasi`.`id_pasien_registrasi` 
    JOIN `users_profile` as `id_users_pasien` ON `pasien_registrasi`.`id_users_pasien` = `id_users_pasien`.`user_id` 
    JOIN `ref_payment` as `ref_payment` ON `pasien_registrasi`.`id_ref_payment` = `ref_payment`.`id_ref_payment` 
    JOIN `users_profile` as `id_hrd_dokter` ON `pasien_registrasi`.`id_hrd_dokter` = `id_hrd_dokter`.`user_id` 
    LEFT JOIN `departements` as `id_dept_ruang_rawat` ON `pasien_registrasi`.`id_dept_ruang_rawat` = `id_dept_ruang_rawat`.`departement_id` 
    JOIN `departements` as `departemen` ON `visit`.`id_departemen` = `departemen`.`departement_id` 
    JOIN `users_profile` as `hrd` ON `visit`.`id_hrd` = `hrd`.`user_id` 
    LEFT JOIN `users_profile` as `pasien_registrasi_created_by` ON `pasien_registrasi`.`created_by` = `pasien_registrasi_created_by`.`user_id` 
    LEFT JOIN `users_profile` as `pasien_registrasi_checkout_by` ON `pasien_registrasi`.`checkout_by` = `pasien_registrasi_checkout_by`.`user_id` 
    LEFT JOIN `users_profile` as `visit_by_id_user` ON `visit`.`by_id_user` = `visit_by_id_user`.`user_id` 
    LEFT JOIN `users_profile` as `user_dpjp_rad` ON `order_rad`.`id_users_dpjp_rad` = `user_dpjp_rad`.`user_id`
    WHERE `order_rad_details`.`created_date` >= '2020-01-01'        
        AND `order_rad_details`.`created_date` <= '2020-06-30 23:59:59'
        AND `order_rad_details`.`del_date` IS NULL
        AND `pasien_registrasi`.`del_date` IS NULL 

        -- Query ketika melakukan pencarian
        AND ( `id_hrd_dokter`.`full_name` LIKE "%ANGELINE%" 
            OR `hrd`.`full_name` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`full_name` LIKE "%ANGELINE%" 
            OR `departemen`.`departement_name` LIKE "%ANGELINE%" 
            OR `ref_payment`.`payment` LIKE "%ANGELINE%" 
            OR `order_rad_details`.`nama_bt_order_rad` LIKE "%ANGELINE%" 
            OR `order_rad_details`.`id_order_rad` LIKE "%ANGELINE%" 
            OR `order_rad`.`no_order_rad` LIKE "%ANGELINE%" 
            OR `bt_master_rad_job_group`.`kategori_pemeriksaan` LIKE "%ANGELINE%" 
            OR `bt_master_rad_job_group`.`jenis_pemeriksaan` LIKE "%ANGELINE%" 
            OR `order_rad`.`id_users_dpjp_rad` LIKE "%ANGELINE%" 
            OR `user_dpjp_rad`.`full_name` LIKE "%ANGELINE%" 
            OR `visit`.`id_pasien_visit` LIKE "%ANGELINE%" 
            OR `visit`.`no_visit` LIKE "%ANGELINE%" 
            OR `pasien_registrasi`.`id_pasien_registrasi` LIKE "%ANGELINE%" 
            OR `pasien_registrasi`.`is_pasien_baru` LIKE "%ANGELINE%" 
            OR `pasien_registrasi`.`no_reg` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`no_rm` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`bpjs_id` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`number_id` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`full_name` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`address` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`id_kel` LIKE "%ANGELINE%" 
            OR `id_users_pasien`.`dob` LIKE "%ANGELINE%" 
            OR `id_hrd_dokter`.`full_name` LIKE "%ANGELINE%" 
            OR `id_dept_ruang_rawat`.`departement_name` LIKE "%ANGELINE%" 
            OR `pasien_registrasi`.`code_icd10_awal` LIKE "%ANGELINE%" 
            OR `hrd`.`full_name` LIKE "%ANGELINE%" 
            OR `dept_ori`.`departement_name` LIKE "%ANGELINE%" 
            OR `order_rad`.`is_cito` LIKE "%ANGELINE%" 
            OR `order_rad`.`klinis_pasien` LIKE "%ANGELINE%" 
            OR `order_rad_details`.`created_by` LIKE "%ANGELINE%" 
            OR `notes_hasil_rad_details`.`status_update` LIKE "%ANGELINE%" )

