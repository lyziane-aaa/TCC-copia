<?php include_once("../../TCC/funcs/header.php"); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');
            if (!$('#confirm-delete').length) {
                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
            }
            $('#dataComfirmOK').attr('href', href);
            $('#confirm-delete').modal({
                show: true
            });
            return false;

        });
    })
</script>
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
    if (!isset($_SESSION['login'])) {
        session_start();
    }
    include_once(SITE_ROOT . "funcs/menu.php");
    ?>
    <div class="container">
        <br />
        <div class="panel panel-default listar-escuro">
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
                                <?php if ($_SESSION['nivel'] == 2) { ?>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div> <!-- Panel-body !-->
            </div>
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