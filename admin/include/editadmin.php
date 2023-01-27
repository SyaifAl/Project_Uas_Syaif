<?php
  if(isset($_GET['data'])){
    $id_admin = $_GET['data'];
    // $_SESSION['edit_admin'] = $id_admin;
    //get admin
    $sql = "SELECT `a`.`id_admin`, `a`.`nama`, `a`.`email`, `a`.`username`, `a`.`password`, `a`.`level`, `a`.`foto`, `j`.`nama_jalur` FROM `admin` `a` JOIN `jalur` `j` ON `a`.`id_jalur` = `j`.`id_jalur` WHERE `a`.`id_admin` = '$id_admin';";
    $query = mysqli_query($koneksi, $sql);
    while($data = mysqli_fetch_row($query)){
      $id_admin = $data[0];
      $nama = $data[1];
      $email = $data[2];
      $username = $data[3];
      $password = $data[4];
      $level = $data[5];
      $foto = $data[6];
      $jalur = $data[7];
    }
  }
?>

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h3 class="text-primer"><i class="fas fa-edit text-primer"></i> Edit Data Admin</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=admin">Data Admin</a></li>
                    <li class="breadcrumb-item active">Edit Data Admin</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="card card-info">
              <div class="card-header bg-success">
                <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data admin</h3>
                <div class="card-tools">
                  <a href="index.php?include=admin" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              </br>
              <div class="col-sm-10">
                  <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                  <?php if($_GET['notif']=="editkosong"){?>
                    <div class="alert alert-danger" role="alert">Maaf data 
                    <?php echo $_GET['jenis'];?> wajib di isi</div>
                  <?php }?>
                <?php }?>
              </div>
              <form class="form-horizontal" action="index.php?include=konfirmasi-edit-admin" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-admin-circle"></i> <u>Data admin</u></span></label>
                  </div>
                  <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                    <div class="col-sm-7">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="customFile" value="<?php echo $foto;?>">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>  
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo $username;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="level" class="col-sm-3 col-form-label">Level</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="jurusan" name="level">
                        <option value="Superadmin">superadmin</option>
                        <option value="Admin">admin</option>
                      </select>
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="Jalur" class="col-sm-3 col-form-label">Jalur</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="jalur" name="jalur">
                          <?php
                            $sql = "SELECT `id_jalur`, `nama_jalur` FROM `jalur` ORDER BY `nama_jalur`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                              $id_jalur = $data[0];
                              $nama_jalur = $data[1];
                              ?>
                            <option value="<?php echo $id_jalur?>" <?php if($nama_jalur == $jalur){?> selected <?php } ?>>
                              <?php echo $nama_jalur;?>
                            </option>
                        <?php } ?>
                        </select>
                            </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="col-sm-12">
                  <button type="submit" name="simpan" value="<?php echo $id_admin ?>" class="btn bg-primer float-right text-white"><i class="fas fa-save"></i> Simpan</button>
                </div>  
              </div>
              <!-- /.card-footer -->
            </form>
    </div>
    <!-- /.card -->

    </section>