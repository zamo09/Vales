<?php
$fecha = $_GET["fecha"];
$tienda = $_GET["tiendas"];
	include("conexion.php");
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
	$selectProducto = mysql_query("SELECT E.nombre, V.id_venta FROM vale V, empleados E, venta Ve WHERE V.id_empleado = E.id_empleado AND V.id_venta = Ve.id_venta AND Ve.fecha = '" . $fecha ."' AND Ve.tienda = '" . $tienda . "' GROUP BY E.nombre; ");
	?>
	<table class="egt">
	  <tr>
	    <th>Nombre</th>
	    <th>Folio</th>
	    <th>Accion</th>

	  </tr>
	  <a href=""></a>
	  <?php
		while ($fila = mysql_fetch_array($selectProducto)){
			echo '<tr>';
			echo '<td>' . $fila[0] . '</td>';
			echo '<td> ' . $fila[1] . ' </td>';
			echo "<td><a href=\"verfolio.php?folio=".$fila[1]."\">Selccionar</a></td>";
			echo '</tr>';
		}

	echo '</table>';


?>