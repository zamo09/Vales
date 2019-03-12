<?php
$venta = $_GET["idVenta"];
$total = $_GET["total"];
include("conexion.php");
$results=$con->query("UPDATE vale SET activo = 0 WHERE id_venta = ".$venta.";");
if ($results){
	echo '<script language="javascript">alert("Vale Cerrado");</script>'; 
	header ("Location: ../index.php");
}else{
	echo "Algo salio mal";
}
?>