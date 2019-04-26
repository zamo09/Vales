<html>
<head>
	<title>Panel de administrador</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos-admin.css">
	<link rel="stylesheet" type="text/css" href="../FONT/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../CSS/simple-sidebar.css">
	<link rel="stylesheet" type="text/css" href="../CSS/animate.css">
	<link rel="stylesheet" type="text/css" href="../CSS/datatables.min.css">
	<link rel="icon" type="image/png" href="../img/vale.ico" />
<script type="text/javascript" src="../JS/sweetalert.min.js"></script>
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
			<div class="d-flex toggled" id="wrapper">
				<!-- Sidebar -->
				<div class="bg-light border-right" id="sidebar-wrapper">
					<div class="sidebar-heading border-top">
						<a id="inicio" class="sidebar-heading border-top titulos"><i class="fas fa-home"></i> Casa Baltazar</a>
					</div>
					<div class="list-group list-group-flush">
						<?php 
						if($_SESSION["tipo"] == "Adm"){
						?>
						<button id="adduser" class="list-group-item list-group-item-action bg-light titulos2"><i class="fas fa-user-plus"></i> Agregar Usuario</button>
						<?php }?>
						<button id="addempl" class="list-group-item list-group-item-action bg-light titulos2"><i class="fas fa-plus"></i> Agregar Empleado</button>
						<?php 
						if($_SESSION["tipo"] == "Adm"){
						?>
						<button id="list-usuarios" class="list-group-item list-group-item-action bg-light"><i class="fas fa-address-card"></i> Lista de Usuarios</button>
						<?php }?>
						<button id="list-empleado" class="list-group-item list-group-item-action bg-light"><i class="fas fa-address-book"></i> Lista de Empleados</button>						
						<button id="reporte" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-alt"></i> Reporte</button>
					</div>
				</div>
				<!-- /#sidebar-wrapper -->
				<!-- Page Content -->
				<div id="page-content-wrapper">
					<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top animated login zoomIn">
						<button class="btn btn-primary" id="menu-toggle">Menu</button>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
								<li class="nav-item active">
									<a class="nav-link" href="../">Inicio <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo $_SESSION["user"]; ?>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../PHP/cerrar_sesion.php"><i class="fas fa-times-circle"></i> Cerrar Sesion</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
					<div class="container-fluid" id="Contenedor">
						<div id="Contenedor2" class="container animated login zoomIn">
							<div class="row h-100 justify-content-center align-items-center">
								<div class="col-md-12">
									<h1 class="text-center titulos">Bienvenidos</h1>
									<h2 class="text-center titulos2">Al panel de administrador</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
		</div>
		<!-- /#wrapper -->
		<?php
	} ?>
