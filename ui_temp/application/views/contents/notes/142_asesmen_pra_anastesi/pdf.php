<html>
<head>
  <title><?php echo $title;?></title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    .row {
      margin-bottom: 15px;
    }

    .centerp {
      padding: 0px 0px 0px 5px !important;
    }

    .centerp-head {
      padding: 0px 0px 0px 5px;
      text-align: center;
    }

    .centerp-left {
      padding: 0px 0px 0px 5px;
      text-align: left;
    }

    .centerp-right {
      padding: 0px 0px 0px 5px;
      text-align: right;
    }

    .centerp-row {
      padding: 0px 0px 0px 5px;
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
     padding: 0px;
     border-bottom: 1px solid #000;
   }

   .r_border_non {
     font-family: serif;
     font-size: 10px;
     padding: 0px;
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
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">No. RM</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['no_rm']; ?></td>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Tanggal Lahir</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['ttl']; ?></td>
          </tr>
          <tr>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">  Nama Pasien</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['nama_pasien']; ?></td>
            <td width="20%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">  Ruangan</td>
            <td width="30%" class="font-size-8 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['ruangan']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">Jenis kelamin: </td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2">: <b><?= $list['notes']['jenis_kelamin']; ?></b></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left"></td>
            <td class="font-size-8 border-bottom-1  border-right-1 centerp-row" colspan="2"></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">  DIAGNOSA</td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['diagnosa']; ?></td>
            <td class="r-bold font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left"> RENCANA TINDAKAN</td>
            <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2">: <?= $list['notes']['rencana_tindakan']; ?></td>
          </tr>
          <tr>
            <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head" colspan="6"><b>ANAMNESIS</b>
            </td>
          </tr>
        </table>

        <table width="100%" cellspacing="0">
          <tr>
            <td width="25%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left" colspan="2">Riwayat anestesi / operasi:</td>
            <td width="25%" class="font-size-8 border-right-1 centerp-row"></td>
            <td width="25%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left" colspan="2">Gejala yang di derita saat ini :</td>
            <td width="25%" class="font-size-8 border-right-1 centerp-row"></td>
          </tr>
          <tr>
            <td width="25%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">1. <b><?= $list['notes']['riwayat_anestesi1']; ?></b></td>
            <td width="25%" class="font-size-8 border-right-1 centerp-row" colspan="2"></td>
            <td class="font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left">
              <label class="container">&nbsp; 
               <input type="radio" name="batuk" <?= $list['notes']['batuk'] == 'batuk' ? 'checked="checked"' : ''; ?> >
               <span class="checkmark"></span>
             </label><b>&nbsp;  Batuk</b>  
             <label class="container">&nbsp;  
               <input type="radio" name="pilek" <?= $list['notes']['pilek'] == 'pilek' ? 'checked="checked"' : ''; ?> >
               <span class="checkmark"></span>
             </label><b>&nbsp;  Pilek</b>
             <label class="container">&nbsp;  
               <input type="radio" name="demam" <?= $list['notes']['demam'] == 'demam' ? 'checked="checked"' : ''; ?> >
               <span class="checkmark"></span>
             </label><b>&nbsp;  Demam</b>
           </td>
           <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2">
             <label class="container">, <b>lainnya</b> :  
               <b><?= $list['notes']['desc_gejala_lain']; ?></b>
             </label>
           </td>
         </tr>
         <tr>
          <td class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">2. <b><?= $list['notes']['riwayat_anestesi2']; ?></b></td>
          <td class="font-size-8 border-bottom-0 border-right-1 centerp-row" colspan="2"></td>
          <td class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Riwayat alergi :</td>
          <td class="font-size-8 border-bottom-0  border-right-1 centerp-row" colspan="2"><?= $list['notes']['alergi']; ?></td>
        </tr>
        <tr>
         <td class="font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">
           <label class="container">&nbsp;  
             <input type="radio" name="tidak_pernah_anestesi" <?= $list['notes']['tidak_pernah_anestesi'] == 'tidak_pernah_anestesi' ? 'checked="checked"' : ''; ?> >
             <span class="checkmark"></span>
           </label><b>&nbsp;  Tidak Pernah</b></td>
           <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2"></td>
           <td class="font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left">
             <label class="container">&nbsp;  
               <input type="radio" name="tidak_ada_alergi" <?= $list['notes']['tidak_ada_alergi'] == 'tidak_ada_alergi' ? 'checked="checked"' : ''; ?> >
               <span class="checkmark"></span>
             </label><b>&nbsp;  Tidak ada</b></td>
             <td class="font-size-8 border-bottom-1  border-right-1 centerp-row" colspan="2"></td>
           </tr>
         </table>

         <table width="100%" cellspacing="0">
          <tr>
            <td width="30%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">Komplikasi anestesi sebelumnya:</td>
            <td width="20%" class="font-size-8 border-right-1 centerp-row" colspan="2"></td>
            <td width="30%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Riwayat Anestesi dalam keluarga:</td>
            <td width="20%" class="font-size-8 border-right-1 centerp-row" colspan="2"></td>
          </tr>
          <tr>
            <td class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left"> 
             <?= $list['notes']['kompilkasi_anestesi_sebelumnya']; ?>            </td>
             <td class="font-size-8 border-right-1 centerp-row" colspan="2"></td>
             <td class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">
               <?= $list['notes']['riwayat_komplikasi_anestesi_dalam_keluarga']; ?></td>
               <td class="font-size-8 border-right-1 centerp-row" colspan="2"></td>
             </tr>
             <tr>
              <td class="font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">             
                <label class="container">&nbsp;  
                 <input type="radio" name="tidak_pernah_kompilkasi_anestesi_sebelumnya" <?= $list['notes']['tidak_pernah_kompilkasi_anestesi_sebelumnya'] == 'tidak_pernah_kompilkasi_anestesi_sebelumnya' ? 'checked="checked"' : ''; ?> >
                 <span class="checkmark"></span>
               </label><b>&nbsp;  Tidak Pernah</b></td>
               <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2"></td>
               <td class="font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left">
                 <label class="container">&nbsp;  
                   <input type="radio" name="tidak_ada_komplikasi_anestesi_dalam_keluarga" <?= $list['notes']['tidak_ada_komplikasi_anestesi_dalam_keluarga'] == 'tidak_ada_komplikasi_anestesi_dalam_keluarga' ? 'checked="checked"' : ''; ?> >
                   <span class="checkmark"></span>
                 </label><b>&nbsp;  Tidak</b></td>
                 <td class="font-size-8 border-bottom-1 border-right-1 centerp-row" colspan="2"></td>
               </tr>
             </table>

             <table width="100%" cellspacing="0">
               <tr>
                <td width="10%" colspan="2" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">Riwayat Penyakit : 
                </td>
                <td width="30%" class="font-size-8 border-bottom-1 border-right-0 centerp-row" colspan="2">
                 <label class="container">&nbsp;  
                  <input type="radio" name="asma" <?= $list['notes']['asma'] == 'asma' ? 'checked="checked"' : ''; ?> >
                  <span class="checkmark"></span>
                </label><b>&nbsp;  Asma</b>
                <label class="container">&nbsp;  
                 <input type="radio" name="hipertensi" <?= $list['notes']['hipertensi'] == 'hipertensi' ? 'checked="checked"' : ''; ?> >
                 <span class="checkmark"></span>
               </label><b>&nbsp;  Hipertensi</b>
               <label class="container">&nbsp;  
                 <input type="radio" name="dm" <?= $list['notes']['dm'] == 'dm' ? 'checked="checked"' : ''; ?> >
                 <span class="checkmark"></span>
               </label><b>&nbsp;  DM</b>
               <label class="container">&nbsp;  
                 <input type="radio" name="penyakit_jantung" <?= $list['notes']['penyakit_jantung'] == 'penyakit_jantung' ? 'checked="checked"' : ''; ?> >
                 <span class="checkmark"></span>
               </label><b>&nbsp;  Penyakit Jantung</b>
               <label class="container">&nbsp;  
                 <input type="radio" name="maag" <?= $list['notes']['maag'] == 'maag' ? 'checked="checked"' : ''; ?> >
                 <span class="checkmark"></span>
               </label><b>&nbsp;  Maag</b></td>
               <td width="30%" class="font-size-8 border-bottom-1 border-right-1 centerp-row">
                <label class="container">, <b>lainnya</b> :   
                 <b><?= $list['notes']['desc_penyakit_lain']; ?></b>
               </label></td>
             </tr>
           </table>

           <table width="100%" cellspacing="0">
             <tr>
              <td colspan="9" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">Kebiasaan : </td>
            </tr>
            <tr>
              <td width="5%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">Merokok :</td>
              <td width="5%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">               
                <label class="container">&nbsp;  
                 <input type="radio" name="merokok" <?= $list['notes']['merokok'] == 'tidak_merokok' ? 'checked="checked"' : ''; ?> >
                 <span class="checkmark"></span>
               </label><b>&nbsp;  Tidak</b></td>
               <td width="5%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">               
                <label class="container">&nbsp;  
                 <input type="radio" name="merokok" <?= $list['notes']['merokok'] == 'ya_merokok' ? 'checked="checked"' : ''; ?> >
                 <span class="checkmark"></span>
               </label><b>&nbsp;  Ya</b></td>
               <td width="2%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">
                 <label class="r-bold container">  
                  <b><?= $list['notes']['batang_rokok']; ?>  batang/hari, selama <?= $list['notes']['merokok_per_tahun']; ?> tahun</b>
                </label></td>
                <td width="5%" class="font-size-8 border-bottom-0 border-right-0 centerp-row"  ></td>
                <td width="5%" class="r-bold font-size-8 border-bottom-0 border-right-0 centerp-row">Jamu/Obat :</td>
                <td width="5%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">               
                  <label class="container">&nbsp;  
                    <input type="radio" name="jamu" <?= $list['notes']['jamu'] == 'tidak_jamu' ? 'checked="checked"' : ''; ?> >
                    <span class="checkmark"></span>
                  </label><b>&nbsp;  Tidak</b></td>
                  <td width="5%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">               
                    <label class="container">&nbsp;  
                      <input type="radio" name="jamu" <?= $list['notes']['jamu'] == 'ya_jamu' ? 'checked="checked"' : ''; ?> >
                      <span class="checkmark"></span>
                    </label><b>&nbsp;  Ya</b></td>
                    <td width="2%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                     <label class="r-bold container">  
                      <b>: <?= $list['notes']['desc_ya_jamu']; ?></b>
                    </label></td>
                  </tr>

                  <tr>
                    <td width="5%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">Alkohol :</td>
                    <td width="5%" class="font-size-8 border-bottom-1 border-right-0 centerp-row">               
                      <label class="container">&nbsp;  
                       <input type="radio" name="alkohol" <?= $list['notes']['alkohol'] == 'tidak_alkohol' ? 'checked="checked"' : ''; ?> >
                       <span class="checkmark"></span>
                     </label><b>&nbsp;  Tidak</b></td>
                     <td width="5%" class="font-size-8 border-bottom-1 border-right-0 centerp-row">               
                      <label class="container">&nbsp;  
                       <input type="radio" name="alkohol" <?= $list['notes']['alkohol'] == 'ya_alkohol' ? 'checked="checked"' : ''; ?> >
                       <span class="checkmark"></span>
                     </label><b>&nbsp;  Ya</b></td>
                     <td width="2%" class="font-size-8 border-bottom-1 border-right-0 centerp-row">
                       <label class="r-bold container">Frekuensi : <?= $list['notes']['frekuensi']; ?></b>
                       </label></td>
                       <td width="5%" class="font-size-8 border-bottom-1 border-right-0 centerp-row"  ></td>
                       <td width="5%" class="r-bold font-size-8 border-bottom-1 border-right-0 centerp-row">Herbal :</td>
                       <td width="5%" class="font-size-8 border-bottom-1 border-right-0 centerp-row">               
                        <label class="container">&nbsp;  
                          <input type="radio" name="herbal" <?= $list['notes']['herbal'] == 'tidak_herbal' ? 'checked="checked"' : ''; ?> >
                          <span class="checkmark"></span>
                        </label><b>&nbsp;  Tidak</b></td>
                        <td width="5%" class="font-size-8 border-bottom-1 border-right-0 centerp-row">               
                          <label class="container">&nbsp;  
                            <input type="radio" name="herbal" <?= $list['notes']['herbal'] == 'ya_herbal' ? 'checked="checked"' : ''; ?> >
                            <span class="checkmark"></span>
                          </label><b>&nbsp;  Ya</b></td>
                          <td width="2%" class="font-size-8 border-bottom-1 border-right-1 centerp-row">
                           <label class="r-bold container">  
                            <b>: <?= $list['notes']['desc_ya_herbal']; ?></b>
                          </label></td>
                        </tr>
                        <tr>
                          <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head" colspan="9"><b>OBJEKTIF</b>
                          </td>
                        </tr>
                      </table>

                      <table width="100%" cellspacing="0">
                        <tr>
                          <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">KEADAAN UMUM : </td>
                          <td width="5%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                            <label class="container">&nbsp;  
                              <input type="radio" name="keadan_umum" <?= $list['notes']['keadan_umum'] == 'baik' ? 'checked="checked"' : ''; ?> >
                              <span class="checkmark"></span>
                            </label><b>&nbsp;  Baik / </b>
                            <label class="container">&nbsp;  
                              <input type="radio" name="keadan_umum" <?= $list['notes']['keadan_umum'] == 'tidak_baik' ? 'checked="checked"' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>. 
                            <label class="r-bold container">  
                              <b> <?= $list['notes']['desc_tidak_baik']; ?></b>
                            </label></td>
                            <td width="5%" class="r-bold font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">Evaluasi Jalan Napas
                            </td>
                            <td width="5%" class="r-bold font-size-8 border-bottom-0 border-right-1 centerp-row"></td>
                            <td width="5%" class="font-size-8 border-bottom-0 border-right-0 centerp-row"></td>
                            <td width="5%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"></td>
                          </tr>
                          <tr>
                            <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">GCS : <?= $list['notes']['desc_gcs']; ?></td>
                            <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                              <label class="container">&nbsp;  
                                <input type="radio" name="pilih_gcs" <?= $list['notes']['pilih_gcs'] == 'E' ? 'checked="checked"' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>&nbsp; E
                              <label class="container">&nbsp;  
                                <input type="radio" name="pilih_gcs" <?= $list['notes']['pilih_gcs'] == 'M' ? 'checked="checked"' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>&nbsp;  M
                              <label class="container">&nbsp;  
                                <input type="radio" name="pilih_gcs" <?= $list['notes']['pilih_gcs'] == 'V' ? 'checked="checked"' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>&nbsp;  V</td>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">
                                <label class="container">&nbsp;  
                                  <input type="radio" name="edema" <?= $list['notes']['edema'] == 'edema' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label>&nbsp;  Edema</td>
                                <td width="8%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                  <label class="container">&nbsp;  
                                    <input type="radio" name="malformasi_mandibula" <?= $list['notes']['malformasi_mandibula'] == 'malformasi_mandibula' ? 'checked="checked"' : ''; ?> >
                                    <span class="checkmark"></span>
                                  </label>&nbsp;  Malformasi mandibula
                                </td>
                                <td width="5%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">Buka Mulut 3 cm :</td>
                                <td width="8%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"> <label class="container">. 
                                  <input type="radio" name="keadan_umum" <?= $list['notes']['keadan_umum'] == 'baik' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  Ya </b>
                                <label class="container">&nbsp;  
                                  <input type="radio" name="keadan_umum" <?= $list['notes']['keadan_umum'] == 'baik' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  Tidak </b>
                              </td>
                            </tr>
                            <tr>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">GDS :</td>
                              <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row"><?= $list['notes']['gds']; ?></td>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">
                                <label class="container">&nbsp;  
                                  <input type="radio" name="gigi_ompong" <?= $list['notes']['gigi_ompong'] == 'gigi_ompong' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label>&nbsp;  Gigi Ompong</td>
                                <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                  <label class="container">&nbsp;  
                                    <input type="radio" name="suara_serak" <?= $list['notes']['suara_serak'] == 'suara_serak' ? 'checked="checked"' : ''; ?> >
                                    <span class="checkmark"></span>
                                  </label>&nbsp;  Suara Serak
                                </td>
                                <td width="2%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">Thyromental Distance > 6.5 cm</td>
                                <td width="5%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"> <label class="container">. 
                                  <input type="radio" name="thyromental" <?= $list['notes']['thyromental'] == 'Ya' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  Ya </b>
                                <label class="container">&nbsp;  
                                  <input type="radio" name="thyromental" <?= $list['notes']['thyromental'] == 'Tidak' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  Tidak </b>
                              </td>
                            </tr>
                            <tr>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">Tanda Vital :</td>
                              <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row"></td>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">
                                <label class="container">&nbsp;  
                                  <input type="radio" name="gigi_palsu" <?= $list['notes']['gigi_palsu'] == 'gigi_palsu' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label>&nbsp;  Gigi Palsu</td>
                                <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                  <label class="container">&nbsp;  
                                    <input type="radio" name="deviasi_trakea" <?= $list['notes']['deviasi_trakea'] == 'deviasi_trakea' ? 'checked="checked"' : ''; ?> >
                                    <span class="checkmark"></span>
                                  </label>&nbsp;  Deviasi Trakea
                                </td>
                                <td width="7%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">Mallampati Score :</td>
                                <td width="8%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"> <label class="container">. 
                                  <input type="radio" name="mallampati" <?= $list['notes']['mallampati'] == 'I' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  I </b>
                                <label class="container">&nbsp;  
                                  <input type="radio" name="mallampati" <?= $list['notes']['mallampati'] == 'II' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  II </b>
                                <label class="container">&nbsp;  
                                  <input type="radio" name="mallampati" <?= $list['notes']['mallampati'] == 'III' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  III </b>
                                <label class="container">&nbsp;  
                                  <input type="radio" name="mallampati" <?= $list['notes']['mallampati'] == 'IV' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  IV </b>
                              </td>
                            </tr>
                            <tr>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">TD : <?= $list['notes']['td']; ?> mmHG</td>
                              <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">VAS : <?= $list['notes']['vas']; ?></td>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">
                                <label class="container">&nbsp;  
                                  <input type="radio" name="gigi_tonggos" <?= $list['notes']['gigi_tonggos'] == 'gigi_tonggos' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label>&nbsp;  Gigi Tonggos</td>
                                <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                  <label class="container">&nbsp;  
                                    <input type="radio" name="makroglossi" <?= $list['notes']['makroglossi'] == 'makroglossi' ? 'checked="checked"' : ''; ?> >
                                    <span class="checkmark"></span>
                                  </label>&nbsp;  Makroglossi
                                </td>
                                <td width="7%" class="font-size-8 border-bottom-0 border-right-0 centerp-row">Upper up Bite Test Class :</td>
                                <td width="8%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"> <label class="container">&nbsp;  
                                  <input type="radio" name="upper_up_bite_test_class" <?= $list['notes']['upper_up_bite_test_class'] == '1' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  1 </b>
                                <label class="container">&nbsp;  
                                  <input type="radio" name="upper_up_bite_test_class" <?= $list['notes']['upper_up_bite_test_class'] == '2' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  2 </b>
                                <label class="container">&nbsp;  
                                  <input type="radio" name="upper_up_bite_test_class" <?= $list['notes']['upper_up_bite_test_class'] == '3' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label><b>&nbsp;  3 </b>
                              </td>
                            </tr>
                            <tr>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">HR : <?= $list['notes']['hr']; ?> mmHG</td>
                              <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">TB : <?= $list['notes']['tb']; ?> Cm</td>
                              <td width="5%" class="font-size-8 border-bottom-0 border-left-0 border-right-0 centerp-left">
                                <label class="container">&nbsp;  
                                  <input type="radio" name="mikrotia" <?= $list['notes']['mikrotia'] == 'mikrotia' ? 'checked="checked"' : ''; ?> >
                                  <span class="checkmark"></span>
                                </label>&nbsp;  Mikrotia</td>
                                <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                  <label class="container">&nbsp;  
                                    <input type="radio" name="dalam_batas_normal" <?= $list['notes']['dalam_batas_normal'] == 'dalam_batas_normal' ? 'checked="checked"' : ''; ?> >
                                    <span class="checkmark"></span>
                                  </label>&nbsp;  Dalam Batas Normal
                                </td>
                                <td width="7%" class="font-size-8 border-bottom-0 border-right-0 centerp-row"></td>
                                <td width="8%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left"></td>
                              </tr>
                              <tr>
                                <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">RR : <?= $list['notes']['rr']; ?> mmHG</td>
                                <td width="10%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">BB : <?= $list['notes']['bb']; ?> Kg</td>
                                <td width="5%" class="font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left">
                                  <label class="container">&nbsp;  
                                    <input type="radio" name="janggut_kumis" <?= $list['notes']['janggut_kumis'] == 'janggut_kumis' ? 'checked="checked"' : ''; ?> >
                                    <span class="checkmark"></span>
                                  </label>&nbsp;  Janggut/Kumis</td>
                                  <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-row">
                                    <label class="container">&nbsp;  
                                      <input type="radio" name="desc_evaluasi_jalan_nafas_lain" <?= $list['notes']['desc_evaluasi_jalan_nafas_lain'] == 'desc_evaluasi_jalan_nafas_lain' ? 'checked="checked"' : ''; ?> >
                                      <span class="checkmark"></span>
                                      </label>: <?= $list['notes']['desc_evaluasi_jalan_nafas_lain']; ?>
                                    </td>
                                    <td width="7%" class="font-size-8 border-bottom-1 border-right-0 centerp-row"></td>
                                    <td width="8%" class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"></td>
                                  </tr>
                                  <tr>
                                    <td width="5%" class="font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">Suhu : <?= $list['notes']['suhu']; ?> °C</td>
                                    <td width="10%" class="font-size-8 border-bottom-1 border-right-1 centerp-row"></td>
                                    <td width="5%" class="font-size-8 border-bottom-1 border-left-0 border-right-0 centerp-left">Status Gizi :</td>
                                    <td width="10%" class="font-size-8 border-bottom-1 border-right-0 centerp-row"><?= $list['notes']['status_gizi']; ?></td>
                                    <td width="7%" class="font-size-8 border-bottom-1 border-right-0 centerp-row"></td>
                                    <td width="8%" class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left"></td>
                                  </tr>
                                </table>


                                <table width="100%" cellspacing="0">
                                  <tr>
                                    <td width="30%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head"><b>KEPALA/LEHER</b>
                                    </td>
                                    <td width="35%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head"><b>THORAKS</b>
                                    </td>
                                    <td width="35%" colspan="2" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head"><b>ABDOMEN</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">Konjungtiva : 
                                      <label class="container">&nbsp;  
                                        <input type="radio" name="konjungtiva" <?= $list['notes']['konjungtiva'] == 'DBN' ? 'checked="checked"' : ''; ?> >
                                        <span class="checkmark"></span>
                                      </label>&nbsp;  DBN / 
                                      <label class="container">&nbsp;  
                                        <input type="radio" name="konjungtiva" <?= $list['notes']['konjungtiva'] == 'anemis' ? 'checked="checked"' : ''; ?> >
                                        <span class="checkmark"></span>
                                      </label>&nbsp;  anemis
                                    </td>
                                    <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                      <label class="container">&nbsp;  
                                        <input type="radio" name="metris" <?= $list['notes']['metris'] == 'Simetris' ? 'checked="checked"' : ''; ?> >
                                        <span class="checkmark"></span>
                                      </label>&nbsp;  Simetris / 
                                      <label class="container">&nbsp;  
                                        <input type="radio" name="metris" <?= $list['notes']['metris'] == 'Asimetris' ? 'checked="checked"' : ''; ?> >
                                        <span class="checkmark"></span>
                                      </label>&nbsp;  Asimetris,                                       
                                      <label class="container">&nbsp;  
                                        <input type="radio" name="posisi" <?= $list['notes']['posisi'] == 'Kiri' ? 'checked="checked"' : ''; ?> >
                                        <span class="checkmark"></span>
                                      </label>&nbsp;  Kiri 
                                      <label class="container">&nbsp;  
                                        <input type="radio" name="posisi" <?= $list['notes']['posisi'] == 'Kanan' ? 'checked="checked"' : ''; ?> >
                                        <span class="checkmark"></span>
                                      </label>&nbsp;  Kanan 
                                    </td>
                                    <td width="10%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                      <label class="container">&nbsp;  
                                        <input type="radio" name="datar" <?= $list['notes']['datar'] == 'datar' ? 'checked="checked"' : ''; ?> >
                                        <span class="checkmark"></span>
                                      </label>&nbsp;  Datar</td>
                                      <td width="5%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                        <label class="container">&nbsp;  
                                          <input type="radio" name="cembung" <?= $list['notes']['cembung'] == 'cembung' ? 'checked="checked"' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>&nbsp;  Cembung
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">Sklera : 
                                        <label class="container">&nbsp;  
                                          <input type="radio" name="sklera" <?= $list['notes']['sklera'] == 'DBN' ? 'checked="checked"' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>&nbsp;  DBN / 
                                        <label class="container">&nbsp;  
                                          <input type="radio" name="sklera" <?= $list['notes']['sklera'] == 'ikterus' ? 'checked="checked"' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>&nbsp;  ikterus</td>
                                        <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                          BN : <?= $list['notes']['bn']; ?>
                                        </td>
                                        <td class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                          <label class="container">&nbsp;  
                                            <input type="radio" name="supple" <?= $list['notes']['supple'] == 'supple' ? 'checked="checked"' : ''; ?> >
                                            <span class="checkmark"></span>
                                          </label>&nbsp;  Supple</td>
                                          <td class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                            <label class="container">&nbsp;  
                                              <input type="radio" name="defans_muskuler" <?= $list['notes']['defans_muskuler'] == 'defans_muskuler' ? 'checked="checked"' : ''; ?> >
                                              <span class="checkmark"></span>
                                            </label>&nbsp;  Defans muskular
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">Bibir : 
                                            <label class="container">&nbsp;  
                                              <input type="radio" name="bibir" <?= $list['notes']['bibir'] == 'DBN' ? 'checked="checked"' : ''; ?> >
                                              <span class="checkmark"></span>
                                            </label>&nbsp;  DBN / 
                                            <label class="container">&nbsp;  
                                              <input type="radio" name="bibir" <?= $list['notes']['bibir'] == 'Sianosis' ? 'checked="checked"' : ''; ?> >
                                              <span class="checkmark"></span>
                                            </label>&nbsp;  anemis
                                          </td>
                                          <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left"> ronkhl : <?= $list['notes']['ronkhl']; ?> | wheezing : <?= $list['notes']['wheezing']; ?> | :   <?= $list['notes']['lain_thoraks']; ?></td>
                                          <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                            <label class="container">&nbsp;  
                                              <input type="radio" name="distensi" <?= $list['notes']['distensi'] == 'distensi' ? 'checked="checked"' : ''; ?> >
                                              <span class="checkmark"></span>
                                            </label>&nbsp;  Distensi</td>
                                            <td width="5%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="ascites" <?= $list['notes']['ascites'] == 'ascites' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Ascites
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                            </td>
                                            <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left"> Bunyi Jantung I-II                                               
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="bunyi_jantung" <?= $list['notes']['bunyi_jantung'] == 'Murni' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Murni , Reguler 
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="reguler" <?= $list['notes']['reguler'] == 'Bising' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Bising
                                            </td>
                                            <td width="5%" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="hepar_or_lien" <?= $list['notes']['hepar_or_lien'] == 'Hepar' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Hiper / 
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="hepar_or_lien" <?= $list['notes']['hepar_or_lien'] == 'Lien' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Lien , 
                                            </td>
                                            <td width="5%" class="font-size-8 border-bottom-0 border-right-1 centerp-row">
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="teraba_or_tidak" <?= $list['notes']['teraba_or_tidak'] == 'Teraba' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Teraba :
                                              <?= $list['notes']['desc_teraba']; ?>
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="teraba_or_tidak" <?= $list['notes']['teraba_or_tidak'] == 'Tidak Teraba' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Tidak Teraba
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">
                                              Massa tumor : <?= $list['notes']['massa_tumor_kepala']; ?>  
                                            </td>
                                            <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left"> 
                                              Massa tumor : <?= $list['notes']['massa_tumor_thoraks']; ?>
                                            </td>
                                            <td class="font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">Massa tumor :
                                            </td>
                                            <td width="5%" class="font-size-8 border-bottom-1 border-right-1 centerp-row"><?= $list['notes']['massa_tumor_abdomen']; ?></td>
                                          </tr>
                                        </table>
                                        <table width="100%" cellspacing="0">
                                          <tr>
                                            <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head">UROGENITAL    
                                            </td>
                                            <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head">EKSTREMITAS    
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="urogenital" <?= $list['notes']['urogenital'] == 'DBN' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  DBN
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="urogenital" <?= $list['notes']['urogenital'] == 'Urogenital Lainnya' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                                </label>. Lainnya : <?= $list['notes']['des_urogenital_lainnya']; ?>  
                                              </td>
                                              <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                <label class="container">&nbsp;  
                                                  <input type="radio" name="dbn_ekstremitras" <?= $list['notes']['dbn_ekstremitras'] == 'dbn_ekstremitras' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                </label>&nbsp;  DBN
                                              </td>
                                            </tr>
                                            <tr>
                                              <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">Kateter Urin :
                                                <label class="container">
                                                  <input type="radio" name="keteter_urin" <?= $list['notes']['keteter_urin'] == 'Terpasang' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                </label>&nbsp;  Terpasang
                                                <label class="container">&nbsp;  
                                                  <input type="radio" name="keteter_urin" <?= $list['notes']['keteter_urin'] == 'Tidak Terpasang' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                </label>&nbsp;  Tidak Terpasang  
                                              </td>
                                              <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left"><label class="container">. 
                                                <input type="radio" name="edema_ekstremitas" <?= $list['notes']['edema_ekstremitas'] == 'edema_ekstremitas' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                                </label>&nbsp;  Edema : <?= $list['notes']['desc_edema']; ?>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">Warna Urin :<label class="container">
                                                <input type="radio" name="warna_urin" <?= $list['notes']['warna_urin'] == 'Kuning Terang' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Kuning Terang /
                                              <label class="container">
                                                <input type="radio" name="warna_urin" <?= $list['notes']['warna_urin'] == 'Kuning Pekat' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  Kuning Pekat /
                                              <label class="container">&nbsp;  
                                                <input type="radio" name="warna_urin_lainnya" <?= $list['notes']['warna_urin_lainnya'] == 'warna_urin_lainnya' ? 'checked="checked"' : ''; ?> >
                                                <span class="checkmark"></span>
                                              </label>&nbsp;  <?= $list['notes']['warna_urin_lainnya']; ?></td>
                                              <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                <label class="container">&nbsp;  
                                                  <input type="radio" name="fraktur" <?= $list['notes']['fraktur'] == 'fraktur' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                  </label>&nbsp;  Fraktur : <?= $list['notes']['desc_fraktur']; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td width="50%" class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">Volume Urin :<label class="container">
                                                  <input type="radio" name="volume_urine" <?= $list['notes']['volume_urine'] == 'Kesan Lebih' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                </label>&nbsp;  Kesan Lebih /
                                                <label class="container">
                                                  <input type="radio" name="volume_urine" <?= $list['notes']['volume_urine'] == 'Cukup' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                </label>&nbsp;  Cukup /
                                                <label class="container">
                                                  <input type="radio" name="volume_urine" <?= $list['notes']['volume_urine'] == 'Kurang' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                </label>&nbsp;  Kurang /
                                                <label class="container">&nbsp;  
                                                  <input type="radio" name="volume_urine_lain" <?= $list['notes']['volume_urine_lain'] == 'volume_urine_lain' ? 'checked="checked"' : ''; ?> >
                                                  <span class="checkmark"></span>
                                                </label>&nbsp;  <?= $list['notes']['volume_urine_lain']; ?></td>
                                                <td width="50%" class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">
                                                  <label class="container">&nbsp;  
                                                    <input type="radio" name="lainnya_ekstremitras" <?= $list['notes']['lainnya_ekstremitras'] == 'lainnya_ekstremitras' ? 'checked="checked"' : ''; ?> >
                                                    <span class="checkmark"></span>
                                                  </label>&nbsp;  Lainnya : <?= $list['notes']['desc_lainnya_ekstremitras']; ?></td>
                                                </tr>
                                              </table>

                                              <table height="100%" width="100%" cellspacing="0">
                                                <tr>
                                                  <td width="50%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head">
                                                    PEMERIKSAAN LABORATORIUM
                                                  </td>
                                                  <td width="50%" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head">
                                                    PEMERIKSAAN PENUNJANG LAIN
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td height="30%" rowspan="2" width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-head">
                                                    <?= $list['notes']['pemeriksaan_laboratorium']; ?>
                                                  </td>
                                                  <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    EKG : <?= $list['notes']['ekg']; ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td width="50%" class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    Ro : <?= $list['notes']['ro']; ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td height="30%" width="50%" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-right">(Tulis yang kelainan)
                                                  </td>
                                                  <td width="50%" class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">
                                                    Lainnya : <?= $list['notes']['pemeriksaan_penunjang_lainnya']; ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head" colspan="9"><b>ASESMEN</b>
                                                  </td>
                                                </tr>
                                              </table>
                                              <table width="100%" cellspacing="0">
                                                <tr>
                                                  <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    ASA SP : <label class="container">. 
                                                      <input type="radio" name="asa_ps" <?= $list['notes']['asa_ps'] == '1' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  1
                                                    <label class="container">&nbsp;  
                                                      <input type="radio" name="asa_ps" <?= $list['notes']['asa_ps'] == '2' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  2
                                                    <label class="container">. 
                                                      <input type="radio" name="asa_ps" <?= $list['notes']['asa_ps'] == '3' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  3
                                                    <label class="container">.&nbsp;  
                                                      <input type="radio" name="asa_ps" <?= $list['notes']['asa_ps'] == '4' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  4
                                                    <label class="container">.&nbsp;  
                                                      <input type="radio" name="asa_ps" <?= $list['notes']['asa_ps'] == '5' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  5
                                                    <label class="container">.&nbsp;  
                                                      <input type="radio" name="asa_ps" <?= $list['notes']['asa_ps'] == '6' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  6
                                                    <label class="container">.&nbsp;  
                                                      <input type="radio" name="asa_ps" <?= $list['notes']['asa_ps'] == 'E' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  E
                                                  </td>
                                                  <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    <label class="container">.&nbsp;  
                                                      <input type="radio" name="penatalaksan_anestesi" <?= $list['notes']['penatalaksan_anestesi'] == 'Setuju penatalaksan anestesi' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  Setuju Penatalaksaan anestesi 
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    Masalah/Diagnosa : <?= $list['notes']['masalah_diagnosis']; ?>
                                                  </td>
                                                  <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    Intruksi : <?= $list['notes']['intruksi']; ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                  </td>
                                                  <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    Puasa : <?= $list['notes']['puasa']; ?> , jam per op (mulai jam <?= $list['notes']['pre_op']; ?> WIB)
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">
                                                    <label class="container">&nbsp;  
                                                      <input type="radio" name="penatalaksan_anestesi" <?= $list['notes']['penatalaksan_anestesi'] == 'Tidak Setuju penatalaksan anestesi' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  Tidak Setuju Penatalaksaan anestesi 
                                                  </td>
                                                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">
                                                    Rencana Tiba di OK , jam : <?= $list['notes']['jam_rencana_tiba_di_ok']; ?> , tanggal <?= $list['notes']['tanggal_rencana_tiba_di_ok']; ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    Rencana / Usulan tindakan :
                                                  </td>
                                                  <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    Rencana Operasi , jam : <?= $list['notes']['jam_rencana_operasi']; ?> , tanggal <?= $list['notes']['tanggal_rencana_operasi']; ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="2" class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head">
                                                    <?= $list['notes']['rencana_usulan_tindakan']; ?>
                                                  </td>
                                                  <td class="font-size-8 border-bottom-0 border-left-1 border-right-1 centerp-left">
                                                    Injeksi antibiotik profilaksis : <?= $list['notes']['injeksi_antibiotik']; ?> 1 jam pre op 
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td class="font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-left">
                                                    Persiapan darah : <?= $list['notes']['persiapan_darah']; ?>
                                                  </td>
                                                </tr>
                                              </table>

                                              <table width="100%" cellspacing="0">
                                                <tr>
                                                  <td class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-1 centerp-head" colspan="9"><b>PERENCANAAN ANESTESI DAN SEDASI</b>
                                                  </td>
                                                </tr>
                                              </table>

                                              <table width="100%" cellspacing="0">
                                                <tr>
                                                  <td width="50" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                                    Teknik Anestesi dan sedasi :
                                                  </td>
                                                  <td width="50%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left">
                                                    <label class="container">&nbsp;  
                                                      <input type="radio" name="penatalaksan_anestesi" <?= $list['notes']['penatalaksan_anestesi'] == 'Tidak Setuju penatalaksan anestesi' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                      </label>&nbsp;  Sedasi , <?= $list['notes']['persiapan_darah']; ?>
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="penatalaksan_anestesi" <?= $list['notes']['penatalaksan_anestesi'] == 'Tidak Setuju penatalaksan anestesi' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  PNB
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td width="50" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="anestesi_umum" <?= $list['notes']['anestesi_umum'] == 'Anestesi_umum' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  Anestesi Umum :
                                                    </td>
                                                    <td width="50%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left">
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="ga_tiva" <?= $list['notes']['ga_tiva'] == 'GA TIVA' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  GA TIVA 
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="ga_facemask" <?= $list['notes']['ga_facemask'] == 'GA FACEMASK' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  GA FACEMASK
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="ga_lima" <?= $list['notes']['ga_lima'] == 'GA LIMa' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  GA-LMA
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="geta" <?= $list['notes']['geta'] == 'GETA' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  GETA
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="gani" <?= $list['notes']['gani'] == 'GANI' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  GANI
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td width="50" class="font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="anestesi_regional" <?= $list['notes']['anestesi_regional'] == 'Anestesi Regional' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  Anestesi Regional :
                                                    </td>
                                                    <td width="50%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left">
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="sab" <?= $list['notes']['sab'] == 'SAB' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  SAB 
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="epidural" <?= $list['notes']['epidural'] == 'Epidural' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  Epidural
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="cse" <?= $list['notes']['cse'] == 'CSE' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  CSE
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="cega" <?= $list['notes']['cega'] == 'CEGA' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  CEGA
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td width="50" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                                     Teknik Khusus :
                                                   </td>
                                                   <td width="50%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left">
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="hipotensi_kendali" <?= $list['notes']['hipotensi_kendali'] == 'Hipotensi Kendali' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  Hipotensi Kendali 
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="lainnya_teknik_khusus" <?= $list['notes']['lainnya_teknik_khusus'] == 'Lainnya Teknik Khusus' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  Lainnya
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td width="50" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                                    Monitoring :
                                                  </td>
                                                  <td width="50%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left">
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="ekg_monitoring" <?= $list['notes']['ekg_monitoring'] == 'ekg_monitoring' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  EKG <?= $list['notes']['desc_ekg']; ?> lead
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="nibp" <?= $list['notes']['nibp'] == 'NIBP' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  NIBP
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="spo" <?= $list['notes']['spo'] == 'Spo2' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>.Spo<sup>2</sup>
                                                    </label> 
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="temp_et_co" <?= $list['notes']['temp_et_co'] == 'Temp et Co2' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>&nbsp;  Temp et Co<sup>2</sup>
                                                    </label>
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="cvp" <?= $list['notes']['cvp'] == 'CVP' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  CVP
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="art_line" <?= $list['notes']['art_line'] == 'Art Line' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  Art Line
                                                    <label class="container">&nbsp;&nbsp;  
                                                      <input type="radio" name="lainnya_monitoring" <?= $list['notes']['lainnya_monitoring'] == 'Art Line' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  Lainnya
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td width="50" class="r-bold font-size-8 border-bottom-0 border-left-1 border-right-0 centerp-left">
                                                    Kontrol Nyeri Post Op :
                                                  </td>
                                                  <td width="50%" class="font-size-8 border-bottom-0 border-left-0 border-right-1 centerp-left">
                                                    <label class="container">. 
                                                      <input type="radio" name="iv" <?= $list['notes']['iv'] == 'IV' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  IV
                                                    <label class="container">&nbsp;  
                                                      <input type="radio" name="epirdural_kontrol" <?= $list['notes']['epirdural_kontrol'] == 'Epidural' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                    </label>&nbsp;  Epidural
                                                    <label class="container">&nbsp;  
                                                      <input type="radio" name="lainnya_kontrol_nyeri" <?= $list['notes']['lainnya_kontrol_nyeri'] == 'Lainnya Kontrol Nyeri' ? 'checked="checked"' : ''; ?> >
                                                      <span class="checkmark"></span>
                                                      </label>&nbsp;  Lainnya <?= $list['notes']['des_lainnya_kontrol_nyeri']; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td width="50" class="r-bold font-size-8 border-bottom-1 border-left-1 border-right-0 centerp-left">
                                                      Perawatan Pasca Anestesi :
                                                    </td>
                                                    <td width="50%" class="font-size-8 border-bottom-1 border-left-0 border-right-1 centerp-left">
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="rawat_jalan" <?= $list['notes']['rawat_jalan'] == 'Rawat Jalan' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  Rawat Jalan
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="rawat_inap" <?= $list['notes']['rawat_inap'] == 'Rawat Inap' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  Rawat Inap
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="hcu" <?= $list['notes']['hcu'] == 'HCU' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  HCU
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="icu" <?= $list['notes']['icu'] == 'ICU' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  ICU
                                                      <label class="container">&nbsp;  
                                                        <input type="radio" name="nicu" <?= $list['notes']['nicu'] == 'NICU' ? 'checked="checked"' : ''; ?> >
                                                        <span class="checkmark"></span>
                                                      </label>&nbsp;  NICU
                                                    </td>
                                                  </tr>
                                                </table>

                                                <div class="row-panel mt-20">
                                                  <div class="column-left-header">
                                                    <table border="0" width="100%" style="margin-left:150px">
                                                      <tr>
                                                        <td style="vertical-align:top" class="detail-administration r-bold font-size-7"><!-- Petugas yang Menyetujui, --></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="vertical-align:top" class="font-table font-size-7"><!-- <img width="125px" src="<?php echo $list['notes']['digital_signature_approved_dokter'];?>"> --></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="vertical-align:top" class="font-table font-size-7 pl-3"><!-- <?php echo ucwords(strtolower($list['notes']['approved_dokter'])); ?> --></td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                  <div class="column-right-header">
                                                    <table border="0" width="100%" style="text-align: right; margin-right: 50px;">
                                                      <tr>
                                                        <td style="vertical-align:top" class="r-bold font-size-7">Dokter yang Menyetujui,</td>
                                                      </tr>
                                                      <tr>
                                                        <td height="77px" style="vertical-align:top" class="font-table font-size-7 pl-5"><img width="125px" src="<?php echo $list['notes']['digital_signature_approved_dokter'];?>"></td>
                                                      </tr>
                                                      <tr>
                                                        <td style="vertical-align:top" class="font-table font-size-7 pl-3"><?php echo ucwords(strtolower($list['notes']['approved_dokter'])); ?>
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