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
                  <select name="petugas_approved" class="petugas_approved" style="width: 100%">
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
            <div class="panel-heading">Edit Data Pasien TB Anak</div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-12"> 

                  <!-- <div class="row">
                    <div class="col-md-4">
                      Kriteria Pemulihan sedasi<br>
                      PAD5
                    </div>
                  </div> -->

                  <div class="row">
                    <table width="100%" class="bd">
                      <thead>
                        <tr class="text-center bd">
                          <td width="20%" class="bd"><b>Parameter</b></td>
                          <td width="50%" class="bd"><b>Penilaian</b></td>
                          <td width="15%" class="bd"><b>Skor</b></td>
                          <td width="15%" class="bd"><b>Skor Pasien</b></td>
                        </tr>
                      </thead>
                      <tbody>

                        <tr class="bd">
                          <td rowspan="3" class="text-center centerp bd">Kontak TB</td>
                          <td class="centerp bd"> BTA (+)</td>
                          <td class="text-center bd">3</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="kontak_tb" value="3" <?= $result['kontak_tb'] == '3' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="centerp bd">Laporan keluarga, BTA (-) atau BTA tidak jelas/tidak tahu</td>
                          <td class="text-center bd">2</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="kontak_tb" value="2" <?= $result['kontak_tb'] == '2' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="centerp bd"> Tidak Jelas</td>
                          <td class="text-center bd">0</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="kontak_tb" value="0" <?= $result['kontak_tb'] == '0' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" class="text-center centerp">Uji Tuberkulin (Mantoux)</td>
                          <td class="centerp bd">(+) (>= 10mm, atau >= 5mm pada keadaan imunokompromais)</td>
                          <td class="text-center bd">3</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="uji_tuberkulin" value="3" <?= $result['uji_tuberkulin'] == '3' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="centerp bd">(-)</td>
                          <td class="text-center bd">0</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="uji_tuberkulin" value="0" <?= $result['uji_tuberkulin'] == '0' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" class="text-center centerp bd">Berat Badan / Keadaan Gizi</td>
                          <td class="centerp bd">Klinis Gizi buruk atau BB/TB < 70% atau BB/U < 60%</td>
                          <td class="text-center bd">2</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="bb_keadaan_gizi" value="2" <?= $result['bb_keadaan_gizi'] == '2' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="centerp bd">BB/TB < 90% atau BB/U < 80%</td>
                          <td class="text-center bd">1</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="bb_keadaan_gizi" value="1" <?= $result['bb_keadaan_gizi'] == '1' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" class="text-center centerp bd">Demam yang tidak diketahui penyebabnya</td>
                          <td class="centerp bd">>= 2 minggu</td>
                          <td class="text-center bd">1</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="demam" value="1" <?= $result['demam'] == '1' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="centerp bd">< 2 minggu</td>
                          <td class="text-center bd">0</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="demam" value="0" <?= $result['demam'] == '0' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" class="text-center centerp bd">Batuk Kronik</td>
                          <td class="centerp bd">>= 3 minggu</td>
                          <td class="text-center bd">1</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="batuk_kronik" value="1" <?= $result['batuk_kronik'] == '1' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="centerp bd">< 3 minggu</td>
                          <td class="text-center bd">0</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="batuk_kronik" value="0" <?= $result['batuk_kronik'] == '0' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>


                        <tr>
                          <td rowspan="2" class="text-center centerp bd">Pembesaran Kelenjar Limfe kolli, aksila, inguinal</td>
                          <td class="centerp bd">>= 1cm, lebih dari 1 KGB, tidak nyeri</td>
                          <td class="text-center bd">1</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="pembesaran_kelenjar" value="1" <?= $result['pembesaran_kelenjar'] == '1' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="centerp bd">Tidak ada pembengkakan / < 1cm</td>
                          <td class="text-center bd">0</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="pembesaran_kelenjar" value="0" <?= $result['pembesaran_kelenjar'] == '0' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" class="text-center centerp bd">Pembengkakan tulang / sendi panggul, lutut, falang</td>
                          <td class="centerp bd">Ada pembengkakan</td>
                          <td class="text-center bd">1</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="pembengkakan_sendi" value="1" <?= $result['pembengkakan_sendi'] == '1' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td class="centerp bd">Tidak ada pembengkakan</td>
                          <td class="text-center bd">0</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="pembengkakan_sendi" value="0" <?= $result['pembengkakan_sendi'] == '0' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td rowspan="2" class="text-center centerp bd">Foto Toraks</td>
                          <td class="centerp bd">Gambaran Sugstif TB</td>
                          <td class="text-center bd">1</td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="foto_toraks" value="1" <?= $result['foto_toraks'] == '1' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="centerp bd">Normal kelainan tidak jelas</td>
                          <td class="text-center bd">0</td>
                          <td class="text-center bd center-row">
                            <label class="container radio-select" style="width: 2%">
                              <input onclick="updateTotal()" type="radio" name="foto_toraks" value="0" <?= $result['foto_toraks'] == '0' ? 'checked' : ''; ?> required>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>
                      
                        <tr>
                          <td class="text-right" style="padding-right: 20px" colspan="3">Total Score Pasien</td>
                          <td class="text-center">
                            <input type="text" class="form-control input-sm" name="total_skor" id="total_skor" value="<?= $result['total_skor'] ?>" readonly="">
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                  <br>

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
    

  function updateTotal() {
    var radio = [];
    radio[0] = parseInt($("input[name=kontak_tb]:checked").val()) || 0;
    radio[1] = parseInt($("input[name=uji_tuberkulin]:checked").val()) || 0;
    radio[2] = parseInt($("input[name=bb_keadaan_gizi]:checked").val()) || 0;
    radio[3] = parseInt($("input[name=demam]:checked").val()) || 0;
    radio[4] = parseInt($("input[name=batuk_kronik]:checked").val()) || 0;
    radio[5] = parseInt($("input[name=pembesaran_kelenjar]:checked").val()) || 0;
    radio[6] = parseInt($("input[name=pembengkakan_sendi]:checked").val()) || 0;
    radio[7] = parseInt($("input[name=foto_toraks]:checked").val()) || 0;

    var nilai = 0;

    for (var i = 0; i < radio.length; i++) {
      nilai += radio[i];
    }

    console.log(nilai);
   
    document.getElementById('total_skor').value = nilai;
    document.getElementById('total_skor').innerHTML = nilai;
}
</script>