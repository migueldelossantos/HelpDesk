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
			
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<div class="right-align">
			<!--<a onclick="cambiarContrasenia()">-->
			<a class="dropdown-button tooltipped" data-position="top" data-delay="50" data-tooltip="Opciones" data-activates="dropdown1" style="cursor: pointer">
	      	<div class="chip">
		    	<img src="../img/usr.png" alt="Contact Person">
		   		<?php echo $row['name']; ?>
		  	</div>
		  	</a>

		  	<ul id="dropdown1" class="dropdown-content">
			  <li class="center-align"><a  href="logout.php"> <i class="small material-icons">power_settings_new</i></a></li>
			  <li><a onclick="cambiarContrasenia();">Cambiar<br />Contraseña</a></li>
			</ul>

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


	   <div id="modal100" class="modal modal-fixed-footer">
	   <form action="#" id="camCont">
	    <div class="modal-content">
	      <h4 class="center-align">Modificar Contraseña</h4>
	      
	      	<div class="row">
	      		<div class="input-field col s10 offset-s1">
		          <input id="contraseniaActual" placeholder="" id="first_name" type="password" class="validate" required="">
		          <label for="first_name">Contraseña Actual</label>
		        </div>

	      		<div class="input-field col s10 offset-s1">
		          <input id="contraseniaNueva" placeholder="" id="first_name" type="password" class="validate" required="">
		          <label for="first_name">Contraseña Nueva</label>
		        </div>

		        <div class="input-field col s10 offset-s1">
		          <input id="repetirContraseniaNueva" placeholder="" id="first_name" type="password" class="validate" required="">
		          <label for="first_name">Repetir contraseña Nueva</label>
		        </div>

	        </div>
	      
	        

	        <div class="row right-align">
	        	<!--<input class="right-align waves-effect waves-light btn green" type="submit" value="Guardar">-->
	        	<input class="btn green" type="submit" value="Modificar">
	        	<a onclick="cancelarContrasenia();" class="right-align waves-effect waves-light btn red">cancelar</a>
	        </div>
	    </div>
	    	
	    	
	    	<!--<button type="submit">enviar</button>
	    	<div class="modal-footer right-align">
		        <a onclick="modificarContrasenia();" class="right-align waves-effect waves-light btn green">Modificar</a>
		        <a onclick="cancelarContrasenia();" class="right-align waves-effect waves-light btn red">cancelar</a>
	        </div>-->
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
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.js"></script>


	<script type="text/javascript">
		function cambiarContrasenia(){
			$('#modal100').modal('open');
		}


		function cancelarContrasenia(){
											//limpiar campos
			document.getElementById("contraseniaActual").value = "";
			document.getElementById("contraseniaNueva").value = "";
			document.getElementById("repetirContraseniaNueva").value = "";
			$('#modal100').modal('close');
		}



		$(document).ready(function() {
		    $('#camCont').submit(function(){
		    	
		    	var identificador = '<?php echo $row['id']; ?>';
		    	var contraseniaActual = document.getElementById("contraseniaActual").value;
		    	var contraseniaNueva = document.getElementById("contraseniaNueva").value;
		    	var repetirContraseniaNueva = document.getElementById("repetirContraseniaNueva").value;

				$.post("../registerUsuarios.php",{obtenerContrasenia: identificador}, function(mensaje){
					//console.log(mensaje);
					if(mensaje == contraseniaActual){
						console.log("si son iguales");
						if( contraseniaNueva == repetirContraseniaNueva){
							$.post("../registerUsuarios.php",{cambiarNuevaContras: contraseniaNueva,identi : identificador}, function(mensaje){	
								$('#modal100').modal('close');
								Materialize.toast("Contraseña modificada con exito", 3000, 'rounded');

								//limpiar campos
								document.getElementById("contraseniaActual").value = "";
		    					document.getElementById("contraseniaNueva").value = "";
		    					document.getElementById("repetirContraseniaNueva").value = "";
							});
						}else{
							alert("La contraseña nueva y repetir no coinciden");	
						}
					}else{
						alert("Verifique su contraseña");
					}
		        });

		    });
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
