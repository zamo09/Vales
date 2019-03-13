<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Vales de Despensa CBA</title>
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">
	<link rel="stylesheet" type="text/css" href="CSS/chosen.css">
	<link rel="icon" type="image/png" href="img/vale.ico" />
	<script type="text/javascript" src="JS/sweetalert.min.js"></script>
</head>
<body>
	<div class="backgroundimg">
		

	<form action="venta.php" method="GET">
		<div class="container "><br>
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-md-12">
					<h1 class="text-center titulos">Vales de CBA</h1>
					<p class="text-center titulos2">Pagina para registro de vales de trabajadores de Cafe Córdoba y Casa Baltazar.</p>
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<label>Empleado: </label><br>
							<select name="empleado" data-placeholder="Selecciona un Empleado..." class="form-control chosen-select text-center" required>
								<option value=""></option>
								<?php
								include ("PHP/conexion.php");								    
								$sql="SELECT nombre,id_empleado FROM empleados WHERE activo = 1 ORDER BY nombre;";
								$selectTable = $con->query($sql);		
								while ($fila = $selectTable->fetch_row()){
									echo '<option value="' . $fila[1] . '">' . $fila[0] . '</option>' ;
								}
								?>
							</select>
						</div>
					</div>
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<label>Tienda:</label><br>
							<select name="tiendas" class="form-control text-center">
								<option value="CDB">CDB</option>
								<option value="LHU">LHU</option>
							</select>
						</div>
					</div><br>
					<div class="row justify-content-md-center">
						<div class="col-md-1">
							<button class="btn btn-success" type="sumit">Continuar </button>					
						</div>&nbsp;&nbsp;
						<div class="col-md-1">
							<button onClick="mensaje()" class="btn btn-danger">Exportar</button>
						</div>
						<div class="col-md-1">
							<a class="btn btn-warning" href="MOD/buscadorVales.php">Resumen</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
		</div>
	<script src="JS/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="JS/chosen.jquery.js" type="text/javascript"></script>
	<script src="JS/prism.js" type="text/javascript"></script>
	<script src="JS/init.js" type="text/javascript"></script>
	<script src="JS/bootstrap.js" type="text/javascript"></script>
	<script>
		$(function() {
			$('.chosen-select').chosen();
			$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		});
		function mensaje() {
			swal({
				title: "Quieres Actualizar Precios?",
				text: "Este proceso toma algo de tiempo y cambiara todos los precios del Sistema",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					swal("Correcto los precios se estan actualizando", {
						icon: "success",
					});
					window.location.href = "PHP/exportar.php";
				} else {
					swal("Tranquilo todo sigue igual");
				}
			});
		}

	</script>
</body>
</html>