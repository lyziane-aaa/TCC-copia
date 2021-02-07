<?php
session_start();
include_once("../conexao.php");
$idBC = filter_input(INPUT_GET, 'idBC', FILTER_SANITIZE_NUMBER_INT);
// $resultado_select  = "SELECT id,nome,nivel FROM log WHERE id = '$id'";
$resultado_select  = "SELECT * FROM bolsacopia WHERE idBC = '$idBC'";
$resultado_BC = mysqli_query($conn, $resultado_select);
$row_BC = mysqli_fetch_assoc($resultado_BC);
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Buscar Bolsa Cópia</title>		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel = "stylesheet" type = "text/css" href = "../_css/estilo.css">
		<title>Editar Bolsa Copia</title>	
<link rel="stylesheet" href="../_css/estilo.css"  type="text/css"/>	
<script>
function Onlynumbers(e)
{
	var tecla=new Number();
	if(window.event) {
		tecla = e.keyCode;
	}
	else if(e.which) {
		tecla = e.which;
	}
	else {
		return true;
	}
	if((tecla >= "97") && (tecla <= "122")){
		return false;
	}
}
 </script>	
	</head>
	<body>
	<?php

 include("../menu.php"); 
 include_once("../conexao.php");

$nomeBC = filter_input(INPUT_POST, 'nomeBC', FILTER_SANITIZE_STRING);
$matriculaBC = filter_input(INPUT_POST, 'matriculaBC', FILTER_SANITIZE_STRING);
$laudasAdicionar = filter_input(INPUT_POST, 'laudasAdicionarBC', FILTER_SANITIZE_NUMBER_FLOAT);
$laudasBC = $row_BC ['laudasBC'];



$laudasNovo = $laudasAdicionar + $laudasBC;
if ($laudasNovo <= 20) {
	$resultado_update = "UPDATE bolsacopia SET laudasBC = '$laudasNovo', ultimaDataBC = now() WHERE idBC = '$idBC' ";
	$resultado_updateBC = mysqli_query($conn, $resultado_update);
		//header("Location: editarPatrimonio.php?id=$id");
	
}else {
	echo "Algo de errado não está certo.";
}


 

?>

	<br>
		<fieldset><legend><h2>Adicionar novas laudas</h2></legend>
				<!-- estou enviando as informações para a página para alterar"//"-->
				<form method="POST" action="">
					<p>
					<input type="hidden" name="idBC" value="<?= $row_BC ['idBC']; ?>" >
					</p>
					<label>Nome </label>
					<input type="text" name="nomeBC" value= "<?=$row_BC ['nomeBC']; ?>" readOnly="true"><br><br>
					
					<label>Matrícula </label>
						<input type="text" name="matriculaBC" maxlength="20" value="<?= $row_BC ['matriculaBC']; ?>" readOnly="true" ><br><br>
					
					<label>Laudas </label>
						<input type="number" name="laudasBC" value="<?=$row_BC ['laudasBC']; ?>" onKeyPress="return Onlynumbers(event);" max = "20" min = "0" readOnly="true">
					
						<br><br><label>Laudas a adicionar </label>
					<input type="number" name="laudasAdicionarBC"  onKeyPress="return Onlynumbers(event);" max = "20" min = "0" >
					
					
					<input type="submit" value="Alterar">
					<a href="listarBolsaCopia.php"><input type="button" value="Voltar"></a>
				
				</form>


				<br> 
			</fieldset>

		
	
	

	</body>
</html>