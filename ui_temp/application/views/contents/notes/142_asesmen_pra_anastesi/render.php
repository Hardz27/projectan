
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
                        <td>Dokter Approve</td>
                        <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_dokter'])); ?></td>
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
                        <td>Nama Pasien</td>
                        <td class="with-ellipsis"><?= $k['nama_pasien']; ?></td>
                      </tr>
                      <tr>
                        <td>No. RM</td>
                        <td class="with-ellipsis"><?= $k['no_rm']; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat, Tgl.Lahir</td>
                        <td class="with-ellipsis"><?= $k['ttl']; ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td class="with-ellipsis"><?= $k['jenis_kelamin']; ?></td>
                      </tr>
                      <tr>
                        <td>Ruangan</td>
                        <td class="with-ellipsis"><?= $k['ruangan']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-md-4">
                  <table class="table nowrap">
                    <tbody>
                      <div class="text-center col-lg-12">
                        <b>ANAMNESIS</b>
                      </div>
                      <div class="text-center col-lg-12">
                        <b>Riwayat Anestesi/Operasi</b>
                      </div>
                      <tr>
                       <td>Riwayat 1</td>
                       <td class="with-ellipsis"><?= $k['riwayat_anestesi1']; ?></td>
                     </tr>
                     <tr>
                      <td>Riwayat 2</td>
                      <td class="with-ellipsis"><?= $k['riwayat_anestesi2']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat alergi</td>
                      <td class="with-ellipsis"><?= $k['alergi']; ?></td>
                    </tr>
                    <tr>
                      <td>Komplikasi anestesi sebelumnya</td>
                      <td class="with-ellipsis"><?= $k['kompilkasi_anestesi_sebelumnya']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat Komplikasi anestesi dalam keluarga</td>
                      <td class="with-ellipsis"><?= $k['riwayat_komplikasi_anestesi_dalam_keluarga']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table nowrap">

                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td colspan="2" ><b>PEMERIKSAAN LABORATORIUM</b></td>
                    </tr>
                    <tr>
                      <td colspan="2" class="with-ellipsis"><?= $k['pemeriksaan_laboratorium']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="2"><b>PEMERIKSAAN PENUNJANG LAIN</b></td>
                    </tr>
                    <tr>
                      <td>EKG</td>
                      <td class="with-ellipsis"><?= $k['ekg']; ?></td>
                    </tr>
                    <tr>
                      <td>Ro</td>
                      <td class="with-ellipsis"><?= $k['ro']; ?></td>
                    </tr>
                    <tr>
                      <td>Lainnya</td>
                      <td class="with-ellipsis"><?= $k['pemeriksaan_penunjang_lainnya']; ?></td>
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
                      <td><b>DIAGNOSA</b></td>
                      <td class="with-ellipsis"><?= $k['diagnosa']; ?></td>
                    </tr>
                    <tr>
                      <td><b>RENCANA TINDAKAN</b></td>
                      <td class="with-ellipsis"><?= $k['rencana_tindakan']; ?></td>
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
                      <b>ASESMEN</b>
                    </div>
                    <tr>
                      <td>ASA PS</td>
                      <td class="with-ellipsis"><?= $k['asa_ps']; ?></td>
                    </tr>
                    <tr>
                      <td>Masalah / Diagnosis : </td>
                      <td class="with-ellipsis"><?= $k['masalah_diagnosis']; ?></td>
                    </tr>
                    <tr>
                      <td>Rencana / Usulan tindakan :</td>
                      <td class="with-ellipsis"><?= $k['rencana_usulan_tindakan']; ?></td>
                    </tr>
                    <tr>
                      <td>Intruksi</td>
                      <td class="with-ellipsis"><?= $k['intruksi']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>Penatalaksanaan Anestesi</b>
                    </div>
                    <tr>
                      <td>Puasa</td>
                      <td class="with-ellipsis"><?= $k['puasa']; ?> jam pre op</td>
                    </tr>
                    <tr>
                      <td>Rencana tiba di OK jam </td>
                      <td class="with-ellipsis"><?= $k['jam_rencana_tiba_di_ok']; ?> , <?= $k['tanggal_rencana_tiba_di_ok']; ?></td>
                    </tr>
                    <tr>
                      <td>Rencana Operasi jam</td>
                      <td class="with-ellipsis"><?= $k['jam_rencana_operasi']; ?> , <?= $k['tanggal_rencana_operasi']; ?></td>
                    </tr>
                    <tr>
                      <td>Injeksi antibiotik profilaksis</td>
                      <td class="with-ellipsis"><?= $k['injeksi_antibiotik']; ?> 1 jam pre op</td>
                    </tr>
                    <tr>
                      <td><b>Persiapan Darah</b></td>
                      <td class="with-ellipsis"><?= $k['persiapan_darah']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>Tanda Vital</b>
                    </div>
                    <tr>
                      <td>TD</td>
                      <td class="with-ellipsis"><?= $k['td']; ?> mmHg</td>
                    </tr>
                    <tr>
                      <td>HR</td>
                      <td class="with-ellipsis"><?= $k['hr']; ?> x/m</td>
                    </tr>
                    <tr>
                      <td>RR</td>
                      <td class="with-ellipsis"><?= $k['rr']; ?> x/m</td>
                    </tr>
                    <tr>
                      <td>Suhu</td>
                      <td class="with-ellipsis"><?= $k['suhu']; ?> °C</td>
                    </tr>
                    <tr>
                      <td>VAS</td>
                      <td class="with-ellipsis"><?= $k['vas']; ?></td>
                    </tr>
                    <tr>
                      <td>TB</td>
                      <td class="with-ellipsis"><?= $k['tb']; ?> Cm</td>
                    </tr>
                    <tr>
                      <td>BB</td>
                      <td class="with-ellipsis"><?= $k['bb']; ?> Kg</td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
