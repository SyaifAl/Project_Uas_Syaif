<?php
    if ((isset($_GET['data']))) {
        $id_booking = $_GET['data'];
    }
    $tgl = $_POST['tgl'];
    $lokasi_file = $_FILES['bukti']['tmp_name'];
    $bukti = $_FILES['bukti']['name'];
    $direktori = 'bukti_transfer/'.$bukti;

	$sql = "UPDATE `booking`  SET `tgl_transaksi` = '$tgl', `bukti_transaksi`='$bukti' WHERE `id_booking` = '$id_booking'";
	mysqli_query($koneksi,$sql);
    $id_pendaki=mysqli_insert_id($koneksi);
        
    header("Location:index.php?include=booking-success");

?>
