<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Venta por Vale</title>
</head>
<body>
	<form action="PHP/insertarProducto.php" method="GET">
	<?php 
		$empleado = $_GET["empleado"];
		$tienda = $_GET["tiendas"];

		include("PHP/conexion.php");
		$conexion = mysql_connect($servidor,$usuario,$contraseña);
					mysql_select_db($BD,$conexion);
					mysql_query("SET NAMES 'utf8'");		
		$selectEmpleado = mysql_query("SELECT nombre,empresa FROM empleados WHERE id_empleado = " . $empleado . " AND activo = 1;",$conexion);
		$nombreEmpleado = mysql_fetch_row($selectEmpleado);
		$selectFolio = mysql_query("SELECT id_venta FROM vale WHERE id_empleado = " . $empleado . " AND activo = 1",$conexion);
		$folio = mysql_fetch_row($selectFolio);
		$venta = "";
		if (empty($folio[0])){
			date_default_timezone_set('America/Mexico_City');
			$fechaphp = date('y/m/d');
			mysql_query("SET NAMES 'utf8'");	
			$selectMaxFolio = mysql_query("SELECT MAX(id_venta) FROM vale;");
			$maxFolio = mysql_fetch_row($selectMaxFolio);
			$venta = ($maxFolio[0]+1);
			$results=mysql_query("INSERT INTO vale (id_venta,id_empleado,activo) VALUES (".$venta.",".$empleado.",1);",$conexion);
			echo "<label>Empleado:<label> <input type='text' name='empleado' value='". $nombreEmpleado[0]  . "' readonly='readonly'><br>
				  <label>Empresa: </label><input type='text' name='empresa' value='" . $nombreEmpleado[1] . "' readonly='readonly'><br>
				  <label>Tienda: </label><input type='text' name='tienda' value='" . $tienda . "' readonly='readonly'><br>
				  <label>Fecha: </label><input type='text' name='fecha' value='" . $fechaphp . "' readonly='readonly'><br>
				  <label>Folio: </label><input type='text' name='folio' value='" . ($maxFolio[0]+1) . "' readonly='readonly'>";
				echo "<script>document.write(fech)</script>";  
			$selectventa = mysql_query("SELECT P.nombre, V.cantidad, V.precio FROM productos P, venta V WHERE V.id_venta = ".($maxFolio[0]+1)." AND V.id_producto = P.id;",$conexion);
		}else{
			mysql_query("SET NAMES 'utf8'");	
			$venta = $folio[0];
			date_default_timezone_set('America/Mexico_City');
			$fechaphp = date('y/m/d');
			echo "<label>Empleado:<label> <input type='text' name='empleado' value='". $nombreEmpleado[0]  . "' readonly='readonly'><br>
				  <label>Empresa: </label><input type='text' name='empresa' value='" . $nombreEmpleado[1] . "' readonly='readonly'><br>
				  <label>Tienda: </label><input type='text' name='tienda' value='" . $tienda . "' readonly='readonly'><br>
				  <label>Fecha: </label><input type='text' name='fecha' value='" . $fechaphp . "' readonly='readonly'><br>
				  <label>Folio: </label><input type='text' name='folio' value='" . $folio[0] . "' readonly='readonly'>";  

			$selectventa = mysql_query("SELECT P.nombre, V.cantidad, V.precio, V.id_producto, V.id_venta FROM productos P, venta V WHERE V.id_venta = ".$folio[0]." AND V.id_producto = P.id;",$conexion);
		}
	?>
		<a href="index.php">Regresar</a>
		<hr style="border-color:red;">
		<h1>Buscador de productos</h1>
		<label>Codigo del Producto: </label> <input type="text" name="codigo_producto" autofocus><br>
		<label>Nombre del Producto: </label> <input type="text" name="nombre_producto"><br>
		<label>Cantidad: </label> <input type="text" name="cantidad" value="1"><br>
		<button type="sumit">Enviar</button>	
	</form>
	<hr style="border-color:red;">
	<h1>Lista de productos</h1>
	<table class="egt">
	  <tr>
	    <th>Nombre</th>
	    <th>Cantidad</th>
	    <th>Precio</th>
	    <th>Total</th>
	    <th>Eliminar</th>
	  </tr>
	  <?php
	  $totalLine= "";
	  $total = "";
	  if(empty($selectventa)){

		}else{
			while ($fila = mysql_fetch_array($selectventa)){
				echo '<tr>';
				echo '<td>' . $fila[0] . '</td>';
				echo '<td>' . $fila[1] . '</td>';
				echo '<td>' . $fila[2] . '</td>';
				$totalLine = $fila[2]*$fila[1];
				echo '<td>' . $totalLine . '</td>';
				echo "<td><a href=\"PHP/eliminarProdcutoVenta.php?idproducto=".$fila[3]."&idventa=".$fila[4]."&empleado=".$empleado."&tienda=".$tienda."\">Eliminar</a></td>";
				echo '</tr>';
				$total = $total + $totalLine;
			}
		}	
	  ?>
	  <tr>
		<td align="right" colspan="4"><?php echo "TOTAL: $" . $total; ?></td>
	  </tr>
	</table>
	<?php
	echo "<a href=\"PHP/cerrarVenta.php?idVenta=". $venta."&total=".$total."\" >Cerrar Venta</a>";
	?>
</body>
</html>