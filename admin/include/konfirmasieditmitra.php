<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_mitra'])){
    $id_mitra = $_SESSION['id_mitra'];
    $nama_mitra = $_POST['nama_mitra'];
    $website = $_POST['website'];
    $lokasi_file = $_FILES['logo']['tmp_name'];
    $nama_file = $_FILES['logo']['name'];
    $direktori = 'logo/'.$nama_file;

   

    $sql_f = "SELECT `logo` FROM `mitra` WHERE `id_mitra`='$id_mitra'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $logo = $data_f[0];
    }
    
    if (empty($nama_mitra)) {
        header("Location:index.php?include=edit-mitra&data=$id_mitra&notif=editkosong&jenis=namamitra");
    }else if(empty($website)){
	    header("Location:index.php?include=edit-mitra&data=$id_mitra&notif=editkosong&jenis=website");
	} else {
        $lokasi_file = $_FILES['logo']['tmp_name'];
	    $nama_file = $_FILES['logo']['name'];
	    $direktori = 'logo/'.$nama_file;
	    if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($logo)){
                unlink("logo/$logo");
            }
        $sql = "UPDATE `mitra` set `nama_mitra`='$nama_mitra', `logo`='$nama_file', `website`='$website' WHERE `id_mitra`='$id_mitra'";
	    mysqli_query($koneksi,$sql);
        }
        else{
            $sql = "UPDATE `mitra` set `nama_mitra`='$nama_mitra',`website`='$website' WHERE `id_mitra`='$id_mitra'";
        mysqli_query($koneksi,$sql);
        }

    header("Location:index.php?include=mitra&notif=editberhasil");
    }

}

?>