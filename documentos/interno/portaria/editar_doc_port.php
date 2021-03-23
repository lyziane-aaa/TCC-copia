<?php
include("../../../funcs/conexao.php");
session_start();

$id_doc_port = filter_input(INPUT_POST, 'id_doc_port', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * from documentos_port WHERE id_doc_port = '$id_doc_port'";
$r = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($r);

if (empty($id_doc_port) || $_SESSION['nome_usuarios'] != $res['autor_doc_port']) {
	header("Location: gerar_portaria.php");
	echo "aaaaa";
}

$titulo_doc_port = filter_input(INPUT_POST, 'titulo_doc_port', FILTER_SANITIZE_STRING);
$num_doc_port = filter_input(INPUT_POST, 'num_doc_port', FILTER_SANITIZE_STRING);
$resumo_doc_port = filter_input(INPUT_POST, 'resumo_doc_port', FILTER_SANITIZE_STRING);
$texto_doc_port = filter_input(INPUT_POST, 'texto_doc_port');

$matricula_doc_port = filter_input(INPUT_POST, 'matricula_doc_port', FILTER_SANITIZE_STRING);

$autor_doc_port = $_SESSION['nome_usuarios'];
$cargo_doc_port = $_SESSION['cargo'];
$gremista_registro_port = $_SESSION['login'];


$resultado_update = "UPDATE documentos_port SET titulo_doc_port = '$titulo_doc_port' , num_doc_port = '$num_doc_port' , 
	texto_doc_port = '$texto_doc_port',
	resumo_doc_port = '$resumo_doc_port',autor_doc_port = '$autor_doc_port',matricula_doc_port = '$matricula_doc_port', 
	cargo_doc_port ='$cargo_doc_port',data_update = NOW(), gremista_registro_port = '$gremista_registro_port' WHERE id_doc_port = '$id_doc_port'";

$resultado_update = mysqli_query($conn, $resultado_update) or die("Erro " . mysqli_error($conn));

 header("Location: gerar_oficio.php?sucesso=1");
