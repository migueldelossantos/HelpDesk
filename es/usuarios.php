<?php

	$mysqli=new mysqli("localhost","root","","help"); 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}


	session_start();



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
				<li class="tab"><a href="#">Preguntas Frecuentes</a></li>
			</ul>
		</div>
		<div id="logo-help" class="col s3">
			<a href="logout.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<h3 class="center-align">Usuarios</h3>

		<div class="right-align">
	      	<div class="chip">
		    	<img src="../img/usr.png" alt="Contact Person">
		   		<?php echo $row['name']; ?>
		  	</div>
	  	</div>

		<div class="col s6 offset-s3 card-panel">
			  <div class="col s6">
                <a onclick="agregar();" class="waves-effect waves-light btn red"><i class="material-icons left">add</i>Agregar Nuevo Usuario</a>
              </div>

		    <div class="col s12 offset-s0 card-panel">
              <!-- Grey navigation panel -->


                    <table class="striped highlight" id="todo">
                      <thead>
                        <tr class="red">
                            <th data-field="id" class="center-align" style="width:10%;">Id</th>
                            <th data-field="name" class="center-align" style="width:20%;">Usuario</th>
                            <th data-field="price" class="center-align" style="width:20%;">Nombre</th>
                            <th data-field="price" class="center-align" style="width:10%;">Privilegio</th>
                            <th data-field="price" class="center-align" style="width:10%;">Modificar</th>
                            <th data-field="price" class="center-align" style="width:10%;">Eliminar</th>
                        </tr>
                      </thead>

                      <tbody id="tablas">
                      </tbody>
                    </table>

                  

            </div>


        </div>








     <div id="modal1" class="modal modal-fixed-footer">
	    <div class="modal-content">
	      <h4>Agregar Nuevo Usuario</h4>
	      	<div class="row">
	      		<div class="input-field col s10 offset-s1">
		          <input id="nombre_usuario" placeholder="Introducir Respuesta" id="first_name" type="text" class="validate">
		          <label for="first_name">Introducir Nombre <span>*</span></label>
		        </div>

		        <div class="input-field col s10 offset-s1">
		          <input id="usuario_matricula" placeholder="Introducir Pregunta" id="first_name" type="text" class="validate">
		          <label for="first_name">Introducir Usuario o Matricula<span>*</span></label>
		             <div id="message" style="color: red"></div>
		        </div>

				<div class="row" >
					<div class="input-field col s6 offset-s3">
						<select id="privilegio"  required>
							<option value="0">Administrador</option>
							<option value="1">Profesor</option>
							<option value="2" selected>Estudiante</option>
						</select>
						<label>Privilegio<span>*</span></label>
					</div> 
				</div>



	        </div>

	    </div>
	    	<div class="modal-footer right-align">
		        <a onclick="agregarUsuario();" class="right-align waves-effect waves-light btn green">Aceptar</a>
		        <a onclick="cerrar();" class="right-align waves-effect waves-light btn red">cancelar</a>
	        </div>
	  </div>


	   <div id="modal2" class="modal modal-fixed-footer">
	    <div class="modal-content">
	      <h4>Modificar Usuario</h4>
	      	<div class="row">
	      		<div class="input-field col s10 offset-s1">
		          <input id="nombre_usuario1" placeholder="Introducir Respuesta" id="first_name" type="text" class="validate">
		          <label for="first_name">Nombre</label>
		        </div>

		        <div class="input-field col s10 offset-s1">
		          <input id="usuario_matricula1" placeholder="_" disabled id="first_name" type="text" class="validate">
		          <label for="first_name">Usuario o Matricula</label>
		        </div>

		        <div class="row" id="subProblem" ></div>

				<div class="row col s3 offset-s4">
					<p>
						<input type="checkbox" id="restablecer"/>
						<label for="restablecer">Restablecer Contraseña</label>
					</p>
				</div>

	        </div>

	    </div>
	    	<div class="modal-footer right-align">
		        <a onclick="modificar();" class="right-align waves-effect waves-light btn green">Modificar</a>
		        <a onclick="cerrarM();" class="right-align waves-effect waves-light btn red">cancelar</a>
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
	 	
	 	var idNuevo = 0;
		 imprimir();


		 function imprimir(){
		 		var mtrc = '<?php echo $row['user']; ?>';
		 		console.log(mtrc);

				$.post("../registerUsuarios.php",{imprimir: "", noUsuario: mtrc }, function(mensaje){
					$("#tablas").html(mensaje);
					
		        }); 
		 }




		 function eliminar(id){
			var confirma = confirm("Esta seguro que desea eliminar usuario");

            if(confirma){
				$.post("../registerUsuarios.php", {eliminar: id}, function(mensaje){
					Materialize.toast("Usuario eliminada con exito", 3000, 'rounded');
					imprimir();
	            }); 
	        }

		 }


		 function modificar(){
			
		 	var usuario_matricula = document.getElementById('usuario_matricula1').value;
			var nombre_usuario = document.getElementById('nombre_usuario1').value;
			var Privilegio = document.getElementById('privilegio1').value;
			var restablecer = "false";

			if( $('#restablecer').prop('checked')) {
			    restablecer = "true";
			}else{
				restablecer = "false";
			}

			//console.log(usuario_matricula);
			//console.log(nombre_usuario);
			//console.log(Privilegio+"ZZZZZZZZZZZZZ");
	

			if(usuario_matricula != "" && nombre_usuario!= ""){

				$.post("../registerUsuarios.php", {idNew: idNuevo ,usuario_matriculaM: usuario_matricula,nombre_usuarioM : nombre_usuario,PrivilegioM : Privilegio,restablecerM : restablecer}, function(mensaje){
					$('#modal2').modal('close');
					console.log("++++++++++");
					//console.log(mensaje);
					imprimir();
					Materialize.toast("Usuario Modificado Exitosamente", 3000, 'rounded');
	            }); 



			}else{	
				alert("Falta rellenar Campos");
			}

			

		 	
		 }


		 function modificarM(id){
		 	$('#modal2').modal('open');
		 	var escoger= 0;



		 	$.post("../registerUsuarios.php", {extraerUsuario: id}, function(mensaje){


		 		var myObj = JSON.parse(mensaje);


		 		document.getElementById('usuario_matricula1').value = myObj.usuario;
				document.getElementById('nombre_usuario1').value = myObj.nombre;
				
          		 imprimirOtro(myObj.privilegio);
	        }); 

		 	idNuevo = id;
		 	
		 }

		 function imprimirOtro(id){
		 	
		 	if(id == 0){
		 		$("#subProblem")[0].innerHTML = "<div class='input-field col s6 offset-s3'><select id='privilegio1'><option id='uno' value='0'  selected>Administrador</option><option id='dos' value='1'>Profesor</option><option id='tres' value='2'>Estudiante</option></select><label>Privilegio<span>*</span></label></div>";
		 	}else if(id == 1){
		 		$("#subProblem")[0].innerHTML = "<div class='input-field col s6 offset-s3'><select id='privilegio1'><option id='uno' value='0'>Administrador</option><option id='dos' value='1' selected>Profesor</option><option id='tres' value='2'>Estudiante</option></select><label>Privilegio<span>*</span></label></div>";

		 	}else if(id == 2){
		 		$("#subProblem")[0].innerHTML = "<div class='input-field col s6 offset-s3'><select id='privilegio1'><option id='uno' value='0'>Administrador</option><option id='dos' value='1'>Profesor</option><option id='tres' value='2' selected>Estudiante</option></select><label>Privilegio<span>*</span></label></div>";
		 	}
		 	


		 	$(document).ready(function() {
			    $('select').material_select();
			});
		 }




		function agregar(){
			  $('#modal1').modal('open');
		}

		function agregarUsuario(){
			//console.log(document.getElementById('nombre_usuario').value);
			//console.log(document.getElementById('usuario_matricula').value);
			//console.log(document.getElementById('privilegio').value);
			var usuario_matricula = document.getElementById('usuario_matricula').value;
			var nombre_usuario = document.getElementById('nombre_usuario').value;
			var Privilegio = document.getElementById('privilegio').value;

			if( document.getElementById('nombre_usuario').value == "" ){
				alert("Introducir dato nombre de usuario");
			}
			if(document.getElementById('usuario_matricula').value ==""){
				alert("Introducir dato usuario o matricula");
			}
				
			if(document.getElementById('nombre_usuario').value != "" && usuario_matricula !="" ){
				//alert("ya");
				$.post("../registerUsuarios.php",{VerificarUsuario: usuario_matricula}, function(mensaje){

					console.log(mensaje);
					
					if(mensaje == "noExiste"){

						$.post("../registerUsuarios.php",{usuario: usuario_matricula , nombre: nombre_usuario , privilegio: Privilegio}, function(mensaje){

								Materialize.toast("Usuario Agregado Exitosamente", 3000, 'rounded');
								document.getElementById("message").innerHTML = "";
								document.getElementById('nombre_usuario').value == "";
								document.getElementById('usuario_matricula').value =="";
								$('#modal1').modal('close');
								imprimir();
						});

					}else{
						document.getElementById("message").innerHTML = "! ERROR usuario existente ! ";
					}
		        }); 
			}


		}

		function cerrar(){
			document.getElementById('usuario_matricula').value = "";
			document.getElementById('nombre_usuario').value = "";
			document.getElementById("message").innerHTML = "";
			$('#modal1').modal('close');
		}
		function cerrarM(){
			$('#modal2').modal('close');
		}




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
