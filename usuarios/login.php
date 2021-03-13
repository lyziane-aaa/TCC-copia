<?php
include_once("../funcs/conexao.php");
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['senha'])){

?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/TCC/_css/estilo.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<script type=" text/javascript">
	setTimeout(function(){
	var msg = document.getElementsByClassName("alertaDeErro");
	while(msg.length > 0){
	msg[0].parentNode.removeChild(msg[0]);
	}
	}, 5000);
	</script>
	<script src="/TCC/js/scripts.js"></script>
</head>
<?php
$mensg1 = "";
$login = "";
$senha = "";

//isset verifica se login e senha existentem ou se eles não possui o valor igual a NULL
//informa se as variáveis foram iniciadas, retornando true or false
if ((isset($_POST['login'])) && (isset($_POST['senha']))) {

	$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);

	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$senha = md5($senha);

	// As senhas não eram aceitas, então foi retirado "$senha = md5($senha);"
	//print ('<br>');
	//print ($_POST['senha']);
	//exit();

	$resultado_select = "SELECT login, senha, nivel, nome_usuarios, usuarios_cargos.nome_cargo, usuarios.matricula_usuarios, usuarios_cargos.permissao_doc FROM usuarios
	JOIN usuarios_cargos 
	ON usuarios.cargo = usuarios_cargos.id_cargo WHERE login='$login' and senha = '$senha'";
	$resultado_usuario = mysqli_query($conn, $resultado_select);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	//verifica se login e senha são iguais	
	if (isset($resultado) &&  $senha == $resultado['senha']) {
		$_SESSION['login'] = $resultado['login'];
		$_SESSION['senha'] = $resultado['senha'];
		$_SESSION['nivel'] = $resultado['nivel'];
		$_SESSION['cargo'] = $resultado['nome_cargo'];
		$_SESSION['permissao_doc'] = $resultado['permissao_doc'];
		$_SESSION['nome_usuarios'] = $resultado['nome_usuarios'];
		$_SESSION['matricula'] = $resultado['matricula_usuarios'];
		



		//estou redirecionando ao realizar o login        
		header("Location: /TCC/emprestimo/listar_emprestimo.php");
		//se não forem iguais, exibe a mensagem
	} else {
		$mensg1 = '<div class="alert alert-danger preto alertaDeErro" role="alert">Usuário ou senha incorreto!
	<br>Tente novamente.</div>';
	}
}
?>

<div class="corpo">
	<form action="" method="post">
		<h2>Área de Login</h2>
		<div class="inputWithIcon">
			<input type="text" placeholder="Usuário" name="login" required="true">
			<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
		</div>

		<div class="inputWithIcon">
			<input type="password" placeholder="Senha" name="senha" required="true">
			<i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
		</div>

		<input type="submit" value="Logar">
		<input type="reset" value="Resetar">

		<?= $mensg1 ?>
	</form>
</div>
<?php
} else { 
	//redireciona para o início caso esteja logado
	header ("Location: /Funcs/inicio.php");
}
?>
</body>

</html>