<html lang="pt-br">
	<head>

		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Buscar Bolsa Cópia</title>
		
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<script src="../../js/jquery-3.6.0.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			<link rel="stylesheet" type="text/css" href="../_css/listar.css">
			
<script type="text/javascript">
            setTimeout(function(){ 
                var msg = document.getElementsByClassName("alertaDeErro");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 5000);
        </script>
	</head>

	<body class="temaescuro">
		<?php
		include_once("../menu.php");
		include_once("../conexao.php");
if($_SESSION['login'] != null) {
			$login = $_SESSION['login']; 
			// Pega os dados do Bimestre
			//$select_BimestreBC = "SELECT * FROM bimestrebc ORDER BY idBimBC DESC LIMIT 1" ; 
			//$resultado_selectBimestre = mysqli_query($conn, $select_BimestreBC);
			//$bimestre = mysqli_fetch_assoc($resultado_selectBimestre);
			//echo $bimestre['nomebimestreBC'];
		$select_BimestreBC = "SELECT * FROM bimestrebc" ; 
		$resultado_selectBimestre = mysqli_query($conn, $select_BimestreBC);	
		$bim = mysqli_fetch_assoc($resultado_selectBimestre);

		//SELECT só do bimestre com true
		$select_vigor = "SELECT * FROM bimestrebc WHERE bimestreVigor = 'TRUE'"; 
		$resultado_selectVigor = mysqli_query($conn, $select_vigor);	
		$vigor = mysqli_fetch_assoc($resultado_selectVigor)

		
	

	
	
	

	

		?> 
		<script>
function Onlynumbers(e)
{
	var tecla=new Number();
	if(window.event) {
		tecla = e.keyCode;
	}
	else if(e.which) {
		tecla = e.which;
	}
	else {
		return true;
	}
	if((tecla >= "97") && (tecla <= "122")){
		return false;
	}
}</script>
		<div class="buscador">
			<h2>Buscar Cadastros no Bolsa Cópia</h2>
		<form action ="" method ="post">
			<label for='Filtro'>Filtro de Busca: </label>
				<input type="text" name = "buscaBC" placeholder="Digite o termo de busca">
				<input type="submit" class="btn btn-secondary btn-sm" value = "Pesquisar">
					<a href="../Funcs/inicio.php">
				<input type="button" class="btn btn-secondary btn-sm" value="Voltar"/> </a>
				<a href="../PDF/gerarPdfBC.php"><input type="button" class="btn btn-secondary btn-sm" value="Gerar PDF"/> </a>
				<a href="../PDF/gerarPDFDoc.php"><input type="button" class="btn btn-secondary btn-sm" value="Gerar PDF"/> </a>
		</form>
				<div> <!-- div de exibição do bimestre--> 
					<?php
					// $vigorInicio e $vigorFim são variáveis para converter vigor['bimestreinicioBC'] e vigor['bimestrefimBC'] para o padrão brasileiro
					$vigorInicio = date('d/m/Y',strtotime($vigor['bimestreinicioBC'])); 
					$vigorFim= date('d/m/Y',strtotime($vigor['bimestrefimBC']));
				
				?>
					<h4> Bimestre vigente: <?php echo $vigor['nomebimestreBC'] ?><br> Início: <?php echo $vigorInicio ?><br> Fim: <?php echo $vigorFim ?> </h4>			
				</div>
<!-- Início do Modal Configurações -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="Atualizar Bimestre em Vigor">Configurar Bimestre</button>
						
						
						<!-- LEMBRAR DE BOTAR IF AQUI -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Configurar Bimestre</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
									
								
										<div class="form-group">
											<form>
												  <div class="form-group">
													<label for="recipient-name" class="col-form-label">Bimestre em vigor:</label>
													<input type="text" value="<?php echo $vigor['nomebimestreBC'] ?>" id="recipient-name" readonly=“true”>
											  </div>
											</form>
										</div>
														<div class="form-group">
																<form action="inserirBimestreVigor.php" method="POST" id="form-bimestreVigor">
																<label for="bimestreVigor">Atualizar Bimestre em vigor</label>
															<select id="bimestreVigor" required="true" name="bimestreVigor" class="form-control">
															  <?php 
																	$select_BimestreBC = "SELECT * FROM bimestrebc" ; 
																	$resultado_selectBimestre = mysqli_query($conn, $select_BimestreBC);
														
												
																	while($row = mysqli_fetch_assoc($resultado_selectBimestre)) 
																	{
																		echo '<option value='. $row['nomebimestreBC'] .'>'. $row['nomebimestreBC'] .'</option>';	
																	}
															  ?>
														</select>
														 </div>

																		

													<input class ="btn-action btn--primary" value="Atualizar Bimestre em Vigor" type="submit">
											
	
											 
											</form>
											<hr class="divisor">
										
										 </div>
									
									<form action="inserirBimestreNovo.php" method="POST" enctype="multipart/form-data">
										<h5> Cadastrar novo Bimestre </h5>
											<div class="form-group">
												<label for="nomebimestreBC" class="col-form-label">Nome do Bimestre</label>
												<input type="text" class="form-control" name="nomebimestreBC" onKeyPress="return Onlynumbers(event);">
											</div>
											<div class="form-group">
												<label for="bimestreinicioBC" class="col-form-label">Nome do Bimestre</label>
												<input type="date" class="form-control" name="bimestreinicioBC">
											</div>
											<div class="form-group">
												<label for="bimestrefimBC" class="col-form-label">Nome do Bimestre</label>
												<input type="date" class="form-control" name="bimestrefimBC">
											</div>
											<input name="gremistaRegistrouBC" type="text" hidden value="<?php echo $_SESSION['login']?>">
											<input class ="btn-action btn--primary" value="Cadastrar Bimestre Novo" type="submit">

									</form>
							  </div>

							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								
							  </div>
							</div>
						  </div>
						</div>
				<!-- Fim do Modal Configurações -->
		
		<?php 
		$nivel_necessario = 2;
		$mensg1 = '<div class="alert alert-danger preto alertaDeErro" role="alert">Nenhum resultado encontrado.
						Verifique se o nome foi escrito corretamente</div>';
			$buscaBC= filter_input(INPUT_POST, 'buscaBC', FILTER_SANITIZE_STRING);
			$resultado_insertBC = "SELECT * FROM bolsacopia WHERE (nomeBC LIKE '%".$buscaBC."%' OR matriculaBC LIKE '%".$buscaBC."%')" ; 
			$resultado_BC = mysqli_query($conn, $resultado_insertBC);
			$busca = mysqli_num_rows($resultado_BC);
			
			echo '<table class="table table-striped table-hover table-bordered table-sm">';
								echo '<thead class="thead-dark">';
								echo '<caption>Lista do Bolsa Cópia</caption>';
								echo '<tr>';
								echo '<th scope="col">ID: </th>';
								echo '<th scope="col">Nome:</th>';
								echo '<th scope="col">Matrícula: </th>';
								echo '<th scope="col">Laudas: </th>';
								echo '<th scope="col">Data da última impressão:</th>';
								echo '<th scope="col">Adicionar novas laudas:</th>';
								
							
								if ($_SESSION['nivel'] == $nivel_necessario) {
								echo '<th scope = "col">Editar:</th>';
								echo '<th scope = "col">Excluir:</th>';
								}
				
								echo "</tr>";
								echo "</thead>";
								echo '<tbody>';
						while($row = mysqli_fetch_assoc($resultado_BC)){
								
								echo '<tr>';
								echo '<td>'. $row['idBC'] .'</td>';
								echo '<td>'. $row['nomeBC'] .'</td>';
								echo '<td>'. $row['matriculaBC'] .'</td>';
								echo '<td>'. $row['laudasBC'] .'</td>';
								echo '<td>'. $row['ultimaDataBC'] .'</td>';
								echo "<td><a href='adicionarBolsaCopia.php?tipo=2&idBC=" . $row['idBC'] . "'style= 'filter: invert(100%);'><img id = 'imgAddBC' src='../imagens/adicionarBC.png' width='20' height='20' title='Adicionar novas laudas' /></td>";

    if ($_SESSION['nivel'] == $nivel_necessario) {

		echo "<td><a href='editarBolsaCopia.php?tipo=2&idBC=" . $row['idBC'] . "'style= 'filter: invert(100%);'><img src='../imagens/editar.png' width='20' height='20' title='Editar' /></td>";
		echo "<td><a href='excluirBolsaCopia.php?tipo=2&idBC=" . $row['idBC'] . "'style= 'filter: invert(100%);'><img src='../imagens/del.png' width='20' height='20' title='Excluir' /></td>";}
		
		}  echo '</tr>';
    echo '</tbody>';
    echo '</table>'; } 
    if ($busca == 0) {echo "$mensg1";}    

?>
	
	</body>
</html>