<?php
if (isset($_GET['data'])) {
  $id_booking = $_GET['data'];
  $_SESSION['id_booking'] = $id_booking;
  
  $sql_d = "SELECT `id_booking`, `tgl_pendakian`, `tgl_turun`, `jumlah_pendaki`, `id_jalur`, `tgl_transaksi`, `bukti_transaksi`, `status_pembayaran`, `harga_simaksi` FROM `booking` WHERE `id_booking`='$id_booking'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $id_booking = $data_d[0];
    $tgl_pendakian = $data_d[1];
    $tgl_turun = $data_d[2];
    $jumlah_pendaki = $data_d[3];
    $id_jalur = $data_d[4];
    $tgl_transaksi = $data_d[5];
    $bukti_transaksi = $data_d[6];
    $status_pembayaran = $data_d[7];
    $harga_simaksi = $data_d[8];
}
}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="text-primer"><i class="fas fa-edit"></i> Edit Booking</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?include=booking">Booking</a></li>
                        <li class="breadcrumb-item active">Edit Booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info" >
        <div class="card-header bg-success">
            <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Booking</h3>
            <div class="card-tools">
                <a href="index.php?include=booking" class="btn btn-sm bg-primer float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
      <?php if (!empty($_GET['notif'])) { ?>
        <?php if ($_GET['notif'] == "editkosong") { ?>
          <div class="alert alert-danger" role="alert">
            Maaf data booking wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?include=konfirmasi-edit-booking" method="post" enctype="multipart/form-data">
      <div class="card-body">

            <div class="form-group row">
                <label for="tanggal_naik" class="col-sm-3 col-form-label">Tanggal Pendakian</label>
                <div class="col-sm-7">
                <input type="date" class="form-control" name="tgl_pendakian" 
                id="tgl_pendakian" value="<?php echo $tgl_pendakian;?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_turun" class="col-sm-3 col-form-label">Tanggal Turun</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control" name="tgl_turun" 
                id="tgl_turun" value="<?php echo $tgl_turun; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah_pendaki" class="col-sm-3 col-form-label">Jumlah Pendaki</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="jumlah_pendaki" value="<?php echo $jumlah_pendaki; ?>" name="jumlah_pendaki">
                </div>
            </div>
            <div class="form-group row">
                    <label for="level" class="col-sm-3 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="jurusan" name="status_pembayaran">
                        <option value="BELUM LUNAS">BELUM LUNAS</option>
                        <option value="LUNAS">LUNAS</option>
                      </select>
                    </div>
                  </div>
            <div class="form-group row">
                <label for="tanggal_transaksi" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control" name="tgl_transaksi" 
                id="tgl" value="<?php echo $tgl_transaksi;?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="bukti_transaksi" class="col-sm-3 col-form-label">Bukti Transaksi </label>
                <div class="col-sm-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="bukti_transaksi" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
                </div>  
            </div>
            <div class="form-group row">
                <label for="harga_simaksi" class="col-sm-3 col-form-label">Harga SIMAKSI</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="harga_simaksi" name="harga_simaksi" value="<?php echo $harga_simaksi; ?>">
                </div>
            </div>
            <div class="form-group row">
                    <label for="jalur" class="col-sm-3 col-form-label">Jalur</label>
                    <div class="col-sm-7">
                    <select class="form-control" id="id_jalur" name="id_jalur">
                            <option value="">-Pilih Jalur-</option>
                        <?php
                            $sql = "SELECT `id_jalur`, `nama_jalur` FROM `jalur` ORDER BY `nama_jalur`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                                $id_jalur = $data[0];
                                $nama_jalur = $data[1];
                        ?>
                            <option value="<?php echo $id_jalur;?>"
                            <?php if($id_jalur==$id_jalur){?>
                            selected <?php }?>><?php echo $nama_jalur;?></option>
                        <?php } ?>
                    </select>
            </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-sm-10">
                <button type="submit" class="btn bg-primer text-white float-right"><i class="fas fa-save"></i> Simpan</button>
            </div>  
        </div>
        <!-- /.card-footer -->
    </form>
</div>
    <!-- /.card -->

</section>


