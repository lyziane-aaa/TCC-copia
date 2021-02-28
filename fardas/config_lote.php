<?php
include_once("../conexao.php");
include_once("../menu.php");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Farda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Links DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- Links CSS -->
    <link rel="stylesheet" href="../_css/estilo.css">
    </script>
    <script>


        function lucro() {



            <?php
            $aux = array(0 => "PP", 1 =>  "P", 2 =>  "M", 3 => "G", 5 => "GG", 5 => "PP-BL", 6 => "P-BL", 7 => "M-BL", 8 => "G-BL", 9 => "GG-BL");
            foreach ($aux as $a) {
                $a = strtolower(str_replace('-','_',$a));
                $b = str_replace('-', '', $a);
                echo "var $b = parseInt(document.getElementById('qnt_$a"."_lote').value,10);";
            }
            // faz a string para somar todas as variáveis
            $soma = "";
            foreach ($aux as $a) {
                $a = strtolower(str_replace('-', '_', $a));
                if ($a != "gg_bl") {
                    $soma .= " $a + ";
                } else {
                    $soma .= "$a";
                }
            } 

            ?>
            var soma = <?= $soma ?>;  
            
            var preco_un_fornecedor = parseInt(document.getElementById('preco_un_fornecedor').value, 10);
            var lucro_gremio = parseInt(document.getElementById('lucro_gremio').value, 10);
       
            var preco_farda_lote = preco_un_fornecedor + lucro_gremio;
            var lucro_total = soma * preco_farda_lote;
            var lucro_gremio = soma * lucro_gremio;


            document.getElementById('lucro_gremio_lote').value = lucro_gremio;

            document.getElementById('lucro_gremio_previsto_lote').value = lucro_total;
        

        }

        function mult() {
          

          

        }
    </script>

</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->

<body class="tema-escuro">
    <h2 class="cad-titulo">Configurações de Lote</h2>
    <h3 class="cad-titulo">Adicionar lote</h3>
    <h4 class="cad-titulo">Atenção: apenas um lote pode ser ativo por vez. Ao cadastrar um novo lote, o antigo será desativado.</h4>
    <form action="inserir_fardas_lote.php" class="cadastro" method="post" enctype="multipart/form-data">
        <hr class="divisor">


        <label for="nome_fardas_lote">Nome do Fornecedor (nome da empresa):</label>
        <input type="text" name="nome_fardas_lote" required>
        <br>

        <label for="data_receb_lote">Data de recebimento do lote:</label>
        <input type="date" name="data_receb_lote" required>
        <br>

        <label for="fornecedor_telefone_lote">Telefone do fornecedor:</label>
        <input type="tel" name="fornecedor_telefone_lote" required>
        <br>
        <br>
        <?php

        foreach ($aux as $a) {
            $b = str_replace('-BL', ' - Baby Look', $a);
            //coloca em minúsculo
            $a = strtolower(str_replace('-', '_', $a));
            //Para colocar o hr e o título quando começar as Baby Look quando o array estiver em PP_BL
            if ($a == "pp_bl") {
                echo '
        <hr class="divisor">
        <h5>Fardas Baby Look</h5>
        <label for="qnt_' . $a . '_lote">Quantidade de Fardas ' . $b . ':</label>
        <input type="number" min="0"  id="qnt_' . $a . '_lote" name="qnt_' . $a . '_lote" value = "5" onblur="lucro()" required>
        <br>';
            } else {


                echo '<label for="qnt_' . $a . '_lote">Quantidade de Fardas ' . $b . ':</label>
       <input type="number" min="0" id="qnt_' . $a . '_lote" name="qnt_' . $a . '_lote" value= "5" onblur="lucro()" required>
       <br>';
            }
        }
        ?>



        <br>

        <label for="preco_un_fornecedor">Preço unitário (sem o lucro do Grêmio):</label>
        <input type="number" min="0.00" max="10000.00" name="preco_un_fornecedor" id="preco_un_fornecedor" onblur="lucro()" required>
        <br>

        <label for="lucro_gremio">Quantia unitária para o Grêmio:</label>
        <input type="number" min="0.00" max="10000.00" name="lucro_gremio" id="lucro_gremio" onblur="lucro()" required>
        

        <label for="lucro_gremio_previsto_lote">Lucro para o grêmio previsto:</label>
        <input type="number" name="lucro_gremio_lote"  value ='' id="lucro_gremio_lote" readonly required>
        <br>

        <label for="lucro_gremio_previsto_lote">Montante total previsto:</label>
        <input type="number" name="lucro_gremio_previsto_lote"  value ='' id="lucro_gremio_previsto_lote" readonly required>
        <br>

        <input type="reset" class="botao" value="Limpar">
        <input type="submit" class="botao" value="Cadastrar novo lote">
        </form>
        


    <?php
    include_once("../footer.php"); ?>
</body>

</html>