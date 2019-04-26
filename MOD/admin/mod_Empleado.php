
<div class="container animated login zoomIn">
	<div class="row h-100 justify-content-center align-items-center">
		<div class="col-md-12">
			<h1 class="titulos text-center">Agregar Empleado</h1>
			<div class="row justify-content-md-center">
				<div class="col-md-4">
					<div class="row justify-content-md-center">
						<label class="titulos2"><i class="fas fa-user"></i> Nombre: </label>
					</div>
					<div class="row">
						<input type="text" name="empleado" id="empleado" class="form-control text-center" placeholder="Nombre de empleado" required>
					</div>						
				</div>
			</div><br>
			<div class="row justify-content-md-center">
				<div class="col-md-4">
					<div class="row justify-content-md-center">
						<label class="titulos2"><i class="fas fa-industry "></i> Empresa: </label>
					</div>
					<input type="text" id="idempleado" hidden>
					<div class="row">
						<select class="custom-select text-center" id="empresa" name="empresa">
							<option value="" selected>Selecciona una empresa ...</option>
							<option value="CBA">CBA</option>
							<option value="CBC">CBC</option>
						</select>
					</div>	
				</div>
			</div><br>
			<div class="row justify-content-md-center">
				<div class="col-md-2 text-right">
					<button class="btn btn-danger" onClick="salida()" type="sumit"><i class="fas fa-times "></i> Cancelar </button>					
				</div>&nbsp;&nbsp;
				<div class="col-md-2">
					<button class="btn btn-info" onClick="modificarempleado()" name="agemp" id="agemp"><i class="fas fa-check-circle"></i> Modificar</button>
				</div>
			</div>
		</div>
	</div>
</div>