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

	if(isset($_POST['origen'])){
		$origen = $_POST['origen'];
		$origen = str_replace($caracteres_malos, $caracteres_buenos, $origen);
	}

	if(isset($_POST['destino'])){
		$destino = $_POST['destino'];
		$destino = str_replace($caracteres_malos, $caracteres_buenos, $destino);
	}

	if(isset($_POST['mensaje'])){
		$mensaje = $_POST['mensaje'];
		$mensaje = str_replace($caracteres_malos, $caracteres_buenos, $mensaje);
	}

	if(isset($_POST['conversacion'])){
		$conversacion = $_POST['conversacion'];
		$conversacion = str_replace($caracteres_malos, $caracteres_buenos, $conversacion);
	}

	if(isset($_POST['origenes'])){
		$origenes = $_POST['origenes'];
		$origenes= str_replace($caracteres_malos, $caracteres_buenos, $origenes);
	}

	if(isset($_POST['destinos'])){
		$destinos = $_POST['destinos'];
		$destinos = str_replace($caracteres_malos, $caracteres_buenos, $destinos);
	}


	if (isset($origen)) {

		date_default_timezone_set('Mexico/General');

		$time = time();
		//echo date("d-m-Y (H:i:s)", $time);

		//$fecha = date("d-m-Y", $time);
		$fecha = date("Y-m-d", $time);
		$hora = date("H:i:s", $time);
		//echo $fecha.$hora;





		$query = "INSERT INTO chat(remitente, destino, mensaje, fecha, hora) VALUES ('".$origen."','".$destino."','".$mensaje."','".$fecha."','".$hora."');";
		$resultado = $mysqli->query($query);

		if($resultado)
			$mens = "mensaje registrado";

	};




	if (isset($conversacion)) {

		$query = "SELECT * FROM chat where (remitente = '".$origenes."' and destino = '".$destinos."') or (remitente = '".$destinos."' and destino = '".$origenes."')  order by id asc;";
		$consulta = $mysqli->query($query);

		while($row = $consulta->fetch_assoc()) {
			$mens .= "<p><b>".$row["remitente"]."</b> >>: ".$row["mensaje"]." ___".$row["fecha"]." ".$row["hora"]."</p>";

		}

	};




echo $mens;
?>