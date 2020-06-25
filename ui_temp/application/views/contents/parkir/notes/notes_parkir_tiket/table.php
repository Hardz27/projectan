<div class="col md-12">
  <div class="col-md-6" id="add-data" style="padding-top: 25px">    
    <form id="form-add-1-<?= $this->router->fetch_class(); ?>">
      <div class="col-md-5" style="padding-left: 0px">
        <select class="select2 form-control" name="entry_gate" style="width: 100%">
          <?php foreach ($data['gerbang'] as $index => $item) : ?>
            <option value="<?= $item['gerbang']; ?>"><?= $item['gerbang']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-7">
        <button class="btn btn-primary btn-sm btn-kirim-<?= $this->router->fetch_class(); ?>">Tambah</button>
      </div>
    </form>
  </div>
  <br><br>
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="thead bg-secondary" style="background-color: #e7e7e7;">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Aksi</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Kode</th>
            <th class="text-center">No Karcis</th>
            <th class="text-center">Pintu Masuk</th>
            <th class="text-center">Waktu Masuk</th>
            <th class="text-center">Tiket Hilang</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ; $total = 0; ?>
          <?php foreach($data['parkir'] as $index => $item): ?>
          <tr>
            <td class="text-center"><?= $i++ ?></td>
            <td class="text-center">
              <?php
              if (!$item['tiket_hilang_date']) {
              ?>
                <a href="<?= $url.'/karcis/'.$item['kode'] ?>" target="_blank" class="btn btn-primary btn-sm" style="margin: 0px 5px 0px 5px">Karcis</a>
              <?php } ?>
              <a href="<?= $url.'/struk/'.$item['kode'] ?>" target="_blank" class="btn btn-primary btn-sm" style="margin: 0px 5px 0px 5px">Struk Bayar</a>
            </td>
            <td class="text-center"><?= $item['created_date']; ?></td>
            <td class="text-center"><?= $item['kode'] ?></td>
            <td class="text-center"><?= $item['no_karcis'] ?></td>
            <td class="text-center"><?= $item['entry_gate'] ?></td>
            <td class="text-center"><?= $item['entry_time'] ?></td>
            <td class="text-center"><?= $item['tiket_hilang_date']  == '' ? '-' : $item['tiket_hilang_date'] ?></td>
          </tr>
          <?php $total += (int)$item ?>
          <?php endforeach; ?>
        </tbody>
        <!-- <tfoot style="background-color: #e7e7e7">
          <tr>
            <td></td>
            <td>Total</td>
            <td class="text-center"></td>
          </tr>
        </tfoot> -->
      </table>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>

<?php 
  $class_name = str_replace("c_", "", $this->router->fetch_class());
?>

<script>
$('table').dataTable()

var class_name = '<?php echo $class_name;?>';

$('#form-add-1-<?= $this->router->fetch_class(); ?>').submit(function(e) {
    e.preventDefault();
    // alert($(this).serialize());
    // console.log($(this).serialize());
    $('.btn-kirim-<?= $this->router->fetch_class(); ?>').attr('disabled', true);

    $.post('<?php echo base_url(); ?>' + class_name + '/add_process', $(this).serialize()).done(function(data) {
      console.log(data);
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


  if ($('#is-exit-arsip').attr('class') == 'btn btn-sm btn-default is-exit btn-primary') {
    $('#add-data').addClass('hide')
  }
</script>