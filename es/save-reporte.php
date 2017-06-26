<?php

$id = date("YmdHis");

$fecha = date("Y-m-d");

if (isset($_POST["asunto"])) {
	$asunto = $_POST['asunto'];	
}

if (isset($_POST["usuario"])){
	$usuario = $_POST['usuario'];
}

if (isset($_POST["tipoProblema"])) {
	$tipoProblema = $_POST["tipoProblema"];
}

$estado = "Pendiente";

$visto = 0;

if (isset($_POST["descripcion"])) {
	$descripcion = $_POST['descripcion'];
}

if (isset($_POST["prioridad"])) {
	$prioridad = $_POST['prioridad'];
}

$hora = date("H:i:s");

$mysqli = new mysqli('localhost','root','','help');

if ($tipoProblema == 1) {
	$subProblema = $_POST['subProblema'];

	$sql1 = "INSERT INTO reportes(id, fecha, asunto, usuario, id_tipo_problema, estado, view, descripcion, prioridad, hora) VALUES ('".$id."', '".$fecha."', '".$asunto."', '".$usuario."', '".$tipoProblema."', '".$estado."', '".$visto."', '".$descripcion."', '".$prioridad."', '".$hora."');";

	$sql2= "INSERT INTO reports_plataforma_virtual(id_report, sub_problema) VALUES ('".$id."', '".$subProblema."');";

	$result = $mysqli->query($sql1);
	if($result){
		$result = $mysqli->query($sql2);
		if ($result) {
			echo "ok";
		}else{
			echo "err";
		}
	}else{
		echo "err";
	}

}elseif ($tipoProblema == 2) {
	$tipoEquipo = $_POST['tipoEquipo'];
	$fechaUso = $_POST['fecha_uso'];
	$horaUso = $_POST['hora_uso'];
	$fechaEntrega = $_POST['fecha_entrega'];
	$horaEntrega = $_POST['hora_entrega'];

	$sql1 = "INSERT INTO reportes(id, fecha, asunto, usuario, id_tipo_problema, estado, view, descripcion, prioridad, hora) VALUES ('".$id."', '".$fecha."', '".$asunto."', '".$usuario."', '".$tipoProblema."', '".$estado."', '".$visto."', '".$descripcion."', '".$prioridad."', '".$hora."');";

	$sql2= "INSERT INTO reports_solicitudes_equipo(id_report, equipo, fecha_uso, hora_uso, fecha_entrega, hora_entrega) VALUES ('".$id."', '".$tipoEquipo."', '".$fechaUso."', '".$horaUso."', '".$fechaEntrega."', '".$horaEntrega."');";

	$result = $mysqli->query($sql1);
	if($result){
		$result = $mysqli->query($sql2);
		if ($result) {
			echo "ok";
		}else{
			echo "err";
		}
	}else{
		echo "err";
	}

}elseif ($tipoProblema == 3) {
	$tipoEquipo = $_POST['tipoEquipo'];
	$aula_departamento = $_POST['aula_departamento'];
	$numInventario = $_POST['numInventario'];

	$sql1 = "INSERT INTO reportes(id, fecha, asunto, usuario, id_tipo_problema, estado, view, descripcion, prioridad, hora) VALUES ('".$id."', '".$fecha."', '".$asunto."', '".$usuario."', '".$tipoProblema."', '".$estado."', '".$visto."', '".$descripcion."', '".$prioridad."', '".$hora."');";

	$sql2= "INSERT INTO reports_hardware_danyado(id_report,equipo, aula_departamento, num_inventario) VALUES ('".$id."', '".$tipoEquipo."', '".$aula_departamento."', '".$numInventario."');";

	$result = $mysqli->query($sql1);
	if($result){
		$result = $mysqli->query($sql2);
		if ($result) {
			echo "ok";
		}else{
			echo "err";
		}
	}else{
		echo "err";
	}
}elseif ($tipoProblema == 4) {
	$fechaInstalcion = $_POST['fecha_instalacion'];
	$nombreSoftware = $_POST['nombre_software'];
	$versionSoftware = $_POST['version_software'];
	$aula_departamento = $_POST['aula_departamento'];
	$carrera = $_POST['carrera'];
	$numEquipos = $_POST['num_equipos'];


	$sql1 = "INSERT INTO reportes(id, fecha, asunto, usuario, id_tipo_problema, estado, view, descripcion, prioridad, hora) VALUES ('".$id."', '".$fecha."', '".$asunto."', '".$usuario."', '".$tipoProblema."', '".$estado."', '".$visto."', '".$descripcion."', '".$prioridad."', '".$hora."');";

	$sql2= "INSERT INTO reports_permisos_instalacion(id_report, fecha_instalacion, nombre_soft, version_soft, aula_departamento, carrera, num_equipos) VALUES ('".$id."', '".$fechaInstalcion."', '".$nombreSoftware."', '".$versionSoftware."', '".$aula_departamento."', '".$carrera."', '".$numEquipos."');";

	$result = $mysqli->query($sql1);
	if($result){
		$result = $mysqli->query($sql2);
		if ($result) {
			echo "ok";
		}else{
			echo "err";
		}
	}else{
		echo "err";
	}
}elseif ($tipoProblema == 5) {
	$nombreSoftware = $_POST['nombre_software'];
	$versionSoftware = $_POST['version_software'];
	$fechaUso = $_POST['fecha_uso'];
	$licenciamiento = $_POST['licenciamiento'];

	$sql1 = "INSERT INTO reportes(id, fecha, asunto, usuario, id_tipo_problema, estado, view, descripcion, prioridad, hora) VALUES ('".$id."', '".$fecha."', '".$asunto."', '".$usuario."', '".$tipoProblema."', '".$estado."', '".$visto."', '".$descripcion."', '".$prioridad."', '".$hora."');";

	$sql2= "INSERT INTO reports_solicitudes_software(id_report, nombre_software, version_software, fecha_requerida, licenciamiento) VALUES ('".$id."', '".$nombreSoftware."', '".$versionSoftware."', '".$fechaUso."', '".$licenciamiento."');";

	$result = $mysqli->query($sql1);
	if($result){
		$result = $mysqli->query($sql2);
		if ($result) {
			echo "ok";
		}else{
			echo "err";
		}
	}else{
		echo "err";
	}

}elseif ($tipoProblema == 6) {
	$fechaInicio = $_POST['fecha_inicio'];
	$horaInicio = $_POST['hora_inicio'];
	$carrera = $_POST['carrera'];
	$aula_departamento = $_POST['aula_departamento'];
	$fechaFin = $_POST['fecha_fin'];
	$horaFin = $_POST['hora_fin'];
	$links = $_POST['links'];

	$sql1 = "INSERT INTO reportes(id, fecha, asunto, usuario, id_tipo_problema, estado, view, descripcion, prioridad, hora) VALUES ('".$id."', '".$fecha."', '".$asunto."', '".$usuario."', '".$tipoProblema."', '".$estado."', '".$visto."', '".$descripcion."', '".$prioridad."', '".$hora."');";

	$sql2= "INSERT INTO reports_restricciones_red(id_report, fecha_inicio, hora_inicio, fecha_fin, hora_fin, carrera, aula_departamento,links) VALUES ('".$id."', '".$fechaInicio."', '".$horaInicio."', '".$fechaFin."', '".$horaFin."', '".$carrera."', '".$aula_departamento."', '".$links."');";

	$result = $mysqli->query($sql1);
	if($result){
		$result = $mysqli->query($sql2);
		if ($result) {
			echo "ok";
		}else{
			echo "err";
		}
	}else{
		echo "err";
	}
}