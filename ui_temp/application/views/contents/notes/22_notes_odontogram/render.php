
<style>
  #coretan{
    width: 450px; height: 100%;
    border: 0px solid black;
    background-image: url("<?php echo base_url();?>assets/image/odontogram.png");
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
    text-align: right;
    margin-top: -1px;
    overflow: hidden;
    display: inline-block;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: 100%;
  }
  td.line-1{ 
    max-width: 200px;
  }
  td.line-2 {
    max-width: 320px;
  }
  td.line-3 {
    max-width: 320px;
  }
</style>


<div class="row mt-15">
  <div class="col-md-12">
    <div class="row">
      <?php if ($list) { 
        $isAny = 0;
      ?>
      <?php foreach ($list as $k => $v) :?>
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
                      <td>Dokter Approve</td>
                      <td class="with-ellipsis line-1"><?= ucwords(strtolower($k['approved_dokter'])); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td class="with-ellipsis line-1"><?= $k['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td class="with-ellipsis line-1"><?= $k['jam']; ?></td>
                    </tr>
                    <div class="text-center col-lg-12">
                      <b>A. Data Medik</b>
                    </div>
                    <tr>
                      <td>Golongan Darah</td>
                      <td class="with-ellipsis line-1"><?= $k['golongan_darah']; ?></td>
                    </tr>
                    <tr>
                      <td>Tekanan Darah</td>
                      <td class="with-ellipsis line-1"><?= $k['tekanan_a'] .'/'. $k['tekanan_b'] .' - '. $k['tekanan_darah']?></td>
                    </tr>
                    <tr>
                      <td>Penyakit Jantung</td>
                      <td class="with-ellipsis line-1"><?= $k['penyakit_jantung']; ?></td>
                    </tr>
                    <tr>
                      <td>Diabetes</td>
                      <td class="with-ellipsis line-1"><?= $k['diabetes']; ?></td>
                    </tr>
                    <tr>
                      <td>Haemopilia</td>
                      <td class="with-ellipsis line-1"><?= $k['haemopilia']; ?></td>
                    </tr>
                    <tr>
                      <td>Hepatitis</td>
                      <td class="with-ellipsis line-1"><?= $k['hepatitis']; ?></td>
                    </tr>
                    <tr>
                      <td>Gastritis</td>
                      <td class="with-ellipsis line-1"><?= $k['gastritis']; ?></td>
                    </tr>
                    <tr>
                      <td>Penyakit Lainnya</td>
                      <td class="with-ellipsis line-1"><?= $k['penyakit_lainnya']; ?></td>
                    </tr>
                    <tr>
                      <td>Alergi terhadap obat-obatan</td>
                      <td class="with-ellipsis line-1"><?= $k['alergi_obat'] .' ('. $k['desc_alergi_obat'] .')' ?></td>
                    </tr>
                    <tr>
                      <td>Alergi terhadap Makanan</td>
                      <td class="with-ellipsis line-1"><?= $k['alergi_makanan'] .' ('. $k['desc_alergi_makanan'] .')' ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-5">
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>B. Odontogram</b>
                    </div>
                    <div class="col-md-4">
                      <div id="coretan" style=''>
                        <img src='<?= $k['coretan']; ?>' id='sign_prev' />
                      </div><br/>
                    </div>
                  </tbody>
                </table>

                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Palatum</td>
                      <td class="with-ellipsis line-2"><?= $k['palatum'] .' ('. $k['desc_palatum'] .')' ?></td>
                    </tr>
                     <tr>
                      <td>Diastema</td>
                      <td class="with-ellipsis line-2"><?= $k['Diastema'] ?></td>
                    </tr>
                    <tr>
                      <td>Gigi Anomali</td>
                      <td class="with-ellipsis line-2"><?= $k['gigi_anomali'] .' ('. $k['desc_gigi_anomali'] .')' ?></td>
                    </tr>
                    <tr>
                      <td>Lain-lain</td>
                      <td class="with-ellipsis line-2"><?= $k['lain_lain'] ?></td>
                    </tr>
                    <tr>
                      <td>Hal yang tidak tercakup</td>
                      <td class="with-ellipsis line-2"><?= $k['hal_tidak_tercakup']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-3">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Occlusi</td>
                      <td class="with-ellipsis line-3"><?= $k['occlusi']; ?></td>
                    </tr>
                    <tr>
                      <td>Torus Palatinus</td>
                      <td class="with-ellipsis line-3"><?= $k['torus_palatinus']; ?></td>
                    </tr>
                    <tr>
                      <td>Torus</td>
                      <td class="with-ellipsis line-3"><?= $k['torus']; ?></td>
                    </tr>
                    <tr>
                      <td>Mandibularis</td>
                      <td class="with-ellipsis line-3"><?= $k['mandibularis']; ?></td>
                    </tr>
                    <tr>
                      <td class="with-ellipsis line-3" colspan="2"><?= 'D: '. $k['d'] . ' M: '. $k['m'] . ' F: ' . $k['f']; ?></td>
                    </tr>
                    <tr>
                      <td>Jumlah Foto yang diambil</td>
                      <td class="with-ellipsis line-3"><?= $k['jumlah_foto'] . ' '. $k['type_foto']; ?></td>
                    </tr>
                    <tr>
                      <td>Jumlah foto rontgen yang diambil</td>
                      <td class="with-ellipsis line-3"><?= $k['jumlah_foto_rontgen'] . ' '. $k['type_foto_rontgen']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- <div class="row">
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
              </div> -->

              <!-- <div class="col-md-4">
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
              </div> -->

            

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
