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
<p align = "left">' . $endrc_doc_ofc . ' </p>
<p> </p> <!-- pula linha melhor que BR por causa do tamanho da célula --> 
<p align = "justify"><b> Assunto: ' . $assunto_doc_ofc . '</b></p>';

$pdf->writeHTMLCell(168, 30, 29, 45, $html, 0, 0, 0, '', true);
$pdf->setCellHeightRatio(K_CELL_HEIGHT_RATIO);
$html =  $corpo_doc_ofc;

$pdf->writeHTMLCell(168,30,29,45,$html,0, 0,0, '',false);
//$pdf->SetXY(29, 60);
//$pdf->writeHTML($html, true, 0, false, false, 0, 0, 'L');
//$pdf->writeHTML(168,30,29,48,$html,0, 0,0, '',true);




$pdf->SetFont('Liberation Serif', 'R', 12);





//$html = "<p align = 'right'>$data_doc_ofc</p>";
//$pdf->writeHTML($html,true,false,false,false,'');



/*
//                         
$pdf-> writeHTMLCell(140,5,29,45,$num_doc_ofc,0, 0,0, 'L'); //'OFÍCIO 2020.10/DIEXE/GEVP
$pdf->SetFont('Liberation Serif','r',12);// tira o negrito

//$data_doc_ofc = "<p align = 'right'>$data_doc_ofc</p>";// a tag p alinha à direita
//$pdf-> writeHTMLCell(120,5,20,48,$data_doc_ofc,1, 0,0, 'R',true); //'OFÍCIO 2020.10/DIEXE/GEVP
$pdf->SetXY(76, 48); // Define um ponto para a próxima célula
$pdf->Cell(120, 5, $data_doc_ofc,
 0, false, 'R', 0, '', 0, false, 'T', 'M');
$endrc_doc_ofc = "$endrc_doc_ofc";// a tag p alinha à direita
$pdf-> writeHTMLCell(80,5,29,55,$endrc_doc_ofc,0, 0,0, 'R' );


$pdf->SetXY(30, 62);
$html = utf8_decode("<b>Assunto: $assunto_doc_ofc </b>");
$pdf-> WriteHTMLCell($html);
$html = "";
//$pdf-> MultiCell(190,5,);//Assunto


$pdf->writeHTMLCell(165,30,30,78,$corpo_doc_ofc,1, 0,0, 'R',true);


//$pdf-> Cell(165,5,utf8_decode("$fecho_doc_ofc"),0,0,"L"); //Fecho
//$pdf-> Ln(15);
$pdf->Cell (165,5,utf8_decode('(assinado eletronicamente)'),0,0,"C"); //
$pdf-> Ln(4);
$pdf->Cell (165,5,utf8_decode("$assinatura_doc_ofc"),0,0,"C"); //Assinatura
$pdf->Ln(4);
$pdf->Cell (165,5,utf8_decode("$cargo_doc_ofc"),0,0,"C"); //Cargo
*/
$pdf->Output($titulo_doc_ofc . '.pdf', 'I');
