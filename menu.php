<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../_css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php

    define('ROOTPATH', dirname(__FILE__));
    if (!isset($_SESSION['login'])) {
        session_start();
        if (!isset($_SESSION['nivel'])) {
            $_SESSION['nivel'] = 0;
        }
    }
    if (isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
        $usu = $_SESSION['nome_usuarios'];
    ?>
        <!-- O checkbox e a label são responsaveis pelo icone de quando o site fica em resolução menor  -->
        <input type="checkbox" id="bt_menu">
        <label for="bt_menu" class="label_menu">&#9776;</label>


        <!-- Inicio da Nav Bar -->
        <nav class="menu">
            <ul>
                <!-- A logo foi colocada em uma <li> com uma classe especifica para não
        atrapalhar a formatação -->
                <li class="li_logo invi" onclick="window.location.assign('/TCC/Funcs/inicio.php');">
                    <img src="/TCC/imagens/gevp.png" class="logo">
                </li>
                <li><a href="#"> Ac.Perdidos </a>
                    <ul>
                        <li><a href="/TCC/achados/listar_achados.php">Listar</a> </li>
                        <li><a href="/TCC/achados/cadastrar_achados.php">Cadastrar</a></li>
                    </ul>
                </li>

                <li><a href="#"> Bolsa Cópia </a>
                    <ul>
                        <li><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Listar</a> </li>
                        <li><a href="/TCC/bolsaCopia/cadastrar_bolsacopia.php">Cadastrar</a></li>
                    </ul>
                </li>
                <li><a href="#"> Documentos </a>
                    <ul>
                        <li><a href="/TCC/documentos/interno/listar_documentos.php">Meus Documentos</a> </li>
                        <li><a href="/TCC/documentos/interno/oficio/gerar_oficio.php">Novo Ofício</a></li>
                        <li><a href="/TCC/documentos/interno/portaria/gerar_portaria.php">Nova Portaria</a></li>
                        <li><a href="/TCC/documentos/interno/ata/gerar_ata.php">Nova Ata</a></li>
                        <li><a href="/TCC/documentos/interno/ata/gerar_ata_ass.php">Nova Ata de Assembleia</a></li>
                    </ul>
                </li>
                <li><a href="#"> Empréstimos </a>
                    <ul>
                        <li><a href="/TCC/emprestimo/listar_emprestimo.php">Listar</a> </li>
                        <li><a href="/TCC/emprestimo/cadastrar_emprestimo.php">Cadastrar</a></li>
                    </ul>
                </li>
                <li><a href="#"> Gestão </a>
                    <ul>
                        <li><a href="/TCC/usuarios/listar_usuarios.php">Listar</a> </li>
                        <li><a href="/TCC/usuarios/gestao/listar_gestao.php">Gestão</a></li>
                    </ul>
                </li>

                <li><a href="#">Fardas</a>
                    <ul>
                        <li><a href="/TCC/fardas/painel_fardas.php">Painel</a> </li>
                        <li><a href="/TCC/fardas/config_lote.php">Config. de lote</a> </li>

                    </ul>
                </li>
                <li><a href="#"> Patrimônio </a>
                    <ul>
                        <li><a href="/TCC/patrimonio/listar_patrimonio.php">Listar</a> </li>
                        <li><a href="/TCC/patrimonio/cadastrar_patrimonio.php">Cadastrar</a></li>
                    </ul>
                </li>






                <li class="reduzido"> <label for="bt_menu" class="label_menu espacamento">
                        &nbsp; &#9776;</label>
                </li>

                <li class="usu"> <img src="/TCC/imagens/usuario.png" class="navbar-toggler-icon" alt="">
                    <ul>
                        <li><a href="#"><?php echo $usu; ?></a> </li>
                        <?php if ($_SESSION['nivel'] = 2) { ?>
                            <li><a href="/TCC/usuarios/gestao/cadastrar_gestao.php">Painel de Gestão</a></li>
                            <li><a href="/TCC/usuarios/diretoria/cadastrar_diretoria.php">Painel de Diretoria</a></li>
                            <li><a href="/TCC/usuarios/gestao/painel_gestao.php">Painel de Documentos</a></li>
                        <?php } // fim do if session 
                        ?>
                        <li><a href="/TCC/sair.php">Sair</a></li>
                    </ul>
                </li>


            </ul>
        </nav>

    <?php
    } else { ?>
        <!-- Menu para quem não é usuário  -->

        <!-- O checkbox e a label são responsaveis pelo icone de quando o site fica em resolução menor  -->
        <input type="checkbox" id="bt_menu">
        <label for="bt_menu" class="label_menu">&#9776;</label>


        <!-- Inicio da Nav Bar -->
        <nav class="menu">
            <ul>
                <!-- A logo foi colocada em uma <li> com uma classe especifica para não
                atrapalhar a formatação -->
                <li class="li_logo" onclick="window.open('/TCC/usuarios/login.php');"> <img src="/TCC/imagens/gevp.png" class="logo"> </li>
                <li><a href="/TCC/Funcs/inicio.php"> Início </a>
                </li>

                <li><a href="#"> O Grêmio </a> <!-- Página para falar da história do grêmio e da gestão -->
                    <ul>
                        <li><a href="/TCC//bolsaCopia/listar_bolsacopia.php">História</a> </li>
                        <li><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Atual Gestão</a> </li>
                        <li id="li_gestaopassada"><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Gestões Passadas</a> </li>
                        <li><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Estatuto</a> </li>
                    </ul>
                </li>

                <li id="li_doa"><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Diário Oficial da Agremiação</a> </li>

                <li><a href="#">Fale conosco</a></li>

                <li><a href="/TCC/fardas/encomendar_farda.php">Fardas</a></li>

                <li><a href="#">Serviços</a>
                    <ul>
                        <li><a href="/TCC/achados/listar_achados.php">Achados e Per.</a> </li>
                        <li><a href="/TCC/bolsacopia/listar_bolsacopia.php">Bolsa Cópia</a> </li>
                        <li><a href="/TCC/emprestimo/listar_emprestimo.php">Empréstimos</a> </li>
                    </ul>
                </li>
            </ul>
        </nav>
    <?php
    }
    ?>


</body>

</html>