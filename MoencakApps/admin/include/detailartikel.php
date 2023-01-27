<?php 
if(isset($_GET['data'])){
	$id_artikel = $_GET['data'];
	//gat data artikel
    $sql = "SELECT `id_artikel`, `penulis`, `tgl`, `judul_artikel`, `isi`, `gambar` FROM `artikel`
        WHERE `id_artikel`='$id_artikel'";
    $query = mysqli_query($koneksi,$sql);
    while($data = mysqli_fetch_row($query)){
        $id_artikel = $data[0];
        $penulis = $data[1];
        $tgl = $data[2];
        $judul_artikel = $data[3];
        $isi = $data[4];
        $gambar = $data[5];
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
                <h3 class="text-primer"><i class="fas fa-file-alt "></i> Detail Data artikel</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">             
                <li class="breadcrumb-item"><a href="index.php?include=artikel">Data artikel</a></li>
                <li class="breadcrumb-item active">Detail Data artikel</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
                <div class="card">
                <div class="card-header">
                    <div class="card-tools">                
                    <a href="index.php?include=artikel" class="btn btn-sm bg-primer float-right text-white"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                            <td><strong>Gambar artikel<strong></td>
                            <td><img src="gambar/<?php echo $gambar;?>" 
                            class="img-fluid" width="200px;"></td>
                            </tr>               
                            <tr>
                                <td width="20%"><strong>Judul artikel<strong></td>
                                <td width="80%"><?php echo $judul_artikel;?></td>
                            </tr>                 
                            <tr>
                                <td width="20%"><strong>Penulis<strong></td>
                                <td width="80%"><?php echo $penulis;?></td>
                            </tr>                 
                            <tr>
                                <td width="20%"><strong>Tanggal<strong></td>
                                <td width="80%"><?php echo $tgl;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Isi<strong></td>
                                <td width="80%"><?php echo $isi;?></td>
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
