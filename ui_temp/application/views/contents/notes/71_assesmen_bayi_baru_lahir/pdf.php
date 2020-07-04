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
    padding: 1px 0px 1px 1px;
    text-align: center;
  }

  .centerp-left {
    padding: 1px 0px 1px 1px;
    text-align: left;
  }
  .centerp-right {
    padding: 1px 0px 1px 1px;
    text-align: right;
  }

  .centerp-row {
    padding: 2px 0px 2px 2px;
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
            <td  class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-right" colspan="5">REKAM MEDIK No</td>
            <td  class="font-size-8 border-right-1 border-bottom-1 centerp-left" colspan="5">: <?= $list['notes']['rekam_medik_no']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-0 border-bottom-1 border-left-1 border-right-0 centerp-right" colspan="2">Nama</td>
            <td class="font-size-8 border-right-0 centerp-row border-bottom-1" colspan="3">: <?= $list['notes']['nama']; ?></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right" colspan="2">Pening No</td>
            <td class="font-size-8 border-right-1 centerp-row border-bottom-1" colspan="3">: <?= $list['notes']['pening_no']; ?></td>
          </tr>
          <tr>
            <td rowspan="2" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-right" colspan="2">Dokter Kebidanan</td>
            <td rowspan="2" class=" font-size-8 border-bottom-1 border-right-1 centerp-row">: <?= $list['notes']['dokter_kebidanan']; ?></td>
            <td rowspan="2" class=" r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right" colspan="2">Dokter Anak</td>
            <td rowspan="2" class="font-size-8 border-bottom-1 border-right-1 centerp-row">: <?= $list['notes']['dokter_anak']; ?></td>
            <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-row" colspan="4">Penyakit Ibu</td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="penyakit_ibu" <?= $list['notes']['penyakit_ibu'] == 'anemia' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Anemia
            </td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="penyakit_ibu" <?= $list['notes']['penyakit_ibu'] == 'hipertensi' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Hipertensi
            </td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="penyakit_ibu" <?= $list['notes']['penyakit_ibu'] == 'hepatitis b' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Hepatitis B
            </td>
          </tr>
          <tr>
            <td rowspan="2" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-right" colspan="2">Nama Ibu</td>
            <td rowspan="2" class=" font-size-8 border-right-1 border-bottom-1 centerp-row">: <?= $list['notes']['nama_ibu']; ?></td>
            <td rowspan="2" class=" r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right" colspan="2">Nama Ayah</td>
            <td rowspan="2" class="font-size-8 border-right-1 border-bottom-1 centerp-row">: <?= $list['notes']['nama_ayah']; ?></td>
            
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="penyakit_ibu" <?= $list['notes']['penyakit_ibu'] == 'tbc' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; TBC
            </td>
            <td class="font-size-8 border-bottom-0 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="penyakit_ibu" <?= $list['notes']['penyakit_ibu'] == 'diabetes' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Diabetes
            </td>
            <td class="font-size-8 border-bottom-0 border-right-1 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="penyakit_ibu" <?= $list['notes']['penyakit_ibu'] == 'kel jantung' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Kel Jantung
            </td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-head" colspan="2">Sakit Lain</td>
            <td class=" font-size-8 border-right-1 centerp-row border-bottom-1" colspan="2">: <?= $list['notes']['sakit_lain']; ?></td>
            
          </tr>
          
        </table>
        <table width="100%" cellspacing="0">
          <tr>
            <td  class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-right">Agama</td>
            <td  class="font-size-8 border-right-1 border-bottom-1 centerp-left" colspan="2">: <?= $list['notes']['agama']; ?></td>
            <td  class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right">Goldar Bayi</td>
            <td  class="font-size-8 border-right-0 border-bottom-1 centerp-left">: <?= $list['notes']['goldar_bayi']; ?></td>
            <td  class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right">Goldar Ibu</td>
            <td  class="font-size-8 border-right-0 border-bottom-1 centerp-left">: <?= $list['notes']['goldar_ibu']; ?></td>
            <td  class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right">Goldar Ayah</td>
            <td  class="font-size-8 border-right-1 border-bottom-1 centerp-left">: <?= $list['notes']['goldar_ayah']; ?></td>
            <td  class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right">VDRL</td>
            <td class="font-size-8 border-bottom-1 border-right-0 centerp-right">
              <label class="container">
               <input type="radio" name="vdrl" <?= $list['notes']['vdrl'] == '+' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; +
            </td>
            <td class="font-size-8 border-bottom-1 border-right-0 centerp-right">
              <label class="container">
               <input type="radio" name="vdrl" <?= $list['notes']['vdrl'] == '-' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; -
            </td>
            <td  class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-right">Titer Antibodi</td>
            <td  class="font-size-8 border-right-1 border-bottom-1 centerp-left">: <?= $list['notes']['titer_antibodi']; ?></td>
          </tr>
        </table>
        <table width="100%" cellspacing="0">
         <tr>
            <td width="40%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="4">Alamat</td>
            <td width="20%" class=" r-bold font-size-8 border-right-1 border-bottom-1 centerp-head" colspan="2">Tahun</td>
            <td width="40%" class=" r-bold font-size-8 border-right-1 border-bottom-1 centerp-head" colspan="4">Riwayat Kehamilan / Kelahiran G P A</td>
           </tr>

            <tr>
            <td width="40%" class="font-size-8 border-right-1 border-left-1 border-bottom-0 centerp-left" rowspan="3" colspan="4" > <?= $list['notes']['alamat']; ?></td>
            <td width="20%"  class="font-size-8 border-right-0 border-right-1 border-bottom-0 centerp-head" colspan="2"> <?= $list['notes']['tahun1']; ?></td>
            <td width="40%"  class="font-size-8 border-right-1 border-bottom-0 centerp-left" colspan="4"> <?= $list['notes']['riwayat_kehamilan1']; ?></td>
           </tr>
           <tr>
            <td width="20%"  class="font-size-8 border-right-0 border-right-1 border-bottom-0 centerp-head" colspan="2"> <?= $list['notes']['tahun2']; ?></td>
            <td width="40%" class="font-size-8 border-right-1 border-bottom-0 centerp-left" colspan="4"> <?= $list['notes']['riwayat_kehamilan2']; ?></td>
           </tr>
           <tr>
            <td width="20%"  class="font-size-8 border-right-0 border-right-1 border-bottom-0 centerp-head" colspan="2"> <?= $list['notes']['tahun3']; ?></td>
            <td width="40%" class="font-size-8 border-right-1 border-bottom-0 centerp-left" colspan="4"> <?= $list['notes']['riwayat_kehamilan3']; ?></td>
           </tr>
           <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" colspan="2" >Telpon</td>
            <td width="20%"  class="font-size-8 border-right-1 border-bottom-1 centerp-left" colspan="2" >: <?= $list['notes']['telpon']; ?></td>
            <td width="20%"  class="font-size-8 border-right-0 border-right-1 border-bottom-1 centerp-head" colspan="2"> <?= $list['notes']['tahun4']; ?></td>
            <td width="40%"  class="font-size-8 border-right-1 border-bottom-1 centerp-left" colspan="4"> <?= $list['notes']['riwayat_kehamilan4']; ?></td>
           </tr>
        </table>

        <table width="100%" cellspacing="0">
         <tr>
            <td width="60%" class=" r-bold font-size-8 border-right-1 border-bottom-0 border-left-1 centerp-head" colspan="6">Ketuban</td>
            <td width="40%" class=" r-bold font-size-8 border-right-1 border-bottom-0 centerp-head" colspan="4">Bayi Dilahirkan Dengan</td>
           </tr>
            <tr>
            <td width="10%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" rowspan="2"  >Pecah Tanggal</td>
            <td  width="20%" class="font-size-8 border-right-0 border-left-0 border-bottom-0 centerp-left" rowspan="2" colspan="2" >: <?= $list['notes']['ketuban_pecah_tgl']; ?></td>
            <td  width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" rowspan="2" >Pecah Jam</td>
            <td  width="20%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" rowspan="2" colspan="2" >: <?= $list['notes']['ketuban_pecah_jam']; ?></td>

            <td width="20%" class="font-size-8 border-bottom-0 border-right-0 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="bayi_dilahirkan_dengan" <?= $list['notes']['bayi_dilahirkan_dengan'] == 'letak kepala' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Letak Kepala
            </td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-0 centerp-left">
              <label class="container">
               <input type="radio" name="bayi_dilahirkan_dengan" <?= $list['notes']['bayi_dilahirkan_dengan'] == 'spontan' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Spontan
            </td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-left">
              <label class="container">
               <input type="radio" name="bayi_dilahirkan_dengan" <?= $list['notes']['bayi_dilahirkan_dengan'] == 'eks vakum' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Eks Vakum
            </td>
           </tr>

           <tr>
            

            <td width="20%" class="font-size-8 border-bottom-0 border-right-0 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="bayi_dilahirkan_dengan" <?= $list['notes']['bayi_dilahirkan_dengan'] == 'letak sungsang' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Letak Sungsang
            </td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="bayi_dilahirkan_dengan" <?= $list['notes']['bayi_dilahirkan_dengan'] == 'eks cunam' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Eks Cunam
            </td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="bayi_dilahirkan_dengan" <?= $list['notes']['bayi_dilahirkan_dengan'] == 'op caesar' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Op Caesar
            </td>
           </tr>
           <tr>
            <td  width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" colspan="3" >Warna</td>
            <td  width="30%" class="font-size-8 border-right-0 border-left-0 border-bottom-1 centerp-left" colspan="3" >: <?= $list['notes']['ketuban_pecah_warna']; ?></td>

            <td rowspan="2" width="20%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-head" colspan="2" >INDIKASI</td>
            <td rowspan="2" width="20%" class="font-size-8 border-right-1 border-left-0 border-bottom-1 centerp-left" colspan="2" >: <?= $list['notes']['indikasi']; ?></td>
           </tr>
        </table>
        <table width="100%" cellspacing="0">
            <tr>
            <td width="15%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" colspan="2">Kala I</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left-0 border-bottom-1 centerp-left" >: <?= $list['notes']['kala1']; ?> jam</td>
            <td width="15%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left"  >Kala II</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left-0 border-bottom-1 centerp-left" >: <?= $list['notes']['kala2']; ?> jam</td>

            <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" colspan="3" >Tanda GAWAT JANIN</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="tanda_gawat_janin" <?= $list['notes']['tanda_gawat_janin'] == 'ya' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Ya
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="tanda_gawat_janin" <?= $list['notes']['tanda_gawat_janin'] == 'tidak' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Tidak
            </td>
           </tr>
        </table>
        <table width="100%" cellspacing="0">
            <tr>
            <td width="50%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="5">OBAT-OBATAN Selama Hamil / Persalinan</td>
            
            <td width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3" >Denyut Jantung Bayi</td>
            <td  width="20%" class="font-size-8 border-right-1 border-left-0 border-bottom-0 centerp-left" colspan="2" > <?= $list['notes']['denyut_jantung_bayi']; ?> &nbsp; x / Menit</td>
           </tr>
           <tr>
            <td rowspan="2" width="50%" class="font-size-8 border-right-1 border-left-1 border-bottom-1 centerp-left" colspan="5" > <?= $list['notes']['obat_selama_hamil']; ?></td>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" >ANESTESIA</td>
            <td width="15%" class="font-size-8 border-bottom-0 border-right-0 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="anestesia" <?= $list['notes']['anestesia'] == 'pudendal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Pudendal
            </td>
            <td width="15%" class="font-size-8 border-bottom-0 border-right-1 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="anestesia" <?= $list['notes']['anestesia'] == 'epidural' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Epidural
            </td>
           </tr>
           <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" ></td>
            <td width="15%" class="font-size-8 border-bottom-1 border-right-0 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="anestesia" <?= $list['notes']['anestesia'] == 'spinal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Spinal
            </td>
            <td width="15%" class="font-size-8 border-bottom-1 border-right-1 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="anestesia" <?= $list['notes']['anestesia'] == 'umum' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Umum
            </td>
           </tr>
        </table>
        <table width="100%" cellspacing="0">
            <tr>
            <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-0 border-left-1 centerp-head" colspan="5">BAYI</td>
            <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-0 centerp-head" colspan="5">RESUSITASI</td>
            </tr>
            <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2" >Lahir Tanggal</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left-0 border-bottom-0 centerp-left" >: <?= $list['notes']['bayi_lahir_tgl']; ?></td>
            <td  width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" >Jam</td>
            <td  width="10%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['ketuban_pecah_jam']; ?></td>
            
           <td width="30%" class="font-size-8 border-bottom-0 border-right-0 centerp-head" colspan="3">
              <label class="container">
               <input type="radio" name="resusitasi" <?= $list['notes']['resusitasi'] == 'Pembersihan Jalan Nafas' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Pembersihan Jalan Nafas
            </td>
            <td width="20%" class="font-size-8 border-bottom-0 border-right-1 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="resusitasi" <?= $list['notes']['resusitasi'] == 'oksigen' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Oksigen
            </td>
           </tr>
           <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2" >Kelamin</td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="bayi_kelamin" <?= $list['notes']['bayi_kelamin'] == 'lelaki' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Lelaki
            </td>
            <td width="20%" class="font-size-8 border-bottom-0 border-right-1 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="bayi_kelamin" <?= $list['notes']['bayi_kelamin'] == 'perempuan' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Perempuan
            </td>
            <td width="30%" class="font-size-8 border-bottom-0 border-right-0 centerp-head" colspan="3">
              <label class="container">
               <input type="radio" name="resusitasi" <?= $list['notes']['resusitasi'] == 'Tanpa Tekanan' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Tanpa Tekanan
            </td>
            <td width="20%" class="font-size-8 border-bottom-0 border-right-1 centerp-head" colspan="2">
              <label class="container">
               <input type="radio" name="resusitasi" <?= $list['notes']['resusitasi'] == 'Dengan Tekanan' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Dgn Tekanan
            </td>
           </tr>

           <tr>
            <td width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3" >Berat Badan</td>
            <td  width="20%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" colspan="2" >: <?= $list['notes']['bayi_bb']; ?> &nbsp; gram</td>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2" >Obat-obatan</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['obat_obatan']; ?></td>
            <td width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" >Dosis</td>
            <td width="10%" class="font-size-8 border-right-1 border-left-0 border-bottom-0 centerp-left" >: <?= $list['notes']['dosis']; ?></td>
           </tr>
           <tr>
            <td width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3" >Panjang Badan</td>
            <td  width="20%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" colspan="2" >: <?= $list['notes']['bayi_panjang']; ?> &nbsp; cm</td>

            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2">Plasenta</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['plasenta']; ?> &nbsp; gram</td>
            <td width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" >Tali Pusat</td>
            <td  width="10%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['tali_pusat']; ?>  </td>
           </tr>
            <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2">Lingkar Kepala</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['bayi_lingkar_kepala']; ?> &nbsp; cm</td>
            <td width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" >Lingkar Dada</td>
            <td  width="10%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['bayi_lingkar_dada']; ?> &nbsp; cm</td>

            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2">Intubasi Dari Menit Ke</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['dari_menitke_intubasi']; ?> &nbsp; </td>
            <td width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" >s/d Menit Ke</td>
            <td  width="10%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['sd_menitke_intubasi']; ?> &nbsp; </td>
           </tr>
           <tr>
            <td width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3">Masa Gestasik</td>
            <td  width="20%" class="font-size-8 border-right-0 border-left- border-bottom-0 centerp-left" colspan="2" >: <?= $list['notes']['masa_gestasi']; ?> &nbsp; Minggu</td>

            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2">Bagging Dari Menit Ke</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['dari_menitke_bagging']; ?> &nbsp; </td>
            <td width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" >s/d Menit Ke</td>
            <td  width="10%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['sd_menitke_bagging']; ?> &nbsp; </td>
           </tr>
           <tr>
            <td width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3">Urin</td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="urin" <?= $list['notes']['urin'] == 'keluar' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Keluar
            </td>
            <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="urin" <?= $list['notes']['urin'] == 'belum' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Belum
            </td>

            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2">Pijat Jantung Dari Menit Ke</td>
            <td  width="10%" class="font-size-8 border-right-0 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['dari_menitke_pijat_jantung']; ?> &nbsp; </td>
            <td width="10%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" >s/d Menit Ke</td>
            <td  width="10%" class="font-size-8 border-right-1 border-left- border-bottom-0 centerp-left" >: <?= $list['notes']['sd_menitke_pijat_jantung']; ?> &nbsp; </td>
           </tr>
           <tr>
            <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" colspan="3">Mekonium</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="mekonium" <?= $list['notes']['mekonium'] == 'keluar' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Keluar
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="mekonium" <?= $list['notes']['mekonium'] == 'belum' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>&nbsp; Belum
            </td>

            <td width="20%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" colspan="2">Lain-lain Jelaskan</td>
            <td width="30%" class="font-size-8 border-right-1 border-left- border-bottom-1 centerp-left" colspan="3" >: <?= $list['notes']['lainlain']; ?></td>
           </tr>
        </table>


        <table width="100%" cellspacing="0">
            <tr>
              <td width="100%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="10">NILAI APGAR</td>
            </tr>
            <tr>
            <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="5">Tanda</td>
            <td width="30%" class=" r-bold font-size-8 border-right-1 border-bottom-1 centerp-head" colspan="3">Nilai</td>
            <td width="20%" class=" r-bold font-size-8 border-right-1 border-bottom-1 centerp-head" colspan="2">Menit</td>
            </tr>
            <tr>
              <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="5">Frek Jantung</td>
              <td width="30%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="3"> <?= $list['notes']['frek_jantung']; ?></td>
              <td width="20%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="2"> <?= $list['notes']['menit_frek_jantung']; ?></td>
            </tr>
            <tr>
              <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="5">Usaha Nafas</td>
              <td width="30%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="3"> <?= $list['notes']['usaha_nafas']; ?></td>
              <td width="20%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="2"> <?= $list['notes']['menit_usaha_nafas']; ?></td>
            </tr>
            <tr>
              <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="5">Tonus Otot</td>
              <td width="30%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="3"> <?= $list['notes']['tonus_otot']; ?></td>
              <td width="20%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="2"> <?= $list['notes']['menit_tonus_otot']; ?></td>
            </tr>
            <tr>
              <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="5">Reflek(thd keleter hidung)</td>
              <td width="30%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="3"> <?= $list['notes']['reflek']; ?></td>
              <td width="20%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="2"> <?= $list['notes']['menit_reflek']; ?></td>
            </tr>
            <tr>
              <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="5">Warna Kulit</td>
              <td width="30%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="3"> <?= $list['notes']['warna_kulit']; ?></td>
              <td width="20%" class="font-size-8 border-bottom-1 border-right-1 border-left-1 centerp-head" colspan="2"> <?= $list['notes']['menit_warna_kulit']; ?></td>
            </tr>
            <tr>
              <td width="20%" class=" r-bold font-size-8 border-right-0 border-bottom-1 border-left-1 centerp-head" colspan="2">Nafas Pertama</td>
              <td width="10%" class="font-size-8 border-bottom-1 border-right-1 border-left-0 centerp-head" >: <?= $list['notes']['nafas_pertama']; ?> &nbsp; menit</td>
              <td width="30%" class=" r-bold font-size-8 border-right-0 border-bottom-1 border-left-0 centerp-head" colspan="3">Nafas Spontan & Teratur</td>
              <td width="10%" class="font-size-8 border-bottom-1 border-right-1 border-left-0 centerp-head" >: <?= $list['notes']['nafas_spontan']; ?> &nbsp; menit</td>
              <td width="20%" class=" r-bold font-size-8 border-right-0 border-bottom-1 border-left-0 centerp-head" colspan="2">Waktu s/d Menangis</td>
              <td width="10%" class="font-size-8 border-bottom-1 border-right-1 border-left-0 centerp-head" >: <?= $list['notes']['waktu_sd_menangis']; ?> &nbsp; menit</td>
              
            </tr>

        </table>



        
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
    <?php $no = 1; ?>
    
    <div class="row-panel">
      <div class="row-heading border-blue bg-blue font-white font-size-9 r-bold">Data <?= $title; ?></div>
        <div class="row-body">
          <table width="100%" cellspacing="0">
            <tr>
            <td width="30%" class=" r-bold font-size-8 border-right-1 border-bottom-1 border-left-1 centerp-head" colspan="3">PEMERIKSAAN FISIK</td>
            <td width="10%" class=" r-bold font-size-8 border-right-1 border-bottom-1 centerp-head" >Normal</td>
            <td width="10%" class=" r-bold font-size-8 border-right-1 border-bottom-1 centerp-head" >Tidak Normal</td>
            <td width="50%" class=" r-bold font-size-8 border-right-1 border-bottom-1 centerp-head" colspan="5">CATATAN</td>
            </tr>
            <tr>
            <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Keadaan Umum</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="keadaan_umum" <?= $list['notes']['keadaan_umum'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="keadaan_umum" <?= $list['notes']['keadaan_umum'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td style="vertical-align:top" rowspan="3" width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3" >Kel.kongenital/anomali/lain-lain</td>
            <td style="vertical-align:top" rowspan="3" width="20%" class="font-size-8 border-right-1 border-left-0 border-bottom-0 centerp-left" colspan="2" >: <?= $list['notes']['catatan']; ?> </td>
            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Sianosis (+/-)</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="sianosis" <?= $list['notes']['sianosis'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="sianosis" <?= $list['notes']['sianosis'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Ikterus / Kuning (+/-)</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="ikterus_kuning" <?= $list['notes']['ikterus_kuning'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="ikterus_kuning" <?= $list['notes']['ikterus_kuning'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">SSP, Tonus</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="ssp_tonus" <?= $list['notes']['ssp_tonus'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="ssp_tonus" <?= $list['notes']['ssp_tonus'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td style="vertical-align:top" rowspan="4" width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3" >Diagnosis</td>
            <td style="vertical-align:top" rowspan="4" width="20%" class="font-size-8 border-right-1 border-left-0 border-bottom-0 centerp-left" colspan="2" >: <?= $list['notes']['diagnosis']; ?> </td>
            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Kepala,Leher,Palatum</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="kepala_leher_palatum" <?= $list['notes']['kepala_leher_palatum'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="kepala_leher_palatum" <?= $list['notes']['kepala_leher_palatum'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Ubun-ubun, Sutura</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="ubun_ubun" <?= $list['notes']['ubun_ubun'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="ubun_ubun" <?= $list['notes']['ubun_ubun'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Paru</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="paru" <?= $list['notes']['paru'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="paru" <?= $list['notes']['paru'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Jantung,a. Femoralis</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="jantung" <?= $list['notes']['jantung'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="jantung" <?= $list['notes']['jantung'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td style="vertical-align:top" rowspan="5" width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="3" >Penatalaksanaan</td>
            <td style="vertical-align:top" rowspan="5" width="20%" class="font-size-8 border-right-1 border-left-0 border-bottom-0 centerp-left" colspan="2" >: <?= $list['notes']['penatalaksanaan']; ?> </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Abdomen, Anun (+/-)</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="abdomen" <?= $list['notes']['abdomen'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="abdomen" <?= $list['notes']['abdomen'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Kelamin</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="kelamin" <?= $list['notes']['kelamin'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="kelamin" <?= $list['notes']['kelamin'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Kulit</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="kulit" <?= $list['notes']['kulit'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="kulit" <?= $list['notes']['kulit'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Ekstremitas</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="ekstremitas" <?= $list['notes']['ekstremitas'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="ekstremitas" <?= $list['notes']['ekstremitas'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>

            </tr>
            <tr>
              <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left" colspan="3">Panggul</td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-head">
              <label class="container">
               <input type="radio" name="panggul" <?= $list['notes']['panggul'] == 'normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-head">
              <label class="container">
               <input type="radio" name="panggul" <?= $list['notes']['panggul'] == 'tidak normal' ? 'checked="checked"' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </td>
            <td style="vertical-align:top" rowspan="3" width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left" colspan="3" >Inisiasi Menetek Dini (IMD): Jam</td>
            <td style="vertical-align:top" rowspan="3" width="20%" class="font-size-8 border-right-1 border-left-0 border-bottom-1 centerp-left" colspan="2" >: <?= $list['notes']['inisiasi']; ?> </td>

            </tr>

          </table>


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

  </div>

</body>
</html>