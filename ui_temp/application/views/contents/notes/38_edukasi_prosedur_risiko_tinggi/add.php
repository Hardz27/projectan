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

            <div class="col-lg-4">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Nama Pemberi Edukasi</b>
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
            <div class="col-lg-4">
              <div class="row">
                  <!-- nama -->
                <div class="col-md-5">
                  <b>Nama Pelaksana Tindakan</b>
                </div>
                <div class="col-md-7">
                  <select name="dokter_approved" class="dokter_approved" style="width: 100%" required>
                    <option value=""></option>
                    <?php foreach ($data_dokter as $dd) : ?>
                      <option value="<?= $dd['id'] ?>"><?= $dd['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4"> 
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

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data </div>
            <div class="panel-body">

              <br>
              

              <div class="row">

                <div class="col-md-12"> 
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Nama Pasien</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="nama_pasien"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>No.Mr</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="no_mr"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tempat</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="tempat" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" id="tanggal_lahir" name="ttl" value="<?= date('Y-m-d') ?>" required>
                    </div>
                  </div>
                  <br>


                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="number" class="form-control input-sm" name="usia"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Laki-laki
                                <input type="radio" name="jenis_kelamin" value="laki-laki" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="jenis_kelamin" value="perempuan" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Nama Wali</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="nama_wali"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="number" class="form-control input-sm" name="usia_wali"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" id="tanggal_lahir_tindakan" name="tanggal_lahir_tindakan"  value="<?= date('Y-m-d') ?>" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Laki-laki
                                <input type="radio" name="jenis_kelamin_wali" value="laki-laki" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="jenis_kelamin_wali" value="perempuan" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Alamat</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="alamat_tindakan"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>No. Identitas</b>
                    </div>
                    <div class="col-md-7">
                      <input type="number" class="form-control input-sm" name="no_identitas"  value="" required>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                
                <div class="col-md-12"> 
                  <br> 
                <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Hubungan</b>
                    </div>
                    <div class="col-md-9">
                      <div class="row">
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Pasien Sendiri
                              <input type="radio" name="hubungan" value="Pasien Sendiri" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Suami
                              <input type="radio" name="hubungan" value="Suami" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Istri
                              <input type="radio" name="hubungan" value="Istri" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Anak
                              <input type="radio" name="hubungan" value="Anak" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Orang Tua
                              <input type="radio" name="hubungan" value="Orang Tua" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
                  <table width="100%">
                      <thead>
                        <tr class="text-center bdu ">
                          <td width="50%" class="bd" ><b>Jenis Informasi</b></td>
                          <td width="50%" class="bd"><b>Isi Informasi</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Diagnosis (WD dan DD)</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="diagnosis" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Dasar Diagnosis</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              Anamnesis, Pemeriksaan Fisik, Pemeriksaan Penunjang
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Indikasi Tindakan</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="indikasi_tindakan" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Tata Cara</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="tata_cara" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Tujuan</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="tujuan" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Resiko/Komplikasi</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="resiko_komplikasi" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Prognosis</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="prognosis" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Alternatif</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="alternatif" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Lain-lain/Kebutuhan Darah</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="lain_lain" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Jenis Tindakan</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Invasif
                                <input type="radio" name="tindakan_yang_dilakukan" value="invasif" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Bedah
                                <input type="radio" name="tindakan_yang_dilakukan" value="bedah" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tindakan Berisiko Tinggi
                                <input type="radio" name="tindakan_yang_dilakukan" value="tindakan berisiko tinggi" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  

                </div>
              </div>
            </div>
           
          </div>
        </div>

        <!-- BATAS -->
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data </div>
            <div class="panel-body">

              <br>
              
                  <table width="100%">
                      <tbody>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <b>Wali Pasien</b>
                          </td>
                         <td class="text-center bd " width="50%" colspan="5">
                            <b>Pasien</b>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad4" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo4">Undo</button>
                              <button type="button" id="clear4">Clear</button>
                              <input type='hidden' id='generate4' name="coretan_wali" value=''><br/>
                            </div>
                          </td>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad5" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo5">Undo</button>
                              <button type="button" id="clear5">Clear</button>
                              <input type='hidden' id='generate5' name="coretan_pasien" value=''><br/>
                           </div>
                          </td>
                        </tr>
                       

                      </tbody>
                  </table>

                  <table width="100%">
                      <tbody>
                        <tr>
                          <td class="text-center bd " width="100%" colspan="10">
                            <b>Saksi Pihak RS</b>
                          </td>
                         
                        </tr>
                        <tr>
                          <td class="text-center bd " width="100%" colspan="10">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad6" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo6">Undo</button>
                              <button type="button" id="clear6">Clear</button>
                              <input type='hidden' id='generate6' name="coretan_saksi" value=''><br/>
                            </div>
                          </td>
                          
                        </tr>
                        <tr>
                          <td class="text-left bd " width="100%" colspan="10">
                            <div class="col-md-7">
                              <b>Nama Jelas Saksi</b>
                            </div>
                            <div class="col-md-5">
                              <input type="text" class="form-control input-sm" name="nama_saksi_rs"  value="" required>
                            </div>
                          </td>
                         
                        </tr>

                      </tbody>
                  </table>



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

  $('#jam, #jam1').datetimepicker({
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

  $('#tanggal, #tanggal_lahir,4 #tanggal1, #tanggal_lahir_tindakan').datetimepicker({
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


$(document).ready(function(){
  $("input[type='radio']").click(function(){
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad1'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate1').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear1').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo1').addEventListener('click', function () {
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad2'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate2').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear2').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo2').addEventListener('click', function () {
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad3'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate3').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear3').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo3').addEventListener('click', function () {
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
  <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad4'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate4').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear4').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo4').addEventListener('click', function () {
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
  <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad5'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate5').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear5').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo5').addEventListener('click', function () {
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad6'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate6').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear6').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo6').addEventListener('click', function () {
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
  <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad7'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate7').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear7').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo7').addEventListener('click', function () {
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