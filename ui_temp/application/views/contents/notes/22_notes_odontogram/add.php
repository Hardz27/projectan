
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
    width: 450px; height: 100%; 
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/odontogram.png");
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
            <div class="panel-heading">Tambah data <?= $title ?></div>
            <div class="panel-body">

              <br>
              <div class="row">
                <div class="col-md-12"> 
                  <b>A. Data Medik</b>
                </div>
              </div>
              <br>

              <div class="row">

                <div class="col-md-12"> 
                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Golongan Darah</b>
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" name="golongan_darah" value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Tekanan darah
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-5">
                              <div class="row">
                                <div class="col-xs-5">
                                  <input type="text" class="form-control input-sm" name="tekanan_a" value="" required>
                                </div>
                                <div class="col-xs-1 text-center" style="padding: 0px;">/</div>
                                <div class="col-xs-5">
                                  <input type="text" class="form-control input-sm" name="tekanan_b" value="" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">Normal
                                <input type="radio" name="tekanan_darah" value="Normal" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">Hypotensi
                                <input type="radio" name="tekanan_darah" value="Hypotensi" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2">
                              <label class="container">Hypertensi
                                <input type="radio" name="tekanan_darah" value="Hypertensi" required>
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
                    <div class="col-xs-4">
                      Penyakit jantung
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="penyakit_jantung" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="penyakit_jantung" value="Ada" required>
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
                    <div class="col-xs-4">
                      Diabetes
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="diabetes" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="diabetes" value="Ada" required>
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
                    <div class="col-xs-4">
                      Haemopilia
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="haemopilia" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="haemopilia" value="Ada" required>
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
                    <div class="col-xs-4">
                      Hepatitis
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="hepatitis" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="hepatitis" value="Ada" required>
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
                    <div class="col-xs-4">
                      Gastritis
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="gastritis" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="gastritis" value="Ada" required>
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
                    <div class="col-xs-4">
                      Penyakit Lainnya
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="penyakit_lainnya" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="penyakit_lainnya" value="Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-4">
                      Alergi terhadap obat-obatan
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="alergi_obat" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_alergi_obat" type="radio" name="alergi_obat" value="Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_alergi_obat" id="desc_alergi_obat" placeholder="Sebutkan alergi obatnya" value="" disabled></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-4">
                      Alergi terhadap makanan
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="alergi_makanan" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_alergi_makanan" type="radio" name="alergi_makanan" value="Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_alergi_makanan" id="desc_alergi_makanan" placeholder="Sebutkan alergi makanannya" value="" disabled></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <br>
                  <div class="row">
                    <div class="col-md-12"> 
                      <b>B. Odontogram</b>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-12"> 
                      <!-- Signature -->
                      <center>
                        <div id="signature" style=''>
                          <canvas id="signature-pad" class="signature-pad" width="450px" height="250px">
                        </div>
                      </center><br/>
                      <button type="button" id="undo">Undo</button>
                      <button type="button" id="clear">Clear</button>
                      <input type='hidden' id='generate' name="coretan" value=''><br/>
                      <br>               
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Occlusi
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Normal Bite
                                <input type="radio" name="occlusi" value="Normal Bite" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Cross Bite
                                <input type="radio" name="occlusi" value="Cross Bite" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Steep Bite
                                <input type="radio" name="occlusi" value="Steep Bite" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-4">
                      Mandibularis
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Dalam
                                <input type="radio" name="mandibularis" value="Dalam" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Sedang
                                <input type="radio" name="mandibularis" value="Sedang" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Rendah
                                <input type="radio" name="mandibularis" value="Rendah" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-4">
                      Palatum
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="palatum" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_palatum" type="radio" name="palatum" value="Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_palatum" id="desc_palatum" value="" placeholder="Jelaskan di mana, dan berapa lebarnya" disabled></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Torus
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-3">
                              <label class="container" style="padding-right: 0px;">Tidak ada
                                <input type="radio" name="torus" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label class="container" style="padding-right: 0px;">Sisi Kiri
                                <input type="radio" name="torus" value="Sisi Kiri" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label class="container" style="padding-right: 0px;">Sisi Kanan
                                <input type="radio" name="torus" value="Sisi Kanan" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label class="container" style="padding-right: 0px;">Kedua sisi
                                <input type="radio" name="torus" value="Kedua Sisi" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">                      
                    <div class="col-xs-4">
                      Torus Palatinus
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-3">
                          <label class="container">Tidak ada
                            <input type="radio" name="torus_palatinus" value="Tidak Ada" required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Kecil
                            <input type="radio" name="torus_palatinus" value="Kecil" required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Sedang
                            <input type="radio" name="torus_palatinus" value="Sedang" required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Besar
                            <input type="radio" name="torus_palatinus" value="Besar" required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Multiple
                            <input type="radio" name="torus_palatinus" value="Multiple" required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Diastema</b>
                    </div>
                    <div class="col-md-8">
                      <textarea class="form-control input-sm" name="Diastema" id="Diastema" value="" required></textarea>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-xs-4">
                      Gigi Anomali
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Tidak Ada
                                <input type="radio" name="gigi_anomali" value="Tidak Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_gigi_anomali" type="radio" name="gigi_anomali" value="Ada" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_gigi_anomali" id="desc_gigi_anomali" value="" placeholder="Jelaskan gigi yang mana, dan bentuknya" disabled></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Lain Lain</b>
                    </div>
                    <div class="col-md-8">
                      <textarea class="form-control input-sm" name="lain_lain" id="lain_lain" placeholder="Optional" value=""></textarea>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Hal-hal yang tidak terecakup di atas</b>
                    </div>
                    <div class="col-md-8">
                      <textarea class="form-control input-sm" name="hal_tidak_tercakup" id="hal_tidak_tercakup" placeholder="Optional" value=""></textarea>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="col-xs-1">
                          D:
                        </div>
                        <div class="col-xs-10">
                          <input type="text" class="form-control input-sm" name="d" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="col-xs-1">
                          M:
                        </div>
                        <div class="col-xs-10">
                          <input type="text" class="form-control input-sm" name="m" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="col-xs-1">
                          F:
                        </div>
                        <div class="col-xs-10">
                          <input type="text" class="form-control input-sm" name="f" value="" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Jumlah Foto yang diambil
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-5">
                              <div class="row">
                                <div class="col-xs-12">
                                  <input type="text" class="form-control input-sm" name="jumlah_foto" value="" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">digital
                                <input type="radio" name="type_foto" value="Digital" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">intraoral
                                <input type="radio" name="type_foto" value="Intraoral" required>
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
                    <div class="col-xs-4">
                      Jumlah Rontgen foto yang diambil
                    </div>
                    <div class="col-xs-8">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <input type="text" class="form-control input-sm" name="jumlah_foto_rontgen" value="" required>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">dental
                                <input type="radio" name="type_foto_rontgen" value="Dental" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">PA
                                <input type="radio" name="type_foto_rontgen" value="PA" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2">
                              <label class="container">OPG
                                <input type="radio" name="type_foto_rontgen" value="OPG" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2">
                              <label class="container">Ceph
                                <input type="radio" name="type_foto_rontgen" value="Ceph" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
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

  $(document).ready(function(){
    $("input[type='radio']").click(function(){
        var radio_obat = $("input[id='ada_alergi_obat']:checked").length;
        if(radio_obat){
            $('#desc_alergi_obat').attr("disabled", false);
            $('#desc_alergi_obat').attr("required", true);
        }else{
          $('#desc_alergi_obat').attr("disabled", true);
          $('#desc_alergi_obat').attr("required", false);
          $('#desc_alergi_obat').val("");
        }

        var radio_makanan = $("input[id='ada_alergi_makanan']:checked").length;
        if(radio_makanan){
            $('#desc_alergi_makanan').attr("disabled", false);
            $('#desc_alergi_makanan').attr("required", true);
        }else{
          $('#desc_alergi_makanan').attr("disabled", true);
          $('#desc_alergi_makanan').attr("required", false);
          $('#desc_alergi_makanan').val("");
        }

        var radio_palatum = $("input[id='ada_palatum']:checked").length;
        if(radio_palatum){
            $('#desc_palatum').attr("disabled", false);
            $('#desc_palatum').attr("required", true);
        }else{
          $('#desc_palatum').attr("disabled", true);
          $('#desc_palatum').attr("required", false);
          $('#desc_palatum').val("");
        }

        var radio_anomali = $("input[id='ada_gigi_anomali']:checked").length;
        if(radio_anomali){
            $('#desc_gigi_anomali').attr("disabled", false);
            $('#desc_gigi_anomali').attr("required", true);
        }else{
          $('#desc_gigi_anomali').attr("disabled", true);
          $('#desc_gigi_anomali').attr("required", false);
          $('#desc_gigi_anomali').val("");
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