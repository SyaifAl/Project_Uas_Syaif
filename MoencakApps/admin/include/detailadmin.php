<?php 
// session_start();
// include('../koneksi/koneksi.php');
  if(isset($_GET['data'])){
    $id_admin = $_GET['data'];
    //get admin
    $sql = "SELECT `a`.`id_admin`, `a`.`nama`, `a`.`email`, `a`.`username`, `a`.`password`, `a`.`level`, `a`.`foto`, `j`.`nama_jalur` FROM `admin` `a` JOIN jalur `j` on `a`.`id_jalur` = `j`.`id_jalur`  ";
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
                  <h3 class="text-primer"><i class="fas fa-user-tie text-primer"></i> Detail Data Admin</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?include=admin">Data Admin</a></li>
                    <li class="breadcrumb-item active">Detail Data Admin</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="index.php?include=admin" class="btn btn-sm bg-success float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>  
                    <tr>
                      <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Data Admin<strong></td>
                    </tr>                      
                    <tr>
                      <td><strong>Foto Admin<strong></td>
                      <td><img src="foto/<?php echo $foto; ?>" class="img-fluid" width="200px;"></td>
                    </tr>               
                    <tr>
                      <td width="20%"><strong>Nama<strong></td>
                      <td width="80%"><?php echo $nama ?></td>
                    </tr>                 
                    <tr>
                      <td width="20%"><strong>Email<strong></td>
                      <td width="80%"><?php echo $email ?></td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Level<strong></td>
                      <td width="80%"><?php echo $level ?></td>
                    </tr>                 
                    <tr>
                      <td width="20%"><strong>Username<strong></td>
                      <td width="80%"><?php echo $username ?></td>
                    </tr> 
                    <tr>
                      <td width="20%"><strong>Jalur<strong></td>
                      <td width="80%"><?php echo $jalur ?></td>
                    </tr> 
                  </tbody>
                </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>