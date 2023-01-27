<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_artikel'])){
    $id_artikel = $_SESSION['id_artikel'];
    $penulis = $_POST['penulis'];
    $tgl = $_POST['tgl'];
    $judul_artikel = $_POST['judul_artikel'];
    $isi = addslashes($_POST['isi']);
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];
    $direktori = 'gambar/'.$nama_file;

    //get gambar 
    $sql_f = "SELECT `gambar` FROM `artikel` WHERE `id_artikel`='$id_artikel'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $gambar = $data_f[0];
        //echo $foto;
    }
    if(empty($penulis)){
	    header("Location:index.php?include=edit-artikel&data=$id_artikel&notif=editkosong&jenis=penulis");
	}else if(empty($tgl)){
	    header("Location:index.php?include=edit-artikel&data=$id_artikel&notif=editkosong&jenis=tgl");
	}else if(empty($judul_artikel)){
	    header("Location:index.php?include=edit-artikel&data=$id_artikel&notif=editkosong&jenis=judulartikel");
	}else if(empty($isi)){
	    header("Location:index.php?include=edit-artikel&data=$id_artikel&notif=editkosong&jenis=isi");
	}else{
        $lokasi_file = $_FILES['gambar']['tmp_name'];
        $nama_file = $_FILES['gambar']['name'];
        $direktori = 'gambar/'.$nama_file;
	if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($gambar)){
                unlink("gambar/$gambar");
            }
	$sql = "UPDATE `artikel` set 
    `penulis`='$penulis',`judul_artikel`='$judul_artikel',
	`tgl`='$tgl',`isi`='$isi', `gambar`='$nama_file'
	WHERE `id_artikel`='$id_artikel'";
	mysqli_query($koneksi,$sql);
}else{
	$sql = "UPDATE `artikel` set 
    `penulis`='$penulis',`judul_artikel`='$judul_artikel',
	`tgl`='$tgl',`isi`='$isi'
	WHERE `id_artikel`='$id_artikel'";
	mysqli_query($koneksi,$sql);
}
header("Location:index.php?include=artikel&notif=editberhasil");
}
}
?>
