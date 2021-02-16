<?php 
session_start();
include_once("../conexao.php");
$nomeAchados = filter_input(INPUT_POST, 'nomeAchados', FILTER_SANITIZE_STRING);
$descricaoAchados = filter_input(INPUT_POST, 'descricaoAchados', FILTER_SANITIZE_STRING);
$gremistaRecebeuAchados = filter_input(INPUT_POST, 'gremistaRecebeuAchados', FILTER_SANITIZE_STRING);
$quandoAchados = filter_input(INPUT_POST, 'quandoAchados', FILTER_SANITIZE_STRING);
$ondeAchados = filter_input(INPUT_POST, 'ondeAchados', FILTER_SANITIZE_STRING);
$quemReivindicouAchados = filter_input(INPUT_POST, 'quemReivindicouAchados', FILTER_SANITIZE_STRING);
$cpfMatriculaAchados = filter_input(INPUT_POST, 'cpfMatriculaAchados', FILTER_SANITIZE_STRING);
$gremistaDevolveuAchados = filter_input(INPUT_POST, 'gremistaDevolveuAchados', FILTER_SANITIZE_STRING);
$postadoAchados = filter_input(INPUT_POST, 'postadoAchados', FILTER_SANITIZE_STRING);
$statusAchados = filter_input(INPUT_POST, 'statusAchados', FILTER_SANITIZE_STRING);
    // configurar hora e data
    $hoje = date('d/m/Y H:i:s');
    date_default_timezone_set('America/Fortaleza');

	$dir = "img_achados"; 
	// recebendo o arquivo multipart 
	$file = $_FILES["imgAchados"]; 
	// Move o arquivo da pasta temporaria de upload para a pasta de destino 
	if (move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])) { 
		
		
		$imgAchados = "$dir/".$file["name"];
		
$opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$db = new PDO('mysql:host=localhost;dbname=gremio', 'root', '', $opcoes);	

$sql = "INSERT INTO achados (nome_achados, descricao_achados, gremista_recebeu_achados, quando_achados, 
onde_achados,quem_reivindicou_achados,cpf_matricula_achados,gremista_devolveu_achados,postado_achados, status_achados, img_achados)
VALUES ('$nomeAchados', '$descricaoAchados', '$gremistaRecebeuAchados', '$quandoAchados', '$ondeAchados', '$quemReivindicouAchados', 
'$cpfMatriculaAchados','$gremistaDevolveuAchados', '$postadoAchados', '$statusAchados', '$imgAchados')";
$stmt = $db->prepare($sql);
try{
	$stmt->execute();
	header("location:cadastrar_achados.php");

   }catch(PDOException $e){
	echo 'Erro: ', $e->getMessage();
   }
					
				


	}