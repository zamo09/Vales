<html>
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Vales de Despensa CBA</title>
		<link rel="stylesheet" type="text/css" href="CSS/main.css"/>

	</head>
<body>
	<div class="padre">
		<div class="hijo">
			<form action="venta.php" method="GET">
			<div id="contenedor">
				<h1 class="cabecera">Vales de CBA</h1>
				<div class="cont">
				<p>Para registrar el consumo de los vales de despensa internos de CBA se utilizara la siguiente app. ñ</p>
				<div class="select">
					<div class="empleado">
						<label>Empleado: </label><br>
						<select name="empleado">
							<?php
							include ("PHP/conexion.php");
							$conexion = mysql_connect($servidor,$usuario,$contraseña);
										mysql_select_db($BD, $conexion);
							mysql_query("SET NAMES 'utf8'");			    
							$sql="SELECT nombre,id_empleado FROM empleados WHERE activo = 1;";
							$result = mysql_query($sql,$conexion);
							while ($fila = mysql_fetch_array($result)){
								echo '<option value="' . $fila["id_empleado"] . '">' . $fila["nombre"] . '</option>' ;
							}
							?>
						</select>
					</div>
				<br>
				<label>Tienda:</label><br>
					<select name="tiendas">
						<option value="CDB">CDB</option>
						<option value="LHU">LHU</option>
					</select>
				</div>
			<div class="botonera">
				<button type="sumit">Continuar</button>
				<a href="PHP/exportar.php">Exportar</a>
				<a href="PHP/fechatienda.php">Resumen</a>
			</div>
		</div>
			</form>
				
		</div>
	</div>
</body>
</html>