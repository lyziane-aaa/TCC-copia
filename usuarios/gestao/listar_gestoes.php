<?php include_once("../../../TCC/funcs/header.php"); ?>

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
			$('#listar_gestao_tabela').DataTable( {
				"Processando": true,
				"serverSide": true,
				"language": {
   								 "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
						},
				"order": [[ 2, 'desc' ]],		
				"ajax": {
					"url": "listar_gestoes_tabela.php",
					"type": "POST"
						},
					} );
				} );
	</script>
</head>

<body class="bg-dark">	
	<?php
		if(!isset($_SESSION['login'])) {session_start();}
		include_once("../../../TCC/funcs/menu.php");
		
		/*if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
			$_SESSION['listar'] = 1;
			*/
			?>
<div class="container">
    <br/>
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading">Gestão atual</div>
        <div class="panel-body">
            <div class="table-responsive">
				<table id="listar_gestao_tabela" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Matrícula</th>
							<th>Cargo</th>
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
</div>

<?php
//}	
include_once("../../../TCC/funcs/footer.php"); 
?>
	</body>
</html>