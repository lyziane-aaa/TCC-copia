<?php
    
if (!empty($_POST)){ 
  session_start();

  $reandoly="readonly";
  if($_SESSION['nivel'] == 2){
        $reandoly = ""; 
      }
      
 include_once("../funcs/conexao.php");
  if (isset($_POST["id_achados"]) && isset($_POST["tipo"])) {
    
    $query = "SELECT * FROM achados WHERE id_achados = '" . $_POST["id_achados"] . "' LIMIT 1";
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado);
    if ($_POST["tipo"] == "img_achados") {

      $res = '  <div class="modal-header">
      <h5 class="modal-title" id="TituloModalCentralizado">Imagem de '.$row["nome_achados"].'</h5>
    </div>
    <div class="modal-body" style="background-color:#161717;">
            
                <img width = "300px" height="300px" src="' . $row["img_achados"] . '" alt="toto">
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary " onclick="window.location.reload();" data-dismiss="modal">Fechar</button>
              </div>
';
      echo $res;
    }  //fim if tipo img
    if ($_POST["tipo"] == "editar_achados") {
      $res= ' <div class="modal-header">
  <h5 class="modal-title" id="imgLabel"> Editar Registro de '. $row["nome_achados"] . '</h5>
  <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
        </div>
        <div class="modal-body" style="background-color:#161717;">
		<form action="inserir_achados.php" class="cadastro" method="post">
              <label for="nome-objeto">Nome do Objeto:</label>
              <input type="text" name="nomeAchados" value="' . $row["nome_achados"] . '" required>
              <br>

              <label for="gremista-recebe">Gremista que recebeu:</label>
              <input type="text" name="gremistaRecebeuAchados" value="' . $row["gremista_recebeu_achados"] . '" '.$reandoly.' required>
              <br>

              <label for="quando-achados">Quando foi achado:</label>
              <input type="date" name="quandoAchados" value="' . $row["quando_achados"] . '" required >
              <br>

              <label for="onde-achados">Onde foi achado:</label>
              <input type="text" name="ondeAchados" value="' . $row["onde_achados"] . '" '.$reandoly.' required>
              <br>

              <label for="dados-achados">CPF ou Matrícula de quem Reinvindicou:</label>
              <input type="text" name="cpfMatriculaAchados" onKeyPress="return Onlynumbers(event);" value=" ' . $row["cpf_matricula_achados"] . '" required>
              <br>

              <label for="gremista-devolveu-achados">Gremista que devolveu:</label>
              <input type="text" name="gremistaDevolveuAchados" value=" ' . $row["gremista_devolveu_achados"] . '">
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
              <textarea name="descricaoAchados" cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto" value="' . $row["descricao_achados"] . '"></textarea>
              <br>

              <input type="submit" class="botao" onclick="msg()" value="Cadastrar">
              <input type="reset" class="botao" value="Limpar">
            </form>
      
			 
'; echo $res;
    } //fim if editar achados


  } //fim if achados


  if ($_POST["tipo"] == "editar-bc") {

    $query = "SELECT * FROM bolsacopia WHERE id_bc = '" . $_POST["id_bc"] . "' LIMIT 1";
    $resultado = mysqli_query($conn, $query) or die("erro" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($resultado);
    echo '
  <div class="modal-header">
  <h5 class="modal-title" id="TituloModalCentralizado">Editar Registro do Bolsa Cópia</h5>
  <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
  </div>
	<form method="post" action="inserir_bolsacopia.php" class="cadastro">
              <label>Nome:</label>
              <input type="text" value="' . $row['nome_bc'] . '" required name="nome_bc" readonly >
              <label>Matrícula:</label>
              <input type="number" value="' . $row['matricula_bc'] . '" onKeyPress="return Onlynumbers(event);" readonly  required name="matricula_bc">
              <label>Laudas:</label>
              <input type="number" value="' . $row['laudas_bc'] . '" required max="20" min="1" name="laudas_bc" >
              <input type="hidden" value ="' . $row['id_bc'] . '" name="id">
              <input type="hidden" value="listar" name="pagina"> <!-- Indica ao Inserir de qual página veio os dados -->
              <br> <br> <br>
              <input type="submit" value="Enviar">
              <input type="reset" value="Limpar">
          </form>';
  } //fim if editar-bc



  if ($_POST["tipo"] == "configurar-bimestre") {


    echo '
  <form action="bimestre/inserir_bimestrenovo.php" class = "cadastro" method="post">
    <label for="nome-bc">Número do novo bimestre</label>
    <input type="text" name="nome_bim_bc" id="nome-bc" required>
    <br>

    <label for="matricula-bc">Data de início do bimestre</label>
    <input type="date" name="bimestreinicio_bim_bc" id="matricula-bc" onKeyPress="return Onlynumbers(event);" required>
    <br>

    <label for="laudas-bc">Data de término do bimestre</label>
    <input type="date" name="bimestrefim_bim_bc" id="laudas-bc" onKeyPress="return Onlynumbers(event);" required>
    <br>
    <!-- inputs escondidas -->
    <input type="hidden" name="bimestre_vigor_bim_bc" value=0>
    <input type="hidden" name="gremista_registrou_bim_bc" value="' . $_SESSION['nome_usuarios'] . '">
    
    <input type="reset" class="botao" value="Limpar">
    <input type="submit" class="botao" onclick="window.location.reload();" value="Cadastrar">
    ';
  }

  if ($_POST["tipo"] == "editar-emp") {
    $query = "SELECT * FROM emprestimos WHERE id_emp = '" . $_POST["id_emp"] . "' LIMIT 1";
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado);
    $data = date('d/m/Y - H:i:s');
      
    echo'
            < class="modal-header">
              <h5 class="modal-title" id="TituloModalCentralizado">Atualizar Empréstimo de '.$row['nome_emp'].'</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </>
            <div class="modal-body" style="overflow-y:auto;">
              <form method="post" action="inserir_emprestimo.php" class="cadastro">
  
                <label for="nome_emp">Nome do objeto:</label>
                <input type="text" readonly value="'. $row['obj_emp'] .'" name="objeto_emp" required>
                <br>
  
                <label for="nome_emp">Nome completo do aluno:</label>
                <input type="text" placeholder="'. $row['nome_emp'] .'" name="nome_emp" id="nome-usuarios" required>
                <br>
  
                <label for="matricula_emp">Matrícula ou CPF:</label>
                <input type="text" placeholder="'. $row['matricula_emp'] .'" name="matricula_emp" required>
                <br>
  
                <label for="gremista_emp">Gremista que emprestou:</label>
                <input type="text" name="gremista_emp" required readonly value="'. $row['gremista_emp'] .'">
                <br>
  
                <label for="condicao" id="post">Condição:</label>
                <select placeholder="'. $row['condicao_emp'] .'" name="condicao_emp" id="condicao">
                  <option value="Novo">Novo</option>
                  <option selected value="Normal">Normal</option>
                  <option value="Desgastado">Desgastado</option>
                </select>
  
                <label for="data_emp">Data de Devolução:</label>
                <input type="text" name="devolucao_emp" required readonly value="'. $data. '">
  
                <label for="gremista_emp">Gremista que Recebeu:</label>
                <input type="text" readonly value="'. $_SESSION['nome_usuarios'] .'" name="gremista_recebeu_emp" required>
                <br>
  
                <input type="hidden" value="'. $row['id_emp'] .'" name="id">
                <input type="hidden" value="listar" name="pagina"> <!-- Indica ao Inserir de qual página veio os dados -->
                <input type="submit" value="Enviar">
                <input type="reset" value="Limpar">
                <br>
                <br>
              </form>
            </div>
          </div>
        </div>
      </div>';
    } 

  if ($_POST["tipo"] == "editar-pat" ){
        
    $query = 'SELECT * FROM patrimonioativo WHERE id_pat = "' . $_POST["id_pat"] . '" LIMIT 1';
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado);
    echo '
    <div class="modal-header">
    <h5 class="modal-title" id="TituloModalCentralizado">Editar registro do Patrimônio de ID '.$_POST["id_pat"] .'</h5>
    <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
    </div>
  <form method="post" action="inserir_patrimonio.php" class="cadastro">

		<label for="nome-objeto">Nome do Objeto:</label>
        <input type="text" name="nomePat" id="nome-objeto" value="'.$row['nome_pat'].'"  required>
        <br>

        <label for="codigo-barras">Código de Barras</label>
        <input type="text" name="codBarrasPat" id="codigo-barras" onKeyPress="return Onlynumbers(event);" value="'.$row['cod_barras_pat'].'" required>
        <br>

        <div class="linha">
            <label for="obtencao" class="post" >Forma de Obtenção:</label>
            <select name="obtencaoPat" id="obtencao">
                <option value="Compra">Compra</option>
                <option selected value="Doação">Doação</option>
            </select>
            <br>

            <label for="status" class="post" >Condição:</label>
            <select name="statusPat" id="status" >
                <option value="Novo">Novo</option>
                <option selected value="Normal">Normal</option>
                <option value="Desgastado">Desgastado</option>
            </select>
            <br>
        </div>
        <br>

        <label for="custo">Custo:</label>
        <input type="number" name="custoPat" id="custo" onKeyPress="return Onlynumbers(event);" value="'.$row['custo_obt'].'" >
        <br>
        <br>

        <label for="nome-gresmista">Cadastrado por</label>
        <input type="text" name="gremista_cadastro_pat" id="nome-gremista" value="'.$row['gremista_cadastro_pat'] .'" required readonly>
        <br>
        <br>

        <label for="emprestavel" class="post" >Pode ser emprestado:</label>
            <select name="emprestavel" id="emprestavel">
                <option value="1">Sim</option>
                <option selected value="0">Não</option>
            </select>

        <label for="descricao">Descrição:</label> 
        <textarea name="obsPat" id="descricao value="'.$row['obs_pat'].' 
        cols="10" rows="4" maxlength="800" placeholder="Descreva o objeto aqui"></textarea>
        <br>


			<input type="hidden" value ="'. $row['id_pat'] .'" name="id">
			<input type="hidden" value="listar" name="pagina"> <!-- Indica ao Inserir de qual página veio os dados -->
			<input type="submit" value="Enviar">
			<input type="reset" value="Limpar">
			<br> 
			<br>
		</form>';



  }

  if ($_POST["tipo"] == "venda-fardas-enc" ){
    $query = 'SELECT * FROM fardas_encomendas WHERE id_fardas_enc = "' . $_POST["id_fardas_enc"] . '" LIMIT 1';
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado);
    $foreach = '';
    $aux = array(0 => "PP", 1 =>  "P", 2 =>  "M", 3 => "G", 4 => "GG", 5 => "PP-BL", 6 => "P-BL", 7 => "M-BL", 8 => "G-BL", 9 => "GG-BL");

    foreach ($aux as $a) {
      $b = str_replace('-BL', ' - Baby Look', $a);
    $foreach.=  "<option value='$a'>$b</option>";
  }

