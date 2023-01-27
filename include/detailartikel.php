<?php
  if(isset($_GET['data'])){
    $id_artikel= $_GET['data'];
  }
?>
<div class="container my-5">
        <div class="row ">
            <?php 
            $sql_a = "SELECT `id_artikel`,`penulis`, `tgl`, `judul_artikel`, `isi`, `gambar` FROM `artikel` WHERE `id_artikel`= '$id_artikel' ";
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
            <h1 class="text-3xl fw-bold"><?php echo $judul_artikel?></h1>
            <p class="mt-2 text-sm"><?php echo $tgl?> - <?php echo $penulis?></p>
            <img 
            style="object-fit: cover;  width: 100%; height: 550px;  aspect-ratio: 1/1"
            src="admin/artikel/<?php echo $gambar?>" alt="" class="mt-3">
            <p class="mt-3 " ><?php echo $isi?></p>
            <!-- <p class="mt-3">A nunc nec, mattis habitant in blandit. Duis amet risus euismod volutpat, nunc vitae. Cras adipiscing netus vitae, enim. Et odio hendrerit egestas facilisis iaculis. Rhoncus sem imperdiet egestas tellus est arcu. Ligula elementum consequat vitae sit. Velit nunc, faucibus dolor a, ac cras tristique. Feugiat iaculis id fringilla dolor. Pellentesque laoreet gravida porta euismod. Commodo purus nam erat eleifend laoreet in pretium. Lectus sed in placerat faucibus quis nunc nec. Vitae eget lacus, a sed arcu scelerisque sagittis. Interdum faucibus accumsan vitae nullam porttitor nisi, adipiscing.</p>
            <p class="mt-3">Sed a ut dui nibh consequat, nunc. Urna imperdiet aliquam blandit aliquam mi sed. Mattis dui tellus id quisque malesuada. In odio gravida adipiscing diam gravida et ullamcorper interdum. Massa massa massa mattis viverra egestas interdum tortor, at lectus. Et amet nunc mattis viverra. Et mauris, nisi, porta ac. Convallis molestie vel quis mauris iaculis. Egestas gravida velit auctor sem nascetur rhoncus condimentum est aliquam. Id ullamcorper posuere donec cursus lobortis ullamcorper. Amet, rhoncus adipiscing aliquet id amet amet lacus. Quam feugiat id turpis aenean diam a metus. Augue arcu sed faucibus massa augue euismod tellus.</p>
            <p class="mt-3">Magna tellus aliquam malesuada eros, morbi auctor iaculis. Placerat nullam sit sed diam. Turpis faucibus rhoncus aenean ullamcorper diam nunc etiam feugiat. Amet massa augue mattis sed eleifend. Mus auctor et aliquet turpis. Enim vitae porttitor vulputate sapien id cursus. Pellentesque iaculis luctus sapien molestie nunc, vulputate morbi. Molestie scelerisque lorem nulla amet, vulputate et. Nulla eget felis blandit velit leo malesuada egestas diam. Sed eget mi nec faucibus gravida eget. Massa, feugiat morbi nulla et. Semper sed dis at nulla. Pellentesque id quis nisi, ullamcorper nulla pellentesque morbi tincidunt faucibus. Parturient blandit tempor ornare risus suspendisse scelerisque.</p> -->
        </div>

        <div class="container my-5">
        <h2 class="fw-bold my-5 text-3xl">Berita Lainnya</h2>
        <div class="row">
            <?php 
                $sql_a = "SELECT `id_artikel`,`penulis`, `tgl`, `judul_artikel`, `gambar` FROM `artikel` ORDER BY `id_artikel` DESC LIMIT 3";
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

    </div>
    
    <section class="subscribe bg-secondary py-5">
        <div class="container">
            <div class="subscribe-text" style="margin-top: 80px; text-align: center;">
            <h2 class="text-light fw-bold text-3xl">Ingin Baca Berita Terbaru?</h2>
            <p class="text-light">Yuk, berlangganan dengan bulletin Kami</p>
        </div>
        <form class="d-flex p-5 " role="search">
            <input class="form-control me-2 ml-5" type="search" placeholder="Masukkan email Anda" aria-label="Search">
            <button class="btn btn-primary " role="button">Berlangganan</button>
        </form>
        </div>
    </section>