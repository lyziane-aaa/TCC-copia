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
	
<script>

$(document).ready(function() {
							$(document).on('click', '.editar-emp', function() {
								var id_emp = $(this).attr("id");
								//Verificar se há valor na variável "id_bc".
								if (id_emp !== '') {
									var dados = {
										id_emp: id_emp,
										tipo: "editar-emp"
									};

									$.post('../funcs/visu_modal.php', dados, function(retorna) {
										//Carregar o conteúdo para o usuário
										$("#visul_editar-emp").html(retorna);
										$('#emp').modal('show');
									});
								}
							});
						});
</script>
</head>

<body class="bg-dark">
	<?php

	include_once(SITE_ROOT . "funcs/menu.php");
	?>

		<br/>
		<div class="panel panel-default listar-escuro" align="center">
			<div class="panel-heading">Histórico de Empréstimos</div>
			<div class="panel-body"> 
				<div class="table-responsive">
					<table id="tabela_emprestimo"  class="table table-bordered table-striped">
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
								<?php 
									if(isset($_SESSION['login'])){
										echo'<th>Editar</th>';
										if ($_SESSION['nivel'] == 2) { ?>
											<th>Excluir</th>
								<?php }}?>
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

	
		
<!-- início dos modais -->
	
	<?php
	include_once(SITE_ROOT . "funcs/footer.php");
	//}

	//else{
	//	header("location:../usuarios/login.php");	
	//}
	?>