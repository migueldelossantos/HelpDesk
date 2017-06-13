<?php

	$mysqli=new mysqli("localhost","root","","help"); 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}


	session_start();

	//$_SESSION['user'] = "Jorge";


  	if(!isset($_SESSION['user'])){
  		header('Location: ../index.php');
  	}

  	$user = $_SESSION['user'];
  	//echo $user;


  	$query = "SELECT * FROM users WHERE user = '".$user."';";
	$consulta = $mysqli->query($query);
	$row = $consulta->fetch_assoc();
	$privilegio = $row['privilege'];

   

  	
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
			<a href="logout.php"><div id="session">Cerrar Sesión <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<div class="right-align">
	      	<div class="chip">
		    	<img src="../img/usr.png" alt="Contact Person">
		   		<?php echo $row['name']; ?>
		  	</div>
	  	</div>

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
				<?php if($privilegio == 1 || $privilegio == 2){?>

				<a href="nuevo-reporte.php">
					<div class="center-align yellow darken-4 button-menu">
						<img src="../img/AltaReporte.png"><h5>Nuevo Reporte</h5>
					</div>
				</a>
				<?php } ?>

				<?php if($privilegio == 0){?>

				<a href="usuarios.php">
					<div class="center-align yellow darken-4 button-menu">
						<img src="../img/user-group-icon.png"><h5>Usuarios</h5>
					</div>
				</a>
				<?php } ?>

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