<?php 
include_once("../../../fpdf/fpdf.php");
include_once("../../../conexao.php");
include_once("../../../documentos/interno/elementos/pdf_html.php");

$id_doc_ofc = filter_input(INPUT_GET, 'id_doc_ofc', FILTER_SANITIZE_NUMBER_INT);
$id =intval ($id_doc_ofc);


$query = "SELECT * FROM documentos_ofc WHERE id_doc_ofc ='$id'";

$query1 = mysqli_query($conn,$query);
$array = mysqli_fetch_assoc($query1);




$titulo_doc_ofc = $array['titulo_doc_ofc'];
$titulo_doc_ofcB = str_replace("/","_",$titulo_doc_ofc);	
$num_doc_ofc = $array['num_doc_ofc'];
$data_doc_ofc =  $array['data_doc_ofc'];
$endrc_doc_ofc =  $array['endrc_doc_ofc'];
$assunto_doc_ofc =  $array['assunto_doc_ofc'];
$corpo_doc_ofc = $array['corpo_doc_ofc'];
$fecho_doc_ofc =  $array['fecho_doc_ofc'];
$assinatura_doc_ofc =  $array['assinatura_doc_ofc'];
$cargo_doc_ofc =  $array['cargo_doc_ofc'];





$pdf = new PDF_HTML();
/*$pdf->AddFont('Liberation Serif');
$pdf->AddFont('Liberation Serif', 'I');
$pdf->AddFont('Liberation Serif', 'BI');
$pdf->AddFont('Liberation Serif', 'B');*/

	
	
	
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(30); // Define a margem esquerda como 30mm (3cm) conforme Manual de Redação da Presidência da República
$pdf->SetRightMargin(15);// Define a margem esquerda como 15mm conforme Manual de Redação da Presidência da República
$pdf-> AddPage();
$pdf->SetFont('Times','B',11);
//$pdf-> SetFont('Liberation Serif','B',11);

$pdf-> Cell(165,5,utf8_decode("$num_doc_ofc"),0,0,"L"); //'OFÍCIO 2020.10/DIEXE/GEVP
$pdf-> Ln(5);
//$pdf->SetFont('Liberation Serif');
$pdf-> Cell(165,5,utf8_decode("$data_doc_ofc"),1,0,"R"); //Mossoró, 29 de setembro de 2020'
$pdf-> Ln(5);
$pdf-> MultiCell (165,5,utf8_decode("$endrc_doc_ofc"),1); //Endereçamento
$pdf-> Ln(7);
$html = utf8_decode("<b>Assunto: $assunto_doc_ofc </b>");
$pdf-> WriteHTML($html);


//$pdf-> MultiCell(190,5,);//Assunto


$pdf-> Ln(10);
//$pdf->flagg = 1;
$html = utf8_decode($corpo_doc_ofc);

$pdf-> WriteHTML($html);
//$pdf->WriteHTMLCell(165,$html);

$pdf-> Ln(200);
$pdf-> Cell(165,5,utf8_decode("$fecho_doc_ofc"),0,0,"L"); //Fecho
$pdf-> Ln(15);
$pdf->Cell (165,5,utf8_decode('(assinado eletronicamente)'),0,0,"C"); //
$pdf-> Ln(4);
$pdf->Cell (165,5,utf8_decode("$assinatura_doc_ofc"),0,0,"C"); //Assinatura
$pdf->Ln(4);
$pdf->Cell (165,5,utf8_decode("$cargo_doc_ofc"),0,0,"C"); //Cargo
$pdf->flagg = 0;
$pdf->Output('I', $titulo_doc_ofcB.'.pdf',true);
?>