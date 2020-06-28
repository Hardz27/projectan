<?php 

class M_askep_diagnosa_mtm_intervensi extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->_table = 'ref_askep_mtm_diagnosa_intervensi';
	}

    public function getall()
    {
        $this->db->select('
            a.id as id_ref_askep_mtm_diagnosa_intervensi,
            a.askep_diagnosa_kode askep_diagnosa_kode,
            a.jenis_intervensi_tipe jenis_intervensi_tipe,
            a.jenis_intervensi jenis_intervensi,
            a.askep_intervensi_kode askep_intervensi_kode,
            b.id as id_ref_askep_diagnosa_details,
            b.id_ref_askep_diagnosa_details_tipe id_ref_askep_diagnosa_details,
            b.askep_diagnosa_details_tipe aksep_diagnosa_details_tipe,
            b.askep_diagnosa_details askep_diagnosa_details,
            c.id as id_ref_askep_diagnosa,
            c.askep_diagnosa_nama askep_diagnosa_nama,
            c.askep_diagnosa_definisi askep_diagnosa_definisi,
            c.askep_diagnosa_kategori askep_diagnosa_kategori,
            c.askep_diagnosa_subkategori askep_diagnosa_subkategori,
            d.id as id_ref_askep_intervensi_details,
            d.id_ref_askep_intervensi_details_tipe id_ref_askep_intervensi_details_tipe,
            d.askep_intervensi_details_tipe askep_intervensi_details_tipe,
            d.askep_intervensi_details askep_intervensi_details,
            e.id as id_ref_askep_intervensi,
            e.askep_intervensi_nama askep_intervensi_nama,
            e.askep_intervensi_definisi askep_intervensi_definisi
        ');
        $this->db->from('ref_askep_mtm_diagnosa_intervensi a');
        $this->db->join('ref_askep_diagnosa_details b', 'a.askep_diagnosa_kode = b.askep_diagnosa_kode');
        $this->db->join('ref_askep_diagnosa c', 'b.askep_diagnosa_kode = c.askep_diagnosa_kode');
        $this->db->join('ref_askep_intervensi_details d', 'a.askep_intervensi_kode = d.askep_intervensi_kode');
        $this->db->join('ref_askep_intervensi e', 'd.askep_intervensi_kode = e.askep_intervensi_kode');
        return $this->db->get()->result_array();
    }
    
}