</body>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../JS/jquery-3.2.1.min.js"></script>	
<script src="../JS/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../JS/datatables.min.js"></script>
<!-- Menu Toggle Script -->
<script>
	function agregarempleado(){
		var empleado = $('#empleado').val();
		var empresa = $('#empresa').val();

		if ($.trim(empleado).length > 0 && $.trim(empresa).length > 0){
			$.ajax({
				url: "../PHP/add_empleado.php",
				method: "POST",
				data: {empleado:empleado, empresa:empresa},
				cache: "false",
				beforeSend:function(){
					$('#agemp').val("Validando...");
				},
				success:function(data){
					$('#agemp').val("Continuar");
					if (data=="1"){
						swal("Perfecto!!", ("Ahora el empleado " + empleado + " ya esta en el sistema" ), "success");
						document.getElementById("empleado").value = "";
						document.getElementById("empresa").value = "";
					}else{
						swal("Tenemos un problema", "Usuario o contraseña incorrecta" , "error");
					}
				}
			});
		}else{
			swal("No me engañes", "Por favor ingresa un usuario y una contraseña" , "error");
		};
	};

		function modificarempleado(){
		var empleado = $('#empleado').val();
		var empresa = $('#empresa').val();
		var id = $('#idempleado').val();

		if ($.trim(empleado).length > 0 && $.trim(empresa).length > 0){
			$.ajax({
				url: "../PHP/mod_empleado.php",
				method: "POST",
				data: {empleado:empleado, empresa:empresa, id:id},
				cache: "false",
				beforeSend:function(){
					$('#agemp').val("Validando...");
				},
				success:function(data){
					$('#agemp').val("Continuar");
					if (data=="1"){
						swal("Perfecto!!", ("Ahora el empleado " + empleado + " ya esta modificado" ), "success");
						document.getElementById("empleado").value = "";
						document.getElementById("empresa").value = "";
					}else{
						swal("Tenemos un problema", "Usuario o contraseña incorrecta" , "error");
					}
				}
			});
		}else{
			swal("No me engañes", "Por favor ingresa un usuario y una contraseña" , "error");
		};
	};

	function agregarusuario(){
		var usuario = $('#user').val();
		var tipo = $('#tipo').val();
		var pass = $('#pass').val();
		var conpass = $('#conpass').val();

		if ($.trim(usuario).length > 0 && $.trim(tipo).length > 0 && $.trim(pass).length > 0 && $.trim(conpass).length > 0){
			if (pass == conpass) {					
				$.ajax({
					url: "../PHP/add_usuario.php",
					method: "POST",
					data: {usuario:usuario, tipo:tipo, pass:pass},
					cache: "false",
					beforeSend:function(){
						$('#btn_adduser').val("Validando...");
					},
					success:function(data){
						$('#btn_adduser').val("Continuar");
						if (data=="1"){
							swal("Perfecto!!", ("Ahora el usuario " + usuario + " ya puede usar el sistema" ), "success");
							document.getElementById("user").value = "";
							var select=document.getElementById("tipo");
							select.selectedIndex=0;
							document.getElementById("pass").value = "";
							document.getElementById("conpass").value = "";
						}else{
							swal("Tenemos un problema", "No se pudo agregar el usuario" , "error");
						}
					}
				});
			}else{
				swal("Contraseñas malas", "Las contraseñas no coinciden" , "error");
			}
		}else{
			swal("No me engañes", "Te faltan datos" , "error");
		};
	};

	function modUser(){
		var usuario = $('#userm').val();
		var tipo = $('#tipo').val();
		var pass = $('#pass').val();
		var conpass = $('#conpass').val();
		var id = $('#iduser').val();
		if ($.trim(usuario).length > 0 && $.trim(tipo).length > 0 && $.trim(pass).length > 0 && $.trim(conpass).length > 0){
			if (pass == conpass) {					
				$.ajax({
					url: "../PHP/mod_usuario.php",
					method: "POST",
					data: {usuario:usuario, tipo:tipo, pass:pass, id: id},
					cache: "false",
					beforeSend:function(){
						$('#btn_adduser').val("Validando...");
					},
					success:function(data){
						$('#btn_adduser').val("Continuar");
						if (data=="1"){
							swal("Perfecto!!", ("Ahora el usuario " + usuario + " fue modificado" ), "success");
							$("#Contenedor").load('admin/list_Usuarios.php');
						}else{
							swal("Tenemos un problema", "No se pudo modificar el usuario" , "error");
						}
					}
				});
			}else{
				swal("Contraseñas malas", "Las contraseñas no coinciden" , "error");
			}
		}else{
			swal("No me engañes", "Te faltan datos" , "error");
		};
	};

	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
	$("#adduser").click(function(event) {
		$("#Contenedor").load('admin/agregar_usuario.php');
		$("#wrapper").toggleClass("toggled");
	});
	$("#inicio").click(function(event) {
		$("#Contenedor").load('admin/inicio.php');
		$("#wrapper").toggleClass("toggled");
	});
	$("#addempl").click(function(event) {
		$("#Contenedor").load('admin/agregar_empleado.php');
		$("#wrapper").toggleClass("toggled");
	});
	$("#list-empleado").click(function(event) {
		$("#Contenedor").load('admin/list_Empleados.php');
		$("#wrapper").toggleClass("toggled");
	});
	$("#list-usuarios").click(function(event) {
		$("#Contenedor").load('admin/list_Usuarios.php');
		$("#wrapper").toggleClass("toggled");
	});
	$("#reporte").click(function(event) {
		$("#Contenedor").load('admin/reporte.php');
		$("#wrapper").toggleClass("toggled");
	});

	function eliminarUsuario(idusuairo){
		$.ajax({
			url: "../PHP/eliminar_usuario.php",
			method: "POST",
			data: {id:idusuairo},
			cache: "false",
			beforeSend:function(){
				$('#eliminarusuario').val("Eliminando...");
			},
			success:function(data){
				$('#eliminarusuario').val("Eliminar");
				if (data=="1"){
					swal("Usuario Eliminado", ("Ahora el usuario ya NO podra entrar al sistema" ), "success");
					$("#Contenedor").load('admin/list_Usuarios.php');
				}else{
					swal("Tenemos un problema", "No se pudo eliminar el usuario" , "error");
				}
			}
		});
	};

	function eliminarEmpleado(idempleado){
		$.ajax({
			url: "../PHP/eliminar_empleado.php",
			method: "POST",
			data: {id:idempleado},
			cache: "false",
			beforeSend:function(){
				$('#eliminarempleado').val("Eliminando...");
			},
			success:function(data){
				$('#eliminarempleado').val("Eliminar");
				if (data=="1"){
					swal("Empleado Eliminado", ("Ahora el Empleado ya NO esta en el sistema" ), "success");
					$("#Contenedor").load('admin/list_Empleados.php');
				}else{
					swal("Tenemos un problema", "No se pudo eliminar el empleado" , "error");
				}
			}
		});
	};

	function modificarUsuario(idusuairo){
		$("#Contenedor").load('admin/mod_Usuarios.php');
		$.ajax({
			url: "../PHP/consultar_usuario.php",
			method: "POST",
			data: {id:idusuairo},
			dataType: 'json',
			cache: "false",
			success:function(data){
				var select = document.getElementById('tipo');
				document.getElementById("userm").value=""+data[1]+"";
				document.getElementById("conpass").value=""+data[2]+"";
				document.getElementById("pass").value=""+data[2]+"";
				document.getElementById("iduser").value= ""+data[0]+""
				if(data[3] == "Adm"){
					select.selectedIndex=1;
				}else{
					select.selectedIndex=2;
				}
			}
		});
	};

	function modEmpleado(idusuario){
		$("#Contenedor").load('admin/mod_Empleado.php');

		$.ajax({
			url: "../PHP/consultar_empleado.php",
			method: "POST",
			data: {id:idusuario},
			dataType: 'json',
			cache: "false",
			success:function(data){
				document.getElementById("empleado").value=""+data[1]+"";
				var select = document.getElementById('empresa');
				document.getElementById("idempleado").value=""+data[0]+"";
				if(data[2] == "CBA"){
					select.selectedIndex=1;
				}else{
					select.selectedIndex=2;
				}
			}
		});
	};

	function salida(){
		$("#Contenedor").load('admin/inicio.php');
	};

	function salidaModificarUsuario(){
		$("#Contenedor").load('admin/list_Usuarios.php');
	};
</script>
</html>




