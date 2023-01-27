<?php 
    if(isset($_SESSION['id_admin'])){
        $id_admin = $_SESSION['id_admin'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $admin = $_POST['username'];
        $username = $username = mysqli_real_escape_string($koneksi, $admin);
        $level = $_POST['level'];
        $id_jalur = $_POST['jalur'];

        //get foto
        $sql_f = "SELECT `foto` FROM `admin` WHERE `id_admin`='$id_admin'";
        $query_f = mysqli_query($koneksi,$sql_f);
        while($data_f = mysqli_fetch_row($query_f)){
            $foto= $data_f[0];
        }

    if(empty($nama)){	   
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=nama");
    }else if(empty($email)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=email");
    }else if(empty($username)){	    
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=username");
    }else if(empty($level)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=level");
    }else if(empty($id_jalur)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=jalur");
    }else{
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $nama_file = $_FILES['foto']['name'];
            $direktori = 'foto/'.$nama_file;
            if(move_uploaded_file($lokasi_file,$direktori)){
                if(!empty($foto)){
                    unlink("foto/$foto");
                }
                $sql = "UPDATE `admin` set `id_admin`='$id_admin',`nama`='$nama',
                    `email`='$email',`username`='$username',
                    `level`='$level', `id_jalur`='$id_jalur',
                    `foto`='$nama_file' WHERE `id_admin`='$id_admin'";
                mysqli_query($koneksi,$sql);
            }else{
                $sql = "update `admin` set `nama`='$nama', `email`='$email', `username`='$username', `id_jalur`='$id_jalur'
                    where `id_admin`='$id_admin'";
		        mysqli_query($koneksi,$sql);
            }
            header("Location:index.php?include=admin&notif=editberhasil");
        }
    }
?>