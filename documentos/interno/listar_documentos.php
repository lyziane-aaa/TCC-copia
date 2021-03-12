<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Listar Documentos</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="/TCC/_css/estilo.css">


	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- Datatables-->
	<script src="../../js/jquery-3.6.0.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css" />

	<script type="text/javascript" src="../../DataTables/datatables.js"></script>
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

<body class="tema-escuro">
	<?php
	if (!isset($_SESSION['login'])) {

		session_start();
	}
	include_once("../../menu.php");
	?>
	<?php
	$nivel_necessario = 2;
	include_once("../../conexao.php");
	include_once('../../Funcs/functions.php');

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
								<?php if($_SESSION['nivel'] == 2) {?>
									<th>Excluir</th>
								<?php }?>
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

	<?php

	include_once("../../footer.php");
	?>

</body>

<?php

include_once("../../footer.php");
?>


</body>

</html>