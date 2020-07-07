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
  #signature{
    width: 250px; height: 75px;
    border: 1px solid black;
    /*background-image: url("<?php echo base_url();?>assets/image/Human.png");*/
  }
  #coretan{
    width: 250px; height: 75px;
    border: 1px solid black;
    /*background-image: url("<?php echo base_url();?>assets/image/Human.png");*/
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
                      <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_petugas'] ? 'selected' : ''; ?>><?= $v['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Nama Pelaksana Tindakan</b>
                </div>
                <div class="col-md-8">
                  <select name="dokter_approved" class="dokter_approved" style="width: 100%" required>
                    <option value=""></option>
                    <?php foreach ($data_dokter as $dd) : ?>
                      <option value="<?= $dd['id'] ?>" <?= $dd['nama'] == $result['approved_dokter'] ? 'selected' : ''; ?>><?= $dd['nama'] ?></option>
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
                      <input type="text" class="form-control input-sm" name="nama_pasien"  value="<?=$result['nama_pasien']?>" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>No.Mr</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="no_mr" value="<?=$result['no_mr']?>"  required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tempat</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="tempat"  value="<?=$result['tempat']?>"  required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="ttl"  value="<?=$result['ttl']?>"  required>
                    </div>
                  </div>
                  <br>


                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="number" class="form-control input-sm" name="usia"  value="<?=$result['usia']?>"  required>
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
                                <input type="radio" name="jenis_kelamin" value="laki-laki" <?=$result['jenis_kelamin'] == "laki-laki" ? "checked" : '' ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="jenis_kelamin" value="perempuan" <?=$result['jenis_kelamin'] == "perempuan" ? "checked" : '' ?> required>
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
                      <input type="text" class="form-control input-sm" name="nama_wali" value="<?=$result['nama_wali']?>"  required> 
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="number" class="form-control input-sm" name="usia_wali" value="<?=$result['usia_wali']?>"  required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" id="tanggal_lahir_tindakan" name="tanggal_lahir_tindakan" value="<?=$result['tanggal_lahir_tindakan']?>"  required>
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
                                <input type="radio" name="jenis_kelamin_wali" value="laki-laki" <?=$result['jenis_kelamin_wali'] == "laki-laki" ? "checked" : '' ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="jenis_kelamin_wali" value="perempuan" <?=$result['jenis_kelamin_wali'] == "perempuan" ? "checked" : '' ?> required>
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
                      <input type="text" class="form-control input-sm" name="alamat_tindakan" value="<?=$result['alamat_tindakan']?>" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>No. Identitas</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="no_identitas" value="<?=$result['no_identitas']?>" required>
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
                              <input type="radio" name="hubungan" value="Pasien Sendiri" <?=$result['hubungan'] == "Pasien Sendiri" ? "checked" : '' ?> >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Suami
                              <input type="radio" name="hubungan" value="Suami" <?=$result['hubungan'] == "Suami" ? "checked" : '' ?> >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Istri
                              <input type="radio" name="hubungan" value="Istri" <?=$result['hubungan'] == "Istri" ? "checked" : '' ?> >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Anak
                              <input type="radio" name="hubungan" value="Anak" <?=$result['hubungan'] == "Anak" ? "checked" : '' ?> >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-6">
                            <label class="container radio-select" style="width: 5%"> Orang Tua
                              <input type="radio" name="hubungan" value="Orang Tua" <?=$result['hubungan'] == "Orang Tua" ? "checked" : '' ?> >
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
                              <input type="text" name="diagnosis" class="form-control" placeholder=""  value="<?=$result['diagnosis']?>" required autocomplete="off">
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
                              <input type="text" name="indikasi_tindakan" class="form-control" placeholder=""  value="<?=$result['indikasi_tindakan']?>" required autocomplete="off">
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
                              <input type="text" name="tata_cara" class="form-control" placeholder=""  value="<?=$result['tata_cara']?>" required autocomplete="off">
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
                              <input type="text" name="tujuan" class="form-control" placeholder=""  value="<?=$result['tujuan']?>" required autocomplete="off">
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
                              <input type="text" name="resiko_komplikasi" class="form-control" placeholder=""  value="<?=$result['resiko_komplikasi']?>" required autocomplete="off">
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
                              <input type="text" name="prognosis" class="form-control" placeholder=""  value="<?=$result['prognosis']?>" required autocomplete="off">
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
                              <input type="text" name="alternatif" class="form-control" placeholder=""  value="<?=$result['alternatif']?>" required autocomplete="off">
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
                              <input type="text" name="lain_lain" class="form-control" placeholder=""  value="<?=$result['lain_lain']?>" required autocomplete="off">
                             </label>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Tindakan yang Dilakukan</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Invasif
                                <input type="radio" name="tindakan_yang_dilakukan" value="invasif" <?=$result['tindakan_yang_dilakukan'] == "invasif" ? "checked" : '' ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Bedah
                                <input type="radio" name="tindakan_yang_dilakukan" value="bedah" <?=$result['tindakan_yang_dilakukan'] == "bedah" ? "checked" : '' ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tindakan Berisiko Tinggi
                                <input type="radio" name="tindakan_yang_dilakukan" value="tindakan berisiko tinggi" <?=$result['tindakan_yang_dilakukan'] == "tindakan berisiko tinggi" ? "checked" : '' ?> required>
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
                                <canvas id="signature-pad-wali-pasien" class="signature-pad-wali-pasien" height="75px" width="250px">
                              </div><br/>
                               
                              <button type="button" id="undo-wali">Undo</button>
                          <button type="button" id="clear-wali">Clear</button>
                               <input type="hidden" name="coretan_wali" value="<?=$result['coretan_wali']?>" id="coretan_wali" >
                            </div>
                          </td>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad-pasien" class="signature-pad-pasien" height="75px" width="250px">
                              </div><br/>
                               
                              <button type="button" id="undo-pasien">Undo</button>
                          <button type="button" id="clear-pasien">Clear</button>
                              <input type="hidden" name="coretan_pasien" value="<?=$result['coretan_pasien']?>"  id="coretan_pasien" required>
                           </div>
                          </td>
                        </tr>
                       

                      </tbody>
                  </table>

                  <table width="100%">
                      <tbody>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <b>Saksi Pihak RS</b>
                          </td>
                         <td class="text-center bd " width="50%" colspan="5">
                            <b>Nama Jelas Saksi</b>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    
                              <div id="signature" style=''>
                                <canvas id="signature-pad-saksi-pihak-rs" class="signature-pad-saksi-pihak-rs" height="100px" width="400px">
                              </div><br/>
                               
                             <button type="button" id="undo-saksi">Undo</button>
                          <button type="button" id="clear-saksi">Clear</button>
                              <input type="hidden" name="coretan_saksi" value="<?=$result['coretan_saksi']?>"  id="coretan_saksi">
                            </div>
                          </td>
                          <td class="text-left bd " width="50%" colspan="50">
                            
                            <div class="col-md-12">
                              <input type="text" class="form-control input-sm" name="nama_saksi_rs"  value="<?=$result['nama_saksi_rs']?>" required>
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
   $('#jam1').datetimepicker({
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
  $('#jam3').datetimepicker({
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
  $('#jam4').datetimepicker({
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

  $('#tanggal, #bayi_lahir_tgl,  #tanggal_lahir_tindakan, #tanggal_lahir').datetimepicker({
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


$(document).ready(function(){
  $("input[type='radio']").click(function(){
      update();
  });
});


</script>

<script>
 var signaturePadWaliPasien = new SignaturePad(document.getElementById('signature-pad-wali-pasien'));
 var signaturePadPasien = new SignaturePad(document.getElementById('signature-pad-pasien'));
 var signaturePadSaksiPihakRS = new SignaturePad(document.getElementById('signature-pad-saksi-pihak-rs'));
$(document).ready(function() {

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
   
   let ttdPasienImage = signaturePadPasien.toDataURL('image/png')
   let ttdPasien = signaturePadPasien.toData()
   if(ttdPasien.pop()){
      $('#coretan_pasien').val(ttdPasienImage)
   }

   let ttdWaliImage = signaturePadWaliPasien.toDataURL('image/png')
   let ttdWali = signaturePadWaliPasien.toData()
   if(ttdWali.pop()){
      $('#coretan_wali').val(ttdWaliImage)
   }

   let ttdSakiImage = signaturePadSaksiPihakRS.toDataURL('image/png')
   let ttdSaksi = signaturePadSaksiPihakRS.toData()
   if(ttdSaksi.pop()){
    $('#coretan_saksi').val(ttdSakiImage)
   }

 });

})

$('#undo-wali').click(() => {
  let data_wali = signaturePadWaliPasien.toData()
    if (data_wali) {
      data_wali.pop(); // remove the last dot or line
      signaturePadWaliPasien.fromData(data_wali)
    }
})

$('#clear-wali').click(() => {
  signaturePadWaliPasien.clear()
})

$('#undo-pasien').click(() => {
  let data_pasien = signaturePadPasien.toData()
    if (data_pasien) {
      data_pasien.pop(); // remove the last dot or line
      signaturePadPasien.fromData(data_pasien)
    }
})

$('#clear-pasien').click(() => {
  signaturePadPasien.clear()
})

$('#undo-saksi').click(() => {
  let data_saksi = signaturePadSaksiPihakRS.toData()
    if (data_saksi) {
      data_saksi.pop(); // remove the last dot or line
      signaturePadSaksiPihakRS.fromData(data_saksi)
    }
})

$('#clear-saksi').click(() => {
  signaturePadSaksiPihakRS.clear()
})


 </script>