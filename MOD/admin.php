<html>
<head>
	<title>Panel de administrador</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
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
	<h1 align=center>Bienvenido usuario: <?php echo $_SESSION["user"];?></h1>
	<p align=center><a href="../PHP/cerrar_sesion.php">Logout</a></p>
<?php
} ?>
</body>
</html>




