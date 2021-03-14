<?php include_once("../../TCC/funcs/header.php"); ?>

<!-- script que chama a tabela -->
<script>
  $(document).ready(function() {
    $('#tabela_achados').DataTable({
      "Processing": true,
      "serverSide": true,
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
      },
      "ajax": {
        "url": "tabela_achados.php",
        "type": "POST"
      },
    });
  });
</script>
</head>

<body class="bg-dark">

  <?php
  include_once("../funcs/include.php");

  ?>

  <!--<div class="container container-grande"> -->
  <br />
  <div class="panel panel-default listar-escuro panel-grande">
    <div class="panel-heading">Achados e Perdidos</div>
    <div class="panel-body">
      <div class="table-responsive">
        <table id="tabela_achados" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nome do Objeto</th>
              <th>Descrição</th>
              <th>Gremista que recebeu</th>
              <th>Quando foi achado</th>
              <th>Onde foi achado</th>
              <th>Quem reivindicou</th>
              <th>CPF ou Matrícula</th>
              <th>Gremista que devolveu</th>
              <th>Postado</th>
              <th>Situação</th>
              <th>Imagem</th>
              <th>Editar</th>
              <?php if ($_SESSION['nivel'] == 2 && isset($_SESSION['login'])) { ?>
                <th>Excluir</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  </div>
  <?php

  include_once(SITE_ROOT . "funcs/footer.php");


  $result_achados = "SELECT * FROM achados WHERE 1=1";
  $resultado_achados = mysqli_query($conn, $result_achados);

  while ($row_achados = mysqli_fetch_array($resultado_achados)) {
  ?>
    <!-- Modal de exibir -->
    <div class="modal fade" id="modal-img-<?= $row_achados["id_achados"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Visualizar:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div style="overflow-y: hidden; height: calc(100vh - 15rem);">
              <div class="px-2" style="overflow-y: auto; height: 100%;">
                <img src="<?= $row_achados["img_achados"] ?> " alt="toto">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar mudanças</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal de editar -->
    <div class="modal fade" id="modal-editar-<?= $row_achados["id_achados"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Editar Registro:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="overflow-y:auto;">
            <form action="inserir_achados.php" class="cadastro" method="post">
              <h2 class="cad-titulo"> Editar Achados e Perdidos</h2>
              <hr class="divisor">

              <label for="nome-objeto">Nome do Objeto:</label>
              <input type="text" name="nomeAchados" value="<?= $row_achados["nome_achados"] ?>" required>
              <br>

              <label for="gremista-recebe">Gremista que recebeu:</label>
              <input type="text" name="gremistaRecebeuAchados" value="<?= $row_achados["gremista_recebeu_achados"] ?>" required>
              <br>

              <label for="quando-achados">Quando foi achado:</label>
              <input type="date" name="quandoAchados" value="<?= $row_achados["quando_achados"] ?>" required>
              <br>

              <label for="onde-achados">Onde foi achado:</label>
              <input type="text" name="ondeAchados" value="<?= $row_achados["onde_achados"] ?>" required>
              <br>

              <label for="dados-achados">CPF ou Matrícula de quem Reinvindicou:</label>
              <input type="text" name="cpfMatriculaAchados" onKeyPress="return Onlynumbers(event);" value=" <?= $row_achados["cpf_matricula_achados"] ?>" required>
              <br>

              <label for="gremista-devolveu-achados">Gremista que devolveu:</label>
              <input type="text" name="gremistaDevolveuAchados" value=" <?= $row_achados["gremista_devolveu_achados"] ?>">
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
              <textarea name="descricaoAchados" cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto" value="<?= $row_achados["descricao_achados"] ?>"></textarea>
              <br>

              <input type="submit" class="botao" onclick="msg()" value="Cadastrar">
              <input type="reset" class="botao" value="Limpar">
            </form>
          </div> <!-- modal body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar mudanças</button>
          </div>
        </div>
      </div>
    </div>
    <!--</div>-->
    < <?php
    }
      ?> <script>
      $(document).ready(function(){
      $(document).on('click','.view_data', function(){
      var id_achados = $(this).attr("id");
      alert(id_achados);
      //Verificar se há valor na variável "id_achados".
      if(id_achados !== ''){
      var dados = {
      id_achados: id_achados
      };
      $.post('visualizar.php', dados, function(retorna){
      //Carregar o conteúdo para o usuário
      $("#visul_usuario").html(retorna);
      $('#visulUsuarioModal').modal('show');
      });
      }
      });
      });
      </script>


</body>

</html>