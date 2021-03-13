<?php
require_once("../funcs/conexao.php");
include_once('../Funcs/functions.php');

$requestData= $_REQUEST;

$columns = array( 
	0=> 'nome_pat', 
	1=> 'nome_emp',
	2=> 'matricula_emp',
	3=> 'gremista_emp',
	4=> 'condicao_emp',
	5=> 'data_emp', 
	6=> 'data_dev',
	7=> 'gremista_dev'
);
//Verifica��o de quantas linhas tem a tabela para pagina��o
$consulta_emp="SELECT patrimonioativo.nome_pat,emp.id_emp, emp.nome_emp, emp.matricula_emp, emp.gremista_emp, emp.condicao_emp ,emp.data_emp, emp.data_dev, emp.gremista_dev FROM emprestimos as emp
join patrimonioativo 
on emp.obj_emp = patrimonioativo.id_pat WHERE concluido_emp = 0;";
$resultado_consulta_emp=mysqli_query($conn,$consulta_emp);
$linhas=mysqli_num_rows($resultado_consulta_emp);
//pegar dados

// nome_emp,descricao_emp,gremista_recebeu_emp,quando_emp,onde_emp,quem_reivindicou_emp,cpf_matricula_emp,gremista_devolveu_emp,postado_emp, status_emp, img_emp

//



//Obter dados
$result_emp="SELECT patrimonioativo.nome_pat, emp.id_emp ,emp.nome_emp, emp.matricula_emp, emp.gremista_emp, emp.condicao_emp ,emp.data_emp, 
emp.data_dev, emp.gremista_dev FROM emprestimos as emp
join patrimonioativo 
on emp.obj_emp = patrimonioativo.id_pat WHERE emp.concluido_emp = 0;";

$dados=array();
if(!empty($requestData['search']['value']) ) {   // se houver um par�metro de pesquisa, $requestData['search']['value'] cont�m o par�metro de pesquisa
	$result_emp.=" AND ( patrimonioativo.nome_pat LIKE '%" . $requestData['search']['value']."%' ";    
	$result_emp.=" OR emp.matricula_emp LIKE '%" . $requestData['search']['value']."%' ";
	$result_emp.=" OR emp.nome_emp LIKE '%" . $requestData['search']['value']."%' )";
	$result_emp.=" ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";

}


$resultado_emp= mysqli_query($conn, $result_emp);
$totalFiltered = mysqli_num_rows($resultado_emp);

while($row_emp =mysqli_fetch_array($resultado_emp) ) {  
	$dado = array(); 
	$dado[] = $row_emp["nome_pat"]; // Tem que colocar o nome do campo
	$dado[] = $row_emp["nome_emp"];
	$dado[] = $row_emp["matricula_emp"];
	$dado[] = $row_emp["gremista_emp"];	
	$dado[] = $row_emp["condicao_emp"];
	$dado[] = databr($row_emp["data_emp"]);
	$dado[] = $row_emp["data_dev"];
	$dado[] = $row_emp["gremista_dev"];
	//Botão de Editar
	$dado[] = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editar-'.$row_emp['id_emp'].'">Editar</button>';
	//Botão de Excluir (Ele envia o id via Get)
	$dado[] = '<a href="javascript:confirmar('.$row_emp['id_emp'].')" data-confirm="Tem certeza que deseja prosseguir com a exclusão desse registro ?"> <button type="button" class="btn btn-primary">Excluir</button></a>';
	$dados[] = $dado;
}

// <?php echo $rows_emp['img_emp'];"';
//Cria o array de informa��es a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval(isset($requestData['draw'])),//para cada requisi��o � enviado um n�mero como par�metro
	"recordsTotal" => intval($linhas),  //Quantidade que h� no banco de dados
	"recordsFiltered" => intval($totalFiltered), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 

);

echo json_encode($json_data);  //enviar dados como formato json


