<?php
session_start();
include_once("../SITE_ROOT . "funcs/conexao.php");.php");

$num_doc_ata = filter_input(INPUT_POST, 'num_doc_ata', FILTER_SANITIZE_STRING);
//Retira o "ata nº" da string
$num_doc_ata = explode ('º ', $num_doc_ata);
//Pega apenas a parte da numeração
$num_doc_ata = $num_doc_ata[1];


$titulo_doc_ata = filter_input(INPUT_POST, 'titulo_doc_ata', FILTER_SANITIZE_STRING);
$data_reuniao_doc_ata = filter_input(INPUT_POST, 'data_reuniao_doc_ata', FILTER_SANITIZE_STRING);
$convoc_doc_ata= filter_input(INPUT_POST, 'convoc_doc_ata', FILTER_SANITIZE_STRING);
$tipo_doc_ata= filter_input(INPUT_POST, 'tipo_doc_ata', FILTER_SANITIZE_STRING);
$sec_doc_ata= filter_input(INPUT_POST, 'sec_doc_ata', FILTER_SANITIZE_STRING);

$orgao_doc_ata = filter_input(INPUT_POST, 'orgao_doc_ata', FILTER_SANITIZE_STRING);
$horario_doc_ata = filter_input(INPUT_POST, 'horario_doc_ata', FILTER_SANITIZE_STRING);
$local_doc_ata = filter_input(INPUT_POST, 'local_doc_ata', FILTER_SANITIZE_STRING);
$pautas_doc_ata = filter_input(INPUT_POST, 'pautas_doc_ata');
$enc_doc_ata = filter_input(INPUT_POST, 'enc_doc_ata');
$presentes_doc_ata = filter_input(INPUT_POST, 'presentes_doc_ata');
$corpo_doc_ata = filter_input(INPUT_POST, 'corpo_doc_ata');
$autor_doc_ata = $_SESSION['nome_usuarios'];
$cargo_doc_ata = $_SESSION['cargo'];
$matricula_doc_ata = $_SESSION['matricula'];
$data_registro_ata = filter_input(INPUT_POST, 'data_registro_ata', FILTER_SANITIZE_STRING);
$gremista_registro_ata = $_SESSION['login'];

	$titulo_doc_ata = "Ata $num_doc_ata - Reunião $orgao_doc_ata $titulo_doc_ata";

$hoje = date('d/m/Y H:i:s');
date_default_timezone_set('America/Fortaleza');

$dir = "assinaturas_doc_ata"; 
// recebendo o arquivo multipart 
$nome_arq = str_replace("/", "_", 'Lista ' . $titulo_doc_ata . '-'.$num_doc_ata);
$files = $_FILES["assinaturas_doc_ata"];
$file = $_FILES["assinaturas_doc_ata"]['name']; 
$file= explode(".",$file);
$nome_arq = $nome_arq . '.' . $file['1'];


// Move o arquivo da pasta temporaria de upload para a pasta de destino 
if (move_uploaded_file($files["tmp_name"], "$dir/".$nome_arq)) { 
	
	$assinaturas_doc_ata = "$dir/".$nome_arq;
	

// Verificação se é assembleia apenas por questões linguísticas

$sql = "INSERT INTO `documentos_ata`
(`num_doc_ata`,	`titulo_doc_ata`,`convoc_doc_ata`,`tipo_doc_ata`,`sec_doc_ata`,	`orgao_doc_ata`,	`data_reuniao_doc_ata`,	`horario_doc_ata`,	`local_doc_ata`,	
`pautas_doc_ata`,	`enc_doc_ata`,	`presentes_doc_ata`,	`corpo_doc_ata`,
`autor_doc_ata`,	`matricula_doc_ata`,	`cargo_doc_ata`,	`data_registro_ata`,	`gremista_registro_ata`,	`assinaturas_doc_ata`)	VALUES
(
'$num_doc_ata',
'$titulo_doc_ata',
'$convoc_doc_ata',
'$tipo_doc_ata',
'$sec_doc_ata',
'$orgao_doc_ata',
'$data_reuniao_doc_ata',
'$horario_doc_ata',
'$local_doc_ata',
'$pautas_doc_ata',
'$enc_doc_ata',
'$presentes_doc_ata',
'$corpo_doc_ata',
'$autor_doc_ata',
'$matricula_doc_ata',
'$cargo_doc_ata',
'$data_registro_ata',
'$gremista_registro_ata',
'$assinaturas_doc_ata');";
$stmt = $db->prepare($sql);
	$resultado_inser_ata = mysqli_query($conn, $sql ) or die("erro " . mysqli_error($conn));
header("location: /TCC/documentos/interno/listar_documentos.php?sucesso=1");


			


}




