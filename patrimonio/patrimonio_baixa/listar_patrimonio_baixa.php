<?php include_once("../../../TCC/funcs/header.php"); ?>

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

<body class="bg-dark">	
	<?php
		include_once("../../../TCC/funcs/menu.php");
	
		
		include_once("../../funcs/conexao.php");
	
			?>
	<div class="container">
    <br/>
    <div class="panel panel-default listar-escuro" align="center">
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
			</div>

<?php 
include_once("../../funcs/footer.php"); 
?>
</body>
</html>