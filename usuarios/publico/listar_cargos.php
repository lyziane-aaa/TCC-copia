<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cargos do GEVP</title>
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../_css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css" />
	
	<script type="text/javascript" src="../../DataTables/datatables.js"></script>
	<script type="text/javascript">
    setTimeout(function(){ 
        var msg = document.getElementsByClassName("alertaDeErro");
            while(msg.length > 0){
                msg[0].parentNode.removeChild(msg[0]);
                }
            }, 5000);
	</script>
	
	<script>
		$(document).ready(function() {
			$('#tabela_usuarios').DataTable( {
				"Processando": true,
				"serverSide": true,
				"language": {
   								 "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
						},
				"ajax": {
					"url": "tabelausu.php",
					"type": "POST"
						},
					} );
				} );
	</script>
</head>

<body class="tema-escuro">	
	<?php
		if(!isset($_SESSION['login'])) {session_start();}
		include_once("../menu.php");
	?>
	<?php 
		$nivel_necessario = 2;
		include_once("../conexao.php");
		if(isset($_SESSION['login']) && isset($_SESSION['nivel']) || isset($_SESSION['aluno'])) {
			$_SESSION['listar'] = 1;
			/* Aparentemente a presença do Bootstrap altera o tamanho da imagem no menu,
			então essa variavel se encontrara em todos os listar e conterá o novo conteudo a ser colocado
			como formartação da imagem, porém para isso dar certo terei de fazer um teste lógico dentro do
			 menu com o php */
			?>
<div class="container">
    <br/>
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading">Usuários</div>
        <div class="panel-body">
            <div class="table-responsive">
				<table id="tabela_usuarios" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome Completo</th>
							<th>Cargo</th>
							<th>Matrícula</th>
							<th>Telefone</th>
							<th>E-mail</th>
							<th>Nível de Acesso</th>
							<th>Data de Registro</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
            </div> <!-- Panel-body !-->
        </div>
    </div>
</div>

<?php
}	
include_once("../footer.php"); 
?>
	</body>
</html>