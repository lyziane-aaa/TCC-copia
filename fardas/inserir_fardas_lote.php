<?php 
session_start();
include_once("../funcs/conexao.php");
$fornecedor_lote = filter_input(INPUT_POST, 'fornecedor_lote', FILTER_SANITIZE_STRING);
$data_receb_lote = filter_input(INPUT_POST, 'data_receb_lote', FILTER_SANITIZE_STRING);

$fornecedor_telefone_lote = filter_input(INPUT_POST, 'fornecedor_telefone_lote', FILTER_SANITIZE_STRING);
$preco_un_fornecedor = filter_input(INPUT_POST, 'preco_un_fornecedor', FILTER_SANITIZE_NUMBER_INT);
$lucro_gremio_un = filter_input(INPUT_POST, 'lucro_gremio_un', FILTER_SANITIZE_NUMBER_INT);
$preco_farda_lote = filter_input(INPUT_POST, 'preco_farda_lote', FILTER_SANITIZE_NUMBER_INT);
$qnt_pp_lote = filter_input(INPUT_POST, "qnt_pp_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_p_lote = filter_input(INPUT_POST, "qnt_p_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_m_lote = filter_input(INPUT_POST, "qnt_m_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_g_lote = filter_input(INPUT_POST, "qnt_g_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_gg_lote = filter_input(INPUT_POST, "qnt_g_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_pp_bl_lote = filter_input(INPUT_POST, "qnt_pp_bl_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_p_bl_lote = filter_input(INPUT_POST, "qnt_p_bl_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_m_bl_lote = filter_input(INPUT_POST, "qnt_m_bl_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_g_bl_lote = filter_input(INPUT_POST, "qnt_g_bl_lote", FILTER_SANITIZE_NUMBER_INT);
$qnt_gg_bl_lote = filter_input(INPUT_POST, "qnt_gg_bl_lote", FILTER_SANITIZE_NUMBER_INT);
$repasse_previsto_fornecedor = filter_input(INPUT_POST, "repasse_previsto_fornecedor", FILTER_SANITIZE_NUMBER_INT);
$lucro_gremio_previsto_lote = filter_input(INPUT_POST, "lucro_gremio_previsto_lote", FILTER_SANITIZE_NUMBER_INT);
$montante_total_previsto = filter_input(INPUT_POST, "montante_total_previsto", FILTER_SANITIZE_NUMBER_INT);

$gremista_cadastro_lote = $_SESSION['nome_usuarios'];


$matricula_fardas_enc = filter_input(INPUT_POST, 'matricula_fardas_enc', FILTER_SANITIZE_STRING);
$matricula_fardas_enc = filter_input(INPUT_POST, 'matricula_fardas_enc', FILTER_SANITIZE_STRING);
$telefone_fardas_enc = filter_input(INPUT_POST, 'telefone_fardas_enc', FILTER_SANITIZE_STRING);
$tamanho_fardas_enc = filter_input(INPUT_POST, 'tamanho_fardas_enc', FILTER_SANITIZE_STRING);
$qnt_fardas_enc = filter_input(INPUT_POST, 'qnt_fardas_enc', FILTER_SANITIZE_NUMBER_INT);

// configurar hora e data
  
$update= "UPDATE fardas_lote set vigente_lote = 0";

$update_up = mysqli_query($conn, $update) or die("erro " . mysqli_error($conn));


$sql = "INSERT INTO `gremio`.`fardas_lote`
(`fornecedor_lote`,`data_receb_lote`,`vigente_lote`,
`fornecedor_telefone_lote`,
`preco_un_fornecedor`,`lucro_gremio_un`,
`preco_farda_lote`,`qnt_pp_lote`,
`qnt_p_lote`,`qnt_m_lote`,
`qnt_g_lote`,`qnt_gg_lote`,
`qnt_pp_bl_lote`,`qnt_p_bl_lote`,
`qnt_m_bl_lote`,`qnt_g_bl_lote`,
`qnt_gg_bl_lote`,`gremista_cadastro_lote`,
`data_cadastro_lote`,`repasse_previsto_fornecedor`,
`lucro_gremio_previsto_lote`,`montante_total_previsto`
)
VALUES
('$fornecedor_lote',
'$data_receb_lote',
1,
'$fornecedor_telefone_lote',
'$preco_un_fornecedor',
'$lucro_gremio_un',
'$preco_farda_lote',
'$qnt_pp_lote',
'$qnt_p_lote',
'$qnt_m_lote',
'$qnt_g_lote',
'$qnt_gg_lote',
'$qnt_pp_bl_lote',
'$qnt_p_bl_lote',
'$qnt_m_bl_lote',
'$qnt_g_bl_lote',
'$qnt_gg_bl_lote',
'$gremista_cadastro_lote',
NOW(),
'$repasse_previsto_fornecedor',
'$lucro_gremio_previsto_lote',
'$montante_total_previsto')";


$resultado_insert_achado = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));


