<?php 
// session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['id_jalur'])){
    $id_jalur = $_SESSION['id_jalur'];
    $nama_jalur = $_POST['nama_jalur'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $id_gunung = $_POST['id_gunung'];

    
    if (empty($nama_jalur)) {
        header("Location:index.php?include=edit-jalur&data=$nama_jalur&notif=editkosong&jenis=namajalur");
    }else if(empty($kecamatan)){
	    header("Location:index.php?include=edit-jalur&data=$kecamatan&notif=editkosong&jenis=kecamatan");
    }else if(empty($kota)){
	    header("Location:index.php?include=edit-jalur&data=$kota&notif=editkosong&jenis=kota");
    }else if(empty($id_gunung)){
	    header("Location:index.php?include=edit-jalur&data=$id_gunung&notif=editkosong&jenis=idgunung");
	} else {
	    $sql = "UPDATE `jalur` set `nama_jalur`='$nama_jalur',`kecamatan`='$kecamatan', `kota`='$kota', `id_gunung`='$id_gunung' WHERE `id_jalur`='$id_jalur'";
    mysqli_query($koneksi,$sql);

    header("Location:index.php?include=jalur&notif=editberhasil");
    }
}
?>