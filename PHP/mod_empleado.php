<?php 
	session_start();
	require "conexion.php";
	if (isset($_POST["empleado"]) && isset($_POST["empresa"])){
		$empleado = mysqli_real_escape_string($con, $_POST["empleado"]);
		$empresa = mysqli_real_escape_string($con, $_POST["empresa"]);
		$id = mysqli_real_escape_string($con, $_POST["id"]);
		$sql =$con->query("UPDATE empleados SET nombre='$empleado', empresa='$empresa' WHERE id_empleado = '$id';");
		if ($sql){
			echo "1";
		}else{
			echo "error";
		}
	}else{
		echo "error";
	}
?>