echo '
  <div class="modal-header">
  <h5 class="modal-title" id="TituloModalLongoExemplo" style="color: white;">Confirmar Encomenda de ' . $row['nome_fardas_enc'] .'</h5>
  <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

</div>
<div class="modal-body " style="height:fit-content;">
  <form action="inserir_fardas_vend.php" class="cadastro" method="post" enctype="multipart/form-data">
      <h5> (As encomendas vencem em três dias) </h5>
      <hr class="divisor">

      <input type="number" hidden name="id_fardas_enc" value= "'. $row['id_fardas_enc'] .'" required>

      <label for="nome_fardas_vend">Nome Completo do comprador:</label>
      <input type="text" name="nome_fardas_vend" value="' . $row['nome_fardas_enc'] .'" required>
      <br>

      <label for="matricula_fardas_enc">Matrícula do comprador:</label>
      <input type="text" name="matricula_fardas_vend" value="' . $row['matricula_fardas_enc'] .'" required>
      <br>


      <label for="tamanho_fardas_enc">Tamanho da Farda:</label>
      <select name="tamanho_fardas_vend" required>
          <option selected value="">Selecione o tamanho da Farda</option>
         '. 
          $foreach .'


      </select>
      <br>
      <label for="qnt_fardas_enc">Quantidade de Fardas:</label>
      <input type="number" value="'.$row['qnt_fardas_enc'] .'" name="qnt_fardas_vend" min="0" max="5" required>
      <br>
      <label for="qnt_fardas_enc">Recibo:</label>
      <p> Lembrete: é apenas UM recibo por compra, nele deverá constar o somatório dos preços de todas as fardas de uma venda</p>
      <input type="file" name="recibo_fardas_vend" min="0" max="5" required>
      <br>
      <label for="pagamento">Confirme o pagamento:</label>
      <select name="pagamento" required>
          <option value="pago">Pago</option>
          <option selected value="">Não pago</option>



  <input type="reset" class="botao" value="Limpar">
  <input type="submit" class="botao" onclick="msg()" value="Confirmar encomenda">
  </form>

