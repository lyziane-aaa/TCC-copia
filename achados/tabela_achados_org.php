<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "gremio";
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
//Sempre iniciado com $, tipo de vari�vel;
//$requestData= $_REQUEST;
$requestData= $_REQUEST;

$columns = array( 
	0=> 'id_achados',
	1=> 'nome_achados', 
	2=>'descricao_achados', 
	3=> 'gremista_recebeu_achados',
	4=> 'quando_achados',
	5=> 'onde_achados',
	6=> 'quem_reivindicou_achados',
	7=> 'cpf_matricula_achados',
	8=> 'gremista_devolveu_achados',
	9=> 'postado_achados',
	10=> 'status_achados',
	11=> 'img_achados'
);
//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_achados="SELECT * FROM achados";
$resultado_consulta_achados=mysqli_query($conn,$consulta_achados);
$linhas=mysqli_num_rows($resultado_consulta_achados);
//pegar dados

// nome_achados,descricao_achados,gremista_recebeu_achados,quando_achados,onde_achados,quem_reivindicou_achados,cpf_matricula_achados,gremista_devolveu_achados,postado_achados, status_achados, img_achados

//



//Obter dados
$result_achados="SELECT id_achados,nome_achados,descricao_achados,gremista_recebeu_achados,quando_achados,onde_achados,quem_reivindicou_achados,cpf_matricula_achados,gremista_devolveu_achados,postado_achados, status_achados, img_achados FROM achados WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_achados.=" AND ( nome_achados LIKE '".$requestData['search']['value']."%' ";    
	$result_achados.=" OR gremista_recebeu_achados LIKE '".$requestData['search']['value']."%' ";
	$result_achados.=" OR onde_achados LIKE '".$requestData['search']['value']."%' )";
	$result_achados.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

}

$resultado_achados= mysqli_query($conn, $result_achados);

$totalFiltered = mysqli_num_rows($resultado_achados);

//Ordenar o resultado
$resultado_achados=mysqli_query($conn, $result_achados);



while($row_achados =mysqli_fetch_array($resultado_achados) ) {  
	$dado = array(); 
	$dado[] = $row_achados["id_achados"];
	$dado[] = $row_achados["nome_achados"];
	$dado[] = $row_achados["descricao_achados"];
	$dado[] = $row_achados["gremista_recebeu_achados"];
	$dado[] = $row_achados["quando_achados"];
	$dado[] = $row_achados["onde_achados"];
	$dado[] = $row_achados["quem_reivindicou_achados"];
	$dado[] = $row_achados["cpf_matricula_achados"];
	$dado[] = $row_achados["gremista_devolveu_achados"];
	$dado[] = $row_achados["postado_achados"];
	$dado[] = $row_achados["status_achados"];
	$dados[] = $dado;
}

//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json


//Criar a conexao. A vari�ven $conn recebe a conex�o

