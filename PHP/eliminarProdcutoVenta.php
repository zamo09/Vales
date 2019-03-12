<?php
$idproducto = $_GET["idproducto"];
$idventa = $_GET["idventa"];
$idempleado = $_GET["empleado"];
$tienda = $_GET["tienda"];
	include("conexion.php");
	$DeleteVenta = "DELETE FROM venta WHERE id_producto = " . $idproducto . " AND id_venta= " . $idventa . ";";

	if ($result = $con->query($DeleteVenta)){
			header ("Location: ../venta.php?estatus=1&empleado=".$idempleado."&tiendas=".$tienda);
		}else{
			header ("Location: ../venta.php?estatus=2&empleado=".$idempleado."&tiendas=".$tienda);
		} 
 ?>