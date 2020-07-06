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
    padding: 1px 5px 1px 5px;
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
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">Nama Pasien</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['nama_pasien']; ?></td>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Nama Wali</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['nama_wali']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  No. MR</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['no_rm']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">  Usia</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['usia_wali']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  Tempat, Tgl.Lahir</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['tempat_lahir']; ?>, <?= $list['notes']['tanggal_lahir']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"> Hubungan</td>
            <td class="font-size-8 border-right-0 centerp-row">:<?= $list['notes']['hubungan_wali']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"> jenis kelamin: <?= $list['notes']['jenis_kelamin_wali']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  Usia</td>
            <td class="font-size-8 border-bottom-1 border-right-0 centerp-row">:<?= $list['notes']['usia_pasien']; ?></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"> jenis kelamin: <?= $list['notes']['jenis_kelamin_pasien']; ?></td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="3"></td>
          </tr>
          <tr>
            <td class="r-bold  font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3"><center>Assesmen Pra Operasi</center></td>
            <td class="r-bold  font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left" colspan="3"><center>Checklist Dokumen</center></td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 " colspan="3" valign="top">
              <table width="100%" cellspacing="0">
                <tr>
                  <td class="font-size-8 r-bold centerp-row">Anamnesis:</td>
                </tr>
                <tr>
                  <td class="font-size-8 border-bottom-1 centerp-row">
                    <?= $list['notes']['anamnesis']; ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-size-8 r-bold centerp-row">Pemeriksaan Fisik:</td>
                </tr>
                <tr>
                  <td class="font-size-8 border-bottom-1 centerp-row">
                    <?= $list['notes']['pemeriksaan_fisik']; ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-size-8 r-bold centerp-row">Catatan Alergi:</td>
                </tr>
                <tr>
                  <td class="font-size-8 border-bottom-1 centerp-row">
                    <?= $list['notes']['catatan_alergi']; ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-size-8 r-bold centerp-row">Diagnosis Praoperasi:</td>
                </tr>
                <tr>
                  <td class="font-size-8 border-bottom-1 centerp-row">
                    <?= $list['notes']['diagnosa_praoperasi']; ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-size-8 r-bold centerp-row">Rencana Operasi:</td>
                </tr>
                <tr>
                  <td class="font-size-8 border-bottom-1 centerp-row">
                    <?= $list['notes']['rencana_operasi']; ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-size-8 r-bold centerp-row">Estimasi Waktu:</td>
                </tr>
                <tr>
                  <td class="font-size-8 border-bottom-1 centerp-row">
                    <?= $list['notes']['estimasi_waktu']; ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-size-8 r-bold centerp-row">Pramedikasi:</td>
                </tr>
                <tr>
                  <td class="font-size-8 border-bottom-1 centerp-row">
                    <?= $list['notes']['premedikasi']; ?>
                  </td>
                </tr>
              </table>
            </td>

            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1" colspan="3" valign="top">
              <table width="100%" cellspacing="0">
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row r-bold" width="40%">
                    Jenis Persiapan
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row r-bold" width="30%">
                    Perawat Ruangan
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row r-bold" width="30%">
                    Perawat Ok
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    1. Rekam medik pasien
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_rekam_medik_pasien'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_rekam_medik_pasien'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_rekam_medik_pasien'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_rekam_medik_pasien'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    2. Informed consent operasi
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_informed_consent_operasi'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_informed_consent_operasi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_informed_consent_operasi'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_informed_consent_operasi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    3. Informed consent anestesi
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_informed_consent_anestesi'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_informed_consent_anestesi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_informed_consent_anestesi'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_informed_consent_anestesi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    4. Hasil Laboratorium
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_laboratorium'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_laboratorium'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_laboratorium'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_laboratorium'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    5. Hasil radiologi/USG
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_radiologi'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_radiologi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_radiologi'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_radiologi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    6. Hasil EKG
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_ekg'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_ekg'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_ekg'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_ekg'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    7. Hasil CTG
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_ctg'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_ctg'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_ctg'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_ctg'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    8. Daftar terapi yang sudah diberikan
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_ctg'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_hasil_ctg'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_ctg'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_hasil_ctg'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    9. Catatan keperawatan
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_catatan_keperawatan'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_catatan_keperawatan'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_catatan_keperawatan'] == 'ada' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ada</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_catatan_keperawatan'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td colspan="3" class="font-size-8 border-bottom-1 border-left-1 border-right-0 r-bold">
                    <center>Checklist Pasien</center>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row r-bold">
                    Jenis Persiapan
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row r-bold">
                    Perawat Ruangan
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row r-bold">
                    Perawat Ok
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    1. Periksa keadaan umum
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_periksa_keadaan_umum'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_periksa_keadaan_umum'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_periksa_keadaan_umum'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_periksa_keadaan_umum'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    2. Periksa vital sign
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_periksa_vital_sign'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_periksa_vital_sign'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_periksa_vital_sign'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_periksa_vital_sign'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    3. Gelang identitas
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_gelang_identitas'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_gelang_identitas'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_gelang_identitas'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_gelang_identitas'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    4. Identifikasi alergi
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_identifikasi_alergi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_identifikasi_alergi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_identifikasi_alergi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_identifikasi_alergi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    5. Puasa jam <span class="r-bold"><?=$list['notes']['desc_puasa']?></span> 
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_puasa'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_puasa'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_puasa'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_puasa'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    5. Mandi
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_mandi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_mandi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_mandi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_mandi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    6. Oral hygiene
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_oral'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_oral'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_oral'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_oral'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    7. Cukur daerah operasi
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_cukur_daerah_operasi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_cukur_daerah_operasi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_cukur_daerah_operasi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_cukur_daerah_operasi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    8. Hapus make-up
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_make_up'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_make_up'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_make_up'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_make_up'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    9. Hapus make-up
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_make_up'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_make_up'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_make_up'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_make_up'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    10. Lepas aksesoris
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_lepas_aksesoris'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_lepas_aksesoris'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_lepas_aksesoris'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_lepas_aksesoris'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    11. Lepas alat bantu (ABD, gigi palsu, soft lenses)
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_lepas_alat_bantu'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_lepas_alat_bantu'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_lepas_alat_bantu'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_lepas_alat_bantu'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    12. Pemasangan IV line
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemasangan_iv_line'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemasangan_iv_line'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemasangan_iv_line'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemasangan_iv_line'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    13. Pemberian pramedikasi
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemberian_premedikasi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemberian_premedikasi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemberian_premedikasi'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemberian_premedikasi'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    14. Pemasangan kateter urin
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemasangan_kateter_urin'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemasangan_kateter_urin'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemasangan_kateter_urin'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemasangan_kateter_urin'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    14. Pemasangan NGT
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemasangan_ngt'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_pemasangan_ngt'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemasangan_ngt'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_pemasangan_ngt'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    15. Latihan nafas dalam
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_latihan_nafas_dalam'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_latihan_nafas_dalam'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_latihan_nafas_dalam'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_latihan_nafas_dalam'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    16. Latihan batuk efektif
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_latihan_batuk_efektif'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_latihan_batuk_efektif'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_latihan_batuk_efektif'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_latihan_batuk_efektif'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-1 border-left-0 border-right-1  centerp-row">
                    17. Latihan batuk efektif
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_latihan_batuk_efektif'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_latihan_batuk_efektif'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_latihan_batuk_efektif'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_latihan_batuk_efektif'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td class="font-size-8 border-bottom-0 border-left-0 border-right-1  centerp-row">
                    18. Kebutuhan darah
                  </td>
                  <td class="font-size-8 border-bottom-0 border-left-1 border-right-1  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_kebutuhan_darah'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya </td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ruangan_kebutuhan_darah'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                  <td class="font-size-8 border-bottom-0 border-left-1 border-right-0  centerp-row">
                    <table width="100%" cellspacing="0">
                      <tr>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_kebutuhan_darah'] == 'ya' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; ya</td>
                        <td class="font-size-8  centerp-row"><input type="radio" <?= $list['notes']['ok_kebutuhan_darah'] == 'tdk' ? "checked=checked" : ''; ?>>&nbsp; &nbsp; tdk</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
              </table>
            </td>

          </tr>
        </table>
        <table width="100%" cellspacing="0">
          <tr>
            <td class="font-size-8  border-bottom-1 border-left-1 border-right-0">
              <div class="r-bold">Tanda Tangan Dokter Operator</div>
              <center>
                <img src="<?php echo $list['notes']['digital_signature_approved_dokter'];?>" alt="" width="80" height="80">
              </center>
              <div>
              <?php echo ucwords(strtolower($list['notes']['approved_dokter'])); ?>
              </div>
            </td>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-0">
              <div class="r-bold">Tanda Tangan Perawat Ruang Rawat Inap</div>
              <center>
                <img src="<?=$list['notes']['coretan_perawat_ruang_rawat_inap']?>" alt="" width="80" height="80">
              </center>
              <div>
                <?=$list['notes']['nama_perawat_ruang_rawat_inap']?>
              </div>
            </td>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1">
              <div class="r-bold">Tanda Tangan Perawat Ruang OK</div>
              <center>
                <img src="<?=$list['notes']['digital_signature_approved_petugas']?>" alt="" width="80" height="80">
              </center>
              <div>
                <?=$list['notes']['approved_petugas']?>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="row" style="margin-bottom:0px;">
  <?php $no = 1; ?>
    <div class="row-panel">
      <div class="row-heading border-blue bg-blue font-white font-size-9 r-bold">Data <?= $title; ?></div>
      <div class="row-body">

        <table width="100%" cellspacing="0">
          <tr>
            <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 r-bold centerp-left">Nama Prosedur</td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-row"><?= $list['notes']['nama_prosedur'] ?></td>
          </tr>
        </table>

        <table  width="100%" cellspacing="0">

          <tr>
            <td class="font-size-8 border-bottom-1" width="50%">
              <div class="r-bold">
                Pria
              </div>
              <table width="100%" cellspacing="0">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td class="font-size-8">Kanan</td>
                        <td class="font-size-8" align="right">Kiri</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <img style="margin-left: 0px" width="100px" height="300px" src="<?php echo base_url() . 'assets/image/body_man_front.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -99px;" width="100px" height="300px" src='<?php echo $list['notes']['body_man_front']; ?>' id='sign_prev'>
                        </td>
                        <td></td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <table>
                      <tr>
                        <td class="font-size-8">Kiri</td>
                        <td class="font-size-8" align="right">Kanan</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <img style="margin-left: 0px" width="100px" height="300px" src="<?php echo base_url() . 'assets/image/body_man_back.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -99px;" width="100px" height="300px" src='<?php echo $list['notes']['body_man_back']; ?>' id='sign_prev'>
                        </td>
                        <td></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
            <td class="font-size-8 border-bottom-1" width="50%">
              <div class="r-bold">
                Wanita
              </div>
              <table width="100%" cellspacing="0">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td class="font-size-8">Kanan</td>
                        <td class="font-size-8" align="right">Kiri</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <img style="margin-left: 0px" width="100px" height="300px" src="<?php echo base_url() . 'assets/image/body_woman_front.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -99px;" width="100px" height="300px" src='<?php echo $list['notes']['body_woman_front']; ?>' id='sign_prev'>
                        </td>
                        <td></td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <table>
                      <tr>
                        <td class="font-size-8">Kiri</td>
                        <td class="font-size-8" align="right">Kanan</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <img style="margin-left: 0px" width="100px" height="300px" src="<?php echo base_url() . 'assets/image/body_woman_back.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -99px;" width="100px" height="300px" src='<?php echo $list['notes']['body_woman_back']; ?>' id='sign_prev'>
                        </td>
                        <td></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td class="font-size-8 border-bottom-1" width="50%"> 
              <div class="r-bold">
                Palman (anterior)
              </div>
              <table width="100%" cellspacing="0">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td>Kiri</td>
                      </tr>
                      <tr>
                        <td>
                          <img style="margin-left: 0px" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/palmar_hand_kiri.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -85px;" width="80px" height="100px" src='<?php echo $list['notes']['palmar_hand_kiri']; ?>' id='sign_prev'>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <table>
                      <tr>
                        <td valign="right">Kanan</td>
                      </tr>
                      <tr>
                        <td>
                          <img style="margin-left: 0px" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/palmar_hand_kanan.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -85px;" width="80px" height="100px" src='<?php echo $list['notes']['palmar_hand_kanan']; ?>' id='sign_prev'>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
            <td class="font-size-8 border-bottom-1" width="50%">
              <table width="100%" cellspacing="0">
                <tr>
                  <td  width="25%">
                    <table>
                        <tr>
                          <td>
                          <table  width="100%">
                              <tr><td class="font-size-8" align="center" colspan="2">Kiri</td></tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img style="margin-left: 0px" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/head_kiri.png'; ?>">
                            <img style="margin-bottom: 0px; margin-left: -83px;" width="80px" height="100px" src='<?php echo $list['notes']['head_kiri']; ?>' id='sign_prev'>
                          </td>
                        </tr>
                      </table>
                  </td>
                  <td  width="25%">
                    <table>
                        <tr>
                          <td>
                          <table  width="100%">
                              <tr><td class="font-size-8" align="center" colspan="2">Kanan</td></tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img style="margin-left: 0px" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/head_kanan.png'; ?>">
                            <img style="margin-bottom: 0px; margin-left: -85px;" width="80px" height="100px" src='<?php echo $list['notes']['head_kanan']; ?>' id='sign_prev'>
                          </td>
                        </tr>
                      </table>
                  </td>
                  <td  width="25%">
                    <table>
                        <tr>
                          <td>
                            <table  width="100%">
                              <tr><td class="font-size-8" align="left">Kanan</td><td class="font-size-8" align="right">Kiri</td></tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img style="margin-left: 0px" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/head_front.png'; ?>">
                            <img style="margin-bottom: 0px; margin-left: -85px;" width="80px" height="100px" src='<?php echo $list['notes']['head_front']; ?>' id='sign_prev'>
                          </td>
                        </tr>
                      </table>
                  </td>
                  <td  width="25%">
                    <table>
                        <tr>
                          <td>
                            <table  width="100%">
                                <tr><td class="font-size-8" align="left">Kiri</td><td class="font-size-8" align="right">Kanan</td></tr>
                              </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img style="margin-left: 0px" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/head_back.png'; ?>">
                            <img style="margin-bottom: 0px; margin-left: -85px;" width="80px" height="100px" src='<?php echo $list['notes']['head_back']; ?>' id='sign_prev'>
                          </td>
                        </tr>
                      </table>
                  </td>

                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td class="font-size-8" width="50%">
              <div class="r-bold">
                Dorsal (posterior)
              </div>
            
              <table width="100%">
                <tr>
                  <td class="border-bottom-1">
                    <table>
                      <tr>
                        <td><center>Kiri</center></td>
                      </tr>
                      <tr>
                        <td>
                          <img style="margin-left: 0px; margin-bottom: -10;" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/dorsal_kiri.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -5px; margin-top: -120;" width="80px" height="100px" src='<?php echo $list['notes']['dorsal_kiri']; ?>' id='sign_prev'>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td class="border-bottom-1">
                    <table>
                      <tr>
                        <td><center>Kanan</center></td>
                      </tr>
                      <tr>
                        <td>
                          <img style="margin-left: 0px; margin-bottom: -10;" width="80px" height="100px" src="<?php echo base_url() . 'assets/image/dorsal_kanan.png'; ?>">
                          <img style="margin-bottom: 0px; margin-left: -5px; margin-top: -120;" width="80px" height="100px" src='<?php echo $list['notes']['dorsal_kanan']; ?>' id='sign_prev'>
                        </td>
                      </tr>
                    </table>
                  </td>
                  
                </tr>
              </table>
            </td>


            <td class="font-size-8" width="50%">
              <table>
                <tr>
                  <td>
                    <div class="r-bold font-size-8">
                    Plantar (posterior)
                    </div>
                    <table>
                      <tr>
                        <td class="border-bottom-1">
                          <table>
                            <tr>
                              <td class="font-size-8"><center>Kanan</center></td>
                            </tr>
                            <tr>
                              <td>
                                <img style="margin-left: 0px; margin-bottom: -28px;" width="80px" height="150px" src="<?php echo base_url() . 'assets/image/plantar_kanan.png'; ?>">
                                <img style="margin-bottom: 0px; margin-left: -5px; margin-top: -120;" width="80px" height="150px" src='<?php echo $list['notes']['plantar_kanan']; ?>' id='sign_prev'>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td class="border-bottom-1">
                          <table>
                            <tr>
                              <td class="font-size-8"><center>Kiri</center></td>
                            </tr>
                            <tr>
                              <td>
                                <img style="margin-left: 0px; margin-bottom: -28px;" width="80px" height="150px" src="<?php echo base_url() . 'assets/image/plantar_kiri.png'; ?>">
                                <img style="margin-bottom: 0px; margin-left: -5px; margin-top: -120;" width="80px" height="150px" src='<?php echo $list['notes']['plantar_kiri']; ?>' id='sign_prev'>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <div class="r-bold font-size-8">
                      Plantar (anterior)
                    </div>
                    <table>
                      <tr>
                        <td class="border-bottom-1">
                          <table>
                            <tr>
                              <td class="font-size-8"><center>Kanan</center></td>
                            </tr>
                            <tr>
                              <td>
                                <img style="margin-left: 0px; margin-bottom: -28px;" width="80px" height="150px" src="<?php echo base_url() . 'assets/image/palmar_feet_kiri.png'; ?>">
                                <img style="margin-bottom: 0px; margin-left: -5px; margin-top: -120;" width="80px" height="150px" src='<?php echo $list['notes']['palmar_feet_kiri']; ?>' id='sign_prev'>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td class="border-bottom-1">
                          <table>
                            <tr>
                              <td class="font-size-8"><center>Kiri</center></td>
                            </tr>
                            <tr>
                              <td>
                                <img style="margin-left: 0px; margin-bottom: -28px;" width="80px" height="150px" src="<?php echo base_url() . 'assets/image/palmar_feet_kanan.png'; ?>">
                                <img style="margin-bottom: 0px; margin-left: -5px; margin-top: -120;" width="80px" height="150px" src='<?php echo $list['notes']['palmar_feet_kanan']; ?>' id='sign_prev'>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>


        </table>
        <br>
        <br>
        <table width="100%" cellspacing="0">
          <tr>
            <td colspan="3" class="font-size-8 centerp-row" >
              Dengan ini saya menyatakan bahwa lokasi operasi yang telah ditetapkan pada diagram diatas adalah benar.
              <br><br>
            </td>
            <td class="font-size-8 centerp-row" valign="top">Tanggal : <?=$list['notes']['tanggal']?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8"><center>Wali Pasien</center></td>
            <td class="r-bold font-size-8"><center>Pasien</center></td>
            <td class="r-bold font-size-8"><center>Saksi Pihak RS</center></td>
            <td class="r-bold font-size-8"><center>Dokter Operator</center></td>
          </tr>
          <tr>
            <td><center><img src="<?=$list['notes']['coretan_wali']?>" alt="" width="80px" height="80px"> <div  class="font-size-8">Bertanda tangan untuk pasien a.n : <?=$list['notes']['nama_pasien']?> </div></center></td>
            <td><center><img src="<?=$list['notes']['coretan_wali']?>" alt="" width="80px" height="80px"><div  class="font-size-8"><?=$list['notes']['nama_wali']?></div></center></td>
            <td><center><img src="<?=$list['notes']['coretan_saksi']?>" alt="" width="80px" height="80px"><div  class="font-size-8"><?=$list['notes']['nama_saksi']?></div></center></td>
            <td><center><img src="<?php echo $list['notes']['digital_signature_approved_dokter'];?>" alt="" width="80" height="80"><div  class="font-size-8"><?php echo ucwords(strtolower($list['notes']['approved_dokter'])); ?></div></center></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  
</body>
</html>