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
      <link rel="stylesheet" type="text/css" href="../css/materializeIcons.css" media="screen,projection">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<nav class="orange darken-4 row">
		<div id="logo-nova" class="col s3">
			<img src="../img/nova.jpeg"><h5>Nova Universitas</h5>
		</div>
		<div id="menu" class="col s6 nav-wrapper">
			<ul class="left hide-on-med-and-down">
				<li class="tab active"><a href="#">Generar Reporte</a></li>
				<li class="tab"><a href="reportes-admin.php">Listar Reportes</a></li>
				<li class="tab"><a href="chat.php">Chat</a></li>
				<li class="tab"><a href="preguntas-frecuentes.php">Preguntas Frecuentes</a></li>
			</ul>
		</div>
		<div id="logo-help" class="col s3">
			<a href="logout.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<h4 class="center-align">Generar Reporte</h4>
		</div>		  
		<div class="row">
			<form class="col s6 offset-s3">
				<div class="row">
					<div class="col s6">
						<label>Asunto</label>
						<input type="text" name="asunto" required placeholder="Asunto">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s10" >
						<select>
							<option value="" disabled selected>Seleccione una opcion</option>
							<option value="1">Reporte de Hardware</option>
							<option value="2"></option>
							<option value="3"></option>
							<option value="4"></option>
							<option value="5"></option>
							<option value="6"></option>
						</select>
						<label>Tipo de problema</label>
					</div>
				</div>
				<div class="row">
					<div class="col s10 offset-s1" id="subProblem"></div>
				</div>
				<div class="row">
					<div class="col s11">
						<label>Descripción:</label>
						<textarea></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col s10" id="moreInformation"></div>
				</div>
				<div class="row">
					<div class="col s4 offset-s4">
						<input class="btn" type="submit" name="" value="Enviar">
					</div>
				</div>
			</form>
		</div>            
	</div>
	<footer class="page-footer orange darken-4">
		<div class="footer-copyright">
			<div class="container">
				@ 2017 Copyright
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>


	<script type="text/javascript">

		$(document).ready(function() {
		    $('select').material_select();
		});

	</script>


</body>
</html>