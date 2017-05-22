<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kategori</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="web/src/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <?php
    @session_start();
    if(!isset($_SESSION['admin'])){
    	header("Location: login.php");
    } else {

   	include "navbar.php";
    ?>
    <h2 class="teal-text center-align">Tambah Kategori Baru</h2>
	<div class="row" style="width: 500px">
	<?php
    $msg = "";
    if(isset($_SESSION['fail']))
      $msg = "Kategori atau Subkategori Sudah ada";
    elseif(isset($_SESSION['success']))
    	$msg = "Kategori berhasil dimasukkan";
      echo "<div>".$msg."</div>";
      unset($_SESSION['wrong']);
    ?>
		<form action="addkategoriprocess.php" method="post" class="col s12">
		<div class="input-field col s12">
			<input type="text" id="kodekat" name="kodekat" placeholder="Kode Kategori" autofocus required maxlength="3">
            <label for="kodekat">Kode Kategori</label>
		</div>
		<div class="input-field col s12">
			<input type="text" id="namakat" name="namakat" placeholder="Nama Kategori" autofocus required>
            <label for="namakat">Nama Kategori</label>
		</div>
		<div class="utama input-field col s12">
			<div class="subkategori input-field col s10">
				<p class="col s12">Subkategori <span class="increment">1</span>:</p>
				<div class="input-field col s12">
					<input type="text" id="kodesub" name="kodesub[]" placeholder="Kode Subkategori" autofocus required maxlength="5">
                    <label for="kodesub">Kode Subkategori</label>
				</div>
				<div class="input-field col s12">
					<input type="text" id="namasub" name="namasub[]" placeholder="Nama Subategori" autofocus required>
                    <label for="namasub">Nama Subkategori</label>
				</div>
			</div>
		</div>

		<input id="addsubkategori" type="submit" value="Tambah Subkategori" class="btn waves-effect waves-light">
		<input type="submit" value="Submit" class="btn waves-effect waves-light">
		</form>
	</div>

    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="web/src/js/materialize.min.js"></script>
	<script src="addsub.js" type="text/javascript"></script>
	<?php
	}
	 ?>
</body>
</html>
