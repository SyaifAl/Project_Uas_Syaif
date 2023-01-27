<?php
if(isset($_SESSION['id_jalur'])){
  $id_jalur = $_SESSION['id_jalur'];

}


if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_pendaki = $_GET['data'];
    //hapus data pendaki
    $sql_dm = "DELETE from `pendaki` where `id_pendaki` = '$id_pendaki'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_pendaki'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_pendaki'] = $_POST['katakunci_pendaki'];
    $katakunci_pendaki = $_SESSION['katakunci_pendaki'];
  }
}
if (isset($_SESSION['katakunci_pendaki'])) {
  $katakunci_pendaki = $_SESSION['katakunci_pendaki'];
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-primer"><i class="fas fa-user-tie text-primer"></i> Data Pendaki</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=pendaki&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_pendaki">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary bg-success"><i class="fas fa-search"></i>&nbsp; Search</button>
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
                        <th width="15%">Nama</th>
                        <th width="15%">NIK</th>
                        <th width="7%">JK</th>
                        <th width="10%">Email</th>
                        <th width="10%">Telepon</th>
                        <th width="10%">ID Booking</th>
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
                      //menampilkan data konten               
                      $sql_k = "SELECT `p`.`id_pendaki`, `p`.`nama_pendaki`, `p`.`nik`, `p`.`jenis_kelamin`, `p`.`email`, `p`.`telpon`, `p`.`id_booking` FROM `pendaki` `p` JOIN `booking` `b` ON `p`.`id_booking` = `b`.`id_booking`  ";
                      if (isset($katakunci_pendaki) && !empty($katakunci_pendaki)){
                          $sql_k .= " WHERE `p`.`nama_pendaki` LIKE '%$katakunci_pendaki%' ";
                      }
                       if (isset($_SESSION['id_jalur'])) {
                        $sql_k .= " WHERE `b`.`id_jalur` = '$id_jalur' ORDER BY `p`.`nama_pendaki` limit $posisi, $batas ";
                    } else {
                   
                      $sql_k .= " ORDER BY `p`.`nama_pendaki` limit $posisi, $batas";
                    }
                      $query_k = mysqli_query($koneksi,$sql_k);
                      $posisi+1;
                      while($data_k = mysqli_fetch_row($query_k)){
                        $id_pendaki = $data_k[0];
                        $nama_pendaki = $data_k[1];
                        $nik = $data_k[2];
                        $jenis_kelamin = $data_k[3];
                        $email = $data_k[4];
                        $telpon = $data_k[5];
                        $id_booking = $data_k[6];
                      ?>
                    <tr>
                      <td><?php echo $posisi+1;?></td>
                      <td><?php echo $nama_pendaki;?></td>
                      <td><?php echo $nik;?></td>
                      <td><?php echo $jenis_kelamin;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $telpon;?></td>
                      <td><?php echo $id_booking;?></td>
                        <td align="center">
                        <a href="index.php?include=edit-pendaki&data=<?php echo $id_pendaki; ?>" class="btn btn-xs bg-primer" title="Edit"><i class="fas fa-edit text-white"></i></a>
                        <a href="index.php?include=detail-pendaki&data=<?php echo $id_pendaki; ?>" class="btn btn-xs bg-primer" title="Detail"><i class="fas fa-eye text-white"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama_pendaki; ?>?')) window.location.href = 'index.php?include=pendaki&aksi=hapus&data=<?php echo $id_pendaki; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                        </td>
                      </tr>
                      <?php $posisi++; } ?>
                      
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
              $sql_jum = "SELECT `p`.`id_pendaki`, `p`.`nama_pendaki`, `p`.`nik`, `p`.`jenis_kelamin`, `p`.`email`, `p`.`telpon`, `p`.`id_booking` FROM `pendaki` `p` JOIN `booking` `b` ON `p`.`id_booking` = `b`.`id_booking`  ";
                if (isset($katakunci_pendaki) && !empty($katakunci_pendaki)){
                    $sql_jum .= " WHERE `p`.`nama_pendaki` LIKE '%$katakunci_pendaki%' ";
                }
                  if (isset($_SESSION['id_jalur'])) {
                  $sql_jum .= " WHERE `b`.`id_jalur` = '$id_jalur' ORDER BY `p`.`nama_pendaki`";
              } else {
              
                $sql_jum .= " ORDER BY `p`.`nama_pendaki`";
              }
            $query_jum = mysqli_query($koneksi,$sql_jum);
            $jum_data = mysqli_num_rows($query_jum);
            $jum_halaman = ceil($jum_data / $batas);
            ?>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <?php
                if ($jum_halaman == 0) {
                  //tidak ada halaman
                } else if ($jum_halaman == 1) {
                  echo "<li class='page-item'><a class='page-link'>1</a></li>";
                } else {
                  $sebelum = $halaman - 1;
                  $setelah = $halaman + 1;
                  if ($halaman != 1) {
                    echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=pendaki&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=pendaki&halaman=$sebelum'>«</a></li>";
                  }
                  for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 and $i < $halaman + 5) {
                      if ($i != $halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                                    href='index.php?include=pendaki&halaman=$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                      }
                    }
                  }
                  if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=pendaki&halaman=$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=pendaki&halaman=$jum_halaman'>Last</a></li>";
                  }
                } ?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->