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
        <div class="col-md-7">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Evaluasi Awal MPP</div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-2">
                      <b>Catatan <span class="pull-right">:</span></b>
                    </div>
                    <div class="col-md-9">
                      <p style="text-align: justify">Skrining, Asesmen untuk manajemen pelayanan pasien, Identifikasi Masalah -risiko- kesempatan, perencanaan Manajemen Pelayanan Pasien </p>
                    </div>
                  </div>
                  <br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Ruang Rawat</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="ruang_rawat" class="form-control" placeholder="Ruang Rawat" required autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-12"> 
                  <b>SKRINING (IDENTIFIKASI)</b>
                </div>
              </div>
              <br>

              <div class="row">

                <div class="col-md-12"> 
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="usia" id="usia" value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Fungsi Kognitif</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Rendah
                                <input type="radio" name="fungsi_kognitif" value="rendah" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Sedang
                                <input type="radio" name="fungsi_kognitif" value="sedang" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tinggi
                                <input type="radio" name="fungsi_kognitif" value="tinggi" required>
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
                    <div class="col-xs-5">
                      <b>Pasien dengan risiko tinggi</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="pasien_risiko_tinggi" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="pasien_risiko_tinggi" value="tidak" required>
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
                    <div class="col-xs-5">
                      <b>Potensi Complain</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="potensi_complain" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="potensi_complain" value="tidak" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-5">
                      <b>Riwayat Sakit Kronis</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="riwayat_sakit_kronis" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="riwayat_sakit_kronis" value="tidak" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Sebutkan 
                                    <input id="radio_other_riwayat" type="radio" name="riwayat_sakit_kronis" required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_riwayat" type="text" name="riwayat_sakit_kronis" class="form-control" required autocomplete="off" disabled="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Status Fungsional Rendah</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="status_fungsional_rendah" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="status_fungsional_rendah" value="tidak" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-5">
                      <b>Riwayat Alat medis di masa lalu</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="riwayat_alat_medis" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="riwayat_alat_medis" value="tidak" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Sebutkan 
                                    <input id="radio_other_alat_medis" type="radio" name="riwayat_alat_medis" required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_alat_medis" type="text" name="riwayat_alat_medis" class="form-control" required autocomplete="off" disabled="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Riwayat Gangguan Mental</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="riwayat_gangguan_mental" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="riwayat_gangguan_mental" value="tidak" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-5">
                      <b>Readmisi > 3x dalam 6 bulan terakhir</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="readmisi" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="readmisi" value="tidak" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-5">
                      <b>Perkiraan Biaya Tinggi</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="perkiraan_biaya_tinggi" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="perkiraan_biaya_tinggi" value="tidak" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Sebutkan 
                                    <input id="radio_other_perkiraan_biaya" type="radio" name="perkiraan_biaya_tinggi" required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_perkiraan_biaya" type="text" name="perkiraan_biaya_tinggi" class="form-control" required autocomplete="off" disabled="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-5">
                      <b>Sistem Biaya</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Umum
                                <input type="radio" name="sistem_biaya" value="umum" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">BPJS
                                <input type="radio" name="sistem_biaya" value="bpjs" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Lainnya
                                    <input id="radio_other_sistem_biaya" type="radio" name="sistem_biaya" required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_sistem_biaya" type="text" name="sistem_biaya" class="form-control" required autocomplete="off" disabled="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-5">
                      <b>Lama Dirawat</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">> 1 Minggu
                                <input type="radio" name="lama_dirawat" value="Lebih dari 1 minggu" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">> 2 Minggu
                                <input type="radio" name="lama_dirawat" value="Lebih dari 2 minggu" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Lainnya
                                    <input id="radio_other_lama_dirawat" type="radio" name="lama_dirawat" required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_lama_dirawat" type="text" name="lama_dirawat" class="form-control" required autocomplete="off" disabled="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-5">
                      <b>Risiko Komplikasi Berat di Rumah</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Ya
                                <input type="radio" name="risiko_komplikasi_berat_di_rumah" value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tidak
                                <input type="radio" name="risiko_komplikasi_berat_di_rumah" value="tidak" required>
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
                      <b>Kesimpulan</b>
                    </div>
                    <div class="col-md-7">
                      <textarea class="form-control input-sm" name="kesimpulan" id="Kesimpulan" value="" placeholder="Kesimpulan (Optional)"></textarea>
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