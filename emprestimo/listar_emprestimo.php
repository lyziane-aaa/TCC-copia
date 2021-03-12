<?php
include_once("../funcs/header.php");
?>
<!-- Datatables-->

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
		$('#tabela_emprestimo').DataTable({
			"processing": true,
			"serverSide": true,
			"paging": false,

			"language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
			},
			"ajax": {
				"url": "tabelaemp.php",
				"type": "POST"
			},
		});
	});
</script>
</head>

<body class="bg-dark">
	<?php
	
	include_once("../menuteste.php");
	?>
	<?php include_once("../conexao.php");
	//if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
	?>
	<div class="content p-1">
	
		<!-- <div class="container"> -->
			<br />
			<div class="panel panel-default listar-escuro">
				<div class="panel-heading">Histórico de Empréstimos</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="tabela_emprestimo" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Nome do Objeto</th>
									<th>Nome Completo</th>
									<th>Matrícula ou CPF</th>
									<th>Gremista que Emprestou</th>
									<th>Condição</th>
									<th>Data do Emprestimo</th>
									<th>Data Devolução</th>
									<th>Gremista que Recebeu</th>
									<th>Editar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<!-- Panel-body !-->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<!-- </div> -->
	</div><!-- fim do content-->
	</div><!-- fim do container-->

	<?php
	include_once("../funcs/footer.php");
	//}

	//else{
	//	header("location:../usuarios/login.php");	
	//}
	?>


