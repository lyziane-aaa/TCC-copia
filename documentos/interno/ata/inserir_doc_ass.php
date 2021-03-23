<?php
session_start();
require_once("../../../funcs/conexao.php");

if (isset($_SESSION['login'])) {

$num_doc_ata_ass = filter_input(INPUT_POST, 'num_doc_ata_ass', FILTER_SANITIZE_STRING);
$titulo_doc_ata_ass = filter_input(INPUT_POST, 'titulo_doc_ata_ass', FILTER_SANITIZE_STRING);
$data_reuniao_doc_ata_ass = filter_input(INPUT_POST, 'data_reuniao_doc_ata_ass', FILTER_SANITIZE_STRING);
$conv_doc_ata_ass= filter_input(INPUT_POST, 'convoc_doc_ata_ass', FILTER_SANITIZE_STRING);
$tipo_doc_ata_ass= filter_input(INPUT_POST, 'tipo_doc_ata_ass', FILTER_SANITIZE_STRING);
$sec_doc_ata_ass= filter_input(INPUT_POST, 'sec_doc_ata_ass', FILTER_SANITIZE_STRING);

$horario_doc_ata_ass = filter_input(INPUT_POST, 'horario_doc_ata_ass', FILTER_SANITIZE_STRING);
$local_doc_ata_ass = filter_input(INPUT_POST, 'local_doc_ata_ass', FILTER_SANITIZE_STRING);
$convoc_doc_ata_ass = filter_input(INPUT_POST, 'convoc_doc_ata_ass', FILTER_SANITIZE_STRING);
$pautas_doc_ata_ass = filter_input(INPUT_POST, 'pautas_doc_ata_ass');
$enc_doc_ata_ass = filter_input(INPUT_POST, 'enc_doc_ata_ass');
$presentes_doc_ata_ass = filter_input(INPUT_POST, 'presentes_doc_ata_ass');
$corpo_doc_ata_ass = filter_input(INPUT_POST, 'corpo_doc_ata_ass');
$autor_doc_ata_ass = $_SESSION['nome_usuarios'];
$cargo_doc_ata_ass = $_SESSION['cargo'];
$matricula_doc_ata_ass = $_SESSION['matricula'];
$data_registro_ata_ass = filter_input(INPUT_POST, 'data_registro_ata_ass', FILTER_SANITIZE_STRING);
$gremista_registro_ata_ass = $_SESSION['login'];


$titulo_doc_ata_ass = "Ata $num_doc_ata_ass - Assembleia $titulo_doc_ata_ass";

$hoje = date('d/m/Y H:i:s');
date_default_timezone_set('America/Fortaleza');

$dir = "assinaturas_ass"; 
// recebendo o arquivo multipart 
$nome_arq = str_replace("/", "_", 'Lista ' . $titulo_doc_ata_ass . '-'.$num_doc_ata_ass);
$files = $_FILES["assinaturas_doc_ata_ass"];
$file = $_FILES["assinaturas_doc_ata_ass"]['name']; 
$file= explode(".",$file);
$nome_arq = $nome_arq . '.' . $file['1'];


// Move o arquivo da pasta temporaria de upload para a pasta de destino 
if (move_uploaded_file($files["tmp_name"], "$dir/".$nome_arq)) { 
	
	$assinaturas_doc_ata_ass = "$dir/".$nome_arq;
	


// Verificação se é assembleia apenas por questões linguísticas

$sql = "INSERT INTO `documentos_ata_ass`
(`num_doc_ata_ass`,	`titulo_doc_ata_ass`,`convoc_doc_ata_ass`, `tipo_doc_ata_ass`,  `sec_doc_ata_ass`,
`data_reuniao_doc_ata_ass`,
	`horario_doc_ata_ass`,
		`local_doc_ata_ass`,
			`pautas_doc_ata_ass`,
				`enc_doc_ata_ass`,
					`presentes_doc_ata_ass`,
						`corpo_doc_ata_ass`,
`autor_doc_ata_ass`,
	`matricula_doc_ata_ass`,
		`cargo_doc_ata_ass`,
			`data_registro_ata_ass`,
				`gremista_registro_ata_ass`,
					`assinaturas_doc_ata_ass`)	VALUES
(
'$num_doc_ata_ass',
'$titulo_doc_ata_ass',
'$convoc_doc_ata_ass',
'$tipo_doc_ata_ass',
'$sec_doc_ata_ass',
'$data_reuniao_doc_ata_ass',
'$horario_doc_ata_ass',
'$local_doc_ata_ass',
'$pautas_doc_ata_ass',
'$enc_doc_ata_ass',
'$presentes_doc_ata_ass',
'$corpo_doc_ata_ass',
'$autor_doc_ata_ass',
'$matricula_doc_ata_ass',
'$cargo_doc_ata_ass',
'$data_registro_ata_ass',
'$gremista_registro_ata_ass',
'$assinaturas_doc_ata_ass');";
	$resultado_inser_ata_ass = mysqli_query($conn, $sql ) or die("erro " . mysqli_error($conn));
	 header("location: /TCC/documentos/interno/listar_documentos.php?sucesso=1");

	}
			


} else {
	header ("Location: /TCC/");
}




