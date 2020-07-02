
<style>
  .fad{
    padding: 10px 0px 0px 0px;
  }
</style>

    
  <?php 

    $timezone = $data['timezone'];
    if(isset($data['selected_parkir'][0])){
     $parkir = $data['selected_parkir'][0];
    }
  ?>

    <div class="row fad">
      <div class="col-xs-4">
        <b> Tiket Hilang </b> :
      </div>
      <div class="col-xs-6">
        <div class="row">
          <div class="col-xs-3">
            <label class="switch">
              <input name="is_tiket_hilang_view" type="checkbox" id="is-tiket-hilang">
              <span class="slider round"></span>
            </label>
          </div>
          <div class="col-xs-9">
            <input type="hidden" name="denda_data" id="denda_data" value="" >
            <input name="is_tiket_hilang" type="text" class="form-control input-sm hide" id="denda" value="<?= !isset($parkir['entry_gate']) ? '' : $data['denda'][0]['denda'] ?>">
          </div>
        </div>
      </div>
    </div>
      
    <div class="row fad" id="entry-time">
      <div class="col-xs-4">
        <b> Entry Time </b> :
      </div>
      <div class="col-xs-4">
        <?= !isset($parkir['entry_time']) ? ': '."-" : ': '.$parkir['entry_time'] ?>
      </div>
    </div>

    <div class="row fad" id="entry-gate">
      <div class="col-xs-4">
        <b> Entry Gate </b> :
      </div>
      <div class="col-xs-4">
        <?= !isset($parkir['entry_gate']) ? ': '."-" : ': '.$parkir['entry_gate'] ?>
      </div>
    </div>

    <div class="row fad" id="exit-time">
      <div class="col-xs-4">
        <b> Exit Time </b> :
      </div>
      <div class="col-xs-6">
        <?php
          $dt = new DateTime();
          $dt->setTimezone(new DateTimeZone($timezone));
          $dt->setTimestamp(time());
          $now = $dt->format('Y-m-d H:i:s');
        ?>
        <input type="hidden" class="form-control input-sm" name="exit_time" id="exit_time" value="<?= !isset($parkir['entry_gate']) ? '' : $now ?>"  required>
        <input type="text" class="form-control input-sm" name="exit_time" id="exit_time" value="<?= !isset($parkir['entry_gate']) ? '' : $now ?>"  required disabled>
      </div>
    </div>

    <div class="row fad" id="exit-gate">
      <div class="col-xs-4">
        <b> Exit Gate </b> :
      </div>
      <div class="col-xs-8">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="is-gate" name="is_gate" id="is-gate" value="<?= !isset($data['gerbang'][0]['gerbang']) ? '' : $data['gerbang'][0]['gerbang'] ?>"  required>
            <?php foreach($data['gerbang']  as $index => $item):?>
              <button type="button" class="btn btn-sm btn-default <?php echo ($index == 0)? "btn-primary":"";?> is-gerbang" name="is-gerbang" value="<?php echo $item['gerbang'];?>"><?php echo $item['gerbang'];?></button>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>

    <div class="row fad" id="jenis-kendaraan">
      <div class="col-xs-4">
        <b> Jenis Kendaraan </b> :
      </div>
      <div class="col-xs-8">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="is-kendaraan" name="is_kendaraan" id="is-kendaraan" value="<?= !isset($data['kendaraan'][0]['jenis_kendaraan']) ? '' : $data['kendaraan'][0]['jenis_kendaraan'] ?>"  required>
            <?php foreach($data['kendaraan']  as $index => $item):?>
              <button type="button" data-id="<?= $index ?>" class="btn btn-sm btn-default <?php echo ($index == 0)? "btn-primary":"";?> is-kendaraan" name="is-kendaraan" value="<?php echo $item['jenis_kendaraan'];?>"><?php echo str_replace('Jenis Kendaraan: ', '', $item['jenis_kendaraan']);?></button>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>

    <div class="row fad" id="tpj">
      <div class="col-xs-4">
        <b> Tarif per jam </b> :
      </div>
      <div class="col-xs-6">
        <input type="hidden" class="is-fee" name="is_fee" id="is-fee" value="<?= !isset($parkir['entry_gate']) ? '' : $data['kendaraan'][0]['harga_per_jam'] ?>"  required>
        <input type="text" class="form-control input-sm is-fee-view" name="is-fee-view" id="is-fee-view" value="<?= !isset($parkir['entry_gate']) ? '' : $data['kendaraan'][0]['harga_per_jam'] ?>" disabled required>
      </div>
    </div>
        

    <div class="row fad" id="durasi">
      <div class="col-xs-4">
        <b> Durasi Parkir </b> :
      </div>
      <div class="col-xs-6">
        <?php
          if (isset($parkir['entry_time'])) {
            $first_date = new DateTime($parkir['entry_time']);
            $second_date = new DateTime($now);
            $interval = $first_date->diff($second_date);
            $durasix = (($interval->h+($interval->d*24)) <= 0 ? 1 : $interval->h+($interval->d*24) + ($interval->i >= 30 ? 1 : 0));
          }else{
            $total_jam = 0;
            $durasix = 0;
          }
          echo '<script>var durasi='.$durasix.'</script>';
        ?>
        
        <input type="text" class="form-control input-sm" name="total_jam" id="total_jam" value="<?= !isset($parkir['entry_gate']) ? '' : $interval->d . ' Hari ' . $interval->h . ' Jam ' . $interval->i . 'Menit' ?>" <?= !isset($parkir['entry_gate']) ? 'disabled' : 'readonly' ?>  required>
      </div>
    </div>    

    <div class="row fad" id="tagihan">
      <div class="col-xs-4">
        <b> Total Tarif Parkir </b> :
      </div>
      <div class="col-xs-6">
        <input type="hidden" name="total_tarif_parkir" id="total_tarif_parkir" value=""  required>
        <input type="text" class="form-control input-sm" name="total_tarif_parkir_view" id="total_tarif_parkir_view" value="<?= !isset($parkir['entry_gate']) ? '' : $data['kendaraan'][0]['harga_per_jam'] * (($interval->h+($interval->d*24)) <= 0 ? 1 : $interval->h+($interval->d*24) + ($interval->i > 30 ? 1 : 0)) ?>" <?= !isset($parkir['entry_gate']) ? 'disabled' : 'readonly' ?> required>
      </div>
    </div>

    <div class="row fad">
      <div class="col-xs-4">
        <b> Discount </b> :
      </div>
      <div class="col-xs-6">
        <input type="hidden" name="fee_discount" id="fee_discount" value="<?= !isset($parkir['entry_gate']) ? '' : 0 ?>"  required>
        <input type="text" class="form-control input-sm" name="fee_discount_view" id="fee_discount_view" value="<?= !isset($parkir['entry_gate']) ? '' : 0 ?>" <?= !isset($parkir['entry_gate']) ? 'disabled' : '' ?>  required>
      </div>
    </div>

    <div class="row fad">
      <div class="col-xs-4">
        <b> Total Tagihan </b> :
      </div>
      <div class="col-xs-6">
        <input type="hidden" name="total_bayar" id="total_bayar" value=""  required>
        <input type="text" class="form-control input-sm" name="total_bayar_view" id="total_bayar_view" value="<?= !isset($parkir['entry_gate']) ? '' : '' ?>" <?= !isset($parkir['entry_gate']) ? 'disabled' : 'readonly' ?>  required>
      </div>
    </div>

    <div class="row fad">
      <div class="col-xs-4">
        <b>Uang yang dibayar </b> :
      </div>
      <div class="col-xs-6">
        <input type="hidden" name="bayar" id="bayar" value="0"  required>
        <input type="text" class="form-control input-sm" name="bayar_view" id="bayar_view" value="<?= !isset($parkir['entry_gate']) ? '' : '0' ?>" <?= !isset($parkir['entry_gate']) ? 'disabled' : '' ?>  required>
      </div>
    </div>

    <div class="row fad">
      <div class="col-xs-4">
        <b> Kembalian </b> :
      </div>
      <div class="col-xs-6">
        <input type="hidden" name="kembalian" id="kembalian" value=""  required>
        <input type="text" class="form-control input-sm" name="kembalian_view" id="kembalian_view" value="<?= !isset($parkir['entry_gate']) ? '' : '0' ?>" <?= !isset($parkir['entry_gate']) ? 'disabled' : 'readonly' ?>  required>
      </div>
    </div>

    <div class="row fad">
      <div class="col-xs-4">
        <b> Catatan </b> :
      </div>
      <div class="col-xs-6">
        <textarea class="form-control input-sm" name="catatan" id="catatan" value=""  <?= !isset($parkir['entry_gate']) ? 'disabled' : '' ?> placeholder="Catatan.."></textarea>
      </div>
    </div>

    

    <?php 
      $class_name = str_replace("c_", "", $this->router->fetch_class());
      if (count($data['parkir']) > 0) {
        
        foreach ($data['parkir'] as $index => $item) {
            if ($item['entry_time']) {
                $first_date = new DateTime($item['entry_time']);
            }else{
                $first_date = new DateTime($item['exit_time']);
            }
            $second_date = new DateTime($item['exit_time']);
            $diff = $first_date->diff($second_date);
            $dateDiff[$index] = [
              'perbedaan' => [
                'jam'     => $diff->h,
                'hari'    => $diff->d,
                'menit'   => $diff->i
              ]
            ];
        }
        echo '<script>var perbedaan='.json_encode($dateDiff).'</script>';
      }

      if(count($data['check']) > 0){
        $stat = [
          'status' => 202
        ];
        // trace($stat);
        echo '<script>var data='.json_encode($stat).'</script>';
      }
    ?>
    
    <?= '<script>var allData='.json_encode($data).'</script>' ?>
    <?= '<script>var parkir='.json_encode($data['parkir']).'</script>' ?>

    


    <script type="text/javascript">    
   
      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix){
        
        var number_string = angka.replace(/[^,\d-]/g, '').toString(),
        split       = number_string.split(','),
        sisa        = split[0].length % 3,
        rupiah        = split[0].substr(0, sisa),
        ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
   
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
   
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }

      var row = '';
      var url = '<?= $url ?>';
      $('#render-list').html('')
      for (var i = 0; i < parkir.length; i++) {

        if (parkir[i].tiket_hilang_date) {
          row += `<tr>
            <td class="text-center" width="20%" style="padding-top: 25px;">
              <a href="`+url+`/struk/`+parkir[i].kode_tiket+`" type="button" class="btn btn-primary btn-sm" target="blank" style="margin: 0px 5px 0px 5px">Struk Bayar</a>
            </td>`
        }else{
          row += `<tr>
            <td class="text-center" width="20%" style="padding-top: 25px;">
              <a href="`+url+`/karcis/`+parkir[i].kode_tiket+`" type="button" class="btn btn-primary btn-sm" target="blank" style="margin: 0px 5px 0px 5px" data-id="`+url+`/karcis/`+parkir[i].kode_tiket+`">Karcis</a>
              <a href="`+url+`/struk/`+parkir[i].kode_tiket+`" type="button" class="btn btn-primary btn-sm" target="blank" style="margin: 0px 5px 0px 5px">Struk Bayar</a>
            </td>`
        }

        row += `
            <td class="text-center" style="padding-top: 25px;">
              <div>`+parkir[i].exit_time+`</div>
            </td>
            <td class="text-center" style="padding-top: 25px;">
              <div>`+parkir[i].no_karcis+`</div>
            </td>
            <td class="text-center" style="padding-top: 25px;">
              <div>`+perbedaan[i].perbedaan.hari+` Hari `+perbedaan[i].perbedaan.jam+` Jam `+perbedaan[i].perbedaan.menit+` Menit</div>
            </td>
            <td class="text-center" style="padding-top: 25px;">
              <div>`+parkir[i].plat_nomor+`</div>
            </td>
          </tr>`;
      }

      if (parkir.length <= 0) {
        row = `
          <tr bgcolor="#eee">
            <td class="text-center" style="padding: 25px;" colspan="5">
              <div>Tidak ada data</div>
            </td>
          </tr>`;
      }

      $('#render-list').html(`<tr>
        <td class="text-center" width="25%">
          <div style="margin-bottom: 10px"><b>Action</b></div>
        </td>
        <td class="text-center" width="20%">
          <div style="margin-bottom: 10px"><b>Tanggal Keluar</b></div>
        </td>
        <td class="text-center" width="20%">
          <div style="margin-bottom: 10px"><b>No Karcis</b></div>
        </td>
        <td class="text-center" width="20%">
          <div style="margin-bottom: 10px"><b>Jumlah Jam</b></div>
        </td>
        <td class="text-center" width="20%">
          <div style="margin-bottom: 10px"><b>No Plat</b></div>
        </td>
      </tr>
      `+row);

    </script>

