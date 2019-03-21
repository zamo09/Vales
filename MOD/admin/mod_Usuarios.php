<div id="Contenedor" class="container animated login zoomIn">
	<div class="row h-100 justify-content-center align-items-center">
		<div class="col-md-12">
			<h1 class="titulos text-center">Nuevo Usuario</h1>
			<p class="text-center">Ingrese los datos del usuario que podra usar el sistema</p>
			<div class="row justify-content-md-center">
				<div class="col-md-4">
					<div class="row justify-content-md-center">
						<label class="titulos2"><i class="fas fa-user"></i> Usuario</label>
					</div>
					<div class="row">
						<input type="text" name="userm" id="userm" class="form-control text-center" placeholder="Nombre que tendra el usuario">
					</div>						
				</div>
				<div class="col-md-4 offset-md-1">
					<div class="row justify-content-md-center">
						<label class="titulos2"><i class="fas fa-user"></i> Tipo de usuario</label>
					</div>
					<div class="row">
						<select class="custom-select text-center" id="tipo" name="tipo">
							<option value="" selected>Escoge el tipo de usuario ...</option>
							<option value="Adm">Administrador</option>
							<option value="Usr">Usuario Simple</option>
						</select>
					</div>						
				</div>
			</div><br>
			<div class="row justify-content-md-center">
				<div class="col-md-4">
					<div class="row justify-content-md-center">
						<label class="titulos2"><i class="fas fa-lock "></i> Contraseña</label>
					</div>
					<div class="row">
						<input type="password" name="pass" id="pass" class="form-control text-center" placeholder="Ingresa la contraseña">
					</div>	
				</div>
				<div class="col-md-4 offset-md-1">
					<div class="row justify-content-md-center">
						<label class="titulos2"><i class="fas fa-unlock "></i> Confirmar Contraseña</label>
					</div>
					<div class="row">
						<input type="password" name="conpass" id="conpass" class="form-control text-center" placeholder="Repite la contraseña">
						<input type="text" name="iduser" id="iduser" class="form-control text-center" hidden>
					</div>	
				</div>
			</div><br>
			<div class="row justify-content-md-center">
				<div class="col-md-2 text-right">
					<button class="btn btn-danger" onClick="salidaModificarUsuario()" type="sumit"><i class="fas fa-times "></i> Cancelar </button>					
				</div>&nbsp;&nbsp;
				<div class="col-md-2">
					<button class="btn btn-info" onClick="modUser()"><i class="fas fa-check-circle"></i> Modificar</button>
				</div>
			</div>
		</div>
	</div>
</div>