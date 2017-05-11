<?php 
	session_start();
	include "config.php";
	if(!isset($_SESSION['login']) || !isset($_SESSION['admin'])){

	$findResult = pg_query("SELECT * FROM kategori_utama where kode = '".$_POST['kodekat']."'");
	$findResult = pg_num_rows($findResult);
		  if ($findResult == 0){
			$valuekat = "INSERT INTO kategori_utama(kode,nama) VALUES('".$_POST['kodekat']."','".$_POST['namakat']."');";
			$insert = pg_query($valuekat);

			for ($i=0; $i < count($_POST['kodesub']) ; $i++) { 
				$findResult2 = pg_query("SELECT * FROM sub_kategori where kode = '".$_POST['kodesub'][$i]."'");
				$findResult2 = pg_num_rows($findResult2);
				if($findResult2==0){
					$valuesub = "INSERT INTO sub_kategori(kode,kode_kategori,nama) VALUES('".$_POST['kodesub'][$i]."','".$_POST['kodekat']."','".$_POST['namasub'][$i]."');";
					$insert = pg_query($valuesub);
				} else {
					$_SESSION['fail'] = true;
					header("Location: addkategori.php");
				}
			}
		$_SESSION['success'] = true;
		header("Location: addkategori.php");
		} else{
			$_SESSION['fail'] = true;
			header("Location: addkategori.php");
		}
	}
 ?>