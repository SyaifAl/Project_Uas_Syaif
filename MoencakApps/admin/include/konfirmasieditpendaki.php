<?php 
// session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['id_pendaki'])){
    $id_pendaki = $_SESSION['id_pendaki'];
    $nama_pendaki = $_POST['nama_pendaki'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $telpon_keluarga = $_POST['telpon_keluarga'];
    $id_booking = $_POST['id_booking'];

    
    if (empty($nama_pendaki)) {
        header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong&jenis=namapendaki");
    }else if(empty($nik)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=nik");
    }else if(empty($jenis_kelamin)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=jeniskelamin");
    }else if(empty($tgl_lahir)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=tgllahir");
    }else if(empty($alamat)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=alamat");
    }else if(empty($email)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=email");
    }else if(empty($telpon)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=telpon");
    }else if(empty($telpon_keluarga)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=telponkeluarga");
    }else if(empty($id_booking)){
	    header("Location:index.php?include=edit-pendaki&data=$id_pendaki&notif=editkosong
        &jenis=idbooking");
	} else {
	    $sql = "UPDATE `pendaki` set `nama_pendaki`='$nama_pendaki',`nik`='$nik', `jenis_kelamin`='$jenis_kelamin', `tgl_lahir`='$tgl_lahir', `alamat`='$alamat', `email`='$email', `telpon`='$telpon', `telpon_keluarga`='$telpon_keluarga', `id_booking`='$id_booking' WHERE `id_pendaki`='$id_pendaki'";
	mysqli_query($koneksi,$sql);

    header("Location:index.php?include=pendaki&notif=editberhasil");
    }
}
?>