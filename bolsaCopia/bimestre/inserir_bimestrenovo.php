	<?php
	include_once(""../../conexao.php");
	
	$nome_bim_bc = filter_input(INPUT_POST, 'nome_bim_bc', FILTER_SANITIZE_STRING);
	$bimestreinicio_bim_bc = filter_input(INPUT_POST, 'bimestreinicio_bim_bc');
	$bimestrefim_bim_bc = filter_input(INPUT_POST, 'bimestrefim_bim_bc');
	$gremista_registrou_bim_bc = filter_input(INPUT_POST, 'gremista_registrou_bim_bc',FILTER_SANITIZE_STRING);
	$bimestre_vigor_bim_bc = filter_input(INPUT_POST, 'bimestre_vigor_bim_bc');
	
	

	$resultado_insert = "INSERT INTO bimestrebc (nome_bim_bc, bimestreinicio_bim_bc,bimestrefim_bim_bc,bimestre_vigor_bim_bc,registro_bimestre_bim_bc,gremista_registrou_bim_bc) 
	VALUES ('$nome_bim_bc', '$bimestreinicio_bim_bc', '$bimestrefim_bim_bc','$bimestre_vigor_bim_bc', NOW(), '$gremista_registrou_bim_bc')";
	// 
	$resultado_insertBC = mysqli_query($conn, $resultado_insert) or die ("Erro ao tentar cadastrar registro:  ". mysqli_error($conn));
	
	header("location:../listar_bolsacopia.php?sucesso=4");
	
	

	
	
	
	

	 ?>