<?php
require_once('../../tcpdf/tcpdf.php');
require_once('../../tcpdf/classes/oficio.class.php');
include_once("../../conexao.php");



session_start();

//if (isset($_SESSION['login'])){

$id_doc_ofc = filter_input(INPUT_GET, 'id_doc_ofc', FILTER_SANITIZE_NUMBER_INT);
$id = intval($id_doc_ofc);


$query = "SELECT * FROM documentos_ofc WHERE id_doc_ofc ='$id'";

$query1 = mysqli_query($conn, $query);
$array = mysqli_fetch_assoc($query1);




$titulo_doc_ofc = $array['titulo_doc_ofc'];
$titulo_doc_ofc = str_replace("/", "_", $titulo_doc_ofc);
$num_doc_ofc = $array['num_doc_ofc'];
$data_doc_ofc =  $array['data_doc_ofc'];
$endrc_doc_ofc =  $array['endrc_doc_ofc'];
$assunto_doc_ofc =  $array['assunto_doc_ofc'];
$corpo_doc_ofc = $array['corpo_doc_ofc'];
$fecho_doc_ofc =  $array['fecho_doc_ofc'];
$assinatura_doc_ofc =  $array['assinatura_doc_ofc'];
$cargo_doc_ofc =  $array['cargo_doc_ofc'];





// Define a margem esquerda como 15mm conforme Manual de Redação da Presidência da República
$pdf = new oficioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($assinatura_doc_ofc);
$pdf->SetTitle($titulo_doc_ofc);
$pdf->SetSubject($assunto_doc_ofc);
// Define margens
$pdf->SetMargins(30, 20, 15);
// A página quebra automaticamente
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}
//Define a fonte
$pdf->SetFont('Liberation Serif', 'R', 12);

// ---------------------------------------------------------// 
// adiciona uma nova página
$pdf->AddPage();
$pdf->setCellHeightRatio(0.6);
$html = '

<b>' . $num_doc_ofc . '</b>
<p style="margin-top: 0px" align = "right">' . $data_doc_ofc . '</p>
<p> </p> <!-- pula linha melhor que BR por causa do tamanho da célula -->';


$pdf->writeHTMLCell(168, 30, 29, 45, $html, 0, 0, 0, '', false);
$pdf->setCellHeightRatio(K_CELL_HEIGHT_RATIO);
$pdf->MultiCell(0, '', $endrc_doc_ofc, 0, 'L',0, 1, 29, 55, true, 0, false, true, 0, 'B');
$pdf->Ln(5);//pula 1cm
$html = '<p align = "justify"><b> Assunto: ' . $assunto_doc_ofc . '</b></p>';
$pdf->writeHTMLCell(168, '', 28, '', $html, 0, 0, 0, true, 'J', true);
$pdf->Ln(10);//pula 1cm
$pdf->writeHTMLCell(168, '', 29, '', $corpo_doc_ofc, 0, 0, 0, true, 'J', true);

$pdf->SetFont('Liberation Serif', 'R', 12);
$pdf->Ln(40);//pula 1cm
$pdf->lastPage(); // Coloca para a última página
$pdf->MultiCell('', 6, '(assinado eletronicamente)', 0, 'C', 0, 1, 29, '', true, 0, false, true, 6, 'B');
$pdf->MultiCell('', 6, $assinatura_doc_ofc, 0, 'C', 0, 1, 29, '', true, 0, false, true, 6, 'B');
$pdf->MultiCell('', 6,  $cargo_doc_ofc, 0, 'C', 0, 1, 29, '', true, 0, false, true, 6, 'B');

$titulo_doc_ofc = utf8_decode($titulo_doc_ofc);

$pdf->Output($titulo_doc_ofc . '.pdf', 'I');
