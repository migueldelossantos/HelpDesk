<?php

	$mysqli=new mysqli("localhost","root","","help"); 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

	$mensaje = "";
	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");

	if(isset($_POST['imprimir'])){
		$imprimir = $_POST['imprimir'];
		$imprimir = str_replace($caracteres_malos, $caracteres_buenos, $imprimir);
	}

	if(isset($_POST['eliminar'])){
		$eliminar = $_POST['eliminar'];
		$eliminar = str_replace($caracteres_malos, $caracteres_buenos, $eliminar);
	}

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$id = str_replace($caracteres_malos, $caracteres_buenos, $id);
	}


	if(isset($_POST['noUsuario'])){
		$noUsuario = $_POST['noUsuario'];
		$noUsuario = str_replace($caracteres_malos, $caracteres_buenos, $noUsuario);
	}

	if(isset($_POST['VerificarUsuario'])){
		$VerificarUsuario = $_POST['VerificarUsuario'];
		$VerificarUsuario = str_replace($caracteres_malos, $caracteres_buenos, $VerificarUsuario);
	}

	if(isset($_POST['usuario'])){
		$usuario = $_POST['usuario'];
		$usuario = str_replace($caracteres_malos, $caracteres_buenos, $usuario);
	}

	if(isset($_POST['nombre'])){
		$nombre = $_POST['nombre'];
		$nombre = str_replace($caracteres_malos, $caracteres_buenos, $nombre);
	}

	if(isset($_POST['privilegio'])){
		$privilegio = $_POST['privilegio'];
		$privilegio = str_replace($caracteres_malos, $caracteres_buenos, $privilegio);
	}

	if(isset($_POST['extraerUsuario'])){
		$extraerUsuario = $_POST['extraerUsuario'];
		$extraerUsuario = str_replace($caracteres_malos, $caracteres_buenos, $extraerUsuario);
	}

	if(isset($_POST['idNew'])){
		$idNew = $_POST['idNew'];
		$idNew = str_replace($caracteres_malos, $caracteres_buenos, $idNew);
	}

	if(isset($_POST['usuario_matriculaM'])){
		$usuario_matriculaM = $_POST['usuario_matriculaM'];
		$usuario_matriculaM = str_replace($caracteres_malos, $caracteres_buenos, $usuario_matriculaM);
	}

	if(isset($_POST['nombre_usuarioM'])){
		$nombre_usuarioM = $_POST['nombre_usuarioM'];
		$nombre_usuarioM = str_replace($caracteres_malos, $caracteres_buenos, $nombre_usuarioM);
	}
	if(isset($_POST['PrivilegioM'])){
		$PrivilegioM = $_POST['PrivilegioM'];
		$PrivilegioM = str_replace($caracteres_malos, $caracteres_buenos, $PrivilegioM);
	}
	if(isset($_POST['restablecerM'])){
		$restablecerM = $_POST['restablecerM'];
		$restablecerM = str_replace($caracteres_malos, $caracteres_buenos, $restablecerM);
	}


	if(isset($_POST['imprimirUsuario'])){
		$imprimirUsuario = $_POST['imprimirUsuario'];
		$imprimirUsuario = str_replace($caracteres_malos, $caracteres_buenos, $imprimirUsuario);
	}
	if(isset($_POST['imprimirNombre'])){
		$imprimirNombre = $_POST['imprimirNombre'];
		$imprimirNombre = str_replace($caracteres_malos, $caracteres_buenos, $imprimirNombre);
	}

	///////////////////////, Contraseña  /////////////////////////////////////


	if(isset($_POST['obtenerContrasenia'])){
		$obtenerContrasenia = $_POST['obtenerContrasenia'];
		$obtenerContrasenia = str_replace($caracteres_malos, $caracteres_buenos, $obtenerContrasenia);
	}

	if(isset($_POST['cambiarNuevaContras'])){
		$cambiarNuevaContras = $_POST['cambiarNuevaContras'];
		$cambiarNuevaContras = str_replace($caracteres_malos, $caracteres_buenos, $cambiarNuevaContras);
	}

	if(isset($_POST['identi'])){
		$identi = $_POST['identi'];
		$identi = str_replace($caracteres_malos, $caracteres_buenos, $identi);
	}


	/////////////////////////////////////////////////////////////
	


	if (isset($imprimir)){

		$mensaje = "entra";

		$query = "SELECT * FROM users;";
		$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();
		
		//Obtiene la cantidad de filas que hay en la consulta
		$filas = $mysqli->affected_rows;

		//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		if ($filas === 0) {
			//$mensaje = "hola";
			$mensaje = "Ningun Elemento";
		}else{

					while($row = $consulta->fetch_assoc()){

						$auxz = "";
						if($row['privilege'] == 0){
						 $auxz =  "disabled"; 
						}


						if($noUsuario != $row['user']){

							$mensaje.= '<tr>
			                    <td class="center-align" style="width:20%;">'.$row['id'].'</td>
			                    <td class="center-align" style="width:20%;">'.$row['user'].'</td>
			                    <td class="center-align" style="width:10%;">'.$row['name'].'</td>
			                    <td class="center-align" style="width:10%;">'.$row['privilege'].'</td>
			                    <td style="width:10%;"><a class="btn-floating  waves-effect waves-light green"
			                     data-position="bottom" data-delay="50" data-tooltip="Modificar Producto" onclick="modificarM('.$row['id'].')"><i class="material-icons">mode_edit</i></a></td>
			                    <td style="width:10%;"><a class="btn-floating waves-effect waves-light red darken-2 '.$auxz.'" data-position="bottom" data-delay="50" data-tooltip="Eliminar Producto" onclick="eliminar('.$row['id'].')"><i class="material-icons">delete</i></a></td>
			                </tr>';
	            		}
					}
		}


	};


	if (isset($eliminar)) {

		$query = "delete FROM users WHERE id = '".$eliminar."';";
		$resultado = $mysqli->query($query);

	};



