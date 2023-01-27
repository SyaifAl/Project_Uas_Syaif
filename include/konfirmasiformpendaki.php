    
<?php
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $lokasi_file = $_FILES['upload-kartu-identitas']['tmp_name'];
    $kartu_identitas = $_FILES['upload-kartu-identitas']['name'];
    $direktori = 'kartu_identitas/'.$kartu_identitas;
    $email = $_POST['email'];
    $tlp = $_POST['tlp'];
    $tlp_kerabat = $_POST['tlp_kerabat'];

    if(empty($nama)){
	    header("Location:index.php?include=form-pendaki&data=&notif=tambahkosong&jenis=nama");
	}else if(empty($nik)){
	    header("Location:index.php?include=form-pendaki&data=&notif=tambahkosong&jenis=nik");
    }else if(empty($jk)){
	    header("Location:index.php?include=form-pendaki&data=&notif=tambahkosong&jenis=jenis_kelamin");
    }else if(empty($alamat)){
	    header("Location:index.php?include=form-pendaki&data=&notif=tambahkosong&jenis=alamat");
    }else if(empty($email)){
	    header("Location:index.php?include=form-pendaki&data=&notif=tambahkosong&jenis=email");
    }else if(empty($tlp)){
	    header("Location:index.php?include=form-pendaki&data=&notif=tambahkosong&jenis=tlp");
    }else if(empty($tlp_kerabat)){
	    header("Location:index.php?include=form-pendaki&data=&notif=tambahkosong&jenis=tlp_kerabat");
	}else{

    if ((isset($_GET['data']))) {
        $id_booking = $_GET['data'];
    }

	$sql = "INSERT INTO `pendaki` (`id_pendaki`, `nama_pendaki`,`nik`, `jenis_kelamin`, `kartu_identitas`, `alamat`, `email`, `telpon`, `telpon_keluarga`, `id_booking`)
    VALUES ('', '$nama', '$nik', '$jk', '$kartu_identitas', '$alamat', '$email', '$tlp', '$tlp_kerabat', '$id_booking') ";
	mysqli_query($koneksi,$sql);
    $id_pendaki=mysqli_insert_id($koneksi);
        
    header("Location:index.php?include=form-pendaki&data=$id_booking");
}
?>
