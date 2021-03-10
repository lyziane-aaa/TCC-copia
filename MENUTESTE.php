<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menu</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="_css/teste.css">
    <link href="_css/fontawesome/css/all.css" rel="stylesheet">
    <!--load all styles -->


    <script type="text/javascript" src="DataTables/datatables.js"></script>

<body class="bg-dark">

    <div class="container-fluid">

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
                                <img class="rounded-circle" src="imagens/gevp.png" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">Usuário</span>
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
                            <img id="logo" src="imagens/gevp.png" width="140" height="110">
                            <h6>Grêmio Estudantil Valdemar dos Pássaros</h6>
                        </div>
                    </div>
                    <li><a href="Funcs/inicio.php"><i class="fas fa-home"></i> Início</a></li>
                    <li>
                        <a href="#submenuachados" data-toggle="collapse">
                            <i class="fas fa-archive"></i> Achados e Perdidos</a>
                        <ul class="list-unstyled collapse" id="submenuachados">
                            <li> <a href="#"><i class="fas fa-list-ul"></i> Listar</a></li>
                            <li> <a href="#"><i class="fab fa-rebel"></i> Aliança Rebelde</a></li>
                        </ul>
                    </li>
                    <li><a href="Funcs/inicio.php"><i class="fas fa-print"></i> Bolsa Cópia</a></li>
                    <li><a href="Funcs/inicio.php"><i class="far fa-copy"></i> Documentos</a></li>
                    <li><a href="Funcs/inicio.php"><i class="fas fa-user-clock"></i> Empréstimos</a></li>
                    <li><a href="Funcs/inicio.php"><i class="fas fa-tshirt"></i> Fardas</a></li>
                    <li><a href="Funcs/inicio.php"><i class="fas fa-gem"></i> Patrimônio</a></li>
                    <li><a href="listar.php"><i class="fas fa-users"></i> Usuários</a></li>

                </ul>
            </nav>
            <script src="js/menu.js"></script>
        </aside>
        <!--fim do menu-->
        <div class="content p-1"><!-- início da 3 grid-->
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 titulo">Documentos</h2>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x"></i>
                                <h6 class="card-title">Usuários</h6>
                                <h2 class="lead">150</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <i class="far fa-copy fa-3x"></i>
                                <h6 class="card-title">Documentos</h6>
                                <h2 class="display-4">150</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x"></i>
                                <h6 class="card-title">Usuários</h6>
                                <h2 class="display-4">150</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x"></i>
                                <h6 class="card-title">Usuários</h6>
                                <h2 class="display-4">150</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        </div><!-- fim da 3 grid-->
    </div><!-- fim do container-->

</body>

</html>