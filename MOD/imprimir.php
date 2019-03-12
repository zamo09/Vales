<?php 
	include("../PHP/conexion.php");
	require "../fpdf/fpdf.php";
	$folio = $_GET["folio"];
	$empleado = $_GET["empleado"];
	$tienda = $_GET["tienda"];		
	$selectventa = $con->query("SELECT P.nombre, V.cantidad, V.precio, V.id_producto, V.id_venta FROM productos P, venta V WHERE V.id_venta = ".$folio." AND V.id_producto = P.id;");
	$selectFecha = $con->query("SELECT fecha FROM venta WHERE id_venta = " . $folio);
	$sqlFecha = $selectFecha->fetch_row();
	$fecha = $sqlFecha[0];

	$pdf = new FPDF('P','mm','Letter');
	$pdf->SetAutoPageBreak(false);
	$pdf->SetTitle('Resumen de Vale');
	$pdf->AliasNbPages();
    $pdf->AddPage();

    //PDF
	$pdf->AddFont('FjallaOne','', 'FjallaOne-Regular.php');
	$pdf->SetFont('FjallaOne','',20);
	//Margen decorativo iniciando en 0, 0
	$pdf->Image('../img/fondo.png', 0,0, 216, 280, 'PNG');
	//Imagen izquierda
	$pdf->Image('../img/Loco-Cafe.png', 10, 10, 25, 10, 'PNG');
	//Texto de Título
	$pdf->SetXY(20, 10);
	$pdf->MultiCell(170, 8, utf8_decode($empleado), 0, 'C');
	
	//Texto Explicativo
	
	$pdf->SetFont('FjallaOne','',15);
	$pdf->SetXY(6, 25);
    $pdf->MultiCell(190, 4, utf8_decode("Vale Cambiado el dia " . $fecha . " en la tienda " . $tienda . " con el folio " . $folio), 0, 'C');

    $pdf->SetXY(10, 35);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(115,5,utf8_decode('Nombre'),1,1,'C');
	$pdf->SetXY(125, 35);
	$pdf->Cell(20,5,utf8_decode('Codigo'),1,1,'C');
	$pdf->SetXY(145, 35);
	$pdf->Cell(20,5,utf8_decode('Cantidad'),1,1,'C');
	$pdf->SetXY(165, 35);
	$pdf->Cell(20,5,utf8_decode('Precio'),1,1,'C');
	$pdf->SetXY(185, 35);
	$pdf->Cell(20,5,utf8_decode('Total'),1,1,'C');
	$pdf->SetFont('Arial','',10);
	$cantidad_pocision = 35;
	
	$contador=0;
	$total = 0;
    while ($fila = $selectventa->fetch_row()){
        $cantidad_pocision = $cantidad_pocision + 5;
        $pdf->SetXY(10, $cantidad_pocision );
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(115,5,utf8_decode($fila[0]),1,1,'L');          
        $pdf->SetXY(125, ($cantidad_pocision));
        $pdf->Cell(20,5,utf8_decode($fila[3]),1,1,'C'); 
        $pdf->SetXY(145, ($cantidad_pocision));
        $pdf->Cell(20,5,utf8_decode($fila[1]),1,1,'C'); 
        $pdf->SetXY(165, ($cantidad_pocision));
        $pdf->Cell(20,5,utf8_decode($fila[2]),1,1,'C');
        $pdf->SetXY(185, ($cantidad_pocision));
        $pdf->Cell(20,5,utf8_decode(($fila[2]*$fila[1])),1,1,'C'); 
        $contador= $contador +1;
        $total = $total + ($fila[1]*$fila[2]);
    }
    $pdf->SetFont('FjallaOne','',15);
    $pdf->SetXY(125, ($cantidad_pocision+5));
    $pdf->Cell(40,10,utf8_decode("TOTAL:"),1,1,'R'); 
	$pdf->SetXY(165, ($cantidad_pocision+5));
    $pdf->Cell(40,10,utf8_decode("$".$total),1,1,'L'); 



    $pdf->Output('D','Vale_'.$folio.'.pdf');
?>