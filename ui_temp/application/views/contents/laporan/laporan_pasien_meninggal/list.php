<div class="col-md-12" id="view-container">
  <div class="row">
    <div class="col-md-5"> 
      <div class="row">
        <div class="col-md-2">
          <b>Bulan</b>
          <br>
          
        </div>
        <!-- nama -->
        <div class="col-md-11">
          <div class="box-button">
            <button class="btn btn-default active" style=" Margin-top: 10px;">Januari</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Februari</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Maret</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">April</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Mei</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Juni</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Juli</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Agustus</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">September</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Oktober</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">November</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">Desember</button>&nbsp;
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4"> 
      <div class="row">
        <div class="col-md-2">
          <b>Tahun</b>
          <br>

        </div>
        <!-- nama -->
        <div class="col-md-12">
          <div class="box-button">
            <button class="btn btn-default" style=" Margin-top: 10px;">2017</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">2018</button>&nbsp;
            <button class="btn btn-default" style=" Margin-top: 10px;">2019</button>&nbsp;
            <button class="btn btn-default active" style=" Margin-top: 10px;">2020</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary" style=" Margin-top: 10px;">Buka Filter</button>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-3">  
      <div class="row">
        <!-- nama -->
        <div class="col-md-2">
          <br>
          
        </div>
        <div class="col-md-12 text-right">
          <a href="<?php echo  base_url() .$class_name . '/print_pdf';?>"  target="blank" class="btn btn-primary" style=" Margin-top: 10px;"><i class="fa fa-print"></i> PDF</a>
          <a href="<?php echo  base_url() .$class_name. '/export';?>"  target="blank" class="btn btn-success" style=" Margin-top: 10px;"><i class="fa fa-print"></i> Excel</a>
        </div>

      </div>
    </div>

  </div>
  <br>
  <br>

  <div class="col-md-12">
    <table id="laporan_pasien" class="table nowrap" style="width:100%">
      <thead>
        <td>ID REG</td>
        <td>No.Reg</td>
        <td>Nama DPJP</td>
        <td>Tanggal Checkin</td>
        <td>Tanggal Checkout</td>
        <td>ICD10 Primary</td>
        <td>Kondisi Pulang</td>
        <td>Alasan Pulang</td>
        <td>No.RM</td>
        <td>No.BPJS</td>
        <td>No.KTP</td>
        <td>Nama Pasien</td>
        <td>Kelamin</td>
        <td>Penjamin</td>
        <td>Umur</td>
        <td>Alamat 1</td>
        <td>Alamat 2</td>
        <td>Date Meninggal</td>
        <td>Sebab Kematian</td>
        <td>No Surat Kematian</td>
        <td>Keterangan Kematian</td>
        <td>Dasar Diagnosa</td>
        <td>Tempat Meninggal</td>
        <td>Rencana Pemulasaran</td>
        <td>Keadaan Ibu Meninggal</td>
      </thead>
      <tbody>

        <?php 
        $data = $laporan_pasien_meninggal;
        $keys = array_keys((array)$data);
        $no = 1;
        for ($i=0; $i < count($keys); $i++) { 

          ?>
          <tr>
            <td><?= $data[$keys[$i]]['id_reg'] ?></td>
            <td><?= $data[$keys[$i]]['no_reg'] ?></td>
            <td><?= $data[$keys[$i]]['nama_dpjp'] ?></td>
            <td><?= $data[$keys[$i]]['tgl_checkin'] ?></td>
            <td><?= $data[$keys[$i]]['tgl_checkout'] ?></td>
            <td><?= $data[$keys[$i]]['icd_10_primary'] ?></td>
            <td><?= $data[$keys[$i]]['kondisi_pulang'] ?></td>
            <td><?= $data[$keys[$i]]['alasan_pulang'] ?></td>
            <td><?= $data[$keys[$i]]['no_rm'] ?></td>
            <td><?= $data[$keys[$i]]['no_bpjs'] ?></td>
            <td><?= $data[$keys[$i]]['no_ktp'] ?></td>
            <td><?= $data[$keys[$i]]['nama_pasien'] ?></td>
            <td><?= $data[$keys[$i]]['penjamin'] ?></td>
            <td><?= $data[$keys[$i]]['kelamin'] ?></td>
            <td><?= $data[$keys[$i]]['umur'] ?></td>
            <td><?= $data[$keys[$i]]['alamat_1'] ?></td>
            <td><?= $data[$keys[$i]]['alamat_2'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['date_meninggal'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['sebab_kematian'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['no_surat_kematian'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['keterangan_kematian'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['meninggal_dasar_diagnosa'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['meninggal_tempat_meninggal'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['meninggal_rencana_pemulasaran'] ?></td>
            <td><?= $data[$keys[$i]]['data_meninggal'][0]['meninggal_keadaan_ibu_meninggal'] ?></td>
          </tr>
        <?php } ?>

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
    $('#laporan_pasien').DataTable({
      'scrollX' : true,
      'lengthMenu': [10, 50, 100, 200],
       'info' : true,
       'pageLength': 10
    });
  } );
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
  $(document).ready(function(){
    $('.box-button').on('click', 'button', function() {
      $(this).addClass('active').siblings().removeClass('active');
    });
  });
</script>
