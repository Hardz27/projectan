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

  .btn-default.active,
  .btn-default:active,
  .open>.dropdown-toggle.btn-default {
    color: white;
    background: #337ab7;
    border-color: #337ab7;
  }

  .checkbox-left {
    width: 100%;
    text-align: left;
  }

  .signature{
    width: 200px; height: 200px;
    border: 1px solid black;
    /*background-image: url("<?php echo base_url();?>assets/image/Human.png");*/
  }
  #coretan{
    width: 200px; height: 200px;
    border: 0px solid black;
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
                      <input type="text" name="no_rm" id="no_rm" class="form-control" placeholder="No. Rm" value="<?= $result['no_rm']; ?>" required autocomplete="off">
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
                      <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien" value="<?= $result['nama_pasien']; ?>" required autocomplete="off">
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
                          <input type="radio" name="jenis_kelamin" <?= $result['jenis_kelamin'] == 'L' ? 'checked' : ''; ?> value="L" required >
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center" style="padding-left: 0px">P
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="jenis_kelamin" <?= $result['jenis_kelamin'] == 'P' ? 'checked' : ''; ?> value="P" required >
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
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= date('Y-m-d') ?>" value="<?= $result['tanggal_lahir']; ?>" required autocomplete="off">
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
                      <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="ruangan" value="<?= $result['ruangan']; ?>" required autocomplete="off">
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
                          <input type="hidden" id="prev_paraf" value="<?= $result['coretan_paraf']; ?>">
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
                          <input type="hidden" id="prev_paraf_batuk" value="<?= $result['coretan_paraf_batuk']; ?>">
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
                          <input type="hidden" id="prev_paraf_kamar" value="<?= $result['coretan_paraf_kamar']; ?>">
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
                          <input type="hidden" id="prev_paraf_fasilitas" value="<?= $result['coretan_paraf_fasilitas']; ?>">
                          <input type='hidden' id='generate_paraf_fasilitas' name="coretan_paraf_fasilitas" value='' required >
                        </td>
                      </tr>
                      <tr>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;NGT
                              <input type="checkbox" name="ngt" value="NGT" <?= $result['ngt'] != '' ? 'checked' : ''; ?>>
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;DC
                              <input type="checkbox" name="dc" value="DC" <?= $result['dc'] != '' ? 'checked' : ''; ?>>
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Drainase
                              <input type="checkbox" name="drainase" value="Drainase" <?= $result['drainase'] != '' ? 'checked' : ''; ?>>
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td class="bd text-left nb-top">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Fiksasi Leher
                              <input type="checkbox" name="fiksasi_leher" value="Fiksasi Leher" <?= $result['fiksasi_leher'] != '' ? 'checked' : ''; ?>>
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
                              <input type="checkbox" name="bidai" value="Bidai" <?= $result['bidai'] != '' ? 'checked' : ''; ?>>
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Gips
                              <input type="checkbox" name="gips" value="Gips" <?= $result['gips'] != '' ? 'checked' : ''; ?>>
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
                              <input type="checkbox" name="et" value="ET" <?= $result['et'] != '' ? 'checked' : ''; ?>>
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;WSD
                              <input type="checkbox" name="wsd" value="WSD" <?= $result['wsd'] != '' ? 'checked' : ''; ?>>
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td width="17%" class="bd text-left nb-top nb-right">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;Infus
                              <input type="checkbox" name="infus" value="Infus" <?= $result['infus'] != '' ? 'checked' : ''; ?>>
                              <span class="checkmark-checkbox"></span>
                            </label>
                          </div>
                        </td>
                        <td class="bd text-left nb-top">
                          <div class="text-center" style="padding-left: 0px">
                            <label class="container-checkbox checkbox-left">
                              &nbsp;&nbsp;DC Irigasi
                              <input type="checkbox" name="dc_irigasi" value="DC Irigasi" <?= $result['dc_irigasi'] != '' ? 'checked' : ''; ?>>
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
            <div class="panel-heading">Tambah Data Fisioterapi Asesment</div>
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
                      <input type="hidden" id="prev_wali" value="<?= $result['coretan_wali']; ?>">
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
                      <input type="hidden" id="prev_pasien" value="<?= $result['coretan_pasien']; ?>">
                      <input type='hidden' id='generate_pasien' name="coretan_pasien" value='' required ><br/>
                    </div>
                    <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                      <input type="text" name="nama_wali" class="form-control" placeholder="Wali" value="<?= $result['nama_wali']; ?>" required autocomplete="off">
                    </div>
                    <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                      <input type="text" name="nama_pasien_ttd" class="form-control" placeholder="Pasien" value="<?= $result['nama_pasien_ttd']; ?>" required autocomplete="off">
                    </div>
                    <br><br>
                    <div class="col-md-12 text-center" style="margin: 20px 0px 20px 0px;"> 
                      <div class="row">
                        <!-- nama -->
                        <div class="col-md-4">
                          Bertanda tangan untuk pasien a.n
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="pasien_a_n" id="pasien" class="form-control" placeholder="Nama Pasien" value="<?= $result['pasien_a_n']; ?>" required autocomplete="off">
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
                      <input type="hidden" id="prev_saksi" value="<?= $result['coretan_saksi']; ?>">
                      <input type='hidden' id='generate_saksi' name="coretan_saksi" value='' required ><br/>
                    </div>
                    <div class="col-md-12 text-center" style="margin: 20px 0px 20px 0px;"> 
                      <input type="text" name="nama_saksi" class="form-control" placeholder="Saksi" value="<?= $result['nama_saksi']; ?>" required autocomplete="off">
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
  update();


