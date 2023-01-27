    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3><i class="fas fa-plus"></i>Tambah Gunung</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?include=gunung">Gunung</a></li>
                        <li class="breadcrumb-item active">Tambah Gunung</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-success">
            <div class="card-header bg-success">
                <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah gunung</h3>
                <div class="card-tools">
                    <a href="index.php?include=gunung" class="btn btn-sm bg-primer float-right"><i
                            class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            </br>
            <div class="col-sm-10">
                <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                <?php if($_GET['notif']=="tambahkosong"){?>
                <div class="alert alert-danger" role="alert">Maaf data
                    <?php echo $_GET['jenis'];?> wajib di isi</div>
                <?php }?>
                <?php }?>
                <!-- <div class="alert alert-danger" role="alert">Maaf data gunung wajib di isi</div> -->
            </div>
            <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-gunung"
                enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-3 col-form-label">Gambar Gunung </label>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gunung" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_gunung" class="col-sm-3 col-form-label">Nama gunung</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_gunung" value="" name="nama_gunung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi_singkat" class="col-sm-3 col-form-label">Deskripsi Singkat</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="deskripsi_singkat" value=""
                                name="deskripsi_singkat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="Deskripsi" value="" name="Deskripsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="letak_geografis" class="col-sm-3 col-form-label">Letak Geografis</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="letak_geografis" value=""
                                name="letak_geografis">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ketinggian" class="col-sm-3 col-form-label">Ketinggian</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="ketinggian" value="" name="ketinggian">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-3 col-form-label">SOP</label>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="sop" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_simaksi" class="col-sm-3 col-form-label">Harga SIMAKSI</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="harga_simaksi" value="" name="harga_simaksi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="provinsi" name="id_provinsi">
                                <option value="0">-Pilih Provinsi-</option>
                                <?php
                            $sql = "SELECT `id_provinsi`, `nama_provinsi` FROM `provinsi` ORDER BY `nama_provinsi`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                                $id_provinsi = $data[0];
                                $nama_provinsi = $data[1];
                        ?>
                                <option value="<?php echo $id_provinsi?>">
                                    <?php echo $nama_provinsi;?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="col-sm-10">
                        <button type="submit" class="btn bg-primer text-white float-right"><i class="fas fa-plus"></i>
                            Tambah</button>
                    </div>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->