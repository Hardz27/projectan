<html>
<head>
<title><?php echo $title;?></title>
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
    padding: 5px 0px 5px 5px;
    text-align: left;
  }

  .centerp-row {
    padding: 5px 0px 5px 5px;
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
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['no_mr']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">  Usia</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['usia']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  Tempat, Tgl.Lahir</td>
            <td class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['ttl']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left"> Hubungan</td>
            <td class="font-size-8 border-right-0 centerp-row">:<?= $list['notes']['hubungan']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"> jenis kelamin: <?= $list['notes']['jenis_kelamin_wali']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  Usia</td>
            <td class="font-size-8 border-bottom-1 border-right-0 centerp-row">:<?= $list['notes']['usia']; ?></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"> jenis kelamin: <?= $list['notes']['jenis_kelamin_pasien']; ?></td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="3"></td>
          </tr>
        </table>



        <table width="100%" cellspacing="0">
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" style="width: 30%;">Jenis Informasi</td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left" style="width: 70%;">Isi Informasi</td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Diagnosis Kerja</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"><?= $list['notes']['diagnosis_kerja']; ?></td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Diagnosis Banding</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"><?= $list['notes']['diagnosis_banding']; ?></td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Tindakan yang dilakukan</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left">
              <table width="100%" cellspacing="0">
                <tr>
                  <td class="font-size-8">
                    <lable ><input type="checkbox" <?= in_array( "Anestesi spinal",$list['notes']['tindakan_yang_dilakukan']) ? "checked=checked" : '' ; ?> name="" id=""  >Anestesi spinal</lable>
                  </td>
                  <td class="font-size-8">
                    <lable ><input type="checkbox" <?= in_array( "Block saraf",$list['notes']['tindakan_yang_dilakukan']) ? "checked=checked" : '' ; ?> name="" id=""  >Block saraf</lable>
                  </td>
                  <td class="font-size-8">
                    <lable ><input type="checkbox" <?= in_array( "Anestesi epidural",$list['notes']['tindakan_yang_dilakukan']) ? "checked=checked" : '' ; ?> name="" id=""  >Anestesi epidural</lable>
                  </td>
                  <td class="font-size-8">
                    <lable ><input type="checkbox" <?= in_array( "Lain lain",$list['notes']['tindakan_yang_dilakukan']) ? "checked=checked" : '' ; ?> name="" id=""  >Lain lain</lable>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Indikasi Tindakan</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left">
              <lable class="font-size-8"><input type="checkbox" <?= in_array( "Menghilangkan nyeri selama prosedur atau tindakan pembedahan",$list['notes']['indikasi_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  style="margin-right: 5px;"> Menghilangkan nyeri selama prosedur atau tindakan pembedahan</lable>
              <br>
              <lable class="font-size-8"><input type="checkbox" <?= in_array( "Relaksasi selama prosedur atau tindakan pembedahan",$list['notes']['indikasi_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  style="margin-right: 5px;"> Relaksasi selama prosedur atau tindakan pembedahan</lable>
              <br>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Tata Cara</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left">
              <label > 
                <input type="checkbox" <?= in_array('Obat anastesi disuntikan melalui jarum  atau kateter yang ditempatkan kedalam rongga sumsum tulang belakang atau rongga didekatnya', $list['notes']['tata_cara']) ? "checked=checked" : '' ?> name="tata_cara[]" value="Obat anastesi disuntikan melalui jarum  atau kateter yang ditempatkan kedalam rongga sumsum tulang belakang atau rongga didekatnya" >
               
                <span style="display: inline-block; padding: 5px;"> Obat anastesi disuntikan melalui jarum  atau kateter yang ditempatkan kedalam rongga sumsum tulang belakang atau rongga didekatnya </span>
              </label>
              <br>
              <label> 
                <input type="checkbox" <?= in_array('Obat anastesi disuntikan kejaringan sekitar saraf melalui kulit', $list['notes']['tata_cara']) ? "checked=checked" : '' ?> name="tata_cara[]" value="Obat anastesi disuntikan kejaringan sekitar saraf melalui kulit" >
                Obat anastesi disuntikan kejaringan sekitar saraf melalui kulit
              </label>
              <br>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Risiko Tindakan</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left">
              <table width="100%" cellspacing="0">
                <tr>
                  <td class="font-size-8">
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Mual, Muntah",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Mual, Muntah</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Nyeri otot",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Nyeri otot</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Perubahan tekanan darah",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Perubahan tekanan darah</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Kelumpuhan",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Kelumpuhan</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Infeksi",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Infeksi</lable>
                  </td>
                  <td class="font-size-8">
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Penurunan kesadaran",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Penurunan kesadaran</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Stroke",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Stroke</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Reaksi alergi",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Reaksi alergi</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Kematian",$list['notes']['risiko_tindakan']) ? "checked=checked" : '' ; ?> name="" id=""  >Suara serak</lable>

                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Komplikasi</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left">
              <table width="100%" cellspacing="0">
                <tr>
                  <td width="50%" class="font-size-8">
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Sakit punggung",$list['notes']['komplikasi']) ? "checked=checked" : '' ; ?> name="" id="" style="margin-right: 10px;" >Sakit punggung</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Kerusakan otak",$list['notes']['komplikasi']) ? "checked=checked" : '' ; ?> name="" id="" style="margin-right: 10px;" >Kerusakan otak</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Kerusakan saraf",$list['notes']['komplikasi']) ? "checked=checked" : '' ; ?> name="" id="" style="margin-right: 10px;" >Kerusakan saraf</lable>
                    <br>
                  </td>
                  <td class="font-size-8">
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Serangan jantung",$list['notes']['komplikasi']) ? "checked=checked" : '' ; ?> name="" id="" style="margin-right: 10px;" >Serangan jantung</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Gangguan irama jantung",$list['notes']['komplikasi']) ? "checked=checked" : '' ; ?> name="" id="" style="margin-right: 10px;" >Gangguan irama jantung</lable>
                    <br>
                    <lable class="font-size-8"><input type="checkbox" <?= in_array( "Henti jantung",$list['notes']['komplikasi']) ? "checked=checked" : '' ; ?> name="" id="" style="margin-right: 10px;" >Henti jantung</lable>
                    <br>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Prognosis</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"><?= $list['notes']['prognosis']; ?></td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Alternatif</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"><?= $list['notes']['alternatif']; ?></td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Lain - Lain / Analgetik post operasi</td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"><?= $list['notes']['lain_lain']; ?></td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left"></td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left">
              <table width="100%" cellspacing="0">
                <tr>
                  <td class="font-size-8 r-bold">Tanggal: <?= $list['notes']['tanggal']; ?> </td>
                  <td class="font-size-8 r-bold">Jam: <?= $list['notes']['jam']; ?></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left text-center">
              Dengan ini saya menyatakan bahwa saya telah diberikan informasi secara jelas, telah memahami dan menerima tentang hal hal tersebut diatas.
            </td>
            <td class=" border-bottom-1 border-left-0 border-right-1 centerp-left">
              <table width="100%" cellspacing="0">
                    <tr>
                      <td class="text-center font-size-8">
                        <div class="r-bold">Wali Pasien</div>
                        <center>
                          <img src="<?= $list['notes']['coretan_wali']; ?>" alt="" height="100px" width="100px">
                        </center>
                        <div><?= $list['notes']['nama_wali']; ?></div>
                      </td>
                      <td class="text-center font-size-8"> 
                        <b>Pasien</b>
                        <center>
                          <img src="<?= $list['notes']['coretan_pasien']; ?>" alt="" height="100px" width="100px">
                        </center>
                          <div>
                            <?= $list['notes']['nama_pasien']; ?>
                          </div>
                      </td>
                    </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left text-center">
              Dengan ini saya menyatakan bahwa saya telah memberikan informasi secara benar dan jelas, dan memberikan kesempatan untuk berdiskusi tenatang 
              hal - hal tersebut diatas.
            </td>
            <td class=" border-bottom-1 border-left-0 border-right-1 centerp-left">
              <table width="100%" cellspacing="0">
                    <tr>
                      <td class="text-center font-size-8" width="50%">
                        <div class="r-bold">Saksi Pihak RS</div>
                        <center>
                          <img src="<?= $list['notes']['coretan_saksi']; ?>" alt="" height="100px" width="100px">
                        </center>
                          <div>
                            <?php echo ucwords(strtolower($list['notes']['saksi'])); ?> 
                          </div>
                      </td>
                      <td class="text-center font-size-8">
                        <div class="r-bold">Petugas yang Menyetujui</div>
                        <center>
                          <img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>" height="100px" width="100px">
                          <div>
                            <?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?> 
                          </div>
                        </center>
                      </td>
                    </tr>
              </table>
            </td>
          </tr>
        </table>

        </div>
      </div>
    </div>
<br><br><br><br>
<div class="row" style="margin-bottom:0px;">
    <?php $no = 1; ?>
    
    <div class="row-panel">
      <div class="row-heading border-blue bg-blue font-white font-size-9 r-bold">Data <?= $title; ?></div>
        <div class="row-body">
        <table width="100%" cellspacing="0" >
            <tr>
              <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 text-center" style="padding: 10px;"> 
                <br>
                <center>PERSERTUJUAN TINDAKAN ANESTESI REGIONAL/ BLOCK SARAF PERIFER</center>
              </td>
            </tr>
        </table>
        <table width="100%" cellspacing="0">
            <tr>
              <td  class="font-size-8  border-bottom-0 border-left-1 border-right-1" style="padding: 10px;">
                <br>
                <p>Setelah saya membaca dan diterangkan mengenai tindakan di atas, maka saya yang bertanda tangan dibawah ini :</p>
              </td>
            </tr>
        </table>
        <table width="100%" cellspacing="0">
          <tr>
            <td width="50%" class="border-left-1" style="padding: 10px;">
              <br>
              <table width="100%" cellspacing="0">
                <tr>
                  <td width="40%" class="font-size-8 ">Nama</td>
                  <td class="font-size-8">: <?=$list['notes']['nama_wali'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8 ">Tanggal lahir</td>
                  <td class="font-size-8">: <?=$list['notes']['ttl_wali'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8 ">Alamat</td>
                  <td class="font-size-8">: <?=$list['notes']['alamat'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8 ">No Identitas</td>
                  <td class="font-size-8">: <?=$list['notes']['no_identitas'];?></td>
                </tr>
              </table>
            </td>
            <td class="border-right-1">
              <table width="100%" cellspacing="0">
                <tr>
                  <td width="40%" class="font-size-8">Jenis Kelamin</td>
                  <td class="font-size-8">: <?=$list['notes']['jenis_kelamin_wali'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8">Usia</td>
                  <td class="font-size-8">: <?=$list['notes']['usia_wali'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8"></td>
                  <td class="font-size-8"></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8"></td>
                  <td class="font-size-8"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="100%" cellspacing="0">
          <tr>
            <td class="border-left-1 border-right-1 font-size-8" style="padding: 10px;">
              <br>
             Bertidank selaku <span class="r-bold"><?=$list['notes']['hubungan'];?></span> dan penanggung jawab atau wali atas pasien, menyatakan <b>SETUJU</b> untuk dilakukan tindakan berupa <b>ANESTESI REGIONAL/ ANESTESI EPIDURAL/ ANESTESI BLOCK</b> terhadap :
            </td>
          </tr>
        </table>

        <table width="100%" cellspacing="0">
          <tr>
            <td width="50%" class="border-left-1" style="padding: 10px;">
              <br>
              <table width="100%" cellspacing="0">
                <tr>
                  <td width="40%" class="font-size-8 ">Nama</td>
                  <td class="font-size-8">: <?=$list['notes']['nama_pasien'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8 ">Tanggal lahir</td>
                  <td class="font-size-8">: <?=$list['notes']['ttl'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8 ">No. MR</td>
                  <td class="font-size-8">: <?=$list['notes']['no_mr'];?></td>
                </tr>
              </table>
            </td>
            <td class="border-right-1">
              <table width="100%" cellspacing="0">
                <tr>
                  <td width="40%" class="font-size-8">Jenis Kelamin</td>
                  <td class="font-size-8">: <?=$list['notes']['jenis_kelamin_pasien'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8">Usia</td>
                  <td class="font-size-8">: <?=$list['notes']['usia'];?></td>
                </tr>
                <tr>
                  <td width="40%" class="font-size-8"></td>
                  <td class="font-size-8"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="100%" cellspacing="0">
          <tr>
            <td class="border-left-1 border-right-1 font-size-8" style="padding: 10px; text-align: justify;">
              <br>
              <p>
                Saya menyatakan bahwa sesunguhnya dan tanpa paksaan bahwa :
              </p>
              <ol type="number">
                <li>Saya telah menerima informasi jenis anestesi yang dilakukan.</li>
                <li>Saya mengerti bahwa tindakan anestesi mengandung beberapa resiko, termasuk perubahan tekanan darah
                  , resiko obat (alergi), henti jantung, kerusakan otak, kelumpuhan, kerusakan syaraf serta komplikasi lain yang juga mungkin terjadi bahkan kematian.
                </li>
                <li>
                  Saya telah membaca penjelasan secara teliti tentang tindakan anestesi yang diberikan, mengerti dan menyetujui pejelasan tentang tindakan yang akan 
                  dilakukan termasuk kemungkinan komplikasi yang mungkin terjadi serta kelebihan atau kelemahan dari setiap jenis pembiusan yang dilakukan.
                </li>
                <li>
                  Saya mempunyai kewajiban untuk memberi informasi kepada dokter mengenai semua penyakit dan obat yang pasien minum, seperti aspirin, pengencer darah,
                  kontrasepsi, obat flu, narkotik, marijuana, kokain, dan lain - lain.
                </li>
                <li>
                  Saya bersedia menanggung tindakan anestesi, kecuali terhadap pihak lain yang menyatakan bertanggung jawab secara finansial terhadap tindakan anestesi ini.
                </li>
              </ol>
              <p>
                <br>
                Berdasarkan hal - hal tersebut diatas, saya menjamin sepenuhnya bahwa tindakan saya untuk menyetujui tindakan anestesi diatas adalah untuk mewakili kepentingan
                saya/ pasien dan keluarga pasien, dan saya bertanggung jawab sepenuhnya apabila terhadap pihak lain yang mengajukan keberatan atas persetujuan ini.
              </p>
              <p>
                <br>
                Demikian surat persetujuan ini dibuat dengan kesadaran dan tanpa paksaan dari pihak manapun juga.
              </p>
            </td>
          </tr>
        </table>

        <table width="100%" cellspacing="0">
        <tr>
            <td class="font-size-8  border-left-1 border-right-0 centerp-left text-center">
             <table>
               <tr>
               <td class="font-size-8 r-bold">Tanggal: <?= $list['notes']['tanggal']; ?> </td>
               </tr>
               <tr>
                  <td class="font-size-8 r-bold">Jam: <?= $list['notes']['jam']; ?></td>
               </tr>
             </table>
            </td>
            <td class=" centerp-left border-right-1">
              <table width="100%" cellspacing="0">
                    <tr>
                      <td class="text-center font-size-8 ">
                        <b class="r-bold">Wali Pasien</b>
                        <center>
                          <img src="<?= $list['notes']['coretan_wali']; ?>" alt="" height="100px" width="100px">
                        </center>
                        <div>
                            <?php echo ucwords(strtolower($list['notes']['nama_wali'])); ?> 
                          </div>
                      </td>
                      <td class="text-center font-size-8 "> 
                        <b class="r-bold">Pasien</b>
                        <center>
                          <img src="<?= $list['notes']['coretan_pasien']; ?>" alt="" height="100px" width="100px">
                        </center>
                        <div>
                            <?php echo ucwords(strtolower($list['notes']['nama_pasien'])); ?> 
                          </div>
                      </td>
                    </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="font-size-8  border-left-1 border-bottom-1 border-right-0 centerp-left text-center">
             
            </td>
            <td class="centerp-left  border-right-1 border-bottom-1">
              <table width="100%" cellspacing="0">
                    <tr>
                      <td class="text-center font-size-8" width="50%">
                        <div class="r-bold">Saksi Pihak RS</div>
                        <center>
                          <img src="<?= $list['notes']['coretan_saksi']; ?>" alt="" height="100px" width="100px">
                        </center>
                        <div>
                            <?php echo ucwords(strtolower($list['notes']['saksi'])); ?> 
                          </div>
                      </td>
                      <td class="text-center font-size-8">
                        <div class="r-bold">Petugas yang Menyetujui</div>
                        <center>
                          <img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas'];?>" height="100px" width="100px">
                          <div>
                            <?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?> 
                          </div>
                        </center>
                      </td>
                    </tr>
              </table>
            </td>
          </tr>
        </table>


       

           <div class="row-panel mt-20">
            <div class="column-right-header">
              
            </div>
          </div>

        

        </div>
      </div>
    </div>

  </div>

</body>
</html>