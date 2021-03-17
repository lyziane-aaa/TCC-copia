<?php
require_once("../../funcs/conexao.php");
//Sempre iniciado com $, tipo de vari�vel;
//$requestData= $_REQUEST;
$requestData= $_REQUEST;

$columns = array( 
	0=> 'id_pat_baixa', 
	1=> 'nome_pat_baixa', 
	2=> 'cod_barras_pat_baixa',
	3=> 'obtencao_pat_baixa',
	4=> 'custo_obt_baixa',
	5=> 'obs_pat_baixa',
	6=> 'data_obt_baixa',
	7=> 'data_baixa',
	8=> 'motivo_baixa',
	9=> 'gremista_baixa'
);
//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_pat="SELECT * FROM patrimoniobaixa";
$resultado_consulta_pat=mysqli_query($conn,$consulta_pat);
$linhas=mysqli_num_rows($resultado_consulta_pat);



//Obter dados
$result_pat="SELECT * FROM patrimoniobaixa WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_pat.=" AND ( nome_pat_baixa LIKE '".$requestData['search']['value']."%' ";    
	$result_pat.=" OR cod_barras_pat_baixa LIKE '".$requestData['search']['value']."%' ";
	$result_pat.=" OR custo_obt_baixa LIKE '".$requestData['search']['value']."%' )";
}
$result_pat.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$resultado_pat= mysqli_query($conn, $result_pat);
$totalFiltered = mysqli_num_rows($resultado_pat);
//Ordenar o resultado




while($row_pat =mysqli_fetch_array($resultado_pat) ) {  
	$dado = array(); 
	$dado[] = $row_pat["id_pat_baixa"];
	$dado[] = $row_pat["nome_pat_baixa"];
	$dado[] = $row_pat["cod_barras_pat_baixa"];
	$dado[] = $row_pat["obtencao_pat_baixa"];
	$dado[] = $row_pat["custo_obt_baixa"];
	$dado[] = $row_pat["obs_pat_baixa"];
	$datapat = date('d/m/Y H:i:s',strtotime($row_pat["data_obt_baixa"]));
	$dado[] = $datapat;
	$dado[] = $row_pat["motivo_baixa"];
	$dado[] = $row_pat["gremista_baixa"];
	$dados[] = $dado;
}

$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $linhas ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json


?>