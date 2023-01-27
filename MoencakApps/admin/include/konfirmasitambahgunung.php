<?php 
// session_start();
// include('../koneksi/koneksi.php');
    $nama_gunung = $_POST['nama_gunung'];
    $deskripsi_singkat = $_POST['deskripsi_singkat'];
    $deskripsi = $_POST['Deskripsi'];
    $letak_geografis = $_POST['letak_geografis'];
    $ketinggian = $_POST['ketinggian'];
    $harga_simaksi = $_POST['harga_simaksi'];
    $id_provinsi = $_POST['id_provinsi'];
    $lokasi_file = $_FILES['sop']['tmp_name'];
    $nama_file = $_FILES['sop']['name'];
    $direktori = 'sop/'.$nama_file;
    
    $lokasig_file = $_FILES['gunung']['tmp_name'];
    $gunung_file = $_FILES['gunung']['name'];
    $direktorig = 'gunung/'.$gunung_file;


    if(empty($nama_gunung)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=namagunung");
	}else if(empty($deskripsi_singkat)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=deskripsi_singkat");
	}else if(empty($deskripsi)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=Deskripsi");
    }else if(empty($letak_geografis)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=letak_geografis");
    }else if(empty($ketinggian)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=ketinggian");
    }else if(empty($id_provinsi)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=id_provinsi");
    }else if(!move_uploaded_file($lokasi_file,$direktori)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=sop");
    }else if(!move_uploaded_file($lokasig_file,$direktorig)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=gunung");
    }else if(empty($harga_simaksi)){
	    header("Location:index.php?include=tambah-gunung&data=&notif=tambahkosong&jenis=harga_simaksi");
    }else{
	$sql = "INSERT INTO `gunung` (`nama_gunung`, `desc_singkat`, `desc`, `letak_geografis`, `ketinggian`, `sop`, `harga_simaksi`, `id_provinsi`, `foto`)
    VALUES ('$nama_gunung', '$deskripsi_singkat', '$deskripsi', '$letak_geografis', '$ketinggian', '$nama_file', '$harga_simaksi', '$id_provinsi', '$gunung_file')";
	mysqli_query($koneksi,$sql);
    $id_gunung = mysqli_insert_id($koneksi);

    header("Location:index.php?include=gunung&notif=tambahberhasil");
}
?>
