<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Gestão</title>
    <!-- Links CSS -->
    <link rel="stylesheet" href="/TCC/_css/estilo.css">
    <!-- SCRIPTS -->
    <script src="/TCC/js/scripts.js"></script>

</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->
<body class="tema-escuro">
    <?php 
        
        include_once("../../conexao.php");
        include_once("../../menu.php");
        if(isset($_SESSION['login'])) {
            if ($_SESSION['nivel'] = 2) {
            $_SESSION['listar'] = 2; 
			   
    ?>
<div>

Olá! Boas-vindas ao Painel de Gerenciamento de Diretoria! Aqui você poderá gerenciar os cargos administrativos da sua agremiação. 
O Sistema já possui cargos padrão que podem ser alterados segundo o disposto no Estatuto do GEVP.
</div>
    <form action="atualizar_diretoria.php" class = "cadastro" method="post">
        <h2 class="cad-titulo"><img src="/TCC/imagens/gestao.png">Renomear Cargos</h2>
        <hr class="divisor"> 
        <label for ="alterar_cargo_antigo"> Selecione o cargo que deseja renomear </label>
            <select name = "alterar_cargo_antigo"> 
        <?php
        
            $resultado_car=mysqli_query($conn, "SELECT * FROM usuarios_cargos");
            while($row_car = mysqli_fetch_array($resultado_car))
        
            {
                echo '<option value="' . $row_car["id_diretoria"].'">' . $row_car["nome_cargo"] . '</option>';    
            }
            ?>                        
            </select>
            
            <label for ="alterar_cargo_novo"> Selecione o cargo que deseja alterar </label>
            <input type="text" required placeholder="Ex.: Diretor de Finanças" name = "alterar_cargo_novo">

            <?php 
            $gremista = $_SESSION['nome_usuarios'];
            
            ?>
            <!-- inputs escondidas -->
    
            <input type="hidden" name="gremista_update" value="<?php echo $gremista; ?>">

            <input type="reset" class="botao" value="Limpar">
            <input type="submit" class="botao" onclick="msg()" value="Renomear cargo"> <!-- botar aviso aqui-->
        
    </form>

        <!-- Formulário de Adicionar novos cargos -->
    <form action="inserir_diretoria.php" class = "cadastro" method="post">
        <h2 class="cad-titulo"><img src="/TCC/imagens/gestao.png">Adiconar novos Cargos</h2>
        <hr class="divisor"> 

            <label for ="inserir_cargo"> Nome do novo cargo </label>
            <input type="text" required placeholder="Ex.: Diretor de Saúde e Meio Ambiente" name = "inserir_cargo">
            
            
            <label for ="inserir_tipo_diretoria"> Nome da Diretoria do cargo </label>
            <input type="text" required placeholder="Ex.: Diretoria de Saúde e Meio Ambiente" name = "inserir_tipo_diretoria">

            <input type="reset" class="botao" value="Limpar">
            <input type="submit" class="botao" onclick="msg()" value="Adicionar cargo"> 

    </form>




    <?php 
        include_once("../../footer.php");
        }
        else{
            header("location:/TCC/usuarios/login.php");	
        }  }
    ?>

</body>
</html>


