SELECT 
    registrasi.id_pasien_registrasi as id_reg,
    registrasi.is_pasien_baru as is_pasien_baru,
    user_profile.gender as gender,
    registrasi.checkin_time as tanggal_checkin,
    registrasi.checkout_time as tanggal_checkout,
    registrasi.jenis_rawat as ri_rj,
    checkout.id as id_checkout,
    checkout.nama as nama_checkout
FROM ref_checkout checkout
JOIN users_profile as user_profile on registrasi.id_users_pasien = user_profile.user_id
JOIN ref_checkout as checkout on registrasi.id_ref_checkout = checkout.id
WHERE registrasi.del_date is null
AND registrasi.checkout_time is not null
AND registrasi.jenis_rawat IN ('RI,RJ');