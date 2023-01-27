<?php 
    $sql_k = "SELECT `judul_konten`,`isi_konten` FROM `konten` WHERE 
    `id_konten`='1'";
    $query_k = mysqli_query($koneksi,$sql_k);
    while($data_k = mysqli_fetch_row($query_k)){
        $judul_konten = $data_k[0];
        $isi_konten = $data_k[1];
    }
?>

<section class="hero-moencak">
    <div class="container mb-5">
        <div class="row" >
            <div class="col align-self-center">
                <h1 class="text-primary text-5xl" style="font-family:'Alfa Slab One'; letter-spacing: 8px;"><?php echo $judul_konten; ?></h1>
                <br>
                <p>
                   <?php echo $isi_konten; ?>
                </p>
                <br>
                <a href="index.php?include=gunung" class="btn bg-secondary text-white" role="button">Get Started</a>
                <div class="row mt-5 text-primary">
                    <div class="col">
                        <h4 id="jml-gunung" class="fw-bold text-3xl ">0</h4>
                        <p>Gunung</p>
                    </div>
                    <div class="col">
                        <h4  id="jml-jalur" class="fw-bold text-3xl ">0</h4>
                        <p>Jalur Pendakian</p>
                    </div>
                    <div class="col">
                        <h4 id="jml-pendaki" class="fw-bold text-3xl ">0</h4>
                        <p>Tim Kami</p>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <img src="img/hero.png" class="w-full" />
            </div>
        </div>
    </div>
</section>

<?php 
    $sql_k = "SELECT `judul_konten`,`isi_konten` FROM `konten` WHERE 
    `id_konten`='3'";
    $query_k = mysqli_query($koneksi,$sql_k);
    while($data_k = mysqli_fetch_row($query_k)){
        $judul_konten2 = $data_k[0];
        $isi_konten2 = $data_k[1];
    }
?>

<section class="card-trip">
    <div class="container text-center">
        <h2 class=" text-4xl font-bold my-3 fw-bold"><?php echo $judul_konten2?></h2>
        <p class="px-5">
            <?php echo $isi_konten2?>
        </p>
        <br>
        <div class="flex flex-wrap w-full px-4 justify-center my-3">
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
                    <a href="index.php?include=detail-gunung&data=<?php echo $id_gunung;?>"><h1 class="block font-semibold text-black text-2xl px-4 pt-3 pb-2 text-start"><?php echo $nama_gunung;?></h1></a>
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
                    <p class="text-primary font-extrabold text-xl text-end px-4 py-5"><?php echo $harga;?> <span class="text-xs"> /orang</span></p>
                </div>
            </div>
        </a>
            <?php } ?>
            <br>
        </div>
    <a href="index.php?include=harga-simaksi" class="btn bg-secondary text-white mb-5" role="button">Cek Harga SIMAKSI</a>
</section>

<section class="kelebihan text-center pt-5">
    <div class="container py-5">
        <div class="row my-5 mx-5">
            <div class="col text-start pr-3">
                <h2 class="font-bold text-4xl">Kenapa Harus <br> Moencak?</h2>
                <br>
                <p class="text-xs">Rasakan nyamannya pendakian Anda bersama Moencak</p>
            </div>
            <div class="col text-start ml-3">
                <img src="img/mountain.png" alt="">
                <br>
                <h6 class="font-bold text-sm">Banyak Pilihan Gunung</h6>
                <p class="text-xs">Kami bekerja sama dengan puluhan taman nasional di Pulau Jawa</p>
            </div>
            <div class="col text-start">
                <img src="img/backpacker.png" alt="">
                <br>
                <h6 class="font-bold text-sm">Pendaki Aman</h6>
                <p class="text-xs">Pendakian terasa aman karena tim Kami akan memandu perjalanan Anda</p>
            </div>
            <div class="col text-start">
                <img src="img/booking.png" alt="">
                <br>
                <h6 class="font-bold text-sm">Pemesanan Mudah</h6>
                <p class="text-xs">Tidak perlu memesan SIMAKSI ke loket, Anda dapat memesannya dari manapun</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="info-terkini m-5 py-5 bg-primer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class=" text-4xl fw-bold text-primer">Info Terkini</h2>
                </div>
                <div class="col text-end">
                    <a href="index.php?include=artikel" class="text-primary">Lihat Semua</a>
                </div>
                </div>
            <div class="row py-5">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    
                    <div class="carousel-inner">
                        <?php 
                        $sql_a = "SELECT `id_artikel`, `judul_artikel`, `gambar` FROM `artikel` ORDER BY `id_artikel` DESC LIMIT 3 ";
                        $query_a = mysqli_query($koneksi,$sql_a);
                        while ($data_a = mysqli_fetch_row($query_a)) {
                            $id_artikel = $data_a[0];
                            $judul_artikel = $data_a[1];
                            $gambar = $data_a[2];
                        ?>
                        <div class="carousel-item active">
                        <img src="admin/artikel/<?php echo $gambar ?>"class="d-block w-100">
                        
                        <div class="carousel-caption">
                            <div class="caption">
                                <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel;?>"><h2 class="text-4xl fw-bold"><?php echo $judul_artikel?></h2></a>
                            <br>
                            <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel?>">Baca Selengkapnya</a>
                            </div>
                        </div>
                        </div>
                        <?php } ?>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<section class="konten-gunung my-5 py-5">
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col">
                <img src="img/desc-prau.png" alt="">
            </div>
            <?php 
                $sql_k = "SELECT `judul_konten`,`isi_konten` FROM `konten` WHERE 
                `id_konten`='4'";
                $query_k = mysqli_query($koneksi,$sql_k);
                while($data_k = mysqli_fetch_row($query_k)){
                    $judul_konten3 = $data_k[0];
                    $isi_konten3 = $data_k[1];
                }
            ?>
            <div class="col lh-5 align-self-center mr-10">
                <h2 class="fw-bold text-4xl"> <?php echo $judul_konten3?></h2>
                <p class="my-4"><?php echo $isi_konten3?></p>
                <br>
                <br>
                <a href="index.php?include=gunung" class="btn bg-secondary text-white" style="margin: 0;">Eksplor Gunung</a>
            </div>
        </div>
    <!-- </div> -->
