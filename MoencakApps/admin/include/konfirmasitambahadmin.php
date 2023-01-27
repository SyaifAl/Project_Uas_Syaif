<?php
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $username = $username = mysqli_real_escape_string($koneksi, $user);
    $pass = $_POST['password'];
    $password = mysqli_real_escape_string($koneksi, MD5($pass));
    $level = $_POST['level'];
    $id_jalur = $_POST['jalur'];
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/'.$nama_file;

    if(empty($nama)){	   
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=nama");
    }else if(empty($email)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=email");
    }else if(empty($username)){	    
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=username");
    }else if(empty($password)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=password");
    }else if(empty($level)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=level");
    }else if(empty($id_jalur)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=jalur");
    }else if(!move_uploaded_file($lokasi_file,$direktori)){
        header("Location:index.php?include=tambah-admin&notif=tambahkosong&jenis=foto");
    }else{   
	$sql = "INSERT INTO `admin` (`username`,`password`,`nama`,`email`,`foto`,`level`, `id_jalur`)
            VALUES ('$username','$password','$nama','$email','$nama_file','$level', '$id_jalur')";
      //echo $sql;
	mysqli_query($koneksi,$sql);
        header("Location:index.php?include=admin&notif=tambahberhasil");
    }
?>