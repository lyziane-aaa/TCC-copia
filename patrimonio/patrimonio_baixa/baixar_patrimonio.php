<?php 
session_start();
include_once("../funcs/conexao.php");

$id_pat = filter_input(INPUT_POST, 'id_pat', FILTER_SANITIZE_NUMBER_INT);
$motivo_pat = filter_input(INPUT_POST, 'motivo_pat', FILTER_SANITIZE_STRING);

// Seleciona os dados do patrimônio escolhido
$sql = "SELECT
`patrimonioativo`.`nome_pat`,
`patrimonioativo`.`cod_barras_pat`,
`patrimonioativo`.`obtencao_pat`,
`patrimonioativo`.`custo_obt`,
`patrimonioativo`.`obs_pat`,
`patrimonioativo`.`gremista_cadastro_pat`,
`patrimonioativo`.`data_cad_pat`,
`patrimonioativo`.`emprestavel`
FROM `gremio`.`patrimonioativo` WHERE id_pat = '$id_pat'";

$res = mysqli_query($conn, $resultado_insert);
$a = mysqli_fetch_array($res);


$resultado_insert = "INSERT INTO patrimoniobaixa (nome_pat_baixa, cod_barras_pat_baixa, obtencao_pat_baixa, custo_obt_baixa,obs_pat_baixa, 
data_obt_baixa, data_baixa, motivo_baixa, gremista_baixa) 
VALUES(
    {$a['nome_pat']},
    {$a['cod_barras_pat']},
    {$a['obtencao_pat']},
    {$a['custo_obt']},
    {$a['obs_pat']},
    {$a['gremista_cadastro_pat']},
    {$a['data_obt_baixa']},
    NOW(),
    '$motivo_pat',
    '{$_SESSION['nome_usuarios']}'
  

)";

$resultado_insertPat = mysqli_query($conn, $resultado_insert) or die("Erro de $resultado_insert" . mysqli_error($conn));

header('location: cadastrar_patrimonio.php?sucesso=1');
?>