<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'rs/c_login';

// START ROUTES FOR NOTES
$route['notes'] = 'rs/c_notes';
$route['notes_vitals_notes'] = 'rs/c_notes/vitals';
$route['notes/detail'] = 'rs/c_notes/detail';
$route['id_notes_vitals'] = 'rs/c_notes/id_notes_vitals';
$route['data_grafik'] = 'rs/c_notes/data_grafik';


///////// TIDAK PERLU DIUBAH /////////
$route['kunjungan'] = 'rs/c_pasien';
$route['ref/dokter'] = 'rs/c_hrd/dokter';
$route['ref/perawat'] = 'rs/c_hrd/perawat';
$route['clinic_profile'] = 'rs/c_clinic_profile';
$route['ref/form_header'] = 'rs/c_ref_form_header';
$route['getall'] ='rs/c_pasien/getall';


///////// START ROUTES FOR NOTES_TEMP /////////
$route['notes_temp'] = 'notes/notes_temp/c_notes_temp';
$route['notes_temp/template'] = 'notes/notes_temp/c_notes_temp/template';
$route['notes_temp/visit'] = 'notes/notes_temp/c_notes_temp/visit';
///////// END ROUTES FOR NOTES_TEMP /////////

///////// START ROUTES FOR NOTES_TEMPLATE_REGISTRASI /////////
$route['notes_template_registrasi'] = 'notes/notes_template_registrasi/c_notes_template_registrasi';
$route['notes_template_registrasi/notes_reg'] = 'notes/notes_template_registrasi/c_notes_template_registrasi/notes_reg';
///////// END ROUTES FOR NOTES_TEMP /////////


//////////////////// START ROUTES FOR RUANG_OPERASI ////////////////////
$route['ruang_operasi'] = 'global/ruang_operasi/c_ruang_operasi';
//////////////////// END ROUTES FOR RUANG_OPERASI ////////////////////

//////////////////// START ROUTES FOR DEPARTEMENTS ////////////////////
$route['departements'] = 'rs/departements/c_departements';
//////////////////// END ROUTES FOR DEPARTEMENTS ////////////////////


//////////////////// START ROUTES FOR RUANG_OPERASI ////////////////////
$route['gdep_dig_sig'] = 'rs/dep_dig_sig/C_departements_digital_signature';
$route['add_dep_dig_sig'] = 'rs/dep_dig_sig/c_departements_digital_signature';
$route['del_dep_dig_sig'] = 'rs/dep_dig_sig/c_departements_digital_signature';
$route['edit_dep_dig_sig'] = 'rs/dep_dig_sig/c_departements_digital_signature';
//////////////////// END ROUTES FOR RUANG_OPERASI ////////////////////

//////////////////// START ROUTES FOR CLINIC ////////////////////
$route['clinic'] = 'rs/clinic/c_clinic_profile';
//////////////////// END ROUTES FOR CLINIC ////////////////////

//////////////////// START ROUTES FOR REF ////////////////////
$route['addresses'] = 'rs/c_global/alamat';
$route['get_jenis_rajal'] = 'rs/c_global/jenis_kegiatan_rawat_jalan';
$route['get_jenis_ranap'] = 'rs/c_global/jenis_pelayanan_rawat_inap';
$route['get_poli']        = 'rs/c_global/poli';
$route['get_dept_group'] = 'rs/c_global/departements_group';
//////////////////// END ROUTES FOR REF ////////////////////


//api users by safi

$route['users/(:any)/(:any)/(:any)/(:any)/(:any)']           = 'rs/users/C_user/users/$1/$2/$3/$4/$5';
$route['get_users_by_id']                             = 'rs/users/C_user/users_by_id';
$route['get_users_by_id/(:any)']                             = 'rs/users/C_user/users_by_id/$1';

$route['ref/daerah']                                         = 'rs/users/C_user/daerah';
$route['ref/create_rm_number']                               = 'rs/users/C_user/create_rm_number';

$route['user_edit']                                         = 'rs/users/C_user/user_edit';
$route['user_add']                                          = 'rs/users/C_user/user_add';
$route['user_hapus/(:any)']                                 = 'rs/users/C_user/user_hapus/$1';

// jgn diubah
$route['ref/form_header'] = 'global/c_ref_form_header';
$route['ref/blood_type'] = 'ref/c_ref/blood_type';
$route['ref/relationship'] = 'ref/c_ref/relationship';
$route['ref/marital_status'] = 'ref/c_ref/marital_status';
$route['ref/occupation'] = 'ref/c_ref/occupation';
$route['ref/pendidikan'] = 'ref/c_ref/pendidikan';
$route['ref/religion'] = 'ref/c_ref/religion';
$route['ref/smoking_status'] = 'ref/c_ref/smoking_status';

