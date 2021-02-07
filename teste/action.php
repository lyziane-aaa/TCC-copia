<?php

//action.php

include('../conexao.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':nome'  => $_POST['nome'],
  ':matricula'  => $_POST['matricula'],
  ':laudas'   => $_POST['laudas'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE bolsacopia 
 SET nomeBC = :nome, 
 matriculaBC = :matricula, 
 laudasBC = :laudas 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM bolsacopia 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>