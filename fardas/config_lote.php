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
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Links DataTables -->
    <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css" />
    
    <script type="text/javascript" src="../../DataTables/datatables.js"></script>
    <!-- Links CSS -->
    <link rel="stylesheet" href="../_css/estilo.css">
    </script>
    <script>
        function lucro() {



            <?php
            $aux = array(0 => "PP", 1 =>  "P", 2 =>  "M", 3 => "G", 4 => "GG", 5 => "PP-BL", 6 => "P-BL", 7 => "M-BL", 8 => "G-BL", 9 => "GG-BL");
            foreach ($aux as $a) {
                $a = strtolower(str_replace('-', '_', $a));
                $b = str_replace('-', '', $a);
                echo "var $b = parseInt(document.getElementById('qnt_$a" . "_lote').value,10);";
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
            var lucro_gremio = parseInt(document.getElementById('lucro_gremio_un').value, 10);

            var preco_farda_lote = preco_un_fornecedor + lucro_gremio;

            //Cálculo apenas do montante do grêmio (Se são 5 camisas cada uma a 5 reais, o montante será 25)
            var lucro_gremio_previsto = soma * lucro_gremio;

            //Cálculo da previsão do quanto será repassado ao fornecedor 
            var repasse_previsto_fornecedor = soma * preco_un_fornecedor;

            // Cálculo de todo o montante: Preço da farda (Fornecedor+Parte do grêmio) x nº de fardas
            var montante_total_previsto = soma * preco_farda_lote;



            document.getElementById('lucro_gremio_previsto_lote').value = lucro_gremio_previsto;
            document.getElementById('repasse_previsto_fornecedor').value = repasse_previsto_fornecedor;
            document.getElementById('montante_total_previsto').value = montante_total_previsto;



        }
    </script>

</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->

<body class="tema-escuro">
    <h2 class="cad-titulo">Configurações de Lote</h2>
    <div id="config-lote">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Gerenciar lote atual
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body" id="card-body-lote-atual">

                        <h3> Lote atual</h3>
                        <?php
                        $sql = "SELECT * from fardas_lote WHERE vigente_lote = 1";
                        $lote_atual = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
                        $l = mysqli_fetch_assoc($lote_atual);

                        ?>
                        <form action="update_fardas_lote.php" method="post" enctype="multipart/form-data">
                            <label for="fornecedor_lote">Nome do Fornecedor (nome da empresa):</label>
                            <input  type="text" name="fornecedor_lote" value="<?= $l['fornecedor_lote'] ?>" readonly required>
                            <input  type="number" name="id_fardas_lote" value="<?= $l['id_fardas_lote'] ?>" readonly required>

                            <br>

                            <label for="data_receb_lote">Data de recebimento do lote:</label>
                            <input  type="date" name="data_receb_lote" value="<?= $l['data_receb_lote'] ?>" readonly required>
                            <br>

                            <label for="fornecedor_telefone_lote">Telefone do fornecedor:</label>
                            <input  type="tel" name="fornecedor_telefone_lote" value="<?= $l['fornecedor_telefone_lote'] ?>" readonly required>
                            <br>

                            <label for="preco_un_fornecedor">Preço unitário (sem o lucro do Grêmio):</label>
                            <input type="number" min="0.00" max="10000.00" name="preco_un_fornecedor" value="<?= $l['preco_un_fornecedor'] ?>" readonly required>
                            <br>

                            <label for="lucro_gremio">Quantia unitária para o Grêmio:</label>
                            <input type="number" min="0.00" max="10000.00" name="lucro_gremio_un" value="<?= $l['lucro_gremio_un'] ?>" readonly required>


                            <label for="lucro_gremio_previsto_lote">Lucro para o grêmio previsto:</label>
                            <input type="number" name="lucro_gremio_previsto_lote" value="<?= $l['lucro_gremio_previsto_lote'] ?>" readonly required>
                            <br>

                            <label for="lucro_gremio_previsto_lote">Previsão de repasse para o fornecedor:</label>
                            <input type="number" name="repasse_previsto_fornecedor" value="<?= $l['repasse_previsto_fornecedor'] ?>" readonly required>
                            <br>

                            <label for="lucro_gremio_previsto_lote">Montante total previsto:</label>
                            <input type="number" name="montante_total_previsto" value="<?= $l['montante_total_previsto'] ?>" readonly required>
                            <br>

                            <label for="prestou_contas">Prestou contas?</label>
                            <select name="prestou_contas">
                                <option value="1">Sim</option>
                                <option selected value="0">Não</option>
                            </select>
                            <br>
                            <label for="encerramento_lote">Data em que o lote foi encerrado (todas as fardas foram vendidas)</label>
                            <input class="fardas-input" type="date" name="encerramento_lote" required>

                            <label for="recibo_lote">Arquivo do recibo (PNG, PDF, JPG OU JPEG)</label>
                            <input class="fardas-input" type="file" name="recibo_lote" required>

                            <input type="reset" class="botao" value="Limpar">
                            <input type="submit" class="botao" value="Encerrar lote atual">
                        </form>



                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Adicionar novo lote
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body" id="card-body-gerenciar-lote">

                        <h4>Atenção: apenas um lote pode ser ativo por vez. Ao cadastrar um novo lote, o antigo será desativado.</h4>
                        <form action="inserir_fardas_lote.php" method="post" enctype="multipart/form-data">
                            <hr class="divisor">


                            <label for="fornecedor_lote">Nome do Fornecedor (nome da empresa):</label>
                            <input class="fardas-input" type="text" name="fornecedor_lote" required>
                            <br>

                            <label for="data_receb_lote">Data de recebimento do lote:</label>
                            <input class="fardas-input" type="date" name="data_receb_lote" required>
                            <br>

                            <label for="fornecedor_telefone_lote">Telefone do fornecedor:</label>
                            <input class="fardas-input" type="tel" name="fornecedor_telefone_lote" required>
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
                                    <label class ="fardas-input" for="qnt_' . $a . '_lote">Quantidade de Fardas ' . $b . ':</label>
                                    <input  type="number" min="0"  id="qnt_' . $a . '_lote" name="qnt_' . $a . '_lote" value = "5" onblur="lucro()" required>
                                    <br>';
                                } else {


                                    echo '<label class ="fardas-input" for="qnt_' . $a . '_lote">Quantidade de Fardas ' . $b . ':</label>
                                <input  type="number" min="0" id="qnt_' . $a . '_lote" name="qnt_' . $a . '_lote" value= "5" onblur="lucro()" required>
                                <br>';
                                }
                            }
                            ?>
                            <br>

                            <label for="preco_un_fornecedor">Preço unitário (sem o lucro do Grêmio):</label>
                            <input type="number" min="0.00" max="10000.00" name="preco_un_fornecedor" id="preco_un_fornecedor" onblur="lucro()" required>
                            <br>

                            <label for="lucro_gremio">Quantia unitária para o Grêmio:</label>
                            <input type="number" min="0.00" max="10000.00" name="lucro_gremio_un" id="lucro_gremio_un" onblur="lucro()" required>


                            <label for="lucro_gremio_previsto_lote">Lucro para o grêmio previsto:</label>
                            <input type="number" name="lucro_gremio_previsto_lote" value='' id="lucro_gremio_previsto_lote" readonly required>
                            <br>

                            <label for="lucro_gremio_previsto_lote">Previsão de repasse para o fornecedor:</label>
                            <input type="number" name="repasse_previsto_fornecedor" value='' id="repasse_previsto_fornecedor" readonly required>
                            <br>

                            <label for="lucro_gremio_previsto_lote">Montante total previsto:</label>
                            <input type="number" name="montante_total_previsto" value='' id="montante_total_previsto" readonly required>
                            <br>

                            <input type="reset" class="botao" value="Limpar">
                            <input type="submit" class="botao" value="Cadastrar novo lote">
                        </form>
                    </div>
                </div>
            </div><!-- acordeão 3 caso precise 
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Grupo de itens colapsável #3
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>-->




      

                    </div>
                </div>
            </div>
        </div>
    </div>






    </div>
    <?php
    include_once("../footer.php"); ?>
</body>

</html>