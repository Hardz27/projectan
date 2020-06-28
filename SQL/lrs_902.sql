SELECT 
	kamar_bed_history.id_pasien_visit,
    kamar.kapasitas,
    departements.departement_name,
    checkout.id as id_checkout,
    checkout.nama as alasan_checkout,
    kamar_bed_history.lama_dirawat
    
    
FROM kamar_bed_history
JOIN kamar_bed on kamar_bed.id_bed = kamar_bed_history.id_bed
JOIN kamar on kamar.id_kamar = kamar_bed.id_kamar
JOIN pasien_visit as visit on kamar_bed_history.id_pasien_visit = visit.id_pasien_visit
JOIN pasien_registrasi as registrasi on visit.id_pasien_registrasi = registrasi.id_pasien_registrasi
JOIN departements as departements on departements.departement_id = kamar.id_departemen
JOIN ref_checkout as checkout on checkout.id = registrasi.id_ref_checkout

WHERE registrasi.id_ref_checkout is not null;