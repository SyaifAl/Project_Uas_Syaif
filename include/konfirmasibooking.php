<?php 
    $provinsi = $_POST['provinsi'];
    $harga = $_POST['gunung'];
    $jalur = $_POST['jalur'];
    $tgl_naik = $_POST['tgl_naik'];
    $tgl_turun = $_POST['tgl_turun'];
    $rombongan = $_POST['rombongan'];

    if(empty($provinsi)){
	    header("Location:index.php?include=booking-simaksi&data=&notif=tambahkosong&jenis=provinsi");
	}else if(empty($harga)){
	    header("Location:index.php?include=booking-simaksi&data=&notif=tambahkosong&jenis=gunung");
    }else if(empty($jalur)){
	    header("Location:index.php?include=booking-simaksi&data=&notif=tambahkosong&jenis=jalur");
    }else if(empty($tgl_naik)){
	    header("Location:index.php?include=booking-simaksi&data=&notif=tambahkosong&jenis=tgl_naik");
    }else if(empty($tgl_turun)){
	    header("Location:index.php?include=booking-simaksi&data=&notif=tambahkosong&jenis=tgl_turun");
    }else if(empty($rombongan)){
	    header("Location:index.php?include=booking-simaksi&data=&notif=tambahkosong&jenis=rombongan");
	}else{
	$sql = "INSERT INTO `booking` (`id_booking`, `tgl_pendakian`, `tgl_turun`, `jumlah_pendaki`, `id_jalur`, `harga_simaksi`)
    VALUES ('', '$tgl_naik', '$tgl_turun', '$rombongan', '$jalur', '$harga')";
	mysqli_query($koneksi,$sql);
    $id_booking= mysqli_insert_id($koneksi);

    header("Location:index.php?include=form-pendaki&data=$id_booking");
}
?>
