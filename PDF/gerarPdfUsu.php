<?php 
include_once("../fpdf/fpdf.php");
include_once("../funcs/conexao.php");
$resultado_insertUsu = "SELECT * FROM usuarios"; 
$resultado_Usu = mysqli_query($conn, $resultado_insertUsu);
$pdf = new FPDF();
$pdf-> AddPage();
$pdf-> SetFont('Arial','B',16);
$pdf-> Cell(190,10,utf8_decode('Relatório de Usuários'),0,0,"C");
$pdf-> Ln(15);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,7,"ID:",1,0,"C");
$pdf->Cell(40,7,utf8_decode("Nome:"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("Matrícula:"),1,0,"C");
$pdf->Cell(60,7,utf8_decode("Nível:"),1,0,"C");
$pdf->Ln();
while($row = mysqli_fetch_assoc($resultado_Usu)){
	$pdf->SetFont('Arial','I',10);
	$pdf->Cell(50,7,$row['idUsuarios'],1,0,"C");
	$pdf->Cell(40,7,utf8_decode($row['login']),1,0,"C");
	$pdf->Cell(40,7,$row['matriculaUsuarios'],1,0,"C");
	$pdf->Cell(60,7,$row['nivel'],1,0,"C");
	$pdf->Ln();}

$pdf->Output();
?>