</section>

<section class="mitra my-5 py-5">
    <div class="container text-center">
        <h2 class="fw-bold text-4xl">Mitra Kami</h2>
        
        <div class="row mt-5 ">
            <?php 
            $sql_g = "SELECT `id_mitra`,`logo` FROM `mitra` ORDER BY `id_mitra` DESC LIMIT 6";
            
            $query_g = mysqli_query($koneksi,$sql_g);
            while($data_g= mysqli_fetch_row($query_g)){
                $id_mitra = $data_g[0];
                $logo = $data_g[1];
        ?>
       
            <div class="col my-3">
                <img src="admin/logo/<?php echo $logo;?>" alt="" class="mx-auto d-block">
            </div>
             <?php } ?>
        </div> 
    </div>
</section>


<script>
    function myfunction() {
        let text;
        confirm("Apakah Anda yakin untuk berlangganan?")
    };
</script>



<section class="subscribe bg-secondary py-5">
    <div class="container">
        <div class="subscribe-text" style="margin-top: 80px; text-align: center;">
        <h2 class="text-light fw-bold text-4xl">Ingin Baca Berita Terbaru?</h2>
        <p class="text-light">Yuk, berlangganan dengan bulletin Kami</p>
    </div>
    <form class="d-flex p-5 " role="search" aria-activedescendant="" method="POST" action="index.php?include=konf-subs">
        <input class="form-control me-2 ml-5" type="search" placeholder="Masukkan email Anda" aria-label="Search" id="email" name="email">
        <!-- <a class="btn btn-primary" role="button">Berlangganan</a> -->
        <div class="">
            <button type="submit" id="btn-berlangganan" class="inline-block px-6 py-3 bg-ijo text-white font-medium text-md leading-tight rounded shadow-md hover:bg-green-900 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-900 active:shadow-lg transition duration-150 ease-in-out" onclick="myfunction()">
                Berlangganan
            </button>
        </div>
    </form>

    <div id="notif-berlangganan" class="modal fade fixed top-0 left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto" style="display: none;">
            <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-center p-3 rounded-t-md">
                    <img src="dist/img/logo.png" alt="" class="object-cover w-32">
                </div>
                <div class="modal-body text-center relative p-5">
                    <p class="text-2xl font-bold leading-normal text-gray-800">Terima Kasih😆</p>
                    <p class="text-md pt-3 font-medium leading-normal text-gray-800">Anda telah terdaftar sebagai pelanggan berita Kami. Silakan Cek Email Anda untuk berita terbaru dari Moencak. </p>
                </div>
                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-2 rounded-b-md">
                    <span id="btn-close" type="button"
                    class="inline-block px-4 py-2 bg-ijo text-white font-medium text-sm leading-tight rounded shadow-md hover:bg-green-900 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-900 active:shadow-lg transition duration-150 ease-in-out"
                    >
                    Tutup
                    </span>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($_GET['notif'])) { ?>
    <?php if ($_GET['notif'] == "tambahberhasil") { ?>
        

        <?php } ?>
        <?php } ?>
<!-- <script>
    const btnClose = document.querySelector('#btn-close');
    const notifBerlangganan = document.querySelector('#notif-berlangganan');
    btnClose.addEventListener('click',()=>{
        console.log('test klik');
                notifBerlangganan.classList.add('hidden');
                notifBerlangganan.classList.remove('block');
            }).then(()=>{
                window.location.replace('index.php')
            })
</script> -->

<!-- <script type="text/javascript">
            setTimeout(()=>{
                const notifBerlangganan = document.querySelector('#notif-berlangganan');
                notifBerlangganan.classList.remove('modal');
                notifBerlangganan.classList.add('block')
            }, 10);   
            </script> -->
            <!-- <script>
// Get the modal
var modal = document.getElementById('notif-berlangganan');

// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

document.addEventListener("DOMContentLoaded", function(event) { 
  modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> -->