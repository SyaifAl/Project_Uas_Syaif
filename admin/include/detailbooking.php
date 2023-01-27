<?php 
if(isset($_GET['data'])){
	$id_booking = $_GET['data'];
	//gat data artikel
    $sql = "SELECT `id_booking`, `tgl_pendakian`, `tgl_turun`, `jumlah_pendaki`, `id_jalur`, `tgl_transaksi`, `bukti_transaksi`, `status_pembayaran`, `harga_simaksi` FROM `booking`
        WHERE `id_booking`='$id_booking'";
    $query = mysqli_query($koneksi,$sql);
    while($data = mysqli_fetch_row($query)){
        $id_booking = $data[0];
        $tgl_pendakian = $data[1];
        $tgl_turun = $data[2];
        $jumlah_pendaki = $data[3];
        $id_jalur = $data[4];
        $tgl_transaksi = $data[5];
        $bukti_transaksi = $data[6];
        $status_pembayaran = $data[7];
        $harga_simaksi = $data[8];
    }
}
?>

    <!DOCTYPE html>
    <html>
    <head>
    <?php include("includes/head.php") ?> 
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="text-primer"><i class="fas fa-file-alt "></i> Detail Data Booking</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">             
                <li class="breadcrumb-item"><a href="index.php?include=pendaki">Data Booking</a></li>
                <li class="breadcrumb-item active">Detail Data Booking</li>
                </ol>
            </div>
            </div>
            <!-- <div class="col-sm-6">
                <h3 class="text-primer"><i class="fas fa-file-alt"></i> Detail Data Booking</h3>
                
        </div> -->
        <!-- /.container-fluid -->
        </section>
        

        <!-- Main content -->
        <section class="content">
                <div class="card">
                <div class="card-header bg-success">
                    <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Detail Booking</h3>
                    <div class="card-tools">                
                    <a href="index.php?include=booking" class="btn btn-sm bg-primer float-right text-white"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>            
                            <tr>
                                <td width="20%"><strong>ID Pendakian<strong></td>
                                <td width="80%"><?php echo $id_booking;?></td>
                            </tr>                 
                            <tr>
                                <td width="20%"><strong>Tanggal Pendakian<strong></td>
                                <td width="80%"><?php echo $tgl_pendakian;?></td>
                            </tr>                 
                            <tr>
                                <td width="20%"><strong>Tanggal Turun<strong></td>
                                <td width="80%"><?php echo $tgl_turun;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Jumlah Pendaki<strong></td>
                                <td width="80%"><?php echo $jumlah_pendaki;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>ID Jalur<strong></td>
                                <td width="80%"><?php echo $id_jalur;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Tanggal Transaksi<strong></td>
                                <td width="80%"><?php echo $tgl_transaksi;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Bukti Transaksi<strong></td>
                                <td width="80%"><img src="bukti_transaksi/<?php echo $bukti_transaksi;?>" class="img-fluid"></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Status Pembayaran<strong></td>
                                <td width="80%"><?php echo $status_pembayaran;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Harga Simaksi<strong></td>
                                <td width="80%"><?php echo $harga_simaksi;?></td>
                            </tr>
                        </tbody>
                    </table>  
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">&nbsp;</div>
                </div>
                <!-- /.card -->

        </section>
    <?php include("includes/script.php") ?>
    </body>
    </html>
