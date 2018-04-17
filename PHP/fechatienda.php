<!DOCTYPE html>
<html>
<head>
	<title>Selecciona Fecha y tienda</title>
</head>
<body>
	<form action="informedevales.php" method="GET"><br>
		<label>Tienda:</label>
			<select name="tiendas">
				<option value="CDB">CDB</option>
				<option value="LHU">LHU</option>
			</select><br><br>
		<input name="fecha" id="date" type="date" required>

		<input type="submit" name="" value="Enviar" id="boton1">
	</form>
</body>
</html>