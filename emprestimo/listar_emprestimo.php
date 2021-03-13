<?php
include_once("../funcs/header.php");
?>

<?php $hre = "excluir_emprestimo.php?id_emp="; ?>


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

	include_once(SITE_ROOT . "funcs/menu.php");
	?>
	<?php include_once("../funcs/conexao.php");
	//if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
	?>

		<br />
		<div class="panel panel-default listar-escuro">
			<div class="panel-heading">Histórico de Empréstimos</div>
			<!-- <div class="panel-body"> -->
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
								<?php if ($_SESSION['nivel'] == 2) { ?>
									<th>Editar</th>
									<th>Excluir</th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<!-- Panel-body !-->
						</tbody>
					</table>
				</div>
			<!-- </div> -->
		</div>

	
		
<!-- início dos modais -->
	<?php
	$result_emp = "SELECT * FROM emprestimos WHERE 1=1";
	$resultado_emp = mysqli_query($conn, $result_emp);
	while ($row_emp = mysqli_fetch_array($resultado_emp)) {
	?>
		<!-- Modal Editar-->
		<div class="modal fade" id="modal-editar-<?= $row_emp["id_emp"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="TituloModalCentralizado">Atualizar registro do empréstimo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="overflow-y:auto;">
						<form method="post" action="inserir_emprestimo.php" class="cadastro">

							<label for="nome_emp">Nome do objeto:</label>
							<input type="text" readonly value="<?= $row_emp['obj_emp'] ?>" name="objeto_emp" required>
							<br>

							<label for="nome_emp">Nome completo do aluno:</label>
							<input type="text" placeholder="<?= $row_emp['nome_emp'] ?>" name="nome_emp" id="nome-usuarios" required>
							<br>

							<label for="matricula_emp">Matrícula ou CPF:</label>
							<input type="text" placeholder="<?= $row_emp['matricula_emp'] ?>" name="matricula_emp" required>
							<br>

							<label for="gremista_emp">Gremista que emprestou:</label>
							<input type="text" name="gremista_emp" required readonly value="<?= $row_emp['gremista_emp'] ?>">
							<br>

							<label for="condicao" id="post">Condição:</label>
							<select placeholder="<?= $row_emp['condicao_emp'] ?>" name="condicao_emp" id="condicao">
								<option value="Novo">Novo</option>
								<option selected value="Normal">Normal</option>
								<option value="Desgastado">Desgastado</option>
							</select>

							<label for="data_emp">Data de Devolução:</label>
							<input type="text" name="devolucao_emp" required readonly value="<?php $data = date('d/m/Y - H:i:s');
																								echo $data; ?>">

							<label for="gremista_emp">Gremista que Recebeu:</label>
							<input type="text" readonly value="<?= $_SESSION['nome_usuarios'] ?>" name="gremista_recebeu_emp" required>
							<br>

							<input type="hidden" value="<?= $row_emp['id_emp'] ?>" name="id">
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
	//}

	//else{
	//	header("location:../usuarios/login.php");	
	//}
	?>