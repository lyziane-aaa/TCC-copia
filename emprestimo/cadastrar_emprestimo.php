<?php
if (!isset($_SESSION)) {
    include_once("../../TCC/funcs/header.php"); 
?>
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

   

    <body class="bg-dark">
        <?php include_once("../funcs/conexao.php");
        include_once(SITE_ROOT . "funcs/menu.php");


        if (isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
        ?>
            <form action="inserir_emprestimo.php" class="cadastro" method="post">
                <h2 class="cad-titulo"><img src="../imagens/emprestimos.png"> Cadastro Empréstimo</h2>
                <hr class="divisor">
                <br>
                <?php

                $resultado_pat = mysqli_query($conn, "SELECT * FROM patrimonioativo WHERE emprestado_pat = 0 && emprestavel = 1") or die("erro " . mysqli_error($conn));
                $row_pat = mysqli_fetch_array($resultado_pat);
                
                if (isset($row_pat)) {
                    echo ' <label for="obj_emp">Objetos disponíveis para empréstimo</label>
                    <select name="obj_emp" id="nome-objeto">';
                    while ($row_pat = mysqli_fetch_array($resultado_pat)) {
                        echo '<option value="'.$row_pat['id_pat'].'">'.$row_pat['nome_pat'].'</option>';
                    }
                    echo '</select>';
                }else {
                    echo '<label for="obj_emp">Objetos disponíveis para empréstimo</label>
                        <select  name="" readonly ="readonly" class="bt-desativado">
                        <option value="">Não há objetos disponíveis para empréstimos</option>
                        </select>';
                }
                ?>
                </select>
                <br>

                <label for="nome_emp">Nome completo:</label>
                <input type="text" name="nome_emp" id="nome-usuarios" required>
                <br>

                <label for="matricula_emp">Matrícula ou CPF:</label>
                <input type="text" name="matricula_emp" required>
                <br>

                <label for="gremista_emp">Gremista que emprestou:</label>
                <input type="text" name="gremista_emp" required readonly value="<?php echo $_SESSION['nome_usuarios'] ?>">
                <br>
                <label for="condicao" id="post">Condição:</label>
                <select name="condicao_emp" id="condicao">
                    <option value="Novo">Novo</option>
                    <option selected value="Normal">Normal</option>
                    <option value="Desgastado">Desgastado</option>
                </select>

                <br>

                <label for="data_emp">Data e horário do empréstimo:</label>
                <input type="text" name="data_emp" required readonly value="<?php $data = date('d/m/Y - H:i:s');
                                                                            echo $data; ?>">

                <br>

                <input type="reset" class="botao" value="Limpar">
                <?php if (isset($row_pat)) {
                    echo '<input type="submit" class="botao" onclick="msg()" value="Cadastrar">';
                } else {
                    echo '<input type="submit" class="botao bt-desativado" onclick="msg()" value="Cadastrar">';
                }
                ?>

            </form>
    <?php
            include_once(SITE_ROOT . "funcs/footer.php");
        }
    } else {
        header("location:../usuarios/login.php");
    }
    ?>

    </body>

    </html>