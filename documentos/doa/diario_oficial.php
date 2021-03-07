<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Diário Oficial do GEVP</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css">



	<script src="../../js/jquery-3.6.0.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css" />

	<script type="text/javascript" src="../../DataTables/datatables.js"></script>

	<script type="text/javascript">
		setTimeout(function() {
			var msg = document.getElementsByClassName("alertaDeErro");
			while (msg.length > 0) {
				msg[0].parentNode.removeChild(msg[0]);
			}
		}, 5000);
	</script>

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
					"url": "../interno/req/tabela_ofc.php",
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
					"url": "../interno/req/tabela_port.php",
					"type": "POST"
				},
			});
		});
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

	?>
	<div class="container">

		<div class="panel panel-default listar-escuro">
			<div id="suprema">
				<div class="panel-heading">Meus Documentos:</div>
				<br>
				<div id="painel-diario">
					<p>Boas-vindas ao Diário Oficial do GEVP!</p>
					<p>Nesta página, você poderá consultar os últimos documentos expedidos pelo GEVP, como atas, editais e portarias!</p>

				</div>

				<div class="panel-body">
					<br>
					<br>
					<div class="panel-heading">Últimas Portarias</div>
					<div class="table-responsive">
						<!-- tabela portaria -->
						<table id="tabela_port" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Título</th>
									<th>Autor</th>
									<th>Data de emissão</th>
									<th>Gerar PDF</th>

								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div> <!-- tabela !-->
					<div class="table-responsive">
						<!-- tabela ofícios -->
						<br>
						<br>

						<div class="panel-heading">Últimas atas</div>
						<table id="tabela_ofc" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Título</th>
									<th>Autor</th>
									<th>Data de emissão</th>
									<th>Gerar PDF</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div> <!-- tabela !-->
					<br>
					<br>
					<div class="panel-heading">Últimos ofícios</div>
					<table id="tabela_ofc" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Título</th>
								<th>Autor</th>
								<th>Data de emissão</th>
								<th>Gerar PDF</th>
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

	<?php

	include_once("../../footer.php");
	?>

</body>

</html>