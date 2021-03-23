<?php include_once("../../TCC/funcs/header.php"); ?>
<script>
	$(document).ready(function() {
		$('#tabelabc').DataTable({
			"Processando": true,
			"serverSide": true,
			"language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
			},
			"ajax": {
				"url": "tabelabc.php",
				"type": "POST"
			},
		});
	});


	$(document).ready(function () {
                $('.collapse-bc').on('click', function () {
                    if ($(this).find('.caret-icon').hasClass('fa-caret-down')) {
                        $(this).find('.caret-icon').removeClass('fa-caret-down').addClass('fa-caret-up');
                    } else {
                        $(this).find('.caret-icon').removeClass('fa-caret-up').addClass('fa-caret-down');
                    }
                });
            });
</script>
</head>
<?php $hre = "excluir_bolsacopia.php?id_bc="; ?>

<body class="bg-dark">
	<?php

	include_once(SITE_ROOT . "funcs/menu.php");
	?>
	<?php


	if(isset($_SESSION['login'])){
		if ($_SESSION['nivel'] == 2) {
			$resultado_bc = mysqli_query($conn, "SELECT nome_bim_bc, bimestreinicio_bim_bc, bimestrefim_bim_bc FROM bimestrebc where bimestre_vigor_bim_bc = 1");
			$row_bc = mysqli_fetch_array($resultado_bc);
			$bim_inicio = date('d/m/Y', strtotime($row_bc['bimestreinicio_bim_bc']));
			$bim_fim = date('d/m/Y', strtotime($row_bc['bimestrefim_bim_bc']));
	
		?>
			<div class="container">
				<br />
				<div class="panel panel-default listar-escuro">
					<div class="panel-heading panel-heading_bc">
						<a class="collapse-bc" data-toggle="collapse" href="#collapse-bc" role="button" aria-expanded="false" aria-controls="collapseExample">
						Bolsa Cópia <i class="caret-icon fas fa-caret-down"></i>
						</a>
						<hr class="divisor_bc">
						<div class="collapse" id="collapse-bc">
							<h6> Bimestre atual: <input type="text" readonly value="<?php echo $row_bc['nome_bim_bc'] ?>"> </h6>
							<h6> Início do bimestre: <input type="text" readonly value="<?php echo $bim_inicio ?>"> </h6>
							<h6> Término do bimestre: <input type="text" readonly value="<?php echo $bim_fim ?>"> </h6>
						
							<?php if ($_SESSION['nivel'] == 2) { ?>
	
							<!-- Botão para acionar modal de configuração de bimestre -->
							<button type="button" class="btn btn-primary configurar-bimestre" data-toggle="modal" data-target="#modal-bimestre"> Configurar Bimestre </button>
							<!-- Botão para acionar modal de escolha do bimestre vigente-->
							<button type="button" class="btn btn-primary bimestre-vigor" data-toggle="modal" data-target="#modal-vigor"> Alterar Bimestre </button>
						</div>
						<?php } ?>
					</div>
					<div class="panel-body">
						<?php echo modale("bc");
						?>
						<!-- Modal -->
						<div class="modal fade" id="configurar-bimestre" data-backdrop="static" class="modal hidden fade in" style=" display:none !important; z-index: 90000 !important;" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="TituloModalCentralizado">Configurações de Bimestre</h5>
										<button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<span id="visul_configurar-bimestre"></span>
									</div>
									<div class="modal-footer">	
									</div>
								</div>
							</div>
						</div>
	
	
						<!-- Painel de Controle de Bimestre, visível apenas para gremistas -->
						<script>
							$(document).ready(function() {
								$(document).on('click', '.editar-bc', function() {
									var id_bc = $(this).attr("id");
									//Verificar se há valor na variável "id_bc".
									if (id_bc !== '') {
										var dados = {
											id_bc: id_bc,
											tipo: "editar-bc"
										};
	
										$.post('../funcs/visu_modal.php', dados, function(retorna) {
											//Carregar o conteúdo para o usuário
											$("#visul_bc").html(retorna);
											$('#bc').modal('show');
										});
									}
								});
							});
	
							$(document).ready(function() {
								$(document).on('click', '.configurar-bimestre', function() {
	
									//Verificar se há valor na variável "id_bc".
	
									var dados = {
										tipo: "configurar-bimestre"
									};
	
									$.post('../funcs/visu_modal.php', dados, function(retorna) {
										//Carregar o conteúdo para o usuário
										$("#visul_configurar-bimestre").html(retorna);
										$('#configurar-bimestre').modal('show');
									});
								});
							});
	
							//Alterar bimestre
							$(document).ready(function() {
								$(document).on('click', '.bimestre-vigor', function() {
	
									//Verificar se há valor na variável "id_bc".
	
									var dados = {
										tipo: "bimestre-vigor"
									};
	
									$.post('../funcs/visu_modal.php', dados, function(retorna) {
										//Carregar o conteúdo para o usuário
										$("#visul_bimestre-vigor").html(retorna);
										$('#bimestre-vigor').modal('show');
									});
								});
							});
						</script>
	
						<!-- Modal -->
						<div class="modal fade" id="modal-vigor" data-backdrop="static" class="modal hidden fade in" style=" display:none !important; z-index: 90000 !important;" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content bg-dark">
									<div class="modal-header">
										<h5 class="modal-title" id="TituloModalCentralizado">Escolha o bimestre a entrar em vigor</h5>
										<button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body alt-bimestre">
										<form action="bimestre/inserir_bimestre_vigor.php" class="cadastro" method="post">
											<label>Alterar o Bimestre</label>
											<hr class="divisor">
											<select name="bimestre_vigor_bim_bc">
												<?php
												$resultado_bc = mysqli_query($conn, "SELECT * FROM bimestrebc");
	
												while ($row_bc = mysqli_fetch_array($resultado_bc)) {
													echo '<option value="' . $row_bc["id_bim_bc"] . '">' . $row_bc["nome_bim_bc"] . '</option>';
												}
												?>
											</select>
											<input type="reset" class="botao" value="Limpar">
											<input type="submit" class="botao" onclick="window.location.reload();" value="Atualizar"> <!-- botar aviso aqui-->
										</form>
									</div>
									<div class="modal-footer">
									</div>
								</div> <!-- fim do modal de cadastro do bimestre -->
	
	
							</div>
						</div>
	
					<?php
	
				}// if para administradores 
			} // If para o Session
			else{
				?>
				<div class="panel panel-default listar-escuro">
					<div class="panel-heading panel-heading_bc">
						Bolsa Cópia
						<hr class="divisor_bc">
					</div>
						<?php }?>
				
				<div class="table-responsive table_bc">
					<table id="tabelabc" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nome:</th>
								<th>Matrícula</th>
								<th>Laudas:</th>
								<th>Última impressão em:</th>
								
								<?php 
									if(isset($_SESSION['login'])){
										echo'<th>Editar</th>';
										if ($_SESSION['nivel'] == 2) { ?>
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
		</div>


		<script>
			// $('#modal-bimestre').on('show.bs.modal', function (event) {
			//   var button = $(event.relatedTarget) // Botão que acionou o modal
			//   var recipient = button.data('whatever') // Extrai informação dos atributos data-*
			//   // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
			//   // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
			//   var modal = $(this)
			//   modal.find('.modal-body input').val(recipient)
			// })

			// $('#modal-vigor').on('show.bs.modal', function (event) {
			//   var button = $(event.relatedTarget) // Botão que acionou o modal
			//   var recipient = button.data('whatever') // Extrai informação dos atributos data-*
			//   // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
			//   // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
			//   var modal = $(this)
			//   modal.find('.modal-body input').val(recipient)
			// })
		</script>

		<?php

		include_once(SITE_ROOT . "funcs/footer.php");
		?>