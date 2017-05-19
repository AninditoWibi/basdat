<!DOCTYPE html>
<html>
<head>
	<title>Tokokeren</title>
     <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="web/src/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
    <?php
    @session_start();

    include "navbar.php";
        
    if(isset($_SESSION['login'])){?> 
      <h2 class="teal-text center-align">Menu Navigasi Pelanggan</h2>
      <div class="center-align">
        <a href="beli_produk/index.php" class="btn waves-effect waves-light btn-large">Membeli Produk
            <i class="material-icons right">send</i>
        </a>
        <a href="" class="btn waves-effect waves-light btn-large">Melihat Transaksi
            <i class="material-icons right">send</i>
        </a>
        <a href="beli_produk/daftar_shipped_produk.php" class="btn waves-effect waves-light btn-large">Melihat Keranjang Belanja
            <i class="material-icons right">send</i>
        </a>
         <?php 
        if($_SESSION['penjual']!="f"){
         ?>
        <a href="#" class="btn waves-effect waves-light btn-large">Menambah Produk
            <i class="material-icons right">send</i>
        </a> <?php 
        } ?>
    </div>
    <?php  
  } elseif(isset($_SESSION['admin'])) {
     ?> <h2 class="teal-text center-align">Menu Navigasi Admin</h2>
      <div class="center-align">
        <a href="addkategori.php" class="btn waves-effect waves-light btn-large">Membuat Kategori dan Subkategori
            <i class="material-icons right">send</i>
        </a>
        <a href="web/order.php" class="btn waves-effect waves-light btn-large">Membuat Jasa Kirim
            <i class="material-icons right">send</i>
        </a>
        <a href="web/promo.php" class="btn waves-effect waves-light btn-large">Membuat Promo
            <i class="material-icons right">send</i>
        </a>
       
        <a href="#" class="btn waves-effect waves-light btn-large">Menambah Produk
            <i class="material-icons right">send</i>
        </a>
    </div>
     <?php } else {?>
         <h2 class="teal-text center-align">Selamat Datang di Tokokeren</h2>
  <div class="center-align">
        <a href="login.php" class="btn waves-effect waves-light btn-large">Log in
            <i class="material-icons right">send</i>
        </a>
        <a href="register.php" class="btn waves-effect waves-light btn-large">Register
            <i class="material-icons right">send</i>
        </a>
    </div>
     <?php } ?>

    
    
    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="web/src/js/materialize.min.js"></script>

</body>
</html>