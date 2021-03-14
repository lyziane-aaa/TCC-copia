
 <html lang="pt-br">

<head>
	<script type="text/javascript" src="/TCC/js/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap-->
	<link rel="stylesheet" href="/TCC/_css/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="/TCC/_css/bootstrap/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="/TCC/_css/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/TCC/_css/teste.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/listar.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/documentos.css">

	<!-- scrips js-->
	<script src="/TCC/js/menu.js"></script>
	<script src="/TCC/js/scripts.js"></script>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>


	<link rel="stylesheet" type="text/css" href="/TCC/DataTables/datatables.css" />
	<script type="text/javascript" src="/TCC/DataTables/datatables.js"></script>
	<!-- FontAwesome-->
	<link href="/TCC/_css/fontawesome/css/all.css" rel="stylesheet">

	<link rel="shortcut icon" href="/TCC/imagens/favicon ver2.ico" />

	<!--Estilo-->
	<link rel="stylesheet" type="text/css" href="/TCC/_css/estilo.css">
	<!-- ck editor-->
	<script src="/TCC/ckeditor/ckeditor/ckeditor.js" charset="utf-8"></script><!-- Arquivos para o editor de texto opensource CKEditor-->
	<script src="/TCC/ckeditor/ckfinder/ckfinder.js"></script>
	<script src="/TCC/ckeditor/js/javascript.js"></script>


	<!-- o name da página fica abaixo, depois é necessário fechar o head-->
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

  <div class="container-fluid">
    <!-- início da div container, que contém tudo do site -->

    <header>
        <!-- menu superior-->
        <nav id="menusup" class="navbar navbar-expand navbar-dark bg-danger ">
            <a class="sidebar-toggle text-light mr-3"><i class="fas fa-bars"></i></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-header pl-2 pr-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                                                        <img class="rounded-circle mb-1 " src="/TCC/imagens/gevp.png" width="25" height="25">
                            &nbsp;<span class="d-none d-sm-inline ">Felipe Carlos</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right pl-3" aria-labelledby="navbarDropdownMenuLink" id="dropdownusuarios">
                            <a class="dropdown-item" href="#">Alterar usuário</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/TCC/funcs/sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav><!-- fim do menu superior-->
    </header><!-- fim do header-->
    <!-- menu lateral -->
    <aside class="main-sidebar col-md-auto ">

        <nav class="sidebar ">
            <ul class="list-unstyled">
                <div id="logomenu" class="pt-3 mb-3 d-flex">
                    <div id="divlogo">
                        <img id="logo" src="/TCC/imagens/gevp.png" width="140" height="110">
                        <h6>Grêmio Estudantil Valdemar dos Pássaros</h6>
                    </div>
                </div>
                <li><a href="/TCC/"><i class="fas fa-home"></i> Início</a></li>
                <li>
                    <a href="#submenuachados" data-toggle="collapse">
                        <i class="fas fa-archive"></i> Achados e Perdidos</a>
                    <ul class="list-unstyled collapse" id="submenuachados">
                        <li> <a href="/TCC/achados/listar_achados.php"><i class="fas fa-list-ul"></i> Listar</a></li>
                        <li> <a href="/TCC/achados/cadastrar_achados.php"><i class="fas fa-edit"></i> Cadastrar</a></li>
                    </ul>
                </li>
                <li><a href="#submenubc" data-toggle="collapse"><i class="fas fa-print"></i> Bolsa Cópia</a>
                    <ul class="list-unstyled collapse" id="submenubc">
                        <li> <a href="/TCC/bolsacopia/listar_bolsacopia.php"><i class="fas fa-edit"></i> Listar</a></li>

                        <li> <a href="/TCC/bolsacopia/cadastrar_bolsacopia.php"><i class="fas fa-list-ul"></i> Cadastrar</a></li>
                    </ul>
                </li>

                <li><a href="#submenudoc" data-toggle="collapse"><i class="far fa-copy"></i> Documentos</a>
                    <ul class="list-unstyled collapse" id="submenudoc">
                    <li> <a href="/TCC/documentos/interno/listar_documentos.php"><i class="fas fa-folder-open"></i> Meus documentos</a>
                        <li> <a href="#subsubmenudoc" data-toggle="collapse"><i class="fas fa-file-medical"></i> Novo documento</a>

                            <ul class="list-unstyled collapse" id="subsubmenudoc">
                                <li> <a href="/TCC/documentos/interno/ata/gerar_ata.php">Ata</a></li>
                                <li> <a href= "/TCC/documentos/interno/ata/gerar_ata_ass.php" >Ata de Assembleia</a></li>
                                <li> <a href="/TCC/documentos/interno/oficio/gerar_oficio.php">Ofício</a></li>                                  <li> <a href="/TCC/documentos/interno/portaria/gerar_portaria.php">Portaria</a></li>                             </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#submenuemp" data-toggle="collapse"><i class="fas fa-user-clock"></i> Empréstimos</a>
                    <ul class="list-unstyled collapse" id="submenuemp">
                        <li> <a href="/TCC/emprestimo/listar_emprestimo.php"><i class="fas fa-list-ul"></i> Listar</a></li>
                        <li> <a href="/TCC/emprestimo/cadastrar_emprestimo.php"><i class="fas fa-edit"></i> Cadastrar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#submenufardas" data-toggle="collapse"><i class="fas fa-tshirt"></i> Fardas</a>
                    <ul class="list-unstyled collapse" id="submenufardas">
                        <li> <a href="/TCC/fardas/config_lote.php"><i class="fas fa-cogs"></i> Config. de Lote</a></li>
                        <li> <a href="/TCC/fardas/painel_fardas.php"><i class="fas fa-cash-register"></i> Painel de Vendas </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#submenupat" data-toggle="collapse"><i class="fas fa-gem"></i> Patrimônio</a>
                    <ul class="list-unstyled collapse" id="submenupat">
                        <li> <a href="/TCC/patrimonio/listar_patrimonio.php"><i class="fas fa-list-ul"></i> Patrimônio Ativo</a></li>
                        <li> <a href="/TCC/patrimonio/patrimonio_baixa/listar_patrimonio_baixa.php"><i class="fas fa-cash-register"></i> Patrimônio baixado </a></li>
                        <li> <a href="/TCC/patrimonio/cadastrar_patrimonio.php"><i class="fas fa-plus-circle"></i> Incorporar objeto</a></li>
                    </ul>
                </li>
                <li><a href="#submenuusu" data-toggle="collapse"><i class="fas fa-users"></i> Usuários</a>
                <ul class="list-unstyled collapse" id="submenuusu">
                        <li> <a href="/TCC/usuarios/listar_usuarios.php"><i class="fas fa-list-ul"></i> Todos os usuários </a></li>
                        <li> <a href="/TCC/usuarios/gestao/listar_gestoes.php"><i class="fas fa-cash-register"></i> Gestões </a></li>
                    </ul>
            
            </li>

            </ul>
        </nav>
    </aside>
    <!--fim do menu lateral e da página menu-->
    <div class="content pl-2 pr-2 pb-1">

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
                          </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  
  </div>
