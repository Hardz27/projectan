<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class C_accounting extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('rs/accounting/M_accounting', 'accounting');
        $this->load->model('rs/M_hrd', 'm_hrd');
    }

    public function jurnal_get()
    // $route['get_accounting'] = 'api/c_accounting';
    // method : GET
    {
        $get = $this->get();
        // $id = $get['id'];
        $tgl_start = $get['tgl_start'];
        $tgl_end = $get['tgl_end'];
        $id_accounting_kode_akun4 = $get['id_accounting_kode_akun4'];
        $transaksi = $get['transaksi'];
        $jenis_jurnal = $get['jenis_jurnal'];

        $result = $this->accounting->get($tgl_start, $tgl_end, $transaksi, $id_accounting_kode_akun4, $jenis_jurnal);
        if (empty($result)) {
            $res['status']  = 200;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data.";
            $res['data']    = $result;
        }
        $this->response($res, $res['status']);
    }

    public function data_account_get()
    // $route['get_data_account'] = 'api/c_accounting/data_account_get';
    // method : GET
    {
        $id = $this->get('id');

        $result = $this->accounting->getAccount($id);
        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data.";
            $res['data']    = $result;
        }
        $this->response($res, $res['status']);
    }

    public function jurnal_delete()
    // $route['del_accounting'] = 'api/c_accounting';
    // method : DELETE
    {
        $delete = $this->delete();
        $id = $delete['id'];
        $del_by = $delete['del_by'];
        if ($id == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID";

            $this->response($res, $res['status']);
        }

        if ($del_by == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID Petugas Input";

            $this->response($res, $res['status']);
        }

        $petugas_input = $this->m_hrd->get_by_user_id($delete['del_by']);
        if (!$petugas_input) {
            $res['status'] = 400;
            $res['message'] = "Petugas input tidak dikenal !";

            $this->response($res, $res['status']);
        }

        $params = [
            'del_by'  => $petugas_input['nama'],
            'del_date' => date('Y-m-d')
        ];

        $delete = $this->accounting->edit($id, $params);

        if ($this->db->affected_rows() > 0) {
            $res['status'] = 200;
            $res['message'] = "Data berhasil dihapus";
        } else {
            $res['status'] = 400;
            $res['message'] = "Data tidak ditemukan";
        }
        $this->response($res, $res['status']);
    }

    public function jurnal_post()
    // $route['index_accounting'] = 'api/c_accounting';
    // method : POST
    {
        $post = $this->post();

        if ($post == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan data";

            $this->response($res, $res['status']);
        }

        if ($post['created_by'] == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID petugas input";

            $this->response($res, $res['status']);
        }
        // return $params;
        // $data_dokter = $this->m_hrd->get_by_user_id($post['id_dokter_approve']);

        // date_default_timezone_set($post['timezone']);
        $petugas_input = $this->m_hrd->get_by_user_id($post['created_by']);
        if (!$petugas_input) {
            $res['status'] = 400;
            $res['message'] = "Petugas input tidak dikenal";

            $this->response($res, $res['status']);
        }

        $params = [
            'tanggal_transaksi'                       => $post['tanggal_transaksi'],
            'id_accounting_kode_akun4_debit'          => $post['id_accounting_kode_akun4_debit'],
            'jumlah_debit'                            => $post['jumlah_debit'],
            'id_accounting_kode_akun4_kredit'         => $post['id_accounting_kode_akun4_kredit'],
            'jumlah_kredit'                           => $post['jumlah_kredit'],
            'ket'                                     => $post['ket'],
            'jenis_jurnal'                            => $post['jenis_jurnal'],
            'created_by'                              => $petugas_input['nama'],
            'created_date'                            => date('Y-m-d')
        ];
        $id = $this->accounting->add($params);
        // $kode_transaksi = JU/yy/mm/dd/id_table
        $kode_transaksi = 'JU/' . date('y') . '/' . date('m') . '/' . date('d') . '/' . $id;
        $params = ['kode_transaksi' => $kode_transaksi];

        if ($this->accounting->edit($id, $params) > 0) {
            $res['status']  = 200;
            $res['message'] = "Berhasil tambah data baru.";
        } else {
            $res['status']  = 400;
            $res['message'] = "Gagal tambah data baru.";
        }

        $this->response($res, $res['status']);
    }

    public function jurnal_put()
    // $route['add_accounting'] = 'api/c_accounting';
    // method : PUT
    {
        $put = $this->put();
        $id = $put['id'];

        if ($put == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan data";

            $this->response($res, $res['status']);
        }

        if ($put['id'] == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID Jurnal Umum";

            $this->response($res, $res['status']);
        }

        if ($put['created_by'] == null) {
            $res['status'] = 400;
            $res['message'] = "Harap masukan ID petugas input";

            $this->response($res, $res['status']);
        }

        $petugas_input = $this->m_hrd->get_by_user_id($put['created_by']);
        if (!$petugas_input) {
            $res['status'] = 400;
            $res['message'] = "Petugas input tidak dikenal";

            $this->response($res, $res['status']);
        }

        $params = [
            'del_by'  => $petugas_input['nama'],
            'del_date' => date('Y-m-d')
        ];

        $softdel = $this->accounting->edit($id, $params);

        $params = [
            'kode_transaksi'                          => $put['kode_transaksi'],
            'tanggal_transaksi'                       => $put['tanggal_transaksi'],
            'id_accounting_kode_akun4_debit'          => $put['id_accounting_kode_akun4_debit'],
            'jumlah_debit'                            => $put['jumlah_debit'],
            'id_accounting_kode_akun4_kredit'         => $put['id_accounting_kode_akun4_kredit'],
            'jumlah_kredit'                           => $put['jumlah_kredit'],
            'ket'                                     => $put['ket'],
            'jenis_jurnal'                            => $put['jenis_jurnal'],
            'created_by'                              => $petugas_input['nama'],
            'created_date'                            => date('Y-m-d')
        ];
        $id = $this->accounting->add($params);


        if ($this->db->affected_rows() > 0) {
            $res['status']  = 200;
            $res['message'] = "Berhasil edt data.";
        } else {
            $res['status']  = 400;
            $res['message'] = "Gagal tambah data baru.";
        }

        $this->response($res, $res['status']);
    }

    public function jurnal_detail_get()
    // $route['get_accounting'] = 'api/c_accounting';
    // method : GET
    {
        $id = $this->get('id');
        $result = $this->accounting->get_detail($id);
        if (empty($result)) {
            $res['status']  = 404;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data.";
            $res['data']    = $result;
        }
        $this->response($res, $res['status']);
    }

    public function jurnal_umum_summary_get()
    {
        $get = $this->get();
        $tgl_start = $get['tgl_start'];
        $tgl_end = $get['tgl_end'];
        $id_accounting_kode_akun4 = $get['id_accounting_kode_akun4'];
        $result = $this->accounting->ju($tgl_start, $tgl_end, $id_accounting_kode_akun4);
        if (empty($result)) {
            $res['status']  = 200;
            $res['message'] = "Data tidak tersedia...";
            $res['data']    = $result;
        } else {
            $res['status']  = 200;
            $res['message'] = "Berhasil mendapatkan data.";
            $res['data']    = $result;
        }
        $this->response($res, $res['status']);
    }

    public function buku_besar_get()
    {
      $get = $this->get();
      $id_accounting_kode_akun4 = $get['id_accounting_kode_akun4'];
      $detail = $this->accounting->getAccount($id_accounting_kode_akun4);

      $tgl_start = null;
      if(!empty($get['tgl_start'])) {
        $tgl_start = $get['tgl_start'];

      }
      $tgl_end = $get['tgl_end'];

      $saldo_awal = $this->accounting->get_saldo($id_accounting_kode_akun4, $tgl_start, $tgl_end, "saldo_awal");
      $jurnal_umum = $this->accounting->get_saldo($id_accounting_kode_akun4, $tgl_start, $tgl_end, "jurnal_umum");
      $jurnal_penyesuaian = $this->accounting->get_saldo($id_accounting_kode_akun4, $tgl_start, $tgl_end, "jurnal_penyesuaian");
      $jurnal_penutup = $this->accounting->get_saldo($id_accounting_kode_akun4, $tgl_start, $tgl_end, "jurnal_penutup");
      $jurnal_pembalik = $this->accounting->get_saldo($id_accounting_kode_akun4, $tgl_start, $tgl_end, "jurnal_pembalik");

      $data = [
        'id_akun_4' => $id_accounting_kode_akun4,
        'nama_akun4' => $detail[0]['nama_akun4'],
        'saldo_awal' => $saldo_awal,
        'jurnal_umum' => $jurnal_umum,
        'jurnal_penyesuaian' => $jurnal_penyesuaian,
        'jurnal_penutup' => $jurnal_penutup,
        'jurnal_pembalik' => $jurnal_pembalik,
        'periode' => [
          'bulan' => explode(' - ', periode($tgl_start))[0],
          'tahun' => explode(' - ', periode($tgl_start))[1],
        ],
      ];

      $res['status'] = 200;
      $res['message'] = 'Berhasil mendapatkan data buku besar';
      $res['data'] = $data;
      $this->response($res, $res['status']);
    }

    public function jurnal_list_get()
    {
      $list = $this->accounting->get_jurnal_list();
      $this->response($list, 200);
    }
}

/* End of file C_accounting.php */
