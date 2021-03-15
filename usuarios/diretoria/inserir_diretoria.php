<?php 
session_start();
include_once("../../funcs/conexao.php");
$inserir_cargo = filter_input(INPUT_POST, 'inserir_cargo', FILTER_SANITIZE_STRING);
$inserir_tipo_diretoria = filter_input(INPUT_POST, 'inserir_tipo_diretoria');
$gremista_update = filter_input(INPUT_POST, 'gremista_update');



$resultado_insert = "INSERT INTO usuarios_cargos (id_diretoria, nome_cargo, tipo_diretoria,gremista_update, data_update) 
VALUES (null,'$inserir_cargo', '$inserir_tipo_diretoria', '$gremista_update', NOW())";
$resultado_insertdir= mysqli_query($conn, $resultado_insert) or die ("erro " . mysqli_error($conn));
	





header("location:../diretoria/cadastrar_diretoria.php?sucesso=1");

