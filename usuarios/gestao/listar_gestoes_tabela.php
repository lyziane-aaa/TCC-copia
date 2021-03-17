<?php
require_once("../../funcs/conexao.php");
require_once("../../funcs/functions.php");

 
//Sempre iniciado com $, tipo de vari�vel;
//$requestData= $_REQUEST;
$requestData= $_REQUEST;


	$columns = array( 
		0=> 'nome_gestao', 
		1=> 'inicio_gestao',
		2=> 'usuarios_cargos.nome_cargo',
		3=> 'vencimento_gestao',
		4=> 'email',
		
		
	);

//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_usuarios="SELECT nome_gestao, inicio_gestao, vencimento_gestao FROM usuarios_gestao";
$resultado_consulta_usuarios = mysqli_query($conn,$consulta_usuarios);
$linhas= mysqli_num_rows($resultado_consulta_usuarios);






//Obter dados
$result_usuarios="SELECT nome_gestao, inicio_gestao, vencimento_gestao FROM usuarios_gestao";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_usuarios.=" AND ( nome_gestao LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR inicio_gestao LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR vencimento_gestao LIKE '".$requestData['search']['value']."%' )";
	$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT " . $requestData['start'] . " ,".$requestData['length']."   ";

}	

$resultado_usuarios= mysqli_query($conn, $result_usuarios);


$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado

$resultado_usuarios=mysqli_query($conn, $result_usuarios) or die ("erro " . mysqli_error($conn));



	while($row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
		$dado = array(); 
		$dado[] = $row_usuarios["nome_gestao"];
		$dado[] = databr($row_usuarios["inicio_gestao"]);
		$dado[] = databr($row_usuarios["vencimento_gestao"]);
		$dado[] = 'ata de posse';
		
			$dados[] = $dado;}

// <?php echo $rows_usuarios['img_usuarios'];"';
//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $linhas ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json

