
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h3><i class="fas fa-plus"></i> Tambah Admin</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=Admin">Data Admin</a></li>
                    <li class="breadcrumb-item active">Tambah Admin</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="card card-success">
              <div class="card-header bg-succes">
                <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Admin</h3>
                <div class="card-tools">
                  <a href="index.php?include=Admin" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              </br>
              <div class="col-sm-10">
                  <!-- Notifikasi -->
                <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                  <?php if($_GET['notif']=="tambahkosong"){?>
                      <div class="alert alert-danger" role="alert">Maaf data 
                      <?php echo $_GET['jenis'];?> wajib di isi</div>
                  <?php }?>
                <?php }?>
              </div>
              <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-admin" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-Admin-circle"></i> <u>Data Admin</u></span></label>
                  </div>          
                  <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                    <div class="col-sm-7">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>  
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="nama" id="nama" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="email" id="email" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="username" id="username" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="password" id="password" value="">
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
                            <option value="0">-Pilih Jalur-</option>
                        <?php
                            $sql = "SELECT `id_jalur`, `nama_jalur` FROM `jalur` ORDER BY `nama_jalur`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                                $id_jalur = $data[0];
                                $nama_jalur = $data[1];
                        ?>
                            <option value="<?php echo $id_jalur?>">
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
                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
                  </div>  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
        </section>