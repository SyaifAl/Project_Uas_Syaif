<?php
    //akses file koneksi database
    if (isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $username = mysqli_real_escape_string($koneksi, $user);
        $password = mysqli_real_escape_string($koneksi, MD5($pass));

        //cek username dan password
        $sql = "SELECT `id_admin`, `level` FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);
        if(empty($user)){
            header("Location: index.php?include=login&gagal=userKosong");
        }else if (empty($pass)){
            header("Location: index.php?include=login&gagal=passKosong");
        }else if($jumlah==0){
            header("Location: index.php?include=login&gagal=userpassSalah");
        }else{
            session_start();
            //get data
            while($data = mysqli_fetch_row($query)){
                $id_admin = $data[0]; //1
                $level = $data[1];
                $_SESSION['id_admin'] = $id_admin;
                $_SESSION['level']=$level;
                header("Location: index.php?include=profil.php");
            }
        }
    }
?>