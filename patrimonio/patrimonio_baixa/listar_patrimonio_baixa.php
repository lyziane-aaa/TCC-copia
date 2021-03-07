<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Listar Patrimônio</title>
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css" />
	
	<script type="text/javascript" src="../../DataTables/datatables.js"></script>
	<script src="../../js/scripts.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
})
	</script>
	<script type="text/javascript">
    setTimeout(function(){ 
        var msg = document.getElementsByClassName("alertaDeErro");
            while(msg.length > 0){
                msg[0].parentNode.removeChild(msg[0]);
                }
            }, 5000);
	</script>
	
	<script>
		$(document).ready(function() {
			$('#tabela_patrimonio').DataTable( {
				"Processing":true,
				"serverSide": true,
				"language": {
   								 "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
						},
				"ajax": {
					"url": "tabelapatbaixa.php",
					"type": "POST"
						},
					} );
				} );
	</script>
</head>

<body class="tema-escuro">	
	<?php
		if(!isset($_SESSION['login'])) {session_start();}
		include_once("../../menu.php");
	?>
	<?php 
		$nivel_necessario = 2;
		include_once("../../conexao.php");
	
			?>
	<div class="container">
    <br/>
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading">Patrimônio</div>
        <div class="panel-body">
            <div class="table-responsive">
    <table id="tabela_patrimonio" class="table table-bordered table-striped">
        <thead>
            <tr>
				<th >ID</th>
				<th >Nome do Patrimônio</th>
				<th >Cd. de Barras</th>
				<th >Modo de Obtenção</th>
				<th >Custo de Obtenção</th>
				<th >Observações sobre o objeto</th>
				<th >Data de Aquisição</th>
				<th>Data de Baixa</th>
				<th>Motivo da Baixa</th>
				<th>Gremista que deu baixa</th>
			
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            </div> <!-- Panel-body !-->
        </div>
    </div>
</div>

<?php 
include_once("../../footer.php"); 
?>
</body>
</html>