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

    <!-- SCRIPTS -->
    <script src="/TCC/js/scripts.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script type="text/javascript">
        google.load('visualization', '1', {
            packages: ['imagechart']
        });
    </script>
    <script type="text/javascript">
        // Carregando a API Visualization e os pacotes de gráficos
        google.charts.load('current', {
            'packages': ['bar']
        });

        // Configurando o método que será executado quando a API for carregada

        google.setOnLoadCallback(drawTamanhosChart);
        // Método onde será criado o DataTable,
        // configurado e inicializado o gráfico.



        function drawTamanhosChart() {
            <?php
            $tamanhos = array(
                "PP" => array("Tam" => "PP", 0 => 0, 1 => 0, 2=> 0),
                "P" => array("Tam" => "P", 0 => 0, 1 => 0 , 2=> 0),
                "M" => array("Tam" => "M", 0 => 0, 1 => 0, 2=> 0),
                "G" => array("Tam" => "G", 0 => 0, 1 => 0, 2=> 0),
                "GG" => array("Tam" => "GG", 0 => 0, 1 => 0, 2=> 0),
                "PP-BL" => array("Tam" => "PP-BL", 0 => 0, 1 => 0, 2=> 0),
                "P-BL" => array("Tam" => "P-BL", 0 => 0, 1 => 0, 2=> 0),
                "M-BL" => array("Tam" => "M-BL", 0 => 0, 1 => 0, 2=> 0),
                "G-BL" => array("Tam" => "G-BL", 0 => 0, 1 => 0, 2=> 0),
                "GG-BL" => array("Tam" => "GG-BL", 0 => 0, 1 => 0, 2=> 0)

            );
            $aux = array(0 => "PP", 1 =>  "P", 2 =>  "M", 3 => "G", 4 => "GG", 5 => "PP-BL", 6 => "P-BL", 7 => "M-BL", 8 => "G-BL", 9 => "GG-BL");
            foreach ($aux as $a) {
                //Converte o nome do tamanho para como está nas colunas do BD
                $b= strtolower(str_replace('-', '_', $a));

                $sql = "SELECT qnt_$b"."_lote as disponiveis FROM fardas_lote WHERE vigente_lote = 1";
                $res = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
                $resultado =  mysqli_fetch_assoc($res);
                
                $tamanhos["$a"][0] = intval($resultado['disponiveis']);

                $sql = "SELECT SUM(fardas_encomendas.qnt_fardas_enc) as tamanhos FROM 
                fardas_encomendas WHERE fardas_encomendas.tamanho_fardas_enc = '$a'";
                $res = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
                $resultado =  mysqli_fetch_assoc($res);

                $tamanhos["$a"][1] = intval($resultado['tamanhos']);


                $sqll = "SELECT qnt_$b"."_vend_lote as vendas FROM fardas_lote";
                $ress = mysqli_query($conn, $sqll) or die("erro " . mysqli_error($conn));
              
                $resultadoo =  mysqli_fetch_assoc($ress);
                
                $tamanhos["$a"][2] = intval($resultadoo['vendas']);
              
            }

            ?>


            // Criando o DataTable
            var data = google.visualization.arrayToDataTable([
                ['Tamanho', 'Disponíveis','Encomendadas', 'Vendidas'],
<?php 
            foreach ($aux as $a) {
                if ($a != 'GG-BL') {
                echo "['$a', {$tamanhos["$a"][0]}, {$tamanhos["$a"][1]}, {$tamanhos["$a"][2]}],";} else {
                    echo "['$a', {$tamanhos["$a"][0]}, {$tamanhos["$a"][1]}, {$tamanhos["$a"][2]}]";}
                }             
    ?>
            ]);
            // Opções de customização
            var options = {
                'legend': 'right',
                'title': 'Gráfico de nº de Fardas do Lote x Fardas Encomendadas x Fardas Vendidas',
                'is3D': true,
                'width': 600,
                'height': 600,
                vAxis:{title: 'Número', titleTextStyle: {color: 'black'}},
                seriesType: "bars",
                series: {
                    4: {
                        type: "line"
                    }
                }
            };

            // Instanciando e desenhando o gráfico, passando algunas opções
            var chart = new google.charts.Bar(document.getElementById('tamanhos_draw'));

            chart.draw(data, google.charts.Bar.convertOptions(options));

        }
    </script>
    <script>
        $(document).ready(function() {
            $('#tabela_enc').DataTable({
                "Processando": true,
                "serverSide": true,
                select: 'multi',
                select: {
                    items: 'row',

                },

                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
                },
                "ajax": {
                    "url": "tabela_enc.php",
                    "type": "POST"
                },
            });
        });
    </script>


</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->

