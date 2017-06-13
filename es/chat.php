<?php

	$mysqli=new mysqli("localhost","root","","help"); 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}


	session_start();

	//$_SESSION['user'] = "jorge";


  	if(!isset($_SESSION['user'])){
  		header('Location: ../index.php');
  	}

  	$user = $_SESSION['user'];


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


<style type="text/css">
	
			#panelEmojis{
				background-color: red;
				width: 160px;
				float: left;
				height: 140px;
				position: relative;
				bottom: 230px;
				padding: 10px;
				border-radius: 5px;
			}


			h5 {cursor: pointer} 

			#panelEmojis span{
				font: 150% sans-serif;
				cursor: pointer;
			}
</style>
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
			<a href="logout.php"><div id="session">Cerrar Sesión <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>


	<div class="container">
		<h4 class="center-align">Chat</h4>
		<div class="right-align">
	      	<div class="chip">
		    	<img src="../img/usr.png" alt="Contact Person">
		   		<?php echo $row['name']; ?>
		  	</div>
	  	</div>
		<div class="row">
	    	
	  	</div> 
	  			
		    <div class="row">
		      	<div class="col s8">
					<div class="col s12 offset-s0 card-panel deep-orange accent-2">
						<div class="row">.</div>

						<div id="usuario"></div>


						      

		              	<div id="conversation" class="col s12 offset-s0 card-panel" style="height:220px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
		              		<i class="small material-icons">perm_identity</i> >> Hola
		              		<div class="right-align">
		              			Hola << <i class="small material-icons">perm_identity</i>
		              		</div>
		              	</div>
	             	</div>
	            </div>		 
		      	<div class="col s4">
			        <div class="col s12 offset-s0 card-panel deep-orange accent-2">
				        <h6>Usuarios</h6>
		              	<div class="col s12 offset-s0 card-panel" style="height:300px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
		              		<?php
		              			if($privilegio == 0){

		              				$query = "SELECT * FROM users WHERE user != '".$user."';";
									$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();

									while($row = $consulta->fetch_assoc()){
									$nombre = $row['name']." ";	
										

									
		              		?>

		              		<a onclick="cambiarUsuario('<?php echo $nombre; ?>','<?php echo $row['user'] ?>','<?php echo $user ?>');" class="waves-effect waves-light btn tooltipped red darken-4" data-position="top" data-delay="50" data-tooltip="<?php echo $row['user']; ?>"><i class="material-icons left">perm_identity</i><?php echo $nombre; ?></a>

		              		
		              		<?php } } ?>

		              		<?php
		              			if($privilegio == 1 || $privilegio == 2){

		              				$query = "SELECT * FROM users WHERE privilege = '0';";
									$consulta = $mysqli->query($query);
									
									while($row = $consulta->fetch_assoc()){
										$nombre = $row['name']." ";
										
		              		?>
		              		<a onclick="cambiarUsuario('<?php echo $nombre; ?>','<?php echo $row['user'] ?>','<?php echo $user ?>');" class="waves-effect waves-light btn tooltipped red darken-4" data-position="top" data-delay="50" data-tooltip="<?php echo $row['user']; ?>"><i class="material-icons left">perm_identity</i><?php echo $nombre; ?></a>

		              		<?php } } ?>

	              		</div>
	              	</div>
		    	</div>
		        <div class="col s8 offset-s1 card-panel deep-orange accent-2">   
		        	<h6>Introducir mensaje:</h6>	
		        	<div class="col s2">
		        		<a id="emojis" class="btn-floating btn-large waves-effect waves-light grey"><i class="material-icons">loyalty</i></a>
		        	</div>
	             	<div class="col s8 offset-s0 white">
	              		<input id="message" type="text" name="message">	
	              	</div>
	              	<div class="col s2 offset-s0">
		              	 <a onclick="registerMessages();" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">input</i></a>
	              	</div>
              	</div>



				

              	</div>
              	<div class="row">
              		<div id="panelEmojis" style="display: none;">
						<span class="EmojisBtn" style="background-color: white; ">&#x1f604</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f603</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f600</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f60a</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x263a</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f60d</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f618</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f61a</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f617</span>
						<span class="EmojisBtn" style="background-color: white; ">&#x1f619</span>

						<span class="EmojisBtn" style="background-color: white;">&#x1f61c</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f61d</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f61b</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f633</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f601</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f614</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f60c</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f612</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f602</span>
						<span class="EmojisBtn" style="background-color: white;">&#x1f631</span>
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

	 	var destino = "";
	 	var origen = "";
	 	setInterval("cargarMensaje()",500);
	 	
	 	function cambiarUsuario(names,para,de){

	 		destino = para;
	 		origen = de;


	 		$("#usuario").empty();
	 		$("#usuario").append('<div class="row col s12 white"><div class="row valign-wrapper"><div class="col s2">				              <img src="../img/usuario.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class --></div><div class="col s10"><span class="black-text">'+names+'</span></div></div></div>');
	 	}


	 	
	 	function registerMessages(){

	 		var mensaje = document.getElementById("message").value;
	 		//alert(origen+" "+destino+" "+mensaje);

	 		if(mensaje == ""){
	 			alert("Introducir Mensaje");
	 		}

	 		if(destino == ""){
	 			alert("Agregar Destino");
	 		}


	 		if(destino != "" && mensaje != ""){
	 			console.log(origen,"        ",destino);
		 		$.post("../register.php", {origen: origen,destino: destino,mensaje: mensaje}, function(mensajes) {
	            	
	            	console.log(mensajes);
	            	document.getElementById("message").value = "";
	            	var altura = $("#conversation").prop("scrollHeight");
	            	$("#conversation").scrollTop(altura);
	       	 	});
	 		}
	 	}
	 	

	 	function cargarMensaje(){

	 		//console.log(origen,destino);
	 		$.post("../register.php", {conversacion: "",origenes: origen, destinos: destino}, function(mensajese) {
	            $("#conversation").html(mensajese);
	            $("#conversation p:last-child").css({"background-color": "lightgreen","padding-botton":"20px"});
	            
	            var altura = $("#conversation").prop("scrollHeight");
	            $("#conversation").scrollTop(altura);
	       	});
	 	}


	 	$("#message").keyup(function(e){

	 		if(e.keyCode == 13){
	 			registerMessages();
	 		}
	 	});





	 	//////////////////////////////    

	 	var emojis = document.getElementById('emojis');
	 	var text = document.getElementById('message');

	 	emojis.addEventListener("click", function(){
        	

        	if( $('#panelEmojis').is(":visible") ){
			    panelEmojis.style.display = "none";
			    document.getElementById("message").focus();
			}else{
			    panelEmojis.style.display = "block";
			}

    	});
		

		var emojis = document.getElementsByClassName("EmojisBtn");
		for(var i = 0; i<emojis.length; i++){
			emojis[i].addEventListener("click", function(e){
			text.value = text.value + " " + e.target.innerHTML + " ";
			//panelEmojis.style.display = "none";
			document.getElementById("message").focus();
			})
		}



	 		
	 </script>

</body>
</html>