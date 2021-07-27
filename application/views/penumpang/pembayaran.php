<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <h1 style="color: black; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Pembayaran Tagihan  Go Travel</h1>
    </div>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pembayaran</h6>
                        </div>
                  <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Tagihan</th>
                                            <th>Jumlah Tagihan</th>
                                            <th>Satus Pembayaran</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        <?php foreach($reservasi as $r): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td>GoTravel-<?= $r['id'] ?></td>
                                            <td>Rp. <?= number_format($r['uang_muka']) ?></td>
                                            <?php if($r['status_pembayaran']==0): ?>
                                            <td><h6 class="btn btn-warning ml-5">Belum Bayar</h6></td>
                                            <?php elseif($r['status_pembayaran']==1) : ?>
                                                <td><h6 class="btn btn-success ml-5">sukses</h6></td>
                                            <?php else : ?>
                                                <td><h6 class="btn btn-danger ml-5">gagal</h6></td>
                                            <?php endif ?>
                                            <?php if($r['status_pembayaran']==1): ?>
                                                <td>
                                                    <a href=""><i class="fas fa-download fa-2x" style="margin-right:5px ;"></i>Bukti Pelunasan DP</a>
                                                </td>
                                            <?php else: ?>
                                            <td>
                                                <a href="<?= base_url() ?>penumpang/addPembayaran/<?= $r['id'] ?>"><i class="fas fa-money-check-alt"></i> Bayar</a>
                                            </td>
                                            <?php endif ?>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                     </div>
            </div>
          
</div>
</div>

