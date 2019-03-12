<?php 
$folio = $_GET["folio"];
include("conexion.php");
$selectvale = $con->query("SELECT id_empleado, activo FROM vale WHERE id_venta = " . $folio . ";");
$sqlvale = $selectvale->fetch_row();
$id_empleado =  $sqlvale[0];
$valeActivo = $sqlvale[1];
$selectEmpleado =$con->query("SELECT nombre FROM empleados  WHERE id_empleado = " . $id_empleado . " AND activo = 1");
if(empty($selectEmpleado)){

}else{
	$sqlempleado = $selectEmpleado->fetch_row();
	$nombreEmpleado = $sqlempleado[0];
	$selectTienda = $con->query("SELECT tienda FROM venta WHERE id_venta = " . $folio);
	$sqltienda = $selectTienda->fetch_row();
	$tienda = $sqltienda[0];
}

header ("Location: ../MOD/verfolio.php?empleado=".$nombreEmpleado."&folio=".$folio."&tienda=".$tienda);
?>