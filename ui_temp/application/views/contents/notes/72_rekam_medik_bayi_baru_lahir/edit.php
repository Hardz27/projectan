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

  .nb-top {
    border-top: hidden;
  }
  .nb-bottom {
    border-bottom: hidden;
  }
  .nb-right {
    border-right: hidden;
  }
  .nb-left {
    border-left: hidden;
  }

  .radio-left {
    width: 100%;
    text-align: left;
  }

  .radio-select{
    padding: 3px 0px 10px 25px;
  }

  .btn-default.active,
  .btn-default:active,
  .open>.dropdown-toggle.btn-default {
    color: white;
    background: #337ab7;
    border-color: #337ab7;
  }
  .radio-select{
    padding: 3px 0px 10px 25px;
  }

  [data-toggle="buttons"]>.btn>input[type="radio"],
  [data-toggle="buttons"]>.btn>input[type="checkbox"] {
    clip: rect(1px 1px 1px 1px);
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
                  <b>Perawat Approve</b>
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
        <div class="col-md-7">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data <?= $title ?></div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-12">
                  <table width="100%">
                    <!-- New line -->
                    <tr>
                      <td width="32%" class="bd text-left nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Pelaksanaan Perencanaan MPP
                            <input type="radio" name="item" required <?= $result['item'] == 'A' ? 'checked' : '' ?> value="A">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                      <td width="35%" class="bd text-left nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Identifikasi masalah-resiko-kesempatan
                            <input type="radio" name="item" required <?= $result['item'] == 'C' ? 'checked' : '' ?> value="C">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                      <td width="17%" class="bd text-left nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Monitoring
                            <input type="radio" name="item" required <?= $result['item'] == 'B' ? 'checked' : '' ?> value="B">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                      <td class="bd text-left nb-bottom nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Kolaborasi
                            <input type="radio" name="item" required <?= $result['item'] == 'E' ? 'checked' : '' ?> value="E">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="bd text-left nb-bottom nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Fasilitasi, Koordinasi, Komunikasi
                            <input type="radio" name="item" required <?= $result['item'] == 'D' ? 'checked' : '' ?> value="D">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                      <td class="bd text-left nb-bottom nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Hasil pelayanan
                            <input type="radio" name="item" required <?= $result['item'] == 'G' ? 'checked' : '' ?> value="G">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                      <td class="bd text-left nb-bottom nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Advokasi
                            <input type="radio" name="item" required <?= $result['item'] == 'F' ? 'checked' : '' ?> value="F">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                      <td class="bd text-left nb-bottom nb-left nb-top nb-right">
                        <div class="text-center" style="padding-left: 0px">
                          <label class="container radio-left">
                            &nbsp;&nbsp;Terminal MPP
                            <input type="radio" name="item" required <?= $result['item'] == 'H' ? 'checked' : '' ?> value="H">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <br><br>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <div class="col-md-4">
                      <b>Kegiatan Managemen Pelayanan Pasien</b>
                    </div>
                    <div class="col-md-8"> 
                      <textarea type="text" name="catatan" class="form-control" placeholder=""  autocomplete="off" required><?= $result['catatan'] ?></textarea>
                    </div>
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


</script>
