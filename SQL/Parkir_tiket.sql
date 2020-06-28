-- Query mencari parkir tiket berdasarkan no karcis atau kode karcis
SELECT `id` `id`,
    `kode_tiket` `kode`,
    `no_karcis` `no_karcis`,
    `jenis_kendaraan` `kendaraan`,
    `plat_nomor` `plat`, 
    `entry_gate` `entry_gate`, 
    `entry_time` `entry_time`, 
    `exit_gate` `exit_gate`, 
    `exit_time` `exit_time`, 
    `exit_employee` `exit_employee`, 
    `fee_discount` `fee_discount`, 
    `fee_ticket_hilang` `fee_ticket_hilang`, 
    `fee_per_jam` `fee_per_jam`, 
    `fee_total` `fee_total`, 
    `fee_tarif` `fee_tarif`, 
    `fee_bayar` `fee_bayar`, 
    `fee_kembalian` `fee_kembalian`, 
    `created_date` `created_date`, 
    `del_date` `del_date`, 
    `del_by` `del_by`, 
    `tiket_hilang_date` `tiket_hilang_date`, 
    `catatan` `catatan` 
    FROM `parkir_tiket` `pt` 
    WHERE `kode_tiket` = '912KJAL' 
        OR `no_karcis` = 'KALSS98' 
        AND `del_date` IS NULL


-- Query Pencarian/pengecekan tiket yang sudah checkout
SELECT * 
    FROM `parkir_tiket` `pt` 
    WHERE ( `kode_tiket` = '*' OR `no_karcis` = '*' ) AND `exit_time` != ''


-- Query Mencari harga dan jenis kendaraan
SELECT `data` `jenis_kendaraan`,
    `harga` `harga_per_jam` 
    FROM `master_global` `m` 
    WHERE `id_master_global_groupa` = '31'

-- Query mencari 10 data tiket terakhir
SELECT * 
    FROM `parkir_tiket` `pt` 
    WHERE `exit_time` IS NOT NULL
    ORDER BY `pt`.`exit_time` DESC LIMIT 10



-- Query menampilkan data untuk page laporan parkir
SELECT `id` `id`, 
    `kode_tiket` `kode`, 
    `no_karcis` `no_karcis`, 
    `jenis_kendaraan` `kendaraan`, 
    `plat_nomor` `plat`, 
    `entry_gate` `entry_gate`,
    `entry_time` `entry_time`, 
    `exit_gate` `exit_gate`, 
    `exit_time` `exit_time`, 
    `exit_employee` `exit_employee`, 
    `fee_discount` `fee_discount`, 
    `fee_ticket_hilang` `fee_ticket_hilang`, 
    `fee_per_jam` `fee_per_jam`, 
    `fee_total` `fee_total`, 
    `fee_tarif` `fee_tarif`, 
    `fee_bayar` `fee_bayar`, 
    `fee_kembalian` `fee_kembalian`, 
    `created_date` `created_date`, 
    `del_date` `del_date`, 
    `del_by` `del_by`, 
    `tiket_hilang_date` `tiket_hilang_date`, 
    `catatan` `catatan` 
    FROM `parkir_tiket` `pt` 
    WHERE `exit_time` IS NULL  -- Ketika mencari aktif tiket, dan NOT NULL untuk checked out tiket--
        AND `del_date` IS NULL 
        AND `created_date` > `IS` `NULL` 
        AND `created_date` <= '23:59:59' 
        ORDER BY `pt`.`exit_timea` DESC