<!DOCTYPE html>
<html lang="en">
<head>
	<title>Help Desk</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav class="orange darken-4 row">
		<div id="logo-nova" class="col s3">
			<img src="../img/nova.jpeg"><h5>Nova Universitas</h5>
		</div>
		<div id="menu" class="col s6">
			<h5>LOGIN</h5>
		</div>
		<div id="logo-help" class="col s3">
			<img src="../img/Help.png"><h5>Help Desk</h5>
		</div>
	</nav>
	<div class="container orange lighten-4">
		<div id="idiomas" class="row">
			<a href="../es/index.php"><img src="../img/spanish.png"></a>
			<a href="#"><img src="../img/us.png"></a>
		</div>
		<div class="row">
			<div class="col s3 section">
				<h5>Lorem ipsum</h5>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
			</div>
			<div class="col s4 offset-s1">
				<form id="login" method="post" action="menu.php" class="grey lighten-4">
					<div class="">
						<label>User: </label>
						<input type="text" name="user" placeholder="User" required="">
					</div>
					<div class="">
						<label>Password: </label>
						<input type="password" name="password" placeholder="Password" required="">
					</div>
					<div class="center-align">
						<input type="submit" class="waves-effect waves-light btn  grey darken-1" value="Login">
					</div>
				</form>	
			</div>
			<div class="col s3 offset-s1 section">
				<h5>Lorem ipsum</h5>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
			</div>
		</div>
		<div class="row">
			<div class="col s4 section">
				<i class="medium material-icons">call</i>
				<p>Vice-Rectoría de Relaciones y Recursos</p>
				<p>Teléfono:</p>
				<p>(55) 4623 7562</p>
				<p>Fax:</p>
				<p>(55) 5575 1365</p>
			</div>
			<div class="col s4 section">
				<i class="medium material-icons">call</i>
				<p>Vice-Rectoría de Relaciones y Recursos</p>
				<p>Teléfono:</p>
				<p>(55) 4623 7562</p>
				<p>Fax:</p>
				<p>(55) 5575 1365</p>
			</div>
			<div class="col s4 section">
				<i class="medium material-icons">call</i>
				<p>Vice-Rectoría de Relaciones y Recursos</p>
				<p>Teléfono:</p>
				<p>(55) 4623 7562</p>
				<p>Fax:</p>
				<p>(55) 5575 1365</p>
			</div>
		</div>
	</div>
	<footer class="page-footer orange darken-4">
		<div class="footer-copyright">
			<div class="container">
				@ 2017 Copyright
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.js"></script>
</body>
</html>
