<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Pengguna</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="web/src/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>    
<body>
    
    <?php
    include "navbar.php"
    ?>
    <h2 class="teal-text center-align">Pendaftaran Pengguna</h2>
	<div class="row" style="width:500px">
	<?php 
		@session_start();
		$data = [];
		$data['email'] = null;
		$data['nama'] = null;
		$data['notelp'] = null;
		$data['address'] = null;
		$data['datepicker'] = null;
		if(isset($_SESSION['cache']))
		$data = $_SESSION['cache'];
		if(isset($_SESSION['alert'])){
			$msg = null;
			if(isset($_SESSION['alert']['passconfirm']))
				$msg = "Password tidak sama";
			elseif (isset($_SESSION['alert']['doubledata']))
				$msg = "Email sudah terdaftar";
			elseif (isset($_SESSION['alert']['regexfail']))
				$msg = "Nomor Telepon salah. Isi dengan angka";
			echo "<div>".$msg."</div>";
			session_unset('alert');
			session_unset('cache');

		}
	?>
		<form class="col s12" action="registerprocess.php" method="POST">
			<div class="input-field col s12">
				<input type="email" id="email" name="email" placeholder="E-mail" autofocus required class="validate" value="<?=$data['email'] ?>">
                <label for="email" data-error="wrong" data-success="right" >E-mail</label>
			</div>
			<div class="input-field col s12">
				<input type="password" id="password" name="password" placeholder="Password" pattern=".{6,}" autofocus required class="validate" >
                <label for="password">Password</label>
			</div>
			<div class="input-field col s12">
				<input type="password" id="password2" name="password2" placeholder="Ulangi Password" pattern=".{6,}" autofocus required class="validate">
                <label for="password2">Ulangi Password</label>
			</div>
			<div class="input-field col s12">
				<input type="text" id="nama" name="nama" placeholder="Nama Lengkap" autofocus required class="validate" value="<?=$data['nama'] ?>">
                <label for="nama">Nama Lengkap</label>
			</div>
			<div class="input-field col s12">
				<select id="gender" name="gender">
					<option value="L">Laki-Laki</option>
					<option value="P">Perempuan</option>
				</select>
                <label for="gender">Jenis Kelamin</label>
			</div>
			<div class="input-field col s12">
				<input type="text" maxlength="20" id="notelp" name="notelp" placeholder="Nomor Telepon" autofocus required class="validate" value="<?=$data['notelp'] ?>">
                <label for="notelp">Nomor Telepon</label>
			</div>
			<div class="input-field col s12">
				<input type="text" id="address" name="address" placeholder="Alamat" autofocus required class="validate" value="<?=$data['address'] ?>">
                <label for="address">Alamat</label>
			</div>
            <div class="input-field col s12">
              Tanggal lahir
				<input type="text" id="datepicker" name="datepicker" placeholder="" autofocus required class="validate" value="<?=$data['datepicker'] ?>">
                
			</div>
			<input class="btn waves-effect waves-light" type="submit" value="Daftar">
		</form>
	</div>

    
    
    <script type="text/javascript" src="web/src/js/materialize.min.js"></script>
    <script type="text/javascript" src="select.js"></script>
</body>
</html>