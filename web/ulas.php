<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Buat Ulasan Baru</title>
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
		<div class="card-panel z-depth-2">
		<h3 class="center-align teal-text">Form Membuat Ulasan</h3>
				<form class="col s12" name="jkform" method="POST">
					<div class="row">
						<div class="input-field col s6">
						<p id="ulas_kode">Kode Produk: PLACEHOLDER</p>
						</div>
					</div>
					<div class="row">
						<label>Rating</label>
						<p class="range-field">
							<input type="range" id="ulas_rating" min="1" max="5" />
						</p>
					</div>
					<div class="row">
						<label>Komentar</label>
						<textarea id="ulas_isi" class="materialize-textarea"></textarea>
					</div>
					<div class="row center-align">
						<button class="btn waves-effect waves-light" id="ulasSubmit" type="submit" name="action">Submit
   							 <i class="material-icons left">send</i>
  						</button>
					</div>
				</form>
		</div>
		</div>
	</body>
</html>