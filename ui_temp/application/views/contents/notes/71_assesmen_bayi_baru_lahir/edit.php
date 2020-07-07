<style>
  .btn-default.active.focus,
  .btn-default.active:focus,
  .btn-default.active:hover,
  .btn-default:active.focus,
  .btn-default:active:focus,
  .btn-default:active:hover,
  .open>.dropdown-toggle.btn-default.focus,
  .open>.dropdown-toggle.btn-default:focus,
  .open>.dropdown-toggle.btn-default:hover {
    color: white;
    background: #337ab7;
    border-color: #337ab7;
  }

  .btn-default.active,
  .btn-default:active,
  .open>.dropdown-toggle.btn-default {
    color: white;
    background: #337ab7;
    border-color: #337ab7;
  }
  #signature{
    width: 400px; height: 400px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/Human.png");
  }
  #coretan{
    width: 400px; height: 400px;
    border: 0px solid black;
    background-image: url("<?php echo base_url();?>assets/image/Human.png");
  }
      .radio-select{
    padding: 3px 0px 10px 25px;
  }

  [data-toggle="buttons"]>.btn>input[type="radio"],
  [data-toggle="buttons"]>.btn>input[type="checkbox"] {
    clip: rect(1px 1px 1px 1px);
  }
</style>
<div class="row">
  <div class="col-md-12">

