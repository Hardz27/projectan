
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

      .radio-select{
    padding: 3px 0px 10px 25px;
  }

  [data-toggle="buttons"]>.btn>input[type="radio"],
  [data-toggle="buttons"]>.btn>input[type="checkbox"] {
    clip: rect(1px 1px 1px 1px);
  }

  #signature{
    width: 400px; height: 400px;
    border: 1px solid black;
    background-image: url("<?php echo base_url();?>assets/image/Human.png");
  }
</style>
<div class="row">
  <div class="col-md-12">

<!-- start input panel col 6 sendiri -->

    <form id="form-add-1-<?= $this->router->fetch_class(); ?>">
      <input type="hidden" class="form-control input-sm" name="id_reg" id="id_reg" value="<?= $id_reg ?>">
      <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 mb-5">
              <div class="btn-group-toggle" data-toggle="buttons">
                <?php foreach ($data_visit as $v) : ?>
                  <label name="label_<?= $v['id_visit']; ?>" class="btn btn-sm btn-default" style="margin-bottom:5px;">
                    <input value="<?= $v['id_visit']; ?>"  name="id_visit" id="id_visit_<?= $v['id_visit']; ?>" type="radio"><?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="row">
                <!-- nama -->
                <div class="col-md-4">
                  <b>Petugas Approve</b>
                </div>
                <div class="col-md-8">
                  <select name="petugas_approved" class="petugas_approved" style="width: 100%" >
                    <option value=""></option>
                    <?php foreach ($data_perawat as $k => $v) : ?>
                      <option value="<?= $v['id'] ?>"><?= $v['nama'] ?></option>
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
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"  autocomplete="off">
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
                    <input type="text" name="jam" id="jam" class="form-control" value="07:00"  autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Fisioterapi Asesment</div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Nama Pasien</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Agama</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="agama" class="form-control" placeholder="Agama"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>No. MR</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="no_mr" id="no_mr" class="form-control" placeholder="No. MR"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Pendidikan</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Tempat. Tgl.Lahir</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="ttl" id="ttl" class="form-control" placeholder="Tempat. Tgl.Lahir"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Pekerjaan</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan"  autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6"> 
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-3">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="usia" id="usia" class="form-control" placeholder="Usia"  autocomplete="off">
                    </div>
                  </div>
                  <br>
                </div>
                
                <div class="col-md-6">  
                  <div class="row">
                  <div class="col-md-6">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">L
                        <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin" value="L" >
                      <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3 text-center">P
                      <label class="container radio-select" style="width: 2%">
                      <input type="radio" name="jenis_kelamin" value="P" >
                      <span class="checkmark"></span>
                    </label>
                    </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">  
                  <div class="row">
                    <table width="100%">
                      <thead>
                        <tr>
                          <td width="100%" class="text-center bd" colspan="4"><b>Status Pernikahan</b></td>
                        </tr>
                        <tr class="text-center bdu ">
                          <td width="25%" class="bd" ><b>Menikah</b></td>
                          <td width="25%" class="bd"><b>Belum Menikah</b></td>
                          <td width="25%" class="bd"><b>Janda</b></td>
                          <td width="25%" class="bd"><b>Duda</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       
                        <tr>
                          
                          <td class="text-center bd ">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="status_pernikahan" value="menikah" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                <input type="radio" name="status_pernikahan" value="belum menikah" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                  <input type="radio" name="status_pernikahan" value="janda" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                          <td class="text-center bd">
                            <label class="container radio-select" style="width: 2%">
                                 <input type="radio" name="status_pernikahan" value="duda" >
                      <span class="checkmark"></span>
                              </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
              </div>
            </div>
              </div>
          <br><br>
          <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-12">
                      <p class="text-center" ><b>A. Autoanamnesis / Alloanamnesis</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>Keluhan Utama</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="keluhan_utama" id="keluhan_utama" class="form-control" placeholder="keluhan utama"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Riwayat Penyakit Sekarang</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="riwayat_penyakit_sekarang" class="form-control" placeholder="riwayat penyakit sekarang"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>Riwayat Penyakit Dahulu</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="riwayat_penyakit_dahulu" class="form-control" placeholder="riwayat penyakit dahulu"  autocomplete="off"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                  
                  <table width="100%">
                      <thead>
                        <tr class="text-center bdu ">
                          <td width="50%" class="bd" ><b>B. Pemeriksaan Fisik & Tanda Vital</b></td>
                          <td width="50%" class="bd"><b>C. Kemampuan Fungsional</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       
                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 25%" class="col-md-3">
                              <b>TD :</b>
                            </div>                          
                             <label style="font-weight: 100">
                              <input type="text" name="td" class="form-control" placeholder="mmHg" required autocomplete="off">
                             </label>
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-10">
                                <div class="row">
                                  <div class="col-xs-12"> 
                                    <b>1. Tidur/bedrest/gendong</b>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Tidur
                                          <input type="radio" name="tidur_bedrest_gendong" value="tidur" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Bedrest
                                          <input type="radio" name="tidur_bedrest_gendong" value="bedrest" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Gendong
                                          <input type="radio" name="tidur_bedrest_gendong" value="gendong" >
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

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 25%" class="col-md-3">
                              <b>HR :</b>
                            </div>
                             <label style="font-weight: 100">
                                <input type="text" name="hr" id="hr" class="form-control" placeholder="x/m" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-10">
                                <div class="row">
                                  <div class="col-xs-12">
                                    
                                    <div class="row">
                                       <div class="col-xs-6"> 
                                        <b>2. Jalan Sendiri</b>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Ya
                                          <input type="radio" name="jalan_sendiri" value="ya" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Tidak
                                          <input type="radio" name="jalan_sendiri" value="tidak" >
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

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 25%" class="col-md-12">
                              <b>RR :</b>
                            </div>
                             <label style="font-weight: 100">
                              <input type="text" name="rr" id="rr" class="form-control" placeholder="x/m" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-xs-10">
                                <div class="row">
                                  <div class="col-xs-12"> 
                                    
                                    <div class="row">
                                      <div class="col-xs-6"> 
                                        <b>3. Kursi Roda</b>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Ya
                                          <input type="radio" name="kursi_roda" value="ya" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Tidak
                                          <input type="radio" name="kursi_roda" value="tidak" >
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

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 25%" class="col-md-12">
                              <b>Suhu :</b>
                            </div>
                             <label style="font-weight: 100">
                             <input type="text" name="suhu" id="suhu" class="form-control" placeholder="°C" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>4. Alat Bantu</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="alat_bantu" id="alat_bantu" class="form-control" placeholder="Alat Bantu"  autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>

                      <tr>
                         <td rowspan="4" class="text-center bd " style="vertical-align: top">
                          <div style="width: 25%" class="col-md-12">
                              <b>Skala Nyeri :</b>
                            </div>
                             <label style="font-weight: 100">
                             <input type="text" name="skala_nyeri" id="skala_nyeri" class="form-control" placeholder="skala nyeri" required autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>5. Prothesis</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="prothesis" id="prothesis" class="form-control" placeholder="Prothesis"  autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>

                      <tr>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>6. Deformitas</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="deformitas" id="deformitas" class="form-control" placeholder="Deformitas"  autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>7. Resiko Jatuh</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="resiko_jatuh" id="resiko_jatuh" class="form-control" placeholder="Resiko Jatuh"  autocomplete="off">
                                        
                                      </div>
                                    
                                     </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>
                       <tr>
                          <td class="text-left bd">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="row">
                                       <div class="col-md-5"> 
                                        <b>8.Lain-lain</b>
                                      </div>
                                      <div class="col-md-7">
                                       <input type="text" name="lainlain" id="lainlain" class="form-control" placeholder="Lain-lain"  autocomplete="off">
                                        
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
                </div>
              </div>
            </div>

              <!-- GAMBAR TUBUH DISINI -->

            <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-12">
                      <p class="text-center" ><b>Pemeriksaan Sistemik Khusus</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>a. Muskuloskeletal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_muskuloskeletal" id="pemeriksaan_muskuloskeletal" class="form-control" placeholder="muskuloskeletal"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>b. Neuromuskular</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_neuromuskular" class="form-control" placeholder="neuromuskular"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>c. Kardiopulmonal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_kardiopulmonal" class="form-control" placeholder="kardiopulmonal"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>d. Integumentum</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pemeriksaan_integumentum" class="form-control" placeholder="integumentum"  autocomplete="off"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <br><br>
              <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-12">
                      <p class="text-center" ><b>Pengukuran Khusus</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>a. Muskuloskeletal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_muskuloskeletal" id="muskuloskeletal" class="form-control" placeholder="muskuloskeletal"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>b. Neuromuskular</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_neuromuskular" class="form-control" placeholder="neuromuskular"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>c. Kardiopulmonal</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_kardiopulmonal" class="form-control" placeholder="kardiopulmonal"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>d. Integumentum</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="pengukuran_integumentum" class="form-control" placeholder="integumentum"  autocomplete="off"></textarea>
                    </div>
                  </div>
                </div>
              </div>
           </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data Fisioterapi Asesment</div>
            <div class="panel-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-12">
                      <p class="text-center" ><b>Data Penunjang</b></p>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>a. Radiologi</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="radiologi" id="radiologi" class="form-control" placeholder="radiologi"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>b. EMG</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="emg" class="form-control" placeholder="emg"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>
               
                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>c. Laboratorium</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="laboratorium" class="form-control" placeholder="laboratorium"  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="col-md-12">  
                  <div class="row">
                    <!-- nama -->
                    <div class="col-md-5">
                      <b>d. Lain-lain</b>
                    </div>
                    <div class="col-md-7">
                      <textarea type="text" name="lain_lain" class="form-control" placeholder="lain-lain"  autocomplete="off"></textarea>
                    </div>
                  </div>
                </div>
            </div>
              <br><br>

            <div class="row">
              <div class="col-md-12"> 
                  <div class="row">

                    <div class="col-md-5">
                      <b>D. Diagnosis Fisioterapi</b>
                    </div>
                    <div class="col-md-7"> 
                      <textarea type="text" name="diagnosis_fisioterapi" id="diagnosis_fisioterapi" class="form-control" placeholder=""  autocomplete="off"></textarea>
                    </div>
                  </div>
                  <br>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-12"> 
                  <div class="row">
                    <div class="col-md-5">
                      <b>E. Program / Rencana Fisioterapi</b>
                    </div>
                    <div class="col-md-7"> 
                      <textarea type="text" name="program_rencana_fisioterapi" id="program_rencana_fisioterapi" class="form-control" placeholder=""  autocomplete="off"></textarea>
                    </div>
                  </div> 
                  <br>               
                </div>
              </div>


             <br>
            <div class="row">
              <div class="col-md-12"> 
                <div class="row"> 
                  <table width="100%">
                      <thead>
                        <tr class="text-center bd">
                          <td width="100%" class="text-center bd" colspan="4"><b>F. Intervensi</b></td>
                        </tr>
                        <tr class="text-center bdu ">

                          <td width="30%" class="bd" ><b>Tanggal</b></td>
                          <td width="30%" class="bd"><b>Intervensi</b></td>
                          <td width="40%" class="bd"><b>Tempat / Area yang Diterapi</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       
                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>1. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl1" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi1" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi1" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>2. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl2" id="tanggal" class="form-control" value=""  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi2" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi2" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>3. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl3" id="tanggal" class="form-control" value=""  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi3" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi3" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>4. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl4" id="tanggal" class="form-control" value=""  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi4" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi4" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>5. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl5" id="tanggal" class="form-control" value=""  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi5" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi5" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>6. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl6" id="tanggal" class="form-control" value="" autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi6" id="intervensi" class="form-control"  autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi6" id="area_diterapi1" class="form-control"  autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>7. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl7" id="tanggal" class="form-control" value="" autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi7" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi7" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>8. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl8" id="tanggal" class="form-control" value=""  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi8" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi8" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                         <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>9. </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl9" id="tanggal" class="form-control" value=""  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi9" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi9" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                      </tr>

                      <tr>
                          <td class="text-center bd ">
                          <div style="width: 20%" class="col-md-3">
                              <b>10. </b>
                          </div>
                             <label class="col-md-9">
                             <input type="text" name="tgl10" id="tanggal" class="form-control" value=""  autocomplete="off">
                             </label>
                          
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="intervensi10" id="intervensi" class="form-control"   autocomplete="off"></textarea>
                             </label>
                          </td>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="area_diterapi10" id="area_diterapi1" class="form-control"   autocomplete="off"></textarea>
                             </label>
                          </td>
                      </tr>
                    </tbody>
                  </table>                                      
                </div>
              </div>
            </div>
            <br><br>

            <div class="row">
              <div class="col-md-12"> 
                <div class="row">
                  <div class="col-md-5">
                    <b>G. Evaluasi</b>
                  </div>
                  <div class="col-md-7"> 
                    <textarea type="text" name="evaluasi" id="evaluasi" class="form-control" placeholder=""  autocomplete="off"></textarea>
                  </div>
                </div> 
                <br>               
              </div>
            </div>

            <div class="row">
              <div class="col-md-12"> 
                <div class="row">
                  <div class="col-md-5">
                    <b>H. Gambar</b>
                  </div>
                  <div class="col-md-7"> 
                    <!-- Signature -->
                    <div id="signature" style=''>
                      <canvas id="signature-pad" class="signature-pad" width="400px" height="400px">
                    </div><br/>
                     
                    <button type="button" id="undo">Undo</button>
                    <button type="button" id="clear">Clear</button>
                    <input type='hidden' id='generate' name="coretan" value=''><br/>
                  </div>
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

  $('#tanggal, #tanggal_lahir').datetimepicker({
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

  $(".btn-toggle").click(function (e) { 
    e.preventDefault();
    
    $(".btn-toggle").removeClass("btn-primary");
    $(this).addClass("btn-primary");
    var id = $(this).data('id');

    $("input[name='btn-toggle-val']").val(id);
  });

  $('.btn-batal-<?= $this->router->fetch_class(); ?>').click(function (e)
  {
    e.preventDefault();

    $('#view-container').show();
    $('#form-container').hide();
    $('#form-container').html('');
  });

   $('#form-add-1-<?= $this->router->fetch_class(); ?>').submit(function(e) {
    e.preventDefault();
    // console.log($(this).serialize());
    
    $('.btn-kirim-<?= $this->router->fetch_class(); ?>').attr('disabled', true);

    $.post('<?php echo base_url(); ?>' + class_name + '/add_process/list', $(this).serialize()).done(function(data) {
      var data = JSON.parse(data);
      
      if (data.status == '200') {
        alert('Data berhasil disimpan');
        location.reload();
      } else {
        alert('Gagal menampilkan data');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
      }
    }).fail(function() {
      alert('Gagal menampilkan data')
      $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
    });
  });

</script>

<script>
$(document).ready(function() {

 var signaturePad = new SignaturePad(document.getElementById('signature-pad'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

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

 </script>