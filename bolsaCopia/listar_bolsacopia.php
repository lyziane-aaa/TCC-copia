<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Listar Bolsa Cópia</title>
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../_css/estilo.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
			$('#tabelabc').DataTable( {
				"Processando": true,
				"serverSide": true,
				"language": {
   								 "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
						},
				"ajax": {
					"url": "tabelabc.php",
					"type": "POST"
						},
					} );
				} );
	</script>
</head>

<body class="tema-escuro">	
	<?php
		if(!isset($_SESSION['login'])) {session_start();}
		include_once("../menu.php");
	?>
	<?php 
		$nivel_necessario = 2;
		include_once("../conexao.php");
		
			$_SESSION['listar'] = 1;
			/* Aparentemente a presença do Bootstrap altera o tamanho da imagem no menu,
			então essa variavel se encontrara em todos os listar e conterá o novo conteudo a ser colocado
			como formartação da imagem, porém para isso dar certo terei de fazer um teste lógico dentro do
			 menu com o php */
			?>
	<div class="container">
    <br/>
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading">Bolsa cópia</div>
        <div class="panel-body">
		<!-- Painel de Controle de Bimestre, visível apenas para gremistas -->
		<?php
		//if (isset($_SESSION)) {
			if ($_SESSION['nivel'] == 2) {

			$resultado_bc=mysqli_query($conn, "SELECT nome_bim_bc, 	bimestreinicio_bim_bc, bimestrefim_bim_bc FROM bimestrebc where bimestre_vigor_bim_bc = 1");
			$row_bc = mysqli_fetch_array($resultado_bc);
			$bim_inicio = date('d/m/Y', strtotime($row_bc['bimestreinicio_bim_bc']));
			$bim_fim = date('d/m/Y', strtotime($row_bc['bimestrefim_bim_bc']));
		
		?>
		
		<div  id = "painel-bimestre" class="panel-heading">
			<h5> Configuração de Bimestre </h5>
			<h6> Bimestre atual: <input type="text" readonly value = "<?php echo $row_bc['nome_bim_bc']?>"> </h6>
			<h6> Início do bimestre: <input type="text" readonly value = "<?php echo $bim_inicio ?>"> </h6>
			<h6> Término do bimestre: <input type="text" readonly value = "<?php echo $bim_fim ?>"> </h6>
 			<!-- Botão para acionar modal de configuração de bimestre -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-bimestre"> Configurar Bimestre </button>

			<!-- Modal -->
			<div class="modal fade" id="modal-bimestre" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content bg-dark">
				<div class="modal-header">
					<h5 class="modal-title" id="TituloModalCentralizado">Configurações de Bimestre</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<form action="bimestre/inserir_bimestrenovo.php" class = "cadastro" method="post">
						<h2 class="cad-titulo"><img src="../imagens/bc.png"> Cadastro Bolsa Cópia</h2>
						<hr class="divisor"> 

						<label for="nome-bc">Número do novo bimestre</label>
						<input type="text" name="nome_bim_bc" id="nome-bc" required>
						<br>

						<label for="matricula-bc">Data de início do bimestre</label>
						<input type="date" name="bimestreinicio_bim_bc" id="matricula-bc" onKeyPress="return Onlynumbers(event);" required>
						<br>

						<label for="laudas-bc">Data de término do bimestre</label>
						<input type="date" name="bimestrefim_bim_bc" id="laudas-bc" onKeyPress="return Onlynumbers(event);" required>
						<br>
						<!-- inputs escondidas -->
						<?php 
							/* Variáveis para registro */
							
							$gremista = $_SESSION['nome_usuarios'];
						?>
						<input type="hidden" name="bimestre_vigor_bim_bc" value=0>
						 
        				<input type="hidden" name="gremista_registrou_bim_bc" value="<?php echo $gremista; ?>">
        

						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<input type="reset" class="botao" value="Limpar">
					<input type="submit" class="botao" onclick="msg()" value="Cadastrar">
				
					</form>
				
				
				</div>
				</div> <!-- fim do modal de cadastro do bimestre -->
				


			</div>
			</div>
			<h5> Alterar bimestre em vigor </h5>
			<!-- Botão para acionar modal de escolha do bimestre vigente-->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-vigor"> Configurar Bimestre </button>

			<!-- Modal -->
			<div class="modal fade" id="modal-vigor" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content bg-dark">
				<div class="modal-header">
					<h5 class="modal-title" id="TituloModalCentralizado">Escolha o bimestre a entrar em vigor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<form action="bimestre/inserir_bimestre_vigor.php" class = "cadastro" method="post">
						<h2 class="cad-titulo"> Alterar bimestre em vigor </h2>
						
	<?php

		
		
	?>
						<label>Alterar bimestre</label>
						<select name="bimestre_vigor_bim_bc">
						<?php

						$resultado_bc=mysqli_query($conn, "SELECT * FROM bimestrebc");
		
								while($row_bc = mysqli_fetch_array($resultado_bc))
								{
									echo '<option value="' . $row_bc["id_bim_bc"].'">' . $row_bc["nome_bim_bc"] . '</option>';    
								}
							?>   
						</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<input type="reset" class="botao" value="Limpar">
					<input type="submit" class="botao" onclick="msg()" value="Atualizar bimestre"> <!-- botar aviso aqui-->
				
				
				
				
				</div>
				</div> <!-- fim do modal de cadastro do bimestre -->
				


			</div>
			</div>



		</div>


		<?php
		} // if para administradores
		?>
		<div class="table-responsive">
    <table id="tabelabc" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Matrícula</th>
                <th>Laudas:</th>
				<th>Última impressão em:</th>
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

include_once("../footer.php"); 
?>
<script> 
$('#modal-bimestre').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient = button.data('whatever') // Extrai informação dos atributos data-*
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-title').text('Nova mensagem para ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

$('#modal-vigor').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient = button.data('whatever') // Extrai informação dos atributos data-*
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-title').text('Nova mensagem para ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
		
	</body>
</html>