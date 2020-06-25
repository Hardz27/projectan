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

<form id="form-add-1-<?= $this->router->fetch_class(); ?>">


  <input type="hidden" class="form-control input-sm" name="id_notes" id="id_notes" value="<?= $result['id_notes']; ?>">
  <input type="hidden" class="form-control input-sm" name="id_notes_vitals" id="id_notes_vitals" value="<?= $result['notes_vitals']['id']; ?>">
  <input type="hidden" class="form-control input-sm" name="id_reg" id="id_reg" value="<?= $result['id_reg']; ?>">
  <input type="hidden" class="form-control input-sm" name="id_visit" id="id_visit" value="<?= $result['id_visit']; ?>">


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
              <select name="petugas_approved" class="petugas_approved" style="width: 100%">
                <option value=""></option>
                <?php foreach ($data_perawat as $k => $v) : ?>
                  <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_petugas'] ? 'selected' : ''; ?>><?= $v['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="row">
            <!-- nama -->
            <div class="col-md-4">
              <b>Dokter Approve</b>
            </div>
            <div class="col-md-8">
              <select name="dokter_approved" class="dokter_approved" style="width: 100%">
                <option value=""></option>
                <?php foreach ($data_dokter as $k => $v) : ?>
                  <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_dokter'] ? 'selected' : ''; ?>><?= $v['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


  <div class="row">
    <div class="col-lg-6">

      <div class="panel panel-primary">
        <div class="panel-heading">FORM TEMPLATE</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">

              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Data / Pertanyaan ke-1</b>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control input-sm" name="data1" id="data1" value="<?= $result['data1']; ?>">
                </div>
              </div>
              <br>

              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Data / Pertanyaan ke-2</b>
                </div>
                <div class="col-md-8">
                  <div class='input-group'>
                    <input type="text" class="form-control" name="data2" id="data2" value="<?= $result['data2']; ?>" autocomplete="off">
                    <span class="input-group-addon">
                      <span class="">Addon</span>
                    </span>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <label><b>Data / pertanyaan ke-3</b></label>
                </div>
                <div class="col-md-8">
                  <div class="btn-group-toggle" data-toggle="buttons">
                    <label name="label_data3" class="btn btn-sm btn-default" style="margin-bottom:5px;">
                      <input value="1" name="data3" id="1" type="radio"> Pilihan 1
                    </label>
                    <label name="label_data3" class="btn btn-sm btn-default" style="margin-bottom:5px;">
                      <input value="2" name="data3" id="2" type="radio"> Pilihan 2
                    </label>
                  </div>
                </div>
              </div>
              <br>


              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Tanggal</b>
                </div>
                <div class="col-md-8">
                  <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" autocomplete="off">
                </div>
              </div>
              <br>

              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Tanggal</b>
                </div>
                <div class="col-md-8">
                  <input type="text" name="jam" id="jam" class="form-control" value="07:00" autocomplete="off">
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

    <div class="col-lg-6">
      <div class="panel panel-primary">
        <div class="panel-heading" id="visit-heading">VITALS</div>
        <div class="panel-body">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="form-group row">
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-lg-12">Tanggal Dibuat</label>
                        <div class="col-lg-12">
                          <input type="text" id="created_date" name="created_date" class="form-control input-sm" value="<?php echo date("d-m-Y H:i"); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-md-12">Petugas</label>
                        <div class="col-md-12">
                          <select name="petugas_approved_vitals" id="petugas_approved_vitals" class="petugas_approved" style="width: 100%">
                            <option value=""></option>
                            <?php foreach ($data_perawat as $k => $v) : ?>
                              <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_petugas'] ? 'selected' : null; ?>><?= $v['nama'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="hr" style="margin-bottom:10px;"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group row">
                    <label class="col-lg-3">Tinggi</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="height" name="height" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['height']; ?>">
                        <span class="input-group-addon satuan">Cm</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3">Berat</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="weight" name="weight" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['weight']; ?>">
                        <span class="input-group-addon satuan">Kg</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3">Systolic</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="systolic" name="systolic" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['systolic']; ?>">
                        <span class="input-group-addon satuan">mmHg</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3">Diastolic</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="diastolic" name="diastolic" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['diastolic']; ?>">
                        <span class="input-group-addon satuan">mmHg</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3">SpO2</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="spo2" name="spo2" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['spo2']; ?>">
                        <span class="input-group-addon">%</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-5">Reflek Cahaya</label>
                    <div class="col-lg-7">
                      <input type="text" id="reflek_cahaya" name="reflek_cahaya" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['reflek_cahaya']; ?>">
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group row">
                    <label class="col-lg-3">Temperatur</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="temperature" name="temperature" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['temperature']; ?>">
                        <span class="input-group-addon satuan">˚C</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3">Pulse</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="pulse" name="pulse" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['pulse']; ?>">
                        <span class="input-group-addon satuan">x/menit</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3">Pernafasan</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" id="respiratory_rate" name="respiratory_rate" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['respiratory_rate']; ?>">
                        <span class="input-group-addon satuan">x/menit</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-5">Tekanan Darah</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <input type="text" id="blood_pressure" name="blood_pressure" class="form-control form-manual input-sm" value="<?= $result['notes_vitals']['blood_pressure']; ?>">
                        <span class="input-group-addon satuan">mmHg</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-5">Pupil Isokor</label>
                    <div class="col-lg-7">
                      <div class="btn-group-toggle" data-toggle="buttons">
                        <label name="label_pupil_isokor" class="btn btn-sm btn-default <?= $result['notes_vitals']['pupil_isokor'] == '+' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                          <input value="+" name="pupil_isokor" id="pupil_isokor1" type="radio" <?= $result['notes_vitals']['pupil_isokor'] == '+' ? 'checked' : ''; ?>>+
                        </label>
                        <label name="label_pupil_isokor" class="btn btn-sm btn-default <?= $result['notes_vitals']['pupil_isokor'] == '-' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                          <input value="-" name="pupil_isokor" id="pupil_isokor2" type="radio" <?= $result['notes_vitals']['pupil_isokor'] == '-' ? 'checked' : ''; ?>>-
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-5">Pupil Unisokor</label>
                    <div class="col-lg-7">
                      <div class="btn-group-toggle" data-toggle="buttons">
                        <label name="label_pupil_unisokor" class="btn btn-sm btn-default <?= $result['notes_vitals']['pupil_unisokor'] == '+' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                          <input value="+" name="pupil_unisokor" id="pupil_unisokor1" type="radio" <?= $result['notes_vitals']['pupil_unisokor'] == '+' ? 'checked' : ''; ?>>+
                        </label>
                        <label name="label_pupil_unisokor" class="btn btn-sm btn-default <?= $result['notes_vitals']['pupil_unisokor'] == '-' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                          <input value="-" name="pupil_unisokor" id="pupil_unisokor2" type="radio" <?= $result['notes_vitals']['pupil_unisokor'] == '-' ? 'checked' : ''; ?>>-
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3">Keadaan Umum</label>
            <div class="col-lg-9">
              <input type="text" class="form-control input-sm" name="keadaan_umum" id="keadaan_umum" value="<?= $result['notes_vitals']['keadaan_umum']; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-12">Akral</label>
            <div class="col-lg-12">
              <div class="btn-group-toggle" data-toggle="buttons">
                <label name="label_akral" class="btn btn-sm btn-default <?= $result['notes_vitals']['akral'] == 'Dingin' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Dingin" name="akral" id="akral1" type="radio" <?= $result['notes_vitals']['akral'] == 'Dingin' ? 'checked' : ''; ?>>Dingin
                </label>
                <label name="label_akral" class="btn btn-sm btn-default <?= $result['notes_vitals']['akral'] == 'Hangat' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Hangat" name="akral" id="akral2" type="radio" <?= $result['notes_vitals']['akral'] == 'Hangat' ? 'checked' : ''; ?>>Hangat
                </label>
                <label name="label_akral" class="btn btn-sm btn-default <?= $result['notes_vitals']['akral'] == 'Panas' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Panas" name="akral" id="akral3" type="radio" <?= $result['notes_vitals']['akral'] == 'Panas' ? 'checked' : ''; ?>>Panas
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-12">Eye Opening</label>
            <div class="col-lg-12">
              <div class="btn-group-toggle" data-toggle="buttons">
                <label name="label_eye_opening" class="btn btn-sm btn-default <?= $result['notes_vitals']['eye_opening'] == 'Not Testable' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Not Testable" name="eye_opening" id="eye_opening1" type="radio" <?= $result['notes_vitals']['eye_opening'] == 'None' ? 'checked' : ''; ?>>Not Testable
                </label>
                <label name="label_eye_opening" class="btn btn-sm btn-default <?= $result['notes_vitals']['eye_opening'] == 'None' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="None" name="eye_opening" id="eye_opening2" type="radio" <?= $result['notes_vitals']['eye_opening'] == 'None' ? 'checked' : ''; ?>>None
                </label>
                <label name="label_eye_opening" class="btn btn-sm btn-default <?= $result['notes_vitals']['eye_opening'] == 'To Pressure' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="To Pressure" name="eye_opening" id="eye_opening3" type="radio" <?= $result['notes_vitals']['eye_opening'] == 'To Pressure' ? 'checked' : ''; ?>>To Pressure
                </label>
                <label name="label_eye_opening" class="btn btn-sm btn-default <?= $result['notes_vitals']['eye_opening'] == 'To Sound' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="To Sound" name="eye_opening" id="eye_opening4" type="radio" <?= $result['notes_vitals']['eye_opening'] == 'To Sound' ? 'checked' : ''; ?>>To Sound
                </label>
                <label name="label_eye_opening" class="btn btn-sm btn-default <?= $result['notes_vitals']['eye_opening'] == 'Spontaneous' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Spontaneous" name="eye_opening" id="eye_opening5" type="radio" <?= $result['notes_vitals']['eye_opening'] == 'Spontaneous' ? 'checked' : ''; ?>>Spontaneous
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-4">
              <div class="row">
                <label class="col-lg-2">Kesadaran</label>
                <div class="col-lg-12">
                  <div class="btn-group-toggle" data-toggle="buttons">
                    <label name="label_kesadaran" class="btn btn-sm btn-default <?= $result['notes_vitals']['kesadaran'] == 'Sadar' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                      <input value="Sadar" name="kesadaran" id="kesadaran1" type="radio" <?= $result['notes_vitals']['kesadaran'] == 'Sadar' ? 'checked' : ''; ?>>Sadar
                    </label>
                    <label name="label_kesadaran" class="btn btn-sm btn-default <?= $result['notes_vitals']['kesadaran'] == 'Tidak Sadar' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                      <input value="Tidak Sadar" name="kesadaran" id="kesadaran2" type="radio" <?= $result['notes_vitals']['kesadaran'] == 'Tidak Sadar' ? 'checked' : ''; ?>>Tidak Sadar
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-8">
              <div class="row">
                <label class="col-lg-12">Nyeri</label>
                <div class="col-lg-12">
                  <div class="btn-group-toggle" data-toggle="buttons">
                    <label name="label_nyeri" class="btn btn-sm btn-default <?= $result['notes_vitals']['nyeri'] == 'Tidak Nyeri' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                      <input value="Tidak Nyeri" name="nyeri" id="nyeri1" type="radio" <?= $result['notes_vitals']['nyeri'] == 'Tidak Nyeri' ? 'checked' : ''; ?>>Tidak Nyeri
                    </label>
                    <label name="label_nyeri" class="btn btn-sm btn-default <?= $result['notes_vitals']['nyeri'] == 'Ringan' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                      <input value="Ringan" name="nyeri" id="nyeri2" type="radio" <?= $result['notes_vitals']['nyeri'] == 'Ringan' ? 'checked' : ''; ?>>Ringan
                    </label>
                    <label name="label_nyeri" class="btn btn-sm btn-default <?= $result['notes_vitals']['nyeri'] == 'Sedang' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                      <input value="Sedang" name="nyeri" id="nyeri3" type="radio" <?= $result['notes_vitals']['nyeri'] == 'Sedang' ? 'checked' : ''; ?>>Sedang
                    </label>
                    <label name="label_nyeri" class="btn btn-sm btn-default <?= $result['notes_vitals']['nyeri'] == 'Berat' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                      <input value="Berat" name="nyeri" id="nyeri4" type="radio" <?= $result['notes_vitals']['nyeri'] == 'Berat' ? 'checked' : ''; ?>>Berat
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-12">Verbal Response</label>
            <div class="col-lg-12">
              <div class="btn-group-toggle" data-toggle="buttons">
                <label name="label_verbal_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['verbal_response'] == 'Not Testable' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Not Testable" name="verbal_response" id="verbal_response1" type="radio" <?= $result['notes_vitals']['verbal_response'] == 'Not Testable' ? 'checked' : ''; ?>>Not Testable
                </label>
                <label name="label_verbal_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['verbal_response'] == 'None' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="None" name="verbal_response" id="verbal_response2" type="radio" <?= $result['notes_vitals']['verbal_response'] == 'None' ? 'checked' : ''; ?>>None
                </label>
                <label name="label_verbal_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['verbal_response'] == 'Sound but no words' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Sound but no words" name="verbal_response" id="verbal_response3" type="radio" <?= $result['notes_vitals']['verbal_response'] == 'Sound but no words' ? 'checked' : ''; ?>>Sound but no words
                </label>
                <label name="label_verbal_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['verbal_response'] == 'Words but no ceherent' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Words but no ceherent" name="verbal_response" id="verbal_response4" type="radio" <?= $result['notes_vitals']['verbal_response'] == 'Words but no ceherent' ? 'checked' : ''; ?>>Words but no ceherent
                </label>
                <label name="label_verbal_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['verbal_response'] == 'Confused' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Confused" name="verbal_response" id="verbal_response5" type="radio" <?= $result['notes_vitals']['verbal_response'] == 'Confused' ? 'checked' : ''; ?>>Confused
                </label>
                <label name="label_verbal_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['verbal_response'] == 'Orientated' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Orientated" name="verbal_response" id="verbal_response6" type="radio" <?= $result['notes_vitals']['verbal_response'] == 'Orientated' ? 'checked' : ''; ?>>Orientated
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-12">Motor Response</label>
            <div class="col-lg-12">
              <div class="btn-group-toggle" data-toggle="buttons">
                <label name="label_motor_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['motor_response'] == 'Not Testable' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Not Testable" name="motor_response" id="motor_response1" type="radio" <?= $result['notes_vitals']['motor_response'] == 'Not Testable' ? 'checked' : ''; ?>>Not Testable
                </label>
                <label name="label_motor_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['motor_response'] == 'None' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="None" name="motor_response" id="motor_response2" type="radio" <?= $result['notes_vitals']['motor_response'] == 'None' ? 'checked' : ''; ?>>None
                </label>
                <label name="label_motor_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['motor_response'] == 'Extension' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Extension" name="motor_response" id="motor_response3" type="radio" <?= $result['notes_vitals']['motor_response'] == 'Extension' ? 'checked' : ''; ?>>Extension
                </label>
                <label name="label_motor_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['motor_response'] == 'Abnormal Flexion' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Abnormal Flexion" name="motor_response" id="motor_response4" type="radio" <?= $result['notes_vitals']['motor_response'] == 'Abnormal Flexion' ? 'checked' : ''; ?>>Abnormal Flexion
                </label>
                <label name="label_motor_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['motor_response'] == 'Localizing' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Localizing" name="motor_response" id="motor_response5" type="radio" <?= $result['notes_vitals']['motor_response'] == 'Localizing' ? 'checked' : ''; ?>>Localizing
                </label>
                <label name="label_motor_response" class="btn btn-sm btn-default <?= $result['notes_vitals']['motor_response'] == 'Obeys Command' ? 'active' : ''; ?>" style="margin-bottom:5px;">
                  <input value="Obeys Command" name="motor_response" id="motor_response6" type="radio" <?= $result['notes_vitals']['motor_response'] == 'Obeys Command' ? 'checked' : ''; ?>>Obeys Command
                </label>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  </div>

