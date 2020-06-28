<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_parkir_tiket extends CI_Model
{

    public function get($params)
    {

        $timezone = $this->getTimeZone();
        $data['timezone'] = $timezone[0]['timezone'];

        $this->db->select('data gerbang');
        $this->db->from('master_global m');
        $this->db->where('id_master_global_group', '33');
        $data['gerbang'] = $this->db->get()->result_array();

        $this->db->select('
            id id,
            kode_tiket kode,
            no_karcis no_karcis,
            jenis_kendaraan kendaraan,
            plat_nomor plat,
            entry_gate entry_gate,
            entry_time entry_time,
            exit_gate exit_gate,
            exit_time exit_time,
            exit_employee exit_employee,
            fee_discount fee_discount,
            fee_ticket_hilang fee_ticket_hilang,
            fee_per_jam fee_per_jam,
            fee_total fee_total,
            fee_tarif fee_tarif,
            fee_bayar fee_bayar,
            fee_kembalian fee_kembalian,
            created_date created_date,
            del_date del_date,
            del_by del_by,
            tiket_hilang_date tiket_hilang_date,
            catatan catatan
        ');

        $this->db->from('parkir_tiket pt');
        //
        // Ketika get data untuk Notes dan Laporan parkir
        //
        ///////////////////////////////////////////////
        if (isset($params['kode_tiket'])) {
            $this->db->where('kode_tiket', $params['kode_tiket']);
            $this->db->or_where('no_karcis', $params['kode_tiket']);
            // $this->db->where('exit_time', null);
            $this->db->where('del_date', null);
            $data['selected_parkir'] = $this->db->get()->result_array();

            // Check Checked out data parkir
            $this->db->from('parkir_tiket pt');
            $this->db->group_start();
            $this->db->where('kode_tiket', $params['kode_tiket']);
            $this->db->or_where('no_karcis', $params['kode_tiket']);
            $this->db->group_end();
            $this->db->where('exit_time !=', '');
            $data['check'] = $this->db->get()->result_array();

            //  Get data Jenis Kendaraan
            //  Jika get tipenya kode / get dari kasir
            $this->db->select('
                data jenis_kendaraan,
                harga harga_per_jam
            ');
            $this->db->from('master_global m');
            $this->db->where('id_master_global_group', '31');
            $data['kendaraan'] = $this->db->get()->result_array();

            $this->db->from('parkir_tiket pt');
            $this->db->where('exit_time != ', null);
            $this->db->limit(10);
            $this->db->order_by('pt.exit_time', 'DESC');
            $data['parkir'] = $this->db->get()->result_array();

            $this->db->select('data denda');
            $this->db->from('master_global m');
            $this->db->where('id', '1010');
            $data['denda'] = $this->db->get()->result_array();

        }else if (isset($params['kode_karcis'])) {
            //
            // Ketika get kode karcis / hendak generate karcis
            //
            ///////////////////////////////////////////////
            $this->db->where('kode_tiket', $params['kode_karcis']);
            $this->db->or_where('no_karcis', $params['kode_karcis']);
            $this->db->where('del_date', null);
            $data['selected_parkir'] = $this->db->get()->result_array();

            $this->db->select('data judul');
            $this->db->from('master_global m');
            $this->db->where('id', '2000');
            $data['judul'] = $this->db->get()->result_array();

            $this->db->select('data subjudul');
            $this->db->from('master_global m');
            $this->db->where('id', '1001');
            $data['subjudul'] = $this->db->get()->result_array();

            $this->db->select('data address1');
            $this->db->from('master_global m');
            $this->db->where('id', '1002');
            $data['address1'] = $this->db->get()->result_array();

            $this->db->select('data address2');
            $this->db->from('master_global m');
            $this->db->where('id', '1003');
            $data['address2'] = $this->db->get()->result_array();

            $this->db->select('data deskripsi1');
            $this->db->from('master_global m');
            $this->db->where('id', '2001');
            $data['deskripsi1'] = $this->db->get()->result_array();

            $this->db->select('data deskripsi2');
            $this->db->from('master_global m');
            $this->db->where('id', '2002');
            $data['deskripsi2'] = $this->db->get()->result_array();

            $this->db->select('data deskripsi3');
            $this->db->from('master_global m');
            $this->db->where('id', '1007');
            $data['deskripsi3'] = $this->db->get()->result_array();            

            $this->db->select('data deskripsi4');
            $this->db->from('master_global m');
            $this->db->where('id', '2003');
            $data['deskripsi4'] = $this->db->get()->result_array();
            $data['check'] = [];

            $data['selected_parkir'] = $data['selected_parkir'][0];
            $data['judul'] = $data['judul'][0]['judul'];
            $data['subjudul'] = $data['subjudul'][0]['subjudul'];
            $data['address1'] = $data['address1'][0]['address1'];
            $data['address2'] = $data['address2'][0]['address2'];
            $data['deskripsi1'] = $data['deskripsi1'][0]['deskripsi1'];
            $data['deskripsi2'] = $data['deskripsi2'][0]['deskripsi2'];
            $data['deskripsi3'] = $data['deskripsi3'][0]['deskripsi3'];
            $data['deskripsi4'] = $data['deskripsi4'][0]['deskripsi4'];


        }else if (isset($params['kode_struk'])) {
            //
            //Ketika get kode struk / hendak generate struk
            //
            ///////////////////////////////////////////////
            $this->db->where('kode_tiket', $params['kode_struk']);
            $this->db->or_where('no_karcis', $params['kode_struk']);
            $this->db->where('del_date', null);
            $data['selected_parkir'] = $this->db->get()->result_array();


            $this->db->select('data judul');
            $this->db->from('master_global m');
            $this->db->where('id', '1001');
            $data['judul'] = $this->db->get()->result_array();

            $this->db->select('data footer');
            $this->db->from('master_global m');
            $this->db->where('id', '2004');
            $data['footer'] = $this->db->get()->result_array();


            $data['selected_parkir'] = $data['selected_parkir'][0];
            $data['judul'] = $data['judul'][0]['judul'];
            $data['footer'] = $data['footer'][0]['footer'];
            $data['check'] = [];
            
        }else{    
            if ($params['is_exit_time_null']) {
                $this->db->where('exit_time', null);
            }
            else{
                $this->db->where('exit_time != ', null);
            }
            $this->db->where('del_date', null);
            $this->db->where('created_date >=', $params['tgl_start']);
            $this->db->where('created_date <=', $params['tgl_end'] . '23:59:59');

            $this->db->order_by('pt.exit_time', 'DESC');
            $data['parkir'] = $this->db->get()->result_array();
            $data['check'] = [];
        }

        return $data;
    }

    public function add($params)
    {
        return $this->db->insert('parkir_tiket', $params);
    }

    public function update($params, $kode)
    {
        $this->db->where(['kode_tiket' => $kode]);
        $this->db->or_where('no_karcis', $kode);
        $check = $this->db->update('parkir_tiket', $params);

        if ($check) {
            $result = 1;
        } else {
            $result = 0;
        }

        return $result;
        // return 1;
    }

     public function getTimeZone()
    {
        $this->db->select('
            data timezone
        ');
        $this->db->from('master_global m');
        $this->db->where('id', '998');
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function getLastNum()
    {
        $this->db->select('
            id id,
            no_karcis last_num
        ');
        $this->db->from('parkir_tiket a');
        $this->db->limit(1);
        $this->db->order_by('id',"DESC");
        $data = $this->db->get()->result_array();

        return $data;
    }

}


/*

Query mencari parkir tiket berdasarkan no karcis atau kode karcis
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


Query Pencarian/pengecekan tiket yang sudah checkout
SELECT * 
    FROM `parkir_tiket` `pt` 
    WHERE ( `kode_tiket` = '*' OR `no_karcis` = '*' ) AND `exit_time` != ''


Query Mencari harga dan jenis kendaraan
SELECT `data` `jenis_kendaraan`,
    `harga` `harga_per_jam` 
    FROM `master_global` `m` 
    WHERE `id_master_global_groupa` = '31'

Query mencari 10 data tiket terakhir
SELECT * 
    FROM `parkir_tiket` `pt` 
    WHERE `exit_time` IS NOT NULL
    ORDER BY `pt`.`exit_time` DESC LIMIT 10



Query menampilkan data untuk page laporan parkir
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
*/