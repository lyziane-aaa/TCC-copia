<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

	<!-- LINKS -->
    <link rel = "stylesheet" type = "text/css" href = "../_css/estilo.css">
	<link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
</head>

<body class="tema-escuro">
<?php

include_once("../menu.php"); 
?>
<!-- A div do "Owl carousel" para configurar o Carrossel-->
<div class="owl-carousel owl-theme extra">
    <div class="item">
		<img src="../imagens/teste1.jpg" >
	</div>

	<div class="item">
		<img src="../imagens/teste2.jpg">
	</div>

	<div class="item">
		<img src="../imagens/teste3.jpg" >
	</div>
    
</div>
<!-- Scripts do Owl Carousel -->
<script src="../OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
<script src="../OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
        /* Configuração de responsividade entre outros atributos */
    loop:true,
    margin:10,
    nav:true,
	autoHeight:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>


<!-- Divs das regras -->
<!-- Cada linha regra corresponde a duas regras -->

<?php 

    include_once ('../conexao.php'); 
    $_SESSION['listar'] = 2;
    if(isset($_SESSION['login']) && isset($_SESSION['nivel'])) {

?>
<div class="linha-regras">
    <div class="regras">
        <h2> <img src="../imagens/regras.png" class="icone" alt="regras"> Regra 1</h2> 
        <p>Registros só devem ser excluidos 
        pelo Administrador em caso de duplicação.
        </p>
    </div>

    <div class="regras">
        <h2> <img src="../imagens/regras.png" class="icone" alt="regras"> Regra 2</h2> 
        <p>Apenas Administradores podem
        cadastrar novos usuários.
        </p>
    </div> 
</div>

<div class="linha-regras">
    <div class="regras">
        <h2> <img src="../imagens/regras.png" class="icone" alt="regras"> Regra 3</h2> 
        <p>Caso o código apresente algum defeito,
        entre em contato com os desenvolvedores.
        </p>
    </div>

    <div class="regras">
        <h2> <img src="../imagens/regras.png" class="icone" alt="regras"> Regra 4</h2> 
        <p>Não mexer no banco de dados sem
        o acompanhamento dos desenvolvedores.
        </p>
    </div> 

    <div class="regras">
        <h2> <img src="../imagens/regras.png" class="icone" alt="regras"> Regra 5</h2> 
        <p>Os documentos devem ser upados no
        site depois de serem confecionados.
        </p>
    </div> 

    <div class="regras">
        <h2> <img src="../imagens/regras.png" class="icone" alt="regras"> Regra 6</h2> 
        <p>Não pressionar repetidamente o botão
        de cadastrar.
        </p>
    </div> 
</div>
<?php }
    else{
        //A analisar o que colocar aqui.
    }
    include_once ('../footer.php'); ?>
</body>
</html>