<?php
require_once("../conexao.php");
$requestData= $_REQUEST;

$columns = array( 
	0=> 'nome_fardas_enc', 
	1=> 'matricula_fardas_enc', 
	2=> 'telefone_fardas_enc',
	3=> 'tamanho_fardas_enc',
	4=> 'qnt_fardas_enc',
	5=> 'data_encomenda'

);
//Verificação de quantas linhas tem a tabela para pagina��o
$consulta_fardas_enc="SELECT id_fardas_enc,nome_fardas_enc,matricula_fardas_enc,telefone_fardas_enc,tamanho_fardas_enc,qnt_fardas_enc, data_encomenda FROM fardas_encomendas";
$resultado_consulta_fardas_enc=mysqli_query($conn,$consulta_fardas_enc);
$linhas=mysqli_num_rows($resultado_consulta_fardas_enc);

//Obter dados
$result_fardas_enc="SELECT id_fardas_enc,nome_fardas_enc,matricula_fardas_enc,telefone_fardas_enc,tamanho_fardas_enc,qnt_fardas_enc, data_encomenda FROM fardas_encomendas WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_fardas_enc.=" AND ( nome_fardas_enc LIKE '%".$requestData['search']['value']."%' ";    
	$result_fardas_enc.=" OR matricula_fardas_enc LIKE '%".$requestData['search']['value']."%' ";
	$result_fardas_enc.=" OR tamanho_fardas_enc LIKE '%".$requestData['search']['value']."%' )";

	$result_fardas_enc.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

}


$resultado_fardas_enc= mysqli_query($conn, $result_fardas_enc);
$totalFiltered = mysqli_num_rows($resultado_fardas_enc);
//Ordenar o resultado




while($row_fardas_enc =mysqli_fetch_array($resultado_fardas_enc) ) {  
	$dado = array(); 
	$dado[] = $row_fardas_enc["nome_fardas_enc"];
	$dado[] = $row_fardas_enc["matricula_fardas_enc"];
	$dado[] = $row_fardas_enc["telefone_fardas_enc"];
	$dado[] = $row_fardas_enc["tamanho_fardas_enc"];
	$dado[] = $row_fardas_enc["qnt_fardas_enc"];
	$dado[] = $row_fardas_enc["data_encomenda"];
	$dado[] = '
	<!-- Botão para acionar modal de de Encerrar a encomenda -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-' . $row_fardas_enc["id_fardas_enc"] . '">
Confirmar
</button>';
	$dados[] = $dado;
}

//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $linhas ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json
