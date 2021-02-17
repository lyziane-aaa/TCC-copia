<!DOCTYPE html>
<html lang="en">
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
include_once("../conexao.php"); 
include_once("../menu.php"); 
if(!isset($_SESSION)){
    session_start();
}
?>

<?php 
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
        include_once("../footer.php");
        }
 ?>
</body>
</html>