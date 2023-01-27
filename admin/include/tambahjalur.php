    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="text-primer"><i class="fas fa-plus"></i> Tambah Jalur</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?include=jalur">Jalur</a></li>
                        <li class="breadcrumb-item active">Tambah Jalur</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-success" >
        <div class="card-header bg-success">
            <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Jalur</h3>
            <div class="card-tools">
                <a href="index.php?include=jalur" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
        <?php if(!empty($_GET['notif'])){?>
            <?php if($_GET['notif']=="tambahkosong"){?>
            <div class="alert alert-danger" role="alert">
            Maaf data Jalur wajib di isi</div>
            <?php }?>
        <?php }?>
        <!-- <div class="alert alert-danger" role="alert">Maaf data jalur wajib di isi</div> -->
    </div>
    <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-jalur" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="nama_jalur" class="col-sm-3 col-form-label">Nama Jalur</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_jalur" value="" name="nama_jalur">
                </div>
            </div>
            <div class="form-group row">
                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="kecamatan" value="" name="kecamatan">
                </div>
            </div>
            <div class="form-group row">
                <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="kota" value="" name="kota">
                </div>
            </div>
            <div class="form-group row">
                    <label for="gunung" class="col-sm-3 col-form-label">gunung</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="gunung" name="id_gunung">
                            <option value="0">-Pilih gunung-</option>
                        <?php
                            $sql = "SELECT `id_gunung`, `nama_gunung` FROM `gunung` ORDER BY `nama_gunung`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                                $id_gunung = $data[0];
                                $nama_gunung = $data[1];
                        ?>
                            <option value="<?php echo $id_gunung?>">
                                <?php echo $nama_gunung;?>
                            </option>
                        <?php } ?>
                        </select>
                            </div>
                </div>
            </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-sm-10">
                <button type="submit" class="btn bg-primer text-white float-right"><i class="fas fa-plus"></i>Tambah</button>
            </div>  
        </div>
        <!-- /.card-footer -->
    </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->

