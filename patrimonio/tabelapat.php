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
	0=> 'id_pat', 
	1=> 'nome_pat', 
	2=> 'cod_barras_pat',
	3=> 'obtencao_pat',
	4=> 'custo_obt',
	5=> 'obs_pat',
	6=> 'data_cad_pat'
);
//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_pat="SELECT * FROM patrimonioativo";
$resultado_consulta_pat=mysqli_query($conn,$consulta_pat);
$linhas=mysqli_num_rows($resultado_consulta_pat);
//pegar dados

// nome_pat,descricao_pat,gremista_recebeu_pat,quando_pat,onde_pat,quem_reivindicou_pat,cpf_matricula_pat,gremista_devolveu_pat,postado_pat, status_pat, img_pat

//



//Obter dados
$result_pat="SELECT * FROM patrimonioativo WHERE 1=1";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_pat.=" AND ( nome_pat LIKE '".$requestData['search']['value']."%' ";    
	$result_pat.=" OR cod_barras_pat LIKE '".$requestData['search']['value']."%' ";
	$result_pat.=" OR custo_obt LIKE '".$requestData['search']['value']."%' )";
}

$resultado_pat= mysqli_query($conn, $result_pat);
$totalFiltered = mysqli_num_rows($resultado_pat);
//Ordenar o resultado
$result_pat.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_pat=mysqli_query($conn, $result_pat);



while($row_pat =mysqli_fetch_array($resultado_pat) ) {  
	$dado = array(); 
	$dado[] = $row_pat["id_pat"];
	$dado[] = $row_pat["nome_pat"];
	$dado[] = $row_pat["cod_barras_pat"];
	$dado[] = $row_pat["obtencao_pat"];
	$dado[] = $row_pat["custo_obt"];
	$dado[] = $row_pat["obs_pat"];
	$datapat = date('d/m/Y H:i:s',strtotime($row_pat["data_cad_pat"]));
	$dado[] = $datapat;	
//	$dado[] = $row_pat["data_cad_pat"];
	$dados[] = $dado;
}
// <?php echo $rows_pat['img_pat'];"';
//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval( $linhas ),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json


?>