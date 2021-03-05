<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Encomendar Farda</title>
    <!-- Links CSS -->
    <link rel="stylesheet" href="../_css/estilo.css">
    <!-- SCRIPTS -->
    <script src="/TCC/js/scripts.js"></script>

</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->
<body class="tema-escuro">
    <?php 
        include_once("../menu.php");
        include_once("../conexao.php");
      
    ?>
    <div>
    <form action="inserir_fardas_enc.php" class = "cadastro" method="post" enctype="multipart/form-data">
        <h2 class="cad-titulo"><img src="../imagens/_fardas_enc.png">Fazer encomenda </h2><h5> (As encomendas vencem em três dias) </h5>
        <hr class="divisor"> 

        <label for="nome_fardas_enc">Nome Completo:</label>
        <input type="text" name="nome_fardas_enc" id="nome-objeto" required>
        <br>

        <label for="matricula_fardas_enc">Matrícula:</label>
        <input type="text" name="matricula_fardas_enc" id="gremista-recebe" required>
        <br>

        <label for="telefone_fardas_enc">Telefone para contato:</label>
        <input type="tel" name="telefone_fardas_enc" id="telefone_fardas_enc" required>
        <br>

        <label for="tamanho_fardas_enc">Tamanho da Farda</label>
        <select name = "tamanho_fardas_enc" required>
            <option value = "PP">PP</option>
            <option value = "PP-BL">PP Baby Look</option> <!-- "-BL" significa BabyLook-->
            <option value = "P">P</option>
            <option value = "P-BL">P Baby Look</option>
            <option value = "M">M</option>
            <option value = "M-BL">M Baby Look</option>
            <option value = "G">G</option>
            <option value = "G-BL">G Baby Look</option>
        </select>
        <br>
        <label for="qnt_fardas_enc">Quantidade de Fardas</label>
        <input type="number" name="qnt_fardas_enc" id="qnt_fardas_enc" required>
        <br>
        <br>
        <input type="reset" class="botao" value="Limpar">
        <input type="submit" class="botao" onclick="msg()" value="Cadastrar">

    </form>
    </div>
    <?php 
    include_once("../footer.php");
?>

</body>
</html>


