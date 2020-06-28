<html>
<head>
<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
  .row {
    margin-bottom: 15px;
  }

  .centerp {
    padding: 10px 0px 10px 5px !important;
  }

  .centerp-head {
    padding: 5px 0px 5px 5px;
    text-align: center;
  }

  .centerp-left {
    padding: 2px 0px 2px 5px;
    text-align: left;
  }

  .centerp-row {
    padding: 2px 0px 2px 5px;
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

  .r-bold{font-weight:bold;}

  #contents tr:nth-child(even) {
   background-color: #f2f2f2
  }

  /*Start Untuk radio button style*/

  .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 12px;
    font-weight: inherit;
    padding-top: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }
  
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
  }
  
  .container:hover input ~ .checkmark {
    background-color: #ccc;
  }
  
  .container input:checked ~ .checkmark {
    background-color: #2196F3;
  }
  
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }
  
  .container input:checked ~ .checkmark:after {
    display: block;
  }
  
  .container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }

  .bd {
    padding: 5px 5px 0px 5px;
  }
/*End radio button style*/
  
  *{
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
  }

  .font-white{color:#fff;}

  .font-size-18{font-size:18pt;}
  .font-size-12{font-size:12pt;}
  .font-size-10{font-size:10pt;}
  .font-size-9{font-size:9pt;}
  .font-size-8{font-size:8pt;}
  .font-size-7{font-size:7pt;}

  .mt-1{margin-top:1px;}
  .mt-5{margin-top:5px;}
  .mt-10{margin-top:10px;}
  .mt-20{margin-top:20px;}
  .mr-1{margin-right:1px;}
  .mr-2{margin-right:2px;}
  .mr-3{margin-right:3px;}
  .mr-4{margin-right:4px;}
  .mr-5{margin-right:5px;}
  .mr-10{margin-right:10px;}
  .mr-12{margin-right:20px;}

  .mb-5{margin-bottom:5px;}
  .mb-10{margin-bottom:10px;}
  .mb-20{margin-bottom:20px;}
  .m-0{margin:0px}

  .p-0{padding:0px}
  .p-2{padding:2px;}
  .p-3{padding:3px;}
  .p-4{padding:4px;}
  .p-5{padding:5px;}

  .pt-1{padding-top:1px;}
  .pt-2{padding-top:2px;}
  .pt-3{padding-top:3px;}
  .pt-4{padding-top:4px;}
  .pt-5{padding-top:5px;}
  .pt-10{padding-top:10px;}
  
  .pb-0{padding-bottom:0px}  
  .pb-1{padding-bottom:1px;}
  .pb-2{padding-bottom:2px;}
  .pb-3{padding-bottom:3px;}
  .pb-4{padding-bottom:4px;}
  .pb-5{padding-bottom:5px;}
  .pb-10{padding-bottom:10px;}
  .pb-20{padding-bottom:20px;}

  .pl-5{padding-left:5px;}
  .pl-10{padding-left:10px;}

  .pr-1{padding-right:1px;}
  .pr-2{padding-right:2px;}
  .pr-3{padding-right:3px;}
  .pr-4{padding-right:4px;}
  .pr-5{padding-right:5px;}
  .clear{clear:both;}

  .row-panel{
      margin-bottom: 10px;   
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
  }
  .row-heading {padding: 1px 5px;}
  .border-black{border-color: black;}

  .border-blue{border-color: #18659D;}
  .bg-blue{background-color:#18659D}

  .border-no-bottom{border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;}
  .border-no-top{border-bottom:1px solid black;border-left:1px solid black;border-right:1px solid black;}

  .border-bottom-1{border-bottom:1px solid black}
  .border-top-1{border-top:1px solid black}
  .border-right-1{border-right:1px solid black;}
  .border-left-1{border-left:1px solid black;}

  .border-bottom-0{border-bottom:0px;}
  .border-top-0{border-top:0px;}
  .border-right-0{border-right:0px;}
  .border-left-0{border-left:0px;}

  .border-left-1-right-1{border-left:1px solid black;border-right:1px solid black;}

  .row-header{padding:0px 0px 1px 3px;margin:0px;width:100%}
  .detail-administration{text-align:left;vertical-align:top;}

  .v-align-top{vertical-align:top;}
  .t-align-justify{text-align:justify}


  .column-left{float:left;width:50%;}
  .column-right{float:left;}

  .column-3-left{float:left;width:35%;}
  .column-3-middle{float:left;width:35%;}
  .column-3-right{float:left;}
  
  ol {margin-left:10px;padding-left:5px}
  ol li {padding:0;margin-left:1px;}

  .column-left-header {float:left;width:50%;}
  .column-right-header {float:left;margin-left:5px}
  .column-left-detail {float:left;width:25%;}
  .column-right-detail {float:left;margin-left:5px}
</style>
</head>
<body style="margin:0px;">

  <div class="row" style="margin-bottom:0px;">
    <div class="row-panel">
      <div class="row-heading border-blue bg-blue font-white font-size-9 r-bold">Data Registrasi</div>
      <div class="row-body">
        <table width="100%" cellspacing="0">
          <tr>
            <td width="20%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1">No. Registrasi</td>
            <td width="18%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1">Penjamin</td>
            <td width="10%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1">No. RM</td>
            <td width="10%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1">No. BPJS</td>
            <td colspan="2" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1">No. KTP</td>
            <td width="12%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1">Jenis Kelamin</td>
            <td width="18%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1">Golongan Darah</td>
          </tr>
          <tr>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?php echo $list['pasien']['no_reg'];?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?php echo ucwords(strtolower($list['pasien']['nama_penjamin'])); ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?php echo $list['pasien']['no_rm'];?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?php echo $list['pasien']['no_bpjs'];?></td>
            <td colspan="2" class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?php echo $list['pasien']['no_ktp']; ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?php echo $list['pasien']['kelamin'];?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?php echo $list['pasien']['golongan_darah'];?></td>
          </tr>
          <tr>
            <td class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Nama Pasien</td>
            <td class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Tanggal Lahir / Umur</td>
            <td colspan="3" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Alamat</td>
            <td colspan="2" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">DPJP</td>
            <td class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Kelas</td>
          </tr>
          <tr>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?php echo ucwords(strtolower($list['pasien']['nama_pasien'])); ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?php echo date("d-m-Y",strtotime($list['pasien']['tanggal_lahir'])) . ' / ' . $list['pasien']['umur_registrasi'];?></td>
            <td colspan="3" class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?php echo ucwords(strtolower($list['pasien']['alamat1']));?></td>
            <td colspan="2" class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?php echo ucwords(strtolower($list['pasien']['nama_dokter'])); ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"></td>
          </tr>
        </table>
      </div>
    </div>
    <?php $no = 1; ?>
    
    <div class="row-panel">
      <div class="row-heading border-blue bg-blue font-white font-size-9 r-bold">Data <?= $title; ?></div>
        <div class="row-body">
          <table width="100%" cellspacing="0">
          <tr>
<<<<<<< HEAD:ui_temp/application/views/contents/notes/37_edukasi_pra_operasi/pdf.php
            <td width="20%" class="r-bold font-size-8 border-left-1 centerp-left">No. RM</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['no_rm']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-left-1 centerp-left">  Nama</td>
            <td class="font-size-8 centerp-row">: <?= $list['notes']['nama_pasien']; ?></td>
            <td class="r-bold font-size-8 border-right-1 centerp-left"> jenis kelamin: <?= $list['notes']['jenis_kelamin']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-left-1 centerp-left">  Tanggal Lahir</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['tanggal_lahir']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 centerp-left">  Ruangan</td>
            <td class="font-size-8 border-right-1 border-bottom-1 centerp-row" colspan="2">: <?= $list['notes']['ruangan']; ?></td>
          </tr>
        </table>

        <table width="100%" cellspacing="0">
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 centerp-head" colspan="2"><b>Langkah-langkah</b></td>
            <td width="10%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head"><b>Paraf</b></td>
          </tr>
          <tr class="text-center bdu ">
            <td align="center" width="10%" class="font-size-8 border-left-1 border-right-1 border-bottom-1 centerp-row" rowspan="12" style="text-rotate: 90">Relaksasi Nafas dalam (Manajemen Nyeri)</td>
            <?php $no = 1; ?>
            <td width="80%" class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= $no ?>. Ciptakan Ruangan yang tenang</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head" rowspan="12" id="paraf" height="auto">
              <div class="paraf">
                <img height="200px" width="60px" src='<?php echo $list['notes']['coretan_paraf']; ?>' id="signature-pad-paraf">
              </div>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Usahakan tetap rileks dan tenang</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Menarik nafas dalam dari hidung dan mengisi paru-paru dengan udara melalui hitungan 1,2,3</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Perlahan-lahan udara dihembuskan melalui mulut sambil merasakan ekstremitas atas dan bawah rileks</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Anjurkan bernafas dengan irama normal tiga kali</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Menarik nafas lagi melalui hidung dan menghembuskan melalui mulut secara perlahan</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Membiarkan telapak tangan dan kaki rileks</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Usahakan agar tetap konsentrasi mata sambil terpejam</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Pada saat konsentrasi pusatkan pada daerah yang nyeri</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Anjurkan untuk mengulangi prosedur hingga nyeri terasa berkurang</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Ulangi sampai 15 kali, dengan selang istirahat singkat setiap 5 kali</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-1 centerp-left"><?= ++$no ?>. Bila nyeri menjadi hebat, anjurkan pasien bernafas secara dangkal dan cepat</td>
          </tr>
          <tr>
            <td align="center" class="font-size-8 border-left-1 border-right-1 border-bottom-1 centerp-row" style="text-rotate: 90" rowspan="5" >Batuk efektif</td>
            <?php $no = 1; ?>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= $no ?>. Duduk tegap</td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-head" rowspan="5" height="auto">
              <div class="paraf">
                <img height="80px" width="60px" src='<?php echo $list['notes']['coretan_paraf_batuk']; ?>' id="signature-pad-paraf-batuk">
              </div>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Hirup nafas dalam 2x secara perlahan-lahan melalui hidung dan hembuskan melalui mulut</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Hirup nafas dalam ketiga kalinya dan tahan nafas sampai hitungan ke-3, batukkan dengan kuat-kuat 3x secara berturut-turut tanpa menghirup nafas kembali selama melakukan batuk</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Lanjutkan latihan batuk sebanyak 2-3x pada saat terjaga</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-1 centerp-left"><?= ++$no ?>. Ulangi sesuai kebutuhan</td>
=======
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">Nama Pasien</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['nama_pasien']; ?></td>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Agama</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['agama']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  No. MR</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['no_mr']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">  Pendidikan</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['pendidikan']; ?></td>
>>>>>>> 50b56c9e12247ffe1a4c090889d8f52bfef00021:ui_temp/application/views/contents/notes/71_assesmen_bayi_baru_lahir/pdf.php
          </tr>

          <tr>
            <td height="55px" align="center" class="font-size-8 border-left-1 border-right-1 border-bottom-1 centerp-row" style="text-rotate: 90; overflow: auto; height: 55px !important;" rowspan="4">Informasi tentang kamar operasi</td>
            <?php $no = 1; ?>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= $no ?>. Ruangannya sangat bersih dan bebas kuman, suhunya dingin</td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-head" rowspan="4" height="auto">
              <div class="paraf">
                <img height="55px" width="60px" src='<?php echo $list['notes']['coretan_paraf_kamar']; ?>' id="signature-pad-paraf-kamar">
              </div>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Pencahayaan sangat terang</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-0 centerp-left"><?= ++$no ?>. Dilengkapi dengan alat canggih</td>
          </tr>
          <tr>
            <td class="font-size-8 border-right-1 border-bottom-1 centerp-left"><?= ++$no ?>. Tim terdiri dari ahli bedah, ahli anestesi dan perawat berketerampilan khusus</td>
          </tr>
        </table>



        <table width="100%" cellspacing="0">
          <tr>
            <td width="25%" class="r-bold font-size-8 border-bottom-1 border-left-1 centerp-left">  Tanggal</td>
            <td width="25%" class="font-size-8 border-bottom-1 border-right-1 centerp-row">: <!-- <?= $list['notes']['tanggal']; ?> --></td>
            <td width="25%" class="r-bold font-size-8 border-bottom-1 centerp-left"> Jam</td>
            <td width="25%" class="font-size-8 border-bottom-1 border-right-1 centerp-row">: <!-- <?= $list['notes']['jam']; ?> --></td>
          </tr>
          <!-- <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="6"><b>A. Autoanamnesis / Alloanamnesis</b></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  Keluhan Utama</td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="5">: <!-- <?= $list['notes']['keluhan_utama']; ?> --@></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  Riwayat Penyakit Sekarang</td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="5">: <!-- <?= $list['notes']['riwayat_penyakit_sekarang']; ?> --@></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  Riwayat Penyakit Dahulu</td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="5">: <!-- <?= $list['notes']['riwayat_penyakit_dahulu']; ?> --@></td>
          </tr> -->
        </table>


        <!-- <table width="100%" cellspacing="0">
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="2"><b> B. Pemeriksaan Fisik & Tanda Vital</b></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left- border-right-1 centerp-head" colspan="3"><b> C. Kemampuan Fungsional</b></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left- border-right-1 centerp-head"><b> Kanan - Kiri dan Kiri - Kanan</b></td>
          </tr>
          <tr>
            <td width="15%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  TD</td>
            <td width="15%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">: <?= $list['notes']['td']; ?> mmHg</td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">&nbsp;
              <label class="container">
               <input type="radio" name="tidur_bedrest_gendong" <?= $list['notes']['tidur_bedrest_gendong'] == 'tidur' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp;&nbsp; tidur
            </td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">
              <label class="container">
               <input type="radio" name="tidur_bedrest_gendong" <?= $list['notes']['tidur_bedrest_gendong'] == 'bedrest' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; bedrest
            </td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
              <label class="container">
               <input type="radio" name="tidur_bedrest_gendong" <?= $list['notes']['tidur_bedrest_gendong'] == 'gendong' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; gendong
            </td>
            <td rowspan="8" width="20%" class="font-size-8 border-bottom-1 border-right-1 centerp-row text-center">
              <img width="150px" height="150px" src="<?php echo base_url() . 'assets/image/Human.png'; ?>">
              <img style="margin-bottom: 15px; margin-left: -155px;" width="150px" height="150px" src='<?php echo $list['notes']['coretan']; ?>' id='sign_prev'>
                </div><br/>
            </td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  HR</td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row">: <?= $list['notes']['hr']; ?> x/m</td>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"> 2. Jalan Sendiri</td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row">
              <label class="container">
               <input type="radio" name="jalan_sendiri" <?= $list['notes']['jalan_sendiri'] == 'ya' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; ya
            </td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row">
              <label class="container">
               <input type="radio" name="jalan_sendiri" <?= $list['notes']['jalan_sendiri'] == 'tidak' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; tidak
            </td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  RR</td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row">: <?= $list['notes']['rr']; ?> x/m</td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"> 3. Kursi Roda</td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row">
              <label class="container">
               <input type="radio" name="kursi_roda" <?= $list['notes']['kursi_roda'] == 'ya' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; ya
            </td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row">
              <label class="container">
               <input type="radio" name="kursi_roda" <?= $list['notes']['kursi_roda'] == 'tidak' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; tidak
            </td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  Suhu</td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row">: <?= $list['notes']['suhu']; ?> °C</td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"> 4. Alat Bantu</td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row"  colspan="2">: <?= $list['notes']['alat_bantu']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  Skala Nyeri</td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row">: <?= $list['notes']['skala_nyeri']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"> 5. Prothesis</td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row"  colspan="2">: <?= $list['notes']['prothesis']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row"></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  6. Deformitas</td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['deformitas']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-row"></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  7. Resiko Jatuh</td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['resiko_jatuh']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-1 border-right-0 centerp-row"></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  8. Lain-lain</td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['lainlain']; ?> </td>
          </tr>
        </table> -->


        <!-- <table width="100%" cellspacing="0">
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="8"><b>Pemeriksaan Sistemik Khusus</b></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  a. Muskuloskeletal</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pemeriksaan_muskuloskeletal']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  b. Neuromuskular</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pemeriksaan_neuromuskular']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  c. Kardiopulmonal</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pemeriksaan_kardiopulmonal']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  d. Integumentum</td>
            <td width="30%" class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pemeriksaan_integumentum']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="8"><b>Pengukuran Khusus</b></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  a. Muskuloskeletal</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pengukuran_muskuloskeletal']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  b. Neuromuskular</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pengukuran_neuromuskular']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  c. Kardiopulmonal</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pengukuran_kardiopulmonal']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  d. Integumentum</td>
            <td width="30%" class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['pengukuran_integumentum']; ?></td>
          </tr>
         
        </table> -->

