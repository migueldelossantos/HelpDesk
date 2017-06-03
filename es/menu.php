<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Help Desk</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/materializeIcons.css" media="screen,projection">
</head>
<body>
	<nav class="orange darken-4 row">
		<div id="logo-nova" class="col s3">
			<img src="../img/nova.jpeg"><h5>Nova Universitas</h5>
		</div>
		<div id="menu" class="col s6">
			<h5>Menú</h5>
		</div>
		<div id="logo-help" class="col s3">
			<a href="logout.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		
	 <div class="row">
		<div id="cuadro" class="row col s12">
			<div class="row s12">
				<a href="preguntas-frecuentes.php">
					<div class="center-align yellow darken-4 button-menu">
						<img src="../img/interes.png"><h5>Pregutas Frecuentes</h5>
					</div>
				</a>
				<a href="chat.php">
					<div class="center-align yellow darken-4 button-menu">
						<img src="../img/Chat.png"><h5>Chat</h5>
					</div>
				</a>
			</div>
			<div class="row s12">
				<a href="nuevo-reporte.php">
					<div class="center-align yellow darken-4 button-menu">
						<img src="../img/AltaReporte.png"><h5>Generar Reporte Reporte</h5>
					</div>
				</a>
				<a href="reportes-admin.php">
					<div class="center-align yellow darken-4 button-menu">
						<img src="../img/report.png"><h5>Lista de Reportes</h5>
					</div>
				</a>
			</div>
		
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