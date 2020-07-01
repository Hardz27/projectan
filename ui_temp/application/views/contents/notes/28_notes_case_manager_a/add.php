<style>
  .btn-default.active.focus,
  .btn-default.active:focus,
  .btn-default.active:hover,
  .btn-default:active.focus,
  .btn-default:active:focus,
  .btn-default:active:hover,
  .open>.dropdown-toggle.btn-default.focus,
  .open>.dropdown-toggle.btn-default:focus,
  .open>.dropdown-toggle.btn-default:hover {
    color: white;
    background: #337ab7;
    border-color: #337ab7;
  }

  .btn-default.active,
  .btn-default:active,
  .open>.dropdown-toggle.btn-default {
    color: white;
    background: #337ab7;
    border-color: #337ab7;
  }

  .checkbox-left {
    width: 100%;
    text-align: left;
  }

  [data-toggle="buttons"]>.btn>input[type="radio"],
  [data-toggle="buttons"]>.btn>input[type="checkbox"] {
    clip: rect(1px 1px 1px 1px);
  }
</style>
<div class="row">
  <div class="col-md-12">

<!-- start input panel col 6 sendiri -->

    <form id="form-add-1-<?= $this->router->fetch_class(); ?>">
      <input type="hidden" class="form-control input-sm" name="id_reg" id="id_reg" value="<?= $id_reg ?>">
      <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 mb-5">
              <div class="btn-group-toggle" data-toggle="buttons">
                <?php foreach ($data_visit as $v) : ?>
                  <label name="label_<?= $v['id_visit']; ?>" class="btn btn-sm btn-default" style="margin-bottom:5px;">
                    <input value="<?= $v['id_visit']; ?>" required name="id_visit" id="id_visit_<?= $v['id_visit']; ?>" type="radio"><?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Petugas Approve</b>
                </div>
                <div class="col-md-8">
                  <select name="petugas_approved" class="petugas_approved" style="width: 100%" required>
                    <option value=""></option>
                    <?php foreach ($data_perawat as $k => $v) : ?>
                      <option value="<?= $v['id'] ?>"><?= $v['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6"> 
              <div class="col-md-6"> 
                <div class="row">
                  <!-- nama -->
                  <div class="col-md-3">
                    <b>Tanggal</b>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                  </div>
                </div>
                <br>
              </div>
              <div class="col-md-6">  
                <div class="row">
                  <!-- nama -->
                  <div class="col-md-2">
                    <b>Jam</b>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="jam" id="jam" class="form-control" value="07:00" required autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Case Manager A</div>
            <div class="panel-body">

              <br>
              <div class="row">
                <div class="col-md-12 text-center"> 
                  <b>Assesment</b>
                </div>
              </div>
              <br>

              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Fisik, Fungsional, Kognitif, kekuatan-kemampuan, kemandirian
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="fisik_fungsional" id="fisik_fungsional" value="" placeholder="Fisik, Fungsional, Kognitif, kekuatan-kemampuan, kemandirian"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Riwayat Kesehatan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="riwayat_kesehatan" id="riwayat_kesehatan" value="" placeholder="Riwayat Kesehatan"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Perilaku Psiko-Sosio-Kultural
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="perilaku" id="perilaku" value="" placeholder="Perilaku Psiko-Sosio-Kultural"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Kesehatan mental
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="kesehatan_mental" id="kesehatan_mental" value="" placeholder="Kesehatan Mental"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Tersedianya dukungan keluarga kemampuan merawat dari pemberi asuhan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="dukungan_keluarga" id="dukungan_keluarga" value="" placeholder="Tersedianya dukungan keluarga kemampuan merawat dari pemberi asuhan"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Finansial
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="finansial" id="finansial" value="" placeholder="Finansial"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Status Asuransi
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="status_asuransi" id="status_asuransi" value="" placeholder="Status Asuransi"></textarea>
                </div>
              </div>
              <br>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Case Manager A</div>
            <div class="panel-body">

              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Riwayat penggunaan obat, alternatif
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="riwayat_penggunaan_obat" id="riwayat_penggunaan_obat" value="" placeholder="Riwayat penggunaan obat"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Riwayat Trauma, kekerasan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="riwayat_trauma" id="riwayat_trauma" value="" placeholder="Riwayat Trauma, Kekerasan"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Pemahaman tentang kesehatan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="pemahaman_kesehatan" id="pemahaman_kesehatan" value="" placeholder="Pemahaman tentang kesehatan"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Harapan hasil asuhan, kemampuan menerima perubahan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="harapan_hasil_asuhan" id="harapan_hasil_asuhan" value="" placeholder="Harapan hasil asuhan, kemampuan menerima perubahan"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Aspek Legal
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="aspek_legal" id="aspek_legal" value="" placeholder="Aspek Legal"></textarea>
                </div>
              </div>
              <br><br>
              <div class="row">
                <div class="col-md-12 text-center"> 
                  <b>Identifikasi Masalah</b>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Asuhan tidak sesuai panduan dan norma yang digunakan
                      <input type="checkbox" name="asuhan" value="Asuhan tidak sesuai panduan dan norma yang digunakan">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Penurunan determinasi pasien
                      <input type="checkbox" name="penurunan_determinasi" value="Penurunan determinasi pasien">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Over / Under utilization pelayanan
                      <input type="checkbox" name="utilization" value="Over / Under utilization pelayanan">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Kendala Keuangan
                      <input type="checkbox" name="kendala_keuangan" value="Kendala Keuangan">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Edukasi yang belum memadai pemahaman pasien
                      <input type="checkbox" name="edukasi_yang_belum" value="Edukasi yang belum memadai pemahaman pasien">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Penyebab ketidakpatuhan pasien
                      <input type="checkbox" name="penyebab_ketidakpatuhan" value="Penyebab ketidakpatuhan pasien">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
              </div>          
              <div class="row">
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Kurangnya dukungan keluarga
                      <input type="checkbox" name="kurangnya_dukungan" value="Kurangnya dukungan keluarga">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Pemulangan yang belum memenuhi kriteria, pemulangan/rujukan yang tertunda
                      <input type="checkbox" name="pemulangan" value="Pemulangan yang belum memenuhi kriteria, pemulangan/rujukan yang tertunda">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
              </div>          
            </div>
            <div class="panel-footer text-right">
              <button class="btn btn-default btn-sm btn-batal-<?= $this->router->fetch_class(); ?>">Batal</button>
              <button type="submit" class="btn btn-primary btn-sm btn-kirim-<?= $this->router->fetch_class(); ?>">Simpan</button>
            </div>
          </div>
        </div>

      </div>
    </form>
<!-- end input panel col 6 sendiri -->

  </div>
</div>


<script type="text/javascript">


  $('.dokter_approved').select2({
    placeholder: "-- Pilih dokter Approve --"
  });

  $('.petugas_approved').select2({
    placeholder: "-- Pilih petugas Approve --"
  });

  $('#jam').datetimepicker({
    format:"HH:mm",
    showTodayButton:true,
    timeZone:'',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 5,
    locale:moment.locale(),
    collapse:true,
    icons: {
          time:'fa fa-clock-o',
          date:'fa fa-calendar',
          up:'fa fa-chevron-up',
          down:'fa fa-chevron-down',
          previous:'fa fa-chevron-left',
          next:'fa fa-chevron-right',
          today:'fa fa-crosshairs',
          clear:'fa fa-trash-o',
          close:'fa fa-times'
    },
    sideBySide:true,
    calendarWeeks:false,
    viewMode:'days',
    viewDate:false,
    toolbarPlacement:'bottom',
    widgetPositioning:{
        horizontal: 'left',
        vertical: 'bottom'
    }
  });

  $('#tanggal, #tanggal_lahir').datetimepicker({
    format:"YYYY-MM-DD",
    showTodayButton:true,
    timeZone:'',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 5,
    locale:moment.locale(),
    collapse:true,
    icons: {
          time:'fa fa-clock-o',
          date:'fa fa-calendar',
          up:'fa fa-chevron-up',
          down:'fa fa-chevron-down',
          previous:'fa fa-chevron-left',
          next:'fa fa-chevron-right',
          today:'fa fa-crosshairs',
          clear:'fa fa-trash-o',
          close:'fa fa-times'
    },
    sideBySide:true,
    calendarWeeks:false,
    viewMode:'days',
    viewDate:false,
    toolbarPlacement:'bottom',
    widgetPositioning:{
        horizontal: 'left',
        vertical: 'bottom'
    }
  });

  $(".btn-toggle").click(function (e) { 
    e.preventDefault();
    
    $(".btn-toggle").removeClass("btn-primary");
    $(this).addClass("btn-primary");
    var id = $(this).data('id');

    $("input[name='btn-toggle-val']").val(id);
  });

  $('.btn-batal-<?= $this->router->fetch_class(); ?>').click(function (e)
  {
    e.preventDefault();

    $('#view-container').show();
    $('#form-container').hide();
    $('#form-container').html('');
  });

   $('#form-add-1-<?= $this->router->fetch_class(); ?>').submit(function(e) {
    e.preventDefault();
    // alert($(this).serialize());
    console.log($(this).serialize());
    $('.btn-kirim-<?= $this->router->fetch_class(); ?>').attr('disabled', true);

    $.post('<?php echo base_url(); ?>' + class_name + '/add_process/list', $(this).serialize()).done(function(data) {
      var data = JSON.parse(data);
      
      if (data.status == '200') {
        alert('Data berhasil disimpan');
        location.reload();
      } else {
        alert('Gagal menampilkan data');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
      }
    }).fail(function() {
      alert('Gagal menampilkan data')
      $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
    });
  });




</script>