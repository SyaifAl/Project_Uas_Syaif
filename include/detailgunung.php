<?php
  if(isset($_GET['data'])){
    $id_gunung= $_GET['data'];
  }
?>

<?php 
    $sql_a = "SELECT `g`.`nama_gunung`, `g`.`desc`, `g`.`letak_geografis`, `g`.`ketinggian`, `g`.`sop`, `g`.`foto_gunung`, GROUP_CONCAT(`j`.`nama_jalur`) FROM `gunung` `g` JOIN `jalur` `j` ON `g`.`id_gunung` = `j`.`id_gunung`  WHERE `g`.`id_gunung`= '$id_gunung' GROUP BY `j`.`id_gunung` = '$id_gunung'";
    $query_a = mysqli_query($koneksi,$sql_a);
    while($data_a = mysqli_fetch_row($query_a)){
        $nama_gunung = $data_a[0];
        $desc = $data_a[1];
        $letak = $data_a[2];
        $tinggi = $data_a[3];
        $sop= $data_a[4];
        $gambar = $data_a[5];
        $jalur = $data_a[6];
    }
?>

<!-- home start -->
    <section id="home" class="relative pt-5 pb-7 h-full">
        <div class="container">
            <div class="flex flex-wrap w-full">
                <div class="w-1/2 px-4">
                    <img src="admin/foto_gunung/<?php echo $gambar?>" alt="" width="700"  height="500">
                </div>
                <div class="w-1/2 px-8">
                    <h1 class="block font-bold text-black text-3xl mb-3"><?php echo $nama_gunung?></h1>
                        <span class="line max-w-sm"></span>
                        <h2 class="block font-bold text-black text-xl mt-7">Letak Geografis</h2>
                            <p class="block text-abu mb-6"><?php echo $letak?></p>
                            <h2 class="block font-bold text-black text-xl">Ketinggian</h2>
                            <p class="block text-abu mb-6"><?php echo $tinggi?> mdpl</p>
                            <h2 class="block font-bold text-black text-xl">Jalur Pendakian</h2>
                            <p class="block text-abu mb-6"><?php echo $jalur ?></p>
                            <h2 class="block font-bold text-black text-xl">SOP Pendakian</h2>
                            <a href="#" class="font-semibold py-10"><a href="admin/sop/<?php echo $sop;?>" class="text-ijo">Baca SOP</a></a>
                </div>
                <div class="w-full px-4 pt-5">
                    <h2 class="font-bold text-black text-xl">Penjelasan Singkat</h2>
                    <p class="text-abu mb-5"><?php echo $desc?></p>
                </div>
                <div class="w-full text-center my-4">
                    <button class="text-base font-regular text-white bg-ijo py-2 px-8 mx-5 rounded-md hover:bg-green-900 hover:shadow-lg transition duration-500"><a href="index.php?include=harga-simaksi">Pesan Sekarang</a></button>
                </div>
            </div>
    </section>
    <!-- home end -->

    <!-- content start -->
    <section id="content" class="pt-20 pb-32 bg-secondary">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-2xl mx-auto text-center mb-16">
                    <h2 class="font-semibold text-slate text-3xl mb-4 sm:text-4xl lg:text-5xl text-light">Rekomendasi Trip</h2>
                    <p class="font-normal text-light text-medium md:text-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi quidem id mollitia nesciunt corporis eum assumenda illum velit optio! Itaque!</p>
                </div>
            </div>
            <div class="flex flex-wrap w-full px-4 justify-center my-5">
            <?php 
                $sql_g = "SELECT `g`.`id_gunung`, `g`.`nama_gunung`,`p`.`nama_provinsi`, 
                `g`.`harga_simaksi`, `g`.`foto_gunung` FROM `gunung` `g`
                INNER JOIN `provinsi` `p` ON `g`.`id_provinsi` =  
                `p`.`id_provinsi` ORDER BY `g`.`id_gunung` DESC LIMIT 3";
                //echo $sql_b;
                $query_g = mysqli_query($koneksi,$sql_g);
                while($data_g= mysqli_fetch_row($query_g)){
                    $id_gunung = $data_g[0];
                    $nama_gunung = $data_g[1];
                    $provinsi = $data_g[2];
                    $harga = $data_g[3];
                    $foto = $data_g[4];
            ?>
            <div class=" bg-light rounded-lg hover:shadow-lg duration-300 m-2">
                <div class="w-full overflow-hidden">
                    <a href=""><img src="admin/foto_gunung/<?php echo $foto;?>" alt="" style="width: 360px;">
                </div>
                <div class="w-full">
                    <h1 class="block font-semibold text-black text-2xl px-4 pt-3 pb-2 text-start"><?php echo $nama_gunung;?></h1>
                        <div class="flex items-center px-4">
                        <svg width="18" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 315 315" style="enable-background:new 0 0 315 315;" xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <path d="M157.5,0C93.319,0,41.103,52.215,41.103,116.397c0,62.138,106.113,190.466,110.63,195.898
                                            c1.425,1.713,3.538,2.705,5.767,2.705c2.228,0,4.342-0.991,5.767-2.705c4.518-5.433,110.63-133.76,110.63-195.898
                                            C273.897,52.215,221.682,0,157.5,0z M157.5,295.598c-9.409-11.749-28.958-36.781-48.303-65.397
                                            c-34.734-51.379-53.094-90.732-53.094-113.804C56.103,60.486,101.59,15,157.5,15c55.91,0,101.397,45.486,101.397,101.397
                                            c0,23.071-18.359,62.424-53.094,113.804C186.457,258.817,166.909,283.849,157.5,295.598z"/>
                                        <path d="M195.657,213.956c-3.432-2.319-8.095-1.415-10.413,2.017c-10.121,14.982-21.459,30.684-33.699,46.67
                                            c-2.518,3.289-1.894,7.996,1.395,10.514c1.36,1.042,2.963,1.546,4.554,1.546c2.254,0,4.484-1.013,5.96-2.941
                                            c12.42-16.22,23.933-32.165,34.219-47.392C199.992,220.938,199.09,216.275,195.657,213.956z"/>
                                        <path d="M157.5,57.5C123.589,57.5,96,85.089,96,119s27.589,61.5,61.5,61.5S219,152.911,219,119S191.411,57.5,157.5,57.5z
                                            M157.5,165.5c-25.64,0-46.5-20.86-46.5-46.5s20.86-46.5,46.5-46.5c25.641,0,46.5,20.86,46.5,46.5S183.141,165.5,157.5,165.5z"/>
                                    </g>
                                </g>
                            </g>
                            
                            </svg>
                            <span class="block text-abu px-4"><?php echo $provinsi;?></span>
                        </div>
                    <p class=" text-primary font-extrabold text-xl text-end px-4 py-5"><?php echo $harga;?> <span class="text-xs"> /orang</span></p>
                </div>
            </div>
        </a>
            <?php } ?>
        </div>
        </div>
    </section>
    <!-- content end -->