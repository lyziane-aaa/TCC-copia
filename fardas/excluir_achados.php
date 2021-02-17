<?php
session_start();
include_once("../conexao.php");
$idAchados = filter_input(INPUT_GET, 'id_achados', FILTER_SANITIZE_NUMBER_INT);
if(!empty($idAchados)){
	$deletar_cliente = "DELETE FROM achados WHERE id_achados='$idAchados'";
	$resultado_del = mysqli_query($conn, $deletar_cliente);
	header("Location: listar_achados.php");
}
?>
