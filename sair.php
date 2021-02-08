<?php
    session_start(); 
    //Apaga as sessões iniciads	
    unset($_SESSION['login']);
    unset ($_SESSION['logado']);
    unset ($_SESSION['aluno']);
    unset ($_SESSION['nivel']);
    unset ($_SESSION['senha']);
    unset ($_SESSION['listar']);
    unset ($_SESSION['nome_usuarios']);

    session_destroy();

    //redirecionar o usuario para a página de login
    header("Location: usuarios/login.php");
