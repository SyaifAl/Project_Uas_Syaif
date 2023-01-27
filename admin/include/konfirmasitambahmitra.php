<?php 
    $nama_mitra = $_POST['nama_mitra'];
    $website = $_POST['website'];
    $lokasi_file = $_FILES['logo']['tmp_name'];
    $nama_file = $_FILES['logo']['name'];
    $direktori = 'logo/'.$nama_file;
    


    if(empty($nama_mitra)){
	    header("Location:index.php?include=tambah-mitra&data=&notif=tambahkosong&jenis=nama_mitra");
    }else if(empty($website)){
	    header("Location:index.php?include=tambah-mitra&data=&notif=tambahkosong&jenis=website");
    }else if(!move_uploaded_file($lokasi_file,$direktori)){
        header("Location:index.php?include=tambah-mitra&notif=tambahkosong&jenis=foto");
    }else{
        $sql = "INSERT INTO `mitra` (`nama_mitra`, `logo`, `website`)
        VALUES ('$nama_mitra', '$nama_file', '$website')";
        mysqli_query($koneksi,$sql);
        $id_mitra = mysqli_insert_id($koneksi);

        header("Location:index.php?include=mitra&notif=tambahberhasil");
}
?>
