<?php include_once("../../../TCC/funcs/header.php"); ?>

	<script>
		//Tabela dos ofícios
		$(document).ready(function() {
			$('#tabela_ofc').DataTable({
				"Processando": true,
				"lengthMenu": [
					[10, 25, 50, -1],
					[10, 25, 50, "All"]
				],
				"serverSide": true,
				"language": {
					"url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
				},
				"ajax": {
					"url": "req/tabela_ofc.php",
					"type": "POST"
				},
			});
		});
		//Tabela das portarias
		$(document).ready(function() {

			$('#tabela_port').DataTable({
				"Processando": true,
				"serverSide": true,
				"language": {
					"url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
				},
				"ajax": {
					"url": "req/tabela_port.php",
					"type": "POST"
				},
			});
		});
	</script>
	<script>
		function confirmar(id, link) {
			Swal.fire({
				title: 'Você tem certeza?',
				text: "Não há como reverter a exclusão!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Excluir',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire(
						'O Arquivo Excluido!',
						'',
						'success'
					)
					if (link == 1) {
						location.href = "../interno/req/excluir_documentos.php?id_doc_port=;" + id;
					} else {
						location.href = "../interno/req/excluir_documentos.php?id_doc_ofc=;" + id;
					}
				}
			})
		};
	</script>
</head>

<body class="bg-dark">
	<?php
	if (!isset($_SESSION['login'])) {

		session_start();
	}
	include_once(SITE_ROOT . "funcs/menu.php");
	?>
	<?php
	$nivel_necessario = 2;

	?>
	<div class="container">
		<br />
		<div class="panel panel-default listar-escuro">
			<div class="panel-heading">Meus Documentos: Ofícios</div>
			<div class="panel-body">


				<div class="table-responsive">
					<!-- tabela ofícios -->
					<table id="tabela_ofc" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Título</th>
								<th>Autor</th>
								<th>Data de emissão</th>
								<th>Gerar PDF</th>
								<?php 
									if(isset($_SESSION['login'])){
										if ($_SESSION['nivel'] == 2) { ?>
											<th>Excluir</th>
								<?php }}?>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div> <!-- tabela !-->

				<br>
				<br>
				<br>
				<div class="panel-heading">Meus Documentos: Portarias</div>
				<div class="table-responsive">
					<!-- tabela portaria -->
					<table id="tabela_port" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Título</th>
								<th>Autor</th>
								<th>Data de emissão</th>
								<th>Gerar PDF</th>
								<?php if($_SESSION['nivel'] == 2) {?>
									<th>Excluir</th>
								<?php }?>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div> <!-- tabela !-->


			</div> <!-- panel body-->
		</div>
	</div>
								</div>

</body>

<?php

include_once(SITE_ROOT . "funcs/footer.php");
?>


</body>

</html>