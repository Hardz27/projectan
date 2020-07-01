<?php 

class M_askep_diagnosa_mtm_luaran extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->_table = 'ref_askep_mtm_diagnosa_luaran';
	}

    public function getall()
    {
        $this->db->select('
            a.id as id_ref_askep_mtm_diagnosa_luaran,
            a.askep_diagnosa_kode askep_diagnosa_kode,
            a.jenis_luaran_tipe jenis_luaran_tipe,
            a.jenis_luaran jenis_luaran,
            a.askep_luaran_kode askep_luaran_kode,
            b.id as id_ref_askep_diagnosa_details,
            b.id_ref_askep_diagnosa_details_tipe id_ref_askep_diagnosa_details,
            b.askep_diagnosa_details_tipe aksep_diagnosa_details_tipe,
            b.askep_diagnosa_details askep_diagnosa_details,
            c.id as id_ref_askep_diagnosa,
            c.askep_diagnosa_nama askep_diagnosa_nama,
            c.askep_diagnosa_definisi askep_diagnosa_definisi,
            c.askep_diagnosa_kategori askep_diagnosa_kategori,
            c.askep_diagnosa_subkategori askep_diagnosa_subkategori,
            d.id as id_ref_askep_luaran_details,
            d.id_ref_askep_luaran_details_tipe id_ref_askep_luaran_details_tipe,
            d.askep_luaran_details_tipe askep_luaran_details_tipe,
            d.askep_luaran_details askep_luaran_details,
            e.id as id_ref_askep_luaran,
            e.askep_luaran_nama askep_luaran_nama,
            e.askep_luaran_definisi askep_luaran_definisi,
            e.askep_luaran_ekspektasi askep_luaran_ekspektasi
        ');

        $this->db->from('ref_askep_mtm_diagnosa_luaran a');
        $this->db->join('ref_askep_diagnosa_details b', 'a.askep_diagnosa_kode = b.askep_diagnosa_kode');
        $this->db->join('ref_askep_diagnosa c', 'b.askep_diagnosa_kode = c.askep_diagnosa_kode');
        $this->db->join('ref_askep_luaran_details d', 'a.askep_luaran_kode = d.askep_luaran_kode');
        $this->db->join('ref_askep_luaran e', 'd.askep_luaran_kode = e.askep_luaran_kode');
        return $this->db->get()->result_array();
    }
    
}