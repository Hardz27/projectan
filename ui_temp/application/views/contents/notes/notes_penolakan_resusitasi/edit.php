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

          </div>

        </div>

      </div>
      
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Penolakan Resusitasi</div>
            <div class="panel-body">

            <div class="row">
              <div class="col-md-12">  

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Penerima Informasi</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="penerima_informasi" id="penerima_informasi" value="<?= $result['penerima_informasi']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Diagnosis</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="diagnosis" id="diagnosis" value="<?= $result['diagnosis']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Dasar Diagnosis</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="dasar_diagnosis" id="dasar_diagnosis" value="<?= $result['dasar_diagnosis']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Tindakan Kedokteran</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="tindakan" id="tindakan" value="<?= $result['tindakan']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Indikasi Tindakan</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="indikasi_tindakan" id="indikasi_tindakan" value="<?= $result['indikasi_tindakan']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Tata Cara</b>
                  </div>
                  <div class="col-md-8">
                    <textarea class="form-control input-sm" name="tata_cara" id="tata_cara" required><?= $result['tata_cara']; ?></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Tujuan</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="tujuan" id="tujuan" value="<?= $result['tujuan']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Risiko</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="risiko" id="risiko" value="<?= $result['risiko']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Komplikasi</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="komplikasi" id="komplikasi" value="<?= $result['komplikasi']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Prognosis</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="prognosis" id="prognosis" value="<?= $result['prognosis']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Alternatif & Risiko</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="alternatif_risiko" id="alternatif_risiko" value="<?= $result['alternatif_risiko']; ?>"  required>
                  </div>
                </div>
                <br>

                <div class="row">
                    <!-- nama -->
                  <div class="col-md-4">
                    <b>Lain-Lain</b>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" name="lain_lain" id="lain" value="<?= $result['lain_lain']; ?>"  required>
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
    
</script>