';}
if ($_POST["tipo"] == "venda-fardas" ){
 
  $foreach = '';
  $aux = array(0 => "PP", 1 =>  "P", 2 =>  "M", 3 => "G", 4 => "GG", 5 => "PP-BL", 6 => "P-BL", 7 => "M-BL", 8 => "G-BL", 9 => "GG-BL");

  foreach ($aux as $a) {
    $b = str_replace('-BL', ' - Baby Look', $a);
  $foreach.=  "<option value='$a'>$b</option>";
}
echo '
<div class="modal-header">
<h5 class="modal-title" id="TituloModalLongoExemplo" style="color: white;">Realizar nova venda</h5>
<button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body " style="height:fit-content;">
<form action="inserir_fardas_vend.php" class="cadastro" method="post" enctype="multipart/form-data">
    <label for="nome_fardas_vend">Nome Completo do comprador:</label>
    <input type="text" name="nome_fardas_vend" required>
    <br>

    <label for="matricula_fardas_enc">Matrícula do comprador:</label>
    <input type="text" name="matricula_fardas_vend" required>
    <br>


    <label for="tamanho_fardas_enc">Tamanho da Farda:</label>
    <select name="tamanho_fardas_vend" required>
       '.
        $foreach .'
    </select>
    <br>
    <label for="qnt_fardas_enc">Quantidade de Fardas:</label>
    <input type="number" name="qnt_fardas_vend" min="0" max="5" required>
    <br>
    <label for="qnt_fardas_enc">Recibo:</label>
    <p> Lembrete: é apenas UM recibo por compra, nele deverá constar o somatório dos preços de todas as fardas de uma venda</p>
    <input type="file" name="recibo_fardas_vend" min="0" max="5" required>
    <br>
    <label for="pagamento">Confirme o pagamento:</label>
    <select name="pagamento" required>
        <option value="pago">Pago</option>
        <option selected value="">Não pago</option>

<input type="reset" class="botao" value="Limpar">
<input type="submit" class="botao" onclick="msg()" value="Confirmar venda">
</form>';

}





} else {
  header("Location: ../TCC/");
}