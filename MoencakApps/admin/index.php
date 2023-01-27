<?php
  include('../koneksi/koneksi.php');
  session_start();
  if(isset($_GET["include"])){
  $include = $_GET["include"];
  if($include=="konfirmasi-login"){
    include("include/konfirmasilogin.php");
  }else if($include=="signout"){
    include("include/signout.php");
  }else if($include=="konfirmasi-edit-profil"){
    include("include/konfirmasieditprofil.php");
  }else if($include=="konfirmasi-tambah-admin"){
    include("include/konfirmasitambahadmin.php");
  }else if($include=="konfirmasi-edit-admin"){
    include("include/konfirmasieditadmin.php");
  }else if($include=="konfirmasi-ubah-password"){
    include("include/konfirmasiubahpass.php");
  }else if($include=="konfirmasi-tambah-gunung"){
    include("include/konfirmasitambahgunung.php");
  }else if($include=="konfirmasi-edit-gunung"){
    include("include/konfirmasieditgunung.php");
  }else if($include=="konfirmasi-tambah-jalur"){
    include("include/konfirmasitambahjalur.php");
  }else if($include=="konfirmasi-edit-jalur"){
    include("include/konfirmasieditjalur.php");
  }else if($include=="konfirmasi-tambah-artikel"){
    include("include/konfirmasitambahartikel.php");
  }else if($include=="konfirmasi-edit-artikel"){
    include("include/konfirmasieditartikel.php");
  }else if($include=="konfirmasi-tambah-konten"){
    include("include/konfirmasitambahkonten.php");
  }else if($include=="konfirmasi-edit-konten"){
    include("include/konfirmasieditkonten.php");
  }else if($include=="konfirmasi-edit-pendaki"){
    include("include/konfirmasieditpendaki.php");
  }else if($include=="konfirmasi-edit-booking"){
    include("include/konfirmasieditbooking.php");
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?>
</head>
<body>
  <?php
//cek ada get include
if(isset($_GET["include"])){
  $include = $_GET["include"];
   //cek apakah ada session id admin
  if(isset($_SESSION['id_admin'])){
    ?>
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php 
          if($include=="edit-profil"){
            include("include/editprofil.php");
          }else if($include=="admin"){
            include("include/admin.php");
          }else if($include=="tambah-admin"){
            include("include/tambahadmin.php");
          }else if($include=="edit-admin"){
            include("include/editadmin.php");
          }else if($include=="detail-admin"){
            include("include/detailadmin.php");
          }else if($include=="ubah-pass"){
            include("include/ubahpass.php");
          }else if($include=="gunung"){
            include("include/gunung.php");
          }else if($include=="tambah-gunung"){
            include("include/tambahgunung.php");
          }else if($include=="edit-gunung"){
            include("include/editgunung.php");
          }else if($include=="detail-gunung"){
            include("include/detailgunung.php");
          }else if($include=="jalur"){
            include("include/jalur.php");
          }else if($include=="tambah-jalur"){
            include("include/tambahjalur.php");
          }else if($include=="edit-jalur"){
            include("include/editjalur.php");
          }else if($include=="artikel"){
            include("include/artikel.php");
          }else if($include=="tambah-artikel"){
            include("include/tambahartikel.php");
          }else if($include=="edit-artikel"){
            include("include/editartikel.php");
          }else if($include=="detail-artikel"){
            include("include/detailartikel.php");
          }else if($include=="konten"){
            include("include/konten.php");
          }else if($include=="tambah-konten"){
            include("include/tambahkonten.php");
          }else if($include=="edit-konten"){
            include("include/editkonten.php");
          }else if($include=="detail-konten"){
            include("include/detailkonten.php");
          }else if($include=="edit-pendaki"){
            include("include/editpendaki.php");
          }else if($include=="detail-pendaki"){
            include("include/detailpendaki.php");
          }else if($include=="edit-booking"){
            include("include/editbooking.php");
          }else if($include=="detail-booking"){
            include("include/detailbooking.php");
          }else if($include=="pendaki"){
            include("include/pendaki.php");
          }else if($include=="booking"){
            include("include/booking.php");
          }else if($include=="ubah-password"){
            include("include/ubahpass.php");
          }else{
            include("include/profil.php");
          }  
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
  	}else{
    //pemanggilan halaman form login
      include("include/login.php");
    } 
}else{
  if(isset($_SESSION['id_admin'])){
  //pemanggilan ke halaman-halaman profil jika ada session
  ?>
  <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
        <?php
          //pemanggilan profil
          include("include/profil.php");
        ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
  }else{
  //pemanggilan halaman form login
    include("include/login.php");
  } 
}
?>


</body>
</html>
