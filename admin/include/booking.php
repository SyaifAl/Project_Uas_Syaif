<?php
if(isset($_SESSION['id_jalur'])){
  $id_jalur = $_SESSION['id_jalur'];

}

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_booking = $_GET['data'];
    //hapus data booking
    $sql_dm = "DELETE from `booking` where `id_booking` = '$id_booking'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_booking'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_booking'] = $_POST['katakunci_booking'];
    $katakunci_booking = $_SESSION['katakunci_booking'];
  }
}
if (isset($_SESSION['katakunci_booking'])) {
  $katakunci_booking = $_SESSION['katakunci_booking'];
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3 class="text-primer">Data Booking</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data Booking</li>
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
                  <form method="post" action="index.php?include=booking&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_booking">
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
                        <th width="5%">ID</th>
                        <th width="10%">Tgl Naik</th>
                        <th width="10%">Tgl Turun</th>
                        <th width="5%">Jumlah Pendaki</th>
                        <th width="5%">Jalur</th>
                        <th width="10%">Tgl Transaksi</th>
                        <th width="15%">Bukti</th>
                        <th width="10%">Status</th>
                        <th width="10%">Harga</th>
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
                      //menampilkan data booking                
                      $sql_k = "SELECT `id_booking`,`tgl_pendakian`, `tgl_turun`, `jumlah_pendaki`, `id_jalur`, `tgl_transaksi`, `bukti_transaksi`, `status_pembayaran`, `harga_simaksi` FROM `booking`  ";
                      if (isset($katakunci_booking) && !empty($katakunci_booking)){
                        $sql_k .= " WHERE `id_booking` LIKE '%$katakunci_booking%' ";
                      } 
                      if (isset($_SESSION['id_jalur'])) {
                        $sql_k .= " WHERE `id_jalur` = '$id_jalur' ORDER BY `id_booking` limit $posisi, $batas ";
                    } else {
                      $sql_k .= " ORDER BY `id_booking` limit $posisi, $batas";
                    }
                      $query_k = mysqli_query($koneksi,$sql_k);
                      $posisi+1;
                      while($data_k = mysqli_fetch_row($query_k)){
                        $id_booking = $data_k[0];
                        $tgl_pendakian = $data_k[1];
                        $tgl_turun = $data_k[2];
                        $jumlah_pendaki = $data_k[3];
                        $id_jalur = $data_k[4];
                        $tgl_transaksi = $data_k[5];
                        $bukti_transaksi = $data_k[6];
                        $status_pembayaran = $data_k[7];
                        $harga_simaksi = $data_k[8];
                      ?>
                    <tr>
                      <td><?php echo $id_booking?></td>
                      <td><?php echo $tgl_pendakian;?></td>
                      <td><?php echo $tgl_turun;?></td>
                      <td><?php echo $jumlah_pendaki;?></td>
                      <td><?php echo $id_jalur;?></td>
                      <td><?php echo $tgl_transaksi;?></td>
                      <td><?php echo $bukti_transaksi;?></td>
                      <td><?php echo $status_pembayaran;?></td>
                      <td><?php echo $harga_simaksi;?></td>
                        <td align="center">
                        <a href="index.php?include=edit-booking&data=<?php echo $id_booking; ?>" class="btn btn-xs bg-primer" title="Edit"><i class="fas fa-edit text-white"></i></a>
                        <a href="index.php?include=detail-booking&data=<?php echo $id_booking; ?>" class="btn btn-xs bg-primer" title="Detail"><i class="fas fa-eye text-white"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $id_booking; ?>?')) window.location.href = 'index.php?include=booking&aksi=hapus&data=<?php echo $id_booking; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                        </td>
                      </tr>
                      <?php $posisi++; } ?>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
              $sql_jum = "SELECT `id_booking`,`tgl_pendakian`, `tgl_turun`, `jumlah_pendaki`, `id_jalur`, `tgl_transaksi`, `bukti_transaksi`, `status_pembayaran`, `harga_simaksi` FROM `booking`  ";
                  if (isset($katakunci_booking) && !empty($katakunci_booking)){
                      $sql_jum .= " WHERE `id_booking` LIKE '%$katakunci_booking%' ";
                  }
                  if (isset($_SESSION['id_jalur'])) {
                    $sql_jum .= " WHERE `id_jalur` = '$id_jalur' ORDER BY `id_booking` ";
                  } else {
                    $sql_jum .= " ORDER BY `id_booking` ";
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
                            href='index.php?include=booking&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=booking&halaman=$sebelum'>«</a></li>";
                  }
                  for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 and $i < $halaman + 5) {
                      if ($i != $halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                                    href='index.php?include=booking&halaman=$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                      }
                    }
                  }
                  if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=booking&halaman=$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=booking&halaman=$jum_halaman'>Last</a></li>";
                  }
                } ?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->