</form>

<script type="text/javascript">
  $('.dokter_approved').select2({
    placeholder: "-- Pilih dokter Approve --"
  });

  $('.petugas_approved').select2({
    placeholder: "-- Pilih petugas Approve --"
  });

  $('#jam').datetimepicker({
    format: "HH:mm",
    showTodayButton: true,
    timeZone: '',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 5,
    locale: moment.locale(),
    collapse: true,
    icons: {
      time: 'fa fa-clock-o',
      date: 'fa fa-calendar',
      up: 'fa fa-chevron-up',
      down: 'fa fa-chevron-down',
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-crosshairs',
      clear: 'fa fa-trash-o',
      close: 'fa fa-times'
    },
    sideBySide: true,
    calendarWeeks: false,
    viewMode: 'days',
    viewDate: false,
    toolbarPlacement: 'bottom',
    widgetPositioning: {
      horizontal: 'left',
      vertical: 'bottom'
    }
  });

  $('#tanggal').datetimepicker({
    format: "YYYY-MM-DD",
    showTodayButton: true,
    timeZone: '',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 5,
    locale: moment.locale(),
    collapse: true,
    icons: {
      time: 'fa fa-clock-o',
      date: 'fa fa-calendar',
      up: 'fa fa-chevron-up',
      down: 'fa fa-chevron-down',
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-crosshairs',
      clear: 'fa fa-trash-o',
      close: 'fa fa-times'
    },
    sideBySide: true,
    calendarWeeks: false,
    viewMode: 'days',
    viewDate: false,
    toolbarPlacement: 'bottom',
    widgetPositioning: {
      horizontal: 'left',
      vertical: 'bottom'
    }
  });

  $('#created_date').datetimepicker({
    format: "DD-MM-YYYY HH:mm",
    showTodayButton: true,
    timeZone: '',
    dayViewHeaderFormat: 'MMMM YYYY',
    stepping: 1,
    locale: moment.locale(),
    collapse: true,
    icons: {
      time: 'fa fa-clock-o',
      date: 'fa fa-calendar',
      up: 'fa fa-chevron-up',
      down: 'fa fa-chevron-down',
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-crosshairs',
      clear: 'fa fa-trash-o',
      close: 'fa fa-times'
    },
    sideBySide: true,
    calendarWeeks: false,
    viewMode: 'days',
    viewDate: false,
    toolbarPlacement: 'bottom',
    widgetPositioning: {
      horizontal: 'left',
      vertical: 'bottom'
    }
  });

  $(".btn-toggle").click(function(e) {
    e.preventDefault();

    $(".btn-toggle").removeClass("btn-primary");
    $(this).addClass("btn-primary");
    var id = $(this).data('id');

    $("input[name='btn-toggle-val']").val(id);
  });

  $('.btn-batal-<?= $this->router->fetch_class(); ?>').click(function(e) {
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
