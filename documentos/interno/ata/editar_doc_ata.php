<?php
session_start();
include("../../../funcs/conexao.php");

if (isset($_SESSION['login'])) {

$id_doc_ata = filter_input(INPUT_POST, 'id_doc_ata', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * from documentos_ata WHERE id_doc_ata = '$id_doc_ata'";
$r = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($r);

if (empty($id_doc_ata) || $_SESSION['nome_usuarios'] != $res['autor_doc_ata']) {
	header("Location: gerar_ata.php");
}
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

// Verificação se é assembleia apenas por questões linguísticas

$sql = "UPDATE documentos_ata SET num_doc_ata ='$num_doc_ata',titulo_doc_ata = '$titulo_doc_ata', convoc_doc_ata = '$convoc_doc_ata', tipo_doc_ata = '$tipo_doc_ata',
sec_doc_ata = '$sec_doc_ata',
orgao_doc_ata = '$orgao_doc_ata',
data_reuniao_doc_ata = '$data_reuniao_doc_ata',
horario_doc_ata = '$horario_doc_ata',
local_doc_ata = '$local_doc_ata',
pautas_doc_ata = '$pautas_doc_ata',
enc_doc_ata = '$enc_doc_ata',
presentes_doc_ata = '$presentes_doc_ata',
corpo_doc_ata = '$corpo_doc_ata',
cargo_doc_ata= '$cargo_doc_ata',
data_update = NOW() WHERE id_doc_ata = '$id_doc_ata'";
	$resultado_inser_ata = mysqli_query($conn, $sql ) or die("erro " . mysqli_error($conn));
header("location: /TCC/documentos/interno/listar_documentos.php?sucesso=1");


			

} else { 
	header ("Location: gerar_ata.php");
}


