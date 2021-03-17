<?php
require_once("../funcs/header.php");
include_once("../funcs/conexao.php");

?>
<title>Painel Farda</title>

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
            "PP" => array("Tam" => "PP", 0 => 0, 1 => 0, 2 => 0),
            "P" => array("Tam" => "P", 0 => 0, 1 => 0, 2 => 0),
            "M" => array("Tam" => "M", 0 => 0, 1 => 0, 2 => 0),
            "G" => array("Tam" => "G", 0 => 0, 1 => 0, 2 => 0),
            "GG" => array("Tam" => "GG", 0 => 0, 1 => 0, 2 => 0),
            "PP-BL" => array("Tam" => "PP-BL", 0 => 0, 1 => 0, 2 => 0),
            "P-BL" => array("Tam" => "P-BL", 0 => 0, 1 => 0, 2 => 0),
            "M-BL" => array("Tam" => "M-BL", 0 => 0, 1 => 0, 2 => 0),
            "G-BL" => array("Tam" => "G-BL", 0 => 0, 1 => 0, 2 => 0),
            "GG-BL" => array("Tam" => "GG-BL", 0 => 0, 1 => 0, 2 => 0)

        );
        $aux = array(0 => "PP", 1 =>  "P", 2 =>  "M", 3 => "G", 4 => "GG", 5 => "PP-BL", 6 => "P-BL", 7 => "M-BL", 8 => "G-BL", 9 => "GG-BL");
        foreach ($aux as $a) {
            //Converte o nome do tamanho para como está nas colunas do BD
            $b = strtolower(str_replace('-', '_', $a));

            $sql = "SELECT qnt_$b" . "_lote as disponiveis FROM fardas_lote WHERE vigente_lote = 1";
            $res = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
            $resultado =  mysqli_fetch_assoc($res);

            $tamanhos["$a"][0] = intval($resultado['disponiveis']);

            $sql = "SELECT SUM(fardas_encomendas.qnt_fardas_enc) as tamanhos FROM 
                fardas_encomendas WHERE fardas_encomendas.tamanho_fardas_enc = '$a'";
            $res = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
            $resultado =  mysqli_fetch_assoc($res);

            $tamanhos["$a"][1] = intval($resultado['tamanhos']);


            $sqll = "SELECT qnt_$b" . "_vend_lote as vendas FROM fardas_lote";
            $ress = mysqli_query($conn, $sqll) or die("erro " . mysqli_error($conn));

            $resultadoo =  mysqli_fetch_assoc($ress);

            $tamanhos["$a"][2] = intval($resultadoo['vendas']);
        }

        ?>


        // Criando o DataTable
        var data = google.visualization.arrayToDataTable([
            ['Tamanho', 'Disponíveis', 'Encomendadas', 'Vendidas'],
            <?php
            foreach ($aux as $a) {
                if ($a != 'GG-BL') {
                    echo "['$a', {$tamanhos["$a"][0]}, {$tamanhos["$a"][1]}, {$tamanhos["$a"][2]}],";
                } else {
                    echo "['$a', {$tamanhos["$a"][0]}, {$tamanhos["$a"][1]}, {$tamanhos["$a"][2]}]";
                }
            }
            ?>
        ]);
        // Opções de customização
        var options = {
            'legend': 'right',
            'title': 'Gráfico de nº de Fardas do Lote x Fardas Encomendadas x Fardas Vendidas',
            'is3D': true,
            'width': 900,
            'height': 600,
            vAxis: {
                title: 'Número',
                titleTextStyle: {
                    color: 'black'
                }
            },
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
            "Processing": true,
            "serverSide": true,
            paging: false,
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

<body class="bg-dark">

    <?php
    include_once(SITE_ROOT . "funcs/menu.php");
    $result_fardas_enc = "SELECT * FROM fardas_encomendas WHERE 1=1";
    $resultado_fardas_enc = mysqli_query($conn, $result_fardas_enc) or die("erro " . mysqli_error($conn));

    ?>
        <div class="painel-dados">
            <div id="tamanhos_draw"></div>

            <h4>Fardas Encomendadas:</h4>
            <div id="fardas-vendidas-container">
                <!-- Botão para acionar modal de de Encerrar a encomenda -->
                <button type="button" class="btn btn-primary venda-fardas" data-toggle="modal" data-target="#modal-vender">Vender Farda</button>

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
</div> <!-- final content -->
<?php
echo modale("venda-fardas-enc");
echo modale("venda-fardas");


?>

<script>
         //Verificar se há valor na variável "id_bc".
        $(document).ready(function() {
            $(document).on('click', '.venda-fardas-enc', function() {
                var id_fardas_enc = $(this).attr("id");
            
                if (id_fardas_enc !== '') {
                    var dados = {
                       id_fardas_enc: id_fardas_enc,
                        tipo: "venda-fardas-enc"
                    };

                    $.post('../funcs/visu_modal.php', dados, function(retorna) {
                        
                        $("#visul_venda-fardas-enc").html(retorna);
                        $('#venda-fardas-enc').modal('show');
                    });
                }
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.venda-fardas', function() {
                           
                    var dados = {
                     tipo: "venda-fardas"
                    };
                    
                    $.post('../funcs/visu_modal.php', dados, function(retorna) {
                      
                        $("#visul_venda-fardas").html(retorna);
                        $('#venda-fardas').modal('show');
                    });
							});
						});

    </script>

    <div>
        
        </div>
        
        <?php
        include_once(SITE_ROOT . "funcs/footer.php"); ?>
