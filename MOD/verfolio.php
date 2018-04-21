<?php
$folio = $_GET["folio"];
$empleado = $_GET["empleado"];
$tienda = $_GET["tienda"];
	include("../PHP/conexion.php");
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
				mysql_query("SET NAMES 'utf8'");	
	$selectventa = mysql_query("SELECT P.nombre, V.cantidad, V.precio, V.id_producto, V.id_venta FROM productos P, venta V WHERE V.id_venta = ".$folio." AND V.id_producto = P.id;",$conexion);
	$selectFecha = mysql_query("SELECT fecha FROM venta WHERE id_venta = " . $folio);
	$sqlFecha = mysql_fetch_row($selectFecha);
	$fecha = $sqlFecha[0];
	?>

	<h1><?php echo $empleado; ?> Folio: <?php echo $folio; ?></h1>
	<h2>Fecha del vale: <?php echo $fecha ?>  Tienda: <?php echo $tienda; ?> </h2>
	<table class="egt">
	  <tr>
	    <th>Nombre</th>
	    <th>Codigo</th>
	    <th>Cantidad</th>
	    <th>Precio</th>
		<th>Total</th>
	  </tr>
	  <a href=""></a>
	  <?php
	  	  $totalLine= "";
	  $total = "";
		while ($fila = mysql_fetch_array($selectventa)){
			echo '<tr>';
				echo '<td>' . $fila[0] . '</td>';
				echo '<td>' . $fila[3] . '</td>';
				echo '<td>' . $fila[1] . '</td>';
				echo '<td>' . $fila[2] . '</td>';
				$totalLine = $fila[2]*$fila[1];
				echo '<td>' . $totalLine . '</td>';
		
			echo '</tr>';
			$total = $total + $totalLine;
		}
?>
	  <tr>
		<td align="right" colspan="4"><?php echo "TOTAL: $" . $total; ?></td>
	  </tr>
	</table>
<a href=javascript:window.print();>Imprimir</a>
<input name="Restablecer" type="reset" value="Atras" onClick="history.back()">
