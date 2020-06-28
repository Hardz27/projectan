SELECT 
	visit.id_pasien_visit as id_visit,
	visit.checkin_time as tanggal_checkin,
    visit.checkout_time as tanggal_checkout,
    departements.departement_id as id_departement,
	departements.departement_name as nama_departement,
	registrasi.is_pasien_baru as is_pasien_baru
FROM pasien_visit visit
JOIN pasien_registrasi as registrasi on registrasi.id_pasien_registrasi = visit.id_pasien_registrasi
JOIN users_profile as user_profile on registrasi.id_users_pasien = user_profile.user_id
JOIN departements as departements on visit.id_departemen = departements.departement_id
WHERE departements.type IN (0,4)