<?php
session_start();
include_once("../conexao.php");
$idPat= filter_input(INPUT_GET, 'idPat', FILTER_SANITIZE_NUMBER_INT);
if(!empty($idPat)){
	$deletar_cliente = "DELETE FROM patrimonioativo WHERE idPat='$idPat'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listarPatrimonio.php");
}
?>