/////////////// ADDED BY ADI //////////////////////
$route['global'] = 'global/c_ref_global';
$route['form'] = 'rs/c_ref_global/form';
$route['ref/form_header'] = 'rs/c_ref_global/form';
$route['ref/global'] = 'rs/c_ref_global';
$route['ref/global/(:num)'] = 'rs/c_ref_global/$1';
$route['notes_pemantauan_sasaran_keselamatan'] = 'notes/notes_pemantauan_sasaran_keselamatan/c_notes_pemantauan_sasaran_keselamatan';
$route['notes_pemantauan_sasaran_keselamatan/(:num)'] = 'notes/notes_pemantauan_sasaran_keselamatan/c_notes_pemantauan_sasaran_keselamatan/$1';
/////////////// END OF ADDED BY ADI ///////////////


/////// START ROUTES FOR STOCK ////////
$route['gudang/stock_per_id_ro_details'] = 'rs/produk/c_stock/stock_per_id_ro_details';
$route['gudang/stock_per_id_produk'] = 'rs/produk/c_stock/stock_per_id_produk';

$route['gudang/opname_per_id_produk'] = 'rs/produk/c_stock/opname_per_id_produk';
$route['gudang/opname_per_id_ro_details'] = 'rs/produk/c_stock/opname_per_id_ro_details';
$route['gudang/detail_per_id_produk'] = 'rs/produk/c_stock/produk_detail';
$route['gudang/detail_per_id_ro_detail'] = 'rs/produk/c_stock/id_ro_detail';

$route['gudang/harga_produk'] = 'rs/produk/c_stock/harga_produk';
$route['gudang/mutasi_internal'] = 'rs/produk/c_stock/mutasi_internal';
$route['gudang/mutasi_internal_log'] = 'rs/produk/c_stock/mutasi_internal_log';


////////// Routes for API accounting //////////
$route['accounting/data_account'] = 'rs/accounting/C_accounting/data_account';
$route['accounting/jurnal'] = 'rs/accounting/C_accounting/jurnal';
$route['accounting/jurnal/detail'] = 'rs/accounting/C_accounting/jurnal_detail';
$route['accounting/buku_besar'] = 'rs/accounting/C_accounting/buku_besar';
$route['accounting/jurnal_list'] = 'rs/accounting/C_accounting/jurnal_list';

///////// START ROUTES FOR KOSAKATA /////////
$route['kosakata'] = 'rs/c_kosakata';
$route['kosakata/(:any)']   = 'rs/c_kosakata/$1';
$route['kosakata/(:any)/(:num)/(:any)/(:num)']   = 'rs/c_kosakata/$1/$2/$3/$4';
///////// END ROUTES FOR KOSAKATA/////////

///////// START API TABLE contract_clients_exhibit_a /////////
$route['contract_clients_exhibit_a'] = 'rs/client/C_contract_clients_exhibit_a/main';
$route['contract_clients_exhibit_a/(:any)'] = 'rs/client/C_contract_clients_exhibit_a/main/$1';
///////// END API TABLE contract_clients_exhibit_a /////////

///////// START API TABLE contract_clients_exhibit_a /////////
$route['contract_clients_exhibit_a'] = 'rs/client/C_contract_clients_exhibit_a/main';
$route['contract_clients_exhibit_a/(:any)'] = 'rs/client/C_contract_clients_exhibit_a/main/$1';
///////// END API TABLE contract_clients_exhibit_a /////////


///////// START API Laporan  /////////
$route['laporan_854']           = 'laporan/laporan_854/C_laporan_854/get_all';
$route['laporan_854/(:any)']    = 'laporan/laporan_854/C_laporan_854/get_by_id';
///////// END API Laporan  /////////

///////// START API Laporan Biaya Pembulatan /////////
$route['laporan_860']           = 'laporan/laporan_860/C_laporan_860/indexs';
///////// END API Laporan Biaya Pembulatan /////////

///////// START API Laporan Biaya Admin /////////
$route['laporan_861']           = 'laporan/laporan_861/C_laporan_861/indexs';
///////// END API Laporan Biaya Admin /////////

///////// START API Laporan Biaya Racikan /////////
$route['laporan_862']           = 'laporan/laporan_862/C_laporan_862/indexs';
///////// END API Laporan Biaya Racikan /////////

///////// START API Laporan 901 /////////
$route['laporan_901']           = 'laporan/laporan_901/C_laporan_901/indexs';
$route['laporan_901/report']    = 'laporan/laporan_901/C_laporan_901/report_rajal';
///////// END API Laporan 901 /////////

///////// START API Laporan 902 /////////
$route['laporan_902']           = 'laporan/laporan_902/C_laporan_902/indexs';
$route['laporan_902/report']    = 'laporan/laporan_902/C_laporan_902/report_kamar';
///////// END API Laporan 902 /////////

///////// START API Laporan 903 /////////
$route['laporan_903']           = 'laporan/laporan_903/C_laporan_903/indexs';
$route['laporan_903/report']    = 'laporan/laporan_903/C_laporan_903/report_rajal_per_week';
///////// END API Laporan 903 /////////

