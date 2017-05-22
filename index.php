<?php require 'application.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tokokeren</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="web/src/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="src/css/style.css">
</head>
<body>
	<?php
	@session_start();

	include "navbar.php";

	if(isset($_SESSION['login'])){?>
	<div class="container">
		<div class="row">
			<div class="col s12 m10 push-m1">
				<div class="card-panel z-depth-2">
					<div class="row">
						<div class="center-align">
							<h2 class="teal-text center-align">Menu Navigasi Pelanggan</h2>
						</div>
						<div class="divider"></div>
					</div>
					<div class="container">
						<div class="row center-align">
							<a href="beli_produk/index.php" class="btn waves-effect waves-light btn-large">Membeli Produk
								<i class="material-icons right">shopping_cart</i>
							</a>
						</div>
						<div class="row center-align">
							<a href="lihat_transaksi" class="btn waves-effect waves-light red lighten-2 btn-large">Melihat Transaksi
								<i class="material-icons right">reorder</i>
							</a>
						</div>
						<div class="row center-align">
							<a href="beli_produk/daftar_shipped_produk.php" class="btn waves-effect waves-light btn-large">Melihat Keranjang Belanja
								<i class="material-icons right">shopping_basket</i>
							</a>
						</div>
						<div class="row center-align">
							<a href="#" class="btn waves-effect waves-light red lighten-2 btn-large">Membuka Toko
								<i class="material-icons right">store</i>
							</a>
						</div>
							<?php
							if($_SESSION['penjual']!="f"){
								?>
								<div class="row center-align">
								<a href="#" class="btn waves-effect waves-light btn-large">Menambah Produk
									<i class="material-icons right">playlist_add</i>
								</a>
								</div>
								<?php
							} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	} elseif(isset($_SESSION['admin'])) {
		?>
		<div class="container">
			<div class="row">
				<div class="col s12 m10 push-m1">
					<div class="card-panel z-depth-2">
						<div class="row">
							<div class="center-align">
								<h2 class="teal-text center-align">Menu Navigasi Admin</h2>
							</div>
							<div class="divider"></div>
						</div>
						<div class="container">
							<div class="row center-align">
								<a href="addkategori.php" class="btn waves-effect waves-light btn-large">Membuat Kategori dan Subkategori
									<i class="material-icons right">subject</i>
								</a>
							</div>
							<div class="row center-align">
								<a href="web/order.php" class="btn waves-effect waves-light red lighten-2 btn-large">Membuat Jasa Kirim
									<i class="material-icons right">playlist_add</i>
								</a>
							</div>
							<div class="row center-align">
								<a href="web/promo.php" class="btn waves-effect waves-light btn-large">Membuat Promo
									<i class="material-icons right">subject</i>
								</a>
							</div>
							<div class="row center-align">
								<a href="#" class="btn waves-effect waves-light red lighten-2 btn-large">Menambah Produk
									<i class="material-icons right">playlist_add</i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } else {?>
		<div class="container">
			<div class="row">
				<div class="col s12 m10 push-m1">
					<div class="card-panel z-depth-2">
						<div class="row">
							<div class="center-align">
								<h2 class="teal-text center-align">Selamat Datang di Tokokeren</h2>
							</div>
							<div class="divider"></div>
						</div>
						<div class="container">
							<div class="row center-align">
								<a href="login.php" class="btn waves-effect waves-light btn-large">Log in
									<i class="material-icons right">send</i>
								</a>
							</div>
							<div class="row center-align">
								<a href="register.php" class="btn waves-effect waves-light red lighten-2 btn-large">Register
									<i class="material-icons right">perm_identity</i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php } ?>




			<!--Import jQuery before materialize.js-->
			<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
			<script type="text/javascript" src="web/src/js/materialize.min.js"></script>

		</body>
		</html>
