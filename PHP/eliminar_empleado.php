<?php 
	require "conexion.php";
	if (isset($_POST["id"])){
		$id = mysqli_real_escape_string($con, $_POST["id"]);
		$sql =$con->query("UPDATE empleados SET activo = 0 WHERE id_empleado = '$id';");
		if ($sql){
			echo "1";
		}else{
			echo "error";
		}
	}else{
		echo "no entro";
	}
?>