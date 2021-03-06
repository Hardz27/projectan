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

    <form id="form-edit-1-<?= $this->router->fetch_class(); ?>">
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
                      <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_dokter'] ? 'selected' : ''; ?>><?= $v['nama'] ?></option>
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
                    <input type="text" name="jam" id="jam" class="form-control" value="<?= $result['jam'] ?>" required autocomplete="off">
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
            <div class="panel-heading">Edit Data Fisioterapi Asesment</div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Nama Pasien</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien"  value="<?=$result['nama_pasien']?>" autocomplete="off">
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
                      <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali"  value="<?=$result['nama_wali']?>" autocomplete="off">
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
                      <input type="text" name="no_mr" id="no_mr" class="form-control" placeholder="No. MR"  value="<?=$result['no_mr']?>" autocomplete="off">
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
                      <input type="text" name="no_identitas" class="form-control" placeholder="no_identitas" value="<?=$result['no_identitas']?>" autocomplete="off">
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
                      <input type="text" name="ttl" id="ttl" class="form-control" placeholder="Tempat. Tgl.Lahir"  value="<?=$result['ttl']?>" autocomplete="off">
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
                      <input type="text" name="usia_wali" id="usia_wali" class="form-control" placeholder="Usia" value="<?=$result['usia_wali']?>" autocomplete="off">
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
                      <b>Usia</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="usia" id="usia" class="form-control" placeholder="Usia" value="<?=$result['usia']?>"  autocomplete="off">
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
                      <input type="text" name="ttl_wali" value="<?=$result['ttl_wali']?>" id="ttl_wali" class="form-control" placeholder="Tgl.Lahir"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <br>
                <div class="row">
                    <div class="col-md-4">
                        <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">L
                        <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin_pasien" <?=$result['jenis_kelamin_pasien'] == "L" ? "checked" : '' ?> value="L" >
                      <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center">P
                      <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin_pasien" <?=$result['jenis_kelamin_pasien'] == "P" ? "checked" : '' ?> value="P" >
                      <span class="checkmark"></span>
                    </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <br>
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Alamat</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="alamat" id="alamat" value="<?=$result['alamat']?>" class="form-control" placeholder="Alamat"  autocomplete="off">
                    </div>
                  </div>

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
                      <input type="radio" name="jenis_kelamin_wali" <?= $result['jenis_kelamin_wali'] == "L" ? "checked" : '' ?> value="L" >
                      <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center">P
                      <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin_wali" <?= $result['jenis_kelamin_wali'] == "P" ? "checked" : '' ?> value="P" >
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
                      <b>Hubungan Wali</b>
                    </div>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-xs-3">
                          <label class="container radio-select">&nbsp;Pasien Sendiri
                            <input type="radio" name="hubungan" <?= $result['hubungan'] == "Pasien Sendiri" ? "checked" : '' ?> value="Pasien Sendiri" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container radio-select">&nbsp;&nbsp;Suami
                            <input type="radio" name="hubungan" <?= $result['hubungan'] == "Suami" ? "checked" : '' ?>  value="Suami" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container radio-select">&nbsp;&nbsp;Istri
                            <input type="radio" name="hubungan" <?= $result['hubungan'] == "Istri" ? "checked" : '' ?>  value="Istri" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-2">
                          <label class="container radio-select">&nbsp;&nbsp;Anak
                            <input type="radio" name="hubungan" <?= $result['hubungan'] == "Anak" ? "checked" : '' ?> value="Anak" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-3">
                          <label class="container radio-select">&nbsp;&nbsp;Orang Tua
                            <input type="radio" name="hubungan" <?= $result['hubungan'] == "Orang Tua" ? "checked" : '' ?> value="Orang Tua" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12">
                          <div class="row">
                             <div class="col-xs-3" style="margin-bottom: 10px;">
                               <label class="container radio-select">&nbsp;&nbsp;Lainnya
                                 <input id="radio_other_hubungan" type="radio" name="hubungan" <?= $result['hubungan'] == "on" ? "checked" : '' ?> required>
                                 <span class="checkmark"></span>
                               </label>
                             </div>
                             <div class="col-xs-8">
                               <input id="text_other_hubungan" type="text" name="desc_hubungan" class="form-control" required placeholder="Sebutkan hubungannya" autocomplete="off" value="<?= $result['hubungan'] == "on" ? $result['desc_hubungan'] : '' ?>" disabled="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>          
              <br>

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
                            <input type="checkbox" name="diagnosis_kerja[]" <?= in_array("Gawat janin", $result['diagnosis_kerja']) ? "checked" : '' ?> value="Gawat janin">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Panggul sempit
                            <input type="checkbox" name="diagnosis_kerja[]" <?= in_array("Panggul sempit", $result['diagnosis_kerja']) ? "checked" : '' ?> value="Panggul sempit">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label class="customcheck"> Plasenta Previa
                            <input type="checkbox" name="diagnosis_kerja[]" <?= in_array("Plasenta Previa", $result['diagnosis_kerja']) ? "checked" : '' ?> value="Plasenta Previa">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Preeklamsi
                            <input type="checkbox" name="diagnosis_kerja[]" <?= in_array("Preeklamsi", $result['diagnosis_kerja']) ? "checked" : '' ?> value="Preeklamsi">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label class="customcheck"> Tumor Jalan Lahir
                            <input type="checkbox" name="diagnosis_kerja[]" <?= in_array("Tumor Jalan Lahir", $result['diagnosis_kerja']) ? "checked" : '' ?> value="Tumor Jalan Lahir">
                            <span class="checkmark"></span>
                          </label>
                          <label class="customcheck"> Riwayat SC
                            <input type="checkbox" name="diagnosis_kerja[]" <?= in_array("Riwayat SC", $result['diagnosis_kerja']) ? "checked" : '' ?> value="Riwayat SC">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-4">
                              <label class="customcheck"> Lain-lain
                                <input type="checkbox" id="check_other_diagnosis" name="diagnosis_kerja[]" <?= in_array("Lain-lain", $result['diagnosis_kerja']) ? "checked" : '' ?> value="Lain-lain">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-md-8">
                              <input type="text" name="desc_lain" id="text_other_diagnosis" class="form-control" value="<?= in_array("Lain-lain", $result['diagnosis_kerja']) ? $result['desc_lain'] : '' ?>" placeholder="Sebutkan keterangan lainnya" disabled autocomplete="off">
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
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("Panggul sempit", $result['indikasi_tindakan']) ? "checked" : '' ?> value="Panggul sempit">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> partus lama
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("partus lama", $result['indikasi_tindakan']) ? "checked" : '' ?> value="partus lama">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> riwayat SC sebelumnya
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("riwayat SC_sebelumnya", $result['indikasi_tindakan']) ? "checked" : '' ?> value="riwayat SC sebelumnya">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> pendarahan antepartum
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("pendarahan antepartum", $result['indikasi_tindakan']) ? "checked" : '' ?> value="pendarahan antepartum">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> tumor jalan lahir
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("tumor jalan_lahir", $result['indikasi_tindakan']) ? "checked" : '' ?> value="tumor jalan lahir">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> preeklamsi
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("preeklamsi", $result['indikasi_tindakan']) ? "checked" : '' ?> value="preeklamsi">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                       Indikasi Janin:
                      <label class="customcheck"> Gawat Janin
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("Gawat Janin", $result['indikasi_tindakan']) ? "checked" : '' ?> value="Gawat Janin">
                        <span class="checkmark"></span>
                      </label>
                      <label class="customcheck"> Mal presentasi kehamilan kembar
                        <input type="checkbox" name="indikasi_tindakan[]" <?= in_array("Mal presentasi kehamilan kembar", $result['indikasi_tindakan']) ? "checked" : '' ?> value="Mal presentasi kehamilan kembar">
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

        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Fisioterapi Asesment</div>
              <div class="panel-body">

                <div class="row">
                  <div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-5">
                        <b>Prognosis</b>
                      </div>
                      <div class="col-md-7">
                        <textarea type="text" name="prognosis" id="prognosis" class="form-control" placeholder="Prognosis"  autocomplete="off"><?=$result['prognosis']?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                  <br>

                <div class="row">
                  <div class="col-md-12">  
                    <div class="row">
                      <!-- nama -->
                      <div class="col-md-5">
                        <b>Alternatif</b>
                      </div>
                      <div class="col-md-7">
                        <textarea type="text" name="alternatif" class="form-control" placeholder="Alternatif"  autocomplete="off"><?=$result['alternatif']?></textarea>
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
                       <textarea type="text" name="lain_lain" class="form-control" placeholder="lain_lain"  autocomplete="off"><?=$result['lain_lain']?></textarea>
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
                          <input type="hidden" name="coretan_wali" value="<?=$result['coretan_wali']?>" id="coretan_wali" >
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
                          <input type="hidden" name="coretan_pasien" value="<?=$result['coretan_pasien']?>"  id="coretan_pasien" required>
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
                          <input type="text" name="saksi" placeholder="Saksi Pihak RS"  value="<?=$result['saksi']?>" class="form-control">
                          <input type="hidden" name="coretan_saksi" value="<?=$result['coretan_saksi']?>"  id="coretan_saksi">
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
      </div> 



    </form>
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

  $('#form-edit-1-<?= $this->router->fetch_class(); ?>').submit(function (e) { 
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
  // update();


// $(document).ready(function(){
//   $("input[type='radio']").click(function(){
//       update();
//   });
// });


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

update();
    
function update() {
  $(document).ready(function(){
      var hubungan = $("input[id='radio_other_hubungan']:checked").length;
      if(hubungan){
          $('#text_other_hubungan').attr("disabled", false);
      }else{
        $('#text_other_hubungan').attr("disabled", true);
        $('#text_other_hubungan').val("");
      }

      var diagnosis = $("input[id='check_other_diagnosis']:checked").length;
      if(diagnosis){
          $('#text_other_diagnosis').attr("disabled", false);
      }else{
        $('#text_other_diagnosis').attr("disabled", true);
        $('#text_other_diagnosis').val("");
      }
  });
}



$(document).ready(function(){
  $("input[type='radio'], input[type='checkbox']").click(function(){
      update();
  });
});
 </script>