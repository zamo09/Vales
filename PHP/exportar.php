<!DOCTYPE html>
<html>
<head>
  <title>Carga</title>
  <link rel="stylesheet" type="text/css" media="screen" href="../CSS/carga.css" />
  <script type="text/javascript" src="../JS/sweetalert.min.js"></script>
</head>
<body>
  <script>    
    carga(){
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';        
    }
</script>
<div id='contenedor_carga'>
                    <div id='carga'>

                    </div>
                </div>
<?php

set_time_limit(300);
$user = "odoo";
$password = "19flash64";
$dbname = "BALTAZAR";
$port = "5432";
$host = "10.0.0.14";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";

$query = "SELECT PP.id as ID, PP.ean13 as CodigoBarras, PP.name_template as Nombre, PT.list_price as Precio, PU.name As Unidad from product_product as PP, product_template as PT, product_uom as PU WHERE PT.id = PP.product_tmpl_id and PT.company_id = 1 and PU.id = PT.uom_id and PT.type = 'product' and PT.sale_ok = TRUE;";

$resultado = pg_query($conexion, $query);

$numReg = pg_num_rows($resultado);

if($numReg>0){
              include ("conexion.php");                   

    $SQL = "";
    $SQL2 = "";
    $DELETE = "DELETE FROM productos;";
    $result2 = $con->query($DELETE);
    $results ="";
    $contador = 0;
while ($fila=pg_fetch_array($resultado)) {
  $SQL = "INSERT INTO productos (id,codigo,nombre,precio,unidad) VALUES (". $fila[0] .",'" . $fila[1] . "','" . $fila[2] . "'," . $fila[3] .",'" . $fila[4] ."');";
  $SQL2 = $SQL2 . $SQL;
      echo "<script>";

echo "carga();";

echo "</script>";
  $results=$con->query($SQL);
}
}else{
  echo "No hay Registros";
}
pg_close($conexion);
if ($results){
    print '<script> 
    swal({
      title: "Perfecto", 
      text: "Se actualizaron los precios con respecto a Odoo", 
      icon: "success",
      button: false,
    });
    </script>';
    print '<script>setTimeout ("window.location=\'../\';", 3000);</script>';
  }else{
      echo $results;
      echo $contador;
      echo $SQL2;
    }
?>
</body>
</html>