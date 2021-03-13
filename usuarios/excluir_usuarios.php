<?php
session_start();
include_once("../funcs/conexao.php");
$idUsuarios = filter_input(INPUT_GET, 'id_usuarios', FILTER_SANITIZE_NUMBER_INT);
if(!empty($idUsuarios)){
	$deletar_cliente = "DELETE FROM usuarios WHERE id_usuarios ='$idUsuarios'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listar_usuarios.php");
}
?>
