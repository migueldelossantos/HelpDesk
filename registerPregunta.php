<?php

	$mysqli=new mysqli("localhost","root","","help"); 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

	$mens = "";
	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");

	if(isset($_POST['pregunta'])){
		$pregunta = $_POST['pregunta'];
		$pregunta = str_replace($caracteres_malos, $caracteres_buenos, $pregunta);
	}

	if(isset($_POST['respuesta'])){
		$respuesta = $_POST['respuesta'];
		$respuesta = str_replace($caracteres_malos, $caracteres_buenos, $respuesta);
	}

	if(isset($_POST['imprimir'])){
		$imprimir = $_POST['imprimir'];
		$imprimir = str_replace($caracteres_malos, $caracteres_buenos, $imprimir);
	}

	if(isset($_POST['eliminar'])){
		$eliminar = $_POST['eliminar'];
		$eliminar = str_replace($caracteres_malos, $caracteres_buenos, $eliminar);
	}

	if(isset($_POST['modificar'])){
		$modificar = $_POST['modificar'];
		$modificar = str_replace($caracteres_malos, $caracteres_buenos, $modificar);
	}

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$id = str_replace($caracteres_malos, $caracteres_buenos, $id);
	}

	if(isset($_POST['obtenerPregunta'])){
		$obtenerPregunta = $_POST['obtenerPregunta'];
		$obtenerPregunta = str_replace($caracteres_malos, $caracteres_buenos, $obtenerPregunta);
	}

	if(isset($_POST['obtenerRespuesta'])){
		$obtenerRespuesta = $_POST['obtenerRespuesta'];
		$obtenerRespuesta = str_replace($caracteres_malos, $caracteres_buenos, $obtenerRespuesta);
	}

	if(isset($_POST['texto3'])){
		$texto3 = $_POST['texto3'];
		$texto3 = str_replace($caracteres_malos, $caracteres_buenos, $texto3);
	}

	if(isset($_POST['texto4'])){
		$texto4 = $_POST['texto4'];
		$texto4 = str_replace($caracteres_malos, $caracteres_buenos, $texto4);
	}

///////////////////////////
	if(isset($_POST['imprimir2'])){
		$imprimir2 = $_POST['imprimir2'];
		$imprimir2 = str_replace($caracteres_malos, $caracteres_buenos, $imprimir2);
	}


	if(isset($_POST['buscador'])){
		$buscador = $_POST['buscador'];
		$buscador = str_replace($caracteres_malos, $caracteres_buenos, $buscador);
	}





	if (isset($pregunta)) {




		$query = "INSERT INTO preguntas(pregunta, respuesta) VALUES ('".$pregunta."','".$respuesta."');";
		$resultado = $mysqli->query($query);

		if($resultado)
			$mens = "mensaje registrado";

	};



	if (isset($imprimir)) {

		$query = "SELECT * FROM preguntas;";
				$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();

				while($row = $consulta->fetch_assoc()){
					$mens .= '<li>
				    <div class="collapsible-header"><i class="material-icons">live_help</i>'.$row['pregunta'].'<div class="right-align">
				    <a class=" btn-floating waves-effect waves-light green"
                     data-position="bottom" data-delay="50" data-tooltip="Modificar Producto" onclick="modificar('.$row['id'].')"><i class="material-icons">mode_edit</i></a>
                     <a class=" btn-floating waves-effect waves-light red"
                     data-position="bottom" data-delay="50" data-tooltip="Modificar Producto" onclick="eliminar('.$row['id'].')"><i class="material-icons">delete</i></a>
                     </div></div>
				    <div class="collapsible-body"><p>'.$row['respuesta'].'</p></div>
				  </li>';
				}


	};

	if (isset($imprimir2)) {

		$query = "SELECT * FROM preguntas;";
				$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();

				while($row = $consulta->fetch_assoc()){
					$mens .= '<li>
				    <div class="collapsible-header"><i class="material-icons">live_help</i>'.$row['pregunta'].'</div>
				    <div class="collapsible-body"><p>'.$row['respuesta'].'</p></div>
				  </li>';
				}


	};


if (isset($eliminar)) {


	$query = "delete FROM preguntas WHERE id = '".$eliminar."';";
	$resultado = $mysqli->query($query);

};


if (isset($modificar)) {


	$query = "UPDATE preguntas SET pregunta = '".$texto3."' , respuesta = '".$texto4."' WHERE id = '".$id."';";
	$resultado = $mysqli->query($query);

};



	if (isset($obtenerPregunta)) {

		$query = "SELECT * FROM preguntas WHERE id = '".$id."';";
				$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();

				$row = $consulta->fetch_assoc();
				$mens = $row['pregunta'];


	};

	if (isset($obtenerRespuesta)) {

				$query = "SELECT * FROM preguntas WHERE id = '".$id."';";
				$consulta = $mysqli->query($query);
									//$row = $consulta->fetch_assoc();

				$row = $consulta->fetch_assoc();
				$mens = $row['respuesta'];

	};	



	if (isset($buscador)) {

		$query = "SELECT * FROM preguntas WHERE pregunta LIKE '%$buscador%';";
		$consulta = $mysqli->query($query);

		$filas = $mysqli->affected_rows;

		if ($filas === 0) {
			$mens = "No se encontraron resultados";
		}else{
			while($row = $consulta->fetch_assoc()) {
					$mens .= '<li>
				    <div class="collapsible-header"><i class="material-icons">live_help</i>'.$row['pregunta'].'</div>
				    <div class="collapsible-body"><p>'.$row['respuesta'].'</p></div>
				  </li>';
				}

		}

	};	








echo $mens;
?>