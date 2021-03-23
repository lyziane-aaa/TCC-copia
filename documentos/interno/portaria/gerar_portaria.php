<?php include_once("../../../funcs/header.php");
?>
	<title>Nova Portaria</title>



</head>

<body class="bg-dark">
	<?php
	include_once(SITE_ROOT . "funcs/menu.php");
	
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
						<input name="titulo_doc_port" id="input-titulo_doc_port" type="text" placeholder="PORTARIA Nº <NÚMERO>/<ANO>, DE <DIA> DE <MÊS> DE <ANO>" value="<?=$titulo_doc_port ?>" required>
						<input hidden name="num_doc_port"  type="text" value="<?=$num_doc_port; ?>" required>
						
					</div>

					<div id="resumo-port">
						<textarea wrap="hard" required name="resumo_doc_port" id="input-resumo_doc_port" spellcheck="true"></textarea>
					</div>


					<div id="texto-port">
						<textarea name="texto_doc_port" required id="input-texto-port" type="text" placeholder="O Presidente, no uso de suas atribuições, resolve" spellcheck="true"></textarea>
					</div>

					<div id="assinatura-port">
						<input name="autor_doc_port" required id="input-assinatura-port" type="text" placeholder="<NOME DO GREMISTA>" value="<?=$_SESSION['nome_usuarios']?>" readonly>
					</div>

					<div id="cargo-port">
						<input required id="input-cargo-port" readonly type="text" value="<?=$_SESSION['cargo'] ?>" name="cargo_doc_port" spellcheck="true">

					</div>
					<input required name="gremista_registro_port" type="text" hidden value="<?=$_SESSION['login'] ?>">

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


			</div><!-- fim div #interface-->


		<?php
		include_once(SITE_ROOT . "funcs/footer.php");
	}
		?>

		<script>
			CKEDITOR.replace('input-texto-port');
			// Replace the <textarea id="editor1"> with a CKEditor 4
			// instance, using default configuration.
		</script>

</body>

</html>