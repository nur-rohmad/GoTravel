<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <h1 style="color: black; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 10px;">Kota Tujuan</h1>
    </div>
<div class="container ">
<div class="row  py-3">
<?php foreach($kota->result_array() as $i ): ?>
    <div class="col-lg-4 py-3">
        <div class="card shadow" style="width: 18rem; color: black;">
             <img src="<?= base_url() ?>/asset/img/kota_tujuan/<?= $i['image']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $i['name_kota']; ?></h5>
            <p class="card-text"><?= $i['deskripsi']; ?></p>
        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Harga : Rp. <?= number_format($i['harga']); ?> </li>
            </ul>
        </div>
    </div>
    <?php endforeach; ?>

</div>
</div>



<!-- </div> -->