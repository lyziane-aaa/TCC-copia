
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Achados e Perdidos</title>
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
            $_SESSION['listar'] = 2; 
    ?>
    <form action="inserir_achados.php" class = "cadastro" method="post" enctype="multipart/form-data">
        <h2 class="cad-titulo"><img src="../imagens/achados.png"> Cadastro Achados e Perdidos</h2>
        <hr class="divisor"> 

        <label for="nome-objeto">Nome do Objeto:</label>
        <input type="text" name="nomeAchados" id="nome-objeto" required>
        <br>

        <label for="gremista-recebe">Gremista que recebeu:</label>
        <input type="text" name="gremistaRecebeuAchados" id="gremista-recebe" required>
        <br>

        <label for="quando-achados">Quando foi achado:</label>
        <input type="date" name="quandoAchados" id="quando-achados" required>
        <br>

        <label for="onde-achados">Onde foi achado:</label>
        <input type="text" name="ondeAchados" id="onde-achados" required>
        <br>

        <label for="dados-achados">CPF ou Matrícula de quem Reinvindicou:</label>
        <input type="text" name="cpfMatriculaAchados" id="dados-achados" onKeyPress="return Onlynumbers(event);" required>
        <br>

        <label for="gremista-devolveu-achados">Gremista que devolveu:</label>
        <input type="text" name="gremistaDevolveuAchados" id="gremista-devolveu-achados">
        <br>

        <div> 
            <label for="postado" id="post">Postado:</label>
                <select name="postadoAchados" id="postado">
                    <option value="Sim">Sim</option>
                    <option selected value="Não">Não</option>
                </select>
                
            <label for="status" id="situ">Situação:</label>
                <select name="statusAchados" id="status">
                    <option value="Devolvido">Devolvido</option>
                    <option selected value="Aguardando"  >Aguardando</option>
                    <option value="Incorporado">Incorporado</option>
                </select>
        </div>
        <div class="form-row">
          <div class="form-group mx-sm-3 mb-2"> <!-- Imagem -->
         <label for="imgAchados">Imagem do Achado:</label>
         <input name = "imgAchados" type="file" required="true" name="imgAchados" class="form-control">
           
         
          </div>
             </div> <!-- fim form-row -->
        <br>

        <label for="descricao">Descrição</label> 
        <textarea name="descricaoAchados" id="descricao" 
        cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto"></textarea>
        <br>
        <input type="submit" value="Enviar">
        <input type="reset"  value="Limpar">
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


