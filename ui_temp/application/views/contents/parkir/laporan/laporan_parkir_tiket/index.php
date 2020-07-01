<div class="col-md-12" style="padding: 0px;">
  <br />
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <div style="margin-bottom: 10px"><b>Bulan</b></div>
        <div class="row">
          <div class="col-md-12">
            <div class="">
              <?php 
                  $arrDay = array(
                      1   =>  'Januari',
                      2   =>  'Februari',
                      3   =>   'Maret',
                      4   =>  'April',
                      5   =>  'Mei',
                      6   =>  'Juni',
                      7   =>  'Juli',
                      8   =>  'Agustus',
                      9   =>  'September',
                      10  =>  'Oktober',
                      11  =>  'November', 
                      12  =>  'Desember'
                    );
                  ?>
              <?php for($a=1;$a<=12;$a++):?>
              <button style="margin:2px" class="btn btn-default is-bulan btn-sm <?php echo (date("n") == $a)? "btn-primary":"";?>" name="datatype" data-id="<?php echo (strlen($a) == 1)? '0'.$a:$a;?>"><?php echo $arrDay[$a];?></button>
              <?php endfor;?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div style="margin-bottom: 10px"><b>Tahun</b></div>
        <div class="row">
          <div class="col-md-12">
            <?php for ($i=2017; $i <= date('Y') ; $i++):?>
            <button style="margin:2px" data-id="<?php echo $i;?>" class="btn btn-sm btn-default <?php echo (date("Y") == $i)? "btn-primary":"";?> is-tahun"><?php echo $i;?></button>
            <?php endfor;?>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div style="margin-bottom: 10px"><b>Aktif / Arsip</b></div>
        <div class="row">
          <div class="col-md-12">
            <button style="margin:2px" data-id="1" class="btn btn-sm btn-default btn-primary is-exit">Aktif</button>
            <button style="margin:2px" data-id="0" class="btn btn-sm btn-default is-exit">Arsip</button>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div style="margin-bottom: 30px"><b></b></div>
        <div>
          <a target='_blank' href="#" class="cetak_pdf pull-right">
            <button style="margin:2px" class="btn btn-sm btn-primary" type="button" name="button">
              <i class="fa fa-print">&nbsp;</i>PDF
            </button>
          </a>
          <a target='_blank' href="#" class="cetak_xls pull-right">
            <button style="margin:2px" class="btn btn-sm btn-success" type="button" name="button">
              <i class="fa fa-download">&nbsp;</i>Excel
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 text-center hide" id="load-data">
  <div style="margin-top:100px;">
    <img style="border-radius:5px;padding:20px;" src="<?php echo base_url().'assets/image/loading.gif'?>">
    <br />Harap tunggu, proses data...
  </div>
</div>
<div class="col-md-12 table-process" style="padding: 1em;">
  <div class="load-view">

  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  let target = "<?= $url ?>"
  let month = $('.is-bulan.btn-primary').data('id')
  let year = $('.is-tahun.btn-primary').data('id')
  let is_exit = $('.is-exit.btn-primary').data('id')

  const getParam = () => {
    const query = {
      tgl_start: `${year}-${month}-01`,
      tgl_end: `${year}-${month}-31`,
      is_exit_time_null: `${is_exit}`
    }
    return $.param(query)
  }

  const refresh = () => {
    const params = getParam()
    $.ajax({
      method: 'GET',
      url: `${target}?${params}`,
      beforeSend() {
        $('#load-data').removeClass('hide')
        $('.load-view').addClass('hide')
      },
      success(response) {
        $('#load-data').addClass('hide')
        $('.load-view').html(response)
        $('.load-view').removeClass('hide')
      },
      error(e) {
        alert("Tidak dapat mengambil data, " + e)
      }
    })
  }
  $('#sub_menu_referensi > a').on('click', function(e) {
    e.preventDefault()
    target = $(this).attr('href')
    $('.nav.menu.black-selected').removeClass('black-selected')
    $(this).addClass('black-selected')
    refresh()
  })
  $('.is-bulan').on('click', function() {
    $('.is-bulan.btn-primary').removeClass('btn-primary')
    $(this).addClass('btn-primary')
    month = $(this).data('id')
    refresh()
  })
  $('.is-tahun').on('click', function() {
    $('.is-tahun.btn-primary').removeClass('btn-primary')
    $(this).addClass('btn-primary')
    year = $(this).data('id')
    refresh()
  })
  $('.is-exit').on('click', function() {
    $('.is-exit.btn-primary').removeClass('btn-primary')
    $(this).addClass('btn-primary')
    is_exit = $(this).data('id')
    refresh()
  })
  $('.cetak_pdf').click(function() {
    const params = getParam()
    $(this).attr('href', `${target}/pdf?${params}`)
  })
  $('.cetak_xls').click(function() {
    const params = getParam()
    $(this).attr('href', `${target}/excel?${params}`)
  })
  refresh()
})
</script>