
<style>
  #coretan{
    width: 400px; height: 400px;
    border: 0px solid black;
    background-image: url("<?php echo base_url();?>assets/image/Human.png");
  }

  .mt-1 {
    margin-top: 1px;
  }

  .mt-2 {
    margin-top: 2px;
  }

  .mt-3 {
    margin-top: 3px;
  }

  .mt-4 {
    margin-top: 4px;
  }

  .mt-5 {
    margin-top: 5px;
  }

  .mt-10 {
    margin-top: 10px;
  }

  .mt-15 {
    margin-top: 15px;
  }

  .mt-20 {
    margin-top: 20px;
  }

  .mb-1 {
    margin-bottom: 1px;
  }

  .mb-2 {
    margin-bottom: 2px;
  }

  .mb-3 {
    margin-bottom: 3px;
  }

  .mb-4 {
    margin-bottom: 4px;
  }

  .mb-5 {
    margin-bottom: 5px;
  }

  .mb-10 {
    margin-bottom: 10px;
  }

  .ml-1 {
    margin-left: 1px;
  }

  .ml-2 {
    margin-left: 2px;
  }

  .ml-3 {
    margin-left: 3px;
  }

  .ml-4 {
    margin-left: 4px;
  }

  .ml-5 {
    margin-left: 5px;
  }

  .tindakan {
    background: #f5f5f5;
    border: 1px solid #e3e3e3;
    min-height: 100px;
    width: 100%;
    border-radius: 3px;
    padding-left: 5px;
  }

  .render-aktif {
    padding-left: 10px;
    padding-right: 10px;
  }

  td.with-ellipsis{
    width: 175px;
    overflow: hidden;
    display: inline-block;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
</style>


<div class="row mt-15">
  <div class="col-md-12">
    <div class="row">
      <?php if ($list) { 
        $isAny = 0;
      ?>
      <?php foreach ($list as $k => $v) : ?>
        <?php foreach ($v['data'] as $k) : ?>
          <?php $isAny++; ?>
          <div class="col-md-2 text-right">
            <button class="btn btn-primary btn-sm ubah-aktif" data-id-notes="<?= $k['notes_id']; ?>"><i class="fa fa-fw fa-pencil"></i></button>
            <button class="btn btn-danger btn-sm hapus-aktif" data-id-notes="<?= $k['notes_id']; ?>"><i class="fa fa-fw fa-trash"></i></button>
            <button class="btn btn-success btn-sm cetak-aktif" data-id-notes="<?= $k['notes_id']; ?>">Cetak</button>
            <!-- <div class="row text-center"><?= $k['notes_vitals'][0]['created_date']; ?></div> -->
          </div>
          <div class="col-md-10">
            <div class="row">
              <div class="col-lg-12">
                <h4><strong><?= $v['no_visit']; ?></strong></h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Petugas Approve</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td class="with-ellipsis"><?= $k['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td class="with-ellipsis"><?= $k['jam']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Pasien</td>
                      <td class="with-ellipsis"><?= $k['nama_pasien']; ?></td>
                    </tr>
                    <tr>
                      <td>No. Mr</td>
                      <td class="with-ellipsis"><?= $k['no_mr']; ?></td>
                    </tr>
                    <tr>
                      <td>Tempat, Tgl.Lahir</td>
                      <td class="with-ellipsis"><?= $k['ttl']; ?></td>
                    </tr>
                    <tr>
                      <td>Usia</td>
                      <td class="with-ellipsis"><?= $k['usia']; ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td class="with-ellipsis"><?= $k['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td class="with-ellipsis"><?= $k['agama']; ?></td>
                  
                    </tr>
                    <tr>
                      <td>Pendidikan</td>
                      <td class="with-ellipsis"><?= $k['pendidikan']; ?></td>
                    </tr>
                    <tr>
                      <td>Pekerjaan</td>
                      <td class="with-ellipsis"><?= $k['pekerjaan']; ?></td>
                    </tr>
                    <tr>
                      <td>Status Pernikahan</td>
                      <td class="with-ellipsis"><?= $k['status_pernikahan']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>A. Autoanamnesis / Alloanamnesis</b>
                    </div>
                    <tr>
                      <td>Keluhan Utama</td>
                      <td class="with-ellipsis"><?= $k['keluhan_utama']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat Penyakit Sekarang</td>
                      <td class="with-ellipsis"><?= $k['riwayat_penyakit_sekarang']; ?></td>
                    </tr>
                    <tr>
                      <td>Riwayat Penyakit Dahulu</td>
                      <td class="with-ellipsis"><?= $k['riwayat_penyakit_dahulu']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>B. Pemeriksaan Fisik & Tanda Vital</b>
                    </div>
                    <tr>
                      <td>TD</td>
                      <td class="with-ellipsis"><?= $k['td']; ?> mmHg</td>
                    </tr>
                     <tr>
                      <td>HR</td>
                      <td class="with-ellipsis"><?= $k['hr']; ?> x/m</td>
                    </tr>
                    <tr>
                      <td>RR</td>
                      <td class="with-ellipsis"><?= $k['rr']; ?> x/m</td>
                    </tr>
                    <tr>
                      <td>Suhu</td>
                      <td class="with-ellipsis"><?= $k['suhu']; ?> °C</td>
                    </tr>
                    <tr>
                      <td>Skala Nyeri</td>
                      <td class="with-ellipsis"><?= $k['skala_nyeri']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>C. Kemampuan Fungsional</b>
                    </div>
                    <tr>
                      <td>Tidur/Bedrest/Gendong</td>
                      <td class="with-ellipsis"><?= $k['tidur_bedrest_gendong']; ?></td>
                    </tr>
                    <tr>
                      <td>Jalan Sendiri</td>
                      <td class="with-ellipsis"><?= $k['jalan_sendiri']; ?></td>
                    </tr>
                    <tr>
                      <td>Kursi Roda</td>
                      <td class="with-ellipsis"><?= $k['kursi_roda']; ?></td>
                    </tr>
                    <tr>
                      <td>Alat Bantu</td>
                      <td class="with-ellipsis"><?= $k['alat_bantu']; ?></td>
                    </tr>
                    <tr>
                      <td>Prothesis</td>
                      <td class="with-ellipsis"><?= $k['prothesis']; ?></td>
                    </tr>
                    <tr>
                      <td>Deformitas</td>
                      <td class="with-ellipsis"><?= $k['deformitas']; ?></td>
                    </tr>
                    <tr>
                      <td>Resiko Jatuh</td>
                      <td class="with-ellipsis"><?= $k['resiko_jatuh']; ?></td>
                    </tr>
                    <tr>
                      <td>Lain-lain</td>
                      <td class="with-ellipsis"><?= $k['lainlain']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>Pemeriksaan Sistematik Khusus</b>
                    </div>
                    <tr>
                      <td>a. Muskuloskeletal</td>
                      <td class="with-ellipsis"><?= $k['pemeriksaan_muskuloskeletal']; ?></td>
                    </tr>
                    <tr>
                      <td>b. Neuromuskular</td>
                      <td class="with-ellipsis"><?= $k['pemeriksaan_neuromuskular']; ?></td>
                    </tr>
                    <tr>
                      <td>c. Kardiopulmonal</td>
                      <td class="with-ellipsis"><?= $k['pemeriksaan_kardiopulmonal']; ?></td>
                    </tr>
                    <tr>
                      <td>d. Integumentum</td>
                      <td class="with-ellipsis"><?= $k['pemeriksaan_integumentum']; ?></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table nowrap">
                    <tbody>
                    <div class="text-center col-lg-12">
                      <b>Pengukuran Khusus</b>
                    </div>
                    <tr>
                      <td>a. Muskuloskeletal</td>
                      <td class="with-ellipsis"><?= $k['pengukuran_muskuloskeletal']; ?></td>
                    </tr>
                    <tr>
                      <td>b. Neuromuskular</td>
                      <td class="with-ellipsis"><?= $k['pengukuran_neuromuskular']; ?></td>
                    </tr>
                    <tr>
                      <td>c. Kardiopulmonal</td>
                      <td class="with-ellipsis"><?= $k['pengukuran_kardiopulmonal']; ?></td>
                    </tr>
                    <tr>
                      <td>d. Integumentum</td>
                      <td class="with-ellipsis"><?= $k['pengukuran_integumentum']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>Data Pengunjung</b>
                    </div>
                    <tr>
                      <td>a. Radiologi</td>
                      <td class="with-ellipsis"><?= $k['radiologi']; ?></td>
                    </tr>
                    <tr>
                      <td>b. EMG</td>
                      <td class="with-ellipsis"><?= $k['emg']; ?></td>
                    </tr>
                    <tr>
                      <td>c. Laboratorium</td>
                      <td class="with-ellipsis"><?= $k['laboratorium']; ?></td>
                    </tr>
                    <tr>
                      <td>d. Lain-lain</td>
                      <td class="with-ellipsis"><?= $k['lain_lain']; ?></td>
                    </tr>
                    <tr>
                      <td><b>D. Diagnosis Fisioterapi</b></td>
                      <td class="with-ellipsis"><?= $k['diagnosis_fisioterapi']; ?></td>
                    </tr>
                    <tr>
                      <td><b>E. Program / Rencana Fisioterapi</b></td>
                      <td class="with-ellipsis"><?= $k['program_rencana_fisioterapi']; ?></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <div id="coretan" style=''>
                  <!-- <canvas id="signature-pad" class="signature-pad" width="400px" height="400px"> -->
                  <img src='<?= $k['coretan']; ?>' id='sign_prev' />
                </div><br/>
                
            </div>

            <div class="row">
              <div class="col-md-3">
                <table class="table nowrap">
                      <div class="text-center col-lg-12">
                      <b>Tanggal</b>
                    </div>
                    <?php 
                    for ($i=1; $i <= 10; $i++) { 
                      if ($k['tgl'.$i] != "") {                    
                     ?>
                    
                    <tr>
                      <td class="with-ellipsis"><?= $k['tgl'.$i]; ?></td>
                    </tr>

                    <?php } } ?>

                    
                  </table>  
              </div>

              <div class="col-md-3">
                <table class="table nowrap">
                      <div class="text-center col-lg-12">
                      <b>Intervensi</b>
                    </div>
                    <?php 
                    for ($i=1; $i <= 10; $i++) { 
                      if ($k['intervensi'.$i] != "") {                    
                     ?>
                    
                    <tr>
                      <td class="with-ellipsis"><?= $k['intervensi'.$i]; ?></td>
                    </tr>

                    <?php } } ?>
  
                  </table>  
              </div>
              
              <div class="col-md-3">
                <table class="table nowrap">
                    <div class="text-center col-lg-12">
                      <b>Tempat / Area yang Diterapi</b>
                    </div>
                    <?php 
                    for ($i=1; $i <= 10; $i++) { 
                      if ($k['area_diterapi'.$i] != "") {                    
                     ?>
                    
                    <tr>
                      <td class="with-ellipsis"><?= $k['area_diterapi'.$i]; ?></td>
                    </tr>

                    <?php } } ?>
  
                  </table>  
              </div>

              <div class="col-md-3">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>G. Evaluasi</b>
                    </div>
                    <tr>
                      <td><b>Evaluasi</b></td>
                      <td class="with-ellipsis"><?= $k['evaluasi']; ?></td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
             </div>
            </div>

          </div>
          <hr>
        <?php endforeach; ?>
      <?php endforeach; ?>
    <?php } else { ?>
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
          <h4>Data belum diinput ! Silahkan tambah data terlebih dahulu.</h4>
        </div>
      </div>
    <?php }; ?>
    <?php if($isAny == 0) { ?>
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
          <h4>Data belum diinput ! Silahkan tambah data terlebih dahulu.</h4>
        </div>
      </div>
    <?php }; ?>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#table-aktif').dataTable({
      // "paging": false,
      "searching": false,
      "scrollX": true,
      "info": false,
    });
    $('#table-aktif2').dataTable({
      "paging": false,
      "searching": false,
      "scrollX": true,
      "info": false,
      "ordering": false,
    });
  });

  $('.hapus-aktif').click(function(e) {
    e.preventDefault();

    if (confirm("Apa anda yakin ingin menghapus data ini?")) {


      delete_url = '<?php echo base_url(); ?>' + class_name + '/delete/';
      $('.hapus-aktif').attr('disabled', true);
      $.get('<?php echo base_url(); ?>' + class_name + '/delete/', {
        'id_notes': $(this).data('id-notes'),
        'id_notes_vitals': $(this).data('id-notes-vitals'),
      }).done(function(response) {
        data = JSON.parse(response);

        if (data.status == 200) {
          if (aktif_pdf) {
            aktif_pdf.close();
          }
          alert(data.message);
          render();
          return false;

        } else {
          alert(data.message);
          return false;

        }

      });
    } else {
      return false;
    }
  });

  $('.ubah-aktif').click(function(e) {
    e.preventDefault();
    id_reg = $('#id_pasien_registrasi').val(),
      process_button(0);
    $.get('<?php echo base_url(); ?>' + class_name + '/edit/', {
      'id_notes': $(this).data('id-notes'),
      'id_notes_vitals': $(this).data('id-notes-vitals'),
      'id_reg': id_reg
    }).done(function(response) {
      process_button(1);
      $('#form-container').html(response);
      $('#view-container').hide();
      if (!$('#form-grafik').is(':disabled')) {
        $('#form-grafik').attr("disabled", true)
      }
      $('#form-container').show();

    }).fail(function() {
      process_button(1);
      alert('Gagal menampilkan data')
    });
  });

  $('.cetak-aktif').on("click", function(e) {
    id_notes = $(this).data('id-notes');
    aktif_pdf = window.open('<?php echo base_url(); ?>' + class_name + '/view_pdf/' + id_notes);
  });
</script>
