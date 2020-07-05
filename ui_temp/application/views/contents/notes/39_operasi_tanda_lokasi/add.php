
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
                  <b>Perawat Ok</b>
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
                <div class="col-md-4">
                  <b>Dokter Operator</b>
                </div>
                <div class="col-md-8">
                  <select name="dokter_approved" class="petugas_approved" style="width: 100%" required>
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
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><center>Operasi Tanda Lokasi</center></div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2">
                          <b>Nama Pasien</b>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien"  required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <b>Nama Wali</b>
                        </div>
                        <div class="col-md-4">
                          <input type="text" name="nama_wali" id="nama_wali" class="form-control" placeholder="Nama Wali"  required autocomplete="off">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-2">
                          <br>
                          <b>No RM</b>
                        </div>
                        <div class="col-md-4">
                          <br>
                          <input type="text" name="no_rm" id="no_rm" class="form-control" placeholder="No. RM"  required autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Usia</b>
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="usia_wali" id="usia_wali" class="form-control" placeholder="Usia Wali"  required autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Jenis Kelamin</b>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>L
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_wali" value="L" required >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>P
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_wali" value="P" required >
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
                          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= date('Y-m-d') ?>"  required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                          <br>
                          <b>Hubungan</b>
                        </div>
                        <div class="col-md-4">
                          <br>
                          <input type="text" name="hubungan_wali" id="hubungan_wali" class="form-control" placeholder="Hubungan Wali"  required autocomplete="off">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-1">
                          <br>
                          <b>Usia</b>
                        </div>
                        <div class="col-md-2">
                          <br>
                          <input type="text" name="usia_pasien" id="usia_pasien" class="form-control" placeholder="Usia Pasien"  required autocomplete="off">
                        </div>
                        <div class="col-md-1">
                          <br>
                          <b>Jenis Kelamin</b>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>L
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_pasien" value="L" required >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="text-center" style="padding-left: 0px"><br>P
                            <label class="container radio-select" style="width: 2%">
                              <input type="radio" name="jenis_kelamin_pasien" value="P" required >
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
                          <textarea style="height: 100px" type="text" name="anamnesis" id="anamnesis" class="form-control" placeholder="Anamnesis"  required autocomplete="off"></textarea>
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
                          <textarea style="height: 100px" type="text" name="pemeriksaan_fisik" id="pemeriksaan_fisik" class="form-control" placeholder="Pemeriksaan Fisik"  required autocomplete="off"></textarea>
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
                          <textarea style="height: 100px" type="text" name="catatan_alergi" id="catatan_alergi" class="form-control" placeholder="Catatan Alergi"  required autocomplete="off"></textarea>
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
                          <textarea style="height: 100px" type="text" name="diagnosa_praoperasi" id="diagnosa_praoperasi" class="form-control" placeholder="Diagnosa Praoperasi"  required autocomplete="off"></textarea>
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
                          <textarea style="height: 100px" type="text" name="rencana_operasi" id="rencana_operasi" class="form-control" placeholder="Rencana Operasi"  required autocomplete="off"></textarea>
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
                          <input type="text" name="estimasi_waktu" id="estimasi_waktu" class="form-control" placeholder="Estimasi Waktu"  required autocomplete="off">
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
                         <textarea style="height: 100px" type="text" name="premedikasi" id="premedikasi" class="form-control" placeholder="Premedikasi"  required autocomplete="off"></textarea>
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
                            <input type='hidden' id='generate_perawat_ruang_rawat_inap' name="coretan_perawat_ruang_rawat_inap" value='' required ><br/>
                            <br>
                            <br>
                            <input type="text" name="nama_perawat_ruang_rawat_inap" class="form-control" placeholder="Nama Perawat R.Rawat Inap"  required autocomplete="off">
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
                                        <input type="radio" name="ruangan_rekam_medik_pasien" value="ada" required >
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
                                        <input type="radio" name="ruangan_rekam_medik_pasien" value="tdk" required >
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
                                          <input type="radio" name="ok_rekam_medik_pasien" value="ada" required >
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
                                          <input type="radio" name="ok_rekam_medik_pasien" value="tdk" required >
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
                                            <input type="radio" name="ruangan_informed_consent_operasi" value="ada" required >
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
                                            <input type="radio" name="ruangan_informed_consent_operasi" value="tdk" required >
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
                                              <input type="radio" name="ok_informed_consent_operasi" value="ada" required >
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
                                              <input type="radio" name="ok_informed_consent_operasi" value="tdk" required >
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
                                                <input type="radio" name="ruangan_informed_consent_anestesi" value="ada" required >
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
                                                <input type="radio" name="ruangan_informed_consent_anestesi" value="tdk" required >
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
                                                  <input type="radio" name="ok_informed_consent_anestesi" value="ada" required >
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
                                                  <input type="radio" name="ok_informed_consent_anestesi" value="tdk" required >
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
                                                    <input type="radio" name="ruangan_hasil_laboratorium" value="ada" required >
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
                                                    <input type="radio" name="ruangan_hasil_laboratorium" value="tdk" required >
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
                                                      <input type="radio" name="ok_hasil_laboratorium" value="ada" required >
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
                                                      <input type="radio" name="ok_hasil_laboratorium" value="tdk" required >
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
                                                        <input type="radio" name="ruangan_hasil_radiologi" value="ada" required >
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
                                                        <input type="radio" name="ruangan_hasil_radiologi" value="tdk" required >
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
                                                          <input type="radio" name="ok_hasil_radiologi" value="ada" required >
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
                                                          <input type="radio" name="ok_hasil_radiologi" value="tdk" required >
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
                                                            <input type="radio" name="ruangan_hasil_ekg" value="ada" required >
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
                                                            <input type="radio" name="ruangan_hasil_ekg" value="tdk" required >
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
                                                              <input type="radio" name="ok_hasil_ekg" value="ada" required >
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
                                                              <input type="radio" name="ok_hasil_ekg" value="tdk" required >
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
                                                                <input type="radio" name="ruangan_hasil_ctg" value="ada" required >
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
                                                                <input type="radio" name="ruangan_hasil_ctg" value="tdk" required >
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
                                                                  <input type="radio" name="ok_hasil_ctg" value="ada" required >
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
                                                                  <input type="radio" name="ok_hasil_ctg" value="tdk" required >
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
                                                                    <input type="radio" name="ruangan_daftar_terapi" value="ada" required >
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
                                                                    <input type="radio" name="ruangan_daftar_terapi" value="tdk" required >
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
                                                                      <input type="radio" name="ok_daftar_terapi" value="ada" required >
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
                                                                      <input type="radio" name="ok_daftar_terapi" value="tdk" required >
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
                                                                        <input type="radio" name="ruangan_catatan_keperawatan" value="ada" required >
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
                                                                        <input type="radio" name="ruangan_catatan_keperawatan" value="tdk" required >
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
                                                                          <input type="radio" name="ok_catatan_keperawatan" value="ada" required >
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
                                                                          <input type="radio" name="ok_catatan_keperawatan" value="tdk" required >
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
                                                                            <input type="radio" name="ruangan_periksa_keadaan_umum" value="ya" required >
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
                                                                            <input type="radio" name="ruangan_periksa_keadaan_umum" value="tdk" required >
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
                                                                              <input type="radio" name="ok_periksa_keadaan_umum" value="ya" required >
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
                                                                              <input type="radio" name="ok_periksa_keadaan_umum" value="tdk" required >
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
                                                                    <input type="radio" name="ruangan_periksa_vital_sign" value="ya" required >
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
                                                                    <input type="radio" name="ruangan_periksa_vital_sign" value="tdk" required >
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
                                                                      <input type="radio" name="ok_periksa_vital_sign" value="ya" required >
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
                                                                      <input type="radio" name="ok_periksa_vital_sign" value="tdk" required >
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
                                                                        <input type="radio" name="ruangan_gelang_identitas" value="ya" required >
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
                                                                        <input type="radio" name="ruangan_gelang_identitas" value="tdk" required >
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
                                                                          <input type="radio" name="ok_gelang_identitas" value="ya" required >
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
                                                                          <input type="radio" name="ok_gelang_identitas" value="tdk" required >
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
                                                                            <input type="radio" name="ruangan_identifikasi_alergi" value="ya" required >
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
                                                                            <input type="radio" name="ruangan_identifikasi_alergi" value="tdk" required >
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
                                                                              <input type="radio" name="ok_identifikasi_alergi" value="ya" required >
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
                                                                              <input type="radio" name="ok_identifikasi_alergi" value="tdk" required >
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
                                                                  <input style="width: 100px" type="text" name="desc_puasa" id="puasa" class="form-control" placeholder="puasa jam"  required autocomplete="off">
                                                                </div>
                                                              </td>
                                                              <td class="bd text-left">
                                                                <div class="row">
                                                                  <div class="col-md-3">
                                                                    <div class="text-center" style="padding-left: 0px"><br>
                                                                      <label class="container radio-select" style="width: 2%">
                                                                        <input type="radio" name="ruangan_puasa" value="ya" required >
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
                                                                        <input type="radio" name="ruangan_puasa" value="tdk" required >
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
                                                                          <input type="radio" name="ok_puasa" value="ya" required >
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
                                                                          <input type="radio" name="ok_puasa" value="tdk" required >
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
                                                                  <input type="radio" name="ruangan_mandi" value="ya" required >
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
                                                                  <input type="radio" name="ruangan_mandi" value="tdk" required >
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
                                                                    <input type="radio" name="ok_mandi" value="ya" required >
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
                                                                    <input type="radio" name="ok_mandi" value="tdk" required >
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
                                                                  <input type="radio" name="ruangan_oral" value="ya" required >
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
                                                                  <input type="radio" name="ruangan_oral" value="tdk" required >
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
                                                                    <input type="radio" name="ok_oral" value="ya" required >
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
                                                                    <input type="radio" name="ok_oral" value="tdk" required >
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
                                                                  <input type="radio" name="ruangan_cukur_daerah_operasi" value="ya" required >
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
                                                                  <input type="radio" name="ruangan_cukur_daerah_operasi" value="tdk" required >
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
                                                                    <input type="radio" name="ok_cukur_daerah_operasi" value="ya" required >
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
                                                                    <input type="radio" name="ok_cukur_daerah_operasi" value="tdk" required >
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
                                                                  <input type="radio" name="ruangan_make_up" value="ya" required >
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
                                                                  <input type="radio" name="ruangan_make_up" value="tdk" required >
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
                                                                    <input type="radio" name="ok_make_up" value="ya" required >
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
                                                                    <input type="radio" name="ok_make_up" value="tdk" required >
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
                                                                  <input type="radio" name="ruangan_lepas_aksesoris" value="ya" required >
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
                                                                  <input type="radio" name="ruangan_lepas_aksesoris" value="tdk" required >
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
                                                                    <input type="radio" name="ok_lepas_aksesoris" value="ya" required >
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
                                                                    <input type="radio" name="ok_lepas_aksesoris" value="tdk" required >
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
                                                                  <input type="radio" name="ruangan_lepas_alat_bantu" value="ya" required >
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
                                                                  <input type="radio" name="ruangan_lepas_alat_bantu" value="tdk" required >
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
                                                                    <input type="radio" name="ok_lepas_alat_bantu" value="ya" required >
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
                                                                    <input type="radio" name="ok_lepas_alat_bantu" value="tdk" required >
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
                                                                  <input type="radio" name="ruangan_pemasangan_iv_line" value="ya" required >
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
                                                                  <input type="radio" name="ruangan_pemasangan_iv_line" value="tdk" required >
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
                                                                    <input type="radio" name="ok_pemasangan_iv_line" value="ya" required >
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
                                                                    <input type="radio" name="ok_pemasangan_iv_line" value="tdk" required >
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
                <input type="radio" name="ruangan_pemberian_premedikasi" value="ya" required >
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
                <input type="radio" name="ruangan_pemberian_premedikasi" value="tdk" required >
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
                  <input type="radio" name="ok_pemberian_premedikasi" value="ya" required >
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
                  <input type="radio" name="ok_pemberian_premedikasi" value="tdk" required >
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
                <input type="radio" name="ruangan_pemasangan_kateter_urin" value="ya" required >
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
                <input type="radio" name="ruangan_pemasangan_kateter_urin" value="tdk" required >
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
                  <input type="radio" name="ok_pemasangan_kateter_urin" value="ya" required >
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
                  <input type="radio" name="ok_pemasangan_kateter_urin" value="tdk" required >
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
                    <input type="radio" name="ruangan_pemasangan_ngt" value="ya" required >
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
                    <input type="radio" name="ruangan_pemasangan_ngt" value="tdk" required >
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
                      <input type="radio" name="ok_pemasangan_ngt" value="ya" required >
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
                      <input type="radio" name="ok_pemasangan_ngt" value="tdk" required >
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
                        <input type="radio" name="ruangan_latihan_nafas_dalam" value="ya" required >
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
                        <input type="radio" name="ruangan_latihan_nafas_dalam" value="tdk" required >
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
                          <input type="radio" name="ok_latihan_nafas_dalam" value="ya" required >
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
                          <input type="radio" name="ok_latihan_nafas_dalam" value="tdk" required >
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
                            <input type="radio" name="ruangan_latihan_batuk_efektif" value="ya" required >
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
                            <input type="radio" name="ruangan_latihan_batuk_efektif" value="tdk" required >
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
                              <input type="radio" name="ok_latihan_batuk_efektif" value="ya" required >
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
                              <input type="radio" name="ok_latihan_batuk_efektif" value="tdk" required >
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
                                <input type="radio" name="ruangan_kebutuhan_darah" value="ya" required >
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
                                <input type="radio" name="ruangan_kebutuhan_darah" value="tdk" required >
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
                                  <input type="radio" name="ok_kebutuhan_darah" value="ya" required >
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
                                  <input type="radio" name="ok_kebutuhan_darah" value="tdk" required >
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
                            <textarea type="text" name="nama_prosedur" id="nama_prosedur" class="form-control" placeholder="Nama Prosedur"  required autocomplete="off"></textarea>
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6"><br><b>Pria</b></div>
                          <div class="col-md-6"><br><b>Wanita</b></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                          <div class="col-md-1">
                            Kanan
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-1">
                            Kiri
                          </div>
                        </div>

                        <div class="row">
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
                              <canvas id="signature-bmb-pad" class="signature-bmb-pad" width="250px" height="600px">
                            </div><br/>
                             
                            <button type="button" id="undo_bmb">Undo</button>
                            <button type="button" id="clear_bmb">Clear</button>
                            <input type='hidden' id='generate_bmb' name="body_man_back" value=''><br/>
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
                              <canvas id="signature-bwb-pad" class="signature-bwb-pad" width="250px" height="600px">
                            </div><br/>
                             
                            <button type="button" id="undo_bwb">Undo</button>
                            <button type="button" id="clear_bwb">Clear</button>
                            <input type='hidden' id='generate_bwb' name="body_woman_back" value=''><br/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <hr>
                            <br><center>
                            <b>Palmar (anterior)</b></center>
                          </div>
                          <div class="col-md-8">
                            <hr>
                            <br>
                          </div>
                        </div>

                         <div class="row">
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                        </div>

                        <div class="row">
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
                              <canvas id="signature-phkanan-pad" class="signature-phkanan-pad" width="200px" height="300px">
                            </div><br/>
                             
                            <button type="button" id="undo_phkanan">Undo</button>
                            <button type="button" id="clear_phkanan">Clear</button>
                            <input type='hidden' id='generate_phkanan' name="palmar_hand_kanan" value=''><br/>
                          </div>
                          <div class="col-md-2">
                            <div id="signature-hkiri" style=''>
                              <canvas id="signature-hkiri-pad" class="signature-hkiri-pad" width="200px" height="240px">
                            </div><br/>
                             
                            <button type="button" id="undo_hkiri">Undo</button>
                            <button type="button" id="clear_hkiri">Clear</button>
                            <input type='hidden' id='generate_hkiri' name="head_kiri" value=''><br/>
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
                              <canvas id="signature-hf-pad" class="signature-hf-pad" width="200px" height="240px">
                            </div><br/>
                             
                            <button type="button" id="undo_hf">Undo</button>
                            <button type="button" id="clear_hf">Clear</button>
                            <input type='hidden' id='generate_hf' name="head_front" value=''><br/>
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
                          <div class="col-md-4">
                            <hr>
                            <br><center>
                            <b>Dorsal (posterior)</b></center>
                          </div>
                          <div class="col-md-4">
                            <hr>
                            <br><center>
                            <b>Plantar (posterior)</b></center>
                          </div>
                          <div class="col-md-4">
                            <hr>
                            <br><center>
                            <b>Palmar (anterior)</b></center>
                          </div>
                        </div>

                                                 <div class="row">
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kanan</b>
                          </div>
                          <div class="col-md-1">
                            <br>
                            <b>Kiri</b>
                          </div>
                        </div>

                        <div class="row">
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
                              <canvas id="signature-dorkanan-pad" class="signature-dorkanan-pad" width="200px" height="300px">
                            </div><br/>
                             
                            <button type="button" id="undo_dorkanan">Undo</button>
                            <button type="button" id="clear_dorkanan">Clear</button>
                            <input type='hidden' id='generate_dorkanan' name="dorsal_kanan" value=''><br/>
                          </div>

                          <div class="col-md-2">
                            <div id="signature-pkanan" style=''>
                              <canvas id="signature-pkanan-pad" class="signature-pkanan-pad" width="200px" height="450px">
                            </div><br/>
                             
                            <button type="button" id="undo_pkanan">Undo</button>
                            <button type="button" id="clear_pkanan">Clear</button>
                            <input type='hidden' id='generate_pkanan' name="plantar_kanan" value=''><br/>
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
                              <canvas id="signature-pfkiri-pad" class="signature-pfkiri-pad" width="200px" height="400px">
                            </div><br/>
                             
                            <button type="button" id="undo_pfkiri">Undo</button>
                            <button type="button" id="clear_pfkiri">Clear</button>
                            <input type='hidden' id='generate_pfkiri' name="palmar_feet_kiri" value=''><br/>
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
                                    <input type='hidden' id='generate_wali' name="coretan_wali" value='' required ><br/>
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
                                    <input type='hidden' id='generate_pasien' name="coretan_pasien" value='' required ><br/>
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
                                    <input type='hidden' id='generate_saksi' name="coretan_saksi" value='' required >
                                    <br/>
                                    <br>
                                    <input type="text" name="nama_saksi" class="form-control" placeholder="Saksi"  required autocomplete="off">
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
  $(document).ready(function() {

   var signaturePadPerawat_Inap     = new SignaturePad(document.getElementById('signature-pad-perawat_ruang_rawat_inap'));
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




    var data_perawat_inap = signaturePadPerawat_Inap.toDataURL('image/png');
    $('#generate_perawat_ruang_rawat_inap').val(data_perawat_inap);

    var data_wali = signaturePadWali.toDataURL('image/png');
    $('#generate_wali').val(data_wali);

    var data_pasien = signaturePadPasien.toDataURL('image/png');
    $('#generate_pasien').val(data_pasien);

    var data_saksi = signaturePadSaksi.toDataURL('image/png');
    $('#generate_saksi').val(data_saksi);

      var data_body_man_back = signaturePadBMB.toDataURL('image/png');
      $('#output_body_man_back').val(data_body_man_back);
      $("#sign_prev_body_man_back").show();
      $("#sign_prev_body_man_back").attr("src",data_body_man_back);
      $('#generate_bmb').val(data_body_man_back);

      var data_body_man_front = signaturePadBMF.toDataURL('image/png');
      $('#output_body_man_front').val(data_body_man_front);
      $("#sign_prev_body_man_front").show();
      $("#sign_prev_body_man_front").attr("src",data_body_man_front);
      $('#generate_bmf').val(data_body_man_front);

      var data_body_woman_back = signaturePadBWB.toDataURL('image/png');
      $('#output_body_woman_back').val(data_body_woman_back);
      $("#sign_prev_body_woman_back").show();
      $("#sign_prev_body_woman_back").attr("src",data_body_woman_back);
      $('#generate_bwb').val(data_body_woman_back);

      var data_body_woman_front = signaturePadBWF.toDataURL('image/png');
      $('#output_body_woman_front').val(data_body_woman_front);
      $("#sign_prev_body_woman_front").show();
      $("#sign_prev_body_woman_front").attr("src",data_body_woman_front);
      $('#generate_bwf').val(data_body_woman_front);

      var data_palmar_hand_kanan = signaturePadPhKanan.toDataURL('image/png');
      $('#output_palmar_hand_kanan').val(data_palmar_hand_kanan);
      $("#sign_prev_palmar_hand_kanan").show();
      $("#sign_prev_palmar_hand_kanan").attr("src",data_palmar_hand_kanan);
      $('#generate_phkanan').val(data_palmar_hand_kanan);

      var data_palmar_hand_kiri = signaturePadPhKiri.toDataURL('image/png');
      $('#output_palmar_hand_kiri').val(data_palmar_hand_kiri);
      $("#sign_prev_palmar_hand_kiri").show();
      $("#sign_prev_palmar_hand_kiri").attr("src",data_palmar_hand_kiri);
      $('#generate_phkiri').val(data_palmar_hand_kiri);

      var data_dorsal_kanan = signaturePadDorkanan.toDataURL('image/png');
      $('#output_dorsal_kanan').val(data_dorsal_kanan);
      $("#sign_prev_dorsal_kanan").show();
      $("#sign_prev_dorsal_kanan").attr("src",data_dorsal_kanan);
      $('#generate_dorkanan').val(data_dorsal_kanan);

      var data_dorsal_kiri = signaturePadDorKiri.toDataURL('image/png');
      $('#output_dorsal_kiri').val(data_dorsal_kiri);
      $("#sign_prev_dorsal_kiri").show();
      $("#sign_prev_dorsal_kiri").attr("src",data_dorsal_kiri);
      $('#generate_dorkiri').val(data_dorsal_kiri);

      var data_palmar_feet_kanan = signaturePadPfKanan.toDataURL('image/png');
      $('#output_palmar_feet_kanan').val(data_palmar_feet_kanan);
      $("#sign_prev_palmar_feet_kanan").show();
      $("#sign_prev_palmar_feet_kanan").attr("src",data_palmar_feet_kanan);
      $('#generate_pfkanan').val(data_palmar_feet_kanan);

      var data_palmar_feet_kiri = signaturePadPfKiri.toDataURL('image/png');
      $('#output_palmar_feet_kiri').val(data_palmar_feet_kiri);
      $("#sign_prev_palmar_feet_kiri").show();
      $("#sign_prev_palmar_feet_kiri").attr("src",data_palmar_feet_kiri);
      $('#generate_pfkiri').val(data_palmar_feet_kiri);

      var data_plantar_kanan = signaturePadPKanan.toDataURL('image/png');
      $('#output_plantar_kanan').val(data_plantar_kanan);
      $("#sign_prev_plantar_kanan").show();
      $("#sign_prev_plantar_kanan").attr("src",data_plantar_kanan);
      $('#generate_pkanan').val(data_plantar_kanan);

      var data_plantar_kiri = signaturePadPkiri.toDataURL('image/png');
      $('#output_plantar_kiri').val(data_plantar_kiri);
      $("#sign_prev_plantar_kiri").show();
      $("#sign_prev_plantar_kiri").attr("src",data_plantar_kiri);
      $('#generate_pkiri').val(data_plantar_kiri);

      var data_head_kanan = signaturePadHkanan.toDataURL('image/png');
      $('#output_head_kanan').val(data_head_kanan);
      $("#sign_prev_head_kanan").show();
      $("#sign_prev_head_kanan").attr("src",data_head_kanan);
      $('#generate_hkanan').val(data_head_kanan);

      var data_head_kiri = signaturePadHkiri.toDataURL('image/png');
      $('#output_head_kiri').val(data_head_kiri);
      $("#sign_prev_head_kiri").show();
      $("#sign_prev_head_kiri").attr("src",data_head_kiri);
      $('#generate_hkiri').val(data_head_kiri);

      var data_head_front = signaturePadHf.toDataURL('image/png');
      $('#output_head_front').val(data_head_front);
      $("#sign_prev_head_front").show();
      $("#sign_prev_head_front").attr("src",data_head_front);
      $('#generate_hf').val(data_head_front);

      var data_head_back = signaturePadHb.toDataURL('image/png');
      $('#output_head_back').val(data_head_back);
      $("#sign_prev_head_back").show();
      $("#sign_prev_head_back").attr("src",data_head_back);
      $('#generate_hb').val(data_head_back);

  });


//Fungsi button dokter




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