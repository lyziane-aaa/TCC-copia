<div class="container-fluid">
    <!-- início da div container, que contém tudo do site -->

    <header>
        <nav id="menusup" class="navbar navbar-expand navbar-dark bg-danger ">
            <a class="sidebar-toggle text-light mr-3"><i class="fas fa-bars"></i></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <img class="rounded-circle" src="/TCC/imagens/gevp.png" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">Usuário</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Alterar usuário</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav><!-- fim do menu -->

    </header><!-- fim do header-->
    <!-- menu lateral -->
    <aside class="main-sidebar col-md-auto">

        <nav class="sidebar">
            <ul class="list-unstyled">
                <div id="logomenu" class="pt-3 mb-3 d-flex">
                    <div id="divlogo">
                        <img id="logo" src="/TCC/imagens/gevp.png" width="140" height="110">
                        <h6>Grêmio Estudantil Valdemar dos Pássaros</h6>
                    </div>
                </div>
                <li><a href="Funcs/inicio.php"><i class="fas fa-home"></i> Início</a></li>
                <li>
                    <a href="#submenuachados" data-toggle="collapse">
                        <i class="fas fa-archive"></i> Achados e Perdidos</a>
                    <ul class="list-unstyled collapse" id="submenuachados">
                        <li> <a href="#"><i class="fas fa-list-ul"></i> Listar</a></li>
                        <li> <a href="#"><i class="fas fa-edit"></i> Cadastrar</a></li>
                    </ul>
                </li>
                <li><a href="#submenubc" data-toggle="collapse"><i class="fas fa-print"></i> Bolsa Cópia</a>
                    <ul class="list-unstyled collapse" id="submenubc">
                        <li> <a href="#"><i class="fas fa-list-ul"></i> Cadastrar</a></li>
                </li>
                <li> <a href="#"><i class="fas fa-edit"></i> Listar </a></li>
            </ul>
            </li>

            <li><a href="#submenudoc" data-toggle="collapse"><i class="far fa-copy"></i> Documentos</a>
                <ul class="list-unstyled collapse" id="submenudoc">
                    <li> <a href="#subsubmenudoc" data-toggle="collapse"><i class="fas fa-list-ul"></i> Novo documento</a>
                        <ul class="list-unstyled collapse" id="subsubmenudoc">
                            <li> <a href="#"><i class="fas fa-list-ul"></i> Listar</a></li>
                            <li> <a href="#"><i class="fas fa-edit"></i> Cadastrar</a></li>
                        </ul>
                    </li>



                    <li> <a href="#"><i class="fas fa-edit"></i> Cadastrar</a></li>
                </ul>
            </li>
            <li><a href="Funcs/inicio.php"><i class="fas fa-user-clock"></i> Empréstimos</a></li>
            <li><a href="Funcs/inicio.php"><i class="fas fa-tshirt"></i> Fardas</a></li>
            <li><a href="Funcs/inicio.php"><i class="fas fa-gem"></i> Patrimônio</a></li>
            <li><a href="listar.php"><i class="fas fa-users"></i> Usuários</a></li>

            </ul>
        </nav>
        <!-- <script src="../js/menu.js"></script> -->
    </aside>
    <!--fim do menu-->