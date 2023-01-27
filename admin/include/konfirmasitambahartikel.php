<?php 
// session_start();
// include('../koneksi/koneksi.php');
    $penulis = $_POST['penulis'];
    $tgl = $_POST['tgl'];
    $judul_artikel = $_POST['judul_artikel'];
    $isi = $_POST['isi'];
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];
    $direktori = 'artikel/'.$nama_file;

    if(empty($penulis)){
	    header("Location:index.php?include=tambah-artikel&data=&notif=tambahkosong&jenis=penulis");
	}else if(empty($tgl)){
	    header("Location:index.php?include=tambah-artikel&data=&notif=tambahkosong&jenis=tgl");
	}else if(empty($judul_artikel)){
	    header("Location:index.php?include=tambah-artikel&data=&notif=tambahkosong&jenis=judulartikel");
	}else if(empty($isi)){
	    header("Location:index.php?include=tambah-artikel&data=&notif=tambahkosong&jenis=isi");
	}else if(!move_uploaded_file($lokasi_file,$direktori)){
        header("Location:index.php?include=tambah-artikel&notif=tambahkosong&jenis=gambar");
    }else{
	$sql = "INSERT INTO `artikel` (`penulis`, `tgl`, `judul_artikel`, `isi`, `gambar`)
    VALUES ('$penulis', '$tgl', '$judul_artikel', '$isi', '$nama_file')";
	mysqli_query($koneksi,$sql);
    $id_artikel = mysqli_insert_id($koneksi);

    header("Location:index.php?include=artikel&notif=tambahberhasil");
}
?>
