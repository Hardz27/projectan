<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="col-md-12" style="padding: 0px;">
  <br />
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-3">
          <div style="margin-bottom: 30px"><b></b></div>
          <div class="col-md-12 is-pilih-filter">
            <button type="button" class="btn btn-default btn-primary btn-sm" data-id="harian">Harian</button>
            <button type="button" class="btn btn-sm btn-default" data-id="range">Range Tanggal</button>
            <button type="button" class="btn btn-sm btn-default" data-id="bulanan">Bulanan</button>
          </div>
      </div>
      <div class="col-md-3 filter-harian" style="display: block">
        <div style="margin-bottom: 10px"><b>Harian 1</b></div>
        <div class="row">
          <div class="col-md-12">
            <input type="text" name="tanggal" class="form-control tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="col-md-3 filter-harian" style="display: block"></div>
      <div class="col-md-3 filter-range" style="display: none">
        <div style="margin-bottom: 10px"><b>Range 1</b></div>
        <div class="row">
          <div class="col-md-12">
            <input type="text" class="form-control daterange" name="daterange" id="daterange" value="<?= date('Y-m-01', strtotime('-3 months')); ?> - <?= date('Y-m-t'); ?>" />
          </div>
        </div>
      </div>
      <div class="col-md-3 filter-range" style="display: none"></div>
      <div class="col-md-3 filter-bulanan" style="display: none">
        <div style="margin-bottom: 10px"><b>PERIODE 1 (BULAN)</b></div>
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
              <?php for ($a = 1; $a <= 12; $a++) : ?>
                <button style="margin:2px" class="btn btn-default is-bulan btn-sm <?php echo ((date("n")) == $a) ? "btn-primary" : ""; ?>" name="datatype" data-id="<?php echo (strlen($a) == 1) ? '0' . $a : $a; ?>"><?php echo $arrDay[$a]; ?></button>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 filter-bulanan" style="display: none">
        <div style="margin-bottom: 10px"><b>PERIODE 1 (TAHUN)</b></div>
        <?php for ($i = 2017; $i <= date('Y'); $i++) : ?>
          <button style="margin:2px" data-id="<?php echo $i; ?>" class="btn btn-sm btn-default <?php echo (date("Y") == $i) ? "btn-primary" : ""; ?> is-tahun"><?php echo $i; ?></button>
        <?php endfor; ?>
      </div>
      <div class="col-md-3">
        <div style="margin-bottom: 30px"><b></b></div>
        <div>
          <a href="javascript:void(0)" class="pull-right">
            <button style="margin:2px" id="printChart" onclick="printChart()" class="btn btn-sm btn-warning" type="button" name="button">
              <i class="fa fa-print">&nbsp;</i>Chart
            </button>
          </a>
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

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-3"></div>
      <div class="col-md-3 filter-harian" style="display: block">
        <div style="margin-bottom: 10px"><b>Harian 2</b></div>
        <div class="row">
          <div class="col-md-12">
            <input type="text" name="tanggal" class="form-control tanggal" id="tanggal2" value="<?= date('Y-m-d') ?>" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="col-md-3 filter-harian" style="display: block"></div>
      <div class="col-md-3 filter-range" style="display: none">
        <div style="margin-bottom: 10px"><b>Range 2</b></div>
        <div class="row">
          <div class="col-md-12">
            <input type="text" class="form-control daterange" name="daterange" id="daterange2" value="<?= date('Y-m-01', strtotime('-3 months')); ?> - <?= date('Y-m-t'); ?>" />
          </div>
        </div>
      </div>
      <div class="col-md-3 filter-range" style="display: none"></div>
      <div class="col-md-3 filter-bulanan" style="display: none">
        <div style="margin-bottom: 10px"><b>PERIODE 2 (BULAN)</b></div>
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
              <?php for ($a = 1; $a <= 12; $a++) : ?>
                <button style="margin:2px" class="btn btn-default is-bulan2 btn-sm <?php echo ((date("n")) == $a) ? "btn-primary" : ""; ?>" name="datatype" data-id="<?php echo (strlen($a) == 1) ? '0' . $a : $a; ?>"><?php echo $arrDay[$a]; ?></button>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 filter-bulanan" style="display: none">
        <div style="margin-bottom: 10px"><b>PERIODE 2 (TAHUN)</b></div>
        <?php for ($i = 2017; $i <= date('Y'); $i++) : ?>
          <button style="margin:2px" data-id="<?php echo $i; ?>" class="btn btn-sm btn-default <?php echo (date("Y") == $i) ? "btn-primary" : ""; ?> is-tahun2"><?php echo $i; ?></button>
        <?php endfor; ?>
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

  let date_start = "<?= date('d'); ?>";
  let month_start = $('.is-bulan.btn-primary').data('id')
  let year_start = $('.is-tahun.btn-primary').data('id')
  let date_end = "<?= date('d'); ?>";
  let month_end = $('.is-bulan.btn-primary').data('id')
  let year_end = $('.is-tahun.btn-primary').data('id')

  let date_start2 = "<?= date('d'); ?>";
  let month_start2 = $('.is-bulan2.btn-primary').data('id')
  let year_start2 = $('.is-tahun2.btn-primary').data('id')
  let date_end2 = "<?= date('d'); ?>";
  let month_end2 = $('.is-bulan2.btn-primary').data('id')
  let year_end2 = $('.is-tahun2.btn-primary').data('id')

  const getParam = () => {
    const query = {
      tgl_start1: `${year_start}-${month_start}-${date_start}`,
      tgl_end1: `${year_end}-${month_end}-${date_end}`,
      tgl_start2: `${year_start2}-${month_start2}-${date_start2}`,
      tgl_end2: `${year_end2}-${month_end2}-${date_end2}`,
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
    month_start = $(this).data('id')
    month_end = $(this).data('id');
    refresh()
  })
  $('.is-tahun').on('click', function() {
    $('.is-tahun.btn-primary').removeClass('btn-primary')
    $(this).addClass('btn-primary')
    year_start = $(this).data('id')
    year_end = $(this).data('id')
    refresh()
  })
  $('.is-bulan2').on('click', function() {
    $('.is-bulan2.btn-primary').removeClass('btn-primary')
    $(this).addClass('btn-primary')
    month_start2 = $(this).data('id')
    month_end2 = $(this).data('id')
    refresh()
  })
  $('.is-tahun2').on('click', function() {
    $('.is-tahun2.btn-primary').removeClass('btn-primary')
    $(this).addClass('btn-primary')
    year_start2 = $(this).data('id')
    year_end2 = $(this).data('id')
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

  $('.daterange').daterangepicker({
      opens: 'left',
      locale: {
        format: 'YYYY-MM-DD' // --------Here
      },
    });

    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
      date_start = picker.startDate.format('DD');
      date_end = picker.endDate.format('DD');
      month_start = picker.startDate.format('MM');
      month_end = picker.endDate.format('MM');
      year_start = picker.startDate.format('YYYY');
      year_end = picker.endDate.format('YYYY');
      refresh();
      refreshFilter();
    });

    $('#daterange2').on('apply.daterangepicker', function(ev, picker) {
      date_start2 = picker.startDate.format('DD');
      date_end2 = picker.endDate.format('DD');
      month_start2 = picker.startDate.format('MM');
      month_end2 = picker.endDate.format('MM');
      year_start2 = picker.startDate.format('YYYY');
      year_end2 = picker.endDate.format('YYYY');
      refresh();
      refreshFilter();

    });

    $('.tanggal').datetimepicker({
      format: "YYYY-MM-DD",
      showTodayButton: true,
      timeZone: '',
      dayViewHeaderFormat: 'MMMM YYYY',
      stepping: 5,
      locale: moment.locale(),
      collapse: true,
      icons: {
        time: 'fa fa-clock-o',
        date: 'fa fa-calendar',
        up: 'fa fa-chevron-up',
        down: 'fa fa-chevron-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-crosshairs',
        clear: 'fa fa-trash-o',
        close: 'fa fa-times'
      },
      sideBySide: true,
      calendarWeeks: false,
      viewMode: 'days',
      viewDate: false,
      toolbarPlacement: 'bottom',
      widgetPositioning: {
        horizontal: 'left',
        vertical: 'bottom'
      }
    });

    $('#tanggal').on('dp.change', function(e) {
      var tanggal = e.date.format(e.date._f);
      tanggal = tanggal.split("-");
      year_start = tanggal[0];
      year_end = tanggal[0];
      month_start = tanggal[1];
      month_end = tanggal[1];
      date_start = tanggal[2];
      date_end = tanggal[2];
      // alert(date_start);
      refresh();
      // alert(d);
    })

    $('#tanggal2').on('dp.change', function(e) {
      var tanggal2 = e.date.format(e.date._f);
      tanggal2 = tanggal2.split("-");
      year_start2 = tanggal2[0];
      year_end2 = tanggal2[0];
      month_start2 = tanggal2[1];
      month_end2 = tanggal2[1];
      date_start2 = tanggal2[2];
      date_end2 = tanggal2[2];
      // alert(date_start);
      refresh();
      // alert(d);
    })

    // Filter
    $('.is-pilih-filter').on('click', '.btn', function() {
      $('.is-pilih-filter .btn-primary').removeClass('btn-primary')
      $(this).addClass('btn-primary')
      pilih_filter = pilihFilter($(this).data('id'))
      // refresh()
    });

    function pilihFilter(filter) {
      if (filter == 'range') {
        $('.filter-harian').hide();
        $('.filter-bulanan').hide();
        $('.filter-range').show();
        $('.daterange').val('<?= date('Y-m-01', strtotime('-3 months')); ?> - <?= date('Y-m-t'); ?>')
        date_start = '01'
        date_end = '<?= date('t'); ?>'
        month_start = '<?= date('m', strtotime('-3 months')); ?>'
        month_end = '<?= date('m'); ?>'
        year_start = '<?= date('Y', strtotime('-3 months')); ?>'
        year_end = '<?= date('Y'); ?>'

        date_start2 = '01'
        date_end2 = '<?= date('t'); ?>'
        month_start2 = '<?= date('m', strtotime('-3 months')); ?>'
        month_end2 = '<?= date('m'); ?>'
        year_start2 = '<?= date('Y', strtotime('-3 months')); ?>'
        year_end2 = '<?= date('Y'); ?>'
        refresh()
      } else if (filter == 'bulanan') {
        $('.filter-harian').hide();
        $('.filter-range').hide();
        $('.filter-bulanan').show();
        date_start = '01'
        date_end = '30'
        month_start = $('.is-bulan.btn-primary').attr('data-id')
        month_end = $('.is-bulan.btn-primary').attr('data-id')
        date_start = '01'
        date_end = '30'
        year_start = '<?= date('Y'); ?>'
        year_end = '<?= date('Y'); ?>'

        date_start2 = '01'
        date_end2 = '30'
        month_start2 = $('.is-bulan.btn-primary').attr('data-id')
        month_end2 = $('.is-bulan.btn-primary').attr('data-id')
        date_start2 = '01'
        date_end2 = '30'
        year_start2 = '<?= date('Y'); ?>'
        year_end2 = '<?= date('Y'); ?>'
        refresh();
      } else if (filter == 'harian') {
        $('.filter-range').hide();
        $('.filter-bulanan').hide();
        $('.filter-harian').show();
        tanggal = $('#tanggal').val().split("-");
        year_start = tanggal[0];
        year_end = tanggal[0];
        month_start = tanggal[1];
        month_end = tanggal[1];
        date_start = tanggal[2];
        date_end = tanggal[2];
        
        tanggal2 = $('#tanggal2').val().split("-");
        year_start2 = tanggal2[0];
        year_end2 = tanggal2[0];
        month_start2 = tanggal2[1];
        month_end2 = tanggal2[1];
        date_start2 = tanggal2[2];
        date_end2 = tanggal2[2];
        // refresh();

      }
    }
  refresh()
})
</script>