<<<<<<< HEAD:ui_temp/application/views/contents/notes/37_edukasi_pra_operasi/pdf.php
        <!-- <div class="row-panel mt-20">
          <div class="column-left-header">
            <table border="0" width="100%" style="margin-left:150px">
              <tr>
                <td style="vertical-align:top" class="detail-administration r-bold font-size-7"><!-- Petugas yang Menyetujui, --@></td>
              </tr>
              <tr>
                <td style="vertical-align:top" class="font-table font-size-7"><!-- <img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>"> --@></td>
              </tr>
              <tr>
                <td style="vertical-align:top" class="font-table font-size-7 pl-3"><!-- <?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?> --@></td>
              </tr>
            </table>
          </div>
          <div class="column-right-header">
            <table border="0" width="100%" style="text-align: right; margin-right: 50px;">
              <tr>
                <td style="vertical-align:top" class="r-bold font-size-7">Petugas yang Menyetujui,</td>
              </tr>
              <tr>
                <td height="77px" style="vertical-align:top" class="font-table font-size-7 pl-5"><img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>"></td>
              </tr>
              <tr>
                <td style="vertical-align:top" class="font-table font-size-7 pl-3"><?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?>
                <!-- <br>digital signature added: <?php echo date("d-m-Y H:i",strtotime($list['notes']['created_date']));?> --@></td>
              </tr>
            </table>
          </div>
        </div> -->

      </div>
    </div>
  </div>
  <br><br><br><br>
  
  <!-- <div class="row" style="margin-bottom:0px;">
