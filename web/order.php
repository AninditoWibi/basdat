<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buat Jasa Kirim Baru</title>
	<script type="text/javascript" src="src/js/jquery-3.2.1.min.js"></script>
	<script src="src/js/materialize.min.js"></script>
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
	@session_start();
	// lakukan integrasi sql via php
	$servername = "localhost";
	$username = "muhammad.fadhillah";
	$password = "";
	$dbname = "muhammad.fadhillah";
	$portno = "5432";

	$conn_string = "host=".$servername." port=".$portno." dbname=".$dbname." user=".$username." password=".$password;

	$psqlconn = pg_connect($conn_string);
	$result = pg_query($psqlconn, 'SET search_path TO tokokeren');

	if (!$result) {
		die('Failed to set schema:'.$psqlconn->errorMsg());
	}

	function fillJKForm($elemNama, $elemLama, $elemTarif) {
		$isFilledArray = array (
			"isFilledNama" => "1",
			"isFilledLama" => "1",
			"isFilledTarif" => "1"
		);


		if ($elemNama === "") {
			$isFilledArray["isFilledNama"] = "0";
		}

		if ($elemLama === "") {
			$isFilledArray["isFilledLama"] = "0";
		}

		if ($elemTarif === "") {
			$isFilledArray["isFilledTarif"] = "0";
		}

		return $isFilledArray;
	}

	function validateJKForm($psqlconn, $elemNama, $elemLama, $elemTarif) {
		$isValidArray = array (
			"isValidNama" => "1",
			"isValidLama" => "1",
			"isValidTarif" => "1"
		);

		$lamaCheck = is_numeric($elemLama);
		$tarifCheck = is_numeric($elemTarif);

		if ($lamaCheck === false || $elemLama <= 0) {
			$isValidArray["isValidLama"] = "0";
		}

		if ($tarifCheck === false || $elemTarif <= 0) {
			$isValidArray["isValidTarif"] = "0";
		}

		$tmp = pg_query($psqlconn, 'SELECT * FROM jasa_kirim AS jk WHERE jk.nama = \''.$elemNama.'\';');
		$numRow = pg_num_rows($tmp);
		if ($numRow != 0) {
			$isValidArray["isValidNama"] = "0";
		}

		return $isValidArray;
	}

	function insertNewJK($psqlconn, $elemNama, $elemLama, $elemTarif) {
		$insertString = 'INSERT INTO jasa_kirim VALUES (\''.$elemNama.'\',\''.$elemLama.'\','.$elemTarif.');';
		$insertQuery = pg_query($psqlconn, $insertString);
		return $insertQuery;
	}

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$newJKnama = $_POST['nama_jk'];
		$newJKlamakirim = $_POST['lama_jk'];
		$newJKtarif = $_POST['tarif_jk'];

		$filledArray = fillJKForm($newJKnama, $newJKlamakirim, $newJKtarif);
		$validArray = validateJKForm($psqlconn, $newJKnama, $newJKlamakirim, $newJKtarif);
		$formResults = array_merge($filledArray, $validArray);

		if (in_array("0", $formResults)) {
			echo '<script> Materialize.toast("Satu atau lebih elemen formulir kosong atau tidak valid!", 6400) </script>';
			if ($formResults["isFilledNama"] === "0") {
				echo '<script> Materialize.toast("Nama kosong!", 6400) </script>';
			} else if ($formResults["isFilledNama"] === "1" && $formResults["isValidNama"] === "0") {
				echo '<script> Materialize.toast("Nama sudah ada di daftar jasa kirim!", 6400) </script>';
			} else {
				//do nothing
			}

			if ($formResults["isFilledLama"] === "0") {
				echo '<script> Materialize.toast("Lama kirim kosong!", 6400) </script>';
			} else if ($formResults["isFilledLama"] === "1" && $formResults["isValidLama"] === "0") {
				echo '<script> Materialize.toast("Lama kirim tidak valid! Lama kirim harus berupa angka lebih besar dari 0.", 6400) </script>';
			} else {
				//do nothing
			}

			if ($formResults["isFilledTarif"] === "0") {
				echo '<script> Materialize.toast("Tarif kosong!", 6400) </script>';
			} else if ($formResults["isFilledTarif"] === "1" && $formResults["isValidTarif"] === "0") {
				echo '<script> Materialize.toast("Tarif tidak valid! Tarif harus berupa angka lebih besar dari 0.", 6400) </script>';
			} else {
				//do nothing
			}
		} else if (insertNewJK($psqlconn, $newJKnama, $newJKlamakirim, $newJKtarif)) {
			echo '<script> Materialize.toast("Jasa kirim baru berhasil disimpan!", 6400) </script>';
			header("Location: index.php");
		}
	}

	if(!isset($_SESSION['admin'])){
		header("Location: ../login.php");
	} else {

		?>
		<div class="container">
			<div class="card-panel z-depth-2">
				<h3 class="center-align teal-text">Form Membuat Jasa Kirim</h3>
				<form class="col s12" name="jkform" method="POST">
					<div class="row">
						<div class="input-field">
							<label>Nama</label>
							<input placeholder="Nama" id="nama_jk" name="nama_jk" type="text">
						</div>
					</div>
					<div class="row">
						<div class="input-field">
							<label>Lama kirim</label>
							<input placeholder="Lama kirim" name="lama_jk" id="lama_jk" type="text">
						</div>
					</div>
					<div class="row">
						<div class="input-field">
							<label>Tarif</label>
							<input placeholder="Tarif" name="tarif_jk" id="tarif_jk" type="text">
						</div>
					</div>
					<div class="row center-align">
						<button class="btn waves-effect waves-light" id="jkSubmit" type="submit" name="action">Submit
						</button>
					</div>

				</form>
			</div>

		</div>

		<?php } ?>
	</body>
	</html>
