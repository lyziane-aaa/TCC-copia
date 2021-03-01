<html lang="pt-br">

<head>

	<meta charset="utf-8">


	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gerar Novo Ofício</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../../_css/documentos.css">
	<link rel="stylesheet" type="text/css" href="../../../_css/listar.css">
	<link rel="stylesheet" type="text/css" href="../../../_css/estilo.css">


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
	include_once("../../../Funcs/numdoc.php");





	if ($_SESSION['login'] != null) {
		$login = $_SESSION['login'];

		$titulo_doc_ofc = numdoc("ofc",$_SESSION['cargo']);
		$num_doc_ofc = extrair('ofc',$titulo_doc_ofc);
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
				<form action="inserirDocOfc.php" method="POST">
					<!--<div id="gestao_doc_ofc">
						<input id ="input-gestao" type="text" placeholder="Gestão 2019.2021 - IF Para Tempos de Guerra" name="gestao_doc_ofc" required>
					</div>
-->

					<div id="numeracaoOficio">

					<input readonly name="titulo_doc_ofc" id="input-numeracaoOficio" type="text" value="<?php echo $titulo_doc_ofc;?>" placeholder="OFÍCIO <ANO>.<NÚMERO>/<SIGLA DA DIRETORIA>/GEVP"  required>
						<input readonly hidden name="num_doc_ofc"  type="text" value="<?php echo $num_doc_ofc?>"   required>
					
					</div>


					<div id="dataOficio">
						<input id="input-dataOficio" value="<cidade>, <?php setlocale(LC_TIME, 'portuguese');
        date_default_timezone_set('America/Fortaleza'); $data = date('d-m-Y'); $data = strftime("%d de %B de %Y", strtotime($data)); echo "$data.";?>" type="text" placeholder="<Local>, <dia> de <mês> de <ano>." name="data_doc_ofc" required>
					</div>

					<div id="enderecamentoOficio">
						<textarea wrap="hard" required name="endrc_doc_ofc" id="input-enderecamentoOficio" spellcheck="true"></textarea>
					</div>


					<div id="assuntoOficio">
						<input readonly="true" type="text" value="Assunto: " id="input-assuntoOficioB">
						<input required id="input-assuntoOficio" type="text" placeholder="<Breve resumo do que será tratado no corpo do texto>" name="assunto_doc_ofc" spellcheck="true">

					</div>

					<div id="corpoOficio">



						<textarea required id="input-corpoOficio" type="text" placeholder="Texto do ofício" name="corpo_doc_ofc" spellcheck="true"></textarea>
					</div>

					<div id="fechoOficio">
						<input required id="input-fechoOficio" type="text" placeholder="<Atenciosamente>," name="fecho_doc_ofc" spellcheck="true">


					</div>

					<div id="assinaturaOficio">
						<input required id="input-assinaturaOficio" type="text" placeholder="<NOME DO GREMISTA>" value="<?php echo strtoupper($_SESSION['nome_usuarios']) ?>" name="assinatura_doc_ofc" readonly>

					</div>

					<div id="cargoOficio">
						<input name="matricula_doc_ofc" id="input-matricula_doc_ofc" type="text" value="<?php echo $_SESSION['matricula'] ?>"readonly>
						<input required id="input-cargoOficio" readonly type="text" value="<?php echo $_SESSION['cargo'] ?>" name="cargo_doc_ofc" spellcheck="true">

					</div>
					<input required name="gremista_registro_ofc" type="text" hidden value="<?php echo $_SESSION['login'] ?>">

					<div class="card border-danger mb-3" style="min-width:12rem;max-width: 18rem;" id="input-cardOfc">

						<div class="card-body text-danger">
							<h5 class="card-title">Salvar ofíco</h5>
							<p class="card-text">Terminou o ofício?</p>
							<input type="submit" class="btn btn-danger" value="Salvar Ofício">
						</div>
					</div>

			</div>
			</form>


		<?php
		
	}include_once("../../../footer.php");
		?>
		</div><!-- fim div #interface-->
		<!--
	<script src="../../../ckeditor/ckeditor5/webpack.config.js">
		Editor.create(document.getElementById('input-corpoOficio'));
		</script>	-->
		<script src="../../../ckeditor/ckeditor/ckeditor.js" charset="utf-8"></script><!-- Arquivos para o editor de texto opensource CKEditor-->
		<script src="../../../ckeditor/ckfinder/ckfinder.js"></script>
		<script src="../../../ckeditor/js/javascript.js"></script>
		<script>
			// Replace the <textarea id="editor1"> with a CKEditor 4
			// instance, using default configuration.

			CKEDITOR.replace('input-corpoOficio');

			CKEDITOR.config.width = '166mm';
			CKEDITOR.config.height = '80mm';
		</script>
 <?php
	include_once("../../../footer.php");
 ?>
</body>
</html>