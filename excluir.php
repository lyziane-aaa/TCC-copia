<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$deletar_cliente = "DELETE FROM bolsa_copia WHERE idBC='$id'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listarBC.php");
}
?>
