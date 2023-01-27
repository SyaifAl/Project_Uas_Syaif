<?php 
// session_start();
// include('../koneksi/koneksi.php');
    $penulis = $_POST['penulis'];
    $judul_konten = $_POST['judul_konten'];
    $isi = $_POST['isi'];

    if(empty($judul_konten)){
	    header("Location:index.php?include=tambah-konten&data=&notif=tambahkosong&jenis=judulkonten");
	}else if(empty($isi)){
	    header("Location:index.php?include=tambah-konten&data=&notif=tambahkosong&jenis=isi");
	}else{
	$sql = "INSERT INTO `konten` (`id_konten`, `isi_konten`, `judul_konten`)
    VALUES ('$id_konten', '$isi', '$judul_konten')";
	mysqli_query($koneksi,$sql);
    $id_konten = mysqli_insert_id($koneksi);

    header("Location:index.php?include=konten&notif=tambahberhasil");
}
?>
