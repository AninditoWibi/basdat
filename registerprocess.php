<?php
	session_start();
	include "config.php";
	$data = [];
	$data['email'] = $_POST['email'];
	$data['password'] = $_POST['password'];
	$data['nama'] = $_POST['nama'];
	$data['gender'] = $_POST['gender'];
	$data['datepicker'] = date("Y-m-d", strtotime($_POST['datepicker']));
	$data['notelp'] = $_POST['notelp'];
	$data['address'] = $_POST['address'];

	if($_POST['password'] == $_POST['password2']){
		$findResult = pg_query( 'SELECT * FROM pengguna WHERE email =\''.$data['email'].'\'');
			$findResult = pg_num_rows($findResult);
		  if ($findResult == 0){
		  	$value = 'INSERT INTO pengguna(email, password, nama, jenis_kelamin, tgl_lahir, no_telp, alamat) VALUES (\''.$data['email'].'\',\''.$data['password'].'\',\''.$data['nama'].'\',\''.$data['gender'].'\',\''.$data['datepicker'].'\',\''.$data['notelp'].'\',\''.$data['address'].'\');';
			$insert = pg_query($psql_conn,$value);
			$value2 ='INSERT INTO pelanggan(email, is_penjual, nilai_reputasi, poin) VALUES (\''.$data['email'].'\',false,0,0);';
			$insert2 = pg_query($psql_conn, $value2);
			$_SESSION['login'] = $data['email'];
			header("Location: registersuccess.php");
		  } else {
		  	$_SESSION['alert']['doubledata'] = true;
		  	header("Location: register.php");
		  }
		
	}
	else{
		$_SESSION['alert']['passconfirm'] = true;
		$_SESSION['cache'] = $data;
		header("Location: register.php");
	}
?>