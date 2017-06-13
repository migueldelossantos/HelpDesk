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
							<option value="" disabled selected>Seleccione una opcion</option>
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
					<div class="input-field col s6">
						<select id="prioridad" required>
							<option value="" disabled selected>Seleccione una opcion</option>
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
				$("#subProblem")[0].innerHTML = "<div class='input-field col s9 offset-s1'><select id='tipoEquipo' required><option value='' disabled selected>Selecciona tu Opcion</option><option value='1'>Cañón</option><option value='2'>Bocinas</option><option value='3'>Pantalla</option> <option value='4'>Cablede red</option><option value='5'>Teclado</option><option value='6'>Mouse</option><option value='7'>Regulador</option><option value='8'>Cable HDMI</option><option value='9'>Router</option><option value='10'>Switch</option></select><label>Equipo</label></div>";

				$("#moreInformation")[0].innerHTML = "<div class='col s6'><label>Fecha de Uso:</label><input type='date' id='fecha_uso' class='datepicker' required></div><div class='col s6'><label>Hora de Uso:</label><input type='text' id='hora_uso' required placeholder='13:45'></div><div class='col s6'><label>Fecha de Entrega:</label><input type='date' id='fecha_entrega' class='datepicker' required></div><div class='col s6'><label>Hora de Entrega:</label><input type='text' id='hora_entrega' required placeholder='10:30'></div>";

			}else if (idProblema == 3) {
				//alert("Problema 3");
				$("#subProblem")[0].innerHTML = "<div class='input-field col s9 offset-s1'><select id='tipoEquipo' required	><option value='' disabled selected>Selecciona tu Opcion</option><option value='1'>Pizarró</option><option value='2'>Cañon</option><option value='3'>CPU</option> <option value='4'>Pantalla</option><option value='5'>Teclado</option><option value='6'>Mouse</option><option value='7'>Regulador</option><option value='8'>Audio de Transmicion</option><option value='9'>Video de Transmicion</option><option value='10'>Contacto de Corriente</option></select><label>Equipo</label></div>";

				$("#moreInformation")[0].innerHTML = "<div class='col s6' ><label>Aula o Departamento</label><input type='text' id='aula_departamento' placeholder='Aula o Departamento' required></div><div class='col s6'><label>Núm. Inventario</label><input type='text' id='numInventario' placeholder='Número de Inventario' required></div>";

			}else if (idProblema == 4) {
				//alert("Problema 4");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "<div class='col s8'><label>Fecha de Instalación:</lable><input type='date' id='fecha_instalacion' class='datepicker' required></div><div class='col s6'><label>Nombre del Software:</label><input type='text' id='nombre_software' required></div><div class='col s6'><label>Versión del Software:</label><input type='text' id='version_software' required></div><div class='col s6'><label>Aula o Departamento</label><input type='text' id='aula_departamento' required></div><div class='col s6'><label>Carrera:</label><input type='text' id='carrera' required></div><div class='col s6'><label>Núm. de Equipos:</label><input type='text' id='num_equipos' required></div>";

			}else if (idProblema == 5) {
				//alert("Problema 5");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "<div class='col s6'><label>Nombre del Software:</label><input type='text' id='nombre_software' required></div><div class='col s6'><label>Versión del Software:</label><input type='text' id='version_software' required></div><div class='col s6'><label>Fecha de Uso:</label><input type='date' class='datepicker' id='fecha_uso' required></div><div class='col s6'><label>Licenciamineto:</label><input type='text' id='licenciamineto' required></div>";

			}else if (idProblema == 6) {
				//alert("Problema 6");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "<div class='col s6'><label>Fecha Inicio:</label><input type='date' class='datepicker' id='fecha_inicio' required></div><div class='col s6'><label>Hora Inicio:</label><input type='text' id='hora_inicio' placeholder='13:50' required></div><div class='col s6'><label>Carrera:</label><input type='text' id='carrera' required></div><div class='col s6'><label>Aula o Departamento</label><input type='text' id='aula_departamento' required></div><div class='col s6'><label>Fecha Fin:</label><input type='date' class='datepicker' id='fecha_fin' required></div><div class='col s6'><label>Hora Fin:</label><input type='text' id='hora_fin' required placeholder='10:30'></div><div class='col s12'><label>Links o Páginas:</label><textarea id='lincks' required></textarea></div>";

			}else{
				//alert("Problema n");
				$("#subProblem")[0].innerHTML = "";

				$("#moreInformation")[0].innerHTML = "";

			}

			$('select').material_select();
			$(".datepicker").pickadate({
				selectMonths: true,
				selectYears: 15,
				format: 'yyyy-mm-dd'
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
					alert('No a seleccionado una "Prioridad" del Reporte');
					$('#prioridad')[0].focus();
				}else if($('#fecha_uso')[0].value == ""){
					alert('No ha seleccionado una "Fecha de Uso"');
					$('#fecha_uso')[0].focus();
				}else if($('#hora_uso')[0].value == ""){
					alert('No a seleccionado una "Hora de Uso" del Reporte');
					$('#hora_uso')[0].focus();
				}else if($('#fecha_entrega')[0].value == ""){
					alert('No ha seleccionado una "Fecha de Entrega" del Equipo');
					$('#fecha_entrega')[0].focus();
				}else if($('#hora_entrega')[0].value == ""){
					alert('No a seleccionado una "Hora de Entrega" del Reporte');
					$('#hora_entrega')[0].focus();
				}else{
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
							"&hora_entrega="+ $('#hora_entrega')[0].value,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
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
				}else if($('#prioridad')[0].value == ""){
					alert('No a seleccionado una "Prioridad" del Reporte');
				}else{
					$.ajax({
						url: "save-reporte.php",
						data: "asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&tipoEquipo="+ $('#tipoEquipo')[0].value +
							"&aula_departamento="+ $("#aula_departamento")[0].value+
							"&numInventario="+ $("#numInventario")[0].value,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});	
				}
			}else if($("#tipoProblema")[0].value == "4"){
				if($('#fecha_instalacion')[0].value == ""){
					alert('No ha seleccionado una "Fecha de Instalación"');
				}else if($('#prioridad')[0].value == ""){
					alert('No a seleccionado una "Prioridad" del Reporte');
				}else{
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
							"&num_equipos="+ $('#num_equipos')[0].value,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});	
				}
			}else if($("#tipoProblema")[0].value == "5"){
				if ($('#fecha_uso')[0].value == "") {
					alert('No ha seleccionado una "Fecha de Uso"');
				}else if($('#prioridad')[0].value == ""){
					alert('No a seleccionado una "Prioridad" del Reporte');
				}else{
					$.ajax({
						url: "save-reporte.php",
						data: "asunto="+$('#asunto')[0].value +
							"&tipoProblema="+ $('#tipoProblema')[0].value + 
							"&descripcion="+ $('#descripcion')[0].value +
							"&prioridad="+ $('#prioridad')[0].value +
							"&nombre_software="+  $("#nombre_software")[0].value+
							"&version_software="+ $("#version_software")[0].value+
							"&fecha_uso="+ $("#fecha_uso")[0].value+
							"&licenciamineto="+ $("#licenciamineto")[0].value,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
						}else{
							alert("Reporte No Enviado");
						}
					}).
					error(function(error){
						alert(error);
					});
				}
			}else if($("#tipoProblema")[0].value == "6"){
				if ($('#fecha_inicio')[0].value == "") {
					alert('No ha seleccionado la "Fecha de Inicio" para usar las páginas');
				}else if($('#fecha_fin')[0].value = ""){
					alert('No ha seleccionado la "Fecha de Fin" para usar las páginas');
				}else if($('#prioridad')[0].value == ""){
					alert('No a seleccionado una "Prioridad" del Reporte');
				}else{
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
							"&links="+ $("#links")[0].value,
						type: "post"
					}).
					done(function(data){
						if (data=="ok") {
							alert("Reporte Enviado");
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
			format: 'yyyy-mm-dd'
		});
	</script>


</body>
</html>
