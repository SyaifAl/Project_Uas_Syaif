<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_artikel = $_GET['data'];
    //get gambar
    $sql_f = "SELECT `gambar` FROM `artikel` WHERE `id_artikel`='$id_artikel'";
    $query_f = mysqli_query($koneksi, $sql_f);
    $jumlah_f = mysqli_num_rows($query_f);
    if ($jumlah_f > 0) {
      while ($data_f = mysqli_fetch_row($query_f)) {
        $gambar = $data_f[0];
        //menghapus gambar
        unlink("artikel/$gambar");
      }
    }
    //hapus data artikel
    $sql_dm = "DELETE from `artikel` where `id_artikel` = '$id_artikel'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_artikel'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_artikel'] = $_POST['katakunci_artikel'];
    $katakunci_artikel = $_SESSION['katakunci_artikel'];
  }
}
if (isset($_SESSION['katakunci_artikel'])) {
  $katakunci_artikel = $_SESSION['katakunci_artikel'];
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-primer"><i class="fas fa-file-alt"></i> Artikel</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Artikel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-primer" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  User</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-artikel" class="btn btn-sm btn-success float-right">
                  <i class="fas fa-plus"></i> Tambah  Artikel</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
              <form method="post" action="index.php?include=artikel&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_artikel">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-success"><i class="fas fa-search"></i>&nbsp; Search</button>
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
                        <th width="30%">Judul</th>
                        <th width="30%">Tgl_Rilis</th>
                        <th width="20%">Penulis</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $batas = 2;
                        if (!isset($_GET['halaman'])) {
                          $posisi = 0;
                          $halaman = 1;
                        } else {
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman - 1) * $batas;
                        }
                        //menampilkan data artikel
                        $sql_b = "SELECT `id_artikel`, `penulis`, `tgl`, `judul_artikel` FROM `artikel` ";
                        if (isset($katakunci_artikel) && !empty($katakunci_artikel)) {
                          $sql_b .= " WHERE `judul_artikel` LIKE '%$katakunci_artikel%'";
                        }
                        $sql_b .= " ORDER BY `Judul_artikel` limit $posisi, $batas";
                        $query_b = mysqli_query($koneksi, $sql_b);
                        $posisi + 1;
                        while ($data_b = mysqli_fetch_row($query_b)) {
                          $id_artikel = $data_b[0];
                          $penulis = $data_b[1];
                          $tgl = $data_b[2];
                          $judul_artikel = $data_b[3];
                        ?>
                    <tr>
                      <td><?php echo $posisi+1; ?></td>
                      <td><?php echo $judul_artikel; ?></td>
                      <td><?php echo $tgl; ?></td>
                      <td><?php echo $penulis; ?></td>
                      <td align="center">
                        <a href="index.php?include=edit-artikel&data=<?php echo $id_artikel; ?>" class="btn btn-xs bg-primer" title="Edit"><i class="fas fa-edit text-white"></i></a>
                        <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel; ?>" class="btn btn-xs bg-primer" title="Detail"><i class="fas fa-eye text-white"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data 
                                  <?php echo $judul_artikel; ?>?')) window.location.href = 'index.php?include=artikel&aksi=hapus&data=<?php echo $id_artikel; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                      </td>
                    </tr>
                  <?php $posisi++;
                  } ?>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
              //hitung jumlah semua data 
              $sql_jum = "SELECT `id_artikel`, `penulis`, `tgl`, `judul_artikel`, `isi`, `gambar` FROM `artikel` ";
              if (isset($katakunci_artikel)) {
                $sql_jum .= " WHERE `Judul_artikel` LIKE '%$katakunci_artikel%'";
              }
              $sql_jum .= " ORDER BY `Judul_artikel`";
              $query_jum = mysqli_query($koneksi, $sql_jum);
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
                              href='index.php?include=artikel&halaman=1'>First</a></li>";
                      echo "<li class='page-item'><a class='page-link' 
                              href='index.php?include=artikel&halaman=$sebelum'>«</a></li>";
                    }
                    for ($i = 1; $i <= $jum_halaman; $i++) {
                      if ($i > $halaman - 5 and $i < $halaman + 5) {
                        if ($i != $halaman) {
                          echo "<li class='page-item'><a class='page-link' 
                                      href='index.php?include=artikel&halaman=$i'>$i</a></li>";
                        } else {
                          echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                    }
                    if ($halaman != $jum_halaman) {
                      echo "<li class='page-item'><a class='page-link' 
                                  href='index.php?include=artikel&halaman=$setelah'>»</a></li>";
                      echo "<li class='page-item'><a class='page-link' 
                                  href='index.php?include=artikel&halaman=$jum_halaman'>Last</a></li>";
                    }
                  } ?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->