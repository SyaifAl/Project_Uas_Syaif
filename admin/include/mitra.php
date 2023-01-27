<?php 
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_mitra = $_GET['data'];
    //hapus data mitra
    $sql_dm = "DELETE from `mitra` where `id_mitra` = '$id_mitra'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_mitra'])) {
  if ($_GET['aksi'] == 'cari') {
    $_SESSION['katakunci_mitra'] = $_POST['katakunci_mitra'];
    $katakunci_mitra = $_SESSION['katakunci_mitra'];
  }
}
if (isset($_SESSION['katakunci_mitra'])) {
  $katakunci_mitra = $_SESSION['katakunci_mitra'];
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-primer"><i class="fas fa-Mitra-tie"></i> Mitra</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data Mitra</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-primer" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Mitra</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-mitra" class="btn btn-sm btn-success float-right">
                  <i class="fas fa-plus"></i> Tambah  Mitra</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=mitra&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_mitra">
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
                        <th width="20%">Nama</th>
                        <th width="20%">Logo</th>
                        <th width="20%">Website</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $batas = 5;
                      if(!isset($_GET['halaman'])){
                          $posisi = 0;
                          $halaman = 1;
                      }else{
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman-1) * $batas;
                      }
                      //menampilkan data mitra               
                      $sql_k = "SELECT `id_mitra`,`nama_mitra`, `logo`,`website` FROM `mitra`  ";
                      if (isset($katakunci_mitra) && !empty($katakunci_mitra)){
                          $sql_k .= " WHERE `nama_mitra` LIKE '%$katakunci_mitra%' ";
                      } 
                      $sql_k .= " ORDER BY `id_mitra` limit $posisi, $batas";
                      $query_k = mysqli_query($koneksi,$sql_k);
                      $no = $posisi+1;
                      while($data_k = mysqli_fetch_row($query_k)){
                        $id_mitra = $data_k[0];
                        $nama_mitra = $data_k[1];
                        $logo = $data_k[2];
                        $webiste = $data_k[3];
                      ?>
                    <tr>
                      <td><?php echo $id_mitra;?></td>
                      <td><?php echo $nama_mitra;?></td>
                      <td width="30%"><img src="logo/<?php echo $logo;?>" class="img-fluid"></td>
                      <td><?php echo $webiste;?></td>
                        <td align="center">
                        <a href="index.php?include=edit-mitra&data=<?php echo $id_mitra; ?>" class="btn btn-xs bg-primer" title="Edit"><i class="fas fa-edit text-white"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama_mitra; ?>?')) window.location.href = 'index.php?include=mitra&aksi=hapus&data=<?php echo $id_mitra; ?>&notif=hapusberhasil'" class="btn btn-xs btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                        </td>
                      </tr>
                      <?php $no++; } ?>
                      
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
              $sql_jum = "SELECT `id_mitra`,`nama_mitra`, `logo`, `website`  FROM `mitra`  ";
                  if (isset($katakunci_mitra) && !empty($katakunci_mitra)){
                      $sql_jum .= " WHERE `nama_mitra` LIKE '%$katakunci_mitra%' ";
                  } 
                  $sql_jum .= " ORDER BY `id_mitra` ";
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
                            href='index.php?include=mitra&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=mitra&halaman=$sebelum'>«</a></li>";
                  }
                  for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 and $i < $halaman + 5) {
                      if ($i != $halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                                    href='index.php?include=mitra&halaman=$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                      }
                    }
                  }
                  if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=mitra&halaman=$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link' 
                                href='index.php?include=mitra&halaman=$jum_halaman'>Last</a></li>";
                  }
                } ?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->