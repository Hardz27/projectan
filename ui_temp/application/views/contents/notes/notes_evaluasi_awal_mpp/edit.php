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
            <div class="panel-heading">Edit Data Evaluasi Awal MPP</div>
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
                      <input type="text" name="ruang_rawat" class="form-control" placeholder="Ruang Rawat" value="<?= $result['ruang_rawat'] ?>" required autocomplete="off">
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
                      <input type="text" class="form-control input-sm" name="usia" id="usia" value="<?= $result['usia'] ?>" required>
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
                                <input type="radio" name="fungsi_kognitif" value="rendah" <?= $result['fungsi_kognitif'] == 'rendah' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Sedang
                                <input type="radio" name="fungsi_kognitif" value="sedang" <?= $result['fungsi_kognitif'] == 'sedang' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Tinggi
                                <input type="radio" name="fungsi_kognitif" value="tinggi" <?= $result['fungsi_kognitif'] == 'tinggi' ? 'checked' : ''; ?> required>
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="pasien_risiko_tinggi" value="ya" <?= $result['pasien_risiko_tinggi'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="pasien_risiko_tinggi" value="tidak" <?= $result['pasien_risiko_tinggi'] == 'tidak' ? 'checked' : ''; ?> required>
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="potensi_complain" <?= $result['potensi_complain'] == 'ya' ? 'checked' : ''; ?> value="ya" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="potensi_complain" <?= $result['potensi_complain'] == 'tidak' ? 'checked' : ''; ?> value="tidak" required>
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="riwayat_sakit_kronis" value="ya" <?= $result['riwayat_sakit_kronis'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="riwayat_sakit_kronis" value="tidak" <?= $result['riwayat_sakit_kronis'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Sebutkan 
                                    <input id="radio_other_riwayat" type="radio" name="riwayat_sakit_kronis" <?= $result['riwayat_sakit_kronis'] != 'tidak' && $result['riwayat_sakit_kronis'] != 'ya'  ? 'Checked' : ''; ?> required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_riwayat" type="text" name="riwayat_sakit_kronis" class="form-control" required autocomplete="off" disabled="" <?= $result['riwayat_sakit_kronis'] != 'tidak' && $result['riwayat_sakit_kronis'] != 'ya'  ? 'value="'. $result['riwayat_sakit_kronis'] .'"' : ''; ?> >
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="status_fungsional_rendah" value="ya" <?= $result['status_fungsional_rendah'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="status_fungsional_rendah" value="tidak" <?= $result['status_fungsional_rendah'] == 'tidak' ? 'checked' : ''; ?> required>
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="riwayat_alat_medis" value="ya" <?= $result['riwayat_alat_medis'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="riwayat_alat_medis" value="tidak" <?= $result['riwayat_alat_medis'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Sebutkan 
                                    <input id="radio_other_alat_medis" type="radio" name="riwayat_alat_medis"  <?= $result['riwayat_alat_medis'] != 'tidak' && $result['riwayat_alat_medis'] != 'ya'  ? 'Checked' : ''; ?> required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_alat_medis" type="text" name="riwayat_alat_medis" class="form-control" required autocomplete="off" disabled=""  <?= $result['riwayat_alat_medis'] != 'tidak' && $result['riwayat_alat_medis'] != 'ya'  ? 'value="'. $result['riwayat_alat_medis'] .'"' : ''; ?>>
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="riwayat_gangguan_mental" value="ya" <?= $result['riwayat_gangguan_mental'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="riwayat_gangguan_mental" value="tidak" <?= $result['riwayat_gangguan_mental'] == 'tidak' ? 'checked' : ''; ?> required>
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="readmisi" value="ya" <?= $result['readmisi'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="readmisi" value="tidak" <?= $result['readmisi'] == 'tidak' ? 'checked' : ''; ?> required>
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="perkiraan_biaya_tinggi" value="ya" <?= $result['perkiraan_biaya_tinggi'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="perkiraan_biaya_tinggi" value="tidak" <?= $result['perkiraan_biaya_tinggi'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Sebutkan 
                                    <input id="radio_other_perkiraan_biaya" type="radio" name="perkiraan_biaya_tinggi"  <?= $result['perkiraan_biaya_tinggi'] != 'tidak' && $result['perkiraan_biaya_tinggi'] != 'ya'  ? 'Checked' : ''; ?> required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_perkiraan_biaya" type="text" name="perkiraan_biaya_tinggi" class="form-control" required autocomplete="off" disabled=""  <?= $result['perkiraan_biaya_tinggi'] != 'tidak' && $result['perkiraan_biaya_tinggi'] != 'ya'  ? 'value="'. $result['perkiraan_biaya_tinggi'] .'"' : ''; ?>>
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
                            <div class="col-xs-5">
                              <label class="container">Umum
                                <input type="radio" name="sistem_biaya" value="umum" <?= $result['sistem_biaya'] == 'umum' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">BPJS
                                <input type="radio" name="sistem_biaya" value="bpjs" <?= $result['sistem_biaya'] == 'bpjs' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Lainnya
                                    <input id="radio_other_sistem_biaya" type="radio" name="sistem_biaya"  <?= $result['sistem_biaya'] != 'umum' && $result['sistem_biaya'] != 'bpjs'  ? 'Checked' : ''; ?> required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_sistem_biaya" type="text" name="sistem_biaya" class="form-control" required autocomplete="off" disabled=""  <?= $result['sistem_biaya'] != 'umum' && $result['sistem_biaya'] != 'bpjs'  ? 'value="'. $result['sistem_biaya'] .'"' : ''; ?> >
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
                            <div class="col-xs-5">
                              <label class="container">> 1 Minggu
                                <input type="radio" name="lama_dirawat" value="Lebih dari 1 minggu" <?= $result['lama_dirawat'] == 'Lebih dari 1 minggu' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">> 2 Minggu
                                <input type="radio" name="lama_dirawat" value="Lebih dari 2 minggu" <?= $result['lama_dirawat'] == 'Lebih dari 2 minggu' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-3" style="margin-bottom: 10px;">
                                  <label class="container">Lainnya
                                    <input id="radio_other_lama_dirawat" type="radio" name="lama_dirawat"  <?= $result['lama_dirawat'] != 'Lebih dari 1 minggu' && $result['lama_dirawat'] != 'Lebih dari 2 minggu'  ? 'Checked' : ''; ?> required>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-xs-8">
                                  <input id="text_other_lama_dirawat" type="text" name="lama_dirawat" class="form-control" required autocomplete="off" disabled="" <?= $result['lama_dirawat'] != 'Lebih dari 1 minggu' && $result['lama_dirawat'] != 'Lebih dari 2 minggu'  ? 'value="'. $result['lama_dirawat'] .'"' : ''; ?> >
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
                            <div class="col-xs-5">
                              <label class="container">Ya
                                <input type="radio" name="risiko_komplikasi_berat_di_rumah" value="ya" <?= $result['risiko_komplikasi_berat_di_rumah'] == 'ya' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-5">
                              <label class="container">Tidak
                                <input type="radio" name="risiko_komplikasi_berat_di_rumah" value="tidak" <?= $result['risiko_komplikasi_berat_di_rumah'] == 'tidak' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <b>Kesimpulan</b>
                    </div>
                    <div class="col-md-7">
                      <textarea class="form-control input-sm" name="kesimpulan" id="Kesimpulan" placeholder="Kesimpulan (Optional)"><?= $result['kesimpulan'] ?></textarea>
                    </div>
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
    
function update() {
  $(document).ready(function(){
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
}



$(document).ready(function(){
  $("input[type='radio']").click(function(){
      update();
  });
});


</script>