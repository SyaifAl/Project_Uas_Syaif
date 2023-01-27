<?php 
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_jalur = $_GET['data'];
    //hapus data jalur
    $sql_dm = "DELETE from `jalur` where `id_jalur` = '$id_jalur'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_jalur'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_jalur'] = $_POST['katakunci_jalur'];
    $katakunci_jalur = $_SESSION['katakunci_jalur'];
  }
}
if (isset($_SESSION['katakunci_jalur'])) {
  $katakunci_jalur = $_SESSION['katakunci_jalur'];
}
?>
  <!-- <--Content Header (Page header)-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-primer"><i class="fas fa-user-tie"></i> Data Jalur</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data Jalur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-primer" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Jalur</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-jalur" class="btn btn-sm btn-success float-right">
                  <i class="fas fa-plus"></i> Tambah  Jalur</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=jalur&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_jalur">
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
                        <th width="30%">Nama</th>
                        <th width="30%">Kecamatan</th>
                        <th width="20%">Kota/Kabupaten</th>
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
                      $sql_k = "SELECT `id_jalur`,`nama_jalur`, `kecamatan`, `kota`, `id_gunung` FROM `jalur`  ";
                      if (isset($katakunci_jalur) && !empty($katakunci_jalur)){
                          $sql_k .= " WHERE `nama_jalur` LIKE '%$katakunci_jalur%' ";
                      } 
                      $sql_k .= " ORDER BY `nama_jalur` limit $posisi, $batas";
                      $query_k = mysqli_query($koneksi,$sql_k);
                      $posisi+1;
                      while($data_k = mysqli_fetch_row($query_k)){
                        $id_jalur = $data_k[0];
                        $nama_jalur = $data_k[1];
                        $kecamatan = $data_k[2];
                        $kota = $data_k[3];
                        $id_gunung = $data_k[4];
                      ?>
                    <tr>
                      <td><?php echo $posisi+1;?></td>
                      <td><?php echo $nama_jalur;?></td>
                      <td><?php echo $kecamatan;?></td>
                      <td><?php echo $kota;?></td>
                        <td align="center">
                        <a href="index.php?include=edit-jalur&data=<?php echo $id_jalur; ?>" class="btn btn-xs bg-primer" title="Edit"><i class="fas fa-edit text-white"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama_jalur; ?>?')) window.location.href = 'index.php?include=jalur&aksi=hapus&data=<?php echo $id_jalur; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                        </td>
                      </tr>
                      <?php $posisi++; } ?>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
              $sql_jum = "SELECT `id_jalur`,`nama_jalur`, `kecamatan`, `kota` FROM `jalur`  ";
                  if (isset($katakunci_jalur) && !empty($katakunci_jalur)){
                      $sql_jum .= " WHERE `nama_jalur` LIKE '%$katakunci_jalur%' ";
                  } 
                  $sql_jum .= " ORDER BY `nama_jalur` ";
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
                            href='index.php?include=jalur&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=jalur&halaman=$sebelum'>«</a></li>";
                  }
                  for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 and $i < $halaman + 5) {
                      if ($i != $halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                                    href='index.php?include=jalur&halaman=$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                      }
                    }
                  }
                  if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=jalur&halaman=$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=jalur&halaman=$jum_halaman'>Last</a></li>";
                  }
                } ?>
                </ul>
              </div>
            </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->