<body class="tema-escuro">
    <?php

    $result_fardas_enc = "SELECT * FROM fardas_encomendas WHERE 1=1";
    $resultado_fardas_enc = mysqli_query($conn, $result_fardas_enc) or die("erro " . mysqli_error($conn));

    while ($row_fardas_enc = mysqli_fetch_array($resultado_fardas_enc)) {
    ?>
        <!-- Modal da tabela -->
        <div class="modal fade" id="modal-<?= $row_fardas_enc['id_fardas_enc'] ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalLongoExemplo" style="color: white;">Confirmar Encomenda de <?= $row_fardas_enc['nome_fardas_enc'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height:fit-content;">
                        <form action="inserir_fardas_vend.php" class="cadastro" method="post" enctype="multipart/form-data">
                            <h5> (As encomendas vencem em três dias) </h5>
                            <hr class="divisor">

                            <input type="number" hidden name="id_fardas_enc" value=<?= $row_fardas_enc['id_fardas_enc'] ?> required>
   
                            <label for="nome_fardas_vend">Nome Completo do comprador:</label>
                            <input type="text" name="nome_fardas_vend" value=<?= $row_fardas_enc['nome_fardas_enc'] ?> required>
                            <br>

                            <label for="matricula_fardas_enc">Matrícula do comprador:</label>
                            <input type="text" name="matricula_fardas_vend" value=<?= $row_fardas_enc['matricula_fardas_enc'] ?> required>
                            <br>


                            <label for="tamanho_fardas_enc">Tamanho da Farda:</label>
                            <select name="tamanho_fardas_vend" required>
                                <option selected value="">Selecione o tamanho da Farda</option>
                               <?php
                               foreach ($aux as $a ){ 
                                $b= str_replace('-BL', ' - Baby Look',$a);
                                 echo "<option value='$a'>$b</option>";


                               } ?>   
                                
                                
                            </select>
                            <br>
                            <label for="qnt_fardas_enc">Quantidade de Fardas:</label>
                            <input type="number" value=<?= $row_fardas_enc['qnt_fardas_enc'] ?> name="qnt_fardas_vend" min="0" max="5" required>
                            <br>
                            <label for="qnt_fardas_enc">Recibo:</label>
                            <p> Lembrete: é apenas UM recibo por compra, nele deverá constar o somatório dos preços de todas as fardas de uma venda</p>
                            <input type="file" name="recibo_fardas_vend" min="0" max="5" required>
                            <br>
                            <label for="pagamento">Confirme o pagamento:</label>
                            <select name="pagamento" required>
                                <option value="pago">Pago</option>
                                <option selected value="">Não pago</option>

                                

                        
                    </div>
                    <div class="modal-footer">
                    <input type="reset" class="botao" value="Limpar">
                                <input type="submit" class="botao" onclick="msg()" value="Confirmar encomenda">
                                </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div>
        <h2 class="cad-titulo">Painel de Gerenciamento das Vendas de Fardas </h2>
 <!-- Modal avulso -->
 <div class="modal fade" id="modal-vender" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalLongoExemplo" style="color: white;">Realizar nova venda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height:fit-content;">
                        <form action="inserir_fardas_vend.php" class="cadastro" method="post" enctype="multipart/form-data">
                            <hr class="divisor">

                            <label for="nome_fardas_vend">Nome Completo do comprador:</label>
                            <input type="text" name="nome_fardas_vend"  required>
                            <br>

                            <label for="matricula_fardas_enc">Matrícula do comprador:</label>
                            <input type="text" name="matricula_fardas_vend"  required>
                            <br>


                            <label for="tamanho_fardas_enc">Tamanho da Farda:</label>
                            <select name="tamanho_fardas_vend" required>
                            <?php
                               foreach ($aux as $a ){ 
                                $b= str_replace('-BL', ' - Baby Look',$a);
                                 echo "<option value='$a'>$b</option>";
                               } ?>  
                            </select>
                            <br>
                            <label for="qnt_fardas_enc">Quantidade de Fardas:</label>
                            <input type="number" name="qnt_fardas_vend" min="0" max="5" required>
                            <br>
                            <label for="qnt_fardas_enc">Recibo:</label>
                            <p> Lembrete: é apenas UM recibo por compra, nele deverá constar o somatório dos preços de todas as fardas de uma venda</p>
                            <input type="file" name="recibo_fardas_vend" min="0" max="5" required>
                            <br>
                            <label for="pagamento">Confirme o pagamento:</label>
                            <select name="pagamento" required>
                                <option value="pago">Pago</option>
                                <option selected value="">Não pago</option>
                    </div>
                    <div class="modal-footer">
                    <input type="reset" class="botao" value="Limpar">
                                <input type="submit" class="botao" onclick="msg()" value="Confirmar venda">
                                </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="painel-dados">
            <div id="tamanhos_draw"></div>

            <h4>Fardas Encomendadas:</h4>
            <div id="fardas-vendidas-container">
                <!-- Botão para acionar modal de de Encerrar a encomenda -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-vender">Vender Farda</button>

                <table id="tabela_enc" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Telefone</th>
                            <th>Tamanho</th>
                            <th>Quantidade</th>
                            <th>Data da Encomenda</th>
                            <th>Confirmar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
        <?php




        include_once("../footer.php"); ?>
</body>

</html>