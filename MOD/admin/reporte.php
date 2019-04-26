<!DOCTYPE html>
<html>
<head>
	<title>Selecciona Fecha y tienda</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
	<link rel="icon" type="image/png" href="../img/vale.ico" />
</head>
<body>
	<?php 
	session_start();
	if(!isset($_SESSION["user"])){
	print '<script> 
		swal({
			title: "¡¡QUE HACES!!", 
			text: "Necesitas iniciar Sesion primero", 
			icon: "error",
			button: false,
		});
	</script>';
	print '<script>setTimeout ("window.location=\'../MOD/\';", 3000);</script>';
}else{
?>
<div class="container animated login zoomIn"><br><br>
	<br><h1 class="text-center titulos">Buscador de vales</h1>
	<p>Para poder buscar un vale tenemos que realizar los siguientes paso:</p>		
	<form action="../PHP/imprimir_reporte.php" method="GET">
		<div class="row">
			<div class="col-md-4">
				<label>Tienda:</label>
				<select class="text-center form-control" name="tiendas" required>
					<option value="CDB">CDB</option>
					<option value="LHU">LHU</option>
					<option value="TOD">Todas</option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Fecha Inicio:</label>
				<input class="text-center form-control" name="fechaI" id="date" type="date" required>
			</div>
			<div class="col-md-3">
				<label>Fecha Fin:</label>
				<input class="text-center form-control" name="fechaF" id="date" type="date" required>
			</div>
			<div class="col-md-2"><br>
				<input type="submit" name="" class="btn btn-success boton-enviar" value="Crear Reporte" id="boton1">
			</div>	
		</div>				
	</form>

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
<?php
}
?>
</body>
</html>