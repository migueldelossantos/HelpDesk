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
			<a href="../index.php"><div id="session">Cerrar Seción <i class="small material-icons">power_settings_new</i></div></a>
			<a href="menu.php"><img src="../img/Help.png"><h5>Help Desk</h5></a>
		</div>
	</nav>
	<div class="container">
		<h3 class="center-align">Usuarios</h3>

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








     <div id="modal1" class="modal">
	    <div class="modal-content">
	      <h4>Agregar Nuevo Usuario</h4>
	      	<div class="row">
		        <div class="input-field col s10 offset-s1">
		          <input id="pregunta" placeholder="Introducir Pregunta" id="first_name" type="text" class="validate">
		          <label for="first_name">Introducir Usuario</label>
		        </div>

		       	<div class="input-field col s10 offset-s1">
		          <input id="respuesta" placeholder="Introducir Respuesta" id="first_name" type="Password" class="validate">
		          <label for="first_name">Introducir Password</label>
		        </div>
		        <div class="input-field col s10 offset-s1">
		          <input id="respuesta" placeholder="Introducir Respuesta" id="first_name" type="text" class="validate">
		          <label for="first_name">Introducir Nombre</label>
		        </div>
		       	<div class="input-field col s10 offset-s1">
		          <input id="respuesta" placeholder="Introducir Respuesta" id="first_name" type="text" class="validate">
		          <label for="first_name">Introducir Privilegio</label>
		        </div>
	        </div>
	        <div class="right-align">
		        <a onclick="agregarPregunta();" class="right-align waves-effect waves-light btn green">Aceptar</a>
		        <a onclick="cerrar();" class="right-align waves-effect waves-light btn red">cancelar</a>
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


		 function imprimir(){

				$.post("../registerUsuarios.php",{imprimir: ""}, function(mensaje){
					$("#tablas").html(mensaje);
					
		        }); 
			
		 }



		 function eliminar(id){
			var confirma = confirm("Esta seguro que desea eliminar usuaario");

            if(confirma){
				$.post("../registerUsuarios.php", {eliminar: id}, function(mensaje){
					Materialize.toast("Usuario eliminada con exito", 3000, 'rounded');
					imprimir();
	            }); 
	        }

		 }





		function agregar(){
			  $('#modal1').modal('open');
		}

		function cerrar(){
			$('#modal1').modal('close');
		}




	 	$(document).ready(function(){
		    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		    $('.modal').modal();
		});
	 </script>
</body>
</html>