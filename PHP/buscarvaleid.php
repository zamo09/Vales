<?php 
$folio = $_GET["folio"];
include("conexion.php");
$conexion = mysql_connect($servidor,$usuario,$contraseña);
			mysql_select_db($BD,$conexion);
			mysql_query("SET NAMES 'utf8'");
$selectvale = mysql_query("SELECT id_empleado, activo FROM vale WHERE id_venta = " . $folio . ";", $conexion);
$sqlvale = mysql_fetch_row($selectvale);
$id_empleado =  $sqlvale[0];
$valeActivo = $sqlvale[1];
$selectEmpleado = mysql_query("SELECT nombre FROM empleados  WHERE id_empleado = " . $id_empleado . " AND activo = 1");
$sqlempleado = mysql_fetch_row($selectEmpleado);
$nombreEmpleado = $sqlempleado[0];
$selectTienda = mysql_query("SELECT tienda FROM venta WHERE id_venta = " . $folio);
$sqltienda = mysql_fetch_row($selectTienda);
$tienda = $sqltienda[0];
header ("Location: ../MOD/verfolio.php?empleado=".$nombreEmpleado."&folio=".$folio."&tienda=".$tienda);
?>