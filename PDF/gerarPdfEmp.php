<?php 
include_once("../fpdf/fpdf.php");
include_once("../funcs/conexao.php");
$resultado_insertEmp = "SELECT * FROM emprestimos"; 
$resultado_Emp = mysqli_query($conn, $resultado_insertEmp);

$pdf = new FPDF();
$pdf-> AddPage();
$pdf-> SetFont('Arial','B',16);
$pdf-> Cell(190,10,utf8_decode('Relatório de Empréstimos'),0,0,"C");
$pdf-> Ln(15);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,7,"Id:",1,0,"C");
$pdf->Cell(40,7,utf8_decode("Nome do Objeto:"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("Disponibilidade:"),1,0,"C");
$pdf->Cell(50,7,utf8_decode("Quem Emprestou:"),1,0,"C");
$pdf->Cell(50,7,utf8_decode("A Quem Emprestou:"),1,0,"C");
$pdf->Ln();
while($row = mysqli_fetch_assoc($resultado_Emp)){
	$pdf->SetFont('Arial','I',10);
	$pdf->Cell(10,7,$row['idEmp'],1,0,"C");
	$pdf->Cell(40,7,utf8_decode($row['nomeDoObjeto']),1,0,"C");
	$pdf->Cell(40,7,utf8_decode($row['disponibilidade']),1,0,"C");
	$pdf->Cell(50,7,utf8_decode($row['quemEmprestou']),1,0,"C");
	$pdf->Cell(50,7,utf8_decode($row['aQuemEmprestou']),1,0,"C");
	$pdf->Ln();}

$pdf->Output();
?>