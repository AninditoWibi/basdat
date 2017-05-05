<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Pengguna</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
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

	<div class="row" style="width:500px">
		<form class="col s12">
			<div class="input-field col s12">
				<input type="email" id="email" name="email" placeholder="E-mail" autofocus required class="validate">
                <label for="email" data-error="wrong" data-success="right">E-mail</label>
			</div>
			<div class="input-field col s12">
				<input type="password" id="password" name="password" placeholder="Password" pattern=".{6,}" autofocus required class="validate">
                <label for="password">Password</label>
			</div>
			<div class="input-field col s12">
				<input type="password" id="password2" name="password2" placeholder="Ulangi Password" pattern=".{6,}" autofocus required class="validate">
                <label for="password2">Ulangi Password</label>
			</div>
			<div class="input-field col s12">
				<input type="text" id="nama" name="nama" placeholder="Nama Lengkap" autofocus required class="validate">
                <label for="nama">Nama Lengkap</label>
			</div>
			<div class="input-field col s12">
				<select id="gender">
                    <option value"" disabled selected>Pilih salah satu</option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
                <label for="gender">Jenis Kelamin</label>
			</div>
			<div class="input-field col s12">
				<input type="number" id="notelp" name="notelp" placeholder="Nomor Telepon" autofocus required pattern=".{20,}" class="validate">
                <label for="notelp">Nomor Telepon</label>
			</div>
			<div class="input-field col s12">
				<input type="text" id="address" name="address" placeholder="Alamat" autofocus required class="validate">
                <label for="address">Alamat</label>
			</div>
            <div class="input-field col s12">
               Tanggal lahir
				<input type="text" id="datepicker" name="datepicker" placeholder="" autofocus required class="validate">
                
			</div>
			<input class="btn waves-effect waves-light" type="submit" value="Daftar">
		</form>
	</div>

    
    
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="select.js"></script>
</body>
</html>