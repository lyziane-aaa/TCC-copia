<?php
    session_start(); 
    //Apaga as sessões iniciads	
    
    unset ($_SESSION);
   

    session_destroy();

    //redirecionar o usuario para a página de login
    header("Location: /TCC/usuarios/login.php");
