<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "gremio";
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
//Sempre iniciado com $, tipo de variável;
$requestData= $_REQUEST;


$columns = array( 
	0=> 'id_doc_ofc', 
	1=> 'titulo_doc_ofc', 
	2=> 'gremista_registro_ofc',
	3=> 'data_registro_ofc'
);
//Verificação de quantas linhas tem a tabela para paginação
/*$columns = array( 
	0=> 'id_doc_ofc', 
	1=>'titulo_doc_ofc', 
	2=> 'data_registro_ofc',
	3=> 'gremista_registro_ofc'
);*/
$result_doc="SELECT id_doc_ofc,titulo_doc_ofc, data_registro_ofc, gremista_registro_ofc FROM documentos_ofc";
$resultado_doc=mysqli_query($conn,$result_doc);
$linhas=mysqli_num_rows($resultado_doc);
//pegar dados

//Obter dados
$result_doc_ofc="SELECT id_doc_ofc, titulo_doc_ofc,data_registro_ofc,gremista_registro_ofc FROM documentos_ofc WHERE 1=1";


if(!empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_doc_ofc.=" AND ( titulo_doc_ofc LIKE '%".$requestData['search']['value']."%' ";    
	$result_doc_ofc.=" OR data_registro_ofc LIKE '%".$requestData['search']['value']."%' ";
	$result_doc_ofc.=" OR gremista_registro_ofc LIKE '%".$requestData['search']['value']."%' )";
}

$resultado_doc_ofc= mysqli_query($conn, $result_doc_ofc);
$totalFiltered = mysqli_num_rows($resultado_doc_ofc); // contar as linhas
//Ordenar o resultado
$result_doc_ofc.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$resultado_doc_ofc=mysqli_query($conn, $result_doc_ofc);
$row_doc_ofc =mysqli_fetch_array($resultado_doc_ofc);

$dados=array();
	
while($row_doc_ofc =mysqli_fetch_array($resultado_doc_ofc)) 
{  
$dado = array(); 
$dado[] = $row_doc_ofc["id_doc_ofc"];
$dado[] = $row_doc_ofc["titulo_doc_ofc"];
$dado[] = $row_doc_ofc["gremista_registro_ofc"];
$dado[] = $row_doc_ofc["data_registro_ofc"];	
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
							
