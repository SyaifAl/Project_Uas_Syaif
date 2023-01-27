<?php
if (isset($_GET['aksi']) && isset($_POST['katakunci_gunung'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_gunung'] = $_POST['katakunci_gunung'];
    $katakunci_gunung = $_SESSION['katakunci_gunung'];
  }
}
if (isset($_SESSION['katakunci_gunung'])) {
  $katakunci_gunung = $_SESSION['katakunci_gunung'];
}
?>
<!-- home start -->
    <section id="home" class="relative pt-32 pb-9 bg-center bg-cover h-screen bg-no-repeat" style="background-image: url(dist/img/back.png);">
        <div class="container">
            <div class="w-full px-4 ">
                <div class="max-w-3xl mx-auto text-center mb-16">
                        <h1 class="block font-extrabold text-white text-4xl mb-5 pt-28">Explore Gunung di Indonesia</h1>
                        <p class="block font-medium text-white mb-16">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente architecto saepe doloribus eveniet obcaecati corrupti libero quibusdam qui excepturi assumenda.</p>
                        <form method="post" action="index.php?include=gunung&aksi=cari">
                            <div class="w-full">
                                <div class="w-30 mb-5 px-4">
                                    <input type="text" id="kata_kunci" class="text-base font-medium w-1/2 bg-white py-2 px-4 rounded-md focus:ring-ijo focus:ring-1 focus:border-ijo" placeholder="Cari destinasi favoritmu..." name="katakunci_gunung">
                                    <button id="search" type="submit" class="text-base font-semibold text-white
                                    bg-secondary py-2 px-8 mx-1 rounded-md hover:bg-green-900 hover:shadow-lg transition duration-500">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- home end -->

    <!-- content start -->
    <section id="content" class="pt-28 pb-28">
        <div class="container" id="#search">
            <?php 
                $sql_a = "SELECT `id_gunung`,`nama_gunung`, `desc_singkat`, `foto_gunung` FROM `gunung`";
                if (isset($katakunci_gunung) && !empty($katakunci_gunung)){
                    $sql_a .= " WHERE `nama_gunung` LIKE '%$katakunci_gunung%' ";
                } 
                $query_a = mysqli_query($koneksi,$sql_a);
                while($data_a = mysqli_fetch_row($query_a)){
                    $id_gunung = $data_a[0];
                    $nama_gunung = $data_a[1];
                    $desc_singkat = $data_a[2];
                    $gambar = $data_a[3];
                
            ?>
            <div class="flex flex-wrap w-full pt-4">
                <div class="w-1/3 px-4">
                    <img src="admin/foto_gunung/<?php echo $gambar?>" alt="" width="300" height="250">
                </div>
                <div class="w-2/3 align-self-center">
                    <h1 class="block fw-bold text-black text-3xl mb-3"><?php echo $nama_gunung?></h1>
                    <p class="block text-abu"><?php echo $desc_singkat?></p>
                    <p class=" text-ijo font-semibold mt-9 underline"><a href="index.php?include=detail-gunung&data=<?php echo $id_gunung?>">Baca Selengkapnya</a></p>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
    <!-- content end -->