///////// START API Laporan 904 /////////
$route['laporan_904']           = 'laporan/laporan_904/C_laporan_904/indexs';
///////// END API Laporan 904 /////////

///////// START API Laporan 905 /////////
$route['laporan_905']           = 'laporan/laporan_905/C_laporan_905/indexs';
$route['laporan_905/report']    = 'laporan/laporan_905/C_laporan_905/report_kunjungan_pasien_berdasarkan_checkout';
///////// END API Laporan 905 /////////

///////// START API Laporan 940 /////////
$route['laporan_940']           = 'laporan/laporan_940/C_laporan_940/report_kunjungan_pasien_usg';
///////// END API Laporan 940 /////////

///////// START API Laporan 941 /////////
$route['laporan_941']           = 'laporan/laporan_941/C_laporan_941/report_kunjungan_pasien_poli_igd_rajal';
///////// END API Laporan 941 /////////

///////// START API Laporan 945 /////////
$route['laporan_945']           = 'laporan/laporan_945/C_laporan_945/indexs';
///////// END API Laporan 945 /////////


///////// START API Laporan RL3_3 /////////
$route['laporan_rl3_3/ref']           = 'laporan/laporan_rl3_3/C_laporan_rl3_3/getRefKegiatan';
$route['laporan_rl3_3']	    	      = 'laporan/laporan_rl3_3/C_laporan_rl3_3/reportOneLevel';
///////// END API Laporan RL3_3 /////////

///////// START API Laporan RL3_9 /////////
$route['laporan_rl3_9/ref']           = 'laporan/laporan_rl3_9/C_laporan_rl3_9/getRefRehabMedik';
$route['laporan_rl3_9']	   	          = 'laporan/laporan_rl3_9/C_laporan_rl3_9/reportPelayananRehabilitasMedik';
///////// END API Laporan RL3_9 /////////

///////// START API Laporan RL3_10 /////////
$route['laporan_rl3_10/ref']           = 'laporan/laporan_rl3_10/C_laporan_rl3_10/getRefKegiatan';
$route['laporan_rl3_10']	           = 'laporan/laporan_rl3_10/C_laporan_rl3_10/reportOneLevel';
///////// END API Laporan RL3_10 /////////

///////// START API Laporan RL3_11 /////////
$route['laporan_rl3_11/ref']           = 'laporan/laporan_rl3_11/C_laporan_rl3_11/getRefKegiatan';
$route['laporan_rl3_11']	           = 'laporan/laporan_rl3_11/C_laporan_rl3_11/reportOneLevel';
///////// END API Laporan RL3_11 /////////



/// ROUTES START FOR NOTES DIAGNOSA
$route['notes_askep_diagnosa'] = 'notes/notes_askep_diagnosa/c_notes_askep_diagnosa';
$route['notes_askep_diagnosa/(:any)'] = 'notes/notes_askep_diagnosa/c_notes_askep_diagnosa/$1';
$route['notes_askep_diagnosa/(:any)/(:any)']               = 'notes/notes_askep_diagnosa/c_notes_askep_diagnosa/$1/$2';
$route['notes_askep_diagnosa/(:any)/(:num)/(:any)']        = 'notes/notes_askep_diagnosa/c_notes_askep_diagnosa/$1/$2/$3';
$route['notes_askep_diagnosa/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_askep_diagnosa/c_notes_askep_diagnosa/$1/$2/$3/$4';


/// ROUTES START FOR NOTES LUARAN
$route['notes_askep_luaran'] = 'notes/notes_askep_luaran/c_notes_askep_luaran';
$route['notes_askep_luaran/(:any)'] = 'notes/notes_askep_luaran/c_notes_askep_luaran/$1';
$route['notes_askep_luaran/(:any)/(:any)']               = 'notes/notes_askep_luaran/c_notes_askep_luaran/$1/$2';
$route['notes_askep_luaran/(:any)/(:num)/(:any)']        = 'notes/notes_askep_luaran/c_notes_askep_luaran/$1/$2/$3';
$route['notes_askep_luaran/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_askep_luaran/c_notes_askep_luaran/$1/$2/$3/$4';

/// ROUTES START FOR NOTES INTERVENSI
$route['notes_askep_intervensi'] = 'notes/notes_askep_intervensi/c_notes_askep_intervensi';
$route['notes_askep_intervensi/(:any)'] = 'notes/notes_askep_intervensi/c_notes_askep_intervensi/$1';
$route['notes_askep_intervensi/(:any)/(:any)']               = 'notes/notes_askep_intervensi/c_notes_askep_intervensi/$1/$2';
$route['notes_askep_intervensi/(:any)/(:num)/(:any)']        = 'notes/notes_askep_intervensi/c_notes_askep_intervensi/$1/$2/$3';
$route['notes_askep_intervensi/(:any)/(:any)/(:any)/(:any)'] = 'notes/notes_askep_intervensi/c_notes_askep_intervensi/$1/$2/$3/$4';

