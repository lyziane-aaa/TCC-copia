<?php 
include_once("../fpdf/fpdf.php");
include_once("../conexao.php");
include_once("../_documentos/elementos/headerPrimeiraPagina.php");


$pdf = new HPDF();
$pdf->AddFont('Liberation Serif');
$pdf->AddFont('Liberation Serif', 'I');
$pdf->AddFont('Liberation Serif', 'BI');
$pdf->AddFont('Liberation Serif', 'B');

	
	
	
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(30); // Define a margem esquerda como 30mm (3cm) conforme Manual de Redação da Presidência da República
$pdf->SetRightMargin(15);// Define a margem esquerda como 15mm conforme Manual de Redação da Presidência da República
$pdf-> AddPage();

$pdf-> SetFont('Liberation Serif','B',11);

$pdf-> Cell(165,207,utf8_decode('Relatório Bolsa Cópia'),1,0,"C"); //
$pdf-> Ln(15);


$pdf->Cell(30,7,"ID:",0,0,"C");
$pdf->Cell(50,7,utf8_decode("Nome:"),0,0,"C");
$pdf->Cell(70,7,utf8_decode("Matrícula:"),1,0,"C");
$pdf->Cell(10,7,utf8_decode("Laudas:"),1,0,"C");
$pdf->Ln();


$pdf->Output();
?>