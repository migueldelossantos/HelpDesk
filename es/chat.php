<!DOCTYPE html>
<html lang="es">
<head>
	<title>Help Desk</title>
	<meta charset="utf-8">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
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
				<li class="tab active"><a href="#">Chat</a></li>
				<li class="tab"><a href="preguntas-frecuentes.php">Preguntas Frecuentes</a></li>
			</ul>
		</div>
		<div id="logo-help" class="col s3">
			<a href="../index.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<div class="row">
	    	<h4 class="center-align">Chat</h4>
	  	</div>  	
		    <div class="row">
		      	<div class="col s8 offset-s1">				
					<div class="col s12 offset-s0 card-panel deep-orange accent-2">
						<h6>Mensajes:</h6>
		              	<div id="area" class="col s12 offset-s0 card-panel">
		              		<i class="small material-icons">perm_identity</i> >> Hola
		              		<div class="right-align">
		              			Hola << <i class="small material-icons">perm_identity</i>
		              		</div>
		              	</div>
	             	</div>
	            </div>		 
		      	<div class="col s3">
			        <div class="col s12 offset-s0 card-panel deep-orange accent-2">
				        <h6>Usuarios</h6>
		              	<div class="col s12 offset-s0 card-panel">
			              	<i class="material-icons">perm_identity</i>Francisco<br>
			              	<i class="material-icons">perm_identity</i>Julio<br>
			              	<i class="material-icons">perm_identity</i>Eddy<br>
			              	<i class="material-icons">perm_identity</i>Nayely<br>
			              	<i class="material-icons">perm_identity</i>Victor<br>
			              	<i class="material-icons">perm_identity</i>Alejandro<br>
			              	<i class="material-icons">perm_identity</i>Miguel<br>
			              	<i class="material-icons">perm_identity</i>Celina<br>
	              		</div>
	              	</div>
		    	</div>
		        <div class="col s8 offset-s1 card-panel deep-orange accent-2">   
		        	<h6>Introducir mensaje:</h6>	
		        	<div class="col s2">
		        		<a class="btn-floating btn-large waves-effect waves-light grey"><i class="material-icons">loyalty</i></a>
		        	</div>
	             	<div class="col s8 offset-s0 white">
	              		<input id="mensaje" type="text" name="">	
	              	</div>
	              	<div class="col s2 offset-s0">
		              	 <a class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">input</i></a>
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
	 <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
	 <script type="text/javascript" src="../js/materialize.min.js"></script>

</body>
</html>