
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
                      <td><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td><?= $k['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td><?= $k['jam']; ?></td>
                    </tr>
                    <tr>
                      <td>Kontak TB</td>
                      <?php
                        $data = $k['kontak_tb'];
                        if ($data == 3) {
                          $data = 'BTA (+)';
                        }else if($data == 2){
                          $data = 'Laporan keluarga, BTA (-) atau BTA tidak jelas/tidak tahu';
                        }else{
                          $data = 'Tidak Jelas';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                    <tr>
                      <td>Uji Tuberkulin (Mantoux)</td>
                      <?php
                        $data = $k['uji_tuberkulin'];
                        if ($data == 3) {
                          $data = '(+) (>= 10mm, atau >= 5mm pada keadaan imunokompromais)';
                        }else{
                          $data = '(-)';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                    <tr>
                      <td>Berat Badan / Keadaan Gizi</td>
                      <?php
                        $data = $k['bb_keadaan_gizi'];
                        if ($data == 2) {
                          $data = 'Klinis Gizi buruk atau BB/TB < 70% atau BB/U < 60%';
                        }else{
                          $data = 'BB/TB < 90% atau BB/U < 80%';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                    <tr>
                      <td>Demam yang tidak diketahui penyebabnya</td>
                      <?php
                        $data = $k['demam'];
                        if ($data == 1) {
                          $data = '>= 2 minggu';
                        }else{
                          $data = '< 2 minggu';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-6">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Batuk Kronik</td>
                      <?php
                        $data = $k['batuk_kronik'];
                        if ($data == 1) {
                          $data = '>= 3 minggu';
                        }else{
                          $data = '< 3 minggu';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                    <tr>
                      <td>Pembesaran kelenjar limfe kolli, aksilla, inguinal</td>
                      <?php
                        $data = $k['pembesaran_kelenjar'];
                        if ($data == 1) {
                          $data = '>= 1cm, lebih dari 1 KGB, tidak nyeri';
                        }else{
                          $data = 'Tidak ada pembengkakan / < 1cm';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                    <tr>
                      <td>Pembengkakan tulang / sendi panggul, lutut, falang</td>
                      <?php
                        $data = $k['pembengkakan_sendi'];
                        if ($data == 1) {
                          $data = 'Ada pembengkakan';
                        }else{
                          $data = 'Tidak Ada pembengkakan';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                    <tr>
                      <td>Foto toraks</td>
                      <?php
                        $data = $k['foto_toraks'];
                        if ($data == 1) {
                          $data = 'Gambaran Sugstif TB';
                        }else{
                          $data = 'Normal kelainan tidak jelas';
                        }
                      ?>
                      <td><?= $data; ?></td>
                    </tr>
                    <tr>
                      <td>Total Skor</td>
                      <td><?= $k['total_skor']; ?></td>
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