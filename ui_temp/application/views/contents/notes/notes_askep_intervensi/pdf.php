<html>

<head>
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    .row {
      margin-bottom: 15px;
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
      border: 1px solid #000;
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

    .row-panel {
      margin-bottom: 10px;
      -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
      box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
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
      border: 1px solid black;
      border-left: 1px solid black;
      border-right: 1px solid black;
    }

    .border-1 {
      border: 1px solid black
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
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?= $list['notes']['no_reg']; ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?= ucwords(strtolower($list['notes']['penjamin'])); ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?= $list['notes']['pasien']['no_rm']; ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?= $list['notes']['pasien']['no_bpjs']; ?></td>
            <td colspan="2" class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?= $list['notes']['pasien']['no_ktp']; ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?= $list['notes']['pasien']['kelamin'] == '1' ? 'Laki-Laki' : 'Perempuan'; ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-left-1 border-right-1"><?= $list['notes']['pasien']['golongan_darah']; ?></td>
          </tr>
          <tr>
            <td class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Nama Pasien</td>
            <td class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Tanggal Lahir / Umur</td>
            <td colspan="3" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Alamat</td>
            <td colspan="2" class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">DPJP</td>
            <td class="detail-administration r-bold font-size-8 pl-5 pt-2 pr-2 border-left-1 border-right-1 border-top-1">Kelas</td>
          </tr>
          <tr>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?= ucwords(strtolower($list['notes']['pasien']['nama_pasien'])); ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?= date("d-m-Y", strtotime($list['notes']['pasien']['tanggal_lahir'])) . ' / ' . $list['notes']['pasien']['umur_registrasi']; ?></td>
            <td colspan="3" class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?= ucwords(strtolower($list['notes']['pasien']['alamat1'])); ?></td>
            <td colspan="2" class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"><?= ucwords(strtolower($list['notes']['pasien']['nama_dokter'])); ?></td>
            <td class="font-table font-size-8 pl-5 pb-2 pr-2 border-no-top"></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="row-panel">
      <div class="row-heading border-blue bg-blue font-white font-size-9 r-bold">Data Pemeriksaan</div>
      <div class="row-body">

        <div class="font-table font-size-8 pl-5 pb-2 pr-2 ">

          <div class="row mt-5">
            <div class="col-md-6">
              <table autosize="1.6" class="table nowrap">
                <tbody>
                  <tr>
                    <td style="width: 13%; border: inset ">Dokter Approve</td>
                    <td style="border: inset"><?= ucwords(strtolower($list['notes']['data']['approved_dokter'])); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Petugas Approve</td>
                    <td style="border: inset"><?= ucwords(strtolower($list['notes']['data']['approved_petugas'])); ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Data1</td>
                    <td style="border: inset"><?= $list['notes']['data']['data1']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Data1</td>
                    <td style="border: inset"><?= $list['notes']['data']['data2']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Tinggi Badan</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['height']; ?> cm</td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Berat Badan</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['weight']; ?> kg</td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Systolic</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['systolic']; ?> mmHg</td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Diastolic</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['diastolic']; ?> mmHg</td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Tekanan Darah</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['blood_pressure']; ?> mmHg</td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Pulse</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['pulse']; ?> x/menit</td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Pernafasan</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['respiratory_rate']; ?> x/menit</td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">SPO2</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['spo2']; ?> %</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6">
              <table autosize="1.6" class="table nowrap">
              <tr>
                    <td style="width: 13%; border: inset ">Kesadaran</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['kesadaran']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Systolic</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['keadaan_umum']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Nyeri</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['nyeri']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Eye Opening</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['eye_opening']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Verbal Response</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['verbal_response']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Motor Response</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['motor_response']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Akral</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['akral']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Reflek Cahaya</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['reflek_cahaya']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Pupil Isokor</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['pupil_isokor']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 13%; border: inset ">Pupil UnIsokor</td>
                    <td style="border: inset"><?= $list['notes']['data']['notes_vitals'][0]['pupil_unisokor']; ?></td>
                  </tr>
              </table>
            </div>

          </div>


        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- <div class="row-panel mt-20">
    <div class="column-left-header">
      <table border="0" width="100%" style="margin-left:150px">
        <tr>
          <td style="vertical-align:top" class="detail-administration r-bold font-size-7">Dokter yang Menyetujui,</td>
        </tr>
        <tr>
          <td height="77px" style="vertical-align:top" class="font-table font-size-7 pl-5"><img width="125px" src="<?php echo $list['notes']['digital_signature_approved_dokter']; ?>"></td>
        </tr>
        <tr>
          <td style="vertical-align:top" class="font-table font-size-7 pl-3"><?php echo ucwords(strtolower($list['notes']['approved_dokter'])); ?>
            <br>digital signature added: <?php echo date("d-m-Y H:i", strtotime($list['notes']['created_date'])); ?></td>
        </tr>
      </table>
    </div>
    <div class="column-right-header">
      <table border="0" width="100%" style="margin-left:50px">
        <tr>
          <td style="vertical-align:top" class="detail-administration r-bold font-size-7">Petugas yang Menyetujui,</td>
        </tr>
        <tr>
          <td style="vertical-align:top" class="font-table font-size-7"><img width="125px" src="<?php echo $list['notes']['digital_signature_approved_petugas']; ?>"></td>
        </tr>
        <tr>
          <td style="vertical-align:top" class="font-table font-size-7 pl-3"><?php echo ucwords(strtolower($list['notes']['approved_petugas'])); ?></td>
        </tr>
      </table>
    </div>
  </div> -->
</body>

</html>
