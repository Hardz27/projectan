<?php 

class M_departments_group extends CI_Model {

    public function get_id_by_nama_type ($nama) {
        $queryDataGroup = $this->db
        	->select('id')
        	->from('departements_group')
            ->where('nama_type' , $nama)
            ->limit(1)
            ->get()->result_array();

        return $queryDataGroup[0]['id'];
    }
}


/*

Parameter example
- nama = 'rawat jalan'


Query Native
SELECT `id`
	FROM `departements_group`
	WHERE `nama_type` = 'rawat jalan'
	LIMIT 1
*/