<?php header('Content-Type: text/html; charset=utf-8');
?><html lang="pt-br">

<head>

<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gerar Nova Portaria</title>

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
	include_once("../../../Funcs/functions.php");
	if ($_SESSION['login'] != null) {
		$login = $_SESSION['login'];
		// Calcula a numeração da portaria
		$titulo_doc_port = numdoc("port", $_SESSION['cargo']);
		$num_doc_port = extrair('port', $titulo_doc_port);

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
			<div class="divoficio" id="fundo-port">
				<!-- div de exibição do bimestre-->
				<form action="inserir_doc_port.php" method="POST">
					<!--<div id="gestao_doc_ofc">
						<input id ="input-gestao" type="text" placeholder="Gestão 2019.2021 - IF Para Tempos de Guerra" name="gestao_doc_ofc" required>
					</div>-->

					<div id="titulo_doc_port">
						<input name="titulo_doc_port" id="input-titulo_doc_port" type="text" placeholder="PORTARIA Nº <NÚMERO>/<ANO>, DE <DIA> DE <MÊS> DE <ANO>" value="<?php echo $titulo_doc_port ?>" required>
						<input hidden name="num_doc_port"  type="text" value="<?php echo $num_doc_port; ?>" required>
					</div>

					<div id="resumo-port">
						<textarea wrap="hard" required name="resumo_doc_port" id="input-resumo_doc_port" spellcheck="true"></textarea>
					</div>


					<div id="texto-port">
						<textarea name="texto_doc_port" required id="input-texto-port" type="text" placeholder="O Presidente, no uso de suas atribuições, resolve" spellcheck="true"></textarea>
					</div>

					<div id="assinatura-port">
						<input name="autor_doc_port" required id="input-assinatura-port" type="text" placeholder="<NOME DO GREMISTA>" value="<?php echo strtoupper($_SESSION['nome_usuarios']) ?>" readonly>
					</div>

					<div id="cargo-port">
						<input required id="input-cargo-port" readonly type="text" value="<?php echo $_SESSION['cargo'] ?>" name="cargo_doc_port" spellcheck="true">

					</div>
					<input required name="gremista_registro_port" type="text" hidden value="<?php echo $_SESSION['login'] ?>">

					<div class="card border-danger mb-3" style="min-width:12rem;max-width: 18rem;" id="input-card-port">

						<div class="card-body text-danger">
							<h5 class="card-title">Terminou a Portaria? </h5>
							<p class="card-text">Lembre-se:<br>Documentos só valem após assinados!</p>
							<input type="submit" class="btn btn-danger" value="Salvar Portaria">
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
			CKEDITOR.replace('input-texto-port');
			// Replace the <textarea id="editor1"> with a CKEditor 4
			// instance, using default configuration.
		</script>

</body>

</html>