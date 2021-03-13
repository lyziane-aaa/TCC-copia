<?php include_once("../../../funcs/header.php"); ?>

	<title>Nova Ata</title>





</head>

<body class="bg-dark">
	<?php

include_once(SITE_ROOT . "/funcs/menu.php");

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
			<div class="divoficio" id="fundo_doc_ata">
				<!-- div de exibição do bimestre-->
				<form action="inserir_doc_ata.php" method="POST" enctype="multipart/form-data">
					<!--<div id="gestao_doc_ofc">
						<input id ="input-gestao" type="text" placeholder="Gestão 2019.2021 - IF Para Tempos de Guerra" name="gestao_doc_ofc" required>
					</div>-->


					<div id="titulo_doc_ata">
						<input name="num_doc_ata" required id="input-num_doc_ata" type="text" placeholder="<NOME DO GREMISTA>" value="<?php echo "Ata nº ". numdoc("ata", $_SESSION['cargo']); ?>" readonly>
					</div>
					<div id="data_doc_ata">
						<input name="data_reuniao_doc_ata" class="input-data_doc_ata" type="text" placeholder="Mossoró, 08 de maio de 2021.">
						<input name="local_doc_ata" class="input-data_doc_ata" type="text" placeholder="Plataforma Virtual Google Meet">
						<input name="horario_doc_ata" class="input-data_doc_ata" type="text" placeholder="15h às 18h35">
					</div>

					<div id="convoc_doc_ata">
						<input name="convoc_doc_ata" id="input-convoc_doc_ata" type="text" placeholder="<Nome Complete>, <Cargo>">
						<select name="sec_doc_ata" class="select-convoc_doc_ata">
							<option value="Deliberativa" selected="selected">Deliberativa</option>
							<option value="Informativa">Informativa</option>
						</select>
						<input name="data_doc_ata" id="input-sec_doc_ata" type="text" placeholder="Karydja França, Presidente do Grêmio">
					</div>

					<div id="pautas_doc_ata">
						<textarea name="pautas_doc_ata" required id="input-pautas_doc_ata" type="text" spellcheck="true" placeholder="1. <nome da pauta>;       2. <nome da pauta>;"></textarea>
					</div>
					<div id="enc_doc_ata">
						<textarea name="enc_doc_ata" required id="input-enc_doc_ata" type="text" spellcheck="true" placeholder='1. <nome do encaminhamento>; &#10Prazo: <prazo> &#10Responsável(eis): &#10Exemplo: 1. Reunir-se com a DIAC;&#10Prazo: até 15/02/2021;&#10Responsável(eis): Marcos Batista de Souza.'></textarea> </textarea>
					</div>
					<div id="presentes_doc_ata">
						<textarea name="presentes_doc_ata" required id="input-presentes_doc_ata" type="text" spellcheck="true" placeholder='1. <nome completo> - <instância> - <matrícula> - <e-mail>; &#10Exemplo:&#10 1. Eduardo Marinho de Paiva - DIAES/GEVP - 201710240100025 - email@email.com;&#10 2. Lucas Felipe Carlos do Nascimento -  REGIF - 20171024010009 - email@email.com;'></textarea> </textarea>
					</div>
			</div>
			<!--fim div da primeira página-->
			<div class='divoficio' id="fundo_doc_ata_dois">
				<div id="texto_doc_ata">
					<input readonly value="Ata de " type="text" style = "width: 13mm; font-size:15; margin-left:20mm">
					<select name="orgao_doc_ata" style = "font-size:15">
						<option value="CRT">Reunião do CRT</option>
						<option value="CRC">Reunião do CRC</option>
						<option value="Gestão do GEVP"> Reunião de Gestão</option>
						<option value="Gestão do câmpus">Reunião com a Gestão do câmpus</option>
						<option value="Reunião Externa">Reunião externa</option>
					</select>
					<select name="titulo_doc_ata" style = "font-size:15">
						<option value="Ordinária"> Ordinária </option>
						<option value="Extrardinária"> Extraordinária </option>
					</select>
					<textarea name="corpo_doc_ata" required id="input-texto_doc_ata" type="text" spellcheck="true"></textarea>
				</div>
				<div id="autor_doc_ata">
					<input name="autor_doc_ata" required id="input-autor_doc_ata" type="text" placeholder="<NOME DO GREMISTA>" value="<?php echo strtoupper($_SESSION['nome_usuarios']); ?>" readonly>
				</div>
				<div id="matricula_doc_ata">
					<input name="matricula_doc_ata" id="input-matricula_doc_ata" type="text" value="<?php echo $_SESSION['matricula'] ?>" readonly>
				</div>
				<div id="cargo_doc_ata">
					<input required id="input-cargo_doc_ata" readonly type="text" value="<?php echo $_SESSION['cargo'] ?>" name="cargo_doc_ata" spellcheck="true">


				</div>
				<div style="margin-left:30mm">
					<label for="assinaturas_doc_ata" style='color: black; font-weight: bold;'> Anexo da Lista de Assinaturas:</label>
					<input name="assinaturas_doc_ata" type="file" required="true" class="form-control">
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
		<?php
	}
	include_once(SITE_ROOT . "funcs/footer.php");
	?>
		


		
		<script>
			CKEDITOR.replace('input-texto_doc_ata');

			CKEDITOR.config.width = '158mm';
			CKEDITOR.config.height = '138mm';
		</script>

</body>

</html>