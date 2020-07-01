<?php 

class M_laporan_lrs870 extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->_table = 'contract_clients_exhibit_a';
	}

    public function index_get()
    {
        $this->db->select('
            id id,
            no_ref no_ref,
            exhibit_a exhibit_a,
            notes notes,
            combo_package_fee combo_package_fee,
            combo_package_tax combo_package_tax,
            package_travel_fee package_travel_fee,
            grand_total grand_total,
            package_extra_hour_rate package_extra_hour_rate,
            raw_or_dropbox raw_or_dropbox,
            person1_signature person1_signature,
            person1_signature_date person1_signature_date,
            person1_ip_address person1_ip_address,
            person2_signature person2_signature,
            person2_signature_date person2_signature_date,
            person2_ip_address person2_ip_address,
            signature_admin1 signature_admin1,
            signature_admin2 signature_admin2,
            signature_date signature_date,
            del_date del_date
        ');

        $this->db->from($this->_table);
        return $this->db->get()->result_array();
    }

    public function contract_clients_exhibit_a_show($id)
    {
        $this->db->select('
            id id,
            no_ref no_ref,
            exhibit_a exhibit_a,
            notes notes,
            combo_package_fee combo_package_fee,
            combo_package_tax combo_package_tax,
            package_travel_fee package_travel_fee,
            grand_total grand_total,
            package_extra_hour_rate package_extra_hour_rate,
            raw_or_dropbox raw_or_dropbox,
            person1_signature person1_signature,
            person1_signature_date person1_signature_date,
            person1_ip_address person1_ip_address,
            person2_signature person2_signature,
            person2_signature_date person2_signature_date,
            person2_ip_address person2_ip_address,
            signature_admin1 signature_admin1,
            signature_admin2 signature_admin2,
            signature_date signature_date,
            del_date del_date
        ');

        $this->db->from($this->_table);
        $this->db->where('id', $id);
        return $this->db->get()->result_array();
    }

    public function contract_clients_exhibit_a_get_add($payload)
    {
        return $this->db->insert('contract_clients_exhibit_a', $payload);
    }

    public function contract_clients_exhibit_a_put($payload, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->_table, $payload);
    }

    public function soft_delete($payload, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->_table, $payload);
    }
}