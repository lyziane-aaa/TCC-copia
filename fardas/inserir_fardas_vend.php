<?php
session_start();
include_once("../funcs/conexao.php");

$id_fardas_enc = filter_input(INPUT_POST, 'id_fardas_enc', FILTER_SANITIZE_NUMBER_INT);
$qnt_fardas_vend = filter_input(INPUT_POST, 'qnt_fardas_vend', FILTER_SANITIZE_NUMBER_INT);
$nome_fardas_vend = filter_input(INPUT_POST, 'nome_fardas_vend', FILTER_SANITIZE_STRING);
$matricula_fardas_vend = filter_input(INPUT_POST, 'matricula_fardas_vend', FILTER_SANITIZE_STRING);
$tamanho_fardas_vend = filter_input(INPUT_POST, 'tamanho_fardas_vend', FILTER_SANITIZE_STRING);
$qnt_fardas_vend = filter_input(INPUT_POST, 'qnt_fardas_vend', FILTER_SANITIZE_NUMBER_INT);
$qnt_fardas_vend = filter_input(INPUT_POST, 'qnt_fardas_vend', FILTER_SANITIZE_NUMBER_INT);


$arquivo     = $_FILES['recibo_fardas_vend']['name'];
date_default_timezone_set('America/Fortaleza');


$hoje = date('d_m_Y à\s H\hi\m\i\ns\s');


//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'recibos_fardas/';

//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024 * 1024 * 100; //5mb

//Array com a extensões permitidas
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'pdf');



//Renomeiar
$_UP['renomeia'] = true;

//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if ($_FILES['recibo_fardas_vend']['error'] != 0) {
    die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['recibo_fardas_vend']['error']]);
    exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao = strtolower(end(explode('.', $_FILES['recibo_fardas_vend']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Arquivo não cadastrado: extensão inválida";
}

//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['recibo_fardas_vend']['size']) {
    echo "Arquivo muito grande ";
}

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else {
    //Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {
        //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $extfinal = end(explode(".", $arquivo));
        $data =
            $nome_final = "Recibo Farda $tamanho_fardas_vend de $matricula_fardas_vend - $hoje.$extfinal";
    }

    //Verificar se é possivel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['recibo_fardas_vend']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        //Upload efetuado com sucesso, exibe a mensagem
        //Verifica o lote atual e pega os dados
        for ($i = 0; $i < $qnt_fardas_vend; $i++) {
            $sql = "SELECT id_fardas_lote FROM fardas_lote WHERE vigente_lote = 1";
            $busca_lote = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));

            $lote = mysqli_fetch_all($busca_lote);

            //Laço para transformar tudo que não for a 2ª posição do Array em int, já que a 2ª posição, neste caso, é o nome do fornecedor.
            $lote = intval($lote[0][0]);

            //Teste se não há recibo com o mesmo nome
            $sql = "SELECT recibo_fardas FROM fardas_vendidas";
            $res = mysqli_query($conn, $sql) or die("erro " . mysqli_error($conn));
            $res_recibo = mysqli_fetch_assoc($res);

            // No banco de dados será salvo apenas o nome do arquivo.
            // Insere os dados da farda vendida
            $sql = "INSERT INTO fardas_vendidas (nome_fardas, matricula_fardas, tamanho_fardas, 
              preco_fardas, fornecedor_fardas,lote_fardas, recibo_fardas, gremista_vendeu,data_vendeu)
             VALUES ('$nome_fardas_vend', '$matricula_fardas_vend', '$tamanho_fardas_vend', '$lote','$lote', '$lote', '$nome_final', '{$_SESSION['nome_usuarios']}', NOW())";
            $resultado_insert_fardas = mysqli_query($conn, $sql) or die("erro de $sql " . mysqli_error($conn));

            //atualiza a quantidade de fardas vendidas no lote 
            $a= strtolower(str_replace('-', '_', $tamanho_fardas_vend));
            $sql = "UPDATE fardas_lote as fl SET fl.qnt_$a"."_vend_lote = ( SELECT COUNT(fv.tamanho_fardas) 
            FROM fardas_vendidas as fv WHERE fv.tamanho_fardas = '$tamanho_fardas_vend' ) where fl.vigente_lote = 1 ;
            ";


            $resultado_insert_fardas = mysqli_query($conn, $sql) or die("erro de $sql " . mysqli_error($conn));

            echo "Imagem cadastrada com Sucesso.";
        }
        $delete = "DELETE FROM fardas_encomendas WHERE id_fardas_enc = '$id_fardas_enc'";


        $resultado_del_fardas = mysqli_query($conn, $delete) or die("Erro de $delete" . mysqli_error($conn));
    } else {
        //Upload não efetuado com sucesso, exibe a mensagem
        echo "Imagem não foi cadastrada com Sucesso.";
    }
}

//header("Location: painel_fardas.php");
