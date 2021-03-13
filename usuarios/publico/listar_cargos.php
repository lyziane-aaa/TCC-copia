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

<body class="bg-dark">	
	<?php
		if(!isset($_SESSION['login'])) {session_start();}
		include_once(SITE_ROOT . "funcs/menu.php");
	?>
	<?php 
		$nivel_necessario = 2;
		include_once("../funcs/conexao.php");
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
include_once(SITE_ROOT . "funcs/footer.php"); 
?>
	</body>
</html>