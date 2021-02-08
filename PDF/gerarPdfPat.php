<?php 
include_once("../fpdf/fpdf.php");
include_once("../conexao.php");
$resultado_insertPat = "SELECT * FROM patrimonioativo"; 
$resultado_Pat = mysqli_query($conn, $resultado_insertPat);

$pdf = new FPDF();
$pdf-> AddPage();
$pdf-> SetFont('Arial','B',16);
$pdf-> Cell(190,10,utf8_decode('Relatório de Usuários'),0,0,"C");
$pdf-> Ln(15);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,7,"Id:",1,0,"C");
$pdf->Cell(25,7,utf8_decode("Nome:"),1,0,"C");
$pdf->Cell(35,7,utf8_decode("Código de Barras:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode("Obtenção:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode("Custo:"),1,0,"C");
$pdf->Cell(60,7,utf8_decode("Observação:"),1,0,"C");
$pdf->Ln();
while($row = mysqli_fetch_assoc($resultado_Pat)){
	$pdf->SetFont('Arial','I',10);
	$pdf->Cell(10,7,$row['idPat'],1,0,"C");
	$pdf->Cell(25,7,utf8_decode($row['nomePat']),1,0,"C");
	$pdf->Cell(35,7,$row['codBarrasPat'],1,0,"C");
	$pdf->Cell(30,7,utf8_decode($row['obtencaoPat']),1,0,"C");
	$pdf->Cell(30,7,$row['custoObt'],1,0,"C");
	$pdf->Cell(60,7,utf8_decode($row['obsPat']),1,0,"C");
	$pdf->Ln();}

$pdf->Output();
?>