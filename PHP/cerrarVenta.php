<?php
$venta = $_GET["idVenta"];
$total = $_GET["total"];
include("conexion.php");
$conexion = mysql_connect($servidor,$usuario,$contraseña);
					mysql_select_db($BD,$conexion);
$results=mysql_query("UPDATE vale SET activo = 0 WHERE id_venta = ".$venta.";",$conexion);
if ($results){
	echo '<script language="javascript">alert("Vale Cerrado");</script>'; 
	header ("Location: ../index.php");
}else{
	echo "Algo salio mal";
}
?>