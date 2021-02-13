<?php
session_start();
include_once("../../../conexao.php");
$id = filter_input(INPUT_GET, 'id_doc_ofc', FILTER_SANITIZE_NUMBER_INT);
$id_port = filter_input(INPUT_GET, 'id_doc_port', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
	$deletar_cliente = "DELETE FROM documentos_ofc WHERE id_doc_ofc='$id'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location:/TCC/documentos/interno/listar_documentos.php");
}

if(!empty($id_port)){
	$deletar_cliente = "DELETE FROM documentos_port WHERE id_doc_port ='$id_port'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location:/TCC/documentos/interno/listar_documentos.php");
}

?>
