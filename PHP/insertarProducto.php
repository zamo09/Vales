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
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
				mysql_query("SET NAMES 'utf8'");	
	if (empty($codigo)){
		$selectProducto = mysql_query("SELECT id, precio FROM productos WHERE nombre LIKE '" . $nombre . "%';");
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
		while ($fila = mysql_fetch_array($selectProducto)){
			$TodosProductos = mysql_query("SELECT codigo, precio, nombre,id FROM productos WHERE id =" . $fila[0] . " ;");
			$filaProducto = mysql_fetch_row($TodosProductos);
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
		 insertar($codigo,$empleado, $cantidad, $tienda,$fecha, $folio,$conexion);
	}

	function insertar($codigo,$empleado, $cantidad, $tienda,$fecha, $folio,$conexion) {
      $selectProducto = mysql_query("SELECT id, precio FROM productos WHERE codigo = " . $codigo . ";");
		$SQLProducto = mysql_fetch_array($selectProducto);
		$selectIdEmpleado = mysql_query("SELECT id_empleado FROM empleados WHERE nombre = '" . $empleado . "';");
		$SQLempleado = mysql_fetch_array($selectIdEmpleado);
		$InsertVenta = mysql_query("INSERT INTO venta (id_producto, cantidad, tienda, precio, fecha, id_venta) VALUES (" . $SQLProducto[0] . ", " . $cantidad . ", '" . $tienda . "', " .$SQLProducto[1] . ",'" . $fecha ."'," .$folio .");",$conexion);
		if ($InsertVenta){
			echo "si entro";
			header ("Location: ../venta.php?estatus=1&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		}else{
			echo "paso";
			header ("Location: ../venta.php?estatus=2&empleado=".$SQLempleado[0]."&tiendas=".$tienda);
		} 
    }
?>