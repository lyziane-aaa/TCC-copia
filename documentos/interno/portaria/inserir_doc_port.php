<?php
	session_start();
	include_once("../../../conexao.php");
	
	
	// 
	
	
	
	$titulo_doc_port = filter_input(INPUT_POST, 'titulo_doc_port', FILTER_SANITIZE_STRING);
	$resumo_doc_port = filter_input(INPUT_POST, 'resumo_doc_port', FILTER_SANITIZE_STRING);	
	$texto_doc_port = filter_input(INPUT_POST, 'texto_doc_port', FILTER_SANITIZE_STRING);
	$fecho_doc_port = filter_input(INPUT_POST,'fecho_doc_port');
	$assinatura_doc_port = $_SESSION['nome_usuarios'];
	$cargo_doc_port = $_SESSION['cargo'];
	$gremista_registro_port = $_SESSION['login'];
	
	$consulta_cargo = "SELECT id_diretoria from usuarios_diretoria where cargo_diretoria = '$cargo_doc_port'";
	$resultado_cargo= mysqli_query($conn, $consulta_cargo) or die("erro " . mysqli_error($conn));
	$resultado_cargo = mysqli_fetch_array($resultado_cargo); // Pega o ID do Array e transforma em int
	$resultado_cargo = $resultado_cargo['id_diretoria'];

	
		
	$consulta_usuario = "Select id_usuarios from usuarios where nome_usuarios = '$assinatura_doc_port'";
	
	
	$resultado_usuario= mysqli_query($conn, $consulta_usuario) or die("erro " . mysqli_error($conn));
	$resultado_usuario= mysqli_fetch_array($resultado_usuario); // Pega o ID do Array e transforma em int
	$resultado_usuario = $resultado_usuario['id_usuarios'];
	

	$resultado_insert = "INSERT INTO documentos_port (titulo_doc_port,resumo_doc_port,
		texto_doc_port,fecho_doc_port,assinatura_doc_port, cargo_doc_port,data_doc_port,gremista_doc_port) 
	VALUES ('$titulo_doc_port','$resumo_doc_port','$texto_doc_port','$fecho_doc_port',
	'$resultado_usuario', '$resultado_cargo ',NOW(),'$gremista_registro_port')";
	// 
	$resultado_insertBC = mysqli_query($conn, $resultado_insert) or die("erro " . mysqli_error($conn));

	header ("location: /TCC/documentos/interno/oficio/listar_documentos.php");
	

	 
