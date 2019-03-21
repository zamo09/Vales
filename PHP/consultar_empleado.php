<?php 
	require "conexion.php";
	if (isset($_POST["id"])){
		$user = mysqli_real_escape_string($con, $_POST["id"]);
		$sql =$con->query("SELECT * FROM empleados WHERE id_empleado = '$user' AND activo = 1");
		$num_row = mysqli_num_rows($sql);
		if ($num_row == "1"){
			$data = mysqli_fetch_array($sql);
			echo json_encode($data);
		}else{
			echo "error";
		}
	}else{
		echo "error";
	}
?>