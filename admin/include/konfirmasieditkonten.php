<?php 
// session_start();
// include('../koneksi/koneksi.php');
if(isset($_SESSION['id_konten'])){
    $id_konten = $_SESSION['id_konten'];
    $isi = $_POST['isi_konten'];
    $judul_konten = $_POST['judul_konten'];

    
    if(empty($judul_konten)){
        header("Location:index.php?include=edit-konten&data=".$id_konten."&notif=editkosong");
	}else{
	$sql = "UPDATE `konten` set `isi_konten`='$isi',`judul_konten`='$judul_konten' WHERE `id_konten`='$id_konten'";
	mysqli_query($koneksi,$sql);

    header("Location:index.php?include=konten&notif=editberhasil");
    }
}
?>
