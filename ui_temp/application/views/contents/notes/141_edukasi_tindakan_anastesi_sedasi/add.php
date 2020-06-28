
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

      .radio-select{
    padding: 3px 0px 10px 25px;
  }

  [data-toggle="buttons"]>.btn>input[type="radio"],
  [data-toggle="buttons"]>.btn>input[type="checkbox"] {
    clip: rect(1px 1px 1px 1px);
  }
  #signature{
    width: 400px; height: 400px;
    border: 1px solid black;
    /* background-image: url("<?php echo base_url();?>assets/image/Human.png"); */
  }
  
  .customcheck {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  font-weight: normal;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.customcheck .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 5%;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
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
                    <input value="<?= $v['id_visit']; ?>"  name="id_visit" id="id_visit_<?= $v['id_visit']; ?>" type="radio"><?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
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
                  <select name="petugas_approved" class="petugas_approved" style="width: 100%" >
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
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"  autocomplete="off">
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
                    <input type="text" name="jam" id="jam" class="form-control" value="07:00"  autocomplete="off">
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
            <div class="panel-heading">Tambah Data Fisioterapi Asesment</div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Nama Pasien</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Nama Wali</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>No. MR</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="no_mr" id="no_mr" class="form-control" placeholder="No. MR"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Hubungan</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="hubungan" class="form-control" placeholder="Hubungan"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Tempat. Tgl.Lahir</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="ttl" id="ttl" class="form-control" placeholder="Tempat. Tgl.Lahir"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6">  
                  <div class="row">
                    <div class="col-md-6">
                        <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">L
                        <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin" value="L" >
                      <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center">P
                      <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin" value="P" >
                      <span class="checkmark"></span>
                    </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="usia" id="usia" class="form-control" placeholder="Usia"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                
          </div>
          <div class="row">
            <div class="col-md-12">  
                  <div class="row">
                    <!-- <table width="100%">
                      <thead>
                        <tr>
                          <td width="100%" class="text-center bd" colspan="4"><b>Status Pernikahan</b></td>
                        </tr>
                        <tr class="text-center bdu ">
                          <td width="25%" class="bd" ><b>Menikah</b></td>
                          <td width="25%" class="bd"><b>Belum Menikah</b></td>
                          <td width="25%" class="bd"><b>Janda</b></td>
                          <td width="25%" class="bd"><b>Duda</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       
                        <tr>
                          
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="status_pernikahan" value="menikah" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="status_pernikahan" value="belum menikah" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                  <input type="radio" name="status_pernikahan" value="janda" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                 <input type="radio" name="status_pernikahan" value="duda" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                      </tbody>
                    </table> -->
              </div>
            </div>
              </div>
          <br><br>
          <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Diagnosis Kerja</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="diagnosis_kerja" id="diagnosis_kerja" class="form-control" placeholder="Diagnosis Kerja"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Diagnosis Banding</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="diagnosis_banding " class="form-control" placeholder="Diagnosis Banding"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12 mb-lg-5">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Tindakan yang dilakukan</b>
                    </div>
                    <div class="col-md-7">
                      <label class="customcheck"> Anestesi Umum
                        <input type="checkbox" name="tindakan_yang_dilakukan[]" value="Anestesi Umum">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> Sedasi
                        <input type="checkbox" name="tindakan_yang_dilakukan[]" value="Sedasi">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>


              <!-- GAMBAR TUBUH DISINI -->
            <br>
            <div class="row">
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Indikasi Tindakan</b>
                    </div>
                    <div class="col-md-7">
                      <label class="customcheck"> Menghilangkan kesadaran selama prosedur atau tindakan pembedahan
                        <input type="checkbox" name="indikasi_tindakan[]" value="Menghilangkan kesadaran selama prosedur atau tindakan pembedahan">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> Menghilangkan nyeri selama prosedur atau tindakan pembedahan
                        <input type="checkbox" name="indikasi_tindakan[]" value="Menghilangkan nyeri selama prosedur atau tindakan pembedahan">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> Relaksasi selama prosedur atau tindakan pembedahan
                        <input type="checkbox" name="indikasi_tindakan[]" value="Relaksasi selama prosedur atau tindakan pembedahan">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Risiko tindakan</b>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <label class="customcheck"> Mual, Muntah
                              <input type="checkbox" name="risiko_tindakan[]" value="Mual, Muntah">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Suara serak
                              <input type="checkbox" name="risiko_tindakan[]" value="Suara serak">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> nyeri tenggorokan
                              <input type="checkbox" name="risiko_tindakan[]" value="nyeri tenggorokan">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Penyempitan jalan nafas
                              <input type="checkbox" name="risiko_tindakan[]" value="Penyempitan jalan nafas">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Perubahan tekanan darah
                              <input type="checkbox" name="risiko_tindakan[]" value="Perubahan tekanan darah">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="customcheck"> Penurunan kesadaran
                                <input type="checkbox" name="risiko_tindakan[]" value="Penurunan kesadaran">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Stroke
                                <input type="checkbox" name="risiko_tindakan[]" value="Stroke">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Reaksi alergi
                                <input type="checkbox" name="risiko_tindakan[]" value="Reaksi alergi">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Kematian
                                <input type="checkbox" name="risiko_tindakan[]" value="Kematian">
                                <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>

                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Komplikasi</b>
                    </div>
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="customcheck"> Luka lecet pada daerah bibir, gusi, dan lidah
                            <input type="checkbox" name="komplikasi[]" value="Luka lecet pada daerah bibir, gusi, dan lidah">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Trauma pada gigi
                            <input type="checkbox" name="komplikasi[]" value="Trauma pada gigi">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Kerusakan otak
                            <input type="checkbox" name="komplikasi[]" value="Kerusakan otak">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-6">
                          <label class="customcheck"> Serangan jantung
                            <input type="checkbox" name="komplikasi[]" value="Serangan jantung">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Gangguan irama jantung
                            <input type="checkbox" name="komplikasi[]" value="Gangguan irama jantung">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Henti jantung
                            <input type="checkbox" name="komplikasi[]" value="Henti jantung">
                            <span class="checkmark"></span>
                          </label>

                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>
              </div>

           </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Fisioterapi Asesment</div>
            <div class="panel-body">
            <div class="row">
              <div class="col-md-12"> 
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Prognosis</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="prognosis" id="prognosis" class="form-control" placeholder="Prognosis"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Alternatif</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="alternatif" class="form-control" placeholder="Alternatif"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Lain lain/ analgetik post operasi</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="lain_lain" class="form-control" placeholder="lain_lain"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>

            </div>
              <br><br>

            <br><br>


            <div class="row">
              <div class="col-md-12"> 
                <div class="row">
                  <div class="col-md-5">
                    <b>H. Gambar</b>
                  </div>
                  <div class="col-md-7"> 
                    <!-- Signature -->
                    <div id="signature" style=''>
                      <canvas id="signature-pad" class="signature-pad" width="400px" height="400px">
                    </div><br/>
                     
                    <button type="button" id="undo">Undo</button>
                    <button type="button" id="clear">Clear</button>
                    <input type='hidden' id='generate' name="coretan" value=''><br/>
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

<script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo').addEventListener('click', function () {
    var data = signaturePad.toData();
    if (data) {
      data.pop(); // remove the last dot or line
      signaturePad.fromData(data);
    }
  });

})

// document.getElementById('save-png').addEventListener('click', function () {
//   if (signaturePad.isEmpty()) {
//     return alert("Please provide a signature first.");
//   }
  
//   var data = signaturePad.toDataURL('image/png');
//   console.log(data);
//   window.open(data);
// });

// document.getElementById('clear').addEventListener('click', function () {
//   signaturePad.clear();
// });

// document.getElementById('undo').addEventListener('click', function () {
//   var data = signaturePad.toData();
//   if (data) {
//     data.pop(); // remove the last dot or line
//     signaturePad.fromData(data);
//   }
// });

 </script>