<div class="container-fluid">
<div class="d-flex justify-content-center">
        <h1>New Reservasi</h1>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto pt-5 shadow">
            <form method="post" action="">
            <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kota Tujuan</label>
                    <div class="col-sm-9">
                    <select class="custom-select" id="inputGroupSelect02" name="kota_tujuan">
                        <option selected>Pilih</option>
                        <?php foreach($kotaTujuan as $kota) : ?>
                            <option  value="<?= $kota['id']; ?>"><?= $kota['name_kota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumah Orang</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" id="exampleInputEmail" name="jumlah_orang">
                    <?= form_error('jumlah_orang', '<small class="text-danger pl-3">','</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Penjemputan</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputEmail" name="alamat_penjemputan">
                        <?= form_error('alamat_penjemputan', '<small class="text-danger pl-3">','</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                    <div class="col-sm-9">
                    <input type="date" class="form-control " id="exampleInputEmail"  name="tgl_berangkat">
                        <?= form_error('tgl_berangkat', '<small class="text-danger pl-3">','</small>') ?>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Booking</button>
                    </div>
                    <div class="col-sm-2">
                            <a href="<?= base_url('penumpang/reservasi') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
        </div>

       