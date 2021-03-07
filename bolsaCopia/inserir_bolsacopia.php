	<?php
	include_once("../conexao.php");
	
	$nome_bc = filter_input(INPUT_POST, 'nome_bc', FILTER_SANITIZE_STRING);
	$matricula_bc = filter_input(INPUT_POST, 'matricula_bc', FILTER_SANITIZE_STRING);
	$laudas_bc = filter_input(INPUT_POST, 'laudas_bc', FILTER_SANITIZE_NUMBER_FLOAT);
	
	

	


	$resultado_insert = "INSERT INTO bolsacopia (nome_bc, matricula_bc, laudas_bc,ultima_data_bc) 
	VALUES ('$nome_bc', '$matricula_bc', '$laudas_bc', NOW())";
	// 
	$resultado_insert_bc = mysqli_query($conn, $resultado_insert);
	header("location:cadastrar_bolsaCopia.php?sucesso=1");
	

	 ?>