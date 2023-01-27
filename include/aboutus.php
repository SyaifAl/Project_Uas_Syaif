<div class="header text-center bg-primary py-5 text-light">
    <h2 class="fw-bold text-3xl mb-4">Tentang Kami</h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php?include=booking-simaksi" class="text-center text-light">Home</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Tentang Kami</li>
    </ol>
    </nav>
</div>

<section class="my-5 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center">
                <img src="img/logo-about.png" alt="">
            </div>
            <div class="col align-self-center">
                <?php 
                    $sql_k = "SELECT `judul_konten`,`isi_konten` FROM `konten` WHERE 
                    `id_konten`='2'";
                    $query_k = mysqli_query($koneksi,$sql_k);
                    while($data_k = mysqli_fetch_row($query_k)){
                        $judul_konten = $data_k[0];
                        $isi_konten = $data_k[1];
                    }
                ?>
                <h1 class="text-primary text-5xl my-3" style="font-family:'Alfa Slab One'; letter-spacing: 8px;"><?php echo $judul_konten?></h1>
                <p class="lh-bg">
                    <?php echo $isi_konten?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="team-section">
     <div class="container">
         <div class="row">
             <div class="section-title">
                 <h1 class="text-center font-semibold text-4xl text-primer">Our Team</h1>
                 <p class="text-center ">Kelompok 5 Sistem Informasi  3C Fakultas Vokasi Universitas Brawijaya</p>
             </div>
         </div>
         <div class="row">
             <div class="team-items" >
                <?php 
                    $sql_k = "SELECT `nama`,`foto` FROM `admin`";
                    $query_k = mysqli_query($koneksi,$sql_k);
                    while($data_k = mysqli_fetch_row($query_k)){
                        $nama = $data_k[0];
                        $foto = $data_k[1];
                ?>
                  <div class="item">
                      <img src="admin/foto/<?php echo $foto?>" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5><?php echo $nama?></h5>
                               <!-- <p>213140707111027</p> -->
                          </div>
                      </div>
                  </div>
                  <?php } ?>
             </div>
         </div>
     </div>
  </section>