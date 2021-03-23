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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                    <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                        <hr> <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                </div>
                </div>
        </div>
    </div>

    
        </div>


<?php } include_once(SITE_ROOT . "funcs/footer.php"); ?>
