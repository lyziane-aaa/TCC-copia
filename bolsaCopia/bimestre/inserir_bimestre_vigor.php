	<?php
	session_start();
	include_once("../../conexao.php");

	$bimestre_vigor_bim_bc = filter_input(INPUT_POST, 'bimestre_vigor_bim_bc');

	$resultado_insertA = "UPDATE bimestrebc SET  bimestre_vigor_bim_bc = 0";
	$resultado_insertBCA = mysqli_query($conn, $resultado_insertA) or die ("Erro ao tentar cadastrar registro:  ". mysqli_error($conn));
	$resultado_insertB = "UPDATE bimestrebc SET  bimestre_vigor_bim_bc = '1', 	bimestre_vigor_data_bim_bc = NOW() WHERE id_bim_bc='$bimestre_vigor_bim_bc'";
	$resultado_insertBCB = mysqli_query($conn, $resultado_insertB) or die ("Erro ao tentar cadastrar registro:  ". mysqli_error($conn));
	
	$truncate_bolsacopiaB = "TRUNCATE TABLE bolsacopia";
	$truncate_bolsacopiaB = mysqli_query($conn, $truncate_bolsacopiaB) or die ("Erro ao tentar cadastrar registro:  ". mysqli_error($conn));

	header('location: ../listar_bolsacopia.php');



	?>