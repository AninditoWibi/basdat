<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Buat Promo Baru</title>
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

		$tabelKtg = pg_query($psqlconn, 'SELECT * FROM kategori_utama');
		$tabelSktg = pg_query($psqlconn, 'SELECT * FROM sub_kategori');

		function fillPRForm($elemDS, $elemKP, $elemPS, $elemPE, $elemKU, $elemSK) {
			$isFilledArray = array (
				"isFilledDesc" => "1",
				"isFilledKode" => "1",
				"isFilledAwal" => "1",
				"isFilledAkhir" => "1",
				"isFilledKat" => "1",
				"isFilledSKat" => "1"
				);


			if ($elemDS === "") {
				$isFilledArray["isFilledDesc"] = "0";
			}

			if ($elemKP === "") {
				$isFilledArray["isFilledKode"] = "0";
			}

			if ($elemPS === "") {
				$isFilledArray["isFilledAwal"] = "0";
			}

			if ($elemPE === "") {
				$isFilledArray["isFilledAkhir"] = "0";
			}

			if ($elemKU === "") {
				$isFilledArray["isFilledKat"] = "0";
			}

			if ($elemSK === "") {
				$isFilledArray["isFilledSKat"] = "0";
			}

			return $isFilledArray;
		}

		function validatePRForm($elemPS, $elemPE) {
			$isValidArray = array (
				"isValidDate" => "1"
			);

			$parsedPS = strtotime($elemPS);
			$parsedPE = strtotime($elemPE);

			if ($elemPS > $elemPE) {
				$isFilledArray["isValidDate"] = "0";
			}

			return $isValidArray;
		}

		function insertNewPR($psqlconn, $elemDS, $elemKP, $elemPS, $elemPE, $elemKU, $elemSK) {
			$getQuery = pg_query($psqlconn, 'SELECT * FROM promo ORDER BY ID DESC LIMIT 1;');
			$getLastRow = pg_fetch_row($getQuery);
			$getLastID = $getLastRow[0] + 1;

			$insertString1 = 'INSERT INTO promo VALUES (\''.$getLastID.'\',\''.$elemPS.'\',\''.$elemPE.'\',\''.$elemDS.'\',\''.$elemKP.'\');';
			$insertQuery1 = pg_query($psqlconn, $insertString1);

			$searchString = 'SELECT kode_produk FROM shipped_produk AS sp WHERE sp.kategori = \''.$elemSK.'\';';
			$searchQuery = pg_query($psqlconn, $searchString);

			while ($row = pg_fetch_row($searchQuery)) {
				$catCode = $row[0];
				$insertString2 = 'INSERT INTO promo_produk VALUES (\''.$getLastID.'\',\''.$catCode.'\');';
				$insertQuery2 = pg_query($psqlconn, $insertString2);
			}

			return $insertQuery1;
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$newPRdsc = $_POST['dsc'];
			$newPRcod = $_POST['cod'];
			$newPRstr = $_POST['str'];
			$newPRend = $_POST['end'];
			$newPRktg = $_POST['ktg'];
			$newPRskt = $_POST['skt'];

			$filledArray = fillPRForm($newPRdsc, $newPRcod, $newPRstr, $newPRend, $newPRktg, $newPRskt);
			$validArray = validatePRForm($newPRstr, $newPRend);
			$formResults = array_merge($filledArray, $validArray);

			if (in_array("0", $formResults)) {
				echo '<script> Materialize.toast("Satu atau lebih elemen formulir kosong atau tidak valid!", 6400) </script>';
				if ($formResults["isFilledDesc"] === "0") {
					echo '<script> Materialize.toast("Deskripsi kosong!", 6400) </script>';
				}

				if ($formResults["isFilledKode"] === "0") {
					echo '<script> Materialize.toast("Kode promo kosong!", 6400) </script>';
				}

				if ($formResults["isFilledAwal"] === "0") {
					echo '<script> Materialize.toast("Periode awal kosong!", 6400) </script>';
				}
				if ($formResults["isFilledAkhir"] === "0") {
					echo '<script> Materialize.toast("Periode akhir kosong!", 6400) </script>';
				}

				if ($formResults["isFilledAwal"] === "1" && $formResults["isFilledAkhir"] === "1" && $formResults["isValidDate"] === "0") {
					echo '<script> Materialize.toast("Tanggal periode tidak valid! Tanggal periode akhir tidak boleh lebih dari tanggal periode akhir.", 6400) </script>';
				}

				if ($formResults["isFilledKat"] === "0") {
					echo '<script> Materialize.toast("Kategori kosong!", 6400) </script>';
				}

				if ($formResults["isFilledSKat"] === "0" || $formResults["isFilledSKat"] === "") {
					echo '<script> Materialize.toast("Subkategori kosong!", 6400) </script>';
				}


			} else if (insertNewPR($psqlconn, $newPRdsc, $newPRcod, $newPRstr, $newPRend, $newPRktg, $newPRskt)) {
				echo '<script> Materialize.toast("Promo baru berhasil disimpan!", 6400) </script>';
			}
		}
	?>
	<div class="container">
	<div class="card-panel z-depth-2">
	<h3 class="center-align teal-text">Form Membuat Promo</h3>
		<form class="col s12" name="promoform" method="POST">
			<div class="row">
				<div class="input-field col s6">
					<label>Deskripsi</label>
					<input placeholder="Deskripsi" name="dsc" id="desk_promo" type="text">
				</div>
				<div class="input-field col s6">
					<label>Kode promo</label>
					<input placeholder="Kode promo" name="cod" id="kode_promo" type="text">
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<label>Periode awal</label>
					<input name="str" id="per_awal" placeholder="Klik untuk membuka kalendar" type="date" class="datepicker">
				</div>
				<div class="col s6">
					<label>Periode akhir</label>
					<input name="end" id="per_akhir" placeholder="Klik untuk membuka kalendar" type="date" class="datepicker">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<select name="ktg" id="prselector1">
					<option selected value=""></option>
					<?php
						while ($ktgRow = pg_fetch_row($tabelKtg)) {
					?>
						<option value="<?php echo $ktgRow[0]; ?>"><?php echo $ktgRow[1]; ?></option>
					<?php
						}
					?>
					</select>
					<label>Kategori</label>
				</div>
				<div class="input-field col s6">
					<select name="skt" id="prselector2">
						<option value=""></option>
					</select>
					<label>Subkategori</label>
				</div>
			</div>
			<div class="row center-align">
				<button class="btn waves-effect waves-light" id="promoSubmit" type="submit" name="action">Submit
  				</button>
			</div>
		</form>
	</div>

	</div>
	</body>
</html>
