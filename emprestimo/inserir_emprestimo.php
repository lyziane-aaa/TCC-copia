<?php
session_start();
include_once("../conexao.php");

$obj_emp = filter_input(INPUT_POST, 'obj_emp', FILTER_SANITIZE_NUMBER_INT);
$nome_emp = filter_input(INPUT_POST, 'nome_emp', FILTER_SANITIZE_STRING);
$matricula_emp = filter_input(INPUT_POST, 'matricula_emp', FILTER_SANITIZE_STRING);
$gremista_emp = filter_input(INPUT_POST, 'gremista_emp', FILTER_SANITIZE_STRING);
$data_emp = filter_input(INPUT_POST, 'data_emp', FILTER_SANITIZE_STRING);
$emprestado_pat = filter_input(INPUT_POST, 'emprestado_pat', FILTER_SANITIZE_STRING);
$condicao_emp = filter_input(INPUT_POST, 'condicao_emp', FILTER_SANITIZE_STRING);

$resultado_insert = "INSERT INTO emprestimos (obj_emp,nome_emp,matricula_emp,gremista_emp,data_emp,condicao_emp) 
VALUES ('$obj_emp','$nome_emp','$matricula_emp','$gremista_emp',NOW()),condicao_emp";

$resultado_insert_pat = mysqli_query($conn, $resultado_insert) or die("erro " . mysqli_error($conn));
$resultado_insert_pat = "UPDATE patrimonioativo SET emprestado_pat = '$emprestado_pat' WHERE id_pat = $obj_emp";
$resultado_insert_pat = mysqli_query($conn, $resultado_insert) or die("erro " . mysqli_error($conn));



//	$resultado_insertEmp = mysqli_query($conn, $resultado_insert);
header('location: cadastrar_emprestimo.php');
?>