<div class="container-lg">
<div class="d-flex justify-content-center">
        <h1 style=" font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 10px;">Bayar Tagihan</h1>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto pt-4 shadow">
            <form method="post" action="" >
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Id Transaksi</label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" value="<?= $invoice['id'] ?>" disabled name="id_reservasi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Total Tagihan</label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" value=" Rp. <?= number_format($invoice['uang_muka']) ?>" disabled name="uang_muka">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        Upload Transfer
                    </div> 
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                <?= form_error('image', '<small class="text-danger pl-3">','</small>') ?>
                             </div>
                            </div>
                        </div>
                    </div>   
                 </div>
               

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                    <div class="col-sm-2">
                            <a href="<?= base_url('penumpang/pembayaran') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
</div>
    