<div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="visulUsuarioModalLabel">Detalhes do Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span id="visul_usuario"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  <footer id="rodape" >
    <p>Copyright &copy; 2021 by Eduardo Marinho, Lucas Felipe e Lyziane Nogueira <br>
        <a href="https://pt-br.facebook.com/gevpoficial/" target="blank">Facebook </a>| <a href="https://www.instagram.com/gevp.ifrn/" target="blank"> Instagram </a>
    </p>
</footer>
</div><!-- fim do container-->
</body>
</html>  <!-- Modal de exibir -->
  <!-- <div class="modal fade" id="modal-img-<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>90</b><br />
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <img src="<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>102</b><br />
 " alt="toto">
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

    Modal de editar 
    <div class="modal fade" id="modal-editar-<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>115</b><br />
" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="text" name="nomeAchados" value="<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>130</b><br />
" required>
              <br>

              <label for="gremista-recebe">Gremista que recebeu:</label>
              <input type="text" name="gremistaRecebeuAchados" value="<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>134</b><br />
" required>
              <br>

              <label for="quando-achados">Quando foi achado:</label>
              <input type="date" name="quandoAchados" value="<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>138</b><br />
" required>
              <br>

              <label for="onde-achados">Onde foi achado:</label>
              <input type="text" name="ondeAchados" value="<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>142</b><br />
" required>
              <br>

              <label for="dados-achados">CPF ou Matrícula de quem Reinvindicou:</label>
              <input type="text" name="cpfMatriculaAchados" onKeyPress="return Onlynumbers(event);" value=" <br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>146</b><br />
" required>
              <br>

              <label for="gremista-devolveu-achados">Gremista que devolveu:</label>
              <input type="text" name="gremistaDevolveuAchados" value=" <br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>150</b><br />
">
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
              <textarea name="descricaoAchados" cols="10" rows="4" maxlength="800" placeholder="Descreva o Objeto" value="<br />
<b>Notice</b>:  Undefined variable: row_achados in <b>C:\xampp\htdocs\TCC\achados\listar_achados.php</b> on line <b>170</b><br />
"></textarea>
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
    <script>
    $(document).ready(function() {
      $(document).on('click', '.view_data', function() {
        var id_achados = $(this).attr("id");
        alert(id_achados);
        //Verificar se há valor na variável "id_achados".
        if (id_achados !== '') {
          var dados = {
            id_achados: id_achados
          };
          $.post('visu_achados.php', dados, function(retorna) {
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