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
			/* Aparentemente a presença do Bootstrap altera o tamanho da imagem no menu,
			então essa variavel se encontrara em todos os listar e conterá o novo conteudo a ser colocado
			como formartação da imagem, porém para isso dar certo terei de fazer um teste lógico dentro do
			 menu com o php */
             
             
    ?>
<p> O Cadastro de uma nova gestão necessariamente implicará no arquivamento de todos os usuários existentes para o módulo Histórico </p>

    <form action="inserir_gestao.php" class = "cadastro" method="post" enctype="multipart/form-data">
        <h2 class="cad-titulo"><img src="/TCC/imagens/usuarios.png"> Cadastro Usuários</h2>
        <hr class="divisor"> 

        <label >Nome da Gestão:</label>
        <input type="text" name="nome_gestao" id="nome" required>
        <br>

        <label >Início da Gestão:</label>
        <input type="datetime-local" name="inicio_gestao" id="nome-usuarios" required>
        <br>

        <label >Vencimento da Gestão:</label>
        <input type="datetime-local" name="vencimento_gestao" id="senha"required>
        <br>
                
        <label >Ata de Posse</label>
        <input type="file" required="true" name="ata_posse_gestao" class="form-control">

        <!-- Cadastrar novo Administrador do sistema -->

        <h2 class="cad-titulo"><img src="../imagens/usuarios.png"> Cadastro de novo administrador</h2>
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

        <label for="cargo">Cargo:</label>
        <select name = "cargo"> 
        <?php
        
            $resultado_car=mysqli_query($conn, "SELECT * FROM usuarios_diretoria");
            while($row_car = mysqli_fetch_array($resultado_car))
        
            {
                echo '<option value="' . $row_car["id_diretoria"].'">' . $row_car["cargo_diretoria"] . '</option>';    
            }
        ?>                        
        </select>
        <br>
        
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula_usuarios" id="matricula" onKeyPress="return Onlynumbers(event);" required>
        <br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" onKeyPress="return Onlynumbers(event);" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="nivel">Nível:</label>
        <input type="text" name="nivel" id="telefone" value ="2" readonly required>
        <br>
        <input type="hidden" name="gremista registro" value="<?php echo $gremista; ?>">

        <?php 
           $gremista = $_SESSION['nome_usuarios'];
          
        ?>
        <!-- inputs escondidas -->
   
        <input type="hidden" name="cadastro_gremista_gestao" value="<?php echo $gremista; ?>">
        <!-- fim das inputs escondidas -->
        <input type="submit" class="botao" onclick="msg()" value="Cadastrar">
        <input type="reset" class="botao" value="Limpar">
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


