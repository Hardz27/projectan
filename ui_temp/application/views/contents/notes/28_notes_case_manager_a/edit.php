<style>
  .checkbox-left {
    width: 100%;
    text-align: left;
  }
</style>
<div class="row">
  <div class="col-md-12">

<!-- start input panel col 6 sendiri -->

    <form id="form-edit-1">
      <input type="hidden" class="form-control input-sm" name="id_notes" id="id_notes" value="<?= $result['id_notes']; ?>" >
      <input type="hidden" class="form-control input-sm" name="id_reg" id="id_reg" value="<?= $result['id_reg']; ?>" >
      <input type="hidden" class="form-control input-sm" name="id_visit" id="id_visit" value="<?= $result['id_visit']; ?>" >

      <div class="panel panel-primary">
        <div class="panel-heading">
          <?php foreach ($data_visit as $v) : ?>
            <?php if ($v['id_visit'] == $result['id_visit']) { ?>
              <?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
            <?php } ?>
          <?php endforeach; ?>
        </div>
        <div class="panel-body">
          <div class="row">

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
                      <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_petugas'] ? 'selected' : ''; ?>><?= $v['nama'] ?></option>
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
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= $result['tanggal']; ?>" required autocomplete="off">
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
                    <input type="text" name="jam" id="jam" class="form-control" value="<?= $result['jam']; ?>" required autocomplete="off">
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
            <div class="panel-heading">Edit Data Case Manager A</div>
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
                  <textarea class="form-control input-sm" name="fisik_fungsional" id="fisik_fungsional" value="<?= $result['fisik_fungsional']; ?>" placeholder="Fisik, Fungsional, Kognitif, kekuatan-kemampuan, kemandirian"><?= $result['fisik_fungsional']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Riwayat Kesehatan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="riwayat_kesehatan" id="riwayat_kesehatan" value="<?= $result['riwayat_kesehatan']; ?>" placeholder="Riwayat Kesehatan"><?= $result['riwayat_kesehatan']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Perilaku Psiko-Sosio-Kultural
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="perilaku" id="perilaku" value="<?= $result['perilaku']; ?>" placeholder="Perilaku Psiko-Sosio-Kultural"><?= $result['perilaku']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Kesehatan mental
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="kesehatan_mental" id="kesehatan_mental" value="<?= $result['kesehatan_mental']; ?>" placeholder="Kesehatan Mental"><?= $result['kesehatan_mental']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Tersedianya dukungan keluarga kemampuan merawat dari pemberi asuhan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="dukungan_keluarga" id="dukungan_keluarga" value="<?= $result['dukungan_keluarga']; ?>" placeholder="Tersedianya dukungan keluarga kemampuan merawat dari pemberi asuhan"><?= $result['dukungan_keluarga']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Finansial
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="finansial" id="finansial" value="<?= $result['finansial']; ?>" placeholder="Finansial"><?= $result['finansial']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Status Asuransi
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="status_asuransi" id="status_asuransi" value="<?= $result['status_asuransi']; ?>" placeholder="Status Asuransi"><?= $result['status_asuransi']; ?></textarea>
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
                  <textarea class="form-control input-sm" name="riwayat_penggunaan_obat" id="riwayat_penggunaan_obat" value="<?= $result['riwayat_penggunaan_obat']; ?>" placeholder="Riwayat penggunaan obat"><?= $result['riwayat_penggunaan_obat']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Riwayat Trauma, kekerasan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="riwayat_trauma" id="riwayat_trauma" value="<?= $result['riwayat_trauma']; ?>" placeholder="Riwayat Trauma, Kekerasan"><?= $result['riwayat_trauma']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Pemahaman tentang kesehatan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="pemahaman_kesehatan" id="pemahaman_kesehatan" value="<?= $result['pemahaman_kesehatan']; ?>" placeholder="Pemahaman tentang kesehatan"><?= $result['pemahaman_kesehatan']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Harapan hasil asuhan, kemampuan menerima perubahan
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="harapan_hasil_asuhan" id="harapan_hasil_asuhan" value="<?= $result['harapan_hasil_asuhan']; ?>" placeholder="Harapan hasil asuhan, kemampuan menerima perubahan"><?= $result['harapan_hasil_asuhan']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <!-- nama -->
                <div class="col-md-6">
                  Aspek Legal
                </div>
                <div class="col-md-6">
                  <textarea class="form-control input-sm" name="aspek_legal" id="aspek_legal" value="<?= $result['aspek_legal']; ?>" placeholder="Aspek Legal"><?= $result['aspek_legal']; ?></textarea>
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
                      <input type="checkbox" name="asuhan" value="Asuhan tidak sesuai panduan dan norma yang digunakan" <?= $result['asuhan'] != '' ? 'checked' : '' ?>>
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Penurunan determinasi pasien
                      <input type="checkbox" name="penurunan_determinasi" value="Penurunan determinasi pasien" <?= $result['penurunan_determinasi'] != '' ? 'checked' : '' ?>>
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
                      <input type="checkbox" name="utilization" value="Over / Under utilization pelayanan" <?= $result['utilization'] != '' ? 'checked' : '' ?>>
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Kendala Keuangan
                      <input type="checkbox" name="kendala_keuangan" value="Kendala Keuangan" <?= $result['kendala_keuangan'] != '' ? 'checked' : '' ?>>
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
                      <input type="checkbox" name="edukasi_yang_belum" value="Edukasi yang belum memadai pemahaman pasien" <?= $result['edukasi_yang_belum'] != '' ? 'checked' : '' ?>>
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Penyebab ketidakpatuhan pasien
                      <input type="checkbox" name="penyebab_ketidakpatuhan" value="Penyebab ketidakpatuhan pasien" <?= $result['penyebab_ketidakpatuhan'] != '' ? 'checked' : '' ?>>
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
                      <input type="checkbox" name="kurangnya_dukungan" value="Kurangnya dukungan keluarga" <?= $result['kurangnya_dukungan'] != '' ? 'checked' : '' ?>>
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-center" style="padding-left: 0px">
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;Pemulangan yang belum memenuhi kriteria, pemulangan/rujukan yang tertunda
                      <input type="checkbox" name="pemulangan" value="Pemulangan yang belum memenuhi kriteria, pemulangan/rujukan yang tertunda" <?= $result['pemulangan'] != '' ? 'checked' : '' ?>>
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

  $('#jam_akhir').datetimepicker({
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

  $('#jam_monitoring').datetimepicker({
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

  $('#tanggal').datetimepicker({
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

  $('.btn-batal-<?= $this->router->fetch_class(); ?>').click(function (e) { 
    e.preventDefault();
    
    $('#view-container').show();
    $('#form-container').hide();
    $('#form-container').html('');
  });

  $('#form-edit-1').submit(function (e) { 
    e.preventDefault();
    $('.btn-kirim-<?= $this->router->fetch_class(); ?>').attr('disabled', true);
    
    $.post('<?php echo base_url();?><?= $class_name; ?>/edit_process/', $(this).serialize()
    ).done(function(data) {
      var data = JSON.parse(data);

      if (data.status == '200') {
        alert('Data berhasil diubah');
        location.reload();
      } else {
        alert(data.message);
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
      }
    }).fail(function() {
      alert('Gagal menampilkan data')
      $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
    });
  });
  update();
    
function update() {
  $(document).ready(function(){
      var radioOtherRiwayat = $("input[id='radio_other_riwayat']:checked").length;
      if(radioOtherRiwayat){
          $('#text_other_riwayat').attr("disabled", false);
      }else{
        $('#text_other_riwayat').attr("disabled", true);
        $('#text_other_riwayat').val("");
      }

      var radioOtherAlatMedis = $("input[id='radio_other_alat_medis']:checked").length;
      if(radioOtherAlatMedis){
          $('#text_other_alat_medis').attr("disabled", false);
      }else{
        $('#text_other_alat_medis').attr("disabled", true);
        $('#text_other_alat_medis').val("");
      }

      var radioOtherPerkiraanBiaya = $("input[id='radio_other_perkiraan_biaya']:checked").length;
      if(radioOtherPerkiraanBiaya){
          $('#text_other_perkiraan_biaya').attr("disabled", false);
      }else{
        $('#text_other_perkiraan_biaya').attr("disabled", true);
        $('#text_other_perkiraan_biaya').val("");
      }

      var radioOtherSistemBiaya = $("input[id='radio_other_sistem_biaya']:checked").length;
      if(radioOtherSistemBiaya){
          $('#text_other_sistem_biaya').attr("disabled", false);
      }else{
        $('#text_other_sistem_biaya').attr("disabled", true);
        $('#text_other_sistem_biaya').val("");
      }

      var radioOtherLamaDirawat = $("input[id='radio_other_lama_dirawat']:checked").length;
      if(radioOtherLamaDirawat){
          $('#text_other_lama_dirawat').attr("disabled", false);
      }else{
        $('#text_other_lama_dirawat').attr("disabled", true);
        $('#text_other_lama_dirawat').val("");
      }
  });
}



$(document).ready(function(){
  $("input[type='radio']").click(function(){
      update();
  });
});


</script>