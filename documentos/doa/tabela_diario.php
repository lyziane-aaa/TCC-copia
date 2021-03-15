<?php
session_start();
include('SITE_ROOT . "funcs/conexao.php");.php');
require_once('../../Funcs/functions.php');
$requestData = $_REQUEST;


$columns = array(
	0 =>  'titulo_doc_ata',
	1 => 'autor_doc_ata',  
	2 => 'data_registro_ata',


);
//Verificação de quantas linhas tem a tabela para paginação

$result_doc = "SELECT `id_doc_ata`, `titulo_doc_ata`,`autor_doc_ata` ,`data_registro_ata` FROM `gremio`.`documentos_ata`  union
SELECT `id_doc_ofc`, `titulo_doc_ofc`, `autor_doc_ofc`, `data_registro_ofc` FROM `gremio`.`documentos_ofc` union 
SELECT `id_doc_ata_ass`, `titulo_doc_ata_ass`, `autor_doc_ata_ass`, `data_registro_ata_ass` FROM `gremio`.`documentos_ata_ass` union
SELECT `id_doc_port`, `titulo_doc_port`, `autor_doc_port`, `data_registro_port` FROM `gremio`.`documentos_port` ";

$resultado_doc = mysqli_query($conn, $result_doc);

$linhas = mysqli_num_rows($resultado_doc);



//Obter dados
$result_doc_ofc = "SELECT `id_doc_ata`, `titulo_doc_ata`,`autor_doc_ata` ,`data_registro_ata` FROM `gremio`.`documentos_ata` union all
SELECT `id_doc_ofc`, `titulo_doc_ofc`, `autor_doc_ofc`, `data_registro_ofc` FROM `gremio`.`documentos_ofc`  union all
SELECT `id_doc_ata_ass`, `titulo_doc_ata_ass`, `autor_doc_ata_ass`, `data_registro_ata_ass` FROM `gremio`.`documentos_ata_ass`union all
SELECT `id_doc_port`, `titulo_doc_port`, `autor_doc_port`, `data_registro_port` FROM `gremio`.`documentos_port`";

$dados = array();
if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_doc_ofc .= " AND ( id_doc_ata LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_doc_ofc .= " OR titulo_doc_ata LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_doc_ofc .= " OR autor_doc_ata LIKE '%" . $requestData['search']['value'] . "%' )";
}
$result_doc_ofc .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . ", " . $requestData['length'] . "   ";

$resultado_doc_ofc = mysqli_query($conn, $result_doc_ofc);
$totalFiltered = mysqli_num_rows($resultado_doc_ofc); // contar as linhas
//Ordenar o resultado

while ($row_doc_ofc = mysqli_fetch_array($resultado_doc_ofc)) {
	$dado = array();
	$dado[] = $row_doc_ofc["titulo_doc_ata"];
	$dado[] = $row_doc_ofc["autor_doc_ata"];
	$dado[] = databr($row_doc_ofc["data_registro_ata"]);
	$dados[] = $dado;
}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
	"iTotalRecords" => intval($linhas),  //Quantidade que há no banco de dados
	"iTotalDisplayRecords" => intval ($totalFiltered), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json