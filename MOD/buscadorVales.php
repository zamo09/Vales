<!DOCTYPE html>
<html>
<head>
	<title>Selecciona Fecha y tienda</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
	<link rel="icon" type="image/png" href="../img/vale.ico" />
</head>
<body>
	<input name="Restablecer" class="boton btn btn-primary" type="reset" value="Atras" onClick="history.back()">
	<div class="container">
		<br><h1 class="text-center titulos">Buscador de vales</h1>
		<p>Para poder buscar un vale tenemos que realizar los siguientes paso:</p>
		<ol>
			<li>Primero seleccionamos la tienda donde se cambio el vale. </li>
			<li>En caso de no conocer el numero de vale podemos buscar por dia</li>
			<li>Si seleccionamos por dia damos clic en enviar en el boton de Enviar Fecha</li>
			<li>Si conocemos el numero de folio simplemente lo escribimos en la parte de "folio" y damos enter o clic en en botor de enviar folio</li>
		</ol>
		<div class="row">
			<div class="col-md-8">
				<form action="informedevales.php" method="GET">
					<div class="row">
						<div class="col-md-5">
							<label>Tienda:</label>
							<select class="text-center form-control" name="tiendas">
								<option value="CDB">CDB</option>
								<option value="LHU">LHU</option>
							</select>
						</div>
						<div class="col-md-5">
							<label>Fecha:</label>
							<input class="text-center form-control" name="fecha" id="date" type="date" required>
						</div>
						<div class="col-md-2"><br>
							<input type="submit" name="" class="btn btn-success boton-enviar" value="Enviar Fecha" id="boton1">
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<!-- busqueda por ID -->
				<form action="../PHP/buscarvaleid.php" method="GET">
					<div class="row">
						<div class="col-md-10">
							<label>Folio:</label>
							<input type="text" class="text-center form-control" name="folio" onkeypress="return valida(event)" required>
						</div>
						<div class="col-md-2"><br>
							<input type="submit" class="btn btn-success boton-enviar" name="" value="Enviar Folio" id="boton1">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script>
	function valida(e){
	    tecla = (document.all) ? e.keyCode : e.which;
	    //Tecla de retroceso para borrar, siempre la permite
	    if (tecla==8){
	        return true;
	    }  
	    if (tecla==13 ){
	        return true;
	    }
	    // Patron de entrada, en este caso solo acepta numeros
	    patron =/[0-9]/;
	    tecla_final = String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	}
	</script><br>
	

</body>
</html>