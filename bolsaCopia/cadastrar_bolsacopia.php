<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Bolsa Cópia</title>
    <!-- Links CSS -->
    <link rel="stylesheet" href="../css/estilo.css">
    <!-- SCRIPTS -->
    <script src="../js/scripts.js"></script>

</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->
<body class="bg-dark">
    <?php 
        include_once("../../TCC/funcs/header.php");
        include_once(SITE_ROOT . "funcs/menu.php");
        include_once("../funcs/conexao.php"); 
        if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
            $_SESSION['listar'] = 2;  
    ?>
    <form action="inserir_bolsacopia.php" class = "cadastro bg-dark" method="post">
        <h2 class="cad-titulo"><img src="../imagens/bc.png"> Cadastro Bolsa Cópia</h2>
        <hr class="divisor"> 

        <label for="nome-bc">Nome:</label>
        <input type="text" name="nome_bc" id="nome-bc" required>
        <br>

        <label for="matricula-bc">Matrícula:</label>
        <input type="text" name="matricula_bc" id="matricula_bc-bc" onKeyPress="return Onlynumbers(event);" required>
        <br>

        <label for="laudas-bc">Laudas:</label>
        <input type="number" name="laudas_bc" id="laudas-bc" onKeyPress="return Onlynumbers(event);" min="0" max="20" required>
        <br>

        <input type="submit" class="botao"  value="Cadastrar">
        <input type="reset" class="botao" value="Limpar">
    </form>
        </div>
    <?php 
    include_once(SITE_ROOT . "funcs/footer.php"); 
}

else{
	header("location:../usuarios/login.php");	
}
?>

</body>
</html>


