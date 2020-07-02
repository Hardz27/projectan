<?php

namespace App\Models\Model2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment_rad_detail extends Model {
    protected $table = "payment_rad_detail";
    protected $primaryKey = "id";

    public $timestamps = false;
    protected $fillable = ['id','id_payment_rad','id_order_rad_details','id_order_rad_details_jasmed','nilai_payment'];

    public function getPaymentRadDetailsByOrderId($orderId)
    {
        $dataOrderRadDetails = $this
            ->select([
                'payment_rad_detail.id as id',
                'payment_rad_detail.nilai_payment as nilai_payment',
                'payment_rad_detail.id_order_rad_details as id_order_rad_details',
                'payment_rad.id as payment_rad_detail.payment_rad.id',
                // 'payment_rad.no_payment_rad as payment_rad_detail.payment_rad.no_payment_rad',
                'payment_rad.created_by as payment_rad_detail.payment_rad.created_by',
                'payment_rad.created_date as payment_rad_detail.payment_rad.created_date',
                // 'payment_rad.is_del as payment_rad_detail.payment_rad.is_del',
                'payment.id as payment_rad.payment.id',
                'payment.no_payment as payment_rad.payment.no_payment',
                'payment.nilai_payment_diterima as payment_rad.payment.nilai_payment_diterima',
                'payment.nilai_payment_tagihan as payment_rad.payment.nilai_payment_tagihan',
                'payment.created_date as payment_rad.payment.created_date',
                'payment.created_by as payment_rad.payment.created_by',
                'payment.is_del as payment_rad.payment.is_del',
                'ref_payment.id_ref_payment as payment_rad.ref_payment.id_ref_payment',
                'ref_payment.id_kegiatan as payment_rad.ref_payment.id_kegiatan',
                'ref_payment.payment as payment_rad.ref_payment.payment',
                'ref_payment.prefix as payment_rad.ref_payment.prefix',
                'ref_payment.status as payment_rad.ref_payment.status',
                'ref_payment.sub_payment as payment_rad.ref_payment.sub_payment',
                'ref_payment.payor_cd as payment_rad.ref_payment.payor_cd',
                'ref_payment.is_del as payment_rad.ref_payment.is_del',
                'ref_payment.jenis_cara_bayar as payment_rad.ref_payment.jenis_cara_bayar',
                // 'id_users_kasir.user_id as payment_rad.id_users_kasir.user_id',
                // 'id_users_kasir.full_name as payment_rad.id_users_kasir.full_name',
                // 'payment_rad_created_by.user_id as payment_rad.payment_rad_created_by.user_id',
                // 'payment_rad_created_by.full_name as payment_rad.payment_rad_created_by.full_name',
                'order_rad_details_jasmed.id as order_rad_details_jasmed.id',
                'order_rad_details_jasmed.nilai_order_rad_jasmed as order_rad_details_jasmed.nilai_order_rad_jasmed',
                'order_rad_details_jasmed.nilai_discount_jasmed as order_rad_details_jasmed.nilai_discount_jasmed',
                'order_rad_details_jasmed.id_order_rad_details as order_rad_details_jasmed.id_order_rad_details',

                'bt_master_jasmed.id as order_rad_details_jasmed.bt_master_jasmed.id',
                'bt_master_jasmed.nama_master_jasmed as order_rad_details_jasmed.bt_master_jasmed.nama_master_jasmed',
                'bt_master_jasmed.is_single as order_rad_details_jasmed.bt_master_jasmed.is_single',
                'id_users_karyawan.user_id as payment_rad.id_users_karyawan.user_id',
                'id_users_karyawan.full_name as payment_rad.id_users_karyawan.full_name',
            ])
            ->leftJoin('payment_rad as payment_rad', 'payment_rad_detail.id_payment_rad', '=', 'payment_rad.id')
            ->leftJoin('payment as payment', 'payment_rad.id_payment', '=', 'payment.id')
            ->leftJoin('ref_payment as ref_payment', 'payment_rad.id_ref_payment', '=', 'ref_payment.id_ref_payment')
            // ->leftJoin('users_profile as id_users_kasir', 'payment_rad.id_users_kasir', '=', 'id_users_kasir.user_id')
            // ->leftJoin('users_profile as payment_rad_created_by', 'payment_rad.created_by', '=', 'payment_rad_created_by.user_id')

            ->leftJoin('order_rad_details_jasmed as order_rad_details_jasmed', 'payment_rad_detail.id_order_rad_details_jasmed', '=', 'order_rad_details_jasmed.id')
            ->leftJoin('bt_master_jasmed as bt_master_jasmed', 'order_rad_details_jasmed.id_bt_master_jasmed', '=', 'bt_master_jasmed.id')
            ->leftJoin('users_profile as id_users_karyawan', 'order_rad_details_jasmed.id_users_karyawan', '=', 'id_users_karyawan.user_id')
            ->where("payment_rad_detail.id_order_rad_details", $orderId)
            ->get();

        return $dataOrderRadDetails;
    }
}
