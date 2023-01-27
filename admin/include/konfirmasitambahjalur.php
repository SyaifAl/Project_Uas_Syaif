<?php 
// session_start();
// include('../koneksi/koneksi.php');
    $nama_jalur = $_POST['nama_jalur'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $id_gunung = $_POST['id_gunung'];

    if(empty($nama_jalur)){
	    header("Location:index.php?include=tambah-jalur&data=&notif=tambahkosong&jenis=namajalur");
	}else if(empty($kecamatan)){
	    header("Location:index.php?include=tambah-jalur&data=&notif=tambahkosong&jenis=kecamatan");
	}else if(empty($kota)){
	    header("Location:index.php?include=tambah-jalur&data=&notif=tambahkosong&jenis=kota");
    }else if(empty($id_gunung)){
	    header("Location:index.php?include=tambah-jalur&data=&notif=tambahkosong&jenis=id_gunung");
    }else{
	$sql = "INSERT INTO `jalur` (`nama_jalur`, `kecamatan`, `kota`, `id_gunung`)
    VALUES ('$nama_jalur', '$kecamatan', '$kota', '$id_gunung')";
	mysqli_query($koneksi,$sql);
    $id_jalur = mysqli_insert_id($koneksi);

    header("Location:index.php?include=jalur&notif=tambahberhasil");
}
?>
