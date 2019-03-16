<?php 
	require "conexion.php";
	if (isset($_POST["user"])){
		$user = mysqli_real_escape_string($con, $_POST["id"]);
		$sql =$con->query("SELECT * FROM usuarios WHERE id_usuario = '$user' AND activo = 1");
		$num_row = mysqli_num_rows($sql);
		if ($num_row == "1"){
			$data = mysqli_fetch_array($sql);
			return $data;
		}else{
			echo "error";
		}
	}else{
		echo "error";
	}
?>