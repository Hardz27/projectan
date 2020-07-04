
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
      <input type="hidden" class="form-control input-sm" name="id_notes" id="id_notes" value="<?= $result['id_notes'] ?>">
      <input type="hidden" class="form-control input-sm" name="id_visit" id="id_visit" value="<?= $result['id_visit'] ?>">

      <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 mb-5">
              <div class="btn-group-toggle" data-toggle="buttons">
                <?php foreach ($data_visit as $v) : ?>
                  <?php if ($v['id_visit'] == $result['id_visit']) { ?>
                    <?= $v['nama_dept']; ?> - <?= $v['checkin']; ?>
                  <?php } ?>
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

      <div class="panel panel-primary">
        <div class="panel-heading">Edit Data Asesmen Pra Anestesi</div>
        <div class="panel-body">
          <div class="col-lg-3">
            <div class="row">
              <!-- nama -->
              <div class="col-md-4">
                <b>No.RM</b>
              </div>
              <div class="col-md-8">
                <input type="text" name="no_rm" id="no_rm" class="form-control" placeholder="Nomor RM" value="<?= $result['no_rm']; ?>" autocomplete="off" required>
              </div>
              <div class="col-md-4">
                <br>
                <b>Nama</b>
              </div>
              <div class="col-md-8">
                <br>
                <input type="text" name="nama_pasien" id="nama_pasien" value="<?= $result['nama_pasien']; ?>" class="form-control" placeholder="Nama Pasien"  autocomplete="off" required >
              </div>
              <div class="col-md-4">
                <br>
                <b>Jenis Kelamin</b>
              </div>
              <div class="col-md-2">
                <br>
                <div class="text-center">L
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="jenis_kelamin" <?= $result['jenis_kelamin'] == 'L' ? 'checked' : ''; ?> value="L" required>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <div class="text-center">P
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="jenis_kelamin" <?= $result['jenis_kelamin'] == 'P' ? 'checked' : ''; ?> value="P" required>
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
                <textarea type="text" name="diagnosa" id="diagnosa" class="form-control"  autocomplete="off"><?= $result['diagnosa']; ?></textarea>
              </div>
              <div class="col-md-4">
                <br>
                <br>
                <b>Rencana Tindakan</b>
              </div>
              <div class="col-md-8">
                <br>
                <textarea type="text" name="rencana_tindakan" id="rencana_tindakan" class="form-control"  autocomplete="off"><?= $result['rencana_tindakan']; ?></textarea>
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
                <input type="text" name="ttl" id="ttl" class="form-control" value="<?= date('Y-m-d') ?>"  value="<?= $result['ttl']; ?>" required autocomplete="off">
              </div>
              <div class="col-md-4">
                <br>
                <b>Ruangan</b>
              </div>
              <div class="col-md-8">
                <br>
                <input type="text" name="ruangan" id="ruangan" class="form-control" value="<?= $result['ruangan']; ?>" placeholder="Ruangan" autocomplete="off" required="">
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
                  <input type="text" name="riwayat_anestesi1" id="riwayat_anestesi1" class="form-control" placeholder="Riwayat Anestesi 1" value="<?= $result['riwayat_anestesi1']; ?>" autocomplete="off">
                </div>
                <div class="col-md-12">
                  <br>
                  <input type="text" name="riwayat_anestesi2" id="riwayat_anestesi2" class="form-control" placeholder="Riwayat Anestesi 2" value="<?= $result['riwayat_anestesi2']; ?>" autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="col-md-1">
                  <div class="text-center">
                    <br>
                    <label class="container checkbox-select" style="width: 2%">
                      <input type="checkbox" name="tidak_pernah_anestesi" value="tidak_pernah_anestesi" <?= $result['tidak_pernah_anestesi'] == 'tidak_pernah_anestesi' ? 'checked' : ''; ?> >
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
                        <input type="checkbox" name="batuk" value="batuk" <?= $result['batuk'] == 'batuk' ? 'checked' : ''; ?>>
                        <span class="checkmark-checkbox"></span>
                      </label><p>Batuk</p>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container-checkbox checkbox-left">
                        &nbsp;&nbsp;
                        <input type="checkbox" name="pilek" value="pilek" <?= $result['pilek'] == 'pilek' ? 'checked' : ''; ?>>
                        <span class="checkmark-checkbox"></span>
                      </label><p>Pilek</p>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="text-center" style="padding-left: 0px"><br>
                      <label class="container-checkbox checkbox-left">
                        &nbsp;&nbsp;
                        <input type="checkbox" name="demam" value="demam" <?= $result['demam'] == 'demam' ? 'checked' : ''; ?>>
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
                        <input type="checkbox" name="gejala_lain" value="gejala_lain" <?= $result['gejala_lain'] == 'gejala_lain' ? 'checked' : ''; ?>  >
                        <span class="checkmark-checkbox"></span>
                      </label><p>Gejala Lain</p>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <br>
                    <input type="text" name="desc_gejala_lain" id="desc_gejala_lain" value="<?= $result['desc_gejala_lain']; ?>" class="form-control" placeholder="Gejala Lain"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <br>
                    <b>Riwayat Alergi</b>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <input type="text" name="alergi" id="alergi" value="<?= $result['alergi']; ?>" class="form-control" placeholder="Alergi" autocomplete="off">
                  </div>
                  <div class="col-md-1">
                    <div class="text-center">
                      <br>
                      <label class="container checkbox-select" style="width: 2%">
                        <input type="checkbox" name="tidak_ada_alergi" value="tidak_ada_alergi" <?= $result['tidak_ada_alergi'] == 'tidak_ada_alergi' ? 'checked' : ''; ?> >
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
              <input type="text" name="kompilkasi_anestesi_sebelumnya" id="kompilkasi_anestesi_sebelumnya" class="form-control" placeholder="Komplikasi Anestesi Sebelumnya" value="<?= $result['kompilkasi_anestesi_sebelumnya']; ?>" autocomplete="off">
            </div>
            <div class="col-lg-1">
              <br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="tidak_pernah_kompilkasi_anestesi_sebelumnya" value="tidak_pernah_kompilkasi_anestesi_sebelumnya" <?= $result['tidak_pernah_kompilkasi_anestesi_sebelumnya'] == 'tidak_pernah_kompilkasi_anestesi_sebelumnya' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col-lg-2">
              <br>
              <b>Tidak Pernah</b>
            </div>
            <div class="col-lg-3">
              <br>
              <input type="text" name="riwayat_komplikasi_anestesi_dalam_keluarga" id="riwayat_komplikasi_anestesi_dalam_keluarga" value="<?= $result['riwayat_komplikasi_anestesi_dalam_keluarga']; ?>" class="form-control" placeholder="Riwayat Komplikasi Anestesi dalam keluarga"  autocomplete="off">
            </div>
            <div class="col-lg-1">
              <br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="tidak_ada_komplikasi_anestesi_dalam_keluarga" value="tidak_ada_komplikasi_anestesi_dalam_keluarga" <?= $result['tidak_ada_komplikasi_anestesi_dalam_keluarga'] == 'tidak_ada_komplikasi_anestesi_dalam_keluarga' ? 'checked' : ''; ?> >
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
                  <input type="checkbox" name="asma" value="asma" <?= $result['asma'] == 'asma' ? 'checked' : ''; ?> >
                  <span class="checkmark-checkbox"></span>
                </label><p>Asma</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container-checkbox checkbox-left">
                  &nbsp;&nbsp;
                  <input type="checkbox" name="hipertensi" value="hipertensi" <?= $result['hipertensi'] == 'hipertensi' ? 'checked' : ''; ?>>
                  <span class="checkmark-checkbox"></span>
                </label><p>Hipertensi</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="text-center" style="padding-left: 0px"><br>
                <label class="container-checkbox checkbox-left">
                  &nbsp;&nbsp;
                  <input type="checkbox" name="dm" value="dm" <?= $result['dm'] == 'dm' ? 'checked' : ''; ?>>
                  <span class="checkmark-checkbox"></span>
                </label><p>DM</p>
              </div>
            </div>
            <div class="col-md-1">
             <div class="text-center" style="padding-left: 0px"><br>
              <label class="container-checkbox checkbox-left">
                &nbsp;&nbsp;
                <input type="checkbox" name="penyakit_jantung" value="penyakit_jantung" <?= $result['penyakit_jantung'] == 'penyakit_jantung' ? 'checked' : ''; ?>>
                <span class="checkmark-checkbox"></span>
              </label><p>Penyakit Jantung</p>
            </div>
          </div>
          <div class="col-md-1">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container-checkbox checkbox-left">
                &nbsp;&nbsp;
                <input type="checkbox" name="maag" value="maag" <?= $result['maag'] == 'maag' ? 'checked' : ''; ?>>
                <span class="checkmark-checkbox"></span>
              </label><p>Maag</p>
            </div>
          </div>
          <div class="col-md-1">
            <div class="text-center" style="padding-left: 0px"><br>
              <label class="container-checkbox checkbox-left">
                &nbsp;&nbsp;
                <input type="checkbox" name="penyakit_lain" value="penyakit_lain" <?= $result['penyakit_lain'] == 'penyakit_lain' ? 'checked' : ''; ?>>
                <span class="checkmark-checkbox"></span>
              </label><p>Penyakit Lain</p>
            </div>
          </div>
          <div class="col-md-4">
            <br>
            <input type="text" name="desc_penyakit_lain" id="desc_penyakit_lain" value="<?= $result['desc_penyakit_lain']; ?>" class="form-control" placeholder="Penyakit Lain"  autocomplete="off">
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
                        <input type="radio" name="merokok" value="tidak_merokok" <?= $result['merokok'] == 'tidak_merokok' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="merokok" value="ya_merokok" <?= $result['merokok'] == 'ya_merokok' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <br>
                    <input type="text" name="batang_rokok" id="batang_rokok" value="<?= $result['batang_rokok']; ?>" class="form-control" placeholder="Batang"  autocomplete="off">
                  </div>
                  <div class="col-md-3">
                    <br>
                    batang/hari,   selama
                  </div>
                  <div class="col-md-2">
                    <br>
                    <input type="text" name="merokok_per_tahun" id="merokok_per_tahun" value="<?= $result['merokok_per_tahun']; ?>" class="form-control" placeholder="Per Tahun"  autocomplete="off" >
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
                        <input type="radio" name="alkohol" value="tidak_alkohol" <?= $result['alkohol'] == 'tidak_alkohol' ? 'checked' : ''; ?>>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="alkohol" value="ya_alkohol" <?= $result['alkohol'] == 'ya_alkohol' ? 'checked' : ''; ?>>
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
                    <input type="text" name="frekuensi" id="frekuensi" value="<?= $result['frekuensi']; ?>" class="form-control" placeholder="Frekuensi"  autocomplete="off">
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
                        <input type="radio" name="jamu" value="tidak_jamu" <?= $result['jamu'] == 'tidak_jamu' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="jamu" value="ya_jamu" <?= $result['jamu'] == 'ya_jamu' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <input type="text" name="desc_ya_jamu" id="desc_ya_jamu" value="<?= $result['desc_ya_jamu']; ?>" class="form-control" placeholder="Nama Jamu"  autocomplete="off">
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
                        <input type="radio" name="herbal" value="tidak_herbal" <?= $result['herbal'] == 'tidak_herbal' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <br>
                    <div class="text-center">Ya
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="herbal" value="ya_herbal" <?= $result['herbal'] == 'ya_herbal' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <br>
                    <input type="text" name="desc_ya_herbal" id="desc_ya_herbal" value="<?= $result['desc_ya_herbal']; ?>" class="form-control" placeholder="Nama Herbal"  autocomplete="off">
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
                            <input type="radio" name="keadan_umum" value="baik" <?= $result['keadan_umum'] == 'baik' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>Baik
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center">
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="keadan_umum" value="tidak_baik" <?= $result['keadan_umum'] == 'tidak_baik' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <input type="text" name="desc_tidak_baik" id="desc_tidak_baik" value="<?= $result['desc_tidak_baik']; ?>" class="form-control" placeholder="Keadaan Umum Lain"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>GCS</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="desc_gcs" id="desc_gcs" value="<?= $result['desc_gcs']; ?>" class="form-control" placeholder="Deskripsi GCS"  autocomplete="off">
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="pilih_gcs" value="E" <?= $result['pilih_gcs'] == 'E' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>E
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="pilih_gcs" value="M" <?= $result['pilih_gcs'] == 'M' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>M
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="pilih_gcs" value="V" <?= $result['pilih_gcs'] == 'V' ? 'checked' : ''; ?> >
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
                        <input type="text" name="gds" id="gds" value="<?= $result['gds']; ?>" class="form-control" placeholder="GDS"  autocomplete="off">
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
                        <input type="text" name="td" id="td" class="form-control" value="<?= $result['td']; ?>" placeholder="mmHg"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>HR</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="hr" id="hr" class="form-control" value="<?= $result['hr']; ?>" placeholder="mmHg"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>RR</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="rr" id="rr" class="form-control" value="<?= $result['rr']; ?>" placeholder="mmHg"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>Suhu</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="suhu" id="suhu" class="form-control" value="<?= $result['suhu']; ?>" placeholder="°C"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>VAS</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="vas" id="vas" class="form-control" value="<?= $result['vas']; ?>" placeholder="Vas"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>TB</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="tb" id="tb" class="form-control" value="<?= $result['tb']; ?>" placeholder="Cm"  autocomplete="off">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <br>
                        <b>BB</b>
                      </div>
                      <div class="col-lg-5">
                        <br>
                        <input type="text" name="bb" id="bb" class="form-control" value="<?= $result['bb']; ?>" placeholder="Kg"  autocomplete="off">
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
                            <input type="checkbox" name="edema" value="edema" <?= $result['edema'] == 'edema' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="malformasi_mandibula" value="malformasi_mandibula" <?= $result['malformasi_mandibula'] == 'malformasi_mandibula' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="gigi_ompong" value="gigi_ompong" <?= $result['gigi_ompong'] == 'gigi_ompong' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="suara_serak" value="suara_serak" <?= $result['suara_serak'] == 'suara_serak' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="gigi_palsu" value="gigi_palsu" <?= $result['gigi_palsu'] == 'gigi_palsu' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="deviasi_trakea" value="deviasi_trakea" <?= $result['deviasi_trakea'] == 'deviasi_trakea' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="gigi_tonggos" value="gigi_tonggos" <?= $result['gigi_tonggos'] == 'gigi_tonggos' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="makroglossi" value="makroglossi" <?= $result['makroglossi'] == 'makroglossi' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="mikrotia" value="mikrotia" <?= $result['mikrotia'] == 'mikrotia' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="dalam_batas_normal" value="dalam_batas_normal" <?= $result['dalam_batas_normal'] == 'dalam_batas_normal' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="janggut_kumis" value="janggut_kumis" <?= $result['janggut_kumis'] == 'janggut_kumis' ? 'checked' : ''; ?>>
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
                            <input type="checkbox" name="evaluasi_jalan_nafas_lain" value="evaluasi_jalan_nafas_lain" <?= $result['evaluasi_jalan_nafas_lain'] == 'evaluasi_jalan_nafas_lain' ? 'checked' : ''; ?>>
                            <span class="checkmark-checkbox"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <br>
                        <input type="text" name="desc_evaluasi_jalan_nafas_lain" id="desc_evaluasi_jalan_nafas_lain" class="form-control" placeholder="Evaluasi Jalan Napas Lain" value="<?= $result['desc_evaluasi_jalan_nafas_lain']; ?>"  autocomplete="off">
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
                            <input type="radio" name="buka_mulut_3_cm" value="Ya" <?= $result['buka_mulut_3_cm'] == 'Ya' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>Ya
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center">
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="buka_mulut_3_cm" value="Tidak" <?= $result['buka_mulut_3_cm'] == 'Tidak' ? 'checked' : ''; ?> >
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
                            <input type="radio" name="thyromental" value="Ya" <?= $result['thyromental'] == 'Ya' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>Ya
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="thyromental" value="Tidak" <?= $result['thyromental'] == 'Tidak' ? 'checked' : ''; ?> >
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
                            <input type="radio" name="mallampati" value="I" <?= $result['mallampati'] == 'I' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label> I
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="mallampati" value="II" <?= $result['mallampati'] == 'II' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>II
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="mallampati" value="III" <?= $result['mallampati'] == 'III' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label> III
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="mallampati" value="IV" <?= $result['mallampati'] == 'IV' ? 'checked' : ''; ?> >
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
                            <input type="radio" name="upper_up_bite_test_class" value="1" <?= $result['upper_up_bite_test_class'] == '1' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>1
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="upper_up_bite_test_class" value="2" <?= $result['upper_up_bite_test_class'] == '2' ? 'checked' : ''; ?> >
                            <span class="checkmark"></span>
                          </label>2
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="text-center"><br>
                          <label class="container radio-select" style="width: 2%">
                            <input type="radio" name="upper_up_bite_test_class" value="3" <?= $result['upper_up_bite_test_class'] == '3' ? 'checked' : ''; ?> >
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
                        <textarea style="height: 80px" type="text" name="status_gizi" id="status_gizi" class="form-control" placeholder="Status Gizi"  autocomplete="off"><?= $result['status_gizi']; ?></textarea>
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
                        <input type="radio" name="konjungtiva" value="DBN" <?= $result['konjungtiva'] == 'DBN' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>DBN
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="konjungtiva" value="anemis" <?= $result['konjungtiva'] == 'anemis' ? 'checked' : ''; ?> >
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
                        <input type="radio" name="sklera" value="DBN" <?= $result['sklera'] == 'DBN' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>DBN
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="sklera" value="ikterus" <?= $result['sklera'] == 'ikterus' ? 'checked' : ''; ?>  >
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
                        <input type="radio" name="bibir" value="DBN" <?= $result['bibir'] == 'DBN' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>DBN
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="bibir" value="Sianosis" <?= $result['bibir'] == 'Sianosis' ? 'checked' : ''; ?> >
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
                    <input type="text" name="massa_tumor_kepala" id="massa_tumor_kepala" value="<?= $result['massa_tumor_kepala']; ?>" class="form-control" placeholder="Massa Tumor Di Kepala/Leher"  autocomplete="off">
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
                        <input type="radio" name="metris" value="Simetris" <?= $result['metris'] == 'Simetris' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>Simetris
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="metris" value="Asimetris" <?= $result['metris'] == 'Asimetris' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>Asimetris
                    </div>
                  </div>
                  <div class="col-lg-1"><br><p>Ke</p></div>
                  <div class="col-lg-2">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="posisi" value="Kiri" <?= $result['posisi'] == 'Kiri' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label>Kiri
                    </div>
                  </div>
                  <div class="col-lg-1"><br><p>/</p></div>
                  <div class="col-md-1"></div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="posisi" value="Kanan" <?= $result['posisi'] == 'Kanan' ? 'checked' : ''; ?> >
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
                   <input type="text" name="bn" id="bn" class="form-control"  value="<?= $result['bn']; ?>" placeholder="BN"  autocomplete="off">
                 </div>
               </div>
               <div class="row">
                <div class="col-lg-3"><br>
                  <b>ronkhl</b>
                </div>
                <div class="col-lg-4">
                  <br>
                  <input type="text" name="ronkhl" id="ronkhl" class="form-control" value="<?= $result['ronkhl']; ?>" placeholder="ronkhl"  autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3"><br>
                  <b>Wheezing</b>
                </div>
                <div class="col-lg-4">
                  <br>
                  <input type="text" name="wheezing" id="wheezing" class="form-control" value="<?= $result['wheezing']; ?>" placeholder="Wheezing"  autocomplete="off">
                </div>
                <div class="col-lg-5">
                  <br>
                  <input type="text" name="lain_thoraks" value="<?= $result['lain_thoraks']; ?>" id="lain_thoraks" class="form-control" placeholder="...."  autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3"><br>
                  <b>Bunyi Jantung</b>
                </div>
                <div class="col-lg-1">
                  <div class="text-center"><br>
                    <label class="container checkbox-select" style="width: 2%">
                      <input type="checkbox" name="bunyi_jantung" value="Murni" <?= $result['bunyi_jantung'] == 'Murni' ? 'checked' : ''; ?> >
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
                      <input type="checkbox" name="reguler" value="Bising" <?= $result['reguler'] == 'Bising' ? 'checked' : ''; ?> >
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
                  <input type="text" name="massa_tumor_thoraks" value="<?= $result['massa_tumor_thoraks']; ?>" id="massa_tumor_thoraks" class="form-control" placeholder="Massa Tumar Thoraks"  autocomplete="off">
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
                      <input type="checkbox" name="datar" value="datar" <?= $result['datar'] == 'datar' ? 'checked' : ''; ?>>
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
                      <input type="checkbox" name="distensi" value="distensi" <?= $result['distensi'] == 'distensi' ? 'checked' : ''; ?>>
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
                      <input type="checkbox" name="supple" value="supple" <?= $result['supple'] == 'supple' ? 'checked' : ''; ?>>
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
                    <input type="checkbox" name="cembung" value="cembung" <?= $result['cembung'] == 'cembung' ? 'checked' : ''; ?>>
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
                    <input type="checkbox" name="ascites" value="ascites" <?= $result['ascites'] == 'ascites' ? 'checked' : ''; ?>>
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
                    <input type="checkbox" name="defans_muskuler" value="defans_muskuler" <?= $result['defans_muskuler'] == 'defans_muskuler' ? 'checked' : ''; ?>>
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
                    <input type="radio" name="hepar_or_lien" value="Hepar" <?= $result['hepar_or_lien'] == 'Hepar' ? 'checked' : ''; ?> >
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
                    <input type="radio" name="hepar_or_lien" value="Lien" <?= $result['hepar_or_lien'] == 'Lien' ? 'checked' : ''; ?> >
                    <span class="checkmark"></span>
                  </label><br><b>Lien</b>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="teraba_or_tidak" value="Teraba" <?= $result['teraba_or_tidak'] == 'Teraba' ? 'checked' : ''; ?> >
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
                    <input type="radio" name="teraba_or_tidak" value="Tidak Teraba" <?= $result['teraba_or_tidak'] == 'Tidak Teraba' ? 'checked' : ''; ?> >
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
                <input type="text" name="massa_tumor_abdomen" value="<?= $result['massa_tumor_abdomen']; ?>" id="massa_tumor_abdomen" class="form-control" placeholder="Massa Tumor Abdomen"  autocomplete="off">
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
                    <input type="radio" name="urogenital" value="DBN" <?= $result['urogenital'] == 'DBN' ? 'checked' : ''; ?> >
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
                    <input type="radio" name="urogenital" value="Urogenital Lainnya" <?= $result['urogenital'] == 'Urogenital Lainnya' ? 'checked' : ''; ?> >
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
                    <input type="radio" name="keteter_urin" value="Terpasang" <?= $result['keteter_urin'] == 'Terpasang' ? 'checked' : ''; ?> >
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
                    <input type="radio" name="keteter_urin" value="Tidak Terpasang" <?= $result['keteter_urin'] == 'Tidak Terpasang' ? 'checked' : ''; ?> >
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
                    <input type="radio" name="warna_urin" value="Kuning Terang" <?= $result['warna_urin'] == 'Kuning Terang' ? 'checked' : ''; ?> >
                    <span class="checkmark"></span>
                  </label><br>Kuning Terang
                </div>
              </div>
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="warna_urin" value="Kuning Pekat" <?= $result['warna_urin'] == 'Kuning Pekat' ? 'checked' : ''; ?> >
                    <span class="checkmark"></span>
                  </label><br>Kuning Pekat
                </div>
              </div>
              <div class="col-lg-1">
                <br>/
              </div>
              <div class="col-lg-5">
                <br>
                <input type="text" name="warna_urin_lainnya" value="<?= $result['warna_urin_lainnya']; ?>" id="warna_urin_lainnya" class="form-control" placeholder="Warna Urin Lainnya"  autocomplete="off">
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
                    <input type="radio" name="volume_urine" value="Kesan Lebih" <?= $result['volume_urine'] == 'Kesan Lebih' ? 'checked' : ''; ?> >
                    <span class="checkmark"></span>
                  </label><br>Kesan Lebih
                </div>
              </div>
              <div class="col-lg-2">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="volume_urine" value="Cukup" <?= $result['volume_urine'] == 'Cukup' ? 'checked' : ''; ?> >
                    <span class="checkmark"></span>
                  </label><br>Cukup
                </div>
              </div>
              <div class="col-lg-1">
                <div class="text-center"><br>
                  <label class="container radio-select" style="width: 2%">
                    <input type="radio" name="volume_urine" value="Kurang" <?= $result['volume_urine'] == 'Kurang' ? 'checked' : ''; ?> >
                    <span class="checkmark"></span>
                  </label><br>Kurang
                </div>
              </div>
              <div class="col-lg-1">
                <br>/
              </div>
              <div class="col-lg-4">
                <br>
                <input type="text" name="volume_urine_lain" value="<?= $result['volume_urine_lain']; ?>" id="volume_urine_lain" class="form-control" placeholder="Volume Urin Lain"  autocomplete="off">
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
                    <input type="checkbox" name="dbn_ekstremitras" value="dbn_ekstremitras" <?= $result['dbn_ekstremitras'] == 'dbn_ekstremitras' ? 'checked' : ''; ?>>
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
                    <input type="checkbox" name="edema_ekstremitas" value="edema_ekstremitas" <?= $result['edema_ekstremitas'] == 'edema_ekstremitas' ? 'checked' : ''; ?>>
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
                <input type="text" name="desc_edema" id="desc_edema" value="<?= $result['desc_edema']; ?>" class="form-control" placeholder="Deskripsi Edema"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-1">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="fraktur" value="fraktur" <?= $result['fraktur'] == 'fraktur' ? 'checked' : ''; ?>>
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
                <input type="text" name="desc_fraktur" value="<?= $result['desc_fraktur']; ?>" id="desc_fraktur" class="form-control" placeholder="Deskripsi Fraktur"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-1">
                <div class="text-center" style="padding-left: 0px"><br>
                  <label class="container-checkbox checkbox-left">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="lainnya_ekstremitras" value="lainnya_ekstremitras" <?= $result['lainnya_ekstremitras'] == 'lainnya_ekstremitras' ? 'checked' : ''; ?>>
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
                <input type="text" name="desc_lainnya_ekstremitras" value="<?= $result['desc_lainnya_ekstremitras']; ?>" id="desc_lainnya_ekstremitras"  class="form-control" placeholder="Deskripsi Lainnya Ekstremitras"  autocomplete="off">
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
                <textarea style="height: 120px" type="text" name="pemeriksaan_laboratorium" id="pemeriksaan_laboratorium" class="form-control" placeholder="Pemeriksaan Laboratorium"  autocomplete="off"><?= $result['pemeriksaan_laboratorium']; ?></textarea>
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
                <input type="text" name="ekg" id="ekg" class="form-control" value="<?= $result['ekg']; ?>" placeholder="EKG"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <br>
                <p>Ro :</p>
              </div>
              <div class="col-lg-10">
                <br>
                <input type="text" name="ro" id="ro" class="form-control" value="<?= $result['ro']; ?>" placeholder="RO"  autocomplete="off">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <br>
                <p>Lainnya :</p>
              </div>
              <div class="col-lg-10">
                <br>
                <input type="text" name="pemeriksaan_penunjang_lainnya" value="<?= $result['pemeriksaan_penunjang_lainnya']; ?>" id="pemeriksaan_penunjang_lainnya" class="form-control" placeholder="Pemeriksaan Penunjang Lainnya"  autocomplete="off">
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
                        <input type="radio" name="asa_ps" value="1" <?= $result['asa_ps'] == '1' ? 'checked' : ''; ?> >
                        <span class="checkmark"></span>
                      </label><br>1
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="2" <?= $result['asa_ps'] == '2' ? 'checked' : ''; ?>>
                        <span class="checkmark"></span>
                      </label><br>2
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="3" <?= $result['asa_ps'] == '3' ? 'checked' : ''; ?>>
                        <span class="checkmark"></span>
                      </label><br>3
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="4" <?= $result['asa_ps'] == '4' ? 'checked' : ''; ?>>
                        <span class="checkmark"></span>
                      </label><br>4
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="5" <?= $result['asa_ps'] == '5' ? 'checked' : ''; ?>>
                        <span class="checkmark"></span>
                      </label><br>5
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="6" <?= $result['asa_ps'] == '6' ? 'checked' : ''; ?>>
                        <span class="checkmark"></span>
                      </label><br>6
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="asa_ps" value="E" <?= $result['asa_ps'] == 'E' ? 'checked' : ''; ?>>
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
                    <input type="text" name="masalah_diagnosis" id="masalah_diagnosis" value="<?= $result['masalah_diagnosis']; ?>" class="form-control" placeholder="Deskripsi Masalah/Diagnosis"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-1">
                    <div class="text-center"><br>
                      <label class="container radio-select" style="width: 2%">
                        <input type="radio" name="penatalaksan_anestesi" value="Tidak Setuju penatalaksan anestesi" <?= $result['penatalaksan_anestesi'] == 'Tidak Setuju penatalaksan anestesi' ? 'checked' : ''; ?>>
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
                    <textarea style="height: 100px" type="text" name="rencana_usulan_tindakan" id="rencana_usulan_tindakan" class="form-control" placeholder="Rencana Tindakan"  autocomplete="off"><?= $result['rencana_usulan_tindakan']; ?></textarea>
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
                        <input type="radio" name="penatalaksan_anestesi" value="Setuju penatalaksan anestesi" <?= $result['penatalaksan_anestesi'] == 'Setuju penatalaksan anestesi' ? 'checked' : ''; ?> >
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
                    <input type="text" name="intruksi" id="intruksi" value="<?= $result['intruksi']; ?>" class="form-control" placeholder="Intruksi"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Puasa :</p>
                  </div>
                  <div class="col-lg-6">
                    <br>
                    <input type="text" name="puasa" id="puasa" class="form-control" value="<?= $result['puasa']; ?>" placeholder="Jam"  autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Pre OP ,mulai jam :</p>
                  </div>
                  <div class="col-lg-6">
                    <br>
                    <input type="text" name="pre_op" id="jam" class="form-control" value="<?= $result['pre_op']; ?>" required autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Rencana Tiba di OK Jam</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="jam_rencana_tiba_di_ok" id="jam" class="form-control" value="<?= $result['jam_rencana_tiba_di_ok']; ?>" required autocomplete="off">
                  </div>
                  <div class="col-lg-1">
                    <br>
                    <p>Tgl</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="tanggal_rencana_tiba_di_ok" id="tanggal" class="form-control" value="<?= $result['tanggal_rencana_tiba_di_ok']; ?>" required autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Rencana Operasi Jam</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="jam_rencana_operasi" value="<?= $result['jam_rencana_operasi']; ?>" id="jam" class="form-control" required autocomplete="off">
                  </div>
                  <div class="col-lg-1">
                    <br>
                    <p>Tgl</p>
                  </div>
                  <div class="col-lg-3">
                    <br>
                    <input type="text" name="tanggal_rencana_operasi" value="<?= $result['tanggal_rencana_operasi']; ?>" id="tanggal" class="form-control"  required autocomplete="off">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Injeksi antibiotik profilaksis</p>
                  </div>
                  <div class="col-lg-7">
                    <br>
                    <input type="text" name="injeksi_antibiotik" value="<?= $result['injeksi_antibiotik']; ?>" id="injeksi_antibiotik" class="form-control" required autocomplete="off"> 1 jam pre op
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <br>
                    <p>Persiapan Darah</p>
                  </div>
                  <div class="col-lg-7">
                    <br>
                    <input type="text" name="persiapan_darah" id="persiapan_darah" value="<?= $result['persiapan_darah']; ?>" class="form-control" required autocomplete="off">
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
                <input type="radio" name="teknik_anestesi_dan_sedasi" value="Sedasi" <?= $result['teknik_anestesi_dan_sedasi'] == 'Sedasi' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><b>Sedasi</b>
            </div>
          </div>
          <div class="col-lg-4">
            <input type="text" name="desc_sedasi" id="desc_sedasi" class="form-control" value="<?= $result['desc_sedasi']; ?>" placeholder="Sedasi"  autocomplete="off">
          </div>
          <div class="col-lg-1">
            <div class="text-center">
              <label class="container radio-select" style="width: 2%">
                <input type="radio" name="teknik_anestesi_dan_sedasi" value="PNB" <?= $result['teknik_anestesi_dan_sedasi'] == 'PNB' ? 'checked' : ''; ?>>
                <span class="checkmark"></span>
              </label><br><b>PNB</b>
            </div>
          </div>
        </div>
        <div style="font-size: 12px" class="row">
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="anestesi_umum" value="Anestesi Umum" <?= $result['anestesi_umum'] == 'Anestesi Umum' ? 'checked' : ''; ?> >
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
                <input type="checkbox" name="ga_tiva" value="GA TIVA" <?= $result['ga_tiva'] == 'GA TIVA' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>GA TIVA</p>
            </div>
          </div>
          <div style="font-size: 10px" class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="ga_facemask" value="GA FACEMASK" <?= $result['ga_facemask'] == 'GA FACEMASK' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><br><p>GA FACEMASK</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="ga_lima" value="GA LIMA" <?= $result['ga_lima'] == 'GA LIMA' ? 'checked' : ''; ?>>
                <span class="checkmark"></span>
              </label><br><p>GA LIMA</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="geta" value="GETA" <?= $result['geta'] == 'GETA' ? 'checked' : ''; ?>>
                <span class="checkmark"></span>
              </label><br><p>GETA</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="gani" value="GANI" <?= $result['gani'] == 'GANI' ? 'checked' : ''; ?>>
                <span class="checkmark"></span>
              </label><br><p>GANI</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="anestesi_regional" value="Anestesi Regional" <?= $result['anestesi_regional'] == 'Anestesi Regional' ? 'checked' : ''; ?> >
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
                <input type="checkbox" name="sab" value="SAB" <?= $result['sab'] == 'SAB' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>SAB</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="epirdural_regional" value="Epregional" <?= $result['epirdural_regional'] == 'Epregional' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>Epirdural</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="cse" value="CSE" <?= $result['cse'] == 'CSE' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>CSE</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="cega" value="CEGA" <?= $result['cega'] == 'CEGA' ? 'checked' : ''; ?> >
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
                <input type="checkbox" name="hipotensi_kendali" value="Hipotensi Kendali" <?= $result['hipotensi_kendali'] == 'Hipotensi Kendali' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>Hipotensi Kendali</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="lainnya_teknik_khusus" value="Lainnya Teknik Khusus" <?= $result['lainnya_teknik_khusus'] == 'Lainnya Teknik Khusus' ? 'checked' : ''; ?> >
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
                <input type="checkbox" name="ekg_monitoring" value="ekg_monitoring" <?= $result['ekg_monitoring'] == 'ekg_monitoring' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>EKG</p>
            </div>
          </div>
          <div class="col-lg-2"><br>
            <input type="text" name="desc_ekg" id="desc_ekg" value="<?= $result['desc_ekg'] ?>" class="form-control" placeholder="lead"  autocomplete="off">
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="nibp" value="NIBP" <?= $result['nibp'] == 'NIBP' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>NIBP</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="spo" value="Spo2" <?= $result['spo'] == 'Spo2' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>Spo<sup>2</sup></p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="temp_et_co" value="Temp et Co2" <?= $result['temp_et_co'] == 'Temp et Co2' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>Temp et Co<sup>2</sup></p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="cvp" value="CVP" <?= $result['cvp'] == 'CVP' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>CVP</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="art_line" value="Art Line" <?= $result['art_line'] == 'Art Line' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>Art Line</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="lainnya_monitoring" value="Lainnya Monitoring" <?= $result['lainnya_monitoring'] == 'Lainnya Monitoring' ? 'checked' : ''; ?> >
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
                <input type="checkbox" name="iv" value="IV" <?= $result['iv'] == 'IV' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>IV</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="epirdural_kontrol" value="Epidural" <?= $result['epirdural_kontrol'] == 'Epidural' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>Epidural</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="lainnya_kontrol_nyeri" value="Lainnya Kontrol Nyeri" <?= $result['lainnya_kontrol_nyeri'] == 'Lainnya Kontrol Nyeri' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>Lainnya</p>
            </div>
          </div>
          <div class="col-lg-2"><br>
            <input type="text" name="des_lainnya_kontrol_nyeri" value="<?= $result['des_lainnya_kontrol_nyeri'] ?>" id="des_lainnya_kontrol_nyeri" class="form-control" placeholder="Deskripsi Lainnya"  autocomplete="off">
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
                <input type="checkbox" name="rawat_jalan" value="Rawat Jalan" <?= $result['rawat_jalan'] == 'Rawat Jalan' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label>
              <br>
              <p>Rawat Jalan</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="rawat_inap" value="Rawat Inap" <?= $result['rawat_inap'] == 'Rawat Inap' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>Rawat Inap</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="hcu" value="HCU" <?= $result['hcu'] == 'HCU' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>HCU</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="icu" value="ICU" <?= $result['icu'] == 'ICU' ? 'checked' : ''; ?> >
                <span class="checkmark"></span>
              </label><br><p>ICU</p>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="text-center"><br>
              <label class="container checkbox-select" style="width: 2%">
                <input type="checkbox" name="nicu" value="NICU" <?= $result['nicu'] == 'NICU' ? 'checked' : ''; ?> >
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

    $.post('<?php echo base_url(); ?>' + class_name + '/edit_process/list', $(this).serialize()).done(function(data) {
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