<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kosakata extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('rs/M_kosakata', 'm_kosakata');
        $this->load->model('rs/M_hrd', 'm_hrd');
    }

    public function index_get()
    // $route['notes_temp'] = 'notes_temp/c_notes_temp';
    {
        $id_dept = $this->get('id_dept');
        $id_group = $this->get('id_group');
        $id_kosakata = $this->get('id');

        if (!empty($id_kosakata)) {
            $data = $this->m_kosakata->get_by_id($id_kosakata);
        } else if (!empty($id_dept) && !empty($id_group)) {
            $data = $this->m_kosakata->get($id_dept, $id_group);
        } else if (empty($id_dept) || empty($id_group)) {
            $res['status'] = '400';
            $res['message'] = 'Mohon masukkan ID Departemen dan Group';

            $this->response($res, $res['status']);
        }

        if ($data != null) {
            $res['status'] = '200';
            $res['message'] = 'Berhasil mendapatkan data Kosakata';
            $res['data'] = $data;

            $this->response($res, $res['status']);
        } else {
            $res['status'] = '400';
            $res['message'] = 'Data tidak ditemukan';
            $res['data'] = $data;

            $this->response($res, $res['status']);
        }
    }

    public function index_put()
    {
        $put  = $this->put();
        $id_dept = $put['id_dept'];
        $id_group = $put['id_group'];
        $kosakata_lama = $put['kosakata_lama'];
        $kosakata_baru = $put['kosakata_baru'] ? $put['kosakata_baru'] : "";

        if (empty($id_dept)) {
            $res['status'] = '400';
            $res['message'] = 'Silakan input no departement';
            $this->response($res, $res['status']);
        } else if (empty($id_group)) {
            $res['status'] = '400';
            $res['message'] = 'Silakan input no tipe notes';
            $this->response($res, $res['status']);
        } else if (empty($kosakata_lama)) {
            $res['status'] = '400';
            $res['message'] = 'Silakan input kosakata yang ingin diubah';
            $this->response($res, $res['status']);
        }
        $params = [
            'id_dept'       => $put['id_dept'],
            'id_group'      => $put['id_group'],
            'kosakata'      => $put['kosakata_lama'],
            'del_date'      => date("Y-m-d H:i:s")
        ];

        $params2 = [
            'id_dept'                            => $put['id_dept'],
            'id_group'                           => $put['id_group'],
            'kosakata'                           => $kosakata_baru
        ];

        $data = $this->m_kosakata->edit_data($params, $params2);

        if ($data > 0) {
            $res['status'] = '200';
            $res['message'] = 'Berhasil update data Kosakata';
            $res['data'] = $data;

            $this->response($res, $res['status']);
        } else {
            $res['status'] = '400';
            $res['message'] = 'Data tidak ditemukan';
            $res['data'] = $data;

            $this->response($res, $res['status']);
        }
    }

    public function index_post()
    {

        $post = $this->post();

        if (empty($post['id_dept'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Departemen.";

            $this->response($res, $res['status']);
        }

        if (empty($post['id_group'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Group.";

            $this->response($res, $res['status']);
        }

        if (empty($post['kosakata'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan Kosakata.";

            $this->response($res, $res['status']);
        }

        $data_input = [
            'id_dept'                                   => $post['id_dept'],
            'id_group'                                  => $post['id_group'],
            'kosakata'                                  => $post['kosakata'],
        ];

        $input = $this->m_kosakata->add($data_input);

        if ($input) {

            $data_input['id'] = $input;
            $res['status']     = 200;
            $res['message']    = "Berhasil menambahkan data.";
            $res['data']        = $data_input;

        } else {
            $res['status']     = 400;
            $res['message']    = "Gagal menambahkan data.";
        }

        $this->response($res, $res['status']);
    }

    public function index_delete()
    {
        $params = $this->delete();

        if (empty($params['id'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon sertakan no kosakata untuk melanjutkan.";
            $this->response($res, $res['status']);
        }
        if (empty($params['del_by'])) {
            $res['status'] = 400;
            $res['message'] = 'Mohon masukan ID karyawan untuk melanjutkan.';
            $this->response($res, $res['status']);
        }
        /*if (empty($params['id_dept'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Departemen.";

            $this->response($res, $res['status']);
        }

        if (empty($params['id_group'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan ID Group.";

            $this->response($res, $res['status']);
        }

        if (empty($params['kosakata'])) {
            $res['status']     = 400;
            $res['message']    = "Mohon masukan Kosakata.";

            $this->response($res, $res['status']);
        }*/

        $data_petugas = $this->m_hrd->get_by_user_id($params['del_by']);

        $data_delete = [
            'del_by'   => $data_petugas['nama'],
            'del_date' => date("Y-m-d H:i:s"),
        ];

        $data_result = $this->m_kosakata->delete_data($params, $data_delete);
        if ($data_result) {
            $res['status'] = '200';
            $res['message'] = 'Berhasil menghapus data Kosakata.';
        } else {
            $res['status'] = '400';
            $res['message'] = 'Gagal menghapus data Kosakata.';
        }
        $this->response($res, $res['status']);
    }
}
