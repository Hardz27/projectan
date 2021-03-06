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
            
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data </div>
            <div class="panel-body">

              <br>
              <div class="row">
                <div class="col-md-12"> 
                  <b>SKRINING (IDENTIFIKASI)</b>
                </div>
              </div>
              <br>

              <div class="row">

                <div class="col-md-12"> 
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Nama Pasien</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="nama_pasien"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>No.Mr</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="no_mr"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tempat, Tanggal Lahir</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="ttl"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="usia"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Laki-laki
                                <input type="radio" name="jenis_kelamin" value="laki-laki" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="jenis_kelamin" value="perempuan" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Nama Wali</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="nama_wali"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="usia_wali"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Laki-laki
                                <input type="radio" name="jenis_kelamin_wali" value="laki-laki" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="jenis_kelamin_wali" value="perempuan" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Hubungan</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="hubungan"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-3">
                      <b>Nama Pemberi Edukasi</b>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control input-sm" name="usia_wali"  value="" required>
                    </div>
                    <div class="col-md-3">
                      <b>Nama Pelaksana Tindakan</b>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control input-sm" name="usia_wali"  value="" required>
                    </div>
                  </div>
                  <br>

                  <table width="100%">
                      <thead>
                        <tr class="text-center bdu ">
                          <td width="50%" class="bd" ><b>Jenis Informasi</b></td>
                          <td width="50%" class="bd"><b>Isi Informasi</b></td>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Diagnosis (WD dan DD)</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="diagnosis" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Dasar Diagnosis</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              Anamnesis, Pemeriksaan Fisik, Pemeriksaan Penunjang
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Indikasi Tindakan</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="indikasi_tindakan" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Tata Cara</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="tata_cara" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Tujuan</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="tujuan" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Resiko/Komplikasi</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="resiko_komplikasi" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Prognosis</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="prognosis" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Alternatif</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="alternatif" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-center bd ">
                            <label class="col-md-12" style="font-weight: 100">
                              <b>Lain-lain/Kebutuhan Darah</b>
                             </label>                     
                          </td>
                          <td class="text-center bd ">                     
                             <label class="col-md-12" style="font-weight: 100">
                              <input type="text" name="lain_lain" class="form-control" placeholder="" required autocomplete="off">
                             </label>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-3">
                      <b>Tanggal</b>
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                    </div>
                    <div class="col-md-3">
                      <b>Jam</b>
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="jam" id="jam" class="form-control" value="07:00" required autocomplete="off">
                    </div>
                  </div>
                  <br>

                  

                  <table width="100%">
                      <thead>
                        <tr class="text-center bdu">
                          <td width="100%" class="bd" colspan="10">
                            <b>Dengan ini saya menyatakan bahwa saya telah diberikan informasi secara jelas, telah memahami, dan menerima tentang hal-hal tersebut diatas</b>
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <b>Wali Pasien</b>
                          </td>
                         <td class="text-center bd " width="50%" colspan="5">
                            <b>Pasien</b>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo">Undo</button>
                              <button type="button" id="clear">Clear</button>
                              <input type='hidden' id='generate' name="ttd_wali" value=''><br/>
                            </div>
                          </td>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad1" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo1">Undo</button>
                              <button type="button" id="clear1">Clear</button>
                              <input type='hidden' id='generate1' name="ttd_pasien" value=''><br/>
                           </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left bd " width="100%" colspan="10">
                            <div class="col-md-5">
                              <b>Bertanda Tangan Untuk Pasien A.N</b>
                            </div>
                            <div class="col-md-7">
                              <input type="text" class="form-control input-sm" name="ttd_untuk_pasien"  value="" required>
                            </div>
                          </td>
                        </tr>
                        
                      </tbody>
                  </table>

                  <table width="100%">
                      <thead>
                        <tr class="text-center bdu">
                          <td width="100%" class="bd" colspan="10">
                            <b>Dengan ini saya menyatakan bahwa saya telah memberikan informasi secara benar dan jelas, dan memberi kesempatan untuk berdiskusi tentang hal-hal tersebut diatas</b>
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <b>Saksi Pihak RS</b>
                          </td>
                         <td class="text-center bd " width="50%" colspan="5">
                            <b>Pemberi Edukasi</b>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad2" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo2">Undo</button>
                              <button type="button" id="clear2">Clear</button>
                              <input type='hidden' id='generate2' name="saksi_pihak_rs" value=''><br/>
                            </div>
                          </td>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad3" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo3">Undo</button>
                              <button type="button" id="clear3">Clear</button>
                              <input type='hidden' id='generate3' name="pemberi_edukasi" value=''><br/>
                           </div>
                          </td>
                        </tr>
                        
                        
                      </tbody>
                  </table>

                </div>
              </div>
            </div>
           
          </div>
        </div>

        <!-- BATAS -->
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Tambah Data </div>
            <div class="panel-body">

              <br>
              <div class="row">
                <div class="text-center col-md-12"> 
                  <b>Persetujuan Tindakan Invasif, Bedah, Atau Tindakan Berisiko Tinggi</b>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="text-center col-md-12"> 
                  Setelah saya membaca dan diterangkan mengenai tindakan di atas, maka saya yang bertanda tangan dibawah ini :
                </div>
              </div>
              <br>

              <div class="row">

                <div class="col-md-12"> 
                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Nama</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="nama_tindakan"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Laki-laki
                                <input type="radio" name="jenis_kelamin_tindakan" value="laki-laki" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="jenis_kelamin_tindakan" value="perempuan" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="tanggal_lahir_tindakan"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="usia_tindakan"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Alamat</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="alamat_tindakan"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>No. Identitas</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="no_identitas"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-8">
                      Bertindak selaku pasien, sendiri/suami/istri/anak/orang tua/
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control input-sm" name="bertindak_selaku"  value="" required>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="text-center col-md-12"> 
                      dan penanggung jawab atau wali atas pasien, menyatakan<b> SETUJU </b>untuk dilakukan tindakan kedokteran berupa
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-12">
                      <textarea type="text" class="form-control input-sm" name="tindakan_berupa"  value="" required></textarea>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="text-center col-md-12"> 
                      <b>Terhadap :</b>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Nama</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="terhadap_nama"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-xs-5">
                      <b>Jenis Kelamin</b>
                    </div>
                    <div class="col-xs-7">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                              <label class="container">Laki-laki
                                <input type="radio" name="terhadap_jenis_kelamin" value="laki-laki" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-xs-4">
                              <label class="container">Perempuan
                                <input type="radio" name="terhadap_jenis_kelamin" value="perempuan" required>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Tanggal Lahir</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="terhadap_tanggal_lahir"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>Usia</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="terhadap_usia"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-5">
                      <b>No. MR</b>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control input-sm" name="terhadap_no_mr"  value="" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                    <div style="text-align: justify;" class="text-center col-md-12"> 
                      Saya menyatakan bahwa sesungguhnya dan tanpa paksaan bahwa.<br>
                      1. Saya telah menerima informasi jenis tindakan yang akan dilakukan.<br>
                      2. Saya mengerti bahwa tindakan tersebut mengandung beberapa resiko, termasuk perubahan tekanan darah, resiko obat (alergi), henti jantung, kerusakan otak, kelumpuhan, kerusakan syarat serta komplikasi lain yang juga mungkin terjadi bahkan kematian.<br>
                      3. Saya telah menerima penjelasan secara teliti tentang tindakan yang akan dilakukan, mengerti dan menyetujui penjelasan tentang tindakan yang akan dilakukan termasuk kemungkinan komplikasi yang mungkin terjadi serta kelebihan atau kelemahan dari setiap jenis tindakan yang dilakukan.<br>
                      4. Saya mempunyai kewajiban untuk memberi informasi kepada dokter mengenai semua penyakit dan obat yang pasien minum, seperti aspirin, pengencer darah, kontrasepsi, obat flu, narkotik, marijuana, kokain, dan lain-lain.<br>
                      5. Saya bersedia menanggung tindakan kedokteran, kecuali terhadap pihak lain yang menyatakan bertanggung jawab secara finansial terhadap tindakan ini.
                      <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan hal-hal tersebut diatas, saya enjamin sepenuhnya bahwa tindakan saya untuk menyetujui tindakan medik diatas adalah untuk mewakili kepentingan saya / pasien dan keluarga pasien, dan saya bertanggung jawab sepenuhnya apabila terhadap pihak lain yang mengajukan keberatan atas persetujuan ini.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat persetujuan ini dibuat dengan kesadaran dan tanpa paksaan dari pihak manapun juga.
                    </div>
                  </div>
                  <br>

                  <div class="row">
                      <!-- nama -->
                    <div class="col-md-3">
                      <b>Tanggal</b>
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="tanggal1" id="tanggal1" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
                    </div>
                    <div class="col-md-3">
                      <b>Jam</b>
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="jam1" id="jam1" class="form-control" value="07:00" required autocomplete="off">
                    </div>
                  </div>
                  <br>

                  <table width="100%">
                      <tbody>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <b>Wali Pasien</b>
                          </td>
                         <td class="text-center bd " width="50%" colspan="5">
                            <b>Pasien</b>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad4" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo4">Undo</button>
                              <button type="button" id="clear4">Clear</button>
                              <input type='hidden' id='generate4' name="ttd_wali_pasien" value=''><br/>
                            </div>
                          </td>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad5" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo5">Undo</button>
                              <button type="button" id="clear5">Clear</button>
                              <input type='hidden' id='generate5' name="ttd_pasien2" value=''><br/>
                           </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left bd " width="50%" colspan="5">
                            <div class="col-md-7">
                              <b>Nama Jelas Wali Pasien</b>
                            </div>
                            <div class="col-md-5">
                              <input type="text" class="form-control input-sm" name="nama_wali_pasien"  value="" required>
                            </div>
                          </td>
                          <td class="text-left bd " width="50%" colspan="5">
                            <div class="col-md-5">
                              <b>Nama Jelas Pasien</b>
                            </div>
                            <div class="col-md-7">
                              <input type="text" class="form-control input-sm" name="nama_pasien2"  value="" required>
                            </div>
                          </td>
                        </tr>

                      </tbody>
                  </table>

                  <table width="100%">
                      <tbody>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <b>Saksi Pihak RS</b>
                          </td>
                         <td class="text-center bd " width="50%" colspan="5">
                            <b>Dokter Anestesi</b>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad6" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo6">Undo</button>
                              <button type="button" id="clear6">Clear</button>
                              <input type='hidden' id='generate6' name="ttd_saksi_rs" value=''><br/>
                            </div>
                          </td>
                          <td class="text-center bd " width="50%" colspan="5">
                            <div class="col-md-12"> 
                    <!-- Signature -->
                              <div id="signature" style=''>
                                <canvas id="signature-pad7" class="signature-pad" width="250px" height="75px">
                              </div><br/>
                               
                              <button type="button" id="undo7">Undo</button>
                              <button type="button" id="clear7">Clear</button>
                              <input type='hidden' id='generate7' name="ttd_dokter" value=''><br/>
                           </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left bd " width="50%" colspan="5">
                            <div class="col-md-7">
                              <b>Nama Jelas Saksi</b>
                            </div>
                            <div class="col-md-5">
                              <input type="text" class="form-control input-sm" name="nama_saksi_rs"  value="" required>
                            </div>
                          </td>
                          <td class="text-left bd " width="50%" colspan="5">
                            <div class="col-md-5">
                              <b>Nama Jelas Dokter</b>
                            </div>
                            <div class="col-md-7">
                              <input type="text" class="form-control input-sm" name="nama_dokter"  value="" required>
                            </div>
                          </td>
                        </tr>

                      </tbody>
                  </table>



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

  $('#jam, #jam1').datetimepicker({
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

  $('#tanggal, #tanggal_lahir, #tanggal1').datetimepicker({
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
      var radioOtherRiwayat = $("input[id='radio_other_riwayat']:checked").length;
      if(radioOtherRiwayat){
          $('#text_other_riwayat').attr("disabled", false);
      }else{
        $('#text_other_riwayat').attr("disabled", true);
        $('#text_other_riwayat').val("");
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad1'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate1').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear1').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo1').addEventListener('click', function () {
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad2'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate2').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear2').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo2').addEventListener('click', function () {
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad3'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate3').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear3').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo3').addEventListener('click', function () {
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
  <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad4'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate4').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear4').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo4').addEventListener('click', function () {
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
  <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad5'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate5').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear5').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo5').addEventListener('click', function () {
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
 <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad6'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate6').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear6').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo6').addEventListener('click', function () {
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
  <script>
$(document).ready(function() {
 var signaturePad = new SignaturePad(document.getElementById('signature-pad7'));

 $('.btn-kirim-<?= $this->router->fetch_class(); ?>').click(function(){
  var data = signaturePad.toDataURL('image/png');
  $('#output').val(data);

  $("#sign_prev").show();
  $("#sign_prev").attr("src",data);
  $('#generate7').val(data);
  // Open image in the browser
  //window.open(data);
 });

 document.getElementById('clear7').addEventListener('click', function () {
    signaturePad.clear();
  });

  document.getElementById('undo7').addEventListener('click', function () {
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