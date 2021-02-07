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
	0=> 'id_emp', 
	1=>'nome_emp', 
	2=> 'disp_emp',
	3=> 'quem_emprestou',
	4=> 'a_quem_emprestou',
	5=> 'matricula_emp',
	6=> 'data_emprestimo',
	7=> 'data_devolucao'
);
//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_emp="SELECT * FROM emprestimos";
$resultado_consulta_emp=mysqli_query($conn,$consulta_emp);
$linhas=mysqli_num_rows($resultado_consulta_emp);
//pegar dados

// nome_emp,descricao_emp,gremista_recebeu_emp,quando_emp,onde_emp,quem_reivindicou_emp,cpf_matricula_emp,gremista_devolveu_emp,postado_emp, status_emp, img_emp

//



//Obter dados
$result_emp="SELECT * FROM emprestimos WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_emp.=" AND ( nome_emp LIKE '".$requestData['search']['value']."%' ";    
	$result_emp.=" OR matricula_emp LIKE '".$requestData['search']['value']."%' ";
	$result_emp.=" OR a_quem_emprestou LIKE '".$requestData['search']['value']."%' )";
}

$resultado_emp= mysqli_query($conn, $result_emp);
$totalFiltered = mysqli_num_rows($resultado_emp);
//Ordenar o resultado
$result_emp.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_emp=mysqli_query($conn, $result_emp);



while($row_emp =mysqli_fetch_array($resultado_emp) ) {  
	$dado = array(); 
	
	

	$dado[] = $row_emp["id_emp"];
	$dado[] = $row_emp["nome_emp"];
	$dado[] = $row_emp["disp_emp"];
	$dado[] = $row_emp["quem_emprestou"];
	$dado[] = $row_emp["a_quem_emprestou"];
	$dado[] = $row_emp["matricula_emp"];
	$dataemp = date('d/m/Y H:i:s',strtotime($row_emp["data_emprestimo"]));
	$dado[] = $dataemp;
	$datadev = date('d/m/Y H:i:s',strtotime($row_emp["data_devolucao"]));
	$dado[] = $datadev;
	$dados[] = $dado;
}
// <?php echo $rows_emp['img_emp'];"';
//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json


