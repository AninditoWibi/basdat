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
	@session_start();
		// lakukan integrasi sql via php
		$servername = "localhost";
		$username = "postgres";
		$password = "";
		$dbname = "aninditoizdihardian";
		$portno = "5432";

		$conn_string = "host=".$servername." port=".$portno." dbname=".$dbname." user=".$username." password=".$password;

		$psqlconn = pg_connect($conn_string);
		$result = pg_query($psqlconn, 'SET search_path TO tokokeren');

		if (!$result) {
			die('Failed to set schema:'.$psqlconn->errorMsg());
		}

		function validateULForm($elemRate, $elemUlas) {
			$isValidArray = array (
				"isValidRating" => "1",
				"isValidUlas" => "1"
			);

			$rateCheck = is_numeric($elemRate);

			if ($rateCheck === false) {
				$isValidArray["isValidRating"] = "0";
			}

			if ($elemUlas === "") {
				$isValidArray["isValidUlas"] = "0";
			}

			return $isValidArray;
		}

		function insertNewUL($psqlconn, $elemEmail, $elemKode, $elemRate, $elemUlas) {
			$currDate = date("Y-m-d");
			$insertString = 'INSERT INTO ulasan VALUES (\''.$email.'\',\''.$elemKode.'\','.$currDate.'\','.$elemRate.'\','.$elemUlas.');';
			$insertQuery = pg_query($psqlconn, $insertString);
			return $insertQuery;
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$email = $_SESSION['login'];
			$newULkode = $_POST['kode_produk'];
			$newULrate = $_POST['ulas_rating'];
			$newULulas = $_POST['ulas_isi'];

			$formResults = validateULForm($newULrate, $newULulas);

			if (in_array("0", $formResults)) {
				echo '<script> Materialize.toast("Satu atau lebih elemen formulir kosong atau tidak valid!", 6400) </script>';

				if ($formResults["isValidRating"] === "0") {
					echo '<script> Materialize.toast("Rating tidak valid!", 6400) </script>';
				}

				if ($formResults["isValidUlas"] === "0") {
					echo '<script> Materialize.toast("Ulasan kosong!", 6400) </script>';
				}
			} else if (insertNewUL($psqlconn, $email, $newULkode, $newULrate, $newULulas)) {
				echo '<script> Materialize.toast("Ulasan berhasil disimpan!", 6400) </script>';
				header("Location: index.php");
			}

			 if(!isset($_SESSION['login'])){
    	header("Location: ../login.php");
	}
    } else {
	?>
		<div class="container">
		<div class="card-panel z-depth-2">
		<h3 class="center-align teal-text">Form Membuat Ulasan</h3>
				<form class="col s12" name="jkform" method="POST">
					<div class="row">
						<div class="input-field col s6">
						<p id="ulas_kode" name="ulas_kode">
							<?php
								$kode = $_POST['kode_produk'];
								echo "Kode Produk: ".$kode;
							?>
						</p>
						</div>
					</div>
					<div class="row">
						<label>Rating</label>
						<p class="range-field">
							<input type="range" name="ulas_rating" id="ulas_rating" min="1" max="5" />
						</p>
					</div>
					<div class="row">
						<label>Komentar</label>
						<textarea id="ulas_isi" name="ulas_isi" class="materialize-textarea"></textarea>
					</div>
					<div class="row center-align">
						<button class="btn waves-effect waves-light" id="ulasSubmit" type="submit" name="action">Submit
   							 <i class="material-icons left">send</i>
  						</button>
					</div>
				</form>
		</div>
		</div>

	<?php } ?>
	</body>
</html>
