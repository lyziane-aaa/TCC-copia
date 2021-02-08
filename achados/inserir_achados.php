<html>
<body>
<?php 
session_start();
include_once("../conexao.php");
$nomeAchados = filter_input(INPUT_POST, 'nomeAchados', FILTER_SANITIZE_STRING);
$descricaoAchados = filter_input(INPUT_POST, 'descricaoAchados', FILTER_SANITIZE_STRING);
$gremistaRecebeuAchados = filter_input(INPUT_POST, 'gremistaRecebeuAchados', FILTER_SANITIZE_STRING);
$quandoAchados = filter_input(INPUT_POST, 'quandoAchados', FILTER_SANITIZE_STRING);
$ondeAchados = filter_input(INPUT_POST, 'ondeAchados', FILTER_SANITIZE_STRING);
$quemReivindicouAchados = filter_input(INPUT_POST, 'quemReivindicouAchados', FILTER_SANITIZE_STRING);
$cpfMatriculaAchados = filter_input(INPUT_POST, 'cpfMatriculaAchados', FILTER_SANITIZE_STRING);
$gremistaDevolveuAchados = filter_input(INPUT_POST, 'gremistaDevolveuAchados', FILTER_SANITIZE_STRING);
$postadoAchados = filter_input(INPUT_POST, 'postadoAchados', FILTER_SANITIZE_STRING);
$statusAchados = filter_input(INPUT_POST, 'statusAchados', FILTER_SANITIZE_STRING);
    // configurar hora e data
    date_default_timezone_set('America/Fortaleza');

    $dataNova = date('d-m-Y H.i.s').' - '; // como � arquivo, barras / e dois pontos : n�o s�o suportados, por isso usamos - e .
  

$imgAchados = $dataNova.$nomeAchados.'.jpg'; // nome do arquivo

 


//Pasta onde o arquivo ser� salvo
$_UP['pasta'] = '../_achados/imgAchados/';


// Tamanho m�ximo do arquivo em bytes
$_UP['tamanho'] = 1024*1024*70;
// Extens�es permitidas
$_UP['extensoes'] = array ('png','jpg','jpeg','gif');

//Renomear
$_UP['renomear'] = false;

// array com erros
 $_UP['erros'][0] = 'N�o houve erro';
 $_UP['erros'][1] = 'O arquivo carregado � maior que o limite permitido.';
 $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado.';
 $_UP['erros'][3] = 'O carregamento do arquivo foi feito parcialmente.';
 $_UP['erros'][4] = 'O carregamento do arquivo n�o foi realizado.';


    if ($_FILES ['imgAchados']['erro'] != 0) {
     die ("N�o foi poss�vel fazer o carregamento, erro: <br>".$_UP['erros'][$_FILES['imgArquivo']['error']]);
     exit;
	}
 
 //Verifica��o da extens�o do arquivo

 $extensao = strtolower(end(explode('.',$_FILES['imgAchados']['name'])));
 if (array_search($extensao, $_UP['extensoes'])===false) {
   echo "
   <script type=\'text/javascript\'>
    alert(\"A Imagem n�o foi cadastrada: extens�o inv�lida\");
    </script>
    ";
 } else if ($_UP['tamanho'] <$_FILES['imgAchados']['size']){
    echo "
   <script type=\'text/javascript\'>
    alert(\"A Imagem n�o foi cadastrada: arquivo muito grande\");
    </script>
    ";
 
 }
 else {
//Primeiro verifica se deve trocar o nome do arquivo
				if($_UP['renomear'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extens�o .jpg
					
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['imgAchados']['name'];
				}
				//Verificar se � possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['imgAchados']['tmp_name'], $_UP['pasta']. $imgAchados)){
					//Upload efetuado com sucesso, exibe a mensagem
					$resultado_insert = "INSERT INTO achados (nome_achados, descricao_achados, gremista_recebeu_achados, quando_achados, 
					onde_achados,quem_reivindicou_achados,cpf_matricula_achados,gremista_devolveu_achados,postado_achados, status_achados, img_achados)
 VALUES ('$nomeAchados', '$descricaoAchados', '$gremistaRecebeuAchados', '$quandoAchados', '$ondeAchados', '$quemReivindicouAchados', 
 '$cpfMatriculaAchados','$gremistaDevolveuAchados', '$postadoAchados', '$statusAchados', '$imgAchados')"; 

 $resultado_insertPat = mysqli_query($conn, $resultado_insert);
					echo "
						
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com Sucesso.\");
						</script>
					";	
				}else{
					//Upload n�o efetuado com sucesso, exibe a mensagem
					echo "
						
						<script type=\"text/javascript\">
							alert(\"Imagem n�o foi cadastrada com Sucesso.\");
						</script>
					";
				}
			}






header("location:cadastrarAchados.php");

 ?>
 </body>
 </html>