<?php include("funcs/header.php");?>

<title> Início </title>
</head>

<body class = "bg-dark"> 
<?php        include_once(SITE_ROOT . "funcs/menu.php"); 
    if(isset($_SESSION['login'])){
?>
        <div class="list-group-item">
        <p class="h1" style="text-align:center !important;"> Seja Bem Vindo a Área Administrativa!</p>
        <hr>
            <h2 align="center">Guia das Páginas</h2>
            <br>    
            <div class="row mb-3">
                    <div class="col-lg-3 col-sm-6"><div class="card card-redondo">
                    <div class="card-header">
                        <a data-toggle="collapse" href="#intro-achados" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Achados</h5>
                        </a>
                    </div>
                        <img class="card-img-top img-intro" src="imagens/achados.png">
                        <div class="card-body collapse" id="intro-achados">
                    <hr> <p class="card-text">Módulo onde se encontra a lista dos objetos perdidos que foram deixados na sede no grêmio, tendo a possibilidade de verificar as informações de cada item, como por exemplo, data, quem encontrou, etc., e onde se pode realizar o cadastro de novos itens e dar baixa quando o item for devolvido ao dono.</p>
                  </div>
                </div>
                    </div>
            
                <div class="col-lg-3 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-bc" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Bolsa cópia</h5>
                        </a>
                    </div>
                        <img class="card-img-top img-intro" src="imagens/bc.png">
                        <div class="card-body collapse" id="intro-bc">
                    <hr> <p class="card-text">Módulo em que se é possível cadastrar a quantidade de impressões que um discente pode realizar no grêmio e também verificar as informações de todos os discentes cadastrados e seus respectivos dados acerca das impressões.</p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-3 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-doc" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Documentos</h5>
                        </a>
                    </div>
                        <img class="card-img-top img-intro" src="imagens/doc.png">
                        <div class="card-body collapse" id="intro-doc">
                    <hr> <p class="card-text">Módulo onde é possível cadastrar os principais tipos de documentos como atas e oficios e verificar todos os arquivos criados pelo seu usuário.</p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-3 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-emp" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Empréstimos</h5>
                        </a>
                    </div>
                        <img class="card-img-top img-intro" src="imagens/emprestimos.png">
                        <div class="card-body collapse" id="intro-emp">
                    <hr> <p class="card-text">Módulo onde se pode encontrar a relação dos objetos que podem ser emprestados e a disponibilidade de cada um para empréstimo, contendo também suas informações e, caso esteja emprestado, para quem foi emprestado.</p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-3 col-sm-6 espaco"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-fardas" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Fardas</h5>
                        </a>
                    </div>
                        <img class="card-img-top img-intro" src="imagens/fardas.png">
                        <div class="card-body collapse" id="intro-fardas">
                    <hr> <p class="card-text">Módulo onde se é possível gerenciar as vendas de farda, dando a possibilidade de verificar a quantidade de fardas vendidas, verificar se houve alguma encomenda de fardas pelos discentes e se o grêmio tem fardas suficientes para atender a demanda das encomendas..</p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-3 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-pat" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Patrimônio</h5>
                        </a>
                    </div>
                        <img class="card-img-top img-intro" src="imagens/patrimonio.png">
                        <div class="card-body collapse" id="intro-pat">
                    <hr> <p class="card-text">Módulo onde está listado todo o patrimônio do grêmio, e onde também se pode realizar o cadastro de novos objetos adquiridos e a exclusão de objetos que foram perdidos e/ou quebrados..</p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-3 col-sm-6 "><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-usu" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Usuários</h5>
                        </a>
                    </div>
                        <img class="card-img-top img-intro" src="imagens/login.png">
                        <div class="card-body collapse" id="intro-usu">
                    <hr> <p class="card-text">Módulo onde é realizado o cadastro de novos usuários no sistema, a atribuição da permissão de administrador e a listagem dos usuários que já são cadastrados.</p>
                  </div>
                </div>
</div>
        </div>
    </div>

    
        </div>
<?php      } 

else{?>


<div class="list-group-item group-intro">
        <p class="h1" style="text-align:center !important;">  Seja Bem Vindo!</p>
        <hr>
            <h2 align="center">Guia das Páginas</h2>
            <br>
            <div class="row mb-3 " >
                    <div class="col-lg-2 col-sm-6 espaco-2"><div class="card card-redondo">
                    <div class="card-header">
                        <a data-toggle="collapse" href="#intro-achados" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado" style="margin-bottom:-10px">Diário Agremiação</h5>
                        </a>
                    </div>
                        <i class="fas fa-atlas fa-7x fa-intro"></i>
                        <div class="card-body collapse" id="intro-achados">
                    <hr> <p class="card-text">Página onde os discentes poderão verificar as atas de assembleia, as atas de reunião, as portarias e as portarias emitidas pelo grêmio.</p>
                  </div>
                </div>
                    </div>
            
                <div class="col-lg-2 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-bc" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Contato</h5>
                        </a>
                    </div>
                        <i class="fas fa-phone-square-alt fa-7x fa-intro"></i>
                        <div class="card-body collapse" id="intro-bc">
                    <hr> <p class="card-text">Página onde é possível entrar em contato com os desenvolvedores do sistema.
</p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-2 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-doc" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Fardas</h5>
                        </a>
                    </div>
                    <i class="fas fa-tshirt fa-7x fa-intro"></i>
                        <div class="card-body collapse" id="intro-doc">
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-2 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-emp" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Grêmio</h5>
                        </a>
                    </div>
                    <i class="fab fa-guilded fa-7x fa-intro"></i>
                        <div class="card-body collapse" id="intro-emp">
                    <hr> <p class="card-text">
                        <b> Atual Gestão: </b>
                        Página onde se encontram informações sobre a gestão que está em vigência no grêmio.
                        <br>
                        <b>Estatuto:</b>
                        Página que contém informações sobre o estatuto vigente do grêmio.
                    </p>
                  </div>
                </div>
</div>
            
    
            
                <div class="col-lg-2 col-sm-6"><div class="card card-redondo">
                <div class="card-header">
                        <a data-toggle="collapse" href="#intro-fardas" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                            <h5 class="card-title centralizado">Serviços</h5>
                        </a>
                    </div>
                    <i class="fas fa-concierge-bell fa-7x fa-intro"></i>
                    <div class="card-body collapse" id="intro-fardas">
                        <hr> <p class="card-text">Pagina onde se pode verificar os registros do:
                        <b>Achados e Perdidos</b>,<br> <b>Patrimônio</b>,<br> <b>Bolsa Cópia</b>,<br> <b>Emprestimos</b>.</p>
                  </div>
                </div>
                </div>
        </div>
    </div>

    
        </div>


<?php } include_once(SITE_ROOT . "funcs/footer.php"); ?>
