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
		<div id="menu" class="col s6 nav-wrapper">
			<ul class="left hide-on-med-and-down">
				<li class="tab"><a href="nuevo-reporte.php">Generar Reporte</a></li>
				<li class="tab"><a href="reportes-admin.php">Listar Reportes</a></li>
				<li class="tab"><a href="chat.php">Chat</a></li>
				<li class="tab active"><a href="#">Preguntas Frecuentes</a></li>
			</ul>
		</div>
		<div id="logo-help" class="col s3">
			<a href="../index.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<h3 class="center-align">Preguntas Frecuentes</h3>
		<nav id="search">
			<div class="nav-wrapper">
		    	<form>
		        	<div class="input-field orange darken-4">
		          		<input id="search" type="search" required>
		          		<label class="label-icon" for="search"><i class="material-icons">search</i></label>
		          		<i class="material-icons">close</i>
		        	</div>
		      	</form>
		    </div>
	    </nav>
	    <div class="progress">
	    	<div class="determinate" style="width: 100%"></div>
	  	</div>
	  	<div id="respuestas">
	  		<div class="pregunta">
	  			<a href=""><h5>¿Lorem ipsum dolor sit amet?</h5></a>
	  			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor...</p>
	  		</div>
	  		<div class="pregunta">
	  			<h5><a href="">¿Lorem ipsum dolor sit amet?</a></h5>
	  			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor...</p>
	  		</div>
	  		<div class="pregunta">
	  			<h5><a href="">¿Lorem ipsum dolor sit amet?</a></h5>
	  			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor...</p>
	  		</div>
	  		<div class="pregunta">
	  			<h5><a href="">¿Lorem ipsum dolor sit amet?</a></h5>
	  			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor...</p>
	  		</div>
	  	</div>
	  	<div id="pagination">
	  		<br>
	  		<ul class="pagination center-align">
			    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			    <li class="active orange darken-4"><a href="#!">1</a></li>
			    <li class="waves-effect"><a href="#!">2</a></li>
			    <li class="waves-effect"><a href="#!">3</a></li>
			    <li class="waves-effect"><a href="#!">4</a></li>
			    <li class="waves-effect"><a href="#!">5</a></li>
			    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
			</ul>
	  	</div>
	</div>
	<footer class="page-footer orange darken-4">
		<div class="footer-copyright">
			<div class="container">
				@ 2017 Copyright
			</div>
		</div>
	</footer>
	<script type="text/javascript" href="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" href="../js/materialize.js"></script>
</body>
</html>