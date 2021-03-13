<?php
session_start();
include_once("../funcs/conexao.php");



	$login= filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	$nome_usuarios= filter_input(INPUT_POST, 'nome_usuarios', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$senha = md5($senha);
	$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
	$matricula_usuarios = filter_input(INPUT_POST, 'matricula_usuarios', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_NUMBER_FLOAT);
	$data_registro= filter_input(INPUT_POST, 'data_registro');
	$gremista_registro= filter_input(INPUT_POST, 'gremista_registro', FILTER_SANITIZE_STRING);

$opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$db = new PDO('mysql:host=localhost;dbname=gremio', 'root', '', $opcoes);

$sql = "INSERT INTO usuarios (login,nome_usuarios,senha,cargo, matricula_usuarios, telefone, email,nivel, data_registro, gremista_registro) 
VALUES ('$login','$nome_usuarios','$senha','$cargo','$matricula_usuarios','$telefone','$email','$nivel','$data_registro','$gremista_registro')";
$stmt = $db->prepare($sql);

try{
    $stmt->execute();
}catch(PDOException $e){
    echo 'Erro: ', $e->getMessage();
}
