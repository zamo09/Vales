<?php
	$empleado = $_GET["empleado"];
	$tienda = $_GET["tienda"];
	$fecha = $_GET["fecha"];
	$folio = $_GET["folio"];
	$codigo = $_GET["codigo"];
	$cantidad = $_GET["cantidad"];
	include("conexion.php");
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
				mysql_query("SET NAMES 'utf8'");	
	$selectProducto = mysql_query("SELECT id, precio FROM productos WHERE id = " . $codigo . ";");
		$SQLProducto = mysql_fetch_array($selectProducto);
		$selectIdEmpleado = mysql_query("SELECT id_empleado FROM empleados WHERE nombre = '" . $empleado . "';");
		$SQLempleado = mysql_fetch_array($selectIdEmpleado);
		$InsertVenta = mysql_query("INSERT INTO venta (id_producto, cantidad, tienda, precio, fecha, id_venta) VALUES (" . $SQLProducto[0] . ", " . $cantidad . ", '" . $tienda . "', " .$SQLProducto[1] . ",'" . $fecha ."'," .$folio .");",$conexion);
		if ($InsertVenta){
			header ("Location: ../venta.php?estatus=1&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		}else{

			header ("Location: ../venta.php?estatus=2&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		} 
?>