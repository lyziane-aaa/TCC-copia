<?php
	include_once("../../../conexao.php");
	
	
	
	$num_doc_ofc = filter_input(INPUT_POST, 'num_doc_ofc', FILTER_SANITIZE_STRING);
	$data_doc_ofc = filter_input(INPUT_POST, 'data_doc_ofc', FILTER_SANITIZE_STRING);	
	$endrc_doc_ofc = filter_input(INPUT_POST, 'endrc_doc_ofc',FILTER_SANITIZE_STRING);
	
	$assunto_doc_ofc = filter_input(INPUT_POST, 'assunto_doc_ofc', FILTER_SANITIZE_STRING);
	$corpo_doc_ofc = $_POST['corpo_doc_ofc'];
	$fecho_doc_ofc = filter_input(INPUT_POST, 'fecho_doc_ofc', FILTER_SANITIZE_STRING);
	$assinatura_doc_ofc = strtoupper(filter_input(INPUT_POST, 'assinatura_doc_ofc', FILTER_SANITIZE_STRING));
	$cargo_doc_ofc = filter_input(INPUT_POST, 'cargo_doc_ofc', FILTER_SANITIZE_STRING);
	$data_registro_ofc = filter_input(INPUT_POST, 'data_registro_ofc', FILTER_SANITIZE_STRING);
	$gremista_registro_ofc = filter_input(INPUT_POST, 'gremista_registro_ofc', FILTER_SANITIZE_STRING);

	$titulo_doc_ofc = "$num_doc_ofc: $assunto_doc_ofc"; // o T�tulo do Documento � a jun��o de $num_doc_ofc:$assunto_doc_ofc
	
	

	$resultado_insert = "INSERT INTO documentos_ofc (titulo_doc_ofc,num_doc_ofc,data_doc_ofc,endrc_doc_ofc,assunto_doc_ofc,corpo_doc_ofc,fecho_doc_ofc,assinatura_doc_ofc, cargo_doc_ofc,data_registro_ofc,gremista_registro_ofc) 
	VALUES ('$titulo_doc_ofc','$num_doc_ofc','$data_doc_ofc','$endrc_doc_ofc','$assunto_doc_ofc','$corpo_doc_ofc','$fecho_doc_ofc','$assinatura_doc_ofc', '$cargo_doc_ofc',NOW(),'$gremista_registro_ofc')";
	// 
	$resultado_insertBC = mysqli_query($conn, $resultado_insert);

	header ("location:../../documentos/interno/cadastrarOficio.php");
	

	 