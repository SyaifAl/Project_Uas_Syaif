<?php  
include('koneksi/koneksi.php') ;
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-booking") {
    include("include/konfirmasibooking.php");
  } else if ($include == "konfirmasi-form-pendaki") {
    include("include/konfirmasiformpendaki.php");
  } else if ($include == "konfirmasi-bukti-bayar") {
    include("include/konfirmasibuktibayar.php");
  }else if($include=="konf-subs"){
    include("include/konfsubs.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php  include('includes/head.php') ?>
    <link rel="stylesheet" href="node_modules/bootstrap/js/dist/carousel.js">
    <link rel="stylesheet" href="node_modules/bootstrap/js/dist/carousel.js.map">
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"rel="stylesheet">
    <link rel="stylesheet" href="src/input.css">
  </head>
  <body>
    <?php  include('includes/navbar.php') ?>
    <?php 
    //pemanggilan konten halaman index
    if(isset($_GET["include"])){
      $include = $_GET["include"];
      if($include=="harga-simaksi"){
        include("include/harga.php");
      }else if($include=="booking-simaksi"){
        include("include/booking.php");
      }else if($include=="form-pendaki"){
        include("include/formpendaki.php");
      }else if($include=="checkout"){
        include("include/checkout.php");
      }else if($include=="bukti-pembayaran"){
        include("include/buktipembayaran.php");
      }else if($include=="booking-success"){
        include("include/bookingsuccess.php");
      }else if($include=="artikel"){
        include("include/artikel.php");
      }else if($include=="detail-artikel"){
        include("include/detailartikel.php");
      }else if($include=="gunung"){
        include("include/gunung.php");
      }else if($include=="detail-gunung"){
        include("include/detailgunung.php");
      }else if($include=="about-us"){
        include("include/aboutus.php");
      }else if($include=="prosedur"){
        include("include/prosedur.php");
      }else{    
        include("include/index.php");
      }
    }else{
      include("include/index.php");
    }
    ?>
    
    <!-- footer -->
    <?php  include('includes/footer.php') ?>
    <!-- Script -->
    <?php include('includes/script.php') ?>
    <script src="dist/script.js"></script>
    <script src="dist/js/odometer.min.js"></script>
    <script src="dist/odometerberanda.js"></script>
    
  </body>
</html>