<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Buat Jasa Kirim Baru</title>
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
				<h2>FORM MEMBUAT JASA KIRIM</h2>
				<form class="col s12" name="jkform" method="POST" onsubmit="checkOrderForm()">
				<div class="row">
					<div class="input-field col s6">
						<input placeholder="Nama" id="nama_jk" type="text">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input placeholder="Lama kirim" id="lama_jk" type="text">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input placeholder="Tarif" id="tarif_jk" type="text">
					</div>
				</div>
  				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
   					 <i class="material-icons left">send</i>
  				</button>
				</form>
		</div>
	</body>
</html>