SELECT
    order_rad_details.id as id,
    order_rad_details.id_order_rad as id_order_rad,
    order_rad_details.created_date as created_date,
    notes_hasil_rad_details.jml_film as jml_film,
    notes_hasil_rad_details.jml_film_gagal as jml_film_gagal,
    order_rad.id_users_dpjp_rad as id_dokter,
    dokter_profile.full_name as nama_dokter
FROM order_rad_details
JOIN notes_hasil_rad_details as notes_hasil_rad_details on notes_hasil_rad_details.id_order_rad_details = order_rad_details.id
JOIN order_rad on order_rad_details.id_order_rad = order_rad.id
LEFT JOIN users_profile as dokter_profile on order_rad.id_users_dpjp_rad = dokter_profile.user_id
JOIN pasien_visit as visit on order_rad.id_visit = visit.id_pasien_visit
JOIN pasien_registrasi as registrasi on visit.id_pasien_registrasi = registrasi.id_pasien_registrasi

