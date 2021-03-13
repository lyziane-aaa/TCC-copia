<?php include_once("../../TCC/funcs/header.php"); ?>

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
				"Processando": true,
				"serverSide": true,
				"language": {
								"url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
						},
				"ajax": {
					"url": "tabelapat.php",
					"type": "POST"
						},
					} );
				} );
	</script>
</head>

<body class="bg-dark">	
	<?php
		if(!isset($_SESSION['login'])) {session_start();}
		include_once(SITE_ROOT . "funcs/menu.php");
	?>
	<?php 
	
		include_once("../funcs/conexao.php");
	
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
				<th >Id</th>
				<th >Nome do Patrimônio</th>
				<th >Cd. de Barras</th>
				<th >Modo de Obtenção</th>
				<th >Custo de Obtenção</th>
				<th >Observações sobre o objeto</th>
				<th >Data de Aquisição</th>
				<th>Cadastrado Por</th>
				<th>Emprestável</th>
				<?php if($_SESSION['nivel'] == 2) {?>
					<th>Editar</th>
					<th>Excluir</th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            </div> <!-- Panel-body !-->
        </div>
    </div>
</div>

<!-- Modal Editar -->
<?php 
			$result_pat= "SELECT * FROM patrimonioativo WHERE 1=1";
			$resultado_pat = mysqli_query($conn, $result_pat);
			while ($row_pat = mysqli_fetch_array($resultado_pat)) {
		?>
<!-- Modal Editar-->
<div class="modal fade" id="modal-editar-<?=$row_pat["id_pat"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<h5 class="modal-title" id="TituloModalCentralizado">Atualizar registro do Patrimônio</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
      </div>
      <div class="modal-body" style="overflow-y:auto;">
        <form method="post" action="inserir_patrimonio.php" class="cadastro">

		<label for="nome-objeto">Nome do Objeto:</label>
        <input type="text" name="nomePat" id="nome-objeto" value="<?=$row_pat['nome_pat']?>" required>
        <br>

        <label for="codigo-barras">Código de Barras</label>
        <input type="text" name="codBarrasPat" id="codigo-barras" onKeyPress="return Onlynumbers(event);" value="<?=$row_pat['cod_barras_pat']?>" required>
        <br>

        <div class="linha">
            <label for="obtencao" class="post" >Forma de Obtenção:</label>
            <select name="obtencaoPat" id="obtencao">
                <option value="Compra">Compra</option>
                <option selected value="Doação">Doação</option>
            </select>
            <br>

            <label for="status" class="post" >Condição:</label>
            <select name="statusPat" id="status" >
                <option value="Novo">Novo</option>
                <option selected value="Normal">Normal</option>
                <option value="Desgastado">Desgastado</option>
            </select>
            <br>
        </div>
        <br>

        <label for="custo">Custo:</label>
        <input type="number" name="custoPat" id="custo" onKeyPress="return Onlynumbers(event);" value="<?=$row_pat['custo_obt']?>" >
        <br>
        <br>

        <label for="nome-gresmista">Cadastrado por</label>
        <input type="text" name="gremista_cadastro_pat" id="nome-gremista" value="<?= $row_pat['gremista_cadastro_pat'] ?> ." required readonly>
        <br>
        <br>

        <label for="emprestavel" class="post" >Pode ser emprestado:</label>
            <select name="emprestavel" id="emprestavel">
                <option value="1">Sim</option>
                <option selected value="0">Não</option>
            </select>

        <label for="descricao">Descrição:</label> 
        <textarea name="obsPat" id="descricao" 
        cols="10" rows="4" maxlength="800" placeholder="Descreva o objeto aqui"></textarea>
        <br>


			<input type="hidden" value ="<?= $row_pat['id_pat'] ?>" name="id">
			<input type="hidden" value="listar" name="pagina"> <!-- Indica ao Inserir de qual página veio os dados -->
			<input type="submit" value="Enviar">
			<input type="reset" value="Limpar">
			<br> 
			<br>
		</form>
      </div>
    </div>
  </div>
</div>




	
<?php 
	}
	include_once(SITE_ROOT . "funcs/footer.php"); 
?>
</body>
</html>