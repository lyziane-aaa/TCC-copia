<!DOCTYPE html>
<html lang = "pt-br">
<head>	
<?php $hre = "excluir_bolsacopia.php?id_bc=";?>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Listar Bolsa Cópia</title>
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../_css/estilo.css">
	
  <!-- Data Tables-->
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css" />
  <script type="text/javascript" src="../DataTables/datatables.js"></script>
  <script type="text/javascript"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="../js/scripts.js"></script>
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
<?php $hre = "excluir_bolsacopia.php?id_bc=";?>
<body class="tema-escuro">	
	<?php
		if(!isset($_SESSION['login'])) {session_start();}
		include_once("../menu.php");
	?>
	<?php 
		$nivel_necessario = 2;
		include_once("../conexao.php");
			if ($_SESSION['nivel'] == 2) {
			$resultado_bc=mysqli_query($conn, "SELECT nome_bim_bc, 	bimestreinicio_bim_bc, bimestrefim_bim_bc FROM bimestrebc where bimestre_vigor_bim_bc = 1");
			$row_bc = mysqli_fetch_array($resultado_bc);
			$bim_inicio = date('d/m/Y', strtotime($row_bc['bimestreinicio_bim_bc']));
			$bim_fim = date('d/m/Y', strtotime($row_bc['bimestrefim_bim_bc']));
		
		?>
	<div class="container">
    <br/>
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading panel-heading_bc">Bolsa Cópia
		<hr class="divisor_bc"> 
			<h6> Bimestre atual: <input type="text" readonly value = "<?php echo $row_bc['nome_bim_bc']?>"> </h6>
			<h6> Início do bimestre: <input type="text" readonly value = "<?php echo $bim_inicio ?>"> </h6>
			<h6> Término do bimestre: <input type="text" readonly value = "<?php echo $bim_fim ?>"> </h6>

			<?php if($_SESSION['nivel'] == 2) {?>
					
			<!-- Botão para acionar modal de configuração de bimestre -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-bimestre"> Configurar Bimestre </button>
			<!-- Botão para acionar modal de escolha do bimestre vigente-->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-vigor"> Alterar Bimestre </button>
			<?php } ?>
		</div>
        <div class="panel-body">
		<!-- Painel de Controle de Bimestre, visível apenas para gremistas -->
		
		
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
						<h2 class="cad-titulo"><img class ="bimestre" src="https://img.icons8.com/android/24/000000/calendar.png"/> <p class ="bim">Configurar<br> Bimestre</p></h2>
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
					<button type="button" class="botao" data-dismiss="modal">Fechar</button>
					<input type="reset" class="botao" value="Limpar">
					<input type="submit" class="botao" value="Cadastrar">
				
					</form>
				
				
				</div>
				</div> <!-- fim do modal de cadastro do bimestre -->
				


			</div>
			</div>

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
				<div class="modal-body alt-bimestre">
					
					<form action="bimestre/inserir_bimestre_vigor.php" class = "cadastro" method="post">
						<h2 class="cad-titulo"> Alterar bimestre em vigor </h2>
						<label>Alterar o Bimestre</label>
						<hr class="divisor"> 
						<select name="bimestre_vigor_bim_bc">
						<?php
						$resultado_bc=mysqli_query($conn, "SELECT * FROM bimestrebc");
		
								while($row_bc = mysqli_fetch_array($resultado_bc))
								{
									echo '<option value="' . $row_bc["id_bim_bc"].'">' . $row_bc["nome_bim_bc"] . '</option>';    
								}
							?>   
						</select>
			</div> 
				<div class="modal-footer">
					<button type="button" class="botao" data-dismiss="modal">Fechar</button>
					<input type="reset" class="botao" value="Limpar">
					<input type="submit" class="botao" value="Atualizar"> <!-- botar aviso aqui-->
				</form>
			</div>
			</div> <!-- fim do modal de cadastro do bimestre -->
				


			</div>
			</div>



		</div>

		<?php 
		$result_bc = "SELECT * FROM bolsacopia WHERE 1=1";
  $resultado_bc = mysqli_query($conn, $result_bc);

  while ($row_bc = mysqli_fetch_array($resultado_bc)) {
  ?>
<!-- Modal Editar-->
<div class="modal fade" id="modal-editar-<?= $row_bc["id_bc"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="inserir_bolsacopia.php" class="cadastro">
			<label>Nome:</label>
			<input type="text" placeholder="<?= $row_bc['nome_bc'] ?>" required name="nome_bc">
			<label>Matrícula:</label>
			<input type="number" placeholder="<?= $row_bc['matricula_bc'] ?>" onKeyPress="return Onlynumbers(event);" required name="matricula_bc">
			<label>Laudas:</label>
			<input type="number" placeholder="<?= $row_bc['laudas_bc'] ?>" required max="20" min="1" name="laudas_bc">
			<input type="hidden" value ="<?= $row_bc['id_bc'] ?>" name="id">
			<input type="hidden" value="listar" name="pagina"> <!-- Indica ao Inserir de qual página veio os dados -->
			<input type="submit" value="Enviar">
			<input type="reset" value="Limpar">
		</form>
      </div>
    </div>
  </div>
</div>


		<?php
  		} //While 
		} // if para administradores
		?>
		<div class="table-responsive table_bc">
    <table id="tabelabc" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Matrícula</th>
                <th>Laudas:</th>
				<th>Última impressão em:</th>
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
  modal.find('.modal-body input').val(recipient)
})

$('#modal-vigor').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient = button.data('whatever') // Extrai informação dos atributos data-*
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-body input').val(recipient)
})
</script>
		
	</body>
</html>