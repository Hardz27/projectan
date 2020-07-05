
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

  .signature-bmf{ /* bmf = body_man_front */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_man_front.png");
  }

  .signature-bmb{ /* bmb = body_man_back */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_man_back.png");
  }

  .signature-bwf{ /* bwb = body_woman_back */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_woman_front.png");
  }

  .signature-bwb{ /* bwb = body_woman_back */
    width: 250px; height: 600px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/body_woman_back.png");
  }

  .signature-phkiri{ /* phkiri = palmar_hand_kiri */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_hand_kiri.png");
  }

  .signature-phkanan{ /* phkanan = palmar_hand_kanan */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_hand_kanan.png");
  }

  .signature-dorkanan{ /* dorkanan = dorsal_kanan */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/dorsal_kanan.png");
  }

  .signature-dorkiri{ /* dorkiri = dorsal_kiri */
    width: 200px; height: 300px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/dorsal_kiri.png");
  }

  .signature-pfkiri{ /* pfkiri = palmar_feet_kiri */
    width: 200px; height: 400px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_feet_kiri.png");
  }

  .signature-pfkanan{ /* pfkanan = palmar_feet_kanan */
    width: 200px; height: 400px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/palmar_feet_kanan.png");
  }

  .signature-pkanan{ /* pkanan = plantar_kanan */
    width: 200px; height: 450px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/plantar_kanan.png");
  }

  .signature-pkiri{ /* pkiri = plantar_kiri */
    width: 200px; height: 450px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/plantar_kiri.png");
  }

  .signature-hb{ /* hb = head_back */
    width: 200px; height: 240px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/head_back.png");
  }

  .signature-hf{ /* hf = head_front */
    width: 200px; height: 240px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/head_front.png");
  }

  .signature-hkanan{ /* hkanan = head_kanan */
    width: 200px; height: 240px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/head_kanan.png");
  }

  .signature-hkiri{ /* hkiri = head_kiri */
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

    <form id="form-add-1-<?= $this->router->fetch_class(); ?>">
      <input type="hidden" class="form-control input-sm" name="id_notes" id="id_notes" value="<?= $result['id_notes']; ?>" >
      <input type="hidden" class="form-control input-sm" name="id_reg" id="id_reg" value="<?= $result['id_reg']; ?>" >
      <input type="hidden" class="form-control input-sm" name="id_visit" id="id_visit" value="<?= $result['id_visit']; ?>" >
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="panel-heading">
            <?php foreach ($data_visit as $v) : ?>
              <?php if ($v['id_visit'] == $result['id_visit']) { ?>
                <?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
              <?php } ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 mb-5">
            </div>

            <div class="col-lg-4">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Perawat Ok</b>
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
                  <b>Dokter Operator</b>
                </div>
                <div class="col-md-8">
                <select name="dokter_approved" class="dokter_approved" style="width: 100%" required>
                    <option value=""></option>
                    <?php foreach ($data_dokter as $dd) : ?>
                      <option value="<?= $dd['id'] ?>" <?= $dd['nama'] == $result['approved_dokter'] ? 'selected' : ''; ?>><?= $dd['nama'] ?></option>
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
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><center>Operasi Tanda Lokasi</center></div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2">
                          <b>Nama Pasien</b>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="nama_pasien" value="<?=$result['nama_pasien']?>" id="nama_pasien" class="form-control" placeholder="Nama Pasien"  required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <b>Nama Wali</b>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="nama_wali" id="nama_wali" value="<?=$result['nama_wali']?>" class="form-control" placeholder="Nama Wali"  required autocomplete="off">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-2">
                          <br>
                          <b>No RM</b>
                        </div>
                        <div class="col-md-4">
                          <br>
                          <input type="text" name="no_rm" id="no_rm" class="form-control" value="<?=$result['no_rm']?>" placeholder="No. RM"  required autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Usia</b>
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="usia_wali" id="usia_wali" value="<?=$result['usia_wali']?>" class="form-control" placeholder="Usia Wali"  required autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Jenis Kelamin</b>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>L
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_wali" <?=$result['jenis_kelamin_wali'] == "L" ? "checked" : '' ?> value="L"  >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>P
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_wali" value="P" <?=$result['jenis_kelamin_wali'] == "P" ? "checked" : '' ?> >
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
                          <input type="text" name="tempat_lahir" value="<?=$result['tempat_lahir']?>"  id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?=$result['tanggal_lahir']?>" class="form-control" value="<?= date('Y-m-d') ?>"  required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <br>
                          <b>Hubungan</b>
                        </div>
                        <div class="col-md-4">
                          <br>
                          <input type="text" name="hubungan_wali" id="hubungan_wali" value="<?=$result['hubungan_wali']?>" class="form-control" placeholder="Hubungan Wali"  required autocomplete="off">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-1">
                          <br>
                          <b>Usia</b>
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="usia_pasien" id="usia_pasien" value="<?=$result['usia_pasien']?>" class="form-control" placeholder="Usia Pasien"  required autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Jenis Kelamin</b>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>L
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_pasien" <?=$result['jenis_kelamin_pasien'] == "L" ? "checked" : '' ?> value="L" required >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>P
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_pasien" <?=$result['jenis_kelamin_pasien'] == "P" ? "checked" : '' ?> value="P" required >
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
                          <textarea style="height: 100px" type="text" name="anamnesis" id="anamnesis" class="form-control" placeholder="Anamnesis"  required autocomplete="off"><?=$result['anamnesis']?>"</textarea>
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
                          <textarea style="height: 100px" type="text" name="pemeriksaan_fisik" id="pemeriksaan_fisik" class="form-control" placeholder="Pemeriksaan Fisik"  required autocomplete="off"><?=$result['pemeriksaan_fisik']?></textarea>
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
                          <textarea style="height: 100px" type="text" name="catatan_alergi" id="catatan_alergi" class="form-control" placeholder="Catatan Alergi"  required autocomplete="off"><?=$result['catatan_alergi']?></textarea>
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
                          <textarea style="height: 100px" type="text" name="diagnosa_praoperasi" id="diagnosa_praoperasi" class="form-control" placeholder="Diagnosa Praoperasi"  required autocomplete="off"><?=$result['diagnosa_praoperasi']?></textarea>
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
                          <textarea style="height: 100px" type="text" name="rencana_operasi" id="rencana_operasi" class="form-control" placeholder="Rencana Operasi"  required autocomplete="off"><?=$result['rencana_operasi']?></textarea>
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
                          <input type="text" name="estimasi_waktu" id="estimasi_waktu" class="form-control" placeholder="Estimasi Waktu" value="<?=$result['estimasi_waktu']?>" required autocomplete="off">
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
                         <textarea style="height: 100px" type="text" name="premedikasi" id="premedikasi" class="form-control" placeholder="Premedikasi"  required autocomplete="off"><?=$result['premedikasi']?></textarea>
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
                            <input type='hidden' value="<?=$result['coretan_perawat_ruang_rawat_inap']?>" id='generate_perawat_ruang_rawat_inap' name="coretan_perawat_ruang_rawat_inap" required ><br/>
                            <br>
                            <br>
                            <input type="text" name="nama_perawat_ruang_rawat_inap" value="<?=$result['nama_perawat_ruang_rawat_inap']?>" class="form-control" placeholder="Nama Perawat R.Rawat Inap"  required autocomplete="off">
                            <br>
                        </div>
                      </div> 
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
                                        <input type="radio" name="ruangan_rekam_medik_pasien" value="ada" <?= $result['ruangan_rekam_medik_pasien'] == 'ada' ? 'checked' : ''; ?> required >
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
                                        <input type="radio" name="ruangan_rekam_medik_pasien" value="tdk" <?= $result['ruangan_rekam_medik_pasien'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                          <input type="radio" name="ok_rekam_medik_pasien" value="ada" <?= $result['ok_rekam_medik_pasien'] == 'ada' ? 'checked' : ''; ?> required >
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
                                          <input type="radio" name="ok_rekam_medik_pasien" value="tdk" <?= $result['ok_rekam_medik_pasien'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                            <input type="radio" name="ruangan_informed_consent_operasi" <?= $result['ruangan_informed_consent_operasi'] == 'ada' ? 'checked' : ''; ?> value="ada" required >
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
                                            <input type="radio" name="ruangan_informed_consent_operasi" <?= $result['ruangan_informed_consent_operasi'] == 'tdk' ? 'checked' : ''; ?> value="tdk" required >
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
                                              <input type="radio" name="ok_informed_consent_operasi" <?= $result['ok_informed_consent_operasi'] == 'ada' ? 'checked' : ''; ?> value="ada" required >
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
                                              <input type="radio" name="ok_informed_consent_operasi" value="tdk" <?= $result['ok_informed_consent_operasi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                <input type="radio" name="ruangan_informed_consent_anestesi" value="ada"  <?= $result['ruangan_informed_consent_anestesi'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                <input type="radio" name="ruangan_informed_consent_anestesi" value="tdk"  <?= $result['ruangan_informed_consent_anestesi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                  <input type="radio" name="ok_informed_consent_anestesi" value="ada" <?= $result['ok_informed_consent_anestesi'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                  <input type="radio" name="ok_informed_consent_anestesi" value="tdk" <?= $result['ok_informed_consent_anestesi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                    <input type="radio" name="ruangan_hasil_laboratorium" value="ada" <?= $result['ruangan_hasil_laboratorium'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                    <input type="radio" name="ruangan_hasil_laboratorium" value="tdk" <?= $result['ruangan_hasil_laboratorium'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                      <input type="radio" name="ok_hasil_laboratorium" value="ada"  <?= $result['ok_hasil_laboratorium'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                      <input type="radio" name="ok_hasil_laboratorium" value="tdk" <?= $result['ok_hasil_laboratorium'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                        <input type="radio" name="ruangan_hasil_radiologi" value="ada" <?= $result['ruangan_hasil_radiologi'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                        <input type="radio" name="ruangan_hasil_radiologi" value="tdk" <?= $result['ruangan_hasil_radiologi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                          <input type="radio" name="ok_hasil_radiologi" value="ada" <?= $result['ok_hasil_radiologi'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                          <input type="radio" name="ok_hasil_radiologi" value="tdk" <?= $result['ok_hasil_radiologi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                            <input type="radio" name="ruangan_hasil_ekg" value="ada" <?= $result['ruangan_hasil_ekg'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                            <input type="radio" name="ruangan_hasil_ekg" value="tdk" <?= $result['ruangan_hasil_ekg'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                              <input type="radio" name="ok_hasil_ekg" value="ada" <?= $result['ok_hasil_ekg'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                              <input type="radio" name="ok_hasil_ekg" value="tdk" <?= $result['ok_hasil_ekg'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                <input type="radio" name="ruangan_hasil_ctg" value="ada" <?= $result['ruangan_hasil_ctg'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                                <input type="radio" name="ruangan_hasil_ctg" value="tdk" <?= $result['ruangan_hasil_ctg'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ok_hasil_ctg" value="ada" <?= $result['ok_hasil_ctg'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ok_hasil_ctg" value="tdk" <?= $result['ok_hasil_ctg'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ruangan_daftar_terapi" value="ada" <?= $result['ruangan_hasil_ctg'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ruangan_daftar_terapi" value="tdk" <?= $result['ruangan_daftar_terapi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                      <input type="radio" name="ok_daftar_terapi" value="ada" <?= $result['ok_daftar_terapi'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                                      <input type="radio" name="ok_daftar_terapi" value="tdk" <?= $result['ok_daftar_terapi'] == 'tdk' ? 'checked' : ''; ?>  required >
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
                                                                        <input type="radio" name="ruangan_catatan_keperawatan" value="ada" <?= $result['ruangan_catatan_keperawatan'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                                        <input type="radio" name="ruangan_catatan_keperawatan" value="tdk" <?= $result['ruangan_catatan_keperawatan'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                          <input type="radio" name="ok_catatan_keperawatan" value="ada" <?= $result['ok_catatan_keperawatan'] == 'ada' ? 'checked' : ''; ?> required >
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
                                                                          <input type="radio" name="ok_catatan_keperawatan" value="tdk" <?= $result['ok_catatan_keperawatan'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                            <input type="radio" name="ruangan_periksa_keadaan_umum" value="ya" <?= $result['ruangan_periksa_keadaan_umum'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                            <input type="radio" name="ruangan_periksa_keadaan_umum" value="tdk" <?= $result['ruangan_periksa_keadaan_umum'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                              <input type="radio" name="ok_periksa_keadaan_umum" value="ya" <?= $result['ok_periksa_keadaan_umum'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                              <input type="radio" name="ok_periksa_keadaan_umum" value="tdk" <?= $result['ok_periksa_keadaan_umum'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ruangan_periksa_vital_sign" value="ya"  <?= $result['ruangan_periksa_vital_sign'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ruangan_periksa_vital_sign" value="tdk"  <?= $result['ruangan_periksa_vital_sign'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                      <input type="radio" name="ok_periksa_vital_sign" value="ya" <?= $result['ok_periksa_vital_sign'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                      <input type="radio" name="ok_periksa_vital_sign" value="tdk" <?= $result['ok_periksa_vital_sign'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                        <input type="radio" name="ruangan_gelang_identitas" value="ya" <?= $result['ruangan_gelang_identitas'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                        <input type="radio" name="ruangan_gelang_identitas" value="tdk" <?= $result['ruangan_gelang_identitas'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                          <input type="radio" name="ok_gelang_identitas" value="ya" <?= $result['ok_gelang_identitas'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                          <input type="radio" name="ok_gelang_identitas" value="tdk" <?= $result['ok_gelang_identitas'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                            <input type="radio" name="ruangan_identifikasi_alergi" value="ya" <?= $result['ruangan_identifikasi_alergi'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                            <input type="radio" name="ruangan_identifikasi_alergi" value="tdk" <?= $result['ruangan_identifikasi_alergi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                              <input type="radio" name="ok_identifikasi_alergi" value="ya" <?= $result['ok_identifikasi_alergi'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                              <input type="radio" name="ok_identifikasi_alergi" value="tdk" <?= $result['ok_identifikasi_alergi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input style="width: 100px" type="text" name="desc_puasa" value="<?= $result['desc_puasa'] ?>" <?= $result['desc_puasa'] ?> id="puasa" class="form-control" placeholder="puasa jam"  required autocomplete="off">
                                                                </div>
                                                              </td>
                                                              <td class="bd text-left">
                                                                <div class="row">
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_puasa" value="ya" <?= $result['ruangan_puasa'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                        <input type="radio" name="ruangan_puasa" value="tdk" <?= $result['ruangan_puasa'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                          <input type="radio" name="ok_puasa" value="ya" <?= $result['ok_puasa'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                          <input type="radio" name="ok_puasa" value="tdk" <?= $result['ok_puasa'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_mandi" value="ya" <?= $result['ruangan_mandi'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_mandi" value="tdk" <?= $result['ruangan_mandi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_mandi" value="ya" <?= $result['ok_mandi'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_mandi" value="tdk" <?= $result['ok_mandi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_oral" value="ya" <?= $result['ruangan_oral'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_oral" value="tdk" <?= $result['ruangan_oral'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_oral" value="ya" <?= $result['ok_oral'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_oral" value="tdk" <?= $result['ok_oral'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_cukur_daerah_operasi" value="ya" <?= $result['ruangan_cukur_daerah_operasi'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_cukur_daerah_operasi" value="tdk" <?= $result['ruangan_cukur_daerah_operasi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_cukur_daerah_operasi" value="ya" <?= $result['ok_cukur_daerah_operasi'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_cukur_daerah_operasi" value="tdk" <?= $result['ok_cukur_daerah_operasi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_make_up" value="ya" <?= $result['ruangan_make_up'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_make_up" value="tdk" <?= $result['ruangan_make_up'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_make_up" value="ya" <?= $result['ok_make_up'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_make_up" value="tdk" <?= $result['ok_make_up'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_lepas_aksesoris" value="ya" <?= $result['ruangan_lepas_aksesoris'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_lepas_aksesoris" value="tdk" <?= $result['ruangan_lepas_aksesoris'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_lepas_aksesoris" value="ya" <?= $result['ok_lepas_aksesoris'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_lepas_aksesoris" value="tdk" <?= $result['ok_lepas_aksesoris'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_lepas_alat_bantu" value="ya" <?= $result['ruangan_lepas_alat_bantu'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_lepas_alat_bantu" value="tdk" <?= $result['ruangan_lepas_alat_bantu'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_lepas_alat_bantu" value="ya" <?= $result['ok_lepas_alat_bantu'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_lepas_alat_bantu" value="tdk" <?= $result['ok_lepas_alat_bantu'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_pemasangan_iv_line" value="ya" <?= $result['ruangan_pemasangan_iv_line'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                  <input type="radio" name="ruangan_pemasangan_iv_line" value="tdk" <?= $result['ruangan_pemasangan_iv_line'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_pemasangan_iv_line" value="ya" <?= $result['ok_pemasangan_iv_line'] == 'ya' ? 'checked' : ''; ?> required >
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
                                                                    <input type="radio" name="ok_pemasangan_iv_line" value="tdk" <?= $result['ok_pemasangan_iv_line'] == 'tdk' ? 'checked' : ''; ?> required >
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
                <input type="radio" name="ruangan_pemberian_premedikasi" value="ya" <?= $result['ruangan_pemberian_premedikasi'] == 'ya' ? 'checked' : ''; ?> required >
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
                <input type="radio" name="ruangan_pemberian_premedikasi" value="tdk" <?= $result['ruangan_pemberian_premedikasi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                  <input type="radio" name="ok_pemberian_premedikasi" value="ya" <?= $result['ok_pemberian_premedikasi'] == 'ya' ? 'checked' : ''; ?> required >
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
                  <input type="radio" name="ok_pemberian_premedikasi" value="tdk" <?= $result['ok_pemberian_premedikasi'] == 'tdk' ? 'checked' : ''; ?> required >
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
                <input type="radio" name="ruangan_pemasangan_kateter_urin" value="ya" <?= $result['ruangan_pemasangan_kateter_urin'] == 'ya' ? 'checked' : ''; ?> required >
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
                <input type="radio" name="ruangan_pemasangan_kateter_urin" value="tdk" <?= $result['ruangan_pemasangan_kateter_urin'] == 'tdk' ? 'checked' : ''; ?> required >
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
                  <input type="radio" name="ok_pemasangan_kateter_urin" value="ya" <?= $result['ok_pemasangan_kateter_urin'] == 'ya' ? 'checked' : ''; ?> required >
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
                  <input type="radio" name="ok_pemasangan_kateter_urin" value="tdk" <?= $result['ok_pemasangan_kateter_urin'] == 'tdk' ? 'checked' : ''; ?> required >
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
                    <input type="radio" name="ruangan_pemasangan_ngt" value="ya" <?= $result['ruangan_pemasangan_ngt'] == 'ya' ? 'checked' : ''; ?> required >
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
                    <input type="radio" name="ruangan_pemasangan_ngt" value="tdk" <?= $result['ruangan_pemasangan_ngt'] == 'tdk' ? 'checked' : ''; ?> required >
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
                      <input type="radio" name="ok_pemasangan_ngt" value="ya" <?= $result['ok_pemasangan_ngt'] == 'ya' ? 'checked' : ''; ?> required >
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
                      <input type="radio" name="ok_pemasangan_ngt" value="tdk" <?= $result['ok_pemasangan_ngt'] == 'tdk' ? 'checked' : ''; ?> required >
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
                        <input type="radio" name="ruangan_latihan_nafas_dalam" value="ya" <?= $result['ruangan_latihan_nafas_dalam'] == 'ya' ? 'checked' : ''; ?> required >
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
                        <input type="radio" name="ruangan_latihan_nafas_dalam" value="tdk" <?= $result['ruangan_latihan_nafas_dalam'] == 'tdk' ? 'checked' : ''; ?> required >
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
                          <input type="radio" name="ok_latihan_nafas_dalam" value="ya" <?= $result['ok_latihan_nafas_dalam'] == 'ya' ? 'checked' : ''; ?> required >
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
                          <input type="radio" name="ok_latihan_nafas_dalam" value="tdk" <?= $result['ok_latihan_nafas_dalam'] == 'tdk' ? 'checked' : ''; ?> required >
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
                            <input type="radio" name="ruangan_latihan_batuk_efektif" value="ya" <?= $result['ruangan_latihan_batuk_efektif'] == 'ya' ? 'checked' : ''; ?> required >
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
                            <input type="radio" name="ruangan_latihan_batuk_efektif" value="tdk" <?= $result['ruangan_latihan_batuk_efektif'] == 'tdk' ? 'checked' : ''; ?> required >
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
                              <input type="radio" name="ok_latihan_batuk_efektif" value="ya" <?= $result['ok_latihan_batuk_efektif'] == 'ya' ? 'checked' : ''; ?> required >
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
                              <input type="radio" name="ok_latihan_batuk_efektif" value="tdk" <?= $result['ok_latihan_batuk_efektif'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                <input type="radio" name="ruangan_kebutuhan_darah" value="ya" <?= $result['ruangan_kebutuhan_darah'] == 'ya' ? 'checked' : ''; ?> required >
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
                                <input type="radio" name="ruangan_kebutuhan_darah" value="tdk" <?= $result['ruangan_kebutuhan_darah'] == 'tdk' ? 'checked' : ''; ?> required >
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
                                  <input type="radio" name="ok_kebutuhan_darah" value="ya" <?= $result['ok_kebutuhan_darah'] == 'ya' ? 'checked' : ''; ?> required >
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
                                  <input type="radio" name="ok_kebutuhan_darah" value="tdk" <?= $result['ok_kebutuhan_darah'] == 'tdk' ? 'checked' : ''; ?> required >
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
                            <textarea type="text" name="nama_prosedur" id="nama_prosedur" class="form-control" placeholder="Nama Prosedur"  required autocomplete="off"><?=$result['nama_prosedur']?></textarea>
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>
                      
                        <div class="row">
                          <div class="col-md-12 font-weight-bold"><b>Pria</b></div>
                          <div class="col-md-12">
                            <div class="row">

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">H. sebelumnya :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kanan</div>
                                <div class="col-md-6">Kiri</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bmf"><img src="<?=$result['body_man_front']?>" alt=""></div></div>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">G. Baru :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kanan</div>
                                <div class="col-md-6">Kiri</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bmf"><canvas id="body-man-front" width="250px" height="600px"></canvas></div></div>
                                <input type="hidden" id="generate-body-man-front" name="body_man_front" value="<?=$result['body_man_front']?>">
                                <div class="col-md-6"><button id="undo-body-man-front">undo</button></div>
                                <div class="col-md-6"><button id="clear-body-man-front">clear</button></div>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">H. sebelumnya :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kiri</div>
                                <div class="col-md-6">Kanan</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bmb"><img src="<?=$result['body_man_back']?>" alt=""></div></div>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">G. Baru :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kiri</div>
                                <div class="col-md-6">Kanan</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bmb"><canvas  id="body-man-back" width="250px" height="600px"></div></div>
                                <input type="hidden" id="generate-body-man-back" name="body_man_back" value="<?=$result['body_man_back']?>">
                                <div class="col-md-6"><button id="undo-body-man-back">undo</button></div>
                                <div class="col-md-6"><button id="clear-body-man-back">clear</button></div>
                              </div>
                            </div>
                              
                            </div>
                          </div>
                        </div>

                        
                        
                        <div class="row">
                          <div class="col-md-12 font-weight-bold"><b>Wanita</b></div>
                          <div class="col-md-12">
                            <div class="row">

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">H. sebelumnya :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kanan</div>
                                <div class="col-md-6">Kiri</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bwf"><img src="<?=$result['body_woman_front']?>" alt=""></div></div>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">G. Baru :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kanan</div>
                                <div class="col-md-6">Kiri</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bwf"><canvas id="body-woman-front" width="250px" height="600px"></canvas></div></div>
                                <input type="hidden" id="generate-body-woman-front" name="body_woman_front" value="<?=$result['body_woman_front']?>">
                                <div class="col-md-6"><button id="undo-body-woman-front">undo</button></div>
                                <div class="col-md-6"><button id="clear-body-woman-front">clear</button></div>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">H. sebelumnya :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kiri</div>
                                <div class="col-md-6">Kanan</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bwb"><img src="<?=$result['body_woman_back']?>" alt=""></div></div>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="row">
                                <div class="col-md-12">G. Baru :</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">Kiri</div>
                                <div class="col-md-6">Kanan</div>
                              </div>
                              <div class="row">
                                <div class="col-md-12"><div class="signature-bwb"><canvas id="body-woman-back" width="250px" height="600px"></canvas></div></div>
                                <input type="hidden" id="generate-body-woman-back" name="body_woman_back" value="<?=$result['body_woman_back']?>">
                                <div class="col-md-6"><button id="undo-body-woman-back">undo</button></div>
                                <div class="col-md-6"><button id="clear-body-woman-back">clear</button></div>
                              </div>
                            </div>
                              
                            </div>
                          </div>
                        </div>
                        <br>
                        <br>
                        
                        <div class="row">
                          <div class="col-md-10">
                            <div class="row">
                              <div class="col-md-12 text-center"><b>Palmar (anterior)</b></div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-phkiri"><img src="<?=$result["palmar_hand_kiri"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-phkiri"><canvas id="palmar-hand-kiri" width="200px" height="300px"></div> </div>
                                  <input type="hidden" id="generate-palmar-hand-kiri" name="palmar_hand_kiri" value="<?=$result["palmar_hand_kiri"]?>">
                                  <div class="col-md-6"><button id="undo-palmar-hand-kiri">undo</button></div>
                                  <div class="col-md-6"><button id="clear-palmar-hand-kiri">clear</button></div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-phkanan"><img src="<?=$result["palmar_hand_kanan"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-phkanan"><canvas id="palmar-hand-kanan"  width="200px" height="300px"></div> </div>
                                  <input type="hidden" id="generate-palmar-hand-kanan" name="palmar_hand_kanan" value="<?=$result["palmar_hand_kanan"]?>">
                                  <div class="col-md-6"><button id="undo-palmar-hand-kanan">undo</button></div>
                                <div class="col-md-6"><button id="clear-palmar-hand-kanan">clear</button></div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                          <div class="col-md-10">
                            <div class="row">
                              <div class="col-md-12 text-center"><b>Dorsal (posterior)</b></div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-dorkiri"><img src="<?=$result["dorsal_kiri"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-dorkiri"><canvas id="dorsal-kiri" width="200px" height="300px"></div> </div>
                                  <input type="hidden" id="generate-dorsal-kiri" name="dorsal_kiri" value="<?=$result["dorsal_kiri"]?>">
                                  <div class="col-md-6"><button id="undo-dorsal-kiri">undo</button></div>
                                  <div class="col-md-6"><button id="clear-dorsal-kiri">clear</button></div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-dorkanan"><img src="<?=$result["dorsal_kanan"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-dorkanan"><canvas id="dorsal-kanan"  width="200px" height="300px"></div> </div>
                                  <input type="hidden" id="generate-dorsal-kanan" name="dorsal_kanan" value="<?=$result["dorsal_kanan"]?>">
                                  <div class="col-md-6"><button id="undo-dorsal-kanan">undo</button></div>
                                <div class="col-md-6"><button id="clear-dorsal-kanan">clear</button></div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <br>
                        <br>

                        
                        <div class="row">
                          <div class="col-md-10">
                            <div class="row">
                              <div class="col-md-12 text-center"><b>Plantar (posterior)</b></div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-pkanan"><img src="<?=$result["plantar_kanan"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-pkanan"><canvas id="plantar-kanan" width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-plantar-kanan" name="plantar_kanan" value="<?=$result["plantar_kanan"]?>">
                                  <div class="col-md-6"><button id="undo-plantar-kanan">undo</button></div>
                                  <div class="col-md-6"><button id="clear-plantar-kanan">clear</button></div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-pkiri"><img src="<?=$result["plantar_kiri"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-pkiri"><canvas id="plantar-kiri"  width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-plantar-kiri" name="plantar_kiri" value="<?=$result["plantar_kiri"]?>">
                                  <div class="col-md-6"><button id="undo-plantar-kiri">undo</button></div>
                                <div class="col-md-6"><button id="clear-plantar-kiri">clear</button></div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-10">
                            <div class="row">
                              <div class="col-md-12 text-center"><b>palmar (anterior)</b></div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-pfkiri"><img src="<?=$result["palmar_feet_kiri"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-pfkiri"><canvas id="palmar-feet-kiri" width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-palmar-feet-kiri" name="palmar_feet_kiri" value="<?=$result["palmar_feet_kiri"]?>">
                                  <div class="col-md-6"><button id="undo-palmar-feet-kiri">undo</button></div>
                                  <div class="col-md-6"><button id="clear-palmar-feet-kiri">clear</button></div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-pfkanan"><img src="<?=$result["palmar_feet_kanan"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-pfkanan"><canvas id="palmar-feet-kanan"  width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-palmar-feet-kanan" name="palmar_feet_kanan" value="<?=$result["palmar_feet_kanan"]?>">
                                  <div class="col-md-6"><button id="undo-palmar-feet-kanan">undo</button></div>
                                <div class="col-md-6"><button id="clear-palmar-feet-kanan">clear</button></div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>


                        <br>
                        <br>
                        <div class="row">
                          <div class="col-md-10">

                            <div class="row">
                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-hkiri"><img src="<?=$result["head_kiri"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kiri</div>
                                  <div class="col-md-12"><div class="signature-hkiri"><canvas id="head-kiri" width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-head-kiri" name="head_kiri" value="<?=$result["head_kiri"]?>">
                                  <div class="col-md-6"><button id="undo-head-kiri">undo</button></div>
                                  <div class="col-md-6"><button id="clear-head-kiri">clear</button></div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-hkanan"><img src="<?=$result["head_kanan"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-12">Kanan</div>
                                  <div class="col-md-12"><div class="signature-hkanan"><canvas id="head-kanan"  width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-head-kanan" name="head_kanan" value="<?=$result["head_kanan"]?>">
                                  <div class="col-md-6"><button id="undo-head-kanan">undo</button></div>
                                <div class="col-md-6"><button id="clear-head-kanan">clear</button></div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>


                        <br>
                        <br>
                        <div class="row">
                          <div class="col-md-10">

                            <div class="row">
                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">H. Sebelumnya:</div>
                                  <div class="col-md-6">kanan</div>
                                  <div class="col-md-6">Kiri</div>
                                  <div class="col-md-12"><div class="signature-hf"><img src="<?=$result["head_front"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Baru:</div>
                                  <div class="col-md-6">kanan</div>
                                  <div class="col-md-6">Kiri</div>
                                  <div class="col-md-12"><div class="signature-hf"><canvas id="head-front" width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-head-front" name="head_front" value="<?=$result["head_front"]?>">
                                  <div class="col-md-6"><button id="undo-head-front">undo</button></div>
                                  <div class="col-md-6"><button id="clear-head-front">clear</button></div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                <div class="col-md-12">H. Sebelumnya:</div>
                                <div class="col-md-6">Kiri</div>
                                  <div class="col-md-6">kanan</div>
                                  <div class="col-md-12"><div class="signature-hb"><img src="<?=$result["head_back"]?>" alt=""></div> </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="row">
                                  <div class="col-md-12">G. Ba ru:</div>
                                  <div class="col-md-6">Kiri</div>    
                                  <div class="col-md-6">kanan</div>
                                  <div class="col-md-12"><div class="signature-hb"><canvas id="head-back"  width="200px" height="450px"></div> </div>
                                  <input type="hidden" id="generate-head-back" name="head_back" value="<?=$result["head_back"]?>">
                                  <div class="col-md-6"><button id="undo-head-back">undo</button></div>
                                <div class="col-md-6"><button id="clear-head-back">clear</button></div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>





                        <br>
                        <br>
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
                                    <input type='hidden' id='generate_wali' value="<?=$result['coretan_wali']?>" name="coretan_wali"  required ><br/>
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
                                    <input type='hidden' id='generate_pasien' value="<?=$result['coretan_pasien']?>" name="coretan_pasien"  required ><br/>
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
                                    <input type='hidden' id='generate_saksi' value="<?=$result['coretan_saksi']?>" name="coretan_saksi"  required >
                                    <br/>
                                    <br>
                                    <input type="text" name="nama_saksi" value=" <?=$result['nama_saksi']?>" class="form-control" placeholder="Saksi"  required autocomplete="off">
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

      $('#form-add-1-<?= $this->router->fetch_class(); ?>').submit(function(e) {
        e.preventDefault();
    // console.log($(this).serialize());
    
    $('.btn-kirim-<?= $this->router->fetch_class(); ?>').attr('disabled', true);

    $.post('<?php echo base_url(); ?>' + class_name + '/edit_process/', $(this).serialize()).done(function(data) {
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
  $(document).ready(function() {

   var signaturePadPerawat_Inap     = new SignaturePad(document.getElementById('signature-pad-perawat_ruang_rawat_inap'));
   var signaturePadWali           = new SignaturePad(document.getElementById('signature-pad-wali'));
   var signaturePadPasien         = new SignaturePad(document.getElementById('signature-pad-pasien'));
   var signaturePadSaksi          = new SignaturePad(document.getElementById('signature-pad-saksi'));

   var bodyManFront = new SignaturePad(document.getElementById('body-man-front'))
   var bodyManBack = new SignaturePad(document.getElementById('body-man-back'))
   var bodyWomanFront = new SignaturePad(document.getElementById('body-woman-front'))
   var bodyWomanBack = new SignaturePad(document.getElementById('body-woman-back'))
   var palmarHandKiri = new SignaturePad(document.getElementById('palmar-hand-kiri'))
   var palmarHandKanan = new SignaturePad(document.getElementById('palmar-hand-kanan'))
   var dorsalKanan = new SignaturePad(document.getElementById('dorsal-kanan'))
   var dorsalKiri = new SignaturePad(document.getElementById('dorsal-kiri'))
   var plantarKanan = new SignaturePad(document.getElementById('plantar-kanan'))
   var plantarKiri = new SignaturePad(document.getElementById('plantar-kiri'))
   var palmarFeetKiri = new SignaturePad(document.getElementById('palmar-feet-kiri'))
   var palmarFeetKanan = new SignaturePad(document.getElementById('palmar-feet-kanan'))
   var headKiri = new SignaturePad(document.getElementById('head-kiri'))
   var headKanan = new SignaturePad(document.getElementById('head-kanan'))
   var headFront = new SignaturePad(document.getElementById('head-front'))
   var headBack = new SignaturePad(document.getElementById('head-back'))



   $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){

      let imgPerawatRuangInap = signaturePadPerawat_Inap.toDataURL('image/png')
      let dataPerawatRuangInap = signaturePadPerawat_Inap.toData()
      if(dataPerawatRuangInap.pop()){
        $('#generate_perawat_ruang_rawat_inap').val(imgPerawatRuangInap)
      }

      let imgWali = signaturePadWali.toDataURL('image/png')
      let dataWali = signaturePadWali.toData()
      if(dataWali.pop()){
        $('#generate_wali').val(imgWali)
      }
      
      let imgPasien = signaturePadPasien.toDataURL('image/png')
      let dataPasien = signaturePadPasien.toData()
      if(dataPasien.pop()){
        $('#generate_pasien').val(imgPasien)
      }

      let imgSaksi = signaturePadSaksi.toDataURL('image/png')
      let dataSaksi = signaturePadSaksi.toData()
      if(dataSaksi.pop()){
        $('#generate_saksi').val(imgSaksi)
      }

      let imgBodyManFront = bodyManFront.toDataURL('image/png')
      let dataBodyManFront = bodyManFront.toData()
      if(dataBodyManFront.pop()){
        $('#generate-body-man-front').val(imgBodyManFront)
      }

      let imgBodyManBack = bodyManBack.toDataURL('image/png')
      let dataBodyManBack = bodyManBack.toData()
      if(dataBodyManBack.pop()){
        $('#generate-body-man-back').val(imgBodyManBack)
      }

      let imgBodyWomanFront = bodyWomanFront.toDataURL('image/png')
      let dataBodyWomanFront = bodyWomanFront.toData()
      if(dataBodyWomanFront.pop()){
        $('#generate-body-woman-front').val(imgBodyWomanFront)
      }

      let imgBodyWomanBack = bodyWomanBack.toDataURL('image/png')
      let dataBodyWomanBack = bodyWomanBack.toData()
      if(dataBodyWomanBack.pop()){
        $('#generate-body-woman-back').val(imgBodyWomanBack)
      }

      let imgPalmarHandKiri = palmarHandKiri.toDataURL('image/png')
      let dataPalmarHandKiri = palmarHandKiri.toData()
      if(dataPalmarHandKiri.pop()){
        $('#generate-palmar-hand-kiri').val(imgPalmarHandKiri)
      }

      let imgPalmarHandKanan = palmarHandKanan.toDataURL('image/png')
      let dataPalmarHandKanan = palmarHandKanan.toData()
      if(dataPalmarHandKanan.pop()){
        $('#generate-palmar-hand-kanan').val(imgPalmarHandKanan)
      }

      let imgDorsalKanan = dorsalKanan.toDataURL('image/png')
      let dataDorsalKanan = dorsalKanan.toData()
      if(dataDorsalKanan.pop()){
        $('#generate-dorsal-kanan').val(imgDorsalKanan)
      }

      let imgDorsalKiri = dorsalKiri.toDataURL('image/png')
      let dataDorsalKiri = dorsalKiri.toData()
      if(dataDorsalKiri.pop()){
        $('#generate-dorsal-kiri').val(imgDorsalKiri)
      }

      let imgPlantarKiri = plantarKiri.toDataURL('image/png')
      let dataPlantarKiri = plantarKiri.toData()
      if(dataPlantarKiri.pop()){
        $('#generate-plantar-kiri').val(imgPlantarKiri)
      }

      let imgPlantarKanan = plantarKanan.toDataURL('image/png')
      let dataPlantarKanan = plantarKanan.toData()
      if(dataPlantarKanan.pop()){
        $('#generate-plantar-kanan').val(imgPlantarKanan)
      }

      
      let imgPalmarFeetKiri = palmarFeetKiri.toDataURL('image/png')
      let dataPalmarFeetKiri = palmarFeetKiri.toData()
      if(dataPalmarFeetKiri.pop()){
        $('#generate-palmar-feet-kiri').val(imgPalmarFeetKiri)
      }

      let imgPalmarFeetKanan = palmarFeetKanan.toDataURL('image/png')
      let dataPalmarFeetKanan = palmarFeetKanan.toData()
      if(dataPalmarFeetKanan.pop()){
        $('#generate-palmar-feet-kanan').val(imgPalmarFeetKanan)
      }

      let imgHeadKiri = headKiri.toDataURL('image/png')
      let dataHeadKiri = headKiri.toData()
      if(dataHeadKiri.pop()){
        $('#generate-head-kiri').val(imgHeadKiri)
      }

      let imgHeadKanan = headKanan.toDataURL('image/png')
      let dataHeadKanan = headKanan.toData()
      if(dataHeadKanan.pop()){
        $('#generate-head-kanan').val(imgHeadKanan)
      }

      let imgHeadFront = headFront.toDataURL('image/png')
      let dataHeadFront = headFront.toData()
      if(dataHeadFront.pop()){
        $('#generate-head-front').val(imgHeadFront)
      }
      
      let imgHeadBack = headBack.toDataURL('image/png')
      let dataHeadBack = headBack.toData()
      if(dataHeadBack.pop()){
        $('#generate-head-back').val(imgHeadBack)
      }

  });



  $('#undo-body-man-front').click(function(e){
    e.preventDefault()
    let data = bodyManFront.toData()
    if(data){
      data.pop()
      bodyManFront.fromData(data)
    }
  })

  $('#clear-body-man-front').click(function(e){
    e.preventDefault()
    bodyManFront.clear()
  })

  $('#undo-body-man-back').click(function(e){
    e.preventDefault()
    let data = bodyManBack.toData()
    if(data){
      data.pop()
      bodyManBack.fromData(data)
    }
  })

  $('#clear-body-man-back').click(function(e){
    e.preventDefault()
    bodyManBack.clear()
  })

  $('#undo-body-woman-front').click(function(e){
    e.preventDefault()
    let data = bodyWomanFront.toData()
    if(data){
      data.pop()
      bodyWomanFront.fromData(data)
    }
  })

  $('#clear-body-woman-front').click(function(e){
    e.preventDefault()
    bodyWomanFront.clear()
  })

  $('#undo-body-woman-back').click(function(e){
    e.preventDefault()
    let data = bodyWomanBack.toData()
    if(data){
      data.pop()
      bodyWomanBack.fromData(data)
    }
  })

  $('#clear-body-woman-back').click(function(e){
    e.preventDefault()
    bodyWomanBack.clear()
  })

  $('#undo-palmar-hand-kiri').click(function(e){
    e.preventDefault()
    let data = palmarHandKiri.toData()
    if(data){
      data.pop()
      palmarHandKiri.fromData(data)
    }
  })

  $('#clear-palmar-hand-kiri').click(function(e){
    e.preventDefault()
    palmarHandKiri.clear()
  })

  $('#undo-palmar-hand-kanan').click(function(e){
    e.preventDefault()
    let data = palmarHandKanan.toData()
    if(data){
      data.pop()
      palmarHandKanan.fromData(data)
    }
  })

  $('#clear-palmar-hand-kanan').click(function(e){
    e.preventDefault()
    palmarHandKanan.clear()
  })

  $('#undo-dorsal-kanan').click(function(e){
    e.preventDefault()
    let data = dorsalKanan.toData()
    if(data){
      data.pop()
      dorsalKanan.fromData(data)
    }
  })

  $('#clear-dorsal-kanan').click(function(e){
    e.preventDefault()
    dorsalKanan.clear()
  })

  $('#undo-dorsal-kiri').click(function(e){
    e.preventDefault()
    let data = dorsalKiri.toData()
    if(data){
      data.pop()
      dorsalKiri.fromData(data)
    }
  })

  $('#clear-dorsal-kiri').click(function(e){
    e.preventDefault()
    dorsalKiri.clear()
  })

  $('#undo-plantar-kiri').click(function(e){
    e.preventDefault()
    let data = plantarKiri.toData()
    if(data){
      data.pop()
      plantarKiri.fromData(data)
    }
  })

  $('#clear-plantar-kiri').click(function(e){
    e.preventDefault()
    plantarKiri.clear()
  })

  $('#undo-plantar-kanan').click(function(e){
    e.preventDefault()
    let data = plantarKanan.toData()
    if(data){
      data.pop()
      plantarKanan.fromData(data)
    }
  })

  $('#clear-plantar-kanan').click(function(e){
    e.preventDefault()
    plantarKanan.clear()
  })
  
  $('#undo-palmar-feet-kiri').click(function(e){
    e.preventDefault()
    let data = palmarFeetKiri.toData()
    if(data){
      data.pop()
      palmarFeetKiri.fromData(data)
    }
  })

  $('#clear-palmar-feet-kiri').click(function(e){
    e.preventDefault()
    palmarFeetKiri.clear()
  })

  $('#undo-palmar-feet-kanan').click(function(e){
    e.preventDefault()
    let data = palmarFeetKanan.toData()
    if(data){
      data.pop()
      palmarFeetKanan.fromData(data)
    }
  })

  $('#clear-palmar-feet-kanan').click(function(e){
    e.preventDefault()
    palmarFeetKanan.clear()
  })

  $('#undo-head-kiri').click(function(e){
    e.preventDefault()
    let data = headKiri.toData()
    if(data){
      data.pop()
      headKiri.fromData(data)
    }
  })

  $('#clear-head-kiri').click(function(e){
    e.preventDefault()
    headKiri.clear()
  })

  $('#undo-head-kanan').click(function(e){
    e.preventDefault()
    let data = headKanan.toData()
    if(data){
      data.pop()
      headKanan.fromData(data)
    }
  })

  $('#clear-head-kanan').click(function(e){
    e.preventDefault()
    headKanan.clear()
  })

  $('#undo-head-front').click(function(e){
    e.preventDefault()
    let data = headFront.toData()
    if(data){
      data.pop()
      headFront.fromData(data)
    }
  })

  $('#clear-head-front').click(function(e){
    e.preventDefault()
    headFront.clear()
  })

  $('#undo-head-back').click(function(e){
    e.preventDefault()
    let data = headBack.toData()
    if(data){
      data.pop()
      headBack.fromData(data)
    }
  })

  $('#clear-head-back').click(function(e){
    e.preventDefault()
    headBack.clear()
  })

})


</script>