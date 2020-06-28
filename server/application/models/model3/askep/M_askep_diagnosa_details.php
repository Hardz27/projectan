<?php 

class M_askep_diagnosa_details extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->_table = 'ref_askep_diagnosa_details';
	}

    public function getall()
    {
        $this->db->select('
            a.id as id_ref_askep_diagnosa_details,
            a.askep_diagnosa_kode askep_diagnosa_kode,
            a.id_ref_askep_diagnosa_details_tipe id_ref_askep_diagnosa_details,
            a.askep_diagnosa_details_tipe aksep_diagnosa_details_tipe,
            a.askep_diagnosa_details askep_diagnosa_details,
            b.id as id_ref_askep_diagnosa,
            b.askep_diagnosa_nama askep_diagnosa_nama,
            b.askep_diagnosa_definisi askep_diagnosa_definisi,
            b.askep_diagnosa_kategori askep_diagnosa_kategori,
            b.askep_diagnosa_subkategori askep_diagnosa_subkategori
        ');
        $this->db->from('ref_askep_diagnosa_details a');
        $this->db->join('ref_askep_diagnosa b', 'a.askep_diagnosa_kode = b.askep_diagnosa_kode');
        return $this->db->get()->result_array();
    }

    
}