<!-- start input panel col 6 sendiri -->

    <form id="form-edit-1">
      <input type="hidden" class="form-control input-sm" name="id_notes" id="id_notes" value="<?= $result['id_notes']; ?>" >
      <input type="hidden" class="form-control input-sm" name="id_reg" id="id_reg" value="<?= $result['id_reg']; ?>" >
      <input type="hidden" class="form-control input-sm" name="id_visit" id="id_visit" value="<?= $result['id_visit']; ?>" >

      <div class="panel panel-primary">
        <div class="panel-heading">
          <?php foreach ($data_visit as $v) : ?>
            <?php if ($v['id_visit'] == $result['id_visit']) { ?>
              <?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
            <?php } ?>
          <?php endforeach; ?>
        </div>
        <div class="panel-body">
          <div class="row">

            <div class="col-lg-6">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Petugas Approve</b>
                </div>
                <div class="col-md-8">
                  <select name="petugas_approved" class="petugas_approved" style="width: 100%" required>
                    <option value=""></option>
                    <?php foreach ($data_perawat as $k => $v) : ?>
                      <option value="<?= $v['id'] ?>" <?= $v['nama'] == $result['approved_petugas'] ? 'selected' : ''; ?>><?= $v['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6"> 
              <div class="col-md-6"> 
                <div class="row">
                  <!-- nama -->
                  <div class="col-md-3">
                    <b>Tanggal</b>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                  </div>
                </div>
                <br>
              </div>
              <div class="col-md-6">  
                <div class="row">
                  <!-- nama -->
                  <div class="col-md-2">
                    <b>Jam</b>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="jam" id="jam" class="form-control" value="<?= $result['jam']; ?>" required autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Evaluasi Awal MPP</div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>REKAM MEDIK No</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="rekam_medik_no" id="rekam_medik_no" class="form-control" placeholder="" value="<?= $result['rekam_medik_no'] ?>" autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Nama</b>
                    </div>
                    <div class="col-md-4">
                      <input type="text" name="nama" id="nama" class="form-control" value="<?= $result['nama'] ?>" placeholder=""  autocomplete="off">
                    </div>
                    <div style="text-align: right;" class="col-md-3">
                      <b>Pening No</b>
                    </div>
                    <div class="col-md-2">
                      <input type="text" name="pening_no" class="form-control" value="<?= $result['pening_no'] ?>" placeholder="Pendidikan"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <!-- nama -->
                    <table width="100%">
                      <tbody>
                      <tr>
                         <td class="text-left bd " style="vertical-align: top">
                          <div class="col-md-4">
                              <b>Dokter Kebidanan </b>
                               
                            </div> 
                            <label style="font-weight: 100">
                              <input type="text" name="dokter_kebidanan" class="form-control" placeholder="dokter kebidanan" value="<?= $result['dokter_kebidanan'] ?>" required autocomplete="off">
                             </label>           
                          </td>
                          <td class="text-left bd " style="vertical-align: top">
                          <div class="col-md-4">
                              <b>Dokter Anak </b>
                             
                            </div>  
                             <label style="font-weight: 100">
                              <input type="text" name="dokter_anak" class="form-control" placeholder="dokter anak" value="<?= $result['dokter_anak'] ?>" required autocomplete="off">
                             </label>
                          </td>
                         <td rowspan="2" class="text-left bd">
                            <div class="row">
                              <div class="col-xs-10">
                                <div class="row">
                                  <div class="col-xs-12"> 
                                    <b>Penyakit Ibu</b>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Anemia
                                          <input type="radio" name="penyakit_ibu" value="anemia" <?= $result['penyakit_ibu'] == 'anemia' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Hipertensi
                                          <input type="radio" name="penyakit_ibu" value="hipertensi" <?= $result['penyakit_ibu'] == 'L' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Hepatitis B
                                          <input type="radio" name="penyakit_ibu" value="hepatitis b" <?= $result['penyakit_ibu'] == 'hepatitis b' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> TBC
                                          <input type="radio" name="penyakit_ibu" value="tbc" <?= $result['penyakit_ibu'] == 'tbc' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Diabetes
                                          <input type="radio" name="penyakit_ibu" value="diabetes" <?= $result['penyakit_ibu'] == 'diabetes' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Kel Jantung
                                          <input type="radio" name="penyakit_ibu" value="kel jantung" <?= $result['penyakit_ibu'] == 'kel jantung' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="text-left col-md-12">
                                <div class="col-md-5">
                              <b>Sakit Lain </b> 
                              
                              </div>      
                              <label class="col-md-7">
                              <input type="text" name="sakit_lain" class="form-control" placeholder="sakit_lain" value="<?= $result['sakit_lain'] ?>" required autocomplete="off">
                              </label>
                              </div>
                            </div>
                        </td> 
                      </tr>
                      <tr>
                         <td class="text-left bd " style="vertical-align: top">
                          <div class="col-md-4">
                              <b>Nama Ibu </b>
                              
                            </div>      
                            <label style="font-weight: 100">
                              <input type="text" name="nama_ibu" class="form-control" placeholder="nama ibu" value="<?= $result['nama_ibu'] ?>" required autocomplete="off">
                             </label> 
                          </td>
                          <td class="text-left bd " style="vertical-align: top">
                          <div class="col-md-4">
                              <b>Nama Ayah </b>
                              
                            </div> 
                            <label style="font-weight: 100">
                              <input type="text" name="nama_ayah" class="form-control" placeholder="nama ayah" value="<?= $result['nama_ayah'] ?>" required autocomplete="off">
                             </label>
                          </td> 
                      </tr>
                      </tbody>
                    </table>

                    <table width="100%">

                      <tbody>
                          <tr>
                            <td class="text-center bd ">
                              <div class="col-md-3">
                              <b>Agama </b>
                              
                              </div>     
                              <label class="col-md-9">
                              <input type="text" name="agama" class="form-control" placeholder="agama" value="<?= $result['agama'] ?>" required autocomplete="off">
                             </label> 
                            </td>
                            
                           <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Goldar Bayi </b> 
                              
                              </div>      
                              <label class="col-md-7">
                              <input type="text" name="goldar_bayi" class="form-control" placeholder="goldar bayi" value="<?= $result['goldar_bayi'] ?>" autocomplete="off">
                              </label>
                            </td>
                            <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Goldar Ibu </b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <input type="text" name="goldar_ibu" class="form-control" placeholder="goldar ibu" value="<?= $result['goldar_ibu'] ?>" required autocomplete="off">
                              </label> 
                            </td>
                            <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Goldar Ayah </b> 
                              
                              </div>    
                              <label class="col-md-7">
                              <input type="text" name="goldar_ayah" class="form-control" placeholder="goldar ayah" value="<?= $result['goldar_ayah'] ?>" required autocomplete="off">
                              </label>  
                            </td>
                          </tr>
                          <tr>
                          <td class="text-left bd">
                            
                                       <div class="col-xs-6"> 
                                        <b>VDRL +/-</b>
                                      </div>
                                      
                                        <label class="col-xs-3 container radio-select" style="width: 5%"> +
                                          <input type="radio" name="vdrl" value="+" <?= $result['vdrl'] == '+' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      
                                      
                                         <label class="col-xs-3 container radio-select" style="width: 5%"> -
                                          <input type="radio" name="vdrl" value="-" <?= $result['vdrl'] == '-' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      
                                     
                          </td>
                          <td class="text-right bd ">
                              <div class="col-md-5">
                              <b>Titer Antibodi </b>
                              
                              </div>     
                              <label class="col-md-7">
                              <input type="text" name="titer_antibodi" class="form-control" placeholder="" value="<?= $result['titer_antibodi'] ?>" required autocomplete="off">
                             </label> 
                            </td>
                            <td class="text-right bd ">
                              <div class="col-md-3">
                              <b>Alamat</b>
                              
                              </div>     
                              <label class="col-md-9">
                              <textarea type="text" name="alamat" class="form-control" placeholder="" required autocomplete="off"><?= $result['alamat'] ?></textarea> 
                             </label> 
                            </td>
                            <td class="text-right bd ">
                              <div class="col-md-3">
                              <b>Telpon </b>
                              
                              </div>     
                              <label class="col-md-9">
                              <input type="text" name="telpon" class="form-control" placeholder="" value="<?= $result['telpon'] ?>" required autocomplete="off">
                             </label> 
                            </td>
                            
                           
                          </tr>
                          
                      </tbody>
                    </table>
                    
                    <table width="100%">
                      <thead>
                        <tr class="text-center bd ">
                          <td width="20%" class="bd"><b>Tahun</b></td>
                          <td width="40%" class="bd"><b>Riwayat Kehamilan / Kelahiran G P A</b></td>
                          <td width="40%" class="bd"><b>Ketuban Pecah</b></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <input type="number" name="tahun1" id="tahun1" class="form-control" placeholder="20..." value="<?= $result['tahun1'] ?>" autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan1" id="riwayat_kehamilan1" class="form-control" autocomplete="off"><?= $result['riwayat_kehamilan1'] ?></textarea>
                             </label>
                        </td>
                        <td rowspan="4" class="text-left bd" style="vertical-align: top">
                             <label class="col-md-12">
                              
                              <div class="col-md-6"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-3">
                                    <b>Tanggal</b>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="ketuban_pecah_tgl" id="ketuban_pecah_tgl" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                                  </div>
                                </div>
                                <br>
                              </div>
                              <div class="col-md-6">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-2">
                                    <b>Jam</b>
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" name="ketuban_pecah_jam" id="jam3" class="form-control" value="<?= $result['ketuban_pecah_jam'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
            
                             </label>
                             <div class="text-center col-md-3">
                              <b>Warna </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="ketuban_pecah_warna" id="warna" class="form-control" required="" value="<?= $result['ketuban_pecah_warna'] ?>" autocomplete="off">
                             </label>
                             
                        </td>
                        </tr>
                        <tr>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <input type="number" name="tahun2" id="tahun2" class="form-control" placeholder="20..." value="<?= $result['tahun2'] ?>" autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan2" id="riwayat_kehamilan2" class="form-control" autocomplete="off"><?= $result['riwayat_kehamilan2'] ?></textarea>
                             </label>
                        </td>
                        
                        </tr>
                        <tr>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <input type="number" name="tahun3" id="tahun3" class="form-control" placeholder="20..." value="<?= $result['tahun3'] ?>" autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan3" id="riwayat_kehamilan3" class="form-control" autocomplete="off"><?= $result['riwayat_kehamilan3'] ?></textarea>
                             </label>
                        </td>
                        
                        </tr>
                        <tr>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <input type="number" name="tahun4" id="tahun4" class="form-control" placeholder="20..." value="<?= $result['tahun4'] ?>" autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan4" id="riwayat_kehamilan4" class="form-control" autocomplete="off"><?= $result['riwayat_kehamilan4'] ?></textarea>
                             </label>
                        </td>
                        
                        </tr>
                      </tbody>
                    </table>

                    <table width="100%">
                      <tbody>
                        <tr>
                         
                         <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="row">
                                  <div class="col-xs-12"> 
                                    <b>Bayi Dilahirkan Dengan</b>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Letak Kepala
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="letak kepala" <?= $result['bayi_dilahirkan_dengan'] == 'letak kepala' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Spontan
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="spontan" <?= $result['bayi_dilahirkan_dengan'] == 'spontan' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Eks Vakum
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="eks vakum" <?= $result['bayi_dilahirkan_dengan'] == 'eks vakum' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Letak Sungsang
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="letak sungsang" <?= $result['bayi_dilahirkan_dengan'] == 'letak sungsang' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Eks Cunam
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="eks cunam" <?= $result['bayi_dilahirkan_dengan'] == 'eks cunam' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Op Caesar
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="op caesar" <?= $result['bayi_dilahirkan_dengan'] == 'op caesar' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="text-center col-md-3">
                                        <b>Indikasi </b>
                                      </div>
                                       <label class="col-md-9">
                                       <input type="text" name="indikasi" id="indikasi" class="form-control" value="<?= $result['indikasi'] ?>" autocomplete="off">
                                       </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td> 

                        <td class="text-right bd ">
                          <label class="col-md-12">
                              
                              <div class="col-md-6"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Kala I</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" name="kala1" class="form-control" placeholder="" value="<?= $result['kala1'] ?> " required autocomplete="off">
                                  </div>
                                </div>
                                <br>
                              </div>
                              <div class="col-md-6">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Kala II</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" name="kala2" class="form-control" placeholder="" value="<?= $result['kala2'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-5">
                                    <b>Obat-Obatan Selama Hamil / Persalinan</b>
                                  </div>
                                  <div class="col-md-7">
                                    <textarea type="text" name="obat_selama_hamil" class="form-control" placeholder="" required autocomplete="off"><?= $result['obat_selama_hamil'] ?></textarea>
                                  </div>
                                </div>
                              </div>
                              </div>
            
                             </label>
                              
                            </td>

                            <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="row">
                                  <div class="col-xs-12"> 
                                    <b>Tanda Gawat Janin</b>
                                    <div class="row">
                                      <div class="col-xs-6">
                                        <label class="container radio-select" style="width: 5%"> Ya
                                          <input type="radio" name="tanda_gawat_janin" value="ya" <?= $result['tanda_gawat_janin'] == 'ya' ? 'checked' : ''; ?>>
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Tidak
                                          <input type="radio" name="tanda_gawat_janin" value="tidak" <?= $result['tanda_gawat_janin'] == 'tidak' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      
                                    </div>
                                    
                                    <div class="row">
                                      <div class="text-left col-md-5">
                                        <b>Denyut Jantung Bayi</b>
                                      </div>
                                       <label class="col-md-7">
                                       <input type="number" name="denyut_jantung_bayi" id="denyut_jantung_bayi" class="form-control" placeholder="x/menit" value="<?= $result['denyut_jantung_bayi'] ?> " autocomplete="off">
                                       </label>
                                       
                                    </div>
                                    <div class="row">
                                      <div class="text-left col-xs-12">
                                        <b>Anestesia</b>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Pudendal
                                          <input type="radio" name="anestesia" value="pudendal" <?= $result['anestesia'] == 'pudendal' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Epidural
                                          <input type="radio" name="anestesia" value="epidural" <?= $result['anestesia'] == 'epidural' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Spinal
                                          <input type="radio" name="anestesia" value="spinal" <?= $result['anestesia'] == 'spinal' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                     <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Umum
                                          <input type="radio" name="anestesia" value="umum" <?= $result['anestesia'] == 'umum' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div> 
                                       
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td> 
                      </tr>
                      </tbody>
                    </table>

                    <table width="100%">
                      <thead>
                        <tr class="text-center bd ">
                          <td width="50%" class="bd"><b>BAYI LAHIR</b></td>
                          <td width="50%" class="bd"><b>RESUSITASI</b></td>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         
                          <td class="text-left bd" style="vertical-align: top">
                             <label class="col-md-12">
                              
                              <div class="col-md-6"> 
                                <div class="row">
                                  <!-- nama -->
                                  
                                  <div class="col-md-3">
                                    <b>Tanggal</b>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="bayi_lahir_tgl" id="bayi_lahir_tgl" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                                  </div>
                                </div>
                                <br>
                              </div>
                              <div class="col-md-6">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-2">
                                    <b>Jam</b>
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" name="bayi_lahir_jam" id="jam1" class="form-control" value="<?= $result['bayi_lahir_jam'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
            
                             </label>
                             <label class="col-md-12">
                               <div class="text-left col-md-3">
                              <b>Kelamin </b>
                            <div class="row">
                             <div class="col-xs-6">
                                        <label class="container radio-select" style="width: 5%"> Lelaki
                                          <input type="radio" name="bayi_kelamin" value="lelaki" <?= $result['bayi_kelamin'] == 'lelaki' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Perempuan
                                          <input type="radio" name="bayi_kelamin" value="perempuan" <?= $result['bayi_kelamin'] == 'perempuan' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                              </div>
                            </div>
                              </div>
                              <div class="text-right col-md-4">
                              <b>Berat Badan </b>
                              </div>
                              <div class="col-md-5">
                                    <input type="number" name="bayi_bb" id="bayi_bb" class="form-control" placeholder="gram" value="<?= $result['bayi_bb'] ?>" required autocomplete="off">
                              </div>
                             </label>
                             
                              
                          <label class="col-md-12">
                              
                              <div class="col-md-4"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Panjang Badan</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="bayi_panjang" class="form-control" placeholder="cm" value="<?= $result['bayi_panjang'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                                <br>
                              </div>
                              <div class="col-md-4">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Lingkar Kepala</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="bayi_lingkar_kepala" class="form-control" placeholder="cm" value="<?= $result['bayi_lingkar_kepala'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Lingkar Dada</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="bayi_lingkar_dada" class="form-control" placeholder="cm" value="<?= $result['bayi_lingkar_dada'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
                             </label>
                             <label class="col-md-12">
                              
                              <div class="col-md-12"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Masa Gestasi</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="masa_gestasi" class="form-control" placeholder="minggu" value="<?= $result['masa_gestasi'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                                <br>
                              </div>
                              
                             </label>
                             <label class="col-md-12">
                               <div class="text-center col-md-6">
                              <b>Urin </b>
                            <div class="row">
                             <div class="col-xs-6">
                                        <label class="container radio-select" style="width: 5%"> Keluar
                                          <input type="radio" name="urin" value="keluar" <?= $result['urin'] == 'keluar' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Belum
                                          <input type="radio" name="urin" value="belum" <?= $result['urin'] == 'belum' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                              </div>
                            </div>

                              </div>
                              <div class="text-center col-md-6">
                              <b>Mekonium </b>
                            <div class="row">
                             <div class="col-xs-6">
                                        <label class="container radio-select" style="width: 5%"> Keluar
                                          <input type="radio" name="mekonium" value="keluar" <?= $result['mekonium'] == 'keluar' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Belum
                                          <input type="radio" name="mekonium" value="belum" <?= $result['mekonium'] == 'belum' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                              </div>
                            </div>

                              </div>
                        </td>

                        <td class="text-left bd">
                             
                              <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Pembersihan Jalan Nafas
                                          <input type="radio" name="resusitasi" value="Pembersihan Jalan Nafas" <?= $result['resusitasi'] == 'Pembersihan Jalan Nafas' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Oksigen
                                          <input type="radio" name="resusitasi" value="oksigen" <?= $result['resusitasi'] == 'oksigen' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Tanpa Tekanan
                                          <input type="radio" name=resusitasi" value="Tanpa Tekanan" <?= $result['resusitasi'] == 'Tanpa Tekanan' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                     <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Dgn Tekanan
                                          <input type="radio" name="resusitasi" value="Dengan Tekanan" <?= $result['resusitasi'] == 'Dengan Tekanan' ? 'checked' : ''; ?> >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div> 
                              
                          <label class="col-md-12">
                              
                              <div class="col-md-6"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Obat-obatan</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" name="obat_obatan" class="form-control" placeholder="" value="<?= $result['obat_obatan'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                                <br>
                              </div>
                              <div class="col-md-6">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Dosis</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" name="dosis" class="form-control" placeholder="" value="<?= $result['dosis'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              
                             </label>

                             <label class="col-md-12">
                              
                              <div class="col-md-2"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Intubasi</b> (optional)
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                              <div class="col-md-5">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Dari Menit Ke</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="dari_menitke_intubasi" class="form-control" placeholder="menit" value="<?= $result['dari_menitke_intubasi'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>s/d menit ke</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="sd_menitke_intubasi" class="form-control" placeholder="menit" value="<?= $result['sd_menitke_intubasi'] ?>" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              
                             </label>
                             <label class="col-md-12">
                              
                              <div class="col-md-2"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Bagging</b> (optional)
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                              <div class="col-md-5">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Dari Menit Ke</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="dari_menitke_bagging" class="form-control" placeholder="menit" value="<?= $result['dari_menitke_bagging'] ?>" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>s/d menit ke</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="sd_menitke_bagging" class="form-control" placeholder="menit" value="<?= $result['sd_menitke_bagging'] ?>" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              
                             </label>
                             <label class="col-md-12">
                              
                              <div class="col-md-2"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Pijat Jantung</b> (optional)
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                              <div class="col-md-5">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>Dari Menit Ke</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="dari_menitke_pijat_jantung" class="form-control" placeholder="menit" value="<?= $result['dari_menitke_pijat_jantung'] ?>" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-4">
                                    <b>s/d menit ke</b>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="number" name="sd_menitke_pijat_jantung" class="form-control" placeholder="menit" value="<?= $result['sd_menitke_pijat_jantung'] ?>" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              
                             </label>
                             <label class="col-md-12">
                              
                              <div class="col-md-4"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Lain-lain</b> (optional)
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                              <div class="col-md-8">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <textarea type="text" name="lainlain" class="form-control" placeholder="jelaskan" autocomplete="off"><?= $result['lainlain'] ?></textarea>
                                  </div>
                                </div>
                              </div>
                             </label>
                             <label class="col-md-12">
                              
                              <div class="col-md-4"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Plasenta</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                              <div class="col-md-8">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <textarea type="text" name="plasenta" class="form-control" placeholder="" required autocomplete="off"><?= $result['plasenta'] ?></textarea>
                                  </div>
                                </div>
                              </div>
                             </label>
                             <label class="col-md-12">
                              
                              <div class="col-md-4"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Tali Pusat</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                              <div class="col-md-8">  
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <textarea type="text" name="tali_pusat" class="form-control" placeholder="" required autocomplete="off"><?= $result['tali_pusat'] ?></textarea>
                                  </div>
                                </div>
                              </div>
                             </label>
                             
                        </td>
                      </tr>
                      </tbody>
                    </table>
                    <table width="100%">
                      <thead>
                        <tr class="text-center bd ">
                              <td width="100%" class="bd" colspan="11"><b>NILAI APGAR</b></td>
                        </tr>
                        <tr class="text-center bd ">
                              <td rowspan="2" width="20%" colspan="2" class="bd"><b>Tanda</b></td>
                              <td  colspan="6" width="60%" class="bd"><b>Nilai</b></td>
                              <td  colspan="3" width="20%" class="bd"><b>Menit</b></td>
                        </tr>
                        <tr class="text-center bd ">
                              <td width="20%" colspan="2" class="bd"><b>0</b></td>
                              <td  colspan="2" width="20%" class="bd"><b>1</b></td>
                              <td  colspan="2" width="20%" class="bd"><b>2</b></td>
                              <td   width="7%" class="bd"><b>1</b></td>
                              <td   width="7%" class="bd"><b>5</b></td>
                              <td   width="6%" class="bd"><b>10</b></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center bd">
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12">
                              <div class="col-md-12"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Frek Jantung</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                             </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Tidak Ada
                              <input type="radio" name="frek_jantung" value="tidak ada" <?= $result['frek_jantung'] == 'tidak ada' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; < 100
                              <input type="radio" name="frek_jantung" value="< 100" <?= $result['frek_jantung'] == '< 100' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; > 100
                              <input type="radio" name="frek_jantung" value="> 100" <?= $result['frek_jantung'] == '> 100' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_frek_jantung" value="1" <?= $result['menit_frek_jantung'] == '1' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_frek_jantung" value="5" <?= $result['menit_frek_jantung'] == '5' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_frek_jantung" value="10" <?= $result['menit_frek_jantung'] == '10' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          
                        </tr>
                        <tr class="text-center bd">
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12">
                              <div class="col-md-12"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Usaha Nafas</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                             </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Tidak Ada
                              <input type="radio" name="usaha_nafas" value="tidak ada" <?= $result['usaha_nafas'] == 'tidak ada' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Lambat, Tidak Teratur
                              <input type="radio" name="usaha_nafas" value="Lambat, Tidak Teratur" <?= $result['usaha_nafas'] == 'Lambat, Tidak Teratur' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp;Menangis Kuat
                              <input type="radio" name="usaha_nafas" value="Menangis Kuat" <?= $result['usaha_nafas'] == 'Menangis Kuat' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_usaha_nafas" value="1" <?= $result['menit_usaha_nafas'] == '1' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_usaha_nafas" value="5" <?= $result['menit_usaha_nafas'] == '5' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_usaha_nafas" value="10" <?= $result['menit_usaha_nafas'] == '10' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          
                        </tr>
                        <tr class="text-center bd">
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12">
                              <div class="col-md-12"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Tonus Otot</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                             </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt  text-left" style="width: 100%"> &nbsp;&nbsp; Ekstensi
                              <input type="radio" name="tonus_otot" value="ekstensi" <?= $result['tonus_otot'] == 'ekstensi' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Ekstensi, Sedikit Fleksi
                              <input type="radio" name="tonus_otot" value="ekstensi, sedikit fleksi" <?= $result['tonus_otot'] == 'ekstensi, sedikit fleksi' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Gerakan Aktif
                              <input type="radio" name="tonus_otot" value="gerakan aktif" <?= $result['tonus_otot'] == 'gerakan aktif' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_tonus_otot" value="1" <?= $result['menit_tonus_otot'] == '1' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_tonus_otot" value="5" <?= $result['menit_tonus_otot'] == '5' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_tonus_otot" value="10" <?= $result['menit_tonus_otot'] == '10' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          
                        </tr>
                        <tr class="text-center bd">
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12">
                              <div class="col-md-12"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Reflek (thd kaleter hidung)</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                             </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Tidak Ada
                              <input type="radio" name="reflek" value="tidak ada" <?= $result['reflek'] == 'tidak ada' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Nyengir
                              <input type="radio" name="reflek" value="nyengir" <?= $result['reflek'] == 'nyengir' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Bersin Batuk
                              <input type="radio" name="reflek" value="bersin batuk" <?= $result['reflek'] == 'bersin batuk' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_reflek" value="1" <?= $result['menit_reflek'] == '1' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_reflek" value="5" <?= $result['menit_reflek'] == '5' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_reflek" value="10" <?= $result['menit_reflek'] == '10' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          
                        </tr>
                        <tr class="text-center bd">
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12">
                              <div class="col-md-12"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Warna Kulit</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                             </label>
                          </td>
                          <td class="text-center bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Biru / Pucat
                              <input type="radio" name="warna_kulit" value="biru/pucat" <?= $result['warna_kulit'] == 'biru/pucat' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="text-center bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Tubuh Pink, ekstremitas biru
                              <input type="radio" name="warna_kulit" value="tubuh pink, ekstremitas biru" <?= $result['warna_kulit'] == 'tubuh pink, ekstremitas biru' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="text-center bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Pink seluruh tubuh
                              <input type="radio" name="warna_kulit" value="pink seluruh tubuh" <?= $result['warna_kulit'] == 'pink seluruh tubuh' ? 'checked' : ''; ?> >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_warna_kulit" value="1" <?= $result['menit_warna_kulit'] == '1' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_warna_kulit" value="5" <?= $result['menit_warna_kulit'] == '5' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_warna_kulit" value="10" <?= $result['menit_warna_kulit'] == '10' ? 'checked' : ''; ?> >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          
                        </tr>
                        <tr class="text-right bd">
                          <td class="bd" colspan="12" width="20%">
                            <label class="col-md-12">
                              <div class="col-md-12"> 
                                <div class="row">
                                  <!-- nama -->
                                  <div class="col-md-12">
                                    <b>Nilai APGAR</b>
                                  </div>
                                  
                                </div>
                                <br>
                              </div>
                             </label>
                          </td>  
                        </tr>
                      </tbody>
                    </table>
                    <table width="100%">
                      <tbody>
                        <tr>
                            <td class="text-center bd ">
                              <div class="col-md-3">
                              <b>Nafas Pertama </b>
                              
                              </div>     
                              <label class="col-md-9">
                              <input type="number" name="nafas_pertama" class="form-control" placeholder="" value="<?= $result['nafas_pertama'] ?>" required autocomplete="off">
                             </label> 
                            </td>
                            
                           <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Nafas Spontan & Teratur </b> 
                              
                              </div>      
                              <label class="col-md-7">
                              <input type="number" name="nafas_spontan" class="form-control" placeholder="menit" value="<?= $result['nafas_spontan'] ?>" required autocomplete="off">
                              </label>
                            </td>
                            <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Waktu s/d Menangis </b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <input type="number" name="waktu_sd_menangis" class="form-control" placeholder="menit" value="<?= $result['waktu_sd_menangis'] ?>" required autocomplete="off">
                              </label> 
                            </td>
                          </tr>
                      </tbody>
                    </table>
                    
                    <table width="100%">
                      <thead>
                        <tr class="text-center bd ">
                              <td width="30%" colspan="3" class="bd"><b>PEMERIKSAAN FISIK</b></td>
                              <td width="10%" class="bd"><b>Normal</b></td>
                              <td width="10%" class="bd"><b>Tidak Normal</b></td>
                              <td  colspan="5" width="50%" class="bd"><b>CATATAN</b></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Keadaan Umum </b>
                              </div>     
                            </td>
                            
                           <td width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="keadaan_umum" value="normal" <?= $result['keadaan_umum'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="keadaan_umum" value="tidak normal" <?= $result['keadaan_umum'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td rowspan="3" colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Kel. Kongenital / Anomali / Lainlain </b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <textarea type="text" name="catatan" class="form-control" placeholder="catatan" required autocomplete="off"><?= $result['catatan'] ?></textarea>
                              </label> 
                            </td>
                          </tr>

                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Sianosis (+/-) </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="sianosis" value="normal" <?= $result['sianosis'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="sianosis" value="tidak normal" <?= $result['sianosis'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                           
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Ikterus / Kuning (+/-) </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="ikterus_kuning" value="normal" <?= $result['ikterus_kuning'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ikterus_kuning" value="tidak normal" <?= $result['ikterus_kuning'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>SSP, Tonus </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="ssp_tonus" value="normal" <?= $result['ssp_tonus'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ssp_tonus" value="tidak normal" <?= $result['ssp_tonus'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                            <td rowspan="3" colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Diagnosis</b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <textarea type="text" name="diagnosis" class="form-control" placeholder="diagnosis" required autocomplete="off"><?= $result['diagnosis'] ?></textarea>
                              </label> 
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Kepala,Leher,Palatum </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="kepala_leher_palatum" value="normal" <?= $result['kepala_leher_palatum'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="kepala_leher_palatum" value="tidak normal" <?= $result['kepala_leher_palatum'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Paru </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="paru" value="normal" <?= $result['paru'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="paru" value="tidak normal" <?= $result['paru'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Ubun-ubun, Sutura </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="ubun_ubun" value="normal" <?= $result['ubun_ubun'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ubun_ubun" value="tidak normal" <?= $result['ubun_ubun'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Jantung, a.Femoralis </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="jantung" value="normal" <?= $result['jantung'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="jantung" value="tidak normal" <?= $result['jantung'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                            <td rowspan="5" colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Penatalaksanaan</b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <textarea type="text" name="penatalaksanaan" class="form-control" placeholder="penatalaksanaan" required autocomplete="off"><?= $result['penatalaksanaan'] ?></textarea>
                              </label> 
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Abdomen, Anus (+/-) </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="abdomen" value="normal" <?= $result['abdomen'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="abdomen" value="tidak normal" <?= $result['abdomen'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Kelamin </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="kelamin" value="normal" <?= $result['kelamin'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="kelamin" value="tidak normal" <?= $result['kelamin'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Kulit </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="kulit" value="normal" <?= $result['kulit'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="kulit" value="tidak normal" <?= $result['kulit'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Ekstremitas </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="ekstremitas" value="normal" <?= $result['ekstremitas'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ekstremitas" value="tidak normal" <?= $result['ekstremitas'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                          </tr>
                          <tr>
                            <td width="30%" colspan="3" class="text-center bd ">
                              <div class="col-md-12">
                              <b>Panggul </b>
                              </div>     
                            </td>
                            
                           <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                <input type="radio" name="panggul" value="normal" <?= $result['panggul'] == 'normal' ? 'checked' : ''; ?> >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="panggul" value="tidak normal" <?= $result['panggul'] == 'tidak normal' ? 'checked' : ''; ?> >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                            <td colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Inisiasi Menetek Dini(IMD): Jam</b> 
                              
                              </div>     
                              <label class="col-md-7">
                                <input type="text" name="inisiasi" id="jam4" class="form-control" value="<?= $result['inisiasi']; ?>" required autocomplete="off">
                              </label> 
                            </td>
                          </tr>
                      </tbody>
                    </table>
                    
                      
                  </div>
                  <br>
                </div>
              </div>


            </div>

              <div class="panel-footer text-right">
              <button class="btn btn-default btn-sm btn-batal-<?= $this->router->fetch_class(); ?>">Batal</button>
              <button type="submit" class="btn btn-primary btn-sm btn-kirim-<?= $this->router->fetch_class(); ?>">Simpan</button>
            </div>
           </div>

        </div>

      </div>
   
      </form>
<!-- end input panel col 6 sendiri -->

  
  </div>
</div>

<script type="text/javascript">

  $('.dokter_approved').select2({
    placeholder: "-- Pilih dokter Approve --"
  });

  $('.petugas_approved').select2({
    placeholder: "-- Pilih petugas Approve --"
  });

    $('#jam').datetimepicker({
    format:"HH:mm",
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

  $('#jam_akhir').datetimepicker({
    format:"HH:mm",
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
   $('#jam1').datetimepicker({
    format:"HH:mm",
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
  $('#jam3').datetimepicker({
    format:"HH:mm",
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
  $('#jam4').datetimepicker({
    format:"HH:mm",
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

  $('#jam_monitoring').datetimepicker({
    format:"HH:mm",
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

  $('#tanggal, #ketuban_pecah_tgl, #bayi_lahir_tgl').datetimepicker({
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

  $('.btn-batal-<?= $this->router->fetch_class(); ?>').click(function (e) { 
    e.preventDefault();
    
    $('#view-container').show();
    $('#form-container').hide();
    $('#form-container').html('');
  });

  $('#form-edit-1').submit(function (e) { 
    e.preventDefault();
    $('.btn-kirim-<?= $this->router->fetch_class(); ?>').attr('disabled', true);
    
    $.post('<?php echo base_url();?><?= $class_name; ?>/edit_process/', $(this).serialize()
    ).done(function(data) {
      var data = JSON.parse(data);

      if (data.status == '200') {
        alert('Data berhasil diubah');
        location.reload();
      } else {
        alert(data.message);
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
      }
    }).fail(function() {
      alert('Gagal menampilkan data')
      $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
    });
  });
  update();


$(document).ready(function(){
  $("input[type='radio']").click(function(){
      update();
  });
});


</script>

<script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  var set = signaturePad.toData();
  if (!set.pop()) {
    data = $('#prev').val();
    
  }
  
  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo').addEventListener('click', function () {
    var data = signaturePad.toData();
    if (data) {
      data.pop(); // remove the last dot or line
      signaturePad.fromData(data);
    }
  });

})

// document.getElementById('save-png').addEventListener('click', function () {
//   if (signaturePad.isEmpty()) {
//     return alert("Please provide a signature first.");
//   }
  
//   var data = signaturePad.toDataURL('image/png');
//   console.log(data);
//   window.open(data);
// });

// document.getElementById('clear').addEventListener('click', function () {
//   signaturePad.clear();
// });

// document.getElementById('undo').addEventListener('click', function () {
//   var data = signaturePad.toData();
//   if (data) {
//     data.pop(); // remove the last dot or line
//     signaturePad.fromData(data);
//   }
// });

 </script>