
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
                  <b>Perawat Approve</b>
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
            <div class="panel-heading">Tambah data <?= $title ?></div>
            <div class="panel-body">

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Nama Anak
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="nama_anak" value="<?= $data_regis['notes']['nama_anak'] != '' ? $data_regis['notes']['nama_anak'] : '' ?>" <?= $data_regis['notes']['nama_anak'] != '' ? 'readonly' : '' ?> required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Masa Gestasi
                    </div>
                    <div class="col-xs-6">
                      <input type="text" class="form-control input-sm" name="gestasi" value="<?= $data_regis['notes']['gestasi'] != '' ? $data_regis['notes']['gestasi'] : '' ?>" <?= $data_regis['notes']['gestasi'] != '' ? 'readonly' : '' ?> required>
                    </div>
                    <div class="col-xs-2" style="padding-left: 0px">
                       Minggu
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Tempratur <span class="pull-right">(&#8451;)</span> 
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="tempratur" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Berat badan (gram)
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="bb" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Sianosis <span class="pull-right">(+/-)</span> 
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="sianosis" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Bilirubin total (mg/dL)
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="bilirubin" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Keadaan Umum
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="keadaan_umum" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      SSP, Tonus
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="ssp_tonus" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Kepala, Leher, Palatum
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="kepala_leher_palatum" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Ubun-Ubun, Sutura
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="ubun_sutura" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

               <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Paru
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="Paru" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Jantung, a. femoralis
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="jantung_femoralis" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah data <?= $title ?></div>
            <div class="panel-body">

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Abdomen, anus (+/-)
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="abdomen_anus" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Sex, (Lk/Pr, Lengkap, tdk)
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="sex" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Kulit (warna, dll)
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="kulit" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Ekstremitas
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="ekstremitas" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-xs-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Panggul
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="panggul" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-xs-4">
                      Muntah (+/-)
                    </div>
                    <div class="col-xs-8">
                      <input type="text" class="form-control input-sm" name="muntah" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-2">
                      Defekasi
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control input-sm" name="defekasi" value="" required>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-2">
                  Catatan
                </div>
                <div class="col-md-10"> 
                  <textarea type="text" name="catatan" class="form-control" placeholder=""  autocomplete="off" required></textarea>
                </div>
              </div> 
              <br>               

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
    // console.log($(this).serialize());
    
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
