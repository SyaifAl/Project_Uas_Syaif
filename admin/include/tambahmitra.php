    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="text-primer"><i class="fas fa-plus"></i> Tambah Mitra</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?include=mitra">Mitra</a></li>
                        <li class="breadcrumb-item active">Tambah Mitra</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-success" >
        <div class="card-header bg-success">
            <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Mitra</h3>
            <div class="card-tools">
                <a href="index.php?include=mitra" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
        <?php if(!empty($_GET['notif'])){?>
            <?php if($_GET['notif']=="tambahkosong"){?>
            <div class="alert alert-danger" role="alert">
            Maaf data Mitra wajib di isi</div>
            <?php }?>
        <?php }?>
        <!-- <div class="alert alert-danger" role="alert">Maaf data jalur wajib di isi</div> -->
    </div>
    <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-mitra" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label for="nama_mitra" class="col-sm-3 col-form-label">Nama Mitra</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama_mitra" value="" name="nama_mitra">
                </div>
            </div>

            <div class="form-group row">
                <label for="logo" class="col-sm-3 col-form-label">Logo </label>
                <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="logo" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>  
                </div>
            </div>

            <div class="form-group row">
                <label for="website" class="col-sm-3 col-form-label">Website</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="website" value="" name="website">
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

