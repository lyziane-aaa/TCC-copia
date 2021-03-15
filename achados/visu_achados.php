<?php
if (isset($_POST)) {
  include_once("../funcs/conexao.php");
  session_start();

  if (isset($_POST["id"]) && isset($_POST["tipo"])) {
    $query = "SELECT * FROM achados WHERE id = '" . $_POST["id"] . "' LIMIT 1";
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado);
    if ($_POST["tipo"] == "img_achados") {

      $resultado = '  

              <div style = "margin: auto !important">
                <img width = "300px" height="300px" src="' . $row["img_achados"] . '" alt="toto">
              </div>   
			 
';
      echo $resultado;
    } //fim if tipo img
    if ($_POST["tipo"] == "editar_achados") {
      echo ' <div class="modal-header">
<h5 class="modal-title" id="imgLabel">' . $row["nome"] . '</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
		<form action="inserir.php" class="cadastro" method="post">
              <h2 class="cad-titulo"> Editar Achados e Perdidos</h2>
              <hr class="divisor">

              <label for="nome-objeto">Nome do Objeto:</label>
              <input type="text" name="nomeAchados" value="' . $row["nome"] . '" required>
              <br>

              <label for="gremista-recebe">Gremista que recebeu:</label>
              <input type="text" name="gremistaRecebeuAchados" value="' . $row["gremista_recebeu"] . '" required>
              <br>

              <label for="quando-achados">Quando foi achado:</label>
              <input type="date" name="quandoAchados" value="' . $row["quando"] . '" required>
              <br>

              <label for="onde-achados">Onde foi achado:</label>
              <input type="text" name="ondeAchados" value="' . $row["onde"] . '" required>
              <br>

              <label for="dados-achados">CPF ou Matrícula de quem Reinvindicou:</label>
              <input type="text" name="cpfMatriculaAchados" onKeyPress="return Onlynumbers(event);" value=" ' . $row["cpf_matricula"] . '" required>
              <br>

              <label for="gremista-devolveu-achados">Gremista que devolveu:</label>
              <input type="text" name="gremistaDevolveuAchados" value=" ' . $row["gremista_devolveu"] . '">
              <br>

              <div>
                <label for="postado" id="post">Postado:</label>
                <select name="postadoAchados">
                  <option value="Sim">Sim</option>
                  <option selected value="Não">Não</option>
                </select>

                <label for="status" id="situ">Situação:</label>
                <select name="statusAchados">
                  <option value="Devolvido">Devolvido</option>
                  <option selected value="Aguardando">Aguardando</option>
                  <option value="Incorporado">Incorporado</option>
                </select>
              </div>
              <br> 

              <label for="descricao">Descrição</label>
              <textarea name="descricaoAchados" cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto" value="' . $row["descricao"] . '"></textarea>
              <br>

              <input type="submit" class="botao" onclick="msg()" value="Cadastrar">
              <input type="reset" class="botao" value="Limpar">
            </form>
      
			 
';
    } //fim if editar achados


  } //fim if achados


  if ($_POST["tipo"] == "editar-bc") {

    $query = "SELECT * FROM bolsacopia WHERE id_bc = '" . $_POST["id_bc"] . "' LIMIT 1";
    $resultado = mysqli_query($conn, $query) or die("erro" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($resultado);
    echo '
  <div class="modal-header">
  <h5 class="modal-title" id="TituloModalCentralizado">Editar Registro do Bolsa Cópia</h5>
  </div>
	<form method="post" action="inserir_bolsacopia.php" class="cadastro">
              <label>Nome:</label>
              <input type="text" placeholder="' . $row['nome_bc'] . '" required name="nome_bc">
              <label>Matrícula:</label>
              <input type="number" placeholder="' . $row['matricula_bc'] . '" onKeyPress="return Onlynumbers(event);" required name="matricula_bc">
              <label>Laudas:</label>
              <input type="number" placeholder="' . $row['laudas_bc'] . '" required max="20" min="1" name="laudas_bc">
              <input type="hidden" value ="' . $row['id_bc'] . ' name="id">
              <input type="hidden" value="listar" name="pagina"> <!-- Indica ao Inserir de qual página veio os dados -->
              <br> <br> <br>
              <input type="submit" value="Enviar">
              <input type="reset" value="Limpar">
          </form>';
  } //fim if editar-bc
  if ($_POST["tipo"] == "configurar-bimestre") {


    echo '


  <form action="bimestre/inserir_bimestrenovo.php" class = "cadastro" method="post">
    <h2 class="cad-titulo"><img class ="bimestre" src="https://img.icons8.com/android/24/000000/calendar.png"/> <p class ="bim">Configurar<br> Bimestre</p></h2>
    <hr class="divisor"> 

    <label for="nome-bc">Número do novo bimestre</label>
    <input type="text" name="nome_bim_bc" id="nome-bc" required>
    <br>

    <label for="matricula-bc">Data de início do bimestre</label>
    <input type="date" name="bimestreinicio_bim_bc" id="matricula-bc" onKeyPress="return Onlynumbers(event);" required>
    <br>

    <label for="laudas-bc">Data de término do bimestre</label>
    <input type="date" name="bimestrefim_bim_bc" id="laudas-bc" onKeyPress="return Onlynumbers(event);" required>
    <br>
    <!-- inputs escondidas 
    
    <input type="hidden" name="bimestre_vigor_bim_bc" value=0>
     
    <input type="hidden" name="gremista_registrou_bim_bc" value="' . $_SESSION['nome_usuarios'] . '">
    ';
  }
} else {
  header("Location: /");
}
// if(isset($_POST["user_id"])){
// 	include_once "conexao.php";
	
// 	$resultado = '';
	
// 	$query_user = "SELECT * FROM usuarios WHERE id = '" . $_POST["user_id"] . "' LIMIT 1";
// 	$resultado_user = mysqli_query($conn, $query_user);
// 	$row = mysqli_fetch_assoc($resultado_user);
	
// 	$resultado .= '<dl class="row">';
	
// 	$resultado .= '<dt class="col-sm-3">ID</dt>';
// 	$resultado .= '<dd class="col-sm-9">'.$row['id'].'</dd>';
	
// 	$resultado .= '<dt class="col-sm-3">Nome</dt>';
// 	$resultado .= '<dd class="col-sm-9">'.$row['nome'].'</dd>';
	
// 	$resultado .= '<dt class="col-sm-3">E-mail</dt>';
// 	$resultado .= '<dd class="col-sm-9">'.$row['email'].'</dd>';
		
// 	$resultado .= '</dl>';
	
// 	echo $resultado;
// }