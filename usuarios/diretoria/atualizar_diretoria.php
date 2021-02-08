<?php 
session_start();
include_once("../../conexao.php");
$alterar_cargo_antigo = filter_input(INPUT_POST, 'alterar_cargo_antigo', FILTER_SANITIZE_STRING);
$alterar_cargo_novo = filter_input(INPUT_POST, 'alterar_cargo_novo',FILTER_SANITIZE_STRING);
$gremista_update = filter_input(INPUT_POST, 'gremista_update', FILTER_SANITIZE_STRING);


$resultado_insert = "UPDATE usuarios_diretoria SET cargo_diretoria = '$alterar_cargo_novo', gremista_update = '$gremista_update', 
data_update = NOW() where id_diretoria = '$alterar_cargo_antigo'";
$resultado_insertdir= mysqli_query($conn, $resultado_insert) or die ("erro " . mysqli_error($conn));
	





header("location:../diretoria/cadastrar_diretoria.php");

