<style type="text/css">
      .radio-select{
    padding: 3px 0px 10px 25px;
  }

      .bdu {
    border: 1px solid #ddd;
    padding: 20px;
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
            <div class="panel-heading">Edit Data Skrining TB</div>
            <div class="panel-body">

                  <div class="row">
                    <table width="100%">
                      <thead>
                        <tr class="text-center bdu ">
                          <td width="60%" class="bdu" ><b>Gejala dan Tanda TB</b></td>
                          <td width="20%" class="bdu"><b>Ya</b></td>
                          <td width="20%" class="bdu"><b>Tidak</b></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td  class="text-left centerp bd">Batuk berdahak selama > 2-3 minggu</td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="batuk_berdahak" value="ya" <?= $result['batuk_berdahak'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="batuk_berdahak" value="tidak" <?= $result['batuk_berdahak'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd ">Batuk berdarah</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="batuk_berdarah" value="ya" <?= $result['batuk_berdarah'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="batuk_berdarah" value="tidak" <?= $result['batuk_berdarah'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd">Demam hilang timbul > 1 bulan</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="demam" value="ya" <?= $result['demam'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="demam" value="tidak" <?= $result['demam'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                         <tr>
                          <td class="text-left centerp bd">Keringat malam tanpa aktifitas</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="keringat_malam" value="ya" <?= $result['keringat_malam'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="keringat_malam" value="tidak" <?= $result['keringat_malam'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd">Penurunan berat badan tanpa penyebab yang jelas</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="penurunan_bb" value="ya" <?= $result['penurunan_bb'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="penurunan_bb" value="tidak" <?= $result['penurunan_bb'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd">Pembesaran kelenjar getah bening (benjolan didaerah leher) dengan ukuran > 2cm</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="pembesaran_kelenjar" value="ya" <?= $result['pembesaran_kelenjar'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="pembesaran_kelenjar" value="tidak" <?= $result['pembesaran_kelenjar'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd">Sesak nafas dan nyeri dada</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="sesak_nafas" value="ya" <?= $result['sesak_nafas'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="sesak_nafas" value="tidak" <?= $result['sesak_nafas'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd">Pernah minum obat paru dalam waktu lama sebelumnya</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="pernah_minum_obat_paru" value="ya" <?= $result['pernah_minum_obat_paru'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="pernah_minum_obat_paru" value="tidak" <?= $result['pernah_minum_obat_paru'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd">Ada keluarga / tetangga yang pernah sakit paru-paru / TB / pengobatan paru lama</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="ada_keluarga_sakit_paru" value="ya" <?= $result['ada_keluarga_sakit_paru'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="ada_keluarga_sakit_paru" value="tidak" <?= $result['ada_keluarga_sakit_paru'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left centerp bd">Penyakit Lain :<br>- Hipertensi<br>- DM</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="penyakit_lain" value="ya" <?= $result['penyakit_lain'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="penyakit_lain" value="tidak" <?= $result['penyakit_lain'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <br>               

                  <!-- BATAS -->

                
              </div>
              <div class="panel-footer text-right">
              <button class="btn btn-default btn-sm btn-batal-<?= $this->router->fetch_class(); ?>">Batal</button>
              <button type="submit" class="btn btn-primary btn-sm btn-kirim-<?= $this->router->fetch_class(); ?>">Simpan</button>
            </div>

            </div>
            
          </div>
        </div>

    </form>
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
    
$(document).ready(function(){
  // $("input[type='radio']").click(function(){
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
  // });
});


</script>