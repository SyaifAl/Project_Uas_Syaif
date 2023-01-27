<?php 
    $sql_a = "SELECT `id_artikel`,`penulis`, `tgl`, `judul_artikel`, `isi`, `gambar` FROM `artikel` ORDER BY `id_artikel` DESC LIMIT 1 ";
    $query_a = mysqli_query($koneksi,$sql_a);
    while($data_a = mysqli_fetch_row($query_a)){
        $id_artikel = $data_a[0];
        $penulis = $data_a[1];
        $tgl = $data_a[2];
        $judul_artikel = $data_a[3];
        $isi= $data_a[4];
        $gambar = $data_a[5];
    }
?>

<div class="container mt-5">
        <div class="row ">
            <div class="col">
                <p class="text-sm"><?php echo $tgl;?> - <?php echo $penulis;?> </p>
                <h2 class="fw-bold text-3xl my-2"><?php echo $judul_artikel;?></h2>
                <img src="admin/artikel/<?php echo $gambar?>" alt="Gambar Berita" width="600" height="400">
                <p class="mt-3"><?php echo $isi;?></p>
            </div>
            <div class="col ml-3">
                <h2 class="fw-bolder text-2xl my-3">Berita Terbaru</h2>
                <?php 
                $sql_a = "SELECT `id_artikel`,`penulis`, `tgl`, `judul_artikel`, `isi`, `gambar` FROM `artikel` ORDER BY `id_artikel` DESC LIMIT 3 ";
                $query_a = mysqli_query($koneksi,$sql_a);
                while($data_a = mysqli_fetch_row($query_a)){
                    $id_artikel = $data_a[0];
                    $penulis = $data_a[1];
                    $tgl = $data_a[2];
                    $judul_artikel = $data_a[3];
                    $isi= $data_a[4];
                    $gambar = $data_a[5];
                
            ?>
            <div class="row mt-4">
                <div class="col-md-3">
                    <img 
                    style="width: 150px; aspect-ratio: 1/1"
                    src="admin/artikel/<?php echo $gambar?>" alt="">
                </div>
                <div class="col">
                    <p>
                        <p class="text-sm"><?php echo $tgl?> - <?php echo $penulis?> </p>
                        <h5 class="fw-bold text-xl my-2"><?php echo $judul_artikel?> </h5>
                        <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel?>" class="text-secondary text-xs underline">Baca selengkapnya</a>
                    </p>
                </div>
            </div>
            <?php }?>
            </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <h2 class="fw-bold my-5 text-3xl">Berita Lainnya</h2>
        <div class="row">
            <?php 
                $sql_a = "SELECT `id_artikel`,`penulis`, `tgl`, `judul_artikel`, `gambar` FROM `artikel` ORDER BY `id_artikel` DESC";
                $query_a = mysqli_query($koneksi,$sql_a);
                while($data_a = mysqli_fetch_row($query_a)){
                    $id_artikel = $data_a[0];
                    $penulis = $data_a[1];
                    $tgl = $data_a[2];
                    $judul_artikel = $data_a[3];
                    $gambar = $data_a[4];
            ?>
            <div class="col-md-4">
                <div class="mb-5">
                    <img
                  class="rounded-4"
                  style="object-fit: cover; width: 400px; height:200px; aspect-ratio: 1/1"
                  src="admin/artikel/<?php echo $gambar?>"
                  alt=""
                />
                <p class="mt-3">
                    <p class="text-xs"> <?php echo $tgl?> - <?php echo $penulis?></p>
                  <h6 class="fw-bold my-2"><?php echo $judul_artikel?></h6>
                  <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel?>" class="text-secondary my-1 text-xs underline">Baca selengkapnya</a>
                </p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>