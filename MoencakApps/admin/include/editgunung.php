<?php
if (isset($_GET['data'])) {
  $id_gunung = $_GET['data'];
  $_SESSION['id_gunung'] = $id_gunung;
  
  $sql_d = "SELECT `nama_gunung`,`desc_singkat`,`desc`,`letak_geografis`,`ketinggian`, `sop`, `harga_simaksi`,`id_provinsi`, `foto` from `gunung` where `id_gunung` = '$id_gunung'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $nama_gunung = $data_d[0];
    $desc_singkat = $data_d[1];
    $desc = $data_d[2];
    $letak_geografis = $data_d[3];
    $ketinggian = $data_d[4];
    $sop = $data_d[5];
    $harga_simaksi = $data_d[6];
    $id_provinsi = $data_d[7];
    $foto = $data_d[8];
}
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="text-primer"><i class="fas fa-edit"></i> Edit gunung</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=gunung">gunung</a></li>
          <li class="breadcrumb-item active">Edit gunung</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header bg-success">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit gunung</h3>
      <div class="card-tools">
        <a href="index.php?include=gunung" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
      <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "editkosong") { ?>
          <div class="alert alert-danger" role="alert">
            Maaf data gunung wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?include=konfirmasi-edit-gunung" method="post">
      <div class="card-body">
        <div class="form-group row">
            <label for="gunung" class="col-sm-3 col-form-label">Foto Gunung </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="gunung" id="customFile" value="<?php echo $foto?>">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
        <div class="form-group row">
          <label for="gunung" class="col-sm-3 col-form-label">Nama Gunung</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="nama_gunung" name="nama_gunung" value="<?php echo $nama_gunung ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="desc_singkat" class="col-sm-3 col-form-label">Deskripsi Singkat</label>
          <div class="col-sm-7">
          <textarea class="form-control" name="desc_singkat" id="editor1" rows="12"><?php echo $desc_singkat;?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="desc" class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-7">
          <textarea class="form-control" name="desc" id="editor2" rows="12"><?php echo $desc;?></textarea>
          </div>
        </div>
        </div>
        <div class="form-group row">
          <label for="letak_geografis" class="col-sm-3 col-form-label">Letak Geografis</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="letak_geografis" name="letak_geografis" value="<?php echo $letak_geografis ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="ketinggian" class="col-sm-3 col-form-label">Ketinggian</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="ketinggian" name="ketinggian" value="<?php echo $ketinggian ?>">
          </div>
        </div>
        <div class="form-group row">
            <label for="sop" class="col-sm-3 col-form-label"> SOP</label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="sop" id="customFile" value="<?php echo $sop?>">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
        <div class="form-group row">
          <label for="harga
          _simaksi" class="col-sm-3 col-form-label">Harga SIMAKSI</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="harga_simaksi" name="harga_simaksi" value="<?php echo $harga_simaksi ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="id_provinsi" class="col-sm-3 col-form-label">Provinsi</label>
          <div class="col-sm-7">
            <select class="form-control" id="id_provinsi" name="id_provinsi">
            <option value="">- Pilih Provinsi -</option>
      <?php 
      $sql_t = "SELECT `id_provinsi`, `nama_provinsi` FROM `provinsi`
      ORDER BY `nama_provinsi`";
      $query_t = mysqli_query($koneksi, $sql_t);
      while($data_t = mysqli_fetch_row($query_t)){
      $id_prov = $data_t[0];
      $prov = $data_t[1];
      ?>
      <option value="<?php echo $id_prov;?>"
      <?php if($id_prov==$id_provinsi){?>
      selected <?php }?>><?php echo $prov;?></option>
      <?php }?>
      </select>
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