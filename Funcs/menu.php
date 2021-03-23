<div class="container-fluid">
    <!-- início da div container, que contém tudo do site -->

    <header>
        <!-- menu superior-->
        <?php

        if (isset($_SESSION['nome_usuarios'])) { ?>
            <nav id="menusup" class="navbar navbar-expand navbar-dark bg-danger ">
                <a class="sidebar-toggle text-light mr-3"><i class="fas fa-bars"></i></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle menu-header pl-2 pr-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                                <?php
                                //Pega apenas o primeiro nome da pessoa
                                $usuario = explode(" ", $_SESSION['nome_usuarios']);
                                $usuario = $usuario[0] . " " . $usuario[1];
                                ?>
                                <img class="rounded-circle mb-1 " src="/TCC/imagens/gevp.png" width="25" height="25">
                                &nbsp;<span class="d-none d-sm-inline "><?= $usuario ?></span>
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
                        <li> <a href="/TCC/bolsacopia/listar_bolsacopia.php"><i class="fas fa-list-ul"></i> Listar</a></li>

                        <li> <a href="/TCC/bolsacopia/cadastrar_bolsacopia.php"><i class="fas fa-edit"></i> Cadastrar</a></li>
                    </ul>
                </li>

                <li><a href="#submenudoc" data-toggle="collapse"><i class="far fa-copy"></i> Documentos</a>
                    <ul class="list-unstyled collapse" id="submenudoc">
                        <li> <a href="/TCC/documentos/interno/listar_documentos.php"><i class="fas fa-folder-open"></i> Meus documentos</a>
                        <li> <a href="#subsubmenudoc" data-toggle="collapse"><i class="fas fa-file-medical"></i> Novo documento</a>
                            <ul class="list-unstyled collapse" id="subsubmenudoc">
                                <li> <a href="/TCC/documentos/interno/ata/gerar_ata.php">Ata</a></li>
                                <li> <a href="/TCC/documentos/interno/ata/gerar_ata_ass.php">Ata de Assembleia</a></li>
                                <?php if ($_SESSION['permissao_doc'] >= 1) { ?><li> <a href="/TCC/documentos/interno/oficio/gerar_oficio.php">Ofício</a></li> <?php } ?>
                                <?php if ($_SESSION['permissao_doc'] >= 3) { ?> <li> <a href="/TCC/documentos/interno/portaria/gerar_portaria.php">Portaria</a></li> <?php } ?>
                            </ul>
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
                       <?php if($_SESSION['nivel'] == 2){?>
                        <li> <a href="/TCC/usuarios/gestao/cadastrar_gestao.php"><i class="fas fa-plus-circle"></i> Cadastrar Gestão </a></li>
                    <?php }?>
                    </ul>

                </li>

            </ul>
        </nav>
    </aside>
<?php } else {
?>
    <nav id="menusup" class="navbar navbar-expand navbar-dark bg-danger ">
        <a class="sidebar-toggle text-light mr-3"><i class="fas fa-bars"></i></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div>.</div>
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
                <li> <a href="/TCC/patrimonio/listar_patrimonio.php"><i class="fas fa-atlas"></i> Diário Oficial da Agremiação</a></li>

                <li> <a href="/TCC/contato/contato.php"><i class="fas fa-phone-square-alt"></i> Fale Conosco</a></li>

                <li> <a href="/TCC/fardas/painel_fardas.php"><i class="fas fa-Tshirt"></i> Fardas</a></li>

                </li>

                <li>
                    <a href="#submenugremio" data-toggle="collapse">
                        <i class="fab fa-guilded"></i> Grêmio</a>

                    <ul class="list-unstyled collapse" id="submenugremio">
                        <li> <a href="/TCC/usuarios/listar_usuarios.php"><i class="fas fa-users"></i> Atual Gestão</a></li>
                    </ul>

                        <ul class="list-unstyled collapse" id="submenugremio">
                            <li> <a href="/TCC/fardas/painel_fardas.php"><i class="fas fa-journal-whills"></i> Estatuto</a></li>
                        </ul>
                    </li>

                <li>
                    <a href="#submenuservicos" data-toggle="collapse">
                        <i class="fas fa-concierge-bell"></i> Serviços</a>
                    <ul class="list-unstyled collapse" id="submenuservicos">
                        <li> <a href="/TCC/achados/listar_achados.php"><i class="fas fa-archive"></i> Achados e Perdidos</a></li>
                    </ul>

                    <ul class="list-unstyled collapse" id="submenuservicos">
                        <li> <a href="/TCC/bolsacopia/listar_bolsacopia.php"><i class="fas fa-print"></i> Bolsa Cópia</a></li>
                    </ul>

                    <ul class="list-unstyled collapse" id="submenuservicos">
                        <li> <a href="/TCC/emprestimo/listar_emprestimo.php"><i class="fas fa-user-clock"></i> Emprestimos</a></li>
                    </ul>

                    <ul class="list-unstyled collapse" id="submenuservicos">
                        <li> <a href="/TCC/patrimonio/listar_patrimonio.php"><i class="fas fa-gem"></i> Patrimônio</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </aside>


<?php } ?>
<!--fim do menu lateral e da página menu-->
<div class="content pl-2 pr-2 pb-1">