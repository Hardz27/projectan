
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

      <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Asesmen Pra Anestesi</div>
        <div class="panel-body">
          <div class="col-lg-3">
            <div class="row">
              <!-- nama -->
              <div class="col-md-4">
                <b>No.RM</b>
              </div>
              <div class="col-md-8">
                <input type="text" name="no_rm" id="no_rm" class="form-control" placeholder="Nomor RM"  autocomplete="off" required>
              </div>
              <div class="col-md-4">
                <br>
                <b>Nama</b>
              </div>
              <div class="col-md-8">
                <br>
                <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien"  autocomplete="off" required >
              </div>
              <div class="col-md-4">
                <br>
                <b>Jenis Kelamin</b>
              </div>
              <div class="col-md-2">
                <br>
                <div class="text-center">L
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="jenis_kelamin" value="L" required>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <div class="text-center">P
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="jenis_kelamin" value="P" required>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5"> 
            <div class="row">
              <div class="col-md-4">
                <b>Diagnosa</b>
              </div>
              <div class="col-md-8">
                <textarea type="text" name="diagnosa" id="diagnosa" class="form-control" placeholder="Diagnosa" required=""  autocomplete="off"></textarea>
              </div>
              <div class="col-md-4">
                <br>
                <br>
                <b>Rencana Tindakan</b>
              </div>
              <div class="col-md-8">
                <br>
                <textarea type="text" name="rencana_tindakan" id="rencana_tindakan" class="form-control" placeholder="Rencana Tindakan" required=""  autocomplete="off"></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-4">  
            <div class="row">
              <!-- nama -->
              <div class="col-md-4">
                <b>Tanggal Lahir</b>
              </div>
              <div class="col-md-8">
                <input type="text" name="ttl" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required autocomplete="off">
              </div>
              <div class="col-md-4">
                <br>
                <b>Ruangan</b>
              </div>
              <div class="col-md-8">
                <br>
                <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="Ruangan" autocomplete="off" required="">
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading"><center>ANAMNESIS</center></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="row">
                <!-- nama -->
                <div class="col-md-12">
                  <b>Riwayat Anestesi/Operasi</b>
                </div>
                <div class="col-md-12">
                  <br>
                  <input type="text" name="riwayat_anestesi1" id="riwayat_anestesi1" class="form-control" placeholder="Riwayat Anestesi 1"  autocomplete="off">
                </div>
                <div class="col-md-12">
                  <br>
                  <input type="text" name="riwayat_anestesi2" id="riwayat_anestesi2" class="form-control" placeholder="Riwayat Anestesi 2"  autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="col-md-1">
                  <div class="text-center">
                    <br>
                    <label class="container checkbox-select" style="width: 2%">
                      <input type="checkbox" name="tidak_pernah_anestesi" value="tidak_pernah_anestesi" >
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-7">
                  <br>
                  <b>Tidak Pernah</b>
                </div>
              </div>
            </div>
            <div class="col-lg-1"> 
              <div class="row">
              </div>
            </div>
            <div class="col-lg-7"> 
              <div class="row">
                <div class="col-md-12">
                  <b>Gejala yang di derita saat ini</b>
                </div>
                <div class="row">
                  <div class="col-md-1">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container-checkbox checkbox-left">
                        &nbsp;&nbsp;
                        <input type="checkbox" name="batuk" value="batuk">
                        <span class="checkmark-checkbox"></span>
                      </label><p>Batuk</p>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container-checkbox checkbox-left">
                        &nbsp;&nbsp;
                        <input type="checkbox" name="pilek" value="pilek">
                        <span class="checkmark-checkbox"></span>
                      </label><p>Pilek</p>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container-checkbox checkbox-left">
                        &nbsp;&nbsp;
                        <input type="checkbox" name="demam" value="demam">
                        <span class="checkmark-checkbox"></span>
                      </label><p>Demam</p>
                    </div>
                  </div>
                  <div class="col-lg-1">
                  </div>
                  <div class="col-md-2">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container-checkbox checkbox-left">
                        &nbsp;&nbsp;
                        <input type="checkbox" name="gejala_lain" value="gejala_lain">
                        <span class="checkmark-checkbox"></span>
                      </label><p>Gejala Lain</p>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <br>
                    <input type="text" name="desc_gejala_lain" id="desc_gejala_lain" class="form-control" placeholder="Gejala Lain"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <br>
                    <b>Riwayat Alergi</b>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <input type="text" name="alergi" id="alergi" class="form-control" placeholder="Alergi" autocomplete="off">
                  </div>
                  <div class="col-md-1">
                    <div class="text-center">
                      <br>
                      <label class="container checkbox-select" style="width: 2%">
                        <input type="checkbox" name="tidak_ada_alergi" value="tidak_ada_alergi" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <br>
                    <b>Tidak ada</b>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <br>
              <b>Komplikasi Anestesi Sebelumnya</b>
            </div>
            <div class="col-lg-6">
              <br>
              <b>Riwayat Komplikasi Anestesi dalam keluarga</b>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <br>
              <input type="text" name="kompilkasi_anestesi_sebelumnya" id="kompilkasi_anestesi_sebelumnya" class="form-control" placeholder="Komplikasi Anestesi Sebelumnya"  autocomplete="off">
            </div>
            <div class="col-lg-1">
              <br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="tidak_pernah_kompilkasi_anestesi_sebelumnya" value="tidak_pernah_kompilkasi_anestesi_sebelumnya" >
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col-lg-2">
              <br>
              <b>Tidak Pernah</b>
            </div>
            <div class="col-lg-3">
              <br>
              <input type="text" name="riwayat_komplikasi_anestesi_dalam_keluarga" id="riwayat_komplikasi_anestesi_dalam_keluarga" class="form-control" placeholder="Riwayat Komplikasi Anestesi dalam keluarga"  autocomplete="off">
            </div>
            <div class="col-lg-1">
              <br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="tidak_ada_komplikasi_anestesi_dalam_keluarga" value="tidak_ada_komplikasi_anestesi_dalam_keluarga" >
                <span class="checkmark"></span>
              </label>
            </div>
            <br>
            <b>Tidak Ada</b>
          </div>
          <div class="row">
            <div class="col-md-2">
              <br>
              <b>Riwayat Penyakit : </b>
            </div>
            <div class="col-md-1">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container-checkbox checkbox-left">
                  &nbsp;&nbsp;
                  <input type="checkbox" name="asma" value="asma">
                  <span class="checkmark-checkbox"></span>
                </label><p>Asma</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container-checkbox checkbox-left">
                  &nbsp;&nbsp;
                  <input type="checkbox" name="hipertensi" value="hipertensi">
                  <span class="checkmark-checkbox"></span>
                </label><p>Hipertensi</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container-checkbox checkbox-left">
                  &nbsp;&nbsp;
                  <input type="checkbox" name="dm" value="dm">
                  <span class="checkmark-checkbox"></span>
                </label><p>DM</p>
              </div>
            </div>
            <div class="col-md-1">
             <div class="text-center" style="padding-left: 0px"><br>
              <label class="container-checkbox checkbox-left">
                &nbsp;&nbsp;
                <input type="checkbox" name="penyakit_jantung" value="penyakit_jantung">
                <span class="checkmark-checkbox"></span>
              </label><p>Penyakit Jantung</p>
            </div>
          </div>
          <div class="col-md-1">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container-checkbox checkbox-left">
                &nbsp;&nbsp;
                <input type="checkbox" name="maag" value="maag">
                <span class="checkmark-checkbox"></span>
              </label><p>Maag</p>
            </div>
          </div>
          <div class="col-md-1">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container-checkbox checkbox-left">
                &nbsp;&nbsp;
                <input type="checkbox" name="penyakit_lain" value="penyakit_lain">
                <span class="checkmark-checkbox"></span>
              </label><p>Penyakit Lain</p>
            </div>
          </div>
          <div class="col-md-4">
            <br>
            <input type="text" name="desc_penyakit_lain" id="desc_penyakit_lain" class="form-control" placeholder="Penyakit Lain"  autocomplete="off">
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12 mb-5">
                <center>
                  <b>Kebiasaan</b>
                </center>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <!-- nama -->
                  <div class="col-md-2">
                    <br>
                    <b>Merokok</b>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Tidak
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="merokok" value="tidak_merokok" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="merokok" value="ya_merokok" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <br>
                    <input type="text" name="batang_rokok" id="batang_rokok" class="form-control" placeholder="Batang"  autocomplete="off">
                  </div>
                  <div class="col-md-3">
                    <br>
                    batang/hari,   selama
                  </div>
                  <div class="col-md-2">
                    <br>
                    <input type="text" name="merokok_per_tahun" id="merokok_per_tahun" class="form-control" placeholder="Per Tahun"  autocomplete="off" >
                  </div>
                  <div class="col-md-1">
                    <br>
                    tahun
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <br>
                    <b>Alkohol</b>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Tidak
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="alkohol" value="tidak_alkohol" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="alkohol" value="ya_alkohol" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <br>
                    Frekuensi
                  </div>
                  <div class="col-md-5">
                    <br>
                    <input type="text" name="frekuensi" id="frekuensi" class="form-control" placeholder="Frekuensi"  autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-md-6"> 
                <div class="row">
                  <div class="col-md-2">
                    <br>
                    <b>Jamu/Obat</b>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Tidak
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="jamu" value="tidak_jamu" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="jamu" value="ya_jamu" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <input type="text" name="desc_ya_jamu" id="desc_ya_jamu" class="form-control" placeholder="Nama Jamu"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <br>
                    <br>
                    <b>Herbal</b>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Tidak
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="herbal" value="tidak_herbal" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="herbal" value="ya_herbal" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <input type="text" name="desc_ya_herbal" id="desc_ya_herbal" class="form-control" placeholder="Nama Herbal"  autocomplete="off">
                  </div>
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
          <div class="panel-heading"><center>OBJEKTIF</center></div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-5">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <b>Keadaan Umum</b>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center">
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="keadan_umum" value="baik" >
                            <span class="checkmark"></span>
                          </label>Baik
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center">
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="keadan_umum" value="tidak_baik" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <input type="text" name="desc_tidak_baik" id="desc_tidak_baik" class="form-control" placeholder="Keadaan Umum Lain"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>GCS</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="desc_gcs" id="desc_gcs" class="form-control" placeholder="Deskripsi GCS"  autocomplete="off">
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="pilih_gcs" value="E" >
                            <span class="checkmark"></span>
                          </label>E
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="pilih_gcs" value="M" >
                            <span class="checkmark"></span>
                          </label>M
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="pilih_gcs" value="V" >
                            <span class="checkmark"></span>
                          </label>V
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>GDS</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="gds" id="gds" class="form-control" placeholder="GDS"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <br>
                        <b>Tanda Vital</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>TD</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="td" id="td" class="form-control" placeholder="mmHg"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>HR</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="hr" id="hr" class="form-control" placeholder="mmHg"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>RR</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="rr" id="rr" class="form-control" placeholder="mmHg"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>Suhu</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="suhu" id="suhu" class="form-control" placeholder="°C"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>VAS</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="vas" id="vas" class="form-control" placeholder="Vas"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>TB</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="tb" id="tb" class="form-control" placeholder="Cm"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>BB</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="bb" id="bb" class="form-control" placeholder="Kg"  autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <b>Evaluasi Jalan Nafas</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="edema" value="edema">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <br>
                        <b>Edema</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="malformasi_mandibula" value="malformasi_mandibula">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Malformasi mandibula</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="gigi_ompong" value="gigi_ompong">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Gigi Ompong</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="suara_serak" value="suara_serak">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Suara Serak</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="gigi_palsu" value="gigi_palsu">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Gigi Palsu</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="deviasi_trakea" value="deviasi_trakea">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Deviasi Trakea</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="gigi_tonggos" value="gigi_tonggos">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Gigi Tonggos</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="makroglossi" value="makroglossi">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Makroglossi</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="mikrotia" value="mikrotia">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Mikrotia</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="dalam_batas_normal" value="dalam_batas_normal">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Dalam Batas Normal</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="janggut_kumis" value="janggut_kumis">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <b>Janggut/Kumis</b>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="text-center" style="padding-left: 0px"><br>
                          <label class="container-checkbox checkbox-left">
                            &nbsp;&nbsp;
                            <input type="checkbox" name="evaluasi_jalan_nafas_lain" value="evaluasi_jalan_nafas_lain">
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <input type="text" name="desc_evaluasi_jalan_nafas_lain" id="desc_evaluasi_jalan_nafas_lain" class="form-control" placeholder="Evaluasi Jalan Napas Lain"  autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div style="height: 380px" class="panel panel-primary">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <b>Buka Mulut 3 Cm</b>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center">
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="buka_mulut_3_cm" value="Ya" >
                            <span class="checkmark"></span>
                          </label>Ya
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center">
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="buka_mulut_3_cm" value="Tidak" >
                            <span class="checkmark"></span>
                          </label>Tidak
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6"><br>
                        <b>Thyromental Distance</b>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="thyromental" value="Ya" >
                            <span class="checkmark"></span>
                          </label>Ya
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="thyromental" value="Tidak" >
                            <span class="checkmark"></span>
                          </label>Tidak
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6"><br>
                        <b>Mallampati Score > 6.5 cm</b>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="mallampati" value="I" >
                            <span class="checkmark"></span>
                          </label> I
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="mallampati" value="II" >
                            <span class="checkmark"></span>
                          </label>II
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="mallampati" value="III" >
                            <span class="checkmark"></span>
                          </label> III
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="mallampati" value="IV" >
                            <span class="checkmark"></span>
                          </label> IV
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6"><br>
                        <b>Upper up Bite Test Class</b>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="upper_up_bite_test_class" value="1" >
                            <span class="checkmark"></span>
                          </label>1
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="upper_up_bite_test_class" value="2" >
                            <span class="checkmark"></span>
                          </label>2
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="upper_up_bite_test_class" value="3" >
                            <span class="checkmark"></span>
                          </label>3
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div style="height: 230px" class="panel panel-primary">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <center>
                          <br>
                          <b>Status Gizi</b>
                        </center>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <br>
                        <textarea style="height: 80px" type="text" name="status_gizi" id="status_gizi" class="form-control" placeholder="Status Gizi"  autocomplete="off"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-4">
            <div style="height: 470px" class="panel panel-primary">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="text-center">
                      <h3><b>KEPALA/LEHER</b></h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4"><br>
                    <b>Konjungtiva</b>
                  </div>
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="konjungtiva" value="DBN" >
                        <span class="checkmark"></span>
                      </label>DBN
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="konjungtiva" value="anemis" >
                        <span class="checkmark"></span>
                      </label>anemis
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4"><br>
                    <b>Sklera</b>
                  </div>
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="sklera" value="DBN" >
                        <span class="checkmark"></span>
                      </label>DBN
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="sklera" value="ikterus" >
                        <span class="checkmark"></span>
                      </label>ikterus
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4"><br>
                    <b>Bibir</b>
                  </div>
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="bibir" value="DBN" >
                        <span class="checkmark"></span>
                      </label>DBN
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="bibir" value="Sianosis" >
                        <span class="checkmark"></span>
                      </label>Sianosis
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4"><br>
                    <b>Massa Tumor</b>
                  </div>
                  <div class="col-lg-8"><br>
                    <input type="text" name="massa_tumor_kepala" id="massa_tumor_kepala" class="form-control" placeholder="Massa Tumor Di Kepala/Leher"  autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div style="height: 470px"  class="panel panel-primary">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="text-center">
                      <h3><b>THORAKS</b></h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="metris" value="Simetris" >
                        <span class="checkmark"></span>
                      </label>Simetris
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="metris" value="Asimetris" >
                        <span class="checkmark"></span>
                      </label>Asimetris
                    </div>
                  </div>
                  <div class="col-lg-1"><br><p>Ke</p></div>
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="posisi" value="Kiri" >
                        <span class="checkmark"></span>
                      </label>Kiri
                    </div>
                  </div>
                  <div class="col-lg-1"><br><p>/</p></div>
                  <div class="col-md-1"></div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="posisi" value="Kanan" >
                        <span class="checkmark"></span>
                      </label>Kanan
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3"><br>
                    <b>BN</b>
                  </div>
                  <div class="col-lg-7"><br>
                   <input type="text" name="bn" id="bn" class="form-control" placeholder="BN"  autocomplete="off">
                 </div>
               </div>
               <div class="row">
                <div class="col-lg-3"><br>
                  <b>ronkhl</b>
                </div>
                <div class="col-lg-4">
                  <br>
                  <input type="text" name="ronkhl" id="ronkhl" class="form-control" placeholder="ronkhl"  autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3"><br>
                  <b>Wheezing</b>
                </div>
                <div class="col-lg-4">
                  <br>
                  <input type="text" name="wheezing" id="wheezing" class="form-control" placeholder="Wheezing"  autocomplete="off">
                </div>
                <div class="col-lg-5">
                  <br>
                  <input type="text" name="lain_thoraks" id="lain_thoraks" class="form-control" placeholder="...."  autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3"><br>
                  <b>Bunyi Jantung</b>
                </div>
                <div class="col-lg-1">
                  <div class="text-center"><br>
                    <label class="container checkbox-select" style="width: 2%">
                      <input type="checkbox" name="bunyi_jantung" value="Murni" >
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-lg-2">
                  <br>
                  <p>Murni,</p>
                </div>
                <div class="col-lg-2">
                  <br>
                  <b>Reguler</b>
                </div>
                <div class="col-lg-1">
                  <div class="text-center"><br>
                    <label class="container checkbox-select" style="width: 2%">
                      <input type="checkbox" name="reguler" value="Bising" >
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-lg-2">
                  <br>
                  <p>Bising</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4"><br>
                  <b>Massa Tumor</b>
                </div>
                <div class="col-lg-8"><br>
                  <input type="text" name="massa_tumor_thoraks" id="massa_tumor_thoraks" class="form-control" placeholder="Massa Tumar Thoraks"  autocomplete="off">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="text-center">
                    <h3><b>ABDOMEN</b></h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                  <div class="text-center" style="padding-left: 0px"><br>
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;
                      <input type="checkbox" name="datar" value="datar">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-lg-4">
                  <br>
                  <b>Datar</b>
                </div>
                <div class="col-lg-2">
                  <div class="text-center" style="padding-left: 0px"><br>
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;
                      <input type="checkbox" name="distensi" value="distensi">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-lg-4">
                  <br>
                  <b>Distensi</b>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                  <div class="text-center" style="padding-left: 0px"><br>
                    <label class="container-checkbox checkbox-left">
                      &nbsp;&nbsp;
                      <input type="checkbox" name="supple" value="supple">
                      <span class="checkmark-checkbox"></span>
                    </label>
                  </div>
                </div>
                <div class="col-lg-10">
                  <br>
                  <b>Supple, ikut gerak napas</b>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                 <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="cembung" value="cembung">
                    <span class="checkmark-checkbox"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-4">
                <br>
                <b>Cembung</b>
              </div>
              <div class="col-lg-2">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="ascites" value="ascites">
                    <span class="checkmark-checkbox"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-4">
                <br>
                <b>Ascites</b>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="defans_muskuler" value="defans_muskuler">
                    <span class="checkmark-checkbox"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-10">
                <br>
                <b>Defans Muskuler</b>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="hepar_or_lien" value="Hepar" >
                    <span class="checkmark"></span>
                  </label><br><b>Hepar</b>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <br>
                <p>atau</p>
              </div>
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="hepar_or_lien" value="Lien" >
                    <span class="checkmark"></span>
                  </label><br><b>Lien</b>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="teraba_or_tidak" value="Teraba" >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <b>Teraba</b>
              </div>
              <div class="col-lg-6"><br>
                <input type="text" name="desc_teraba" id="desc_teraba" class="form-control" placeholder="Deskripsi Teraba"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="teraba_or_tidak" value="Tidak Teraba" >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-10">
                <br>
                <b>Tidak teraba</b>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4"><br>
                <b>Massa Tumor</b>
              </div>
              <div class="col-lg-8"><br>
                <input type="text" name="massa_tumor_abdomen" id="massa_tumor_abdomen" class="form-control" placeholder="Massa Tumor Abdomen"  autocomplete="off">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div  class="panel panel-primary">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-center">
                  <h5><b>UROGENITAL</b></h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-1">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="urogenital" value="DBN" >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-1">
                <br>
                <b>DBN</b>
              </div>
              <div class="col-lg-1">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="urogenital" value="Urogenital Lainnya" >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-1">
                <br>
                <p>Lainnya</p>
              </div>
              <div class="col-lg-8"><br>
                <input type="text" name="des_urogenital_lainnya" id="des_urogenital_lainnya" class="form-control" placeholder="Deskripsi Lainnya"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <br>
                <b>Kateter Urin :</b>
              </div>
              <div class="col-lg-1">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="keteter_urin" value="Terpasang" >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <p>Terpasang</p>
              </div>
              <div class="col-lg-1">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="keteter_urin" value="Tidak Terpasang" >
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <p>Tidak Terpasang</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <br>
                <b>Warna Urin :</b>
              </div>
              <div class="col-lg-1">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="warna_urin" value="Kuning Terang" >
                    <span class="checkmark"></span>
                  </label><br>Kuning Terang
                </div>
              </div>
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="warna_urin" value="Kuning Pekat" >
                    <span class="checkmark"></span>
                  </label><br>Kuning Pekat
                </div>
              </div>
              <div class="col-lg-1">
                <br>/
              </div>
              <div class="col-lg-5">
                <br>
                <input type="text" name="warna_urin_lainnya" id="warna_urin_lainnya" class="form-control" placeholder="Warna Urin Lainnya"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <br>
                <b>Volume Urin :</b>
              </div>
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="volume_urine" value="Kesan Lebih" >
                    <span class="checkmark"></span>
                  </label><br>Kesan Lebih
                </div>
              </div>
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="volume_urine" value="Cukup" >
                    <span class="checkmark"></span>
                  </label><br>Cukup
                </div>
              </div>
              <div class="col-lg-1">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="volume_urine" value="Kurang" >
                    <span class="checkmark"></span>
                  </label><br>Kurang
                </div>
              </div>
              <div class="col-lg-1">
                <br>/
              </div>
              <div class="col-lg-4">
                <br>
                <input type="text" name="volume_urine_lain" id="volume_urine_lain" class="form-control" placeholder="Volume Urin Lain"  autocomplete="off">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div style="height: 381px"  class="panel panel-primary">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-center">
                  <h5><b>EKSTREMITRAS</b></h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-1">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="dbn_ekstremitras" value="dbn_ekstremitras">
                    <span class="checkmark-checkbox"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <p>DBN</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-1">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="edema_ekstremitas" value="edema_ekstremitas">
                    <span class="checkmark-checkbox"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <p>Edema :</p>
              </div>
              <div class="col-lg-9">
                <br>
                <input type="text" name="desc_edema" id="desc_edema" class="form-control" placeholder="Deskripsi Edema"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-1">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="fraktur" value="fraktur">
                    <span class="checkmark-checkbox"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <p>Fraktur :</p>
              </div>
              <div class="col-lg-9">
                <br>
                <input type="text" name="desc_fraktur" id="desc_fraktur" class="form-control" placeholder="Deskripsi Fraktur"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-1">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="lainnya_ekstremitras" value="lainnya_ekstremitras">
                    <span class="checkmark-checkbox"></span>
                  </label>
                </div>
              </div>
              <div class="col-lg-2">
                <br>
                <p>Lainnya :</p>
              </div>
              <div class="col-lg-9">
                <br>
                <input type="text" name="desc_lainnya_ekstremitras" id="desc_lainnya_ekstremitras" class="form-control" placeholder="Deskripsi Lainnya Ekstremitras"  autocomplete="off">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div style="height: 227px" class="panel panel-primary">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-center">
                  <h5><b>PEMERIKSAAN LABORATORIUM</b></h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12"><br>
                <textarea style="height: 120px" type="text" name="pemeriksaan_laboratorium" id="pemeriksaan_laboratorium" class="form-control" placeholder="Pemeriksaan Laboratorium"  autocomplete="off"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div  class="panel panel-primary">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-center">
                  <h5><b>PEMERIKSAAN PENUNJANG LAIN</b></h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <br>
                <p>EKG :</p>
              </div>
              <div class="col-lg-10">
                <br>
                <input type="text" name="ekg" id="ekg" class="form-control" placeholder="EKG"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <br>
                <p>Ro :</p>
              </div>
              <div class="col-lg-10">
                <br>
                <input type="text" name="ro" id="ro" class="form-control" placeholder="RO"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <br>
                <p>Lainnya :</p>
              </div>
              <div class="col-lg-10">
                <br>
                <input type="text" name="pemeriksaan_penunjang_lainnya" id="pemeriksaan_penunjang_lainnya" class="form-control" placeholder="Pemeriksaan Penunjang Lainnya"  autocomplete="off">
              </div>
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
      <div class="panel-heading"><center>ASESMEN</center></div>
      <div class="panel-body">
        <div class="row">

          <div class="col-md-6">
            <div style="height: 390px" class="panel panel-primary">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-2">
                    <br>
                    <b>ASA PS :</b>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="1" >
                        <span class="checkmark"></span>
                      </label><br>1
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="2" >
                        <span class="checkmark"></span>
                      </label><br>2
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="3" >
                        <span class="checkmark"></span>
                      </label><br>3
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="4" >
                        <span class="checkmark"></span>
                      </label><br>4
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="5" >
                        <span class="checkmark"></span>
                      </label><br>5
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="6" >
                        <span class="checkmark"></span>
                      </label><br>6
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="E" >
                        <span class="checkmark"></span>
                      </label><br>E
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <br>
                    <b>Masalah/Diagnosis</b>
                  </div>
                  <div class="col-lg-9">
                    <br>
                    <input type="text" name="masalah_diagnosis" id="masalah_diagnosis" class="form-control" placeholder="Deskripsi Masalah/Diagnosis"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="penatalaksan_anestesi" value="Tidak Setuju penatalaksan anestesi" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-11">
                    <br>
                    <b>Tidak setuju penatalaksan anestesi</b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <br>
                    <p>Rencana/Usulan tindakan :</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <br>
                    <textarea style="height: 100px" type="text" name="rencana_usulan_tindakan" id="rencana_usulan_tindakan" class="form-control" placeholder="Rencana/Usulan Tindakan"  autocomplete="off"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="penatalaksan_anestesi" value="Setuju penatalaksan anestesi" >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-11">
                    <br>
                    <b>Setuju penatalaksan anestesi</b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2">
                    <br>
                    <p>Intruksi :</p>
                  </div>
                  <div class="col-lg-10">
                    <br>
                    <input type="text" name="intruksi" id="intruksi" class="form-control" placeholder="Intruksi"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Puasa :</p>
                  </div>
                  <div class="col-lg-6">
                    <br>
                    <input type="text" name="puasa" id="puasa" class="form-control" placeholder="Jam"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Pre OP ,mulai jam :</p>
                  </div>
                  <div class="col-lg-6">
                    <br>
                    <input type="text" name="pre_op" id="jam" class="form-control" value="07:00" required autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Rencana Tiba di OK Jam</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="jam_rencana_tiba_di_ok" id="jam" class="form-control" value="07:00" required autocomplete="off">
                  </div>
                  <div class="col-lg-1">
                    <br>
                    <p>Tgl</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="tanggal_rencana_tiba_di_ok" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"   required autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Rencana Operasi Jam</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="jam_rencana_operasi" id="jam" class="form-control" value="07:00" required autocomplete="off">
                  </div>
                  <div class="col-lg-1">
                    <br>
                    <p>Tgl</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="tanggal_rencana_operasi" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"   required autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Injeksi antibiotik profilaksis</p>
                  </div>
                  <div class="col-lg-7">
                    <br>
                    <input type="text" name="injeksi_antibiotik" id="injeksi_antibiotik" class="form-control" required autocomplete="off"> 1 jam pre op
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Persiapan Darah</p>
                  </div>
                  <div class="col-lg-7">
                    <br>
                    <input type="text" name="persiapan_darah" id="persiapan_darah" class="form-control" required autocomplete="off">
                  </div>
                </div>
              </div>
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
      <div class="panel-heading"><center>PERENCANAAN ANESTESI DAN SEDASI</center></div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4">
            <b>Teknik Anestesi dan Sedasi:</b>
          </div>
          <div class="col-lg-1">
            <div class="text-center">
              <label class="container radio-select" style="width: 2%">
                <input type="radio" name="teknik_anestesi_dan_sedasi" value="Sedasi" >
                <span class="checkmark"></span>
              </label><br><b>Sedasi</b>
            </div>
          </div>
          <div class="col-lg-4">
            <input type="text" name="desc_sedasi" id="desc_sedasi" class="form-control" placeholder="Sedasi"  autocomplete="off">
          </div>
          <div class="col-lg-1">
            <div class="text-center">
              <label class="container radio-select" style="width: 2%">
                <input type="radio" name="teknik_anestesi_dan_sedasi" value="PNB" >
                <span class="checkmark"></span>
              </label><br><b>PNB</b>
            </div>
          </div>
        </div>
        <div style="font-size: 12px" class="row">
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="anestesi_umum" value="Anestesi Umum" >
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div style="font-size: 14px" class="col-lg-3">
            <br>
            <p>Anestesi Umum:</p>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="ga_tiva" value="GA TIVA" >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>GA TIVA</p>
            </div>
          </div>
          <div style="font-size: 10px" class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="ga_facemask" value="GA FACEMASK" >
                <span class="checkmark"></span>
              </label><br><br><p>GA FACEMASK</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="ga_lima" value="GA LIMA" >
                <span class="checkmark"></span>
              </label><br><p>GA LMA</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="geta" value="GETA" >
                <span class="checkmark"></span>
              </label><br><p>GETA</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="gani" value="GANI" >
                <span class="checkmark"></span>
              </label><br><p>GANI</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="anestesi_regional" value="Anestesi Regional" >
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="col-lg-3">
            <br>
            <p>Anestesi Regional:</p>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="sab" value="SAB" >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>SAB</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="epirdural_regional" value="Epregional" >
                <span class="checkmark"></span>
              </label><br><p>Epirdural</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="cse" value="CSE" >
                <span class="checkmark"></span>
              </label><br><p>CSE</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="cega" value="CEGA" >
                <span class="checkmark"></span>
              </label><br><p>CEGA</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <br>
            <b>Teknik Khusus:</b>
          </div>
          <div class="col-lg-2">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="hipotensi_kendali" value="Hipotensi Kendali" >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>Hipotensi Kendali</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="lainnya_teknik_khusus" value="Lainnya Teknik Khusus" >
                <span class="checkmark"></span>
              </label><br><p>Lainnya</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <br>
            <b>Monitoring:</b>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="ekg_monitoring" value="ekg_monitoring" >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>EKG</p>
            </div>
          </div>
          <div class="col-lg-2"><br>
            <input type="text" name="desc_ekg" id="desc_ekg" class="form-control" placeholder="lead"  autocomplete="off">
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="nibp" value="NIBP" >
                <span class="checkmark"></span>
              </label><br><p>NIBP</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="spo" value="Spo2" >
                <span class="checkmark"></span>
              </label><br><p>Spo<sup>2</sup></p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="temp_et_co" value="Temp et Co2" >
                <span class="checkmark"></span>
              </label><br><p>Temp et Co<sup>2</sup></p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="cvp" value="CVP" >
                <span class="checkmark"></span>
              </label><br><p>CVP</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="art_line" value="Art Line" >
                <span class="checkmark"></span>
              </label><br><p>Art Line</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="lainnya_monitoring" value="Lainnya Monitoring" >
                <span class="checkmark"></span>
              </label><br><p>Lainnya</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <br>
            <b>Kontrol Nyeri Post Op:</b>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="iv" value="IV" >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>IV</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="epirdural_kontrol" value="Epidural" >
                <span class="checkmark"></span>
              </label><br><p>Epidural</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="lainnya_kontrol_nyeri" value="Lainnya Kontrol Nyeri" >
                <span class="checkmark"></span>
              </label><br><p>Lainnya</p>
            </div>
          </div>
          <div class="col-lg-2"><br>
            <input type="text" name="des_lainnya_kontrol_nyeri" id="des_lainnya_kontrol_nyeri" class="form-control" placeholder="Deskripsi Lainnya"  autocomplete="off">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <br>
            <b>Perawatan Pasca Anestesi:</b>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="rawat_jalan" value="Rawat Jalan" >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>Rawat Jalan</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="rawat_inap" value="Rawat Inap" >
                <span class="checkmark"></span>
              </label><br><p>Rawat Inap</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="hcu" value="HCU" >
                <span class="checkmark"></span>
              </label><br><p>HCU</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="icu" value="ICU" >
                <span class="checkmark"></span>
              </label><br><p>ICU</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="nicu" value="NICU" >
                <span class="checkmark"></span>
              </label><br><p>NICU</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel-footer text-right">
  <button class="btn btn-default btn-sm btn-batal-<?= $this->router->fetch_class(); ?>">Batal</button>
  <button type="submit" class="btn btn-primary btn-sm btn-kirim-<?= $this->router->fetch_class(); ?>">Simpan</button>
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
    console.log('masuk sini');
    $.post('<?php echo base_url(); ?>' + class_name + '/add_process/list', $(this).serialize()).done(function(data) {
      console.log(data);
      var data = JSON.parse(data);
      console.log(data);
      console.log('masuk last step');
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