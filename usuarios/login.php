<?php

include_once('../conexao.php');
include_once('../menu.php');

?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>		
	<link rel = "stylesheet" type = "text/css" href = "../_css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../_css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<script type="text/javascript">
            setTimeout(function(){ 
                var msg = document.getElementsByClassName("alertaDeErro");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 5000);
        </script>
<script src="../../js/scripts.js"></script>
</head>
<?php
$mensg1="";
$login = "";
$senha= "";

//isset verifica se login e senha existentem ou se eles não possui o valor igual a NULL
//informa se as variáveis foram iniciadas, retornando true or false
if((isset($_POST['login'])) && (isset($_POST['senha']))){
	$login = filter_input(INPUT_POST,'login', FILTER_SANITIZE_STRING); 

	$senha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);
	$senha = md5($senha);

	// As senhas não eram aceitas, então foi retirado "$senha = md5($senha);"
	//print ('<br>');
	//print ($_POST['senha']);
	//exit();

	$resultado_select = "SELECT login, senha, nivel, nome_usuarios FROM usuarios WHERE login='".$login."' and senha = '".$senha."'";
    $resultado_usuario = mysqli_query($conn, $resultado_select);
    $resultado = mysqli_fetch_assoc($resultado_usuario);
	//verifica se login e senha são iguais	
	if(isset($resultado) &&  $senha == $resultado['senha']){
	$_SESSION['login'] = $resultado['login'];
	$_SESSION['senha'] = $resultado['senha'];
	$_SESSION['nivel'] = $resultado['nivel'];
	$_SESSION['nome_usuarios'] = $resultado['nome_usuarios'];

	//verifica se login e senha são iguais	
	
	 //estou redirecionando ao realizar o login        
	header("Location: ../Funcs/inicio.php");
	//se não forem iguais, exibe a mensagem
	}else{
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

			
			<!-- é necessário usar o javascript para fazer com que o não sou gremista ative uma função php ou JS
			que faça a criação de uma váriavel PHP chamada "$_SESSION['alunos'] e adicione true a ela.
			O objetivo é fazer com que a) o menu não apareça no login e b) saibamos quem é aluno
			c) Quem não passou pelo login não vai ter acesso ao site
			Possibilidade 2: Fazer o não sou gremista levar a uma outra pagina onde deve colocar a matricula
			e assim usarmos ela como forma de realizar o teste.-->
		
            <?= $mensg1 ?>
        </form>
    </div>

</body>
</html>