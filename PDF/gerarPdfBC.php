<?php 
include_once("../fpdf/fpdf.php");
include_once("../funcs/conexao.php");
$resultado_insertBC = "SELECT * FROM bolsacopia"; 
$resultado_BC = mysqli_query($conn, $resultado_insertBC);

$pdf = new FPDF();
$pdf->AddFont('Liberation Serif');
$pdf->AddFont('Liberation Serif', 'I');
$pdf->AddFont('Liberation Serif', 'BI');
$pdf->AddFont('Liberation Serif', 'B');

$pdf-> AddPage();
$pdf-> SetFont('Liberation Serif','B',16);
$pdf-> Cell(190,10,utf8_decode('Relatório Bolsa Cópia'),0,0,"C");
$pdf-> Ln(15);

$pdf->SetFont('Liberation Serif','B',10);
$pdf->Cell(30,7,"Id:",1,0,"C");
$pdf->Cell(50,7,utf8_decode("Nome:"),1,0,"C");
$pdf->Cell(70,7,utf8_decode("Matrícula:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode("Laudas:"),1,0,"C");
$pdf->Ln();
while($row = mysqli_fetch_assoc($resultado_BC)){
	$pdf->SetFont('Liberation Serif','I',10);
	$pdf->Cell(30,7,$row['id_bc'],1,0,"C");
	$pdf->Cell(50,7,utf8_decode($row['nome_bc']),1,0,"C");
	$pdf->Cell(70,7,$row['matricula_bc'],1,0,"C");
	$pdf->Cell(30,7,($row['laudas_bc']),1,0,"C");
	$pdf->Ln();}

$pdf->Output();
?>