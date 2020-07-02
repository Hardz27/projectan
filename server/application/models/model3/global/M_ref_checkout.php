<?php

class M_ref_checkout extends CI_Model {

    public function get_data_checkout ($filter) {
        $data = $this->db->select(
            'checkout.id as id_checkout,
            checkout.nama as nama_checkout'
        )
        ->from('ref_checkout as checkout');

        if($filter['tipe_laporan'] == 0) {
            $data->where('checkout.level', 1);
        } else if ($filter['tipe_laporan'] == 1) {
            $data->where('checkout.is_last_child', 1);
        }

        return $data->get()->result_array();
    }
}
