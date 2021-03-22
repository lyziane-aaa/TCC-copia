<?php include_once("../Funcs/header.php");
$hre="excluir_achados.php?id="; ?>

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
  <div class="panel panel-default listar-escuro" align="center">
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
              <?php 
									if(isset($_SESSION['login'])){
										echo'<th>Editar</th>';
										if ($_SESSION['nivel'] == 2) { ?>
											<th>Excluir</th>
								<?php }}?>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Modal -->
  <div id="img_achados" data-backdrop="static" class="modal hidden fade in" style=" display:none !important; z-index: 90000 !important;" 
  data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog   modal-dialog-centered" role="document">
      <div class="modal-content">
        
          <span id="visul_img"></span>
        
      </div>
    </div>
  </div>

  <?php
  echo modale('editar_achados');
  ?>


  <script>
    $(document).ready(function() {
      $(document).on('click', '.img-achados', function() {
        var id_achados = $(this).attr("id");
        
        //Verificar se há valor na variável "id_achados".
        if (id_achados !== '') {
          var dados = {
            id_achados: id_achados,
            tipo: "img_achados"
          };
          $.post('../funcs/visu_modal.php', dados, function(retorna) {
            //Carregar o conteúdo para o usuário
            $("#visul_img").html(retorna);
            $('#img_achados').modal('show');
          });
					}
				});
			});

    //Pega o id para editar
    $(document).ready(function() {
      $(document).on('click', '.editar_achados', function() {
        var id_achados = $(this).attr("id");
        // alert(id_achados);
        //Verificar se há valor na variável "id_achados".
        if (id_achados !== '') {
          var dados = {
            id_achados: id_achados,
            tipo: "editar_achados"
          };

          $.post('../funcs/visu_modal.php', dados, function(retorna) {
            //Carregar o conteúdo para o usuário
            $("#visul_editar_achados").html(retorna);
            $('#editar_achados').modal('show');
          });
        }
      });
    });
  </script>
  <?php

  include_once(SITE_ROOT . "funcs/footer.php");



  //while ($row_achados = mysqli_fetch_array($resultado_achados)) {
  ?>
  <!-- Modal de exibir 

    Modal de editar 
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
          </div> <!-- modal body 
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar mudanças</button>
          </div>
        </div>
      </div>  
    </div>
    <!--</div> -->

  <?php
  //  }
  ?>


</body>
</html>