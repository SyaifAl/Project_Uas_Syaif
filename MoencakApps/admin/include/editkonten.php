<?php
if(isset($_GET['data'])){
	$id_konten = $_GET['data'];
	$_SESSION['id_konten']=$id_konten;
	
    //get data konten
	$sql_d = "select `id_konten`, `isi_konten`, `judul_konten` from `konten` where `id_konten` = '$id_konten'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
        $id_konten = $data_d[0];
        $isi = $data_d[1];
        $judul = $data_d[2];
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
            <h3 class="text-primer"><i class="fas fa-edit"></i> Edit Data Konten</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=konten">Data Konten</a></li>
              <li class="breadcrumb-item active">Edit Data Konten</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header bg-bg2">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Konten</h3>
        <div class="card-tools">
          <a href="index.php?include=konten" class="btn btn-sm float-right bg-primer"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
      <?php if(!empty($_GET['notif'])){?>
        <?php if($_GET['notif']=="editkosong"){?>
          <div class="alert alert-danger" role="alert">
          Maaf data konten wajib di isi</div>
        <?php }?>
      <?php }?>
      </div>
      <form class="form-horizontal" action="index.php?include=konfirmasi-edit-konten"  method="post">
        <div class="card-body">
          <div class="form-group row">
            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul_konten" id="judul" value="<?php echo $judul;?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="isi_konten" id="editor1" rows="12"><?php echo $isi;?></textarea>
            </div>
          </div>     

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn float-right bg-primer text-white"><i class="fas fa-save"></i> Simpan</button>
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
