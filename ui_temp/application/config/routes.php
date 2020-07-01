<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'notes_temp';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


/// ROUTES START FOR notes_temp
$route['notes_temp'] = 'notes/notes_temp/c_notes_temp';
$route['notes_temp/(:any)'] = 'notes/notes_temp/c_notes_temp/$1';
$route['notes_temp/(:any)/(:any)']               = 'notes/notes_temp/c_notes_temp/$1/$2';
$route['notes_temp/(:any)/(:num)/(:any)']        = 'notes/notes_temp/c_notes_temp/$1/$2/$3';
$route['notes_temp/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_temp/c_notes_temp/$1/$2/$3/$4';


/// ROUTES START FOR notes_penolakan_resusitasi
$route['notes_penolakan_resusitasi'] = 'notes/notes_penolakan_resusitasi/c_notes_penolakan_resusitasi';
$route['notes_penolakan_resusitasi/(:any)'] = 'notes/notes_penolakan_resusitasi/c_notes_penolakan_resusitasi/$1';
$route['notes_penolakan_resusitasi/(:any)/(:any)']               = 'notes/notes_penolakan_resusitasi/c_notes_penolakan_resusitasi/$1/$2';
$route['notes_penolakan_resusitasi/(:any)/(:num)/(:any)']        = 'notes/notes_penolakan_resusitasi/c_notes_penolakan_resusitasi/$1/$2/$3';
$route['notes_penolakan_resusitasi/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_penolakan_resusitasi/c_notes_penolakan_resusitasi/$1/$2/$3/$4';


/// ROUTES START FOR notes_laporan_sedasi
$route['notes_laporan_sedasi'] = 'notes/notes_laporan_sedasi/c_notes_laporan_sedasi';
$route['notes_laporan_sedasi/(:any)'] = 'notes/notes_laporan_sedasi/c_notes_laporan_sedasi/$1';
$route['notes_laporan_sedasi/(:any)/(:any)']               = 'notes/notes_laporan_sedasi/c_notes_laporan_sedasi/$1/$2';
$route['notes_laporan_sedasi/(:any)/(:num)/(:any)']        = 'notes/notes_laporan_sedasi/c_notes_laporan_sedasi/$1/$2/$3';
$route['notes_laporan_sedasi/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_laporan_sedasi/c_notes_laporan_sedasi/$1/$2/$3/$4';

/// ROUTES START FOR notes_evaluasi_awal_mpp
$route['notes_evaluasi_awal_mpp'] = 'notes/notes_evaluasi_awal_mpp/c_notes_evaluasi_awal_mpp';
$route['notes_evaluasi_awal_mpp/(:any)'] = 'notes/notes_evaluasi_awal_mpp/c_notes_evaluasi_awal_mpp/$1';
$route['notes_evaluasi_awal_mpp/(:any)/(:any)']               = 'notes/notes_evaluasi_awal_mpp/c_notes_evaluasi_awal_mpp/$1/$2';
$route['notes_evaluasi_awal_mpp/(:any)/(:num)/(:any)']        = 'notes/notes_evaluasi_awal_mpp/c_notes_evaluasi_awal_mpp/$1/$2/$3';
$route['notes_evaluasi_awal_mpp/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_evaluasi_awal_mpp/c_notes_evaluasi_awal_mpp/$1/$2/$3/$4';

/// ROUTES START FOR notes_skrining_tb
$route['docs_pasien_tb_dewasa'] = 'docs/docs_pasien_tb_dewasa/c_docs_pasien_tb_dewasa';
$route['docs_pasien_tb_dewasa/(:any)'] = 'docs/docs_pasien_tb_dewasa/c_docs_pasien_tb_dewasa/$1';
$route['docs_pasien_tb_dewasa/(:any)/(:any)']               = 'docs/docs_pasien_tb_dewasa/c_docs_pasien_tb_dewasa/$1/$2';
$route['docs_pasien_tb_dewasa/(:any)/(:num)/(:any)']        = 'docs/docs_pasien_tb_dewasa/c_docs_pasien_tb_dewasa/$1/$2/$3';
$route['docs_pasien_tb_dewasa/(:any)/(:any)/(:any)/(:any)'] = 'docs/docs_pasien_tb_dewasa/c_docs_pasien_tb_dewasa/$1/$2/$3/$4';

/// ROUTES START FOR notes_riwayat_menyusui
$route['notes_riwayat_menyusui'] = 'notes/notes_riwayat_menyusui/c_notes_riwayat_menyusui';
$route['notes_riwayat_menyusui/(:any)'] = 'notes/notes_riwayat_menyusui/c_notes_riwayat_menyusui/$1';
$route['notes_riwayat_menyusui/(:any)/(:any)']               = 'notes/notes_riwayat_menyusui/c_notes_riwayat_menyusui/$1/$2';
$route['notes_riwayat_menyusui/(:any)/(:num)/(:any)']        = 'notes/notes_riwayat_menyusui/c_notes_riwayat_menyusui/$1/$2/$3';
$route['notes_riwayat_menyusui/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_riwayat_menyusui/c_notes_riwayat_menyusui/$1/$2/$3/$4';

/// ROUTES START FOR notes_laporan_statistik
$route['laporan_statistik'] = 'laporan/laporan_statistik/c_laporan_statistik';
$route['laporan_statistik/(:any)'] = 'laporan/laporan_statistik/c_laporan_statistik/$1';
$route['laporan_statistik/(:any)/(:any)']               = 'laporan/laporan_statistik/c_laporan_statistik/$1/$2';
$route['laporan_statistik/(:any)/(:num)/(:any)']        = 'laporan/laporan_statistik/c_laporan_statistik/$1/$2/$3';
$route['laporan_statistik/(:any)/(:any)/(:any)/(:any)'] = 'laporan/laporan_statistik/c_laporan_statistik/$1/$2/$3/$4';

/// ROUTES START FOR laporan_icd9
$route['laporan_icd9'] = 'laporan/laporan_icd9/c_laporan_icd9';
$route['laporan_icd9/(:any)'] = 'laporan/laporan_icd9/c_laporan_icd9/$1';
$route['laporan_icd9/(:any)/(:any)']               = 'laporan/laporan_icd9/c_laporan_icd9/$1/$2';
$route['laporan_icd9/(:any)/(:num)/(:any)']        = 'laporan/laporan_icd9/c_laporan_icd9/$1/$2/$3';
$route['laporan_icd9/(:any)/(:any)/(:any)/(:any)'] = 'laporan/laporan_icd9/c_laporan_icd9/$1/$2/$3/$4';

/// ROUTES START FOR laporan_icd10
$route['laporan_icd10'] = 'laporan/laporan_icd10/c_laporan_icd10';
$route['laporan_icd10/(:any)'] = 'laporan/laporan_icd10/c_laporan_icd10/$1';
$route['laporan_icd10/(:any)/(:any)']               = 'laporan/laporan_icd10/c_laporan_icd10/$1/$2';
$route['laporan_icd10/(:any)/(:num)/(:any)']        = 'laporan/laporan_icd10/c_laporan_icd10/$1/$2/$3';
$route['laporan_icd10/(:any)/(:any)/(:any)/(:any)'] = 'laporan/laporan_icd10/c_laporan_icd10/$1/$2/$3/$4';

/// ROUTES START FOR laporan_pasien_meninggal
$route['laporan_pasien_meninggal'] = 'laporan/laporan_pasien_meninggal/c_laporan_pasien_meninggal';
$route['laporan_pasien_meninggal/(:any)'] = 'laporan/laporan_pasien_meninggal/c_laporan_pasien_meninggal/$1';
$route['laporan_pasien_meninggal/(:any)/(:any)']               = 'laporan/laporan_pasien_meninggal/c_laporan_pasien_meninggal/$1/$2';
$route['laporan_pasien_meninggal/(:any)/(:num)/(:any)']        = 'laporan/laporan_pasien_meninggal/c_laporan_pasien_meninggal/$1/$2/$3';
$route['laporan_pasien_meninggal/(:any)/(:any)/(:any)/(:any)'] = 'laporan/laporan_pasien_meninggal/c_laporan_pasien_meninggal/$1/$2/$3/$4';

/// ROUTES START FOR laporan_vclaim
$route['laporan_vclaim'] = 'laporan/laporan_bpjs_sep/c_laporan_bpjs_sep';
$route['laporan_vclaim/(:any)'] = 'laporan/laporan_bpjs_sep/c_laporan_bpjs_sep/$1';
$route['laporan_vclaim/(:any)/(:any)']               = 'laporan/laporan_bpjs_sep/c_laporan_bpjs_sep/$1/$2';
$route['laporan_vclaim/(:any)/(:num)/(:any)']        = 'laporan/laporan_bpjs_sep/c_laporan_bpjs_sep/$1/$2/$3';
$route['laporan_vclaim/(:any)/(:any)/(:any)/(:any)'] = 'laporan/laporan_bpjs_sep/c_laporan_bpjs_sep/$1/$2/$3/$4';

/// ROUTES START FOR docs_pasien_tb_anak
$route['docs_pasien_tb_anak'] = 'docs/docs_pasien_tb_anak/c_docs_pasien_tb_anak';
$route['docs_pasien_tb_anak/(:any)'] = 'docs/docs_pasien_tb_anak/c_docs_pasien_tb_anak/$1';
$route['docs_pasien_tb_anak/(:any)/(:any)']               = 'docs/docs_pasien_tb_anak/c_docs_pasien_tb_anak/$1/$2';
$route['docs_pasien_tb_anak/(:any)/(:num)/(:any)']        = 'docs/docs_pasien_tb_anak/c_docs_pasien_tb_anak/$1/$2/$3';
$route['docs_pasien_tb_anak/(:any)/(:any)/(:any)/(:any)'] = 'docs/docs_pasien_tb_anak/c_docs_pasien_tb_anak/$1/$2/$3/$4';


/// ROUTES START FOR NOTES_PARKIR_TIKET
$route['notes_parkir_tiket'] = 'parkir/notes/notes_parkir_tiket/c_notes_parkir_tiket';
$route['notes_parkir_tiket/(:any)'] = 'parkir/notes/notes_parkir_tiket/c_notes_parkir_tiket/$1';
$route['notes_parkir_tiket/(:any)/(:any)']               = 'parkir/notes/notes_parkir_tiket/c_notes_parkir_tiket/$1/$2';
$route['notes_parkir_tiket/(:any)/(:num)/(:any)']        = 'parkir/notes/notes_parkir_tiket/c_notes_parkir_tiket/$1/$2/$3';
$route['notes_parkir_tiket/(:any)/(:any)/(:any)/(:any)'] = 'parkir/notes/notes_parkir_tiket/c_notes_parkir_tiket/$1/$2/$3/$4';

/// ROUTES START FOR NOTES_UPDATE_PARKIR_TIKET
$route['notes_update_parkir_tiket'] = 'parkir/notes/notes_update_parkir_tiket/c_notes_update_parkir_tiket';
$route['notes_update_parkir_tiket/(:any)'] = 'parkir/notes/notes_update_parkir_tiket/c_notes_update_parkir_tiket/$1';
$route['notes_update_parkir_tiket/(:any)/(:any)']               = 'parkir/notes/notes_update_parkir_tiket/c_notes_update_parkir_tiket/$1/$2';
$route['notes_update_parkir_tiket/(:any)/(:num)/(:any)']        = 'parkir/notes/notes_update_parkir_tiket/c_notes_update_parkir_tiket/$1/$2/$3';
$route['notes_update_parkir_tiket/(:any)/(:any)/(:any)/(:any)'] = 'parkir/notes/notes_update_parkir_tiket/c_notes_update_parkir_tiket/$1/$2/$3/$4';

/// ROUTES START FOR LAPORAN_PARKIR_TIKET
$route['laporan_parkir_tiket'] = 'parkir/laporan/laporan_parkir_tiket/c_laporan_parkir_tiket';
$route['laporan_parkir_tiket/(:any)'] = 'parkir/laporan/laporan_parkir_tiket/c_laporan_parkir_tiket/$1';
$route['laporan_parkir_tiket/(:any)/(:any)']               = 'parkir/laporan/laporan_parkir_tiket/c_laporan_parkir_tiket/$1/$2';
$route['laporan_parkir_tiket/(:any)/(:num)/(:any)']        = 'parkir/laporan/laporan_parkir_tiket/c_laporan_parkir_tiket/$1/$2/$3';
$route['laporan_parkir_tiket/(:any)/(:any)/(:any)/(:any)'] = 'parkir/laporan/laporan_parkir_tiket/c_laporan_parkir_tiket/$1/$2/$3/$4';

/// ROUTES START FOR LAPORAN_PARKIR_TIKET
$route['laporan_lrs901'] = 'laporan/laporan_lrs901/c_laporan_lrs901';
$route['laporan_lrs901/(:any)'] = 'laporan/laporan_lrs901/c_laporan_lrs901/$1';
$route['laporan_lrs901/(:any)/(:any)']               = 'laporan/laporan_lrs901/c_laporan_lrs901/$1/$2';
$route['laporan_lrs901/(:any)/(:num)/(:any)']        = 'laporan/laporan_lrs901/c_laporan_lrs901/$1/$2/$3';
$route['laporan_lrs901/(:any)/(:any)/(:any)/(:any)'] = 'laporan/laporan_lrs901/c_laporan_lrs901/$1/$2/$3/$4';

/// ROUTES START FOR LAPORAN_PARKIR_TIKET
$route['laporan_lrs951'] = 'laporan/laporan_lrs951/c_laporan_lrs951';
$route['laporan_lrs951/(:any)'] = 'laporan/laporan_lrs951/c_laporan_lrs951/$1';
$route['laporan_lrs951/(:any)/(:any)']               = 'laporan/laporan_lrs951/c_laporan_lrs951/$1/$2';
$route['laporan_lrs951/(:any)/(:num)/(:any)']        = 'laporan/laporan_lrs951/c_laporan_lrs951/$1/$2/$3';
$route['laporan_lrs951/(:any)/(:any)/(:any)/(:any)'] = 'laporan/laporan_lrs951/c_laporan_lrs951/$1/$2/$3/$4';

/// ROUTES START FOR 61_notes_fisioterapi_asesment
$route['61_notes_fisioterapi_asesment'] = 'notes/61_notes_fisioterapi_asesment/c_61_notes_fisioterapi_asesment';
$route['61_notes_fisioterapi_asesment/(:any)'] = 'notes/61_notes_fisioterapi_asesment/c_61_notes_fisioterapi_asesment/$1';
$route['61_notes_fisioterapi_asesment/(:any)/(:any)']               = 'notes/61_notes_fisioterapi_asesment/c_61_notes_fisioterapi_asesment/$1/$2';
$route['61_notes_fisioterapi_asesment/(:any)/(:num)/(:any)']        = 'notes/61_notes_fisioterapi_asesment/c_61_notes_fisioterapi_asesment/$1/$2/$3';
$route['61_notes_fisioterapi_asesment/(:any)/(:any)/(:any)/(:any)'] = 'notes/61_notes_fisioterapi_asesment/c_61_notes_fisioterapi_asesment/$1/$2/$3/$4';

/// ROUTES START FOR 22_notes_odontogram
$route['22_notes_odontogram'] = 'notes/22_notes_odontogram/c_22_notes_odontogram';
$route['22_notes_odontogram/(:any)'] = 'notes/22_notes_odontogram/c_22_notes_odontogram/$1';
$route['22_notes_odontogram/(:any)/(:any)']               = 'notes/22_notes_odontogram/c_22_notes_odontogram/$1/$2';
$route['22_notes_odontogram/(:any)/(:num)/(:any)']        = 'notes/22_notes_odontogram/c_22_notes_odontogram/$1/$2/$3';
$route['22_notes_odontogram/(:any)/(:any)/(:any)/(:any)'] = 'notes/22_notes_odontogram/c_22_notes_odontogram/$1/$2/$3/$4';

/// ROUTES START FOR 28_notes_case_manager_a
$route['28_notes_case_manager_a'] = 'notes/28_notes_case_manager_a/c_28_notes_case_manager_a';
$route['28_notes_case_manager_a/(:any)'] = 'notes/28_notes_case_manager_a/c_28_notes_case_manager_a/$1';
$route['28_notes_case_manager_a/(:any)/(:any)']               = 'notes/28_notes_case_manager_a/c_28_notes_case_manager_a/$1/$2';
$route['28_notes_case_manager_a/(:any)/(:num)/(:any)']        = 'notes/28_notes_case_manager_a/c_28_notes_case_manager_a/$1/$2/$3';
$route['28_notes_case_manager_a/(:any)/(:any)/(:any)/(:any)'] = 'notes/28_notes_case_manager_a/c_28_notes_case_manager_a/$1/$2/$3/$4';

/// ROUTES START FOR 29_notes_case_manager_b
$route['29_notes_case_manager_b'] = 'notes/29_notes_case_manager_b/c_29_notes_case_manager_b';
$route['29_notes_case_manager_b/(:any)'] = 'notes/29_notes_case_manager_b/c_29_notes_case_manager_b/$1';
$route['29_notes_case_manager_b/(:any)/(:any)']               = 'notes/29_notes_case_manager_b/c_29_notes_case_manager_b/$1/$2';
$route['29_notes_case_manager_b/(:any)/(:num)/(:any)']        = 'notes/29_notes_case_manager_b/c_29_notes_case_manager_b/$1/$2/$3';
$route['29_notes_case_manager_b/(:any)/(:any)/(:any)/(:any)'] = 'notes/29_notes_case_manager_b/c_29_notes_case_manager_b/$1/$2/$3/$4';

/// ROUTES START FOR 59_notes_catatan_keperawatan
$route['59_notes_catatan_keperawatan'] = 'notes/59_notes_catatan_keperawatan/c_59_notes_catatan_keperawatan';
$route['59_notes_catatan_keperawatan/(:any)'] = 'notes/59_notes_catatan_keperawatan/c_59_notes_catatan_keperawatan/$1';
$route['59_notes_catatan_keperawatan/(:any)/(:any)']               = 'notes/59_notes_catatan_keperawatan/c_59_notes_catatan_keperawatan/$1/$2';
$route['59_notes_catatan_keperawatan/(:any)/(:num)/(:any)']        = 'notes/59_notes_catatan_keperawatan/c_59_notes_catatan_keperawatan/$1/$2/$3';
$route['59_notes_catatan_keperawatan/(:any)/(:any)/(:any)/(:any)'] = 'notes/59_notes_catatan_keperawatan/c_59_notes_catatan_keperawatan/$1/$2/$3/$4';

/// ROUTES START FOR 37_edukasi_pra_operasi
$route['37_edukasi_pra_operasi'] = 'notes/37_edukasi_pra_operasi/c_37_edukasi_pra_operasi';
$route['37_edukasi_pra_operasi/(:any)'] = 'notes/37_edukasi_pra_operasi/c_37_edukasi_pra_operasi/$1';
$route['37_edukasi_pra_operasi/(:any)/(:any)']               = 'notes/37_edukasi_pra_operasi/c_37_edukasi_pra_operasi/$1/$2';
$route['37_edukasi_pra_operasi/(:any)/(:num)/(:any)']        = 'notes/37_edukasi_pra_operasi/c_37_edukasi_pra_operasi/$1/$2/$3';
$route['37_edukasi_pra_operasi/(:any)/(:any)/(:any)/(:any)'] = 'notes/37_edukasi_pra_operasi/c_37_edukasi_pra_operasi/$1/$2/$3/$4';

/// ROUTES START FOR 71_assesmen_bayi_baru_lahir
$route['71_assesmen_bayi_baru_lahir'] = 'notes/71_assesmen_bayi_baru_lahir/c_71_assesmen_bayi_baru_lahir';
$route['71_assesmen_bayi_baru_lahir/(:any)'] = 'notes/71_assesmen_bayi_baru_lahir/c_71_assesmen_bayi_baru_lahir/$1';
$route['71_assesmen_bayi_baru_lahir/(:any)/(:any)']               = 'notes/71_assesmen_bayi_baru_lahir/c_71_assesmen_bayi_baru_lahir/$1/$2';
$route['71_assesmen_bayi_baru_lahir/(:any)/(:num)/(:any)']        = 'notes/71_assesmen_bayi_baru_lahir/c_71_assesmen_bayi_baru_lahir/$1/$2/$3';
$route['71_assesmen_bayi_baru_lahir/(:any)/(:any)/(:any)/(:any)'] = 'notes/71_assesmen_bayi_baru_lahir/c_71_assesmen_bayi_baru_lahir/$1/$2/$3/$4';

/// ROUTES START FOR 141_edukasi_tindakan_anastesi_sedasi
$route['141_edukasi_tindakan_anastesi_sedasi'] = 'notes/141_edukasi_tindakan_anastesi_sedasi/c_141_edukasi_tindakan_anastesi_sedasi';
$route['141_edukasi_tindakan_anastesi_sedasi/(:any)'] = 'notes/141_edukasi_tindakan_anastesi_sedasi/c_141_edukasi_tindakan_anastesi_sedasi/$1';
$route['141_edukasi_tindakan_anastesi_sedasi/(:any)/(:any)']               = 'notes/141_edukasi_tindakan_anastesi_sedasi/c_141_edukasi_tindakan_anastesi_sedasi/$1/$2';
$route['141_edukasi_tindakan_anastesi_sedasi/(:any)/(:num)/(:any)']        = 'notes/141_edukasi_tindakan_anastesi_sedasi/c_141_edukasi_tindakan_anastesi_sedasi/$1/$2/$3';
$route['141_edukasi_tindakan_anastesi_sedasi/(:any)/(:any)/(:any)/(:any)'] = 'notes/141_edukasi_tindakan_anastesi_sedasi/c_141_edukasi_tindakan_anastesi_sedasi/$1/$2/$3/$4';