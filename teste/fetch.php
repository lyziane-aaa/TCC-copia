<?php
require_once("../conexao.php");
//Sempre iniciado com $, tipo de variável;
$requestData= $_REQUEST;



$columns = array( 
	0=> 'id_bc', 
	1=> 'nome_bc', 
	2=> 'matricula_bc',
	3=> 'laudas_bc'
);
//Verificação de quantas linhas tem a tabela para paginação
/*$columns = array( 
	0=> 'id_bc', 
	1=>'nome_bc', 
	2=> 'matricula_bc',
	3=> 'laudas_bc'
);*/
$result_doc="SELECT id_bc,nome_bc, matricula_bc, laudas_bc FROM bolsacopia";
$resultado_doc=mysqli_query($conn,$result_doc);
$linhas=mysqli_num_rows($resultado_doc);
//pegar dados






//Obter dados
$result_doc_ofc = "SELECT id_bc, nome_bc, matricula_bc, laudas_bc FROM bolsacopia WHERE 1=1";

/*if(!empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_doc_ofc.=" AND ( nome_bc LIKE '%".$requestData['search']['value']."%' ";    
	$result_doc_ofc.=" OR matricula_bc LIKE '%".$requestData['search']['value']."%' ";
	$result_doc_ofc.=" OR laudas_bc LIKE '%".$requestData['search']['value']."%' )";
}
*/
if(!empty($requestData['search']['value'])) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_doc_ofc.=" AND ( nome_bc LIKE '%".$requestData['search']['value']."' ";    
	$result_doc_ofc.=" OR matricula_bc LIKE '%".$requestData['search']['value']."' ";
	$result_doc_ofc.=" OR laudas_bc LIKE '%".$requestData['search']['value']."' )";
$result_doc_ofc.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."";
}


$resultado_doc_ofc= mysqli_query($conn, $result_doc_ofc);





$totalFiltered = mysqli_num_rows($resultado_doc_ofc); // contar as linhas
//Ordenar o resultado

$resultado_doc_ofc=mysqli_query($conn, $result_doc_ofc);
$row_doc_ofc =mysqli_fetch_array($resultado_doc_ofc);



$dados=array();




	
while($row_doc_ofc =mysqli_fetch_array($resultado_doc_ofc) ) {  
$dado = array(); 


$dado[] = $row_doc_ofc["id_bc"];
$dado[] = $row_doc_ofc["nome_bc"];
$dado[] = $row_doc_ofc["matricula_bc"];	
$dado[] = $row_doc_ofc["laudas_bc"];	
$dados[] = $dado;
}

				
//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
"recordsTotal" => intval( $linhas ),  //Quantidade que há no banco de dados
"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json
							

						