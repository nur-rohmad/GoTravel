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
                                            <th>Bukti Transfer</th>
                                            <th width="30%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        <?php foreach($reservasi as $r): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td>GoTravel-<?= $r['id'] ?></td>
                                            <td>Rp. <?= number_format($r['uang_muka']) ?></td>
                                            <td>
                                                <?php if($r['status_pembayaran']==1): ?> 
                                                    <a href="" class="ml-5"><i class="fas fa-download"></i>Bukti Transfer</a>
                                                <?php else: ?>
                                                    <h6 class="btn btn-danger ml-5"><?= $r['status'] ?></h6>    
                                                 <?php endif; ?>
                                            </td>
                                                <td>
                                            <?php if($r['status_pembayaran']==1): ?>
                                                <div class="float-left mr-5">
                                                   <a href="" class="btn btn-success"><i class="fas fa-check mr-2"></i>Setuju</a>
                                                </div>
                                                <div>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Gagal</a>
                                                </div>
                                            <?php elseif($r['status_pembayaran']==0): ?>
                                                    <div class="ml-5">
                                                        <a class="btn btn-primary" href=""><i class="fas fa-paper-plane mr-2"></i>Kirim Pesan</a>
                                                    </div>
                                            <?php else: ?>
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

