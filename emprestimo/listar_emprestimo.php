<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Listar Empréstimo</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../_css/estilo.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="../js/scripts.js"></script>
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
				"Processando": true,
				"serverSide": true,
				select: 'multi',
            select: {
                items: 'row',
				
			},
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

<body class="tema-escuro">
	<?php
	if (!isset($_SESSION['login'])) {
		session_start();
	}
	include_once("../menu.php");
	?>
	<?php
	$nivel_necessario = 2;
	include_once("../conexao.php");
	//if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
	?>
	<div class="container">
		<br/>
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
		</div>

		<?php
		include_once("../footer.php");
		//}

		//else{
		//	header("location:../usuarios/login.php");	
		//}
		?>



</body>

</html>