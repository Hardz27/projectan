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
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Riwayat Menyusui</div>
            <div class="panel-body">

                  <br>
                  <div class="row">
                    <div class="col-md-5">
                      <b>Umur Bayi</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="umur_bayi" id="umur_bayi" value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>1. Pemberian Makanan</b>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      ASI : Susu lain (formula, susu sapi, yang lain)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="asi" id="asi" value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Frekuensi Menyusui
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="frekuensi_menyusui" id="frekuensi_menyusui" value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Lama menyusui / satu atau kedua payudara
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="lama_menyusui" id="lama_menyusui" value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Menyusu waktu malam
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="menyusu_waktu_malam" id="menyusu_waktu_malam" value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Jumlah dan frekuensi pemberian susu lain
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="jumlah_dan_frekuensi" id="jumlah_dan_frekuensi" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Cairan lain sebagai tambahan ASI (kapan dimulai,apa,berapa jumlahnya,frekuensi)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="cairan_lain" id="cairan_lain" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Makanan lain sebagai tambahan ASI (kapan dimulai,apa,berapa jumlahnya,frekuensi)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="makanan_lain" id="makanan_lain" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Penggunaan botol dan bagaimana membersihkannya
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="penggunaan_botol" id="penggunaan_botol" value="" required>
                    </div>
                  </div>
                  <br>
                    
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Kesulitan pemberian makan (menyusui/makanan lain)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="kesulitan_pemberian_makan" id="kesulitan_pemberian_makan" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>2. Kesehatan</b>
                    </div>
                  </div>
                  <br>
                                    
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      KMS (berat lahir, berat sekarang)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="kms" id="kms" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Frekuensi BAK perhari (6x/lebih), jika kurang dari 6 bulan
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="frekuensi_bak" id="frekuensi_bak" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Buang Air Besar (frekuensi, kepadatan)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="buang_air_besar" id="buang_air_besar" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Penyakit
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="penyakit" id="penyakit" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Perilaku (makan, tidur, menangis)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="perilaku" id="perilaku" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>3. Kehamilan, persalinan, menyusui awal (jika dilakukan)</b>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Perawatan Kehamilan
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="perawatan_kehamilan" id="perawatan_kehamilan" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Diskusi pemberian makanan di perawatan ante natal
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="diskusi" id="diskusi" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Persalinan -IMD, menyusui dalam satu jam pertama
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="persalinan_imd" id="persalinan_imd" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Rawat Gabung
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="rawat_gabung" id="rawat_gabung" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Asupan prelaktal
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="asupan_prelaktal" id="asupan_prelaktal" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Bantuan menyusui pasca lahir
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="bantuan_menyusui" id="bantuan_menyusui" value="" required>
                    </div>
                  </div>
                  <br>

            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Riwayat Menyusui</div>
            <div class="panel-body">

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>4. Kondisi Ibu dan KB</b>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Umur
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="umur" id="umur" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Kesehatan - termasuk gizi dan obat-obatan
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="kesehatan" id="kesehatan" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Kebiasaan - kopi, rokok,alcohol, obat
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="kebiasaan" id="kebiasaan" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Keadaan Payudara
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="keadaan_payudara" id="keadaan_payudara" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      KB
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="kb" id="kb" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Motivasi untuk menyusui
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="motivasi_untuk_menyusui" id="motivasi_untuk_menyusui" value="" required>
                    </div>
                  </div>
                  <br>
                  
                   <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>5. Pengalaman Pemberian Makanan Bayi Sebelumnya</b>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Jumlah anak sebelumnya
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="jumlah_anak_sebelumnya" id="jumlah_anak_sebelumnya" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Berapa yang disusui dan berapa lama
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="berapa_yang_disusui" id="berapa_yang_disusui" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Jika menyusui - eksklusif atau campur
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="menyusui_ekslusif_atau_campur" id="menyusui_ekslusif_atau_campur" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Pengalaman pemberian makanan lain - pernah menggunakan botol
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="pengalaman_pemberian_makanan_lain" id="pengalaman_pemberian_makanan_lain" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>6. Keluarga dan situasi social</b>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Situasi Pekerjaan
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="situasi_pekerjaan" id="situasi_pekerjaan" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Keadaan ekonomi, pendidikan
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="keadaan_ekonomi" id="keadaan_ekonomi" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Sikap keluarga terhadap menyusui (ayah bayi, nenek)
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="sikap_keluarga" id="sikap_keluarga" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      Bantuan perawatan anak di rumah
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="bantuan_perawatan" id="bantuan_perawatan" value="" required>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Kesimpulan</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" class="form-control input-sm" name="kesimpulan" id="kesimpulan" value="" placeholder="Kesimpulan"  required></textarea>
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
      console.log(data);
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