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
      <link type="text/css" rel="stylesheet" href="../dist/bootstrap-clockpicker.min.css">
      <link type="text/css" rel="stylesheet" href="../dist/jquery-clockpicker.min.css">
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
		
		<div class="right-align">
	      	<div class="chip">
		    	<img src="../img/usr.png" alt="Contact Person">
		   		<?php 
		   			$mysqli=new mysqli("localhost","root","","help");
		   			$query = "SELECT * FROM users WHERE user = '".$_SESSION['user']."';";
					$consulta = $mysqli->query($query);
					$row = $consulta->fetch_assoc();
		   			echo $row['name']; 
		   		?>
		  	</div>
  		</div>
		<div class="row">
			<form class="col s6 offset-s3" method="post" id="formReporte">			
				<div class="row">
					<div class="col s8">
						<label>Asunto</label>
						<input type="text" id="asunto" placeholder="Asunto" class="validate" required>
					</div>
				</div>
				<div class="row" >
					<div class="input-field col s12">
						<select id="tipoProblema" onchange="selectProblem()" required>
							<option value="" disabled selected>Seleccione una opción</option>
							<option value="1">Plataforma Virtual</option>
							<option value="2">Solicitud de Equipo</option>
							<option value="3">Hardware Dañado</option>
							<option value="4">Permisos de Instalación</option>
							<option value="5">Solicitud de Software</option>
							<option value="6">Restricciones de Red</option>
						</select>
						<label>Tipo de problema</label>
					</div> 
				</div>
				<div class="row" id="subProblem" ></div>
				<div class="row" >
					<div class="col s12">
						<label>Descripción:</label>
						<textarea id="descripcion"></textarea>
					</div>
				</div>
				<div class="row" >
					<br>
					<div class="input-field col s6">
						<select id="prioridad" required>
							<option value="" disabled selected>Seleccione una opción</option>
							<option value="1">Alta</option>
							<option value="2">Media</option>
							<option value="3">Baja</option>
						</select>
						<label>Prioridad</label>
					</div>
				</div>
				<div class="row" id="moreInformation"></div>
				<div class="row" >
					<div class="col s4 offset-s4">
						<input id="enviar" class="btn" type="submit" value="Enviar">
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
	<script type="text/javascript" src="../dist/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript" src="../dist/jquery-clockpicker.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function() {
		    $('select').material_select();
		});

		function selectProblem(){
			var idProblema = $('#tipoProblema')[0].value;
			if (idProblema == 1){
				//alert("Problema 1");
				$("#subProblem")[0].innerHTML = "<div class='input-field col s9 offset-s1'><select id='subProblema' required><option value='' disabled selected>Seleccione una opción</option><option value='1'>Acceso Denegado al Aula</option><option value='2'>Reestablecer Contraseña</option><option value='3'>Acceso a un curso</option><option value='4'>Solicitar un Anuncio</option></select><label>Sub Problema</label></div>";

				$("#moreInformation")[0].innerHTML = "";

			}else if (idProblema == 2) {
				//alert("Problema 2");
				$("#subProblem")[0].innerHTML = "<div class='input-field col s9 offset-s1'><select id='tipoEquipo' required><option value='' disabled selected>Selecciona tu Opción</option><option value='1'>Cañón</option><option value='2'>Bocinas</option><option value='3'>Pantalla</option> <option value='4'>Cable de red</option><option value='5'>Teclado</option><option value='6'>Mouse</option><option value='7'>Regulador</option><option value='8'>Cable HDMI</option><option value='9'>Router</option><option value='10'>Switch</option></select><label>Equipo</label></div>";

				$("#moreInformation")[0].innerHTML = "<div class='col s6'><label>Fecha de Uso:</label><input type='date' id='fecha_uso' class='datepicker' required></div><div class='col s6'><label>Hora de Uso:</label><div class='input-group clockpicker'><input id='hora_uso' type='text' class='form-control' placeholder='00:00'><span class='input-group-addon'><span class='glyphicon glyphicon-time'></span></span></div></div><div class='col s6'><label>Fecha de Entrega:</label><input type='date' id='fecha_entrega' class='datepicker' required></div><div class='col s6'><label>Hora de Entrega:</label><div class='input-group clockpicker'><input id='hora_entrega' type='text' class='form-control' placeholder='00:00'><span class='input-group-addon'><span class='glyphicon glyphicon-time'></span></span></div></div>";

			}else if (idProblema == 3) {
				//alert("Problema 3");
				$("#subProblem")[0].innerHTML = "<div class='input-field col s9 offset-s1'><select id='tipoEquipo' required	><option value='' disabled selected>Selecciona tu Opción</option><option value='1'>Pizarró</option><option value='2'>Cañon</option><option value='3'>CPU</option> <option value='4'>Pantalla</option><option value='5'>Teclado</option><option value='6'>Mouse</option><option value='7'>Regulador</option><option value='8'>Audio de Transmicion</option><option value='9'>Video de Transmicion</option><option value='10'>Contacto de Corriente</option></select><label>Equipo</label></div>";

				$("#moreInformation")[0].innerHTML = "<div class='col s8 input-field'><select id='aula_departamento'><option value='' selected disabled>Seleccione una opción</option><option value='1'>Aula 1</option><option value='2'>Aula 2</option><option value='3'>Aula 3</option><option value='4'>Aula 4</option><option value='5'>Aula 5</option><option value='6'>Aula 6</option><option value='7'>Aula 7</option><option value='8'>Aula 8</option><option value='9'>Aula 9</option><option value='10'>Aula 10</option><option value='11'>Vice-Rectoría Académica</option><option value='12'>Servicios Escolaes</option><option value='13'>Vice-Rectoría Administrativa</option><option value='14'>Cubículos Profesores</option><option value='15'>Cubículos Asistentes</option><option value='16'>Salas de Transmisión</option><option value='17'>Laboratorio de Electrónica</option><option value='18'>Rectoría</option></select><label>Aula o Departamento</label></div><div class='col s6'><label>Núm. Inventario</label><input type='text' id='numInventario' placeholder='Número de Inventario' required></div>";

			}else if (idProblema == 4) {
				//alert("Problema 4");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "<div class='col s6'><label>Fecha de Instalación:</lable><input type='date' id='fecha_instalacion' class='datepicker' required></div><div class='col s6'><label>Nombre del Software:</label><input type='text' id='nombre_software' required></div><div class='col s6'><label>Versión del Software:</label><input type='text' id='version_software' required></div><div class='col s8 input-field'><select id='aula_departamento'><option value='' selected disabled>Seleccione una opción</option><option value='1'>Aula 1</option><option value='2'>Aula 2</option><option value='3'>Aula 3</option><option value='4'>Aula 4</option><option value='5'>Aula 5</option><option value='6'>Aula 6</option><option value='7'>Aula 7</option><option value='8'>Aula 8</option><option value='9'>Aula 9</option><option value='10'>Aula 10</option><option value='11'>Vice-Rectoría Académica</option><option value='12'>Servicios Escolaes</option><option value='13'>Vice-Rectoría Administrativa</option><option value='14'>Cubículos Profesores</option><option value='15'>Cubículos Asistentes</option><option value='16'>Salas de Transmisión</option><option value='17'>Laboratorio de Electrónica</option><option value='18'>Rectoría</option></select><label>Aula o Departamento</label></div><div class='col s8 input-field'><select id='carrera'><option value='' selected disabled>Seleccione una carrera</option><option value='1'>Lic. en Informática</option><option value='2'>Ing. en Agronomía</option><option value='3'>Lic. en Administración</option></select><label>Carrera:</label></div><br><div class='col s6'><label>Núm. de Equipos:</label><input type='text' id='num_equipos' required></div>";

			}else if (idProblema == 5) {
				//alert("Problema 5");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "<div class='col s6'><label>Nombre del Software:</label><input type='text' id='nombre_software' required></div><div class='col s6'><label>Versión del Software:</label><input type='text' id='version_software' required></div><div class='col s6'><label>Fecha de Uso:</label><input type='date' class='datepicker' id='fecha_uso' required></div><div class='col s6'><label>Licenciamineto:</label><input type='text' id='licenciamineto' required></div>";

			}else if (idProblema == 6) {
				//alert("Problema 6");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "<div class='col s6'><label>Fecha Inicio:</label><input type='date' class='datepicker' id='fecha_inicio' required></div><div class='col s6'><label>Hora Inicio:</label><div class='input-group clockpicker'><input id='hora_inicio' type='text' class='form-control' placeholder='00:00'><span class='input-group-addon'><span class='glyphicon glyphicon-time'></span></span></div></div><div class='col s8 input-field'><select id='carrera'><option value='' selected disabled>Seleccione una carrera</option><option value='1'>Lic. en Informática</option><option value='2'>Ing. en Agronomía</option><option value='3'>Lic. en Administración</option></select><label>Carrera:</label></div><div class='col s8 input-field'><select id='aula_departamento'><option value='' selected disabled>Seleccione una opción</option><option value='1'>Aula 1</option><option value='2'>Aula 2</option><option value='3'>Aula 3</option><option value='4'>Aula 4</option><option value='5'>Aula 5</option><option value='6'>Aula 6</option><option value='7'>Aula 7</option><option value='8'>Aula 8</option><option value='9'>Aula 9</option><option value='10'>Aula 10</option><option value='11'>Vice-Rectoría Académica</option><option value='12'>Servicios Escolaes</option><option value='13'>Vice-Rectoría Administrativa</option><option value='14'>Cubículos Profesores</option><option value='15'>Cubículos Asistentes</option><option value='16'>Salas de Transmisión</option><option value='17'>Laboratorio de Electrónica</option><option value='18'>Rectoría</option></select><label>Aula o Departamento</label></div><div class='col s6'><label>Fecha Fin:</label><input type='date' class='datepicker' id='fecha_fin' required></div><div class='col s6'><label>Hora Fin:</label><div class='input-group clockpicker'><input id='hora_fin' type='text' class='form-control' placeholder='00:00'><span class='input-group-addon'><span class='glyphicon glyphicon-time'></span></span></div></div><div class='col s12'><label>Links o Páginas:</label><textarea id='links' required></textarea></div>";

			}else{
				//alert("Problema n");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "";

			}

			$('.clockpicker').clockpicker({
				placement: 'top'
			});
			$('select').material_select();
			$(".datepicker").pickadate({
				selectMonths: true,
				selectYears: 15,
				format: 'dd/mm/yyyy'
			});
		}

		$("#enviar").click(function(e){
			e.preventDefault();
			//alert("Enviar");
			//alert($("#tipoProblema")[0].value);
			if($("#asunto")[0].value == ""){
				alert('No ha especificado un "Asunto"');
				$("#asunto")[0].focus();
			}else if($("#tipoProblema")[0].value == ""){
				alert('No ha seleccionado un "Tipo de Problema"');
				$("#tipoProblema")[0].focus();
			}else if($("#tipoProblema")[0].value == "1"){
				if($("#subProblema")[0].value == ""){
					alert('No ha seleccionado un "Problema Específico"');
					$("#subProblema")[0].focus();
				}else if($('#prioridad')[0].value == ""){
					alert('No a seleccionado una "Prioridad" del Reporte');
					$('#prioridad')[0].focus();
				}else{
					var user = "<?php echo $_SESSION['user'];?>";
					$.ajax({
						url: "save-reporte.php",
						data:"asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&subProblema="+ $('#subProblema')[0].value +
							"&usuario="+ user,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
							$('#formReporte')[0].reset();
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});
				}
			}else if($("#tipoProblema")[0].value == "2"){
				if($('#tipoEquipo')[0].value == ""){
					alert('No ha seleccionado un "Equipo" para el reporte');
					$('#tipoEquipo')[0].focus();
				}else if($('#prioridad')[0].value == ""){
					alert('No ha seleccionado una "Prioridad" del Reporte');
					$('#prioridad')[0].focus();
				}else if($('#fecha_uso')[0].value == ""){
					alert('No ha agregado una "Fecha de Uso"');
					$('#fecha_uso')[0].focus();
				}else if($('#hora_uso')[0].value == ""){
					alert('No ha agregado una "Hora de Uso" del Reporte');
					$('#hora_uso')[0].focus();
				}else if($('#fecha_entrega')[0].value == ""){
					alert('No ha agregado una "Fecha de Entrega" del Equipo');
					$('#fecha_entrega')[0].focus();
				}else if($('#hora_entrega')[0].value == ""){
					alert('No ha agregado una "Hora de Entrega" del Reporte');
					$('#hora_entrega')[0].focus();
				}else{
					var user = "<?php echo $_SESSION['user'];?>";
					$.ajax({
						url: "http:save-reporte.php",
						data:"asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&tipoEquipo="+ $('#tipoEquipo')[0].value +
							"&fecha_uso="+ $('#fecha_uso')[0].value +
							"&hora_uso="+ $('#hora_uso')[0].value +
							"&fecha_entrega="+ $('#fecha_entrega')[0].value+
							"&hora_entrega="+ $('#hora_entrega')[0].value+
							"&usuario="+ user,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
							$('#formReporte')[0].reset();
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});
				}
			}else if($("#tipoProblema")[0].value == "3"){
				if ($('#tipoEquipo')[0].value == ""){
					alert('No ha seleccionado un "Equipo" para el reporte');
					$('#tipoEquipo')[0].focus();
				}else if($('#prioridad')[0].value == ""){
					alert('No ha seleccionado una "Prioridad" del Reporte');
					$('#prioridad')[0].focus();
				}else if($('#aula_departamento')[0].value == ""){
					alert('No ha seleccionado una "Aula o Departamento"');
					$('#aula_departamento')[0].focus();
				}else if($('#numInventario')[0].value == ""){
					alert('No ha agregado el "Número de Inventario" del Equipo');
					$('#numInventario')[0].focus();
				}else{
					var user = "<?php echo $_SESSION['user'];?>";
					$.ajax({
						url: "save-reporte.php",
						data: "asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&tipoEquipo="+ $('#tipoEquipo')[0].value +
							"&aula_departamento="+ $("#aula_departamento")[0].value+
							"&numInventario="+ $("#numInventario")[0].value+
							"&usuario="+ user,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
							$('#formReporte')[0].reset();
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});	
				}
			}else if($("#tipoProblema")[0].value == "4"){
				if($('#prioridad')[0].value == ""){
					alert('No ha seleccionado una "Prioridad" del Reporte');
				}else if($('#fecha_instalacion')[0].value == ""){
					alert('No ha seleccionado una "Fecha de Instalación"');
				}else if($('#nombre_software')[0].value == ""){
					alert('No ha agregado un "Nombre de Software"');
				}else if($('#version_software')[0].value == ""){
					alert('No ha agregado una "Versión de Software"');
				}else if($('#aula_departamento')[0].value == ""){
					alert('No ha seleccionado una "Aula o Departamento"');
				}else if($('#carrera')[0].value == ""){
					alert('No ha seleccionado una "Carrera"');
				}else if($('#num_equipos')[0].value == ""){
					alert('No ha agregado el "Número de Equipos" para la instalación');
				}else{
					var user = "<?php echo $_SESSION['user'];?>";
					$.ajax({
						url: "save-reporte.php",
						data: "asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&fecha_instalacion="+ $('#fecha_instalacion')[0].value+
							"&nombre_software="+ $("#nombre_software")[0].value+
							"&version_software="+ $("#version_software")[0].value+
							"&aula_departamento="+ $("#aula_departamento")[0].value+
							"&carrera="+ $("#carrera")[0].value+
							"&num_equipos="+ $('#num_equipos')[0].value+
							"&usuario="+ user,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
							$('#formReporte')[0].reset();
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});	
				}
			}else if($("#tipoProblema")[0].value == "5"){
				if($('#prioridad')[0].value == ""){
					alert('No a seleccionado una "Prioridad" del Reporte');
				}else if ($('#nombre_software')[0].value == "") {
					alert('No ha agregado un "Nombre de Software"');
				}else if ($('#version_software')[0].value == "") {
					alert('No ha agregado una "Versión de Software"');
				}else if ($('#fecha_uso')[0].value == "") {
					alert('No ha seleccionado una "Fecha de Uso"');
				}else if ($('#licenciamineto')[0].value == "") {
					alert('No ha agregado un tipo de "Licenciamineto"');
				}else{
					var user = "<?php echo $_SESSION['user'];?>";
					$.ajax({
						url: "save-reporte.php",
						data: "asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&nombre_software="+  $("#nombre_software")[0].value+
							"&version_software="+ $("#version_software")[0].value+
							"&fecha_uso="+ $("#fecha_uso")[0].value+
							"&licenciamiento="+ $("#licenciamineto")[0].value+
							"&usuario="+ user,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
							$('#formReporte')[0].reset();
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});
				}
			}else if($("#tipoProblema")[0].value == "6"){
				if($('#prioridad')[0].value == ""){
					alert('No a seleccionado una "Prioridad" del Reporte');
				}else if ($('#fecha_inicio')[0].value == "") {
					alert('No ha seleccionado la "Fecha de Inicio" para usar las páginas');
				}else if($('#hora_inicio')[0].value == ""){
					alert('No ha seleccionado la "Hora de Inicio" para usar las páginas');
				}else if($('#carrera')[0].value == ""){
					alert('No ha seleccionado una "Carrera"');
				}else if($('#aula_departamento')[0].value == ""){
					alert('No ha seleccionado una "Aula o Departamento"');
				}else if($('#fecha_fin')[0].value == ""){
					alert('No ha seleccionado la "Fecha de Fin" para usar las páginas');
				}else if($('#hora_fin')[0].value == ""){
					alert('No ha seleccionado la "Hora de Inicio" para usar las páginas');
				}else if($('#links')[0].value == ""){
					alert('No ha agregado los links de las páginas');
				}else{
					var user = "<?php echo $_SESSION['user'];?>";
					$.ajax({
						url: "save-reporte.php",
						data: "asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&fecha_inicio="+ $("#fecha_inicio")[0].value+
							"&hora_inicio="+ $("#hora_inicio")[0].value+
							"&carrera="+ $('#carrera')[0].value +
							"&aula_departamento="+ $("#aula_departamento")[0]+
							"&fecha_fin="+ $("#fecha_fin")[0].value+
							"&hora_fin="+ $("#hora_fin")[0].value+
							"&links="+ $("#links")[0].value+
							"&usuario="+ user,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
							$('#formReporte')[0].reset();
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});
				}
			}
		});

		$(".datepicker").pickadate({
			selectMonths: true,
			selectYears: 15,
			format: 'dd/mm/yyyy'
		});
	</script>


</body>
</html>
