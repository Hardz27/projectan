
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
  .signature{
    width: 200px; height: 200px;
    border: 1px solid black;
    /* background-image: url("<?php echo base_url();?>assets/image/Human.png"); */
  }

  .all-body{
    width: 800px; height: 600px;
    /*border: 1px solid black;*/
    background-image: url("<?php echo base_url();?>assets/image/body-side.jpg"); 
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
                    <input value="<?= $v['id_visit']; ?>"  name="id_visit" id="id_visit_<?= $v['id_visit']; ?>" type="radio" required><?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="col-lg-4">
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
            <div class="col-lg-4">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Dokter Approve</b>
                </div>
                <div class="col-md-8">
                  <select name="dokter_approved" class="dokter_approved" style="width: 100%" required>
                    <option value=""></option>
                    <?php foreach ($data_dokter as $k => $v) : ?>
                      <option value="<?= $v['id'] ?>"><?= $v['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4"> 
              <div class="col-md-6"> 
                <div class="row">
                  <!-- nama -->
                  <div class="col-md-4">
                    <b>Tanggal</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                  </div>
                </div>
                <br>
              </div>
              <div class="col-md-6">  
                <div class="row">
                  <!-- nama -->
                  <div class="col-md-4">
                    <b>Jam</b>
                  </div>
                  <div class="col-md-8">
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
                      <b>Agama</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="agama" class="form-control" placeholder="Agama"  autocomplete="off">
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
                      <b>Pendidikan</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan"  autocomplete="off">
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
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Pekerjaan</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan"  autocomplete="off">
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
                <div class="col-md-12"> 
                  <br> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Status Pernikkahan</b>
                    </div>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-xs-3">
                          <label class="container radio-select">&nbsp;Menikah
                            <input type="radio" name="hubungan" value="Pasien Sendiri" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container radio-select">&nbsp;&nbsp;Belum Menikah
                            <input type="radio" name="hubungan" value="Suami" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container radio-select">&nbsp;&nbsp;Istri
                            <input type="radio" name="hubungan" value="Istri" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container radio-select">&nbsp;&nbsp;Anak
                            <input type="radio" name="hubungan" value="Anak" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-3">
                          <label class="container radio-select">&nbsp;&nbsp;Orang Tua
                            <input type="radio" name="hubungan" value="Orang Tua" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12">
                          <div class="row">
                             <div class="col-xs-3" style="margin-bottom: 10px;">
                               <label class="container radio-select">&nbsp;&nbsp;Lainnya
                                 <input id="radio_other_hubungan" type="radio" name="hubungan" required>
                                 <span class="checkmark"></span>
                               </label>
                             </div>
                             <div class="col-xs-8">
                               <input id="text_other_hubungan" type="text" name="desc_hubungan" class="form-control" required placeholder="Sebutkan hubungannya" autocomplete="off" disabled="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-4">
                      <b>Diagnosis (WD & DD)</b>
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-4">
                          <label class="customcheck"> Gawat janin
                            <input type="checkbox" name="diagnosis_kerja[]" value="Gawat janin">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Panggul sempit
                            <input type="checkbox" name="diagnosis_kerja[]" value="Panggul sempit">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label class="customcheck"> Plasenta Previa
                            <input type="checkbox" name="diagnosis_kerja[]" value="Plasenta Previa">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Preeklamsi
                            <input type="checkbox" name="diagnosis_kerja[]" value="Preeklamsi">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label class="customcheck"> Tumor Jalan Lahir
                            <input type="checkbox" name="diagnosis_kerja[]" value="Tumor Jalan Lahir">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Riwayat SC
                            <input type="checkbox" name="diagnosis_kerja[]" value="Riwayat SC">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-4">
                              <label class="customcheck"> Lain-lain
                                <input type="checkbox" id="check_other_diagnosis" name="diagnosis_kerja[]" value="Lain-lain">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="desc_lain" id="text_other_diagnosis" class="form-control" placeholder="Sebutkan keterangan lainnya" disabled autocomplete="off">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mb-lg-5">  
                  <div class="row">
                    <div class="col-md-4">
                      <b>Dasar Diagnosis</b>
                    </div>
                    <div class="col-md-8">
                      Ananmesis, pemeriksaan fisik, permeriksaan penunjang.
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-4">
                  <b>Jenis Tindakan</b>
                </div>
                <div class="col-md-8">
                  Sectio Caesarea
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-4">
                  <b>Indikasi Tindakan</b>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      Indikasi Ibu:
                      <label class="customcheck"> Panggul sempit
                        <input type="checkbox" name="indikasi_tindakan[]" value="Panggul sempit">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> partus lama
                        <input type="checkbox" name="indikasi_tindakan[]" value="partus lama">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> riwayat SC sebelumnya
                        <input type="checkbox" name="indikasi_tindakan[]" value="riwayat SC sebelumnya">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> pendarahan antepartum
                        <input type="checkbox" name="indikasi_tindakan[]" value="pendarahan antepartum">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> tumor jalan lahir
                        <input type="checkbox" name="indikasi_tindakan[]" value="tumor jalan lahir">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> preeklamsi
                        <input type="checkbox" name="indikasi_tindakan[]" value="preeklamsi">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      Indikasi Janin:
                      <label class="customcheck"> Gawat Janin
                        <input type="checkbox" name="indikasi_tindakan[]" value="Gawat Janin">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> Mal presentasi kehamilan kembar
                        <input type="checkbox" name="indikasi_tindakan[]" value="Mal presentasi kehamilan kembar">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-4">
                  <b>Tata Cara</b>
                </div>
                <div class="col-md-8">
                  Insisi perut (Sectio Caesarea)
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-4">
                  <b>Tujuan</b>
                </div>
                <div class="col-md-8">
                  Mengeluarkan janin dengan cara Insisi perut
                </div>
              </div>
              <br>
               
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Risiko/Komplikasi</b>
                </div>
                <div class="col-md-8">
                  <ul style="padding-left: 10px">
                    <li> Robekan Rahim </li>
                    <li> Kehilangan darah lebih banyak </li>
                    <li> Cedera kandung kemih </li>
                    <li> Robekan dan perlen gketan usus </li>
                    <li> Angkat Rahim </li>
                    <li> Perawatan ICU </li>
                    <li> Kematian Ibu </li>
                    <li> Infeksi luka operasi</li>
                  </ul>
                </div>
              </div>
              <br>
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
                    <div class="row">
                      <div class="col-md-4">
                        <b>Prognosis</b>
                      </div>
                      <div class="col-md-8">
                        <textarea type="text" name="prognosis" id="prognosis" class="form-control" placeholder="Prognosis"  autocomplete="off"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                  <br>

                <div class="row">
                  <div class="col-md-12">  
                    <div class="row">
                      <div class="col-md-4">
                        <b>Alternatif</b>
                      </div>
                      <div class="col-md-8">
                        <textarea type="text" name="alternatif" class="form-control" placeholder="Alternatif"  autocomplete="off"></textarea>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>

               <div class="row">
                 <div class="col-md-12">  
                   <div class="row">
                     <!-- nama -->
                     <div class="col-md-4">
                       <b>Lain lain/Kebutuhan darah</b>
                     </div>
                     <div class="col-md-8">
                       <textarea type="text" name="lain_lain" class="form-control" placeholder="Lain-lain / Kebutuhan darah"  autocomplete="off"></textarea>
                     </div>
                   </div>
                   <br>
                 </div>
               </div>

               <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6 text-center"> 
                        <!-- Signature -->
                        <b>Wali Pasien</b>
                        <br>
                        <!-- Signature -->
                        <center>
                          <div class="signature">
                            <canvas id="signature-pad-wali-pasien" class="signature-pad-wali-pasien" height="200px" width="200px">
                          </div>
                          <br>
                          <button type="button" id="undo-wali">Undo</button>
                          <button type="button" id="clear-wali">Clear</button>
                          <br>
                          <br>
                          <input type="hidden" name="coretan_wali" id="coretan_wali">
                        </center>
                      </div> 
                      <div class="col-md-6 text-center"> 
                        <!-- Signature -->
                        <b>Pasien</b>
                        <br>
                        <!-- Signature -->
                        <center>
                          <div class="signature">
                            <canvas id="signature-pad-pasien" class="signature-pad-pasien" height="200px" width="200px">
                          </div>
                          <br>
                          <button type="button" id="undo-pasien">Undo</button>
                          <button type="button" id="clear-pasien">Clear</button>
                          <br>
                          <br>
                          <input type="hidden" name="coretan_pasien" id="coretan_pasien" required>
                        </center>
                      </div> 
                    </div>
                    <br>
                    <br>               
                    <div class="row">
                      <div class="col-md-12 text-center"> 
                  <!-- Signature -->
                        <b>Saksi Pihak RS</b>
                        <br>
                          <!-- Signature -->
                        <center>
                          <div class="signature">
                            <canvas id="signature-pad-saksi-pihak-rs" class="signature-pad-saksi-pihak-rs" height="200px" width="200px">
                          </div>
                          <br>
                          <button type="button" id="undo-saksi">Undo</button>
                          <button type="button" id="clear-saksi">Clear</button>
                          <br>
                          <br>
                          <input type="text" name="saksi" placeholder="Saksi Pihak RS" class="form-control">
                          <input type="hidden" name="coretan_saksi" id="coretan_saksi">
                        </center>
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
      </div> -

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
 var signaturePadWaliPasien = new SignaturePad(document.getElementById('signature-pad-wali-pasien'));
 var signaturePadPasien = new SignaturePad(document.getElementById('signature-pad-pasien'));
 var signaturePadSaksiPihakRS = new SignaturePad(document.getElementById('signature-pad-saksi-pihak-rs'));

$(document).ready(function() {

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
   $('#coretan_pasien').val(signaturePadPasien.toDataURL('image/png'))
   $('#coretan_saksi').val(signaturePadSaksiPihakRS.toDataURL('image/png'))
   $('#coretan_wali').val(signaturePadWaliPasien.toDataURL('image/png'))

   console.log($('#coretan_wali').val())
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

$('#undo-dokter').click(() => {
  let data_dokter = signaturePadDokterAnestesi.toData()
    if (data_dokter) {
      data_dokter.pop(); // remove the last dot or line
      signaturePadDokterAnestesi.fromData(data_dokter)
    }
})

$('#clear-dokter').click(() => {
  signaturePadDokterAnestesi.clear()
})

$(document).ready(function(){
  $("input[type='radio']").click(function(){
      var hubungan = $("input[id='radio_other_hubungan']:checked").length;
      if(hubungan){
          $('#text_other_hubungan').attr("disabled", false);
      }else{
        $('#text_other_hubungan').attr("disabled", true);
        $('#text_other_hubungan').val("");
      }
  });

  $("input[type='checkbox']").click(function(){
      var diagnosis = $("input[id='check_other_diagnosis']:checked").length;
      if(diagnosis){
          $('#text_other_diagnosis').attr("disabled", false);
      }else{
        $('#text_other_diagnosis').attr("disabled", true);
        $('#text_other_diagnosis').val("");
      }
  });

});

 </script>