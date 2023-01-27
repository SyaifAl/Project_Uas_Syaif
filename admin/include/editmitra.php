<?php
if (isset($_GET['data'])) {
  $id_mitra = $_GET['data'];
  $_SESSION['id_mitra'] = $id_mitra;
  
  $sql_d = "SELECT `id_mitra`,`nama_mitra`, `logo`, `website`  FROM `mitra` where `id_mitra` = '$id_mitra'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $id_mitra = $data_d[0];
    $nama_mitra = $data_d[1];
    $logo = $data_d[2];
    $website = $data_d[3];
}
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i> Edit mitra</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=mitra">mitra</a></li>
          <li class="breadcrumb-item active">Edit mitra</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-success">
    <div class="card-header bg-success">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit mitra</h3>
      <div class="card-tools">
        <a href="index.php?include=mitra" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
      <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "editkosong") { ?>
          <div class="alert alert-danger" role="alert">
            Maaf data mitra wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?include=konfirmasi-edit-mitra" method="post" enctype="multipart/form-data">
      <div class="card-body">

      <div class="form-group row">
          <label for="nama_mitra" class="col-sm-3 col-form-label">Nama Mitra</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" value="<?php echo $nama_mitra ?>">
          </div>
        </div>

      <div class="form-group row">
            <label for="logo" class="col-sm-3 col-form-label">logo </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="logo" id="customFile" value="logo<?php echo $logo ?>">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>

        <div class="form-group row">
          <label for="website" class="col-sm-3 col-form-label">website</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="website" name="website" value="<?php echo $website ?>">
          </div>
        </div>
        
  </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

</section>