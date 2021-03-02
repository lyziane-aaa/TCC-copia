<?php
session_start();
include_once("../conexao.php");

$id_fardas_lote = filter_input(INPUT_POST, 'id_fardas_lote', FILTER_SANITIZE_NUMBER_INT);
$encerramento_lote = filter_input(INPUT_POST, 'encerramento_lote', FILTER_SANITIZE_NUMBER_INT);
$prestou_contas = filter_input(INPUT_POST, 'prestou_contas', FILTER_SANITIZE_STRING);

$arquivo     = $_FILES['recibo_lote']['name'];
date_default_timezone_set('America/Fortaleza');


$hoje = date('d_m_Y à\s H\hi\m\i\ns\s');

//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'recibos_lote/';

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
if ($_FILES['recibo_lote']['error'] != 0) {
    die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['recibo_lote']['error']]);
    exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao = strtolower(end(explode('.', $_FILES['recibo_lote']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Arquivo não cadastrado: extensão inválida";
}

//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['recibo_lote']['size']) {
    echo "Arquivo muito grande ";
}

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else {
    //Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {

        $extfinal = end(explode(".", $arquivo));
        $data =
            $nome_final = "Recibo do Lote $id_fardas_lote encerrado em $encerramento_lote.$extfinal";
    }

    //Verificar se é possivel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['recibo_lote']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        //Update que desativará o lote como vigente e adicionará os dados que faltavam
        $sql = "UPDATE fardas_lote SET vigente_lote = '0', encerramento_lote = '$encerramento_lote', recibo_lote = '$nome_final', 
        prestou_contas = '$prestou_contas' where id_fardas_lote = '$id_fardas_lote'";
        $resultado_update_lote = mysqli_query($conn, $sql) or die("erro de $sql " . mysqli_error($conn));


        echo "Lote atualizado com Sucesso.";
    } else {
        //Upload não efetuado com sucesso, exibe a mensagem
        echo "Imagem não foi cadastrada com Sucesso.";
    }
}


//header("Location: painel_fardas.php");
