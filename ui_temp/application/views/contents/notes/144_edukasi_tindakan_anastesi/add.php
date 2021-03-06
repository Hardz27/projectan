
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
                      <b>Nama Wali</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali"  autocomplete="off">
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
                      <b>No Identitas</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="no_identitas" id="no_identitas" class="form-control" placeholder="No Identitas"  autocomplete="off">
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
                      <b>Usia</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="usia_wali" id="usia_wali" class="form-control" placeholder="Usia"  autocomplete="off">
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
                </div>
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Tgl.Lahir</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="ttl_wali" id="ttl_wali" class="form-control" placeholder="Tgl.Lahir"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">L
                        <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin_pasien" value="L" >
                      <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center">P
                      <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin_pasien" value="P" >
                      <span class="checkmark"></span>
                    </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Alamat</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                
                </div>
                <div class="col-md-6"> 
                  <div class="row">
                    <div class="col-md-6">
                        <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">L
                        <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin_wali" value="L" >
                      <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center">P
                      <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin_wali" value="P" >
                      <span class="checkmark"></span>
                    </label>
                    </div>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  
                </div>
                <div class="col-md-6"> 
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

              


          <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Diagnosis Kerja</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="diagnosis_kerja" id="diagnosis_kerja" class="form-control" placeholder="Diagnosis Kerja"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Diagnosis Banding</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="diagnosis_banding" id="diagnosis_banding" class="form-control" placeholder="Diagnosis Banding"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="col-md-12 mb-lg-5">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Tindakan yang dilakukan</b>
                    </div>
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="customcheck"> Anestesi spinal
                            <input type="checkbox" name="tindakan_yang_dilakukan[]" value="Anestesi spinal">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Anestesi epidural
                            <input type="checkbox" name="tindakan_yang_dilakukan[]" value="Anestesi epidural">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-6">
                          <label class="customcheck"> Block saraf
                            <input type="checkbox" name="tindakan_yang_dilakukan[]" value="Block saraf">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Lain lain
                            <input type="checkbox" name="tindakan_yang_dilakukan[]" value="Lain lain" id="tyd-ll">
                            <span class="checkmark"></span>
                          </label>
                          <input type="text" name="tyd_ll_value" id="tyd-ll-value" class="form-control" style="display: none;" placeholder="Lain lain">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>


              <!-- GAMBAR TUBUH DISINI -->
            <br>
            <div class="row">
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Indikasi Tindakan</b>
                    </div>
                    <div class="col-md-7">
                      <label class="customcheck"> Menghilangkan nyeri selama prosedur atau tindakan pembedahan
                        <input type="checkbox" name="indikasi_tindakan[]" value="Menghilangkan nyeri selama prosedur atau tindakan pembedahan">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> Relaksasi selama prosedur atau tindakan pembedahan
                        <input type="checkbox" name="indikasi_tindakan[]" value="Relaksasi selama prosedur atau tindakan pembedahan">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Tata Cara</b>
                    </div>
                    <div class="col-md-7">
                      <label class="customcheck"> Obat anastesi disuntikan melalui jarum  atau kateter yang ditempatkan kedalam rongga sumsum tulang belakang atau rongga didekatnya
                        <input type="checkbox" name="tata_cara[]" value="Obat anastesi disuntikan melalui jarum  atau kateter yang ditempatkan kedalam rongga sumsum tulang belakang atau rongga didekatnya">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> Obat anastesi disuntikan kejaringan sekitar saraf melalui kulit
                        <input type="checkbox" name="tata_cara[]" value="Obat anastesi disuntikan kejaringan sekitar saraf melalui kulit">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <br>
                </div>


               

                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Risiko tindakan</b>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <label class="customcheck"> Mual, muntah
                              <input type="checkbox" name="risiko_tindakan[]" value="Mual, Muntah">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Nyeri otot
                              <input type="checkbox" name="risiko_tindakan[]" value="Nyeri otot">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Perubahan tekanan darah
                              <input type="checkbox" name="risiko_tindakan[]" value="Perubahan tekanan darah">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Kelumpuhan
                              <input type="checkbox" name="risiko_tindakan[]" value="Kelumpuhan">
                              <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Infeksi
                              <input type="checkbox" name="risiko_tindakan[]" value="Infeksi">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label class="customcheck"> Penurunan kesadaran
                                <input type="checkbox" name="risiko_tindakan[]" value="Penurunan kesadaran">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Stroke
                                <input type="checkbox" name="risiko_tindakan[]" value="Stroke">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Reaksi alergi
                                <input type="checkbox" name="risiko_tindakan[]" value="Reaksi alergi">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck"> Kematian
                                <input type="checkbox" name="risiko_tindakan[]" value="Kematian">
                                <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>

                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Komplikasi</b>
                    </div>
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="customcheck"> Sakit punggung
                            <input type="checkbox" name="komplikasi[]" value="Sakit punggung">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Kerusakan otak
                            <input type="checkbox" name="komplikasi[]" value="Kerusakan otak">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Kerusakan saraf
                            <input type="checkbox" name="komplikasi[]" value="Kerusakan saraf">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-6">
                          <label class="customcheck"> Serangan jantung
                            <input type="checkbox" name="komplikasi[]" value="Serangan jantung">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Gangguan irama jantung
                            <input type="checkbox" name="komplikasi[]" value="Gangguan irama jantung">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Henti jantung
                            <input type="checkbox" name="komplikasi[]" value="Henti jantung">
                            <span class="checkmark"></span>
                          </label>

                        </div>
                      </div>
                    </div>

                    
                  </div>

                  
                  
                  <br>

                  
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
                  <div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-5">
                        <b>Prognosis</b>
                      </div>
                      <div class="col-md-7">
                        <textarea type="text" name="prognosis" id="prognosis" class="form-control" placeholder="Prognosis"  autocomplete="off"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                  <br>

                <div class="row">
                  <div class="col-md-12">  
                    <div class="row">
                      <div class="col-md-5">
                        <b>Alternatif</b>
                      </div>
                      <div class="col-md-7">
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
                     <div class="col-md-5">
                       <b>Lain lain/ analgetik post operasi</b>
                     </div>
                     <div class="col-md-7">
                       <textarea type="text" name="lain_lain" class="form-control" placeholder="lain_lain"  autocomplete="off"></textarea>
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
                      <div class="col-md-6 text-center"> 
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

   if($('#tyd-ll-value').length > 0){
     let tydValue = $('#tyd-ll-value').val()
     $('#tyd-ll').val(`Lain lain - ${tydValue}`)
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

$('#tyd-ll').click(() => {
  if($('#tyd-ll').is(':checked')){
    $('#tyd-ll-value').removeAttr('style')
    $('#tyd-ll-value').attr('required', 'required')
  }else{
    $('#tyd-ll-value').attr('style', 'display:none')
    $('#tyd-ll-value').removeAttr('required')
    $('#tyd-ll-value').val('')
  }
})



 </script>