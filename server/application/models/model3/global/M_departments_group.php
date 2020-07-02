<?php 

class M_departments_group extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->_table = 'departements_group';
    }

    public function get_id_by_nama_type ($nama) {
        $queryDataGroup = $this->db
        	->select('id')
        	->from($this->_table)
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