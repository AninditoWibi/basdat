<?php 
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['admin']);
	unset($_SESSION['penjual']);
	session_destroy();
	header("Location: index.php");
?>