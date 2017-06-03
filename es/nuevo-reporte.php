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
            <div class="col s12 offset-s0">
              <div class="col s8 offset-s2 card-panel" id="form">
              	<div class="row">
              	  <div class="input-field col s8 offset-2">
				    <select onchange="sele(this)">
				      <option value="1" selected>Plataforma Virtual</option>
				      <option value="2">Solicitud de Equipo</option>
				      <option value="3">Hardware Dañado</option>
				      <option value="4">Permiso de Instalación</option>
				      <option value="5">Solicitud De Software</option>
				      <option value="6">Restriccion de Red</option>
				    </select>
				    <label>Tipo</label>
				  </div>
				</div>


				<div id="1" style='display:block;'>
				  <div class="input-field col s8 offset-2">
				    <select>
				      <option value="" disabled selected>Selecciona tu Opcion</option>
				      <option value="1">Acceso Denegado al aula</option>
				      <option value="2">Reestablecer Contraseña</option>
				      <option value="3">Acceso a Curso</option>
				      <option value="3">Solicitar un Anuncio</option>
				    </select>
				    <label></label>
				  </div>
				</div>

				<div id="2" style='display:none;'>
				  <div class="input-field col s8 offset-2">
				    <select>
				      <option value="" disabled selected>Selecciona tu Opcion</option>
				      <option value="1">Cañon</option>
				      <option value="2">Bocinas</option>
				      <option value="3">Pantallas</option>
				      <option value="3">Cable de red</option>
				      <option value="3">Cable HDMI</option>
				      <option value="3">Router</option>
				      <option value="3">Swich</option>
				    </select>
				    <label>Equipo</label>
				  </div>
				</div>

				<div id="3" style='display:none;'>
				  <div class="input-field col s8 offset-2">
				    <select>
				      <option value="" disabled selected>Selecciona tu Opcion</option>
				      <option value="1">Pizarró</option>
				      <option value="2">Cañon</option>
				      <option value="3">CPU</option>
				      <option value="3">Pantalla</option>
				      <option value="3">Teclado</option>
				      <option value="3">Mouse</option>
				      <option value="3">Regulador</option>
				      <option value="3">Audio de Transmicion</option>
				      <option value="3">Video de Transmicion</option>
				      <option value="3">Contacto de Corriente</option>
				    </select>
				    <label>Equipo</label>
				  </div>
				</div>

				<div id="6" style='display:none;'>
				  <div class="input-field col s8 offset-2">
				    <select>
				      <option value="" disabled selected>Selecciona tu Opcion</option>
				      <option value="1">Acceso a Internet</option>
				      <option value="2">Acceso a Pagínas</option>
				    </select>
				    <label></label>
				  </div>
				</div>


				<div class="row">
				    <div class="input-field col s8">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Asunto</label>
			        </div>
				</div>

				<div class="row">
				    <div class="input-field col s8">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Detalles</label>
			        </div>
				</div>

				<div id="uno" style='display:block;'>
					<div class="col s6">
					Fecha:
					 	<input type="date" class="datepicker">
					 </div>
				</div>

				<div id="dos" style='display:none;'>
					<div class="row">
						<div class="col s6">
						Fecha de Uso:
						 	<input type="date" class="datepicker">
						 </div>

						<div class="input-field col s6">
				          <input id="last_name" type="text" class="validate">
				          <label for="last_name">Hora de Uso</label>
				        </div>
			        </div>	
			        <div class="row">
						 <div class="col s6">
						Fecha de Entrega:
						 	<input type="date" class="datepicker">
						 </div>

				        <div class="input-field col s6">
				          <input id="last_name" type="text" class="validate">
				          <label for="last_name">Hora de Entrega</label>
				        </div>
			        </div>
				</div>

				<div id="tres" style='display:none;'>

			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Aula o Departamento</label>
			        </div>

			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Numero de Inventario</label>
			        </div>

				</div>

				<div id="cuatro" style='display:none;'>

					<div class="col s6">
					Fecha:
					 	<input type="date" class="datepicker">
					</div>

			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Nombre del Software</label>
			        </div>

			       	<div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Version del Software</label>
			        </div>

					<div class="col s6">
					Fecha de Instalacion:
					 	<input type="date" class="datepicker">
					 </div>

			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Aula o Departamento</label>
			        </div>

			       	<div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Licenciatura</label>
			        </div>

			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Numero de Equipo</label>
			        </div>
				</div>

				<div id="cinco" style='display:none;'>
					<div class="col s6">
					Fecha:
					 	<input type="date" class="datepicker">
					</div>

					<div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Nombre de Software</label>
			        </div>

			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Vesion del Software</label>
			        </div>

			       	<div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Licenciamiento</label>
			        </div>

			        <div class="col s6">
					Fecha de Uso:
					 	<input type="date" class="datepicker">
					</div>

				</div>

				<div id="seis" style='display:none;'>
					<div class="col s6">
					Fecha:
					 	<input type="date" class="datepicker">
					</div>
				</div>
			


				<div class="row">
					  <div class="input-field col s8">
					    <select>
					      <option value="" disabled selected>Seleccionar Opcion</option>
					      <option value="1">Alto</option>
					      <option value="2">Medio</option>
					      <option value="3">Bajo</option>
					    </select>
					    <label>Prioridad</label>
					  </div>
				</div>


				<div class="center-align">
					<a class="waves-effect waves-light btn  grey darken-1">Enviar</a>
				</div>
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


	<script type="text/javascript">

		  $(document).ready(function() {
		    $('select').material_select();
		  });

		    $('.datepicker').pickadate({
			    selectMonths: true, // Creates a dropdown to control month
			    selectYears: 15 // Creates a dropdown of 15 years to control year
			});


		  function sele(id){
		  	if(id.value =="1"){
		  		document.getElementById('1').style.display = 'block';
		  		document.getElementById('2').style.display = 'none';
		  		document.getElementById('3').style.display = 'none';
		  		document.getElementById('6').style.display = 'none';

		  		document.getElementById('uno').style.display = 'block';

		  		document.getElementById('dos').style.display = 'none';
		  		document.getElementById('tres').style.display = 'none';
		  		document.getElementById('cuatro').style.display = 'none';
		  		document.getElementById('cinco').style.display = 'none';
		  		document.getElementById('seis').style.display = 'none';


		  	}else if(id.value =="2"){
		  		document.getElementById('1').style.display = 'none';
		  		document.getElementById('2').style.display = 'block';
		  		document.getElementById('3').style.display = 'none';
		  		document.getElementById('6').style.display = 'none';

		  		document.getElementById('dos').style.display = 'block';

		  		document.getElementById('uno').style.display = 'none';
		  		document.getElementById('tres').style.display = 'none';
		  		document.getElementById('cuatro').style.display = 'none';
		  		document.getElementById('cinco').style.display = 'none';
		  		document.getElementById('seis').style.display = 'none';
		  	}else if(id.value =="3"){
		  		document.getElementById('1').style.display = 'none';
		  		document.getElementById('2').style.display = 'none';
		  		document.getElementById('3').style.display = 'block';
		  		document.getElementById('6').style.display = 'none';

		  		document.getElementById('tres').style.display = 'block';

		  		document.getElementById('dos').style.display = 'none';
		  		document.getElementById('uno').style.display = 'none';
		  		document.getElementById('cuatro').style.display = 'none';
		  		document.getElementById('cinco').style.display = 'none';
		  		document.getElementById('seis').style.display = 'none';
		  	}else if(id.value =="4"){
		  		document.getElementById('1').style.display = 'none';
		  		document.getElementById('2').style.display = 'none';
		  		document.getElementById('3').style.display = 'none';
		  		document.getElementById('6').style.display = 'none';

		  		document.getElementById('cuatro').style.display = 'block';

		  		document.getElementById('dos').style.display = 'none';
		  		document.getElementById('tres').style.display = 'none';
		  		document.getElementById('uno').style.display = 'none';
		  		document.getElementById('cinco').style.display = 'none';
		  		document.getElementById('seis').style.display = 'none';
		  	}else if(id.value =="5"){
		  		document.getElementById('1').style.display = 'none';
		  		document.getElementById('2').style.display = 'none';
		  		document.getElementById('3').style.display = 'none';
		  		document.getElementById('6').style.display = 'none';

		  		document.getElementById('cinco').style.display = 'block';

		  		document.getElementById('dos').style.display = 'none';
		  		document.getElementById('tres').style.display = 'none';
		  		document.getElementById('cuatro').style.display = 'none';
		  		document.getElementById('uno').style.display = 'none';
		  		document.getElementById('seis').style.display = 'none';
		  	}else if(id.value =="6"){
		  		document.getElementById('1').style.display = 'none';
		  		document.getElementById('2').style.display = 'none';
		  		document.getElementById('3').style.display = 'none';
		  		document.getElementById('6').style.display = 'block';

		  		document.getElementById('seis').style.display = 'block';

		  		document.getElementById('dos').style.display = 'none';
		  		document.getElementById('tres').style.display = 'none';
		  		document.getElementById('cuatro').style.display = 'none';
		  		document.getElementById('cinco').style.display = 'none';
		  		document.getElementById('uno').style.display = 'none';
		  	}

		  }

	</script>


</body>
</html>