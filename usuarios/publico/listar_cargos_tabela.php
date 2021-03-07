<?php
require_once("../conexao.php");
//Sempre iniciado com $, tipo de vari�vel;
//$requestData= $_REQUEST;
$requestData= $_REQUEST;

$columns = array( 
	0=> 'id_usuarios', 
	1=>'nome_usuarios', 
	2=> 'cargo',
	3=> 'matricula_usuarios',
	4=> 'telefone',
	5=> 'email',
	6=> 'nivel',
	7=> 'data_registro'
);
//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_usuarios="SELECT * FROM usuarios";
$resultado_consulta_usuarios=mysqli_query($conn,$consulta_usuarios);
$linhas=mysqli_num_rows($resultado_consulta_usuarios);
//pegar dados

// nome_usuarios,descricao_usuarios,gremista_recebeu_usuarios,quando_usuarios,onde_usuarios,quem_reivindicou_usuarios,cpf_matricula_usuarios,gremista_devolveu_usuarios,postado_usuarios, status_usuarios, img_usuarios

//



//Obter dados
$result_usuarios="SELECT * FROM usuarios WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_usuarios.=" AND ( nome_usuarios LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR cargo LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR matricula_usuarios LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios= mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);



while($row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["id_usuarios"];
	$dado[] = $row_usuarios["nome_usuarios"];
	$dado[] = $row_usuarios["cargo"];
	$dado[] = $row_usuarios["matricula_usuarios"];
	$dado[] = $row_usuarios["telefone"];
	$dado[] = $row_usuarios["email"];
	$dado[] = $row_usuarios["nivel"];
	$dado[] = $row_usuarios["data_registro"];
	$dados[] = $dado;
}
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