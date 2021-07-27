<div class="container-lg">
        <div class="row">
            <div class="col-sm-6">
                <div class="gambar float-left">
                    <img class="rounded-sm mr-2" src="<?= base_url('asset/img/logo_GoTravel.png') ?>" style="width: 150px;">
                </div>
                <div class="text pt-4" style="color: black;">
                    <h4><strong> PT. Go Travel </strong></h4>
                    <h6>Jl. Pandhawa No. 25 Bintoyo Padas Padas Ngawi</h6>
                    <h6>adminTravel@gotravel.com</h6>
                    <h6>Wa. 08428282898</h6>
                </div> 
            </div>

            <div class="col-sm-6 d-flex justify-content-end pr-4" style="color: black; font-weight: bold; letter-spacing: 10px;">
                <h1 class="pt-5">INVOICE</h1>
            </div>
        </div>

   <hr style="height: 2%; border: 2px solid black; background-color: black;">

   <div class="row">
       <div class="col-sm-7" style="color: black; font-family: 'Times New Roman', Times, serif;">
           <h6 class="pb-3" style="font-size: 30px;"><strong>Kepada Yth. </strong></h6>
           <div>
                <h6 class="float-left mr-5">Nama</h6>
                <h6><?= $invoice['nama'] ?></h6>
           </div>
           <div>
                <h6 class="float-left mr-5">Email</h6>
                <h6><?= $invoice['email'] ?></h6>
           </div>
           <div>
                <h6 class="float-left" style="margin-right: 35px;">Alamat</h6>
                <h6><?= $invoice['alamat'] ?></h6>
           </div>
       </div>
       <div class="col-sm-5 mt-4" style="color: black; font-family: 'Times New Roman', Times, serif; letter-spacing: 2px;">
            <div>
                <h6 class="float-left mr-5">No. Invoice</h6>
                <h6>GoTravel-<?= $invoice['id'] ?></h6>
           </div>
           <div>
                <h6 class="float-left " style="margin-right: 35px;">Tgl Reservasi</h6>
                <h6><?= date('l, d F Y',strtotime($invoice['date_order'])) ?></h6>
           </div>
           <div>
                <h6 class="float-left mr-5">Pembayaran</h6>
                <h6>DP 10%</h6>
           </div>
       </div>
   </div>

   <div class="row">
       <div class="col-sm-12">
       <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Keterangan</th>
                <th>Qty</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr style="color: black;">
            <th scope="row">1</th>
                <td>Pembayaran Uang Muka Untuk Reservasi Travel dengan Tujuan <?= $invoice['name_kota'] ?> dengan jumlah orang <?= $invoice['jumlah_orang'] ?> orang </td>
                <td>1</td>
                <td>Rp. <?= number_format($invoice['uang_muka']) ?></td>
            </tr>
        </tbody>
       </table>
       </div>
   </div>

   <div class="row mt-5" style="color: black; font-family: 'Times New Roman', Times, serif; letter-spacing: 1px;">
       <div class="col-sm-6">
           <h5 class="mb-4">Transfer pembayaran ke rekening <strong>BRI</strong> berikut :</h5>
           <div>
                <h6 class="float-left" style="margin-right: 65px;">Atas Nama </h6>
                <h6>: PT. Go Travel Indonesia</h6>
           </div>
           <div>
                <h6 class="float-left mr-5">No.Rekening </h6>
                <h6>: 7363535355334</h6>
           </div>
       </div>

       <div class="col-sm-6">
           <div style="padding-left: 300px;">
                <h5 class="mb-5">TTD</h5>
                <h5>PT. GoTravel Indonesi</h5> 
            </div>
       </div>
   </div>

</div>

<script>
        window.print();
</script>