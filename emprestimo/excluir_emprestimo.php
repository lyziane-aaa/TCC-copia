<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$deletar_cliente = "DELETE FROM emprestimos WHERE idEmp='$id'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listarEmp.php");
}
?>
