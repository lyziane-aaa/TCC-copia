<?php
require_once("../conexao.php");

 
//Sempre iniciado com $, tipo de vari�vel;
//$requestData= $_REQUEST;
$requestData= $_REQUEST;


	$columns = array( 
		0=> 'nome_usuarios', 
		1=> 'matricula_usuarios',
		2=> 'usuarios_cargos.nome_cargo',
		3=> 'telefone',
		4=> 'email',
		
		
	);

//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_usuarios="select usuarios.nome_usuarios, 
usuarios.matricula_usuarios, usuarios_cargos.nome_cargo, usuarios.telefone, usuarios.email from usuarios
JOIN usuarios_cargos on usuarios.cargo = usuarios_cargos.id_diretoria";
$resultado_consulta_usuarios=mysqli_query($conn,$consulta_usuarios);
$linhas=mysqli_num_rows($resultado_consulta_usuarios);






//Obter dados
$result_usuarios="
select usuarios.nome_usuarios, 
usuarios.matricula_usuarios, usuarios_cargos.nome_cargo, usuarios.telefone, usuarios.email from usuarios
JOIN usuarios_cargos on usuarios.cargo = usuarios_cargos.id_diretoria WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_usuarios.=" AND ( usuarios.nome_usuarios LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR usuarios_cargos.nome_cargo LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR usuarios.matricula_usuarios LIKE '".$requestData['search']['value']."%' )";
}	
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT " . $requestData['start'] . " ,".$requestData['length']."   ";

$resultado_usuarios= mysqli_query($conn, $result_usuarios);


$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado

$resultado_usuarios=mysqli_query($conn, $result_usuarios) or die ("erro " . mysqli_error($conn));



	while($row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
		$dado = array(); 
		$dado[] = $row_usuarios["nome_usuarios"];
		$dado[] = $row_usuarios["matricula_usuarios"];
		$dado[] = $row_usuarios["nome_cargo"];
		$dado[] = $row_usuarios["telefone"];
		$dado[] = $row_usuarios["email"];
		$dados[] = $dado;}

// <?php echo $rows_usuarios['img_usuarios'];"';
//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json


?>