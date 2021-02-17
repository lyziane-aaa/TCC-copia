<?php 
session_start();
include_once("../conexao.php");
$nome_fardas_enc = filter_input(INPUT_POST, 'nome_fardas_enc', FILTER_SANITIZE_STRING);
$matricula_fardas_enc = filter_input(INPUT_POST, 'matricula_fardas_enc', FILTER_SANITIZE_STRING);
$telefone_fardas_enc = filter_input(INPUT_POST, 'telefone_fardas_enc', FILTER_SANITIZE_STRING);
$tamanho_fardas_enc = filter_input(INPUT_POST, 'tamanho_fardas_enc', FILTER_SANITIZE_STRING);
$qnt_fardas_enc = filter_input(INPUT_POST, 'qnt_fardas_enc', FILTER_SANITIZE_NUMBER_INT);
$data = filter_input(INPUT_POST,'data');
// configurar hora e data
    $hoje = date('d/m/Y H:i:s');
    date_default_timezone_set('America/Fortaleza');

$sql = "INSERT INTO fardas_encomendas (nome_fardas_enc, matricula_fardas_enc, telefone_fardas_enc, tamanho_fardas_enc, 
qnt_fardas_enc, data_encomenda)
VALUES ('$nome_fardas_enc', '$matricula_fardas_enc', '$telefone_fardas_enc', '$tamanho_fardas_enc', '$qnt_fardas_enc', '$data')";
$resultado_insert_achado = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));

