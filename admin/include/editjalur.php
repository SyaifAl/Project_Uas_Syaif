<?php
if (isset($_GET['data'])) {
  $id_jalur = $_GET['data'];
  $_SESSION['id_jalur'] = $id_jalur;
  
  $sql_d = "SELECT `nama_jalur`,`kecamatan`,`kota`,`id_gunung` from `jalur` where `id_jalur` = '$id_jalur'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $nama_jalur = $data_d[0];
    $kecamatan = $data_d[1];
    $kota = $data_d[2];
    $id_gunung = $data_d[3];
}
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="text-primer"><i class="fas fa-edit"></i> Edit Jalur</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=jalur">Jalur</a></li>
          <li class="breadcrumb-item active">Edit Jalur</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-success">
    <div class="card-header bg-success">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Jalur</h3>
      <div class="card-tools">
        <a href="index.php?include=jalur" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
      <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "editkosong") { ?>
          <div class="alert alert-danger" role="alert">
            Maaf data jalur wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?include=konfirmasi-edit-jalur" method="post">
      <div class="card-body">
        <div class="form-group row">
          <label for="jalur" class="col-sm-3 col-form-label">Nama Jalur</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="nama_jalur" name="nama_jalur" value="<?php echo $nama_jalur ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="jalur" class="col-sm-3 col-form-label">Kecamatan</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $kecamatan ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="jalur" class="col-sm-3 col-form-label">Kota</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $kota ?>">
          </div>
        </div>
        </div>
        <div class="form-group row ml-1">
            <label for="id_jalur" class="col-sm-3 col-form-label ">Gunung</label>
        <div class="col-sm-7">
        <select class="form-control" id="id_gunung" name="id_gunung">
        <option value="">- Pilih Gunung -</option>
        <?php 
            $sql_t = "SELECT `id_gunung`, `nama_gunung` FROM `gunung` ORDER BY `nama_gunung`";
        $query_t = mysqli_query($koneksi, $sql_t);
        while($data_t = mysqli_fetch_row($query_t)){
        $id_gunu = $data_t[0];
        $gunu = $data_t[1];
        ?>
        <option value="<?php echo $id_gunu;?>"
        <?php if($id_gunu==$id_gunung){?>
        selected <?php }?>><?php echo $id_gunu;?></option>
    <?php }?>
    </select>
    </div>
</div>

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-10">
          <button type="submit" class="btn bg-primer text-white float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

</section>