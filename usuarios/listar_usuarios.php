<?php include_once("../../TCC/funcs/header.php"); ?>

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
    <div class="panel panel-default listar-escuro panel-grande">
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
							<?php if($_SESSION['nivel'] == 2) {?>
								<th>Excluir</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
            </div> <!-- Panel-body !-->
        </div>
    </div>
</div>





<!-- Modal Editar
 <div class="modal fade" id="modal-editar-<?=$row_usu["id_usuarios"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<h5 class="modal-title" id="TituloModalCentralizado">Atualizar Usuários</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
      </div>
      <div class="modal-body" style="overflow-y:auto;">
        <form method="post" action="inserir_usuarios.php" class="cadastro">

			<label for="login">Nome de usuário:</label>
			<input type="text" name="login" id="nome" maxlength="11" required value="<?=$row_usu['login']?>">
			<br>

			<label for="nome-usuarios">Nome completo:</label>
			<input type="text" name="nome_usuarios" id="nome-usuarios" required value="<?=$row_usu['nome_usuarios']?>">
			<br>

			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha"required value="<?=$row_usu['senha']?>">
			<br>

			<select name = "cargo">
				<?php  $resultado_car=mysqli_query($conn, "SELECT * FROM usuarios_cargos");
						while($row_car = mysqli_fetch_array($resultado_car))
						{
							echo '<option value="' . $row_car["id_diretoria"].'">' . $row_car["nome_cargo"] . '</option>';    
						}
				?>
			</select>   

			<label for="matricula">Matrícula:</label>
			<input type="text" name="matricula_usuarios" id="matricula" onKeyPress="return Onlynumbers(event);" required value="<?=$row_usu['matricula_usuarios']?>">
			<br>

			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" onKeyPress="return Onlynumbers(event);" required value="<?=$row_usu['telefone']?>">
			<br>
			
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" required value="<?=$row_usu['email']?>">
			<br>

			<label for="nivel" id="post">Nível:</label>
			<select name="nivel" id="nivel">
				<option value="1">1</option>
				<option selected value="2">2</option>
			</select>    
			<br>
			<?php 
				$hoje = date('d/m/Y')
			?>
			<input type="hidden" value="<?= $_SESSION['nome_usuarios']?>" name="gremista_update">
			<input type="hidden" value="<?= $hoje ?>" name="data_update">
			<input type="hidden" value ="<?= $row_usu['id_usuarios'] ?>" name="id">
			<input type="hidden" value="listar" name="pagina"> 
			<input type="submit" value="Enviar">
			<input type="reset" value="Limpar">
			<br> 
			<br>
		</form>
      </div>
    </div>
  </div>
</div>
-->

<?php
}	
include_once(SITE_ROOT . "funcs/footer.php"); 
?>
	</body>
</html>