$(document).ready(function(){
  $("input[type='radio']").click(function(){
      update();
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
    var set_paraf  = signaturePadParaf.toData();
    if (!set_paraf.pop()) {
      data_paraf = $('#prev_paraf').val();  
    }
    $('#generate_paraf').val(data_paraf);

    var data_paraf_batuk = signaturePadParafBatuk.toDataURL('image/png');
    var set_paraf_batuk = signaturePadParafBatuk.toData();
    if (!set_paraf_batuk.pop()) {
      data_paraf_batuk = $('#prev_paraf_batuk').val();  
    }
    $('#generate_paraf_batuk').val(data_paraf_batuk);

    var data_paraf_kamar = signaturePadParafKamar.toDataURL('image/png');
    var set_paraf_kamar = signaturePadParafKamar.toData();
    if (!set_paraf_kamar.pop()) {
      data_paraf_kamar = $('#prev_paraf_kamar').val();  
    }
    $('#generate_paraf_kamar').val(data_paraf_kamar);

    var data_paraf_fasilitas = signaturePadParafFasilitas.toDataURL('image/png');
    var set_paraf_fasilitas = signaturePadParafFasilitas.toData();
    if (!set_paraf_fasilitas.pop()) {
      data_paraf_fasilitas = $('#prev_paraf_fasilitas').val();  
    }
    $('#generate_paraf_fasilitas').val(data_paraf_fasilitas);

    var data_wali = signaturePadWali.toDataURL('image/png');
    var set_wali = signaturePadWali.toData();
    if (!set_wali.pop()) {
      data_wali = $('#prev_wali').val();  
    }
    $('#generate_wali').val(data_wali);

    var data_pasien = signaturePadPasien.toDataURL('image/png');
    var set_pasien = signaturePadPasien.toData();
    if (!set_pasien.pop()) {
      data_pasien = $('#prev_pasien').val();  
    }
    $('#generate_pasien').val(data_pasien);

    var data_saksi = signaturePadSaksi.toDataURL('image/png');
    var set_saksi = signaturePadSaksi.toData();
    if (!set_saksi.pop()) {
      data_saksi = $('#prev_saksi').val();  
    }
    $('#generate_saksi').val(data_saksi);
  
 });

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