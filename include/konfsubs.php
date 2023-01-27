<?php
    $email = $_POST['email'];

    if(empty($email)){
    }else{
    $sql = "INSERT INTO `subscribe_artikel` (`email_pelanggan`) VALUES ('$email')";
    mysqli_query($koneksi, $sql);
        header("Location:index.php?include=notif=tambahberhasil");
    ?>
    <?php
    }
?>
