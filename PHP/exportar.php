<?php
set_time_limit(300);
$user = "odoo";
$password = "elshaddai";
$dbname = "BALTAZAR";
$port = "5432";
$host = "10.0.0.8";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";

$query = "SELECT PP.id as ID, PP.ean13 as CodigoBarras, PP.name_template as Nombre, PT.list_price as Precio, PU.name As Unidad from product_product as PP, product_template as PT, product_uom as PU WHERE PT.id = PP.product_tmpl_id and PT.company_id = 1 and PU.id = PT.uom_id and PT.type = 'product' and PT.sale_ok = TRUE;";

$resultado = pg_query($conexion, $query);

$numReg = pg_num_rows($resultado);

if($numReg>0){
    $servidor = "10.0.0.194"; //Nombre del servidor al que nos conectamos
    $usuario = "zamo"; //Usuario con privilegios para la conexion
    $contraseña = "1614zamo"; //La contraseña del usuario que utilizaremos
    $BD = "vales"; //El nombre de la base de datos
    $conexionSQL = mysql_connect($servidor, $usuario,$contraseña);
    mysql_select_db($BD, $conexionSQL);
    $SQL = "";
    $SQL2 = "";
    $DELETE = "DELETE FROM productos;";
    $result2 = mysql_query($DELETE);
    $results ="";
    $contador = 0;
while ($fila=pg_fetch_array($resultado)) {
  $SQL = "INSERT INTO productos (id,codigo,nombre,precio,unidad) VALUES (". $fila[0] .",'" . $fila[1] . "','" . $fila[2] . "'," . $fila[3] .",'" . $fila[4] ."');";
  $SQL2 = $SQL2 . $SQL;
  $results=mysql_query($SQL);
}
}else{
  echo "No hay Registros";
}
pg_close($conexion);
if ($results){
  header ("Location: ../");
      
    }else{
      echo $results;
      echo $contador;
      echo $SQL2;
    }
?>