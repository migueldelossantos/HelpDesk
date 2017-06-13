<?php
	session_start();
	if(isset($_SESSION['user'])){
		header("Location: menu.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Help Desk</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" type="text/css" href="../css/materializeIcons.css" media="screen,projection">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<nav class="orange darken-4 row">
		<div id="logo-nova" class="col s3">
			<img src="../img/nova.jpeg"><h5>Nova Universitas</h5>
		</div>
		<div id="menu" class="col s6">
			<h5>Iniciar Sesión</h5>
		</div>
		<div id="logo-help" class="col s3">
			<img src="../img/Help.png"><h5>Help Desk</h5>
		</div>
	</nav>
	<div class="container">
		<div id="idiomas" class="row">
			<a href="#"><img src="../img/spanish.png"></a>
			<a href="../en/index.php"><img src="../img/us.png"></a>
		</div>
		<div class="row">
			<div class="col s3 section left align">
				<h6>Plataformas Virtuales</h6>					
				<a href=""><i class="tiny material-icons">perm_identity</i> Kabl</a>
				<br>
				<a href=""><i class="tiny material-icons">perm_identity</i> Aula Virtual</a>
			</div>
			<div class="col s4 offset-s1">
				<form id="acceso" class="grey lighten-4" method="post">
					<div class="">
						<label>Usuario: </label>
						<input type="text" id="user" placeholder="Usuario" required>
					</div>
					<div class="">
						<label>Contraseña: </label>
						<input type="password"  id="password" placeholder="Contraseña" required>
					</div>
					<div class="center-align">
						<input type="submit" class="btn" value="Entrar">
					</div>
				</form>	
			</div>
			<div class="col s3 offset-s1 section">
				<h5>Anuncio</h5>
				<ul>
					<li></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col s4 section">
				<i class="medium material-icons">call</i>
				<p>Departamento de Servicios Escolares</p>
				<p>Teléfono:</p>
				<p>(951) 501 72 00</p>
				<p>(951) 501 72 07</p>
				<p>(951) 501 72 08</p>
				<p>Correo electrónico:</p>
				<p>escolares@jacinto.novauniversitas.edu.mx</p>
			</div>
			<div class="col s4 section">
				<i class="medium material-icons">call</i>
				<p>Jefe del Departamento de Red</p>
				<p>C. Jorge Luis Reyes Martínez</p>
				<p>Teléfono:</p>
				<p>(55) 4623 7562</p>
				<p>Correo electrónico:</p>
				<p>jorge@jacinto.novauniversitas.edu.mx</p>
			</div>
			<div class="col s4 section">
				<i class="medium material-icons">call</i>
				<p>Jefe del Departamento de Multimedios</p>
				<p>C. Miguel Angel García Reyes</p>
				<p>correo electrónico:</p>
				<p>mgarcia@jacinto.novauniversitas.edu.mx</p>
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
	<script type="text/javascript">


		$('#acceso').on("submit",function(e){			
			//Evitar que se envie por default
			e.preventDefault();

			$.ajax({
				url: "login.php",
				data: "user="+$('#user')[0].value+
					"&password="+$('#password')[0].value,
				type: 'post'
			}).done(function(res){
				if(res == "ok"){
					window.location = "menu.php";
				}else{
					alert("Usuario o Contraseña Incorrectos");
				}
			});
		});
	</script>
</body>
</html>
