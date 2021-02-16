<?php
$conn = mysqli_connect('localhost', 'root', '', 'gremio');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//printf("Initial character set: %s\n", mysqli_character_set_name($conn));

/* change character set to utf8mb4 */
if (!mysqli_set_charset($conn, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
    exit();
} else {
   // printf("Current character set: %s\n", mysqli_character_set_name($conn));
}



/*
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
*/