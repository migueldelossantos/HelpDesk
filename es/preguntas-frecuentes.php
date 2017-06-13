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
				<li class="tab"><a href="chat.php">Chat</a></li>
				<li class="tab active"><a href="#">Preguntas Frecuentes</a></li>
			</ul>
		</div>
		<div id="logo-help" class="col s3">
			<a href="logout.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<!--<h3 class="center-align">Preguntas Frecuentes</h3>-->
		<h4 class="center-align">Preguntas Frecuentes</h4>
		<div class="right-align">
	      	<div class="chip">
		    	<img src="../img/usr.png" alt="Contact Person">
		   		<?php echo $row['name']; ?>
		  	</div>
	  	</div>









<?php if($privilegio==1 || $privilegio==2){?>
		<nav id="search">
			<div class="nav-wrapper">
		    	
		        	<div class="input-field orange darken-4">
		          		<input id="buscar" type="search">
		          		<label class="label-icon" for="search"><i class="material-icons">search</i></label>
		          		<i class="material-icons">close</i>
		        	</div>
		      	
		    </div>
	    </nav>
	    <div class="progress">
	    	<div class="determinate" style="width: 100%"></div>
	  	</div>

      <div class="col s8 offset-s2 card-panel">

		<b>Sección de preguntas</b>

		<ul id="pric" class="collapsible" data-collapsible="accordion">
		</ul>
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
<?php } ?>




<?php if($privilegio==0){?>

              <div class="col s6">
                <a onclick="agregar();" class="waves-effect waves-light btn red"><i class="material-icons left">add</i>Agregar Nuevo Pregunta</a>
              </div>

              <div class="col s8 offset-s2 card-panel">

				<b>Sección de preguntas</b>

				<ul id="sec" class="collapsible" data-collapsible="accordion">
				</ul>
              </div>

<?php } ?>






	  <div id="modal1" class="modal">
	    <div class="modal-content">
	      <h4>Agregar nueva pregunta</h4>
	      	<div class="row">
		        <div class="input-field col s10 offset-s1">
		          <input id="pregunta" placeholder="Introducir Pregunta" id="first_name" type="text" class="validate">
		          <label for="first_name">Introducir Pregunta</label>
		        </div>

		       	<div class="input-field col s10 offset-s1">
		          <input id="respuesta" placeholder="Introducir Respuesta" id="first_name" type="text" class="validate">
		          <label for="first_name">Introducir Respuesta</label>
		        </div>
	        </div>
	        <div class="right-align">
		        <a onclick="agregarPregunta();" class="right-align waves-effect waves-light btn green">Aceptar</a>
		        <a onclick="cerrar();" class="right-align waves-effect waves-light btn red">cancelar</a>
	        </div>
	    </div>
	  </div>

	  <div id="modal2" class="modal">
	    <div class="modal-content">
	      <h4>Modificar pregunta</h4>
	      	<div class="row">
		        <div class="input-field col s10 offset-s1">
		          <input id="preguntaM" placeholder="Introducir Pregunta" id="first_name" type="text" class="validate">
		          <label for="first_name">Modificar Pregunta</label>
		        </div>

		       	<div class="input-field col s10 offset-s1">
		          <input id="respuestaM" placeholder="Introducir Respuesta" id="first_name" type="text" class="validate">
		          <label for="first_name">Modificar Respuesta</label>
		        </div>
	        </div>
	        <div class="right-align">
		        <a onclick="modificarPregunta();" class="right-align waves-effect waves-light btn green">Modificar</a>
		        <a onclick="cerrar2();" class="right-align waves-effect waves-light btn red">cancelar</a>
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
		
	imprimir();
	imprimirOtro();
	var ids=0;

	function imprimir(){
		$.post("../registerPregunta.php", {imprimir: ""}, function(mensaje){
			$("#sec").html(mensaje);
        }); 
	}

	function imprimirOtro(){
		$.post("../registerPregunta.php", {imprimir2: ""}, function(mensaje){
			$("#pric").html(mensaje);
        }); 
	}


	function agregar(){
		  $('#modal1').modal('open');
	}

	function agregarPregunta(){

		
		var texto1 = document.getElementById("pregunta").value;
		var texto2 = document.getElementById("respuesta").value;

		if(texto1 != "" && texto2 !=""){

			$.post("../registerPregunta.php", {pregunta: texto1, respuesta: texto2}, function(mensaje){

            }); 

			$('#modal1').modal('close');
				Materialize.toast("Pregunta insertada con exito", 3000, 'rounded');
			imprimir();
		}else{
			alert("Rellenar los campos");
		}
	}

	function cerrar(){
		$('#modal1').modal('close');
	}

	function cerrar2(){
		$('#modal2').modal('close');
	}



	function eliminar(id){

		var confirma = confirm("Esta seguro que desea eliminar pregunta");

            if(confirma){
				$.post("../registerPregunta.php", {eliminar: id}, function(mensaje){
					Materialize.toast("Pregunta eliminada con exito", 3000, 'rounded');
					imprimir();
	            }); 
	        }
	}


	function modificar(id){
		$('#modal2').modal('open');

		$.post("../registerPregunta.php", {id: id, obtenerPregunta: ""}, function(mensaje){
			//console.log(mensaje);
			document.getElementById("preguntaM").value  = mensaje;
        }); 

		$.post("../registerPregunta.php", {id: id, obtenerRespuesta: ""}, function(mensaje){
			document.getElementById("respuestaM").value  = mensaje;
			//console.log(mensaje);
        }); 



		ids = id;
		//document.getElementById("respuestaM").value = "otros"; 
	}

	function modificarPregunta(){

		var aux1 = document.getElementById("preguntaM").value;
		var aux2 = document.getElementById("respuestaM").value;

        $.post("../registerPregunta.php", {id: ids, modificar: "",texto3: aux1,texto4: aux2}, function(mensaje){
			$('#modal2').modal('close');
			Materialize.toast("Pregunta modificada con exito", 3000, 'rounded');
			imprimir();
        }); 

	}



	$("#search").keyup(function(e){
		//alert(e.keyCode);

		var palabra = "";
		var palabra = document.getElementById("buscar").value;
		

		var numeroLetras = palabra.length;

		if(numeroLetras >= 4 && e.keyCode ==13){
			console.log("entra");	
			$.post("../registerPregunta.php", {buscador: palabra}, function(mensaje){
				$("#pric").html(mensaje);
	        }); 
		}


		if(numeroLetras == 0){
			imprimirOtro();
		}

	 });



		$(document).ready(function(){
		    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		    $('.modal').modal();
		});
	</script>
</body>
</html>