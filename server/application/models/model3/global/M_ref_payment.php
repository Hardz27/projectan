<?php 

class M_ref_payment extends CI_Model {
    
    public function getAllPayment () {
        $queryDataPayment = $this->db
            ->select('id_ref_payment as id_payment','payment as nama_payment')
            ->from('ref_payment')
            ->where('is_del' , 0)
            ->where('sub_payment' , 0)
            ->get()->result_array();

        return $queryDataPayment;
    }
}
