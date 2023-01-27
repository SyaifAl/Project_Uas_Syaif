<div class="header text-center bg-primary py-5 text-light">
    <h2 class="fw-bold text-3xl mb-4">Pembayaran</h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php" class="text-center text-light">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?include=booking-simaksi" class="text-center text-light">Booking</a></li>
        <li class="breadcrumb-item"><a href="index.php?include=form-pendaki" class="text-center text-light">Form</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Pembayaran</li>
    </ol>
    </nav>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col py-4 mx-5 ">
                <h5 class="fw-bold my-3">Data Pendaki</h5>
                <table class="table table-bordered rounded-top">
        <thead class="bg-secondary text-center text-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">No. Telp</th>
        </thead>
        <tbody>
            <?php
                if ((isset($_GET['data_checkout']))) {
                        $id_booking= $_GET['data_checkout'];
                    }
                    $sql_k = "SELECT `p`.`id_pendaki`, `p`.`nama_pendaki`, `p`.`telpon`, `b`.`harga_simaksi` FROM `pendaki` `p` JOIN `booking` `b` ON `p`.`id_booking` = `b`.`id_booking` WHERE `p`.`id_booking` = '$id_booking' ";
                    
                    $query_k = mysqli_query($koneksi,$sql_k);
                while ($data_k = mysqli_fetch_row($query_k)) {
                    $id = $data_k[0];
                    $nama = $data_k[1];
                    $harga = $data_k[2];
                    $tlp = $data_k[3];
                ?>
            <tr>
                <td class="text-center"><?php echo $id ?></td>
                <td><?php echo $nama ?></td>
                <td class="text-center"><?php echo $harga ?></td>
                <td class="text-center"><?php echo $tlp ?></td>
            </tr>
            <?php } ?>
            <!-- <tr>
                <td class="text-center">1.</td>
                <td>Gunung Gede Pangrango</td>
                <td class="text-center">80.000</td>
            </tr>
            <tr>
                <td class="text-center">1.</td>
                <td>Gunung Gede Pangrango</td>
                <td class="text-center">80.000</td>
            </tr>
            <tr>
                <td class="text-center">1.</td>
                <td>Gunung Gede Pangrango</td>
                <td class="text-center">80.000</td>
            </tr> -->
        </tbody>
    </table>
    </div>
            <div class="col-5">
                <div class="detail-pembayaran bg-light rounded-top py-5 mx-5 mt-5">
                    <div class="row">
                        <h5 class="text-center fw-bold">Informasi Pembayaran</h5>
                        <div class="row px-5 mt-4">
                            <?php
                                $sql_d = "SELECT `b`.`jumlah_pendaki`, `g`.`nama_gunung`, `j`.`nama_jalur`, `b`.`harga_simaksi`, `b`.`jumlah_pendaki` * `b`.`harga_simaksi` FROM `booking` `b` JOIN `pendaki` `p` ON `b`.`id_booking` = `p`.`id_booking`  JOIN `jalur` `j` ON `b`.`id_jalur` = `j`.`id_jalur` JOIN `gunung` `g` ON `j`.`id_gunung` = `g`.`id_gunung` WHERE `b`.`id_booking` = '$id_booking' ";
                                
                                $query_d = mysqli_query($koneksi,$sql_d);
                                while ($data_d = mysqli_fetch_row($query_d)) {
                                    $rombongan = $data_d[0];
                                    $gunung = $data_d[1];
                                    $jalur = $data_d[2];
                                    $harga = $data_d[3];
                                    $total = $data_d[4];
                                }
                            ?>
                            <div class="col text-start">
                                <p>Anggota</p>
                                <p>Gunung</p>
                                <p>Jalur</p>
                                <p>Harga</p>
                                <p class="fw-bold">Total</p>
                            </div>
                            <div class="col text-end">
                                <p><?php echo $rombongan?></p>
                                <p><?php echo $gunung?></p>
                                <p><?php echo $jalur?></p>
                                <p><?php echo $harga?></p>
                                <p class="fw-bold"><?php echo $total?></p>
                            </div>
                            <hr style="border-width: 4px;" class="mt-4">
                        </div>
                        <h5 class="text-center fw-bold mt-3">Metode Pembayaran</h5>
                            <div class="row px-5 mt-4">
                                <div class="col text-start lh-2">
                                    <img src="img/BCA.png" width="100">
                                </div>
                                <div class="col text-end text-xs">
                                    <p class="font-bold ">Bank BCA</p>
                                    <p>PT. Moencak Indonesia</p>
                                    <p>2131407141</p>
                                </div>
                            </div>
                            <div class="row px-5 mt-4">
                                <div class="col text-start lh-2">
                                    <img src="img/mandiri.png" width="100">
                                </div>
                                <div class="col text-end text-xs">
                                    <p class="font-bold ">Bank Mandiri</p>
                                    <p>PT. Moencak Indonesia</p>
                                    <p>220937612</p>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row text-center mb-5 mx-5" >
                    <a href="index.php?include=bukti-pembayaran&data=<?php echo $id_booking?>" role="button" class="btn btn-primary mt-3text-center">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>