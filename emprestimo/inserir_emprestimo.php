	<?php 
	session_start();
	 include_once("../conexao.php");	

		$nome_emp = filter_input(INPUT_POST, 'nome_emp', FILTER_SANITIZE_STRING);
		$disp_emp = filter_input(INPUT_POST, 'disp_emp', FILTER_SANITIZE_STRING);
		$quem_emprestou = filter_input(INPUT_POST, 'quem_emprestou', FILTER_SANITIZE_STRING);
		$a_quem_emprestou = filter_input(INPUT_POST, 'a_quem_emprestou', FILTER_SANITIZE_STRING);
		$matricula_emp = filter_input(INPUT_POST, 'matricula_emp', FILTER_SANITIZE_STRING);

	$resultado_insert = "INSERT INTO emprestimos (nome_emp,disp_emp,quem_emprestou,a_quem_emprestou,matricula_emp) 
	VALUES ('$nome_emp','$disp_emp','$quem_emprestou','$a_quem_emprestou','$matricula_emp')";

		$resultado_insertEmp = mysqli_query($conn, $resultado_insert) or die ("erro " . mysqli_error($conn));





	//	$resultado_insertEmp = mysqli_query($conn, $resultado_insert);
		header('location: cadastrar_emprestimo.php');
 ?>