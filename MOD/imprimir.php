<!DOCTYPE html>
<html>
<head>
	<title>Reporte de vales</title>
	<link rel="icon" type="image/png" href="../img/vale.ico"/>
</head>
<body>
<?php 
	include("../PHP/conexion.php");
	require "../fpdf/fpdf.php";
	$folio = $_GET["folio"];
	$empleado = $_GET["empleado"];
	$tienda = $_GET["tienda"];		
	$selectventa = $con->query("SELECT P.nombre, V.cantidad, V.precio, V.id_producto, V.id_venta FROM productos P, venta V WHERE V.id_venta = ".$folio." AND V.id_producto = P.id;");
	$selectFecha = $con->query("SELECT fecha FROM venta WHERE id_venta = " . $folio);
	$sqlFecha = $selectFecha->fetch_row();
	$fecha = $sqlFecha[0];
?>
</body>
</html>