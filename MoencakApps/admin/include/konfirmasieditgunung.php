<?php 
// session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['id_gunung'])){
    $id_gunung = $_SESSION['id_gunung'];
    $nama_gunung = $_POST['nama_gunung'];
    $desc_singkat = $_POST['desc_singkat'];
    $desc = $_POST['desc'];
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

    $sql_s = "SELECT `sop` FROM `gunung` WHERE `id_gunung`='$id_gunung'";
    $query_s = mysqli_query($koneksi,$sql_s);
    while($data_s = mysqli_fetch_row($query_s)){
        $sop = $data_s[0];
    }
    $sql_f = "SELECT `foto` FROM `gunung` WHERE `id_gunung`='$id_gunung'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto_gunung = $data_f[0];
    }
    
    if (empty($nama_gunung)) {
        header("Location:index.php?include=edit-gunung&data=$id_gunung&notif=editkosong&jenis=namapendaki");
    }else if(empty($desc_singkat)){
	    header("Location:index.php?include=edit-gunung&data=$id_gunung&notif=editkosong
        &jenis=descsingkat");
    }else if(empty($desc)){
	    header("Location:index.php?include=edit-gunung&data=$id_gunung&notif=editkosong
        &jenis=desc");
    }else if(empty($letak_geografis)){
	    header("Location:index.php?include=edit-gunung&data=$id_gunung&notif=editkosong
        &jenis=letakgeografis");
    }else if(empty($ketinggian)){
	    header("Location:index.php?include=edit-gunung&data=$id_gunung&notif=editkosong
        &jenis=ketinggian");
    }else if(empty($harga_simaksi)){
	    header("Location:index.php?include=edit-gunung&data=$id_gunung&notif=editkosong
        &jenis=hargasimaksi");
    }else if(empty($id_provinsi)){
	    header("Location:index.php?include=edit-gunung&data=$id_gunung&notif=editkosong
        &jenis=idprovinsi");
	} else {
        $lokasi_file = $_FILES['sop']['tmp_name'];
	    $nama_file = $_FILES['sop']['name'];
	    $direktori = 'sop/'.$nama_file;

        $lokasig_file = $_FILES['gunung']['tmp_name'];
        $gunung_file = $_FILES['gunung']['name'];
        $direktorig = 'gunung/'.$gunung_file;

	    if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($sop)){
                unlink("sop/$sop");
            }
            $sql = "UPDATE `gunung` set `foto`='$gunung_file',`nama_gunung`='$nama_gunung', `desc_singkat`='$desc_singkat', `desc`='$desc', `letak_geografis`='$letak_geografis',`ketinggian`='$ketinggian', `sop`='$nama_file', `harga_simaksi`='$harga_simaksi', `id_provinsi`='$id_provinsi' WHERE `id_gunung`='$id_gunung'";
	        mysqli_query($koneksi,$sql);
    
        } 
        else if (move_uploaded_file($lokasig_file,$direktorig)){
                if(!empty($foto_gunung)){
                    unlink("gunung/$foto_gunung");
                }
        
                $sql = "UPDATE `gunung` set `foto`='$gunung_file',`nama_gunung`='$nama_gunung', `desc_singkat`='$desc_singkat', `desc`='$desc', `letak_geografis`='$letak_geografis',`ketinggian`='$ketinggian', `sop`='$nama_file', `harga_simaksi`='$harga_simaksi', `id_provinsi`='$id_provinsi' WHERE `id_gunung`='$id_gunung'";
                mysqli_query($koneksi,$sql);
        }
        else{
            $sql = "UPDATE `gunung` set `nama_gunung`='$nama_gunung',`desc_singkat`='$desc_singkat', `desc`='$desc', `letak_geografis`='$letak_geografis',`ketinggian`='$ketinggian', `harga_simaksi`='$harga_simaksi', `id_provinsi`='$id_provinsi' WHERE `id_gunung`='$id_gunung'";
            mysqli_query($koneksi,$sql);
        }
    header("Location:index.php?include=gunung&notif=editberhasil");
    }

}
?>