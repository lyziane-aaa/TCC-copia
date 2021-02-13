<?php
session_start();
include_once("../conexao.php");
$idPat= filter_input(INPUT_GET, 'id_pat', FILTER_SANITIZE_NUMBER_INT);
if(!empty($idPat)){
	$deletar_cliente = "DELETE FROM patrimonioativo WHERE id_pat='$idPat'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listarPatrimonio.php");
}
?>
