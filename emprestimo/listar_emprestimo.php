<?php
include_once("../funcs/header.php");
?>
<!-- Datatables-->
<!DOCTYPE html>
<html>
<head>
<?php $hre="excluir_emprestimo.php?id_emp="; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Listar Empréstimo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../_css/estilo.css">

<!-- Datatables-->
<script src="../js/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="../DataTables/datatables.css" />
<script type="text/javascript" src="../DataTables/datatables.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



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
<<<<<<< HEAD
		<!-- </div> -->
	</div><!-- fim do content-->
	</div><!-- fim do container-->
=======
		</div>

		<?php 
			$result_emp = "SELECT * FROM emprestimos WHERE 1=1";
			$resultado_emp = mysqli_query($conn, $result_emp);
			while ($row_emp = mysqli_fetch_array($resultado_emp)) {
		?>
<!-- Modal Editar-->
<div class="modal fade" id="modal-editar-<?=$row_emp["id_emp"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<input type="text" readonly value="<?= $row_emp['obj_emp']?>" name="objeto_emp" required>
                <br>

				<label for="nome_emp">Nome completo do aluno:</label>
				<input type="text" placeholder="<?= $row_emp['nome_emp']?>" name="nome_emp" id="nome-usuarios" required>
                <br>

                <label for="matricula_emp">Matrícula ou CPF:</label>
                <input type="text" placeholder="<?= $row_emp['matricula_emp']?>" name="matricula_emp" required>
                <br>

                <label for="gremista_emp">Gremista que emprestou:</label>
                <input type="text" name="gremista_emp" required readonly value="<?= $row_emp['gremista_emp']?>">
                <br>

                <label for="condicao" id="post">Condição:</label>
                <select placeholder="<?= $row_emp['condicao_emp']?>" name="condicao_emp" id="condicao">
                    <option value="Novo">Novo</option>
                    <option selected value="Normal">Normal</option>
                    <option value="Desgastado">Desgastado</option>
                </select>

				<label for="data_emp">Data de Devolução:</label>
                <input type="text" name="devolucao_emp" required readonly value="<?php $data = date('d/m/Y - H:i:s'); echo $data; ?>">

				<label for="gremista_emp">Gremista que Recebeu:</label>
                <input type="text" readonly value="<?= $_SESSION['nome_usuarios']?>" name="gremista_recebeu_emp" required>
                <br>

			<input type="hidden" value ="<?= $row_emp['id_emp'] ?>" name="id">
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
			include_once("../footer.php");
			//}

			//else{
			//	header("location:../usuarios/login.php");	
			//}
		?>
>>>>>>> 209d268daa24767b3236098b551767f124b940cb

	<?php
	include_once("../funcs/footer.php");
	//}

	//else{
	//	header("location:../usuarios/login.php");	
	//}
	?>


