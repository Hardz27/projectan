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
    text-align: right;
    margin-top: -1px;
    overflow: hidden;
    display: inline-block;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 100%;
  }
  td.line-1{ 
    max-width: 150%;
  }
  td.line-2 {
    max-width: 150px;
  }
  td.line-3 {
    max-width: 150px;
  }
</style>


<div class="row mt-15">
  <div class="col-md-12">
    <div class="row">
      <?php if ($list) { 
        $isAny = 0;
      ?>
      <?php foreach ($list as $k => $v) :?>
        <?php foreach ($v['data'] as $k) : ?>
          <?php $isAny++; ?>
          <div class="col-md-2 text-right">
            <button class="btn btn-primary btn-sm ubah-aktif" data-id-notes="<?= $k['notes_id']; ?>"><i class="fa fa-fw fa-pencil"></i></button>
            <button class="btn btn-danger btn-sm hapus-aktif" data-id-notes="<?= $k['notes_id']; ?>"><i class="fa fa-fw fa-trash"></i></button>
            <?php if($isAny <= 1) { ?>
            <button class="btn btn-success btn-sm cetak-aktif" data-id-notes="<?= $k['notes_id']; ?>">Cetak</button>
            <?php } ?>
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
                      <td>Perawat Approve</td>
                      <td class="with-ellipsis line-1"><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td class="with-ellipsis line-1"><?= $k['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td class="with-ellipsis line-1"><?= $k['jam']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Anak</td>
                      <td class="with-ellipsis line-1"><?= $k['nama_anak']; ?></td>
                    </tr>
                    <tr>
                      <td>Masa Gestasi</td>
                      <td class="with-ellipsis line-1"><?= $k['gestasi'] ?></td>
                    </tr>
                    <tr>
                      <td>Tempratur <span class="pull-right">(&#8451;)</span> </td>
                      <td class="with-ellipsis line-1"><?= $k['tempratur']; ?></td>
                    </tr>
                    <tr>
                      <td>Berat badan (gram)</td>
                      <td class="with-ellipsis line-1"><?= $k['bb']; ?></td>
                    </tr>
                    <tr>
                      <td>Sianosis <span class="pull-right">(+/-)</span> </td>
                      <td class="with-ellipsis line-1"><?= $k['sianosis']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Bilirubin total (mg/dL)</td>
                      <td class="with-ellipsis line-2"><?= $k['bilirubin']; ?></td>
                    </tr>
                    <tr>
                      <td>Keadaan Umum</td>
                      <td class="with-ellipsis line-2"><?= $k['keadaan_umum']; ?></td>
                    </tr>
                    <tr>
                      <td>SSP, Tonus</td>
                      <td class="with-ellipsis line-2"><?= $k['ssp_tonus']; ?></td>
                    </tr>
                    <tr>
                      <td>Kepala, Leher, Palatum</td>
                      <td class="with-ellipsis line-2"><?= $k['kepala_leher_palatum'] ?></td>
                    </tr>
                    <tr>
                      <td>Ubun-Ubun, Sutura</td>
                      <td class="with-ellipsis line-2"><?= $k['ubun_sutura'] ?></td>
                    </tr>
                    <tr>
                      <td>Paru</td>
                      <td class="with-ellipsis line-2"><?= $k['Paru'] ?></td>
                    </tr>
                     <tr>
                      <td>Jantung, a. femoralis</td>
                      <td class="with-ellipsis line-2"><?= $k['jantung_femoralis'] ?></td>
                    </tr>
                    <tr>
                      <td>Abdomen, anus (+/-)</td>
                      <td class="with-ellipsis line-2"><?= $k['abdomen_anus'] ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Sex, (Lk/Pr, Lengkap, tdk)</td>
                      <td class="with-ellipsis line-3"><?= $k['sex'] ?></td>
                    </tr>
                    <tr>
                      <td>Kulit (warna, dll)</td>
                      <td class="with-ellipsis line-3"><?= $k['kulit']; ?></td>
                    </tr>
                    <tr>
                      <td>Ekstremitas</td>
                      <td class="with-ellipsis line-3"><?= $k['ekstremitas']; ?></td>
                    </tr>
                    <tr>
                      <td>Panggul</td>
                      <td class="with-ellipsis line-3"><?= $k['panggul']; ?></td>
                    </tr>
                    <tr>
                      <td>Muntah (+/-)</td>
                      <td class="with-ellipsis line-3"><?= $k['muntah']; ?></td>
                    </tr>
                    <tr>
                      <td>Defekasi</td>
                      <td class="with-ellipsis line-3"><?= $k['defekasi']; ?></td>
                    </tr>
                    <tr>
                      <td>Catatan</td>
                      <td class="with-ellipsis line-3"><?= $k['catatan']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
