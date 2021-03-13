	<?php
		include_once("../funcs/conexao.php");
		$nome_bc = filter_input(INPUT_POST, 'nome_bc', FILTER_SANITIZE_STRING);
		$matricula_bc = filter_input(INPUT_POST, 'matricula_bc', FILTER_SANITIZE_STRING);
		$laudas_bc = filter_input(INPUT_POST, 'laudas_bc', FILTER_SANITIZE_NUMBER_FLOAT);
		$pagina = filter_input(INPUT_POST,'pagina', FILTER_SANITIZE_STRING);
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_FLOAT);
	
		if($pagina == "listar"){
			$resultado_insert = "UPDATE bolsacopia SET nome_bc = '$nome_bc', matricula_bc = '$matricula_bc', laudas_bc = '$laudas_bc' WHERE id_bc= '$id' ";
			$resultado_insert_bc = mysqli_query($conn, $resultado_insert);
			header("location:listar_bolsacopia.php?sucesso=3");
		}

		else{
			$resultado_insert = "INSERT INTO bolsacopia (nome_bc, matricula_bc, laudas_bc,ultima_data_bc) 
			VALUES ('$nome_bc', '$matricula_bc', '$laudas_bc', NOW())";
			$resultado_insert_bc = mysqli_query($conn, $resultado_insert);
			header("location:cadastrar_bolsacopia.php?sucesso=1");
		}

	?>