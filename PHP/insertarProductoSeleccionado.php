<?php
	$empleado = $_GET["empleado"];
	$tienda = $_GET["tienda"];
	$fecha = $_GET["fecha"];
	$folio = $_GET["folio"];
	$codigo = $_GET["codigo"];
	$cantidad = $_GET["cantidad"];
	include("conexion.php");	
	$selectProducto = $con->query("SELECT id, precio FROM productos WHERE id = " . $codigo . ";");
		$SQLProducto = $selectProducto->fetch_row();
		$selectIdEmpleado = $con->query("SELECT id_empleado FROM empleados WHERE nombre = '" . $empleado . "';");
		$SQLempleado = $selectIdEmpleado->fetch_row();
		$InsertVenta = $con->query("INSERT INTO venta (id_producto, cantidad, tienda, precio, fecha, id_venta) VALUES (" . $SQLProducto[0] . ", " . $cantidad . ", '" . $tienda . "', " .$SQLProducto[1] . ",'" . $fecha ."'," .$folio .");",$conexion);
		if ($InsertVenta){
			header ("Location: ../venta.php?estatus=1&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		}else{

			header ("Location: ../venta.php?estatus=2&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		} 
?>