<?php
$idproducto = $_GET["idproducto"];
$idventa = $_GET["idventa"];
$idempleado = $_GET["empleado"];
$tienda = $_GET["tienda"];
	include("conexion.php");
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
	$DeleteVenta = mysql_query("DELETE FROM venta WHERE id_producto = " . $idproducto . " AND id_venta= " . $idventa . ";",$conexion);
	if ($DeleteVenta){
			header ("Location: ../venta.php?estatus=1&empleado=".$idempleado."&tiendas=".$tienda);
		}else{
			header ("Location: ../venta.php?estatus=2&empleado=".$idempleado."&tiendas=".$tienda);
		} 
 ?>