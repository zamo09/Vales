<?php 
include("conexion.php");
require "../fpdf/fpdf.php";
$fechaI = $_GET["fechaI"];
$fechaF = $_GET["fechaF"];
$tienda = $_GET["tiendas"];		
$selectventa = $con->query("SELECT P.id, P.nombre, P.unidad, V.cantidad, V.precio, V.fecha, E.nombre, Va.id_venta FROM productos P, venta V, empleados E, vale Va WHERE P.id = V.id_producto AND Va.id_venta = V.id_venta AND E.id_empleado = Va.id_empleado AND V.fecha >= '$fechaI' AND V.fecha <= '$fechaF' Order By V.fecha;");

$pdf = new FPDF('P','mm','Letter');
class PDF extends FPDF{
	function Footer(){
   $this->SetFont('Arial', 'B', 10);
   $this->SetY(-10);
   $this->Write(5, 'Casa Baltazar S.A. de C.V.');
   $this->SetX(-25);
   $this->AliasNbPages();
   $this->Write(5, $this->PageNo().'/{nb}');
	}
}
//Ejecucion del footer y el header
$pdf = new PDF();
//Hace que el salto de linea no se automatico 
$pdf->SetAutoPageBreak(false);
$pdf->SetTitle('Resumen de Vale');
$pdf->AddPage();
   //PDF

$pdf->AddFont('FjallaOne','', 'FjallaOne-Regular.php');
$pdf->SetFont('FjallaOne','',20);
	//Margen decorativo iniciando en 0, 0
//$pdf->Image('../img/fondo.png', 0,0, 216, 280, 'PNG');
	//Imagen izquierda
$pdf->Image('../img/Loco-Cafe.png', 10, 10, 25, 10, 'PNG');
	//Texto de Título
$pdf->SetXY(20, 10);

	//Texto Explicativo

$pdf->SetFont('FjallaOne','',15);
$pdf->SetXY(6, 25);
$pdf->MultiCell(190, 4, utf8_decode("Reporte mensual del  " . $fechaI . " Al " . $fechaF . " De la tienda " . $tienda), 0, 'C');

$pdf->SetXY(10, 35);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(95,5,utf8_decode('Nombre'),1,1,'C');
$pdf->SetXY(105, 35);
$pdf->Cell(15,5,utf8_decode('Codigo'),1,1,'C');
$pdf->SetXY(120, 35);
$pdf->Cell(10,5,utf8_decode('Cant'),1,1,'C');
$pdf->SetXY(130, 35);
$pdf->Cell(10,5,utf8_decode('$'),1,1,'C');
$pdf->SetXY(140, 35);
$pdf->Cell(10,5,utf8_decode('Total'),1,1,'C');
$pdf->SetXY(150, 35);
$pdf->Cell(20,5,utf8_decode('Fecha'),1,1,'C');
$pdf->SetXY(170, 35);
$pdf->Cell(30,5,utf8_decode('Empleado'),1,1,'C');
$pdf->SetFont('Arial','',10);
$cantidad_pocision = 35;

$contador=0;
$total = 0;
while ($fila = $selectventa->fetch_row()){
	$cantidad_pocision = $cantidad_pocision + 5;

	if ($cantidad_pocision == 265) {
		$pdf->AddPage();
		$pdf->AddFont('FjallaOne','', 'FjallaOne-Regular.php');
		$pdf->SetFont('FjallaOne','',20);
	//Margen decorativo iniciando en 0, 0
		//$pdf->Image('../img/fondo.png', 0,0, 216, 280, 'PNG');
	//Imagen izquierda
		$pdf->Image('../img/Loco-Cafe.png', 10, 10, 25, 10, 'PNG');
		$cantidad_pocision = 25;
	}
	$pdf->SetXY(10, $cantidad_pocision );
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,utf8_decode($fila[1]),1,1,'L');          
	$pdf->SetXY(105, ($cantidad_pocision));
	$pdf->Cell(15,5,utf8_decode($fila[0]),1,1,'C'); 
	$pdf->SetXY(120, ($cantidad_pocision));
	$pdf->Cell(10,5,utf8_decode(number_format(($fila[3]), 2, '.', '')),1,1,'C'); 
	$pdf->SetXY(130, ($cantidad_pocision));
	$pdf->Cell(10,5,utf8_decode($fila[4]),1,1,'C');
	$pdf->SetXY(140, ($cantidad_pocision));
	$pdf->Cell(10,5,utf8_decode(number_format(($fila[3]*$fila[4]), 2, '.', '')),1,1,'C');
	$pdf->SetXY(150, ($cantidad_pocision));
	$pdf->Cell(20,5,utf8_decode($fila[5]),1,1,'C'); 
	$pdf->SetXY(170, ($cantidad_pocision));
	$nombre = substr ($fila[6],0,9);
	$pdf->Cell(30,5,utf8_decode($nombre),1,1,'C'); 
	$contador= $contador +1;
	$total = $total + ( $fila[3]*$fila[4]);
}
$pdf->SetFont('FjallaOne','',15);
$pdf->SetXY(120, ($cantidad_pocision+5));
$pdf->Cell(40,10,utf8_decode("TOTAL:"),1,1,'R'); 
$pdf->SetXY(160, ($cantidad_pocision+5));
$pdf->Cell(40,10,utf8_decode("$".$total),1,1,'L'); 

$pdf->Output('D','ReporteMensual.pdf');
$pdf->Close();
?>