<script>
    var class_name = '<?php echo $class_name;?>';
    var is_gerbang = '<?php echo $data['gerbang'][0]['gerbang'];?>'
    var is_kendaraan = '<?php echo $data['kendaraan'][0]['jenis_kendaraan'];?>'
    var is_tiket = 0;
    var harga_per_jam = 0;
    var total_durasi = 0;
    var discount = 0;
    var bayar = 0;
    var denda = 0;
    var is_tiket = 0;
      
    if (typeof data !== 'undefined') {
        alert('Data tidak ada atau tiket sudah checked out!');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
        $('.btn-kirim-<?= $this->router->fetch_class(); ?>').removeAttr('disabled');
        location.reload();
    }

    function initResponsive() {

        //Inisialisasi tarif parkir perjam
        harga_per_jam = $('#is-fee').val();
        total_durasi = durasi;

        $('#is-fee-view').val(formatRupiah(harga_per_jam.toString(), 'Rp. '));

        $('#fee_discount').val(discount)
        $('#fee_discount_view').val(formatRupiah(discount.toString(), 'Rp. '))

        $('#total_tarif_parkir').val(harga_per_jam * total_durasi);
        total_tarif_parkir = $('#total_tarif_parkir').val();
        $('#total_tarif_parkir_view').val(formatRupiah(total_tarif_parkir.toString(), 'Rp. '));

        $('#total_bayar').val(total_tarif_parkir);
        $('#total_bayar_view').val(formatRupiah(total_tarif_parkir.toString(), 'Rp. '));

    }

    initResponsive();

    function responsive(harga_perjam = 0,  discount = 0) {

        $('#is-fee').val(harga_perjam);
        $('#is-fee-view').val(formatRupiah(harga_perjam, 'Rp. '));
        
        total_tarif = $('#is-fee').val() * durasi;
        $('#total_tarif_parkir').val(total_tarif);
        $('#total_tarif_parkir_view').val(formatRupiah(total_tarif.toString(), 'Rp. '));

        if (parseInt(discount) >= parseInt(total_tarif)) {
            discount = total_tarif;
            $('#fee_discount_view').val(formatRupiah(total_tarif.toString(), 'Rp. '))    
        }else{
            $('#fee_discount_view').val(formatRupiah(discount.toString(), 'Rp. '))
        }
        $('#fee_discount').val(discount)

        total_bayar = total_tarif - parseInt(discount);
        $('#total_bayar').val(total_bayar);
        $('#total_bayar_view').val(formatRupiah(total_bayar.toString(), 'Rp. '));

        kembalian = $('#bayar').val() - $('#total_bayar').val()
        $('#kembalian').val(kembalian)
        if (kembalian < 0) {
            $('#kembalian_view').val(`Rp. ${kembalian} (Kurang)`);
        }else{
            $('#kembalian_view').val(`Rp. ${kembalian}`);
        }

    }

    function responsiveTicketLost(denda = 0, discount = 0) {

        if (parseInt(discount) >= parseInt(denda)) {
            discount = denda
            $('#fee_discount_view').val(formatRupiah(denda.toString(), 'Rp. '))
        }else{
            $('#fee_discount_view').val(formatRupiah(discount.toString(), 'Rp. '))
        }

        total_bayar = denda - parseInt(discount);
        $('#total_bayar').val(total_bayar);
        $('#total_bayar_view').val(formatRupiah(total_bayar.toString(), 'Rp. '));

        kembalian = $('#bayar').val() - $('#total_bayar').val()
        $('#kembalian').val(kembalian)
        if (kembalian < 0) {
            $('#kembalian_view').val(`Rp. ${kembalian} (Kurang)`);
        }else{
            $('#kembalian_view').val(`Rp. ${kembalian}`);
        }
        
    }
