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

<!-- busqueda por ID -->
	<form action="informedevalesId.php" method="GET"><br>
		<label>Folio:</label>
		<input type="text" name="numpiso" onkeypress="return valida(event)">
		<input type="submit" name="" value="Enviar" id="boton1">
	</form>
	<script>
	function valida(e){
	    tecla = (document.all) ? e.keyCode : e.which;
	    //Tecla de retroceso para borrar, siempre la permite
	    if (tecla==8){
	        return true;
	    }  
	    // Patron de entrada, en este caso solo acepta numeros
	    patron =/[0-9]/;
	    tecla_final = String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	}
	</script>
</body>
</html>