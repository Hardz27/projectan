
<style>
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
              <div class="col-md-6">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Petugas Approve</td>
                      <td width="100px"><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <b>1. Pemberian Makanan</b>
                    </tr>
                    <tr>
                      <td>Umur Bayi</td>
                      <td class="with-ellipsis"><?= $k['umur_bayi']; ?></td>
                    </tr>
                    <tr>
                      <td>ASI : Susu lain (formula,susu sapi, yang lain)</td>
                      <td class="with-ellipsis"><?= $k['asi']; ?></td>
                    </tr>
                    <tr>
                      <td>Frekuensi Menyusui</td>
                      <td class="with-ellipsis"><?= $k['frekuensi_menyusui']; ?></td>
                    </tr>
                    <tr>
                      <td>Lama Menyusui / satu atau kedua payudara</td>
                      <td class="with-ellipsis"><?= $k['lama_menyusui']; ?></td>
                    </tr>
                    <tr>
                      <td>Menyusu waktu malam</td>
                      <td class="with-ellipsis"><?= $k['menyusu_waktu_malam']; ?></td>
                    </tr>
                    <tr>
                      <td>Jumlah dan frekuensi pemberian susu lain</td>
                      <td class="with-ellipsis"><?= $k['jumlah_dan_frekuensi']; ?></td>
                    </tr>
                    <tr>
                      <td>Cairan lain sebagai tambahan ASI (kapan dimulai,apa,berapa jumlahnya,frekuensi)</td>
                      <td class="with-ellipsis"><?= $k['cairan_lain']; ?></td>
                    </tr>
                    <tr>
                      <td>Makanan lain sebagai tambahan ASI (kapan dimulai,apa,berapa jumlahnya,frekuensi)</td>
                      <td class="with-ellipsis"><?= $k['makanan_lain']; ?></td>
                    </tr>
                    <tr>
                      <td>Penggunaan botol dan bagaimana membersihkannya</td>
                      <td class="with-ellipsis"><?= $k['penggunaan_botol']; ?></td>
                    </tr>
                    <tr>
                      <td>Kesulitan pemberian makan (menyusui/makanan lain)</td>
                      <td class="with-ellipsis"><?= $k['kesulitan_pemberian_makan']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-6">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <b>4. Kondisi Ibu dan KB</b>
                    </tr>
                    <tr>
                      <td>Umur</td>
                      <td class="with-ellipsis"><?= $k['umur']; ?></td>
                    </tr>
                    <tr>
                      <td>Kesehatan - termasuk gizi dan obat-obatan</td>
                      <td class="with-ellipsis"><?= $k['kesehatan']; ?></td>
                    </tr>
                    <tr>
                      <td>Kebiasaan - kopi, rokok, alcohol, obat</td>
                      <td class="with-ellipsis"><?= $k['kebiasaan']; ?></td>
                    </tr>
                    <tr>
                      <td>Keadaan Payudara</td>
                      <td class="with-ellipsis"><?= $k['keadaan_payudara']; ?></td>
                    </tr>
                    <tr>
                      <td>KB</td>
                      <td class="with-ellipsis"><?= $k['kb']; ?></td>
                    </tr>
                    <tr>
                      <td>Motivasi untuk menyusui</td>
                      <td class="with-ellipsis"><?= $k['motivasi_untuk_menyusui']; ?></td>
                    </tr>

                    <tr>
                      <td><b>5. Pengalaman Pemberian Makanan Bayi Sebelumnya</b></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Jumlah anak sebelumnya</td>
                      <td class="with-ellipsis"><?= $k['jumlah_anak_sebelumnya']; ?></td>
                    </tr>
                    <tr>
                      <td>Berapa yang disusui dan berapa lama</td>
                      <td class="with-ellipsis"><?= $k['berapa_yang_disusui']; ?></td>
                    </tr>
                    <tr>
                      <td>Jika menyusui - eksklusif atau campur</td>
                      <td class="with-ellipsis"><?= $k['menyusui_ekslusif_atau_campur']; ?></td>
                    </tr>
                    <tr>
                      <td>Pengalaman pemberian makanan lain- pernah menggunakan botol</td>
                      <td class="with-ellipsis"><?= $k['pengalaman_pemberian_makanan_lain']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <b>2. Kesehatan</b>
                    </tr>
                    <tr>
                      <td>KMS (berat lahir, berat sekarang)</td>
                      <td class="with-ellipsis"><?= $k['kms']; ?></td>
                    </tr>
                    <tr>
                      <td>Frekuensi BAK perhari (6x/lebih), jika kurang dari 6 bulan</td>
                      <td class="with-ellipsis"><?= $k['frekuensi_bak']; ?></td>
                    </tr>
                    <tr>
                      <td>Buang Air Besar (frekuensi, kepadatan)</td>
                      <td class="with-ellipsis"><?= $k['buang_air_besar']; ?></td>
                    </tr>
                    <tr>
                      <td>Penyakit</td>
                      <td class="with-ellipsis"><?= $k['penyakit']; ?></td>
                    </tr>
                    <tr>
                      <td>Perilaku (makan, tidur, menangis)</td>
                      <td class="with-ellipsis"><?= $k['perilaku']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="2"><b>3. Kehamilan, persalinan, menyusui awal (jika dilakukan)</b></td>
                    </tr>
                    <tr>
                      <td>Perawatan kehamilan</td>
                      <td class="with-ellipsis"><?= $k['perawatan_kehamilan']; ?></td>
                    </tr>
                    <tr>
                      <td>Diskusi pemberian makanan di perawatan ante natal</td>
                      <td class="with-ellipsis"><?= $k['diskusi']; ?></td>
                    </tr>
                    <tr>
                      <td>Persalinan -IMD, menyusui dalam satu jam pertama</td>
                      <td class="with-ellipsis"><?= $k['persalinan_imd']; ?></td>
                    </tr>
                    <tr>
                      <td>Rawat Gabung</td>
                      <td class="with-ellipsis"><?= $k['rawat_gabung']; ?></td>
                    </tr>
                    <tr>
                      <td>Asupan prelaktal</td>
                      <td class="with-ellipsis"><?= $k['asupan_prelaktal']; ?></td>
                    </tr>
                    <tr>
                      <td>Bantuan menyusui pasca lahir</td>
                      <td class="with-ellipsis"><?= $k['bantuan_menyusui']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-6">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <b>6. Keluarga dan Situasi Social</b>
                    </tr>
                    <tr>
                      <td>Situasi Pekerjaan</td>
                      <td class="with-ellipsis"><?= $k['situasi_pekerjaan']; ?></td>
                    </tr>
                    <tr>
                      <td>Keadaan ekonomi, pendidikan</td>
                      <td class="with-ellipsis"><?= $k['keadaan_ekonomi']; ?></td>
                    </tr>
                    <tr>
                      <td>Sikap keluarga terhadap menyusui (ayah bayi, nenek)</td>
                      <td class="with-ellipsis"><?= $k['sikap_keluarga']; ?></td>
                    </tr>
                    <tr>
                      <td>Bantuan perawatan anak di rumah</td>
                      <td class="with-ellipsis"><?= $k['bantuan_perawatan']; ?></td>
                    </tr>
                    <tr>
                      <td>Kesimpulan</td>
                      <td class="with-ellipsis"><?= $k['kesimpulan']; ?></td>
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