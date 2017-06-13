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
					$mensaje.= '<tr>
	                    <td class="center-align" style="width:20%;">'.$row['id'].'</td>
	                    <td class="center-align" style="width:20%;">'.$row['user'].'</td>
	                    <td class="center-align" style="width:10%;">'.$row['name'].'</td>
	                    <td class="center-align" style="width:10%;">'.$row['privilege'].'</td>
	                    <td style="width:10%;"><a class="btn-floating btn-large waves-effect waves-light green"
	                     data-position="bottom" data-delay="50" data-tooltip="Modificar Producto" onclick="modificar('.$row['id'].')"><i class="material-icons">mode_edit</i></a></td>
	                    <td style="width:10%;"><a class="btn-floating btn-large waves-effect waves-light red darken-2" data-position="bottom" data-delay="50" data-tooltip="Eliminar Producto" onclick="eliminar('.$row['id'].')"><i class="material-icons">delete</i></a></td>
	                </tr>';
					}
		}


	};


	if (isset($eliminar)) {


		$query = "delete FROM users WHERE id = '".$eliminar."';";
		$resultado = $mysqli->query($query);

	};



echo $mensaje;
?>