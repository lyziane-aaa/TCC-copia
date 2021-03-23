<?php include_once("../../TCC/funcs/header.php"); 
$hre="excluir_patrimonio.php?id_pat="?>

<script type="text/javascript">
    setTimeout(function() {
        var msg = document.getElementsByClassName("alertaDeErro");
        while (msg.length > 0) {
            msg[0].parentNode.removeChild(msg[0]);
        }
    }, 5000);
</script>

<script>
    $(document).ready(function() {
        $('#tabela_patrimonio').DataTable({
            "Processando": true,
            "serverSide": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                "url": "tabelapat.php",
                "type": "POST"
            },
        });
    });
</script>
</head>

<body class="bg-dark">
    <?php
    include_once(SITE_ROOT . "funcs/menu.php");
    ?>
        <br />
        <div class="panel panel-default listar-escuro" align="center">
            <div class="panel-heading">Patrimônio</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabela_patrimonio" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome do Patrimônio</th>
                                <th>Cd. de Barras</th>
                                <th>Modo de Obtenção</th>
                                <th>Custo de Obtenção</th>
                                <th>Observações sobre o objeto</th>
                                <th>Data de Aquisição</th>
                                <th>Cadastrado Por</th>
                                <th>Emprestável</th>
                                <?php 
									if(isset($_SESSION['login'])){
										
										if ($_SESSION['nivel'] == 2) { ?>
											<th>Editar</th>
                                            <th>Excluir</th>
								<?php }}?>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div> <!-- Panel-body !-->
            </div>
        </div>

    </div><!-- Final do content -->
    <!-- Modal Editar -->
    <?php
    echo modale("editar-pat");
    ?>
    <script>
        //Verificar se há valor na variável "id_bc".
        $(document).ready(function() {
            $(document).on('click', '.editar-pat', function() {
                var id_pat = $(this).attr("id");

                if (id_pat !== '') {
                    var dados = {
                        id_pat: id_pat,
                        tipo: "editar-pat"
                    };

                    $.post('../funcs/visu_modal.php', dados, function(retorna) {

                        $("#visul_editar-pat").html(retorna);
                        $('#editar-pat').modal('show');
                    });
                }
            });
        });
    </script>
    <?php

    include_once(SITE_ROOT . "funcs/footer.php");
    ?>

</body>

</html>