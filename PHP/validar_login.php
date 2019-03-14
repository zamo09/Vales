<?php 
	session_start();
	require "conexion.php";
	if (isset($_POST["user"]) && isset($_POST["pass"])){
		$user = mysqli_real_escape_string($con, $_POST["user"]);
		$pass = mysqli_real_escape_string($con, $_POST["pass"]);
		$sql =$con->query("SELECT usuario FROM usuarios WHERE usuario = '$user' AND contraseña='$pass'");
		$num_row = mysqli_num_rows($sql);
		if ($num_row == "1"){
			$data = mysqli_fetch_array($sql);
			$_SESSION['user'] = $data['usuario'];
			echo "1";
		}else{
			echo "error";
		}
	}else{
		echo "error";
	}
?>