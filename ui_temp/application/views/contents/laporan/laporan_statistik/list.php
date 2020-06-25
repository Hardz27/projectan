
<br>
<div class="col-md-12" id="view-container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">  
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-2"></div>
        <div class="col-md-6 text-right">
          <a href="<?php echo base_url() . $class_name . '/print_pdf';?>" class="btn btn-primary" target="blank"><i class="fa fa-print"></i> PDF</a>
          <a href="<?php echo base_url() . $class_name . '/export';?>" class="btn btn-success"  target="blank"><i class="fa fa-download"></i> Excel</a>
        </div>

      </div>
    </div>

  </div>

  <br><br>

<!-- Tabel culumn 1 -->
  <div class="row">
    <div class="col-md-4">
      <table id="data_umur" class="table nowrap" style="width:100%">
        <thead>
          <td>Pasien - Umur</td>
          <td>L</td>
          <td>P</td>
          <td>Total</td>
        </thead>
        <tbody>
          <?php 
              $data = $laporan_statistik['data_umur'];
              $keys = array_keys((array)$data);
              
              for ($i=0; $i < count($keys); $i++) { 
                
          ?>
          <tr>
            <td><?= $keys[$i] ?></td>
            <td><?= $data[$keys[$i]]['pria'] ?></td>
            <td><?= $data[$keys[$i]]['wanita'] ?></td>
            <td><?= $data[$keys[$i]]['pria'] + $data[$keys[$i]]['wanita'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <br><br>
      
      <!-- <table id="data_lokasi" class="table nowrap" style="width:100%">
        <thead>
          <tr>
            <td colspan="4" class="text-center">Geolocation</td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td>L</td>
            <td>P</td>
            <td>Total</td>
          </tr>
        </thead>
        <tbody>
          <?php 
              $data = $laporan_statistik['data_lokasi'];
              $keys = array_keys((array)$data);
              
              for ($i=0; $i < count($keys); $i++) { 
                
          ?> -->
          <!-- Dummy data -->
          <!-- <tr>
            <td><?= $keys[$i] ?></td>
            <td><?= $data[$keys[$i]]['pria'] ?></td>
            <td><?= $data[$keys[$i]]['wanita'] ?></td>
            <td><?= $data[$keys[$i]]['pria'] + $data[$keys[$i]]['wanita'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table> -->
    </div>


<!-- Tabel Column 2 -->
    <div class="col-md-4">
      <table id="icd10" class="table nowrap" style="width:100%">
        <thead>
          <td width="15%">ICD 10</td>
          <td width="75%">Deskripsi</td>
          <td width="10%">Total</td>
        </thead>
        <tbody>
           <?php 
              $data = $laporan_icd10;
              $keys = array_keys((array)$data);
              
              for ($i=0; $i < count($keys); $i++) { 
                
          ?>
          <!-- Dummy data -->
          <tr>
            <td><?= $keys[$i] ?></td>
            <?php
            $total = 0;
            if (isset($data[$keys[$i]]['primary']) && isset($data[$keys[$i]]['secondary'])) {
              $type = 'primary';
              $total_icd10 = $data[$keys[$i]]['primary']['total']['pria'] + $data[$keys[$i]]['primary']['total']['wanita'];
              $total_icd10 += $data[$keys[$i]]['secondary']['total']['pria'] + $data[$keys[$i]]['secondary']['total']['wanita'];
            }elseif (isset($data[$keys[$i]]['secondary'])) {
              $type = 'secondary';
              $total_icd10 = $data[$keys[$i]][$type]['total']['pria'] + $data[$keys[$i]][$type]['total']['wanita'];
            }else{
              $type = 'primary';
              $total_icd10 = $data[$keys[$i]][$type]['total']['pria'] + $data[$keys[$i]][$type]['total']['wanita'];
            }

            ?>
            <td><?= $data[$keys[$i]][$type]['deskripsi'] ?></td>
            <td><?= $total_icd10 ?></td>
          </tr>

          <?php } ?>

        </tbody>
      </table>
    </div>

<!-- Tabel Column 3 -->
    <div class="col-md-4">
      
      <table id="" class="table nowrap" style="width:100%">
        <thead>
          <td colspan="2" class="text-center">Pasien Lama / Baru</td>
        </thead>
        <tbody>
          <?php 
              $data = $laporan_statistik['data_status_pasien'];
              $total_pasien = $data['lama'] + $data['baru'];
          ?>
          <!-- Dummy data -->
          <tr>
            <td width="90%">Pasien Lama</td>
            <td><?= $data['lama'] ?></td>
          </tr>
          <tr>
            <td>Pasien Baru</td>
            <td><?= $data['baru'] ?></td>
          </tr>
        </tbody>
      </table>
      
      <br>
      
      <table id="" class="table nowrap" style="width:100%">
        <thead>
          <td colspan="2" class="text-center">Pasien Laki-laki / Perempuan</td>
        </thead>
        <tbody>
          <?php 
              $data = $laporan_statistik['data_kelamin'];
          ?>
          <!-- Dummy data -->
          <tr>
            <td width="90%">Pasien Laki-laki</td>
            <td><?= $data['pria'] ?></td>
          </tr>
          <tr>
            <td>Pasien Perempuan</td>
            <td><?= $data['wanita'] ?></td>
          </tr>
        </tbody>
      </table>

      <br>

      <table id="" class="table nowrap" style="width:100%">
        <thead>
          <td colspan="2" class="text-center">Pasien total</td>
        </thead>
        <tbody>
          <!-- Dummy data -->
          <tr>
            <td width="90%">Total Pasien</td>
            <td><?= $total_pasien ?></td>
          </tr>
        </tbody>
      </table>

      <br>

      <table id="" class="table nowrap" style="width:100%">
        <thead>
          <td colspan="2" class="text-center">Penjamin</td>
        </thead>
        <tbody>
          <?php 
              $data = $laporan_statistik['data_penjamin'];
              $keys = array_keys((array)$data);
              
              for ($i=0; $i < count($keys); $i++) { 
          ?>
          <tr>
            <td width="90%"><?= $keys[$i] ?></td>
            <td><?= $data[$keys[$i]] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <br>

      <table id="" class="table nowrap" style="width:100%">
        <thead>
          <td colspan="2" class="text-center">Dokter</td>
        </thead>
        <tbody>
          <!-- Dummy data -->
          <?php 
              $data = $laporan_statistik['data_dokter'];
              $keys = array_keys((array)$data);
              
              for ($i=0; $i < count($keys); $i++) { 
                
          ?>
          <tr>
            <td width="90%"><?= $keys[$i] ?></td>
            <td><?= $data[$keys[$i]] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-xs-3">
        <canvas id="chart_jk_pasien" width="100%" height="100%"></canvas>
    </div>
    <div class="col-xs-3">
        <canvas id="chart_status_pasien" width="100%" height="100%"></canvas>
    </div>
    <div class="col-xs-3">
        <canvas id="chart_penjamin_pasien" width="100%" height="100%"></canvas>
    </div>
    <div class="col-xs-3">
        <canvas id="chart_total_pasien" width="100%" height="100%"></canvas>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6">
        <canvas id="chart_umur_pasien" width="100%" height="100%"></canvas>
    </div>
    <div class="col-xs-6">
        <canvas id="chart_icd10" width="100%" height="100%"></canvas>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
        <canvas id="chart_data_lokasi" width="100%" height="100%"></canvas>
    </div>
    <div class="col-xs-6">
        <canvas id="chart_data_dokter" width="100%" height="100%"></canvas>
    </div>
  </div>
  

</div>

<?= '<script>var json ='.json_encode($laporan_statistik).'</script>' ?>
<?= '<script>var icd10 ='.json_encode($laporan_icd10).'</script>' ?>

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
    $('table#data_umur').DataTable({
       "scrollX": true,
       "lengthMenu": [10, 50, 100, 200],
       "info" : true,
       "pageLength": 10,
       "order": [[3, 'desc']],
    });
    $('table#data_lokasi').DataTable({
       "scrollX": true,
       "lengthMenu": [10, 50, 100, 200],
       "info" : true,
       "pageLength": 10,
       "order": [[3, 'desc']],
    });
    $('table#icd10').DataTable({
       "scrollX": true,
       "lengthMenu": [10, 50, 100, 200],
       "info" : true,
       "pageLength": 10,
       "order": [[2, 'desc']],
    });
    grafik();
  });

  function grafik() 
  {

    data = json;


    Chart.defaults.global.defaultFontFamily = "Arial";
    Chart.defaults.global.defaultFontSize = 12;

    // Start Chart Kelamin Pasien
    ////////////////////////////////

    var jkPasien = document.getElementById("chart_jk_pasien");
            
    var pieChart = new Chart(jkPasien, {
      type: 'pie',
      data: {
        labels: ["Laki-Laki", "Perempuan"],
        datasets: [{
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [data.data_kelamin['pria'],data.data_kelamin['wanita']]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Data Jenis Kelamin Pasien'
        }
      }
    });


    // Start Chart Status Pasien
    ////////////////////////////////
    var statusPasien = document.getElementById("chart_status_pasien");
    
    var pieChart = new Chart(statusPasien, {
      type: 'pie',
      data: {
        labels: ["Pasien Baru", "Pasien Lama"],
        datasets: [{
          backgroundColor: ["#26ed58", "#f2d724"],
          data: [data.data_status_pasien['baru'],data.data_status_pasien['lama']]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Data Status Pasien'
        },
        pieceLabel: {
           render: 'value'
        }
      }
    });

    // Start Chart Penjamin
    /////////////////////////////////

    var penjaminPasien = document.getElementById("chart_penjamin_pasien");
    
    var keys = Object.keys(data.data_penjamin);
    var banyak = Object.keys(data.data_penjamin).length;
    var chartData = {};

    var color = [banyak];
    var labelData = [banyak];

    for (var i = 0; i < banyak; i++) {
      color[i] = '#' + (Math.random()*0xFFFFFF<<0).toString(16);
      var splitStr = keys[i].toLowerCase().split(' ');
      for (var n = 0; n < splitStr.length; n++) {
            splitStr[n] = splitStr[n].charAt(0).toUpperCase() + splitStr[n].substring(1);     
      }
      labelData[i] = splitStr.join(' '); 
    }
             

    var dataPie = {
          labels: [],
          datasets: [{
            backgroundColor: [],
            data: []
          }]
    };

    for (var i = 0; i < banyak; i++) {
      dataPie.labels.push(labelData[i]);
      dataPie.datasets[0].backgroundColor.push(color[i]);
      dataPie.datasets[0].data.push(data.data_penjamin[keys[i]]);
    }
            

    var pieChart = new Chart(penjaminPasien, {
      type: 'pie',
      data: dataPie,
      options: {
        title: {
          display: true,
          text: 'Data Penjamin Pasien'
        },
        pieceLabel: {
           render: 'value' //show values
        }
      }
    });

    // Start Chart total Pasien
    ////////////////////////////////
    var totalPasien = document.getElementById("chart_total_pasien");
    
    var pieChart = new Chart(totalPasien, {
      type: 'pie',
      data: {
        labels: ["Total Pasien"],
        datasets: [{
          backgroundColor: ["#f2d724"],
          data: [(data.data_status_pasien['lama'] + data.data_status_pasien['baru'])]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Data Total Pasien'
        },
        pieceLabel: {
           render: 'value'
        }
      }
    });

    // Start Chart Umur Pasien
    /////////////////////////////////

    var umurPasien = document.getElementById("chart_umur_pasien");
    
    var keys = Object.keys(data.data_umur);
    var banyak = Object.keys(data.data_umur).length;
    var chartData = {};

    var color = [banyak];
    var labelData = [banyak];
    for (var i = 0; i < banyak; i++) {
      color[i] = '#' + (Math.random()*0xFFFFFF<<0).toString(16);
      var splitStr = keys[i].toLowerCase().split(' ');
      for (var n = 0; n < splitStr.length; n++) {
            splitStr[n] = splitStr[n].charAt(0).toUpperCase() + splitStr[n].substring(1);     
      }
      labelData[i] = splitStr.join(' '); 
    }
             

    var dataPie = {
          labels: [],
          datasets: [{
            backgroundColor: [],
            data: []
          }]
    };

    for (var i = 0; i < banyak; i++) {
      dataPie.labels.push(labelData[i]);
      dataPie.datasets[0].backgroundColor.push(color[i]);
      dataPie.datasets[0].data.push(data.data_umur[keys[i]]['pria'] + data.data_umur[keys[i]]['wanita']);
    }
            
    
    var pieChart = new Chart(umurPasien, {
      type: 'pie',
      data: dataPie,
      options: {
        title: {
          display: true,
          text: 'Data Umur Pasien'
        },
        pieceLabel: {
           render: 'value' //show values
        },
        legend: {
            display: true,
            position : 'left'
        }
      }
    });    

    // Start Chart Data ICD10
    /////////////////////////////////
    var dataIcd10 = document.getElementById("chart_icd10");
    
    var keys = Object.keys(icd10);
    var banyak = Object.keys(icd10).length;
    var chartData = {};

    var color = [banyak];
    var labelData = [banyak];
    for (var i = 0; i < banyak; i++) {
      color[i] = '#' + (Math.random()*0xFFFFFF<<0).toString(16);
      var splitStr = keys[i].toLowerCase().split(' ');
      for (var n = 0; n < splitStr.length; n++) {
            splitStr[n] = splitStr[n].charAt(0).toUpperCase() + splitStr[n].substring(1);     
      }
      labelData[i] = splitStr.join(' '); 
    }
             

    var dataPie = {
          labels: [],
          datasets: [{
            backgroundColor: [],
            data: []
          }]
    };

    for (var i = 0; i < banyak; i++) {
      if (typeof icd10[keys[i]]['primary'] !== 'undefined' && typeof icd10[keys[i]]['secondary'] !== 'undefined') {
        var type = 'primary';
        var total_icd10 = icd10[keys[i]]['primary']['total']['pria'] + icd10[keys[i]]['primary']['total']['wanita'];
        total_icd10 += icd10[keys[i]]['secondary']['total']['pria'] + icd10[keys[i]]['secondary']['total']['wanita'];

      }else if (typeof icd10[keys[i]]['secondary'] !== 'undefined') {
        var type = 'secondary';
        var total_icd10 = icd10[keys[i]][type]['total']['pria'] + icd10[keys[i]][type]['total']['wanita'];

      }else{
        var type = 'primary';
        var total_icd10 = icd10[keys[i]][type]['total']['pria'] + icd10[keys[i]][type]['total']['wanita'];
      }

      dataPie.labels.push(labelData[i]);
      dataPie.datasets[0].backgroundColor.push(color[i]);
      dataPie.datasets[0].data.push(total_icd10);
    }
    
    // console.log(dataPie);
    
    var pieChart = new Chart(dataIcd10, {
      type: 'pie',
      data: dataPie,
      options: {
        title: {
          display: true,
          text: 'Data ICD10'
        },
        pieceLabel: {
           render: 'value' //show values
        },
        legend: {
            display: true,
            position : 'right'
        }
      }
    });  

    // Start Chart Data lokasi
    /////////////////////////////////
    // var lokasiPasien = document.getElementById("chart_data_lokasi");
    
    // var keys = Object.keys(data.data_lokasi);
    // var banyak = Object.keys(data.data_lokasi).length;
    // var chartData = {};

    // var color = [banyak];
    // var labelData = [banyak];
    // for (var i = 0; i < banyak; i++) {
    //   color[i] = '#' + (Math.random()*0xFFFFFF<<0).toString(16);
    //   var splitStr = keys[i].toLowerCase().split(' ');
    //   for (var n = 0; n < splitStr.length; n++) {
    //         splitStr[n] = splitStr[n].charAt(0).toUpperCase() + splitStr[n].substring(1);     
    //   }
    //   labelData[i] = splitStr.join(' '); 
    // }
             

    // var dataPie = {
    //       labels: [],
    //       datasets: [{
    //         backgroundColor: [],
    //         data: []
    //       }]
    // };

    // for (var i = 0; i < banyak; i++) {
    //   dataPie.labels.push(labelData[i]);
    //   dataPie.datasets[0].backgroundColor.push(color[i]);
    //   dataPie.datasets[0].data.push(data.data_lokasi[keys[i]]['pria'] + data.data_lokasi[keys[i]]['wanita']);
    // }
            
    
    // var pieChart = new Chart(lokasiPasien, {
    //   type: 'pie',
    //   data: dataPie,
    //   options: {
    //     title: {
    //       display: true,
    //       text: 'Data Lokasi'
    //     },
    //     pieceLabel: {
    //        render: 'value' //show values
    //     },
    //     legend: {
    //         display: true,
    //         position : 'left'
    //     }
    //   }
    // });    



    // Start Chart Dokter
    ////////////////////////////////
    var dataDokter = document.getElementById("chart_data_dokter");
    
    var keys = Object.keys(data.data_dokter);
    var banyak = Object.keys(data.data_dokter).length;
    var chartData = {};

    var color = [banyak];
    var labelData = [banyak];
    for (var i = 0; i < banyak; i++) {
      color[i] = '#' + (Math.random()*0xFFFFFF<<0).toString(16);
      var splitStr = keys[i].toLowerCase().split(' ');
      for (var n = 0; n < splitStr.length; n++) {
            splitStr[n] = splitStr[n].charAt(0).toUpperCase() + splitStr[n].substring(1);     
      }
      labelData[i] = splitStr.join(' '); 
    }
             

    var dataPie = {
          labels: [],
          datasets: [{
            backgroundColor: [],
            data: []
          }]
    };

    for (var i = 0; i < banyak; i++) {
      dataPie.labels.push(labelData[i]);
      dataPie.datasets[0].backgroundColor.push(color[i]);
      dataPie.datasets[0].data.push(data.data_dokter[keys[i]]);
    }
            
    
    var pieChart = new Chart(dataDokter, {
      type: 'pie',
      data: dataPie,
      options: {
        title: {
          display: true,
          text: 'Data Dokter'
        },
        pieceLabel: {
           render: 'value' //show values
        },
        legend: {
            display: true,
            position : 'right'
        }
      }
    });    
  //End of chart
  }
</script>