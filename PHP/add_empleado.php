<?php 
	session_start();
	require "conexion.php";
	if (isset($_POST["empleado"]) && isset($_POST["empresa"])){
		$empleado = mysqli_real_escape_string($con, $_POST["empleado"]);
		$empresa = mysqli_real_escape_string($con, $_POST["empresa"]);
		$sql =$con->query("INSERT INTO empleados (nombre,empresa,activo) VALUES ('$empleado','$empresa',1);");
		if ($sql){
			echo "1";
		}else{
			echo "error";
		}
	}else{
		echo "error";
	}
?>