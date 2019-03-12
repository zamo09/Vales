<?php
	$empleado = $_GET["empleado"];
	$empresa = $_GET["empresa"];
	$tienda = $_GET["tienda"];
	$fecha = $_GET["fecha"];
	$folio = $_GET["folio"];
	$codigo = $_GET["codigo_producto"];
	$nombre = $_GET["nombre_producto"];
	$cantidad = $_GET["cantidad"];
	$SQLProducto = "";
	include("conexion.php");	
	if (empty($codigo)){
		$selectProducto = $con->query("SELECT id, precio FROM productos WHERE nombre LIKE '" . $nombre . "%';");
	?>
	<table class="egt">
	  <tr>
	    <th>Nombre</th>
	    <th>Precio</th>
	    <th>Codigo</th>
	    <th>ID</th>
	    <th>Total</th>
	  </tr>
	  <a href=""></a>
	  <?php
		while ($fila = $selectProducto->fetch_row()){
			$TodosProductos = $con->query("SELECT codigo, precio, nombre,id FROM productos WHERE id =" . $fila[0] . " ;");
			$filaProducto = $TodosProductos->fetch_row();
			echo '<tr>';
			echo '<td>' . $filaProducto[2] . '</td>';
			echo '<td>' . $filaProducto[1] . '</td>';
			echo '<td>' . $filaProducto[0] . '</td>';
			echo '<td>' . $filaProducto[3] . '</td>';
			echo "<td><a href=\"insertarProductoSeleccionado.php?codigo=".$filaProducto[3]."&empleado=".$empleado."&cantidad=".$cantidad."&tienda=".$tienda."&fecha=".$fecha."&folio=".$folio."\">Selccionar</a></td>";
			echo '</tr>';
		}
	echo '</table>';
	}else{
	  insertar($codigo,$empleado, $cantidad, $tienda,$fecha, $folio);
	}

	function insertar($codigo,$empleado, $cantidad, $tienda,$fecha, $folio) {
		include("conexion.php");	
      $selectProducto = $con->query("SELECT id, precio FROM productos WHERE codigo = " . $codigo . ";");
		$SQLProducto = $selectProducto->fetch_row();
		$selectIdEmpleado = $con->query("SELECT id_empleado FROM empleados WHERE nombre = '" . $empleado . "';");
		$SQLempleado = $selectIdEmpleado->fetch_row();
		$InsertVenta = $con->query("INSERT INTO venta (id_producto, cantidad, tienda, precio, fecha, id_venta) VALUES (" . $SQLProducto[0] . ", " . $cantidad . ", '" . $tienda . "', " .$SQLProducto[1] . ",'" . $fecha ."'," .$folio .");");
		if ($InsertVenta){
			echo "si entro";
			header ("Location: ../venta.php?estatus=1&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		}else{
			echo "paso";
			header ("Location: ../venta.php?estatus=2&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		} 
    }
?>