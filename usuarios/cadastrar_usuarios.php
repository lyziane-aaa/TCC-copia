<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuários</title>
    <!-- Links CSS -->
    <link rel="stylesheet" href="../_css/estilo.css">
    <!-- SCRIPTS -->
    <script src="../js/scripts.js"></script>

</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->
<body class="tema-escuro">
    <?php 
        
        include_once("../conexao.php");
        include_once("../menu.php");
        if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
            $_SESSION['listar'] = 2; 
			/* Aparentemente a presença do Bootstrap altera o tamanho da imagem no menu,
			então essa variavel se encontrara em todos os listar e conterá o novo conteudo a ser colocado
			como formartação da imagem, porém para isso dar certo terei de fazer um teste lógico dentro do
			 menu com o php */    
    ?>

    <form action="inserir_usuarios.php" class = "cadastro" method="post">
        <h2 class="cad-titulo"><img src="../imagens/usuarios.png"> Cadastro Usuários</h2>
        <hr class="divisor"> 

        <label for="login">Nome de usuário:</label>
        <input type="text" name="login" id="nome" maxlength="11" required>
        <br>

        <label for="nome-usuarios">Nome completo:</label>
        <input type="text" name="nome_usuarios" id="nome-usuarios" required>
        <br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha"required>
        <br>
            <select name = "cargo">
      <?php  $resultado_car=mysqli_query($conn, "SELECT * FROM usuarios_diretoria");
            while($row_car = mysqli_fetch_array($resultado_car))
        
            {
                echo '<option value="' . $row_car["id_diretoria"].'">' . $row_car["cargo_diretoria"] . '</option>';    
            }?>

            </select>   
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula_usuarios" id="matricula" onKeyPress="return Onlynumbers(event);" required>
        <br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" onKeyPress="return Onlynumbers(event);" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <!-- AINDA TEM DE ADICIONAR O TESTE DE NÍVEL -->
        <label for="nivel" id="post">Nível:</label>
        <select name="nivel" id="nivel">
            <option value="1">1</option>
            <option selected value="2">2</option>
        </select>    
        <br>

        <?php 
            /* O $_SESSION ainda está apresentando alguns problemas */
            $hoje = date('d/m/Y');
            $gremista = $_SESSION['nome_usuarios'];
        ?>

        <input type="hidden" name="data_registro" value="<?php echo $hoje; ?>">
        <input type="hidden" name="gremista_registro" value="<?php echo $gremista; ?>">
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


