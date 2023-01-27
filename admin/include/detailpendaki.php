<?php 
if(isset($_GET['data'])){
	$id_pendaki = $_GET['data'];
	//gat data artikel
    $sql = "SELECT `id_pendaki`, `nama_pendaki`, `nik`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `email`, `telpon`, `telpon_keluarga`, `id_booking` FROM `pendaki`
        WHERE `id_pendaki`='$id_pendaki'";
    $query = mysqli_query($koneksi,$sql);
    while($data = mysqli_fetch_row($query)){
        $id_pendaki = $data[0];
        $nama_pendaki = $data[1];
        $nik = $data[2];
        $jenis_kelamin = $data[3];
        $tgl_lahir = $data[4];
        $alamat = $data[5];
        $email = $data[6];
        $telpon = $data[7];
        $telpon_keluarga = $data[8];
        $id_booking = $data[9];
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
                <h3 class="text-primer"><i class="fas fa-file-alt "></i> Detail Data pendaki</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">             
                <li class="breadcrumb-item"><a href="index.php?include=pendaki">Data pendaki</a></li>
                <li class="breadcrumb-item active">Detail Data pendaki</li>
                </ol>
            </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
                <div class="card">
                <div class="card-header bg-success">
                    <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Detail Pendaki</h3>
                    <div class="card-tools">                
                    <a href="index.php?include=pendaki" class="btn btn-sm bg-primer float-right text-white"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>            
                            <tr>
                                <td width="20%"><strong>ID Pendaki<strong></td>
                                <td width="80%"><?php echo $id_pendaki;?></td>
                            </tr>                 
                            <tr>
                                <td width="20%"><strong>Nama<strong></td>
                                <td width="80%"><?php echo $nama_pendaki;?></td>
                            </tr>                 
                            <tr>
                                <td width="20%"><strong>NIK<strong></td>
                                <td width="80%"><?php echo $nik;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Jenis Kelamin<strong></td>
                                <td width="80%"><?php echo $jenis_kelamin;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Email<strong></td>
                                <td width="80%"><?php echo $email;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Telepon<strong></td>
                                <td width="80%"><?php echo $telpon;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Telepon Keluarga<strong></td>
                                <td width="80%"><?php echo $telpon_keluarga;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>ID Booking<strong></td>
                                <td width="80%"><?php echo $id_booking;?></td>
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
