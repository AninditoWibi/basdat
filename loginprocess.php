<?php 
	session_start();
	include "config.php";
	if(!isset($_SESSION['login']) || !isset($_SESSION['admin'])) {
		if(isset($_POST['email']) && isset($_POST['password'])){
			$findResult = pg_query("SELECT * FROM pengguna where email= '".$_POST['email']."' and password= '".$_POST['password']."'");
			$findResultrow = pg_num_rows($findResult);
		  	if ($findResultrow > 0){
		  		$findResult2 =  pg_query("SELECT * FROM pelanggan where email= '".$_POST['email']."'");
		  		$findResult2row = pg_num_rows($findResult2);
		  		if($findResult2row == 0){
		  			$_SESSION['admin'] = $_POST['email'];
		  			header("Location: index.php");
		  		} else{

		  			$_SESSION['login'] = $_POST['email'];
		  			$user = pg_fetch_array($findResult2);
		  			$_SESSION['penjual'] = $user['is_penjual'];
		  			
		  			header("Location: index.php");
		  		}
			} else {
				$_SESSION['wrong'] = true;
				header("Location: login.php");
			}
			
		} else {
			$_SESSION['wrong'] = true;
			header("Location: index.php");
		}
	}
 ?>