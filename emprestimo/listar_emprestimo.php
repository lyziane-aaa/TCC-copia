<!DOCTYPE html>
<html>
<head>
<?php $hre="excluir_emprestimo.php?id_emp="; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Listar Empréstimo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../_css/estilo.css">

<!-- Datatables-->
<script src="../js/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" type="text/css" href="../DataTables/datatables.css" />

<script type="text/javascript" src="../DataTables/datatables.js"></script>




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
									<?php if($_SESSION['nivel'] == 2) {?>
										<th>Editar</th>
										<th>Excluir</th>
									<?php }?>
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