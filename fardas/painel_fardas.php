<?php
include_once("../conexao.php");
$sql = "SELECT SUM(fardas_encomendas.qnt_fardas_enc) as encomendadas, COUNT(fardas_vendidas.id_fardas) as vendidas
 FROM  
     fardas_encomendas, fardas_vendidas";
$ress = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
$resultados =  mysqli_fetch_assoc($ress);
$encomendadas = intval($resultados['encomendadas']);

$vendidas = intval($resultados['vendidas']);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Farda</title>
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
        google.load('visualization', '1.0', {
            'packages': ['corechart']
        });

        // Configurando o método que será executado quando a API for carregada
        google.setOnLoadCallback(drawEncomendasChart);
        google.setOnLoadCallback(drawTamanhosChart);
        // Método onde será criado o DataTable,
        // configurado e inicializado o gráfico.



        function drawEncomendasChart() {

            // Criando o DataTable
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Situação');
            data.addColumn('number', 'Encomendadas');
            data.addColumn('number', 'Vendidas');
            data.addRows([
                ['Fardas', <?php echo $encomendadas ?>, <?php echo $vendidas ?>]
                //['Vendidas',<?php echo $encomendadas ?>,1]
            ]);

            // Opções de customização
            var options = {
                'legend': 'right',
                'title': 'Fardas encomendadas vs Fardas vendidas',
                'is3D': true,
                'width': 600,
                'height': 400,
                seriesType: "bars",
                series: {
                    4: {
                        type: "line"
                    }
                }
            };

            // Instanciando e desenhando o gráfico, passando algunas opções
            var chart = new google.visualization.ComboChart(document.getElementById('fardas_chart'));
            chart.draw(data, options);

        }

        function drawTamanhosChart() {
            <?php
            $tamanhos = array(
                "PP" => 0,
                "P"=> 0,
                "M"=> 0,
                "G"=> 0,
                "GG"=> 0,
                "PP-BL"=> 0,
                "P-BL"=> 0,
                "M-BL"=> 0,
                "G-BL"=> 0,
                "GG-BL"=> 0

            );
            $tam = array(0 => "PP",1=>  "P",2=>  "M",3=> "G",5=> "GG",5=> "PP-BL",6=> "P-BL", 7=>"M-BL",8 =>"G-BL",9=> "GG-BL");
            foreach ($tam as $tama) {

                $sql = "SELECT SUM(qnt_fardas_enc) AS tamanho FROM  fardas_encomendas WHERE tamanho_fardas_enc = '$tama'";
                $res = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
                $resultado =  mysqli_fetch_assoc($res);
                $tamanhos["$tama"]= intval($resultado['tamanho']);
            }

            ?>
            // Criando o DataTable
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Situação');
            <?php
            foreach ($t as $tamanhos) {

            echo "data.addColumn('number', '$t');";
            } 
            foreach ($tam as $tamanhos){
                foreach ($a as $array){
                       
                        echo "data.addRows([
               [$a,$tam]

            ]);";

            }}?>
            // Opções de customização
            var options = {
                'legend': 'right',
                'title': 'Fardas encomendadas vs Fardas vendidas',
                'is3D': true,
                'width': 400,
                'height': 400,
                seriesType: "bars",
                series: {
                    4: {
                        type: "line"
                    }
                }
            };

            // Instanciando e desenhando o gráfico, passando algunas opções
            var chart = new google.visualization.ComboChart(document.getElementById(''));
            chart.draw(data, options);

        }
    </script>
    </script>


</head>

<!-- Analisar possibilidade de uma segunda logo e de colocar novamente a o local onde podiamos 
sair da sessão clicando no icone de usuário. -->

<body class="tema-escuro">
    <?php
    include_once("../menu.php");




    ?>
    <br><br><br><br>

    <div>
        <h2 class="cad-titulo">Painel de Gerenciamento das Vendas de Fardas </h2>

        <div id="fardas_chart"></div>

        <div class="painel-dados">

            <h4>Fardas vendidas:</h4>
            <div id="fardas-vendidas-container">
                <?php
                $tam = array("PP", "P", "M", "G", "GG", "PP-BL", "P-BL", "M-BL", "G-BL", "GG-BL");
                foreach ($tam as $tama) {

                    $sql = "SELECT SUM(qnt_fardas_enc) AS tamanho FROM  fardas_encomendas WHERE tamanho_fardas_enc = '$tama'";
                    $res = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
                    $resultado =  mysqli_fetch_assoc($res);

                    echo "<div class='contador-tamanho'>
               <h5>Encomendas de Tamanho $tama</h5>" .
                        $resultado['tamanho'] . " </div>";

                    echo '<br><br>';
                }
                ?>



            </div>
        </div>
        <?php
        echo $tamanhos['PP'];


        include_once("../footer.php");
        ?>

</body>

</html>