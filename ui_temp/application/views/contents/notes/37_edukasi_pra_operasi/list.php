<style type="text/css">
  .section-header {
    background: #337AB7;
    padding: 5px 10px 5px 10px;
    text-transform: uppercase;
    color: white;
    font-size: 14px;
  }

  .section-header a {
    color: white;
    padding: 5px 10px 5px 10px;
    margin: -5px -10px 0 0;
    background: #D9534F;
  }

  div.pad3 {
    padding: 10px;
    margin-bottom: 20px;
  }

  .conrm {
    margin-bottom: 25px;
  }

  .tgl {
    font-size: 12px;
  }

  textarea {
    resize: vertical;
  }

  .sptr {
    margin-top: 0px;
    margin-bottom: 0px;
    border: 0;
    border-top: 1px solid #eee;
  }


  .mt-5 {
    margin-top: 5px !important
  }

  .mt-20 {
    margin-top: 20px !important
  }

  .pt-20 {
    padding-top: 20px !important
  }

  .mb-5 {
    margin-bottom: 5px
  }

  .mb-20 {
    padding-bottom: 20px
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
/*End radio button style*/

/* Customize the label (the container) */
.container-checkbox {
  display: block;
  position: relative;
  padding-left: 25px;
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

/* Hide the browser's default checkbox */
.container-checkbox input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom checkbox */
.checkmark-checkbox {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container-checkbox:hover input ~ .checkmark-checkbox {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checkbox input:checked ~ .checkmark-checkbox {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark-checkbox:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-checkbox input:checked ~ .checkmark-checkbox:after {
  display: block;
}

/* Style the checkmark/indicator */
.container-checkbox .checkmark-checkbox:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
} 

/*Tambahan style untuk tabel laporan sedasi*/
  .centerp {
    padding: 10px 5px 10px 5px;
  }

  .bd {
    border: 1px solid #ddd;
    padding: 8px;
  }  

  .bottom {
    border-bottom: 1px solid #000;
    padding: 8px;
  }
</style>
<br>
<br>
<div class="col-md-12" id="view-container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2 text-right">
          <input type="hidden" name="id_pasien_registrasi" id="id_pasien_registrasi">
          <button class="btn btn-primary btn-sm btn-aktif" id="btn-aktif" disabled>Aktif</button>
          <button class="btn btn-default btn-sm btn-arsip" id="btn-arsip">Arsip</button>
        </div>
        <div class="col-md-10" id="select-aktif">
          <div class="col-md-5">
            <select class="select2 select-aktif form-control" style="width: 100%">
              <?php foreach ($data_reg_aktif as $d_aktif) : ?>
                <option value="<?= $d_aktif['id_registrasi']; ?>"><?= $d_aktif['no_reg']; ?> - <?= $d_aktif['tanggal_checkin']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-7">
            <button class="btn btn-primary btn-sm tambah-aktif">Tambah</button>
          </div>
        </div>

        <div class="col-md-10" id="select-arsip" style="display: none">
          <div class="col-md-5">
            <select class="select2 select-arsip form-control" style="width: 100%">
              <?php foreach ($data_reg_arsip as $d_arsip) : ?>
                <option value="<?= $d_arsip['id_registrasi']; ?>"><?= $d_arsip['no_reg']; ?> - <?= $d_arsip['tanggal_checkin']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-7">
            <button class="btn btn-primary btn-sm tambah-arsip">Tambah</button>
          </div>
        </div>
        <div class="col-md-12 render-aktif"></div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12" id="form-container" style="display:none;"></div>




<script type="text/javascript">
  var aktif_pdf
  $('.tambah-aktif').click(function(e) {
    e.preventDefault();
    $('.tambah-aktif').attr('disabled', true);
    id_reg = $('#id_pasien_registrasi').val(),
      console.log(id_reg),

      $.post('<?php echo base_url(); ?>' + class_name + '/add/list', {
        'id_reg': id_reg,
      }).done(function(response) {

        $('#form-container').html(response);
        $('#view-container').hide();
        $('#form-container').show();
        $('.tambah-aktif').removeAttr('disabled');
        if (!$('#form-grafik').is(':disabled')) {
          $('#form-grafik').attr("disabled", true)
        }

      }).fail(function() {

        alert('Gagal menampilkan data');

      });
  });

  $('.tambah-arsip').click(function(e) {
    e.preventDefault();
    $('.tambah-arsip').attr('disabled', true);
    id_reg = $('#id_pasien_registrasi').val(),
      console.log(id_reg),

      $.post('<?php echo base_url(); ?>' + class_name + '/add/list', {
        'id_reg': id_reg,
      }).done(function(response) {

        $('#form-container').html(response);
        $('#view-container').hide();
        $('#form-container').show();
        $('.tambah-arsip').removeAttr('disabled');
        if (!$('#form-grafik').is(':disabled')) {
          $('#form-grafik').attr("disabled", true)
        }

      }).fail(function() {

        alert('Gagal menampilkan data');

      });
  });

  $(document).ready(function() {
    $(window).scrollTop(0);

    $('.select-aktif').select2();
    $('.select-arsip').select2();

    render();
    // render_arsip();
  });



  $('.btn-aktif').on("click", function(e) {
    e.preventDefault();
    // $('.panel-heading').html('Template (AKTIF)');
    $('.btn-aktif').attr("disabled", true);
    $('.btn-arsip').attr("disabled", false);
    $('.btn-arsip').addClass("btn-default");
    $('.btn-arsip').removeClass("btn-primary");
    $('.btn-aktif').addClass("btn-primary");
    $('.btn-aktif').removeClass("btn-default");
    document.getElementById("select-arsip").style.display = "none"
    document.getElementById("select-aktif").style.display = "block"
    $('.render-aktif').html('');
    render();
  });

  $('.btn-arsip').on("click", function(e) {
    e.preventDefault();
    // $('.panel-heading').html('Template (ARSIP)');
    $('.btn-arsip').attr("disabled", true);
    $('.btn-aktif').attr("disabled", false);
    $('.btn-aktif').removeClass("btn-primary");
    $('.btn-aktif').addClass("btn-default");
    $('.btn-arsip').removeClass("btn-default");
    $('.btn-arsip').addClass("btn-primary");
    document.getElementById("select-aktif").style.display = "none"
    document.getElementById("select-arsip").style.display = "block"
    $('.render-aktif').html('');
    render_arsip();
  });

  function render() {
    id_reg_aktif = $('.select-aktif').val();
    $('#id_pasien_registrasi').val(id_reg_aktif);
    $('.select-aktif').attr("disabled", true);
    $.get('<?php echo base_url(); ?>' + class_name + "/render_data/list/" + id_reg_aktif + "/1",
      function(response) {

        $('.render-aktif').html(response);
        $('.select-aktif').attr("disabled", false);
      });
  }

  function render_arsip() {
    id_reg_arsip = $('.select-arsip').val();
    $('#id_pasien_registrasi').val(id_reg_arsip);
    $('.select-arsip').attr("disabled", true);
    $.get('<?php echo base_url(); ?>' + class_name + "/render_data/list/" + id_reg_arsip + "/2",
      function(response) {
        // console.log(response);
        $('.render-aktif').html(response);
        $('.select-arsip').attr("disabled", false);
      });
  }


  $('.select-aktif').change(function(e) {
    e.preventDefault();
    $('#id_pasien_registrasi').val($(this).val());
    render();
  });

  $('.select-arsip').change(function(e) {
    e.preventDefault();
    $('#id_pasien_registrasi').val($(this).val());
    render_arsip();
  });

  $('.cetak-aktif').on("click", function(e) {
    id_reg_aktif = $('#id_pasien_registrasi').val();
    aktif_pdf = window.open('<?php echo base_url(); ?>' + class_name + '/view_pdf/' + id_reg_aktif);
  });

  $('.cetak-arsip').on("click", function(e) {
    id_reg_aktif = $('#id_pasien_registrasi').val();
    aktif_pdf = window.open('<?php echo base_url(); ?>' + class_name + '/view_pdf/' + id_reg_aktif);
  });

  function process_button(type) {
    if (type == 1) {
      $('.tambah-aktif').attr("disabled", false);
      $('.ubah-aktif').attr("disabled", false);
      $('.hapus-aktif').attr("disabled", false);
      $('.cetak-aktif').attr("disabled", false);

    } else {
      $('.tambah-aktif').attr("disabled", true);
      $('.ubah-aktif').attr("disabled", true);
      $('.hapus-aktif').attr("disabled", true);
      $('.cetak-aktif').attr("disabled", true);

    }
  }
</script>
