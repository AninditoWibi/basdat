<?php
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

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$formAction = $_POST['action'];
			if ($formAction === "getSktg") {
				$ktgPick = $_POST['ktgPick'];
				$query = pg_query($psqlconn, 'SELECT * FROM sub_kategori WHERE kode_kategori = \''.$ktgPick.'\';');
				while ($row = pg_fetch_row($query)) {
					echo $row[2];
					echo "|";
				}
			}
		}
?>