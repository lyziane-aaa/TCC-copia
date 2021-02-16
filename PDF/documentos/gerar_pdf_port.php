<?php
require_once('../../tcpdf/tcpdf.php');
require_once('../../tcpdf/classes/oficio.class.php');
include_once("../../conexao.php");



session_start();

//if (isset($_SESSION['login'])){

$id_doc_port = filter_input(INPUT_GET, 'id_doc_port', FILTER_SANITIZE_NUMBER_INT);
$id = intval($id_doc_port);


$query = "SELECT * FROM documentos_port WHERE id_doc_port ='$id'"; // alterar consulta para pegar a chave estrangeira

$query_a = mysqli_query($conn, $query);
$array = mysqli_fetch_assoc($query_a);




/*$array['resumo_doc_port'];
$array['texto_doc_port'];
$array['fecho_doc_port'];
$array['assinatura_doc_port'];
$array['cargo_doc_port'];
*/





// Define a margem esquerda como 15mm conforme Manual de Redação da Presidência da República
$pdf = new oficioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(strtolower($array['assinatura_doc_port']));
$pdf->SetTitle($array['titulo_doc_port']);
$pdf->SetSubject($array['resumo_doc_port']);
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
//$pdf->setCellHeightRatio(0.6);
$html = '
<b>' .$array['titulo_doc_port']. '</b>';

$pdf->writeHTMLCell(168, 30, 29, 45, $html, 0, 0, 0, '', false);
$pdf->Ln(5);
$pdf->SetFont('Liberation Serif', 'I', 11);// define a letra para o Resumo
$pdf->MultiCell('','', $array['resumo_doc_port'], 0, 'J', 0, 1, 120, '', true,0, false, true, 30, 'B');
//$pdf->writeHTMLCell(50, 30, 80, 45, $html, 0, 0, 0, '', false);
$pdf->SetFont('Liberation Serif', 'R', 12);
$pdf->setCellHeightRatio(K_CELL_HEIGHT_RATIO);

$pdf->Ln(10);//pula 1cm
$pdf->writeHTMLCell(168, '', 29, '', $array['texto_doc_port'], 0, 2, 0, true, 'J', true);

$pdf->SetFont('Liberation Serif', 'R', 12);
$pdf->Ln(20);//pula 2cm
$pdf->lastPage(); // Coloca para a última página
$pdf->MultiCell('', 6, '(assinado eletronicamente)', 0, 'C', 0, 1, 29, '', true, 0, false, true, 6, 'B');
$pdf->MultiCell('', 6, strtoupper($array['assinatura_doc_port']), 0, 'C', 0, 1, 29, '', true, 0, false, true, 6, 'B');
$pdf->MultiCell('', 6,  $array['cargo_doc_port'], 0, 'C', 0, 1, 29, '', true, 0, false, true, 6, 'B');

$array['titulo_doc_port'] = str_replace("/", "_", $array['titulo_doc_port']);
$titulo_doc_port = utf8_decode($array['titulo_doc_port']);

$pdf->Output($titulo_doc_port . '.pdf', 'I');
