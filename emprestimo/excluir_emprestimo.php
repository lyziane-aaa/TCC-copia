<?php
session_start();
include_once("../funcs/conexao.php");
$id = filter_input(INPUT_GET, 'id_emp', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$deletar_cliente = "DELETE FROM emprestimos WHERE id_emp='$id'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listar_emprestimo.php");
}
?>
