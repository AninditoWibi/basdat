<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Buat Toko Baru</title>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
		<script type="text/javascript" src="src/js/script.js"></script>
		<script type="text/javascript" src="src/js/ajax.js"></script>
		 <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="src/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
	<?php
		// lakukan integrasi sql via php
		$servername = "localhost";
		$username = "username";
		$password = "password";
		$dbname = "myDB";
	?>
		<div class="container">
			<h2>FORM MEMBUAT TOKO</h2>
				<form class="col s12" name="jkform" method="POST">
					<div class="row">
						<div class="input-field col s6">
						<label>Nama</label>
						<input id="nama_toko" type="text" class="validate">
						</div>
						<div class="input-field col s6">
						<label>Slogan</label>
						<input id="slogan_toko" type="text" class="validate">
						</div>
					</div>
					<div class="row">
						<label>Deskripsi</label>
						<textarea id="deskripsi_toko" class="materialize-textarea"></textarea>
					</div>
					<div class="row">
						<label>Lokasi</label>
						<textarea id="lokasi_toko" class="materialize-textarea"></textarea>
					</div>
					<div class="input-field col s12" id="newJKdiv">
					<select id="jkselector-1">
						<option value="" disabled selected></option>
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</select>
					<label>Jasa Kirim 1</label>
					</div>
					<button class="btn waves-effect waves-light" id="addJKButton" onclick="addNewJKItem()">Tambah Jasa Kirim</button>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
   					 <i class="material-icons left">send</i>
  				</button>
			</form>
		</div>
	</body>
</html>