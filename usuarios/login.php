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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="/TCC/_css/bootstrap/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style>
	@font-face {
    font-family: 'nasalization';
    src: url("../_css/fontes/nasalization-rg.ttf");
    font-weight: normal;
    font-style: normal;
	}

	@font-face {
		font-family: 'roboto';
		src: url("../_css/fontes/Roboto-Regular.ttf");
		font-weight: normal;
		font-style: normal;
	}
	.container{
		display: grid;
		grid-template-columns: 1fr 3fr;
		grid-template-columns: 30vh 70vh;
		grid-template-rows: 7vh ;
		grid-template-areas: 
		"h h"
		"a m";
		height: 500px;
		border-style: solid 1px gray;
		margin-top: 8%;
		margin-left: 25%;
		background-color: whitesmoke;
		width: min-content;
		padding: 0;
		border-radius: 20px;
		font-family: 'roboto';
	}

	.container hr{
		color:white;
		margin-top: 0;
		margin-right: 10px;
	}
	main{
		grid-area: m;
		margin-left: 30px;
		margin-top: 30px;
		text-align: center;
		font-family: 'roboto';
	}

	aside{
		grid-area: a;
		border-right: solid 2px black;
		background-image: url("../imagens/aside-login.jpg");
		background-size: 100% 100%;
		background-repeat: no-repeat;
		border-bottom-left-radius: 20px;
	}
	.modal-header{
		grid-area: h;
		border-top-left-radius:20px;
		border-top-right-radius:20px;
	}

	.form-control{
		width:  80% !important;
		flex:unset !important;
		margin-bottom: 35px !important;
		margin-top: -10px;
	}

	#user, #password{
		margin-bottom: 35px !important;
		margin-top: -10px;
	}
	body{
		background-image: url("../imagens/fundo_login.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}

	.btn-lg{
		width: 50%;
		color:white ;
	}

	h5{
		color: white;
		font-family: 'nasalization';
		padding-bottom: 10px;
	}

	h2{
		font-family: 'nasalization';
	}

	.modal-header img{
		width:60px; height:35px; margin-top:-4px;border:solid 1px cyan; border-radius:8px;
	}

	span{
		filter: invert(100%);
	}

	@media screen and (max-width: 896px) {
    .container {
        margin-left: 5%;
		margin-top: 5%;
    }
}

	@media screen and (max-width: 768px) {
    .container {
        grid-template-areas: "h h"
		"m m";
		width: 454px;

    }
	aside{
		background: none;
	}
	main{
		width: max-content;
	}

	.modal-header{
		width: max-content;
	}
}

@media screen and (max-width: 700px) {
    html{
        background-image: url("../imagens/fundo_login.jpg");
    }
}
</style>
<script type=" text/javascript">
	setTimeout(function(){
	var msg = document.getElementsByClassName("alerta-erro");
	while(msg.length > 0){
	msg[0].parentNode.removeChild(msg[0]);
	}
	}, 2000);
	</script>
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
		header ("Location: /TCC/");
		//se não forem iguais, exibe a mensagem
	} else {
		$mensg1="<br> <br>
		<input type='text' class='bg-warning btn alerta-erro' style='color:white; font-size:16pt;' readonly value='Usuário ou Senha incorreto!'>
		";
	}
}
?>
<body>

<div class="container">
	<div class="modal-header bg-danger"> 
		<h5>Aplicativo de Gerenciamento ELLY</h5>
		<a href="/TCC/"><img src="../imagens/logo_gremio.png" ></a>
		
	</div>
	<aside>
	</aside>

	<main>
		<form method="POST" action="#">
		<h2>Área de Login</h2>
		<hr>
		<br>
		<div class="input-group mb-3">
			<button class="btn bg-danger btn-sm" id="user">
				<span class="material-icons">
					person
				</span>
			</button>
			<input type="text" name="login" class="form-control form-control-lg" placeholder="Nome de Usuário" aria-describedby="user" required>
			<br>
		</div>
		<div class="input-group mb-3">
			<button class="btn  bg-danger btn-sm" id="password">
				<span class="material-icons">
					lock
				</span>
			</button>
			<input type="password" name="senha" class="form-control form-control-lg" aria-describedby="password" placeholder="Senha"  required>
			<br>
		</div>
		<input type="submit" class="btn btn-lg bg-danger" value="Entrar">
		<?php echo $mensg1; ?>
		
		</form>
	</main>
</div>




<?php
} else { 
	//redireciona para o início caso esteja logado
	header ("Location:" . SITE_ROOT);
}
?>
</body>

</html>