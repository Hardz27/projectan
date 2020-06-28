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
    width: 450px; height: 100%; 
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/odontogram.png");
  }
  #coretan{
    width: 450px; height: 100%; 
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/odontogram.png");
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
                  <b>Dokter Approve</b>
                </div>
                <div class="col-md-8">
                  <select name="dokter_approved" class="dokter_approved" style="width: 100%" required>
                    <option value=""></option>
                    <?php foreach ($data_dokter as $k => $v) : ?>
                      <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_dokter'] ? 'selected' : ''; ?>><?= $v['nama'] ?></option>
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
            <div class="panel-heading">Edit Data <?= $title ?></div>
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
                      <input type="text" class="form-control input-sm" name="golongan_darah" value="<?= $result['golongan_darah']; ?>" required>
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
                                  <input type="text" class="form-control input-sm" name="tekanan_a" value="<?= $result['tekanan_a'] ?>" required>
                                </div>
                                <div class="col-xs-1 text-center" style="padding: 0px;">/</div>
                                <div class="col-xs-5">
                                  <input type="text" class="form-control input-sm" name="tekanan_b" value="<?= $result['tekanan_b'] ?>" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">Normal
                                <input type="radio" name="tekanan_darah" value="Normal" <?= $result['tekanan_darah'] == 'Normal' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">Hypotensi
                                <input type="radio" name="tekanan_darah" value="Hypotensi" <?= $result['tekanan_darah'] == 'Hypotensi' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2">
                              <label class="container">Hypertensi
                                <input type="radio" name="tekanan_darah" value="Hypertensi" <?= $result['tekanan_darah'] == 'Hypertensi' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="penyakit_jantung" value="Tidak Ada" <?= $result['penyakit_jantung'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="penyakit_jantung" value="Ada" <?= $result['penyakit_jantung'] == 'Ada' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="diabetes" value="Tidak Ada" <?= $result['diabetes'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="diabetes" value="Ada" <?= $result['diabetes'] == 'Ada' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="haemopilia" value="Tidak Ada" <?= $result['haemopilia'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="haemopilia" value="Ada" <?= $result['haemopilia'] == 'Ada' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="hepatitis" value="Tidak Ada" <?= $result['hepatitis'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="hepatitis" value="Ada" <?= $result['hepatitis'] == 'Ada' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="gastritis" value="Tidak Ada" <?= $result['gastritis'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="gastritis" value="Ada" <?= $result['gastritis'] == 'Ada' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="penyakit_lainnya" value="Tidak Ada" <?= $result['penyakit_lainnya'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada
                                <input type="radio" name="penyakit_lainnya" value="Ada" <?= $result['penyakit_lainnya'] == 'Ada' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="alergi_obat" value="Tidak Ada" <?= $result['alergi_obat'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_alergi_obat" type="radio" name="alergi_obat" value="Ada" <?= $result['alergi_obat'] == 'Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_alergi_obat" id="desc_alergi_obat" placeholder="Sebutkan alergi obatnya" disabled><?= $result['alergi_obat'] == 'Ada' ? $result['desc_alergi_obat'] : ''; ?></textarea>
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
                                <input type="radio" name="alergi_makanan" value="Tidak Ada" <?= $result['alergi_makanan'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_alergi_makanan" type="radio" name="alergi_makanan" value="Ada" <?= $result['alergi_makanan'] == 'Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_alergi_makanan" id="desc_alergi_makanan" placeholder="Sebutkan alergi makanannya" disabled><?= $result['alergi_makanan'] == 'Ada' ? $result['desc_alergi_makanan'] : ''; ?></textarea>
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
                      <div class="row">
                        <div class="col-md-4">
                          <b>Gambar Saat ini :</b>
                        </div>
                        <div class="col-md-8">
                          <div id="coretan" style=''>
                            <img src='<?= $result['coretan']; ?>' id='sign_prev' />
                            <input type="hidden" name="prev" id="prev" value="<?= $result['coretan']; ?>">
                          </div><br/>
                        </div>
                      </div> 
                      <br>               
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12"> 
                      <!-- Signature -->
                      <center>
                        <div id="signature" style=''>
                          <canvas id="signature-pad" class="signature-pad" width="450px" height="250px">
                        </div>
                      </center><br/>
                      <button type="button" id="undo">Undo</button>
                      <button type="button" id="clear">Clear</button> <b>Note :</b> Kosongkan jika tidak ada perubahan gambar.
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
                                <input type="radio" name="occlusi" value="Normal Bite"  <?= $result['occlusi'] == 'Normal Bite' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Cross Bite
                                <input type="radio" name="occlusi" value="Cross Bite"  <?= $result['occlusi'] == 'Cross Bite' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Steep Bite
                                <input type="radio" name="occlusi" value="Steep Bite"  <?= $result['occlusi'] == 'Steep Bite' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="mandibularis" value="Dalam" <?= $result['mandibularis'] == 'Dalam' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Sedang
                                <input type="radio" name="mandibularis" value="Sedang" <?= $result['mandibularis'] == 'Sedang' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Rendah
                                <input type="radio" name="mandibularis" value="Rendah" <?= $result['mandibularis'] == 'Rendah' ? 'checked' : ''; ?> required>
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
                                <input type="radio" name="palatum" value="Tidak Ada"  <?= $result['palatum'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_palatum" type="radio" name="palatum" value="Ada"  <?= $result['palatum'] == 'Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_palatum" id="desc_palatum" value="" placeholder="Jelaskan di mana, dan berapa lebarnya" disabled> <?= $result['palatum'] == 'Ada' ? $result['desc_palatum'] : ''; ?></textarea>
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
                                <input type="radio" name="torus" value="Tidak Ada" <?= $result['torus'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label class="container" style="padding-right: 0px;">Sisi Kiri
                                <input type="radio" name="torus" value="Sisi Kiri" <?= $result['torus'] == 'Sisi Kiri' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label class="container" style="padding-right: 0px;">Sisi Kanan
                                <input type="radio" name="torus" value="Sisi Kanan" <?= $result['torus'] == 'Sisi Kanan' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label class="container" style="padding-right: 0px;">Kedua sisi
                                <input type="radio" name="torus" value="Kedua Sisi" <?= $result['torus'] == 'Kedua Sisi' ? 'checked' : ''; ?> required>
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
                            <input type="radio" name="torus_palatinus" value="Tidak Ada" <?= $result['torus_palatinus'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Kecil
                            <input type="radio" name="torus_palatinus" value="Kecil" <?= $result['torus_palatinus'] == 'Kecil' ? 'checked' : ''; ?> required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Sedang
                            <input type="radio" name="torus_palatinus" value="Sedang" <?= $result['torus_palatinus'] == 'Sedang' ? 'checked' : ''; ?> required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Besar
                            <input type="radio" name="torus_palatinus" value="Besar" <?= $result['torus_palatinus'] == 'Besar' ? 'checked' : ''; ?> required>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container">Multiple
                            <input type="radio" name="torus_palatinus" value="Multiple" <?= $result['torus_palatinus'] == 'Multiple' ? 'checked' : ''; ?> required>
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
                      <textarea class="form-control input-sm" name="Diastema" id="Diastema" value="" required><?= $result['Diastema'] ?></textarea>
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
                                <input type="radio" name="gigi_anomali" value="Tidak Ada" <?= $result['gigi_anomali'] == 'Tidak Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Ada 
                                <input id="ada_gigi_anomali" type="radio" name="gigi_anomali" value="Ada" <?= $result['gigi_anomali'] == 'Ada' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 10px;">
                              <textarea class="form-control input-sm" name="desc_gigi_anomali" id="desc_gigi_anomali" value="" placeholder="Jelaskan gigi yang mana, dan bentuknya" disabled> <?= $result['gigi_anomali'] == 'Ada' ? $result['desc_gigi_anomali'] : ''; ?></textarea>
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
                      <textarea class="form-control input-sm" name="lain_lain" id="lain_lain" placeholder="Optional"><?= $result['lain_lain'] ?></textarea>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-4">
                      Hal-hal yang tidak terecakup di atas</b>
                    </div>
                    <div class="col-md-8">
                      <textarea class="form-control input-sm" name="hal_tidak_tercakup" id="hal_tidak_tercakup" placeholder="Optional" ><?= $result['hal_tidak_tercakup'] ?></textarea>
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
                          <input type="text" class="form-control input-sm" name="d" value="<?= $result['d'] ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="col-xs-1">
                          M:
                        </div>
                        <div class="col-xs-10">
                          <input type="text" class="form-control input-sm" name="m" value="<?= $result['m'] ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="row">
                        <div class="col-xs-1">
                          F:
                        </div>
                        <div class="col-xs-10">
                          <input type="text" class="form-control input-sm" name="f" value="<?= $result['f'] ?>" required>
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
                                  <input type="text" class="form-control input-sm" name="jumlah_foto" value="<?= $result['jumlah_foto'] ?>" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">digital
                                <input type="radio" name="type_foto" value="Digital" <?= $result['type_foto'] == 'Digital' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">intraoral
                                <input type="radio" name="type_foto" value="Intraoral" <?= $result['type_foto'] == 'Intraoral' ? 'checked' : ''; ?> required>
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
                              <input type="text" class="form-control input-sm" name="jumlah_foto_rontgen" value="<?= $result['jumlah_foto_rontgen'] ?>" required>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">dental
                                <input type="radio" name="type_foto_rontgen" value="Dental" <?= $result['type_foto_rontgen'] == 'Dental' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2" style="padding-left: 0px">
                              <label class="container">PA
                                <input type="radio" name="type_foto_rontgen" value="PA" <?= $result['type_foto_rontgen'] == 'PA' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2">
                              <label class="container">OPG
                                <input type="radio" name="type_foto_rontgen" value="OPG" <?= $result['type_foto_rontgen'] == 'OPG' ? 'checked' : ''; ?> required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-2">
                              <label class="container">Ceph
                                <input type="radio" name="type_foto_rontgen" value="Ceph" <?= $result['type_foto_rontgen'] == 'Ceph' ? 'checked' : ''; ?> required>
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
  }

  $(document).ready(function(){
    $("input[type='radio']").click(function(){
        update();
    });
  });


</script>

<script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  var set = signaturePad.toData();
  if (!set.pop()) {
    data = $('#prev').val();
    
  }
  
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