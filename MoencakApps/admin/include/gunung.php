<?php 
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_gunung = $_GET['data'];
    //hapus data gunung
    $sql_dm = "DELETE from `gunung` where `id_gunung` = '$id_gunung'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_gunung'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_gunung'] = $_POST['katakunci_gunung'];
    $katakunci_gunung = $_SESSION['katakunci_gunung'];
  }
}
if (isset($_SESSION['katakunci_gunung'])) {
  $katakunci_gunung = $_SESSION['katakunci_gunung'];
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-primer">Data Gunung</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data Gunung</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Gunung
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                            $query = "SELECT id_gunung FROM gunung ORDER BY id_gunung";  
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h4> Total Gunung: '.$row.'</h4>';
                        ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-primer" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Gunung</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-gunung" class="btn btn-sm btn-success float-right">
                  <i class="fas fa-plus"></i> Tambah Gunung</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=gunung&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_gunung">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn bg-success"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
              <?php if (!empty($_GET['notif'])) { ?>
                  <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                    <div class="alert alert-success" role="alert">
                      Data Berhasil Ditambahkan</div>
                  <?php } else if ($_GET['notif'] == "editberhasil") { ?>
                    <div class="alert alert-success" role="alert">
                      Data Berhasil Diubah</div>
                  <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
                    <div class="alert alert-success" role="alert">
                      Data Berhasil Dihapus</div>  
                  <?php } ?>
              <?php } ?>
              </div>
              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="10%">Nama</th>
                        <th width="10%">Harga</th>
                        <th width="20%">Letak</th>
                        <th width="10%">Tinggi</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $batas = 2;
                      if(!isset($_GET['halaman'])){
                          $posisi = 0;
                          $halaman = 1;
                      }else{
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman-1) * $batas;
                      }
                      //menampilkan data gunung                  
                      $sql_k = "SELECT `id_gunung`,`nama_gunung`, `harga_simaksi`, `letak_geografis`, `ketinggian` FROM `gunung`  ";
                      if (isset($katakunci_gunung) && !empty($katakunci_gunung)){
                          $sql_k .= " WHERE `nama_gunung` LIKE '%$katakunci_gunung%' ";
                      } 
                      $sql_k .= " ORDER BY `nama_gunung` limit $posisi, $batas";
                      $query_k = mysqli_query($koneksi,$sql_k);
                      $posisi+1;
                      while($data_k = mysqli_fetch_row($query_k)){
                        $id_gunung = $data_k[0];
                        $nama_gunung = $data_k[1];
                        $harga_simaksi = $data_k[2];
                        $letak_geografis = $data_k[3];
                        $ketinggian = $data_k[4];
                      ?>
                    <tr>
                      <td><?php echo $posisi+1;?></td>
                      <td><?php echo $nama_gunung;?></td>
                      <td><?php echo $harga_simaksi;?></td>
                      <td><?php echo $letak_geografis;?></td>
                      <td><?php echo $ketinggian;?></td>
                        <td align="center">
                        <a href="index.php?include=edit-gunung&data=<?php echo $id_gunung; ?>" class="btn btn-xs bg-primer" title="Edit"><i class="fas fa-edit text-white"></i></a>
                        <a href="index.php?include=detail-gunung&data=<?php echo $id_gunung; ?>" class="btn btn-xs bg-primer" title="Detail"><i class="fas fa-eye text-white"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama_gunung; ?>?')) window.location.href = 'index.php?include=gunung&aksi=hapus&data=<?php echo $id_gunung; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                        </td>
                      </tr>
                      <?php $posisi++; } ?>
                      
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
              $sql_jum = "SELECT `id_gunung`,`nama_gunung`, `harga_simaksi`, `letak_geografis`, `ketinggian` FROM `gunung`  ";
                  if (isset($katakunci_gunung) && !empty($katakunci_gunung)){
                      $sql_jum .= " WHERE `nama_gunung` LIKE '%$katakunci_gunung%' ";
                  } 
                  $sql_jum .= " ORDER BY `nama_gunung`";
                  $query_jum = mysqli_query($koneksi,$sql_jum);
                  $jum_data = mysqli_num_rows($query_jum);
                  $jum_halaman = ceil($jum_data / $batas);
                  ?>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <?php 
              if($jum_halaman==0){
                //tidak ada halaman
              }else if($jum_halaman==1){
                echo "<li class='page-item'><a class='page-link'>1</a></li>";
              }else{
                $sebelum = $halaman-1;
                $setelah = $halaman+1;
                if($halaman!=1){
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=gunung&halaman=1'>
                  First</a></li>";
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=gunung&halaman=$sebelum'>
                  «</a></li>";
                }
                for($i=1; $i<=$jum_halaman; $i++){
                  if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                    if($i!=$halaman){
                      echo "<li class='page-item'>
                      <a class='page-link' href='index.php?include=gunung&halaman=$i'>
                      $i</a></li>";
                    }else{
                        echo "<li class='page-item'>
                        <a class='page-link'>$i</a></li>";
                    }
                  }
                }
                if($halaman!=$jum_halaman){
                    echo "<li class='page-item'>
                    <a class='page-link' href='index.php?include=gunung&halaman=$setelah'>
                    »</a></li>";
                    echo "<li class='page-item'>
                    <a class='page-link' href='index.php?include=gunung&halaman=
                    $jum_halaman'>
                    Last</a></li>";
                }
              }
            ?>
                </ul>
              </div>
            </div>

            <!-- /.card -->


    </section>
    <!-- /.content -->