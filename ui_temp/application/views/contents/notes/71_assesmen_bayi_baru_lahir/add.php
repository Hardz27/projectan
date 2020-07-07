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

  .radio-selectt{
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
                    <input value="<?= $v['id_visit']; ?>" required name="id_visit" id="id_visit_<?= $v['id_visit']; ?>" type="radio"><?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
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
                  <select name="petugas_approved" class="petugas_approved" style="width: 100%" required>
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
                    <input type="text" name="jam" id="jam" class="form-control" value="07:00" required autocomplete="off">
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
                      <input type="text" name="rekam_medik_no" id="rekam_medik_no" class="form-control" placeholder=""  autocomplete="off">
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
                      <input type="text" name="nama" id="nama" class="form-control" placeholder=""  autocomplete="off">
                    </div>
                    <div style="text-align: right;" class="col-md-3">
                      <b>Pening No</b>
                    </div>
                    <div class="col-md-2">
                      <input type="text" name="pening_no" class="form-control" placeholder="Pening No"  autocomplete="off">
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
                              <input type="text" name="dokter_kebidanan" class="form-control" placeholder="dokter kebidanan" required autocomplete="off">
                             </label>           
                          </td>
                          <td class="text-left bd " style="vertical-align: top">
                          <div class="col-md-4">
                              <b>Dokter Anak </b>
                             
                            </div>  
                             <label style="font-weight: 100">
                              <input type="text" name="dokter_anak" class="form-control" placeholder="dokter anak" required autocomplete="off">
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
                                          <input type="radio" name="penyakit_ibu" value="anemia" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Hipertensi
                                          <input type="radio" name="penyakit_ibu" value="hipertensi" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Hepatitis B
                                          <input type="radio" name="penyakit_ibu" value="hepatitis b" >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> TBC
                                          <input type="radio" name="penyakit_ibu" value="tbc" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Diabetes
                                          <input type="radio" name="penyakit_ibu" value="diabetes" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Kel Jantung
                                          <input type="radio" name="penyakit_ibu" value="kel jantung" >
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
                              <input type="text" name="sakit_lain" class="form-control" placeholder="sakit_lain" required autocomplete="off">
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
                              <input type="text" name="nama_ibu" class="form-control" placeholder="nama ibu" required autocomplete="off">
                             </label> 
                          </td>
                          <td class="text-left bd " style="vertical-align: top">
                          <div class="col-md-4">
                              <b>Nama Ayah </b>
                              
                            </div> 
                            <label style="font-weight: 100">
                              <input type="text" name="nama_ayah" class="form-control" placeholder="nama ayah" required autocomplete="off">
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
                              <input type="text" name="agama" class="form-control" placeholder="agama" required autocomplete="off">
                             </label> 
                            </td>
                            
                           <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Goldar Bayi </b> 
                              
                              </div>      
                              <label class="col-md-7">
                              <input type="text" name="goldar_bayi" class="form-control" placeholder="goldar bayi" autocomplete="off">
                              </label>
                            </td>
                            <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Goldar Ibu </b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <input type="text" name="goldar_ibu" class="form-control" placeholder="goldar ibu" required autocomplete="off">
                              </label> 
                            </td>
                            <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Goldar Ayah </b> 
                              
                              </div>    
                              <label class="col-md-7">
                              <input type="text" name="goldar_ayah" class="form-control" placeholder="goldar bayi" required autocomplete="off">
                              </label>  
                            </td>
                          </tr>
                          <tr>
                          <td class="text-left bd">
                            
                                       <div class="col-xs-6"> 
                                        <b>VDRL +/-</b>
                                      </div>
                                      
                                        <label class="col-xs-3 container radio-select" style="width: 5%"> +
                                          <input type="radio" name="vdrl" value="+" >
                                          <span class="checkmark"></span>
                                        </label>
                                      
                                      
                                         <label class="col-xs-3 container radio-select" style="width: 5%"> -
                                          <input type="radio" name="vdrl" value="-" >
                                          <span class="checkmark"></span>
                                        </label>
                                      
                                     
                          </td>
                          <td class="text-right bd ">
                              <div class="col-md-5">
                              <b>Titer Antibodi </b>
                              
                              </div>     
                              <label class="col-md-7">
                              <input type="text" name="titer_antibodi" class="form-control" placeholder="" required autocomplete="off">
                             </label> 
                            </td>
                            <td class="text-right bd ">
                              <div class="col-md-3">
                              <b>Alamat</b>
                              
                              </div>     
                              <label class="col-md-9">
                              <textarea type="text" name="alamat" class="form-control" placeholder="" required autocomplete="off"></textarea> 
                             </label> 
                            </td>
                            <td class="text-right bd ">
                              <div class="col-md-3">
                              <b>Telpon </b>
                              
                              </div>     
                              <label class="col-md-9">
                              <input type="text" name="telpon" class="form-control" placeholder="" required autocomplete="off">
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
                             <input type="number" name="tahun1" id="tahun1" class="form-control" placeholder="20..."  autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan1" id="riwayat_kehamilan1" class="form-control"   autocomplete="off"></textarea>
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
                                    <input type="text" name="ketuban_pecah_jam" id="jam3" class="form-control" value="07:00" required autocomplete="off">
                                  </div>
                                </div>
                              </div>
            
                             </label>
                             <div class="text-center col-md-3">
                              <b>Warna </b>
                            </div>
                             <label class="col-md-9">
                             <input type="text" name="ketuban_pecah_warna" id="warna" class="form-control" required="" autocomplete="off">
                             </label>
                             
                        </td>
                        </tr>
                        <tr>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <input type="number" name="tahun2" id="tahun2" class="form-control" placeholder="20..." autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan2" id="riwayat_kehamilan2"   class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        
                        </tr>
                        <tr>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <input type="number" name="tahun3" id="tahun3" class="form-control" placeholder="20..."  autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan3" id="riwayat_kehamilan3" class="form-control"   autocomplete="off"></textarea>
                             </label>
                        </td>
                        
                        </tr>
                        <tr>
                          <td class="text-left bd">
                             <label class="col-md-12">
                             <input type="number" name="tahun4" id="tahun4" class="form-control" placeholder="20..."  autocomplete="off">
                             </label>
                        </td>
                        <td class="text-left bd">
                             <label class="col-md-12">
                             <textarea type="text" name="riwayat_kehamilan4" id="riwayat_kehamilan4" class="form-control"   autocomplete="off"></textarea>
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
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="letak kepala" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Spontan
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="spontan" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Eks Vakum
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="eks vakum" >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Letak Sungsang
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="letak sungsang" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                         <label class="container radio-select" style="width: 5%"> Eks Cunam
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="eks cunam" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label class="container radio-select" style="width: 5%"> Op Caesar
                                          <input type="radio" name="bayi_dilahirkan_dengan" value="op caesar" >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="text-center col-md-3">
                                        <b>Indikasi </b>
                                      </div>
                                       <label class="col-md-9">
                                       <input type="text" name="indikasi" id="indikasi" class="form-control" autocomplete="off">
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
                                    <input type="text" name="kala1" class="form-control" placeholder="" required autocomplete="off">
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
                                    <input type="text" name="kala2" class="form-control" placeholder="" required autocomplete="off">
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
                                    <textarea type="text" name="obat_selama_hamil" class="form-control" placeholder="" required autocomplete="off"></textarea>
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
                                          <input type="radio" name="tanda_gawat_janin" value="ya" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Tidak
                                          <input type="radio" name="tanda_gawat_janin" value="tidak" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      
                                    </div>
                                    
                                    <div class="row">
                                      <div class="text-left col-md-5">
                                        <b>Denyut Jantung Bayi</b>
                                      </div>
                                       <label class="col-md-7">
                                       <input type="number" name="denyut_jantung_bayi" id="denyut_jantung_bayi" class="form-control" placeholder="x/menit" autocomplete="off">
                                       </label>
                                       
                                    </div>
                                    <div class="row">
                                      <div class="text-left col-xs-12">
                                        <b>Anestesia</b>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Pudendal
                                          <input type="radio" name="anestesia" value="pudendal" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Epidural
                                          <input type="radio" name="anestesia" value="epidural" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Spinal
                                          <input type="radio" name="anestesia" value="spinal" >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                     <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Umum
                                          <input type="radio" name="anestesia" value="umum" >
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
                                    <input type="text" name="bayi_lahir_jam" id="jam1" class="form-control" value="07:00" required autocomplete="off">
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
                                          <input type="radio" name="bayi_kelamin" value="lelaki" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Perempuan
                                          <input type="radio" name="bayi_kelamin" value="perempuan" >
                                          <span class="checkmark"></span>
                                        </label>
                              </div>
                            </div>
                              </div>
                              <div class="text-right col-md-4">
                              <b>Berat Badan </b>
                              </div>
                              <div class="col-md-5">
                                    <input type="number" name="bayi_bb" id="bayi_bb" class="form-control" placeholder="gram" required autocomplete="off">
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
                                    <input type="number" name="bayi_panjang" class="form-control" placeholder="cm" required autocomplete="off">
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
                                    <input type="number" name="bayi_lingkar_kepala" class="form-control" placeholder="cm" required autocomplete="off">
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
                                    <input type="number" name="bayi_lingkar_dada" class="form-control" placeholder="cm" required autocomplete="off">
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
                                    <input type="number" name="masa_gestasi" class="form-control" placeholder="minggu" required autocomplete="off">
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
                                          <input type="radio" name="urin" value="keluar" required="" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Belum
                                          <input type="radio" name="urin" value="belum" required="" >
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
                                          <input type="radio" name="mekonium" value="keluar" required="" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-6">
                                         <label class="container radio-select" style="width: 5%"> Belum
                                          <input type="radio" name="mekonium" value="belum" required="" >
                                          <span class="checkmark"></span>
                                        </label>
                              </div>
                            </div>

                              </div>
                        </td>

                        <td class="text-left bd">
                             
                              <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Pembersihan Jalan Nafas
                                          <input type="radio" name="resusitasi" value="Pembersihan Jalan Nafas" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                         <label class="container radio-select" style="width: 5%"> Oksigen
                                          <input type="radio" name="resusitasi" value="oksigen" >
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                      <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Tanpa Tekanan
                                          <input type="radio" name=resusitasi" value="Tanpa Tekanan" >
                                          <span class="checkmark"></span> 
                                        </label>
                                      </div>
                                     <div class="col-xs-3">
                                        <label class="container radio-select" style="width: 5%"> Dgn Tekanan
                                          <input type="radio" name="resusitasi" value="Dengan Tekanan" >
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
                                    <input type="text" name="obat_obatan" class="form-control" placeholder="" required autocomplete="off">
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
                                    <input type="text" name="dosis" class="form-control" placeholder="" required autocomplete="off">
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
                                    <input type="number" name="dari_menitke_intubasi" class="form-control" placeholder="menit" required autocomplete="off">
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
                                    <input type="number" name="sd_menitke_intubasi" class="form-control" placeholder="menit" required autocomplete="off">
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
                                    <input type="number" name="dari_menitke_bagging" class="form-control" placeholder="menit"  autocomplete="off">
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
                                    <input type="number" name="sd_menitke_bagging" class="form-control" placeholder="menit"  autocomplete="off">
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
                                    <input type="number" name="dari_menitke_pijat_jantung" class="form-control" placeholder="menit" autocomplete="off">
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
                                    <input type="number" name="sd_menitke_pijat_jantung" class="form-control" placeholder="menit" autocomplete="off">
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
                                    <textarea type="text" name="lainlain" class="form-control" placeholder="jelaskan" required autocomplete="off"></textarea>
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
                                    <textarea type="text" name="plasenta" class="form-control" placeholder="" required autocomplete="off"></textarea>
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
                                    <textarea type="text" name="tali_pusat" class="form-control" placeholder="" required autocomplete="off"></textarea>
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
                              <input type="radio" name="frek_jantung" value="tidak ada" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; < 100
                              <input type="radio" name="frek_jantung" value="< 100" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; > 100
                              <input type="radio" name="frek_jantung" value="> 100" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_frek_jantung" value="1" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_frek_jantung" value="5" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_frek_jantung" value="10" >
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
                              <input type="radio" name="usaha_nafas" value="tidak ada" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Lambat, Tidak Teratur
                              <input type="radio" name="usaha_nafas" value="Lambat, Tidak Teratur" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp;Menangis Kuat
                              <input type="radio" name="usaha_nafas" value="Menangis Kuat" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_usaha_nafas" value="1" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_usaha_nafas" value="5" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_usaha_nafas" value="10" >
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
                              <input type="radio" name="tonus_otot" value="ekstensi" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Ekstensi, Sedikit Fleksi
                              <input type="radio" name="tonus_otot" value="ekstensi, sedikit fleksi" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Gerakan Aktif
                              <input type="radio" name="tonus_otot" value="gerakan aktif" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_tonus_otot" value="1" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_tonus_otot" value="5" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_tonus_otot" value="10" >
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
                              <input type="radio" name="reflek" value="tidak ada" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Nyengir
                              <input type="radio" name="reflek" value="nyengir" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Bersin Batuk
                              <input type="radio" name="reflek" value="bersin batuk" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_reflek" value="1" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_reflek" value="5" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_reflek" value="10" >
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
                              <input type="radio" name="warna_kulit" value="biru/pucat" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="text-center bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Tubuh Pink, ekstremitas biru
                              <input type="radio" name="warna_kulit" value="tubuh pink, ekstremitas biru" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          
                          <td class="text-center bd" colspan="2" width="20%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%"> &nbsp;&nbsp; Pink seluruh tubuh
                              <input type="radio" name="warna_kulit" value="pink seluruh tubuh" >
                               <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_warna_kulit" value="1" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="7%">
                            <label class=" col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_warna_kulit" value="5" >
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="bd"  width="6%">
                            <label class="col-md-12 container radio-selectt text-left" style="width: 100%">
                              <input type="radio" name="menit_warna_kulit" value="10" >
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
                              <input type="number" name="nafas_pertama" class="form-control" placeholder="menit" required autocomplete="off">
                             </label> 
                            </td>
                            
                           <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Nafas Spontan & Teratur </b> 
                              
                              </div>      
                              <label class="col-md-7">
                              <input type="number" name="nafas_spontan" class="form-control" placeholder="menit" required autocomplete="off">
                              </label>
                            </td>
                            <td class="text-right bd">
                              <div class="col-md-5">
                              <b>Waktu s/d Menangis </b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <input type="number" name="waktu_sd_menangis" class="form-control" placeholder="menit" required autocomplete="off">
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
                                <input type="radio" name="keadaan_umum" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="keadaan_umum" value="tidak normal" >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td rowspan="3" colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Kel. Kongenital / Anomali / Lainlain </b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <textarea type="text" name="catatan" class="form-control" placeholder="catatan" required autocomplete="off"></textarea>
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
                                <input type="radio" name="sianosis" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="sianosis" value="tidak normal" >
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
                                <input type="radio" name="ikterus_kuning" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ikterus_kuning" value="tidak normal" >
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
                                <input type="radio" name="ssp_tonus" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ssp_tonus" value="tidak normal" >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                            <td rowspan="3" colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Diagnosis</b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <textarea type="text" name="diagnosis" class="form-control" placeholder="diagnosis" required autocomplete="off"></textarea>
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
                                <input type="radio" name="kepala_leher_palatum" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="kepala_leher_palatum" value="tidak normal" >
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
                                <input type="radio" name="paru" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="paru" value="tidak normal" >
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
                                <input type="radio" name="ubun_ubun" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ubun_ubun" value="tidak normal" >
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
                                <input type="radio" name="jantung" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="jantung" value="tidak normal" >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                            <td rowspan="5" colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Penatalaksanaan</b> 
                              
                              </div>     
                              <label class="col-md-7">
                              <textarea type="text" name="penatalaksanaan" class="form-control" placeholder="penatalaksanaan" required autocomplete="off"></textarea>
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
                                <input type="radio" name="abdomen" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="abdomen" value="tidak normal" >
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
                                <input type="radio" name="kelamin" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="kelamin" value="tidak normal" >
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
                                <input type="radio" name="kulit" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="kulit" value="tidak normal" >
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
                                <input type="radio" name="ekstremitas" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="ekstremitas" value="tidak normal" >
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
                                <input type="radio" name="panggul" value="normal" >
                                <span class="checkmark"></span>
                              </label>
                              </div>      
                              
                            </td>
                            <td  width="10%" class="text-right bd">
                              <div class="col-md-12">
                               
                              <label class="col-md-12 container radio-selectt" style="width: 100%">
                                 <input type="radio" name="panggul" value="tidak normal" >
                                 <span class="checkmark"></span>
                              </label>
                              </div>      
                            </td>
                            <td colspan="5" width="50%" class="text-right bd" style="vertical-align: top">
                              <div class="col-md-5">
                              <b>Inisiasi Menetek Dini(IMD): Jam</b> 
                              
                              </div>     
                              <label class="col-md-7">
                                <input type="text" name="inisiasi" id="jam4" class="form-control" value="07:00" required autocomplete="off">
                              </label> 
                            </td>
                          </tr>
                      </tbody>
                    </table>
                    
                      
                  </div>
                  <br>
                </div>
              </div>

              <br>

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

  $('#tanggal, #tanggal_lahir, #ketuban_pecah_tgl, #bayi_lahir_tgl').datetimepicker({
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
    // alert($(this).serialize());
    console.log($(this).serialize());
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


$(document).ready(function(){
  $("input[type='radio']").click(function(){
      var radioOtherIntubasi = $("input[id='radio_other_intubasi']:checked").length;
      if(radioOtherIntubasi){
          $('#text_other_intubasi').attr("disabled", false);
      }else{
        $('#text_other_intubasi').attr("disabled", true);
        $('#text_other_intubasi').val("");
      }

      var radioOtherAlatMedis = $("input[id='radio_other_alat_medis']:checked").length;
      if(radioOtherAlatMedis){
          $('#text_other_alat_medis').attr("disabled", false);
      }else{
        $('#text_other_alat_medis').attr("disabled", true);
        $('#text_other_alat_medis').val("");
      }

      var radioOtherPerkiraanBiaya = $("input[id='radio_other_perkiraan_biaya']:checked").length;
      if(radioOtherPerkiraanBiaya){
          $('#text_other_perkiraan_biaya').attr("disabled", false);
      }else{
        $('#text_other_perkiraan_biaya').attr("disabled", true);
        $('#text_other_perkiraan_biaya').val("");
      }

      var radioOtherSistemBiaya = $("input[id='radio_other_sistem_biaya']:checked").length;
      if(radioOtherSistemBiaya){
          $('#text_other_sistem_biaya').attr("disabled", false);
      }else{
        $('#text_other_sistem_biaya').attr("disabled", true);
        $('#text_other_sistem_biaya').val("");
      }

      var radioOtherLamaDirawat = $("input[id='radio_other_lama_dirawat']:checked").length;
      if(radioOtherLamaDirawat){
          $('#text_other_lama_dirawat').attr("disabled", false);
      }else{
        $('#text_other_lama_dirawat').attr("disabled", true);
        $('#text_other_lama_dirawat').val("");
      }
  });
});



</script>