<!DOCTYPE html PUBLIC>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Reporte Papeleria</title>
		<link href="../CSS/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="../JS/tablecloth.js"></script>
	</head>
	<body>
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
	<div id="container">	
	<div id="content">
	<h1 class="central"><?php echo $empleado; ?> Folio: <?php echo $folio; ?></h1>
	<h2 class="central">Fecha del vale: <?php echo $fecha ?>  Tienda: <?php echo $tienda; ?> </h2>
	<table class="egt">
	  <tr>
	    <th class="central">Nombre</th>
	    <th class="central">Codigo</th>
	    <th class="central">Cantidad</th>
	    <th class="central">Precio</th>
		<th class="central">Total</th>
	  </tr>
	  <a href=""></a>
	  <?php
	  	  $totalLine= "";
	  $total = "";
		while ($fila = mysql_fetch_array($selectventa)){
			echo '<tr>';
				echo '<td>' . $fila[0] . '</td>';
				echo '<td class="central">' . $fila[3] . '</td>';
				echo '<td class="central">' . $fila[1] . '</td>';
				echo '<td class="central">' . $fila[2] . '</td>';
				$totalLine = $fila[2]*$fila[1];
				echo '<td class="central">' . $totalLine . '</td>';
		
			echo '</tr>';
			$total = $total + $totalLine;
		}
?>
	  <tr>
		<td align="right" colspan="4"><?php echo "<h1>TOTAL: $" . $total ."</h1>"; ?></td>
	  </tr>
	</table>
<a href=javascript:window.print();>Imprimir</a>
<input name="Restablecer" type="reset" value="Atras" onClick="history.back()">
</div>
		</div>	
	</body>
</html>
