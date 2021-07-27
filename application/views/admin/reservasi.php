<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <h1 style="color: black; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 10px;">Reservasi Go Travel</h1>
    </div>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Reservasi</h6>
                        </div>
                  <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Kota Tujuan</th>
                                            <th>Jumlah Peserta</th>
                                            <th>Alamat Penjemputan</th>
                                            <th>Tgl Berangkat</th>
                                            <th>Jumlah Uang Muka</th>
                                            <th>Total biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        <?php foreach($reservasi as $r): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r['nama'] ?></td>
                                            <td><?= $r['name_kota'] ?></td>
                                            <td><?= $r['jumlah_orang'] ?></td>
                                            <td><?= $r['alamat_penjemputan'] ?></td>
                                            <td><?= date('l, d F Y',strtotime($r['tgl_berangkat'])) ?></td>
                                            <td><?= 'Rp. '.number_format($r['uang_muka']) ?></td>
                                            <td><?= 'Rp. '.number_format($r['total_bayar']) ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                     </div>
            </div>

           
