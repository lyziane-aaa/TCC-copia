	<?php
	include_once("../funcs/conexao.php");
	
	$nomebimestreBC = filter_input(INPUT_POST, 'nomebimestreBC', FILTER_SANITIZE_STRING);
	$bimestreinicioBC = filter_input(INPUT_POST, 'bimestreinicioBC',FILTER_SANITIZE_STRING);
	$bimestrefimBC = filter_input(INPUT_POST, 'bimestrefimBC',FILTER_SANITIZE_STRING);
	$registroBimestreBC =  filter_input(INPUT_POST, 'gremistaRegistrouBC',FILTER_SANITIZE_STRING);
	

	echo $nomebimestreBC;
	echo $bimestreinicioBC;
	echo $bimestrefimBC;
	exit;

	$resultado_insert = "INSERT INTO bimestrebc (nomebimestreBC, bimestreinicioBC,bimestrefimBC,registroBimestreBC) 
	VALUES ('$nomebimestreBC', '$bimestreinicioBC', '$bimestrefimBC', NOW())";
	// 
	$resultado_insertBC = mysqli_query($conn, $resultado_insert) or die ("Erro ao tentar cadastrar registro:  ". mysqli_error($conn));
	
	//header("location:listarBolsaCopia.php");
	
	

	
	
	
	

	 ?>