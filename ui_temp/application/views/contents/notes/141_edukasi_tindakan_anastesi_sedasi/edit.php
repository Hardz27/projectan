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
    width: 400px; height: 400px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/Human.png");
  }
  #coretan{
    width: 400px; height: 400px;
    border: 0px solid black;
    background-image: url("<?php echo base_url();?>assets/image/Human.png");
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
                      <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" value="<?= $result['nama_pasien'] ?>"  required autocomplete="off">
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
                      <input type="text" name="agama" class="form-control" value="<?= $result['agama'] ?>" required autocomplete="off">
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
                      <input type="text" name="no_mr" id="no_mr" class="form-control" placeholder="No. MR" value="<?= $result['no_mr'] ?>" required autocomplete="off">
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
                      <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="<?= $result['pendidikan'] ?>" required autocomplete="off">
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
                      <input type="text" name="ttl" id="ttl" class="form-control" placeholder="Tempat. Tgl.Lahir" value="<?= $result['ttl'] ?>" required autocomplete="off">
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
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?= $result['pekerjaan'] ?>" required autocomplete="off">
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
                      <input type="text" name="usia" id="usia" class="form-control" placeholder="Usia" value="<?= $result['usia'] ?>" required autocomplete="off">
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
                      <input type="radio" name="jenis_kelamin" value="L" <?= $result['jenis_kelamin'] == 'L' ? 'checked' : ''; ?> required>
                      <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center">P
                      <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin" value="P" <?= $result['jenis_kelamin'] == 'P' ? 'checked' : ''; ?> required>
                      <span class="checkmark"></span>
                    </label>
                    </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">  
              <div class="row">
                <table width="100%">
                  <thead>
                    <tr>
                      <td width="100%" class="text-center bd" colspan="4"><b>Status Pernikahan</b></td>
                    </tr>
                    <tr class="text-center bdu ">
                      <td width="25%" class="bd" ><b>Menikah</b></td>
                      <td width="25%" class="bd"><b>Belum Menikah</b></td>
                      <td width="25%" class="bd"><b>Janda</b></td>
                      <td width="25%" class="bd"><b>Duda</b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center bd ">
                        <label class="container radio-select" style="width: 2%">
                          <input type="radio" name="status_pernikahan" value="menikah" <?= $result['status_pernikahan'] == 'menikah' ? 'checked' : ''; ?> required>
                          <span class="checkmark"></span>
                        </label>
                      </td>
                      <td class="text-center bd">
                        <label class="container radio-select" style="width: 2%">
                          <input type="radio" name="status_pernikahan" value="belum menikah" <?= $result['status_pernikahan'] == 'belum menikah' ? 'checked' : ''; ?> required>
                          <span class="checkmark"></span>
                        </label>
                      </td>
                      <td class="text-center bd">
                        <label class="container radio-select" style="width: 2%">
                          <input type="radio" name="status_pernikahan" value="janda" <?= $result['status_pernikahan'] == 'janda' ? 'checked' : ''; ?> required>
                          <span class="checkmark"></span>
                        </label>
                      </td>
                      <td class="text-center bd">
                        <label class="container radio-select" style="width: 2%">
                          <input type="radio" name="status_pernikahan" value="duda" <?= $result['status_pernikahan'] == 'duda' ? 'checked' : ''; ?> required>
                          <span class="checkmark"></span>
                        </label>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <br><br>
          <div class="row">
              <div class="col-md-12"> 
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-center" ><b>A. Autoanamnesis / Alloanamnesis</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Keluhan Utama</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="keluhan_utama" id="keluhan_utama" class="form-control" placeholder="keluhan utama" required autocomplete="off"><?= $result['keluhan_utama'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Riwayat Penyakit Sekarang</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="riwayat_penyakit_sekarang" class="form-control" placeholder="riwayat penyakit sekarang" required autocomplete="off"><?= $result['riwayat_penyakit_sekarang'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Riwayat Penyakit Dahulu</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="riwayat_penyakit_dahulu" class="form-control" placeholder="riwayat penyakit dahulu" required autocomplete="off"><?= $result['riwayat_penyakit_dahulu'] ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                  
                  <table width="100%">
                      <thead>
                        <tr class="text-center bdu ">
                          <td width="50%" class="bd" ><b>B. Pemeriksaan Fisik & Tanda Vital</b></td>
                          <td width="50%" class="bd"><b>C. Kemampuan Fungsional</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       
                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>TD :</b>
                            </div>
                             <label>
                             <input type="text" name="td" class="form-control" placeholder="mmHg" value="<?= $result['td'] ?>" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-10">
                                <div class="row">
                                  <div class="col-xs-12"> 
                                    <b>1. Tidur/bedrest/gendong</b>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Tidur
                                          <input type="radio" name="tidur_bedrest_gendong" value="tidur" <?= $result['tidur_bedrest_gendong'] == 'tidur' ? 'checked' : ''; ?> required>
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Bedrest
                                          <input type="radio" name="tidur_bedrest_gendong" value="bedrest" <?= $result['tidur_bedrest_gendong'] == 'bedrest' ? 'checked' : ''; ?> required>
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Gendong
                                          <input type="radio" name="tidur_bedrest_gendong" value="gendong" <?= $result['tidur_bedrest_gendong'] == 'gendong' ? 'checked' : ''; ?> required>
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>HR :</b>
                            </div>
                             <label>
                             <input type="text" name="hr" id="hr" class="form-control" placeholder="x/m" value="<?= $result['hr'] ?>" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-10">
                                <div class="row">
                                  <div class="col-xs-12">
                                    
                                    <div class="row">
                                       <div class="col-xs-6"> 
                                        <b>2. Jalan Sendiri</b>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Ya
                                          <input type="radio" name="jalan_sendiri" value="ya" <?= $result['jalan_sendiri'] == 'ya' ? 'checked' : ''; ?> required>
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Tidak
                                          <input type="radio" name="jalan_sendiri" value="tidak" <?= $result['jalan_sendiri'] == 'tidak' ? 'checked' : ''; ?> required>
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-12">
                              <b>RR :</b>
                            </div>
                             <label>
                             <input type="text" name="rr" id="rr" class="form-control" placeholder="x/m" value="<?= $result['rr'] ?>" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-10">
                                <div class="row">
                                  <div class="col-xs-12"> 
                                    
                                    <div class="row">
                                      <div class="col-xs-6"> 
                                        <b>3. Kursi Roda</b>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Ya
                                          <input type="radio" name="kursi_roda" value="ya" <?= $result['kursi_roda'] == 'ya' ? 'checked' : ''; ?> required>
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Tidak
                                          <input type="radio" name="kursi_roda" value="tidak" <?= $result['kursi_roda'] == 'tidak' ? 'checked' : ''; ?> required>
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-left bd ">
                          <div style="width: 25%" class="col-md-12">
                              <b>Suhu :</b>
                            </div>
                             <label>
                             <input type="text" name="suhu" id="suhu" class="form-control" value="<?= $result['suhu']?>" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>4. Alat Bantu</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="alat_bantu" id="alat_bantu" class="form-control" value="<?= $result['alat_bantu'] ?>" placeholder="Alat Bantu" required autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>

                      <tr>
                         <td rowspan="4" class="text-left bd ">
                          <div style="width: 25%" class="col-md-12">
                              <b>Skala Nyeri :</b>
                            </div>
                             <label>
                             <input style="position: relative;, top: 10px;" type="text" name="skala_nyeri" value="<?= $result['skala_nyeri'] ?>" id="skala_nyeri" class="form-control" placeholder="skala nyeri" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>5. Prothesis</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="prothesis" id="prothesis" class="form-control" value="<?= $result['prothesis'] ?>" placeholder="Prothesis" required autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>

                      <tr>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>6. Deformitas</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="deformitas" id="deformitas" class="form-control" value="<?= $result['deformitas'] ?>" placeholder="Deformitas" required autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>7. Resiko Jatuh</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="resiko_jatuh" id="resiko_jatuh" class="form-control" value="<?= $result['resiko_jatuh'] ?>" placeholder="Resiko Jatuh" required autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>
                       <tr>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>8.Lain-lain</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="lainlain" id="lainlain" class="form-control" value="<?= $result['lainlain'] ?>" placeholder="Lain-lain" required autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr> 
                    </tbody>
                  </table>                                      
                </div>
              </div>
            </div>

              <!-- GAMBAR TUBUH DISINI -->

            <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-12">
                      <p class="text-center" ><b>Pemeriksaan Sistemik Khusus</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>a. Muskuloskeletal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_muskuloskeletal" id="pemeriksaan_muskuloskeletal" class="form-control" placeholder="muskuloskeletal" required autocomplete="off"><?= $result['pemeriksaan_muskuloskeletal'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>b. Neuromuskular</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_neuromuskular" class="form-control" placeholder="neuromuskular" required autocomplete="off"><?= $result['pemeriksaan_neuromuskular'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>c. Kardiopulmonal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_kardiopulmonal" class="form-control" placeholder="kardiopulmonal" required autocomplete="off"><?= $result['pemeriksaan_kardiopulmonal'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>d. Integumentum</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_integumentum" class="form-control" placeholder="integumentum" required autocomplete="off"><?= $result['pemeriksaan_integumentum'] ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <br><br>
              <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-12">
                      <p class="text-center" ><b>Pengukuran Khusus</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>a. Muskuloskeletal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_muskuloskeletal" id="muskuloskeletal" class="form-control" placeholder="muskuloskeletal" required autocomplete="off"><?= $result['pengukuran_muskuloskeletal'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>b. Neuromuskular</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_neuromuskular" class="form-control" placeholder="neuromuskular" required autocomplete="off"><?= $result['pengukuran_neuromuskular'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>c. Kardiopulmonal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_kardiopulmonal" class="form-control" placeholder="kardiopulmonal" required autocomplete="off"><?= $result['pengukuran_kardiopulmonal'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>d. Integumentum</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_integumentum" class="form-control" placeholder="integumentum" required autocomplete="off"><?= $result['pengukuran_integumentum'] ?></textarea>
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
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-12">
                      <p class="text-center" ><b>Data Penunjang</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>a. Radiologi</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="radiologi" id="radiologi" class="form-control" placeholder="radiologi" required autocomplete="off"><?= $result['radiologi'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>b. EMG</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="emg" class="form-control" placeholder="emg" required autocomplete="off"><?= $result['emg'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>c. Laboratorium</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="laboratorium" class="form-control" placeholder="laboratorium" required autocomplete="off"><?= $result['laboratorium'] ?></textarea>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>d. Lain-lain</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="lain_lain" class="form-control" placeholder="lain-lain" required autocomplete="off"><?= $result['lain_lain'] ?></textarea>
                    </div>
                  </div>
                </div>
            </div>
              <br><br>

            <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>D. Diagnosis Fisioterapi</b>
                    </div>
                    <div class="col-md-7"> 
                      <textarea type="text" name="diagnosis_fisioterapi" id="diagnosis_fisioterapi" class="form-control" placeholder="" required autocomplete="off"><?= $result['diagnosis_fisioterapi'] ?></textarea>
                    </div>
                  </div>
                  <br>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <div class="col-md-5">
                      <b>E. Program / Rencana Fisioterapi</b>
                    </div>
                    <div class="col-md-7"> 
                      <textarea type="text" name="program_rencana_fisioterapi" id="program_rencana_fisioterapi" class="form-control" placeholder="" required autocomplete="off"><?= $result['program_rencana_fisioterapi'] ?></textarea>
                    </div>
                  </div> 
                  <br>               
                </div>
              </div>


             <br>
            <div class="row">
              <div class="col-md-12"> 
                <div class="row"> 
                  <table width="100%">
                      <thead>
                        <tr class="text-center bd">
                          <td width="100%" class="text-center bd" colspan="4"><b>F. Intervensi</b></td>
                        </tr>
                        <tr class="text-center bdu ">

                          <td width="30%" class="bd" ><b>Tanggal</b></td>
                          <td width="30%" class="bd"><b>Intervensi</b></td>
                          <td width="40%" class="bd"><b>Tempat / Area yang Diterapi</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       
                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>1. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl1" id="tanggal" class="form-control" value="<?= $result['tgl1'] ?>" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi1" id="intervensi" class="form-control" required  autocomplete="off"><?= $result['intervensi1'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi1" id="area_diterapi1" class="form-control" required  autocomplete="off"><?= $result['area_diterapi1'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>2. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl2" id="tanggal" class="form-control" value="<?= $result['tgl2'] ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi2" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi2'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi2" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi2'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>3. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl3" id="tanggal" class="form-control" value="<?= $result['tgl3'] ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi3" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi3'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi3" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi3'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>4. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl4" id="tanggal" class="form-control" value="<?= $result['tgl4'] ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi4" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi4'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi4" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi4'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>5. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl5" id="tanggal" class="form-control" value="<?= $result['tgl5'] ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi5" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi5'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi5" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi5'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>6. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl6" id="tanggal" class="form-control" value="<?= $result['tgl6'] ?>" autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi6" id="intervensi" class="form-control"  autocomplete="off"><?= $result['intervensi6'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi6" id="area_diterapi1" class="form-control"  autocomplete="off"><?= $result['area_diterapi6'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>7. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl7" id="tanggal" class="form-control" value="<?= $result['tgl7'] ?>" autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi7" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi7'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi7" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi7'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>8. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl8" id="tanggal" class="form-control" value="<?= $result['tgl8'] ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi8" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi8'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi8" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi8'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>9. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl9" id="tanggal" class="form-control" value="<?= $result['tgl9'] ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi9" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi9'] ?></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi9" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi9'] ?></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                          <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>10. </b>
                          </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl10" id="tanggal" class="form-control" value="<?= $result['tgl10'] ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi10" id="intervensi" class="form-control"   autocomplete="off"><?= $result['intervensi10'] ?></textarea>
                             </label>
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi10" id="area_diterapi1" class="form-control"   autocomplete="off"><?= $result['area_diterapi10'] ?></textarea>
                             </label>
                          </td>
                      </tr>
                    </tbody>
                  </table>                                      
                </div>
              </div>
            </div>
            <br><br>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <div class="col-md-4">
                      <b>G. Evaluasi</b>
                    </div>
                      <div class="col-md-8"> 
                        <textarea type="text" name="evaluasi" id="evaluasi" class="form-control" placeholder="" required autocomplete="off"><?= $result['evaluasi'] ?></textarea>
                      </div>
                  </div> 
                  <br>               
                </div>
              </div>

            <div class="row">
              <div class="col-md-12"> 
                <div class="row">
                  <div class="col-md-4">
                    <b>Gambar Saat ini :</b>
                  </div>
                <div class="col-md-8">
                <div id="coretan" style=''>
                  <!-- <canvas id="signature-pad" class="signature-pad" width="400px" height="400px"> -->
                  <img src='<?= $result['coretan']; ?>' id='sign_prev' />
                  <input type="hidden" name="prev" id="prev" value="<?= $result['coretan']; ?>">
                </div><br/>
                
                </div>
                </div> 
                <br>               
              </div>

              <div class="col-md-12"> 
                <div class="row">
                  <div class="col-md-4">
                    <b>H. Gambar</b>
                  </div>
                  <div class="col-md-8"> 
                    <!-- Signature -->
                    <div id="signature" style=''>
                      <canvas id="signature-pad" class="signature-pad" width="400px" height="400px">
                    </div><br/>
                     
                    <button type="button" id="undo">Undo</button>
                    <button type="button" id="clear">Clear</button>
                    <input type='hidden' id='generate' name="coretan" value=''><br/>
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


 </script>