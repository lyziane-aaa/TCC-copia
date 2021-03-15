
 <html lang="pt-br">

<head>
	<script type="text/javascript" src="/TCC/js/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap-->
	<link rel="stylesheet" href="/TCC/_css/bootstrap/css/bootstrap.css">
	<!-- <script type="text/javascript" src="/TCC/_css/bootstrap/js/bootstrap.bundle.js"></script> -->
	<script type="text/javascript" src="/TCC/_css/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/TCC/_css/teste.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/listar.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/documentos.css">
	<link rel="stylesheet" type="text/css" href="/TCC/_css/estilo.css">
<!-- Sweet alert -->  
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.1/dist/sweetalert2.all.min.js"></script>


	<!-- scrips js-->
	<script src="/TCC/js/menu.js"></script>
	<script src="/TCC/js/modal.js"></script>

	<script src="/TCC/js/scripts.js"></script>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>


	<link rel="stylesheet" type="text/css" href="/TCC/DataTables/datatables.css" />
	<script type="text/javascript" src="/TCC/DataTables/datatables.js"></script>
	<!-- FontAwesome-->
	<link href="/TCC/_css/fontawesome/css/all.css" rel="stylesheet">

	<link rel="shortcut icon" href="/TCC/imagens/favicon ver2.ico" />

	<!--Estilo-->
	<!-- ck editor-->
	<script src="/TCC/ckeditor/ckeditor/ckeditor.js" charset="utf-8"></script><!-- Arquivos para o editor de texto opensource CKEditor-->
	<script src="/TCC/ckeditor/ckfinder/ckfinder.js"></script>
	<script src="/TCC/ckeditor/js/javascript.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</script>
<script>
	function confirmar(id) {
		Swal.fire({
			title: 'Você tem certeza?',
			text: "Não há como reverter a exclusão!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Excluir',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.isConfirmed) {
				var hre = "<br />
<b>Notice</b>:  Undefined variable: hre in <b>C:\xampp\htdocs\TCC\funcs\header.php</b> on line <b>64</b><br />
"
				Swal.fire(
					'O Arquivo foi xcluido!',
					'',
					'success'
				)
				location.href = hre + id;
			}
		})
	};
</script>



	<!-- o name da página fica abaixo, depois é necessário fechar o head-->	<script>
		$(document).ready(function() {
			$('#tabelabc').DataTable( {
				"Processando": true,
				"serverSide": true,
				"language": {
   					"url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
						},
				"ajax": {
					"url": "tabelabc.php",
					"type": "POST"
						},
					} );
				} );
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
                            &nbsp;<span class="d-none d-sm-inline ">Lucas Felipe</span>
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
                                <li> <a href="/TCC/documentos/interno/oficio/gerar_oficio.php">Ofício</a></li>                                                             </ul>
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
    
    <div class="panel panel-default listar-escuro">
        <div class="panel-heading panel-heading_bc">Bolsa Cópia
		<hr class="divisor_bc"> 
			<h6> Bimestre atual: <input type="text" readonly value = "2021.2"> </h6>
			<h6> Início do bimestre: <input type="text" readonly value = "08/02/2021"> </h6>
			<h6> Término do bimestre: <input type="text" readonly value = "09/02/2021"> </h6>

								
			<!-- Botão para acionar modal de configuração de bimestre -->
			<button type="button" class="btn btn-primary configurar-bimestre" data-toggle="modal" data-target="#modal-bimestre"> Configurar Bimestre </button>
			<!-- Botão para acionar modal de escolha do bimestre vigente-->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-vigor"> Alterar Bimestre </button>
					</div>
        <div class="panel-body">
		<!-- Modal -->
    <div id="editar-bc" tabindex="-1" data-backdrop="static" class="modal hidden fade in" style="display:none !important; z-index: 90000 !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
                    
              <span id="visul_bc"></span>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " onclick="window.location.reload();" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div><!-- Modal -->
       <div id="configurar-bimestre" tabindex="-1" class="modal hidden fade in" style=" display:none !important; z-index: 90000 !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" >
            <span id="visul_configurar-bimestre"></span>                  
            </div>
           
             
            </div><!-- fim do modal de cadastro do bimestre-->
            
       
		<!-- Painel de Controle de Bimestre, visível apenas para gremistas -->
		<script>
    $(document).ready(function() {
      $(document).on('click', '.editar-bc', function() {
        var id_bc = $(this).attr("id");
        //Verificar se há valor na variável "id_bc".
        if (id_bc !== '') {
          var dados = {
            id_bc: id_bc,
            tipo: "editar-bc"
          };
          
          $.post('../achados/visu_achados.php', dados, function(retorna) {
            //Carregar o conteúdo para o usuário
            $("#visul_bc").html(retorna);
            $('#editar-bc').modal('show');
          });
        }
      });
    });

	$(document).ready(function() {
      $(document).on('click', '.configurar-bimestre', function() {
        
        //Verificar se há valor na variável "id_bc".
        
          var dados = {
            tipo: "configurar-bimestre"
          };
          
          $.post('../achados/visu_achados.php', dados, function(retorna) {
            //Carregar o conteúdo para o usuário
            $("#visul_configurar-bimestre").html(retorna);
            $('#configurar-bimestre').modal('show');
          });
        }
      );
    });
	</script>
		
	


			</div>
			</div> 

		
				






				<div class="table-responsive table_bc">
    <table id="tabelabc" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Matrícula</th>
                <th>Laudas:</th>
				<th>Última impressão em:</th>
				<th>Editar</th>

									<th>Excluir</th>
                			</tr>
        </thead>
        <tbody>
        </tbody>
    </table>
	
            </div> <!-- Panel-body !-->
        </div>
    </div>
</div>

</div> <!-- fim do content-->
<footer id="rodape" >
    <p>Copyright &copy; 2021 by Eduardo Marinho, Lucas Felipe e Lyziane Nogueira <br>
        <a href="https://pt-br.facebook.com/gevpoficial/" target="blank">Facebook </a>| <a href="https://www.instagram.com/gevp.ifrn/" target="blank"> Instagram </a>
    </p>
</footer>
</div><!-- fim do container-->
</body>
</html><script> 


// $('#modal-bimestre').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Botão que acionou o modal
//   var recipient = button.data('whatever') // Extrai informação dos atributos data-*
//   // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
//   // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
//   var modal = $(this)
//   modal.find('.modal-body input').val(recipient)
// })

// $('#modal-vigor').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Botão que acionou o modal
//   var recipient = button.data('whatever') // Extrai informação dos atributos data-*
//   // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
//   // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
//   var modal = $(this)
//   modal.find('.modal-body input').val(recipient)
// })
</script>
		
	</body>
</html>