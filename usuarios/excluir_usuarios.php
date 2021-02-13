<?php
session_start();
include_once("../conexao.php");
$idUsuarios = filter_input(INPUT_GET, 'id_doc_ofc', FILTER_SANITIZE_NUMBER_INT);
if(!empty($idUsuarios)){
	$deletar_cliente = "DELETE FROM usuarios WHERE id_doc_ofc='$idUsuarios'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listarUsuarios.php");
}
?>
