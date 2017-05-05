<!DOCTYPE html>
<html>
<head>
	<title>Masuk</title>
     <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
</head>
<body>

	<div class="row" style="width: 500px">
		<form class="col s12">
			<div class="input-field col s12">
				<input type="email" id="email" name="email" placeholder="E-mail" autofocus required class="validate">
                <label for="email" data-error="wrong" data-success="right">E-mail</label>
			</div>
			<div class="input-field col s12">
				<input type="password" id="password" name="password" placeholder="Password" autofocus required class="validate" pattern=".{6,}">
                <label for="password" >Password</label>
			</div>
			<input class="btn waves-effect waves-light" type="submit" value="Submit">
		</form>
	</div>
    
    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>