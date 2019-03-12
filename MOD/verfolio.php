<!DOCTYPE html PUBLIC>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Reporte de Vale</title>
		<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
		<link rel="icon" type="image/png" href="../img/vale.ico" />
		<script type="text/javascript" src="../JS/tablecloth.js"></script>
	</head>
	<body>
<?php
$folio = $_GET["folio"];
$empleado = $_GET["empleado"];
$tienda = $_GET["tienda"];
	include("../PHP/conexion.php");	
	$selectventa = $con->query("SELECT P.nombre, V.cantidad, V.precio, V.id_producto, V.id_venta FROM productos P, venta V WHERE V.id_venta = ".$folio." AND V.id_producto = P.id;");
	$selectFecha = $con->query("SELECT fecha FROM venta WHERE id_venta = " . $folio);
	$sqlFecha = $selectFecha->fetch_row();
	$fecha = $sqlFecha[0];
	?>
	<div class="container"><br>
	<h2 class="text-center titulos"><?php echo $empleado; ?> Folio: <?php echo $folio; ?></h2>
	<h2 class="text-center titulos2">Fecha del vale: <?php echo $fecha ?>  Tienda: <?php echo $tienda; ?> </h2><br>
	<table class="table table-bordered">
		<thead class="thead-dark">
		  <tr>
		    <th class="text-center">Nombre</th>
		    <th class="text-center">Codigo</th>
		    <th class="text-center">Cantidad</th>
		    <th class="text-center">Precio</th>
			<th class="text-center">Total</th>
		  </tr>
	 	</thead>
	  <a href=""></a>
	  <?php
	  	  $totalLine= "";
	  $total=0;
		while ($fila = $selectventa->fetch_row()){
			echo '<tr >';
				echo '<td>' . $fila[0] . '</td>';
				echo '<td class="text-center">' . $fila[3] . '</td>';
				echo '<td class="text-center">' . $fila[1] . '</td>';
				echo '<td class="text-center">' . $fila[2] . '</td>';
				$totalLine = $fila[2]*$fila[1];
				echo '<td class="text-center">' . $totalLine . '</td>';
		
			echo '</tr>';
			$total = $total + $totalLine;
		}
?>
	   <tr>
		<td class="text-right total titulos" colspan="4">TOTAL:</td>
		<td class="text-center total titulos"><?php echo "$" . $total; ?></td>
	  </tr>
	</table>
<a class="btn btn-primary" href="imprimir.php?folio=<?php echo $folio ?>&empleado=<?php echo $empleado ?>&tienda=<?php echo $tienda ?>">Imprimir</a>
<input class="btn btn-warning" name="Restablecer" type="reset" value="Atras" onClick="history.back()">
</div>
		</div>	
	</body>
</html>
