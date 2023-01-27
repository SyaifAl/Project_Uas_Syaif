<?php
if (isset($_GET['data'])) {
  $id_pendaki = $_GET['data'];
  $_SESSION['id_pendaki'] = $id_pendaki;
  
  $sql_d = "SELECT `nama_pendaki`,`nik`,`jenis_kelamin`,`tgl_lahir`,`alamat`,`email`,`telpon`,`telpon_keluarga`,`id_booking` from `pendaki` where `id_pendaki` = '$id_pendaki'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $nama_pendaki = $data_d[0];
    $nik = $data_d[1];
    $jenis_kelamin = $data_d[2];
    $tgl_lahir = $data_d[3];
    $alamat = $data_d[4];
    $email = $data_d[5];
    $telpon = $data_d[6];
    $telpon_keluarga = $data_d[7];
    $id_booking = $data_d[8];
}
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="text-primer"><i class="fas fa-edit"></i> Edit pendaki</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=pendaki">Pendaki</a></li>
          <li class="breadcrumb-item active">Edit Pendaki</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header bg-success">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Pendaki</h3>
      <div class="card-tools">
        <a href="index.php?include=pendaki" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
      <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "editkosong") { ?>
          <div class="alert alert-danger" role="alert">
            Maaf data pendaki wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?include=konfirmasi-edit-pendaki" method="post">
      <div class="card-body">

        <div class="form-group row">
          <label for="pendaki" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="nama_pendaki" name="nama_pendaki" value="<?php echo $nama_pendaki ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="pendaki" class="col-sm-3 col-form-label">NIK</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="level" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-7">
            <select class="form-control" id="jurusan" name="jenis_kelamin">
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="pendaki" class="col-sm-3 col-form-label">tgl lahir</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="pendaki" class="col-sm-3 col-form-label">alamat</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="pendaki" class="col-sm-3 col-form-label">email</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="pendaki" class="col-sm-3 col-form-label">telepon</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="telpon" name="telpon" value="<?php echo $telpon ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="pendaki" class="col-sm-3 col-form-label">telepon Keluarga</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="telpon_keluarga" name="telpon_keluarga" value="<?php echo $telpon_keluarga ?>">
          </div>
        </div>
        <div class="form-group row">
      <label for="pendaki" class="col-sm-3 col-form-
      label">id booking</label>
      <div class="col-sm-7">
      <select class="form-control" id="id_booking" name="id_booking">
      <option value="">- Pilih ID -</option>
      <?php 
      $sql_t = "SELECT `id_booking` FROM `booking`
      ORDER BY `id_booking`";
      $query_t = mysqli_query($koneksi, $sql_t);
      while($data_t = mysqli_fetch_row($query_t)){
      $id_book = $data_t[0];
      ?>
      <option value="<?php echo $id_book;?>"
      <?php if($id_book==$id_booking){?>
      selected <?php }?>><?php echo $id_book;?></option>
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