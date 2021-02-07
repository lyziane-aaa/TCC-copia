<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Menu</title>
    <link rel="stylesheet" href="/TCC/_css/estilo.css">
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
    if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {
        $usu = $_SESSION['nome_usuarios'];
       
    ?>
    <!-- O checkbox e a label são responsaveis pelo icone de quando o site fica em resolução menor  -->
    <input type="checkbox"  id="bt_menu">
    <label for="bt_menu" class="label_menu">&#9776;</label>

    
    <!-- Inicio da Nav Bar -->
    <nav class="menu">
        <ul>
        <!-- A logo foi colocada em uma <li> com uma classe especifica para não
        atrapalhar a formatação -->
            <li class="li_logo" onclick="window.open('/TCC/Funcs/inicio.php');"> <img src="/TCC/imagens/gevp.png" class="logo"> </li>
           <li><a href="#"> Ac. e Perdidos </a>
                <ul>
                    <li><a href="/TCC/achados/listar_achados.php">Listar</a> </li>
                    <li><a href= "/tcc/achados/cadastrar_achados.php">Cadastrar</a></li>
                </ul>
            </li> 
            
            <li><a href="#"> Bolsa Cópia </a>
                <ul>
                    <li><a href="../bolsaCopia/listar_bolsacopia.php">Listar</a> </li>
                    <li><a href="/TCC/bolsaCopia/cadastrar_bolsacopia.php">Cadastrar</a></li>
                </ul>
            </li>

            

            <li><a href="#"> Empréstimos </a>
                <ul>
                    <li><a href="/TCC/emprestimo/listar_emprestimo.php">Listar</a> </li>
                    <li><a href="/TCC/emprestimo/cadastrar_emprestimo.php">Cadastrar</a></li>
                </ul>
            </li>

            <li><a href="#"> Patrimônio </a>
                <ul>
                    <li><a href="/TCC/patrimonio/listar_patrimonio.php">Listar</a> </li>
                    <li><a href="/TCC/patrimonio/cadastrar_patrimonio.php">Cadastrar</a></li>
                </ul>
            </li>

            <li><a href="#"> Usuários </a>
                <ul>
                    <li><a href="/TCC/usuarios/listar_usuarios.php">Listar</a> </li>
                    <li><a href="/TCC/usuarios/cadastrar_usuarios.php">Cadastrar</a></li>
                </ul>
            </li>

            <li><a href="#"> Eduardo é corno </a>
                <ul>
                    <li><a href="/TCC/documentos/listarDocumentos.php">Listar</a> </li>
                    <li><a href="/TCC/documentos/cadastrarOficio.php">Gerar</a></li>
                </ul>
            </li>

            <li class="usu"> <img src="/TCC/imagens/usuario.png" class="usu_icone" <?php if(isset($_SESSION['listar'])) {if($_SESSION['listar'] == 1) {echo "style = 'width: 50px !important;
    height: 50px !important;' ";} else{echo "style = 'width: 30px !important;
        height: 30px !important;' "; }}?> alt=""> 
                <ul>
                    <li><a href="#"><?php echo $usu; ?></a> </li>
                    <li><a href="/TCC/sair.php">Sair</a></li>
                </ul>
            </li>

        </ul>
    </nav>

    <?php 
        
        } else{
            ?>
            <!-- Menu para quem não é usuário  -->
                
            <!-- O checkbox e a label são responsaveis pelo icone de quando o site fica em resolução menor  -->
            <input type="checkbox"  id="bt_menu">
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
                            <li id= "li_gestaopassada"><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Gestões Passadas</a> </li>
                            <li><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Estatuto</a> </li>
                            
                        </ul>
                        
                    </li>

                    <li id ="li_doa"><a href="/TCC/bolsaCopia/listar_bolsacopia.php">Diário Oficial da Agremiação</a> </li>
                    
        
                    <li><a href="#">Fale conosco</a></li>
        
                    <li><a href="#">Serviços</a>
                        <ul>
                            <li><a href="/TCC/achados/listar_achados.php">Achados e Per.</a> </li>
                            <li><a href="/TCC/bolsacopia/listar_bolsacopia.php">Bolsa Cópia</a> </li>
                            <li><a href="/TCC/emprestimos/listar_emprestimos.php">Empréstimos</a> </li>

                        </ul>
                    </li>
        
        
                    
        
                    
        
                </ul>
            </nav>
        
            <?php 
                }
                /*else if(isset($_SESSION['aluno'])){ ?>
                    <nav class="menu">
                    <ul>
                    <!-- A logo foi colocada em uma <li> com uma classe especifica para não
                    atrapalhar a formatação -->
                        <li class="li_logo" ><a class="log" href="Funcs/inicio.php"></a> <img src="imagens/gevp.png" class="logo"> </li>
                        <li><a href="bolsaCopia/listar_bolsacopia.php"> Bolsa Cópia </a>
                        </li>
            
                        <li><a href="achados/listar_achados.php"> Ac.Perdidos </a>
                        </li>
            
                        <li><a href="emprestimo/listar_emprestimo.php"> Empréstimos </a>
                        </li>
            
                        <li><a href="patrimonio/listar_patrimonio.php"> Patrimônio </a>
                        </li>
        
                        <li><a href="documentos/listarDocumentos.php"> Documentos </a>
                        </li>
            
                        <li class="usu"> <img src="imagens/usuario.png" class="usu_icone" <?php if(isset($_SESSION['listar'])) {if($_SESSION['listar'] == 1) {echo "style = 'width: 50px !important;
            height: 50px !important;' ";} else{echo "style = 'width: 30px !important;
                height: 30px !important;' "; }}?> alt=""> 
                            <ul>
                                <li><a href="#"><?php echo $_SESSION['aluno']; ?></a></li>
                                <li><a href="sair.php">Sair</a></li>
                            </ul>
                        </li>
            
                    </ul>
                </nav>

        }*/
    ?>


</body>
</html>