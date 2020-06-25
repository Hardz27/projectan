
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
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Dokter Approve</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_dokter'])); ?></td>
                    </tr>
                    <tr>
                      <td>Petugas Approve</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Tindakan</td>
                      <td class="with-ellipsis"><?= $k['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam Mulai</td>
                      <td class="with-ellipsis"><?= $k['jam']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam Berakhir</td>
                      <td class="with-ellipsis"><?= $k['jam_akhir']; ?></td>
                    </tr>
                    <tr>
                      <td>Diagnosis</td>
                      <td class="with-ellipsis"><?= $k['diagnosis']; ?></td>
                    </tr>
                    <tr>
                      <td>Tindakan</td>
                      <td class="with-ellipsis"><?= $k['tindakan']; ?></td>
                    </tr>
                    <tr>
                      <td>Level sedasi</td>
                      <td class="with-ellipsis"><?= $k['level_sedasi']; ?></td>
                    </tr>
                    <tr>
                      <td>Obat yang diberikan</td>
                      <td class="with-ellipsis"><?= $k['obat_sedasi']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Jam Monitoring</td>
                      <td class="with-ellipsis"><?= $k['jam_monitoring']; ?></td>
                    </tr>
                    <tr>
                      <td>Tekanan Darah</td>
                      <td class="with-ellipsis"><?= $k['tekanan_darah']; ?></td>
                    </tr>
                    <tr>
                      <td>Nadi</td>
                      <td class="with-ellipsis"><?= $k['nadi']; ?></td>
                    </tr>
                    <tr>
                      <td>Pernapasan</td>
                      <td class="with-ellipsis"><?= $k['pernapasan']; ?></td>
                    </tr>
                    <tr>
                      <td>SpO2</td>
                      <td class="with-ellipsis"><?= $k['spo2']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Tanda Vital (TD dan Nadi)</td>
                      <?php
                        if ($k['tanda_vital'] == '2')
                          $tanda_vital = "< 20% tanda vital sebelum tindakan";
                        else if($k['tanda_vital']  == '1')
                          $tanda_vital = "20%-40 tanda vital sebelum tindakan";
                        else
                          $tanda_vital = "> 40% tanda vital sebelum tindakan";
                      ?>
                      <td class="with-ellipsis"><?= $tanda_vital; ?></td>
                    </tr>
                    <tr>
                      <td>Aktivitas</td>
                      <?php
                        if ($k['aktivitas'] == '2')
                          $aktivitas = "Sadar penuh dan bisa bergerak sendiri";
                        else if($k['aktivitas']  == '1')
                          $aktivitas = "Sadar penuh, Membutuhkan bantuan";
                        else
                          $aktivitas = "Tidak sadar";
                       ?>
                      <td class="with-ellipsis"><?= $aktivitas; ?></td>
                    </tr>
                    <tr>
                      <td>Mual / Muntah</td>
                      <?php
                        if ($k['mual_muntah'] == '2')
                          $mual_muntah = "Minimal, membutuhkan terapi oral";
                        else if($k['mual_muntah']  == '1')
                          $mual_muntah = "Moderate, membutuhkan terapi parental";
                        else
                          $mual_muntah = "Berat, membutuhkan terapi lanjut";
                     ?>
                      <td class="with-ellipsis"><?= $mual_muntah; ?></td>
                    </tr>
                    <tr>
                      <td>Nyeri</td>
                      <?php
                        if ($k['nyeri'] == '2')
                          $nyeri = "Nyeri, dapat dikontrol dengan terapi oral";
                        else
                          $nyeri = "Nyeri, tidak dapat dikontrol dengan terapi oral";
                      ?>
                      <td class="with-ellipsis"><?= $nyeri; ?></td>
                    </tr>
                    <tr>
                      <td>Pendarahan</td>
                      <?php
                        if ($k['pendarahan'] == '2')
                          $pendarahan = "Minimal, tidak perlu mengganti balutan";
                        else if($k['pendarahan']  == '1')
                          $pendarahan = "Moderate, perlu 2 kali mengganti balutan";
                        else
                          $pendarahan = "Banyak, perlu 2 kali atau lebih mengganti balutan";
                      ?>
                      <td class="with-ellipsis"><?= $pendarahan; ?></td>
                    </tr>
                    <tr>
                      <td>Total Skor Pasien</td>
                      <td class="with-ellipsis"><?= $k['total_skor']; ?></td>
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