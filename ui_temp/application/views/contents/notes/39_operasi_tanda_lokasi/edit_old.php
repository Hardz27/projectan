
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

  /* css signature gambar */

  #signature-bmf{ /* bmf = body_man_front */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_man_front.png");
  }

  #signature-bmb{ /* bmb = body_man_back */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_man_back.png");
  }

  #signature-bwf{ /* bwb = body_woman_back */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_woman_front.png");
  }

  #signature-bwb{ /* bwb = body_woman_back */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_woman_back.png");
  }

  #signature-phkiri{ /* phkiri = palmar_hand_kiri */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_hand_kiri.png");
  }

  #signature-phkanan{ /* phkanan = palmar_hand_kanan */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_hand_kanan.png");
  }

  #signature-dorkanan{ /* dorkanan = dorsal_kanan */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/dorsal_kanan.png");
  }

  #signature-dorkiri{ /* dorkiri = dorsal_kiri */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/dorsal_kiri.png");
  }

  #signature-pfkiri{ /* pfkiri = palmar_feet_kiri */
    width: 200px; height: 400px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_feet_kiri.png");
  }

  #signature-pfkanan{ /* pfkanan = palmar_feet_kanan */
    width: 200px; height: 400px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_feet_kanan.png");
  }

  #signature-pkanan{ /* pkanan = plantar_kanan */
    width: 200px; height: 450px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/plantar_kanan.png");
  }

  #signature-pkiri{ /* pkiri = plantar_kiri */
    width: 200px; height: 450px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/plantar_kiri.png");
  }

  #signature-hb{ /* hb = head_back */
    width: 200px; height: 240px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/head_back.png");
  }

  #signature-hf{ /* hf = head_front */
    width: 200px; height: 240px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/head_front.png");
  }

  #signature-hkanan{ /* hkanan = head_kanan */
    width: 200px; height: 240px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/head_kanan.png");
  }

  #signature-hkiri{ /* hkiri = head_kiri */
    width: 200px; height: 240px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/head_kiri.png");
  }





  .paraf{
    /*width: 100px; height: auto;*/
    /*border: 1px solid black;*/
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
            <div class="col-lg-12 mb-5">
              <div class="btn-group-toggle" data-toggle="buttons">

                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Petugas Approve</b>
                </div>
                <div class="col-md-8">
                  <select name="petugas_approved" class="petugas_approved" style="width: 100%" >
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
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"  autocomplete="off">
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
                    <input type="text" name="jam" id="jam" class="form-control" value="<?= $result['jam']; ?>"  autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

             <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><center>Operasi Tanda Lokasi</center></div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2">
                          <b>Nama Pasien</b>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="nama_pasien" id="nama_pasien" value="<?= $result['nama_pasien']; ?>" class="form-control" placeholder="Nama Pasien"   autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <b>Nama Wali</b>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="nama_wali" id="nama_wali" value="<?= $result['nama_wali']; ?>" class="form-control" placeholder="Nama Wali"   autocomplete="off">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-2">
                          <br>
                          <b>No RM</b>
                        </div>
                        <div class="col-md-4">
                          <br>
                          <input type="text" name="no_rm" id="no_rm" value="<?= $result['no_rm']; ?>" class="form-control" placeholder="No. RM"   autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Usia</b>
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="usia_wali" id="usia_wali" value="<?= $result['usia_wali']; ?>" class="form-control" placeholder="Usia Wali"   autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Jenis Kelamin</b>
                        </div>
                        <div class="col-md-1">
                           <div class="text-center" style="padding-left: 0px"><br>L
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_wali" <?= $result['jenis_kelamin_wali'] == 'L' ? 'checked' : ''; ?> value="L"  >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>P
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_wali" value="P" <?= $result['jenis_kelamin_wali'] == 'P' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-2">
                          <br>
                          <b>Tempat,Tanggal Lahir</b>
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $result['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir"  autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= date('Y-m-d') ?>" value="<?= $result['tanggal_lahir']; ?>"   autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <br>
                          <b>Hubungan</b>
                        </div>
                        <div class="col-md-4">
                          <br>
                          <input type="text" name="hubungan_wali" id="hubungan_wali" value="<?= $result['hubungan_wali']; ?>" class="form-control" placeholder="Hubungan Wali"   autocomplete="off">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-1">
                          <br>
                          <b>Usia</b>
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="usia_pasien" id="usia_pasien" value="<?= $result['usia_pasien']; ?>" class="form-control" placeholder="Usia Pasien"   autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Jenis Kelamin</b>
                        </div>
                        <div class="col-md-1">
                           <div class="text-center" style="padding-left: 0px"><br>L
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_pasien" <?= $result['jenis_kelamin_pasien'] == 'L' ? 'checked' : ''; ?> value="L"  >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>P
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_pasien" value="P" <?= $result['jenis_kelamin_pasien'] == 'P' ? 'checked' : ''; ?>  >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          <div class="row">
            <div class="col-md-6">

              <div class="panel panel-primary">
                <div class="panel-heading">Tambah Data Operasi Tanda Lokasi</div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-12"> 
                      <div class="row">
                        <div class="col-md-12">
                          <b>Anamnesis :</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><br>
                          <textarea style="height: 100px" type="text" name="anamnesis" id="anamnesis" class="form-control" placeholder="Anamnesis"   autocomplete="off"><?= $result['anamnesis']; ?></textarea>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12"> 
                      <div class="row">
                        <div class="col-md-12">
                          <b>Pemeriksaan Fisik :</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><br>
                          <textarea style="height: 100px" type="text" name="pemeriksaan_fisik" id="pemeriksaan_fisik" class="form-control" placeholder="Pemeriksaan Fisik"   autocomplete="off"><?= $result['pemeriksaan_fisik']; ?></textarea>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12"> 
                      <div class="row">
                        <div class="col-md-12">
                          <b>Catatan alergi :</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><br>
                          <textarea style="height: 100px" type="text" name="catatan_alergi" id="catatan_alergi" class="form-control" placeholder="Catatan Alergi"   autocomplete="off"><?= $result['catatan_alergi']; ?></textarea>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12"> 
                      <div class="row">
                        <div class="col-md-12">
                          <b>Diagnosa Praoperasi :</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><br>
                          <textarea style="height: 100px" type="text" name="diagnosa_praoperasi" id="diagnosa_praoperasi" class="form-control" placeholder="Diagnosa Praoperasi"   autocomplete="off"><?= $result['diagnosa_praoperasi']; ?></textarea>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12"> 
                      <div class="row">
                        <div class="col-md-12">
                          <b>Rencana Operasi :</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><br>
                          <textarea style="height: 100px" type="text" name="rencana_operasi" id="rencana_operasi" class="form-control" placeholder="Rencana Operasi"   autocomplete="off"><?= $result['rencana_operasi']; ?></textarea>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12"> 
                      <div class="row">
                        <div class="col-md-12">
                          <b>Estimasi Waktu :</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><br>
                          <input type="text" name="estimasi_waktu" id="estimasi_waktu" value="<?= $result['estimasi_waktu']; ?>" class="form-control" placeholder="Estimasi Waktu"   autocomplete="off">
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12"> 
                      <div class="row">
                        <div class="col-md-12">
                          <b>Premedikasi :</b>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12"><br>
                         <textarea style="height: 100px" type="text" name="premedikasi" id="premedikasi" class="form-control" placeholder="Premedikasi"   autocomplete="off"><?= $result['premedikasi']; ?></textarea>
                       </div>
                     </div>
                     <br>
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-md-12">  
                  </div>
                </div>
                <br><br>
              </div>
            </div>


            <div class="panel panel-primary">
              <div class="panel-body">

                <div class="row">
                  <div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-6 text-center">
                        <b>Dokter Operator</b>
                        <!-- Signature -->
                        <center>
                          <div class="signature">
                            <canvas id="signature-pad-dokter-operator" class="signature-pad-dokter-operator" width="200px" height="200px">
                            </div>
                          </center>
                          <br/>

                          <button type="button" id="undo_dokter_operator">Undo</button>
                          <button type="button" id="clear_dokter_operator">Clear</button>
                          <input type="hidden" id="prev_dokter_operator" value="<?= $result['coretan_dokter_operator']; ?>">
                          <input type='hidden' id='generate_dokter_operator' name="coretan_dokter_operator" value=''  ><br/>
                        </div>
                        <div class="col-md-6 text-center"> 
                          <b>Perawat Ruang Rawat Inap</b>
                          <!-- Signature -->
                          <center>
                            <div class="signature">
                              <canvas id="signature-pad-perawat_ruang_rawat_inap" class="signature-pad-perawat_ruang_rawat_inap" width="200px" height="200px">
                              </div>
                            </center>
                            <br/>

                            <button type="button" id="undo_perawat_ruang_rawat_inap">Undo</button>
                            <button type="button" id="clear_perawat_ruang_rawat_inap">Clear</button>
                            <input type="hidden" id="prev_coretan_perawat_ruang_rawat_inap" value="<?= $result['coretan_perawat_ruang_rawat_inap']; ?>">
                            <input type='hidden' id='generate_perawat_ruang_rawat_inap' name="coretan_perawat_ruang_rawat_inap" value=''  ><br/>
                          </div>
                          <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                            <input type="text" name="nama_dokter_operator" value="<?= $result['nama_dokter_operator']; ?>" class="form-control" placeholder="Nama Dokter Operator"   autocomplete="off">
                          </div>
                          <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                            <input type="text" name="nama_perawat_ruang_rawat_inap" value="<?= $result['nama_perawat_ruang_rawat_inap']; ?>" class="form-control" placeholder="Nama Perawat R.Rawat Inap"   autocomplete="off">
                          </div>
                          <br><br>
                          <div class="col-md-12 text-center"> 
                            <b>Perawat Ruang OK</b>
                            <!-- Signature -->
                            <center>
                              <div class="signature">
                                <canvas id="signature-pad-perawat_ruang_ok" class="signature-pad-perawat_ruang_ok" width="200px" height="200px">
                                </div>
                              </center>
                              <br/>

                              <button type="button" id="undo_perawat_ruang_ok">Undo</button>
                              <button type="button" id="clear_perawat_ruang_ok">Clear</button>
                              <input type="hidden" id="prev_coretan_perawat_ruang_ok" value="<?= $result['coretan_perawat_ruang_ok']; ?>">
                              <input type='hidden' id='generate_perawat_ruang_ok' name="coretan_perawat_ruang_ok" value=''  ><br/>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                              <input type="text" name="nama_perawat_ruang_ok" value="<?= $result['nama_perawat_ruang_ok']; ?>" class="form-control" placeholder="Perawat Ruang OK"   autocomplete="off">
                            </div>
                            <div class="col-md-3"></div>
                          </div> 
                          <br>               
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Tambah Data Operasi Tanda Lokasi</div>
                      <div class="panel-body">

                        <div class="row">
                          <table width="100%">
                            <tr>
                              <td class="text-center bd" colspan="3"><b>Checklist Dokumen</b></td>
                            </tr>

                            <tr>
                              <td width="40%" class="text-center bd"><b>Jenis Persiapan</b></td>
                              <td width="30%" class="text-center bd"><b>Perawat Ruangan</b></td>
                              <td width="30%" class="text-center bd"><b>Perawat OK</b></td>
                            </tr>

                            <tr>
                              <?php $no = 1; ?>
                              <td class="bd text-left"><?= $no ?>.Rekam Medik Pasien</td>
                              <td class="bd text-left">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="text-center" style="padding-left: 0px"><br>
                                      <label class="container radio-select" style="width: 2%">
                                        <input type="radio" name="ruangan_rekam_medik_pasien" value="ada" <?= $result['ruangan_rekam_medik_pasien'] == 'ada' ? 'checked' : ''; ?>  >
                                        <span class="checkmark"></span>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <br>
                                    Ada
                                  </div>
                                  <div class="col-md-3">
                                    <div class="text-center" style="padding-left: 0px"><br>
                                      <label class="container radio-select" style="width: 2%">
                                        <input type="radio" name="ruangan_rekam_medik_pasien" value="tdk" <?= $result['ruangan_rekam_medik_pasien'] == 'ada' ? 'checked' : ''; ?>  >
                                        <span class="checkmark"></span>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <br>
                                    Tdk
                                  </div>
                                </td>
                                <td class="bd text-left">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="text-center" style="padding-left: 0px"><br>
                                        <label class="container radio-select" style="width: 2%">
                                          <input type="radio" name="ok_rekam_medik_pasien" value="ada" <?= $result['ok_rekam_medik_pasien'] == 'ada' ? 'checked' : ''; ?>  >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <br>
                                      Ada
                                    </div>
                                    <div class="col-md-3">
                                      <div class="text-center" style="padding-left: 0px"><br>
                                        <label class="container radio-select" style="width: 2%">
                                          <input type="radio" name="ok_rekam_medik_pasien" value="tdk" <?= $result['ok_rekam_medik_pasien'] == 'tdk' ? 'checked' : ''; ?>  >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <br>
                                      Tdk
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td class="bd text-left"><?= ++$no ?>.Informed consent operasi</td>
                                  <td class="bd text-left">
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div class="text-center" style="padding-left: 0px"><br>
                                          <label class="container radio-select" style="width: 2%">
                                            <input type="radio" name="ruangan_informed_consent_operasi" value="ada" <?= $result['ruangan_informed_consent_operasi'] == 'ada' ? 'checked' : ''; ?>  >
                                            <span class="checkmark"></span>
                                          </label>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <br>
                                        Ada
                                      </div>
                                      <div class="col-md-3">
                                        <div class="text-center" style="padding-left: 0px"><br>
                                          <label class="container radio-select" style="width: 2%">
                                            <input type="radio" name="ruangan_informed_consent_operasi" value="tdk" <?= $result['ruangan_informed_consent_operasi'] == 'tdk' ? 'checked' : ''; ?>  >
                                            <span class="checkmark"></span>
                                          </label>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <br>
                                        Tdk
                                      </div>
                                    </td>
                                    <td class="bd text-left">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="text-center" style="padding-left: 0px"><br>
                                            <label class="container radio-select" style="width: 2%">
                                              <input type="radio" name="ok_informed_consent_operasi" value="ada" <?= $result['ok_informed_consent_operasi'] == 'ada' ? 'checked' : ''; ?>  >
                                              <span class="checkmark"></span>
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <br>
                                          Ada
                                        </div>
                                        <div class="col-md-3">
                                          <div class="text-center" style="padding-left: 0px"><br>
                                            <label class="container radio-select" style="width: 2%">
                                              <input type="radio" name="ok_informed_consent_operasi" value="tdk" <?= $result['ok_informed_consent_operasi'] == 'tdk' ? 'checked' : ''; ?>  >
                                              <span class="checkmark"></span>
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <br>
                                          Tdk
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="bd text-left"><?= ++$no ?>.Informed consent anestesi</td>
                                      <td class="bd text-left">
                                        <div class="row">
                                          <div class="col-md-3">
                                            <div class="text-center" style="padding-left: 0px"><br>
                                              <label class="container radio-select" style="width: 2%">
                                                <input type="radio" name="ruangan_informed_consent_anestesi" value="ada" <?= $result['ruangan_informed_consent_anestesi'] == 'ada' ? 'checked' : ''; ?>  >
                                                <span class="checkmark"></span>
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <br>
                                            Ada
                                          </div>
                                          <div class="col-md-3">
                                            <div class="text-center" style="padding-left: 0px"><br>
                                              <label class="container radio-select" style="width: 2%">
                                                <input type="radio" name="ruangan_informed_consent_anestesi" value="tdk" <?= $result['ruangan_informed_consent_anestesi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                <span class="checkmark"></span>
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <br>
                                            Tdk
                                          </div>
                                        </td>
                                        <td class="bd text-left">
                                          <div class="row">
                                            <div class="col-md-3">
                                              <div class="text-center" style="padding-left: 0px"><br>
                                                <label class="container radio-select" style="width: 2%">
                                                  <input type="radio" name="ok_informed_consent_anestesi" value="ada" <?= $result['ok_informed_consent_anestesi'] == 'ada' ? 'checked' : ''; ?>  >
                                                  <span class="checkmark"></span>
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <br>
                                              Ada
                                            </div>
                                            <div class="col-md-3">
                                              <div class="text-center" style="padding-left: 0px"><br>
                                                <label class="container radio-select" style="width: 2%">
                                                  <input type="radio" name="ok_informed_consent_anestesi" value="tdk" <?= $result['ok_informed_consent_anestesi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                  <span class="checkmark"></span>
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <br>
                                              Tdk
                                            </div>
                                          </td>
                                        </tr>

                                        <tr>
                                          <td class="bd text-left"><?= ++$no ?>.Hasil Laboratorium</td>
                                          <td class="bd text-left">
                                            <div class="row">
                                              <div class="col-md-3">
                                                <div class="text-center" style="padding-left: 0px"><br>
                                                  <label class="container radio-select" style="width: 2%">
                                                    <input type="radio" name="ruangan_hasil_laboratorium" value="ada" <?= $result['ruangan_hasil_laboratorium'] == 'ada' ? 'checked' : ''; ?>  >
                                                    <span class="checkmark"></span>
                                                  </label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <br>
                                                Ada
                                              </div>
                                              <div class="col-md-3">
                                                <div class="text-center" style="padding-left: 0px"><br>
                                                  <label class="container radio-select" style="width: 2%">
                                                    <input type="radio" name="ruangan_hasil_laboratorium" value="tdk" <?= $result['ruangan_hasil_laboratorium'] == 'tdk' ? 'checked' : ''; ?>  >
                                                    <span class="checkmark"></span>
                                                  </label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <br>
                                                Tdk
                                              </div>
                                            </td>
                                            <td class="bd text-left">
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <div class="text-center" style="padding-left: 0px"><br>
                                                    <label class="container radio-select" style="width: 2%">
                                                      <input type="radio" name="ok_hasil_laboratorium" value="ada" <?= $result['ok_hasil_laboratorium'] == 'ada' ? 'checked' : ''; ?>  >
                                                      <span class="checkmark"></span>
                                                    </label>
                                                  </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <br>
                                                  Ada
                                                </div>
                                                <div class="col-md-3">
                                                  <div class="text-center" style="padding-left: 0px"><br>
                                                    <label class="container radio-select" style="width: 2%">
                                                      <input type="radio" name="ok_hasil_laboratorium" value="tdk" <?= $result['ok_hasil_laboratorium'] == 'tdk' ? 'checked' : ''; ?>  >
                                                      <span class="checkmark"></span>
                                                    </label>
                                                  </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <br>
                                                  Tdk
                                                </div>
                                              </td>
                                            </tr>

                                            <tr>
                                              <td class="bd text-left"><?= ++$no ?>.Hasil Radiologi / USG</td>
                                              <td class="bd text-left">
                                                <div class="row">
                                                  <div class="col-md-3">
                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                      <label class="container radio-select" style="width: 2%">
                                                        <input type="radio" name="ruangan_hasil_radiologi" value="ada" <?= $result['ruangan_hasil_radiologi'] == 'ada' ? 'checked' : ''; ?>  >
                                                        <span class="checkmark"></span>
                                                      </label>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <br>
                                                    Ada
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                      <label class="container radio-select" style="width: 2%">
                                                        <input type="radio" name="ruangan_hasil_radiologi" value="tdk" <?= $result['ruangan_hasil_radiologi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                        <span class="checkmark"></span>
                                                      </label>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <br>
                                                    Tdk
                                                  </div>
                                                </td>
                                                <td class="bd text-left">
                                                  <div class="row">
                                                    <div class="col-md-3">
                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                        <label class="container radio-select" style="width: 2%">
                                                          <input type="radio" name="ok_hasil_radiologi" value="ada" <?= $result['ok_hasil_radiologi'] == 'ada' ? 'checked' : ''; ?>  >
                                                          <span class="checkmark"></span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <br>
                                                      Ada
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                        <label class="container radio-select" style="width: 2%">
                                                          <input type="radio" name="ok_hasil_radiologi" value="tdk" <?= $result['ok_hasil_radiologi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                          <span class="checkmark"></span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <br>
                                                      Tdk
                                                    </div>
                                                  </td>
                                                </tr>

                                                <tr>
                                                  <td class="bd text-left"><?= ++$no ?>.Hasil EKG</td>
                                                  <td class="bd text-left">
                                                    <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="text-center" style="padding-left: 0px"><br>
                                                          <label class="container radio-select" style="width: 2%">
                                                            <input type="radio" name="ruangan_hasil_ekg" value="ada" <?= $result['ruangan_hasil_ekg'] == 'ada' ? 'checked' : ''; ?>  >
                                                            <span class="checkmark"></span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <br>
                                                        Ada
                                                      </div>
                                                      <div class="col-md-3">
                                                        <div class="text-center" style="padding-left: 0px"><br>
                                                          <label class="container radio-select" style="width: 2%">
                                                            <input type="radio" name="ruangan_hasil_ekg" value="tdk" <?= $result['ruangan_hasil_ekg'] == 'tdk' ? 'checked' : ''; ?>  >
                                                            <span class="checkmark"></span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <br>
                                                        Tdk
                                                      </div>
                                                    </td>
                                                    <td class="bd text-left">
                                                      <div class="row">
                                                        <div class="col-md-3">
                                                          <div class="text-center" style="padding-left: 0px"><br>
                                                            <label class="container radio-select" style="width: 2%">
                                                              <input type="radio" name="ok_hasil_ekg" value="ada" <?= $result['ok_hasil_ekg'] == 'ada' ? 'checked' : ''; ?>  >
                                                              <span class="checkmark"></span>
                                                            </label>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                          <br>
                                                          Ada
                                                        </div>
                                                        <div class="col-md-3">
                                                          <div class="text-center" style="padding-left: 0px"><br>
                                                            <label class="container radio-select" style="width: 2%">
                                                              <input type="radio" name="ok_hasil_ekg" value="tdk" <?= $result['ok_hasil_ekg'] == 'tdk' ? 'checked' : ''; ?>  >
                                                              <span class="checkmark"></span>
                                                            </label>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                          <br>
                                                          Tdk
                                                        </div>
                                                      </td>
                                                    </tr>

                                                    <tr>
                                                      <td class="bd text-left"><?= ++$no ?>.Hasil CTG</td>
                                                      <td class="bd text-left">
                                                        <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="text-center" style="padding-left: 0px"><br>
                                                              <label class="container radio-select" style="width: 2%">
                                                                <input type="radio" name="ruangan_hasil_ctg" value="ada" <?= $result['ruangan_hasil_ctg'] == 'ada' ? 'checked' : ''; ?>  >
                                                                <span class="checkmark"></span>
                                                              </label>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                            <br>
                                                            Ada
                                                          </div>
                                                          <div class="col-md-3">
                                                            <div class="text-center" style="padding-left: 0px"><br>
                                                              <label class="container radio-select" style="width: 2%">
                                                                <input type="radio" name="ruangan_hasil_ctg" value="tdk" <?= $result['ruangan_hasil_ctg'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                <span class="checkmark"></span>
                                                              </label>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-3">
                                                            <br>
                                                            Tdk
                                                          </div>
                                                        </td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ok_hasil_ctg" value="ada" <?= $result['ok_hasil_ctg'] == 'ada' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ada
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ok_hasil_ctg" value="tdk" <?= $result['ok_hasil_ctg'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                        </tr>

                                                        

                                                        <tr>
                                                          <td class="bd text-left"><?= ++$no ?>.Daftar terapi yang sudah diberikan</td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ruangan_daftar_terapi" value="ada" <?= $result['ruangan_daftar_terapi'] == 'ada' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ada
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ruangan_daftar_terapi" value="tdk" <?= $result['ruangan_daftar_terapi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                            <td class="bd text-left">
                                                              <div class="row">
                                                                <div class="col-md-3">
                                                                  <div class="text-center" style="padding-left: 0px"><br>
                                                                    <label class="container radio-select" style="width: 2%">
                                                                      <input type="radio" name="ok_daftar_terapi" value="ada" <?= $result['ok_daftar_terapi'] == 'ada' ? 'checked' : ''; ?>  >
                                                                      <span class="checkmark"></span>
                                                                    </label>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                  <br>
                                                                  Ada
                                                                </div>
                                                                <div class="col-md-3">
                                                                  <div class="text-center" style="padding-left: 0px"><br>
                                                                    <label class="container radio-select" style="width: 2%">
                                                                      <input type="radio" name="ok_daftar_terapi" value="tdk" <?= $result['ok_daftar_terapi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                      <span class="checkmark"></span>
                                                                    </label>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                  <br>
                                                                  Tdk
                                                                </div>
                                                              </td>
                                                            </tr>

                                                            <tr>
                                                              <td class="bd text-left"><?= ++$no ?>.Catatan Keperawatan</td>
                                                              <td class="bd text-left">
                                                                <div class="row">
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_catatan_keperawatan" value="ada" <?= $result['ruangan_catatan_keperawatan'] == 'ada' ? 'checked' : ''; ?>  >
                                                                        <span class="checkmark"></span>
                                                                      </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <br>
                                                                    Ada
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_catatan_keperawatan" value="tdk" <?= $result['ruangan_catatan_keperawatan'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                        <span class="checkmark"></span>
                                                                      </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <br>
                                                                    Tdk
                                                                  </div>
                                                                </td>
                                                                <td class="bd text-left">
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                                        <label class="container radio-select" style="width: 2%">
                                                                          <input type="radio" name="ok_catatan_keperawatan" value="ada" <?= $result['ok_catatan_keperawatan'] == 'ada' ? 'checked' : ''; ?>  >
                                                                          <span class="checkmark"></span>
                                                                        </label>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <br>
                                                                      Ada
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                                        <label class="container radio-select" style="width: 2%">
                                                                          <input type="radio" name="ok_catatan_keperawatan" value="tdk" <?= $result['ok_catatan_keperawatan'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                          <span class="checkmark"></span>
                                                                        </label>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <br>
                                                                      Tdk
                                                                    </div>
                                                                  </td>
                                                                </tr>

                                                                <tr>
                                                                  <td class="text-center bd" colspan="3"><b>Checklist Pasien</b></td>
                                                                </tr>

                                                                <tr>
                                                                  <td width="40%" class="text-center bd"><b>Jenis Persiapan</b></td>
                                                                  <td width="30%" class="text-center bd"><b>Perawat Ruangan</b></td>
                                                                  <td width="30%" class="text-center bd"><b>Perawat OK</b></td>
                                                                </tr>

                                                                <tr>
                                                                  <?php $no = 1; ?>
                                                                  <td class="bd text-left"><?= $no ?>.Periksa Keadaan Umum</td>
                                                                  <td class="bd text-left">
                                                                    <div class="row">
                                                                      <div class="col-md-3">
                                                                        <div class="text-center" style="padding-left: 0px"><br>
                                                                          <label class="container radio-select" style="width: 2%">
                                                                            <input type="radio" name="ruangan_periksa_keadaan_umum" value="ya" <?= $result['ruangan_periksa_keadaan_umum'] == 'ya' ? 'checked' : ''; ?>  >
                                                                            <span class="checkmark"></span>
                                                                          </label>
                                                                        </div>
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                        <br>
                                                                        Ya
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                        <div class="text-center" style="padding-left: 0px"><br>
                                                                          <label class="container radio-select" style="width: 2%">
                                                                            <input type="radio" name="ruangan_periksa_keadaan_umum" value="tdk" <?= $result['ruangan_periksa_keadaan_umum'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                            <span class="checkmark"></span>
                                                                          </label>
                                                                        </div>
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                        <br>
                                                                        Tdk
                                                                      </div>
                                                                    </td>
                                                                    <td class="bd text-left">
                                                                      <div class="row">
                                                                        <div class="col-md-3">
                                                                          <div class="text-center" style="padding-left: 0px"><br>
                                                                            <label class="container radio-select" style="width: 2%">
                                                                              <input type="radio" name="ok_periksa_keadaan_umum" value="ya" <?= $result['ok_periksa_keadaan_umum'] == 'ya' ? 'checked' : ''; ?>  >
                                                                              <span class="checkmark"></span>
                                                                            </label>
                                                                          </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                          <br>
                                                                          Ya
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                          <div class="text-center" style="padding-left: 0px"><br>
                                                                            <label class="container radio-select" style="width: 2%">
                                                                              <input type="radio" name="ok_periksa_keadaan_umum" value="tdk" <?= $result['ok_periksa_keadaan_umum'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                              <span class="checkmark"></span>
                                                                            </label>
                                                                          </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                          <br>
                                                                          Tdk
                                                                        </div>
                                                                      </td>
                                                                    </tr>

                                                        <tr>
                                                          <td class="bd text-left"><?= ++$no ?>.Periksa vital sign</td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ruangan_periksa_vital_sign" value="ya" <?= $result['ruangan_periksa_vital_sign'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ruangan_periksa_vital_sign" value="tdk" <?= $result['ruangan_periksa_vital_sign'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                            <td class="bd text-left">
                                                              <div class="row">
                                                                <div class="col-md-3">
                                                                  <div class="text-center" style="padding-left: 0px"><br>
                                                                    <label class="container radio-select" style="width: 2%">
                                                                      <input type="radio" name="ok_periksa_vital_sign" value="ya" <?= $result['ok_periksa_vital_sign'] == 'ya' ? 'checked' : ''; ?>  >
                                                                      <span class="checkmark"></span>
                                                                    </label>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                  <br>
                                                                  Ya
                                                                </div>
                                                                <div class="col-md-3">
                                                                  <div class="text-center" style="padding-left: 0px"><br>
                                                                    <label class="container radio-select" style="width: 2%">
                                                                      <input type="radio" name="ok_periksa_vital_sign" value="tdk" <?= $result['ok_periksa_vital_sign'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                      <span class="checkmark"></span>
                                                                    </label>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                  <br>
                                                                  Tdk
                                                                </div>
                                                              </td>
                                                            </tr>

                                                            <tr>
                                                              <td class="bd text-left"><?= ++$no ?>.Gelang Identitas</td>
                                                              <td class="bd text-left">
                                                                <div class="row">
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_gelang_identitas" value="ya" <?= $result['ruangan_gelang_identitas'] == 'ya' ? 'checked' : ''; ?>  >
                                                                        <span class="checkmark"></span>
                                                                      </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <br>
                                                                    Ya
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_gelang_identitas" value="tdk" <?= $result['ruangan_gelang_identitas'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                        <span class="checkmark"></span>
                                                                      </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <br>
                                                                    Tdk
                                                                  </div>
                                                                </td>
                                                                <td class="bd text-left">
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                                        <label class="container radio-select" style="width: 2%">
                                                                          <input type="radio" name="ok_gelang_identitas" value="ya" <?= $result['ok_gelang_identitas'] == 'ya' ? 'checked' : ''; ?>  >
                                                                          <span class="checkmark"></span>
                                                                        </label>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <br>
                                                                      Ya
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                                        <label class="container radio-select" style="width: 2%">
                                                                          <input type="radio" name="ok_gelang_identitas" value="tdk" <?= $result['ok_gelang_identitas'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                          <span class="checkmark"></span>
                                                                        </label>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <br>
                                                                      Tdk
                                                                    </div>
                                                                  </td>
                                                                </tr>

                                                                <tr>
                                                                  <td class="bd text-left"><?= ++$no ?>.Identifikasi alergi</td>
                                                                  <td class="bd text-left">
                                                                    <div class="row">
                                                                      <div class="col-md-3">
                                                                        <div class="text-center" style="padding-left: 0px"><br>
                                                                          <label class="container radio-select" style="width: 2%">
                                                                            <input type="radio" name="ruangan_identifikasi_alergi" value="ya" <?= $result['ruangan_identifikasi_alergi'] == 'ya' ? 'checked' : ''; ?>  >
                                                                            <span class="checkmark"></span>
                                                                          </label>
                                                                        </div>
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                        <br>
                                                                        Ya
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                        <div class="text-center" style="padding-left: 0px"><br>
                                                                          <label class="container radio-select" style="width: 2%">
                                                                            <input type="radio" name="ruangan_identifikasi_alergi" value="tdk" <?= $result['ruangan_identifikasi_alergi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                            <span class="checkmark"></span>
                                                                          </label>
                                                                        </div>
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                        <br>
                                                                        Tdk
                                                                      </div>
                                                                    </td>
                                                                    <td class="bd text-left">
                                                                      <div class="row">
                                                                        <div class="col-md-3">
                                                                          <div class="text-center" style="padding-left: 0px"><br>
                                                                            <label class="container radio-select" style="width: 2%">
                                                                              <input type="radio" name="ok_identifikasi_alergi" value="ya" <?= $result['ok_identifikasi_alergi'] == 'ya' ? 'checked' : ''; ?>  >
                                                                              <span class="checkmark"></span>
                                                                            </label>
                                                                          </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                          <br>
                                                                          Ya
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                          <div class="text-center" style="padding-left: 0px"><br>
                                                                            <label class="container radio-select" style="width: 2%">
                                                                              <input type="radio" name="ok_identifikasi_alergi" value="tdk" <?= $result['ok_identifikasi_alergi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                              <span class="checkmark"></span>
                                                                            </label>
                                                                          </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                          <br>
                                                                          Tdk
                                                                        </div>
                                                                      </td>
                                                                    </tr>

                                                          <tr>
                                                            <td class="bd text-left">
                                                              <div class="row">
                                                                <div class="col-md-6">
                                                                  <?= ++$no ?>.Puasa Jam
                                                                </div>
                                                                <div class="col-md-6">                           
                                                                  <input style="width: 100px" type="text" name="desc_puasa" id="puasa" class="form-control" value="<?= $result['desc_puasa']; ?>" placeholder="puasa jam"   autocomplete="off">
                                                                </div>
                                                              </td>
                                                              <td class="bd text-left">
                                                                <div class="row">
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_puasa" value="ya" <?= $result['ruangan_puasa'] == 'ya' ? 'checked' : ''; ?>  >
                                                                        <span class="checkmark"></span>
                                                                      </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <br>
                                                                    Ya
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_puasa" value="tdk" <?= $result['ruangan_puasa'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                        <span class="checkmark"></span>
                                                                      </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                    <br>
                                                                    Tdk
                                                                  </div>
                                                                </td>
                                                                <td class="bd text-left">
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                                        <label class="container radio-select" style="width: 2%">
                                                                          <input type="radio" name="ok_puasa" value="ya" <?= $result['ok_puasa'] == 'ya' ? 'checked' : ''; ?>  >
                                                                          <span class="checkmark"></span>
                                                                        </label>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <br>
                                                                      Ya
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <div class="text-center" style="padding-left: 0px"><br>
                                                                        <label class="container radio-select" style="width: 2%">
                                                                          <input type="radio" name="ok_puasa" value="tdk" <?= $result['ok_puasa'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                          <span class="checkmark"></span>
                                                                        </label>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                      <br>
                                                                      Tdk
                                                                    </div>
                                                                  </td>
                                                                </tr>

                                                      <tr>
                                                        <td class="bd text-left"><?= ++$no ?>.Mandi</td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_mandi" value="ya" <?= $result['ruangan_mandi'] == 'ya' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ya
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_mandi" value="tdk" <?= $result['ruangan_mandi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_mandi" value="ya" <?= $result['ok_mandi'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_mandi" value="tdk" <?= $result['ok_mandi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                          </tr>

                                                      <tr>
                                                        <td class="bd text-left"><?= ++$no ?>.Oral Hygiene</td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_oral" value="ya" <?= $result['ruangan_oral'] == 'ya' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ya
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_oral" value="tdk" <?= $result['ruangan_oral'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_oral" value="ya" <?= $result['ok_oral'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_oral" value="tdk" <?= $result['ok_oral'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                          </tr>

                                                      <tr>
                                                        <td class="bd text-left"><?= ++$no ?>.Cukur daerah operasi</td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_cukur_daerah_operasi" value="ya" <?= $result['ruangan_cukur_daerah_operasi'] == 'ya' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ya
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_cukur_daerah_operasi" value="tdk" <?= $result['ruangan_cukur_daerah_operasi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_cukur_daerah_operasi" value="ya" <?= $result['ok_cukur_daerah_operasi'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_cukur_daerah_operasi" value="tdk" <?= $result['ok_cukur_daerah_operasi'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                          </tr>

                                                      <tr>
                                                        <td class="bd text-left"><?= ++$no ?>.Hapus make-up</td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_make_up" value="ya" <?= $result['ruangan_make_up'] == 'ya' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ya
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_make_up" value="tdk" <?= $result['ruangan_make_up'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_make_up" value="ya" <?= $result['ok_make_up'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_make_up" value="tdk" <?= $result['ok_make_up'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                          </tr>

                                                      <tr>
                                                        <td class="bd text-left"><?= ++$no ?>.Lepas Aksesoris</td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_lepas_aksesoris" value="ya" <?= $result['ruangan_lepas_aksesoris'] == 'ya' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ya
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_lepas_aksesoris" value="tdk" <?= $result['ruangan_lepas_aksesoris'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_lepas_aksesoris" value="ya" <?= $result['ok_lepas_aksesoris'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_lepas_aksesoris" value="tdk" <?= $result['ok_lepas_aksesoris'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                          </tr>

                                                      <tr>
                                                        <td class="bd text-left"><?= ++$no ?>.Lepas Alat Bantu (ABD,gigi palsu,soft lenses)</td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_lepas_alat_bantu" value="ya" <?= $result['ruangan_lepas_alat_bantu'] == 'ya' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ya
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_lepas_alat_bantu" value="tdk" <?= $result['ruangan_lepas_alat_bantu'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_lepas_alat_bantu" value="ya" <?= $result['ok_lepas_alat_bantu'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_lepas_alat_bantu" value="tdk" <?= $result['ok_lepas_alat_bantu'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                          </tr>

                                                      <tr>
                                                        <td class="bd text-left"><?= ++$no ?>.Pemasangan IV Line</td>
                                                        <td class="bd text-left">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_pemasangan_iv_line" value="ya" <?= $result['ruangan_pemasangan_iv_line'] == 'ya' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Ya
                                                            </div>
                                                            <div class="col-md-3">
                                                              <div class="text-center" style="padding-left: 0px"><br>
                                                                <label class="container radio-select" style="width: 2%">
                                                                  <input type="radio" name="ruangan_pemasangan_iv_line" value="tdk" <?= $result['ruangan_pemasangan_iv_line'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                              <br>
                                                              Tdk
                                                            </div>
                                                          </td>
                                                          <td class="bd text-left">
                                                            <div class="row">
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_pemasangan_iv_line" value="ya" <?= $result['ok_pemasangan_iv_line'] == 'ya' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Ya
                                                              </div>
                                                              <div class="col-md-3">
                                                                <div class="text-center" style="padding-left: 0px"><br>
                                                                  <label class="container radio-select" style="width: 2%">
                                                                    <input type="radio" name="ok_pemasangan_iv_line" value="tdk" <?= $result['ok_pemasangan_iv_line'] == 'tdk' ? 'checked' : ''; ?>  >
                                                                    <span class="checkmark"></span>
                                                                  </label>
                                                                </div>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <br>
                                                                Tdk
                                                              </div>
                                                            </td>
                                                          </tr>

<tr>
      <td class="bd text-left"><?= ++$no ?>.Pemberian premedikasi</td>
      <td class="bd text-left">
        <div class="row">
          <div class="col-md-3">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container radio-select" style="width: 2%">
                <input type="radio" name="ruangan_pemberian_premedikasi" value="ya" <?= $result['ruangan_pemberian_premedikasi'] == 'ya' ? 'checked' : ''; ?>  >
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <br>
            Ya
          </div>
          <div class="col-md-3">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container radio-select" style="width: 2%">
                <input type="radio" name="ruangan_pemberian_premedikasi" value="tdk" <?= $result['ruangan_pemberian_premedikasi'] == 'tdk' ? 'checked' : ''; ?>  >
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <br>
            Tdk
          </div>
        </td>
        <td class="bd text-left">
          <div class="row">
            <div class="col-md-3">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container radio-select" style="width: 2%">
                  <input type="radio" name="ok_pemberian_premedikasi" value="ya" <?= $result['ok_pemberian_premedikasi'] == 'ya' ? 'checked' : ''; ?>  >
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <br>
              Ya
            </div>
            <div class="col-md-3">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container radio-select" style="width: 2%">
                  <input type="radio" name="ok_pemberian_premedikasi" value="tdk" <?= $result['ok_pemberian_premedikasi'] == 'tdk' ? 'checked' : ''; ?>  >
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <br>
              Tdk
            </div>
          </td>
        </tr>


    <tr>
      <td class="bd text-left"><?= ++$no ?>.Pemasangan Kateter Urin</td>
      <td class="bd text-left">
        <div class="row">
          <div class="col-md-3">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container radio-select" style="width: 2%">
                <input type="radio" name="ruangan_pemasangan_kateter_urin" value="ya" <?= $result['ruangan_pemasangan_kateter_urin'] == 'ya' ? 'checked' : ''; ?>  >
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <br>
            Ya
          </div>
          <div class="col-md-3">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container radio-select" style="width: 2%">
                <input type="radio" name="ruangan_pemasangan_kateter_urin" value="tdk" <?= $result['ruangan_pemasangan_kateter_urin'] == 'tdk' ? 'checked' : ''; ?>  >
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <br>
            Tdk
          </div>
        </td>
        <td class="bd text-left">
          <div class="row">
            <div class="col-md-3">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container radio-select" style="width: 2%">
                  <input type="radio" name="ok_pemasangan_kateter_urin" value="ya" <?= $result['ok_pemasangan_kateter_urin'] == 'ya' ? 'checked' : ''; ?>  >
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <br>
              Ya
            </div>
            <div class="col-md-3">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container radio-select" style="width: 2%">
                  <input type="radio" name="ok_pemasangan_kateter_urin" value="tdk" <?= $result['ok_pemasangan_kateter_urin'] == 'tdk' ? 'checked' : ''; ?>  >
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <br>
              Tdk
            </div>
          </td>
        </tr>

        <tr>
          <td class="bd text-left"><?= ++$no ?>.Pemasangan NGT</td>
          <td class="bd text-left">
            <div class="row">
              <div class="col-md-3">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="ruangan_pemasangan_ngt" value="ya" <?= $result['ruangan_pemasangan_ngt'] == 'ya' ? 'checked' : ''; ?>  >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-md-3">
                <br>
                Ya
              </div>
              <div class="col-md-3">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="ruangan_pemasangan_ngt" value="tdk" <?= $result['ruangan_pemasangan_ngt'] == 'tdk' ? 'checked' : ''; ?>  >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-md-3">
                <br>
                Tdk
              </div>
            </td>
            <td class="bd text-left">
              <div class="row">
                <div class="col-md-3">
                  <div class="text-center" style="padding-left: 0px"><br>
                    <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="ok_pemasangan_ngt" value="ya" <?= $result['ok_pemasangan_ngt'] == 'ya' ? 'checked' : ''; ?>  >
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-3">
                  <br>
                  Ya
                </div>
                <div class="col-md-3">
                  <div class="text-center" style="padding-left: 0px"><br>
                    <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="ok_pemasangan_ngt" value="tdk" <?= $result['ok_pemasangan_ngt'] == 'tdk' ? 'checked' : ''; ?>  >
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-3">
                  <br>
                  Tdk
                </div>
              </td>
            </tr>

            <tr>
              <td class="bd text-left"><?= ++$no ?>.Latihan nafas dalam</td>
              <td class="bd text-left">
                <div class="row">
                  <div class="col-md-3">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="ruangan_latihan_nafas_dalam" value="ya" <?= $result['ruangan_latihan_nafas_dalam'] == 'ya' ? 'checked' : ''; ?>  >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <br>
                    Ya
                  </div>
                  <div class="col-md-3">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="ruangan_latihan_nafas_dalam" value="tdk" <?= $result['ruangan_latihan_nafas_dalam'] == 'tdk' ? 'checked' : ''; ?>  >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <br>
                    Tdk
                  </div>
                </td>
                <td class="bd text-left">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="text-center" style="padding-left: 0px"><br>
                        <label class="container radio-select" style="width: 2%">
                          <input type="radio" name="ok_latihan_nafas_dalam" value="ya" <?= $result['ok_latihan_nafas_dalam'] == 'ya' ? 'checked' : ''; ?>  >
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <br>
                      Ya
                    </div>
                    <div class="col-md-3">
                      <div class="text-center" style="padding-left: 0px"><br>
                        <label class="container radio-select" style="width: 2%">
                          <input type="radio" name="ok_latihan_nafas_dalam" value="tdk" <?= $result['ok_latihan_nafas_dalam'] == 'tdk' ? 'checked' : ''; ?>  >
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <br>
                      Tdk
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="bd text-left"><?= ++$no ?>.Latihan Batuk efektif</td>
                  <td class="bd text-left">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="ruangan_latihan_batuk_efektif" value="ya" <?= $result['ruangan_latihan_batuk_efektif'] == 'ya' ? 'checked' : ''; ?>  >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <br>
                        Ya
                      </div>
                      <div class="col-md-3">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="ruangan_latihan_batuk_efektif" value="tdk" <?= $result['ruangan_latihan_batuk_efektif'] == 'tdk' ? 'checked' : ''; ?>  >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <br>
                        Tdk
                      </div>
                    </td>
                    <td class="bd text-left">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="text-center" style="padding-left: 0px"><br>
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="ok_latihan_batuk_efektif" value="ya" <?= $result['ok_latihan_batuk_efektif'] == 'ya' ? 'checked' : ''; ?>  >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <br>
                          Ya
                        </div>
                        <div class="col-md-3">
                          <div class="text-center" style="padding-left: 0px"><br>
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="ok_latihan_batuk_efektif" value="tdk" <?= $result['ok_latihan_batuk_efektif'] == 'tdk' ? 'checked' : ''; ?>  >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <br>
                          Tdk
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td class="bd text-left"><?= ++$no ?>.Kebutuhan Darah</td>
                      <td class="bd text-left">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="text-center" style="padding-left: 0px"><br>
                              <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="ruangan_kebutuhan_darah" value="ya" <?= $result['ruangan_kebutuhan_darah'] == 'ya' ? 'checked' : ''; ?>  >
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <br>
                            Ya
                          </div>
                          <div class="col-md-3">
                            <div class="text-center" style="padding-left: 0px"><br>
                              <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="ruangan_kebutuhan_darah" value="tdk" <?= $result['ruangan_kebutuhan_darah'] == 'tdk' ? 'checked' : ''; ?>  >
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <br>
                            Tdk
                          </div>
                        </td>
                        <td class="bd text-left">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="text-center" style="padding-left: 0px"><br>
                                <label class="container radio-select" style="width: 2%">
                                  <input type="radio" name="ok_kebutuhan_darah" value="ya" <?= $result['ok_kebutuhan_darah'] == 'ya' ? 'checked' : ''; ?>  >
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <br>
                              Ya
                            </div>
                            <div class="col-md-3">
                              <div class="text-center" style="padding-left: 0px"><br>
                                <label class="container radio-select" style="width: 2%">
                                  <input type="radio" name="ok_kebutuhan_darah" value="tdk" <?= $result['ok_kebutuhan_darah'] == 'tdk' ? 'checked' : ''; ?>  >
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <br>
                              Tdk
                            </div>
                          </td>
                        </tr>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

          <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Tambah Data Operasi Tanda Lokasi</div>
                      <div class="panel-body">

                        <div class="row">
                          <div class="col-md-2">
                            <b>Nama Prosedur :</b>
                          </div>
                          <div class="col-md-6">
                            <textarea type="text" name="nama_prosedur" id="nama_prosedur" class="form-control" placeholder="Nama Prosedur"   autocomplete="off"><?= $result['nama_prosedur']; ?></textarea>
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6"><br><b>Pria</b></div>
                          <div class="col-md-6"><br><b>Pria</b></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>Saat ini</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>H. Gambar</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>Saat ini</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>H. Gambar</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                             <div id="signature-bmf" style=''>
                                <img src='<?= $result['body_man_front']; ?>' id='sign_prev' />
                                <input type="hidden" name="prev" id="prev" value="<?= $result['body_man_front']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-3">
                            <div id="signature-bmf" style=''>
                              <canvas id="signature-bmf-pad" class="signature-bmf-pad" width="250px" height="600px">
                            </div><br/>
                             
                            <button type="button" id="undo_bmf">Undo</button>
                            <button type="button" id="clear_bmf">Clear</button>
                            <input type='hidden' id='generate_bmf' name="body_man_front" value=''><br/>
                          </div>
                          <div class="col-md-3">
                            <div id="signature-bmb" style=''>
                              <img src='<?= $result['body_man_back']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['body_man_back']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-3">
                            <div id="signature-bmb" style=''>
                              <canvas id="signature-bmb-pad" class="signature-bmb-pad" width="250px" height="600px">
                            </div><br/>
                             
                            <button type="button" id="undo_bmb">Undo</button>
                            <button type="button" id="clear_bmb">Clear</button>
                            <input type='hidden' id='generate_bmb' name="body_man_back" value=''><br/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6"><br><b>Wanita</b></div>
                          <div class="col-md-6"><br><b>Wanita</b></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>Saat ini</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>H. Gambar</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>Saat ini</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"><b>H. Gambar</b></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div id="signature-bwf" style=''>
                              <img src='<?= $result['body_woman_front']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['body_woman_front']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-3">
                            <div id="signature-bwf" style=''>
                              <canvas id="signature-bwf-pad" class="signature-bwf-pad" width="250px" height="600px">
                            </div><br/>
                             
                            <button type="button" id="undo_bwf">Undo</button>
                            <button type="button" id="clear_bwf">Clear</button>
                            <input type='hidden' id='generate_bwf' name="body_woman_front" value=''><br/>
                          </div>
                          <div class="col-md-3">
                            <div id="signature-bwb" style=''>
                              <img src='<?= $result['body_woman_back']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['body_woman_back']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-3">
                            <div id="signature-bwb" style=''>
                              <canvas id="signature-bwb-pad" class="signature-bwb-pad" width="250px" height="600px">
                            </div><br/>
                             
                            <button type="button" id="undo_bwb">Undo</button>
                            <button type="button" id="clear_bwb">Clear</button>
                            <input type='hidden' id='generate_bwb' name="body_woman_back" value=''><br/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-8">
                            <hr>
                            <br><center>
                            <b>Palmar (anterior)</b></center>
                          </div>
                          <div class="col-md-4">
                            <hr>
                            <br>
                          </div>
                        </div>

                         <div class="row">
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <div id="signature-phkiri" style=''>
                              <img src='<?= $result['palmar_hand_kiri']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['palmar_hand_kiri']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-phkiri" style=''>
                              <canvas id="signature-phkiri-pad" class="signature-phkiri-pad" width="200px" height="300px">
                            </div><br/>
                             
                            <button type="button" id="undo_phkiri">Undo</button>
                            <button type="button" id="clear_phkiri">Clear</button>
                            <input type='hidden' id='generate_phkiri' name="palmar_hand_kiri" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-phkanan" style=''>
                              <img src='<?= $result['palmar_hand_kanan']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['palmar_hand_kanan']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-phkanan" style=''>
                              <canvas id="signature-phkanan-pad" class="signature-phkanan-pad" width="200px" height="300px">
                            </div><br/>
                             
                            <button type="button" id="undo_phkanan">Undo</button>
                            <button type="button" id="clear_phkanan">Clear</button>
                            <input type='hidden' id='generate_phkanan' name="palmar_hand_kanan" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-hkiri" style=''>
                              <img src='<?= $result['head_kiri']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['head_kiri']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-hkiri" style=''>
                              <canvas id="signature-hkiri-pad" class="signature-hkiri-pad" width="200px" height="240px">
                            </div><br/>
                             
                            <button type="button" id="undo_hkiri">Undo</button>
                            <button type="button" id="clear_hkiri">Clear</button>
                            <input type='hidden' id='generate_hkiri' name="head_kiri" value=''><br/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <hr>
                            <br>
                          </div>
                        </div>

                         <div class="row">
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Front
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Front
                          </div>
                          <div class="col-md-1">
                            <br>
                           Back
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Back
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <div id="signature-hkanan" style=''>
                             <img src='<?= $result['head_kanan']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['head_kanan']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-hkanan" style=''>
                              <canvas id="signature-hkanan-pad" class="signature-hkanan-pad" width="200px" height="240px">
                            </div><br/>
                             
                            <button type="button" id="undo_hkanan">Undo</button>
                            <button type="button" id="clear_hkanan">Clear</button>
                            <input type='hidden' id='generate_hkanan' name="head_kanan" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-hf" style=''>
                              <img src='<?= $result['head_front']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['head_front']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-hf" style=''>
                              <canvas id="signature-hf-pad" class="signature-hf-pad" width="200px" height="240px">
                            </div><br/>
                             
                            <button type="button" id="undo_hf">Undo</button>
                            <button type="button" id="clear_hf">Clear</button>
                            <input type='hidden' id='generate_hf' name="head_front" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-hb" style=''>
                              <img src='<?= $result['head_back']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['head_back']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-hb" style=''>
                              <canvas id="signature-hb-pad" class="signature-hb-pad" width="200px" height="240px">
                            </div><br/>
                             
                            <button type="button" id="undo_hb">Undo</button>
                            <button type="button" id="clear_hb">Clear</button>
                            <input type='hidden' id='generate_hb' name="head_back" value=''><br/>
                          </div>
                        </div>

                         <div class="row">
                          <div class="col-md-8">
                            <hr>
                            <br><center>
                            <b>Dorsal (posterior)</b></center>
                          </div>
                          <div class="col-md-4">
                            <hr>
                            <br><center>
                            <b>Plantar (posterior)</b></center>
                          </div>
                          <!-- <div class="col-md-4">
                            <hr>
                            <br><center>
                            <b>Palmar (anterior)</b></center>
                          </div> -->
                        </div>

                        <div class="row">
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <div id="signature-dorkiri" style=''>
                              <img src='<?= $result['dorsal_kiri']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['dorsal_kiri']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-dorkiri" style=''>
                              <canvas id="signature-dorkiri-pad" class="signature-dorkiri-pad" width="200px" height="300px">
                            </div><br/>
                             
                            <button type="button" id="undo_dorkiri">Undo</button>
                            <button type="button" id="clear_dorkiri">Clear</button>
                            <input type='hidden' id='generate_dorkiri' name="dorsal_kiri" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-dorkanan" style=''>
                              <img src='<?= $result['dorsal_kanan']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['dorsal_kanan']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-dorkanan" style=''>
                              <canvas id="signature-dorkanan-pad" class="signature-dorkanan-pad" width="200px" height="300px">
                            </div><br/>
                             
                            <button type="button" id="undo_dorkanan">Undo</button>
                            <button type="button" id="clear_dorkanan">Clear</button>
                            <input type='hidden' id='generate_dorkanan' name="dorsal_kanan" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-pkanan" style=''>
                              <img src='<?= $result['plantar_kanan']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['plantar_kanan']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-pkanan" style=''>
                              <canvas id="signature-pkanan-pad" class="signature-pkanan-pad" width="200px" height="450px">
                            </div><br/>
                             
                            <button type="button" id="undo_pkanan">Undo</button>
                            <button type="button" id="clear_pkanan">Clear</button>
                            <input type='hidden' id='generate_pkanan' name="plantar_kanan" value=''><br/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <hr>
                            <br><center>
                            <b>Plantar (posterior)</b></center>
                          </div>
                          <div class="col-md-8">
                            <hr>
                            <br><center>
                            <b>Palmar (anterior)</b></center>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kiri
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Saat ini</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                           Kanan
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>H.Gambar</b>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <div id="signature-pkiri" style=''>
                              <img src='<?= $result['plantar_kiri']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['plantar_kiri']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-pkiri" style=''>
                              <canvas id="signature-pkiri-pad" class="signature-pkiri-pad" width="200px" height="450px">
                            </div><br/>
                             
                            <button type="button" id="undo_pkiri">Undo</button>
                            <button type="button" id="clear_pkiri">Clear</button>
                            <input type='hidden' id='generate_pkiri' name="plantar_kiri" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-pfkiri" style=''>
                              <img src='<?= $result['palmar_feet_kiri']; ?>' id='sign_prev' />
                              <input type="hidden" name="prev" id="prev" value="<?= $result['palmar_feet_kiri']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-pfkiri" style=''>
                              <canvas id="signature-pfkiri-pad" class="signature-pfkiri-pad" width="200px" height="400px">
                            </div><br/>
                             
                            <button type="button" id="undo_pfkiri">Undo</button>
                            <button type="button" id="clear_pfkiri">Clear</button>
                            <input type='hidden' id='generate_pfkiri' name="palmar_feet_kiri" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-pfkanan" style=''>
                              <img src='<?= $result['palmar_feet_kanan']; ?>' id='sign_prev' />
                            <input type="hidden" name="prev" id="prev" value="<?= $result['palmar_feet_kanan']; ?>">
                            </div><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-pfkanan" style=''>
                              <canvas id="signature-pfkanan-pad" class="signature-pfkanan-pad" width="200px" height="400px">
                            </div><br/>
                             
                            <button type="button" id="undo_pfkanan">Undo</button>
                            <button type="button" id="clear_pfkanan">Clear</button>
                            <input type='hidden' id='generate_pfkanan' name="palmar_feet_kanan" value=''><br/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md-8">
                             <div class="row">
                              <div class="col-md-12"><hr><br><br>
                                <p class="text-center">Dengan ini saya menyatakan bahwa lokasi operasi yang telah ditetapkan pada diagram di atas adalah benar.</p>
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
                                    <input type='hidden' id='generate_wali' name="coretan_wali" value='' ><br/>
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
                                    <input type='hidden' id='generate_pasien' name="coretan_pasien" value=''  ><br/>
                                  </div>
                                  <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                                    <input style="width: 80%" type="text" name="nama_wali_ttd" value="<?= $result['nama_wali_ttd']; ?>" class="form-control" placeholder="Wali"   autocomplete="off">
                                  </div>
                                  <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                                    <input style="width: 80%" type="text" name="nama_pasien_ttd" value="<?= $result['nama_pasien_ttd']; ?>" class="form-control" placeholder="Pasien"   autocomplete="off">
                                  </div>
                                  <br><br>
                                  <div class="col-md-12 text-center" style="margin: 20px 0px 20px 0px;"> 
                                    <div class="row">
                                      <!-- nama -->
                                      <div class="col-md-4">
                                        Bertanda tangan untuk pasien a.n
                                      </div>
                                      <div class="col-md-8">
                                        <input type="text" name="pasien_a_n" id="pasien" value="<?= $result['pasien_a_n']; ?>" class="form-control" placeholder="Nama Pasien"   autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 text-center">
                                  <br><br> 
                                    <b>Saksi Pihak RS</b>
                                     <!-- Signature -->
                                    <center>
                                      <div class="signature">
                                        <canvas id="signature-pad-saksi" class="signature-pad-saksi" width="200px" height="200px">
                                      </div>
                                    </center>
                                    <br/>
                                     
                                    <button type="button" id="undo_saksi">Undo</button>
                                    <button type="button" id="clear_saksi">Clear</button>
                                    <input type='hidden' id='generate_saksi' name="coretan_saksi" value=''  ><br/>
                                  </div>
                                  <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                                  </div>
                                  <div class="col-md-6 text-center"> 
                                    <b>Dokter Operator</b>
                                     <!-- Signature -->
                                    <center>
                                      <div class="signature">
                                        <canvas id="signature-pad-dokter-operator2" class="signature-pad-dokter-operator2" width="200px" height="200px">
                                      </div>
                                    </center>
                                    <br/>
                                     
                                    <button type="button" id="undo_dokter_operator2">Undo</button>
                                    <button type="button" id="clear_dokter_operator2">Clear</button>
                                    <input type='hidden' id='generate_dokter_operator2' name="coretan_dokter_operator2" value=''  ><br/>
                                  </div>
                                  <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                                    <input style="width: 80%" type="text" name="nama_saksi" value="<?= $result['nama_saksi']; ?>" class="form-control" placeholder="Saksi"   autocomplete="off">
                                  </div>
                                  <div class="col-md-6 text-center" style="margin: 20px 0px 20px 0px;"> 
                                    <input style="width: 80%" type="text" name="nama_dokter_operator2" value="<?= $result['nama_dokter_operator2']; ?>" class="form-control" placeholder="Dokter Operator"   autocomplete="off">
                                  </div>
                                </div> 
                                <br>               
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2"></div>
                        </div>

                    </div>
                  </div>         
                </div>
                <div class="panel-footer text-right">
                <button class="btn btn-default btn-sm btn-batal-<?= $this->router->fetch_class(); ?>">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm btn-kirim-<?= $this->router->fetch_class(); ?>">Simpan</button>
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

      let cekForm =  $('#form-edit-1')
      console.log(cekForm)

      $('#form-edit-1').submit(function (e) { 
        console.log('submit')
        // e.preventDefault();
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
    
    $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(() => {
      console.log('test')
    })

  $(document).ready(function() {

   var signaturePadDokter           = new SignaturePad(document.getElementById('signature-pad-dokter-operator'));
   var signaturePadDokter2           = new SignaturePad(document.getElementById('signature-pad-dokter-operator2'));
   var signaturePadPerawat_Inap     = new SignaturePad(document.getElementById('signature-pad-perawat_ruang_rawat_inap'));
   var signaturePadPerawat_Ok       = new SignaturePad(document.getElementById('signature-pad-perawat_ruang_ok'));
   var signaturePadWali           = new SignaturePad(document.getElementById('signature-pad-wali'));
   var signaturePadPasien         = new SignaturePad(document.getElementById('signature-pad-pasien'));
   var signaturePadSaksi          = new SignaturePad(document.getElementById('signature-pad-saksi'));


   var signaturePadBMB = new SignaturePad(document.getElementById('signature-bmb-pad'));

   var signaturePadBMF = new SignaturePad(document.getElementById('signature-bmf-pad'));

   var signaturePadBWF = new SignaturePad(document.getElementById('signature-bwf-pad'));

   var signaturePadBWB = new SignaturePad(document.getElementById('signature-bwb-pad'));

   var signaturePadPhKanan = new SignaturePad(document.getElementById('signature-phkanan-pad'));

   var signaturePadPhKiri = new SignaturePad(document.getElementById('signature-phkiri-pad'));

   var signaturePadDorkanan = new SignaturePad(document.getElementById('signature-dorkanan-pad'));

   var signaturePadDorKiri = new SignaturePad(document.getElementById('signature-dorkiri-pad'));

   var signaturePadPfKanan = new SignaturePad(document.getElementById('signature-pfkanan-pad'));

   var signaturePadPfKiri = new SignaturePad(document.getElementById('signature-pfkiri-pad'));

   var signaturePadPKanan = new SignaturePad(document.getElementById('signature-pkanan-pad'));

   var signaturePadPkiri = new SignaturePad(document.getElementById('signature-pkiri-pad'));

   var signaturePadHf = new SignaturePad(document.getElementById('signature-hf-pad'));

   var signaturePadHb = new SignaturePad(document.getElementById('signature-hb-pad'));

   var signaturePadHkanan = new SignaturePad(document.getElementById('signature-hkanan-pad'));

   var signaturePadHkiri = new SignaturePad(document.getElementById('signature-hkiri-pad'));

   $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){

    var data_dokter_operator = signaturePadDokter.toDataURL('image/png');
    var set_dokter_operator = signaturePadDokter.toData();
    if (!set_dokter_operator.pop()) {
      data_dokter_operator = $('#prev_dokter_operator').val();  
    }
    $('#generate_dokter_operator').val(data_dokter_operator);

    var data_dokter_operator2 = signaturePadDokter2.toDataURL('image/png');
    var set_dokter_operator2 = signaturePadDokter2.toData();
    if (!set_dokter_operator2.pop()) {
      data_dokter_operator2 = $('#prev_dokter_operator2').val();  
    }
    $('#generate_dokter_operator2').val(data_dokter_operator2);


    var data_perawat_inap = signaturePadPerawat_Inap.toDataURL('image/png');
    var set_perawat_inap = signaturePadPerawat_Inap.toData();
    if (!set_perawat_inap.pop()) {
      data_perawat_inap = $('#prev_perawat_inap').val();  
    }
    $('#generate_perawat_ruang_rawat_inap').val(data_perawat_inap);

    var data_perawat_ok = signaturePadPerawat_Ok.toDataURL('image/png');
    var set_perawat_ok = signaturePadPerawat_Ok.toData();
    if (!set_perawat_ok.pop()) {
      data_perawat_ok = $('#prev_perawat_ok').val();  
    }
    $('#generate_perawat_ruang_ok').val(data_perawat_ok);

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



      var data_body_man_back = signaturePadBMB.toDataURL('image/png');
      var set_body_man_back = signaturePadBMB.toData();
        if (!set_body_man_back.pop()) {
          data_body_man_back = $('#prev_body_man_back').val();
        }
      $("#sign_prev_body_man_back").show();
      $("#sign_prev_body_man_back").attr("src",data_body_man_back);
      $('#generate_bmb').val(data_body_man_back);

      var data_body_man_front = signaturePadBMF.toDataURL('image/png');
      var set_body_man_front = signaturePadBMF.toData();
        if (!set_body_man_front.pop()) {
          data_body_man_front = $('#prev_body_man_front').val();
        }

      $("#sign_prev_body_man_front").show();
      $("#sign_prev_body_man_front").attr("src",data_body_man_front);
      $('#generate_bmf').val(data_body_man_front);

      var data_body_woman_back = signaturePadBWB.toDataURL('image/png');
      var set_body_woman_back = signaturePadBWB.toData();
        if (!set_body_woman_back.pop()) {
          data_body_woman_back = $('#prev_body_woman_back').val();
        }
      $("#sign_prev_body_woman_back").show();
      $("#sign_prev_body_woman_back").attr("src",data_body_woman_back);
      $('#generate_bwb').val(data_body_woman_back);

      var data_body_woman_front = signaturePadBWF.toDataURL('image/png');
      var set_body_woman_front = signaturePadBWF.toData();
        if (!set_body_woman_front.pop()) {
          data_body_woman_front = $('#prev_body_woman_front').val();
        }
      $("#sign_prev_body_woman_front").show();
      $("#sign_prev_body_woman_front").attr("src",data_body_woman_front);
      $('#generate_bwf').val(data_body_woman_front);

      var data_palmar_hand_kanan = signaturePadPhKanan.toDataURL('image/png');
      var set_palmar_hand_kanan = signaturePadPhKanan.toData();
        if (!set_palmar_hand_kanan.pop()) {
          data_palmar_hand_kanan = $('#prev_palmar_hand_kanan').val();
        }
      $("#sign_prev_palmar_hand_kanan").show();
      $("#sign_prev_palmar_hand_kanan").attr("src",data_palmar_hand_kanan);
      $('#generate_phkanan').val(data_palmar_hand_kanan);

      var data_palmar_hand_kiri = signaturePadPhKiri.toDataURL('image/png');
      var set_palmar_hand_kiri = signaturePadPhKiri.toData();
        if (!set_palmar_hand_kiri.pop()) {
          data_palmar_hand_kiri = $('#prev_palmar_hand_kiri').val();
        }
      $("#sign_prev_palmar_hand_kiri").show();
      $("#sign_prev_palmar_hand_kiri").attr("src",data_palmar_hand_kiri);
      $('#generate_phkiri').val(data_palmar_hand_kiri);

      var data_dorsal_kanan = signaturePadDorkanan.toDataURL('image/png');
      var set_dorsal_kanan = signaturePadDorkanan.toData();
        if (!set_dorsal_kanan.pop()) {
          data_dorsal_kanan = $('#prev_dorsal_kanan').val();
        }
      $("#sign_prev_dorsal_kanan").show();
      $("#sign_prev_dorsal_kanan").attr("src",data_dorsal_kanan);
      $('#generate_dorkanan').val(data_dorsal_kanan);

      var data_dorsal_kiri = signaturePadDorKiri.toDataURL('image/png');
      var set_dorsal_kiri = signaturePadDorKiri.toData();
        if (!set_dorsal_kiri.pop()) {
          data_dorsal_kiri = $('#dorsal_kiri').val();
        }
      $("#sign_dorsal_kiri").show();
      $("#sign_dorsal_kiri").attr("src",data_dorsal_kiri);
      $('#generate_dorkiri').val(data_dorsal_kiri);

      var data_palmar_feet_kanan = signaturePadPfKanan.toDataURL('image/png');
      var set_palmar_feet_kanan = signaturePadPfKanan.toData();
        if (!set_palmar_feet_kanan.pop()) {
          data_palmar_feet_kanan = $('#prev_palmar_feet_kanan').val();
        }
      $("#sign_prev_palmar_feet_kanan").show();
      $("#sign_prev_palmar_feet_kanan").attr("src",data_palmar_feet_kanan);
      $('#generate_pfkanan').val(data_palmar_feet_kanan);

      var data_palmar_feet_kiri = signaturePadPfKiri.toDataURL('image/png');
      var set_palmar_feet_kiri = signaturePadPfKiri.toData();
        if (!set_palmar_feet_kiri.pop()) {
          data_palmar_feet_kiri = $('#prev_palmar_feet_kiri').val();
        }
      $("#sign_prev_palmar_feet_kiri").show();
      $("#sign_prev_palmar_feet_kiri").attr("src",data_palmar_feet_kiri);
      $('#generate_pfkiri').val(data_palmar_feet_kiri);

      var data_plantar_kanan = signaturePadPKanan.toDataURL('image/png');
      var set_plantar_kanan = signaturePadPKanan.toData();
        if (!set_plantar_kanan.pop()) {
          data_plantar_kanan = $('#prev_plantar_kanan').val();
        }
      $("#sign_prev_plantar_kanan").show();
      $("#sign_prev_plantar_kanan").attr("src",data_plantar_kanan);
      $('#generate_pkanan').val(data_plantar_kanan);

      var data_plantar_kiri = signaturePadPkiri.toDataURL('image/png');
      var set_plantar_kiri = signaturePadPkiri.toData();
        if (!set_plantar_kiri.pop()) {
          data_plantar_kiri = $('#prev_plantar_kiri').val();
        }
      $("#sign_prev_plantar_kiri").show();
      $("#sign_prev_plantar_kiri").attr("src",data_plantar_kiri);
      $('#generate_pkiri').val(data_plantar_kiri);

      var data_head_kanan = signaturePadHkanan.toDataURL('image/png');
      var set_head_kanan = signaturePadHkanan.toData();
        if (!set_head_kanan.pop()) {
          data_head_kanan = $('#prev_head_kanan').val();
        }
      $("#sign_prev_head_kanan").show();
      $("#sign_prev_head_kanan").attr("src",data_head_kanan);
      $('#generate_hkanan').val(data_head_kanan);

      var data_head_kiri = signaturePadHkiri.toDataURL('image/png');
      var set_head_kiri = signaturePadHkiri.toData();
        if (!set_head_kiri.pop()) {
          data_head_kiri = $('#prev_head_kiri').val();
        }
      $("#sign_prev_head_kiri").show();
      $("#sign_prev_head_kiri").attr("src",data_head_kiri);
      $('#generate_hkiri').val(data_head_kiri);

      var data_head_front = signaturePadHf.toDataURL('image/png');
      var set_head_front = signaturePadHf.toData();
        if (!set_head_front.pop()) {
          data_head_front = $('#prev_head_front').val();
        }
      $("#sign_prev_head_front").show();
      $("#sign_prev_head_front").attr("src",data_head_front);
      $('#generate_hf').val(data_head_front);

      var data_head_back = signaturePadHb.toDataURL('image/png');
      var set_head_back = signaturePadHb.toData();
        if (!set_head_back.pop()) {
          data_head_back = $('#prev_head_back').val();
        }
      $("#sign_prev_head_back").show();
      $("#sign_prev_head_back").attr("src",data_head_back);
      $('#generate_hb').val(data_head_back);

  });


//Fungsi button dokter
document.getElementById('clear_dokter_operator').addEventListener('click', function () {
  signaturePadDokter.clear();
});

document.getElementById('undo_dokter_operator').addEventListener('click', function () {
  var data_dokter_operator = signaturePadDokter.toData();
  if (data_dokter_operator) {
      data_dokter_operator.pop(); // remove the last dot or line
      signaturePadDokter.fromData(data_dokter_operator);
    }
  });

//Fungsi button dokter
document.getElementById('clear_dokter_operator2').addEventListener('click', function () {
  signaturePadDokter2.clear();
});

document.getElementById('undo_dokter_operator2').addEventListener('click', function () {
  var data_dokter_operator2 = signaturePadDokter2.toData();
  if (data_dokter_operator2) {
      data_dokter_operator2.pop(); // remove the last dot or line
      signaturePadDokter2.fromData(data_dokter_operator2);
    }
  });

//Fungsi button perawat r.rawat inap
document.getElementById('clear_perawat_ruang_rawat_inap').addEventListener('click', function () {
  signaturePadPerawat_Inap.clear();
});

document.getElementById('undo_perawat_ruang_rawat_inap').addEventListener('click', function () {
  var data_perawat_inap = signaturePadPerawat_Inap.toData();
  if (data_perawat_inap) {
      data_perawat_inap.pop(); // remove the last dot or line
      signaturePadPerawat_Inap.fromData(data_perawat_inap);
    }
  });

//Fungsi button perawat r.ok
document.getElementById('clear_perawat_ruang_ok').addEventListener('click', function () {
  signaturePadPerawat_Ok.clear();
});

document.getElementById('undo_perawat_ruang_ok').addEventListener('click', function () {
  var data_perawat_ok = signaturePadPerawat_Ok.toData();
  if (data_perawat_ok) {
      data_perawat_ok.pop(); // remove the last dot or line
      signaturePadPerawat_Ok.fromData(data_perawat_ok);
    }
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

//Fungsi button gambar
 document.getElementById('clear_bmb').addEventListener('click', function () {
    signaturePadBMB.clear();
  });

document.getElementById('undo_bmb').addEventListener('click', function () {
    var data_body_man_front = signaturePadBMB.toData();
    if (data_body_man_front) {
      data_body_man_front.pop(); // remove the last dot or line
      signaturePadBMB.fromData(data_body_man_front);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_bmf').addEventListener('click', function () {
    signaturePadBMF.clear();
  });

document.getElementById('undo_bmf').addEventListener('click', function () {
    var data_body_man_back = signaturePadBMF.toData();
    if (data_body_man_back) {
      data_body_man_back.pop(); // remove the last dot or line
      signaturePadBMF.fromData(data_body_man_back);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_bwf').addEventListener('click', function () {
    signaturePadBWF.clear();
  });

document.getElementById('undo_bwf').addEventListener('click', function () {
    var data_body_woman_front = signaturePadBWF.toData();
    if (data_body_woman_front) {
      data_body_woman_front.pop(); // remove the last dot or line
      signaturePadBWF.fromData(data_body_woman_front);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_bwb').addEventListener('click', function () {
    signaturePadBWB.clear();
  });

document.getElementById('undo_bwb').addEventListener('click', function () {
    var data_body_woman_back = signaturePadBWB.toData();
    if (data_body_woman_back) {
      data_body_woman_back.pop(); // remove the last dot or line
      signaturePadBWB.fromData(data_body_woman_back);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_phkanan').addEventListener('click', function () {
    signaturePadPhKanan.clear();
  });

document.getElementById('undo_phkanan').addEventListener('click', function () {
    var data_palmar_hand_kanan = signaturePadPhKanan.toData();
    if (data_palmar_hand_kanan) {
      data_palmar_hand_kanan.pop(); // remove the last dot or line
      signaturePadPhKanan.fromData(data_palmar_hand_kanan);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_phkiri').addEventListener('click', function () {
    signaturePadPhKiri.clear();
  });

document.getElementById('undo_phkiri').addEventListener('click', function () {
    var data_palmar_hand_kiri = signaturePadPhKiri.toData();
    if (data_palmar_hand_kiri) {
      data_palmar_hand_kiri.pop(); // remove the last dot or line
      signaturePadPhKiri.fromData(data_palmar_hand_kiri);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_hf').addEventListener('click', function () {
    signaturePadHf.clear();
  });

document.getElementById('undo_hf').addEventListener('click', function () {
    var data_head_front = signaturePadHf.toData();
    if (data_head_front) {
      data_head_front.pop(); // remove the last dot or line
      signaturePadHf.fromData(data_head_front);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_hb').addEventListener('click', function () {
    signaturePadHb.clear();
  });

document.getElementById('undo_hb').addEventListener('click', function () {
    var data_head_back = signaturePadHb.toData();
    if (data_head_back) {
      data_head_back.pop(); // remove the last dot or line
      signaturePadHb.fromData(data_head_back);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_hkiri').addEventListener('click', function () {
    signaturePadHkiri.clear();
  });

document.getElementById('undo_hkiri').addEventListener('click', function () {
    var data_head_kiri = signaturePadHkiri.toData();
    if (data_head_kiri) {
      data_head_kiri.pop(); // remove the last dot or line
      signaturePadHkiri.fromData(data_head_kiri);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_hkanan').addEventListener('click', function () {
    signaturePadHkanan.clear();
  });

document.getElementById('undo_hkanan').addEventListener('click', function () {
    var data_head_kanan = signaturePadHkanan.toData();
    if (data_head_kanan) {
      data_head_kanan.pop(); // remove the last dot or line
      signaturePadHkanan.fromData(data_head_kanan);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_dorkanan').addEventListener('click', function () {
    signaturePadDorkanan.clear();
  });

document.getElementById('undo_dorkanan').addEventListener('click', function () {
    var data_dorsal_kanan = signaturePadDorkanan.toData();
    if (data_dorsal_kanan) {
      data_dorsal_kanan.pop(); // remove the last dot or line
      signaturePadDorkanan.fromData(data_dorsal_kanan);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_dorkiri').addEventListener('click', function () {
    signaturePadDorKiri.clear();
  });

document.getElementById('undo_dorkiri').addEventListener('click', function () {
    var data_dorsal_kiri = signaturePadDorKiri.toData();
    if (data_dorsal_kiri) {
      data_dorsal_kiri.pop(); // remove the last dot or line
      signaturePadDorKiri.fromData(data_dorsal_kiri);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_pfkanan').addEventListener('click', function () {
    signaturePadPfKanan.clear();
  });

document.getElementById('undo_pfkanan').addEventListener('click', function () {
    var data_palmar_feet_kanan = signaturePadPfKanan.toData();
    if (data_palmar_feet_kanan) {
      data_palmar_feet_kanan.pop(); // remove the last dot or line
      signaturePadPfKanan.fromData(data_palmar_feet_kanan);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_pfkiri').addEventListener('click', function () {
    signaturePadPfKiri.clear();
  });

document.getElementById('undo_pfkiri').addEventListener('click', function () {
    var data_palmar_feet_kiri = signaturePadPfKiri.toData();
    if (data_palmar_feet_kiri) {
      data_palmar_feet_kiri.pop(); // remove the last dot or line
      signaturePadPfKiri.fromData(data_palmar_feet_kiri);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_pkanan').addEventListener('click', function () {
    signaturePadPKanan.clear();
  });

document.getElementById('undo_pfkanan').addEventListener('click', function () {
    var data_plantar_kanan = signaturePadPKanan.toData();
    if (data_plantar_kanan) {
      data_plantar_kanan.pop(); // remove the last dot or line
      signaturePadPKanan.fromData(data_plantar_kanan);
    }
  });

//Fungsi button gambar
 document.getElementById('clear_pkiri').addEventListener('click', function () {
    signaturePadPkiri.clear();
  });

document.getElementById('undo_pfkiri').addEventListener('click', function () {
    var data_plantar_kiri = signaturePadPkiri.toData();
    if (data_plantar_kiri) {
      data_plantar_kiri.pop(); // remove the last dot or line
      signaturePadPkiri.fromData(data_plantar_kiri);
    }
  });



})


</script>