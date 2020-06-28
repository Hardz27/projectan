<div class="col md-12">
  <div class="col-md-3"></div>
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
            <th class="text-center">Plat</th>
            <th class="text-center">Kendaraan</th>
            <th class="text-center">Tiket Hilang</th>
            <th class="text-center">Pintu Masuk</th>
            <th class="text-center">Waktu Masuk</th>
            <th class="text-center">Pintu Keluar</th>
            <th class="text-center">Waktu keluar</th>
            <th class="text-center">Total Biaya</th>
            <th class="text-center">Petugas</th>
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
              <a href="<?= $url.'/karcis/'.$item['kode'] ?>" target="blank" class="btn btn-primary btn-sm" style="margin: 0px 5px 0px 5px">Karcis</a>
              <?php } ?>
              <a href="<?= $url.'/struk/'.$item['kode'] ?>" target="blank" class="btn btn-primary btn-sm" style="margin: 0px 5px 0px 5px">Struk Bayar</a>
            </td>
            <td class="text-center"><?= $item['created_date']; ?></td>
            <td class="text-center"><?= $item['kode'] ?></td>
            <td class="text-center"><?= $item['no_karcis'] ?></td>
            <td class="text-center"><?= $item['plat'] ?></td>
            <?php
                $kendaraan = '';
                if ($item['kendaraan'] == 1) {
                  $kendaraan = 'Mobil';
                }else if ($item['kendaraan'] == 2) {
                  $kendaraan = 'Motor';
                }else if ($item['kendaraan'] == 3) {
                  $kendaraan = 'Truk';         
                }else if ($item['kendaraan'] == 4) {
                  $kendaraan = 'Truk Barang';         
                }else if ($item['kendaraan'] == 5)  {
                  $kendaraan = 'Truk Tronton';         
                }
            ?>
            <td class="text-center"><?= $kendaraan ?></td>
            <td class="text-center"><?= $item['tiket_hilang_date']  == '' ? '-' : $item['tiket_hilang_date'] ?></td>
            <td class="text-center"><?= $item['entry_gate'] ?></td>
            <td class="text-center"><?= $item['entry_time'] ?></td>
            <td class="text-center"><?= $item['exit_gate'] ?></td>
            <td class="text-center"><?= $item['exit_time']  == '' ? '-' : $item['exit_time'] ?></td>
            <?php $fee_total = 'Rp. ' . number_format($item['fee_total'],0,',','.'); ?>
            <td class="text-center"><?= $item['fee_total']  == '' ? '-' : $fee_total ?></td>
            <td class="text-center"><?= $item['exit_employee']  == '' ? '-' : $item['exit_employee'] ?></td>
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
<script>
$('table').dataTable()
</script>