
<div class="col-md-12" id="view-container">
  <div class="row">
    <div class="col-md-4"> 

      <div class="row">
                  <!-- nama -->
        <div class="col-md-3">
          <b>Tanggal</b>
        </div>
        <div class="col-md-5">
          <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary">Buka Filter</button>
        </div>
      </div>
      <br>
    </div>

    <div class="col-md-8">  
      <div class="row">
                  <!-- nama -->
        <div class="col-md-4"></div>
        <div class="col-md-2"></div>

         <div class="col-md-12 text-right">
          <!-- <button class="btn btn-primary"><i class="fa fa-print"></i> PDF Summary</button> -->
          <a href="<?php echo  base_url() . $route  . '/print_pdf';?>"  target="blank" class="btn btn-primary" style=" Margin-top: 10px;"><i class="fa fa-print"></i> PDF</a>
          <a href="<?php echo  base_url() . $route . '/export';?>"  target="blank" class="btn btn-success" style=" Margin-top: 10px;"><i class="fa fa-print"></i> Excel</a>
         <!--  <button class="btn btn-success" style=" Margin-top: 10px;"><i class="fa fa-download"></i> Excel</button> -->
        </div>

      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <table id="laporan_pasien" class="table font nowrap" style="width:100%">
        <thead>
          <tr>
          <td>No</td>
          <!-- <td>Id Pasien Registrasi</td> -->
          <td>No. Kartu</td>
          <td>No Mr</td>
          <td>Nama</td>
          <td>Tgl. SEP</td>
          <td>Tgl. Pulang</td>
          <td>No. Sep</td>
          <td>PPK Pelayanan</td>
          <td>Jns. Pelayanan</td>
          <td>Kelas Rawat</td>
          <td>Jns. Rawat</td>
          
          <td>Asal Rujukan</td>
          <td>Tgl. Rujukan</td>
          <td>No. Rujukan</td>
          <td>No. Rujukan Keluar</td>
          <td>Nama PPK Rujukan</td>
          <td>PPK Rujukan</td>
          <td>Catatan</td>
          <td>Diagnosa Awal</td>
          <td>Kode Diagnosa Awal</td>
          <td>Poli Tujuan</td>
          <td>Kode Poli Tujuan</td>
          <td>Eksekutif</td>
          <td>Cob</td>
          <td>Katarak</td>
          <td>Lakalantas</td>
          <td>Lokasi Laka</td>
          <td>Penjamin</td>
          <td>Tgl Kejadian</td>
          <td>Keterangan</td>
          <td>Suplesi</td>
          <td>No. SEP Suplesi</td>
          <td>kode Propinsi</td>
          <td>Kode Kabupaten</td>
          <td>Kode Kecamatan</td>
          <td>No. Surat</td>
          <td>Kode DPJP</td>
          <td>Nama DPJP</td>
          <td>Diinput Oleh</td>
          <td>Tanggal Dibuat</td>
          <td>Dihapus Oleh</td>
          <td>Petugas Pulang</td>
          <td>No. Telpon</td>
          <td>User</td>
          <td>Vclaim Rujukan</td>
          <td>Ref ICD10</td>

        </tr>
        </thead>
        <tbody>
           <?php 
        $data = $laporan_bpjs_sep;
        $keys = array_keys((array)$data);
        $no = 1;
        for ($i=0; $i < count($keys); $i++) { 

          ?>
  
                <tr>
                <td><?= $no++ ?></td>
                <!-- <td><?= $data[$keys[$i]]['id_pasien_registrasi'] ?></td> -->
                <td><?= $data[$keys[$i]]['data_vclaim']['noKartu'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['noMr'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['nama'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['tglSep'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['tglPulang'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['noSep'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['ppkPelayanan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['jnsPelayanan']['nama_detail'] ?></td> 
                <td><?= $data[$keys[$i]]['data_vclaim']['klsRawat'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['jenis_rawat']['nama_detail'] ?></td>
                
                <td><?= $data[$keys[$i]]['data_vclaim']['asalRujukan']['nama_detail'] ?></td> 
                <td><?= $data[$keys[$i]]['data_vclaim']['tglRujukan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['noRujukan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['noRujukanKeluar'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['namaPpkRujukan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['ppkRujukan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['catatan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['diagAwal'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['code_diagAwal'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['poliTujuan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['code_poliTujuan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['eksekutif'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['cob'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['katarak'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['lakaLantas'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['lokasiLaka'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['penjamin'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['tglKejadian'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['keterangan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['suplesi'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['noSepSuplesi'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['kdPropinsi'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['kdKabupaten'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['kdKecamatan'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['noSurat'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['kodeDPJP'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['nama_dpjp'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['nama_petugas_input'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['created_date'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['nama_petugas_delete'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['nama_petugas_pulang'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['noTelp'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim']['user'] ?></td>
                <td><?= $data[$keys[$i]]['data_vclaim_rujukan'] ?></td>
                <td><?= $data[$keys[$i]]['data_ref_icd10']['nama_icd10'] ?></td>
              </tr>
             <?php }     ?>
        

        </tbody>
      </table>
    </div>
  </div>

</div>



<div class="col-md-12" id="form-container" style="display:none;"></div>

<script>
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

  $(document).ready(function() {
    $('table').DataTable({
       "scrollX": true,
       "lengthMenu": [10, 50, 100, 200],
       "info" : true,
       "pageLength": 10,
       "order": [[3, 'desc']],
    });
  } );
</script>
