<?php

class M_departments extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->_table = 'departements';
    }

    public function get_all_departements () {
        $query_data_departements = $this->db
            ->from($this->_table)
            ->where('type' , 1)
            ->get()
            ->result_array();
        return $query_data_departements;
    }

    public function get_departement_by_tipe ($tipe) {
        $this->db->select(
            'departement_id as id_departement,
            departement_name as nama_departement'
        )
        ->from($this->_table);

        if($tipe == 0) {
            $this->db->where('type', 0);
        } else if ($tipe == 1) {
            $this->db->where('type', 4);
        } else if ($tipe == 2) {
            $this->db->where_not_in('type', array(0,4));
        }

        return $this->db->get()->result_array();
    }
}
