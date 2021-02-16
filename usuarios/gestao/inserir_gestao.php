<?php 
session_start();
include_once("../../conexao.php");
$nome_gestao = filter_input(INPUT_POST, 'nome_gestao', FILTER_SANITIZE_STRING);
$inicio_gestao = filter_input(INPUT_POST, 'inicio_gestao');
$vencimento_gestao = filter_input(INPUT_POST, 'vencimento_gestao', FILTER_SANITIZE_STRING);

$cadastro_gremista_gestao = filter_input(INPUT_POST, 'cadastro_gremista_gestao', FILTER_SANITIZE_STRING);
$hoje = date('d/m/Y H:i:s');
    date_default_timezone_set('America/Fortaleza');

	$dir = "../gestao/ata_posse/"; 
	// recebendo o arquivo multipart 
	$file = $_FILES["ata_posse_gestao"]; 
	// Move o arquivo da pasta temporaria de upload para a pasta de destino 
	if (move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])) { 
		
		
		$ata_posse_gestao = "$dir/".$file["name"];
		
$opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$db = new PDO('mysql:host=localhost;dbname=gremio', 'root', '', $opcoes);	

$sql = "UPDATE usuarios_gestao SET vigente_gestao = 0";
$stmt = $db->prepare($sql);
try{
	$stmt->execute();
   }catch(PDOException $e){
	echo 'Erro: ', $e->getMessage();
   }
// Insere a nova gestao
$resultado_insert = " INSERT INTO usuarios_gestao 
(nome_gestao, inicio_gestao, vencimento_gestao, 
cadastro_gremista_gestao,ata_posse_gestao,vigente_gestao) 
VALUES ('$nome_gestao', '$inicio_gestao', '$vencimento_gestao','$cadastro_gremista_gestao','$ata_posse_gestao', 1)";
 
 $resultado_insertgestao= mysqli_query($conn, $resultado_insert) or die ("erro " . mysqli_error($conn));



 $login= filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
 $nome_usuarios= filter_input(INPUT_POST, 'nome_usuarios', FILTER_SANITIZE_STRING);
 $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
 $senha = md5($senha);
 $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
 $matricula_usuarios = filter_input(INPUT_POST, 'matricula_usuarios', FILTER_SANITIZE_STRING);
 $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
 $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_NUMBER_FLOAT);

 $gremista_registro= filter_input(INPUT_POST, 'gremista_registro', FILTER_SANITIZE_STRING);



$sql = "INSERT INTO usuarios_desativados (nome_des, matricula_des, cargo_des, gestao_des, email_des, inicio_gestao, vencimento_gestao) 

select usuarios.nome_usuarios, usuarios.matricula_usuarios, usuarios_cargos.nome_cargo, usuarios_gestao.nome_gestao, 
usuarios.email, usuarios_gestao.inicio_gestao, usuarios_gestao.vencimento_gestao
 
from usuarios 
join usuarios_diretoria on usuarios.cargo = usuarios_diretoria.id_diretoria
join usuarios_gestao on usuarios.gestao = usuarios_gestao.id_gestao
join usuarios_gestao as ug2 on usuarios.inicio_gestao_usu  = ug2.id_gestao
join usuarios_gestao as ug3 on usuarios.vencimento_gestao_usu = ug3.id_gestao";
$stmt = $db->prepare($sql);
try{
	$stmt->execute();
   }catch(PDOException $e){
	echo 'Erro: ', $e->getMessage();
   }


// Apagará todos os usuários da antiga gestão

/*$sql = "TRUNCATE TABLE usuarios";
$stmt = $db->prepare($sql);
try{
	$stmt->execute();
   }catch(PDOException $e){
	echo 'Erro: ', $e->getMessage();
   }*/
// Cadastrar novo administrador
$sql = "INSERT INTO usuarios (login,nome_usuarios,senha,cargo, matricula_usuarios,telefone, email,nivel, gremista_registro) 
VALUES ('$login','$nome_usuarios','$senha','$cargo','$matricula_usuarios','$telefone','$email','$nivel' ,'$gremista_registro')";
$stmt = $db->prepare($sql);

try{
 $stmt->execute();
}catch(PDOException $e){
 echo 'Erro: ', $e->getMessage();
}
// consulta pra pegar o id_gestao 

$resultado_selectid = "select id_gestao from usuarios_gestao WHERE nome_gestao = '$nome_gestao' LIMIT 1";
    $resultado_id = mysqli_query($conn, $resultado_selectid);
    $resultado = mysqli_fetch_assoc($resultado_id);
//transforma o resultado em int
	$resultado = intval($resultado['id_gestao']);


//inserção da gestão do usuário	
$sql = "UPDATE usuarios SET gestao = '$resultado', inicio_gestao_usu = '$resultado', vencimento_gestao_usu = '$resultado'
	WHERE usuarios.login = '$login'";

$stmt = $db->prepare($sql);
try{
 $stmt->execute();
}catch(PDOException $e){
 echo 'Erro: ', $e->getMessage();

}

header("location:/TCC/sair.php");

	} 
	else { 
		echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
	
	


	}









