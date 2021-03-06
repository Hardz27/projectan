
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

  .checkbox-left {
    width: 100%;
    text-align: left;
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
  }

  .paraf{
    /*width: 100px; height: auto;*/
    /*border: 1px solid black;*/
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
            <div class="panel-heading">Tambah Data Edukasi Pra Operasi</div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>No. RM</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="no_rm" id="no_rm" class="form-control" placeholder="No. Rm"  required autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-9"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-4">
                      <b>Nama</b>
                    </div>
                    <div class="col-md-8">
                      <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien"  required autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-6" style="padding-left: 0px">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center" style="padding-left: 0px">L
                        <label class="container radio-select" style="width: 2%">
                          <input type="radio" name="jenis_kelamin" value="L" required >
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center" style="padding-left: 0px">P
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="jenis_kelamin" value="P" required >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Taanggal Lahir</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= date('Y-m-d') ?>"   required autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Ruangan</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="ruangan"   required autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">  
                  <div class="row">
                    <table width="100%">
                      <tr>
                        <td class="text-center bd" colspan="2"><b>Langkah-langkah</b></td>
                        <td class="text-center bd"><b>Paraf</b></td>
                      </tr>
                      <tr class="text-center bdu ">
                        <td width="15%" class="bd" rowspan="12" style="writing-mode: sideways-lr; line-height: 4em">Relaksasi Nafas dalam (Manajemen Nyeri)</td>
                        <?php $no = 1; ?>
                        <td width="70%" class="bd text-left"><?= $no ?>. Ciptakan Ruangan yang tenang</td>
                        <td width="15%" rowspan="12" id="paraf" height="auto">
                          <div class="paraf">
                            <canvas id="signature-pad-paraf" class="signature-pad-paraf" width="100px" style="padding: 0px">
                          </div>
                          <input type='hidden' id='generate_paraf' name="coretan_paraf" value='' required >
                        </td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Usahakan tetap rileks dan tenang</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Menarik nafas dalam dari hidung dan mengisi paru-paru dengan udara melalui hitungan 1,2,3</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Perlahan-lahan udara dihembuskan melalui mulut sambil merasakan ekstremitas atas dan bawah rileks</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Anjurkan bernafas dengan irama normal tiga kali</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Menarik nafas lagi melalui hidung dan menghembuskan melalui mulut secara perlahan</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Membiarkan telapak tangan dan kaki rileks</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Usahakan agar tetap konsentrasi mata sambil terpejam</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Pada saat konsentrasi pusatkan pada daerah yang nyeri</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Anjurkan untuk mengulangi prosedur hingga nyeri terasa berkurang</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Ulangi sampai 15 kali, dengan selang istirahat singkat setiap 5 kali</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Bila nyeri menjadi hebat, anjurkan pasien bernafas secara dangkal dan cepat</td>
                      </tr>
                      <!-- New line -->
                      <tr class="text-center bdu ">
                        <td class="bd" rowspan="5" style="writing-mode: sideways-lr; line-height: 4em">Batuk efektif</td>
                        <?php $no = 1; ?>
                        <td class="bd text-left"><?= $no ?>. Duduk tegap</td>
                        <td class="bd" rowspan="5" style="padding: 0px" id="batuk" height="auto">
                          <div class="paraf">
                            <canvas id="signature-pad-paraf-batuk" class="signature-pad-paraf-batuk" width="100px" style="padding: 0px">
                          </div>
                          <input type='hidden' id='generate_paraf_batuk' name="coretan_paraf_batuk" value='' required >
                        </td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Hirup nafas dalam 2x secara perlahan-lahan melalui hidung dan hembuskan melalui mulut</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Hirup nafas dalam ketiga kalinya dan tahan nafas sampai hitungan ke-3, batukkan dengan kuat-kuat 3x secara berturut-turut tanpa menghirup nafas kembali selama melakukan batuk</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Lanjutkan latihan batuk sebanyak 2-3x pada saat terjaga</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Ulangi sesuai kebutuhan</td>
                      </tr>
                      <!-- New line -->
                      <tr class="text-center bdu ">
                        <td class="bd" rowspan="4" style="writing-mode: sideways-lr; line-height: 15px;height: 100px;">Informasi tentang kamar operasi</td>
                        <?php $no = 1; ?>
                        <td class="bd text-left"><?= $no ?>. Ruangannya sangat bersih dan bebas kuman, suhunya dingin</td>
                        <td class="bd" rowspan="4" style="padding: 0px" id="kamar" height="auto">
                          <div class="paraf">
                            <canvas id="signature-pad-paraf-kamar" class="signature-pad-paraf-kamar" width="100px" style="padding: 0px">
                          </div>
                          <input type='hidden' id='generate_paraf_kamar' name="coretan_paraf_kamar" value='' required >
                        </td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Pencahayaan sangat terang</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Dilengkapi dengan alat canggih</td>
                      </tr>
                      <tr>
                        <td class="bd text-left nb-top"><?= ++$no ?>. Tim terdiri dari ahli bedah, ahli anestesi dan perawat berketerampilan khusus</td>
                      </tr>
                    </table>
                    <table width="100%">
                      <!-- New line -->
                      <tr class="text-center bd">
                        <td width="15%" class="bd" rowspan="4" style="writing-mode: sideways-lr; line-height: 13px; height: 100px">Informasi tentang fasilitas monitoring dan asuhan pasca operasi</td>
                        <?php $no = 1; ?>
                        <td width="70%" class="bd text-left" colspan="4">Jelaskan tujuan  manfaat tentang alat-alat kesehatan yang kemungkinan akan terpasang pada pasca operasi antara lain:</td>
                        <td width="15%" class="bd" rowspan="4" style="padding: 0px" id="fasilitas" height="auto">
                          <div class="paraf">
                            <canvas id="signature-pad-paraf-fasilitas" class="signature-pad-paraf-fasilitas" width="100px" style="padding: 0px">
                          </div>
                          <input type='hidden' id='generate_paraf_fasilitas' name="coretan_paraf_fasilitas" value='' required >
                        </td>
                      </tr>
                      <tr>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;NGT
                              <input type="checkbox" name="ngt" value="NGT">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;DC
                              <input type="checkbox" name="dc" value="DC">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Drainase
                              <input type="checkbox" name="drainase" value="Drainase">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td class="bd text-left nb-top">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Fiksasi Leher
                              <input type="checkbox" name="fiksasi_leher" value="Fiksasi Leher">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Bidai
                              <input type="checkbox" name="bidai" value="Bidai">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Gips
                              <input type="checkbox" name="gips" value="Gips">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td class="bd text-left nb-top nb-right"></td>
                        <td class="bd text-left nb-top"></td>
                      </tr>
                      <tr>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;ET
                              <input type="checkbox" name="et" value="ET">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;WSD
                              <input type="checkbox" name="wsd" value="WSD">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Infus
                              <input type="checkbox" name="infus" value="Infus">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td class="bd text-left nb-top">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;DC Irigasi
                              <input type="checkbox" name="dc_irigasi" value="DC Irigasi">
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <br><br>
           </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Edukasi Pra Operasi</div>
            <div class="panel-body">
            
            <div class="row">
              <div class="col-md-12"> 
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">Dengan ini saya menyatakan bahwa saya telah diberikan informasi secara jelas tentang hal-hal di atas yang saya beri paraf, telah memahami, menerima, dan melakukannya</p>
                  </div>
                </div>
                <br>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12"> 
                <div class="row">
                  <div class="col-md-6 text-center">
                    <b>Wali Pasien</b>
                     <!-- Signature -->
                    <center>
                      <div class="signature">
                        <canvas id="signature-pad-wali" class="signature-pad-wali" width="200px" height="200px">
                      </div>
                    </center>
                    <br/>
                     
                    <button type="button" id="undo_wali">Undo</button>
                    <button type="button" id="clear_wali">Clear</button>
                    <input type='hidden' id='generate_wali' name="coretan_wali" value='' required ><br/>
                  </div>
                  <div class="col-md-6 text-center"> 
                    <b>Pasien</b>
                     <!-- Signature -->
                    <center>
                      <div class="signature">
                        <canvas id="signature-pad-pasien" class="signature-pad-pasien" width="200px" height="200px">
                      </div>
                    </center>
                    <br/>
                     
                    <button type="button" id="undo_pasien">Undo</button>
                    <button type="button" id="clear_pasien">Clear</button>
                    <input type='hidden' id='generate_pasien' name="coretan_pasien" value='' required ><br/>
                  </div>
                  <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                    <input type="text" name="nama_wali" class="form-control" placeholder="Wali"  required autocomplete="off">
                  </div>
                  <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                    <input type="text" name="nama_pasien_ttd" class="form-control" placeholder="Pasien"  required autocomplete="off">
                  </div>
                  <br><br>
                  <div class="col-md-12 text-center" style="margin: 20px 0px 20px 0px;"> 
                    <div class="row">
                      <!-- nama -->
                      <div class="col-md-4">
                        Bertanda tangan untuk pasien a.n
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="pasien_a_n" id="pasien" class="form-control" placeholder="Nama Pasien"  required autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 text-center"> 
                    <b>Saksi RS</b>
                     <!-- Signature -->
                    <center>
                      <div class="signature">
                        <canvas id="signature-pad-saksi" class="signature-pad-saksi" width="200px" height="200px">
                      </div>
                    </center>
                    <br/>
                     
                    <button type="button" id="undo_saksi">Undo</button>
                    <button type="button" id="clear_saksi">Clear</button>
                    <input type='hidden' id='generate_saksi' name="coretan_saksi" value='' required ><br/>
                  </div>
                  <div class="col-md-12 text-center" style="margin: 20px 0px 20px 0px;"> 
                    <input type="text" name="nama_saksi" class="form-control" placeholder="Saksi"  required autocomplete="off">
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
 var canvas = document.getElementById('signature-pad-paraf');
 canvas.height = $('td#paraf').height();

 var canvas_batuk = document.getElementById('signature-pad-paraf-batuk');
 canvas_batuk.height = $('td#batuk').height();

 var canvas_kamar = document.getElementById('signature-pad-paraf-kamar');
 canvas_kamar.height = $('td#kamar').height();

 var canvas_fasilitas = document.getElementById('signature-pad-paraf-fasilitas');
 canvas_fasilitas.height = $('td#fasilitas').height();
 

 var signaturePadParaf          = new SignaturePad(canvas);
 var signaturePadParafBatuk     = new SignaturePad(canvas_batuk);
 var signaturePadParafFasilitas = new SignaturePad(canvas_fasilitas);
 var signaturePadParafKamar     = new SignaturePad(canvas_kamar);
 var signaturePadWali           = new SignaturePad(document.getElementById('signature-pad-wali'));
 var signaturePadPasien         = new SignaturePad(document.getElementById('signature-pad-pasien'));
 var signaturePadSaksi          = new SignaturePad(document.getElementById('signature-pad-saksi'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
    var data_paraf = signaturePadParaf.toDataURL('image/png');
    $('#generate_paraf').val(data_paraf);
    var data_paraf_batuk = signaturePadParafBatuk.toDataURL('image/png');
    $('#generate_paraf_batuk').val(data_paraf_batuk);
    var data_paraf_kamar = signaturePadParafKamar.toDataURL('image/png');
    $('#generate_paraf_kamar').val(data_paraf_kamar);
    var data_paraf_fasilitas = signaturePadParafFasilitas.toDataURL('image/png');
    $('#generate_paraf_fasilitas').val(data_paraf_fasilitas);

    var data_wali = signaturePadWali.toDataURL('image/png');
    $('#generate_wali').val(data_wali);

    var data_pasien = signaturePadPasien.toDataURL('image/png');
    $('#generate_pasien').val(data_pasien);

    var data_saksi = signaturePadSaksi.toDataURL('image/png');
    $('#generate_saksi').val(data_saksi);
  
 });

//Fungsi button paraf
  // document.getElementById('clear_paraf').addEventListener('click', function () {
  //   signaturePadParaf.clear();
  // });

  // document.getElementById('undo_paraf').addEventListener('click', function () {
  //   var data_paraf = signaturePadParaf.toData();
  //   if (data_paraf) {
  //     data_paraf.pop(); // remove the last dot or line
  //     signaturePadParaf.fromData(data_paraf);
  //   }
  // });

//Fungsi button wali
 document.getElementById('clear_wali').addEventListener('click', function () {
    signaturePadWali.clear();
  });

  document.getElementById('undo_wali').addEventListener('click', function () {
    var data_wali = signaturePadWali.toData();
    if (data_wali) {
      data_wali.pop(); // remove the last dot or line
      signaturePadWali.fromData(data_wali);
    }
  });
//Fungsi button pasien
  document.getElementById('clear_pasien').addEventListener('click', function () {
    signaturePadPasien.clear();
  });

  document.getElementById('undo_pasien').addEventListener('click', function () {
    var data_pasien = signaturePadPasien.toData();
    if (data_pasien) {
      data_pasien.pop(); // remove the last dot or line
      signaturePadPasien.fromData(data_pasien);
    }
  });

//Fungsi button saksi RS
  document.getElementById('clear_saksi').addEventListener('click', function () {
    signaturePadSaksi.clear();
  });

  document.getElementById('undo_saksi').addEventListener('click', function () {
    var data_saksi = signaturePadSaksi.toData();
    if (data_saksi) {
      data_saksi.pop(); // remove the last dot or line
      signaturePadSaksi.fromData(data_saksi);
    }
  });

})


 </script>