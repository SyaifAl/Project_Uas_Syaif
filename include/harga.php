<div class="header text-center bg-primary py-5 text-light">
    <h2 class="fw-bold text-3xl mb-4">Daftar Harga SIMAKSI</h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php" class="text-center text-light">Home</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Harga</li>
    </ol>
    </nav>
</div>

<section class="my-5">
    <div class="container">
        <table class="table table-bordered rounded-top">
        <thead class="bg-secondary text-center text-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Gunung</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
        </thead>
        <tbody>
            <?php
            $posisi = 0;
            $sql_k = "SELECT `nama_gunung`, `harga_simaksi`,`id_gunung` FROM `gunung` ";
            $query_k = mysqli_query($koneksi,$sql_k);
            while($data_k = mysqli_fetch_row($query_k)){
            $nama_gunung = $data_k[0];
            $harga_simaksi = $data_k[1];
            $id_gunung = $data_k[2];
            ?>
            <tr>
                <td class="text-center"> <?php echo $posisi+1;?></td>
                <td><?php echo $nama_gunung;?></td>
                <td class="text-center"><?php echo $harga_simaksi;?></td>
                <td class="text-center"><a href="index.php?include=detail-gunung&data=<?php echo $id_gunung;?>" style="color: #20774d;"><i class="fas fa-eye"></i> Details</a></td>
            </tr>
            <?php $posisi++; } ?>
        </tbody>
    </table>
    </div>
    <div class="text-center">
        <a href="index.php?include=booking-simaksi" class="bg-ijo font-regular py-2 px-8 rounded-md hover:bg-green-900 hover:shadow-lg transition duration-500" style="color: white;">Pesan Sekarang</a>
    </div>
</section>