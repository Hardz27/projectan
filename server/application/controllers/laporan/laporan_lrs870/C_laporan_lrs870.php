<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan_lrs870 extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('rs/client/M_contract_clients_exhibit_a', 'contract_clients_exhibit_a');
    }

    public function main_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $result = $this->contract_clients_exhibit_a->contract_clients_exhibit_a_get();
        } else {
            $result = $this->contract_clients_exhibit_a->contract_clients_exhibit_a_show($id);
        }

        if (count($result) > 0) {
            $res['status']  = 200;
            $res['message'] = "Berhasil";
            $res['data']    = $result;
        } else {
            $res['status']  = 400;
            $res['message'] = "Data tidak tersedia";
            $res['data']    = $result;
        }
    
        $this->response($res, $res['status']);
    }

    public function main_post()
    {
        $payload = $this->post();

        if(empty($payload)) {
            $res['status'] = 400;
            $res['message'] = 'Data Kosong, mohon sertakan data';
            $this->response($res, $res['status']);
        }

        $result = $this->contract_clients_exhibit_a->contract_clients_exhibit_a_get_add($payload);

        if ($result) {
            $res['status'] = 200;
            $res['message'] = 'Sukses menambah data baru';
        } else {
            $res['status'] = 400;
            $res['message'] = 'Gagal menambah data baru';
        }
        $this->response($res, $res['status']);
    }

    public function main_put($id)
    {
        $payload = [
            'no_ref' => $this->put('no_ref'),
            'exhibit_a' => $this->put('exhibit_a'),
            'notes' => $this->put('notes'),
            'combo_package_fee' => $this->put('combo_package_fee'),
            'combo_package_tax' => $this->put('combo_package_tax'),
            'package_travel_fee' => $this->put('package_travel_fee'),
            'grand_total' => $this->put('grand_total'),
            'package_extra_hour_rate' => $this->put('package_extra_hour_rate'),
            'raw_or_dropbox' => $this->put('raw_or_dropbox'),
            'person1_signature' => $this->put('person1_signature'),
            'person1_signature_date' => $this->put('person1_signature_date'),
            'person1_ip_address' => $this->put('person1_ip_address'),
            'person2_signature' => $this->put('person2_signature'),
            'person2_signature_date' => $this->put('person2_signature_date'),
            'person2_ip_address' => $this->put('person2_ip_address'),
            'signature_admin1' => $this->put('signature_admin1'),
            'signature_admin2' => $this->put('signature_admin2'),
            'signature_date' => $this->put('signature_date'),
            'del_date' => $this->put('del_date'),
        ];

        if($this->contract_clients_exhibit_a->contract_clients_exhibit_a_put($payload, $id)){
            $res['status']  = 200;
            $res['message'] = "Berhasil Memperbarui data";
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Gagal Memperbarui data";
            $this->response( $res ,  $res['status']);
        }
    }

    public function main_delete($id)
    {
        $payload = [
            'del_date' => date('Y-m-d')
        ];

        if($this->contract_clients_exhibit_a->soft_delete($payload, $id)){
            $res['status']  = 200;
            $res['message'] = "Berhasil Memperbarui data";
            $this->response( $res,  $res['status']);
        }else{
            $res['status']  = 400;
            $res['message'] = "Gagal Memperbarui data";
            $this->response( $res ,  $res['status']);
        }
    }
}

/* End of file C_contract_clients_exhibit_a.php */
