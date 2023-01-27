<?php 
if(isset($_GET['data'])){
	$id_artikel = $_GET['data'];
    $_SESSION['id_artikel']=$id_artikel;
	//gat data artikel
    $sql = "SELECT `id_artikel`, `penulis`, `tgl`, `judul_artikel`, `isi`, `gambar` FROM `artikel`
        WHERE `id_artikel`='$id_artikel'";
    $query = mysqli_query($koneksi,$sql);
    while($data = mysqli_fetch_row($query)){
        $id_artikel = $data[0];
        $penulis = $data[1];
        $tgl = $data[2];
        $judul_artikel = $data[3];
        $isi = $data[4];
        $gambar = $data[5];
    }
}
?>
    <!DOCTYPE html>
    <html>
    <head>
    <?php include("includes/head.php") ?> 
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="text-primer"><i class="fas fa-edit"></i> Edit Data artikel</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php?include=artikel">Data artikel</a></li>
                <li class="breadcrumb-item active">Edit Data artikel</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <div class="card card-info">
        <div class="card-header bg-bg2">
            <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data artikel</h3>
            <div class="card-tools">
            <a href="index.php?include=artikel" class="btn btn-sm float-right bg-primer"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br></br>
        <div class="col-sm-10">
        <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
            <?php if($_GET['notif']=="editkosong"){?>
            <div class="alert alert-danger" role="alert">Maaf data 
            <?php echo $_GET['jenis'];?> wajib di isi</div>
            <?php }?>
        <?php }?>
        </div>
        <form class="form-horizontal" action="index.php?include=konfirmasi-edit-artikel" method="post" enctype="multipart/form-data">
        <div class="card-body">            
            <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Gambar artikel </label>
                <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>  
                </div>
            </div>
            <div class="form-group row">
                <label for="judul" class="col-sm-3 col-form-label">Judul Artikel</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="judul_artikel" id="judul_artikel" value="<?php echo $judul_artikel;?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="pengarang" class="col-sm-3 col-form-label">Penulis</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="penulis" 
                id="penulis" value="<?php echo $penulis;?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tahun_terbit" class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-7">
                <input type="date" class="form-control" name="tgl" 
                id="tgl" value="<?php echo $tgl;?>">
            </div>
            </div>
            <div class="form-group row">
                <label for="sinopsis" class="col-sm-3 col-form-label">Isi</label>
                <div class="col-sm-7">
                <textarea class="form-control" name="isi" id="editor1" 
                rows="12"><?php echo $isi;?></textarea>
            </div>
            </div>          
            </div>
            </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="col-sm-12">
        <button type="submit" class="btn bg-primer text-white float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>  
        </div>
        <!-- /.card-footer -->
        </form>
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    <?php include("includes/script.php") ?>
    </body>
    </html>
