<?php
	session_start();
	include_once("../SITE_ROOT . "funcs/conexao.php");.php");
		
	$titulo_doc_port = filter_input(INPUT_POST, 'titulo_doc_port', FILTER_SANITIZE_STRING);
	$num_doc_port = filter_input(INPUT_POST, 'num_doc_port', FILTER_SANITIZE_STRING);
	$resumo_doc_port = filter_input(INPUT_POST, 'resumo_doc_port', FILTER_SANITIZE_STRING);	
	$texto_doc_port = filter_input(INPUT_POST, 'texto_doc_port');
	
	$autor_doc_port = strtoupper($_SESSION['nome_usuarios']);
	$cargo_doc_port = $_SESSION['cargo'];
	$gremista_registro_port = $_SESSION['login'];


	$resultado_insert = "INSERT INTO documentos_port (num_doc_port,titulo_doc_port,resumo_doc_port,
		texto_doc_port,autor_doc_port, cargo_doc_port,data_registro_port,gremista_registro_port) 
	VALUES ('$num_doc_port', '$titulo_doc_port','$resumo_doc_port','$texto_doc_port',
	'$autor_doc_port', '$cargo_doc_port',NOW(),'$gremista_registro_port')";
	// 
	$resultado_insertBC = mysqli_query($conn, $resultado_insert) or die("erro " . mysqli_error($conn));

	header ("location: /TCC/documentos/interno/listar_documentos.php?sucesso=1");
	

	 