if (isset($VerificarUsuario)){


		//$query = "SELECT * FROM users WHERE user = '".$VerificarUsuario."';";
		$query = "SELECT * FROM users WHERE user = '".$VerificarUsuario."';";
		$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();
		
		//Obtiene la cantidad de filas que hay en la consulta
		$filas = $mysqli->affected_rows;

		//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		if ($filas === 0) {
			//$mensaje = "hola";
			$mensaje = "noExiste";
		}else{
			$mensaje = "Existe";
		}

	};


	if (isset($usuario)){

		$query = "INSERT INTO users(user, password, name,privilege) VALUES ('".$usuario."','".$usuario."','".$nombre."','".$privilegio."');";
			$resultado = $mysqli->query($query);

	};
	


	
	if (isset($extraerUsuario)){

		$query = "SELECT * FROM users WHERE id = '".$extraerUsuario."';";
		$consulta = $mysqli->query($query);

		$row = $consulta->fetch_assoc();


			class Objeto{
				 public $usuario;
				 public $nombre;
				 public $privilegio;
			}

			$objeto = new Objeto();
			$objeto->usuario = $row['user'];
			$objeto->nombre = $row['name'];
			$objeto->privilegio = $row['privilege'];


			$mensaje = json_encode($objeto);

	};

	if (isset($idNew)) {

		if($restablecerM == "true"){
			$mensaje = "no se va a cambiar";
			$query = "UPDATE users SET password = '".$usuario_matriculaM."', name = '".$nombre_usuarioM."' , privilege = '".$PrivilegioM."' WHERE id = '".$idNew."';";
			$resultado = $mysqli->query($query);
		}else{
			$mensaje = "se va a cambiar";
			$query = "UPDATE users SET   name = '".$nombre_usuarioM."' , privilege = '".$PrivilegioM."' WHERE id = '".$idNew."';";
			$resultado = $mysqli->query($query);
		}

		//$mensaje = $restablecerM;



	};


	//Buscadores
	if (isset($imprimirUsuario)){

		//$mensaje = "entra";$query = "SELECT * FROM preguntas WHERE pregunta LIKE '%$buscador%';";

		$query = "SELECT * FROM users WHERE user LIKE '%$imprimirUsuario%';";
		$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();
		
		//Obtiene la cantidad de filas que hay en la consulta
		$filas = $mysqli->affected_rows;

		//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		if ($filas === 0) {
			//$mensaje = "hola";
			$mensaje = "Ningun Elemento";
		}else{

					while($row = $consulta->fetch_assoc()){

						$auxz = "";
						if($row['privilege'] == 0){
						 $auxz =  "disabled"; 
						}


						if($noUsuario != $row['user']){

							$mensaje.= '<tr>
			                    <td class="center-align" style="width:10%;">'.$row['id'].'</td>
			                    <td class="center-align" style="width:30%;">'.$row['user'].'</td>
			                    <td class="center-align" style="width:34%;">'.$row['name'].'</td>
			                    <td class="center-align" style="width:10%;">'.$row['privilege'].'</td>
			                    <td style="width:10%;"><a class="btn-floating  waves-effect waves-light green"
			                     data-position="bottom" data-delay="50" data-tooltip="Modificar Producto" onclick="modificarM('.$row['id'].')"><i class="material-icons">mode_edit</i></a></td>
			                    <td style="width:10%;"><a class="btn-floating waves-effect waves-light red darken-2 '.$auxz.'" data-position="bottom" data-delay="50" data-tooltip="Eliminar Producto" onclick="eliminar('.$row['id'].')"><i class="material-icons">delete</i></a></td>
			                </tr>';
	            		}
					}
		}


	};


	if (isset($imprimirNombre)){

		//$mensaje = "entra";

		$query = "SELECT * FROM users WHERE name LIKE '%$imprimirNombre%';";
		$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();
		
		//Obtiene la cantidad de filas que hay en la consulta
		$filas = $mysqli->affected_rows;

		//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		if ($filas === 0){
			//$mensaje = "hola";
			$mensaje = "Ningun Elemento";
		}else{

					while($row = $consulta->fetch_assoc()){

						$auxz = "";
						if($row['privilege'] == 0){
						 $auxz =  "disabled"; 
						}


						if($noUsuario != $row['user']){

							$mensaje.= '<tr>
			                    <td class="center-align" style="width:10%;">'.$row['id'].'</td>
			                    <td class="center-align" style="width:30%;">'.$row['user'].'</td>
			                    <td class="center-align" style="width:34%;">'.$row['name'].'</td>
			                    <td class="center-align" style="width:10%;">'.$row['privilege'].'</td>
			                    <td style="width:10%;"><a class="btn-floating  waves-effect waves-light green"
			                     data-position="bottom" data-delay="50" data-tooltip="Modificar Producto" onclick="modificarM('.$row['id'].')"><i class="material-icons">mode_edit</i></a></td>
			                    <td style="width:10%;"><a class="btn-floating waves-effect waves-light red darken-2 '.$auxz.'" data-position="bottom" data-delay="50" data-tooltip="Eliminar Producto" onclick="eliminar('.$row['id'].')"><i class="material-icons">delete</i></a></td>
			                </tr>';
	            		}
					}
		}


	};



	////////////////////cambiar contraseña/////////////////////////////

	if (isset($obtenerContrasenia)){


		//$query = "SELECT * FROM users WHERE user = '".$VerificarUsuario."';";
		$query = "SELECT * FROM users WHERE id = '".$obtenerContrasenia."';";
		$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();
		
		//Obtiene la cantidad de filas que hay en la consulta
		//$filas = $mysqli->affected_rows;

		//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		$row = $consulta->fetch_assoc();

						
		$mensaje = $row['password'];

	};




	if (isset($cambiarNuevaContras)) {

	
			$mensaje = "ya";
			$query = "UPDATE users SET password = '".$cambiarNuevaContras."' WHERE id = '".$identi."';";
			$resultado = $mysqli->query($query);


	};

	//////////////////////////////////////////////////////////////////77
	

	
echo $mensaje;
?>
