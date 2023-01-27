<?php 
    if ((isset($_GET['data']))) {
        $id_booking = $_GET['data'];
    }
?>

<div class="header text-center bg-primary py-5 text-light">
    <h2 class="fw-bold text-3xl mb-4">Form Data Pendaki</h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php" class="text-center text-light">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?include=booking-simaksi" class="text-center text-light">SIMAKSI</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Form Data Pendaki</li>
    </ol>
    </nav>
</div>
    <section class="form-booking">
        <div class="container">
            <form action="index.php?include=konfirmasi-form-pendaki&data=<?php echo $id_booking?>" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col">
                    <!-- Isi Nama -->
                    <div class="form-group col pt-3">
                        <label for="Provinsi" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama">
                        </div>
                    </div>
                    <!-- Isi NIK -->
                    <div class="form-group col pt-3">
                        <label for="Provinsi" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="NIK" aria-label="NIK" aria-describedby="basic-addon1" name="nik">
                        </div>
                    </div>
                    <!-- Pilih Jenis Kelamin -->
                    <div class="form-group col pt-3">
                            <label for="Jenis Kelamin" class="col-sm-3 col-label">Jenis Kelamin</label>
                            <br>
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Pria">
                            <label class="form-group-label" for="Jenis Kelamin">Laki-laki</label>
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Wanita">
                            <label class="form-group-label" for="Jenis Kelamin">Perempuan</label>
                    </div>
                    <br>
                    <!-- Isi Alamat -->
                    <div class="form-group col pt-3 pb-5">
                        <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Alamat" aria-label="Alamat" aria-describedby="basic-addon1" name="alamat">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group col pt-3">
                        <label for="Upload Kartu Identitas" class="col-sm-5 col-form-label">Upload Kartu Identitas</label>
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" name="upload-kartu-identitas" id="upload-kartu-identitas" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group col pt-3">
                        <label for="Email" class="col-sm-3 col-form-label">E-mail</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="E-mail" aria-label="Email" aria-describedby="basic-addon1" name="email">
                        </div>
                    </div>
                    <div class="form-group col pt-3">
                        <label for="Nomor Telepon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Nomor Telepon" aria-label="Nomor Telepon" aria-describedby="basic-addon1" name="tlp">
                        </div>
                    </div>
                    <div class="form-group col pt-3">
                        <label for="Nomor Telepon kerabat/keluarga" class="col-sm-8 col-form-label">Nomor Telepon kerabat/keluarga</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Nomor Telepon kerabat/keluarga" aria-label="Nomor Telepon kerabat/keluarga" aria-describedby="basic-addon1" name="tlp_kerabat">
                        </div>
                    </div>
                    <div class="tombol pt-5 text-end ">
                        <div class="col-sm-12">
                            <button class="btn bg-secondary text-white float-right">Tambah Anggota</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>

    <div class="konten pt-5 col-8 mx-auto">
        <center>
            <p>Pastikan alamat e-mail benar karena karena konfirmasi booking pendakian akan dikirim ke alamat e-mail yang anda gunakan untuk pendaftaran booking online, apabila tidak ada pesan pemberitahuan pada kotak masuk gmail harap periksa pada spam.</p>
        </center>
    </div>

    <div class="container">
        <div class="pendaki fs-2 fw-bold pt-5">
            <p class="text-xl font-bold">Data Pendaki</p>
        </div>
        <table class="table table-bordered mt-2">
            <thead>
            <tr class="table-success text-center align-self-center">
                <th width="10%" scope="col">Nama</th>
                <th width="10%" scope="col">NIK</th>
                <th width="10%" scope="col">Jenis Kelamin</th>
                <th width="10%" scope="col">Alamat</th>
                <th width="10%" scope="col">E-mail</th>
                <th width="10%" scope="col">Telepon</th>
                <th width="10%" scope="col">Telepon Kerabat</th>
                <th  width="10%" scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                // if ((isset($_GET['data_pendaki']))) {
                //         $id_booking = $_GET['data_pendaki'];
                //     }

                if ((isset($_GET['data_pendaki'])) && (isset($_GET['aksi']))) {
                    if ($_GET['aksi'] == 'hapus') {

                        $id_pendaki = $_GET['data_pendaki'];

                        //hapus data admin
                        $sql_dm = "delete from `pendaki` where `id_pendaki` = '$id_pendaki'";
                        mysqli_query($koneksi, $sql_dm);
                    }
                }
                    $sql_k = "SELECT `nama_pendaki`, `nik`, `jenis_kelamin`, `alamat`, `email`, `telpon`, `telpon_keluarga`, `id_pendaki` FROM `pendaki` WHERE `id_booking` = '$id_booking' ";
                    
                    $query_k = mysqli_query($koneksi,$sql_k);
                while ($data_k = mysqli_fetch_row($query_k)) {
                    $nama = $data_k[0];
                    $nik = $data_k[1];
                    $jk = $data_k[2];
                    $alamat = $data_k[3];
                    $email = $data_k[4];
                    $tlp = $data_k[5];
                    $tlp_kerabat = $data_k[6];
                    $id_pendaki = $data_k[7];
                ?>
            <tr align="center">
                <td scope="row"><?php echo $nama ?></td>
                <td><?php echo $nik ?></td>
                <td><?php echo $jk ?></td>
                <td><?php echo $alamat ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $tlp ?></td>
                <td><?php echo $tlp_kerabat ?></td>
                <td>
                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?')) window.location.href = 'index.php?include=form-pendaki&aksi=hapus&data_pendaki=<?php echo $id_pendaki; ?>&data=<?php echo $id_booking; ?>'" class="btn btn-xs btn-warning text-light" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="tombol pt-5 pb-5 col-2 mx-auto">
            <div class="col-sm-12">
                <a href="index.php?include=checkout&data_checkout=<?php echo $id_booking ?>" role="button" class="btn bg-secondary text-white">Check Out</a>
            </div>
        </div>
    </div>