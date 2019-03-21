<?php 
	session_start();
	require "conexion.php";
	if (isset($_POST["usuario"]) && isset($_POST["tipo"]) && isset($_POST["pass"])){
		$usuario = mysqli_real_escape_string($con, $_POST["usuario"]);
		$tipo = mysqli_real_escape_string($con, $_POST["tipo"]);
		$pass = mysqli_real_escape_string($con, $_POST["pass"]);
		$id = mysqli_real_escape_string($con, $_POST["id"]);
		$sql =$con->query("UPDATE usuarios SET usuario='$usuario', contraseña='$pass', tipo='$tipo',activo=1 WHERE id_usuario = '$id';");
		if ($sql){
			echo "1";
		}else{
			echo "error";
		}
	}else{
		echo "error";
	}
?>