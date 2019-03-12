<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Venta por Vale</title>
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">
	<link rel="icon" type="image/png" href="img/vale.ico" />
		<script type="text/javascript" src="JS/tablecloth.js"></script>

</head>
<body>
	<a class="btn btn-primary boton" href="index.php">Regresar</a>	
		<div class="container">
	<form action="PHP/insertarProducto.php" method="GET"><br>
		<h1 class="text-center titulos">Registro de Nuevo Vale</h1>
	<?php 
		$empleado = $_GET["empleado"];
		$tienda = $_GET["tiendas"];

		include("PHP/conexion.php");		
		$selectEmpleado = $con->query("SELECT nombre,empresa FROM empleados WHERE id_empleado = " . $empleado . " AND activo = 1;");
		$nombreEmpleado = $selectEmpleado->fetch_row();
		$selectFolio = $con->query("SELECT id_venta FROM vale WHERE id_empleado = " . $empleado . " AND activo = 1");
		$folio = $selectFolio->fetch_row();
		$venta = "";
		if (empty($folio[0])){
			date_default_timezone_set('America/Mexico_City');
			$fechaphp = date('y/m/d');
			$selectMaxFolio = $con->query("SELECT MAX(id_venta) FROM vale;");
			$maxFolio = $selectMaxFolio->fetch_row();
			$venta = ($maxFolio[0]+1);
			$results=$con->query("INSERT INTO vale (id_venta,id_empleado,activo) VALUES (".$venta.",".$empleado.",1);");
			echo "
			<div class='row form-group'>
					<div class='col-md-4'>
						<label>Empleado:</label><input type='text' name='empleado' class='text-center form-control' value='". $nombreEmpleado[0]  . "' readonly='readonly'>
						</div>
					<div class='col-md-2'>
						<label>Empresa:</label><input type='text' name='empresa' class='text-center form-control' value='" . $nombreEmpleado[1] . "' readonly='readonly'>
					</div>
					<div class='col-md-2'>
						<label>Tienda:</label><input type='text' name='tienda' class='text-center form-control' value='" . $tienda . "' readonly='readonly'>
					</div>
					<div class='col-md-2'>
						<label>Fecha:</label><input type='text' name='fecha' class='text-center form-control' value='" . $fechaphp . "' readonly='readonly'>
					</div>
					<div class='col-md-2'>
						<label>Folio:</label><input type='text' name='folio' class='text-center form-control' value='" . ($maxFolio[0]+1) . "' readonly='readonly'>
					</div>
				</div>";  
				echo "<script>document.write(fech)</script>";  
			$selectventa = $con->query("SELECT P.nombre, V.cantidad, V.precio FROM productos P, venta V WHERE V.id_venta = ".($maxFolio[0]+1)." AND V.id_producto = P.id;");
		}else{
			$venta = $folio[0];
			date_default_timezone_set('America/Mexico_City');
			$fechaphp = date('y/m/d');
			echo "
				<div class='row form-group'>
					<div class='col-md-4'>
						<label>Empleado:</label><input type='text' name='empleado' class='text-center form-control' value='". $nombreEmpleado[0]  . "' readonly='readonly'>
						</div>
					<div class='col-md-2'>
						<label>Empresa:</label><input type='text' name='empresa' class='text-center form-control' value='" . $nombreEmpleado[1] . "' readonly='readonly'>
					</div>
					<div class='col-md-2'>
						<label>Tienda:</label><input type='text' name='tienda' class='text-center form-control' value='" . $tienda . "' readonly='readonly'>
					</div>
					<div class='col-md-2'>
						<label>Fecha:</label><input type='text' name='fecha' class='text-center form-control' value='" . $fechaphp . "' readonly='readonly'>
					</div>
					<div class='col-md-2'>
						<label>Folio:</label><input type='text' name='folio' class='text-center form-control' value='" . $folio[0] . "' readonly='readonly'>
					</div>
				</div>";  
			$selectventa = $con->query("SELECT P.nombre, V.cantidad, V.precio, V.id_producto, V.id_venta FROM productos P, venta V WHERE V.id_venta = ".$folio[0]." AND V.id_producto = P.id;");
		}
	?>
		<h2 class="text-center titulos">Buscador de productos</h2>
		<div class='row form-group'>
			<div class='col-md-4'>
				<label>Codigo del Producto: </label> <input type="text" name="codigo_producto" class='text-center form-control' autofocus>
			</div>
			<div class="col-md-5">
				<label>Nombre del Producto: </label> <input type="text" name="nombre_producto" class='text-center form-control'>
			</div>
			<div class="col-md-2">
				<label>Cantidad: </label> <input type="text" name="cantidad" class='text-center form-control' value="1">
			</div>
			<div class="col-md-1"><br>
				<button type="sumit" class="btn btn-success boton-enviar">Enviar</button>	
			</div>
		</div>	
	</form>
	<h2 id="Total" class="text-center titulos">Lista de productos</h2>
	<table class="table table-bordered">
		<thead class="thead-dark">
		  <tr>
		    <th class="text-center" scope="col">Nombre</th>
		    <th class="text-center" scope="col">Cantidad</th>
		    <th class="text-center" scope="col">Precio</th>
		    <th class="text-center" scope="col">Total</th>
		    <th class="text-center" scope="col">Eliminar</th>
		  </tr>
		 </thead>
	  <?php
	  $totalLine= 0;
	  $total = 0;
	  if(empty($selectventa)){

		}else{
			while ($fila = $selectventa->fetch_row()){
				echo '<tr>';
				echo '<td>' . $fila[0] . '</td>';
				echo '<td class="text-center">' . $fila[1] . '</td>';
				echo '<td class="text-center">' . $fila[2] . '</td>';
				$totalLine = $fila[2]*$fila[1];
				echo '<td class="text-center">' . $totalLine . '</td>';
				echo "<td class='text-center'><a class='btn btn-danger' href=\"PHP/eliminarProdcutoVenta.php?idproducto=".$fila[3]."&idventa=".$fila[4]."&empleado=".$empleado."&tienda=".$tienda."\">Eliminar</a></td>";
				echo '</tr>';
				$total = $total + $totalLine;
			}
		}	
	  ?>
	  <script>
		document.getElementById("Total").innerHTML = "Lista de precios - Total: $" + "<?php echo $total;?>";
		</script>
	  <tr>
		<td class="text-right total titulos" colspan="4">TOTAL:</td>
		<td class="text-center total titulos"><?php echo "$" . $total; ?></td>
	  </tr>
	</table>
	<?php
	echo "<a class='btn btn-warning' href=\"PHP/cerrarVenta.php?idVenta=". $venta."&total=".$total."\" >Cerrar Venta</a>";
	?>
		</div>
	</body>
</html>