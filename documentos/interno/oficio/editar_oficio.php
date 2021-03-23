<?php include_once("../../../funcs/header.php");
?>


<script type="text/javascript">
	setTimeout(function() {
		var msg = document.getElementsByClassName("alertaDeErro");
		while (msg.length > 0) {
			msg[0].parentNode.removeChild(msg[0]);
		}
	}, 5000);
</script>

<!-- Teste de Tab-->

<title> Editar ofício </title>

</head>

<body class="bg-dark">
	<?php
	if ($_SESSION['login'] != null) {






		$login = $_SESSION['login'];
		
		$id_doc_ofc = filter_input(INPUT_GET, 'id_doc_ofc', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * from documentos_ofc WHERE id_doc_ofc = '$id_doc_ofc'";
		$r = mysqli_query($conn, $sql);
		$res = mysqli_fetch_assoc($r);

		if (empty($id_doc_ofc) || $_SESSION['nome_usuarios'] != $res['autor_doc_ofc']) {
			header("Location: gerar_oficio.php");
		}
		

		include_once(SITE_ROOT . "funcs/menu.php");


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
			<div class="divoficio" id="fundooficio">
				<!-- div de exibição do bimestre-->
				<form action="editar_doc_ofc.php" method="POST">
					<!--<div id="gestao_doc_ofc">
						<input id ="input-gestao" type="text" placeholder="Gestão 2019.2021 - IF Para Tempos de Guerra" name="gestao_doc_ofc" required>
					</div>
-->

					<div id="numeracaoOficio">

						<input readonly name="titulo_doc_ofc" id="input-numeracaoOficio" type="text" value="<?= $res['titulo_doc_ofc']; ?>" placeholder="OFÍCIO <ANO>.<NÚMERO>/<SIGLA DA DIRETORIA>/GEVP" required>
						<input readonly hidden name="num_doc_ofc" type="text" value="<?= $res['num_doc_ofc'] ?>" required>
						<input readonly hidden name="id_doc_ofc" type="number" value="<?=$id_doc_ofc ?>" required>

					</div>


					<div id="dataOficio">
						<input id="input-dataOficio" value="<?=$res['data_doc_ofc']; ?>" type="text" placeholder="<Local>, <dia> de <mês> de <ano>." name="data_doc_ofc" required>
					</div>
					
					<div id="enderecamentoOficio">
						<textarea wrap="hard" required  name="endrc_doc_ofc" id="input-enderecamentoOficio" spellcheck="true"><?=$res['endrc_doc_ofc']?></textarea>
					</div>


					<div id="assuntoOficio">
						<input readonly="true" type="text" value="Assunto: " id="input-assuntoOficioB">
						<input required id="input-assuntoOficio" type="text" value = "<?=$res['assunto_doc_ofc']?>"placeholder="<Breve resumo do que será tratado no corpo do texto>" name="assunto_doc_ofc" spellcheck="true">

					</div>

					<div id="corpoOficio">



						<textarea required id="input-corpoOficio"  type="text" placeholder="Texto do ofício" name="corpo_doc_ofc" spellcheck="true"><?=$res['corpo_doc_ofc']?></textarea>
					</div>

					<div id="fechoOficio">
						<input required id="input-fechoOficio" value = "<?=$res['fecho_doc_ofc']?>" type="text" placeholder="<Atenciosamente>," name="fecho_doc_ofc" spellcheck="true">


					</div>

					<div id="assinaturaOficio">
						<input required id="input-assinaturaOficio" type="text" placeholder="<NOME DO GREMISTA>" value="<?=$_SESSION['nome_usuarios'] ?>" name="autor_doc_ofc" readonly>

					</div>

					<div id="cargoOficio">
						<input name="matricula_doc_ofc" id="input-matricula_doc_ofc" type="text" value="<?= $_SESSION['matricula'] ?>" readonly>
						<input required id="input-cargoOficio" readonly type="text" value="<?= $_SESSION['cargo'] ?>" name="cargo_doc_ofc" spellcheck="true">

					</div>
					<input required name="gremista_registro_ofc" type="text" hidden value="<?= $_SESSION['login'] ?>">
					<div class="card border-danger mb-3" style="min-width:12rem;max-width: 18rem;" id="input-cardOfc">
						<div class="card-body text-danger">
							<h5 class="card-title">Salvar ofíco</h5>
							<p class="card-text">Terminou o ofício?</p>
							<input type="submit" class="btn btn-danger" value="Salvar Ofício">
						</div>
					</div>
					

			</div>
			</form>
		</div>
	<script>
		// Replace the <textarea id="editor1"> with a CKEditor 4
		// instance, using default configuration.

		CKEDITOR.replace('input-corpoOficio');
		CKEDITOR.config.width = '166mm';
		CKEDITOR.config.height = '80mm';
	</script>
	<?php
	include_once(SITE_ROOT . "funcs/footer.php");
	

	} else {
		header("Location:" . SITE_ROOT);
	}

	?>
