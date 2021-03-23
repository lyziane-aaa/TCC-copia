<?php include_once("../../TCC/funcs/header.php");
$hre="excluir_usuarios.php?id_usuarios="; ?>

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
				"Processing":true,
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

<body class="bg-dark">	
	<?php
	include_once(SITE_ROOT . "funcs/menu.php");
	$nivel_necessario = 2;
		if(isset($_SESSION['login'])) {
	?>
    <br/>
    <div class="panel panel-default listar-escuro " align="center">
        <div class="panel-heading">Usuários da Gestão</div>
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
            </div> <!-- Panel-body !-->
        </div>
    </div>


	<?php } 
	else{
		?>
		<div class="panel panel-default listar-escuro " align="center">
        <div class="panel-heading">Usuários da Gestão</div>
        <div class="panel-body">
            <div class="table-responsive">
				<table id="tabela_usuarios" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>Nome Completo</th>
							<th>Cargo</th>
							<th>Matrícula</th>
							<th>Telefone</th>
							<th>E-mail</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
            </div> <!-- Panel-body !-->
        </div>
    </div>

	<?php }?>
							</div>


<?php
include_once(SITE_ROOT . "funcs/footer.php"); 
?>
	</body>
</html>