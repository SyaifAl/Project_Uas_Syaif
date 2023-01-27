<?php 
if(isset($_GET['data'])){
	$id_gunung = $_GET['data'];
	//get data gunung
    $sql = "SELECT `g`.`id_gunung`, `g`.`foto_gunung`, `g`.`nama_gunung`, `g`.`desc_singkat`, `g`.`desc`, `g`.`letak_geografis`, `g`.`ketinggian`, `g`.`sop`,  `g`.`harga_simaksi`, `p`.`nama_provinsi` FROM `gunung` `g` JOIN provinsi `p` on `p`.`id_provinsi` = `g`.`id_provinsi`  WHERE `id_gunung`='$id_gunung'";
    $query = mysqli_query($koneksi,$sql);
    while($data = mysqli_fetch_row($query)){
        $id_gunung = $data[0];
        $foto_gunung = $data[1];
        $nama_gunung = $data[2];
        $desc_singkat = $data[3];
        $desc = $data[4];
        $letak_geografis = $data[5];
        $ketinggian = $data[6];
        $sop = $data[7];
        $harga_simaksi = $data[8];
        $nama_provinsi = $data[9];
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
                <h3 class="text-primer"><i class="fas fa-file-alt "></i> Detail Data Gunung</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">             
                <li class="breadcrumb-item"><a href="index.php?include=gunung">Data gunung</a></li>
                <li class="breadcrumb-item active">Detail Data Gunung</li>
                </ol>
            </div>
            </div>
                
        </div><!-- /.container-fluid -->
        </section>  
        

        <!-- Main content -->
        <section class="content">
                <div class="card card-success">
                <div class="card-header bg-success">
                    <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Detail Gunung</h3>
                <div class="card-tools">                
                    <a href="index.php?include=gunung" class="btn btn-sm bg-primer float-right text-white"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>               
                            <tr>
                                <td width="20%"><strong>ID Gunung<strong></td>
                                <td width="80%"><?php echo $id_gunung;?></td>
                            </tr>      
                            <tr>
                                <td width="20%"><strong>Foto<strong></td>
                                <td width="80%"><img src="foto_gunung/<?php echo $foto_gunung;?>" class="img-fluid"></td>
                            </tr>            
                            <tr>
                                <td width="20%"><strong>Nama<strong></td>
                                <td width="80%"><?php echo $nama_gunung;?></td>
                            </tr>                 
                            <tr>
                                <td width="20%"><strong>Deskripsi Singkat<strong></td>
                                <td width="80%"><?php echo $desc_singkat;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Deskripsi<strong></td>
                                <td width="80%"><?php echo $desc;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Letak Geografis<strong></td>
                                <td width="80%"><?php echo $letak_geografis;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Ketinggian<strong></td>
                                <td width="80%"><?php echo $ketinggian;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>SOP<strong></td>
                                <td width="80%"><a href="sop/<?php echo $sop;?>" class="img-fluid"><?php echo $sop;?></a></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Harga SIMAKSI<strong></td>
                                <td width="80%"><?php echo $harga_simaksi;?></td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Provinsi<strong></td>
                                <td width="80%"><?php echo $nama_provinsi;?></td>
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