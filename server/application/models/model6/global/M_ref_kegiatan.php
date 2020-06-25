<?php 

class M_ref_kegiatan extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->_table = "ref_kegiatan";
    }

    public function getKegiatanByGroup($group = '') {
        $data = $this->db
            ->select('
                id as id_kegiatan,
                nama as nama_kegiatan,
                id_kegiatan as id_parent,
                is_last_child as is_child
            ')
            ->from($this->_table);

        if(!empty($group)) {
            $data->where('id_group', $group);
        }

        return $data->get()->result_array();
    }
}
