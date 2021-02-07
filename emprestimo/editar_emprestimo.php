<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// $resultado_select  = "SELECT id,nome,nivel FROM log WHERE id = '$id'";
$resultado_select  = "SELECT * FROM emprestimos WHERE idEmp = '$id'";
$resultado_cliente = mysqli_query($conn, $resultado_select);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Empréstimos</title>	
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

 include("../menu.php"); 
 include_once("../conexao.php");
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nomeObjeto = filter_input(INPUT_POST, 'nomeDoObjeto', FILTER_SANITIZE_STRING);
$disponibilidade = filter_input(INPUT_POST, 'disponibilidade', FILTER_SANITIZE_STRING);
$Qemprestou = filter_input(INPUT_POST, 'quemEmprestou', FILTER_SANITIZE_STRING);
$AQemprestou = filter_input(INPUT_POST, 'aQuemEmprestou', FILTER_SANITIZE_STRING);
$resultado_update = "UPDATE emprestimos SET nomeDoObjeto='$nomeObjeto',disponibilidade ='$disponibilidade',quemEmprestou='$Qemprestou', aQuemEmprestou ='$AQemprestou' WHERE idEmp ='$id'";
$resultado_cliente = mysqli_query($conn, $resultado_update);

//altero através do id, que é único
	//header("Location: editarPatrimonio.php?id=$id");
?>

	
		<h1>Editar Empréstimo</h1>
		<!-- estou enviando as informações para a página para alterar clientes -->
		<form method="POST" action="">
			<p>
			<input type="hidden" name="id" value="<?php echo $row_cliente ['idEmp']; ?>">
			</p>
			<label for="nomeDoObjeto">Nome do objeto </label><input type="text" maxlength="40" name="nomeDoObjeto" placeholder = "Digite o nome do objeto" required value="<?php echo $row_cliente ['nomeDoObjeto']; ?>">
	 			<br> <br>
	 			<label>Disponibilidade: </label>
				<select name="disponibilidade" >
					<option value="Disponivel" selected>Disponivel</option >
					<option value="Emprestado">Emprestado</option>
				</select>
	 			<br> <br>
	 			<label for="quemEmprestou">Quem Emprestou: </label><input type="text" name="quemEmprestou" value="<?php echo $row_cliente ['quemEmprestou']; ?>">
	 			<br> <br>
	 			<label for="aQuemEmprestou">A Quem Emprestou: </label> <input type="text" name="aQuemEmprestou" value="<?php echo $row_cliente ['aQuemEmprestou']; ?>">
	 			<br> <br>

			<input type="submit" value="Alterar">
			<a href="listarEmp.php"><input type="button" value="Voltar"></a>
			
		</form>
		<?php
	include ("listarEmp.php");
	

	?>
	</body>
</html>