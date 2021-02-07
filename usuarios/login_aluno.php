<?php
include_once("../conexao.php");
include_once("../menu.php");

?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>		
	<link rel = "stylesheet" type = "text/css" href = "../_css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../_css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"">
    <script src="../js/scripts.js"></script>

<script type="text/javascript">
            setTimeout(function(){ 
                var msg = document.getElementsByClassName("alertaDeErro");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 5000);
        </script>
<script src="../js/scripts.js"></script>
</head>
<?php
$mensg1="";
//isset verifica se login e senha existentem ou se eles não possui o valor igual a NULL
//informa se as variáveis foram iniciadas, retornando true or false
if(isset($_POST['matricula'])){
    $_SESSION['aluno'] = $_POST['matricula'];     

    header("Location: ../Funcs/inicio.php");
    
	}else{
    
	}
?>

<div class="corpo">
        <form action="" method="post">
            <br>
            <h2>Área do Aluno</h2>
            <br>
			<div class="inputWithIcon">
				<input type="text" placeholder="Matrícula" name="matricula" onKeyPress="return Onlynumbers(event);"  required="true" maxlength="14">
				<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
			</div>
            <input type="submit" value="Entrar">
            <button><a href="login.php" style="text-decoration:none; color:white;">Voltar</a></button>
		
            <?= $mensg1 ?>
        </form>
    </div>

</body>
</html>