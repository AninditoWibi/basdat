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
		<h2>FORM MEMBUAT PROMO</h2>
		<form class="col s12" name="jkform" method="POST">
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="Deskripsi" id="desk_promo" type="text">
				</div>
				</div>
				<div class="row">
				<label>Periode awal</label>
					<input placeholder="Klik untuk membuka kalendar" type="date" class="datepicker">
					
				</div>
				<div class="row">
				<label>Periode akhir</label>
					<input placeholder="Klik untuk membuka kalendar" type="date" class="datepicker">
					
				</div>
				<div class="input-field col s6">
					<label>Kode promo</label>
					<input placeholder="Kode promo" id="kode_promo" type="text">
				</div>
				<div class="input-field col s12">
					<select>
						<option value="" disabled selected>Choose your option</option>
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</select>
					<label>Kategori</label>
				</div>
				<div class="input-field col s12">
					<select>
						<option value="" disabled selected>Choose your option</option>
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</select>
					<label>Subkategori</label>
				</div>
			<a class="waves-effect waves-light btn" id="kirimSubmit">Submit</a>
		</form>
	</div>
	</body>
</html>