<?php 
  $id_admin = $_SESSION['id_admin'];
  //get profil
  $sql = "select `nama`, `email`,`foto` from `admin`
          where `id_admin`='$id_admin'";
  //echo $sql;
  $query = mysqli_query($koneksi, $sql);
  while($data = mysqli_fetch_row($query)){
    $nama = $data[0];
    $email = $data[1];
    $foto = $data[2];
  }
?>

<!-- Content Header (Page header) -->
<div class="nav">
    <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
        <div class="d-flex justify-content-start align-items-center">
            
            <h2 class="main-title ml-3 my-5 text-primer"> Profil Admin</h2>
        </div>
    </div>
</div>

 <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-body">
                <div class="col-sm-12">
                  <?php if(!empty($_GET['notif'])){
                      if($_GET['notif']=="editberhasil"){?>
                          <div class="alert alert-success" role="alert">
                          Data Berhasil Diubah</div>
                      <?php }?>
                  <?php }?>
                </div>
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i> <strong>PROFIL<strong></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Foto<strong></td>
                        <td width="80%">
                          <?php if(!empty($foto)){ ?>
                          <img src="foto/<?php echo $foto ?>" class="img-fluid" width="200px;">
                          <?php } ?>
                        </td>
                      </tr>                
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama; ?></td>
                      </tr>                
                      <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?php echo $email; ?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                    <a href="index.php?include=edit-profil" class="btn btn-sm btn-primary bg-success float-right" style="background-color:primer; color: #fff; border: none;"><i class="fas fa-edit"></i> Edit Profil</a>
              </div>
              
            </div>
            
            <!-- /.card -->

    </section>
   