</script>


<script>

    $('.is-gerbang').on('click', function() {
        $('.is-gerbang.btn-primary').removeClass('btn-primary')
        $(this).addClass('btn-primary')
        is_gerbang = $(this).val()
        $('#is-gate').val(is_gerbang);
      })

    $('.is-kendaraan').on('click', function() {
        $('.is-kendaraan.btn-primary').removeClass('btn-primary')
        $(this).addClass('btn-primary')
        
        is_kendaraan = $(this).val()
        index = $(this).data('id')
        discount = 0;

        $('#is-kendaraan').val(is_kendaraan);
        var harga = <?php echo json_encode($data['kendaraan']); ?>;
        harga_per_jam = harga[index]['harga_per_jam'];        
        
        responsive(harga_per_jam)
    })

    $("#fee_discount_view").on('change keydown paste input', function(){
        $(this).val(formatRupiah($(this).val(), 'Rp. '))
        $('#fee_discount').val($(this).val().replace(/[^,\d]/g, ''))
        discount = $('#fee_discount').val();

        if (!is_tiket) {
            if (discount) {
            responsive(harga_per_jam, discount)
            }else{
                responsive(harga_per_jam)
            }    
        }else{
            responsiveTicketLost(denda, discount)
        }
        
        
      });

    $("#bayar_view").on('change keydown paste input', function(){
        $(this).val(formatRupiah($(this).val(), 'Rp. '))
        $('#bayar').val( $(this).val().replace(/[^,\d]/g, ''))
        
        if (!is_tiket) {
            responsive(harga_per_jam, discount)
        }else{
            responsiveTicketLost(denda, discount)
        }
        
    });
