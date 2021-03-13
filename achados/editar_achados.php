<?php
session_start();
include_once("../funcs/conexao.php");
$idAchados = filter_input(INPUT_GET, 'idAchados', FILTER_SANITIZE_NUMBER_INT);

$resultado_select  = "SELECT * FROM achados WHERE idAchados = '$idAchados'";
$resultado_cliente = mysqli_query($conn, $resultado_select);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar BC</title>	
<link rel="stylesheet" href="../Css/estilo.css"  type="text/css"/>	
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

	<main><?php
	
	 include("../funcs/menu.php"); 
	 
	
	
	
	 $nomeAchados = filter_input(INPUT_POST, 'nomeAchados', FILTER_SANITIZE_STRING);
	 $descricaoAchados = filter_input(INPUT_POST, 'descricaoAchados', FILTER_SANITIZE_STRING);
	 $gremistaRecebeuAchados = filter_input(INPUT_POST, 'gremistaRecebeuAchados', FILTER_SANITIZE_STRING);
	 $quandoAchados = filter_input(INPUT_POST, 'quandoAchados', FILTER_SANITIZE_STRING);
	 $ondeAchados = filter_input(INPUT_POST, 'ondeAchados', FILTER_SANITIZE_STRING);
	 $quemReivindicouAchados = filter_input(INPUT_POST, 'quemReivindicouAchados', FILTER_SANITIZE_STRING);
	 $cpfMatriculaAchados = filter_input(INPUT_POST, 'cpfMatriculaAchados', FILTER_SANITIZE_STRING);
	 $gremistaDevolveuAchados = filter_input(INPUT_POST, 'gremistaDevolveuAchados', FILTER_SANITIZE_STRING);
	 $postadoAchados = filter_input(INPUT_POST, 'postadoAchados', FILTER_SANITIZE_STRING);
	 $statusAchados = filter_input(INPUT_POST, 'statusAchados', FILTER_SANITIZE_STRING);
	 
	 
	$resultado_update = "UPDATE achados SET nomeAchados = '$nomeAchados', descricaoAchados = '$descricaoAchados', gremistaRecebeuAchados = '$gremistaRecebeuAchados',
	 quandoAchados = '$quandoAchados', ondeAchados = '$ondeAchados', quemReivindicouAchados = '$quemReivindicouAchados', cpfMatriculaAchados = '$cpfMatriculaAchados', 
	 gremistaDevolveuAchados = '$gremistaDevolveuAchados', postadoAchados = '$postadoAchados', statusAchados = '$statusAchados' WHERE idAchados= '$idAchados'";
	
	$resultado_updateAchados = mysqli_query($conn, $resultado_update);
		//header("Location: editarPatrimonio.php?id=$id");
	?>
	
		<br>
			<fieldset>
				<legend><h2>Editar Dados do Achados e Perdidos</h2></legend>
					<form method="POST" action="">
					<p>
					<label>Nome do Objeto: </label> 
					<input type="text" name="nomeAchados" required="true" maxlength="30" value= "<?=$row_cliente ['nomeAchados']; ?>">
				</p><br> 
	
				<p> 
					<label for="descAchados">Descrição: </label>
					<textarea type = "text" name = "descricaoAchados" maxlength="800"  ><?=$row_cliente ['descricaoAchados']; ?></textarea> 
				
				</p><br> 
	
				<p>
					<label>Gremista que recebeu: </label> 
					<input type="text" name="gremistaRecebeuAchados" required="true" maxlength="30" value="<?=$row_cliente ['gremistaRecebeuAchados']; ?>">
				</p><br>
	
				<p>
					<label>Quando foi achado: </label> 
					<input type="date" name="quandoAchados" required="true" maxlength="30" value="<?=$row_cliente ['quandoAchados']; ?>">
				</p><br>
	
				<p>
					<label>Onde foi achado: </label> 
					<input type="text" name="ondeAchados" required="true" maxlength="30" value="<?=$row_cliente ['ondeAchados']; ?>">
				</p><br>
	
				<p>
					<label>Quem reivindicou: </label> 
					<input type="text" name="quemReivindicouAchados" required="true" maxlength="30" value="<?=$row_cliente ['quemReivindicouAchados']; ?>">
				</p><br>
	
				<p>
					<label>CPF ou Matrícula de quem reinvindicou: </label> 
					<input type="text" name="cpfMatriculaAchados" required="true" maxlength="30"  value="<?=$row_cliente ['cpfMatriculaAchados']; ?>">
				</p><br>
	
				<p>
					<label>Gremista que devolveu: </label> 
					<input type="text" name="gremistaDevolveuAchados" required="true" maxlength="30" value="<?=$row_cliente ['gremistaDevolveuAchados']; ?>">
				</p><br>
	
				<p><label>Postado: </label> 
									<select name="postadoAchados" >
										<option value="Sim">Sim</option>
										<option value="Não"selected>Não</option>
									</select>
				</p> <br>
	
				<p><label>Situação </label> 
								<select name="statusAchados">
									<option value="Sim">Devolvido</option>
									<option value="Não"selected>Aguardando</option>
									<option value="Incorporado ao patrimônio">Incorporado ao Patrimônio</option>
								</select></p>
					<br>
	
					
						
						<input type="submit" value="Alterar"  a href = "listarAchados.php">
						<a href="listarAchados.php"><input type="button" value="Voltar"></a>
			
					
					</form>
					<br> 
				</fieldset></main>
		
	</body>
</html>