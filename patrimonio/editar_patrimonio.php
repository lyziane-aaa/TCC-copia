<?php
session_start();
include_once("../funcs/conexao.php");
$idPat = filter_input(INPUT_GET, 'idPat', FILTER_SANITIZE_NUMBER_INT);
// $resultado_select  = "SELECT id,nome,nivel FROM log WHERE id = '$id'";
$resultado_select  = "SELECT * FROM patrimonioativo WHERE idPat = '$idPat'";
$resultado_cliente = mysqli_query($conn, $resultado_select);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Patrimônio</title>	
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
	<?php

 include("../funcs/menu.php"); 
 include_once("../funcs/conexao.php");

$idPat = filter_input(INPUT_POST, 'idPat', FILTER_SANITIZE_NUMBER_INT);
$nomePat = filter_input(INPUT_POST, 'nomePat', FILTER_SANITIZE_STRING);
$codBarrasPat = filter_input(INPUT_POST, 'codBarrasPat', FILTER_SANITIZE_STRING);
$obtencaoPat = filter_input(INPUT_POST, 'obtencaoPat', FILTER_SANITIZE_STRING);
$custoObt = filter_input(INPUT_POST, 'custoObt', FILTER_SANITIZE_NUMBER_FLOAT);
$obsPat = filter_input(INPUT_POST, 'obsPat', FILTER_SANITIZE_STRING);
//aqui tenho a minha query. Minha variável recebe a query de alterar 
$resultado_update = "UPDATE patrimonioativo SET nomePat='$nomePat',codBarrasPat ='$codBarrasPat',obtencaoPat='$obtencaoPat', custoObt ='$custoObt', obsPat = '$obsPat' WHERE idPat='$idPat'";
$resultado_cliente = mysqli_query($conn, $resultado_update);

//altero através do id, que é único
	//header("Location: editarPatrimonio.php?id=$id");
?>

	
		<h1>Editar Propriedades de Patrimônio</h1>
		<!-- estou enviando as informações para a página para alterar clientes -->
		<form method="POST" action="">
			<p>
			<input type="hidden" name="idPat" value="<?php echo $row_cliente ['idPat']; ?>">
			</p>
			<label>Nome do objeto: </label>
			<input type="text" name="nomePat" value="<?php echo $row_cliente ['nomePat']; ?>"><br><br>
			
			<label>Código de Barras do objeto: </label>
				<input type="text" name="codBarrasPat"  value="<?php echo $row_cliente ['codBarrasPat']; ?>"><br><br>
			
			<label>Modo de Obtenção do Objeto: </label>
				<select>
					<option value="Compra">Compra</option>
					<option value="Doação">Doação</option>
				</select>
				<br><br>

			<label>Custo de Aquisição do Objeto: </label>
				<input type="number" name="custoObt" value="<?php echo $row_cliente ['custoObt']; ?>" onKeyPress="return Onlynumbers(event);" >
				<br><br>
			
			<label>Observações: </label>
				<textarea type = "text" name = "obsPat" required = "false" maxlength="800"> </textarea>
				<br>

			<input type="submit" value="Alterar">
			<a href="listarPatrimonio.php"><input type="button" value="Voltar"></a>
			
		</form>
		<?php
	//include ("listarPatrimonio.php");
	

	?>
	</body>
</html>