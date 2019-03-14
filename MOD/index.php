<?php 
session_start();
if (isset($_SESSION["user"])){
	header("location:admin.php");
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio de sesion</title>	
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../JS/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
	<link rel="stylesheet" type="text/css" href="../FONT/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../CSS/animate.css">
	<link rel="icon" type="image/png" href="../img/vale.ico" />
</head>
<body>
	<div id="Contenedor" class="container animated login zoomIn ">
		<div class="row h-100 justify-content-center align-items-center">
			<div class="col-md-12">
				<h1 class="titulos text-center">Inicio de sesion</h1>
				<div class="row justify-content-md-center">
					<div class="col-md-4">
						<div class="row justify-content-md-center">
							<label class="titulos2"><i class="fas fa-user"></i> Usuario</label>
						</div>
						<div class="row">
							<input type="text" name="user" id="user" class="form-control text-center" placeholder="Ingresa el nombre de usuario" required>
						</div>						
					</div>
				</div><br>
				<div class="row justify-content-md-center">
					<div class="col-md-4">
						<div class="row justify-content-md-center">
							<label class="titulos2"><i class="fas fa-lock "></i> Contraseña</label>
						</div>
						<div class="row">
							<input type="password" name="pass" id="pass" class="form-control text-center" placeholder="Ingresa la contraseña" required>
						</div>	
					</div>
				</div><br>
				<div class="row justify-content-md-center">
					<div class="col-md-2 text-right">
						<button class="btn btn-danger" onClick="salida()" type="sumit"><i class="fas fa-times "></i> Cancelar </button>					
					</div>&nbsp;&nbsp;
					<div class="col-md-2">
						<button class="btn btn-success" name="login" id="login"><i class="fas fa-check-circle"></i> Continuar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<span id="result"></span>
		</div>
	</div>
</body>
</html>
	<script>
		$(document).ready(function(){
			$('#login').click(function(){
				var user = $('#user').val();
				var pass = $('#pass').val();
				if ($.trim(user).length > 0 && $.trim(pass).length > 0){
					$.ajax({
						url: "../PHP/validar_login.php",
						method: "POST",
						data: {user:user, pass:pass},
						cache: "false",
						beforeSend:function(){
							$('#login').val("Validando...");
						},
						success:function(data){
							$('#login').val("Continuar");
							if (data=="1"){
								$(location).attr('href','admin.php');
							}else{
								$('#result').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Usuario o contraseña incorrectas.</div>");
							}
						}
					});
				}else{
					$('#result').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Ingresa un usuario o contraseña</div>");
				};
			});
		});

		function salida(){
			document.getElementById("Contenedor").className = "container animated login zoomOut";
			window.location.href = "../";
		};
	</script>