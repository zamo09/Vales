
<!DOCTYPE html>
<html>
<head>
	<title>Informe de vales</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
	<link rel="icon" type="image/png" href="../img/vale.ico" />
</head>
<body>
	<div class="container">
<?php
$fecha = $_GET["fecha"];
$tienda = $_GET["tiendas"];
	include("../PHP/conexion.php");
	$selectProducto = $con->query("SELECT E.nombre, V.id_venta FROM vale V, empleados E, venta Ve WHERE V.id_empleado = E.id_empleado AND V.id_venta = Ve.id_venta AND Ve.fecha = '" . $fecha ."' AND Ve.tienda = '" . $tienda . "' GROUP BY V.id_venta; ");
	?><br>
	<h1 class="text-center titulos">Informe de vales</h1>
	<p class="text-center titulos2">Este es el buscador de folios por fecha, una vez encontrado el folio que buscan solo tendremos que dar clic en el boton seleccionar de dicho folio para ver el contenido del vale cambiado por dicho folio.</p>
	<table class="table table-bordered">
		<thead class="thead-dark">
		  <tr>
		    <th class="text-center">Nombre</th>
		    <th class="text-center">Folio</th>
		    <th class="text-center">Accion</th>
		  </tr>
		</thead>
	  <a href=""></a>
	  <?php
		while ($fila = $selectProducto->fetch_row()){
			echo '<tr>';
			echo '<td>' . $fila[0] . '</td>';
			echo '<td class="text-center"> ' . $fila[1] . ' </td>';
			echo "<td class='text-center'><a class='btn btn-success' href=\"verfolio.php?folio=".$fila[1]."&empleado=" . $fila[0] . "&tienda=" . $tienda . "\">Selccionar</a></td>";
			echo '</tr>';
		}

	echo '</table>';


?><br>
<input class="btn btn-warning" name="Restablecer" type="reset" value="Atras" onClick="history.back()">
</div>
</body>
</html>