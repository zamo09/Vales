<?php
include("../../PHP/conexion.php");	
$selectempleados = $con->query("SELECT * FROM empleados WHERE activo = 1");
?>
<div id="Contenedor" class="container animated login zoomIn bg-light">
	<div class="row h-100 justify-content-center align-items-center">
		<div class="col-md-12 margenSuperios">
			<h1 class="titulos text-center">Lista de Usuarios</h1>
			<div class="row justify-content-md-center">
				<div class="col-md-12">
					<table id="tdEmpleados" class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th class="text-center">Nombre</th>
								<th class="text-center">Empresa</th>
								<th class="text-center">Accion</th>
							</tr>
						<tbody id="developers">
							<?php
							while ($fila = $selectempleados->fetch_row()){
								echo '<tr >';
								echo '<td>' . $fila[1] . '</td>';
								echo '<td class="text-center">' . $fila[2] . '</td>';
								echo '<td class="text-center"><a id="list-empleado" class="btn btn-success btn-sm"><i class="fas fa-address-book"></i> Borrar</a></td>';
								echo '</tr>';
							}
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready( function () {
		$('#tdEmpleados').DataTable( {
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Empleados",
				"infoEmpty": "Mostrando 0 to 0 of 0 Empleados",
				"infoFiltered": "(Filtrado de _MAX_ total Empleados)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Empleados",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Ningun empleado con ese nombre",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},
			"pagingType": "full_numbers"
		} );
	} );
</script>