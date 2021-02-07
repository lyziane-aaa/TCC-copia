<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "gremio";
//Sempre iniciado com $, tipo de variável;


//Criar a conexao. A variáven $conn recebe a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
$grupo ="";
function abrirBanco(){
    $conexao = new mysqli("localhost", "root", "", "gremio");
    return $conexao;}

function selectAllUsu(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM usuarios ORDER BY login";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }}
    return $grupo;
