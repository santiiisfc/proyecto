<?php
session_start();
    if(!isset($_SESSION['id'])){
        $_SESSION['id'] = [];
    }
require('./pdf/fpdf.php');
include_once("./db_configuration.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('courier', '', 10);
$pdf->Cell(4, 10, '', 0);
$pdf->Image('libros1.jpg' , 10 ,9.5, 12 , 12,'jpg');
$pdf->Cell(10,8,'',0);
$pdf->Cell(150, 10, 'Libreria Santiago', 0);
$pdf->SetFont('courier', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(18);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(80, 8, 'TODOS LOS PEDIDOS REGISTRADOS', 0);
$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 8, 'idpedido', 1,0,"C");
$pdf->Cell(25, 8, 'fecha', 1,0,"C");
$pdf->Cell(25, 8, 'codigou', 1,0,"C");
$pdf->Cell(25, 8, 'iddetalle', 1,0,"C");
$pdf->Cell(25, 8, 'codigol', 1,0,"C");
$pdf->Cell(25, 8, 'cantidad', 1,0,"C");
$pdf->Cell(25, 8, 'precio', 1,0,"C");
$pdf->Ln(8);
$pdf->SetFont('courier', '', 8);
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
//sql
$consulta = ("SELECT * FROM `pedidos` JOIN detallespedido on pedidos.idpedido=detallespedido.idpedido where codigou = ".$_SESSION['id'].";");
$result = $connection->query($consulta);
$totalli = 0;
$total = 0;
while($fila = $result->fetch_object()){
	$pdf->Cell(25, 8,$fila->idpedido, 1,0,"C");
	$pdf->Cell(25, 8,$fila->fecha,1,0,"C");
  $pdf->Cell(25, 8,$fila->codigou,1,0,"C");
    $pdf->Cell(25, 8,$fila->iddetalle,1,0,"C");
  $pdf->Cell(25, 8,$fila->codigol,1,0,"C");
   $pdf->Cell(25, 8,$fila->cantidad,1,0,"C");
    $pdf->Cell(25, 8,$fila->precio,1,0,"C");
	$pdf->Ln(8);
}
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>