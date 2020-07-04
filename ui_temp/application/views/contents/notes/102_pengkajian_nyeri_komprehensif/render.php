
<style>
  #coretan{
    width: 400px; height: 400px;
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
                      <td>Petugas Approve</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_petugas'])); ?></td>
                    </tr>
                    <tr>
                      <td>Dokter Approve</td>
                      <td class="with-ellipsis"><?= ucwords(strtolower($k['approved_dokter'])); ?></td>
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
                      <td class="with-ellipsis"><?= $k['jenis_kelamin_pasien']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table class="table nowrap">
                  <tbody>
                    <div class="text-center col-lg-12">
                      <b>Wali Pasien</b>
                    </div>
                    <tr>
                      <td>Nama</td>
                      <td class="with-ellipsis"><?= $k['nama_wali']; ?></td>
                    </tr>
                    <tr>
                      <td>No Identitas</td>
                      <td class="with-ellipsis"><?= $k['no_identitas']; ?></td>
                    </tr>
                    <tr>
                      <td>Usia</td>
                      <td class="with-ellipsis"><?= $k['usia_wali']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td class="with-ellipsis"><?= $k['alamat']; ?></td>
                    </tr>
                    <tr>
                      <td>Hubungan</td>
                      <td class="with-ellipsis"><?= $k['hubungan'] == 'on' ? $k['desc_hubungan'] : $k['hubungan'] ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td class="with-ellipsis"><?= $k['jenis_kelamin_wali']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-4">
               <table class="table nowrap">
                 <tr>
                   <td>Diagnosis Kerja</td>
                   <td>
                    <ul>
                      <?php foreach($k['diagnosis_kerja'] as $dk){ ?>
                        <li> <?= $dk ?> </li> 
                        <?= $dk == 'Lain-lain' ? '<li>'. $k['desc_lain'] .'</li>': '' ?>
                      <?php } ?>
                     </ul>
                   </td>
                 </tr>
                 <tr>
                   <td>Dasar Diagnosis</td>
                   <td>Ananmesis, pemeriksaan fisik, permeriksaan penunjang.</td>
                 </tr>
                 <tr>
                   <td>Jenis Tindakan</td>
                   <td>Sectio Caesarea</td>
                 </tr>
                 <tr>
                   <td>Indikasi Tindakan</td>
                   <td>
                     <ul>
                     <?php foreach($k['indikasi_tindakan'] as $it){ ?>
                        <li> <?= $it ?> </li> 
                     <?php } ?>
                     </ul>
                    </td>
                 </tr>
                 <tr>
                   <td>Tata Cara</td>
                   <td>Insisi perut (Sectio Caesarea)</td>
                 </tr>
                 <tr>
                   <td>Risiko/Komplikasi</td>
                   <td>
                      <ul style="padding-left: 10px">
                        <li> Robekan Rahim </li>
                        <li> Kehilangan darah lebih banyak </li>
                        <li> Cedera kandung kemih </li>
                        <li> Robekan dan perlen gketan usus </li>
                        <li> Angkat Rahim </li>
                        <li> Perawatan ICU </li>
                        <li> Kematian Ibu </li>
                        <li> Infeksi luka ope</li>
                      </ul>
                    </td>
                 </tr>
                  <tr>
                    <td>Prognosis</td>
                    <td><?=$k['prognosis']?></td>
                  </tr>
                  <tr>
                    <td>Alternatif</td>
                    <td><?=$k['alternatif']?></td>
                  </tr>
                  <tr>
                    <td>Lain lain/ analgetik post operasi</td>
                    <td><?=$k['lain_lain']?></td>
                  </tr>

               </table>
              </div>

              <div class="col-md-4">
                <table class="table nowrap">
                  <div class="text-center col-lg-12">
                      <b>Wali Pasien</b>
                  </div>
                  <tr>
                    <td>
                      <center><img src="<?=$k['coretan_wali']?>" alt=""></center>
                    </td>
                  </tr>
                  <tr>
                    <td style="border-top: 0px">
                    <div class="text-center col-lg-12">
                      <?=$k['nama_wali']?>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <div class="text-center col-lg-12">
                      Bertanda tangan untuk pasien a.n. : <?=$k['nama_pasien']?>
                    </div>
                    </td>
                  </tr>
                </table>
                <table class="table nowrap">
                  <div class="text-center col-lg-12">
                      <b>Pasien</b>
                  </div>
                  <tr>
                    <td>
                      <center><img src="<?=$k['coretan_pasien']?>" alt=""></center>
                    </td>
                  </tr>
                  <tr>
                    <td style="border-top: 0px">
                    <div class="text-center col-lg-12">
                      <?=$k['nama_pasien']?>
                    </div>
                    </td>
                  </tr>
                </table>
                <table class="table nowrap">
                  <div class="text-center col-lg-12">
                      <b>Saksi Pihak RS</b>
                  </div>
                  <tr>
                    <td>
                      <center><img src="<?=$k['coretan_saksi']?>" alt=""></center>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <div class="text-center col-lg-12">
                      <?=$k['saksi']?>
                    </div>
                    </td>
                  </tr>
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
