<?php
include("../../PHP/conexion.php");	
$selectusuarios = $con->query("SELECT * FROM usuarios WHERE activo = 1");
?>
<div id="listu" class="container bg-light animated login zoomIn">
	<div class="row h-100 justify-content-center align-items-center">
		<div class="col-md-12 margenSuperios">
			<h1 class="titulos text-center">Lista de Usuarios</h1>
			<div class="row justify-content-md-center">
				<div class="col-md-12">
					<table id="tdusuarios" class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th class="text-center">Nombre</th>
								<th class="text-center">Contraseña</th>
								<th class="text-center">Tipo</th>
								<th class="text-center">Accion</th>
							</tr>
						</thead>
							<?php
							while ($fila = $selectusuarios->fetch_row()){
								echo '<tr >';
								echo '<td>' . $fila[1] . '</td>';
								echo '<td class="text-center">' . $fila[2] . '</td>';
								echo '<td class="text-center">' . $fila[3] . '</td>';
								echo '<td class="text-center">
										<a onClick="eliminarUsuario('.$fila[0].')" id="eliminarusuario" class="text-light btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</a>
										<a onClick="modificarUsuario('.$fila[0].')" id="eliminarusuario" class="text-light btn btn-info btn-sm"><i class="fas fa-edit"></i> Modificar</a>
								</td>';
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
		$('#tdusuarios').DataTable( {
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
				"infoEmpty": "Mostrando 0 to 0 of 0 Usuarios",
				"infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Usuarios",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Ningun usuario con ese nombre",
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