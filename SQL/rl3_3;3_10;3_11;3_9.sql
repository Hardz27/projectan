SELECT 
	order_details.id as id_order_details,
	kegiatan.nama as nama_kegiatan,
	kegiatan.id_kegiatan as id_parent
FROM zinga.order_dept_details order_details
JOIN bt_order_dept order_dept on order_details.id_bt_order_dept = order_dept.id
JOIN bt_master_dept_job master_dept_job on order_dept.id_bt_master_dept_job = master_dept_job.id
JOIN ref_kegiatan kegiatan on master_dept_job.id_ref_kegiatan = kegiatan.id
WHERE kegiatan.id_group = 3;


-- SELECT `order_details`.`id` as `id_order_details`, `kegiatan`.`id` as `id_kegiatan`, `kegiatan`.`nama` as `nama_kegiatan`, `kegiatan`.`id_kegiatan` as `id_parent`, `kegiatan`.`is_last_child` as `last_child`, `kegiatan`.`id_group` as `id_group` FROM `order_dept_details` as `order_details` JOIN `bt_order_dept` as `bt_order_dept` ON `order_details`.`id_bt_order_dept` = `bt_order_dept`.`id` JOIN `bt_master_dept_job` as `master_dept_job` ON `bt_order_dept`.`id_bt_master_dept_job` = `master_dept_job`.`id` JOIN `order_dept` as `order_dept` ON `order_details`.`id_order_dept` = `order_dept`.`id` JOIN `pasien_visit` as `visit` ON `order_dept`.`id_visit` = `visit`.`id_pasien_visit` JOIN `pasien_registrasi` ON `visit`.`id_pasien_registrasi` = `pasien_registrasi`.`id_pasien_registrasi` JOIN `ref_kegiatan` as `kegiatan` ON `master_dept_job`.`id_ref_kegiatan` = `kegiatan`.`id` WHERE `order_details`.`created_date` >= '2020-01-01' AND `order_details`.`created_date` <= '2020-06-30 23:59:59' AND `order_details`.`del_date` IS NULL AND `pasien_registrasi`.`del_date` IS NULL AND `visit`.`del_date` IS NULL

