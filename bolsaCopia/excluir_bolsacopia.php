<?php
session_start();
include_once("../conexao.php");
$idBC = filter_input(INPUT_GET, 'idBC', FILTER_SANITIZE_NUMBER_INT);
if(!empty($idBC)){
	$deletar_cliente = "DELETE FROM bolsacopia WHERE idBC='$idBC'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header ('Location: ../_bolsaCopia/listarBolsaCopia.php');
}

?>
