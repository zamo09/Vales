<?php
	$con  = new mysqli("10.0.0.194","zamo","1614zamo","vales");
	$con->set_charset("utf8");
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>