=======
        <!-- <table>
           <tr>
            <td width="25%" class="detail-administration r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-row" style="padding: 20px 0px 5px 5px;" colspan="4">Kriteria Pemulihan Sedasi PAD5</td>
          </tr>
          <tr>
            <td width="20%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-bottom-1 centerp-head">Yang Dinilai</td>
            <td width="60%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-bottom-1" style="padding: 10px 0px 10px 5px; text-align: center">Penilaian</td>
            <td width="10%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-bottom-1 centerp-row" style="padding: 10px 0px 10px 5px; text-align: center;">Score</td>
            <td width="10%" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-bottom-1 centerp-row" style="padding: 10px 0px 10px 5px; text-align: center;">Score Pasien</td>
          </tr>          
        </table> -->

           <div class="row-panel mt-20">
            <div class="column-left-header">
              <table border="0" width="100%" style="margin-left:150px">
                <tr>
                  <td style="vertical-align:top" class="detail-administration r-bold font-size-7"><!-- Petugas yang Menyetujui, --></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="font-table font-size-7"><!-- <img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>"> --></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="font-table font-size-7 pl-3"><!-- <?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?> --></td>
                </tr>
              </table>
            </div>
            <div class="column-right-header">
              <table border="0" width="100%" style="text-align: right; margin-right: 50px;">
                <tr>
                  <td style="vertical-align:top" class="r-bold font-size-7">Petugas yang Menyetujui,</td>
                </tr>
                <tr>
                  <td height="77px" style="vertical-align:top" class="font-table font-size-7 pl-5"><img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>"></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="font-table font-size-7 pl-3"><?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?>
                  <!-- <br>digital signature added: <?php echo date("d-m-Y H:i",strtotime($list['notes']['created_date']));?> --></td>
                </tr>
              </table>
              
            </div>
          </div>

        

        </div>
      </div>
    </div>
