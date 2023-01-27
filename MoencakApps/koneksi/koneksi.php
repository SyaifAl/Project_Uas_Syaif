<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_moencak1");
    //cek koneksi
    if(!$koneksi){
        die("Error koneksi: " . mysqli_connect_errno());
    }
?>