</script>

<script type="text/javascript">
    $('#is-tiket-hilang').on('change', function() {
    this.setAttribute("checked", "checked");
    var isChecked = this.checked;
    is_tiket = 1;
    if (isChecked) {
        $('#denda').removeClass('hide')
        $('#input-kode').addClass('hide')
        $('#entry-time').addClass('hide')
        $('#entry_time').addClass('hide')
        $('#entry-gate').addClass('hide')
        $('#exit-time').addClass('hide')
        $('#exit-gate').addClass('hide')
        $('#jenis-kendaraan').addClass('hide')
        $('#tpj').addClass('hide')
        $('#durasi').addClass('hide')
        $('#tagihan').addClass('hide')

        $('#send').attr('disabled', false)
        $('#fee_discount_view').attr('disabled',false)
        $('#bayar_view').attr('disabled',false)
        $('#catatan').attr('disabled',false)

        $('#denda_data').val(allData['denda'][0]['denda'])
        $('#denda').val(formatRupiah($('#denda_data').val(), 'Rp. '))

        denda = $('#denda_data').val()

        responsiveTicketLost(denda, discount)

        $("#denda").on('change keydown paste input', function(){
            $(this).val(formatRupiah($(this).val(), 'Rp. '))
            $('#denda_data').val( $(this).val().replace(/[^,\d]/g, ''))

            denda = $('#denda_data').val()
            responsiveTicketLost(denda, discount)
        });
    }else{
        is_tiket = 0;
        this.setAttribute("checked", "");
        $('#denda').addClass('hide')
        $('#input-kode').removeClass('hide')
        $('#entry-time').removeClass('hide')
        $('#entry_time').removeClass('hide')
        $('#entry-gate').removeClass('hide')
        $('#exit-time').removeClass('hide')
        $('#exit-gate').removeClass('hide')
        $('#jenis-kendaraan').removeClass('hide')
        $('#tpj').removeClass('hide')
        $('#durasi').removeClass('hide')
        $('#tagihan').removeClass('hide')

        $('#bayar').val('')
        $('#bayar_view').val('')

        $('#denda_data').val('')

        responsive(harga_per_jam, discount)

        if (searched) {
          $('#send').attr('disabled', false)
        }else{
          $('#send').attr('disabled', true)
        }
        console.log(searched)
        var test = '<?= !isset($parkir['entry_gate']) ? 'disabled' : 'readonly' ?>';
        // console.log(test);
        if (test == 'disabled') {
            $('#fee_discount_view').attr('disabled',true)
            $('#bayar_view').attr('disabled',true)
            $('#catatan').attr('disabled',true)
        }
    }
});
</script>