<?php 
session_start();
include_once("../conexao.php");

$nomePat = filter_input(INPUT_POST, 'nomePat', FILTER_SANITIZE_STRING);
$codBarrasPat = filter_input(INPUT_POST, 'codBarrasPat', FILTER_SANITIZE_STRING);
$obtencaoPat = filter_input(INPUT_POST, 'obtencaoPat', FILTER_SANITIZE_STRING);
$custoObt = filter_input(INPUT_POST, 'custoObt', FILTER_SANITIZE_NUMBER_FLOAT);
$obsPat = filter_input(INPUT_POST, 'obsPat', FILTER_SANITIZE_STRING);


$resultado_insert = "INSERT INTO patrimonioativo (nomePat, codBarrasPat, obtencaoPat, custoObt,obsPat,dataCadPat) 
VALUES ('$nomePat', '$codBarrasPat', '$obtencaoPat', '$custoObt', '$obsPat',NOW())";

$resultado_insertPat = mysqli_query($conn, $resultado_insert);

header('location: cadastroPatrimonio.php');
?>