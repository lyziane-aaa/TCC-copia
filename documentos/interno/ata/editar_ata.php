<?php include_once("../../../funcs/header.php"); ?>

<title>Editar Ata</title>





</head>

<body class="bg-dark">
	<?php


	if ($_SESSION['login'] != null) {

		$login = $_SESSION['login'];

		$id_doc_ata = filter_input(INPUT_GET, 'id_doc_ata', FILTER_SANITIZE_NUMBER_INT);
		$sql = "SELECT * from documentos_ata WHERE id_doc_ata = '$id_doc_ata'";
		$r = mysqli_query($conn, $sql);
		$res = mysqli_fetch_assoc($r);

		if (empty($id_doc_ata) || $_SESSION['nome_usuarios'] != $res['autor_doc_ata']) {
			header("Location: gerar_ata.php");
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
			<div class="divoficio" id="fundo_doc_ata">
				<!-- div de exibição do bimestre-->
				<form action="editar_doc_ata.php" method="POST" enctype="multipart/form-data">
				

					<div id="titulo_doc_ata">
						<input name="titulo_doc_ata" required id="input-num_doc_ata" type="text" value="<?= $res['titulo_doc_ata'] ?>" readonly>
						<input name="id_doc_ata" required type="text" value="<?= $res['id_doc_ata'] ?>" hidden readonly>

						<input name="num_doc_ata" required type="text" placeholder="<NOME DO GREMISTA>" value="<?= $res['num_doc_ata'] ?>" hidden readonly>
					</div>
					<div id="data_doc_ata">
						<input name="data_reuniao_doc_ata" value="<?= $res['data_reuniao_doc_ata'] ?>" class="input-data_doc_ata" type="text" placeholder="Mossoró, 08 de maio de 2021." required>
						<input name="local_doc_ata" value="<?= $res['local_doc_ata'] ?>" class="input-data_doc_ata" type="text" placeholder="Plataforma Virtual Google Meet" required>
						<input name="horario_doc_ata" value="<?= $res['horario_doc_ata'] ?>" class="input-data_doc_ata" type="text" placeholder="15h às 18h35" required>
					</div>

					<div id="convoc_doc_ata">
						<input name="convoc_doc_ata" value="<?= $res['convoc_doc_ata'] ?>" id="input-convoc_doc_ata" type="text" placeholder="<Nome Complete>, <Cargo>" required>
						<select name="tipo_doc_ata" class="select-convoc_doc_ata" required>
							<option value="" selected>Selecionar</option>
							<option value="Deliberativa" >Deliberativa</option>
							<option value="Informativa">Informativa</option>
						</select>
						<input name="sec_doc_ata" value="<?= $res['sec_doc_ata'] ?>" id="input-sec_doc_ata" type="text" placeholder="Karydja França, Presidente do Grêmio">
					</div>

					<div id="pautas_doc_ata">
						<textarea name="pautas_doc_ata" required id="input-pautas_doc_ata" type="text" spellcheck="true" placeholder="1. <nome da pauta>;       2. <nome da pauta>;"><?= $res['pautas_doc_ata'] ?></textarea>
					</div>
					<div id="enc_doc_ata">
						<textarea name="enc_doc_ata" required id="input-enc_doc_ata" type="text" spellcheck="true" placeholder='1. <nome do encaminhamento>; &#10Prazo: <prazo> &#10Responsável(eis): &#10Exemplo: 1. Reunir-se com a DIAC;&#10Prazo: até 15/02/2021;&#10Responsável(eis): Marcos Batista de Souza.'><?= $res['enc_doc_ata'] ?></textarea>
					</div>
					<div id="presentes_doc_ata">
						<textarea name="presentes_doc_ata" required id="input-presentes_doc_ata" type="text" spellcheck="true" placeholder='1. <nome completo> - <instância> - <matrícula> - <e-mail>; &#10Exemplo:&#10 1. Eduardo Marinho de Paiva - DIAES/GEVP - 201710240100025 - email@email.com;&#10 2. Lucas Felipe Carlos do Nascimento -  REGIF - 20171024010009 - email@email.com;'><?= $res['presentes_doc_ata'] ?> </textarea>
					</div>
			</div>
			<!--fim div da primeira página-->
			<div class='divoficio' id="fundo_doc_ata_dois">
				<div id="texto_doc_ata">
					<input readonly value="Ata de " type="text" style="width: 13mm; font-size:15; margin-left:20mm">
					<select name="orgao_doc_ata" style="font-size:15" required>
						<option value="" selected>Selecione uma opção</option>
						<option value="CRT">Reunião do CRT</option>
						<option value="CRC">Reunião do CRC</option>
						<option value="Gestão do GEVP"> Reunião de Gestão</option>
						<option value="Gestão do câmpus">Reunião com a Gestão do câmpus</option>
						<option value="Reunião Externa">Reunião externa</option>
					</select>
					<select name="titulo_doc_ata" style="font-size:15">
						<option value="" selected>Selecione uma opção</option>
						<option value="Ordinária"> Ordinária </option>
						<option value="Extrardinária"> Extraordinária </option>
					</select>
					<textarea name="corpo_doc_ata" required id="input-texto_doc_ata" type="text" spellcheck="true"><?= $res['corpo_doc_ata']; ?></textarea>
				</div>
				<div id="autor_doc_ata">
					<input name="autor_doc_ata" required id="input-autor_doc_ata" type="text" placeholder="<NOME DO GREMISTA>" value="<?= $_SESSION['nome_usuarios']; ?>" readonly>
				</div>
				<div id="matricula_doc_ata">
					<input name="matricula_doc_ata" id="input-matricula_doc_ata" type="text" value="<?= $_SESSION['matricula'] ?>" readonly>
				</div>
				<div id="cargo_doc_ata">
					<input required id="input-cargo_doc_ata" readonly type="text" value="<?= $_SESSION['cargo'] ?>" name="cargo_doc_ata" spellcheck="true">


				</div>
				


				<div class="card border-danger mb-3" style="min-width:12rem;max-width: 18rem;" id="input-card_doc_ata">
					<div class="card-body text-danger">
						<h5 class="card-title">Terminou a ata? </h5>
						<p class="card-text">Lembre-se:<br>Documentos só valem após assinados!</p>
						<input type="submit" class="btn btn-danger" value="Salvar ata">
					</div>
				</div>
				</form>
			</div>






		</div><!-- fim div #interface-->
		</div>
		<script>
		CKEDITOR.replace('input-texto_doc_ata');

		CKEDITOR.config.width = '158mm';
		CKEDITOR.config.height = '120mm';
	</script>
	<?php
	}
	include_once(SITE_ROOT . "funcs/footer.php");
	?>

