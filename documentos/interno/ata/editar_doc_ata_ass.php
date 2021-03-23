<?php
session_start();
include("../../../funcs/conexao.php");

if (isset($_SESSION['login'])) {

$id_doc_ata_ass = filter_input(INPUT_POST, 'id_doc_ata_ass', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * from documentos_ata_ass WHERE id_doc_ata_ass = '$id_doc_ata_ass'";
$r = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($r);

if (empty($id_doc_ata_ass) || $_SESSION['nome_usuarios'] != $res['autor_doc_ata_ass']) {
	header("Location: gerar_ata_ass.php");
}
$num_doc_ata_ass = filter_input(INPUT_POST, 'num_doc_ata_ass', FILTER_SANITIZE_STRING);
//Retira o "ata nº" da string
$num_doc_ata_ass = explode ('º ', $num_doc_ata_ass);
//Pega apenas a parte da numeração
$num_doc_ata_ass = $num_doc_ata_ass[1];


$titulo_doc_ata_ass = filter_input(INPUT_POST, 'titulo_doc_ata_ass', FILTER_SANITIZE_STRING);
$data_reuniao_doc_ata_ass = filter_input(INPUT_POST, 'data_reuniao_doc_ata_ass', FILTER_SANITIZE_STRING);
$convoc_doc_ata_ass= filter_input(INPUT_POST, 'convoc_doc_ata_ass', FILTER_SANITIZE_STRING);
$tipo_doc_ata_ass= filter_input(INPUT_POST, 'tipo_doc_ata_ass', FILTER_SANITIZE_STRING);
$sec_doc_ata_ass= filter_input(INPUT_POST, 'sec_doc_ata_ass', FILTER_SANITIZE_STRING);

$orgao_doc_ata_ass = filter_input(INPUT_POST, 'orgao_doc_ata_ass', FILTER_SANITIZE_STRING);
$horario_doc_ata_ass = filter_input(INPUT_POST, 'horario_doc_ata_ass', FILTER_SANITIZE_STRING);
$local_doc_ata_ass = filter_input(INPUT_POST, 'local_doc_ata_ass', FILTER_SANITIZE_STRING);
$pautas_doc_ata_ass = filter_input(INPUT_POST, 'pautas_doc_ata_ass');
$enc_doc_ata_ass = filter_input(INPUT_POST, 'enc_doc_ata_ass');
$presentes_doc_ata_ass = filter_input(INPUT_POST, 'presentes_doc_ata_ass');
$corpo_doc_ata_ass = filter_input(INPUT_POST, 'corpo_doc_ata_ass');
$autor_doc_ata_ass = $_SESSION['nome_usuarios'];
$cargo_doc_ata_ass = $_SESSION['cargo'];
$matricula_doc_ata_ass = $_SESSION['matricula'];
$data_registro_ata_ass = filter_input(INPUT_POST, 'data_registro_ata_ass', FILTER_SANITIZE_STRING);
$gremista_registro_ata_ass = $_SESSION['login'];

	$titulo_doc_ata_ass = "Ata $num_doc_ata_ass - Reunião $orgao_doc_ata_ass $titulo_doc_ata_ass";

// Verificação se é assembleia apenas por questões linguísticas

$sql = "UPDATE documentos_ata_ass SET num_doc_ata_ass ='$num_doc_ata_ass',titulo_doc_ata_ass = '$titulo_doc_ata_ass', convoc_doc_ata_ass = '$convoc_doc_ata_ass', tipo_doc_ata_ass = '$tipo_doc_ata_ass',
sec_doc_ata_ass = '$sec_doc_ata_ass',
data_reuniao_doc_ata_ass = '$data_reuniao_doc_ata_ass',
horario_doc_ata_ass = '$horario_doc_ata_ass',
local_doc_ata_ass = '$local_doc_ata_ass',
pautas_doc_ata_ass = '$pautas_doc_ata_ass',
enc_doc_ata_ass = '$enc_doc_ata_ass',
presentes_doc_ata_ass = '$presentes_doc_ata_ass',
corpo_doc_ata_ass = '$corpo_doc_ata_ass',
cargo_doc_ata_ass= '$cargo_doc_ata_ass',
data_update = NOW() WHERE id_doc_ata_ass = '$id_doc_ata_ass'";
	$resultado_inser_ata_ass = mysqli_query($conn, $sql ) or die("erro " . mysqli_error($conn));
header("location: /TCC/documentos/interno/listar_documentos.php?sucesso=1");


			

} else { 
	header ("Location: gerar_ata_ass.php");
}


