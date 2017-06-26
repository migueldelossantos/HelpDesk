<?php

	$mysqli = new mysqli('localhost','root','','help');
	$mysqli->query("SET NAMES 'utf8'");

	$response = "";

	if(isset($_POST['user'])){
		$user = $_POST['user'];
		$sql = "SELECT * FROM users WHERE user='".$user."';";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		$priv = $row['privilege'];

		if(isset($_POST['fecha']) && isset($_POST['estado']) && isset($_POST['tipoProblema'])){
			$fecha = $_POST['fecha'];
			$tipoProblema = $_POST['tipoProblema'];
			$estado = $_POST['estado'];
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND fecha>='".$fecha."' AND reportes.id_tipo_problema='".$tipoProblema."' AND reportes.estado='".$estado."' ORDER BY reportes.fecha ";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' AND fecha>='".$fecha."' AND reportes.id_tipo_problema='".$tipoProblema."' AND reportes.estado='".$estado."' ORDER BY reportes.fecha;";
			}
		}else if(isset($_POST['fecha']) && isset($_POST['estado'])){
			$fecha = $_POST['fecha'];
			$estado = $_POST['estado'];
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND fecha>='".$fecha."' AND reportes.estado='".$estado."' ORDER BY reportes.fecha ";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' AND fecha>='".$fecha."' AND reportes.estado='".$estado."' ORDER BY reportes.fecha;";
			}
		}else if(isset($_POST['fecha']) && isset($_POST['tipoProblema'])){
			$fecha = $_POST['fecha'];
			$tipoProblema = $_POST['tipoProblema'];
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND fecha>='".$fecha."' AND reportes.id_tipo_problema='".$tipoProblema."' ORDER BY reportes.fecha ";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' AND fecha>='".$fecha."' AND reportes.id_tipo_problema='".$tipoProblema."' ORDER BY reportes.fecha;";
			}
		}else if(isset($_POST['estado']) && isset($_POST['tipoProblema'])){
			$estado = $_POST['estado'];
			$tipoProblema = $_POST['tipoProblema'];
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND reportes.id_tipo_problema='".$tipoProblema."' AND reportes.estado='".$estado."' ORDER BY reportes.fecha ";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' AND reportes.id_tipo_problema='".$tipoProblema."' AND reportes.estado='".$estado."' ORDER BY reportes.fecha;";
			}
		}else if (isset($_POST['fecha'])) {
			$fecha = $_POST['fecha'];
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND fecha>='".$fecha."' ORDER BY reportes.fecha ";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' AND fecha>='".$fecha."' ORDER BY reportes.fecha;";
			}
		}else if (isset($_POST['tipoProblema'])) {
			$tipoProblema = $_POST['tipoProblema'];
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND reportes.id_tipo_problema='".$tipoProblema."' ORDER BY reportes.fecha ";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' AND reportes.id_tipo_problema='".$tipoProblema."' ORDER BY reportes.fecha;";
			}
		}else if (isset($_POST['estado'])) {
			$estado = $_POST['estado'];
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND reportes.estado='".$estado."' ORDER BY reportes.fecha ";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' AND reportes.estado='".$estado."' ORDER BY reportes.fecha;";
			}
		}else{
			if($priv == 0){
				$sql = "SELECT reportes.*,tipo_reporte.nombre,tipo_reporte.id AS id_tipo FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id ORDER BY reportes.fecha ;";
			}else{
				$sql = "SELECT * FROM reportes,tipo_reporte WHERE reportes.id_tipo_problema=tipo_reporte.id AND  usuario='".$user."' ORDER BY reportes.fecha;";
			}
		}

		$result = $mysqli->query($sql);
		$numReports = $result->num_rows;
		$numPage = $numReports/10;
		$numRptRes = $numReports%10;

		//Sección para consultar numumero de reportes y dibujar paginación
		if (isset($_POST['count'])) {
			//Codigo de consulta para contar valores y dibujar paginación
			$response = $numReports;
		}
		//Variable para indicar el inicio de los reportes
		$i = 0;

		//Seccion para dibujar cierto numero de reportes
		if (isset($_POST['page'])){
			$page = $_POST['page'];
			$minReports = $page * 10;
			$maxReports = ($page + 1) * 10;
			if($GLOBALS['numReports']<=$maxReports){
				$maxReports = $GLOBALS['numReports'];
			}
			for ($minReports; $minReports < $maxReports; $minReports++){ 
				$GLOBALS['result']->data_seek($minReports);
				$row = $GLOBALS['result']->fetch_assoc();
				$response = $response."<tr><td>".($minReports+1)."</td><td>".$row['fecha']."</td><td>".$row['asunto']."</td><td>".$row['usuario']."</td><td>".$row['nombre']."</td><td><span class='".$row['estado']."'>".$row['estado']."</span></td><td><a id='".$row['id']."' class='btn-floating green' onclick='deleteReport(".$row['id'].")'><i class='material-icons'>delete</i></a>";
				if($GLOBALS['priv'] == 0){
					$response = $response."<a id='".$row['id']."' class='btn-floating red'  onclick='modificarReport(".$row['id'].")'><i class='material-icons'>mode_edit</i></a>";
				}
				$response = $response."</td></tr>";
			}
		}
	}

echo $response;