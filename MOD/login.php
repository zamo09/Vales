<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio de sesion</title>	
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
	<link rel="stylesheet" type="text/css" href="../FONT/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../CSS/animate.css">
	<link rel="icon" type="image/png" href="../img/vale.ico" />
</head>
<body>
	<div class="container animated login fadeInDown ">
		<div class="row h-100 justify-content-center align-items-center">
			<div class="col-md-12">
				<h1 class="titulos text-center">Inicio de sesion</h1>
				<div class="row justify-content-md-center">
					<div class="col-md-4">
						<div class="row justify-content-md-center">
							<label class="titulos2"><i class="fas fa-user"></i> Usuario</label>
						</div>
						<div class="row">
							<input type="text" name="usuario" class="form-control text-center" placeholder="Ingresa el nombre de usuario" required>
						</div>						
					</div>
				</div><br>
				<div class="row justify-content-md-center">
					<div class="col-md-4">
						<div class="row justify-content-md-center">
							<label class="titulos2"><i class="fas fa-lock "></i> Contraseña</label>
						</div>
						<div class="row">
							<input type="password" name="contraseña" class="form-control text-center" placeholder="Ingresa la contraseña" required>
						</div>	
					</div>
				</div><br>
				<div class="row justify-content-md-center">
					<div class="col-md-2 text-right">
						<button class="btn btn-danger" type="sumit"><i class="fas fa-times "></i> Cancelar </button>					
					</div>&nbsp;&nbsp;
					<div class="col-md-2">
						<button class="btn btn-success"><i class="fas fa-check-circle"></i> Continuar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>