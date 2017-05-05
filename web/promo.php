<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Buat Promo Baru</title>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
		<script src="src/js/script.js"></script>
		<script src="src/js/ajax.js"></script>
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
	<div class="card-panel z-depth-2">
	<h3 class="center-align teal-text">Form Membuat Promo</h3>
		<form class="col s12" name="promoform" method="POST">
			<div class="row">
				<div class="input-field col s6">
					<label>Deskripsi</label>
					<input placeholder="Deskripsi" id="desk_promo" type="text">
				</div>
				<div class="input-field col s6">
					<label>Kode promo</label>
					<input placeholder="Kode promo" id="kode_promo" type="text">
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<label>Periode awal</label>
					<input id="per_awal" placeholder="Klik untuk membuka kalendar" type="date" class="datepicker">
				</div>
				<div class="col s6">
					<label>Periode akhir</label>
					<input id="per_akhir" placeholder="Klik untuk membuka kalendar" type="date" class="datepicker">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<select>
						<option value="" disabled selected></option>
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</select>
					<label>Kategori</label>
				</div>
				<div class="input-field col s6">
					<select>
						<option value="" disabled selected></option>
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</select>
					<label>Subkategori</label>
				</div>
			</div>
			<div class="row center-align">
				<button class="btn waves-effect waves-light" id="promoSubmit" type="submit" name="action">Submit
   					 <i class="material-icons left">send</i>
  				</button>
			</div>
		</form>
	</div>
		
	</div>
	</body>
</html>