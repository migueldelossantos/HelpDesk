<?php 
	header("Content-type: text/html;charset=utf-8");
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: index.php");
	}
	$mysqli = new mysqli('localhost','root','','help');
	$mysqli->query("SET NAMES 'utf8'");
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
			<a href="menu.php"><img src="../img/nova.jpeg"><h5>Nova Universitas</h5></a>
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
			<a href="logout.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
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
	      	<a href="#!" id="si" class="modal-action modal-close waves-effect waves-green btn-flat green accent-3">Aceptar</a>
	      	<a href="#!" id="no" class="modal-action modal-close waves-effect waves-green btn-flat red accent-3" >Cancelar</a>
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
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red accent-3" >Cancelar</a>
	    </div>
	</div>
	<div class="container">
		<div id="filtros" class="row">
			<div class="col s3">
				<label for="fecha">Fecha: </label>
				<input class="datepicker" id="fecha" onchange="searchFecha()" type="date" name="fecha" placeholder="dd/mm/aaaa">
			</div>
			<div class="input-field col s3">
			    <select id="estado" onchange="searchEstado()">
			      <option value="" disabled selected>Seleccione un opción</option>
			      <option value="1">Pendiente</option>
			      <option value="2">Atendido</option>
			      <option value="3">Rechazado</option>
			      <option value="4">En Proceso</option>
			    </select>
			    <label>Estado: </label>
			</div>
			<div class="input-field col s3">
			    <select id="tipoProblema" onchange="searchTipoProblema();" required>
							<option value="" disabled selected>Seleccione una opción</option>
							<option value="1">Plataforma Virtual</option>
							<option value="2">Solicitud de Equipo</option>
							<option value="3">Hardware Dañado</option>
							<option value="4">Permisos de Instalación</option>
							<option value="5">Solicitud de Software</option>
							<option value="6">Restricciones de Red</option>
						</select>
			    <label>Tipo de Reporte: </label>
			</div>
			<div class="right-align">
		      	<div class="chip">
			    	<img src="../img/usr.png" alt="Contact Person">
			   		<?php 
			   			$query = "SELECT * FROM users WHERE user = '".$_SESSION['user']."';";
						$consulta = $mysqli->query($query);
						$row = $consulta->fetch_assoc();
			   			echo $row['name']; 
			   		?>
			  	</div>
	  		</div>
		</div>
		<div id="table">
			<table class="bordered striped">
		        <thead>
		          <tr>
		              <th data-field="id">Id</th>
		              <th data-field="name">Fecha</th>
		              <th data-field="price">Asunto</th>
		              <th>Usuario</th>
		              <th>Tipo de Problema</th>
		              <th>Estado</th>
		              <th>Opciones</th>
		          </tr>
		        </thead>
		        <tbody id="bodyReports">

		        </tbody>
	      	</table>
		</div>
		<div id="pagination" class="">
	  		<br>
	  		<ul class="pagination center-align" id="paginacion">
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
		    selectYears: 15, // Creates a dropdown of 15 years to control year
		    format: 'dd/mm/yyyy'
		});

		$(document).ready(function() {
			$('select').material_select();
		});

		$(document).ready(function(){
			$('.modal').modal();
		});

		function modificarReport(id){

			//console.log(id);
		}

		function deleteReport(id){
			$('#modal1').modal("open");
			$('#si').click(function(){
				Materialize.toast('Reporte Eliminado', 4000,'green');
				//alert("Elimina");
			});
			$('#no').click(function(){
				Materialize.toast('Eliminacion Cancelada', 4000,'red');
			});
			/*$('a#no').click(){
			}*/
			//console.log(id);
		}

		var byFecha = false;
		var byTipoProblem = false;
		var byEstado = false;

		function searchEstado(){
			if($('#estado')[0].value == ""){
				byEstado = false;
			}else{
				byEstado = true;
			}
			//alert(byEstado);
			pagination();
			renderTable(0);
		}

		function searchTipoProblema(){
			if($('#tipoProblema')[0].value == ""){
				byTipoProblem = false;
			}else{
				byTipoProblem = true;
			}
			//alert(byTipoProblem);
			pagination();
			renderTable(0);
		}

		function searchFecha(){
			if($('#fecha')[0].value == ""){
				byFecha = false;
			}else{
				byFecha = true;
			}
			pagination();
			renderTable(0);
		}

		function pagination(){
			var user = "<?php echo $_SESSION['user'];?>";
			var dataUri = "&user=" + user + "&count=true";
			if (byFecha && byEstado && byTipoProblem){
				dataUri += "&fecha=" + $('#fecha')[0].value + "&estado="+$('#estado')[0].value + "&tipoProblema=" +$('#tipoProblema')[0].value;
			}else if(byFecha && byEstado) {
				dataUri += "&fecha=" + $('#fecha')[0].value + "&estado="+$('#estado')[0].value;
			}else if (byFecha && byTipoProblem) {
				dataUri += "&fecha=" + $('#fecha')[0].value + "&tipoProblema=" +$('#tipoProblema')[0].value;
			}else if (byEstado && byTipoProblem) {
				dataUri += "&estado="+$('#estado')[0].value + "&tipoProblema=" +$('#tipoProblema')[0].value;
			}else if (byFecha) {
				dataUri += "&fecha=" + $('#fecha')[0].value;
			}else if (byTipoProblem) {
				dataUri += "&tipoProblema=" + $('#estado')[0].value;
			}else if (byEstado) {
				dataUri += "&estado=" + $('#tipoProblema')[0].value;
			}
			$.ajax({
				url: "consulta-tabla.php",
				data: dataUri,
				type: "post"
			}).
			done(function(data){
				//alert(data);
				var numPage = parseInt(data)/10;
				//alert(numPage);
				var pages = "<li class='disabled'><a href='#!'><i class='material-icons'>chevron_left</i></a></li>";
				for(var i=0;i<numPage;i++){
					if(i==0){
						pages += "<li class='active orange darken-4 page'><a href='#!'>"+(i+1.0)+"</a></li>"
					}else{
						pages += "<li class='waves-effect page'><a href='#!'>"+(i+1.0)+"</a></li>"
					}
				}
				pages += "<li class='disabled'><a href='#!'><i class='material-icons'>chevron_right</i></a></li>";
				$('#paginacion')[0].innerHTML = pages;

				$('.page').click(function(selected){
					$('.page').removeClass('active orange darken-4');
					selected.delegateTarget.className = 'waves-effect page active orange darken-4';
					//console.log(selected.target.innerHTML - 1.0);
					renderTable(selected.target.innerHTML - 1.0);
				});
			});
		}

		function renderTable(page){
			//pagination();
			var user = "<?php echo $_SESSION['user'];?>";
			var dataUri = "&user=" + user + "&page=" + page;
			
			if (byFecha && byEstado && byTipoProblem){
				dataUri += "&fecha=" + $('#fecha')[0].value + "&estado="+$('#estado')[0].value + "&tipoProblema=" +$('#tipoProblema')[0].value;
			}else if(byFecha && byEstado) {
				dataUri += "&fecha=" + $('#fecha')[0].value + "&estado="+$('#estado')[0].value;
			}else if (byFecha && byTipoProblem) {
				dataUri += "&fecha=" + $('#fecha')[0].value + "&tipoProblema=" +$('#tipoProblema')[0].value;
			}else if (byEstado && byTipoProblem) {
				dataUri += "&estado="+$('#estado')[0].value + "&tipoProblema=" +$('#tipoProblema')[0].value;
			}else if (byFecha) {
				dataUri += "&fecha=" + $('#fecha')[0].value;
			}else if (byTipoProblem) {
				dataUri += "&tipoProblema=" + $('#estado')[0].value;
			}else if (byEstado) {
				dataUri += "&estado=" + $('#tipoProblema')[0].value;
			}

			//alert(dataUri);
			$.ajax({
				url: "consulta-tabla.php",
				data: dataUri,
				type: "post"
			}).
			done(function(data){
				$('#bodyReports')[0].innerHTML = data;
			});
		}
		pagination();
		renderTable(0);
	</script>
</body>
</html>