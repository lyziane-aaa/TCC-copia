<?php include_once("../../TCC/funcs/header.php"); ?>

    <title>Cadastrar Patrimônio</title>


</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->
<body class="bg-dark">
    <?php 
        include_once(SITE_ROOT . "funcs/menu.php");
        include_once("../funcs/conexao.php"); 
        if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
            $_SESSION['listar'] = 2;         
    ?>
    <form action="inserir_patrimonio.php" class = "cadastro" method="post">
        <h2 class="cad-titulo"><img src="../imagens/patrimonio.png">Cadastrar Patrimônio</h2>
        <hr class="divisor"> 

        <label for="nome-objeto">Nome do Objeto:</label>
        <input type="text" name="nomePat" id="nome-objeto" required>
        <br>

        <label for="codigo-barras">Código de Barras</label>
        <input type="text" name="codBarrasPat" id="codigo-barras" onKeyPress="return Onlynumbers(event);" required>
        <br>

        <div class="linha">
            <label for="obtencao" class="post" >Forma de Obtenção:</label>
            <select name="obtencaoPat" id="obtencao">
                <option value="Compra">Compra</option>
                <option selected value="Doação">Doação</option>
            </select>
            <br>

            <label for="status" class="post" >Condição:</label>
            <select name="statusPat" id="status">
                <option value="Novo">Novo</option>
                <option selected value="Normal">Normal</option>
                <option value="Desgastado">Desgastado</option>
            </select>
            <br>
        </div>
        <br>

        <label for="custo">Custo:</label>
        <input type="number" name="custoPat" id="custo" onKeyPress="return Onlynumbers(event);" >
        <br>
        <br>

        <label for="nome-gresmista">Cadastrado por</label>
        <input type="text" name="gremista_cadastro_pat" id="nome-gremista" value="<?= $_SESSION['nome_usuarios'] ?> ." required readonly>
        <br>
        <br>

        <label for="emprestavel" class="post" >Pode ser emprestado:</label>
            <select name="emprestavel" id="emprestavel">
                <option value="1">Sim</option>
                <option selected value="0">Não</option>
            </select>

        <label for="descricao">Descrição:</label> 
        <textarea name="obsPat" id="descricao" 
        cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto"></textarea>
        <br>

        <?php 
            $hoje = date('d/m/Y');
        ?>

        <input type="hidden" name="dataCadPat" value="<?php echo $hoje; ?>">

        <input type="submit" class="botao"  value="Cadastrar">
        <input type="reset" class="botao" value="Limpar">
    </form>

    <?php 
        include_once(SITE_ROOT . "funcs/footer.php");
        }
        else{
            header("location:../usuarios/login.php");	
        }  
    ?>

<!-- podemos implementar uma mensagem de confirmação no limpar -->
</body>
</html>


