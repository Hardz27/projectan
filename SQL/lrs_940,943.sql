SELECT
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
FROM order_rad_details
JOIN notes_hasil_rad_details as notes_hasil_rad_details on notes_hasil_rad_details.id_order_rad_details = order_rad_details.id
JOIN order_rad on order_rad_details.id_order_rad = order_rad.id
LEFT JOIN users_profile as dokter_profile on order_rad.id_users_dpjp_rad = dokter_profile.user_id
LEFT JOIN bt_order_rad as bt_order_rad on order_rad_details.id_bt_order_rad = bt_order_rad.id
LEFT JOIN bt_master_rad_job as bt_master_rad_job on bt_order_rad.id_bt_master_rad_job = bt_master_rad_job.id
LEFT JOIN bt_master_rad_job_group as bt_master_rad_job_group on bt_master_rad_job.id_bt_master_rad_job_group = bt_master_rad_job_group.id
JOIN pasien_visit as visit on order_rad.id_visit = visit.id_pasien_visit
JOIN pasien_registrasi as registrasi on visit.id_pasien_registrasi = registrasi.id_pasien_registrasi
JOIN departements as departements on visit.id_departemen = departements.departement_id
JOIN ref_payment as ref_payment on registrasi.id_ref_payment = ref_payment.id_ref_payment;

