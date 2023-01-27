<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_booking'])){
    $id_booking = $_SESSION['id_booking'];
    $tgl_pendakian = $_POST['tgl_pendakian'];
    $tgl_turun = $_POST['tgl_turun'];
    $jumlah_pendaki = $_POST['jumlah_pendaki'];
    $id_jalur = $_POST['id_jalur'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $status_pembayaran = $_POST['status_pembayaran'];
    $harga_simaksi = $_POST['harga_simaksi'];
    $lokasi_file = $_FILES['bukti_transaksi']['tmp_name'];
    $nama_file = $_FILES['bukti_transaksi']['name'];
    $direktori = 'bukti_transaksi/'.$nama_file;
    
    $sql_f = "SELECT `bukti_transaksi` FROM `booking` WHERE `id_booking`='$id_booking'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $bukti_transaksi = $data_f[0];
    }

    if(empty($tgl_pendakian)){
	    header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong&jenis=tanggalpendakian");
    }else if(empty($tgl_turun)){
	    header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong
        &jenis=tglturun");
    }else if(empty($jumlah_pendaki)){
	    header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong&jenis=jumlahpendaki");
    }else if(empty($id_jalur)){
	    header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong
        &jenis=idjalur");
    }else if(empty($tgl_transaksi)){
	    header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong
        &jenis=tgl_transaksi");
    }else if(empty($status_pembayaran)){
	    header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong
        &jenis=statuspembayaran");
    }else if(empty($harga_simaksi)){
	    header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong
        &jenis=hargasimaksi");
    } else {
        $lokasi_file = $_FILES['bukti_transaksi']['tmp_name'];
	   $nama_file = $_FILES['bukti_transaksi']['name'];
	   $direktori = 'bukti_transaksi/'.$nama_file;
	   if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($bukti_transaksi)){
                unlink("bukti_transaksi/$bukti_transaksi");
            }
	    $sql = "UPDATE `booking` set `tgl_pendakian`='$tgl_pendakian',`tgl_turun`='$tgl_turun', `jumlah_pendaki`='$jumlah_pendaki', `id_jalur`='$id_jalur',`bukti_transaksi`='$nama_file', `status_pembayaran`='$status_pembayaran', `harga_simaksi`='$harga_simaksi' WHERE `id_booking`='$id_booking'";
	mysqli_query($koneksi,$sql);
    }else{
        $sql = "UPDATE `booking` set `tgl_pendakian`='$tgl_pendakian',`tgl_turun`='$tgl_turu
        n', `jumlah_pendaki`='$jumlah_pendaki', `id_jalur`='$id_jalur', `status_pembayaran`='$status_pembayaran', `harga_simaksi`='$harga_simaksi' WHERE `id_booking`='$id_booking'";
	mysqli_query($koneksi,$sql);
    }

    header("Location:index.php?include=booking&notif=editberhasil");
    }
}
?>