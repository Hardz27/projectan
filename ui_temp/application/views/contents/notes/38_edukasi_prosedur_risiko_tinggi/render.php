
<style>
  #coretan{
    width: 250px; height: 75px;
    border: 0px solid black;
    
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
                      <td>Nama Pemberi Edukasi</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <td>Nama Pelaksana Tindakan</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_dokter'])); ?></td>
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
                      <td>Nama Wali</td>
                      <td class="with-ellipsis"><?= $k['nama_wali']; ?></td>
                  
                    </tr>
                    <tr>
                      <td>Usia</td>
                      <td class="with-ellipsis"><?= $k['usia_wali']; ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td class="with-ellipsis"><?= $k['jenis_kelamin_wali']; ?></td>
                    </tr>
                    <tr>
                      <td>Hubungan</td>
                      <td class="with-ellipsis"><?= $k['hubungan']; ?></td>
                    </tr>

                    <tr>
                      <td>Tanggal Lahir</td>
                      <td class="with-ellipsis"><?= $k['tanggal_lahir_tindakan']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td class="with-ellipsis"><?= $k['alamat_tindakan'];?></td>
                    </tr>
                    <tr>
                      <td>No. Identitas</td>
                      <td class="with-ellipsis"><?= $k['no_identitas'];?></td>
                    </tr>

                    
                    
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    <tr>
                      <td>Tindakan yang Dilakukan</td>
                      <td class="with-ellipsis"><?= $k['tindakan_yang_dilakukan'];?></td>
                    </tr>
                    <tr>
                      <td>Diagnosis (WD dan DD)</td>
                      <td class="with-ellipsis"><?= $k['diagnosis']; ?></td>
                    </tr>
                    <tr>
                      <td>Dasar Diagnosis</td>
                      <td class="with-ellipsis">Anamnesis, pemeriksaan fisik, pemeriksaan penunjang</td>
                    </tr>
                    <tr>
                      <td>Indikasi Tindakan</td>
                      <td class="with-ellipsis"><?= $k['indikasi_tindakan']; ?></td>
                    </tr>
                    <tr>
                      <td>Tata Cara</td>
                      <td class="with-ellipsis"><?= $k['tata_cara']; ?></td>
                    </tr>
                    <tr>
                      <td>Tujuan</td>
                      <td class="with-ellipsis"><?= $k['tujuan']; ?></td>
                    </tr>
                    <tr>
                      <td>Resiko/Komplikasi</td>
                      <td class="with-ellipsis"><?= $k['resiko_komplikasi']; ?></td>
                    </tr>
                    <tr>
                      <td>Prognosis</td>
                      <td class="with-ellipsis"><?= $k['prognosis']; ?></td>
                    </tr>
                    <tr>
                      <td>Alternatif</td>
                      <td class="with-ellipsis"><?= $k['alternatif']; ?></td>
                    </tr>
                    <tr>
                      <td>Lain-lain/Kebutuhan darah</td>
                      <td class="with-ellipsis"><?= $k['lain_lain']; ?></td>
                    </tr>
                    
                  </tbody>
                </table>
                
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <tbody>
                    
                    <tr>
                      <td>Tanggal</td>
                      <td class="with-ellipsis"><?= $k['tanggal']; ?></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td class="with-ellipsis"><?= $k['jam']; ?></td>
                    </tr>
                    


                    <tr>
                      <td>Ttd Wali Pasien</td>

                      <td class="with-ellipsis">
                        <div id="coretan" style=''>
                  <!-- <canvas id="signature-pad" class="signature-pad" width="400px" height="400px"> -->
                        <img src='<?= $k['coretan_wali']; ?>' id='sign_prev' />
                      </div><br/>
                      </td>
                    </tr>

                    
                    <tr>
                      <td>Ttd pasien</td>

                      <td class="with-ellipsis">
                        <div id="coretan" style=''>
                  <!-- <canvas id="signature-pad" class="signature-pad" width="400px" height="400px"> -->
                        <img src='<?= $k['coretan_pasien']; ?>' id='sign_prev' />
                      </div><br/>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>Ttd Saksi Pihak RS</td>

                      <td class="with-ellipsis">
                        <div id="coretan" style=''>
                  <!-- <canvas id="signature-pad" class="signature-pad" width="400px" height="400px"> -->
                        <img src='<?= $k['coretan_saksi']; ?>' id='sign_prev' />
                      </div><br/>
                      </td>
                    </tr>
                    <tr>
                      <td>Nama Jelas Saksi Pihak RS</td>
                      <td class="with-ellipsis"><?= $k['nama_saksi_rs']; ?></td>
                    </tr>
                    
                    <!-- <tr>
                      <td>Ttd Pemberi Edukasi</td>

                      <td class="with-ellipsis">
                        <div id="coretan" style=''>
                  <canvas id="signature-pad" class="signature-pad" width="400px" height="400px">
                        <img src='<?= $k['pemberi_edukasi']; ?>' id='sign_prev' />
                      </div><br/>
                      </td>
                    </tr> -->
                    
                  </tbody>
                </table>
                
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
