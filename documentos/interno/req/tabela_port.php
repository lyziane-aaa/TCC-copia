<?php
include('../../../conexao.php');
//Sempre iniciado com $, tipo de variável;
$requestData = $_REQUEST;


$columns = array(
	0 => 'id_doc_port',
	1 => 'titulo_doc_port',
	2 => 'autor_doc_port',
	3 => 'data_registro_port'
);

$result_doc = "SELECT * FROM documentos_port";
$resultado_doc = mysqli_query($conn, $result_doc);
$linhas = mysqli_num_rows($resultado_doc);
//pegar dados

//Obter dados
$result_doc_port = "SELECT id_doc_port, titulo_doc_port,data_registro_port,autor_doc_port FROM documentos_port WHERE 1=1";


if (!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_doc_port .= " AND ( titulo_doc_port LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_doc_port .= " OR data_registro_port LIKE '%" . $requestData['search']['value'] . "%' ";
	$result_doc_port .= " OR autor_doc_port LIKE '%" . $requestData['search']['value'] . "%' )";
}
//Ordenar o resultado
$result_doc_port .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";

$resultado_doc_port = mysqli_query($conn, $result_doc_port);
$totalFiltered = mysqli_num_rows($resultado_doc_port); // contar as linhas

$resultado_doc_port = mysqli_query($conn, $result_doc_port);
$row_doc_port = mysqli_fetch_array($resultado_doc_port);

$dados = array();

while ($row_doc_port = mysqli_fetch_array($resultado_doc_port)) {
	$dado = array();
	$dado[] = $row_doc_port["titulo_doc_port"];
	$dado[] = $row_doc_port["autor_doc_port"];
	$dado[] = $row_doc_port["data_registro_port"];
	$dado[] = "<a href='/tcc/PDF/documentos/gerar_pdf_port.php?id_doc_port=" . $row_doc_port['id_doc_port'] . "' style= 'filter: invert(100%);'><img src='/tcc/imagens/salvarpdf.png' width='20' height='20'/>";
	$dado[] = ' <a href="../interno/req/excluir_documentos.php?id_doc_port='. $row_doc_port["id_doc_port"].'"> <button type="button" class="btn btn-primary">Excluir</button></a>';
	$dados[] = $dado;
}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval($linhas),  //Quantidade que há no banco de dados
	"recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json
