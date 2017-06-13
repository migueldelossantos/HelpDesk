<?php 
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: index.php");
	}

	$mysqli = new mysqli('localhost','root','','help');
	$sql = "SELECT * FROM reportes;";
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
		<div id="menu" class="col s6 nav-wrapper">
			<ul class="left hide-on-med-and-down">
				<li class="tab"><a href="nuevo-reporte.php">Generar Reporte</a></li>
				<li class="tab active"><a href="#">Listar Reportes</a></li>
				<li class="tab"><a href="chat.php">Chat</a></li>
				<li class="tab"><a href="preguntas-frecuentes.php">Preguntas Frecuentes</a></li>
			</ul>
		</div>
		<div id="logo-help" class="col s3">
			<a href="../index.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<!-- Modal Borrar -->
	<div id="modal1" class="modal">
	    <div class="modal-content">
	      	<h5>Eliminar Reporte</h5>
	      	<p>¿Esta seguro de eliminar el Reporte?</p>
	    </div>
	    <div class="modal-footer">
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat green accent-3" onclick="Materialize.toast('Reporte Eliminado', 4000,'green')">Aceptar</a>
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red accent-3" onclick="Materialize.toast('Eliminacion Cancelada', 4000,'red')">Cancelar</a>
	    </div>
	</div>
	<!-- Modal Editar -->
	<div id="modal2" class="modal">
	    <div class="modal-content">
	      	<h5>Editar Reporte</h5>
	      	<p>Estructura del Reporte</p>
	      	<p>Para cambiar prioridad</p>
	      	<p>para indicar que esta malito...</p>
	    </div>
	    <div class="modal-footer">
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat green accent-3" onclick="Materialize.toast('Reporte Modificado', 4000,'green')">Aceptar</a>
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red accent-3" onclick="Materialize.toast('Edición Cancelada', 4000,'red')">Cancelar</a>
	    </div>
	</div>
	<div class="container">
		<div id="filtros" class="row">
			<div class="col s3">
				<label for="fecha">Fecha: </label>
				<input class="datepicker" id="fecha" type="date" name="fecha">
			</div>
			<div class="input-field col s3">
			    <select>
			      <option value="" disabled selected>Estado</option>
			      <option value="1">Option 1</option>
			      <option value="2">Option 2</option>
			      <option value="3">Option 3</option>
			    </select>
			    <label>Estado: </label>
			</div>
			<div class="input-field col s3">
			    <select>
			      <option value="" disabled selected>Tipo de Reporte</option>
			      <option value="1">Option 1</option>
			      <option value="2">Option 2</option>
			      <option value="3">Option 3</option>
			    </select>
			    <label>Tipo de Reporte: </label>
			</div>
		</div>
		<div id="table">
			<table class="bordered striped">
		        <thead>
		          <tr>
		              <th data-field="id">Id</th>
		              <th data-field="name">Fecha</th>
		              <th data-field="price">Reporte</th>
		              <th>Usuario</th>
		              <th>Tipo de Problema</th>
		              <th>Estado</th>
		              <th>Opciones</th>
		          </tr>
		        </thead>

		        <tbody>
		          <tr>
		            <td>0001</td>
		            <td>26/04/2017</td>
		            <td>Reparación de Equipo</td>
		            <td>0113010008</td>
		            <td>Reparación de Hardware</td>
		            <td>Pendiente</td>
		            <td><a href="#modal2"><i class="material-icons">mode_edit</i></a><a href="#modal1"><i class="material-icons">delete</i></a></td>
		          </tr>
		        </tbody>
	      	</table>
		</div>
		<div id="pagination" class="">
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
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.js"></script>
	<script type="text/javascript">
		$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15 // Creates a dropdown of 15 years to control year
		});
		$(document).ready(function() {
			$('select').material_select();
		});
		$(document).ready(function(){
			// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});
	</script>
</body>
</html>