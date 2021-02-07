<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Empréstimo</title>
    <!-- Links CSS -->
    <link rel="stylesheet" href="../css/estilo.css">
    <!-- SCRIPTS -->
    <script src="../js/scripts.js"></script>

</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->
<body class="tema-escuro">
    <?php 
        include_once("../menu.php");
        include_once("../conexao.php");
        if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {    
    ?>
    <form action="inserir_emprestimo.php" class = "cadastro" method="post">
        <h2 class="cad-titulo"><img src="../imagens/emprestimos.png"> Cadastro Empréstimo</h2>
        <hr class="divisor"> 
        <br> 
        <label for="nome-objeto">Nome do objeto:</label>
        <input type="text" name="nomeDoObjeto" id="nome-objeto" required>
        <br>

        <label for="condicao" id="post">Condição:</label>
        <select name="condicaoEmp" id="condicao">
            <option value="Novo">Novo</option>
            <option selected value="Normal">Normal</option>
            <option selected value="Desgastado">Desgastado</option>
        </select>
        <br> 
        <br> 
        <?php 
            $hoje = date('d/m/Y');
        ?>

        <input type="hidden" name="dataEmp" value="<?php echo $hoje; ?>">

        <label for="detalhes">Detalhes</label> 
        <textarea name="detalhesEmp" id="detalhes" 
        cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto"></textarea>
        <br>       

        <input type="submit" class="botao" onclick="msg()" value="Cadastrar">
        <input type="reset" class="botao" value="Limpar">
    </form>
    <?php 
    include_once("../footer.php"); 
        }
        else{
        header("location:../usuarios/login.php");	
        }   
    ?>

</body>
</html>


