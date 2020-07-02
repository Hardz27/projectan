<?php

class M_askep_luaran extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}

    public function get_detail($id = null)
    {
        $this->db->select('*');
        $this->db->from('notes_askep_luaran');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->where('del_date', null);

        $query = $this->db->get()->result_array();

        return $query;
    }

    public function get($id = null, $no_rm)
    {
        $this->db->select('*');
        $this->db->from('notes_askep_luaran a');
        if ($id != null) {
            $this->db->where('a.id_pasien_visit', $id);
        }
        $this->db->where('a.del_date', null);
        $this->db->where('a.no_rm', $no_rm);

        $this->db->order_by('a.id', 'DESC');
        $query = $this->db->get()->result_array();

        return $query;
    }

    public function get_all($id='')
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
        $this->db->group_by("d.askep_luaran_kode");
        if($id!=''){
            $this->db->where("e.id",$id);
        }
        return $this->db->get()->result_array();
    }

    // public function get_all($id='')
    // {
    //     $this->db->select('
    //         a.id AS id_ref_askep_luaran_details,
    //         a.askep_luaran_kode askep_luaran_kode,
    //         a.id_ref_askep_luaran_details_tipe id_ref_askep_luaran_details,
    //         a.askep_luaran_details_tipe aksep_luaran_details_tipe,
    //         a.askep_luaran_details askep_luaran_details,
    //         b.id AS id_ref_askep_luaran,
    //         b.askep_luaran_nama askep_luaran_nama,
    //         b.askep_luaran_definisi askep_luaran_definisi
    //     ');
    //     $this->db->from('ref_askep_luaran_details a');
    //     $this->db->join('ref_askep_luaran b', 'a.askep_luaran_kode = b.askep_luaran_kode');
    //     $this->db->group_by("a.askep_luaran_kode");
    //     if($id!=''){
    //         $this->db->where("b.id",$id);
    //     }
    //     return $this->db->get()->result_array(); 
    // }

    public function get_diagnosa(){
        $query = $this->db->query("SELECT a.id,a.`askep_diagnosa_kode`,b.`askep_diagnosa_nama` FROM notes_askep_diagnosa a INNER JOIN ref_askep_diagnosa b ON a.askep_diagnosa_kode=b.askep_diagnosa_kode");
        return $query->result_array();
    }

    public function get_render($visit,$no_rm){
        $query = $this->db->query("SELECT * FROM notes_askep_luaran WHERE no_rm='$no_rm' AND id_pasien_visit='$visit'");
        return $query->result_array();
    }
    

    public function get_registrasi(){
        $query = $this->db->query("SELECT id_pasien_registrasi, no_reg FROM pasien_registrasi
        WHERE id_pasien_registrasi='3621'");
        return $query->result_array();
    }


    public function add($params)
    {
        return $this->db->insert('notes_askep_luaran', $params);
    }

    public function edit($params,$where)
    {
        $this->db->where($where);
        $result = $this->db->update('notes_askep_luaran', $params);
        return $result;
    }


    public function add_vitals($vitals)
    {
        $this->db->insert('notes_vitals', $vitals);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function edit_vitals($id, $data)
    {
        $this->db->where(['id' => $id]);

        $check = $this->db->update('notes_vitals', $data);

        if ($check) {
            $result = 1;
        } else {
            $result = 0;
        }

        return $result;
    }

    public function get_vitals($id_notes_vitals)
    {
        $this->db->select("
                a.id id,
                a.id_pasien_registrasi id_pasien_registrasi,
                a.id_pasien_visit id_pasien_visit,
                a.height height,
                a.weight weight,
                a.systolic systolic,
                a.diastolic diastolic,
                a.blood_pressure blood_pressure,
                a.temperature temperature,
                a.pulse pulse,
                a.respiratory_rate respiratory_rate,
                a.kesadaran kesadaran,
                a.keadaan_umum keadaan_umum,
                a.nyeri nyeri,
                a.eye_opening eye_opening,
                a.verbal_response verbal_response,
                a.motor_response motor_response,
                a.spo2 spo2,
                a.akral akral,
                a.reflek_cahaya reflek_cahaya,
                a.pupil_isokor pupil_isokor,
                a.pupil_unisokor pupil_unisokor,
                a.created_date created_date,
                a.created_by created_by
        ");
        $this->db->from('notes_vitals a');
        $this->db->where('id', $id_notes_vitals);
        $this->db->where('del_date', null);
        $this->db->order_by('id', 'ASC');
        return $this->db->get()->result_array();
    }


}
