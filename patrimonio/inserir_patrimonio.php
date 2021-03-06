<?php 
session_start();
include_once("../conexao.php");

$nomePat = filter_input(INPUT_POST, 'nomePat', FILTER_SANITIZE_STRING);
$codBarrasPat = filter_input(INPUT_POST, 'codBarrasPat', FILTER_SANITIZE_STRING);
$obtencaoPat = filter_input(INPUT_POST, 'obtencaoPat', FILTER_SANITIZE_STRING);
$custoObt = filter_input(INPUT_POST, 'custoObt', FILTER_SANITIZE_NUMBER_FLOAT);
$obsPat = filter_input(INPUT_POST, 'obsPat', FILTER_SANITIZE_STRING);
$statusPat = filter_input(INPUT_POST, 'statusPat', FILTER_SANITIZE_STRING);
$emprestavelPat= filter_input(INPUT_POST,'emprestavel', FILTER_SANITIZE_NUMBER_FLOAT);
$cadastradoPor = filter_input(INPUT_POST, 'gremista_cadastro_pat', FILTER_SANITIZE_STRING);

$resultado_insert = "INSERT INTO patrimonioativo (nome_pat, cod_barras_pat, obtencao_pat, custo_obt,obs_pat, data_cad_pat, emprestavel, gremista_cadastro_por) 
VALUES ('$nomePat', '$codBarrasPat', '$obtencaoPat', '$custoObt', '$obsPat','$statusPat',NOW(),$emprestavelPat, $cadastradoPor)";

$resultado_insertPat = mysqli_query($conn, $resultado_insert);

header('location: cadastrar_patrimonio.php?sucesso=1');
?>