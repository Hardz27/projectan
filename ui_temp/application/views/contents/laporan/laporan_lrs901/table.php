<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Chart.min.css')?>">

<div class="col md-12">
  <div class="col-md-12">
      <h4><b><center><?=strtoupper($title)?></center></b></h4>
  </div>
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="thead bg-secondary" style="background-color: #e7e7e7;">
            <tr class="bg-grey">
                <th class="text-center" style="width: 5% !important" rowspan="2">NO</th>
                <th class="text-center" style="width: 5% !important" rowspan="2">JENIS KEGIATAN</th>
                <th class="text-center" style="width: 5% !important">Periode 1</th>
                <th class="text-center" style="width: 5% !important">Periode 2</th>
                <th class="text-center" style="width: 5% !important" rowspan="2"><center>TREN</center></th>
                <th class="text-center" style="width: 5% !important" rowspan="2"><center>%</center></th>
                <th class="text-center" style="width: 5% !important">Periode 1</th>
                <th class="text-center" style="width: 5% !important">Periode 2</th>
                <th class="text-center" style="width: 5% !important" rowspan="2"><center>TREN</center></th>
                <th class="text-center" style="width: 5% !important" rowspan="2"><center>%</center></th>
                <th class="text-center" style="width: 5% !important">Periode 1</th>
                <th class="text-center" style="width: 5% !important">Periode 2</th>
                <th class="text-center" style="width: 5% !important" rowspan="2"><center>TREN</center></th>
                <th class="text-center" style="width: 5% !important" rowspan="2"><center>%</center></th>
            </tr>
            <tr class="bg-grey">
                <th class="text-center" style="width: 5% !important" colspan="2">KUNJUNGAN BARU</th>
                <th class="text-center" style="width: 5% !important" colspan="2">KUNJUNGAN LAMA</th>
                <th class="text-center" style="width: 5% !important">TOTAL</th>
                <th class="text-center" style="width: 5% !important">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                $kb1 = 0; $kb2 = 0; (float)$pcn1 = 0; $kl1 = 0; $kl2 = 0; (float)$pcn2 = 0; $ttl1 = 0; $ttl2 = 0; (float)$pcn3 = 0;

                $turun1 = 0;
                $turun2 = 0;
                $turun3 = 0;
                $naik1 = 0;
                $naik2 = 0;
                $naik3 = 0;
                $tetap1 = 0;
                $tetap2 = 0;
                $tetap3 = 0;

                if ($d['code'] == '200') {
                    foreach ($d['data'] as $key => $value) {
                        $no++;
                        ($value['kunjungan_baru']['tren'] == 'TETAP'?$tetap1++:($value['kunjungan_baru']['tren'] == 'TURUN'?$turun1++:$naik1++));

                        ($value['kunjungan_lama']['tren'] == 'TETAP'?$tetap2++:($value['kunjungan_lama']['tren'] == 'TURUN'?$turun2++:$naik2++));

                        ($value['kunjungan_total']['tren'] == 'TETAP'?$tetap3++:($value['kunjungan_total']['tren'] == 'TURUN'?$turun3++:$naik3++));

                        $kb1 += $value['periode_1']['baru'];
                        $kb2 += $value['periode_2']['baru'];
                        $pcn1 += (float)$value['kunjungan_baru']['%'];

                        $kl1 += $value['periode_1']['lama'];
                        $kl2 += $value['periode_2']['lama'];
                        $pcn2 += (float)$value['kunjungan_lama']['%'];

                        $ttl1 += ($value['periode_1']['baru'] + $value['periode_1']['lama']);
                        $ttl2 += ($value['periode_2']['baru'] + $value['periode_2']['lama']);
                        $pcn3 += (float)$value['kunjungan_total']['%'];
                        ?>
                        <tr class="p-5">
                            <td class="p-5"><center><?=$no?></center></td>
                            <td class="p-5"><?=$key ?></td>
                            <td class="p-5"><center><?=format_angka($value['periode_1']['baru']) ?></center></td>
                            <td class="p-5"><center><?=format_angka($value['periode_2']['baru']) ?></center></td>
                            <td class="p-5" style="background-color: <?=(strtoupper($value['kunjungan_baru']['tren']) == 'TURUN'?'#ff7272':(strtoupper($value['kunjungan_baru']['tren']) == 'NAIK'?'#72a0ff':''))?>"><center><?=$value['kunjungan_baru']['tren'] ?></center></td>
                            <td class="p-5"><center><?=format_angka($value['kunjungan_baru']['%']) ?> %</center></td>
                            <td class="p-5"><center><?=format_angka($value['periode_1']['lama']) ?></center></td>
                            <td class="p-5"><center><?=format_angka($value['periode_2']['lama']) ?></center></td>
                            <td class="p-5" style="background-color: <?=(strtoupper($value['kunjungan_lama']['tren']) == 'TURUN'?'#ff7272':(strtoupper($value['kunjungan_lama']['tren']) == 'NAIK'?'#72a0ff':''))?>"><center><?=$value['kunjungan_lama']['tren'] ?></center></td>
                            <td class="p-5"><center><?=format_angka($value['kunjungan_lama']['%']) ?> %</center></td>
                            <td class="p-5"><center><?=format_angka($value['periode_1']['baru']+$value['periode_1']['lama']) ?></center></td>
                            <td class="p-5"><center><?=format_angka($value['periode_2']['baru']+$value['periode_2']['lama']) ?></center></td>
                            <td class="p-5" style="background-color: <?=(strtoupper($value['kunjungan_total']['tren']) == 'TURUN'?'#ff7272':(strtoupper($value['kunjungan_total']['tren']) == 'NAIK'?'#72a0ff':''))?>"><center><?=$value['kunjungan_total']['tren'] ?></center></td>
                            <td class="p-5"><center><?=format_angka($value['kunjungan_total']['%']) ?> %</center></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
            <?php 
                $arr1 = [$turun1 => 'Turun', $naik1 => 'Naik', $tetap1 => 'Tetap'];
                $arr2 = [$turun2 => 'Turun', $naik2 => 'Naik', $tetap2 => 'Tetap'];
                $arr3 = [$turun3 => 'Turun', $naik3 => 'Naik', $tetap3 => 'Tetap'];

                $n1 = max(array_keys($arr1));
                $n2 = max(array_keys($arr2));
                $n3 = max(array_keys($arr3));
            ?>
            <tfoot>
                <tr class="p-5" style="background-color: #D3D3D3;">
                    <td class="p-5" colspan="2"><center><b>TOTAL</b></center></td>
                    <td class="p-5"><center><b><?=format_angka($kb1)?></b></center></td>
                    <td class="p-5"><center><b><?=format_angka($kb2)?></b></center></td>
                    <td class="p-5" style="background-color: <?=(strtoupper($arr1[$n1]) == 'TURUN'?'#ff7272':(strtoupper($arr1[$n1]) == 'NAIK'?'#72a0ff':''))?>;"><center><b><?=strtoupper($arr1[$n1])?></b></center></td>
                    <td class="p-5"><center><b><?=format_angka($pcn1)?> %</b></center></td>
                    <td class="p-5"><center><b><?=format_angka($kl1)?></b></center></td>
                    <td class="p-5"><center><b><?=format_angka($kl2)?></b></center></td>
                    <td class="p-5" style="background-color: <?=(strtoupper($arr2[$n2]) == 'TURUN'?'#ff7272':(strtoupper($arr2[$n2]) == 'NAIK'?'#72a0ff':''))?>;"><center><b><?=strtoupper($arr2[$n2])?></b></center></td>
                    <td class="p-5"><center><b><?=format_angka($pcn2)?> %</b></center></td>
                    <td class="p-5"><center><b><?=format_angka($ttl1)?></b></center></td>
                    <td class="p-5"><center><b><?=format_angka($ttl2)?></b></center></td>
                    <td class="p-5" style="background-color: <?=(strtoupper($arr3[$n3]) == 'TURUN'?'#ff7272':(strtoupper($arr3[$n3]) == 'NAIK'?'#72a0ff':''))?>;"><center><b><?=strtoupper($arr3[$n3])?></b></center></td>
                    <td class="p-5"><center><b><?=format_angka($pcn3)?> %</b></center></td>
                </tr>
            </tfoot>
      </table>
    </div>
  </div>
  <div class="col-md-12" id="chart_area">
    <div class="col-md-6">
        <div class="row">
            <center><b>Kunjungan Baru</b></center>
        </div>
        <div class="row">
            <canvas id="kj_baru"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <center><b>Kunjungan Lama</b></center>
        </div>
        <div class="row">
            <canvas id="kj_lama"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <center><b>Total</b></center>
        </div>
        <div class="row">
            <canvas id="total"></canvas>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/Chart.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/html2canvas/html2canvas.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jspdf/dist/jspdf.min.js')?>"></script>

<script>
  $('.table').dataTable({
    "pageLength": 10,
    "autoWidth": false,
    order: [
      [0, 'asc']
    ]
  });

  function printChart(){

      html2canvas(document.getElementById("chart_area"), {
        onrendered: function(canvas) {
          var img = canvas.toDataURL("image/png");
          var doc = new jsPDF('landscape');
          var text = "",
              xOffset = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(text) * doc.internal.getFontSize() / 2); 
          doc.text(text, xOffset, 40);
          doc.setFontSize(18);
          doc.setTextColor(40);
          doc.setFontStyle("normal");

          doc.addImage(img, 'PNG', 10, 10, 280, 150);
          doc.save('<?=$judul?>');
        }
      });
    }

  // 1. s1
    var s1 = document.getElementById("kj_baru").getContext('2d');
    var ch1 = new Chart(s1, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$key.'",';
                } ?>],
            datasets: [{
                label: 'Periode 1',
                data: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$value['periode_1']['baru'].'",';
                } ?>],
                backgroundColor: [
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',

                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)'
                ],
                borderWidth: 1
            }, {
                label: 'Periode 2',
                data: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$value['periode_2']['baru'].'",';
                } ?>],
                backgroundColor: [
                'rgba(255, 233, 87, 0.2)', // Kuning
                'rgba(255, 233, 87, 0.2)',
                'rgba(255, 233, 87, 0.2)',
                'rgba(255, 233, 87, 0.2)',
                'rgba(255, 233, 87, 0.2)',

                'rgba(255, 233, 87, 0.2)',
                'rgba(255, 233, 87, 0.2)',
                'rgba(255, 233, 87, 0.2)',
                'rgba(255, 233, 87, 0.2)'

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

  // 2. s2
    var s2 = document.getElementById("kj_lama").getContext('2d');
    var ch2 = new Chart(s2, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$key.'",';
                } ?>],
            datasets: [{
                label: 'Periode 1',
                data: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$value['periode_1']['lama'].'",';
                } ?>],
                backgroundColor: [
                'rgba(255, 87, 87, 0.2)',
                'rgba(255, 87, 87, 0.2)',
                'rgba(255, 87, 87, 0.2)',
                'rgba(255, 87, 87, 0.2)',
                'rgba(255, 87, 87, 0.2)',

                'rgba(255, 87, 87, 0.2)',
                'rgba(255, 87, 87, 0.2)',
                'rgba(255, 87, 87, 0.2)',
                'rgba(255, 87, 87, 0.2)'
                ],
                borderWidth: 1
            }, {
                label: 'Periode 2',
                data: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$value['periode_2']['lama'].'",';
                } ?>],
                backgroundColor: [
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',

                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
  // 3. s3
    var s3 = document.getElementById("total").getContext('2d');
    var ch3 = new Chart(s3, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$key.'",';
                } ?>],
            datasets: [{
                label: 'Periode 1',
                data: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$value['periode_1']['total'].'",';
                } ?>],
                backgroundColor: [
                'rgba(87, 255, 103, 0.2)', // Hijau
                'rgba(87, 255, 103, 0.2)',
                'rgba(87, 255, 103, 0.2)',
                'rgba(87, 255, 103, 0.2)',
                'rgba(87, 255, 103, 0.2)',

                'rgba(87, 255, 103, 0.2)',
                'rgba(87, 255, 103, 0.2)',
                'rgba(87, 255, 103, 0.2)',
                'rgba(87, 255, 103, 0.2)'
                ],
                borderWidth: 1
            }, {
                label: 'Periode 2',
                data: [<?php foreach ($d['data'] as $key => $value) {
                    echo '"'.$value['periode_2']['total'].'",';
                } ?>],
                backgroundColor: [
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',

                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)',
                'rgba(87, 158, 255, 0.2)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>