<?php
if ((isset($_GET['data']))) {
        $id_booking = $_GET['data'];
    }
    ?>

<section class="payment my-5">
    <div class="container my-5">
        <div class="row my-5 pb-5">
            <div class="col">
                <img src="img/payment.png" style="width: 300px;" class="mx-auto"/>
                <p class="text-xl fw-bold my-3 text-center">Silakan Upload Bukti Pembayaran <br>Booking SIMAKSI Anda</p>
            </div>
            <div class="col align-self-center">
                <div class="col-sm-13">
                    <form action="index.php?include=konfirmasi-bukti-bayar&data=<?php echo $id_booking?>" method="post" enctype="multipart/form-data">
                        <label for="tgl">Tanggal Transaksi</label>
                        <input type="date" id="tgl" class="form-control" name="tgl"> <br><br>

                        <label for="fname">Upload File</label> <br>
                        <input type="file" id="fname" class="form-control" name="bukti"> <br><br>
                        <button class="btn bg-secondary text-white justify-content-end">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>