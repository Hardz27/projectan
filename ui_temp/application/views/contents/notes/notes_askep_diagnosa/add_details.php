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

  [data-toggle="buttons"]>.btn>input[type="radio"],
  [data-toggle="buttons"]>.btn>input[type="checkbox"] {
    clip: rect(1px 1px 1px 1px);
  }
</style>
<form id="form-add">
  <input type="hidden" class="form-control input-sm" name="id_reg" id="id_reg" value="<?= $id_reg ?>">
  <!-- <div class="col-lg-12"> -->
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
              <select name="petugas_approved" class="petugas_approved" style="width: 100%">
                <option value=""></option>
                <?php foreach ($data_perawat as $k => $v) : ?>
                  <option value="<?= $v['id'] ?>"><?= $v['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="row">
            <!-- nama -->
            <div class="col-md-4">
              <b>Dokter Approve</b>
            </div>
            <div class="col-md-8">
              <select name="dokter_approved" class="dokter_approved" style="width: 100%">
                <option value=""></option>
                <?php foreach ($data_dokter as $k => $v) : ?>
                  <option value="<?= $v['id'] ?>"><?= $v['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <!-- </div> -->


  <div class="row">
    <div class="col-lg-6">

      <div class="panel panel-primary">
        <div class="panel-heading">Notes Asuhan Keperawatan Diagnosa</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">

              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Kode Asuhan Keperawatan Diagnosa</b>
                </div>
                <div class="col-md-8">
                  <select name="askep_diagnosa_kode" id="askep_diagnosa_kode" class="askep_diagnosa_kode" style="width: 100%">
                    <option value=""></option>
                    <?php foreach ($data_askep_diagnosa as $k => $v) : ?>
                      <option value="<?= $v['askep_diagnosa_kode'] ?>" data-kode="<?=$v['id'] ?>">[<?= $v['askep_diagnosa_kode'] ?>] <?= $v['askep_diagnosa_nama'] ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Details Diagnosa</b>
                </div>
                <div class="col-md-8">
                  <select name="details_diagnosa" id="details_diagnosa" class="select2" style="width: 100%" disabled>
                  </select>
                </div>
              </div>
              <br>

            </div>
          </div>
        </div>
        <div class="panel-footer text-right">
          <button type="button" class="btn btn-primary btn-sm btn-tambah-details" id="btn-tambah-details">Tambah</button>
        </div>
      </div>

    </div>

    <div class="col-lg-6">
      <div class="panel panel-primary">
        <div class="panel-heading">List Diagnosa</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">

              <table class="table no-wrap">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Action</th>
                    <th class="text-center">Diagnosa</th>
                  </tr>
                </thead>
                <tbody id="list_diagnosa">

                </tbody>
              </table>

            </div>

          </div>
        </div>
        <div class="panel-footer text-right">
          <button class="btn btn-default btn-sm btn-batal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm btn-save" id="btn-save">Simpan</button>
        </div>
      </div>
    </div>
  </div>

</form>

<script type="text/javascript">
  $('.select2').select2();
  $('.dokter_approved').select2({
    placeholder: "-- Pilih dokter Approve --"
  });

  $('.petugas_approved').select2({
    placeholder: "-- Pilih petugas Approve --"
  });

  $('.askep_diagnosa_kode').select2({
    placeholder: "-- Pilih Kode Askep --"
  });

  $('#jam').datetimepicker({
    format: "HH:mm",
    showTodayButton: true,
    timeZone: '',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 5,
    locale: moment.locale(),
    collapse: true,
    icons: {
      time: 'fa fa-clock-o',
      date: 'fa fa-calendar',
      up: 'fa fa-chevron-up',
      down: 'fa fa-chevron-down',
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-crosshairs',
      clear: 'fa fa-trash-o',
      close: 'fa fa-times'
    },
    sideBySide: true,
    calendarWeeks: false,
    viewMode: 'days',
    viewDate: false,
    toolbarPlacement: 'bottom',
    widgetPositioning: {
      horizontal: 'left',
      vertical: 'bottom'
    }
  });

  $('#tanggal').datetimepicker({
    format: "YYYY-MM-DD",
    showTodayButton: true,
    timeZone: '',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 5,
    locale: moment.locale(),
    collapse: true,
    icons: {
      time: 'fa fa-clock-o',
      date: 'fa fa-calendar',
      up: 'fa fa-chevron-up',
      down: 'fa fa-chevron-down',
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-crosshairs',
      clear: 'fa fa-trash-o',
      close: 'fa fa-times'
    },
    sideBySide: true,
    calendarWeeks: false,
    viewMode: 'days',
    viewDate: false,
    toolbarPlacement: 'bottom',
    widgetPositioning: {
      horizontal: 'left',
      vertical: 'bottom'
    }
  });

  $('#created_date').datetimepicker({
    format: "DD-MM-YYYY HH:mm",
    showTodayButton: true,
    timeZone: '',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 1,
    locale: moment.locale(),
    collapse: true,
    icons: {
      time: 'fa fa-clock-o',
      date: 'fa fa-calendar',
      up: 'fa fa-chevron-up',
      down: 'fa fa-chevron-down',
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-crosshairs',
      clear: 'fa fa-trash-o',
      close: 'fa fa-times'
    },
    sideBySide: true,
    calendarWeeks: false,
    viewMode: 'days',
    viewDate: false,
    toolbarPlacement: 'bottom',
    widgetPositioning: {
      horizontal: 'left',
      vertical: 'bottom'
    }
  });

  $(".btn-toggle").click(function(e) {
    e.preventDefault();

    $(".btn-toggle").removeClass("btn-primary");
    $(this).addClass("btn-primary");
    var id = $(this).data('id');

    $("input[name='btn-toggle-val']").val(id);
  });

  $('.btn-batal').click(function(e) {
    e.preventDefault();

    $('#view-container').show();
    $('#form-container').hide();
    $('#form-container').html('');
  });

  $('#form-add-1').submit(function(e) {
    e.preventDefault();
    // alert($(this).serialize());
    // console.log($(this).serialize());
    $('.btn-kirim').attr('disabled', true);

    $.post('<?php echo base_url(); ?>' + class_name + '/add_process/list', $(this).serialize()).done(function(data) {
      var data = JSON.parse(data);

      if (data.status == '200') {
        alert('Data berhasil disimpan');
        location.reload();
      } else {
        alert('Gagal menampilkan data');
        $('.btn-kirim').removeAttr('disabled');
        $('.btn-kirim').removeAttr('disabled');
      }
    }).fail(function() {
      alert('Gagal menampilkan data')
      $('.btn-kirim').removeAttr('disabled');
    });
  });

  $('#askep_diagnosa_kode').change(function() {
    var code = $('#askep_diagnosa_kode').val()
    var check = $('#details_diagnosa').is(':disabled')
    if (!check) {
      $('#details_diagnosa').attr("disabled", true)
    }
    getDiagnosaDetails(code)
    // getPackage(id_contract)
    // getDetail(id_contract)
  });

  $('#details_diagnosa').change(function() {
    $('#diagnosa_details_id').val()
    $('#diagnosa_details_askep_diagnosa_kode').val()
    $('#diagnosa_details_id_ref_askep_diagnosa_details_tipe').val()
    $('#diagnosa_details_askep_diagnosa_details_tipe').val()
    $('#diagnosa_details_askep_diagnosa_details').val()
  });

  $('#btn-tambah-details').click(function(e) {
    e.preventDefault();
    var text = $('#details_diagnosa option:selected').text();
    var text = text.split(' | ');
    var kode = text[0];
    var tipe = text[1];
    var details = text[2];


    var newRow = `<tr>
                    <input type="hidden" name="diagnosa_details_askep_diagnosa_kode[]" value="` + kode + `">
                    <input type="hidden" name="diagnosa_details_askep_diagnosa_details_tipe[]" value="` + tipe + `">
                    <input type="hidden" name="diagnosa_details_askep_diagnosa_details[]" value="` + details + `">
                    <td><span class="sn"></span>
                    <td><button type="button" class="btn btn-sm btn-danger hapus">Hapus</button></td>
                    <td>` + $('#details_diagnosa option:selected').text() + `</td>
                  </tr>`
    $('#list_diagnosa').append(newRow);
    $('#list_diagnosa tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index + 1);
      $(this).attr('trt', index + 1);
      $(this).find('button.hapus').attr('trt', index + 1);
    });
  });

  $(document).on('click', '.hapus', function() {
    var tr_value = $(this).attr('trt');
    $('#list_diagnosa tr[trt="' + tr_value + '"]').remove();

    $('#list_diagnosa tr').each(function(index) {
      $(this).find('span.sn').html(index + 1);
      $(this).attr('trt', index + 1);
      $(this).find('button.hapus').attr('trt', index + 1);
    });
  });

  function getDiagnosaDetails(code) {
    // alert(code);
    var url = "<?= base_url(); ?>" + "/notes_askep_diagnosa/get_diagnosa_details/" + code;
    var settings = {
      "url": url,
      "method": "GET",
      "timeout": 0,
    };
    $.ajax(settings).done(function(response) {
      console.log(response)
      var a = JSON.parse(response);
      // alert(a.length);die;
      var details = "";
      if (a == null) {
        details += '<option value="">Data tidak ditemukan</option>';
      } else {
        var b = a.length;
        if (b >= 1) {
          for (var i = 0; i < b; i++) {
            details += '<option value="' + a[i].id + '">' + a[i].askep_diagnosa_kode + ' | '  + a[i].askep_diagnosa_details_tipe + ' | ' + a[i].askep_diagnosa_details + '</option>'
          }
        } else {
          details += '<option value="">Data Not Found</option';
        }
      }
      $('#details_diagnosa').removeAttr("disabled");
      $('#details_diagnosa').html(details);
    });


  };

  $('#form-add').submit(function(e) {
    e.preventDefault();
    // alert($(this).serialize());
    console.log($(this).serialize());
    // $('.btn-kirim-<?= $this->router->fetch_class(); ?>').attr('disabled', true);

    $.post('<?php echo base_url(); ?>' + 'notes_askep_diagnosa/add_process', $(this).serialize()).done(function(data) {
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
