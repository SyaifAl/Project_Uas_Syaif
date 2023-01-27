<?php 
    // session_start();
    // include('../koneksi/koneksi.php');
    if(isset($_SESSION['id_admin'])){
        $id_admin = $_SESSION['id_admin'];
        $passlama = $_POST['passlama'];
        $password_lama = mysqli_real_escape_string($koneksi, MD5($passlama));
        $passbaru = $_POST['passbaru'];
        $password_baru = mysqli_real_escape_string($koneksi, MD5($passbaru));
        $passbarukonfirm = $_POST['passbarukonfirm'];

        //cek password lama 
        $sql = "SELECT * FROM admin WHERE `id_admin` = '$id_admin' AND `password` = '$password_lama' ";
        $query = mysqli_query($koneksi, $sql);
        $count = mysqli_num_rows($query);
        
        if(empty($password_lama)){	   
            header("Location:index.php?include=ubah-password&notif=passlamakosong");
        }else if(empty($password_baru)){
            header("Location:index.php?include=ubah-password&notif=passbarukosong");
        }else if(empty($passbarukonfirm)){
            header("Location:index.php?include=ubah-password&notif=passkonfirmkosong");
        }else{
            if($count==1){
                $sql = "update `admin` set `password`='$password_baru' where `id_admin`='$id_admin'";
                mysqli_query($koneksi,$sql);
                header("Location:index.php?include=ubah-password&notif=editberhasil");
            }else {
                header("Location:index.php?include=ubah-password&notif=passsalah");
            }
        }
    }
?>