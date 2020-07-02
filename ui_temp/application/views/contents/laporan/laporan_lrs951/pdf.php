<html>

<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .row {
            margin-bottom: 15px;
        }

        .text-center {
            text-align: center;
        }

        .r_border {
            font-family: serif;
            font-size: 13px;
            padding: 5px;
        }

        .r_border_top {
            font-family: serif;
            font-size: 10px;
            padding: 5px;
            border-top: 1px solid #000;
        }

        .r_border_bottom {
            font-family: serif;
            font-size: 10px;
            padding: 5px;
            border-bottom: 1px solid #000;
        }

        .r_border_non {
            font-family: serif;
            font-size: 10px;
            padding: 5px;
        }

        .r_color {
            background-color: #f5f5f5;
        }

        .r-bold {
            font-weight: bold;
        }

        #contents tr:nth-child(even) {
            background-color: #f2f2f2
        }

        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .font-white {
            color: #fff;
        }

        .font-size-18 {
            font-size: 18pt;
        }

        .font-size-12 {
            font-size: 12pt;
        }

        .font-size-10 {
            font-size: 10pt;
        }

        .font-size-9 {
            font-size: 9pt;
        }

        .font-size-8 {
            font-size: 8pt;
        }

        .font-size-7 {
            font-size: 7pt;
        }

        .row {
            margin-left: 15px;
            margin-right: 15px;
        }

        .mt-1 {
            margin-top: 1px;
        }

        .mt-5 {
            margin-top: 5px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mr-1 {
            margin-right: 1px;
        }

        .mr-2 {
            margin-right: 2px;
        }

        .mr-3 {
            margin-right: 3px;
        }

        .mr-4 {
            margin-right: 4px;
        }

        .mr-5 {
            margin-right: 5px;
        }

        .mr-10 {
            margin-right: 10px;
        }

        .mr-12 {
            margin-right: 20px;
        }

        .mb-5 {
            margin-bottom: 5px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .m-0 {
            margin: 0px
        }

        .p-0 {
            padding: 0px
        }

        .p-2 {
            padding: 2px;
        }

        .p-3 {
            padding: 3px;
        }

        .p-4 {
            padding: 4px;
        }

        .p-5 {
            padding: 5px;
        }

        .pt-1 {
            padding-top: 1px;
        }

        .pt-2 {
            padding-top: 2px;
        }

        .pt-3 {
            padding-top: 3px;
        }

        .pt-4 {
            padding-top: 4px;
        }

        .pt-5 {
            padding-top: 5px;
        }

        .pt-10 {
            padding-top: 10px;
        }

        .pb-1 {
            padding-bottom: 1px;
        }

        .pb-2 {
            padding-bottom: 2px;
        }

        .pb-3 {
            padding-bottom: 3px;
        }

        .pb-4 {
            padding-bottom: 4px;
        }

        .pb-5 {
            padding-bottom: 5px;
        }

        .pb-10 {
            padding-bottom: 10px;
        }

        .pb-20 {
            padding-bottom: 20px;
        }

        .pl-5 {
            padding-left: 5px;
        }

        .pl-10 {
            padding-left: 10px;
        }

        .pr-1 {
            padding-right: 1px;
        }

        .pr-2 {
            padding-right: 2px;
        }

        .pr-3 {
            padding-right: 3px;
        }

        .pr-4 {
            padding-right: 4px;
        }

        .pr-5 {
            padding-right: 5px;
        }

        .clear {
            clear: both;
        }

        .center {
            text-align: center;
        }

        .row-panel {
            margin-bottom: 10px;
            /* -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05); */
            /* box-shadow: 0 1px 1px rgba(0, 0, 0, .05); */
        }

        .row-heading {
            padding: 1px 5px;
        }

        .border-black {
            border-color: black;
        }

        .border-blue {
            border-color: #18659D;
        }

        .bg-blue {
            background-color: #18659D
        }

        .border-no-bottom {
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .border-no-top {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .bordered {
            border: 1px solid black;
        }

        .border-bottom-1 {
            border-bottom: 1px solid black
        }

        .border-top-1 {
            border-top: 1px solid black
        }

        .border-right-1 {
            border-right: 1px solid black;
        }

        .border-left-1 {
            border-left: 1px solid black;
        }

        .border-left-1-right-1 {
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .row-header {
            padding: 0px 0px 1px 3px;
            margin: 0px;
            width: 100%
        }

        .detail-administration {
            text-align: left;
            vertical-align: top;
        }

        .v-align-top {
            vertical-align: top;
        }

        .t-align-justify {
            text-align: justify
        }

        .column-left {
            float: left;
            width: 50%;
        }

        .column-right {
            float: left;
        }

        .column-3-left {
            float: left;
            width: 35%;
        }

        .column-3-middle {
            float: left;
            width: 35%;
        }

        .column-3-right {
            float: left;
        }

        ol {
            margin-left: 10px;
            padding-left: 5px
        }

        ol li {
            padding: 0;
            margin-left: 1px;
        }

        .column-left-header {
            float: left;
            width: 50%;
        }

        .column-right-header {
            float: left;
            margin-left: 5px
        }

        .column-left-detail {
            float: left;
            width: 25%;
        }

        .column-right-detail {
            float: left;
            margin-left: 5px
        }

        .col-md-1 {
            width: 8.33333333%;
        }

        .col-md-2 {
            width: 16.6666667%;
        }

        .col-md-3 {
            width: 25%;
        }

        .col-md-4 {
            width: 33.3333333%;
        }

        .col-md-5 {
            width: 41.6666667%;
        }

        .col-md-6 {
            width: 50%;
        }

        .col-md-7 {
            width: 58.3333333%;
        }

        .col-md-8 {
            width: 66.6666667%;
        }

        .col-md-9 {
            width: 75%;
        }

        .col-md-10 {
            width: 83.3333333%;
        }

        .col-md-11 {
            width: 91.6666667%;
        }

        .col-md-12 {
            width: 100%;
        }

        .col-xs-1,
        .col-sm-1,
        .col-md-1,
        .col-lg-1,
        .col-xs-2,
        .col-sm-2,
        .col-md-2,
        .col-lg-2,
        .col-xs-3,
        .col-sm-3,
        .col-md-3,
        .col-lg-3,
        .col-xs-4,
        .col-sm-4,
        .col-md-4,
        .col-lg-4,
        .col-xs-5,
        .col-sm-5,
        .col-md-5,
        .col-lg-5,
        .col-xs-6,
        .col-sm-6,
        .col-md-6,
        .col-lg-6,
        .col-xs-7,
        .col-sm-7,
        .col-md-7,
        .col-lg-7,
        .col-xs-8,
        .col-sm-8,
        .col-md-8,
        .col-lg-8,
        .col-xs-9,
        .col-sm-9,
        .col-md-9,
        .col-lg-9,
        .col-xs-10,
        .col-sm-10,
        .col-md-10,
        .col-lg-10,
        .col-xs-11,
        .col-sm-11,
        .col-md-11,
        .col-lg-11,
        .col-xs-12,
        .col-sm-12,
        .col-md-12,
        .col-lg-12 {
            border: 0;
            padding: 0;
            float: left;
            margin-left: -0.00001;
        }

        table.custom td,
        table.custom th {
            border: 1px solid black;
        }

        .bg-grey {
            background-color: #BDBDBD;
        }

        td {
            padding: 0 0 5px 2px;
            font-size: 8pt;

        }

        .expired {
            font-weight: bold;
            background-color: #ff9696;
            color: #ff0000;
        }
    </style>
</head>

<body style="margin:0px;">
    <div class="row">
        <table border="0" width="100%">
            <tr>
                <td colspan="2">Periode 1 : <?php echo $this->input->get('tgl_start1').' - '.$this->input->get('tgl_end1')?></td>
            </tr>
            <tr>
               <td>Periode 2 : <?php echo $this->input->get('tgl_start2').' - '.$this->input->get('tgl_end2')?></td>
               <td align="right">Report generated at : <?=date('Y-m-d H:i:s')?></td>
            </tr>
        </table>
    </div>
    <div class="row" style="margin-bottom:0px;">
        <table border="1" width="100%" class="bordered" style="margin-top: 2em;">
            <thead>
                <tr class="bg-grey">
                    <th class="p-5" rowspan="2">No</th>
                    <th class="p-5" rowspan="2"><center>Jenis Kegiatan</center></th>
                    <th class="p-5"><center>Periode Awal</center></th>
                    <th class="p-5"><center>Periode Akhir</center></th>
                    <th class="p-5" rowspan="2"><center>TREN</center></th>
                    <th class="p-5" rowspan="2"><center>%</center></th>
                    <th class="p-5"><center>Periode Awal</center></th>
                    <th class="p-5"><center>Periode Akhir</center></th>
                    <th class="p-5" rowspan="2"><center>TREN</center></th>
                    <th class="p-5" rowspan="2"><center>%</center></th>
                    <th class="p-5"><center>Periode Awal</center></th>
                    <th class="p-5"><center>Periode Akhir</center></th>
                    <th class="p-5" rowspan="2"><center>TREN</center></th>
                    <th class="p-5" rowspan="2"><center>%</center></th>
                </tr>
                <tr class="bg-grey">
                    <th class="p-5" colspan="2"><center>Kunjungan Baru</center></th>
                    <th class="p-5" colspan="2"><center>Kunjungan Baru</center></th>
                    <th class="p-5"><center>TOTAL</center></th>
                    <th class="p-5"><center>TOTAL</center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    $kb1 = 0; $kb2 = 0; $pcn1 = 0; $kl1 = 0; $kl2 = 0; $pcn2 = 0; $ttl1 = 0; $ttl2 = 0; $pcn3 = 0;

                    $turun1 = 0;
                    $turun2 = 0;
                    $turun3 = 0;
                    $naik1 = 0;
                    $naik2 = 0;
                    $naik3 = 0;
                    $tetap1 = 0;
                    $tetap2 = 0;
                    $tetap3 = 0;
                    if ($content['code'] == '200') {
                        foreach ($content['data'] as $key => $value) {
                            $no++;
                            ($value['kunjungan_baru']['tren'] == 'TETAP'?$tetap1++:($value['kunjungan_baru']['tren'] == 'TURUN'?$turun1++:$naik1++));

                            ($value['kunjungan_lama']['tren'] == 'TETAP'?$tetap2++:($value['kunjungan_lama']['tren'] == 'TURUN'?$turun2++:$naik2++));

                            ($value['kunjungan_total']['tren'] == 'TETAP'?$tetap3++:($value['kunjungan_total']['tren'] == 'TURUN'?$turun3++:$naik3++));

                            $kb1 += $value['periode_1']['baru'];
                            $kb2 += $value['periode_2']['baru'];
                            $pcn1 += $value['kunjungan_baru']['%'];

                            $kl1 += $value['periode_1']['lama'];
                            $kl2 += $value['periode_2']['lama'];
                            $pcn2 += $value['kunjungan_lama']['%'];

                            $ttl1 += ($value['periode_1']['baru'] + $value['periode_1']['lama']);
                            $ttl2 += ($value['periode_2']['baru'] + $value['periode_2']['lama']);
                            $pcn3 += $value['kunjungan_total']['%'];
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
                    <td class="p-5" colspan="2"><center>TOTAL</center></td>
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
</body>

</html>