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
	0=> 'nome_bc', 
	1=>'matricula_bc', 
	2=> 'laudas_bc',
	3=> 'ultima_data_bc'
);
//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_bc="SELECT * FROM bolsacopia";
$resultado_consulta_bc=mysqli_query($conn,$consulta_bc);
$linhas=mysqli_num_rows($resultado_consulta_bc);


//Obter dados
$result_bc="SELECT nome_bc,matricula_bc,laudas_bc,ultima_data_bc FROM bolsacopia WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_bc.=" AND ( nome_bc LIKE '".$requestData['search']['value']."%' ";    
	$result_bc.=" OR matricula_bc LIKE '".$requestData['search']['value']."%' ";
	$result_bc.=" OR laudas_bc LIKE '".$requestData['search']['value']."%' )";
}

$resultado_bc= mysqli_query($conn, $result_bc);
$totalFiltered = mysqli_num_rows($resultado_bc);
//Ordenar o resultado
$result_bc.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_bc=mysqli_query($conn, $result_bc);



while($row_bc =mysqli_fetch_array($resultado_bc) ) {  
	$dado = array(); 
	$dado[] = $row_bc["nome_bc"];
	$dado[] = $row_bc["matricula_bc"];
	$dado[] = $row_bc["laudas_bc"];
	$databr = date('d/m/Y H:i:s',strtotime($row_bc["ultima_data_bc"]));
	$dado[] = $databr;
	//$dado[] = $row_bc["ultima_data_bc"];
	$dados[] = $dado;
}
// <?php echo $rows_bc['img_bc'];"';
//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json


?>