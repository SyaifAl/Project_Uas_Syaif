<?php 
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_konten = $_GET['data'];
    //hapus data konten
    $sql_dm = "DELETE from `konten` where `id_konten` = '$id_konten'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_konten'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_konten'] = $_POST['katakunci_konten'];
    $katakunci_konten = $_SESSION['katakunci_konten'];
  }
}
if (isset($_SESSION['katakunci_konten'])) {
  $katakunci_konten = $_SESSION['katakunci_konten'];
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-primer"><i class="fas fa-file-alt"></i> Konten</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Konten</li>
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
                  <a href="index.php?include=tambah-konten" class="btn btn-sm btn-success float-right">
                  <i class="fas fa-plus"></i> Tambah  Konten</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
              <form method="post" action="index.php?include=konten&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_konten">
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
                        <th width="30%">Isi</th>
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
                      $sql_k = "SELECT `id_konten`,`isi_konten`, `judul_konten` FROM `konten`  ";
                      if (isset($katakunci_konten) && !empty($katakunci_konten)){
                          $sql_k .= " WHERE `judul_konten` LIKE '%$katakunci_konten%' ";
                      } 
                      $sql_k .= " ORDER BY `judul_konten` limit $posisi, $batas";
                      $query_k = mysqli_query($koneksi,$sql_k);
                      $posisi+1;
                      while($data_k = mysqli_fetch_row($query_k)){
                        $id_konten = $data_k[0];
                        $isi = $data_k[1];
                        $judul = $data_k[2];
                      ?>
                    <tr>
                      <td><?php echo $posisi+1;?></td>
                      <td><?php echo $judul;?></td>
                      <td><?php echo $isi;?></td>
                        <td align="center">
                        <a href="index.php?include=edit-konten&data=<?php echo $id_konten; ?>" class="btn btn-xs bg-primer" title="Edit"><i class="fas fa-edit text-white"></i></a>
                        <a href="index.php?include=detail-konten&data=<?php echo $id_konten; ?>" class="btn btn-xs bg-primer" title="Detail"><i class="fas fa-eye text-white"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data<?php echo $judul; ?>?')) window.location.href = 'index.php?include=konten&aksi=hapus&data=<?php echo $id_konten; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                        </td>
                      </tr>
                      <?php $posisi++; } ?>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
              $sql_jum = "SELECT `id_konten`,`isi_konten`, `judul_konten` FROM `konten`  ";
                  if (isset($katakunci_konten) && !empty($katakunci_konten)){
                      $sql_jum .= " WHERE `judul_konten` LIKE '%$katakunci_konten%' ";
                  } 
                  $sql_jum .= " ORDER BY `judul_konten`";
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
                            href='index.php?include=konten&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=konten&halaman=$sebelum'>«</a></li>";
                  }
                  for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 and $i < $halaman + 5) {
                      if ($i != $halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                                    href='index.php?include=konten&halaman=$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                      }
                    }
                  }
                  if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=konten&halaman=$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=konten&halaman=$jum_halaman'>Last</a></li>";
                  }
                } ?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->