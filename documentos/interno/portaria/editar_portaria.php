<?php include_once("../../../funcs/header.php");
?>
	<title>Editar Portaria</title>



</head>

<body class="bg-dark">
	<?php

	if ($_SESSION['login'] != null) {






		$login = $_SESSION['login'];
		
		$id_doc_port = filter_input(INPUT_GET, 'id_doc_port', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * from documentos_port WHERE id_doc_port = '$id_doc_port'";
		$r = mysqli_query($conn, $sql);
		$res = mysqli_fetch_assoc($r);

		if (empty($id_doc_port) || $_SESSION['nome_usuarios'] != $res['autor_doc_port']) {
			header("Location: gerar_portaria.php");
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
			<div class="divoficio" id="fundo-port">
				<!-- div de exibição do bimestre-->
				<form action="editar_doc_port.php" method="POST">
					<!--<div id="gestao_doc_port">
						<input id ="input-gestao" type="text" placeholder="Gestão 2019.2021 - IF Para Tempos de Guerra" name="gestao_doc_port" required>
					</div>-->

					<div id="titulo_doc_port">
						<input name="titulo_doc_port" id="input-titulo_doc_port" type="text" placeholder="PORTARIA Nº <NÚMERO>/<ANO>, DE <DIA> DE <MÊS> DE <ANO>" value="<?=$res['titulo_doc_port'] ?>" required>
						<input hidden name="num_doc_port"  type="text" value="<?=$res['num_doc_port'] ?>" required>
						<input hidden name="id_doc_port"  type="text" value="<?=$res['id_doc_port'] ?>" required>
						
					</div>

					<div id="resumo-port">
						<textarea wrap="hard" required name="resumo_doc_port" id="input-resumo_doc_port" spellcheck="true"><?=$res['resumo_doc_port'] ?></textarea>
					</div>


					<div id="texto-port">
						<textarea name="texto_doc_port" required id="input-texto-port" type="text" placeholder="O Presidente, no uso de suas atribuições, resolve" spellcheck="true"><?=$res['texto_doc_port']?></textarea>
					</div>

					<div id="assinatura-port">
						<input name="autor_doc_port" required id="input-assinatura-port" type="text" placeholder="<NOME DO GREMISTA>" value="<?=$_SESSION['nome_usuarios']?>" readonly>
					</div>

					<div id="cargo-port">
					<input name="matricula_doc_port" id="input-matricula_doc_port" type="text" value="<?= $_SESSION['matricula'] ?>" readonly>

						<input required id="input-cargo-port" readonly type="text" value="<?= $_SESSION['cargo'] ?>" name="cargo_doc_port" spellcheck="true">

					</div>
					<input required name="gremista_registro_port" type="text" hidden value="<?= $_SESSION['login'] ?>">

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

<script>
			CKEDITOR.replace('input-texto-port');
			
		</script>

		<?php
		include_once(SITE_ROOT . "funcs/footer.php");
	}
		?>

		
