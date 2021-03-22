<?php
include("../../../funcs/conexao.php");
session_start();

if ($_SESSION['nivel'] >=1) {
	
	$id_doc_ofc = filter_input(INPUT_POST, 'id_doc_ofc', FILTER_SANITIZE_NUMBER_INT);
	//verifica se o o ofício foi feito pela pessoa que está solicitando
	$sql = "SELECT * from documentos_ofc WHERE id_doc_ofc = '$id_doc_ofc'";
		$r = mysqli_query($conn, $sql);
		$res = mysqli_fetch_assoc($r);

		if (empty($id_doc_ofc) || $_SESSION['nome_usuarios'] != $res['autor_doc_ofc']) {
			header("Location: gerar_oficio.php");
		}



	$titulo_doc_ofc = filter_input(INPUT_POST, 'titulo_doc_ofc', FILTER_SANITIZE_STRING);
	$num_doc_ofc = filter_input(INPUT_POST, 'num_doc_ofc', FILTER_SANITIZE_STRING);
	$data_doc_ofc = filter_input(INPUT_POST, 'data_doc_ofc', FILTER_SANITIZE_STRING);	
	$endrc_doc_ofc = filter_input(INPUT_POST, 'endrc_doc_ofc',FILTER_SANITIZE_STRING);
	$assunto_doc_ofc = filter_input(INPUT_POST, 'assunto_doc_ofc', FILTER_SANITIZE_STRING);
	$corpo_doc_ofc = $_POST['corpo_doc_ofc'];
	$fecho_doc_ofc = filter_input(INPUT_POST, 'fecho_doc_ofc', FILTER_SANITIZE_STRING);
	$autor_doc_ofc = filter_input(INPUT_POST, 'autor_doc_ofc', FILTER_SANITIZE_STRING);
	$matricula_doc_ofc = filter_input(INPUT_POST, 'matricula_doc_ofc', FILTER_SANITIZE_STRING);
	$cargo_doc_ofc = filter_input(INPUT_POST, 'cargo_doc_ofc', FILTER_SANITIZE_STRING);
	$data_registro_ofc = filter_input(INPUT_POST, 'data_registro_ofc', FILTER_SANITIZE_STRING);
	$gremista_registro_ofc = filter_input(INPUT_POST, 'gremista_registro_ofc', FILTER_SANITIZE_STRING);

	
	
	

	$resultado_update = "UPDATE documentos_ofc SET titulo_doc_ofc = '$titulo_doc_ofc' , num_doc_ofc = '$num_doc_ofc' , data_doc_ofc = '$data_doc_ofc',
	endrc_doc_ofc = '$endrc_doc_ofc', assunto_doc_ofc = '$assunto_doc_ofc',corpo_doc_ofc = '$corpo_doc_ofc',
	fecho_doc_ofc = '$fecho_doc_ofc',autor_doc_ofc = '$autor_doc_ofc',matricula_doc_ofc = '$matricula_doc_ofc', 
	cargo_doc_ofc ='$cargo_doc_ofc',data_update = NOW(), gremista_registro_ofc = '$gremista_registro_ofc' WHERE id_doc_ofc = '$id_doc_ofc'";
	// 
	$resultado_update = mysqli_query($conn, $resultado_update) or die("erro " . mysqli_error($conn));
}
	header ("Location: gerar_oficio.php?sucesso=1");
	

	 
