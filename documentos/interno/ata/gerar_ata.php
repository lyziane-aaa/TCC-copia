<html lang="pt-br">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Nova Ata</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="/TCC/_css/documentos.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/listar.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/estilo.css">


	<script type="text/javascript">
		setTimeout(function() {
			var msg = document.getElementsByClassName("alertaDeErro");
			while (msg.length > 0) {
				msg[0].parentNode.removeChild(msg[0]);
			}
		}, 5000);
	</script>

	<!-- Teste de Tab-->



</head>

<body class="temaescuro">
	<?php
	include_once("../../../menu.php");
	include_once("../../../conexao.php");
	if ($_SESSION['login'] != null) {
		$login = $_SESSION['login'];
	?>
		<script>
			function Onlynumbers(e) {
				var tecla = new Number();
				if (window.event) {
					tecla = e.keyCode;
				} else if (e.which) {
					tecla = e.which;
				} else {
					return true;
				}
				if ((tecla >= "97") && (tecla <= "122")) {
					return false;
				}
			}
		</script>
		<div id="interface">
			<div class="divoficio" id="fundo-ata">
				<!-- div de exibição do bimestre-->
				<form action="inserir_doc_ata.php" method="POST">
					<!--<div id="gestao_doc_ofc">
						<input id ="input-gestao" type="text" placeholder="Gestão 2019.2021 - IF Para Tempos de Guerra" name="gestao_doc_ofc" required>
					</div>-->
					<?php
					$query = "SELECT * FROM documentos_ata ORDER BY num_doc_ata DESC LIMIT 1";
					$query_a = mysqli_query($conn, $query);
					$num = mysqli_fetch_assoc($query_a);
					
					// Configurar a numeração 
					
					//	if (!empty($num['num_doc_ata'])){
						//$num = intval($num['num_doc_ata']);
						$num_exp = explode("/",$num['num_doc_ata']);
						$num_a = intval($num_exp['0']);
						$num_a = $num_a++;
						$numnovo = 'Ata ' . $num_a . '/' . date('Y');//}
						
					?>

					<div id="titulo_doc_ata">
					<input name="num_doc_ata" required id="input-num_doc_ata" type="text" placeholder="<NOME DO GREMISTA>" value="<?php echo $numnovo ?>" readonly>
					</div>
					<div id="data-ata">			
					<input name="data_doc_ata" class="input-data-ata" type="text" placeholder="Mossoró, 08 de maio de 2021."  >
					<input name="local_doc_ata" class="input-data-ata" type="text" placeholder="Plataforma Virtual Google Meet"  >
				</div>			

					<div id="convoc-ata">
					<input name="data_doc_ata" id="input-convoc-ata" type="text" placeholder="<Nome Complete>, <Cargo>">
					<select name="local_doc_ata" class="select-convoc-ata">
						<option value = "Deliberativa" selected = "selected">Deliberativa</option>
						<option value = "Informativa">Informativa</option>
					</select>
					<input name="data_doc_ata" id="input-sec-ata" type="text" placeholder="Karydja França, Presidente do Grêmio">
					</div>
					<div id="pautas-ata">
					<textarea></textarea>
					</div>
				
					<div id="texto-ata">
						<textarea name="texto_doc_ata" required id="input-texto-ata" type="text" spellcheck="true"></textarea>
					</div>

					<div id="matricula-ata">
						<input name="matricula_doc_ata" required id="input-matricula-ata" type="text" value   spellcheck="true">
					</div>

					<div id="assinatura-ata">
						<input name="assinatura_doc_ata" required id="input-assinatura-ata" type="text" placeholder="<NOME DO GREMISTA>" value="<?php echo $numnovo ?>" readonly>
					</div>

					<div id="cargo-ata">
						<input required id="input-cargo-ata" readonly type="text" value="<?php echo $num_a?>" name="cargo_doc_ata" spellcheck="true">

					</div>
					<input required name="gremista_registro_ata" type="text" hidden value="<?php   ?>">

					<div class="card border-danger mb-3" style="min-width:12rem;max-width: 18rem;" id="input-card-ata">

						<div class="card-body text-danger">
							<h5 class="card-title">Terminou a  ata? </h5>
							<p class="card-text">Lembre-se:<br>Documentos só valem após assinados!</p>
							<input type="submit" class="btn btn-danger" value="Salvar ata">
						</div>
					</div>

			</div>
			</form>


			<!-- Início do Modal Configurações -->




		<?php
		include_once("../../../footer.php");
	}
		?>
		</div><!-- fim div #interface-->


		<script src="../../../ckeditor/ckeditor/ckeditor.js" charset="utf-8"></script><!-- Arquivos para o editor de texto opensource CKEditor-->
	 <script src="../../../ckeditor/ckfinder/ckfinder.js"></script>
	<script src="../../../ckeditor/js/javascript.js"></script>
		<script>
			CKEDITOR.replace('input-texto-ata');
			
			// Replace the <textarea id="editor1"> with a CKEditor 4
			// instance, using default configuration.

		</script>

</body>

</html>