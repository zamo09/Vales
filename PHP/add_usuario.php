<?php 
	session_start();
	require "conexion.php";
	if (isset($_POST["usuario"]) && isset($_POST["tipo"]) && isset($_POST["pass"])){
		$usuario = mysqli_real_escape_string($con, $_POST["usuario"]);
		$tipo = mysqli_real_escape_string($con, $_POST["tipo"]);
		$pass = mysqli_real_escape_string($con, $_POST["pass"]);
		$sql =$con->query("INSERT INTO usuarios (usuario,contraseña,tipo,activo) VALUES ('$usuario','$pass','$tipo',1);");
		if ($sql){
			echo "1";
		}else{
			echo "error";
		}
	}else{
		echo "error";
	}
?>