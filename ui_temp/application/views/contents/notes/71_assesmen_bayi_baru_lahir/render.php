
<style>
  #coretan{
    width: 400px; height: 400px;
    border: 0px solid black;
    background-image: url("<?php echo base_url();?>assets/image/Human.png");
  }

  .mt-1 {
    margin-top: 1px;
  }

  .mt-2 {
    margin-top: 2px;
  }

  .mt-3 {
    margin-top: 3px;
  }

  .mt-4 {
    margin-top: 4px;
  }

  .mt-5 {
    margin-top: 5px;
  }

  .mt-10 {
    margin-top: 10px;
  }

  .mt-15 {
    margin-top: 15px;
  }

  .mt-20 {
    margin-top: 20px;
  }

  .mb-1 {
    margin-bottom: 1px;
  }

  .mb-2 {
    margin-bottom: 2px;
  }

  .mb-3 {
    margin-bottom: 3px;
  }

  .mb-4 {
    margin-bottom: 4px;
  }

  .mb-5 {
    margin-bottom: 5px;
  }

  .mb-10 {
    margin-bottom: 10px;
  }

  .ml-1 {
    margin-left: 1px;
  }

  .ml-2 {
    margin-left: 2px;
  }

  .ml-3 {
    margin-left: 3px;
  }

  .ml-4 {
    margin-left: 4px;
  }

  .ml-5 {
    margin-left: 5px;
  }

  .tindakan {
    background: #f5f5f5;
    border: 1px solid #e3e3e3;
    min-height: 100px;
    width: 100%;
    border-radius: 3px;
    padding-left: 5px;
  }

  .render-aktif {
    padding-left: 10px;
    padding-right: 10px;
  }

  td.with-ellipsis{
    width: 175px;
    overflow: hidden;
    display: inline-block;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
</style>


<div class="row mt-15">
  <div class="col-md-12">
    <div class="row">
      <?php if ($list) { 
        $isAny = 0;
      ?>
      <?php foreach ($list as $k => $v) : ?>
        <?php foreach ($v['data'] as $k) : ?>
          <?php $isAny++; ?>
          <div class="col-md-2 text-right">
            <button class="btn btn-primary btn-sm ubah-aktif" data-id-notes="<?= $k['notes_id']; ?>"><i class="fa fa-fw fa-pencil"></i></button>
            <button class="btn btn-danger btn-sm hapus-aktif" data-id-notes="<?= $k['notes_id']; ?>"><i class="fa fa-fw fa-trash"></i></button>
            <button class="btn btn-success btn-sm cetak-aktif" data-id-notes="<?= $k['notes_id']; ?>">Cetak</button>
            <!-- <div class="row text-center"><?= $k['notes_vitals'][0]['created_date']; ?></div> -->
          </div>
          <div class="col-md-10">
            <div class="row">
              <div class="col-lg-12">
                <h4><strong><?= $v['no_visit']; ?></strong></h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Petugas Approve</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td class="with-ellipsis"><?= $k['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td class="with-ellipsis"><?= $k['jam']; ?></td>
                    </tr>
                    <tr>
                      <td>Rekam Medik No</td>
                      <td class="with-ellipsis"><?= $k['rekam_medik_no']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td class="with-ellipsis"><?= $k['nama']; ?></td>
                    </tr>
                    <tr>
                      <td>Pening No</td>
                      <td class="with-ellipsis"><?= $k['pening_no']; ?></td>
                    </tr>
                    <tr>
                      <td>Dokter Kebidanan</td>
                      <td class="with-ellipsis"><?= $k['dokter_kebidanan']; ?></td>
                    </tr>
                    <tr>
                      <td>Dokter Anak</td>
                      <td class="with-ellipsis"><?= $k['dokter_anak']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Ibu</td>
                      <td class="with-ellipsis"><?= $k['nama_ibu']; ?></td>
                  
                    </tr>
                    <tr>
                      <td>Nama Ayah</td>
                      <td class="with-ellipsis"><?= $k['nama_ayah']; ?></td>
                    </tr>
                    <tr>
                      <td>Penyakit Ibu</td>
                      <td class="with-ellipsis"><?= $k['penyakit_ibu']; ?></td>
                    </tr>
                    <tr>
                      <td>Sakit Lain</td>
                      <td class="with-ellipsis"><?= $k['sakit_lain']; ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td class="with-ellipsis"><?= $k['agama']; ?></td>
                    </tr>
                    <tr>
                      <td>Goldar Bayi</td>
                      <td class="with-ellipsis"><?= $k['goldar_bayi']; ?></td>
                    </tr>
                    <tr>
                      <td>Goldar Ibu</td>
                      <td class="with-ellipsis"><?= $k['goldar_ibu']; ?></td>
                    </tr>
                    <tr>
                      <td>Goldar Ayah</td>
                      <td class="with-ellipsis"><?= $k['goldar_ayah']; ?></td>
                    </tr>
                    <tr>
                      <td>VDRL +/-</td>
                      <td class="with-ellipsis"><?= $k['vdrl']; ?></td>
                    </tr>
                   <tr>
                      <td>Titer Antibodi</td>
                      <td class="with-ellipsis"><?= $k['titer_antibodi']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    
                    <tr>
                      <td>Alamat</td>
                      <td class="with-ellipsis"><?= $k['alamat']; ?></td>
                    </tr>
                    <tr>
                      <td>Telpon</td>
                      <td class="with-ellipsis"><?= $k['telpon']; ?></td>
                    </tr>
                    <tr>
                      <td>Tahun</td>
                      <td class="with-ellipsis"><?= $k['tahun1']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat Kehamilan / Kelahiran G P A</td>
                      <td class="with-ellipsis"><?= $k['riwayat_kehamilan1']; ?></td>
                    </tr>
                    <tr>
                      <td>Tahun</td>
                      <td class="with-ellipsis"><?= $k['tahun2']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat Kehamilan / Kelahiran G P A</td>
                      <td class="with-ellipsis"><?= $k['riwayat_kehamilan2']; ?></td>
                    </tr>
                    <tr>
                      <td>Tahun</td>
                      <td class="with-ellipsis"><?= $k['tahun3']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat Kehamilan / Kelahiran G P A</td>
                      <td class="with-ellipsis"><?= $k['riwayat_kehamilan3']; ?></td>
                    </tr>
                    <tr>
                      <td>Tahun</td>
                      <td class="with-ellipsis"><?= $k['tahun4']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat Kehamilan / Kelahiran G P A</td>
                      <td class="with-ellipsis"><?= $k['riwayat_kehamilan4']; ?></td>
                    </tr>
                    <tr>
                      <td>Ketuban Pecah Tanggal</td>
                      <td class="with-ellipsis"><?= $k['ketuban_pecah_tgl']; ?></td>
                    </tr>
                    <tr>
                      <td>Ketuban Pecah Jam</td>
                      <td class="with-ellipsis"><?= $k['ketuban_pecah_jam']; ?></td>
                    </tr>
                     <tr>
                      <td>Ketuban Pecah Warna</td>
                      <td class="with-ellipsis"><?= $k['ketuban_pecah_warna']; ?></td>
                    </tr>
                    <tr>
                      <td>Bayi Dilahirkan Dengan</td>
                      <td class="with-ellipsis"><?= $k['bayi_dilahirkan_dengan']; ?></td>
                    </tr>
                    <tr>
                      <td>Indikasi</td>
                      <td class="with-ellipsis"><?= $k['indikasi']; ?></td>
                    </tr>
                  </tbody>
                </table>
                
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    
                    <tr>
                      <td>Kala I</td>
                      <td class="with-ellipsis"><?= $k['kala1']; ?> Jam</td>
                    </tr>
                    <tr>
                      <td>Kala II</td>
                      <td class="with-ellipsis"><?= $k['kala2']; ?> Jam</td>
                    </tr>
                    <tr>
                      <td>Tanda Gawat Janin</td>
                      <td class="with-ellipsis"><?= $k['tanda_gawat_janin']; ?></td>
                    </tr>
                    <tr>
                      <td>Denyut Jantung Bayi</td>
                      <td class="with-ellipsis"><?= $k['denyut_jantung_bayi']; ?> x/menit</td>
                    </tr>
                    <tr>
                      <td>ANESTESIA</td>
                      <td class="with-ellipsis"><?= $k['anestesia']; ?></td>
                    </tr>
                    <tr>
                      <td>Obat-obatan selama Hamil / Persalinan</td>
                      <td class="with-ellipsis"><?= $k['obat_selama_hamil']; ?></td>
                    </tr>
                    
                  </tbody>
                </table>
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>CATATAN</b>
                    </div>
                    <tr>
                      <td>Kel.Kongenital/ Anomali/ Lain-lain</td>
                      <td class="with-ellipsis"><?= $k['catatan']; ?></td>
                    </tr>
                    <tr>
                      <td>Diagnosis</td>
                      <td class="with-ellipsis"><?= $k['diagnosis']; ?></td>
                    </tr>
                    <tr>
                      <td>Penatalaksanaan</td>
                      <td class="with-ellipsis"><?= $k['penatalaksanaan']; ?></td>
                    </tr>
                    <tr>
                      <td>Inisiasi Menetek Dini (IMD): Jam</td>
                      <td class="with-ellipsis"><?= $k['inisiasi']; ?></td>
                    </tr>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>Bayi Lahir</b>
                    </div>
                    <tr>
                      <td>Tanggal</td>
                      <td class="with-ellipsis"><?= $k['bayi_lahir_tgl']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td class="with-ellipsis"><?= $k['bayi_lahir_jam']; ?></td>
                    </tr>
                    <tr>
                      <td>Kelamin</td>
                      <td class="with-ellipsis"><?= $k['bayi_kelamin']; ?></td>
                    </tr>
                    <tr>
                      <td>Berat Badan</td>
                      <td class="with-ellipsis"><?= $k['bayi_bb']; ?> gram</td>
                    </tr>
                    <tr>
                      <td>Panjang Badan</td>
                      <td class="with-ellipsis"><?= $k['bayi_panjang']; ?> cm</td>
                    </tr>
                    <tr>
                      <td>Lingkar Kepala</td>
                      <td class="with-ellipsis"><?= $k['bayi_lingkar_kepala']; ?> cm</td>
                    </tr>
                    <tr>
                      <td>Lingkar Dada</td>
                      <td class="with-ellipsis"><?= $k['bayi_lingkar_dada']; ?> cm</td>
                    </tr>
                    <tr>
                      <td>Masa Gestasi</td>
                      <td class="with-ellipsis"><?= $k['bayi_bb']; ?> minggu</td>
                    </tr>
                    <tr>
                      <td>Urin</td>
                      <td class="with-ellipsis"><?= $k['urin']; ?></td>
                    </tr>
                    <tr>
                      <td>Mekonium</td>
                      <td class="with-ellipsis"><?= $k['mekonium']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>Resusitasi</b>
                    </div>
                    <tr>
                      <td>Resusitasi</td>
                      <td class="with-ellipsis"><?= $k['resusitasi']; ?></td>
                    </tr>
                    <tr>
                      <td>Obat-obatan</td>
                      <td class="with-ellipsis"><?= $k['obat_obatan']; ?></td>
                    </tr>
                    <tr>
                      <td>Dosis</td>
                      <td class="with-ellipsis"><?= $k['dosis']; ?></td>
                    </tr>
                    <tr>
                      <td>Intubasi Dari Menit Ke</td>
                      <td class="with-ellipsis"><?= $k['dari_menitke_intubasi']; ?></td>
                    </tr>
                    <tr>
                      <td>Sd Menit Ke</td>
                      <td class="with-ellipsis"><?= $k['sd_menitke_intubasi']; ?></td>
                    </tr>
                    <tr>
                      <td>Bagging Dari Menit Ke</td>
                      <td class="with-ellipsis"><?= $k['dari_menitke_bagging']; ?></td>
                    </tr>
                    <tr>
                      <td>Sd Menit Ke</td>
                      <td class="with-ellipsis"><?= $k['sd_menitke_bagging']; ?></td>
                    </tr>
                    <tr>
                      <td>Pijat Jantung Dari Menit Ke</td>
                      <td class="with-ellipsis"><?= $k['dari_menitke_pijat_jantung']; ?></td>
                    </tr>
                    <tr>
                      <td>Sd Menit Ke</td>
                      <td class="with-ellipsis"><?= $k['sd_menitke_pijat_jantung']; ?></td>
                    </tr>
                    <tr>
                      <td>Lain-lain</td>
                      <td class="with-ellipsis"><?= $k['lainlain']; ?></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>NILAI APGAR</b>
                    </div>
                    <tr>
                      <td>Frek Jantung</td>
                      <td class="with-ellipsis"><?= $k['frek_jantung']; ?></td>
                    </tr>
                    <tr>
                      <td>Menit</td>
                      <td class="with-ellipsis"><?= $k['menit_frek_jantung']; ?></td>
                    </tr>
                    <tr>
                      <td>Usaha Nafas</td>
                      <td class="with-ellipsis"><?= $k['usaha_nafas']; ?></td>
                    </tr>
                    <tr>
                      <td>Menit</td>
                      <td class="with-ellipsis"><?= $k['menit_usaha_nafas']; ?></td>
                    </tr>
                    <tr>
                      <td>Tonus Otot</td>
                      <td class="with-ellipsis"><?= $k['tonus_otot']; ?></td>
                    </tr>
                    <tr>
                      <td>Menit</td>
                      <td class="with-ellipsis"><?= $k['menit_tonus_otot']; ?></td>
                    </tr>
                    <tr>
                      <td>Reflek</td>
                      <td class="with-ellipsis"><?= $k['reflek']; ?></td>
                    </tr>
                    <tr>
                      <td>Menit</td>
                      <td class="with-ellipsis"><?= $k['menit_reflek']; ?></td>
                    </tr>
                    <tr>
                      <td>Warna Kulit</td>
                      <td class="with-ellipsis"><?= $k['warna_kulit']; ?></td>
                    </tr>
                    <tr>
                      <td>Menit</td>
                      <td class="with-ellipsis"><?= $k['menit_warna_kulit']; ?></td>
                    </tr>
                    
                  </tbody>
                </table>
            </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    
                    <tr>
                      <td>Nafas Pertama</td>
                      <td class="with-ellipsis"><?= $k['nafas_pertama']; ?> menit</td>
                    </tr>
                    <tr>
                      <td>Nafas Spontan & Teratur</td>
                      <td class="with-ellipsis"><?= $k['nafas_spontan']; ?> menit</td>
                    </tr>
                    <tr>
                      <td>Waktu s/d Menangis</td>
                      <td class="with-ellipsis"><?= $k['waktu_sd_menangis']; ?></td>
                    </tr>
                
                    <div class="text-center col-lg-12">
                      <b>PEMERIKSAAN FISIK</b>
                    </div>
                    <tr>
                      <td>Keadaan Umum</td>
                      <td class="with-ellipsis"><?= $k['keadaan_umum']; ?></td>
                    </tr>
                    <tr>
                      <td>Sianosis (+/-)</td>
                      <td class="with-ellipsis"><?= $k['sianosis']; ?></td>
                    </tr>
                    <tr>
                      <td>Ikterus / Kuning (+/-)</td>
                      <td class="with-ellipsis"><?= $k['ikterus_kuning']; ?></td>
                    </tr>
                    <tr>
                      <td>SSP, Tonus</td>
                      <td class="with-ellipsis"><?= $k['ssp_tonus']; ?></td>
                    </tr>
                    <tr>
                      <td>Kepala, Leher, Palatum</td>
                      <td class="with-ellipsis"><?= $k['kepala_leher_palatum']; ?></td>
                    </tr>
                    <tr>
                      <td>Ubun-ubun, Sutura</td>
                      <td class="with-ellipsis"><?= $k['ubun_ubun']; ?></td>
                    </tr>
                    <tr>
                      <td>Paru</td>
                      <td class="with-ellipsis"><?= $k['paru']; ?></td>
                    </tr>
                    <tr>
                      <td>Jantung, a, Femoralis</td>
                      <td class="with-ellipsis"><?= $k['jantung']; ?></td>
                    </tr>
                    <tr>
                      <td>Abdomen, Anus (+/-)</td>
                      <td class="with-ellipsis"><?= $k['abdomen']; ?></td>
                    </tr>
                    <tr>
                      <td>Kelamin</td>
                      <td class="with-ellipsis"><?= $k['kelamin']; ?></td>
                    </tr>
                    <tr>
                      <td>Kulit</td>
                      <td class="with-ellipsis"><?= $k['kulit']; ?></td>
                    </tr>
                    <tr>
                      <td>Ekstremitas</td>
                      <td class="with-ellipsis"><?= $k['ekstremitas']; ?></td>
                    </tr>
                    <tr>
                      <td>Panggul</td>
                      <td class="with-ellipsis"><?= $k['panggul']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              
            </div>

          </div>
          <hr>
        <?php endforeach; ?>
      <?php endforeach; ?>
    <?php } else { ?>
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
          <h4>Data belum diinput ! Silahkan tambah data terlebih dahulu.</h4>
        </div>
      </div>
    <?php }; ?>
    <?php if($isAny == 0) { ?>
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
          <h4>Data belum diinput ! Silahkan tambah data terlebih dahulu.</h4>
        </div>
      </div>
    <?php }; ?>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#table-aktif').dataTable({
      // "paging": false,
      "searching": false,
      "scrollX": true,
      "info": false,
    });
    $('#table-aktif2').dataTable({
      "paging": false,
      "searching": false,
      "scrollX": true,
      "info": false,
      "ordering": false,
    });
  });

  $('.hapus-aktif').click(function(e) {
    e.preventDefault();

    if (confirm("Apa anda yakin ingin menghapus data ini?")) {


      delete_url = '<?php echo base_url(); ?>' + class_name + '/delete/';
      $('.hapus-aktif').attr('disabled', true);
      $.get('<?php echo base_url(); ?>' + class_name + '/delete/', {
        'id_notes': $(this).data('id-notes'),
        'id_notes_vitals': $(this).data('id-notes-vitals'),
      }).done(function(response) {
        data = JSON.parse(response);

        if (data.status == 200) {
          if (aktif_pdf) {
            aktif_pdf.close();
          }
          alert(data.message);
          render();
          return false;

        } else {
          alert(data.message);
          return false;

        }

      });
    } else {
      return false;
    }
  });

  $('.ubah-aktif').click(function(e) {
    e.preventDefault();
    id_reg = $('#id_pasien_registrasi').val(),
      process_button(0);
    $.get('<?php echo base_url(); ?>' + class_name + '/edit/', {
      'id_notes': $(this).data('id-notes'),
      'id_notes_vitals': $(this).data('id-notes-vitals'),
      'id_reg': id_reg
    }).done(function(response) {
      process_button(1);
      $('#form-container').html(response);
      $('#view-container').hide();
      if (!$('#form-grafik').is(':disabled')) {
        $('#form-grafik').attr("disabled", true)
      }
      $('#form-container').show();

    }).fail(function() {
      process_button(1);
      alert('Gagal menampilkan data')
    });
  });

  $('.cetak-aktif').on("click", function(e) {
    id_notes = $(this).data('id-notes');
    aktif_pdf = window.open('<?php echo base_url(); ?>' + class_name + '/view_pdf/' + id_notes);
  });
</script>