<br><br><br><br>
<div class="row" style="margin-bottom:0px;">
>>>>>>> 50b56c9e12247ffe1a4c090889d8f52bfef00021:ui_temp/application/views/contents/notes/71_assesmen_bayi_baru_lahir/pdf.php
    <?php $no = 1; ?>
    
    <div class="row-panel">
      <div class="row-heading border-blue bg-blue font-white font-size-9 r-bold">Data <?= $title; ?></div>
        <div class="row-body">
          <table width="100%" cellspacing="0">
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="8"><b>Data Penunjang</b></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  a. Radiologi</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['radiologi']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  b. EMG</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['emg']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  c. Laboratorium</td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['laboratorium']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  d. Lain-lain</td>
            <td width="30%" class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="7">: <?= $list['notes']['lain_lain']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="8"><b>D. Diagnosis Fisitoterapi</b></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-row" colspan="8"> <?= $list['notes']['diagnosis_fisioterapi']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="8"><b>E. Program/Rencana Fisioterapi</b></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-row" colspan="8"> <?= $list['notes']['program_rencana_fisioterapi']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head" colspan="8"><b>F. Intervensi</b></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head" colspan="2"><b> Tanggal</b></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-head" colspan="3"><b> Intervensi</b></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-head" colspan="3"><b> Tempat / Area yang Diterapi </b></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl1']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi1']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi1']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl2']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi2']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi2']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl3']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi3']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi3']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl4']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi4']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi4']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl5']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi5']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi5']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl6']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi6']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi6']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl7']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi7']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi7']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl8']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi8']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi8']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl9']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi9']; ?></td>
            <td  class="font-size-8 border-bottom-0 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi9']; ?></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-row" colspan="2"> <?= $list['notes']['tgl10']; ?></td>
            <td  class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['intervensi10']; ?></td>
            <td  class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-row" colspan="3"> <?= $list['notes']['area_diterapi10']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head" colspan="8"><b>G. Evaluasi</b></td>
          </tr>
          <tr>
            <td  class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-row" colspan="8"> <?= $list['notes']['evaluasi']; ?></td>
          </tr>

        </table> -->

           <!--<div class="row-panel mt-20">
            <div class="column-left-header">
              <table border="0" width="100%" style="margin-left:150px">
                <tr>
                  <td style="vertical-align:top" class="detail-administration r-bold font-size-7"><!-- Petugas yang Menyetujui, --@></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="font-table font-size-7"><!-- <img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>"> --@></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="font-table font-size-7 pl-3"><!-- <?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?> --@></td>
                </tr>
              </table>
            </div>
            <div class="column-right-header">
              <table border="0" width="100%" style="text-align: right; margin-right: 50px;">
                <tr>
                  <td style="vertical-align:top" class="r-bold font-size-7">Petugas yang Menyetujui,</td>
                </tr>
                <tr>
                  <td height="77px" style="vertical-align:top" class="font-table font-size-7 pl-5"><img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>"></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="font-table font-size-7 pl-3"><?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?>
                  <!-- <br>digital signature added: <?php echo date("d-m-Y H:i",strtotime($list['notes']['created_date']));?> --@></td>
                </tr>
              </table>
              
            </div>
          </div>-->

        

        </div>
      </div>
    </div>

  </div>

</body>
</html>