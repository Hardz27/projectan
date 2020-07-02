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
    padding: 1px 0px 1px 5px;
    text-align: left;
  }

  .centerp-row {
    padding: 1px 0px 1px 5px;
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
              <td width="3%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">A.</td>
              <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left" colspan="4">Data Medik</td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td width="4%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= $no ?>.</td>
              <td width="30%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Golongan Darah</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['golongan_darah']; ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Tekanan Darah</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['tekanan_a'] .'/'. $list['notes']['tekanan_b'] .' - '. $list['notes']['tekanan_darah'] ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Penyakit Jantung</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['penyakit_jantung'] ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Diabetes</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['diabetes'] ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Haemopilia</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['haemopilia'] ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Hepatitis</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['hepatitis'] ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Gastritis</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['gastritis'] ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Penyakit Lainnya</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['penyakit_lainnya'] ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Alergi Terhadap Obat-obatan</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['alergi_obat'] ?> <?= $list['notes']['alergi_obat'] == 'Ada' ? ' - ' . $list['notes']['desc_alergi_obat'] : '' ?></td>
            </tr>
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"><?= ++$no ?>.</td>
              <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Alergi Terhadap makanan</td>
              <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['alergi_makanan'] ?> <?= $list['notes']['alergi_makanan'] == 'Ada' ? ' - ' . $list['notes']['desc_alergi_makanan'] : '' ?></td>
            </tr>
        </table>

        <table width="100%" cellspacing="0">
          <tr>
            <td width="3%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">B.</td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left" colspan="4">Odontogram</td>
          </tr>
          <tr>
            <td colspan="5" height="auto" class=" border-left-1 border-right-1 centerp-head">
              <img style="margin-left: 0px" width="450px" height="180px" src="<?php echo base_url() . 'assets/image/odontogram.png'; ?>">
              <img style="margin-bottom: 0px; margin-left: -455px;" width="450px" height="180px" src='<?php echo $list['notes']['coretan']; ?>' id='sign_prev'>
            </td>
          </tr>
        </table>


        <table width="100%" cellspacing="0">
          <tr>
            <td width="3%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td width="25%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Occlusi</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['occlusi'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Torus Palatinus</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['torus_palatinus'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Torus</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['torus'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Mandiblaris</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['mandibularis'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Palatum</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['palatum'] ?> <?= $list['notes']['palatum'] == 'Ada' ? ' - ' . $list['notes']['desc_palatum'] : '' ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Diastema</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['Diastema'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Gigi Anomali</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['gigi_anomali'] ?> <?= $list['notes']['gigi_anomali'] == 'Ada' ? ' - ' . $list['notes']['desc_gigi_anomali'] : '' ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Lain-lain</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['lain_lain'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Hal yang tidak tercakup</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['hal_tidak_tercakup'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="3"><?= 'D: ' .$list['notes']['d']. ' M: '.$list['notes']['m']. ' F: '. $list['notes']['f']?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Jumlah foto yang diambil</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['jumlah_foto'] .' - '.$list['notes']['type_foto'] ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" style="padding-bottom: 5px"></td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left">Jumlah foto rontgen yang diambil</td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row pb-10" colspan="2">: <?= $list['notes']['jumlah_foto_rontgen'] .' - '.$list['notes']['type_foto_rontgen'] ?></td>
          </tr>
        </table>

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
                  <td style="vertical-align:top" class="r-bold font-size-7">Kuningan, <?= $list['notes']['tanggal'] .' Jam ' . $list['notes']['jam']?></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="r-bold font-size-7">Dokter yang Menyetujui,</td>
                </tr>
                <tr>
                  <td height="77px" style="vertical-align:top" class="font-table font-size-7 pl-5"><img width="125px" src="<?php echo $list['notes']['digital_signature_approved_dokter'];?>"></td>
                </tr>
                <tr>
                  <td style="vertical-align:top" class="font-table font-size-7 pl-3"><?php echo ucwords(strtolower($list['notes']['approved_dokter'])); ?>
                  </td>
                </tr>
              </table>
              
            </div>
          </div>

        </div>
      </div>
    </div>
    <br><br><br>

  </div>
</body>
</html>