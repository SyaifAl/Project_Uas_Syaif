
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
                <h3 class="text-primer"><i class="fas fa-edit"></i> Tambah Data konten</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php?include=konten">Data konten</a></li>
                <li class="breadcrumb-item active">Tambah Data konten</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <div class="card card-info">
        <div class="card-header bg-bg2">
            <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data konten</h3>
            <div class="card-tools">
            <a href="index.php?include=konten" class="btn btn-sm float-right bg-primer"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br></br>
        <div class="col-sm-10">
        <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
            <?php if($_GET['notif']=="tambahkosong"){?>
            <div class="alert alert-danger" role="alert">Maaf data 
            <?php echo $_GET['jenis'];?> wajib di isi</div>
            <?php }?>
        <?php }?>
        </div>
        <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-konten" method="post" enctype="multipart/form-data">
        <div class="card-body">            
            <div class="form-group row">
                <label for="judul_konten" class="col-sm-3 col-form-label">Judul konten</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="judul_konten" id="judul_konten" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="sinopsis" class="col-sm-3 col-form-label">Isi</label>
                <div class="col-sm-7">
                <textarea class="form-control" name="isi" id="editor1" 
                rows="12"></textarea>
            </div>
            </div>          
            </div>
            </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="col-sm-12">
        <button type="submit" class="btn bg-primer text-white float-right"><i class="fas fa-plus"></i> Tambah</button>
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
