<?php	
	$user = $_POST['user'];
	$password = $_POST['password'];

	$mysqli = new mysqli('localhost','root','','help');
	$sql = "SELECT * FROM users WHERE user='".$user."';";

	$result = $mysqli->query($sql);
	if($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$userSelect = $row['user'];
		$passwordSelect = $row['password'];

		if ($user==$userSelect && $password==$passwordSelect){
			session_start();
			$_SESSION['user'] = $userSelect;
			echo "ok";			
		}else{
			echo "err";
		}
	}else{
		echo "err";
	}

